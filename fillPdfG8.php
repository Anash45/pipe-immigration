<?php
require './defines/db_conn.php';
require './defines/functions.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(0);

if (!isAdmin()) {
    header("Location:./index.php");
    // exit;
}

require 'vendor/autoload.php';

use setasign\Fpdi\Fpdi;

$info = '';

function generate_I_131()
{

    global $conn;
    $EnteredID = $_POST['email_or_phone'];


    $sql1 = "Select u.lastName as ClientLastName, u.ClientID, u.firstName as ClientFirstName, u.middleName as ClientMiddleName, a.street1 as ClientStreetNumberandName, a.inCareOfName as ClientCareOfName, a.Apartment as ClientApt, a.Suite as ClientSte, a.Floor as ClientFlr, COALESCE(a.Apartment, a.Suite, a.Floor) as ClientSpecificAptSteorFlr, a.city as ClientCity, a.state as ClientState, a.zipCode as ClientPostalCode, 'United States of America' as ClientCountry,
u.birthPlace as countryofBirth, u.citizenshipCountry as ClientCountryofCitizenship, u.gender as Clientgender, u.birthday as ClientdateofBirth
from user u
inner join address a on u.userID = a.userID
INNER JOIN clients c on c.ClientID = u.ClientID WHERE c.email_or_phone = '$EnteredID'";

    $result1 = mysqli_query($conn, $sql1);
    $row1 = mysqli_fetch_assoc($result1);
    // print_r($row1);

    $clientId = $row1['ClientID'];

    $ClientApt = ($row1['ClientApt'] == null || empty($row1['ClientApt'])) ? false : true;
    $ClientSte = ($row1['ClientSte'] == null || empty($row1['ClientSte'])) ? false : true;
    $ClientFlr = ($row1['ClientFlr'] == null || empty($row1['ClientFlr'])) ? false : true;

    function determineChoices($choice, $option1, $option2)
    {
        $option1_value = false;
        $option2_value = false;

        if ($choice == $option1) {
            $option1_value = 'Yes';
        } elseif ($choice == $option2) {
            $option2_value = 'Yes';
        }

        return [$option1_value, $option2_value];
    }


    $part1_gender = $row1['Clientgender'];
    list($part1_gender_male, $part1_gender_female) = determineChoices($part1_gender, 'male', 'female');

    $part3_3a_radio_choice = 'Yes';
    list($part3_3a_radio_yes, $part3_3a_radio_no) = determineChoices($part3_3a_radio_choice, 'Yes', 'No');

    $part3_4a_radio_choice = 'Yes';
    list($part3_4a_radio_yes, $part3_4a_radio_no) = determineChoices($part3_4a_radio_choice, 'Yes', 'No');

    $part5_radio_choice = 'Yes';
    list($part5_radio_yes, $part5_radio_no) = determineChoices($part5_radio_choice, 'Yes', 'No');

    $part5_radio_choice = 'Yes';
    list($part5_radio_yes, $part5_radio_no) = determineChoices($part5_radio_choice, 'Yes', 'No');

    $part6_2_radio_choice = 'Yes';
    list($part6_2_radio_yes, $part6_2_radio_no) = determineChoices($part6_2_radio_choice, 'Yes', 'No');

    $part6_3a_radio_choice = 'Yes';
    list($part6_3a_radio_yes, $part6_3a_radio_no) = determineChoices($part6_3a_radio_choice, 'Yes', 'No');

    $part6_3b_radio_choice = 'Yes';
    list($part6_3b_radio_yes, $part6_3b_radio_no) = determineChoices($part6_3b_radio_choice, 'Yes', 'No');

    $part6_3c_radio_choice = 'Yes';
    list($part6_3c_radio_yes, $part6_3c_radio_no) = determineChoices($part6_3c_radio_choice, 'Yes', 'No');

    $part6_4a_radio_choice = 'Yes';
    list($part6_4a_radio_yes, $part6_4a_radio_no) = determineChoices($part6_4a_radio_choice, 'Yes', 'No');

    $part6_4b_radio_choice = 'Yes';
    list($part6_4b_radio_yes, $part6_4b_radio_no) = determineChoices($part6_4b_radio_choice, 'Yes', 'No');

    $part6_4c_radio_choice = 'Yes';
    list($part6_4c_radio_yes, $part6_4c_radio_no) = determineChoices($part6_4c_radio_choice, 'Yes', 'No');

    $part7_trip_radio_choice = 'Yes';
    list($part7_onetrip_check, $part7_morethanonetrip_check) = determineChoices($part7_trip_radio_choice, 'Yes', 'No');

    $part8_ead_approval_radio_choice = 'Yes';
    list($part8_ead_approval_yes, $part8_ead_approval_no) = determineChoices($part8_ead_approval_radio_choice, 'Yes', 'No');



    $fields = array(
        // Part 0
        'part0_license_number_text' => 'LICENSE_NUMBER',
        'part0_g28_check' => 'Yes',

        // Part 1 
        'part1_family_name_text' => $row1['ClientLastName'],
        'part1_first_name_text' => $row1['ClientFirstName'],
        'part1_middle_name_text' => $row1['ClientMiddleName'],
        'part1_alien_reg_text' => '123456789',
        'part1_country_birth_text' => $row1['countryofBirth'],
        'part1_country_citizenship_text' => $row1['ClientCountryofCitizenship'],

        'part1_class_admission_text' => 'Not available',

        'part1_gender_male_check' => $part1_gender_male,
        'part1_gender_female_check' => $part1_gender_female,

        'part1_date' => date('m/d/Y', strtotime($row1['ClientdateofBirth'])),
        'part1_ssn_text' => '123456789',

        'part1_care_name_text' => $row1['ClientCareOfName'],
        'part1_street_number_text' => $row1['ClientStreetNumberandName'],

        'part1_apt_check' => $ClientApt,
        'part1_ste_check' => $ClientSte,
        'part1_flr_check' => $ClientFlr,

        'part1_textfield' => $row1['ClientSpecificAptSteorFlr'],
        'part1_city_town_text' => $row1['ClientCity'],
        'part1_state_text' => $row1['ClientState'],
        'part1_zip_code_text' => $row1['ClientPostalCode'],
        'part1_postal_code_text' => ' ',
        'part1_province_text' => ' ',
        'part1_country_text' => $row1['ClientCountry']
    );

    // print_r($clientData);
    // Path to the original fillable PDF
    $templatePdf = './pdf_templates/template-131.pdf';

    // Directory and base filename for the output PDF
    $outputDir = 'output/';
    $baseFilename = str_replace(" ", "-", $row1['ClientFirstName']) . '-' . str_replace(" ", "-", $row1['ClientLastName']) . '-' . 'Filled_I-131';
    $extension = '.pdf';

    // Ensure the output directory exists
    if (!file_exists($outputDir)) {
        mkdir($outputDir, 0777, true);
    }

    // Create a unique filename
    $counter = 1;
    $outputPdf = $outputDir . $baseFilename . $extension;
    while (file_exists($outputPdf)) {
        $outputPdf = $outputDir . $baseFilename . '_' . $counter . $extension;
        $counter++;
    }

    $pdf = new FPDM($templatePdf);
    // $pdf->verbose = true;
// $pdf->verbose_level = 3;
    $pdf->useCheckboxParser = true; // Checkbox parsing is ignored (default FPDM behaviour) unless enabled with this setting

    $pdf->Load($fields, false); // second parameter: false if field values are in ISO-8859-1, true if UTF-8
    $pdf->Merge();

    $pdf->Output('F', $outputPdf);

    $pdfName = str_replace($extension, "", str_replace($outputDir, "", $outputPdf));
    return array(insertDocument($clientId, $pdfName, $outputPdf), $outputPdf);
}

