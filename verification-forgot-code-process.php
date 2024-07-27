<?php
require './defines/db_conn.php'; // Include your database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $verifyEmailOrPhone = trim($_POST['email']);
    $verification_code = trim($_POST['verification_code']);
    $new_password = trim($_POST['new_password']);

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
            $response['message'] = '<span class="en">User not found!</span><span class="es">¡Usuario no encontrado!</span>';
            echo json_encode($response);
            exit;
        }

        $userId = $user['ClientID'];

        // Get current time
        $currentTime = (new DateTime())->format('Y-m-d H:i:s');

        // Verify the code
        $sql = "SELECT * FROM verification_codes WHERE ClientID = :client_id AND verification_code = :verification_code AND expires_at > :current_time";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':client_id', $userId);
        $stmt->bindParam(':verification_code', $verification_code);
        $stmt->bindParam(':current_time', $currentTime);
        $stmt->execute();
        $verificationResult = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($verificationResult) {
            // Hash the new password
            $hashedPassword = password_hash($new_password, PASSWORD_DEFAULT);

            // Update the password
            $sql = "UPDATE clients SET password = :password WHERE ClientID = :client_id";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':password', $hashedPassword);
            $stmt->bindParam(':client_id', $userId);
            $stmt->execute();

            // Delete the verification code
            $sql2 = "DELETE FROM verification_codes WHERE ClientID = :client_id";
            $stmt = $pdo->prepare($sql2);
            $stmt->bindParam(':client_id', $userId);
            $stmt->execute();

            $response['status'] = 'success';
            $response['message'] = '<span class="en">Password has been successfully reset!</span><span class="es">¡La contraseña se ha restablecido correctamente!</span>';
        } else {
            $response['message'] = '<span class="en">Invalid verification code or code is expired!</span><span class="es">¡Código de verificación inválido o el código ha expirado!</span>';
        }

        echo json_encode($response);
    } catch (PDOException $e) {
        $response['message'] = '<span class="en">Error: ' . $e->getMessage() . '</span><span class="es">Error: ' . $e->getMessage() . '</span>';
        echo json_encode($response);
    }
}
?>
