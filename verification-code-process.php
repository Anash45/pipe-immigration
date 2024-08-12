<?php
require './defines/db_conn.php'; // Include your database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $verifyEmailOrPhone = trim($_POST['verify_email_or_phone']);
    $enteredCode = trim($_POST['verification_code']);

    $response = ['status' => 'error', 'message' => '']; // Initialize response array

    try {
        // Check if the user exists
        $sql = "SELECT ClientID, verified, locked_until FROM clients WHERE email_or_phone = :email_or_phone";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':email_or_phone', $verifyEmailOrPhone);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$user) {
            $response['email_or_phone'] = $verifyEmailOrPhone;
            $response['status'] = 'error';
            $response['message'] = 'User not found!';
            echo json_encode($response);
            exit;
        }

        $userId = $user['ClientID'];

        // Check if the user is already verified
        if ($user['verified']) {
            $response['status'] = 'already_verified';
            $response['message'] = 'User already verified!';
            echo json_encode($response);
            exit;
        }

        // Check if the account is locked
        $now = new DateTime();

        // Get current time
        $currentTime = (new DateTime())->format('Y-m-d H:i:s');

        // First Query
        $sql1 = "SELECT * FROM verification_codes 
WHERE ClientID = :client_id 
AND verification_code = :verification_code 
AND expires_at > :current_time";
        $stmt1 = $pdo->prepare($sql1);
        $stmt1->bindParam(':client_id', $userId);
        $stmt1->bindParam(':verification_code', $enteredCode);
        $stmt1->bindParam(':current_time', $currentTime);
        $stmt1->execute();
        $verificationCode = $stmt1->fetch(PDO::FETCH_ASSOC);

        
        // Second Query
        $sql2 = "SELECT * FROM systemdynamicdata 
WHERE KeyName = 'MasterCode' 
AND Value = :verification_code";
        $stmt2 = $pdo->prepare($sql2);
        $stmt2->bindParam(':verification_code', $enteredCode);
        $stmt2->execute();
        $masterCode = $stmt2->fetch(PDO::FETCH_ASSOC);

        if ($verificationCode || $masterCode) {
            // Mark the user as verified
            $sql = "UPDATE clients SET verified = 1 WHERE ClientID = :client_id";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':client_id', $userId);
            $stmt->execute();

            // Log successful attempt
            $sql = "INSERT INTO verification_attempts (ClientID, is_successful, attempt_time) VALUES (:client_id, 1, NOW())";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':client_id', $userId);
            $stmt->execute();

            $response['status'] = 'success';
            $response['message'] = 'Verification successful!';
        } else {
            $response['message'] = 'Invalid verification code!';
        }

        echo json_encode($response);
    } catch (PDOException $e) {
        $response['message'] = "Error: " . $e->getMessage();
        echo json_encode($response);
    }
}
?>