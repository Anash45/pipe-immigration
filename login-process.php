<?php
session_start();
require './defines/db_conn.php'; // Include your database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $emailOrPhone = $_POST['email_or_phone'];
    $password = $_POST['password'];


    $response = ['status' => 'error', 'message' => '']; // Initialize response array

    try {
        // Check if the user exists
        $sql = "SELECT UserID, firstName, lastName, password, verified, `status` FROM `user` WHERE email = :email OR phone = :phone";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':email', $emailOrPhone);
        $stmt->bindParam(':phone', $emailOrPhone);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$user) {
            $response['message'] = '<span class="en">User not found!</span><span class="es">Usuario no encontrado.</span>';
            echo json_encode($response);
            exit;
        }

        // Check password
        if (!password_verify($password, $user['password'])) {
            $response['message'] = 'Incorrect password!';
            echo json_encode($response);
            exit;
        }

        // Check if the user is verified
        if (!$user['verified']) {
            $response['type'] = 'not_verified';
            $response['message'] = 'User is not verified!';
            echo json_encode($response);
            exit;
        }

        // Set session variables
        $_SESSION['ClientID'] = $user['UserID'];
        $_SESSION['full_name'] = $user['firstName'].' '.$user['lastName'];
        $_SESSION['status'] = ($user['status'] == 'admin' || $user['status'] == 'manager') ? $user['status'] : 'user';

        $response['status'] = 'success';
        $response['user'] = $_SESSION['status'];
        $response['message'] = 'Login successful!';
        echo json_encode($response);
    } catch (PDOException $e) {
        $response['message'] = "Error: " . $e->getMessage();
        echo json_encode($response);
    }
}
?>