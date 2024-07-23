<?php
require '../defines/db_conn.php';
require '../defines/functions.php';

// header('Content-Type: application/json');

$response = ['type' => 'error', 'message' => ''];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data for user
    $firstName = $_POST['firstName'] ?? '';
    $middleName = $_POST['middleName'] ?? '';
    $lastName = $_POST['lastName'] ?? '';
    $birthday = date('Y-m-d', strtotime($_POST['birthday'])) ?? '';
    $birthPlace = $_POST['birthPlace'] ?? '';
    $citizenshipCountry = $_POST['citizenshipCountry'] ?? '';
    $gender = $_POST['gender'] ?? '';
    $clientID = 3;

    // Retrieve form data for US Address
    $careOfName = $_POST['careOfName'] ?? '';
    $street1 = $_POST['street1'] ?? '';
    $street2 = $_POST['street2'] ?? '';
    $zipCode = $_POST['zipCode'] ?? '';
    $city = $_POST['city'] ?? '';
    $state = $_POST['state'] ?? '';
    $cellPhone = $_POST['cellPhone'] ?? '';
    $homePhone = $_POST['homePhone'] ?? '';
    $workPhone = $_POST['workPhone'] ?? '';
    $currentEmail = $_POST['currentEmail'] ?? '';
    $emergencyContact = $_POST['emergencyContact'] ?? '';
    $emergencyPhone = $_POST['emergencyPhone'] ?? '';
    $residency = isset($_POST['residency']) ? implode(',', $_POST['residency']) : ''; // Convert array to comma-separated string

    // Retrieve form data for current marriage
    $spouseName = $_POST['spouseName'] ?? '';
    $dateOfMarriage = date('Y-m-d', strtotime($_POST['dateOfMarriage'])) ?? '';
    $stateCountryOfMarriage = $_POST['stateCountryOfMarriage'] ?? '';
    $spouseBirthday = date('Y-m-d', strtotime($_POST['spouseBirthday'])) ?? '';
    $proofOfSpouseCitizenship = $_POST['proofOfSpouseCitizenship'] ?? '';

    // Retrieve form data for previous marriage
    $exSpouseName = $_POST['exSpouseName'] ?? '';
    $exDateOfMarriage = date('Y-m-d', strtotime($_POST['exDateOfMarriage'])) ?? '';
    $exPlaceOfMarriage = $_POST['exPlaceOfMarriage'] ?? '';
    $exPlaceOfDivorce = $_POST['exPlaceOfDivorce'] ?? '';
    $exDateOfDivorce = date('Y-m-d', strtotime($_POST['exDateOfDivorce'])) ?? '';
    $obtainDecreeOfDivorce = $_POST['obtainDecreeOfDivorce'] ?? 'No';

    // Retrieve US entries
    $dateOfEntry = $_POST['dateOfEntry'] ?? [];
    $stateOfEntry = $_POST['stateOfEntry'] ?? [];
    $methodOfEntry = $_POST['methodOfEntry'] ?? [];
    $anyIllegalDocumentOnEntry = $_POST['anyIllegalDocumentOnEntry'] ?? [];
    $detainedByUSPatrol = $_POST['detainedByUSPatrol'] ?? [];
    
    // Retrieve Residency documents
    $documentType = $_POST['documentType'] ?? [];
    $documentDesc = $_POST['documentDesc'] ?? [];

    // Response array
    $response = ['type'=> 'error', 'message' => ''];

    // Call the insertUser function
    try {
        $userID = insertUser($clientID, $firstName, $middleName, $lastName, $birthday, $birthPlace, $citizenshipCountry, $gender);

        if ($userID) {
            // Insert US Address
            $usAddressInserted = insertUSAddress($userID, $careOfName, $street1, $street2, $zipCode, $city, $state, $cellPhone, $homePhone, $workPhone, $currentEmail, $emergencyContact, $emergencyPhone, $residency);

            if ($usAddressInserted) {
                $response['type'] = 'success';
                $response['message'] .= '<span class="en">User and address successfully created.</span><span class="es">Usuario y dirección creados con éxito.</span>';
                $response['userID'] = $userID;
            } else {
                $response['type'] = 'error';
                $response['message'] .= '<span class="en">Failed to create address.</span><span class="es">No se pudo crear la dirección.</span>';
            }

            // Insert current marriage
            if ($marriageID = insertCurrentMarriage($userID, $spouseName, $dateOfMarriage, $stateCountryOfMarriage, $spouseBirthday, $proofOfSpouseCitizenship)) {
                $response['type'] = 'success';
                $response['message'] .= '<span class="en">Current marriage information successfully saved.</span><span class="es">Información de matrimonio actual guardada con éxito.</span>';
                $response['marriageID'] = $marriageID;
            } else {
                $response['type'] = 'error';
                $response['message'] .= '<span class="en">Failed to save current marriage information.</span><span class="es">No se pudo guardar la información del matrimonio actual.</span>';
            }

            // Insert previous marriage if exSpouseName is not empty
            if (!empty($exSpouseName)) {
                if ($previousMarriageID = insertPreviousMarriage($userID, $exSpouseName, $exDateOfMarriage, $exPlaceOfMarriage, $exPlaceOfDivorce, $exDateOfDivorce, $obtainDecreeOfDivorce)) {
                    $response['type'] = 'success';
                    $response['message'] .= '<span class="en">Previous marriage information successfully saved.</span><span class="es">Información de matrimonio anterior guardada con éxito.</span>';
                    $response['previousMarriageID'] = $previousMarriageID;
                } else {
                    $response['type'] = 'error';
                    $response['message'] .= '<span class="en">Failed to save previous marriage information.</span><span class="es">No se pudo guardar la información del matrimonio anterior.</span>';
                }
            }

            foreach ($dateOfEntry as $key => $value) {
                $stateOfEntryValue = $stateOfEntry[$key] ?? '';
                $methodOfEntryValue = $methodOfEntry[$key] ?? '';
                $anyIllegalDocumentOnEntryValue = $anyIllegalDocumentOnEntry[$key] ?? '';
                $detainedByUSPatrolValue = $detainedByUSPatrol[$key] ?? '';

                if($value !== '' && $stateOfEntryValue !== '' && $methodOfEntryValue !== ''){
                    $entryDate = date('Y-m-d', strtotime($value));
                    if (insertUSEntries($userID, $entryDate, $stateOfEntryValue, $methodOfEntryValue, $anyIllegalDocumentOnEntryValue, $detainedByUSPatrolValue)) {
                        $response['type'] = 'success';
                        $response['message'] .= '<span class="en">US entry successfully saved.</span><span class="es">Entrada al EE.UU. guardada con éxito.</span>';
                    } else {
                        $response['type'] = 'error';
                        $response['message'] .= '<span class="en">Failed to save US entry.</span><span class="es">No se pudo guardar la entrada al EE.UU.</span>';
                    }
                }
            }
            // echo json_encode($_REQUEST['documentType']);
            
            // echo json_encode($_REQUEST['documentDesc']);
            foreach ($documentType as $key => $value) {
                $documentDescValue = $documentDesc[$key] ?? '';

                if($value !== '' && $documentDescValue !== ''){
                    if (insertResidencyDocuments($userID, $value, $documentDescValue)) {
                        $response['type'] = 'success';
                        $response['message'] .= '<span class="en">Residency documents successfully saved.</span><span class="es">Documentos de residencia guardados con éxito.</span>';
                    } else {
                        $response['type'] = 'error';
                        $response['message'] .= '<span class="en">Failed to save residency documents.</span><span class="es">No se pudieron guardar los documentos de residencia.</span>';
                    }
                }
            }
            
            $response['type'] = 'success';
            $response['message'] .= '<span class="en">User successfully saved.</span><span class="es">Usuario guardada con éxito.</span>';
        } else {
            $response['type'] = 'error';
            $response['message'] = '<span class="en">Failed to create user.</span><span class="es">No se pudo crear el usuario.</span>';
        }
    } catch (Exception $e) {
        $response['type'] = 'error';
        $response['message'] = '<span class="en">An error occurred: ' . $e->getMessage() . '</span><span class="es">Ocurrió un error: ' . $e->getMessage() . '</span>';
    }
} else {
    $response['type'] = 'error';
    $response['message'] = '<span class="en">Invalid request method.</span><span class="es">Método de solicitud no válido.</span>';
}

echo json_encode($response);
