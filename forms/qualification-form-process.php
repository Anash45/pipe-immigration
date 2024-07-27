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
    $clientID = $_SESSION['CliendID'];

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
    $residencyType = $_POST['residencyType'] ?? '';
    $residency = $_POST['residency'] ?? '';

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

    $dateOfEncounter = $_POST['dateOfEncounter'] ?? [];
    $stateCountryOfLegalEncounter = $_POST['stateCountryOfLegalEncounter'] ?? [];
    $natureOfLegalIssue = $_POST['natureOfLegalIssue'] ?? [];
    $issueDescription = $_POST['issueDescription'] ?? [];

    // Retrieve Residency documents
    $documentType = $_POST['documentType'] ?? [];
    $documentDesc = $_POST['documentDesc'] ?? [];

    $child_fullLegalNames = $_POST['childFullLegalName'] ?? [];
    $child_birthdays = $_POST['childBirthday'] ?? [];
    $child_stateCountryOfBirths = $_POST['childStateCountryOfBirth'] ?? [];
    $child_mothersNames = $_POST['childMothersName'] ?? [];
    $child_fathersNames = $_POST['childFathersName'] ?? [];
    $child_genders = $_POST['childGender'] ?? [];
    $child_schoolDetails = $_POST['childSchoolDetails'] ?? [];
    $child_accessToSchoolRecords = $_POST['childAccessToSchoolRecords'] ?? [];

    // Retrieve form data for employers
    $employerNames = $_POST['employerName'] ?? [];
    $employerAddresses = $_POST['employerAddress'] ?? [];
    $startDates = $_POST['startDate'] ?? [];
    $jobTitles = $_POST['jobTitle'] ?? [];
    $jobLastDates = $_POST['jobLastDate'] ?? [];
    $jobDescriptions = $_POST['jobDescription'] ?? [];

    // Retrieve form data for certification
    $certificationDegree = $_POST['certificationDegree'] ?? '';
    $degreeUniversity = $_POST['degreeUniversity'] ?? '';
    $degreeDate = isset($_POST['degreeDate']) ? date('Y-m-d', strtotime($_POST['degreeDate'])) : '';
    $degreeStateAndCountry = $_POST['degreeStateAndCountry'] ?? '';

    $anyCommunicableDisease = $_POST['anyCommunicableDisease'] ?? '';
    $anyMissingVaccines = $_POST['anyMissingVaccines'] ?? '';
    $anyMentalDisorder = $_POST['anyMentalDisorder'] ?? '';
    $accusedDrugAddiction = $_POST['accusedDrugAddiction'] ?? '';
    $accusedChildAbduction = $_POST['accusedChildAbduction'] ?? '';
    $deportedFromUS = $_POST['deportedFromUS'] ?? '';
    $citizenshipAfter96 = $_POST['citizenshipAfter96'] ?? '';
    $electionsVoted = $_POST['electionsVoted'] ?? '';
    $capacityToSupport = $_POST['capacityToSupport'] ?? '';


    // Response array
    $response = ['type' => 'error', 'message' => ''];

    // Call the insertUser function
    try {
        $userID = insertUser($clientID, $firstName, $middleName, $lastName, $birthday, $birthPlace, $citizenshipCountry, $gender);

        if ($userID) {
            // Insert US Address
            $usAddressInserted = insertUSAddress($userID, $careOfName, $street1, $street2, $zipCode, $city, $state, $cellPhone, $homePhone, $workPhone, $currentEmail, $emergencyContact, $emergencyPhone, $residencyType, $residency);

            if ($usAddressInserted) {
                $response['type'] = 'success';
                $response['message'] = '<span class="en">User and address successfully created.</span><span class="es">Usuario y dirección creados con éxito.</span>';
                $response['userID'] = $userID;
            } else {
                $response['type'] = 'error';
                $response['message'] = '<span class="en">Failed to create address.</span><span class="es">No se pudo crear la dirección.</span>';
            }

            // Insert current marriage
            if ($marriageID = insertCurrentMarriage($userID, $spouseName, $dateOfMarriage, $stateCountryOfMarriage, $spouseBirthday, $proofOfSpouseCitizenship)) {
                $response['type'] = 'success';
                $response['message'] = '<span class="en">Current marriage information successfully saved.</span><span class="es">Información de matrimonio actual guardada con éxito.</span>';
                $response['marriageID'] = $marriageID;
            } else {
                $response['type'] = 'error';
                $response['message'] = '<span class="en">Failed to save current marriage information.</span><span class="es">No se pudo guardar la información del matrimonio actual.</span>';
            }

            // Insert previous marriage if exSpouseName is not empty
            if (!empty($exSpouseName)) {
                if ($previousMarriageID = insertPreviousMarriage($userID, $exSpouseName, $exDateOfMarriage, $exPlaceOfMarriage, $exPlaceOfDivorce, $exDateOfDivorce, $obtainDecreeOfDivorce)) {
                    $response['type'] = 'success';
                    $response['message'] = '<span class="en">Previous marriage information successfully saved.</span><span class="es">Información de matrimonio anterior guardada con éxito.</span>';
                    $response['previousMarriageID'] = $previousMarriageID;
                } else {
                    $response['type'] = 'error';
                    $response['message'] = '<span class="en">Failed to save previous marriage information.</span><span class="es">No se pudo guardar la información del matrimonio anterior.</span>';
                }
            }

            foreach ($dateOfEntry as $key => $value) {
                $stateOfEntryValue = $stateOfEntry[$key] ?? '';
                $methodOfEntryValue = $methodOfEntry[$key] ?? '';
                $anyIllegalDocumentOnEntryValue = $anyIllegalDocumentOnEntry[$key] ?? '';
                $detainedByUSPatrolValue = $detainedByUSPatrol[$key] ?? '';

                if ($value !== '' && $stateOfEntryValue !== '' && $methodOfEntryValue !== '') {
                    $entryDate = date('Y-m-d', strtotime($value));
                    if (insertUSEntries($userID, $entryDate, $stateOfEntryValue, $methodOfEntryValue, $anyIllegalDocumentOnEntryValue, $detainedByUSPatrolValue)) {
                        $response['type'] = 'success';
                        $response['message'] = '<span class="en">US entry successfully saved.</span><span class="es">Entrada al EE.UU. guardada con éxito.</span>';
                    } else {
                        $response['type'] = 'error';
                        $response['message'] = '<span class="en">Failed to save US entry.</span><span class="es">No se pudo guardar la entrada al EE.UU.</span>';
                    }
                }
            }
            // echo json_encode($_REQUEST['documentType']);

            // echo json_encode($_REQUEST['documentDesc']);
            foreach ($documentType as $key => $value) {
                $documentDescValue = $documentDesc[$key] ?? '';

                if ($value !== '' && $documentDescValue !== '') {
                    if (insertResidencyDocuments($userID, $value, $documentDescValue)) {
                        $response['type'] = 'success';
                        $response['message'] = '<span class="en">Residency documents successfully saved.</span><span class="es">Documentos de residencia guardados con éxito.</span>';
                    } else {
                        $response['type'] = 'error';
                        $response['message'] = '<span class="en">Failed to save residency documents.</span><span class="es">No se pudieron guardar los documentos de residencia.</span>';
                    }
                }
            }

            $insertedEntries = 0;
            $totalEntries = count($dateOfEncounter);
            // Loop through each entry and validate
            foreach ($dateOfEncounter as $key => $date) {
                $state = $stateCountryOfLegalEncounter[$key] ?? '';
                $issue = $natureOfLegalIssue[$key] ?? '';
                $desc = $issueDescription[$key] ?? '';

                if (!empty($date) && !empty($state)) {
                    $date = date('Y-m-d', strtotime($date));
                    try {
                        if (insertEncounters($userID, $date, $state, $issue, $desc)) {
                            $insertedEntries++;
                        }
                    } catch (Exception $e) {
                        // Handle exception if needed
                        $response['message'] = '<span class="en">Error inserting encounter data: ' . $e->getMessage() . '</span><span class="es">Error al insertar los datos del encuentro: ' . $e->getMessage() . '</span>';
                        echo json_encode($response);
                        exit;
                    }
                }
            }

            if ($insertedEntries > 0) {
                $response['message'] = '<span class="en">Legal encounters successfully inserted!</span><span class="es">¡Encuentros legales insertados con éxito!</span>';
            } else {
                $response['message'] = '<span class="en">No valid legal encounter data to insert.</span><span class="es">No hay datos de encuentros legales válidos para insertar.</span>';
            }

            // Initialize success flag
            $allInserted = true;

            // echo json_encode($child_fullLegalNames);
            // Loop through each entry
            foreach ($child_fullLegalNames as $index => $fullLegalName) {
                // Retrieve each field value for the current index
                $birthday = date('Y-m-d', strtotime($child_birthdays[$index])) ?? '';
                $stateCountryOfBirth = $child_stateCountryOfBirths[$index] ?? '';
                $motherName = $child_mothersNames[$index] ?? '';
                $fatherName = $child_fathersNames[$index] ?? '';
                $gender = $child_genders[$index] ?? '';
                $schoolDetail = $child_schoolDetails[$index] ?? '';
                $schoolRecordAccess = $child_accessToSchoolRecords[$index] ?? 'No';

                // Check if required fields are filled
                if ($fullLegalName !== '' && $birthday !== '' && $stateCountryOfBirth !== '' && $motherName !== '' && $fatherName !== '' && $gender !== '') {
                    // Insert offspring
                    $inserted = insertOffspring($userID, $fullLegalName, $birthday, $stateCountryOfBirth, $motherName, $fatherName, $gender, $schoolDetail, $schoolRecordAccess);

                    if (!$inserted) {
                        $allInserted = false;
                        break; // Stop processing if any insertion fails
                    }
                } else {
                    $response['message'] = '<span class="en">All required fields must be filled for each entry.</span><span class="es">Todos los campos requeridos deben ser completados para cada entrada.</span>';
                    $allInserted = false;
                    break; // Stop processing if any required fields are missing
                }
            }

            if ($allInserted) {
                $response['type'] = 'success';
                $response['message'] = '<span class="en">Offspring data successfully inserted.</span><span class="es">Datos del hijo insertados con éxito.</span>';
            } else {
                $response['type'] = 'error';
                $response['message'] = '<span class="en">Failed to insert some offspring data.</span><span class="es">No se pudieron insertar algunos datos del hijo.</span>';
            }

            $jobSuccess = false;

            foreach ($employerNames as $key => $employerName) {
                $employerAddress = $employerAddresses[$key] ?? '';
                $startDate = date('Y-m-d', strtotime($startDates[$key] ?? ''));
                $jobTitle = $jobTitles[$key] ?? '';
                $jobLastDate = date('Y-m-d', strtotime($jobLastDates[$key] ?? ''));
                $jobDescription = $jobDescriptions[$key] ?? '';

                // Check if required fields are not empty
                if (!empty($employerName) && !empty($employerAddress) && !empty($startDate) && !empty($jobTitle)) {
                    if (insertEmployer($userID, $employerName, $employerAddress, $startDate, $jobTitle, $jobLastDate, $jobDescription)) {
                        $jobSuccess = true;
                    } else {
                        $jobSuccess = false;
                        break;
                    }
                }
            }

            if ($jobSuccess) {
                $response['type'] = 'success';
                $response['message'] = '<span class="en">Employer details successfully saved.</span><span class="es">Detalles del empleador guardados con éxito.</span>';
            } else {
                $response['type'] = 'error';
                $response['message'] = '<span class="en">Failed to save employer details.</span><span class="es">No se pudieron guardar los detalles del empleador.</span>';
            }

            if ($certificationDegree !== '' && $degreeUniversity !== '' && $degreeDate !== '' && $degreeStateAndCountry !== '') {
                // Assuming you have the UserID from the session or previous data

                // Call the function to insert the certification
                $inserted = insertCertification($userID, $certificationDegree, $degreeUniversity, $degreeDate, $degreeStateAndCountry);

                if ($inserted) {
                    $response['type'] = 'success';
                    $response['message'] = '<span class="en">Certification successfully inserted.</span><span class="es">Certificación insertada con éxito.</span>';
                } else {
                    throw new Exception('Failed to insert certification data.');
                }
            }
            // Check if essential fields are not empty
            if (
                !empty($anyCommunicableDisease) ||
                !empty($anyMissingVaccines) ||
                !empty($anyMentalDisorder) ||
                !empty($accusedDrugAddiction) ||
                !empty($accusedChildAbduction) ||
                !empty($deportedFromUS) ||
                !empty($citizenshipAfter96) ||
                !empty($electionsVoted) ||
                !empty($capacityToSupport)
            ) {
                try {
                    // Insert into additional_recommendation table
                    $success = insertAdditionalRecommendation(
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
                    );

                    if ($success) {
                        $response['type'] = 'success';
                        $response['message'] = '<span class="en">Additional recommendation details successfully saved.</span><span class="es">Detalles adicionales de recomendación guardados con éxito.</span>';
                    } else {
                        $response['message'] = '<span class="en">Failed to save additional recommendation details.</span><span class="es">No se pudieron guardar los detalles adicionales de recomendación.</span>';
                    }
                } catch (Exception $e) {
                    $response['message'] = '<span class="en">An error occurred: ' . $e->getMessage() . '</span><span class="es">Ocurrió un error: ' . $e->getMessage() . '</span>';
                }
            } else {
                $response['message'] = '<span class="en">UserID is required.</span><span class="es">UserID es obligatorio.</span>';
            }

            $response['type'] = 'success';
            $response['message'] = '<span class="en">User successfully saved.</span><span class="es">Usuario guardada con éxito.</span>';
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
