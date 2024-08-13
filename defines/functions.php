<?php

session_start();

require 'vendor/autoload.php';
use Twilio\Rest\Client;

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
    } elseif ($type === 'placeholder') {
        $field = ($language === 'english') ? 'englishPlaceholder' : 'spanishPlaceholder';
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

function updateUser($clientID, $firstName, $middleName, $zipCode, $city, $state, $email, $phone, $lastName, $birthday, $birthPlace, $citizenshipCountry, $gender)
{
    global $pdo;

    // Prepare the SQL update statement
    $sql = "
        UPDATE user
        SET firstName = :firstName,
            middleName = :middleName,
            zipCode = :zipCode,
            city = :city,
            state = :state,
            email = :email,
            phone = :phone,
            lastName = :lastName,
            birthday = :birthday,
            birthPlace = :birthPlace,
            citizenshipCountry = :citizenshipCountry,
            gender = :gender
        WHERE UserID = :clientID
    ";

    // try {
    // Prepare the statement
    $stmt = $pdo->prepare($sql);

    // Bind parameters
    $stmt->bindParam(':firstName', $firstName);
    $stmt->bindParam(':middleName', $middleName);
    $stmt->bindParam(':zipCode', $zipCode);
    $stmt->bindParam(':city', $city);
    $stmt->bindParam(':state', $state);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':phone', $phone);
    $stmt->bindParam(':lastName', $lastName);
    $stmt->bindParam(':birthday', $birthday);
    $stmt->bindParam(':birthPlace', $birthPlace);
    $stmt->bindParam(':citizenshipCountry', $citizenshipCountry);
    $stmt->bindParam(':gender', $gender);
    $stmt->bindParam(':clientID', $clientID, PDO::PARAM_INT);

    // Execute the statement
    return $stmt->execute();

    // } catch (PDOException $e) {
    //     throw new Exception('Failed to insert user.');
    // }
}

function getUserByEmail($email, $currentUserID)
{
    global $pdo;

    // Prepare the SQL query to check if the email exists for a different user
    $sql = "
        SELECT *
        FROM user
        WHERE email = :email AND UserID != :currentUserID
    ";

    try {
        // Prepare the statement
        $stmt = $pdo->prepare($sql);

        // Bind parameters
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':currentUserID', $currentUserID, PDO::PARAM_INT);

        // Execute the statement
        $stmt->execute();

        // Fetch the user details if found
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            return $user; // Return user details
        } else {
            return false; // Email is available or does not exist
        }
    } catch (PDOException $e) {
        // Handle error
        echo "Error: " . $e->getMessage();
        return false;
    }
}
function getUserByPhone($phone, $currentUserID)
{
    global $pdo;

    // Prepare the SQL query to check if the email exists for a different user
    $sql = "
        SELECT *
        FROM user
        WHERE phone = :phone AND UserID != :currentUserID
    ";

    try {
        // Prepare the statement
        $stmt = $pdo->prepare($sql);

        // Bind parameters
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':currentUserID', $currentUserID, PDO::PARAM_INT);

        // Execute the statement
        $stmt->execute();

        // Fetch the user details if found
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            return $user; // Return user details
        } else {
            return false; // Email is available or does not exist
        }
    } catch (PDOException $e) {
        // Handle error
        echo "Error: " . $e->getMessage();
        return false;
    }
}


