<?php
require './defines/db_conn.php'; // Include your database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $verifyEmailOrPhone = trim($_POST['email']);
    $verification_code = trim($_POST['verification_code']);
    $new_password = trim($_POST['new_password']);

    $response = ['status' => 'error', 'message' => '']; // Initialize response array

    try {
        // Check if the user exists
        $sql = "SELECT UserID, verified FROM `user` WHERE email = :email OR phone = :phone";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':email', $verifyEmailOrPhone);
        $stmt->bindParam(':phone', $verifyEmailOrPhone);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$user) {
            $response['status'] = 'error';
            $response['message'] = '<span class="en">User not found!</span><span class="es">¡Usuario no encontrado!</span>';
            echo json_encode($response);
            exit;
        }

        $userId = $user['UserID'];

        // Get current time
        $currentTime = (new DateTime())->format('Y-m-d H:i:s');

        // Verify the code
        $sql = "SELECT * FROM verification_codes WHERE ClientID = :client_id AND verification_code = :verification_code";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':client_id', $userId);
        $stmt->bindParam(':verification_code', $verification_code);
        $stmt->execute();
        $verificationResult = $stmt->fetch(PDO::FETCH_ASSOC);


        // Second Query with ClientID Check
        $sql2 = "
SELECT *
FROM systemdynamicdata sdd
WHERE sdd.KeyName = 'MasterCode'
AND sdd.Value = :verification_code
AND EXISTS (
    SELECT 1
    FROM `user` u
    WHERE u.UserID = :client_id
)
";
        $stmt2 = $pdo->prepare($sql2);
        $stmt2->bindParam(':verification_code', $enteredCode);
        $stmt2->bindParam(':client_id', $userId);  // Bind ClientID to the query
        $stmt2->execute();
        $masterCode = $stmt2->fetch(PDO::FETCH_ASSOC);

        if ($verificationResult || $masterCode) {
            // Hash the new password
            $hashedPassword = password_hash($new_password, PASSWORD_DEFAULT);

            // Update the password
            $sql = "UPDATE `user` SET password = :password WHERE UserID = :client_id";
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