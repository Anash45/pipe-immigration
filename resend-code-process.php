<?php
require './defines/db_conn.php'; // Include your database connection file

// echo json_encode($_POST);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $emailOrPhone = $_POST['email_or_phone'];

    $response = ['status' => 'error', 'message' => '']; // Initialize response array

    try {
        // Check if the user exists
        $sql = "SELECT ClientID, verified FROM clients WHERE email_or_phone = :email_or_phone";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':email_or_phone', $emailOrPhone);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$user) {
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

        // Generate a new verification code
        $verificationCode = mt_rand(100000, 999999);
        $expiresAt = date('Y-m-d H:i:s', strtotime('+1 hour'));

        // Insert new verification code into verification_codes table
        $sql = "DELETE FROM verification_codes WHERE ClientID = :client_id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':client_id', $userId);
        $stmt->execute();

        $sql = "INSERT INTO verification_codes (ClientID, verification_code, expires_at, created_at) VALUES (:client_id, :verification_code, :expires_at, NOW())";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':client_id', $userId);
        $stmt->bindParam(':verification_code', $verificationCode);
        $stmt->bindParam(':expires_at', $expiresAt);
        $stmt->execute();

        // Send verification code via email
        $subject = "Your New Verification Code - PIPE Immigration";
        $message = "Your new verification code is: " . $verificationCode;
        $headers = "From: PIPE Immigration <no-reply@f4futuretech.com>"; // Set the sender email address

        // Use mail() function to send the email
        $isSent = mail($emailOrPhone, $subject, $message, $headers);
        if ($isSent) {
            $response['status'] = 'success';
            $response['message'] = 'A new verification code has been sent to your email.';
        } else {
            $response['message'] = 'Failed to send verification email.';
        }

        echo json_encode($response);
    } catch (PDOException $e) {
        $response['message'] = "Error: " . $e->getMessage();
        echo json_encode($response);
    }
}
?>
