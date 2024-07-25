<?php
require 'db_conn.php'; // Include your database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $emailOrPhone = $_POST['email_or_phone'];
    $verificationCode = $_POST['verification_code']; // Assuming verification code is sent via POST

    $response = ['status' => 'error', 'message' => ''];

    try {
        // Check if the user exists
        $sql = "SELECT * FROM clients WHERE email_or_phone = :email_or_phone";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':email_or_phone', $emailOrPhone);
        $stmt->execute();
        $client = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($client) {
            $clientId = $client['ClientID'];

            // Check if account is locked
            $sql = "SELECT COUNT(*) AS attempt_count FROM verification_attempts WHERE ClientID = :client_id AND attempt_time > DATE_SUB(NOW(), INTERVAL 24 HOUR)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':client_id', $clientId);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($result['attempt_count'] >= 5) {
                $response['message'] = 'Account is locked. Please try again after 24 hours.';
                echo json_encode($response);
                exit;
            }

            // Verify the code
            $sql = "SELECT * FROM verification_codes WHERE ClientID = :client_id AND verification_code = :verification_code AND expires_at > NOW()";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':client_id', $clientId);
            $stmt->bindParam(':verification_code', $verificationCode);
            $stmt->execute();
            $verification = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($verification) {
                $response['status'] = 'success';
                $response['message'] = 'Verification successful!';

                // Mark user as verified
                $sql = "UPDATE clients SET is_verified = 1 WHERE ClientID = :client_id";
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(':client_id', $clientId);
                $stmt->execute();

                // Insert a successful verification attempt
                $sql = "INSERT INTO verification_attempts (ClientID, is_successful) VALUES (:client_id, 1)";
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(':client_id', $clientId);
                $stmt->execute();
            } else {
                $response['message'] = 'Invalid or expired verification code.';
                // Insert a failed verification attempt
                $sql = "INSERT INTO verification_attempts (ClientID, is_successful) VALUES (:client_id, 0)";
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(':client_id', $clientId);
                $stmt->execute();
            }
        } else {
            $response['message'] = 'Invalid email or phone.';
        }
        echo json_encode($response);
    } catch (PDOException $e) {
        $response['message'] = "Error: " . $e->getMessage();
        echo json_encode($response);
    }
}
?>
