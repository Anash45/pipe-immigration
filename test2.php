<?php

include './defines/functions.php';

$host = 'localhost';
$db = 'test-pipe-immigration';
$user = 'root';
$pass = 'root';

try {
    // Create a new PDO instance
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Begin a transaction
    $pdo->beginTransaction();

    // Step 1: Get the email_or_phone, password, verified, and status from the clients table
    $sqlGetClientData = "
        SELECT ClientID, first_name, last_name, email_or_phone, password, verified, status
        FROM clients;
    ";

    $stmt = $pdo->query($sqlGetClientData);
    $clients = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($clients as $client) {
        // Determine if the value is an email or phone
        if (isEmailOrPhone($client['email_or_phone']) == 'phone') {
            $columnName = 'phone';
        } elseif (isEmailOrPhone($client['email_or_phone']) == 'email') {
            $columnName = 'email';
        } else {
            continue; // Skip if neither email nor phone
        }

        // Prepare the upsert statement with dynamic column names
        $sqlUpsertUser = "
            INSERT INTO user (ClientID, $columnName, password, firstName, lastName, verified, status)
            VALUES (:ClientID, :email_or_phone, :password,:firstName,:lastName, :verified, :status)
            ON DUPLICATE KEY UPDATE
                $columnName = VALUES($columnName),
                firstName = VALUES(firstName),
                lastName = VALUES(lastName),
                password = VALUES(password),
                verified = VALUES(verified),
                status = VALUES(status);
        ";

        // Prepare the statement
        $stmt = $pdo->prepare($sqlUpsertUser);

        // Execute the upsert
        $stmt->execute([
            ':ClientID' => $client['ClientID'],
            ':email_or_phone' => $client['email_or_phone'],
            ':firstName' => $client['first_name'],
            ':lastName' => $client['last_name'],
            ':password' => $client['password'],
            ':verified' => $client['verified'],
            ':status' => $client['status']
        ]);
    }

    // Commit the transaction
    $pdo->commit();

    echo "Records updated or inserted successfully.";
} catch (PDOException $e) {
    // Rollback the transaction if something goes wrong
    $pdo->rollBack();
    echo "Error: " . $e->getMessage();
}
?>
