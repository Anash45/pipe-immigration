<?php

session_start();

function getLanguage()
{
    if (isset($_SESSION['language'])) {
        return $_SESSION['language'];
    } else {
        $_SESSION['language'] = 'english';
        return 'english';
    }
}

function setLanguage($language)
{
    $_SESSION['language'] = $language;
}

function getTranslation($screenName, $sequence, $type)
{
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

function insertUser($clientID, $firstName, $middleName, $lastName, $birthday, $birthPlace, $citizenshipCountry, $gender)
{
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

function insertUSAddress(
    $userID,
    $careOfName,
    $street1,
    $street2,
    $zipCode,
    $city,
    $state,
    $cellPhone,
    $homePhone,
    $workPhone,
    $currentEmail,
    $emergencyContact,
    $emergencyPhone,
    $residencyType = null,
    $residency = null
) {
    global $pdo; // Use the PDO connection from db_conn.php

    // Prepare the SQL statement dynamically based on the residency type
    $columns = "UserID, inCareOfName, street1, street2, zipCode, city, state, cellPhone, homePhone, workPhone, currentEmail, emergencyContact, emergencyPhone, createdAt, updatedAt";
    $values = ":userID, :careOfName, :street1, :street2, :zipCode, :city, :state, :cellPhone, :homePhone, :workPhone, :currentEmail, :emergencyContact, :emergencyPhone, NOW(), NOW()";

    if ($residencyType === 'Floor') {
        $columns = "UserID, inCareOfName, street1, street2, zipCode, city, state, cellPhone, homePhone, workPhone, currentEmail, emergencyContact, emergencyPhone, Floor, createdAt, updatedAt";
        $values = ":userID, :careOfName, :street1, :street2, :zipCode, :city, :state, :cellPhone, :homePhone, :workPhone, :currentEmail, :emergencyContact, :emergencyPhone, :residency, NOW(), NOW()";
    } elseif ($residencyType === 'Apartment') {
        $columns = "UserID, inCareOfName, street1, street2, zipCode, city, state, cellPhone, homePhone, workPhone, currentEmail, emergencyContact, emergencyPhone, Apartment, createdAt, updatedAt";
        $values = ":userID, :careOfName, :street1, :street2, :zipCode, :city, :state, :cellPhone, :homePhone, :workPhone, :currentEmail, :emergencyContact, :emergencyPhone, :residency, NOW(), NOW()";
    } elseif ($residencyType === 'Suite') {
        $columns = "UserID, inCareOfName, street1, street2, zipCode, city, state, cellPhone, homePhone, workPhone, currentEmail, emergencyContact, emergencyPhone, Suite, createdAt, updatedAt";
        $values = ":userID, :careOfName, :street1, :street2, :zipCode, :city, :state, :cellPhone, :homePhone, :workPhone, :currentEmail, :emergencyContact, :emergencyPhone, :residency, NOW(), NOW()";
    }

    $sql = "INSERT INTO `address` ($columns) VALUES ($values)";

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

        // Bind the residency parameter only if the residency type is provided
        if ($residencyType === 'Floor' || $residencyType === 'Apartment' || $residencyType === 'Suite') {
            $stmt->bindParam(':residency', $residency);
        }

        return $stmt->execute();
    } catch (PDOException $e) {
        throw new Exception("Error inserting US address: " . $e->getMessage());
    }
}


function insertCurrentMarriage($userID, $spouseName, $dateOfMarriage, $stateCountryOfMarriage, $spouseBirthday, $proofOfSpouseCitizenship)
{
    global $pdo;

    try {
        $stmt = $pdo->prepare("
            INSERT INTO marriage (UserID, spouseName, dateOfMarriage, stateCountryOfMarriage, spouseBirthday, proofOfSpouseCitizenship)
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

function insertPreviousMarriage($userID, $exSpouseName, $exDateOfMarriage, $exPlaceOfMarriage, $exPlaceOfDivorce, $exDateOfDivorce, $obtainDecreeOfDivorce)
{
    global $pdo; // Assume $pdo is the PDO instance from db_conn.php

    try {
        // Prepare the SQL statement
        $sql = "INSERT INTO marriage (
                    UserID, 
                    spouseName, 
                    dateOfMarriage, 
                    stateCountryOfMarriage, 
                    placeOfDivorce, 
                    dateOfDivorce, 
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
function insertUSEntries($userID, $dateOfEntry, $stateOfEntry, $methodOfEntry, $anyIllegalDocumentOnEntry, $detainedByUSPatrol)
{
    global $pdo;
    try {
        $stmt = $pdo->prepare("
            INSERT INTO us_entry (UserID, dateOfEntry, stateOfEntry, methodOfEntry, anyIllegalDocumentOnEntry, detainedByUSPatrol, updatedAt)
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
function insertEncounters($userID, $dateOfEncounter, $stateCountryOfLegalEncounter, $natureOfLegalIssue, $description)
{
    global $pdo; // Use the PDO connection from db_conn.php

    $sql = "INSERT INTO `encounter` (UserID, DateOfEncounter, StateCountryOfLegalEncounter, NatureOfLegalIssue, `Description`, updatedAt)
            VALUES (:userID, :dateOfEncounter, :stateCountryOfLegalEncounter, :natureOfLegalIssue, :description, NOW())";

    try {
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':userID', $userID);
        $stmt->bindParam(':dateOfEncounter', $dateOfEncounter);
        $stmt->bindParam(':stateCountryOfLegalEncounter', $stateCountryOfLegalEncounter);
        $stmt->bindParam(':natureOfLegalIssue', $natureOfLegalIssue);
        $stmt->bindParam(':description', $description);

        return $stmt->execute();
    } catch (PDOException $e) {
        throw new Exception("Error inserting encounter data: " . $e->getMessage());
    }
}

// Function to insert offspring into the database
function insertOffspring($userID, $fullLegalName, $birthday, $stateCountryOfBirth, $mothersName, $fathersName, $gender, $schoolDetails, $accessToSchoolRecords)
{
    global $pdo; // Use the PDO connection from db_conn.php

    $sql = "INSERT INTO `offspring` (UserID, fullLegalName, birthday, stateCountryOfBirth, mothersName, fathersName, gender, schoolDetails, accessToSchoolRecords, createdAt, updatedAt)
            VALUES (:userID, :fullLegalName, :birthday, :stateCountryOfBirth, :mothersName, :fathersName, :gender, :schoolDetails, :accessToSchoolRecords, NOW(), NOW())";

    try {
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':userID', $userID);
        $stmt->bindParam(':fullLegalName', $fullLegalName);
        $stmt->bindParam(':birthday', $birthday);
        $stmt->bindParam(':stateCountryOfBirth', $stateCountryOfBirth);
        $stmt->bindParam(':mothersName', $mothersName);
        $stmt->bindParam(':fathersName', $fathersName);
        $stmt->bindParam(':gender', $gender);
        $stmt->bindParam(':schoolDetails', $schoolDetails);
        $stmt->bindParam(':accessToSchoolRecords', $accessToSchoolRecords);

        return $stmt->execute();
    } catch (PDOException $e) {
        throw new Exception("Error inserting offspring: " . $e->getMessage());
    }
}

function insertResidencyDocuments($userID, $documentType, $documentDesc)
{
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

// Function to insert employer data into the database
function insertEmployer($userID, $employerName, $employerAddress, $startDate, $jobTitle, $jobLastDate, $jobDescription)
{
    global $pdo;

    $sql = "INSERT INTO `employer` (UserID, employerName, employerAddress, startDate, jobTitle, jobLastDate, jobDescription, createdAt, updatedAt)
            VALUES (:userID, :employerName, :employerAddress, :startDate, :jobTitle, :jobLastDate, :jobDescription, NOW(), NOW())";

    try {
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':userID', $userID);
        $stmt->bindParam(':employerName', $employerName);
        $stmt->bindParam(':employerAddress', $employerAddress);
        $stmt->bindParam(':startDate', $startDate);
        $stmt->bindParam(':jobTitle', $jobTitle);
        $stmt->bindParam(':jobLastDate', $jobLastDate);
        $stmt->bindParam(':jobDescription', $jobDescription);

        return $stmt->execute();
    } catch (PDOException $e) {
        throw new Exception("Error inserting employer data: " . $e->getMessage());
    }
}

function insertCertification($userID, $certificationDegree, $degreeUniversity, $degreeDate, $degreeStateAndCountry)
{
    global $pdo; // Use the PDO connection from db_conn.php

    $sql = "INSERT INTO `certification` (UserID, certificationDegree, degreeUniversity, degreeDate, degreeStateAndCountry, updatedAt)
            VALUES (:userID, :certificationDegree, :degreeUniversity, :degreeDate, :degreeStateAndCountry, NOW())";

    try {
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':userID', $userID);
        $stmt->bindParam(':certificationDegree', $certificationDegree);
        $stmt->bindParam(':degreeUniversity', $degreeUniversity);
        $stmt->bindParam(':degreeDate', $degreeDate);
        $stmt->bindParam(':degreeStateAndCountry', $degreeStateAndCountry);

        return $stmt->execute();
    } catch (PDOException $e) {
        throw new Exception("Error inserting certification: " . $e->getMessage());
    }
}

// Function to insert additional recommendation details into the database
function insertAdditionalRecommendation(
    $userID,
    $anyCommunicableDisease,
    $anyMissingVaccines,
    $anyMentalDisorder,
    $accusedDrugAddiction,
    $accusedChildAbduction,
    $deportedFromUS,
    $citizenshipAfter96,
    $electionsVoted,
    $capacityToSupport
) {
    global $pdo; // Use the PDO connection from db_conn.php

    $sql = "INSERT INTO `additional_considerations` (
                `UserID`, `anyCommunicableDisease`, `anyMissingVaccines`, `anyMentalDisorder`, `accusedDrugAddiction`, `accusedChildAbduction`,
                `deportedFromUS`, `citizenshipAfter96`, `electionsVoted`, `capacityToSupport`, `updatedAt`
            ) VALUES (
                :userID, :anyCommunicableDisease, :anyMissingVaccines, :anyMentalDisorder, :accusedDrugAddiction, :accusedChildAbduction,
                :deportedFromUS, :citizenshipAfter96, :electionsVoted, :capacityToSupport, NOW()
            )";

    try {
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':userID', $userID);
        $stmt->bindParam(':anyCommunicableDisease', $anyCommunicableDisease);
        $stmt->bindParam(':anyMissingVaccines', $anyMissingVaccines);
        $stmt->bindParam(':anyMentalDisorder', $anyMentalDisorder);
        $stmt->bindParam(':accusedDrugAddiction', $accusedDrugAddiction);
        $stmt->bindParam(':accusedChildAbduction', $accusedChildAbduction);
        $stmt->bindParam(':deportedFromUS', $deportedFromUS);
        $stmt->bindParam(':citizenshipAfter96', $citizenshipAfter96);
        $stmt->bindParam(':electionsVoted', $electionsVoted);
        $stmt->bindParam(':capacityToSupport', $capacityToSupport);

        return $stmt->execute();
    } catch (PDOException $e) {
        throw new Exception("Error inserting additional recommendation details: " . $e->getMessage());
    }
}

if (isset($_GET['lang'])) {
    if ($_GET['lang'] == 'english' || $_GET['lang'] == 'spanish') {
        setLanguage($_GET['lang']);
    }
}