function generate_g_28()
{
    global $conn;
    $EnteredID = $_POST['email_or_phone'];
    // Fetch attorney data from the database
    $attorneySql = "SELECT USCISOnlineNo, LastName, FirstName, MiddleName, StreetNumberName, Suite, City, State, ZipCode, Country, DaytimePhone, EmailAddress, FaxNumber, Eligibility, BarNumber, NotLegallyRestricted, NameofLawFirm FROM attorney";
    $attorneyResult = $conn->query($attorneySql);
    $fetchAttorneyData = $attorneyResult->fetch_assoc();

    // Fetch client data from the database based on the enteredClientemail_or_cell
    $clientSql = "SELECT c.ClientID, u.lastName AS ClientLastName, u.firstName AS ClientFirstName, u.middleName AS ClientMiddleName, a.cellPhone AS ClientDaytimePhone, a.cellPhone AS ClientMobile, a.currentEmail AS ClientEmail, a.street1 AS ClientStreetNumberandName, a.Apartment AS ClientApt, a.Suite AS ClientSte, a.Floor AS ClientFlr, COALESCE(a.Apartment, a.Suite, a.Floor) AS ClientSpecificAptSteorFlr, a.city AS ClientCity, a.state AS ClientState, a.zipCode AS ClientPostalCode, 'United States of America' AS ClientCountry FROM user u INNER JOIN address a ON u.userID = a.userID INNER JOIN clients c on c.ClientID = u.ClientID WHERE c.email_or_phone = '$EnteredID'";
    $clientResult = $conn->query($clientSql);
    $fetchClientData = $clientResult->fetch_assoc();

    $clientId = $fetchClientData['ClientID'];
    $ClientFirstName = $fetchClientData['ClientFirstName'];
    $ClientLastName = $fetchClientData['ClientLastName'];
    // print_r($fetchAttorneyData);
    // print_r($fetchClientData);


    // $attorneyData = [
//     'USCISOnlineNo'         => '789123456',
//     'LastName'              => 'Green',
//     'FirstName'             => 'Olivia',
//     'MiddleName'            => 'G',
//     'StreetNumberName'      => '654 Cedar St',
//     'Suite'                 => '400',
//     'City'                  => 'Star City',
//     'State'                 => 'CA',
//     'ZipCode'               => '90001',
//     'Country'               => 'USA',
//     'DaytimePhone'          => '987-654-3210',
//     'EmailAddress'          => 'olivia.green@example.com',
//     'FaxNumber'             => '987-654-3211',
//     'BarNumber'             => '345678901',
//     'NameofLawFirm'         => 'Green & Associates',
//     'NotLegallyRestricted'  => 'No',
// ];

    // $clientData = [
//     'ClientLastName'            => 'Jones',
//     'ClientFirstName'           => 'Robert',
//     'ClientMiddleName'          => 'H',
//     'ClientDaytimePhone'        => '012-345-6789',
//     'ClientMobile'              => '012-345-6790',
//     'ClientEmail'               => 'robert.jones@example.com',
//     'ClientStreetNumberandName' => '303 Spruce St',
//     'ClientSpecificAptSteorFlr' => '4C',
//     'ClientCity'                => 'Midtown',
//     'ClientState'               => 'WA',
//     'ClientPostalCode'          => '98101',
//     'ClientCountry'             => 'USA'
// ];


    $attorneyData = [
        'USCISOnlineNo' => $fetchAttorneyData['USCISOnlineNo'],
        'LastName' => $fetchAttorneyData['LastName'],
        'FirstName' => $fetchAttorneyData['FirstName'],
        'MiddleName' => $fetchAttorneyData['MiddleName'],
        'StreetNumberName' => $fetchAttorneyData['StreetNumberName'],
        'Suite' => $fetchAttorneyData['Suite'],
        'City' => $fetchAttorneyData['City'],
        'State' => $fetchAttorneyData['State'],
        'ZipCode' => $fetchAttorneyData['ZipCode'],
        'Country' => $fetchAttorneyData['Country'],
        'DaytimePhone' => $fetchAttorneyData['DaytimePhone'],
        'EmailAddress' => $fetchAttorneyData['EmailAddress'],
        'FaxNumber' => $fetchAttorneyData['FaxNumber'],
        'BarNumber' => $fetchAttorneyData['BarNumber'],
        'NameofLawFirm' => $fetchAttorneyData['NameofLawFirm'],
        'NotLegallyRestricted' => $fetchAttorneyData['NotLegallyRestricted'],
    ];

    $clientData = [
        'ClientLastName' => $fetchClientData['ClientLastName'],
        'ClientFirstName' => $fetchClientData['ClientFirstName'],
        'ClientMiddleName' => $fetchClientData['ClientMiddleName'],
        'ClientDaytimePhone' => $fetchClientData['ClientDaytimePhone'],
        'ClientMobile' => $fetchClientData['ClientMobile'],
        'ClientEmail' => $fetchClientData['ClientEmail'],
        'ClientStreetNumberandName' => $fetchClientData['ClientStreetNumberandName'],
        'ClientSpecificAptSteorFlr' => $fetchClientData['ClientSpecificAptSteorFlr'],
        'ClientCity' => $fetchClientData['ClientCity'],
        'ClientState' => $fetchClientData['ClientState'],
        'ClientPostalCode' => $fetchClientData['ClientPostalCode'],
        'ClientCountry' => $fetchClientData['ClientCountry']
    ];

    // print_r($clientData);
    // Path to the original fillable PDF
    $templatePdf = './pdf_templates/template.pdf';

    // Directory and base filename for the output PDF
    $outputDir = 'output/';
    $baseFilename = str_replace(" ", "-", $ClientFirstName) . '-' . str_replace(" ", "-", $ClientLastName) . '-' . 'Filled_G-28';
    $extension = '.pdf';

    // Ensure the output directory exists
    if (!file_exists($outputDir)) {
        mkdir($outputDir, 0777, true);
    }

    // Create a unique filename
    $counter = 1;
    $outputPdf = $outputDir . $baseFilename . $extension;
    while (file_exists($outputPdf)) {
        $outputPdf = $outputDir . $baseFilename . '_' . $counter . $extension;
        $counter++;
    }

    // echo $fetchClientData['ClientSte'];
    // echo $fetchClientData['ClientFlr'];
    // echo $fetchClientData['ClientApt'];
    $ClientSte = ($fetchClientData['ClientSte'] != null) ? true : false;
    $ClientFlr = ($fetchClientData['ClientFlr'] != null) ? true : false;
    $ClientApt = ($fetchClientData['ClientApt'] != null) ? true : false;
    // PDF fields
    $fields = array(
        'attorney_check' => true,
        'i_am_not_check' => true,
        'i_am_check' => false,
        'attorney_accredited_apt_check' => false,
        'attorney_accredited_ste_check' => true,
        'attorney_accredited_flr_check' => false,
        'accredited_representative_check' => false,
        'i_am_associated_with_check' => false,
        'i_am_law_student_check' => false,
        'USCIS_check' => false,
        'ICE_check' => false,
        'CBP_check' => false,
        'client_apt_check' => $ClientApt,
        'client_ste_check' => $ClientSte,
        'client_flr_check' => $ClientFlr,
        'applicant_check' => false,
        'petitioner_check' => false,
        'requester_check' => false,
        'derivative_check' => false,
        'respondent_check' => false,
        'uscis_send_original_check' => false,
        'uscis_secure_identity_check' => false,
        'uscis_send_notice_check' => false,

        'Pt1Line1_USCISOnlineAcctNumber[0]' => $attorneyData['USCISOnlineNo'],
        'Pt1Line2a_FamilyName[0]' => $attorneyData['LastName'],
        'Pt1Line2b_GivenName[0]' => $attorneyData['FirstName'],
        'Pt1Line2c_MiddleName[0]' => $attorneyData['MiddleName'],
        'Line3a_StreetNumber[0]' => $attorneyData['StreetNumberName'],
        'Line3b_AptSteFlrNumber[0]' => $attorneyData['Suite'],
        'Line3c_CityOrTown[0]' => $attorneyData['City'],
        'Line3d_State[0]' => $attorneyData['State'],
        'Line3e_ZipCode[0]' => $attorneyData['ZipCode'],
        'Line3h_Country[0]' => $attorneyData['Country'],
        'Line4_DaytimeTelephoneNumber[0]' => $attorneyData['DaytimePhone'],
        'Line7_MobileTelephoneNumber[0]' => $attorneyData['EmailAddress'],
        'Pt1ItemNumber7_FaxNumber[0]' => $attorneyData['FaxNumber'],
        'Pt2Line1b_BarNumber[0]' => $attorneyData['BarNumber'],
        'Pt2Line1d_NameofFirmOrOrganization[0]' => $attorneyData['NameofLawFirm'],

        'Pt3Line5a_FamilyName[0]' => $clientData['ClientLastName'],
        'Pt3Line5b_GivenName[0]' => $clientData['ClientFirstName'],
        'Pt3Line5c_MiddleName[0]' => $clientData['ClientMiddleName'],
        'Pt3Line7a_NameOfEntity[0]' => $clientData['ClientSpecificAptSteorFlr'],
        'Pt3Line9_ANumber[0]' => '',
        'Line11_EMail[0]' => $clientData['ClientEmail'],
        'Line12a_StreetNumberName[0]' => $clientData['ClientStreetNumberandName'],
        'Line12b_AptSteFlrNumber[0]' => $clientData['ClientSpecificAptSteorFlr'],
        'Line12c_CityOrTown[0]' => $clientData['ClientCity'],
        'Line12d_State[0]' => $clientData['ClientState'],
        'Line12e_ZipCode[0]' => $clientData['ClientPostalCode'],
        'Line12h_Country[0]' => $clientData['ClientCountry']
    );

    // print_r($fields);
    // Create and save the PDF
    $pdf = new FPDM($templatePdf);
    $pdf->useCheckboxParser = true; // Enable checkbox parsing
    $pdf->Load($fields, false); // Load fields
    $pdf->Merge(); // Merge fields with PDF

    $pdfName = str_replace($extension, "", str_replace($outputDir, "", $outputPdf));

    // Save the PDF to the unique filename
    $pdf->Output('F', $outputPdf);

    return array(insertDocument($clientId, $pdfName, $outputPdf), $outputPdf);
}

