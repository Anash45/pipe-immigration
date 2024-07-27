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
$usaPresenceBeforeJun2024 = $_POST['usaPresenceBeforeJun2024'];
$marriedToUSCitizenBeforeJun2024 = $_POST['marriedToUSCitizenBeforeJun2024'];
$NoMajorIssues = $_POST['NoMajorIssues'];
$continuousPresenceEvidence = $_POST['continuousPresenceEvidence'];
$suitableQualificationOption = $_POST['suitableQualificationOption'];
$paymentMethods = $_POST['payment-methods'];
$totalFee = $_POST['totalFee'];
$payeeNameEmail = $_POST['payeeNameEmail'];
$paymentDate = $_POST['paymentDate'];
$transactionId = $_POST['transactionId'];
$acceptTerms = isset($_POST['acceptTerms']) ? 1 : 0;

try {
    // Begin transaction
    $pdo->beginTransaction();

    // Insert into immigration_inquiry table
    $sql = "INSERT INTO immigration_inquiry (
                ClientID, first_name, last_name, currentStateAndCountry, phoneNumber, whatsappConnected, email, 
                usaPresenceBeforeJun2024, NoMajorIssues, marriedToUSCitizenBeforeJun2024, continuousPresenceEvidence, suitableQualificationOption
            ) VALUES (
                :clientId, :firstName, :lastName, :currentStateAndCountry, :phoneNumber, :whatsappConnected, :email, 
                :usaPresenceBeforeJun2024, :NoMajorIssues, :marriedToUSCitizenBeforeJun2024, :continuousPresenceEvidence, :suitableQualificationOption
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
        ':suitableQualificationOption' => $suitableQualificationOption
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

    // Commit transaction
    $pdo->commit();
    echo json_encode(['status' => 'success', 'message' => '<span class="en">Data submitted successfully</span><span class="es">Datos enviados con éxito</span>']);
} catch (PDOException $e) {
    // Rollback transaction on error
    $pdo->rollBack();
    echo json_encode(['status' => 'error', 'message' => '<span class="en">Error: ' . $e->getMessage() . '</span><span class="es">Error: ' . $e->getMessage() . '</span>']);
}
?>
