<?php
session_start();
require './defines/db_conn.php'; // Include your database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $emailOrPhone = $_POST['email_or_phone'];
    $password = $_POST['password'];

    $response = ['status' => 'error', 'message' => '']; // Initialize response array

    try {
        // Check if the user exists
        $sql = "SELECT ClientID, full_name, password, verified FROM clients WHERE email_or_phone = :email_or_phone";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':email_or_phone', $emailOrPhone);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$user) {
            $response['message'] = 'User not found!';
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
            $response['message'] = 'User is not verified!';
            echo json_encode($response);
            exit;
        }

        // Set session variables
        $_SESSION['ClientID'] = $user['ClientID'];
        $_SESSION['full_name'] = $user['full_name'];

        $response['status'] = 'success';
        $response['message'] = 'Login successful!';
        echo json_encode($response);
    } catch (PDOException $e) {
        $response['message'] = "Error: " . $e->getMessage();
        echo json_encode($response);
    }
}
?>