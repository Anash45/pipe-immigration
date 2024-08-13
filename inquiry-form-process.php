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
$city = $_POST['city'];
$state = $_POST['state'];
$zipCode = $_POST['zipCode'];
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

    $checkUserByEmail = getUserByEmail($email, $clientId);
    $checkUserByPhone = getUserByPhone($phoneNumber, $clientId);

    if ($checkUserByEmail) {
        $response['status'] = 'error';
        $response['message'] = '<span class="en">E-mail address already exist!</span><span class="es">¡La dirección de correo electrónico ya existe!</span>';
        echo json_encode($response);
        exit;
    }

    if ($checkUserByPhone) {
        $response['status'] = 'error';
        $response['message'] = '<span class="en">Phone number address already exist!</span><span class="es">¡La dirección del número de teléfono ya existe!</span>';
        echo json_encode($response);
        exit;
    }

    $sql = "UPDATE `user` SET `firstName` = :firstName, `lastName` = :lastName, `city` = :city, `state` = :state, `zipCode` = :zipCode, `email` = :email, `phone` = :phone WHERE `UserID` = :UserID";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':firstName' => $firstName,
        ':lastName' => $lastName,
        ':city' => $city,
        ':state' => $state,
        ':zipCode' => $zipCode,
        ':email' => $email,
        ':phone' => $phoneNumber,
        ':UserID' => $clientId,
    ]);

    // Insert into immigration_inquiry table
    $sql = "INSERT INTO immigration_inquiry (
                ClientID, whatsappConnected, 
                usaPresenceBeforeJun2024, NoMajorIssues, marriedToUSCitizenBeforeJun2024, continuousPresenceEvidence, product, otherQuestions
            ) VALUES (
                :clientId, :whatsappConnected, 
                :usaPresenceBeforeJun2024, :NoMajorIssues, :marriedToUSCitizenBeforeJun2024, :continuousPresenceEvidence, :product, :otherQuestions
            )";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':clientId' => $clientId,
        ':whatsappConnected' => $whatsappConnected,
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

    // Commit transaction
    $pdo->commit();
    echo json_encode(['status' => 'success', 'message' => '<span class="en">Data submitted successfully</span><span class="es">Datos enviados con éxito</span>']);
} catch (PDOException $e) {
    // Rollback transaction on error
    $pdo->rollBack();
    echo json_encode(['status' => 'error', 'message' => '<span class="en">Error: ' . $e->getMessage() . '</span><span class="es">Error: ' . $e->getMessage() . '</span>']);
}
?>