<?php
require './defines/db_conn.php'; // Include your database connection file
require './defines/functions.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName = trim($_POST['first_name']);
    $lastName = trim($_POST['last_name']);
    $emailOrPhone = trim($_POST['email_or_phone']);
    $password = trim($_POST['password']);
    $confirmPassword = trim($_POST['confirm_password']);

    $response = ['status' => 'error', 'message' => '']; // Initialize response array

    // Check if all fields are present
    if (empty($firstName) || empty($lastName) || empty($emailOrPhone) || empty($password) || empty($confirmPassword)) {
        $response['message'] = '
    <span class="en">All fields are required!</span>
    <span class="es">¡Todos los campos son obligatorios!</span>
';
        echo json_encode($response);
        exit;
    }

    // Check if passwords match
    if ($password !== $confirmPassword) {
        $response['message'] = '
    <span class="en">Passwords do not match!</span>
    <span class="es">¡Las contraseñas no coinciden!</span>
';
        echo json_encode($response);
        exit;
    }

    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    try {
        // Check if user already exists
        $sql = "SELECT * FROM clients WHERE email_or_phone = :email_or_phone";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':email_or_phone', $emailOrPhone);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            $response['message'] = 'User already exists!';
            echo json_encode($response);
            exit;
        }

        $verified = 0;
        if (isEmailOrPhone($emailOrPhone) == 'phone') {
            $verified = 0;
        } elseif (isEmailOrPhone($emailOrPhone) == 'email') {
            $verified = 0;
        }

        // Insert the new client
        $sql = "INSERT INTO clients (first_name, last_name, email_or_phone, password, verified, createdAt, updatedAt) 
                VALUES (:first_name, :last_name, :email_or_phone, :password, :verified, NOW(), NOW())";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':first_name', $firstName);
        $stmt->bindParam(':last_name', $lastName);
        $stmt->bindParam(':email_or_phone', $emailOrPhone);
        $stmt->bindParam(':password', $hashedPassword);
        $stmt->bindParam(':verified', $verified);
        $stmt->execute();

        $clientId = $pdo->lastInsertId();

        // Generate verification code
        $verificationCode = mt_rand(100000, 999999);
        $expiresAt = (new DateTime())->modify('+1 hour')->format('Y-m-d H:i:s');

        // Insert verification code into verification_codes table
        $sql = "INSERT INTO verification_codes (ClientID, verification_code, expires_at, created_at) 
                VALUES (:client_id, :verification_code, :expires_at, NOW())";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':client_id', $clientId);
        $stmt->bindParam(':verification_code', $verificationCode);
        $stmt->bindParam(':expires_at', $expiresAt);
        $stmt->execute();

        $emailForSupportEspanol = getSystemDataValue('emailforSupportEspañol');
        $emailForSupport = getSystemDataValue('emailforSupport');

        if (getLanguage() == 'english') {
            $supportString = 'If you have difficulty creating an account send us email at ' . $emailForSupport;
        } else {
            $supportString = 'Si tiene dificultades para crear una cuenta envíenos un correo electrónico a ' . $emailForSupportEspanol;
        }

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
        <span class="en">Registration successful! Please check your phone number for the verification code.</span>
        <span class="es">¡Registro exitoso! Por favor, revisa tu correo número de teléfono para el código de verificación.</span>
    ';
            } else {
                $response['status'] = 'error';
                $response['message'] = '
    <span class="en">Currently, we only support North American phone number. If you\'re having any difficulty creating an account, send us an email at x'.$supportEmail.' and we\'ll verify your account manually.</span>
    <span class="es">Actualmente solo admitimos números de teléfono de América del Norte. Envíanos un correo electrónico a '.$supportEmail.' para verificar manualmente.</span>
    <br>' . $supportString . '
';
            }
        } elseif (isEmailOrPhone($emailOrPhone) == 'email') {
            // Send verification code via email
            $subject = "Your Verification Code - PIPE Immigration";
            $message = "Your verification code is: " . $verificationCode;
            // $headers = "From: PIPE Immigration <no-reply@f4futuretech.com>"; // Set the sender email address
            $isSent = mail($emailOrPhone, $subject, $message);

            if ($isSent) { // Simulate email sending success
                $response['status'] = 'success';
                $response['emailOrPhone'] = 'email';
                $response['email_or_phone'] = $emailOrPhone;
                $response['message'] = '
    <span class="en">Registration successful! Please check your email for the verification code.</span>
    <span class="es">¡Registro exitoso! Por favor, revisa tu correo electrónico/número de teléfono para el código de verificación.</span>
<br>' . $supportString . '';
            } else {
                $response['emailOrPhone'] = 'email';
                $response['message'] = '
    <span class="en">Failed to send verification email.</span>
    <span class="es">No se pudo enviar el correo electrónico de verificación.</span>
    <br>' . $supportString . '
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