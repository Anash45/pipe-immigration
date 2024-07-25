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
        if ($user['locked_until'] && $now < new DateTime($user['locked_until'])) {
            $response['status'] = 'locked';
            $response['message'] = 'The validation code has been incorrectly entered 5 times. Your account will be locked for 24 hours. If you need help, email us at support@immigrationAI.Lawyer.';
            echo json_encode($response);
            exit;
        }

        // Get current time
        $currentTime = (new DateTime())->format('Y-m-d H:i:s');

        // Verify the code
        $sql = "SELECT * FROM verification_codes WHERE ClientID = :client_id AND verification_code = :verification_code AND expires_at > :current_time";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':client_id', $userId);
        $stmt->bindParam(':verification_code', $enteredCode);
        $stmt->bindParam(':current_time', $currentTime);
        $stmt->execute();
        $verificationCode = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($verificationCode) {
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
            // Log unsuccessful attempt
            $sql = "INSERT INTO verification_attempts (ClientID, is_successful, attempt_time) VALUES (:client_id, 0, NOW())";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':client_id', $userId);
            $stmt->execute();

            // Count unsuccessful attempts in the last 24 hours
            $sql = "SELECT COUNT(*) as attempt_count FROM verification_attempts WHERE ClientID = :client_id AND is_successful = 0 AND attempt_time > DATE_SUB(NOW(), INTERVAL 24 HOUR)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':client_id', $userId);
            $stmt->execute();
            $attempts = $stmt->fetch(PDO::FETCH_ASSOC)['attempt_count'];

            if ($attempts >= 5) {
                // Lock the account for 24 hours
                $lockUntil = date('Y-m-d H:i:s', strtotime('+24 hours'));
                $sql = "UPDATE clients SET locked_until = :locked_until WHERE ClientID = :client_id";
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(':locked_until', $lockUntil);
                $stmt->bindParam(':client_id', $userId);
                $stmt->execute();

                $response['status'] = 'locked';
                $response['message'] = 'The validation code has been incorrectly entered 5 times. Your account will be locked for 24 hours. If you need help, email us at support@immigrationAI.Lawyer.';
            } else {
                $response['message'] = 'Invalid verification code!';
            }
        }

        echo json_encode($response);
    } catch (PDOException $e) {
        $response['message'] = "Error: " . $e->getMessage();
        echo json_encode($response);
    }
}
?>
