<?php
include './defines/db_conn.php';
include './defines/functions.php';
// print_r($_SESSION);
if (isLoggedIn()) {
    $clientId = $_SESSION['ClientID'];
    $userData = getUserById($clientId);
    // print_r($userData);
    $firstName = '';
    $lastName = '';
    $email = '';
    $zipCode = '';
    $phone = '';
    $city = '';
    $state = '';
    if ($userData !== null) {
        $firstName = $userData['firstName'];
        $zipCode = $userData['zipCode'];
        $lastName = $userData['lastName'];
        $email = $userData['email'];
        $phone = $userData['phone'];
        $city = $userData['city'];
        $state = $userData['state'];
    }

    $checkPaymentStatus = isPaymentCleared($clientId);

    // if($checkPaymentStatus !== 'no-inquiry'){
    //     header('location: index.php');
    // }

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
                    <?php echo getTranslation('Inquiry Form', 0, 'label'); ?>
                </h2>
                <form action="" method="post" id="inquiryForm">
                    <div class="sec-2 mb-4">
                        <fieldset class="px-sm-5 px-4 py-4">
                            <div class="row justify-content-around">
                                <div class="col-xl-5 col-lg-6">
                                    <div class="row">
                                        <div class="col-12 mb-3 pt-3">
                                            <label for="first_name"
                                                class="form-label gap-1 d-flex align-items-center"><span><?php echo getTranslation('Inquiry Form', 1, 'label'); ?></span><img
                                                    src="./assets/images/question-icon.svg" class="help-icon" alt="Icon"
                                                    width="16" data-bs-toggle="tooltip"
                                                    title="<?php echo getTranslation('Inquiry Form', 1, 'help'); ?>"></label>
                                            <div class="input-div">
                                                <input type="text" class="form-control mt-1" id="first_name"
                                                    name="first_name"
                                                    placeholder="<?php echo getTranslation('Inquiry Form', 1, 'placeholder'); ?>"
                                                    value="<?php echo $firstName; ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-5 col-lg-6">
                                    <div class="row">
                                        <div class="col-12 mb-3 pt-3">
                                            <label for="last_name"
                                                class="form-label gap-1 d-flex align-items-center"><span><?php echo getTranslation('Inquiry Form', 2, 'label'); ?></span><img
                                                    src="./assets/images/question-icon.svg" class="help-icon"
                                                    data-toggle="tooltip"
                                                    title="<?php echo getTranslation('Inquiry Form', 2, 'help'); ?>"
                                                    alt="Icon" width="16"></label>
                                            <div class="input-div">
                                                <input type="text" class="form-control mt-1" id="last_name"
                                                    name="last_name" value="<?php echo $lastName; ?>"
                                                    placeholder="<?php echo getTranslation('Inquiry Form', 2, 'placeholder'); ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-5 col-lg-6">
                                    <div class="row">
                                        <div class="col-lg-4 mb-3 pt-3">
                                            <label for="zipCode"
                                                class="form-label gap-1 d-flex align-items-center"><span><?php echo getTranslation('Inquiry Form', 3, 'label'); ?></span><img
                                                    src="./assets/images/question-icon.svg" class="help-icon"
                                                    data-toggle="tooltip"
                                                    title="<?php echo getTranslation('Inquiry Form', 3, 'help'); ?>"
                                                    alt="Icon" width="16"></label>
                                            <div class="input-div">
                                                <input type="text" class="form-control mt-1 inp-wih-icon-left"
                                                    id="zipCode" name="zipCode" value="<?php echo $zipCode ?>"
                                                    placeholder="<?php echo getTranslation('Inquiry Form', 3, 'placeholder'); ?>">
                                                <img src="./assets/images/location.svg" alt="Lock"
                                                    class="inp-icon-left">
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 mb-3 pt-3">
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
                                        <div class="col-lg-4 col-md-6 mb-3 pt-3">
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
                                            <label for="phoneNumber"
                                                class="form-label gap-1 d-flex align-items-center"><span><?php echo getTranslation('Inquiry Form', 4, 'label'); ?></span><img
                                                    src="./assets/images/question-icon.svg" class="help-icon"
                                                    data-toggle="tooltip"
                                                    title="<?php echo getTranslation('Inquiry Form', 4, 'help'); ?>"
                                                    alt="Icon" width="16"></label>
                                            <div class="input-div">
                                                <input type="text" class="form-control mt-1 phone-number"
                                                    id="phoneNumber" name="phoneNumber"
                                                    placeholder="<?php echo getTranslation('Inquiry Form', 4, 'placeholder'); ?>"
                                                    <?php echo $phone = ($userData['phone'] !== null) ? 'value="' . $phone . '" readonly' : ''; ?>>
                                            </div>
                                            <div class="form-check mt-3">
                                                <input class="form-check-input" type="checkbox" id="whatsappConnected"
                                                    name="whatsappConnected">
                                                <label class="form-check-label" for="whatsapp">
                                                    <?php echo getTranslation('Inquiry Form', 6, 'label'); ?> </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-5 col-lg-6">
                                    <div class="row">
                                        <div class="col-12 mb-3 pt-3">
                                            <label for="email"
                                                class="form-label"><span><?php echo getTranslation('Inquiry Form', 5, 'label'); ?></span><img
                                                    src="./assets/images/question-icon.svg" class="help-icon"
                                                    data-toggle="tooltip"
                                                    title="<?php echo getTranslation('Inquiry Form', 5, 'help'); ?>"
                                                    alt="Icon" width="16"></label>
                                            <div class="input-div">
                                                <input type="email" class="form-control mt-1" name="email" id="email"
                                                    placeholder="<?php echo getTranslation('Inquiry Form', 5, 'placeholder'); ?>"
                                                    <?php echo $email = ($userData['email'] !== null) ? 'value="' . $email . '" readonly' : ''; ?>>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-7 col-md-8 mx-auto mt-5 inquiry-bottom">
                                    <div class="mb-4">
                                        <div id="usaPresence" class="d-block">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox"
                                                    name="usaPresenceBeforeJun2024" id="usaPresenceYes" value="yes">
                                                <div class="d-flex gap-2 align-items-start justify-content-between">
                                                    <label class="form-check-label"
                                                        for="usaPresenceYes"><?php echo getTranslation('Inquiry Form', 7, 'label'); ?></label>
                                                    <img src="./assets/images/question-icon.svg" class="help-icon"
                                                        data-toggle="tooltip"
                                                        title="<?php echo getTranslation('Inquiry Form', 7, 'help'); ?>"
                                                        alt="Icon" width="16">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Question 2 -->
                                    <div class="mb-4">
                                        <div id="marriedToUSCitizen" class="d-block">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox"
                                                    name="marriedToUSCitizenBeforeJun2024" id="marriedToUSCitizenYes"
                                                    value="yes">
                                                <div class="d-flex gap-2 align-items-start justify-content-between">
                                                    <label class="form-check-label"
                                                        for="marriedToUSCitizenYes"><?php echo getTranslation('Inquiry Form', 8, 'label'); ?></label>
                                                    <img src="./assets/images/question-icon.svg" class="help-icon"
                                                        data-toggle="tooltip"
                                                        title="<?php echo getTranslation('Inquiry Form', 8, 'help'); ?>"
                                                        alt="Icon" width="16">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Question 3 -->
                                    <div class="mb-4">
                                        <div id="continuousPresence" class="d-block">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox"
                                                    name="continuousPresenceEvidence" id="continuousPresenceYes"
                                                    value="yes">
                                                <div class="d-flex gap-2 align-items-start justify-content-between">
                                                    <label class="form-check-label"
                                                        for="continuousPresenceYes"><?php echo getTranslation('Inquiry Form', 9, 'label'); ?></label>
                                                    <img src="./assets/images/question-icon.svg" class="help-icon"
                                                        data-toggle="tooltip"
                                                        title="<?php echo getTranslation('Inquiry Form', 9, 'help'); ?>"
                                                        alt="Icon" width="16">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-4">
                                        <div id="NoMajorIssues" class="d-block">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" name="NoMajorIssues"
                                                    id="NoMajorIssuesYes" value="yes">
                                                <div class="d-flex gap-2 align-items-start justify-content-between">
                                                    <label class="form-check-label"
                                                        for="NoMajorIssuesYes"><?php echo getTranslation('Inquiry Form', 10, 'label'); ?></label>
                                                    <img src="./assets/images/question-icon.svg" class="help-icon"
                                                        data-toggle="tooltip"
                                                        title="<?php echo getTranslation('Inquiry Form', 10, 'help'); ?>"
                                                        alt="Icon" width="16">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="my-4">
                                        <label for="qualificationOptions"
                                            class="form-label fw-bold mb-2"><?php echo getTranslation('Inquiry Form', 11, 'label'); ?></label>
                                        <div id="qualificationOptions">
                                            <?php
                                            $products = getAllProducts();
                                            if ($products) {
                                                $ip = 1;
                                                foreach ($products as $product) {
                                                    $productDescription = getLanguage() == 'english' ? $product['description'] : $product['descriptionSpanish'];
                                                    $productHelp = getLanguage() == 'english' ? $product['EnglishHelp'] : $product['SpanishHelp'];
                                                    ?>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="product"
                                                            id="product<?php echo $ip; ?>"
                                                            value="<?php echo $product['ProductID']; ?>">
                                                        <div class="d-flex gap-2 align-items-start justify-content-between">
                                                            <label class="form-check-label" for="product<?php echo $ip; ?>">
                                                                <?php echo $productDescription; ?></label>
                                                            <img src="./assets/images/question-icon.svg" id="productHelp<?php echo $product['ProductID'] ?>" class="help-icon"
                                                                data-toggle="tooltip" title="<?php echo $productHelp; ?>"
                                                                alt="Icon" width="16">
                                                        </div>
                                                    </div>
                                                    <?php
                                                    $ip++;
                                                }
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-check my-4">
                                                <input type="hidden" name="attorneyID" id="attorneyID" value="">
                                                <input class="form-check-input" type="checkbox" id="acceptTerms"
                                                    name="acceptTerms">
                                                <label class="form-check-label" for="acceptTerms">
                                                    <?php echo getTranslation('Inquiry Form', 19, 'label'); ?></span>
                                                </label>
                                            </div>
                                            <div class="text-center col-lg-6 mx-auto">
                                                <div
                                                    class="d-flex align-items-center justify-content-center gap-2 fee-note roboto mt-5 mb-3">
                                                    <p class="mb-0 text-center">
                                                        <?php echo getTranslation('Inquiry Form', 21, 'label'); ?>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="col-xl-9 col-lg-10 mx-auto">
                                                <textarea name="otherQuestions" id="other" class="form-control" rows="8"
                                                    placeholder="<?php echo getTranslation('Inquiry Form', 17, 'placeholder'); ?>"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-xl-7 col-md-8 mx-auto">
                                            <div
                                                class="d-flex align-items-center justify-content-center gap-2 fee-note roboto mt-4">
                                                <p class="mb-0 text-center">
                                                    <?php echo getTranslation('Inquiry Form', 20, 'label'); ?>
                                                </p>
                                            </div>
                                            <div class="row">
                                                <div class="col-12 mb-3 pt-3">
                                                    <div class="input-div">
                                                        <select id="payment-methods" name="payment-methods"
                                                            style="width: 100%;">
                                                            <option value="credit-card"
                                                                data-image="./assets/images/Mastercard.svg">Credit Card
                                                            </option>
                                                            <option value="zelle"
                                                                data-image="./assets/images/Etherium.svg"> Zelle
                                                            </option>
                                                            <option value="check-via-mail"
                                                                data-image="./assets/images/check-via-mail.svg"> Check
                                                                via mail</option>
                                                            <option value="in-person"
                                                                data-image="./assets/images/Yandex.svg"> In person
                                                                payment</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <h5 class="text-center" id="lastNote">
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                    <div class="text-center my-4 position-relative">
                        <div class="formResponse text-center mb-3"></div>
                        <button class="btn btn-rectangle btn-primary"><span class="en">Submit</span><span
                                class="es">Enviar</span></button>
                    </div>
                    <div class="modal fade" id="verifyModal" tabindex="-1" aria-labelledby="verifyModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <!-- Modal Body -->
                                <div class="modal-body">
                                    <h2 class="fw-bold my-3 text-center" id="verifyModalTitle">$##</h2>
                                    <input type="hidden" name="totalFee" id="totalFee">
                                    <div class="mb-3">
                                        <label for="payeeNameEmail" class="form-label">Name/Email of Payee</label>
                                        <div class="input-div">
                                            <input type="text" class="form-control" id="payeeNameEmail"
                                                name="payeeNameEmail" placeholder="Enter name or email">
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="paymentDate" class="form-label">Payment Date</label>
                                        <div class="input-div">
                                            <input type="date" class="form-control date" id="paymentDate"
                                                name="paymentDate" placeholder="MM/DD/YY">
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="transactionId" class="form-label">Transaction
                                            ID/Confirmation</label>
                                        <div class="input-div">
                                            <input type="text" class="form-control" id="transactionId"
                                                name="transactionId" placeholder="Enter transaction ID or confirmation">
                                        </div>
                                    </div>
                                    <div class="formResponse text-center"></div>
                                    <div
                                        class="text-center my-4 d-flex justify-content-center gap-2 align-items-center">
                                        <button class="btn btn-rectangle mx-0 btn-secondary" type="button"
                                            data-bs-dismiss="modal">Close</button>
                                        <button class="btn btn-rectangle mx-0 btn-primary"><span>Submit</span><img
                                                src="./assets/images/RightIcon.svg" alt="Icon" height="16"></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </main>
        <!-- Modal Structure -->
        <div class="modal fade" id="tacModal" tabindex="-1" aria-labelledby="tacModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="btn-close opacity-0" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                        <h3 class="modal-title text-center mx-auto" id="tacModalLabel">Suriel PIPE Qualification App
                        </h3>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <h3 class="text-center mb-4">Confidentiality and Limited Legal Advice</h3>
                        <h4 class="text-center mb-3">**Confidentiality Assurance**</h4>
                        <p>By entering your confidential data into our computer system, you acknowledge and agree to the
                            following terms:</p>
                        <ol>
                            <li>**Confidential Information**: All information you provide will be treated as
                                confidential and proprietary. We are committed to protecting your personal data in
                                accordance with applicable laws and professional standards.</li>
                            <li>**Data Security**: To protect your data from unauthorized access, use, or disclosure, we
                                employ industry-standard security measures, including encryption and secure access
                                protocols.</li>
                            <li>**Use of Information**: The information you provide will be used solely for the purpose
                                of evaluating your legal needs and providing limited legal advice during your initial
                                consultation.</li>
                            <li>**Non-Disclosure**: We will not disclose your confidential information to any third
                                party without your explicit consent, except as required by law.</li>
                            <li>**Acknowledgment**: By providing your information, you acknowledge that you have read
                                and understood this confidentiality assurance and agree to its terms.</li>
                        </ol>
                        <h4 class="text-center mb-3">**Limited Legal Advice and Representation**</h4>
                        <ol>
                            <li>**Initial Consultation**: During the initial consultation, we will provide limited legal
                                advice based on the information you provide. This advice is intended to give you a
                                preliminary understanding of your legal situation and possible options.</li>
                            <li>**No Attorney-Client Relationship**: This initial consultation does not establish an
                                attorney-client relationship beyond the scope of the limited legal advice provided.</li>
                            <li>**Retention of Services**: An attorney-client relationship will only be established once
                                you sign a formal retainer agreement and provide any required retainer fee. Until then,
                                we are not your legal representative, and our advice should not be construed as creating
                                such a relationship.</li>
                            <li>**Scope of Representation**: The scope of our legal representation, including specific
                                services and obligations, will be detailed in the retainer agreement. You must review
                                and agree to these terms before we formally represent you.</li>
                            <li>**Acknowledgment**: By participating in the initial consultation, you acknowledge that
                                you understand the nature and limitations of the legal advice provided and the
                                conditions for establishing an attorney-client relationship.</li>
                        </ol>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" onclick="disagreeTAC()">Close</button>
                        <button type="button" class="btn btn-primary" onclick="agreeTAC()">Agree</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Structure -->
        <div class="modal fade" id="tacModalSpanish" tabindex="-1" aria-labelledby="tacModalSpanishLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="btn-close opacity-0" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                        <h3 class="modal-title text-center mx-auto" id="tacModalSpanishLabel">SURIEL INMIGRACION: PIPE
                            CALIFICACIÓN</h3>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <h3 class="text-center mb-4">**Confidencialidad y Asesoramiento Legal Limitado**</h3>
                        <h4 class="text-center mb-3">**Garantía de confidencialidad**</h4>
                        <p>Al ingresar sus datos confidenciales en nuestro sistema inform&aacute;tico, usted reconoce y
                            acepta los siguientes términos:</p>
                        <ol>
                            <li>**Información confidencial**: Toda la información que proporcione será tratada como
                                confidencial y de propiedad exclusiva. Estamos comprometidos a proteger sus datos
                                personales de acuerdo con las leyes aplicables y los estándares profesionales.</li>
                            <li>**Seguridad de datos**: Para proteger sus datos contra el acceso, uso o divulgación no
                                autorizados, empleamos medidas de seguridad estándar de la industria, incluido el
                                cifrado y protocolos de acceso seguro.</li>
                            <li>**Uso de la información**: La información que usted proporcione se utilizará únicamente
                                con el fin de evaluar sus necesidades legales y brindar asesoramiento legal limitado
                                durante su consulta inicial.</li>
                            <li>**No divulgación**: No divulgaremos su información confidencial a ningún tercero sin su
                                consentimiento explícito, excepto según lo exija la ley.</li>
                            <li>**Reconocimiento**: Al proporcionar su información, usted reconoce que ha leído y
                                comprendido esta garantía de confidencialidad y acepta sus términos.</li>
                        </ol>
                        <h3 class="text-center mb-4">Asesoramiento y representación legal limitados</h3>
                        <ol>
                            <li>**Consulta inicial**: Durante la consulta inicial, le brindaremos asesoramiento legal
                                limitado según la información que usted proporcione. Este consejo tiene como objetivo
                                brindarle una comprensión preliminar de su situación legal y sus posibles opciones.</li>
                            <li>**Sin relación abogado-cliente**: Esta consulta inicial no establece una relación
                                abogado-cliente más allá del alcance del asesoramiento legal limitado brindado.</li>
                            <li>**Retención de servicios**: Solo se establecerá una relación abogado-cliente una vez que
                                usted firme un acuerdo de anticipo formal y proporcione los honorarios de anticipo
                                requeridos. Hasta entonces, no somos su representante legal y nuestro asesoramiento no
                                debe interpretarse como la creación de dicha relación.</li>
                            <li>**Alcance de la representación**: El alcance de nuestra representación legal, incluidos
                                los servicios y obligaciones específicos, se detallará en el contrato de contratación.
                                Debe revisar y aceptar estos términos antes de que lo representemos formalmente.</li>
                            <li>**Reconocimiento**: Al participar en la consulta inicial, usted reconoce que comprende
                                la naturaleza y las limitaciones del asesoramiento legal brindado y las condiciones para
                                establecer una relación abogado-cliente.</li>
                        </ol>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" onclick="disagreeTAC()">Cerca</button>
                        <button type="button" class="btn btn-primary" onclick="agreeTAC()">Aceptar</button>
                    </div>
                </div>
            </div>
        </div>
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
        <?php
        $productArray = [];
        $products1 = getAllProducts();
        if ($products1) {
            foreach ($products1 as $product1) {
                // Remove any newline characters from the URLs
                $linkToStripe = str_replace(["\r", "\n"], '', $product1['LinktoStripe']);
                $linkToStripeSpanish = str_replace(["\r", "\n"], '', $product1['LinktoStripeSpanish']);

                $productArray[] = array($product1['ProductID'], $product1['price'], $linkToStripe, $linkToStripeSpanish);
            }
        }
        ?>
        <script>
            // Convert PHP array to JSON and escape it for safe embedding
            let productArray = JSON.parse('<?php echo json_encode($productArray, JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT); ?>');
            console.log(productArray); // Optional: to verify the content
            let additionalFee = 0;
            let currentLanguage = '<?php echo getLanguage(); ?>';
            let PIPEQualificationFee = '<?php echo getSystemDataValue('PIPEQualificationFee'); ?>';
            let HelpEnteringData = '<?php echo getSystemDataValue('HelpEnteringData'); ?>';
            let VideoConferencing = '<?php echo getSystemDataValue('VideoConferencing'); ?>';
            let StripeQual = '<?php echo getSystemDataValue('StripeQual'); ?>';
            let StripeQualPlusHelp = '<?php echo getSystemDataValue('StripeQualPlusHelp'); ?>';
            let StripeQualVideoHelp = '<?php echo getSystemDataValue('StripeQualVideoHelp'); ?>';
            let StripeQualEspañol = '<?php echo getSystemDataValue('StripeQualEspañol'); ?>';
            let StripeQualPlusHelpEspañol = '<?php echo getSystemDataValue('StripeQualPlusHelpEspañol'); ?>';
            let StripeQualVideoHelpEspañol = '<?php echo getSystemDataValue('StripeQualVideoHelpEspañol'); ?>';
            let PayPalLinkforQualification = '<?php echo getSystemDataValue('PayPalLinkforQualification'); ?>';
            let PayPalLinkforQualPlusHelp = '<?php echo getSystemDataValue('PayPalLinkforQualPlusHelp'); ?>';
            let PayPalLinkforQualVideoHelp = '<?php echo getSystemDataValue('PayPalLinkforQualVideoHelp'); ?>';
            let emailforSupportEspañol = '<?php echo getSystemDataValue('emailforSupportEspañol'); ?>';
            let emailforSupport = '<?php echo getSystemDataValue('emailforSupport'); ?>';

            function enableVerifyModal() {
                // Get the values of first and last name
                let first_name = $('#first_name').val();
                let last_name = $('#last_name').val();

                // Combine the names and set it as the value of the payeeNameEmail field
                $('#payeeNameEmail').val(first_name + ' ' + last_name);

                // Get the current date
                let d = new Date();
                let date = d.getDate().toString().padStart(2, '0'); // Ensures two digits
                let month = (d.getMonth() + 1).toString().padStart(2, '0'); // Adjust for zero-based month and ensures two digits
                let year = d.getFullYear();

                // Set the paymentDate field value in YYYY-MM-DD format
                $('#paymentDate').val(year + '-' + month + '-' + date);

                // Log the formatted date for debugging
                console.log(year + '-' + month + '-' + date);

                // Set the 'required' property for all .form-control elements in the modal
                $('#verifyModal').find('.form-control').prop('required', true);
            }


            function disableVerifyModal() {
                $('#verifyModal').find('.form-control').removeAttr('required');
            }

            function returnPrice(priceWithSign) {
                // Remove the '$' sign and any non-numeric characters
                return parseFloat(priceWithSign.replace(/[^0-9.]/g, ''));
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

            function checkInquiryForm() {
                let qualificationFee = 0;
                let qualificationLink = '';
                let product = $('[name="product"]:checked').val();
                let result = productArray.find(item => (item[0] === product || item[0] === Number(product)));

                console.log(productArray, product, result);

                if (result !== undefined) {

                    console.log(product, result);
                    if ($('#payment-methods').val() == 'credit-card') {
                        enableVerifyModal();
                        if (currentLanguage == 'english') {
                            qualificationLink = result[2];
                        } else {
                            qualificationLink = result[3];
                        }
                    }
                }
                qualificationFee = returnPrice(result[1]);


                let totalFeel = qualificationFee;

                $('#verifyModalTitle').html(`$${totalFeel}`);
                $('.fee').html(`$${totalFeel}`);
                $('#totalFee').val(totalFeel);
                $('#lastNote').html(`<p class="mt-3 fee-note">
                    <span class="en">Your link to pay the fee is below, after paying click VERIFY PAYMENT button and fill the confirmation details.</span> 
                    <span class="es">Su enlace para pagar la tarifa está abajo, después de pagar, haga clic en el botón VERIFICAR PAGO y complete los detalles de confirmación.</span>
                </p><p class="mb-3"><a href="${qualificationLink}" target="_blank">${qualificationLink}</a></p>
                <div class="text-center"><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#verifyModal">
                    <span class="en">VERIFY PAYMENT</span><span class="es">VERIFICAR PAGO</span>
                </button></div>`);


                if ($('#payment-methods').val() == 'check-via-mail') {
                    disableVerifyModal();
                    $('#lastNote').html(`<p class="mt-3">
                    <span class="en">
        Please mail your check to "Law Office of Nicomedes Suriel, 7220 N 16th Street, Suite F, Phoenix, AZ 85020". Please note that it takes a few days for the check to arrive at our office.
    </span>
    <span class="es">
        Por favor, envíe su cheque a "Oficina Legal de Nicomedes Suriel, 7220 N 16th Street, Suite F, Phoenix, AZ 85020". Tenga en cuenta que puede tardar unos días en llegar a nuestra oficina.
    </span>    
                    </p>`);
                } else if ($('#payment-methods').val() == 'in-person') {
                    disableVerifyModal();
                    $('#lastNote').html(`<p class="mt-3">
                    <span class="en">"Our office is located at 7220 N 16th, Suite F, Phoenix, AZ  85020, Google Pin: bit.ly/3LISSp2. Our office hours are 8 AM to 5 PM, closed for lunch from 12 PM to 1 PM."</span>
                    <span class="es">"Nuestra oficina está ubicada en 7220 N 16th, Suite F, Phoenix, AZ 85020, Google Pin: bit.ly/3LISSp2. Horario de 9 AM a 5 PM., cerrada de 12 PM a 1 PM para almuerzo."</span></p>`);
                } else if ($('#payment-methods').val() == 'zelle') {
                    enableVerifyModal();
                    $('#lastNote').html(`<p class="mt-3 fee-note"><span class="en">Press the VERIFY PAYMENT button to enter your payment transaction ID, or confirmation #.</span>
                        <span class="es">Para verificar su pago, oprima VERIFICAR PAGO.</span>
                    </p>
                                <div class="text-center"><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#verifyModal">
                    <span class="en">VERIFY PAYMENT</span><span class="es">VERIFICAR PAGO</span>
                </button></div>`);
                }
            }

            $('#inquiryForm').on('input', function () {
                if ($('#acceptTerms:checked').length > 0) {
                    checkInquiryForm();
                }
            })

            function disagreeTAC() {
                $('#acceptTerms').prop('checked', false);
                $('#acceptTerms').trigger('change');
                $('#tacModal').modal('hide');
                $('#tacModalSpanish').modal('hide');
            }

            function agreeTAC() {
                $('#acceptTerms').prop('checked', true);
                $('#acceptTerms').trigger('change');
                $('#tacModal').modal('hide');
                $('#tacModalSpanish').modal('hide');
            }

            function termsAcceptedEnable() {
                if ($('#acceptTerms:checked').length > 0) {
                    $('#payment-methods').prop('disabled', false);
                } else {
                    $('#payment-methods').prop('disabled', true);
                }
            }

            $(function () {
                $('#acceptTerms').on('change', termsAcceptedEnable);
                termsAcceptedEnable();
            });

            $(document).ready(function () {
                // let inputs = document.querySelectorAll('.phone-number');
                // for (let i = 0; i < inputs.length; i++) {
                //     window.intlTelInput(inputs[i], {
                //         separateDialCode: true
                //     });
                // }

                $('.show-previous-marriage').on('click', function () {
                    $('.sec-4').show();
                })
                $('select').select2();
                function formatPaymentMethod(method) {
                    if (!method.id) {
                        return method.text;
                    }

                    var baseUrl = $(method.element).data('image');
                    var $method = $(
                        '<span><img src="' + baseUrl + '" class="img-flag" style="width: 20px; height: 20px;"/> ' + method.text + '</span>'
                    );
                    return $method;
                };

                $('#payment-methods').select2({
                    templateResult: formatPaymentMethod,
                    templateSelection: formatPaymentMethod
                });
            });

            $(document).ready(function () {
                // Initialize the validator
                $("#inquiryForm").validate({
                    errorClass: "msg-error",
                    errorElement: "span",
                    rules: {
                        first_name: {
                            required: true,
                            maxlength: 255
                        },
                        last_name: {
                            required: true,
                            maxlength: 255
                        },
                        zipCode: {
                            required: true,
                            maxlength: 10
                        },
                        city: {
                            required: true,
                            maxlength: 255
                        },
                        state: {
                            required: true,
                            maxlength: 255
                        },
                        phoneNumber: {
                            required: true,
                            maxlength: 20
                        },
                        email: {
                            required: true,
                            email: true,
                            maxlength: 255
                        },
                        product: {
                            required: true
                        },
                        "payment-methods": {
                            required: true
                        },
                        totalFee: {
                            required: true,
                            number: true
                        },
                        acceptTerms: {
                            required: true
                        }
                    },
                    messages: {
                        first_name: {
                            required: '<span class="en">First name is required</span><span class="es">El nombre es requerido</span>',
                            maxlength: '<span class="en">Max length 255 characters!</span><span class="es">¡Longitud máxima 255 caracteres!</span>'
                        },
                        last_name: {
                            required: '<span class="en">Last name is required</span><span class="es">El apellido es requerido</span>',
                            maxlength: '<span class="en">Max length 255 characters!</span><span class="es">¡Longitud máxima 255 caracteres!</span>'
                        },
                        zipCode: {
                            required: '<span class="en">Please enter the zip code</span><span class="es">Por favor, ingrese el código postal</span>',
                            maxlength: '<span class="en">Max length 10 characters!</span><span class="es">¡Longitud máxima 10 caracteres!</span>'
                        },
                        city: {
                            required: '<span class="en">Please enter the city</span><span class="es">Por favor, ingrese la ciudad</span>',
                            maxlength: '<span class="en">Max length 255 characters!</span><span class="es">¡Longitud máxima 255 caracteres!</span>'
                        },
                        state: {
                            required: '<span class="en">Please enter the state</span><span class="es">Por favor, ingrese el estado</span>',
                            maxlength: '<span class="en">Max length 255 characters!</span><span class="es">¡Longitud máxima 255 caracteres!</span>'
                        },
                        phoneNumber: {
                            required: '<span class="en">Phone number is required</span><span class="es">El número de teléfono es requerido</span>',
                            maxlength: '<span class="en">Max length 20 characters!</span><span class="es">¡Longitud máxima 20 caracteres!</span>'
                        },
                        email: {
                            required: '<span class="en">Email is required</span><span class="es">El correo electrónico es requerido</span>',
                            email: '<span class="en">Please enter a valid email</span><span class="es">Por favor, ingrese un correo electrónico válido</span>',
                            maxlength: '<span class="en">Max length 255 characters!</span><span class="es">¡Longitud máxima 255 caracteres!</span>'
                        },
                        usaPresenceBeforeJun2024: {
                            required: ''
                        },
                        marriedToUSCitizenBeforeJun2024: {
                            required: ''
                        },
                        continuousPresenceEvidence: {
                            required: ''
                        },
                        product: {
                            required: ''
                        },
                        "payment-methods": {
                            required: '<span class="en">Payment method is required</span><span class="es">El método de pago es requerido</span>'
                        },
                        totalFee: {
                            required: '<span class="en">Total fee is required</span><span class="es">El monto total es requerido</span>',
                            number: '<span class="en">Please enter a valid number</span><span class="es">Por favor, ingrese un número válido</span>'
                        },
                        acceptTerms: {
                            required: ''
                        }
                    },
                    highlight: function (element) {
                        $(element).addClass('input-error');
                    },
                    unhighlight: function (element) {
                        $(element).removeClass('input-error');
                    },
                    errorPlacement: function (error, element) {
                        if (element.attr("name") === "acceptTerms") {
                            // Insert the error message into the custom error element
                            $(".formResponse").html('<span class="en">Before you can make your payment, please ACCEPT our terms and confidentiality agreement.</span><span class="es">Antes de poder realizar su pago, ACEPTE nuestros términos y acuerdo de confidencialidad.</span>').addClass('text-danger').removeClass('text-success');
                        } else {
                            error.insertAfter(element);
                        }
                    },
                    submitHandler: function (form) {
                        $.ajax({
                            url: "inquiry-form-process.php",
                            type: "POST",
                            data: $(form).serialize(),
                            success: function (response) {
                                console.log(response);
                                response = JSON.parse(response);
                                // Handle success response
                                if (response.status === 'success') {
                                    $('.formResponse').html(response.message).addClass('text-success').removeClass('text-danger');
                                    window.location.href = 'index.php';
                                    $(form).trigger('reset');
                                } else {
                                    $('.formResponse').html(response.message).addClass('text-danger').removeClass('text-success');
                                }
                            },
                            error: function (xhr, status, error) {
                                // Handle error response
                                alert('An error occurred: ' + error);
                            }
                        });
                    }
                });
                var stateValue = '<?php echo htmlspecialchars($state); ?>';
                if (stateValue !== '') {
                    $('#state').val(stateValue).trigger('change');

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
                    getAttorneyDetails();
                    console.log('Zip Code:', zip, city, state);
                });
            }

            $('#zipCode').on('change', function () {
                getAttorneyDetails();
            });


            function getAttorneyDetails() {
                var zipCode = $('#zipCode').val();

                $.ajax({
                    url: 'getAttorney.php',
                    type: 'GET',
                    data: { zipCode: zipCode },
                    success: function (response) {
                        console.log('Attorney Details:', response);

                        response = JSON.parse(response);
                        if (response) {
                            let helpText;

                            if(currentLanguage == 'english'){
                                helpText = `Call our main office at ${response.DayTimePhone} or visit us at ${response.StreetNumberName}, Suite ${response.Suite}, ${response.City}, ${response.State} ${response.ZipCode}, ${response.OfficeHours}.`;
                            }else{
                                helpText = `Llame a nuestra oficina principal al ${response.DayTimePhone} o visitanos a ${response.StreetNumberName}, Suite ${response.Suite}, ${response.City}, ${response.State} ${response.ZipCode}, ${response.OfficeHours}.`;
                            }

                            $('#attrOffice').html(response.NameofLawFirm);
                            $('#attrCity').html(`${response.City}, ${response.State}`);

                            console.log(helpText);

                            $('#productHelp5').attr('data-bs-original-title', helpText);
                            var tooltip = bootstrap.Tooltip.getInstance($('#productHelp5')[0]);
                            $('#productHelp6').attr('data-bs-original-title', helpText);
                            var tooltip2 = bootstrap.Tooltip.getInstance($('#productHelp6')[0]);
                            tooltip.update();
                            tooltip2.update();

                            $('#attorneyID').val(response.attorneyID);
                        } else {
                            console.log('No attorney found.');
                        }
                    },
                    error: function () {
                        console.log('An error occurred.');
                    }
                });
            }

            window.onload = function () {
                initAutocomplete();
            };
        </script>
    </body>

</html>