<?php
// Database connection
require './defines/db_conn.php'; // Adjust the path to your DB connection file
require './defines/functions.php';


// Check if user is logged in
if (!isLoggedIn()) {
    echo json_encode(['status' => 'error', 'message' => '<span class="en">User not logged in</span><span class="es">Usuario no conectado</span>']);
    exit;
}

// Retrieve ClientID from session
$clientId = $_SESSION['ClientID'];

// Retrieve POST data
$firstName = $_POST['first_name'];
$lastName = $_POST['last_name'];
$currentStateAndCountry = $_POST['currentStateAndCountry'];
$phoneNumber = $_POST['phoneNumber'];
$whatsappConnected = isset($_POST['whatsappConnected']) ? 1 : 0;
$email = $_POST['email'];
$usaPresenceBeforeJun2024 = $_POST['usaPresenceBeforeJun2024'] ?? 'no';
$marriedToUSCitizenBeforeJun2024 = $_POST['marriedToUSCitizenBeforeJun2024'] ?? 'no';
$NoMajorIssues = $_POST['NoMajorIssues'] ?? 'no';
$continuousPresenceEvidence = $_POST['continuousPresenceEvidence'] ?? 'no';
$product = $_POST['product'];
$paymentMethods = $_POST['payment-methods'];
$totalFee = $_POST['totalFee'];
$payeeNameEmail = $_POST['payeeNameEmail'];
$paymentDate = ($_POST['paymentDate'] != '') ? $_POST['paymentDate'] : date('Y-m-d');
$transactionId = $_POST['transactionId'];
$otherQuestions = $_POST['otherQuestions'];
$acceptTerms = isset($_POST['acceptTerms']) ? 1 : 0;

try {
    // Begin transaction
    $pdo->beginTransaction();

    // Insert into immigration_inquiry table
    $sql = "INSERT INTO immigration_inquiry (
                ClientID, first_name, last_name, currentStateAndCountry, phoneNumber, whatsappConnected, email, 
                usaPresenceBeforeJun2024, NoMajorIssues, marriedToUSCitizenBeforeJun2024, continuousPresenceEvidence, product, otherQuestions
            ) VALUES (
                :clientId, :firstName, :lastName, :currentStateAndCountry, :phoneNumber, :whatsappConnected, :email, 
                :usaPresenceBeforeJun2024, :NoMajorIssues, :marriedToUSCitizenBeforeJun2024, :continuousPresenceEvidence, :product, :otherQuestions
            )";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':clientId' => $clientId,
        ':firstName' => $firstName,
        ':lastName' => $lastName,
        ':currentStateAndCountry' => $currentStateAndCountry,
        ':phoneNumber' => $phoneNumber,
        ':whatsappConnected' => $whatsappConnected,
        ':email' => $email,
        ':usaPresenceBeforeJun2024' => $usaPresenceBeforeJun2024,
        ':marriedToUSCitizenBeforeJun2024' => $marriedToUSCitizenBeforeJun2024,
        ':NoMajorIssues' => $NoMajorIssues,
        ':continuousPresenceEvidence' => $continuousPresenceEvidence,
        ':product' => $product,
        ':otherQuestions' => $otherQuestions
    ]);

    // Insert into payment table
    $sql = "INSERT INTO payment (
                ClientID, TrxDate, PaymentGateway, PaymentCleared, TrxID, TrxStatus, Amount, Currency, Updated
            ) VALUES (
                :clientId, :paymentDate, :paymentMethods, 1, :transactionId, 0, :totalFee, 'USD', NOW()
            )";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':clientId' => $clientId,
        ':paymentDate' => $paymentDate,
        ':paymentMethods' => $paymentMethods,
        ':transactionId' => $transactionId,
        ':totalFee' => $totalFee
    ]);

    $sql2 = "UPDATE clients SET `first_name` = :first_name, `last_name` = :last_name WHERE `ClientID` = :client_id";
    $stmt = $pdo->prepare($sql2);
    $stmt->execute([
        ':first_name' => $firstName,
        ':last_name' => $lastName,
        ':client_id' => $clientId
    ]);

    // Commit transaction
    $pdo->commit();
    echo json_encode(['status' => 'success', 'message' => '<span class="en">Data submitted successfully</span><span class="es">Datos enviados con éxito</span>']);
} catch (PDOException $e) {
    // Rollback transaction on error
    $pdo->rollBack();
    echo json_encode(['status' => 'error', 'message' => '<span class="en">Error: ' . $e->getMessage() . '</span><span class="es">Error: ' . $e->getMessage() . '</span>']);
}
?>
