<?php
// header('Content-Type: application/json');
require './defines/db_conn.php'; // Ensure this file initializes your $pdo object
require './defines/functions.php'; // Ensure this file initializes your $pdo object


if (isset($_GET['zipCode'])) {
    $zipCode = $_GET['zipCode'];
    $attorney = getAttorneyByZipCode($zipCode);
    echo json_encode($attorney);
} else {
    echo json_encode(null);
}
?>