<?php
include './defines/db_conn.php';
include './defines/functions.php';

if (isLoggedIn()) {
    $clientId = $_SESSION['ClientID'];

    $checkPaymentStatus = isPaymentCleared($clientId);

    if ($checkPaymentStatus !== 'cleared') {
        header('location: index.php');
    }

    $User = getUserById($clientId);
    $InquiryInfo = getInquiryByClient($clientId);

    $careOfName = '';
    $street1 = '';
    $street2 = '';
    $residencyType = '';
    $residency = '';
    $zipCode = '';
    $city = '';
    $state = '';
    $cellPhone = '';
    $homePhone = '';
    $workPhone = '';
    $currentEmail = '';
    $emergencyContact = '';
    $emergencyPhone = '';

    $spouseName = '';
    $dateOfMarriage = '';
    $stateCountryOfMarriage = '';
    $spouseBirthday = '';
    $proofOfSpouseCitizenship = '';

    $exSpouseName = '';
    $exDateOfMarriage = '';
    $exPlaceOfMarriage = '';
    $exPlaceOfDivorce = '';
    $exDateOfDivorce = '';
    $obtainDecreeOfDivorce = '';
    $previousMarriage = null;

    $dateOfEntry = '';
    $stateOfEntry = '';
    $methodOfEntry = '';
    $anyIllegalDocumentOnEntry = '';
    $detainedByUSPatrol = '';

    $DocumentTypes = [];
    $DocumentDescriptions = [];

    $UsEncounters = [];
    $Offsprings = [];

    $employerName = '';
    $employerAddress = '';
    $startDate = '';
    $jobTitle = '';
    $jobLastDate = '';
    $jobDescription = '';

    $anyCommunicableDisease = '';
    $anyMissingVaccines = '';
    $anyMentalDisorder = '';
    $accusedDrugAddiction = '';
    $accusedChildAbduction = '';
    $deportedFromUS = '';
    $citizenshipAfter96 = '';
    $electionsVoted = '';
    $capacityToSupport = '';
    $otherQuestions = '';
    $certificationDegree = '';
    $degreeUniversity = '';
    $degreeDate = '';
    $degreeStateAndCountry = '';

    $checkType = '';

    // print_r($User);
    if ($User !== null) {
        // $User = $User[0];
        $UserID = $User['UserID'];
        $firstName = $User['firstName'];
        $middleName = $User['middleName'];
        $lastName = $User['lastName'];
        $email = $User['email'];
        $phone = $User['phone'];
        $zipCode = $User['zipCode'];
        $city = $User['city'];
        $state = $User['state'];
        $birthday = $User['birthday'];
        $birthPlace = $User['birthPlace'];
        $citizenshipCountry = $User['citizenshipCountry'];
        $gender = $User['gender'];

        $Address = getAddressByUserID($UserID);

        // print_r($Address);
        if ($Address !== null) {
            $careOfName = $Address['inCareOfName'];
            $street1 = $Address['street1'];
            $street2 = $Address['street2'];

            if ($Address['Apartment'] !== null) {
                $residencyType = 'Apartment';
                $residency = $Address['Apartment'];
            } elseif ($Address['Suite'] !== null) {
                $residencyType = 'Suite';
                $residency = $Address['Suite'];
            } elseif ($Address['Floor'] !== null) {
                $residencyType = 'Floor';
                $residency = $Address['Floor'];
            }

            $homePhone = $Address['homePhone'];
            $workPhone = $Address['workPhone'];
            $emergencyContact = $Address['emergencyContact'];
            $emergencyPhone = $Address['emergencyPhone'];
        }

        $Marriage = getMarriageByUserId($UserID);

        // print_r($Marriage);

        if ($Marriage !== null) {
            foreach ($Marriage as $marriageVal) {
                if ($marriageVal['dateOfDivorce'] !== null) {
                    $exSpouseName = $marriageVal['spouseName'];
                    $exDateOfMarriage = $marriageVal['dateOfMarriage'];
                    $exPlaceOfMarriage = $marriageVal['stateCountryOfMarriage'];
                    $exPlaceOfDivorce = $marriageVal['placeOfDivorce'];
                    $exDateOfDivorce = $marriageVal['dateOfDivorce'];
                    $obtainDecreeOfDivorce = $marriageVal['obtainDecreeOfDivorce'];
                    $previousMarriage = true;
                } else {
                    $spouseName = $marriageVal['spouseName'];
                    $dateOfMarriage = $marriageVal['dateOfMarriage'];
                    $stateCountryOfMarriage = $marriageVal['stateCountryOfMarriage'];
                    $spouseBirthday = $marriageVal['spouseBirthday'];
                    $proofOfSpouseCitizenship = $marriageVal['proofOfSpouseCitizenship'];
                }
            }
        }


        $UsEntries = getUsEntriesByUserId($UserID);
        if ($UsEntries !== null) {
            foreach ($UsEntries as $UsEntry) {
                $dateOfEntry = $UsEntry['dateOfEntry'];
                $stateOfEntry = $UsEntry['stateOfEntry'];
                $methodOfEntry = $UsEntry['methodOfEntry'];
                $anyIllegalDocumentOnEntry = $UsEntry['anyIllegalDocumentOnEntry'];
                $detainedByUSPatrol = $UsEntry['detainedByUSPatrol'];
            }
        }


        $UsResidencyProof = getUserDocumentByUserId($UserID);
        if ($UsResidencyProof !== null) {
            foreach ($UsResidencyProof as $UsResidency) {
                $DocumentTypes[] = $UsResidency['DocumentType'];
                $DocumentDescriptions[] = $UsResidency['DocumentDescription'];
            }
        }


        $UsEncounters = getUsEncountersByUserId($UserID);
        $Offsprings = getOffspringsByUserId($UserID);
        $Employer = getEmployerByUserId($UserID);

        if ($Employer !== null) {
            $employerName = $Employer['employerName'];
            $employerAddress = $Employer['employerAddress'];
            $startDate = $Employer['startDate'];
            $jobTitle = $Employer['jobTitle'];
            $jobLastDate = $Employer['jobLastDate'];
            $jobDescription = $Employer['jobDescription'];
        }

        $Certification = getCertificationByUserId($UserID);

        if ($Certification !== null) {
            $certificationDegree = $Certification['certificationDegree'];
            $degreeUniversity = $Certification['degreeUniversity'];
            $degreeDate = $Certification['degreeDate'];
            $degreeStateAndCountry = $Certification['degreeStateAndCountry'];
        }

        $Additional_Considerations = getAdditionalConsiderationsByUserId($UserID);
        if ($Additional_Considerations !== null) {
            $anyCommunicableDisease = $Additional_Considerations['anyCommunicableDisease'];
            $anyMissingVaccines = $Additional_Considerations['anyMissingVaccines'];
            $anyMentalDisorder = $Additional_Considerations['anyMentalDisorder'];
            $accusedDrugAddiction = $Additional_Considerations['accusedDrugAddiction'];
            $accusedChildAbduction = $Additional_Considerations['accusedChildAbduction'];
            $deportedFromUS = $Additional_Considerations['deportedFromUS'];
            $citizenshipAfter96 = $Additional_Considerations['citizenshipAfter96'];
            $electionsVoted = $Additional_Considerations['electionsVoted'];
            $capacityToSupport = $Additional_Considerations['capacityToSupport'];
            $otherQuestions = $Additional_Considerations['otherQuestions'];
        }

    } else {
        $firstName = '';
        $middleName = '';
        $lastName = '';
        $birthday = '';
        $birthPlace = '';
        $citizenshipCountry = '';
        $gender = '';

        // echo $checkType;
        // print_r($userData);
    }
} else {
    header('location: login.php');
}
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Qualification Data - US PIPE Immigration Program</title>
        <link rel="shortcut icon" href="./assets/images/Favicon.webp" type="image/x-icon">
        <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="./assets/css/style.css?v=8">
    </head>

    <body class="main-form-page roboto lang-<?php echo getLanguage(); ?>">
        <main class="py-5">
            <div class="container">
                <div class="d-flex justify-content-center gap-3 mb-4">
                    <a href="index.php" class="btn btn-rectangle mx-0 btn-primary"><span class="en">HOME</span> <span
                            class="es">INICIO</span></a>
                    <a href="logout.php" class="btn btn-rectangle mx-0 btn-danger"><span class="en">LOGOUT</span> <span
                            class="es">CERRAR SESIÓN</span></a>
                </div>
                <div class="d-flex justify-content-center">
                    <?php
                    if (getLanguage() == 'english') {
                        ?>
                        <a href="?lang=spanish"
                            class="btn bg-primary d-flex gap-2 text-black align-items-center fw-bold btn-change btn mx-auto"><img
                                src="./assets/images/change.svg" alt="Change"> <span>Espanol</span></a>
                        <?php
                    } else {
                        ?>
                        <a href="?lang=english"
                            class="btn bg-primary d-flex gap-2 text-black align-items-center fw-bold btn-change btn mx-auto"><img
                                src="./assets/images/change.svg" alt="Change"> <span>English</span></a>
                        <?php
                    }
                    ?>
                </div>
                <h2 class="text-center form-title fw-bold inter mb-4">
                    <?php echo getTranslation('Qualification', 0, 'label'); ?>
                </h2>
                <form action="./qualification-form-process.php" method="post" id="qualification-form">
                    <div class="sec-1 mb-4">
                        <h3 class="form-sec-title text-center inter">
                            <?php echo getTranslation('Qualification', 59, 'label'); ?>
                        </h3>
                        <fieldset class="px-sm-5 px-4 py-4">
                            <div class="row justify-content-around">
                                <div class="col-xl-5 col-lg-6">
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="firstName"
                                                class="form-label gap-1 d-flex align-items-center"><span><?php echo getTranslation('Qualification', 1, 'label'); ?></span><img
                                                    src="./assets/images/question-icon.svg" data-bs-toggle="tooltip"
                                                    title="<?php echo getTranslation('Qualification', 1, 'help'); ?>"
                                                    class="help-icon" alt="Icon" width="16"></label>
                                            <div class="input-div">
                                                <input type="text" class="form-control mt-1" id="firstName"
                                                    name="firstName" value="<?php echo $firstName; ?>"
                                                    placeholder="John">
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="middleName"
                                                class="form-label gap-1 d-flex align-items-center"><span><?php echo getTranslation('Qualification', 70, 'label'); ?>
                                                </span><img src="./assets/images/question-icon.svg"
                                                    data-bs-toggle="tooltip"
                                                    title="<?php echo getTranslation('Qualification', 70, 'help'); ?>"
                                                    class="help-icon" alt="Icon" width="16"></label>
                                            <div class="input-div">
                                                <input type="text" class="form-control mt-1" id="middleName"
                                                    name="middleName" value="<?php echo $middleName; ?>"
                                                    placeholder="Vin">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-5 col-lg-6">
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="lastName"
                                                class="form-label gap-1 d-flex align-items-center"><span><?php echo getTranslation('Qualification', 2, 'label'); ?></span><img
                                                    src="./assets/images/question-icon.svg" data-bs-toggle="tooltip"
                                                    title="<?php echo getTranslation('Qualification', 2, 'help'); ?>"
                                                    class="help-icon" alt="Icon" width="16"></label>
                                            <div class="input-div">
                                                <input type="text" required class="form-control mt-1" id="lastName"
                                                    name="lastName" value="<?php echo $lastName; ?>" placeholder="Doe">
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="birthday"
                                                class="form-label gap-1 d-flex align-items-center text-nowrap"><span><?php echo getTranslation('Qualification', 3, 'label'); ?></span><img
                                                    src="./assets/images/question-icon.svg" data-bs-toggle="tooltip"
                                                    title="<?php echo getTranslation('Qualification', 3, 'help'); ?>"
                                                    class="help-icon" alt="Icon" width="16"></label>
                                            <div class="input-div">
                                                <input type="date" class="form-control mt-1" id="birthday"
                                                    name="birthday"
                                                    value="<?php echo $date = ($birthday != '' && $birthday != '1970-01-01') ? $birthday : ''; ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-5 col-lg-6">
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="birthPlace"
                                                class="form-label gap-1 d-flex align-items-center text-nowrap"><span><?php echo getTranslation('Qualification', 4, 'label'); ?></span><img
                                                    src="./assets/images/question-icon.svg" data-bs-toggle="tooltip"
                                                    title="<?php echo getTranslation('Qualification', 4, 'help'); ?>"
                                                    class="help-icon" alt="Icon" width="16"></label>
                                            <div class="input-div">
                                                <input type="text" required class="form-control mt-1" id="birthPlace"
                                                    name="birthPlace" value="<?php echo $birthPlace; ?>"
                                                    placeholder="New York, United States">
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="citizenshipCountry"
                                                class="form-label gap-1 d-flex align-items-center text-nowrap"><span><?php echo getTranslation('Qualification', 71, 'label'); ?></span><img
                                                    src="./assets/images/question-icon.svg" data-bs-toggle="tooltip"
                                                    title="<?php echo getTranslation('Qualification', 71, 'help'); ?>"
                                                    class="help-icon" alt="Icon" width="16"></label>
                                            <div class="input-div">
                                                <input type="text" required class="form-control mt-1"
                                                    id="citizenshipCountry" name="citizenshipCountry"
                                                    value="<?php echo $citizenshipCountry; ?>" placeholder="Mexico">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-5 col-lg-6">
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="gender"
                                                class="form-label gap-1 d-flex align-items-center"><span><?php echo getTranslation('Qualification', 72, 'label'); ?></span><img
                                                    src="./assets/images/question-icon.svg" data-bs-toggle="tooltip"
                                                    title="<?php echo getTranslation('Qualification', 72, 'help'); ?>"
                                                    class="help-icon" alt="Icon" width="16"></label>
                                            <div class="input-div mt-1">
                                                <select class="form-control mt-1" required id="gender" name="gender">
                                                    <option value="male">Male</option>
                                                    <option value="female">Female</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                    <div class="sec-2 mb-4">
                        <h3 class="form-sec-title text-center inter">
                            <?php echo getTranslation('Qualification', 60, 'label'); ?>
                        </h3>
                        <fieldset class="px-sm-5 px-4 py-4">
                            <div class="row justify-content-around">
                                <div class="col-xl-5 col-lg-6">
                                    <div class="row">
                                        <div class="col-12 mb-3 pt-3">
                                            <label for="careOfName"
                                                class="form-label gap-1 d-flex align-items-center"><span><?php echo getTranslation('Qualification', 73, 'label'); ?></span><img
                                                    src="./assets/images/question-icon.svg" data-bs-toggle="tooltip"
                                                    title="<?php echo getTranslation('Qualification', 73, 'help'); ?>"
                                                    class="help-icon" alt="Icon" width="16"></label>
                                            <div class="input-div">
                                                <input type="text" class="form-control mt-1" id="careOfName"
                                                    name="careOfName" value="<?php echo $careOfName; ?>"
                                                    placeholder="Jon Smith">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-5 col-lg-6">
                                    <div class="row">
                                        <div class="col-12 mb-3 pt-3">
                                            <label for="street1"
                                                class="form-label gap-1 d-flex align-items-center"><span><?php echo getTranslation('Qualification', 5, 'label'); ?></span><img
                                                    src="./assets/images/question-icon.svg" data-bs-toggle="tooltip"
                                                    title="<?php echo getTranslation('Qualification', 5, 'help'); ?>"
                                                    class="help-icon" alt="Icon" width="16"></label>
                                            <div class="input-div">
                                                <input type="text" class="form-control mt-1" id="street1" name="street1"
                                                    value="<?php echo $street1; ?>" placeholder="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-5 col-lg-6">
                                    <div class="row">
                                        <div class="col-12 mb-3 pt-3">
                                            <label for="street2"
                                                class="form-label gap-1 d-flex align-items-center"><span><?php echo getTranslation('Qualification', 6, 'label'); ?></span><img
                                                    src="./assets/images/question-icon.svg" data-bs-toggle="tooltip"
                                                    title="<?php echo getTranslation('Qualification', 6, 'help'); ?>"
                                                    class="help-icon" alt="Icon" width="16"></label>
                                            <div class="input-div">
                                                <input type="text" class="form-control mt-1" id="street2" name="street2"
                                                    value="<?php echo $street2; ?>" placeholder="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-5 col-lg-6">
                                    <div class="row">
                                        <div class="col-12 mb-3 pt-3">
                                            <label for="residency"
                                                class="form-label opacity-0 gap-1 d-flex align-items-center"><span>Residency</span><img
                                                    src="./assets/images/question-icon.svg" data-bs-toggle="tooltip"
                                                    title="" class="help-icon" alt="Icon" width="16"></label>
                                            <div class="d-flex gap-3 align-items-center justify-content-center">
                                                <div class="form-check mb-0">
                                                    <label class="form-check-label" for="residenceApt"> Apt. </label>
                                                    <input class="form-check-input radio-type-check" type="checkbox"
                                                        value="Apartment" id="residenceApt" name="residencyType" <?php echo $residencyTypeChecked = ($residencyType == 'Apartment') ? 'checked' : ''; ?>>
                                                </div>
                                                <div class="form-check mb-0">
                                                    <label class="form-check-label" for="residenceSte"> Ste. </label>
                                                    <input class="form-check-input radio-type-check" type="checkbox"
                                                        value="Suite" id="residenceSte" name="residencyType" <?php echo $residencyTypeChecked = ($residencyType == 'Suite') ? 'checked' : ''; ?>>
                                                </div>
                                                <div class="form-check mb-0">
                                                    <label class="form-check-label" for="residenceFlr"> Floor. </label>
                                                    <input class="form-check-input radio-type-check" type="checkbox"
                                                        value="Floor" id="residenceFlr" name="residencyType" <?php echo $residencyTypeChecked = ($residencyType == 'Floor') ? 'checked' : ''; ?>>
                                                </div>
                                                <div class="input-div flex-grow-1">
                                                    <input type="text" size="10" maxlength="10"
                                                        class="form-control mt-1" id="residency" name="residency"
                                                        value="<?php echo $residency; ?>" placeholder="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-5 col-lg-6">
                                    <div class="row">
                                        <div class="col-12 mb-3 pt-3">
                                            <label for="zipCode"
                                                class="form-label gap-1 d-flex align-items-center"><span><?php echo getTranslation('Qualification', 7, 'label'); ?></span><img
                                                    src="./assets/images/question-icon.svg" data-bs-toggle="tooltip"
                                                    title="<?php echo getTranslation('Qualification', 7, 'help'); ?>"
                                                    class="help-icon" alt="Icon" width="16"></label>
                                            <div class="input-div">
                                                <input type="text" class="form-control mt-1" id="zipCode" name="zipCode"
                                                    value="<?php echo $zipCode; ?>" placeholder="11004">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-5 col-lg-6">
                                    <div class="row">
                                        <div class="col-sm-6 mb-3 pt-3">
                                            <label for="city"
                                                class="form-label gap-1 d-flex align-items-center"><span><?php echo getTranslation('Qualification', 8, 'label'); ?></span><img
                                                    src="./assets/images/question-icon.svg" data-bs-toggle="tooltip"
                                                    title="<?php echo getTranslation('Qualification', 8, 'help'); ?>"
                                                    class="help-icon" alt="Icon" width="16"></label>
                                            <div class="input-div">
                                                <input type="text" class="form-control mt-1" id="city" name="city"
                                                    value="<?php echo $city; ?>" placeholder="Queens">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 mb-3 pt-3">
                                            <label for="state"
                                                class="form-label gap-1 d-flex align-items-center mb-1"><span><?php echo getTranslation('Qualification', 9, 'label'); ?></span><img
                                                    src="./assets/images/question-icon.svg" data-bs-toggle="tooltip"
                                                    title="<?php echo getTranslation('Qualification', 9, 'help'); ?>"
                                                    class="help-icon" alt="Icon" width="16"></label>
                                            <div class="input-div">
                                                <select class="form-control mt-1" id="state" name="state"
                                                    value="<?php echo $state; ?>">
                                                    <option value="Alabama">Alabama</option>
                                                    <option value="Alaska">Alaska</option>
                                                    <option value="Arizona">Arizona</option>
                                                    <option value="Arkansas">Arkansas</option>
                                                    <option value="California">California</option>
                                                    <option value="Colorado">Colorado</option>
                                                    <option value="Connecticut">Connecticut</option>
                                                    <option value="Delaware">Delaware</option>
                                                    <option value="Florida">Florida</option>
                                                    <option value="Georgia">Georgia</option>
                                                    <option value="Hawaii">Hawaii</option>
                                                    <option value="Idaho">Idaho</option>
                                                    <option value="Illinois">Illinois</option>
                                                    <option value="Indiana">Indiana</option>
                                                    <option value="Iowa">Iowa</option>
                                                    <option value="Kansas">Kansas</option>
                                                    <option value="Kentucky">Kentucky</option>
                                                    <option value="Louisiana">Louisiana</option>
                                                    <option value="Maine">Maine</option>
                                                    <option value="Maryland">Maryland</option>
                                                    <option value="Massachusetts">Massachusetts</option>
                                                    <option value="Michigan">Michigan</option>
                                                    <option value="Minnesota">Minnesota</option>
                                                    <option value="Mississippi">Mississippi</option>
                                                    <option value="Missouri">Missouri</option>
                                                    <option value="Montana">Montana</option>
                                                    <option value="Nebraska">Nebraska</option>
                                                    <option value="Nevada">Nevada</option>
                                                    <option value="New Hampshire">New Hampshire</option>
                                                    <option value="New Jersey">New Jersey</option>
                                                    <option value="New Mexico">New Mexico</option>
                                                    <option value="New York">New York</option>
                                                    <option value="North Carolina">North Carolina</option>
                                                    <option value="North Dakota">North Dakota</option>
                                                    <option value="Ohio">Ohio</option>
                                                    <option value="Oklahoma">Oklahoma</option>
                                                    <option value="Oregon">Oregon</option>
                                                    <option value="Pennsylvania">Pennsylvania</option>
                                                    <option value="Rhode Island">Rhode Island</option>
                                                    <option value="South Carolina">South Carolina</option>
                                                    <option value="South Dakota">South Dakota</option>
                                                    <option value="Tennessee">Tennessee</option>
                                                    <option value="Texas">Texas</option>
                                                    <option value="Utah">Utah</option>
                                                    <option value="Vermont">Vermont</option>
                                                    <option value="Virginia">Virginia</option>
                                                    <option value="Washington">Washington</option>
                                                    <option value="West Virginia">West Virginia</option>
                                                    <option value="Wisconsin">Wisconsin</option>
                                                    <option value="Wyoming">Wyoming</option>
                                                    <option value="American Samoa">American Samoa</option>
                                                    <option value="Guam">Guam</option>
                                                    <option value="Northern Mariana Islands">Northern Mariana Islands
                                                    </option>
                                                    <option value="Puerto Rico">Puerto Rico</option>
                                                    <option value="U.S. Virgin Islands">U.S. Virgin Islands</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-5 col-lg-6">
                                    <div class="row">
                                        <div class="col-12 mb-3 pt-3">
                                            <label for="cellPhone"
                                                class="form-label gap-1 d-flex align-items-center"><span><?php echo getTranslation('Qualification', 10, 'label'); ?></span><img
                                                    src="./assets/images/question-icon.svg" data-bs-toggle="tooltip"
                                                    title="<?php echo getTranslation('Qualification', 10, 'help'); ?>"
                                                    class="help-icon" alt="Icon" width="16"></label>
                                            <div class="input-div">
                                                <input type="text" class="form-control mt-1 phone-number" id="cellPhone"
                                                    name="cellPhone" value="<?php echo $phone; ?>"
                                                    placeholder="<?php echo getTranslation('Qualification', 10, 'placeholder'); ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-5 col-lg-6">
                                    <div class="row">
                                        <div class="col-12 mb-3 pt-3">
                                            <label for="homePhone"
                                                class="form-label gap-1 d-flex align-items-center"><span><?php echo getTranslation('Qualification', 12, 'label'); ?></span><img
                                                    src="./assets/images/question-icon.svg" data-bs-toggle="tooltip"
                                                    title="<?php echo getTranslation('Qualification', 12, 'help'); ?>"
                                                    class="help-icon" alt="Icon" width="16"></label>
                                            <div class="input-div">
                                                <input type="text" class="form-control mt-1 phone-number" id="homePhone"
                                                    name="homePhone" value="<?php echo $homePhone; ?>"
                                                    placeholder="<?php echo getTranslation('Qualification', 10, 'placeholder'); ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-5 col-lg-6">
                                    <div class="row">
                                        <div class="col-12 mb-3 pt-3">
                                            <label for="workPhone"
                                                class="form-label gap-1 d-flex align-items-center"><span><?php echo getTranslation('Qualification', 13, 'label'); ?></span><img
                                                    src="./assets/images/question-icon.svg" data-bs-toggle="tooltip"
                                                    title="<?php echo getTranslation('Qualification', 13, 'help'); ?>"
                                                    class="help-icon" alt="Icon" width="16"></label>
                                            <div class="input-div">
                                                <input type="text" class="form-control mt-1 phone-number" id="workPhone"
                                                    name="workPhone" value="<?php echo $workPhone; ?>"
                                                    placeholder="<?php echo getTranslation('Qualification', 10, 'placeholder'); ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-5 col-lg-6">
                                    <div class="row">
                                        <div class="col-12 mb-3 pt-3">
                                            <label for="currentEmail"
                                                class="form-label gap-1 d-flex align-items-center"><span><?php echo getTranslation('Qualification', 14, 'label'); ?></span><img
                                                    src="./assets/images/question-icon.svg" data-bs-toggle="tooltip"
                                                    title="<?php echo getTranslation('Qualification', 14, 'help'); ?>"
                                                    class="help-icon" alt="Icon" width="16"></label>
                                            <div class="input-div">
                                                <input type="email" class="form-control mt-1" id="currentEmail"
                                                    name="currentEmail" value="<?php echo $email; ?>"
                                                    placeholder="Email@lato.com">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-5 col-lg-6">
                                    <div class="row">
                                        <div class="col-12 mb-3 pt-3">
                                            <label for="emergencyContact"
                                                class="form-label gap-1 d-flex align-items-center"><span><?php echo getTranslation('Qualification', 15, 'label'); ?></span><img
                                                    src="./assets/images/question-icon.svg" data-bs-toggle="tooltip"
                                                    title="<?php echo getTranslation('Qualification', 15, 'help'); ?>"
                                                    class="help-icon" alt="Icon" width="16"></label>
                                            <div class="input-div">
                                                <input type="text" class="form-control mt-1" id="emergencyContact"
                                                    name="emergencyContact" value="<?php echo $emergencyContact; ?>"
                                                    placeholder="John Doe">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-5 col-lg-6">
                                    <div class="row">
                                        <div class="col-12 mb-3 pt-3">
                                            <label for="emergencyPhone"
                                                class="form-label gap-1 d-flex align-items-center"><span><?php echo getTranslation('Qualification', 16, 'label'); ?></span><img
                                                    src="./assets/images/question-icon.svg" data-bs-toggle="tooltip"
                                                    title="<?php echo getTranslation('Qualification', 16, 'help'); ?>"
                                                    class="help-icon" alt="Icon" width="16"></label>
                                            <div class="input-div">
                                                <input type="text" class="form-control mt-1 phone-number"
                                                    id="emergencyPhone" name="emergencyPhone"
                                                    value="<?php echo $emergencyPhone; ?>"
                                                    placeholder="<?php echo getTranslation('Qualification', 10, 'placeholder'); ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                    <div class="sec-3 mb-4">
                        <h3 class="form-sec-title text-center inter">
                            <?php echo getTranslation('Qualification', 61, 'label'); ?>
                        </h3>
                        <fieldset class="px-sm-5 px-4 py-4">
                            <div class="d-flex flex-column gap-5 mb-4 align-items-center">
                                <p class="text-center mb-0 text-black"><span class="text-red">IMPORTANT</span> Watch
                                    immigration lawyer Lic. Suriel explaining the importance of <strong>"Current
                                        Marriage to US Citizen"</strong></p>
                                <iframe src="https://drive.google.com/file/d/1jwz4ZWxtv6ONV3Y9fzC1ZCDhmojwUMhL/preview"
                                    class="info-video" style="width: 390px;" allow="autoplay"></iframe>
                            </div>
                            <div class="text-center">
                                <p class="fw-medium text-black mt-5 inter">You must proof that they have been in the US
                                    for the last 10 years, ideally</p>
                            </div>
                            <div class="row justify-content-around">
                                <div class="col-xl-5 col-lg-6">
                                    <div class="row">
                                        <div class="col-12 mb-3 pt-3">
                                            <label for="spouseName"
                                                class="form-label gap-1 d-flex align-items-center"><span><?php echo getTranslation('Qualification', 17, 'label'); ?></span><img
                                                    src="./assets/images/question-icon.svg" data-bs-toggle="tooltip"
                                                    title="<?php echo getTranslation('Qualification', 17, 'help'); ?>"
                                                    class="help-icon" alt="Icon" width="16"></label>
                                            <div class="input-div">
                                                <input type="text" class="form-control mt-1" id="spouseName"
                                                    name="spouseName" value="<?php echo $spouseName; ?>"
                                                    placeholder="Maria Gonzalez">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-5 col-lg-6">
                                    <div class="row">
                                        <div class="col-12 mb-3 pt-3">
                                            <label for="dateOfMarriage"
                                                class="form-label gap-1 d-flex align-items-center"><span><?php echo getTranslation('Qualification', 20, 'label'); ?></span><img
                                                    src="./assets/images/question-icon.svg" data-bs-toggle="tooltip"
                                                    title="<?php echo getTranslation('Qualification', 20, 'help'); ?>"
                                                    class="help-icon" alt="Icon" width="16"></label>
                                            <div class="input-div">
                                                <input type="date" class="form-control mt-1" id="dateOfMarriage"
                                                    name="dateOfMarriage"
                                                    value="<?php echo $date = ($dateOfMarriage != '' && $dateOfMarriage != '1970-01-01') ? $dateOfMarriage : ''; ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-5 col-lg-6">
                                    <div class="row">
                                        <div class="col-12 mb-3 pt-3">
                                            <label for="stateCountryOfMarriage"
                                                class="form-label gap-1 d-flex align-items-center"><span><?php echo getTranslation('Qualification', 19, 'label'); ?>
                                                </span><img src="./assets/images/question-icon.svg"
                                                    data-bs-toggle="tooltip"
                                                    title="<?php echo getTranslation('Qualification', 19, 'help'); ?>"
                                                    class="help-icon" alt="Icon" width="16"></label>
                                            <div class="input-div">
                                                <input type="text" class="form-control mt-1" id="stateCountryOfMarriage"
                                                    name="stateCountryOfMarriage"
                                                    value="<?php echo $stateCountryOfMarriage; ?>"
                                                    placeholder="New York, United States">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-5 col-lg-6">
                                    <div class="row">
                                        <div class="col-12 mb-3 pt-3">
                                            <label for="spouseBirthday"
                                                class="form-label gap-1 d-flex align-items-center"><span><?php echo getTranslation('Qualification', 18, 'label'); ?></span><img
                                                    src="./assets/images/question-icon.svg" data-bs-toggle="tooltip"
                                                    title="<?php echo getTranslation('Qualification', 18, 'help'); ?>"
                                                    class="help-icon" alt="Icon" width="16"></label>
                                            <div class="input-div">
                                                <input type="date" class="form-control mt-1" id="spouseBirthday"
                                                    name="spouseBirthday"
                                                    value="<?php echo $date = ($spouseBirthday != '' && $spouseBirthday != '1970-01-01') ? $spouseBirthday : ''; ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-5 col-lg-6">
                                    <div class="row">
                                        <div class="col-12 mb-3 pt-3">
                                            <label for="proofOfSpouseCitizenship"
                                                class="form-label gap-1 d-flex align-items-center"><span><?php echo getTranslation('Qualification', 21, 'label'); ?>
                                                </span><img src="./assets/images/question-icon.svg"
                                                    data-bs-toggle="tooltip"
                                                    title="<?php echo getTranslation('Qualification', 21, 'help'); ?>"
                                                    class="help-icon" alt="Icon" width="16"></label>
                                            <div class="input-div">
                                                <select class="form-control mt-1" id="proofOfSpouseCitizenship"
                                                    name="proofOfSpouseCitizenship"
                                                    value="<?php echo $proofOfSpouseCitizenship; ?>">
                                                    <option>US birth certificate</option>
                                                    <option>US Passport</option>
                                                    <option>US Naturalization Certificate</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-5 col-lg-6">
                                    <div class="row">
                                        <div class="col-12 mb-3 pt-3 text-end">
                                            <p
                                                class="d-flex gap-1 justify-content-end align-items-center show-previous-marriage text-primary">
                                                <img src="./assets/images/plus.svg" class="help-icon" alt="Icon"
                                                    width="13"><span><span class="en">Previous Marriage</span> <span
                                                        class="es">Matrimonio Anterior</span></span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                    <div class="sec-4 mb-4" <?php echo $showPreviousMarriage = $previousMarriage !== null ? 'style="display: block;"' : ''; ?>>
                        <h3 class="form-sec-title text-center inter">
                            <?php echo getTranslation('Qualification', 62, 'label'); ?>
                        </h3>
                        <fieldset class="px-sm-5 px-4 py-4">
                            <div class="row justify-content-around">
                                <div class="col-xl-5 col-lg-6">
                                    <div class="row">
                                        <div class="col-12 mb-3 pt-3">
                                            <label for="exSpouseName"
                                                class="form-label gap-1 d-flex align-items-center"><span><?php echo getTranslation('Qualification', 74, 'label'); ?></span><img
                                                    src="./assets/images/question-icon.svg" data-bs-toggle="tooltip"
                                                    title="<?php echo getTranslation('Qualification', 74, 'help'); ?>"
                                                    class="help-icon" alt="Icon" width="16"></label>
                                            <div class="input-div">
                                                <input type="text" class="form-control mt-1" id="exSpouseName"
                                                    name="exSpouseName" value="<?php echo $exSpouseName; ?>"
                                                    placeholder="lorum ipsum">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-5 col-lg-6">
                                    <div class="row">
                                        <div class="col-12 mb-3 pt-3">
                                            <label for="exDateOfMarriage"
                                                class="form-label gap-1 d-flex align-items-center"><span><?php echo getTranslation('Qualification', 20, 'label'); ?></span><img
                                                    src="./assets/images/question-icon.svg" data-bs-toggle="tooltip"
                                                    title="<?php echo getTranslation('Qualification', 20, 'help'); ?>"
                                                    class="help-icon" alt="Icon" width="16"></label>
                                            <div class="input-div">
                                                <input type="date" class="form-control mt-1" id="exDateOfMarriage"
                                                    name="exDateOfMarriage"
                                                    value="<?php echo $date = ($exDateOfMarriage != '' && $exDateOfMarriage != '1970-01-01') ? $exDateOfMarriage : ''; ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-5 col-lg-6">
                                    <div class="row">
                                        <div class="col-12 mb-3 pt-3">
                                            <label for="exPlaceOfMarriage"
                                                class="form-label gap-1 d-flex align-items-center"><span><?php echo getTranslation('Qualification', 19, 'label'); ?>
                                                </span><img src="./assets/images/question-icon.svg"
                                                    data-bs-toggle="tooltip"
                                                    title="<?php echo getTranslation('Qualification', 19, 'help'); ?>"
                                                    class="help-icon" alt="Icon" width="16"></label>
                                            <div class="input-div">
                                                <input type="text" class="form-control mt-1" id="exPlaceOfMarriage"
                                                    name="exPlaceOfMarriage" value="<?php echo $exPlaceOfMarriage; ?>"
                                                    placeholder="New York, United States">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-5 col-lg-6">
                                    <div class="row">
                                        <div class="col-12 mb-3 pt-3">
                                            <label for="exPlaceOfDivorce"
                                                class="form-label gap-1 d-flex align-items-center"><span><?php echo getTranslation('Qualification', 75, 'label'); ?>
                                                </span><img src="./assets/images/question-icon.svg"
                                                    data-bs-toggle="tooltip"
                                                    title="<?php echo getTranslation('Qualification', 75, 'help'); ?>"
                                                    class="help-icon" alt="Icon" width="16"></label>
                                            <div class="input-div">
                                                <input type="text" class="form-control mt-1" id="exPlaceOfDivorce"
                                                    name="exPlaceOfDivorce" value="<?php echo $exPlaceOfDivorce; ?>"
                                                    placeholder="New York, United States">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-5 col-lg-6">
                                    <div class="row">
                                        <div class="col-12 mb-3 pt-3">
                                            <label for="exDateOfMarriage"
                                                class="form-label gap-1 d-flex align-items-center"><span><?php echo getTranslation('Qualification', 76, 'label'); ?></span><img
                                                    src="./assets/images/question-icon.svg" data-bs-toggle="tooltip"
                                                    title="<?php echo getTranslation('Qualification', 76, 'help'); ?>"
                                                    class="help-icon" alt="Icon" width="16"></label>
                                            <div class="input-div">
                                                <input type="date" class="form-control mt-1" id="exDateOfDivorce"
                                                    name="exDateOfDivorce"
                                                    value="<?php echo $date = ($exDateOfDivorce != '' && $exDateOfDivorce != '1970-01-01') ? $exDateOfDivorce : ''; ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-5 col-lg-6">
                                    <div class="row">
                                        <div class="col-12 mb-3 pt-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="Yes"
                                                    id="obtainDecreeOfDivorce" name="obtainDecreeOfDivorce" <?php echo $checkedDecree = ($obtainDecreeOfDivorce == 'Yes') ? 'checked' : ''; ?>>
                                                <label class="form-check-label gap-1 d-flex align-items-center"
                                                    for="obtainDecreeOfDivorce"> <span>
                                                        <?php echo getTranslation('Qualification', 77, 'label'); ?>
                                                    </span><img src="./assets/images/question-icon.svg"
                                                        data-bs-toggle="tooltip"
                                                        title="<?php echo getTranslation('Qualification', 77, 'help'); ?>"
                                                        class="help-icon" alt="Icon" width="16"></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                    <div class="sec-5 mb-4">
                        <h3 class="form-sec-title text-center inter">
                            <?php echo getTranslation('Qualification', 63, 'label'); ?>
                        </h3>
                        <fieldset class="px-sm-5 px-4 py-4">
                            <!-- <div class="d-flex flex-column gap-5 mb-4 align-items-center">
                                <p class="text-center mb-0 text-black"><span class="text-red">IMPORTANT</span> Watch
                                    immigration lawyer Lic. Suriel explaining the importance of <strong>"US
                                        Entries"</strong></p>
                                <video controls preload="none" class="info-video" style="width: 390px;">
                                    <source src="./assets/video/sample-video.mp4" type="video/mp4">
                                </video>
                            </div> -->
                            <div class="row justify-content-around">
                                <div class="col-xl-5 col-lg-6">
                                    <div class="row">
                                        <div class="col-12 mb-3 pt-3">
                                            <label for="dateOfEntry"
                                                class="form-label gap-1 d-flex align-items-center"><span><?php echo getTranslation('Qualification', 22, 'label'); ?></span><img
                                                    src="./assets/images/question-icon.svg" data-bs-toggle="tooltip"
                                                    title="<?php echo getTranslation('Qualification', 22, 'help'); ?>"
                                                    class="help-icon" alt="Icon" width="16"></label>
                                            <div class="input-div">
                                                <input type="date" class="form-control mt-1" id="dateOfEntry"
                                                    name="dateOfEntry[]"
                                                    value="<?php echo $date = ($dateOfEntry != '' && $dateOfEntry != '1970-01-01') ? $dateOfEntry : ''; ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-5 col-lg-6">
                                    <div class="row">
                                        <div class="col-12 mb-3 pt-3">
                                            <label for="stateOfEntry"
                                                class="form-label gap-1 d-flex align-items-center"><span><?php echo getTranslation('Qualification', 23, 'label'); ?>
                                                    you entered US</span><img src="./assets/images/question-icon.svg"
                                                    data-bs-toggle="tooltip"
                                                    title="<?php echo getTranslation('Qualification', 23, 'help'); ?>"
                                                    class="help-icon" alt="Icon" width="16"></label>
                                            <div class="input-div">
                                                <select class="form-control mt-1" id="stateOfEntry"
                                                    name="stateOfEntry[]">
                                                    <option value="Alabama">Alabama</option>
                                                    <option value="Alaska">Alaska</option>
                                                    <option value="Arizona">Arizona</option>
                                                    <option value="Arkansas">Arkansas</option>
                                                    <option value="California">California</option>
                                                    <option value="Colorado">Colorado</option>
                                                    <option value="Connecticut">Connecticut</option>
                                                    <option value="Delaware">Delaware</option>
                                                    <option value="Florida">Florida</option>
                                                    <option value="Georgia">Georgia</option>
                                                    <option value="Hawaii">Hawaii</option>
                                                    <option value="Idaho">Idaho</option>
                                                    <option value="Illinois">Illinois</option>
                                                    <option value="Indiana">Indiana</option>
                                                    <option value="Iowa">Iowa</option>
                                                    <option value="Kansas">Kansas</option>
                                                    <option value="Kentucky">Kentucky</option>
                                                    <option value="Louisiana">Louisiana</option>
                                                    <option value="Maine">Maine</option>
                                                    <option value="Maryland">Maryland</option>
                                                    <option value="Massachusetts">Massachusetts</option>
                                                    <option value="Michigan">Michigan</option>
                                                    <option value="Minnesota">Minnesota</option>
                                                    <option value="Mississippi">Mississippi</option>
                                                    <option value="Missouri">Missouri</option>
                                                    <option value="Montana">Montana</option>
                                                    <option value="Nebraska">Nebraska</option>
                                                    <option value="Nevada">Nevada</option>
                                                    <option value="New Hampshire">New Hampshire</option>
                                                    <option value="New Jersey">New Jersey</option>
                                                    <option value="New Mexico">New Mexico</option>
                                                    <option value="New York">New York</option>
                                                    <option value="North Carolina">North Carolina</option>
                                                    <option value="North Dakota">North Dakota</option>
                                                    <option value="Ohio">Ohio</option>
                                                    <option value="Oklahoma">Oklahoma</option>
                                                    <option value="Oregon">Oregon</option>
                                                    <option value="Pennsylvania">Pennsylvania</option>
                                                    <option value="Rhode Island">Rhode Island</option>
                                                    <option value="South Carolina">South Carolina</option>
                                                    <option value="South Dakota">South Dakota</option>
                                                    <option value="Tennessee">Tennessee</option>
                                                    <option value="Texas">Texas</option>
                                                    <option value="Utah">Utah</option>
                                                    <option value="Vermont">Vermont</option>
                                                    <option value="Virginia">Virginia</option>
                                                    <option value="Washington">Washington</option>
                                                    <option value="West Virginia">West Virginia</option>
                                                    <option value="Wisconsin">Wisconsin</option>
                                                    <option value="Wyoming">Wyoming</option>
                                                    <option value="American Samoa">American Samoa</option>
                                                    <option value="Guam">Guam</option>
                                                    <option value="Northern Mariana Islands">Northern Mariana Islands
                                                    </option>
                                                    <option value="Puerto Rico">Puerto Rico</option>
                                                    <option value="U.S. Virgin Islands">U.S. Virgin Islands</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-5 col-lg-6">
                                    <div class="row">
                                        <div class="col-12 mb-3 pt-3">
                                            <label for="methodOfEntry"
                                                class="form-label gap-1 d-flex align-items-center"><span><?php echo getTranslation('Qualification', 24, 'label'); ?></span><img
                                                    src="./assets/images/question-icon.svg" data-bs-toggle="tooltip"
                                                    title="<?php echo getTranslation('Qualification', 24, 'help'); ?>"
                                                    class="help-icon" alt="Icon" width="16"></label>
                                            <div class="input-div">
                                                <textarea class="form-control mt-1" rows="5" id="methodOfEntry"
                                                    name="methodOfEntry[]"
                                                    placeholder="<?php echo getTranslation('Qualification', 24, 'help'); ?>"><?php echo $methodOfEntry; ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-5 col-lg-6">
                                    <div class="row">
                                        <div class="col-12 mb-3 pt-3">
                                            <label for="anyIllegalDocumentOnEntry"
                                                class="form-label gap-1 d-flex align-items-center"><span><?php echo getTranslation('Qualification', 25, 'label'); ?></span></label>
                                            <div class="input-div">
                                                <textarea class="form-control mt-1" rows="5"
                                                    id="anyIllegalDocumentOnEntry" name="anyIllegalDocumentOnEntry[]"
                                                    placeholder="<?php echo getTranslation('Qualification', 25, 'placeholder'); ?>"><?php echo $anyIllegalDocumentOnEntry; ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-5 col-lg-6">
                                    <div class="row">
                                        <div class="col-12 mb-3 pt-3">
                                            <label for="detainedByUSPatrol"
                                                class="form-label gap-1 d-flex align-items-center"><span><?php echo getTranslation('Qualification', 26, 'label'); ?></span><img
                                                    src="./assets/images/question-icon.svg" data-bs-toggle="tooltip"
                                                    title="<?php echo getTranslation('Qualification', 26, 'placeholder'); ?>"
                                                    class="help-icon" alt="Icon" width="16"></label>
                                            <div class="input-div">
                                                <textarea class="form-control mt-1" rows="5" id="detainedByUSPatrol"
                                                    name="detainedByUSPatrol[]"
                                                    placeholder="<?php echo getTranslation('Qualification', 26, 'help'); ?>"><?php echo $detainedByUSPatrol; ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- <div class="col-xl-5 col-lg-6">
                                    <div class="row">
                                        <div class="col-12 mb-3 pt-3 text-end">
                                            <p
                                                class="d-flex gap-1 justify-content-end align-items-center more-entries text-primary">
                                                <img src="./assets/images/plus.svg" class="help-icon" alt="Icon"
                                                    width="13"><span><span class="en">US Entries</span> <span
                                                        class="es">Entrada a EE.UU.</span></span>
                                            </p>
                                        </div>
                                    </div>
                                </div> -->
                            </div>
                        </fieldset>
                    </div>
                    <div class="sec-6 mb-4">
                        <h3 class="form-sec-title text-center inter">
                            <?php echo getTranslation('Qualification', 64, 'label'); ?>
                        </h3>
                        <fieldset class="px-sm-5 px-4 py-4">
                            <div class="d-flex flex-column gap-5 mb-4 align-items-center">
                                <p class="text-center mb-0 text-black"><span class="text-red">IMPORTANT</span> Watch
                                    immigration lawyer Lic. Suriel explaining the importance of <strong>"Residency
                                        Documents"</strong></p>
                                <iframe src="https://drive.google.com/file/d/1_p1c3u5ntvOjo26-LiVdeL03ZcDWZYes/preview"
                                    class="info-video" style="width: 390px;" allow="autoplay"></iframe>
                            </div>
                            <div class="text-center">
                                <p class="fw-medium text-black mt-5 inter">You must proof that they have been in the US
                                    for the last 10 years, ideally</p>
                            </div>
                            <div class="row justify-content-start">
                                <div class="col-xl-9 col-lg-10">
                                    <div class="row">
                                        <div class="col-12 mb-3 pt-3">
                                            <div class="d-flex gap-3 check-input">
                                                <div>
                                                    <input class="form-check-input" type="checkbox" id="taxReturn"
                                                        name="documentType[]" value="Tax Return" <?php echo $dTypeCheck = (in_array('Tax Return', $DocumentTypes)) ? 'checked' : ''; ?>>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <label for="taxReturnYears"
                                                        class="form-label gap-1 d-flex align-items-center"><span><?php echo getTranslation('Qualification', 27, 'label'); ?></span><img
                                                            src="./assets/images/question-icon.svg"
                                                            data-bs-toggle="tooltip"
                                                            title="<?php echo getTranslation('Qualification', 27, 'help'); ?>"
                                                            class="help-icon" alt="Icon" width="16"></label>
                                                    <div class="input-div">
                                                        <input type="text" name="documentDesc[]"
                                                            value="<?php echo $dTypeKey = (array_search('Tax Return', $DocumentTypes) !== false) ? $DocumentDescriptions[array_search('Tax Return', $DocumentTypes)] : ''; ?>"
                                                            class="form-control mt-1" id="taxReturnYears"
                                                            placeholder="<?php echo getTranslation('Qualification', 27, 'placeholder'); ?>">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 mb-3 pt-3">
                                            <div class="d-flex gap-3 check-input">
                                                <div>
                                                    <input class="form-check-input" type="checkbox"
                                                        id="birthCertChildern" name="documentType[]" <?php echo $dTypeCheck = (in_array('Childern Birth Certificate', $DocumentTypes)) ? 'checked' : ''; ?>
                                                        value="Childern Birth Certificate">
                                                </div>
                                                <div class="flex-grow-1">
                                                    <label for="birthCertNameDate"
                                                        class="form-label gap-1 d-flex align-items-center"><span><?php echo getTranslation('Qualification', 28, 'label'); ?></span><img
                                                            src="./assets/images/question-icon.svg"
                                                            data-bs-toggle="tooltip"
                                                            title="<?php echo getTranslation('Qualification', 28, 'help'); ?>"
                                                            class="help-icon" alt="Icon" width="16"></label>
                                                    <div class="input-div">
                                                        <input type="text" name="documentDesc[]"
                                                            value="<?php echo $dTypeKey = (array_search('Childern Birth Certificate', $DocumentTypes) !== false) ? $DocumentDescriptions[array_search('Childern Birth Certificate', $DocumentTypes)] : ''; ?>"
                                                            class="form-control mt-1" id="birthCertNameDate"
                                                            placeholder="<?php echo getTranslation('Qualification', 28, 'placeholder'); ?>">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 mb-3 pt-3">
                                            <div class="d-flex gap-3 check-input">
                                                <div>
                                                    <input class="form-check-input" type="checkbox" <?php echo $dTypeCheck = (in_array('W-2', $DocumentTypes)) ? 'checked' : ''; ?> value="W-2" id="w2" name="documentType[]">
                                                </div>
                                                <div class="flex-grow-1">
                                                    <label for="w2NameDate"
                                                        class="form-label gap-1 d-flex align-items-center"><span><?php echo getTranslation('Qualification', 29, 'label'); ?></span><img
                                                            src="./assets/images/question-icon.svg"
                                                            data-bs-toggle="tooltip"
                                                            title="<?php echo getTranslation('Qualification', 29, 'help'); ?>"
                                                            class="help-icon" alt="Icon" width="16"></label>
                                                    <div class="input-div">
                                                        <input type="text" name="documentDesc[]"
                                                            value="<?php echo $dTypeKey = (array_search('W-2', $DocumentTypes) !== false) ? $DocumentDescriptions[array_search('W-2', $DocumentTypes)] : ''; ?>"
                                                            class="form-control mt-1" id="w2NameDate"
                                                            placeholder="<?php echo getTranslation('Qualification', 29, 'placeholder'); ?>">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 mb-3 pt-3">
                                            <div class="d-flex gap-3 check-input">
                                                <div>
                                                    <input class="form-check-input" type="checkbox" <?php echo $dTypeCheck = (in_array('Driving License', $DocumentTypes)) ? 'checked' : ''; ?> value="Driving License" id="drivingLicense"
                                                        name="documentType[]">
                                                </div>
                                                <div class="flex-grow-1">
                                                    <label for="drivingLicenseStateExpiry"
                                                        class="form-label gap-1 d-flex align-items-center"><span><?php echo getTranslation('Qualification', 30, 'label'); ?></span><img
                                                            src="./assets/images/question-icon.svg"
                                                            data-bs-toggle="tooltip"
                                                            title="<?php echo getTranslation('Qualification', 30, 'help'); ?>"
                                                            class="help-icon" alt="Icon" width="16"></label>
                                                    <div class="input-div">
                                                        <input type="text" name="documentDesc[]"
                                                            value="<?php echo $dTypeKey = (array_search('Driving License', $DocumentTypes) !== false) ? $DocumentDescriptions[array_search('Driving License', $DocumentTypes)] : ''; ?>"
                                                            class="form-control mt-1" id="drivingLicenseStateExpiry"
                                                            placeholder="<?php echo getTranslation('Qualification', 30, 'placeholder'); ?>">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 mb-3 pt-3">
                                            <div class="d-flex gap-3 check-input">
                                                <div>
                                                    <input class="form-check-input" type="checkbox" <?php echo $dTypeCheck = (in_array('State ID', $DocumentTypes)) ? 'checked' : ''; ?> value="State ID" id="stateIDs" name="documentType[]">
                                                </div>
                                                <div class="flex-grow-1">
                                                    <label for="stateIDsNameNumber"
                                                        class="form-label gap-1 d-flex align-items-center"><span><?php echo getTranslation('Qualification', 31, 'label'); ?></span><img
                                                            src="./assets/images/question-icon.svg"
                                                            data-bs-toggle="tooltip"
                                                            title="<?php echo getTranslation('Qualification', 31, 'help'); ?>"
                                                            class="help-icon" alt="Icon" width="16"></label>
                                                    <div class="input-div">
                                                        <input type="text" name="documentDesc[]"
                                                            value="<?php echo $dTypeKey = (array_search('State ID', $DocumentTypes) !== false) ? $DocumentDescriptions[array_search('State ID', $DocumentTypes)] : ''; ?>"
                                                            class="form-control mt-1" id="stateIDsNameNumber"
                                                            placeholder="<?php echo getTranslation('Qualification', 31, 'placeholder'); ?>">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-start">
                                <div class="col-12">
                                    <div class="col-xl-9 col-lg-10 mb-3 pt-3">
                                        <div class="d-flex gap-3 check-input">
                                            <div>
                                                <input class="form-check-input" type="checkbox" <?php echo $dTypeCheck = (in_array('Other Documents', $DocumentTypes)) ? 'checked' : ''; ?> value="Other Documents" id="validateDoc"
                                                    name="documentType[]">
                                            </div>
                                            <div class="flex-grow-1">
                                                <label for="validateDocDesc"
                                                    class="form-label gap-1 d-flex align-items-center"><span><?php echo getTranslation('Qualification', 32, 'label'); ?></span><img
                                                        src="./assets/images/question-icon.svg" data-bs-toggle="tooltip"
                                                        title="<?php echo getTranslation('Qualification', 32, 'help'); ?>"
                                                        class="help-icon" alt="Icon" width="16"></label>
                                                <div class="input-div">
                                                    <textarea class="form-control mt-1" rows="5" name="documentDesc[]"
                                                        id="validateDocDesc"
                                                        placeholder="<?php echo getTranslation('Qualification', 32, 'placeholder'); ?>"><?php echo $dTypeKey = (array_search('Other Documents', $DocumentTypes) !== false) ? $DocumentDescriptions[array_search('Other Documents', $DocumentTypes)] : ''; ?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                    <div class="sec-7 mb-4">
                        <h3 class="form-sec-title text-center inter">
                            <?php echo getTranslation('Qualification', 65, 'label'); ?>
                        </h3>
                        <fieldset class="px-sm-5 px-4 py-4">
                            <!-- <div class="d-flex flex-column gap-5 mb-4 align-items-center">
                                <p class="text-center mb-0 text-black"><span class="text-red">IMPORTANT</span> Watch
                                    immigration lawyer Lic. Suriel explaining the importance of <strong>"Encounters with
                                        Law Enforcement Agencies"</strong></p>
                                <video controls preload="none" class="info-video" style="width: 390px;">
                                    <source src="./assets/video/sample-video.mp4" type="video/mp4">
                                </video>
                            </div> -->
                            <div class="text-center col-lg-8 mx-auto">
                                <p class="fw-medium text-black mt-5 inter">
                                    <span class="en">Document the 4 most serious encounter with the police, ICE, DEA,
                                        FBI or CIA. Only document unpaid parking or speeding tickets if they are
                                        unpaid.</span>
                                    <span class="es">Documente los 4 encuentros más graves con los policías, ICE, DEA,
                                        FBI o CIA. Sólo documente multas de estacionamiento o exceso de velocidad si no
                                        están pagadas.</span>
                                </p>
                            </div>
                            <div class="row justify-content-around">
                                <div class="col-12">
                                    <div class="table-responsive-lg mt-5">
                                        <table class="table foreign-table">
                                            <tr>
                                                <th>
                                                    <div class="d-flex flex-column align-items-center">
                                                        <span><?php echo getTranslation('Qualification', 78, 'label'); ?></span>
                                                        <img src="./assets/images/question-icon.svg"
                                                            data-bs-toggle="tooltip"
                                                            title="<?php echo getTranslation('Qualification', 78, 'help'); ?>"
                                                            class="help-icon" alt="Icon" width="16">
                                                    </div>
                                                </th>
                                                <th>
                                                    <div class="d-flex flex-column align-items-center">
                                                        <span><?php echo getTranslation('Qualification', 79, 'label'); ?></span>
                                                        <img src="./assets/images/question-icon.svg"
                                                            data-bs-toggle="tooltip"
                                                            title="<?php echo getTranslation('Qualification', 79, 'help'); ?>"
                                                            class="help-icon" alt="Icon" width="16">
                                                    </div>
                                                </th>
                                                <th>
                                                    <div class="d-flex flex-column align-items-center">
                                                        <span><?php echo getTranslation('Qualification', 80, 'label'); ?></span>
                                                        <img src="./assets/images/question-icon.svg"
                                                            data-bs-toggle="tooltip"
                                                            title="<?php echo getTranslation('Qualification', 80, 'help'); ?>"
                                                            class="help-icon" alt="Icon" width="16">
                                                    </div>
                                                </th>
                                                <th>
                                                    <div class="d-flex flex-column align-items-center">
                                                        <span><?php echo getTranslation('Qualification', 81, 'label'); ?></span>
                                                        <img src="./assets/images/question-icon.svg"
                                                            data-bs-toggle="tooltip"
                                                            title="<?php echo getTranslation('Qualification', 81, 'help'); ?>"
                                                            class="help-icon" alt="Icon" width="16">
                                                    </div>
                                                </th>
                                            </tr>
                                            <?php
                                            for ($ib = 0; $ib < 4; $ib++) {
                                                ?>
                                                <tr>
                                                    <td>
                                                        <input type="date" class="form-control table-input"
                                                            id="dateOfEncounter" name="dateOfEncounter[]"
                                                            value="<?php echo $dateOfEncounter = (sizeof($UsEncounters) > $ib && ($UsEncounters[$ib]['DateOfEncounter'] != '' && $UsEncounters[$ib]['DateOfEncounter'] != '1970-01-01')) ? $UsEncounters[$ib]['DateOfEncounter'] : ''; ?>">
                                                    </td>
                                                    <td>
                                                        <textarea name="stateCountryOfLegalEncounter[]"
                                                            class="form-control table-input"><?php echo $StateCountryOfLegalEncounter = (sizeof($UsEncounters) > $ib) ? $UsEncounters[$ib]['StateCountryOfLegalEncounter'] : ''; ?></textarea>
                                                    </td>
                                                    <td>
                                                        <textarea name="natureOfLegalIssue[]"
                                                            class="form-control table-input"><?php echo $NatureOfLegalIssue = (sizeof($UsEncounters) > $ib) ? $UsEncounters[$ib]['NatureOfLegalIssue'] : ''; ?></textarea>
                                                    </td>
                                                    <td>
                                                        <textarea name="issueDescription[]"
                                                            class="form-control table-input"><?php echo $Description = (sizeof($UsEncounters) > $ib) ? $UsEncounters[$ib]['Description'] : ''; ?></textarea>
                                                    </td>
                                                </tr>
                                                <?php
                                            }
                                            ?>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                    <div class="sec-8 mb-4">
                        <h3 class="form-sec-title text-center inter">
                            <?php echo getTranslation('Qualification', 66, 'label'); ?>
                        </h3>
                        <fieldset class="px-sm-3 px-3 py-4">
                            <div class="d-flex flex-column gap-5 mb-4 align-items-center">
                                <p class="text-center mb-0 text-black"><span class="text-red">IMPORTANT</span> Watch
                                    immigration lawyer Lic. Suriel explaining the importance of <strong>"Foreign Born
                                        Children Seeking PIPE Benefits"</strong></p>
                                <iframe src="https://drive.google.com/file/d/14yvdsI0-jAjALBf6fdCyysL1zMjrrIEX/preview"
                                    class="info-video" style="width: 390px;" allow="autoplay"></iframe>
                            </div>
                            <div class="table-responsive-lg mt-5">
                                <script>let childGenders = ['', '', ''];</script>
                                <table class="table foreign-table">
                                    <tr>
                                        <th>
                                            <div class="d-flex flex-column align-items-center">
                                                <span><?php echo getTranslation('Qualification', 33, 'label'); ?></span>
                                                <img src="./assets/images/question-icon.svg" data-bs-toggle="tooltip"
                                                    title="<?php echo getTranslation('Qualification', 33, 'help'); ?>"
                                                    class="help-icon" alt="Icon" width="16">
                                            </div>
                                        </th>
                                        <th>
                                            <div class="d-flex flex-column align-items-center">
                                                <span><?php echo getTranslation('Qualification', 34, 'label'); ?></span>
                                                <img src="./assets/images/question-icon.svg" data-bs-toggle="tooltip"
                                                    title="<?php echo getTranslation('Qualification', 34, 'help'); ?>"
                                                    class="help-icon" alt="Icon" width="16">
                                            </div>
                                        </th>
                                        <th>
                                            <div class="d-flex flex-column align-items-center">
                                                <span><?php echo getTranslation('Qualification', 35, 'label'); ?></span>
                                                <img src="./assets/images/question-icon.svg" data-bs-toggle="tooltip"
                                                    title="<?php echo getTranslation('Qualification', 35, 'help'); ?>"
                                                    class="help-icon" alt="Icon" width="16">
                                            </div>
                                        </th>
                                        <th>
                                            <div class="d-flex flex-column align-items-center">
                                                <span><?php echo getTranslation('Qualification', 36, 'label'); ?></span>
                                                <img src="./assets/images/question-icon.svg" data-bs-toggle="tooltip"
                                                    title="<?php echo getTranslation('Qualification', 36, 'help'); ?>"
                                                    class="help-icon" alt="Icon" width="16">
                                            </div>
                                        </th>
                                        <th>
                                            <div class="d-flex flex-column align-items-center">
                                                <span><?php echo getTranslation('Qualification', 37, 'label'); ?></span>
                                                <img src="./assets/images/question-icon.svg" data-bs-toggle="tooltip"
                                                    title="<?php echo getTranslation('Qualification', 37, 'help'); ?>"
                                                    class="help-icon" alt="Icon" width="16">
                                            </div>
                                        </th>
                                        <th>
                                            <div class="d-flex flex-column align-items-center">
                                                <span><?php echo getTranslation('Qualification', 38, 'label'); ?></span>
                                                <img src="./assets/images/question-icon.svg" data-bs-toggle="tooltip"
                                                    title="<?php echo getTranslation('Qualification', 38, 'help'); ?>"
                                                    class="help-icon" alt="Icon" width="16">
                                            </div>
                                        </th>
                                        <th>
                                            <div class="d-flex flex-column align-items-center">
                                                <span><?php echo getTranslation('Qualification', 39, 'label'); ?></span>
                                                <img src="./assets/images/question-icon.svg" data-bs-toggle="tooltip"
                                                    title="<?php echo getTranslation('Qualification', 39, 'help'); ?>"
                                                    class="help-icon" alt="Icon" width="16">
                                            </div>
                                        </th>
                                        <th>
                                            <div class="d-flex flex-column align-items-center">
                                                <span><?php echo getTranslation('Qualification', 40, 'label'); ?></span>
                                                <img src="./assets/images/question-icon.svg" data-bs-toggle="tooltip"
                                                    title="<?php echo getTranslation('Qualification', 40, 'help'); ?>"
                                                    class="help-icon" alt="Icon" width="16">
                                            </div>
                                        </th>
                                    </tr>
                                    <?php
                                    for ($ia = 0; $ia < 5; $ia++) {
                                        ?>
                                        <tr>
                                            <td>
                                                <textarea name="childFullLegalName[]"
                                                    class="form-control table-input"><?php echo $fullLegalName = (sizeof($Offsprings) > $ia) ? $Offsprings[$ia]['fullLegalName'] : ''; ?></textarea>
                                            </td>
                                            <td>
                                                <input type="date" name="childBirthday[]"
                                                    class="form-control table-input date"
                                                    value="<?php echo $childBirthday = (sizeof($Offsprings) > $ia && ($Offsprings[$ia]['birthday'] != '1970-01-01')) ? $Offsprings[$ia]['birthday'] : ''; ?>">
                                            </td>
                                            <td>
                                                <textarea name="childStateCountryOfBirth[]"
                                                    class="form-control table-input"><?php echo $stateCountryOfBirth = (sizeof($Offsprings) > $ia) ? $Offsprings[$ia]['stateCountryOfBirth'] : ''; ?></textarea>
                                            </td>
                                            <td>
                                                <textarea name="childMothersName[]"
                                                    class="form-control table-input"><?php echo $mothersName = (sizeof($Offsprings) > $ia) ? $Offsprings[$ia]['mothersName'] : ''; ?></textarea>
                                            </td>
                                            <td>
                                                <textarea name="childFathersName[]"
                                                    class="form-control table-input"><?php echo $fathersName = (sizeof($Offsprings) > $ia) ? $Offsprings[$ia]['fathersName'] : ''; ?></textarea>
                                            </td>
                                            <td>
                                                <select name="childGender[]"
                                                    class="childGender table-input form-control c-select">
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>
                                                </select>
                                            </td>
                                            <td>
                                                <textarea name="childSchoolDetails[]"
                                                    class="form-control table-input"><?php echo $schoolDetails = (sizeof($Offsprings) > $ia) ? $Offsprings[$ia]['schoolDetails'] : ''; ?></textarea>
                                            </td>
                                            <td>
                                                <div
                                                    class="form-check d-flex align-items-center gap-1 justify-content-center">
                                                    <input class="form-check-input" type="checkbox" value="Yes" <?php echo $schoolRecord = (sizeof($Offsprings) > $ia && $Offsprings[$ia]['accessToSchoolRecords'] == 'Yes') ? 'checked' : ''; ?> id="accessSchoolsRecords1" name="childAccessToSchoolRecords[]">
                                                    <label class="form-check-label" for="accessSchoolsRecords1"> Yes</label>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php

                                        $childGender = (sizeof($Offsprings) > $ia) ? $Offsprings[$ia]['gender'] : '';
                                        echo '<script>childGenders[' . $ia . '] = "' . $childGender . '"</script>';
                                    }
                                    ?>
                                </table>
                            </div>
                        </fieldset>
                    </div>
                    <div class="sec-9 mb-4">
                        <h3
                            class="form-sec-title text-center inter d-flex align-items-center justify-content-center gap-2">
                            <span><?php echo getTranslation('Qualification', 67, 'label'); ?></span>
                            <small>(Optional)</small>
                        </h3>
                        <fieldset class="px-sm-5 px-4 py-4">
                            <!-- <div class="d-flex flex-column gap-5 mb-4 align-items-center">
                                <p class="text-center mb-0 text-black"><span class="text-red">IMPORTANT</span> Watch
                                    immigration lawyer Lic. Suriel explaining the importance of
                                    <strong>"Occupation/Employment"</strong></p>
                                <video controls preload="none" class="info-video" style="width: 390px;">
                                    <source src="./assets/video/sample-video.mp4" type="video/mp4">
                                </video>
                            </div> -->
                            <div class="row justify-content-around">
                                <div class="col-xl-5 col-lg-6">
                                    <div class="row">
                                        <div class="col-12 mb-3 pt-3">
                                            <label for="empName"
                                                class="form-label gap-1 d-flex align-items-center"><span><?php echo getTranslation('Qualification', 41, 'label'); ?></span><img
                                                    src="./assets/images/question-icon.svg" data-bs-toggle="tooltip"
                                                    title="<?php echo getTranslation('Qualification', 41, 'help'); ?>"
                                                    class="help-icon" alt="Icon" width="16"></label>
                                            <div class="input-div">
                                                <input type="text" class="form-control mt-1" id="employerName"
                                                    name="employerName[]" value="<?php echo $employerName; ?>"
                                                    placeholder="<?php echo getTranslation('Qualification', 41, 'placeholder'); ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-5 col-lg-6">
                                    <div class="row">
                                        <div class="col-12 mb-3 pt-3">
                                            <label for="empAddress"
                                                class="form-label gap-1 d-flex align-items-center"><span><?php echo getTranslation('Qualification', 42, 'label'); ?></span><img
                                                    src="./assets/images/question-icon.svg" data-bs-toggle="tooltip"
                                                    title="<?php echo getTranslation('Qualification', 42, 'help'); ?>"
                                                    class="help-icon" alt="Icon" width="16"></label>
                                            <div class="input-div">
                                                <input type="text" class="form-control mt-1" id="employerAddress"
                                                    name="employerAddress[]" value="<?php echo $employerAddress; ?>"
                                                    placeholder="<?php echo getTranslation('Qualification', 42, 'placeholder'); ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-5 col-lg-6">
                                    <div class="row">
                                        <div class="col-12 mb-3 pt-3">
                                            <label for="startDate"
                                                class="form-label gap-1 d-flex align-items-center"><span><?php echo getTranslation('Qualification', 43, 'label'); ?></span><img
                                                    src="./assets/images/question-icon.svg" data-bs-toggle="tooltip"
                                                    title="<?php echo getTranslation('Qualification', 43, 'help'); ?>"
                                                    class="help-icon" alt="Icon" width="16"></label>
                                            <div class="input-div">
                                                <input type="date" class="form-control mt-1" id="startDate"
                                                    name="startDate[]"
                                                    value="<?php echo $startDate = (!empty($startDate) && $startDate != '1970-01-01') ? $startDate : ''; ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-5 col-lg-6">
                                    <div class="row">
                                        <div class="col-12 mb-3 pt-3">
                                            <label for="jobTitle"
                                                class="form-label gap-1 d-flex align-items-center"><span><?php echo getTranslation('Qualification', 45, 'label'); ?></span><img
                                                    src="./assets/images/question-icon.svg" data-bs-toggle="tooltip"
                                                    title="<?php echo getTranslation('Qualification', 45, 'help'); ?>"
                                                    class="help-icon" alt="Icon" width="16"></label>
                                            <div class="input-div">
                                                <input type="text" class="form-control mt-1" id="jobTitle"
                                                    name="jobTitle[]" value="<?php echo $jobTitle; ?>"
                                                    placeholder="<?php echo getTranslation('Qualification', 45, 'placeholder'); ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-5 col-lg-6">
                                    <div class="row">
                                        <div class="col-12 mb-3 pt-3">
                                            <label for="lastDate"
                                                class="form-label gap-1 d-flex align-items-center"><span><?php echo getTranslation('Qualification', 44, 'label'); ?></span><img
                                                    src="./assets/images/question-icon.svg" data-bs-toggle="tooltip"
                                                    title="<?php echo getTranslation('Qualification', 44, 'help'); ?>"
                                                    class="help-icon" alt="Icon" width="16"></label>
                                            <div class="input-div">
                                                <input type="date" class="form-control mt-1" id="lastDate"
                                                    name="jobLastDate[]"
                                                    value="<?php echo $jobLastDate = ($jobLastDate != '' && $jobLastDate != '1970-01-01') ? $jobLastDate : ''; ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-5 col-lg-6">
                                    <div class="row">
                                        <div class="col-12 mb-3 pt-3">
                                            <label for="jobDescription"
                                                class="form-label gap-1 d-flex align-items-center"><span><?php echo getTranslation('Qualification', 46, 'label'); ?></span><img
                                                    src="./assets/images/question-icon.svg" data-bs-toggle="tooltip"
                                                    title="<?php echo getTranslation('Qualification', 46, 'help'); ?>"
                                                    class="help-icon" alt="Icon" width="16"></label>
                                            <div class="input-div">
                                                <textarea class="form-control mt-1" rows="5" id="jobDescription"
                                                    name="jobDescription[]"
                                                    placeholder="<?php echo getTranslation('Qualification', 46, 'placeholder'); ?>"><?php echo $jobDescription; ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- <div class="col-xl-5 col-lg-6"></div> -->
                                <!-- <div class="col-xl-5 col-lg-6">
                                    <div class="row">
                                        <div class="col-12 mb-3 pt-3 text-end">
                                            <p
                                                class="d-flex gap-1 justify-content-end align-items-center more-encounters text-primary">
                                                <img src="./assets/images/plus.svg" class="help-icon" alt="Icon"
                                                    width="13"><span>Employment</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-5 col-lg-6"></div> -->
                            </div>
                        </fieldset>
                    </div>
                    <div class="sec-10 mb-4">
                        <h3
                            class="form-sec-title text-center inter d-flex align-items-center justify-content-center gap-2">
                            <span><?php echo getTranslation('Qualification', 68, 'label'); ?></span>
                            <small>(Optional)</small>
                        </h3>
                        <fieldset class="px-sm-5 px-4 py-4">
                            <!-- <div class="d-flex flex-column gap-5 mb-4 align-items-center">
                                <p class="text-center mb-0 text-black"><span class="text-red">IMPORTANT</span> Watch
                                    immigration lawyer Lic. Suriel explaining the importance of <strong>"Education
                                        Craft"</strong></p>
                                <video controls preload="none" class="info-video" style="width: 390px;">
                                    <source src="./assets/video/sample-video.mp4" type="video/mp4">
                                </video>
                            </div> -->
                            <div class="text-center col-xl-6 col-lg-8 mx-auto">
                                <p class="fw-medium text-black mt-5 inter">Describe your higher educational background,
                                    including any certifications or degrees from higher education institution</p>
                            </div>
                            <div class="row justify-content-around">
                                <div class="col-xl-5 col-lg-6">
                                    <div class="row">
                                        <div class="col-12 mb-3 pt-3">
                                            <label for="CertificationDegree"
                                                class="form-label gap-1 d-flex align-items-center"><span><?php echo getTranslation('Qualification', 47, 'label'); ?></span><img
                                                    src="./assets/images/question-icon.svg" data-bs-toggle="tooltip"
                                                    title="<?php echo getTranslation('Qualification', 47, 'help'); ?>"
                                                    class="help-icon" alt="Icon" width="16"></label>
                                            <div class="input-div">
                                                <input type="text" class="form-control mt-1" id="certificationDegree"
                                                    name="certificationDegree"
                                                    value="<?php echo $certificationDegree; ?>"
                                                    placeholder="lorum ipsum">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-5 col-lg-6">
                                    <div class="row">
                                        <div class="col-12 mb-3 pt-3">
                                            <label for="eduUniversity"
                                                class="form-label gap-1 d-flex align-items-center"><span><?php echo getTranslation('Qualification', 48, 'label'); ?></span><img
                                                    src="./assets/images/question-icon.svg" data-bs-toggle="tooltip"
                                                    title="<?php echo getTranslation('Qualification', 48, 'help'); ?>"
                                                    class="help-icon" alt="Icon" width="16"></label>
                                            <div class="input-div">
                                                <input type="text" class="form-control mt-1" id="degreeUniversity"
                                                    name="degreeUniversity" value="<?php echo $degreeUniversity; ?>"
                                                    placeholder="university of New york">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-5 col-lg-6">
                                    <div class="row">
                                        <div class="col-12 mb-3 pt-3">
                                            <label for="degreeDate"
                                                class="form-label gap-1 d-flex align-items-center"><span><?php echo getTranslation('Qualification', 49, 'label'); ?></span><img
                                                    src="./assets/images/question-icon.svg" data-bs-toggle="tooltip"
                                                    title="<?php echo getTranslation('Qualification', 49, 'help'); ?>"
                                                    class="help-icon" alt="Icon" width="16"></label>
                                            <div class="input-div">
                                                <input type="date" class="form-control mt-1" id="degreeDate"
                                                    name="degreeDate"
                                                    value="<?php echo $date = ($degreeDate != '' && $degreeDate != '1970-01-01') ? $degreeDate : ''; ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-5 col-lg-6">
                                    <div class="row">
                                        <div class="col-12 mb-3 pt-3">
                                            <label for="jobTitle"
                                                class="form-label gap-1 d-flex align-items-center"><span><?php echo getTranslation('Qualification', 50, 'label'); ?></span><img
                                                    src="./assets/images/question-icon.svg" data-bs-toggle="tooltip"
                                                    title="<?php echo getTranslation('Qualification', 50, 'help'); ?>"
                                                    class="help-icon" alt="Icon" width="16"></label>
                                            <div class="input-div">
                                                <input type="text" class="form-control mt-1" id="degreeStateAndCountry"
                                                    name="degreeStateAndCountry"
                                                    value="<?php echo $degreeStateAndCountry; ?>"
                                                    placeholder="New York, United States">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                    <div class="sec-11 mb-4">
                        <h3
                            class="form-sec-title text-center inter d-flex align-items-center justify-content-center gap-2">
                            <span><?php echo getTranslation('Qualification', 69, 'label'); ?></span>
                        </h3>
                        <fieldset class="px-sm-5 px-4 py-4">
                            <div class="d-flex flex-column gap-5 mb-4 align-items-center">
                                <iframe src="https://drive.google.com/file/d/150KswB5PIXtEE3NOTxDMe7ZFdWkwW8tC/preview"
                                    class="info-video" style="width: 390px;" allow="autoplay"></iframe>
                            </div>
                            <div class="row justify-content-around">
                                <div class="col-xl-5 col-lg-6">
                                    <div class="row">
                                        <div class="col-12 mb-3 pt-3 check-input">
                                            <label for="chooseDisease"
                                                class="form-label gap-1 d-flex align-items-start"><span><?php echo getTranslation('Qualification', 51, 'label'); ?></span><input
                                                    class="form-check-input" <?php echo $diseaseCheck = $anyCommunicableDisease !== '' ? 'checked' : ''; ?>
                                                    type="checkbox" value="Yes" id="anyDisease" name="anyDisease"><img
                                                    src="./assets/images/question-icon.svg" data-bs-toggle="tooltip"
                                                    title="<?php echo getTranslation('Qualification', 51, 'help'); ?>"
                                                    class="help-icon" alt="Icon" width="16"></label>
                                            <div class="input-div">
                                                <select class="form-control mt-1" id="chooseDisease"
                                                    name="anyCommunicableDisease">
                                                    <option value="tuberculosis">Tuberculosis</option>
                                                    <option value="leprosy">Leprosy</option>
                                                    <option value="syphilis">Syphilis</option>
                                                    <option value="gonorrhea">Gonorrhea</option>
                                                    <option value="chancroid">Chancroid</option>
                                                    <option value="granuloma-inguinale">Granuloma Inguinale
                                                        (Donovanosis)</option>
                                                    <option value="lymphogranuloma-venereum">Lymphogranuloma Venereum
                                                    </option>
                                                    <option value="covid-19">COVID-19</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-5 col-lg-6">
                                    <div class="row">
                                        <div class="col-12 mb-3 pt-3 check-input">
                                            <label for="missingVaccineText"
                                                class="form-label gap-1 d-flex align-items-center"><span><?php echo getTranslation('Qualification', 55, 'label'); ?>
                                                </span><input class="form-check-input" <?php echo $diseaseCheck = $anyMissingVaccines !== '' ? 'checked' : ''; ?>
                                                    type="checkbox" value="Yes" id="missingVaccine"
                                                    name="missingVaccine"><img src="./assets/images/question-icon.svg"
                                                    data-bs-toggle="tooltip"
                                                    title="<?php echo getTranslation('Qualification', 55, 'help'); ?>"
                                                    class="help-icon" alt="Icon" width="16"></label>
                                            <div class="input-div">
                                                <select class="form-control mt-1" id="anyMissingVaccines"
                                                    name="anyMissingVaccines">
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-5 col-lg-6">
                                    <div class="row">
                                        <div class="col-12 mb-3 pt-3 check-input">
                                            <label for="mentalDisorderChoose"
                                                class="form-label gap-1 d-flex align-items-start"><span><?php echo getTranslation('Qualification', 52, 'label'); ?></span><input
                                                    class="form-check-input" <?php echo $diseaseCheck = $anyMentalDisorder !== '' ? 'checked' : ''; ?> type="checkbox" value="Yes"
                                                    id="mentalDisorder" name="mentalDisorder"><img
                                                    src="./assets/images/question-icon.svg" data-bs-toggle="tooltip"
                                                    title="<?php echo getTranslation('Qualification', 52, 'help'); ?>"
                                                    class="help-icon" alt="Icon" width="16"></label>
                                            <div class="input-div">
                                                <select class="form-control mt-1" id="mentalDisorderChoose"
                                                    name="anyMentalDisorder">
                                                    <option value="Schizophrenia">Schizophrenia</option>
                                                    <option value="Bipolar Disorder">Bipolar Disorder</option>
                                                    <option value="Major Depressive Disorder with Psychotic Features">
                                                        Major Depressive Disorder with Psychotic Features</option>
                                                    <option value="Antisocial Personality Disorder">Antisocial
                                                        Personality Disorder</option>
                                                    <option value="Substance Use Disorders">Substance Use Disorders
                                                    </option>
                                                    <option value="Psychotic Disorders">Psychotic Disorders</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-5 col-lg-6">
                                    <div class="row">
                                        <div class="col-12 mb-3 pt-3">
                                            <label for="accusedDrugText"
                                                class="form-label gap-1 d-flex align-items-center"><span><?php echo getTranslation('Qualification', 56, 'label'); ?></span><img
                                                    src="./assets/images/question-icon.svg" data-bs-toggle="tooltip"
                                                    title="<?php echo getTranslation('Qualification', 56, 'help'); ?>"
                                                    class="help-icon" alt="Icon" width="16"></label>
                                            <div class="input-div">
                                                <input type="text" class="form-control mt-1" id="accusedDrugText"
                                                    name="accusedDrugAddiction"
                                                    value="<?php echo $accusedDrugAddiction; ?>"
                                                    placeholder="<?php echo getTranslation('Qualification', 56, 'placeholder'); ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-5 col-lg-6">
                                    <div class="row">
                                        <div class="col-12 mb-3 pt-3">
                                            <label for="accusedChildAbduction"
                                                class="form-label gap-1 d-flex align-items-center"><span><?php echo getTranslation('Qualification', 53, 'label'); ?></span><img
                                                    src="./assets/images/question-icon.svg" data-bs-toggle="tooltip"
                                                    title="<?php echo getTranslation('Qualification', 53, 'help'); ?>"
                                                    class="help-icon" alt="Icon" width="16"></label>
                                            <div class="input-div">
                                                <input type="text" class="form-control mt-1" id="accusedChildAbduction"
                                                    name="accusedChildAbduction"
                                                    value="<?php echo $accusedChildAbduction; ?>"
                                                    placeholder="<?php echo getTranslation('Qualification', 56, 'placeholder'); ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-5 col-lg-6">
                                    <div class="row">
                                        <div class="col-12 mb-3 pt-3">
                                            <label for="deportedFromUS"
                                                class="form-label gap-1 d-flex align-items-center"><span><?php echo getTranslation('Qualification', 57, 'label'); ?></span><img
                                                    src="./assets/images/question-icon.svg" data-bs-toggle="tooltip"
                                                    title="<?php echo getTranslation('Qualification', 57, 'help'); ?>"
                                                    class="help-icon" alt="Icon" width="16"></label>
                                            <div class="input-div">
                                                <input type="text" class="form-control mt-1" id="deportedFromUS"
                                                    name="deportedFromUS" value="<?php echo $deportedFromUS; ?>"
                                                    placeholder="<?php echo getTranslation('Qualification', 56, 'placeholder'); ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-5 col-lg-6">
                                    <div class="row">
                                        <div class="col-12 mb-3 pt-3">
                                            <label for="citizenshipAfter96"
                                                class="form-label gap-1 d-flex align-items-center"><span><?php echo getTranslation('Qualification', 54, 'label'); ?></span><img
                                                    src="./assets/images/question-icon.svg" data-bs-toggle="tooltip"
                                                    title="<?php echo getTranslation('Qualification', 54, 'help'); ?>"
                                                    class="help-icon" alt="Icon" width="16"></label>
                                            <div class="input-div">
                                                <input type="text" class="form-control mt-1" id="citizenshipAfter96"
                                                    name="citizenshipAfter96" value="<?php echo $citizenshipAfter96; ?>"
                                                    placeholder="<?php echo getTranslation('Qualification', 56, 'placeholder'); ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-5 col-lg-6">
                                    <div class="row">
                                        <div class="col-12 mb-3 pt-3">
                                            <label for="electionsVoted"
                                                class="form-label gap-1 d-flex align-items-center"><span><?php echo getTranslation('Qualification', 58, 'label'); ?></span><img
                                                    src="./assets/images/question-icon.svg" data-bs-toggle="tooltip"
                                                    title="<?php echo getTranslation('Qualification', 58, 'help'); ?>"
                                                    class="help-icon" alt="Icon" width="16"></label>
                                            <div class="input-div">
                                                <input type="text" class="form-control mt-1" id="electionsVoted"
                                                    name="electionsVoted" value="<?php echo $electionsVoted; ?>"
                                                    placeholder="<?php echo getTranslation('Qualification', 56, 'placeholder'); ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-5 col-lg-6"></div>
                                <div class="col-xl-5 col-lg-6">
                                    <div class="row">
                                        <div class="col-12 mb-3 pt-3">
                                            <label for="capacityToSupport"
                                                class="form-label gap-1 d-flex align-items-center"><span><?php echo getTranslation('Qualification', 82, 'label'); ?></span><img
                                                    src="./assets/images/question-icon.svg" data-bs-toggle="tooltip"
                                                    title="<?php echo getTranslation('Qualification', 82, 'help'); ?>"
                                                    class="help-icon" alt="Icon" width="16"></label>
                                            <div class="input-div">
                                                <textarea class="form-control mt-1" rows="5" id="capacityToSupport"
                                                    name="capacityToSupport"
                                                    placeholder="<?php echo getTranslation('Qualification', 82, 'placeholder'); ?>"><?php echo $capacityToSupport; ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                    <div class="text-center col-lg-6 mx-auto">
                        <p class="end-note"><span class="en">"If you have any questions, not answered by out (?), please
                                add them below or email us at </span><span class="es">"Si hay alguna pregunta que no ha
                                podido responder o necesita alguna aclaración, agréguela en el espacio a continuación o
                                envíanos un correo a </span> <br><span class="en"><a
                                    href="mailto:<?php echo getSystemDataValue('emailforSupport') ?>">"<?php echo getSystemDataValue('emailforSupport') ?>"</a></span><span
                                class="es"><a
                                    href="mailto:<?php echo getSystemDataValue('emailforSupportEspañol') ?>">"<?php echo getSystemDataValue('emailforSupportEspañol') ?>"</a></span>
                        </p>
                    </div>
                    <div class="col-xl-9 col-lg-10 mx-auto mt-5">
                        <div class="input-div">
                            <textarea name="otherQuestions" id="other" class="form-control" rows="8"
                                placeholder="<?php echo getTranslation('Qualification', 81, 'placeholder'); ?>"><?php echo $otherQuestions; ?></textarea>
                        </div>
                    </div>
                    <div class="text-center my-4">
                        <div id="response"></div>
                        <button class="btn btn-rectangle btn-primary"><span class="en">Submit</span><span
                                class="es">Entregar</span><img src="./assets/images/RightIcon.svg" alt="Icon"
                                height="16"></button>
                    </div>
                </form>
            </div>
        </main>
    </body>

    <body>
        <script src="./assets/js/jquery-3.6.1.min.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
        <script src="./assets/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.21.0/jquery.validate.min.js"
            integrity="sha512-KFHXdr2oObHKI9w4Hv1XPKc898mE4kgYx58oqsc/JqqdLMDI4YjOLzom+EMlW8HFUd0QfjfAvxSL6sEq/a42fQ=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBffT74mo5XglwbbcSJ08wZl5F1WkyQhVw&libraries=places"></script>
        <script src="./assets/js/script.js?v=8"></script>
        <script>
            let currentLang = '<?php echo getLanguage(); ?>';
            function updateFormControls() {
                $('.check-input').each(function () {
                    // Check if any checkbox in the current .check-input div is checked
                    var isChecked = $(this).find('.form-check-input').is(':checked');

                    // Enable or disable the .form-control based on checkbox status
                    $(this).find('.form-control').prop('disabled', !isChecked);
                    $(this).find('.form-control').prop('required', isChecked);
                });
            }
            $(function () {
                // $(".date").datepicker({
                //     changeYear: true,
                //     changeMonth: true,
                //     dateFormat: "mm/dd/yy",
                //     yearRange: "-100:+0", // Adjust the year range as needed
                // });
                // $(".date").on("change", function () {
                //     $(this).valid();
                // });
                // $(".calendar").click(function () {
                //     $(this).siblings('.date').datepicker("show");
                // });
            });

            $(document).ready(function () {
                // let inputs = document.querySelectorAll('.phone-number');
                // for (let i = 0; i < inputs.length; i++) {
                //     window.intlTelInput(inputs[i], {
                //         separateDialCode: true
                //     });
                // }
                const communicableDiseases = {
                    english: [
                        "Tuberculosis",
                        "Leprosy",
                        "Syphilis",
                        "Gonorrhea",
                        "Chancroid",
                        "Granuloma Inguinale (Donovanosis)",
                        "Lymphogranuloma Venereum",
                        "COVID-19"
                    ],
                    spanish: [
                        "Tuberculosis: Particularmente tuberculosis pulmonar activa",
                        "Lepra: Etapa infecciosa",
                        "Sífilis: Etapa infecciosa",
                        "Gonorrea ",
                        "Chancroide ",
                        "Granuloma inguinal ",
                        "Linfogranuloma venéreo ",
                        "COVID-19: Según lo declarado por los CDC bajo ciertas condiciones"
                    ]
                };
                // Function to get both English and Spanish versions of a communicable disease

                function getCommunicableDiseasesVersion(diseaseName) {
                    const englishIndex = communicableDiseases.english.indexOf(diseaseName);
                    const spanishIndex = communicableDiseases.spanish.indexOf(diseaseName);

                    if (englishIndex !== -1 && spanishIndex === -1) {
                        // Find corresponding Spanish name
                        const spanishName = communicableDiseases.spanish[englishIndex] || 'Not found';
                        return [diseaseName, spanishName];
                    } else if (spanishIndex !== -1 && englishIndex === -1) {
                        // Find corresponding English name
                        const englishName = communicableDiseases.english[spanishIndex] || 'Not found';
                        return [englishName, diseaseName];
                    } else if (englishIndex !== -1 && spanishIndex !== -1) {
                        // Both names are available
                        return [diseaseName, communicableDiseases.spanish[englishIndex]];
                    } else {
                        // Not found in either list
                        return ['Not found', 'Not found'];
                    }
                }

                function populateCommunicableDiseases(currentLang) {
                    const selectElement = $('#chooseDisease');

                    // Clear existing options
                    selectElement.empty();

                    // Get options based on currentLang
                    const options = currentLang === 'spanish'
                        ? communicableDiseases.spanish
                        : communicableDiseases.english;

                    // Add options to Select2
                    options.forEach(option => {
                        selectElement.append(new Option(option, option));
                    });

                    // Initialize Select2
                    selectElement.select2();
                }

                const mentalHealthDisorders = {
                    english: [
                        "Schizophrenia",
                        "Bipolar Disorder",
                        "Major Depressive Disorder with Psychotic Features",
                        "Antisocial Personality Disorder",
                        "Substance Use Disorders",
                        "Psychotic Disorders",
                        "Mood Disorders with Harmful Associated Behavior"  // Added missing English term
                    ],
                    spanish: [
                        "Esquizofrenia",
                        "Trastorno Bipolar",
                        "Trastorno Depresivo Mayor con Características Psicóticas",
                        "Trastorno de Personalidad Antisocial",
                        "Trastornos por Uso de Sustancias",
                        "Trastornos Psicóticos",
                        "Trastornos del Estado de Ánimo con Comportamiento Asociado Nocivo"  // Corresponding Spanish term
                    ]
                };


                function populateMentalHealth(currentLang) {
                    const selectElement = $('#mentalDisorderChoose');

                    // Clear existing options
                    selectElement.empty();

                    // Get options based on currentLang
                    const options = mentalHealthDisorders[currentLang] || [];

                    // Add options to Select2
                    options.forEach(option => {
                        selectElement.append(new Option(option, option));
                    });

                    // Initialize Select2
                    selectElement.select2();
                }

                // Function to get both English and Spanish versions of a mental health disorder
                function getMentalDisordersVersions(disorderName) {
                    const englishIndex = mentalHealthDisorders.english.indexOf(disorderName);
                    const spanishIndex = mentalHealthDisorders.spanish.indexOf(disorderName);

                    if (englishIndex !== -1 && spanishIndex === -1) {
                        // Find corresponding Spanish name
                        const spanishName = mentalHealthDisorders.spanish[englishIndex] || 'Not found';
                        return [disorderName, spanishName];
                    } else if (spanishIndex !== -1 && englishIndex === -1) {
                        // Find corresponding English name
                        const englishName = mentalHealthDisorders.english[spanishIndex] || 'Not found';
                        return [englishName, disorderName];
                    } else if (englishIndex !== -1 && spanishIndex !== -1) {
                        // Both names are available
                        return [disorderName, mentalHealthDisorders.spanish[englishIndex]];
                    } else {
                        // Not found in either list
                        return ['Not found', 'Not found'];
                    }
                }

                const vaccines = {
                    english: [
                        "Measles",
                        "Mumps",
                        "Rubella",
                        "Polio",
                        "Tetanus and Diphtheria Toxoids",
                        "Pertussis",
                        "Haemophilus Influenzae Type B (Hib)",
                        "Hepatitis A",
                        "Hepatitis B",
                        "Rotavirus",
                        "Meningococcal Disease",
                        "Varicella (Chickenpox)",
                        "Pneumococcal Disease",
                        "Seasonal Influenza (Flu)"
                    ],
                    spanish: [
                        "Sarampión",
                        "Paperas",
                        "Rubéola",
                        "Polio",
                        "Tétanos y Difteria Toxoides",
                        "Tos ferina",
                        "Haemophilus Influenzae Tipo B (Hib)",
                        "Hepatitis A",
                        "Hepatitis B",
                        "Rotavirus",
                        "Enfermedad Meningocócica",
                        "Varicela (Chickenpox)",
                        "Enfermedad Neumocócica",
                        "Influenza Estacional (Gripe)"
                    ]
                };


                // Function to get both English and Spanish versions of a mental health disorder
                function getVaccineVersions(vaccineName) {
                    const englishIndex = vaccines.english.indexOf(vaccineName);
                    const spanishIndex = vaccines.spanish.indexOf(vaccineName);

                    if (englishIndex !== -1 && spanishIndex === -1) {
                        // Find corresponding Spanish name
                        const spanishName = vaccines.spanish[englishIndex] || 'Not found';
                        return [vaccineName, spanishName];
                    } else if (spanishIndex !== -1 && englishIndex === -1) {
                        // Find corresponding English name
                        const englishName = vaccines.english[spanishIndex] || 'Not found';
                        return [englishName, vaccineName];
                    } else if (englishIndex !== -1 && spanishIndex !== -1) {
                        // Both names are available
                        return [vaccineName, vaccines.spanish[englishIndex]];
                    } else {
                        // Not found in either list
                        return ['Not found', 'Not found'];
                    }
                    $('input[type="date"]').datepicker({
                        changeYear: true,
                        changeMonth: true,
                        dateFormat: "mm/dd/yy",
                        yearRange: "-100:+0", // Adjust the year range as needed
                    });
                    $('input[type="date"]').on("change", function () {
                        $(this).valid();
                    });
                }

                function populateVaccines(currentLang) {
                    const selectElement = $('#anyMissingVaccines');
                    // currentLang = currentLang.toUpperCase();

                    // Clear existing options
                    selectElement.empty();

                    // Get options based on currentLang
                    const options = vaccines[currentLang] || [];
                    console.log(options, currentLang);
                    // Add options to Select2
                    options.forEach(option => {
                        selectElement.append(new Option(option, option));
                    });

                    // Initialize Select2
                    selectElement.select2();
                }

                populateMentalHealth(currentLang);
                populateVaccines(currentLang);
                populateCommunicableDiseases(currentLang);



                $('.show-previous-marriage').on('click', function () {
                    $('.sec-4').show();
                })
                $('select').select2();
                $('select').on('change.select2', function () {
                    $(this).valid();
                });
                // Run the function on page load
                updateFormControls();

                var genderValue = '<?php echo htmlspecialchars($gender); ?>';
                if (genderValue !== '') {
                    $('#gender').val(genderValue).trigger('change');

                }

                var stateValue = '<?php echo htmlspecialchars($state); ?>';
                if (stateValue !== '') {
                    $('#state').val(stateValue).trigger('change');

                }

                var proofOfSpouseCitizenshipValue = '<?php echo htmlspecialchars($proofOfSpouseCitizenship); ?>';
                if (proofOfSpouseCitizenshipValue !== '') {
                    $('#proofOfSpouseCitizenship').val(proofOfSpouseCitizenshipValue).trigger('change');

                }

                var stateOfEntryValue = '<?php echo htmlspecialchars($stateOfEntry); ?>';
                if (stateOfEntryValue !== '') {
                    $('#stateOfEntry').val(stateOfEntryValue).trigger('change');

                }

                var anyCommunicableDiseaseValue = '<?php echo $anyCommunicableDisease; ?>';
                if (anyCommunicableDiseaseValue !== '') {
                    let extractCommunicableDiseasesVersion = getCommunicableDiseasesVersion(anyCommunicableDiseaseValue);

                    console.log(extractCommunicableDiseasesVersion);
                    if (currentLang == 'english') {
                        $('#chooseDisease').val(extractCommunicableDiseasesVersion[0]).trigger('change');
                    } else {
                        $('#chooseDisease').val(extractCommunicableDiseasesVersion[1]).trigger('change');
                    }
                }

                var anyMentalDisorderValue = '<?php echo $anyMentalDisorder; ?>';

                if (anyMentalDisorderValue !== '') {
                    let extractMentalDisordersVersions = getMentalDisordersVersions(anyMentalDisorderValue);
                    if (currentLang == 'english') {
                        $('#mentalDisorderChoose').val(extractMentalDisordersVersions[0]).trigger('change');
                    } else {
                        $('#mentalDisorderChoose').val(extractMentalDisordersVersions[1]).trigger('change');
                    }
                }

                var anyMissingVaccinesValue = '<?php echo $anyMissingVaccines; ?>';

                if (anyMissingVaccinesValue !== '') {
                    let extractVaccineVersion = getVaccineVersions(anyMissingVaccinesValue);
                    if (currentLang == 'english') {
                        $('#anyMissingVaccines').val(extractVaccineVersion[0]).trigger('change');
                    } else {
                        $('#anyMissingVaccines').val(extractVaccineVersion[1]).trigger('change');
                    }
                }

                let childGenderInputs = document.querySelectorAll('[name="childGender[]"]');
                for (let ind = 0; ind < childGenderInputs.length; ind++) {
                    if (childGenders[ind] !== '') {
                        childGenderInputs[ind].value = childGenders[ind];
                        $(childGenderInputs[ind]).trigger('change');
                    }
                }
            });


            function initAutocomplete() {
                var zipInput = document.getElementById('zipCode');
                var cityInput = document.getElementById('city');
                var stateSelect = $('#state');

                // Initialize the Google Places Autocomplete
                var autocomplete = new google.maps.places.Autocomplete(zipInput, {
                    types: ['(regions)'],  // Search for regions, including postal codes
                    componentRestrictions: { country: 'us' }
                });

                autocomplete.addListener('place_changed', function () {
                    var place = autocomplete.getPlace();

                    if (!place.geometry) {
                        console.log('No details available for input: ' + place.name);
                        return;
                    }

                    var addressComponents = place.address_components;
                    var zip = '';
                    var city = '';
                    var state = '';

                    // Extract postal code, city, and state from address components
                    for (var i = 0; i < addressComponents.length; i++) {
                        var component = addressComponents[i];
                        if (component.types.includes('postal_code')) {
                            zip = component.long_name;
                        } else if (component.types.includes('locality')) {
                            city = component.long_name;
                        } else if (component.types.includes('administrative_area_level_1')) {
                            state = component.long_name;
                        }
                    }

                    // Update fields
                    zipInput.value = zip; // Ensure zip code is always updated
                    cityInput.value = city; // Update city input
                    stateSelect.val(state).trigger('change'); // Update state select dropdown

                    console.log('Zip Code:', zip, city, state);
                });
            }

            window.onload = function () {
                initAutocomplete();
            };
            $(document).on('change', '.form-check-input', function () {
                updateFormControls()
            });
        </script>
    </body>

</html>