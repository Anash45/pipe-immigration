<?php
include './defines/db_conn.php';
include './defines/functions.php';

if (isLoggedIn()) {
    $clientId = $_SESSION['ClientID'];
    $userData = getClientById($clientId);
    if ($userData !== null) {
        $emailOrPhone = $userData['email_or_phone'];
        $checkType = isEmailOrPhone($emailOrPhone);
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
        <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="https://cdn.tutorialjinni.com/intl-tel-input/17.0.19/css/intlTelInput.css" />
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="./assets/css/style.css?v=4">
    </head>

    <body class="main-form-page roboto lang-<?php echo getLanguage(); ?>">
        <main class="py-5">
            <div class="container">
                <div class="d-flex justify-content-center gap-3 mb-4">
                    <a href="index.php" class="btn btn-rectangle mx-0 btn-primary">Home</a>
                    <a href="logout.php" class="btn btn-rectangle mx-0 btn-danger">Logout</a>
                </div>
                <div class="d-flex justify-content-center gap-5 align-items-center mb-5">
                    <a href="?lang=english"
                        class="lang-link <?php echo $active = (getLanguage() == 'english') ? 'active' : ''; ?> inter text-dark">ENGLISH</a><a
                        href="?lang=spanish"
                        class="lang-link inter <?php echo $active = (getLanguage() == 'spanish') ? 'active' : ''; ?> text-dark">SPANISH</a>
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
                                                    name="first_name" placeholder="Enter your first name">
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
                                                    name="last_name" placeholder="Enter your last name">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-5 col-lg-6">
                                    <div class="row">
                                        <div class="col-12 mb-3 pt-3">
                                            <label for="currentStateAndCountry"
                                                class="form-label gap-1 d-flex align-items-center"><span><?php echo getTranslation('Inquiry Form', 3, 'label'); ?></span><img
                                                    src="./assets/images/question-icon.svg" class="help-icon"
                                                    data-toggle="tooltip"
                                                    title="<?php echo getTranslation('Inquiry Form', 3, 'help'); ?>"
                                                    alt="Icon" width="16"></label>
                                            <div class="input-div">
                                                <input type="text" class="form-control mt-1 inp-wih-icon-left"
                                                    id="currentStateAndCountry" name="currentStateAndCountry"
                                                    placeholder="New York, United States">
                                                <img src="./assets/images/location.svg" alt="Lock"
                                                    class="inp-icon-left">
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
                                                    id="phoneNumber" name="phoneNumber" placeholder="Phone number" <?php echo $phone = ($checkType == 'phone') ? 'value="' . $emailOrPhone . '" readonly' : ''; ?>>
                                            </div>
                                            <div class="form-check mt-3">
                                                <input class="form-check-input" type="checkbox" id="whatsappConnected"
                                                    name="whatsappConnected">
                                                <label class="form-check-label" for="whatsapp"> Do you have WhatsApp in
                                                    your cell? </label>
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
                                                    placeholder="Email@lato.com" <?php echo $phone = ($checkType == 'email') ? 'value="' . $emailOrPhone . '" readonly' : ''; ?>>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-7 col-md-8 mx-auto mt-5 inquiry-bottom">
                                    <div class="mb-4">
                                        <label for="usaPresence"
                                            class="form-label me-4"><?php echo getTranslation('Inquiry Form', 6, 'label'); ?></label>
                                        <div id="usaPresence" class="d-block">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio"
                                                    name="usaPresenceBeforeJun2024" id="usaPresenceYes" value="yes">
                                                <label class="form-check-label" for="usaPresenceYes">Yes</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio"
                                                    name="usaPresenceBeforeJun2024" id="usaPresenceNo" value="no">
                                                <label class="form-check-label" for="usaPresenceNo">No</label>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Question 2 -->
                                    <div class="mb-4">
                                        <label for="marriedToUSCitizen"
                                            class="form-label me-4"><?php echo getTranslation('Inquiry Form', 7, 'label'); ?></label>
                                        <div id="marriedToUSCitizen" class="d-block">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio"
                                                    name="marriedToUSCitizenBeforeJun2024" id="marriedToUSCitizenYes"
                                                    value="yes">
                                                <label class="form-check-label" for="marriedToUSCitizenYes">Yes</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio"
                                                    name="marriedToUSCitizenBeforeJun2024" id="marriedToUSCitizenNo"
                                                    value="no">
                                                <label class="form-check-label" for="marriedToUSCitizenNo">No</label>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Question 3 -->
                                    <div class="mb-4">
                                        <label for="continuousPresence"
                                            class="form-label me-4"><?php echo getTranslation('Inquiry Form', 8, 'label'); ?></label>
                                        <div id="continuousPresence" class="d-block">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio"
                                                    name="continuousPresenceEvidence" id="continuousPresenceYes"
                                                    value="yes">
                                                <label class="form-check-label" for="continuousPresenceYes">Yes</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio"
                                                    name="continuousPresenceEvidence" id="continuousPresenceNo"
                                                    value="no">
                                                <label class="form-check-label" for="continuousPresenceNo">No</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="my-4">
                                        <label for="qualificationOptions"
                                            class="form-label fw-bold mb-2"><?php echo getTranslation('Inquiry Form', 10, 'label'); ?></label>
                                        <div id="qualificationOptions">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio"
                                                    name="suitableQualificationOption" id="fillYourself"
                                                    value="fillYourself">
                                                <label class="form-check-label" for="fillYourself">
                                                    <?php echo getTranslation('Inquiry Form', 11, 'label'); ?></label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio"
                                                    name="suitableQualificationOption" id="needHelpFilling"
                                                    value="needHelpFilling">
                                                <label class="form-check-label" for="needHelpFilling">
                                                    <?php echo getTranslation('Inquiry Form', 17, 'label'); ?>. </label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio"
                                                    name="suitableQualificationOption" id="needVideoConference"
                                                    value="needVideoConference">
                                                <label class="form-check-label" for="needVideoConference">
                                                    <?php echo getTranslation('Inquiry Form', 13, 'label'); ?></label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio"
                                                    name="suitableQualificationOption" id="legalConsultationAtLawOffice"
                                                    value="legalConsultationAtLawOffice">
                                                <label class="form-check-label" for="legalConsultationAtLawOffice">
                                                    <?php echo getTranslation('Inquiry Form', 14, 'label'); ?></label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-check my-4">
                                                <input class="form-check-input" type="checkbox" id="acceptTerms"
                                                    name="acceptTerms">
                                                <label class="form-check-label" for="acceptTerms">
                                                    <?php echo getTranslation('Inquiry Form', 18, 'label'); ?></span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-xl-7 col-md-8 mx-auto">
                                            <div
                                                class="d-flex align-items-center justify-content-center gap-2 fee-note roboto mt-4">
                                                <p class="mb-0 text-center">
                                                    <?php echo getTranslation('Inquiry Form', 19, 'label'); ?>
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
                                                            <option value="paypal"
                                                                data-image="./assets/images/PayPal.svg"> PayPal</option>
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
                    <div class="text-center col-lg-6 mx-auto">
                        <div class="d-flex align-items-center justify-content-center gap-2 fee-note roboto mt-5 mb-3">
                            <p class="mb-0 text-center">"Need further help? Please enter your questions below</p><img
                                src="./assets/images/question-icon.svg" class="help-icon" data-toggle="tooltip"
                                title="<?php echo getTranslation('Inquiry Form', 0, 'help'); ?>" alt="Icon" width="16">
                        </div>
                    </div>
                    <div class="col-xl-9 col-lg-10 mx-auto">
                        <textarea name="other" id="other" class="form-control" rows="8"
                            placeholder="Please enter your questions below"></textarea>
                    </div>
                    <div class="text-center my-4">
                    <div class="formResponse text-center"></div>
                        <button class="btn btn-rectangle btn-primary"><span>Submit</span></button>
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
    </body>

    <body>
        <script src="./assets/js/jquery-3.6.1.min.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
        <script src="./assets/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script src="https://cdn.tutorialjinni.com/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.21.0/jquery.validate.min.js"
            integrity="sha512-KFHXdr2oObHKI9w4Hv1XPKc898mE4kgYx58oqsc/JqqdLMDI4YjOLzom+EMlW8HFUd0QfjfAvxSL6sEq/a42fQ=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="./assets/js/script.js?v=4"></script>
        <script>
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
                $('#verifyModal').find('.form-control').attr('required', 'required');
            }

            function disableVerifyModal() {
                $('#verifyModal').find('.form-control').removeAttr('required');
            }

            function returnPrice(priceWithSign) {
                // Remove the '$' sign and any non-numeric characters
                return parseFloat(priceWithSign.replace(/[^0-9.]/g, ''));
            }


            $(function () {
                $(".date").datepicker({
                    changeYear: true,
                    changeMonth: true,
                    dateFormat: "mm/dd/yy",
                    yearRange: "-100:+0", // Adjust the year range as needed
                });
                $(".date").on("change", function () {
                    $(this).valid();
                });
                $(".calendar").click(function () {
                    $(this).siblings('.date').datepicker("show");
                });
            });

            function checkInquiryForm() {
                let qualificationFee = returnPrice(PIPEQualificationFee);
                let qualificationLink = '';
                let suitableQualificationOption = $('[name="suitableQualificationOption"]:checked').val();
                console.log(suitableQualificationOption);
                if (suitableQualificationOption == 'needHelpFilling') {
                    if ($('#payment-methods').val() == 'credit-card') {
                        enableVerifyModal();
                        if (currentLanguage == 'english') {
                            qualificationLink = StripeQualPlusHelp;
                        } else if (currentLanguage == 'spanish') {
                            qualificationLink = StripeQualPlusHelpEspañol;
                        }
                    } else if ($('#payment-methods').val() == 'paypal') {
                        enableVerifyModal();
                        qualificationLink = PayPalLinkforQualPlusHelp;
                    }
                    additionalFee = returnPrice(HelpEnteringData);
                } else if (suitableQualificationOption == 'needVideoConference') {
                    if ($('#payment-methods').val() == 'credit-card') {
                        enableVerifyModal();
                        if (currentLanguage == 'english') {
                            qualificationLink = StripeQualVideoHelp;
                        } else if (currentLanguage == 'spanish') {
                            qualificationLink = StripeQualVideoHelpEspañol;
                        }
                    }
                    else if ($('#payment-methods').val() == 'paypal') {
                        enableVerifyModal();
                        qualificationLink = PayPalLinkforQualVideoHelp;
                    }
                    additionalFee = returnPrice(VideoConferencing);
                } else {
                    if ($('#payment-methods').val() == 'credit-card') {
                        enableVerifyModal();
                        if (currentLanguage == 'english') {
                            qualificationLink = StripeQual;
                        } else if (currentLanguage == 'spanish') {
                            qualificationLink = StripeQualEspañol;
                        }
                    }
                    else if ($('#payment-methods').val() == 'paypal') {
                        enableVerifyModal();
                        qualificationLink = PayPalLinkforQualification;
                    }
                    additionalFee = 0;
                }


                let totalFeel = qualificationFee + additionalFee;

                $('#verifyModalTitle').html(`$${totalFeel}`);
                $('.fee').html(`$${totalFeel}`);
                $('#totalFee').val(totalFeel);
                $('#lastNote').html(`<p class="mt-3 fee-note">
                    <span class="en">Your link to pay the fee is below, after paying click VERIFY button and fill the confirmation details.</span> 
                    <span class="es">Su enlace para pagar la tarifa está abajo, después de pagar, haga clic en el botón VERIFICAR y complete los detalles de confirmación.</span>
                </p><p class="mb-3"><a href="${qualificationLink}" target="_blank">${qualificationLink}</a></p>
                <div class="text-center"><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#verifyModal">
    VERIFY
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
                    Pay at our Phoenix office, display "Our office is located at 7220 N 16th Street, Suite F, Phoenix, AZ  85020, Googlepin xxxx. Our office hours are 8 AM to 5 PM, but closed for lunch between 12 PM and 1 PM."
                    </p>`);
                } else if ($('#payment-methods').val() == 'zelle') {
                    enableVerifyModal();
                    $('#lastNote').html(`<p class="mt-3 fee-note">
                                    Verify your payment by clicking on the VERIFY button.</p>
                                <div class="text-center"><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#verifyModal">
                    VERIFY
                </button></div>`);
                }
            }

            $('#inquiryForm').on('input', function () {
                checkInquiryForm();
            })

            function disagreeTAC() {
                $('#acceptTerms').prop('checked', false);
                $('#acceptTerms').trigger('change');
                $('#tacModal').modal('hide');
            }

            function agreeTAC() {
                $('#acceptTerms').prop('checked', true);
                $('#acceptTerms').trigger('change');
                $('#tacModal').modal('hide');
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
                let inputs = document.querySelectorAll('.phone-number');
                for (let i = 0; i < inputs.length; i++) {
                    window.intlTelInput(inputs[i], {
                        separateDialCode: true
                    });
                }

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
                            required: true
                        },
                        last_name: {
                            required: true
                        },
                        currentStateAndCountry: {
                            required: true
                        },
                        phoneNumber: {
                            required: true
                        },
                        email: {
                            required: true,
                            email: true
                        },
                        usaPresenceBeforeJun2024: {
                            required: true
                        },
                        marriedToUSCitizenBeforeJun2024: {
                            required: true
                        },
                        continuousPresenceEvidence: {
                            required: true
                        },
                        suitableQualificationOption: {
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
                            required: '<span class="en">First name is required</span><span class="es">El nombre es requerido</span>'
                        },
                        last_name: {
                            required: '<span class="en">Last name is required</span><span class="es">El apellido es requerido</span>'
                        },
                        currentStateAndCountry: {
                            required: '<span class="en">State and Country are required</span><span class="es">El estado y el país son requeridos</span>'
                        },
                        phoneNumber: {
                            required: '<span class="en">Phone number is required</span><span class="es">El número de teléfono es requerido</span>'
                        },
                        email: {
                            required: '<span class="en">Email is required</span><span class="es">El correo electrónico es requerido</span>',
                            email: '<span class="en">Please enter a valid email</span><span class="es">Por favor, ingrese un correo electrónico válido</span>'
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
                        suitableQualificationOption: {
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
                        error.insertAfter(element);
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
            });

        </script>
    </body>

</html>