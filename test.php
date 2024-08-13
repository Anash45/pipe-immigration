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

    // Step 1: Identify the latest records for each ClientID
    $sqlLatestRecords = "
        CREATE TEMPORARY TABLE LatestRecords AS
        SELECT ClientID, MAX(createdAt) AS LatestDate
        FROM user_test
        GROUP BY ClientID;
    ";
    $pdo->exec($sqlLatestRecords);

    // Step 2: Delete all other records
    $sqlDeleteOthers = "
        DELETE u
        FROM user_test u
        LEFT JOIN LatestRecords lr
        ON u.ClientID = lr.ClientID AND u.createdAt = lr.LatestDate
        WHERE lr.ClientID IS NULL;
    ";
    $pdo->exec($sqlDeleteOthers);

    // Drop the temporary table
    $pdo->exec("DROP TEMPORARY TABLE LatestRecords");

    // Commit the transaction
    $pdo->commit();

    echo "Records updated successfully.";
} catch (PDOException $e) {
    // Rollback the transaction if something goes wrong
    $pdo->rollBack();
    echo "Error: " . $e->getMessage();
}
?>