function insertUSAddress(
    $userID,
    $careOfName,
    $street1,
    $street2,
    $homePhone,
    $workPhone,
    $emergencyContact,
    $emergencyPhone,
    $residencyType = null,
    $residency = null
) {
    global $pdo; // Use the PDO connection from db_conn.php

    // Prepare the SQL statement dynamically based on the residency type
    $columns = "UserID, inCareOfName, street1, street2, homePhone, workPhone, emergencyContact, emergencyPhone, createdAt, updatedAt";
    $values = ":userID, :careOfName, :street1, :street2, :homePhone, :workPhone, :emergencyContact, :emergencyPhone, NOW(), NOW()";

    if ($residencyType === 'Floor') {
        $columns = "UserID, inCareOfName, street1, street2, homePhone, workPhone, emergencyContact, emergencyPhone, Floor, createdAt, updatedAt";
        $values = ":userID, :careOfName, :street1, :street2, :homePhone, :workPhone, :emergencyContact, :emergencyPhone, :residency, NOW(), NOW()";
    } elseif ($residencyType === 'Apartment') {
        $columns = "UserID, inCareOfName, street1, street2, homePhone, workPhone, emergencyContact, emergencyPhone, Apartment, createdAt, updatedAt";
        $values = ":userID, :careOfName, :street1, :street2, :homePhone, :workPhone, :emergencyContact, :emergencyPhone, :residency, NOW(), NOW()";
    } elseif ($residencyType === 'Suite') {
        $columns = "UserID, inCareOfName, street1, street2, homePhone, workPhone, emergencyContact, emergencyPhone, Suite, createdAt, updatedAt";
        $values = ":userID, :careOfName, :street1, :street2, :homePhone, :workPhone, :emergencyContact, :emergencyPhone, :residency, NOW(), NOW()";
    }

    $sql = "INSERT INTO `address` ($columns) VALUES ($values)";

    try {
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':userID', $userID);
        $stmt->bindParam(':careOfName', $careOfName);
        $stmt->bindParam(':street1', $street1);
        $stmt->bindParam(':street2', $street2);
        $stmt->bindParam(':homePhone', $homePhone);
        $stmt->bindParam(':workPhone', $workPhone);
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
        // Prepare the INSERT statement without specifying EntryID
        $sql = "
            INSERT INTO us_entry (UserID, dateOfEntry, stateOfEntry, methodOfEntry, anyIllegalDocumentOnEntry, detainedByUSPatrol, updatedAt)
            VALUES (:userID, :dateOfEntry, :stateOfEntry, :methodOfEntry, :anyIllegalDocumentOnEntry, :detainedByUSPatrol, NOW())
        ";

        // Prepare the statement
        $stmt = $pdo->prepare($sql);

        // Bind values
        $stmt->bindParam(':userID', $userID, PDO::PARAM_INT);
        $stmt->bindParam(':dateOfEntry', $dateOfEntry);
        $stmt->bindParam(':stateOfEntry', $stateOfEntry);
        $stmt->bindParam(':methodOfEntry', $methodOfEntry);
        $stmt->bindParam(':anyIllegalDocumentOnEntry', $anyIllegalDocumentOnEntry, PDO::PARAM_BOOL);
        $stmt->bindParam(':detainedByUSPatrol', $detainedByUSPatrol, PDO::PARAM_BOOL);

        // Print the SQL query with the values
        // $query = str_replace(
        //     [':userID', ':dateOfEntry', ':stateOfEntry', ':methodOfEntry', ':anyIllegalDocumentOnEntry', ':detainedByUSPatrol'],
        //     [$userID, "$dateOfEntry", "$stateOfEntry", "$methodOfEntry", "$anyIllegalDocumentOnEntry", "$detainedByUSPatrol"],
        //     $sql
        // );
        // echo "Executing SQL query: " . $query;

        // Execute the prepared statement
        $stmt->execute();

        // Return true on successful insertion
        return true;
    } catch (Exception $e) {
        // Print the error message and query for debugging
        echo "Error inserting entry: " . $e->getMessage() . "\n";
        // echo "SQL Query: " . $query;
        return false;
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
    $capacityToSupport,
    $otherQuestions
) {
    global $pdo; // Use the PDO connection from db_conn.php

    $sql = "INSERT INTO `additional_considerations` (
                `UserID`, `anyCommunicableDisease`, `anyMissingVaccines`, `anyMentalDisorder`, `accusedDrugAddiction`, `accusedChildAbduction`,
                `deportedFromUS`, `citizenshipAfter96`, `electionsVoted`, `capacityToSupport`, `otherQuestions`, `updatedAt`
            ) VALUES (
                :userID, :anyCommunicableDisease, :anyMissingVaccines, :anyMentalDisorder, :accusedDrugAddiction, :accusedChildAbduction,
                :deportedFromUS, :citizenshipAfter96, :electionsVoted, :capacityToSupport, :otherQuestions, NOW()
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
        $stmt->bindParam(':otherQuestions', $otherQuestions);

        return $stmt->execute();
    } catch (PDOException $e) {
        throw new Exception("Error inserting additional recommendation details: " . $e->getMessage());
    }
}

function getSystemDataValue($key)
{
    global $pdo; // Use the PDO instance from the db_conn.php file

    try {
        $sql = "SELECT Value FROM systemdynamicdata WHERE KeyName = :key";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':key', $key);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            return $result['Value'];
        } else {
            return null;
        }
    } catch (PDOException $e) {
        return "Error: " . $e->getMessage();
    }
}

function getClientById($clientId)
{
    global $pdo; // Use the global $pdo object for database connection

    // Prepare the response
    $userDetails = null;

    try {
        // SQL query to fetch client details
        $sql = "SELECT * FROM clients WHERE ClientID = :client_id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':client_id', $clientId, PDO::PARAM_INT);
        $stmt->execute();

        // Fetch the client details
        $userDetails = $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        // Handle the error (for example, log it or display an error message)
        error_log("Error fetching client details: " . $e->getMessage());
    }

    return $userDetails;
}

