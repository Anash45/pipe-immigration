<?php
require './defines/db_conn.php'; // Include your database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullName = trim($_POST['full_name']);
    $emailOrPhone = trim($_POST['email_or_phone']);
    $password = trim($_POST['password']);
    $confirmPassword = trim($_POST['confirm_password']);

    $response = ['status' => 'error', 'message' => '']; // Initialize response array

    // Check if all fields are present
    if (empty($fullName) || empty($emailOrPhone) || empty($password) || empty($confirmPassword)) {
        $response['message'] = 'All fields are required!';
        echo json_encode($response);
        exit;
    }

    // Check if passwords match
    if ($password !== $confirmPassword) {
        $response['message'] = 'Passwords do not match!';
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

        // Insert the new client
        $sql = "INSERT INTO clients (full_name, email_or_phone, password, verified, createdAt, updatedAt) 
                VALUES (:full_name, :email_or_phone, :password, 0, NOW(), NOW())";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':full_name', $fullName);
        $stmt->bindParam(':email_or_phone', $emailOrPhone);
        $stmt->bindParam(':password', $hashedPassword);
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

        // Send verification code via email
        $subject = "Your Verification Code - PIPE Immigration";
        $message = "Your verification code is: " . $verificationCode;
        $headers = "From: PIPE Immigration <no-reply@f4futuretech.com>"; // Set the sender email address

        $isSent = mail($emailOrPhone, $subject, $message, $headers);
        if ($isSent) { // Simulate email sending success
            $response['status'] = 'success';
            $response['email_or_phone'] = $emailOrPhone;
            $response['message'] = 'Registration successful! Please check your email for the verification code.';
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