$conn = new mysqli($host, $user, $pass, $db);

if (isset($_POST['generate_pdf']) && $_POST['form_type'] == 'G-28') {
    $response = generate_g_28();

    if ($response[0]) {
        // Output the filename
        $info = '<div class="alert alert-success"><span class="en">The PDF has been saved as: </span><span class="es">El PDF se ha guardado como: </span><a target="_blank" href="./output/' . htmlspecialchars(basename($response[1])) . '">' . htmlspecialchars(basename($response[1])) . '
        </a></div>';
    } else {
        // Output the filename
        $info = '<div class="alert alert-danger">Error!</div>';
    }
} else if (isset($_POST['generate_pdf']) && $_POST['form_type'] == 'I-131') {
    $response = generate_I_131();

    if ($response[0]) {
        // Output the filename
        $info = '<div class="alert alert-success"><span class="en">The PDF has been saved as: </span><span class="es">El PDF se ha guardado como: </span><a target="_blank" href="./output/' . htmlspecialchars(basename($response[1])) . '">' . htmlspecialchars(basename($response[1])) . '
        </a></div>';
    } else {
        // Output the filename
        $info = '<div class="alert alert-danger">Error!</div>';
    }
} else if (isset($_POST['generate_pdf']) && $_POST['form_type'] == 'All Forms') {
    $response1 = generate_I_131();
    $response2 = generate_g_28();

    if ($response1[0]) {
        // Output the filename
        $info .= '<div class="alert alert-success"><span class="en">The PDF <strong>I-131</strong> has been saved as: </span><span class="es">El PDF <strong>I-131</strong> se ha guardado como: </span><a target="_blank" href="./output/' . htmlspecialchars(basename($response1[1])) . '">' . htmlspecialchars(basename($response1[1])) . '
        </a></div>';
    } else {
        // Output the filename
        $info .= '<div class="alert alert-danger">Error creating <strong>I-131</strong>!</div>';
    }

    if ($response2[0]) {
        // Output the filename
        $info .= '<div class="alert alert-success"><span class="en">The PDF <strong>G-28</strong> has been saved as: </span><span class="es">El PDF <strong>G-28</strong> se ha guardado como: </span><a target="_blank" href="./output/' . htmlspecialchars(basename($response2[1])) . '">' . htmlspecialchars(basename($response2[1])) . '
        </a></div>';
    } else {
        // Output the filename
        $info .= '<div class="alert alert-danger">Error creating <strong>G-28</strong>!</div>';
    }
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
        <link rel="stylesheet" href="./assets/css/style.css?v=5">
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
                    <span class="en">Generate G8 PDF</span>
                    <span class="es">Generar PDF G8</span>
                </h2>
                <?php echo $info; ?>
                <form action="" method="post" id="inquiryForm">
                    <div class="sec-2 mb-4">
                        <fieldset class="px-sm-5 px-4 py-4">
                            <div class="row justify-content-around">
                                <div class="col-xl-5 col-lg-6">
                                    <div class="row">
                                        <div class="col-12 mb-3 pt-3">
                                            <label for="first_name"
                                                class="form-label gap-1 d-flex align-items-center"><span
                                                    class="en">Select a user:</span><span class="es">Seleccione un
                                                    usuario:</span></label>
                                            <div class="input-div">
                                                <select class="form-control form-select mt-1" name="email_or_phone">
                                                    <?php
                                                    $sql1 = "SELECT 
                        u.ClientID,
                        c.email_or_phone
                    FROM 
                        `user` u
                    INNER JOIN 
                        `clients` c ON u.ClientID = c.ClientID
                    GROUP BY 
                        u.ClientID;";
                                                    $result1 = $conn->query($sql1);
                                                    if ($result1->num_rows > 0) {
                                                        while ($row1 = $result1->fetch_assoc()) {
                                                            echo "<option value='" . $row1['email_or_phone'] . "'>" . $row1['email_or_phone'] . "</option>";
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-5 col-lg-6">
                                    <div class="row">
                                        <div class="col-12 mb-3 pt-3">
                                            <label for="form_type"
                                                class="form-label gap-1 d-flex align-items-center"><span
                                                    class="en">Select a form type:</span><span class="es">Seleccione un
                                                    tipo de formulario</span></label>
                                            <div class="input-div">
                                                <select class="form-control form-select mt-1" name="form_type">
                                                    <option value="All Forms">All Forms</option>
                                                    <option value="I-131">I-131</option>
                                                    <option value="G-28">G-28</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                    <div class="text-center my-4 position-relative">
                        <div class="formResponse text-center mb-3"></div>
                        <button class="btn btn-rectangle btn-primary" name="generate_pdf"><span
                                class="en">Submit</span><span class="es">Enviar</span></button>
                    </div>
                </form>
            </div>
        </main>
        <script src="./assets/js/jquery-3.6.1.min.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
        <script src="./assets/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.21.0/jquery.validate.min.js"
            integrity="sha512-KFHXdr2oObHKI9w4Hv1XPKc898mE4kgYx58oqsc/JqqdLMDI4YjOLzom+EMlW8HFUd0QfjfAvxSL6sEq/a42fQ=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBffT74mo5XglwbbcSJ08wZl5F1WkyQhVw&libraries=places"></script>
        <script src="./assets/js/script.js?v=5"></script>
    </body>

</html>