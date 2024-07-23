<?php

session_start();

function getLanguage() {
    if (isset($_SESSION['language'])) {
        return $_SESSION['language'];
    } else {
        $_SESSION['language'] = 'english';
        return 'english';
    }
}

function setLanguage($language) {
    $_SESSION['language'] = $language;
}

function getTranslation($screenName, $sequence, $type) {
    global $pdo;

    $language = getLanguage(); // Get the current set language

    // Determine the correct field based on language and type
    if ($type === 'label') {
        $field = ($language === 'english') ? 'EnglishLabel' : 'SpanishLabel';
    } elseif ($type === 'help') {
        $field = ($language === 'english') ? 'EnglishHelp' : 'SpanishHelp';
    } else {
        return "Invalid type specified.";
    }

    // Prepare the SQL query
    $sql = "SELECT $field FROM screen WHERE ScreenName = :screenName AND Sequence = :sequence LIMIT 1";

    try {
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':screenName' => $screenName,
            ':sequence' => $sequence
        ]);

        $result = $stmt->fetch();

        if ($result) {
            return $result[$field];
        } else {
            return "Null";
        }
    } catch (PDOException $e) {
        return "Error: " . $e->getMessage();
    }
}

function insertUser($clientID, $firstName, $middleName, $lastName, $birthday, $birthPlace, $citizenshipCountry, $gender) {
    global $pdo;

    $sql = "INSERT INTO user (ClientID, firstName, middleName, lastName, birthday, birthPlace, citizenshipCountry, gender, createdAt, updatedAt)
            VALUES (:clientID, :firstName, :middleName, :lastName, :birthday, :birthPlace, :citizenshipCountry, :gender, NOW(), NOW())";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':clientID', $clientID, PDO::PARAM_INT);
    $stmt->bindParam(':firstName', $firstName, PDO::PARAM_STR);
    $stmt->bindParam(':middleName', $middleName, PDO::PARAM_STR);
    $stmt->bindParam(':lastName', $lastName, PDO::PARAM_STR);
    $stmt->bindParam(':birthday', $birthday, PDO::PARAM_STR);
    $stmt->bindParam(':birthPlace', $birthPlace, PDO::PARAM_STR);
    $stmt->bindParam(':citizenshipCountry', $citizenshipCountry, PDO::PARAM_STR);
    $stmt->bindParam(':gender', $gender, PDO::PARAM_STR);

    if ($stmt->execute()) {
        return $pdo->lastInsertId();
    } else {
        throw new Exception('Failed to insert user.');
    }
}

function insertUSAddress($userID, $careOfName, $street1, $street2, $zipCode, $city, $state, $cellPhone, $homePhone, $workPhone, $currentEmail, $emergencyContact, $emergencyPhone, $residency) {
    global $pdo; // Use the PDO connection from db_conn.php

    $sql = "INSERT INTO us_address (UserID, careOfName, street1, street2, zipCode, city, state, cellPhone, homePhone, workPhone, currentEmail, emergencyContact, emergencyPhone, residency, createdAt, updatedAt)
            VALUES (:userID, :careOfName, :street1, :street2, :zipCode, :city, :state, :cellPhone, :homePhone, :workPhone, :currentEmail, :emergencyContact, :emergencyPhone, :residency, NOW(), NOW())";

    try {
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':userID', $userID);
        $stmt->bindParam(':careOfName', $careOfName);
        $stmt->bindParam(':street1', $street1);
        $stmt->bindParam(':street2', $street2);
        $stmt->bindParam(':zipCode', $zipCode);
        $stmt->bindParam(':city', $city);
        $stmt->bindParam(':state', $state);
        $stmt->bindParam(':cellPhone', $cellPhone);
        $stmt->bindParam(':homePhone', $homePhone);
        $stmt->bindParam(':workPhone', $workPhone);
        $stmt->bindParam(':currentEmail', $currentEmail);
        $stmt->bindParam(':emergencyContact', $emergencyContact);
        $stmt->bindParam(':emergencyPhone', $emergencyPhone);
        $stmt->bindParam(':residency', $residency);

        return $stmt->execute();
    } catch (PDOException $e) {
        throw new Exception("Error inserting US address: " . $e->getMessage());
    }
}

