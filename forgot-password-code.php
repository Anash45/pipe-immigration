<?php
require './defines/db_conn.php'; // Include your database connection file
require './defines/functions.php';	
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
            $response['message'] = '
    <span class="en">User not found!</span>
    <span class="es">¡Usuario no encontrado!</span>
';
            echo json_encode($response);
            exit;
        }

        $userId = $user['ClientID'];


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

        if (getLanguage() == 'english') {
            $supportEmail = getSystemDataValue('emailforSupport');
        } else {
            $supportEmail = getSystemDataValue('emailforSupportEspañol');
        }

        if (isEmailOrPhone($emailOrPhone) == 'phone') {
            $isSent = sendVerificationCodePhone($emailOrPhone, $verificationCode);
            if ($isSent) {
                $response['status'] = 'success';
                $response['emailOrPhone'] = 'phone';
                $response['email_or_phone'] = $emailOrPhone;
                $response['message'] = '
        <span class="en">A new verification code has been sent to your phone number.</span>
        <span class="es">Se ha enviado un nuevo código de verificación a su número de teléfono.</span>
    ';
            } else {
                $response['status'] = 'error';
                $response['message'] = '
    <span class="en">Currently we only support North American phone numbers. Email us at ' . $supportEmail . ' to verify manually.</span>
    <span class="es">Actualmente solo admitimos números de teléfono de América del Norte. Envíanos un correo electrónico a ' . $supportEmail . ' para verificar manualmente.</span>
    <br>' . $supportString . '
';
            }
        } elseif (isEmailOrPhone($emailOrPhone) == 'email') {
            // Send verification code via email
            $subject = "Your Verification Code - PIPE Immigration";
            $message = "Your verification code is: " . $verificationCode;
            // $headers = "From: PIPE Immigration <no-reply@f4futuretech.com>"; // Set the sender email address
            $isSent = mail($emailOrPhone, $subject, $message);

            if ($isSent) {
                $response['status'] = 'success';
                $response['message'] = '
        <span class="en">A new verification code has been sent to your email.</span>
        <span class="es">Se ha enviado un nuevo código de verificación a su correo electrónico.</span>
    ';
            } else {
                $response['message'] = '
        <span class="en">Failed to send verification email.</span>
        <span class="es">No se pudo enviar el correo electrónico de verificación.</span>
    ';
            }
        }

        echo json_encode($response);
    } catch (PDOException $e) {
        $response['message'] = "Error: " . $e->getMessage();
        echo json_encode($response);
    }
}
?>