function sendVerificationCodePhone($phone, $code)
{
    // Your Twilio credentials
    $sid = TWILIO_SID;
    $token = TWILIO_TOKEN;
    $twilio = new Client($sid, $token);

    try {
        // Send the SMS
        $twilio->messages->create(
            $phone, // to
            [
                'from' => '+18722105701',
                'body' => "Your verification code is: $code. The Law Offices of Lic. Suriel."
            ]
        );
        return true;
    } catch (Twilio\Exceptions\RestException $e) {
        return false;
    }
}
function getAllProducts()
{
    global $pdo; // Use the global PDO connection

    // SQL query to fetch all products
    $sql = "SELECT * FROM product WHERE `status` = 'Active' ORDER BY `sequence`";

    try {
        // Prepare and execute the statement
        $stmt = $pdo->prepare($sql);
        $stmt->execute();

        // Fetch all results
        $products = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Return the result
        return $products;
    } catch (PDOException $e) {
        return false;
    }
}

function isEmailOrPhone($input)
{
    // Regular expression for phone number (format: (999) 999-9999 or (999)999-9999)
    $phonePattern = '/^\+?(\d{1,3})?[-.\s]?(\(?\d{1,4}\)?)?[-.\s]?\d{1,4}[-.\s]?\d{1,4}[-.\s]?\d{1,9}$/';

    // Regular expression for email
    $emailPattern = '/^[\w._%+-]+@[\w.-]+\.[a-zA-Z]{2,}$/';

    // Check if the input matches the phone number pattern
    if (preg_match($phonePattern, $input)) {
        return 'phone';
    }

    // Check if the input matches the email pattern
    if (preg_match($emailPattern, $input)) {
        return 'email';
    }

    // If neither pattern matches
    return 'invalid';
}
function isPaymentCleared($clientId)
{
    global $pdo; // Use the global $pdo variable for database connection

    // Validate input
    if (!is_numeric($clientId)) {
        throw new InvalidArgumentException('Invalid ClientID');
    }

    try {
        // $clientId;
        // Prepare SQL query
        $sql = "SELECT PaymentCleared FROM payment WHERE ClientID = :clientId ORDER BY TrxDate DESC";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':clientId', $clientId, PDO::PARAM_INT);
        $stmt->execute();

        // Fetch the result
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        // Check if a record was found
        if (!$result) {
            return 'no-inquiry'; // No record found
        }

        // Check if payment is cleared
        if ($result['PaymentCleared'] == 1) {
            return 'cleared'; // Payment is cleared
        } else {
            return 'not-cleared'; // Payment is not cleared
        }
    } catch (PDOException $e) {
        // Handle exception
        error_log("Error checking payment status: " . $e->getMessage());
        return 'error'; // You may want to return a generic error status
    }
}

function getUserById($clientId)
{
    global $pdo;

    try {
        // Prepare SQL query to fetch user record based on ClientID
        $sql = "SELECT * FROM user WHERE UserID = :client_id ORDER BY UserID DESC Limit 1";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':client_id', $clientId);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            return $user;
        } else {
            return null; // No record found
        }
    } catch (PDOException $e) {
        return null;
    }
}


function getInquiryByClient($clientId)
{
    global $pdo;

    try {
        // Prepare SQL query to fetch user record based on ClientID
        $sql = "SELECT * FROM immigration_inquiry WHERE ClientID = :client_id ORDER BY InquiryId DESC Limit 1";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':client_id', $clientId);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            return $user;
        } else {
            return null; // No record found
        }
    } catch (PDOException $e) {
        return null;
    }
}

function getAddressByUserID($UserID)
{
    global $pdo;

    try {
        // Prepare SQL query to fetch user record based on ClientID
        $sql = "SELECT * FROM `address` WHERE UserID  = :UserID ORDER BY UserID Limit 1";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':UserID', $UserID);
        $stmt->execute();
        $address = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($address) {
            return $address;
        } else {
            return null; // No record found
        }
    } catch (PDOException $e) {
        return null;
    }
}

function getMarriageByUserId($UserID)
{
    global $pdo; // Use the global $pdo instance

    try {
        $sql = "SELECT * FROM marriage WHERE UserID = :UserID";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':UserID', $UserID);
        $stmt->execute();

        $marriageStatus = $stmt->fetchAll();
        return $marriageStatus !== false ? $marriageStatus : null;
    } catch (PDOException $e) {
        // Optionally log the exception or handle it
        return null;
    }
}

function getUsEntriesByUserId($UserID)
{
    global $pdo; // Use the global $pdo instance

    try {
        $sql = "SELECT * FROM us_entry WHERE UserID = :UserID";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':UserID', $UserID);
        $stmt->execute();

        $us_entries = $stmt->fetchAll();
        return $us_entries !== false ? $us_entries : null;
    } catch (PDOException $e) {
        // Optionally log the exception or handle it
        return null;
    }
}

