<?php
$host = 'localhost';
$db   = 'test-pipe-immigration';
$user = 'root';
$pass = 'root';

try {
    // Create a new PDO instance
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Begin a transaction
    $pdo->beginTransaction();

    // Step 1: Get the latest UserID and corresponding address details
    $sqlGetLatestAddress = "
        SELECT a.UserID, a.zipCode, a.city, a.state
        FROM address a
        JOIN (
            SELECT UserID, MAX(createdAt) AS LatestDate
            FROM address
            GROUP BY UserID
        ) latest
        ON a.UserID = latest.UserID AND a.createdAt = latest.LatestDate;
    ";

    $stmt = $pdo->query($sqlGetLatestAddress);
    $addresses = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Step 2: Update user table with the retrieved address details
    foreach ($addresses as $address) {
        $sqlUpdateUserTest = "
            UPDATE user
            SET zipCode = :zipCode, city = :city, state = :state
            WHERE UserID = :UserID;
        ";
        $stmt = $pdo->prepare($sqlUpdateUserTest);
        $stmt->execute([
            ':zipCode' => $address['zipCode'],
            ':city' => $address['city'],
            ':state' => $address['state'],
            ':UserID' => $address['UserID']
        ]);
    }

    // Commit the transaction
    $pdo->commit();

    echo "Records updated successfully.";
} catch (PDOException $e) {
    // Rollback the transaction if something goes wrong
    $pdo->rollBack();
    echo "Error: " . $e->getMessage();
}
?>