function insertCurrentMarriage($userID, $spouseName, $dateOfMarriage, $stateCountryOfMarriage, $spouseBirthday, $proofOfSpouseCitizenship) {
    global $pdo;

    try {
        $stmt = $pdo->prepare("
            INSERT INTO current_marriage (UserID, spouseName, dateOfMarriage, stateCountryOfMarriage, spouseBirthday, proofOfSpouseCitizenship)
            VALUES (:userID, :spouseName, :dateOfMarriage, :stateCountryOfMarriage, :spouseBirthday, :proofOfSpouseCitizenship)
        ");

        // Bind parameters
        $stmt->bindParam(':userID', $userID, PDO::PARAM_INT);
        $stmt->bindParam(':spouseName', $spouseName, PDO::PARAM_STR);
        $stmt->bindParam(':dateOfMarriage', $dateOfMarriage);
        $stmt->bindParam(':stateCountryOfMarriage', $stateCountryOfMarriage, PDO::PARAM_STR);
        $stmt->bindParam(':spouseBirthday', $spouseBirthday);
        $stmt->bindParam(':proofOfSpouseCitizenship', $proofOfSpouseCitizenship, PDO::PARAM_STR);

        // Execute statement
        $stmt->execute();

        // Return the last inserted ID
        return $pdo->lastInsertId();
    } catch (PDOException $e) {
        throw new Exception("Error inserting current marriage: " . $e->getMessage());
    }
}

function insertPreviousMarriage($userID, $exSpouseName, $exDateOfMarriage, $exPlaceOfMarriage, $exPlaceOfDivorce, $exDateOfDivorce, $obtainDecreeOfDivorce) {
    global $pdo; // Assume $pdo is the PDO instance from db_conn.php

    try {
        // Prepare the SQL statement
        $sql = "INSERT INTO previous_marriage (
                    UserID, 
                    exSpouseName, 
                    exDateOfMarriage, 
                    exPlaceOfMarriage, 
                    exPlaceOfDivorce, 
                    exDateOfDivorce, 
                    obtainDecreeOfDivorce, 
                    updatedAt
                ) VALUES (
                    :userID, 
                    :exSpouseName, 
                    :exDateOfMarriage, 
                    :exPlaceOfMarriage, 
                    :exPlaceOfDivorce, 
                    :exDateOfDivorce, 
                    :obtainDecreeOfDivorce, 
                    NOW()
                )";

        // Prepare the statement
        $stmt = $pdo->prepare($sql);

        // Bind parameters
        $stmt->bindParam(':userID', $userID, PDO::PARAM_INT);
        $stmt->bindParam(':exSpouseName', $exSpouseName, PDO::PARAM_STR);
        $stmt->bindParam(':exDateOfMarriage', $exDateOfMarriage, PDO::PARAM_STR);
        $stmt->bindParam(':exPlaceOfMarriage', $exPlaceOfMarriage, PDO::PARAM_STR);
        $stmt->bindParam(':exPlaceOfDivorce', $exPlaceOfDivorce, PDO::PARAM_STR);
        $stmt->bindParam(':exDateOfDivorce', $exDateOfDivorce, PDO::PARAM_STR);
        $stmt->bindParam(':obtainDecreeOfDivorce', $obtainDecreeOfDivorce, PDO::PARAM_STR);

        // Execute the statement
        $stmt->execute();

        // Return the ID of the inserted row
        return $pdo->lastInsertId();
    } catch (PDOException $e) {
        // Handle exception
        throw new Exception("Error inserting previous marriage: " . $e->getMessage());
    }
}

// Function to insert a single US entry
function insertUSEntries($userID, $dateOfEntry, $stateOfEntry, $methodOfEntry, $anyIllegalDocumentOnEntry, $detainedByUSPatrol) {
    global $pdo;
    try {
        $stmt = $pdo->prepare("
            INSERT INTO us_entries (UserID, dateOfEntry, stateOfEntry, methodOfEntry, anyIllegalDocumentOnEntry, detainedByUSPatrol, updatedAt)
            VALUES (:userID, :dateOfEntry, :stateOfEntry, :methodOfEntry, :anyIllegalDocumentOnEntry, :detainedByUSPatrol, NOW())
        ");

        $stmt->execute([
            ':userID' => $userID,
            ':dateOfEntry' => $dateOfEntry,
            ':stateOfEntry' => $stateOfEntry,
            ':methodOfEntry' => $methodOfEntry,
            ':anyIllegalDocumentOnEntry' => $anyIllegalDocumentOnEntry,
            ':detainedByUSPatrol' => $detainedByUSPatrol
        ]);

        // echo json_encode(222);
        return true; // Return true on successful insertion
    } catch (Exception $e) {
        // echo json_encode(21);
        throw new Exception("Error inserting entry: " . $e->getMessage()); // Return false on failure
    }
}

function insertResidencyDocuments($userID, $documentType, $documentDesc) {
    global $pdo; // Assuming you have a PDO instance in the global scope

    // Begin transaction
    $pdo->beginTransaction();

    try {
        // Prepare the SQL statement
        $stmt = $pdo->prepare("
            INSERT INTO residency_documents (UserID, DocumentType, DocumentDescription, updatedAt)
            VALUES (:userID, :documentType, :documentDescription, NOW())
        ");

        // Loop through each document type and description
        // Bind parameters and execute the statement
        $stmt->bindParam(':userID', $userID, PDO::PARAM_INT);
        $stmt->bindParam(':documentType', $documentType, PDO::PARAM_STR);
        $stmt->bindParam(':documentDescription', $documentDesc, PDO::PARAM_STR);
        $stmt->execute();

        // Commit the transaction
        $pdo->commit();

        return true; // Success
    } catch (Exception $e) {
        // Rollback the transaction in case of error
        $pdo->rollBack();
        error_log('Error inserting residency documents: ' . $e->getMessage());
        return false; // Failure
    }
}

if(isset($_GET['lang'])){
    if($_GET['lang'] == 'english' || $_GET['lang'] == 'spanish'){
        setLanguage($_GET['lang']);
    }
}