function getUsResidencyProofByUserId($UserID)
{
    global $pdo; // Use the global $pdo instance

    try {
        $sql = "SELECT * FROM residency_documents WHERE UserID = :UserID";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':UserID', $UserID);
        $stmt->execute();

        $residency_documents = $stmt->fetchAll();
        return $residency_documents !== false ? $residency_documents : null;
    } catch (PDOException $e) {
        // Optionally log the exception or handle it
        return null;
    }
}


function getUsEncountersByUserId($UserID)
{
    global $pdo; // Use the global $pdo instance

    try {
        $sql = "SELECT * FROM encounter WHERE UserID = :UserID";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':UserID', $UserID);
        $stmt->execute();

        $us_entries = $stmt->fetchAll();
        return $us_entries !== false ? $us_entries : null;
    } catch (PDOException $e) {
        // Optionally log the exception or handle it
        return null;
    }
}

function getOffspringsByUserId($UserID)
{
    global $pdo; // Use the global $pdo instance

    try {
        $sql = "SELECT * FROM offspring WHERE UserID = :UserID";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':UserID', $UserID);
        $stmt->execute();

        $us_entries = $stmt->fetchAll();
        return $us_entries !== false ? $us_entries : null;
    } catch (PDOException $e) {
        // Optionally log the exception or handle it
        return null;
    }
}

function getEmployerByUserId($UserID)
{
    global $pdo; // Use the global $pdo instance

    try {
        $sql = "SELECT * FROM employer WHERE UserID = :UserID";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':UserID', $UserID);
        $stmt->execute();

        $us_entries = $stmt->fetch(PDO::FETCH_ASSOC);
        return $us_entries !== false ? $us_entries : null;
    } catch (PDOException $e) {
        // Optionally log the exception or handle it
        return null;
    }
}

function getCertificationByUserId($UserID)
{
    global $pdo; // Use the global $pdo instance

    try {
        $sql = "SELECT * FROM certification WHERE UserID = :UserID";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':UserID', $UserID);
        $stmt->execute();

        $us_entries = $stmt->fetch(PDO::FETCH_ASSOC);
        return $us_entries !== false ? $us_entries : null;
    } catch (PDOException $e) {
        // Optionally log the exception or handle it
        return null;
    }
}

function getAdditionalConsiderationsByUserId($UserID)
{
    global $pdo; // Use the global $pdo instance

    try {
        $sql = "SELECT * FROM additional_considerations WHERE UserID = :UserID";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':UserID', $UserID);
        $stmt->execute();

        $us_entries = $stmt->fetch(PDO::FETCH_ASSOC);
        return $us_entries !== false ? $us_entries : null;
    } catch (PDOException $e) {
        // Optionally log the exception or handle it
        return null;
    }
}

function getDocumentsByClientId($clientID)
{
    global $pdo;

    $sql = "
        SELECT d.docname, d.LinktoUSCISdoc
        FROM uscisdocs d
        JOIN clients c ON d.UserID = c.ClientID
        WHERE c.ClientID = :clientID
    ";

    try {
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':clientID', $clientID, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        error_log("Error fetching documents: " . $e->getMessage());
        return [];
    }
}

function insertDocument($userID, $docname, $linkToUSCISdoc)
{
    global $pdo;

    // Prepare the SQL statement
    $sql = "
        INSERT INTO uscisdocs (UserID, docname, LinktoUSCISdoc)
        VALUES (:userID, :docname, :linkToUSCISdoc)
    ";

    try {
        // Prepare the statement
        $stmt = $pdo->prepare($sql);

        // Bind parameters
        $stmt->bindParam(':userID', $userID, PDO::PARAM_INT);
        $stmt->bindParam(':docname', $docname, PDO::PARAM_STR);
        $stmt->bindParam(':linkToUSCISdoc', $linkToUSCISdoc, PDO::PARAM_STR);

        // Execute the statement
        return $stmt->execute();
    } catch (PDOException $e) {
        // Handle exception (e.g., log it or display an error message)
        error_log("Error inserting document: " . $e->getMessage());
        return false;
    }
}

$supportEmail = getSystemDataValue('emailforSupport');
$supportEmailSpanish = getSystemDataValue('emailforSupportEspañol');

function isLoggedIn()
{
    return isset($_SESSION['ClientID']);
}

function isAdmin()
{
    return $_SESSION['status'] == 'admin';
}
if (isset($_GET['lang'])) {
    if ($_GET['lang'] == 'english' || $_GET['lang'] == 'spanish') {
        setLanguage($_GET['lang']);
    }
}