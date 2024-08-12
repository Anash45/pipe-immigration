<?php
// db_conn.php
require './defines/keys.php';

$host = "localhost"; // Change this if your database is hosted on a different server
$user = "imminzio_f4ft"; // Change this to your MySQL username
$pass = "*[FfOr.]_d#]"; // Change this to your MySQL password
$db = "imminzio_test";// Change this to your MySQL database name

// $host = 'localhost';
// $db   = 'u956940883_pipe';
// $user = 'u956940883_pipe';
// $pass = 'V37O$fF7';

// $host = 'localhost';
// $db   = 'pipe-immigration';
// $user = 'root';
// $pass = 'root';


$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int) $e->getCode());
}
?>
