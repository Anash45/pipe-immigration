<?php
require 'vendor/autoload.php';

use setasign\Fpdi\Fpdi;
use mikehaertl\pdftk\Pdf;

// Database connection
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "pipe-immigration";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$EnteredID = 'futuretest45@gmail.com';
// Fetch attorney data from the database
$attorneySql = "SELECT USCISOnlineNo, LastName, FirstName, MiddleName, StreetNumberName, Suite, City, State, ZipCode, Country, DaytimePhone, EmailAddress, FaxNumber, Eligibility, BarNumber, NotLegallyRestricted, NameofLawFirm FROM attorney";
$attorneyResult = $conn->query($attorneySql);
$attorneyData = $attorneyResult->fetch_assoc();

// Fetch client data from the database based on the enteredClientemail_or_phone
 $clientSql = "SELECT u.lastName AS ClientLastName, u.firstName AS ClientFirstName,
u.middleName AS ClientMiddleName, a.cellPhone AS ClientDaytimePhone, a.cellPhone AS ClientMobile, a.currentEmail AS ClientEmail, a.street1 AS ClientStreetNumberandName, 
a.Apartment AS ClientApt, a.Suite AS ClientSte, a.Floor AS ClientFlr, COALESCE(a.Apartment, a.Suite, a.Floor) AS ClientSpecificAptSteorFlr, 
a.city AS ClientCity, a.state AS ClientState, a.zipCode AS ClientPostalCode, 'United States of America' AS ClientCountry
FROM user u
INNER JOIN address a ON u.UserID = a.UserID
INNER JOIN clients c on c.ClientID = u.ClientID
WHERE c.email_or_phone = '$EnteredID'";

$clientResult = $conn->query($clientSql);
$clientData = $clientResult->fetch_assoc();
// print_r($clientData);
// Path to the original fillable PDF
$templatePdf = './assets/FillableG-28.pdf';

// Path to the output filled PDF
$outputPdf = './output/Filled_G-28.pdf';

// Create a new PDF document using FPDI
$pdf = new FPDI();
$pageCount = $pdf->setSourceFile($templatePdf);
for ($pageNo = 1; $pageNo <= $pageCount; $pageNo++) {
    $tplIdx = $pdf->importPage($pageNo);
    $pdf->addPage();
    $pdf->useTemplate($tplIdx);
}

// Save the PDF with the imported template pages
$pdf->Output($outputPdf, 'F');

// Fill the PDF form using pdf-fill-form
$pdf = new Pdf($outputPdf);
$pdf->fillForm([
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
    'Line6_EMail[0]' => $attorneyData['EmailAddress'],
    'Pt1ItemNumber7_FaxNumber[0]' => $attorneyData['FaxNumber'],
    'Pt2Line1b_BarNumber[0]' => $attorneyData['BarNumber'],
    'Pt2Line1d_NameofFirmOrOrganization[0]' => $attorneyData['NameofLawFirm'],
    'Checkbox1dAm[0]' => $attorneyData['NotLegallyRestricted'] == 'Yes' ? 'On' : 'Off',
    'Checkbox1dAmNot[0]' => $attorneyData['NotLegallyRestricted'] == 'No' ? 'On' : 'Off',

    'Pt3Line5a_FamilyName[0]' => $clientData['ClientLastName'],
    'Pt3Line5b_GivenName[0]' => $clientData['ClientFirstName'],
    'Pt3Line5c_MiddleName[0]' => $clientData['ClientMiddleName'],
    'Pt3Line7a_NameOfEntity[0]' => $clientData['ClientSpecificAptSteorFlr'],
    'Pt3Line9_ANumber[0]' => $clientData['ClientDaytimePhone'],
    'Line11_EMail[0]' => $clientData['ClientEmail'],
    'Line12a_StreetNumberName[0]' => $clientData['ClientStreetNumberandName'],
    'Line12b_AptSteFlrNumber[0]' => $clientData['ClientSpecificAptSteorFlr'],
    'Line12c_CityOrTown[0]' => $clientData['ClientCity'],
    'Line12d_State[0]' => $clientData['ClientState'],
    'Line12e_ZipCode[0]' => $clientData['ClientPostalCode'],
    'Line12h_Country[0]' => $clientData['ClientCountry']
])
->needAppearances()
->flatten()
->saveAs($outputPdf);

echo "PDF filled successfully!";

$conn->close();
?>