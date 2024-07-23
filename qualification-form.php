<?php
include './defines/db_conn.php';
include './defines/functions.php';
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
        <link rel="stylesheet" href="./assets/css/style.css">
    </head>

    <body class="main-form-page roboto lang-<?php echo getLanguage(); ?>">
        <main class="py-5">
            <div class="container">
                <div class="d-flex justify-content-center gap-5 align-items-center mb-5">
                    <a href="?lang=english" class="lang-link <?php echo $active = (getLanguage() == 'english') ? 'active' : ''; ?> inter text-dark">ENGLISH</a><a href="?lang=spanish"
                        class="lang-link inter <?php echo $active = (getLanguage() == 'spanish') ? 'active' : ''; ?> text-dark">SPANISH</a>
                </div>
                <h2 class="text-center form-title fw-bold inter mb-4"> <?php echo getTranslation('Qualification',0,'label'); ?> </h2>
                <form action="./forms/qualification-form-process.php" method="post" id="qualification-form">
                    <div class="sec-1 mb-4">
                        <h3 class="form-sec-title text-center inter"><?php echo getTranslation('Qualification',59,'label'); ?></h3>
                        <fieldset class="px-sm-5 px-4 py-4">
                            <div class="row justify-content-around">
                                <div class="col-xl-5 col-lg-6">
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="firstName" class="form-label gap-1 d-flex align-items-center"><span><?php echo getTranslation('Qualification',1,'label'); ?></span><img src="./assets/images/question-icon.svg" data-bs-toggle="tooltip" title="<?php echo getTranslation('Qualification',1,'help'); ?>" class="help-icon" alt="Icon"
                                            width="16"></label>
                                            <div class="input-div">
                                                <input type="text" class="form-control mt-1" id="firstName"  name="firstName"
                                                    placeholder="John">
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="middleName" class="form-label gap-1 d-flex align-items-center"><span><?php echo getTranslation('Qualification',70,'label'); ?> </span><img src="./assets/images/question-icon.svg" data-bs-toggle="tooltip" title="<?php echo getTranslation('Qualification',70,'help'); ?>" class="help-icon" alt="Icon"
                                                    width="16"></label>
                                            <div class="input-div">
                                                <input type="text" class="form-control mt-1" id="middleName"  name="middleName"
                                                    placeholder="Vin">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-5 col-lg-6">
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="lastName" class="form-label gap-1 d-flex align-items-center"><span><?php echo getTranslation('Qualification',2,'label'); ?></span><img src="./assets/images/question-icon.svg" data-bs-toggle="tooltip" title="<?php echo getTranslation('Qualification',2,'help'); ?>" class="help-icon" alt="Icon"
                                                    width="16"></label>
                                            <div class="input-div">
                                                <input type="text" required class="form-control mt-1" id="lastName"  name="lastName"
                                                    placeholder="Doe">
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="birthday" class="form-label gap-1 d-flex align-items-center text-nowrap"><span><?php echo getTranslation('Qualification',3,'label'); ?></span><img src="./assets/images/question-icon.svg" data-bs-toggle="tooltip" title="<?php echo getTranslation('Qualification',3,'help'); ?>" class="help-icon" alt="Icon"
                                                    width="16"></label>
                                            <div class="input-div">
                                                <input type="text" required class="form-control mt-1 date" id="birthday"  name="birthday"
                                                    placeholder="DD/MM/YY">
                                                <img src="./assets/images/calendar.svg" alt="Icon"
                                                    class="inp-icon-right calendar cursor-point">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-5 col-lg-6">
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="birthPlace" class="form-label gap-1 d-flex align-items-center text-nowrap"><span><?php echo getTranslation('Qualification',4,'label'); ?></span><img src="./assets/images/question-icon.svg" data-bs-toggle="tooltip" title="<?php echo getTranslation('Qualification',4,'help'); ?>" class="help-icon" alt="Icon"
                                                    width="16"></label>
                                            <div class="input-div">
                                                <input type="text" required class="form-control mt-1" id="birthPlace"  name="birthPlace"
                                                    placeholder="New York, United States">
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="citizenshipCountry" class="form-label gap-1 d-flex align-items-center text-nowrap"><span><?php echo getTranslation('Qualification',71,'label'); ?></span><img src="./assets/images/question-icon.svg" data-bs-toggle="tooltip" title="<?php echo getTranslation('Qualification',71,'help'); ?>" class="help-icon" alt="Icon"
                                                    width="16"></label>
                                            <div class="input-div">
                                                <input type="text" required class="form-control mt-1" id="citizenshipCountry"  name="citizenshipCountry"
                                                    placeholder="United States">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-5 col-lg-6">
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="gender" class="form-label gap-1 d-flex align-items-center"><span><?php echo getTranslation('Qualification',72,'label'); ?></span><img src="./assets/images/question-icon.svg" data-bs-toggle="tooltip" title="<?php echo getTranslation('Qualification',72,'help'); ?>" class="help-icon" alt="Icon"
                                                    width="16"></label>
                                            <div class="input-div mt-1">
                                                <select class="form-control mt-1" required id="gender"  name="gender">
                                                    <option value="">Select gender</option>
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                    <div class="sec-2 mb-4">
                        <h3 class="form-sec-title text-center inter"><?php echo getTranslation('Qualification',60,'label'); ?></h3>
                        <fieldset class="px-sm-5 px-4 py-4">
                            <div class="row justify-content-around">
                                <div class="col-xl-5 col-lg-6">
                                    <div class="row">
                                        <div class="col-12 mb-3 pt-3">
                                            <label for="careOfName"
                                                class="form-label gap-1 d-flex align-items-center"><span><?php echo getTranslation('Qualification',73,'label'); ?></span><img src="./assets/images/question-icon.svg" data-bs-toggle="tooltip" title="<?php echo getTranslation('Qualification',73,'help'); ?>" class="help-icon" alt="Icon"
                                                    width="16"></label>
                                            <div class="input-div">
                                                <input type="text" class="form-control mt-1" id="careOfName" name="careOfName"
                                                    placeholder="Jon Smith">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-5 col-lg-6">
                                    <div class="row">
                                        <div class="col-12 mb-3 pt-3">
                                            <label for="street1"
                                                class="form-label gap-1 d-flex align-items-center"><span><?php echo getTranslation('Qualification',5,'label'); ?></span><img src="./assets/images/question-icon.svg" data-bs-toggle="tooltip" title="<?php echo getTranslation('Qualification',5,'help'); ?>" class="help-icon" alt="Icon"
                                                    width="16"></label>
                                            <div class="input-div">
                                                <input type="text" class="form-control mt-1" id="street1" name="street1"
                                                    placeholder="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-5 col-lg-6">
                                    <div class="row">
                                        <div class="col-12 mb-3 pt-3">
                                            <label for="street2"
                                                class="form-label gap-1 d-flex align-items-center"><span><?php echo getTranslation('Qualification',6,'label'); ?></span><img src="./assets/images/question-icon.svg" data-bs-toggle="tooltip" title="<?php echo getTranslation('Qualification',6,'help'); ?>" class="help-icon" alt="Icon"
                                                    width="16"></label>
                                            <div class="input-div">
                                                <input type="text" class="form-control mt-1" id="street2" name="street2"
                                                    placeholder="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-5 col-lg-6">
                                    <div class="row">
                                        <div class="col-12 mb-3 pt-3">
                                            <label for="zipCode"
                                                class="form-label gap-1 d-flex align-items-center"><span><?php echo getTranslation('Qualification',7,'label'); ?></span><img src="./assets/images/question-icon.svg" data-bs-toggle="tooltip" title="<?php echo getTranslation('Qualification',7,'help'); ?>" class="help-icon" alt="Icon"
                                                    width="16"></label>
                                            <div class="input-div">
                                                <input type="text" class="form-control mt-1" id="zipCode" name="zipCode"
                                                    placeholder="11004">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-5 col-lg-6">
                                    <div class="row">
                                        <div class="col-sm-6 mb-3 pt-3">
                                            <label for="city" class="form-label gap-1 d-flex align-items-center"><span><?php echo getTranslation('Qualification',8,'label'); ?></span><img src="./assets/images/question-icon.svg" data-bs-toggle="tooltip" title="<?php echo getTranslation('Qualification',8,'help'); ?>" class="help-icon" alt="Icon"
                                            width="16"></label>
                                            <div class="input-div">
                                                <input type="text" class="form-control mt-1" id="city" name="city"
                                                    placeholder="Queens">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 mb-3 pt-3">
                                            <label for="state" class="form-label gap-1 d-flex align-items-center"><span><?php echo getTranslation('Qualification',9,'label'); ?></span><img src="./assets/images/question-icon.svg" data-bs-toggle="tooltip" title="<?php echo getTranslation('Qualification',9,'help'); ?>" class="help-icon" alt="Icon"
                                            width="16"></label>
                                            <div class="input-div">
                                                <input type="text" class="form-control mt-1" id="state" name="state"
                                                    placeholder="New York">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-5 col-lg-6">
                                    <div class="row">
                                        <div class="col-12 mb-3 pt-3">
                                            <label for="cellPhone"
                                                class="form-label gap-1 d-flex align-items-center"><span><?php echo getTranslation('Qualification',10,'label'); ?></span><img src="./assets/images/question-icon.svg" data-bs-toggle="tooltip" title="<?php echo getTranslation('Qualification',10,'help'); ?>" class="help-icon" alt="Icon"
                                                    width="16"></label>
                                            <div class="input-div">
                                                <input type="text" class="form-control mt-1 phone-number" id="cellPhone" name="cellPhone"
                                                    placeholder="Phone number">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-5 col-lg-6">
                                    <div class="row">
                                        <div class="col-12 mb-3 pt-3">
                                            <label for="homePhone"
                                                class="form-label gap-1 d-flex align-items-center"><span><?php echo getTranslation('Qualification',12,'label'); ?></span><img src="./assets/images/question-icon.svg" data-bs-toggle="tooltip" title="<?php echo getTranslation('Qualification',12,'help'); ?>" class="help-icon" alt="Icon"
                                                    width="16"></label>
                                            <div class="input-div">
                                                <input type="text" class="form-control mt-1 phone-number" id="homePhone" name="homePhone"
                                                    placeholder="Phone number">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-5 col-lg-6">
                                    <div class="row">
                                        <div class="col-12 mb-3 pt-3">
                                            <label for="workPhone"
                                                class="form-label gap-1 d-flex align-items-center"><span><?php echo getTranslation('Qualification',13,'label'); ?></span><img src="./assets/images/question-icon.svg" data-bs-toggle="tooltip" title="<?php echo getTranslation('Qualification',13,'help'); ?>" class="help-icon" alt="Icon"
                                                    width="16"></label>
                                            <div class="input-div">
                                                <input type="text" class="form-control mt-1 phone-number" id="workPhone" name="workPhone"
                                                    placeholder="Phone number">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-5 col-lg-6">
                                    <div class="row">
                                        <div class="col-12 mb-3 pt-3">
                                            <label for="currentEmail"
                                                class="form-label gap-1 d-flex align-items-center"><span><?php echo getTranslation('Qualification',14,'label'); ?></span><img
                                                    src="./assets/images/question-icon.svg" data-bs-toggle="tooltip" title="<?php echo getTranslation('Qualification',14,'help'); ?>" class="help-icon" alt="Icon"
                                                    width="16"></label>
                                            <div class="input-div">
                                                <input type="email" class="form-control mt-1" id="currentEmail" name="currentEmail"
                                                    placeholder="Email@lato.com">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-5 col-lg-6">
                                    <div class="row">
                                        <div class="col-12 mb-3 pt-3">
                                            <label for="emergencyContact"
                                                class="form-label gap-1 d-flex align-items-center"><span><?php echo getTranslation('Qualification',15,'label'); ?></span><img src="./assets/images/question-icon.svg" data-bs-toggle="tooltip" title="<?php echo getTranslation('Qualification',15,'help'); ?>"
                                                    class="help-icon" alt="Icon" width="16"></label>
                                            <div class="input-div">
                                                <input type="text" class="form-control mt-1"
                                                    id="emergencyContact" name="emergencyContact" placeholder="John Doe">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-5 col-lg-6">
                                    <div class="row">
                                        <div class="col-12 mb-3 pt-3">
                                            <label for="emergencyPhone"
                                                class="form-label gap-1 d-flex align-items-center"><span><?php echo getTranslation('Qualification',16,'label'); ?></span><img src="./assets/images/question-icon.svg" data-bs-toggle="tooltip" title="<?php echo getTranslation('Qualification',16,'help'); ?>" class="help-icon" alt="Icon"
                                                    width="16"></label>
                                            <div class="input-div">
                                                <input type="text" class="form-control mt-1 phone-number"
                                                    id="emergencyPhone" name="emergencyPhone" placeholder="Phone number">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-5 col-lg-6">
                                    <div class="row">
                                        <div class="col-12 mb-3 pt-3">
                                            <label for="residency"
                                                class="form-label opacity-0 gap-1 d-flex align-items-center"><span>Residency</span><img src="./assets/images/question-icon.svg" data-bs-toggle="tooltip" title="" class="help-icon" alt="Icon"
                                                    width="16"></label>
                                            <div class="d-flex gap-3 align-items-center justify-content-center">
                                                <div class="form-check mb-0">
                                                    <label class="form-check-label" for="residenceApt"> Apt. </label>
                                                    <input class="form-check-input" type="checkbox" value="Apt"
                                                        id="residenceApt" name="residency[]">
                                                </div>
                                                <div class="form-check mb-0">
                                                    <label class="form-check-label" for="residenceSte"> Ste. </label>
                                                    <input class="form-check-input" type="checkbox" value="Ste"
                                                        id="residenceSte" name="residency[]">
                                                </div>
                                                <div class="form-check mb-0">
                                                    <label class="form-check-label" for="residenceFlr"> Flr. </label>
                                                    <input class="form-check-input" type="checkbox" value="Flr"
                                                        id="residenceFlr" name="residency[]">
                                                </div>
                                                <div class="form-check mb-0">
                                                    <label class="form-check-label" for="residenceOther"> Other. </label>
                                                    <input class="form-check-input" type="checkbox" value="Other"
                                                        id="residenceOther" name="residency[]">
                                                </div>
                                                <div class="input-div flex-grow-1">
                                                    <input type="text" class="form-control mt-1" id="residency" name="residency[]"
                                                        placeholder="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                    <div class="sec-3 mb-4">
                        <h3 class="form-sec-title text-center inter"><?php echo getTranslation('Qualification',61,'label'); ?></h3>
                        <fieldset class="px-sm-5 px-4 py-4">
                            <div class="d-flex flex-column gap-5 mb-4 align-items-center">
                                <p class="text-center mb-0 text-black"><span class="text-red">IMPORTANT</span> Watch
                                    immigration lawyer Nic Suriel explaining the importance of <strong>"Current Marriage
                                        to US Citizen"</strong></p>
                                <video poster="./assets/images/video-poster.png" controls class="info-video">
                                    <source src="./assets/video/sample-video.mp4" type="video/mp4">
                                </video>
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
                                                class="form-label gap-1 d-flex align-items-center"><span><?php echo getTranslation('Qualification',17,'label'); ?></span><img src="./assets/images/question-icon.svg" data-bs-toggle="tooltip" title="<?php echo getTranslation('Qualification',17,'help'); ?>"
                                                    class="help-icon" alt="Icon" width="16"></label>
                                            <div class="input-div">
                                                <input type="text" class="form-control mt-1" id="spouseName" name="spouseName"
                                                    placeholder="lorum ipsum">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-5 col-lg-6">
                                    <div class="row">
                                        <div class="col-12 mb-3 pt-3">
                                            <label for="dateOfMarriage"
                                                class="form-label gap-1 d-flex align-items-center"><span><?php echo getTranslation('Qualification',20,'label'); ?></span><img src="./assets/images/question-icon.svg" data-bs-toggle="tooltip" title="<?php echo getTranslation('Qualification',20,'help'); ?>"
                                                    class="help-icon" alt="Icon" width="16"></label>
                                            <div class="input-div">
                                                <input type="text" class="form-control mt-1 date" id="dateOfMarriage" name="dateOfMarriage"
                                                    placeholder="DD / MM / YY">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-5 col-lg-6">
                                    <div class="row">
                                        <div class="col-12 mb-3 pt-3">
                                            <label for="stateCountryOfMarriage"
                                                class="form-label gap-1 d-flex align-items-center"><span><?php echo getTranslation('Qualification',19,'label'); ?> </span><img
                                                    src="./assets/images/question-icon.svg" data-bs-toggle="tooltip" title="<?php echo getTranslation('Qualification',19,'help'); ?>" class="help-icon" alt="Icon"
                                                    width="16"></label>
                                            <div class="input-div">
                                                <input type="text" class="form-control mt-1"
                                                    id="stateCountryOfMarriage" name="stateCountryOfMarriage"
                                                    placeholder="New York, United States">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-5 col-lg-6">
                                    <div class="row">
                                        <div class="col-12 mb-3 pt-3">
                                            <label for="spouseBirthday"
                                                class="form-label gap-1 d-flex align-items-center"><span><?php echo getTranslation('Qualification',18,'label'); ?></span><img src="./assets/images/question-icon.svg" data-bs-toggle="tooltip" title="<?php echo getTranslation('Qualification',18,'help'); ?>"
                                                    class="help-icon" alt="Icon" width="16"></label>
                                            <div class="input-div">
                                                <input type="text" class="form-control mt-1 date" id="spouseBirthday" name="spouseBirthday"
                                                    placeholder="DD / MM / YY">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-5 col-lg-6">
                                    <div class="row">
                                        <div class="col-12 mb-3 pt-3">
                                            <label for="proofOfSpouseCitizenship"
                                                class="form-label gap-1 d-flex align-items-center"><span><?php echo getTranslation('Qualification',21,'label'); ?> </span><img
                                                    src="./assets/images/question-icon.svg" data-bs-toggle="tooltip" title="<?php echo getTranslation('Qualification',21,'help'); ?>" class="help-icon" alt="Icon"
                                                    width="16"></label>
                                            <div class="input-div">
                                                <input type="text" class="form-control mt-1"
                                                    id="proofOfSpouseCitizenship" name="proofOfSpouseCitizenship" placeholder="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-5 col-lg-6">
                                    <div class="row">
                                        <div class="col-12 mb-3 pt-3 text-end">
                                            <p
                                                class="d-flex gap-1 justify-content-end align-items-center show-previous-marriage text-primary">
                                                <img src="./assets/images/plus.svg" class="help-icon" alt="Icon" width="13"><span>Previous
                                                    Marriage</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                    <div class="sec-4 mb-4">
                        <h3 class="form-sec-title text-center inter"><?php echo getTranslation('Qualification',62,'label'); ?></h3>
                        <fieldset class="px-sm-5 px-4 py-4">
                            <div class="row justify-content-around">
                                <div class="col-xl-5 col-lg-6">
                                    <div class="row">
                                        <div class="col-12 mb-3 pt-3">
                                            <label for="exSpouseName"
                                                class="form-label gap-1 d-flex align-items-center"><span><?php echo getTranslation('Qualification',74,'label'); ?></span><img src="./assets/images/question-icon.svg" data-bs-toggle="tooltip" title="<?php echo getTranslation('Qualification',74,'help'); ?>"
                                                    class="help-icon" alt="Icon" width="16"></label>
                                            <div class="input-div">
                                                <input type="text" class="form-control mt-1" id="exSpouseName" name="exSpouseName"
                                                    placeholder="lorum ipsum">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-5 col-lg-6">
                                    <div class="row">
                                        <div class="col-12 mb-3 pt-3">
                                            <label for="exDateOfMarriage"
                                                class="form-label gap-1 d-flex align-items-center"><span><?php echo getTranslation('Qualification',20,'label'); ?></span><img src="./assets/images/question-icon.svg" data-bs-toggle="tooltip" title="<?php echo getTranslation('Qualification',20,'help'); ?>"
                                                    class="help-icon" alt="Icon" width="16"></label>
                                            <div class="input-div">
                                                <input type="text" class="form-control mt-1 date" id="exDateOfMarriage" name="exDateOfMarriage"
                                                    placeholder="DD / MM / YY">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-5 col-lg-6">
                                    <div class="row">
                                        <div class="col-12 mb-3 pt-3">
                                            <label for="exPlaceOfMarriage"
                                                class="form-label gap-1 d-flex align-items-center"><span><?php echo getTranslation('Qualification',19,'label'); ?> </span><img
                                                    src="./assets/images/question-icon.svg" data-bs-toggle="tooltip" title="<?php echo getTranslation('Qualification',19,'help'); ?>" class="help-icon" alt="Icon"
                                                    width="16"></label>
                                            <div class="input-div">
                                                <input type="text" class="form-control mt-1"
                                                    id="exPlaceOfMarriage" name="exPlaceOfMarriage"
                                                    placeholder="New York, United States">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-5 col-lg-6">
                                    <div class="row">
                                        <div class="col-12 mb-3 pt-3">
                                            <label for="exPlaceOfDivorce"
                                                class="form-label gap-1 d-flex align-items-center"><span><?php echo getTranslation('Qualification',75,'label'); ?> </span><img
                                                    src="./assets/images/question-icon.svg" data-bs-toggle="tooltip" title="<?php echo getTranslation('Qualification',75,'help'); ?>" class="help-icon" alt="Icon"
                                                    width="16"></label>
                                            <div class="input-div">
                                                <input type="text" class="form-control mt-1" id="exPlaceOfDivorce" name="exPlaceOfDivorce"
                                                    placeholder="New York, United States">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-5 col-lg-6">
                                    <div class="row">
                                        <div class="col-12 mb-3 pt-3">
                                            <label for="exDateOfMarriage"
                                                class="form-label gap-1 d-flex align-items-center"><span><?php echo getTranslation('Qualification',76,'label'); ?></span><img src="./assets/images/question-icon.svg" data-bs-toggle="tooltip" title="<?php echo getTranslation('Qualification',76,'help'); ?>"
                                                    class="help-icon" alt="Icon" width="16"></label>
                                            <div class="input-div">
                                                <input type="text" class="form-control mt-1 date" id="exDateOfDivorce" name="exDateOfDivorce"
                                                    placeholder="DD / MM / YY">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-5 col-lg-6">
                                    <div class="row">
                                        <div class="col-12 mb-3 pt-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="Yes"
                                                    id="obtainDecreeOfDivorce" name="obtainDecreeOfDivorce">
                                                <label class="form-check-label gap-1 d-flex align-items-center" for="obtainDecreeOfDivorce"> <span> <?php echo getTranslation('Qualification',77,'label'); ?> </span><img
                                                    src="./assets/images/question-icon.svg" data-bs-toggle="tooltip" title="<?php echo getTranslation('Qualification',77,'help'); ?>" class="help-icon" alt="Icon"
                                                    width="16"></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                    <div class="sec-5 mb-4">
                        <h3 class="form-sec-title text-center inter"><?php echo getTranslation('Qualification',63,'label'); ?></h3>
                        <fieldset class="px-sm-5 px-4 py-4">
                            <div class="d-flex flex-column gap-5 mb-4 align-items-center">
                                <p class="text-center mb-0 text-black"><span class="text-red">IMPORTANT</span> Watch
                                    immigration lawyer Nic Suriel explaining the importance of <strong>"US
                                        Entries"</strong></p>
                                <video poster="./assets/images/video-poster.png" controls class="info-video">
                                    <source src="./assets/video/sample-video.mp4" type="video/mp4">
                                </video>
                            </div>
                            <div class="row justify-content-around">
                                <div class="col-xl-5 col-lg-6">
                                    <div class="row">
                                        <div class="col-12 mb-3 pt-3">
                                            <label for="dateOfEntry"
                                                class="form-label gap-1 d-flex align-items-center"><span><?php echo getTranslation('Qualification',22,'label'); ?></span><img
                                                    src="./assets/images/question-icon.svg" data-bs-toggle="tooltip" title="<?php echo getTranslation('Qualification',22,'help'); ?>" class="help-icon" alt="Icon"
                                                    width="16"></label>
                                            <div class="input-div">
                                                <input type="text" class="form-control mt-1 date" id="dateOfEntry" name="dateOfEntry[]"
                                                    placeholder="DD / MM / YY">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-5 col-lg-6">
                                    <div class="row">
                                        <div class="col-12 mb-3 pt-3">
                                            <label for="stateOfEntry"
                                                class="form-label gap-1 d-flex align-items-center"><span><?php echo getTranslation('Qualification',23,'label'); ?>
                                                    you entered US</span><img src="./assets/images/question-icon.svg" data-bs-toggle="tooltip" title="<?php echo getTranslation('Qualification',23,'help'); ?>"
                                                    class="help-icon" alt="Icon" width="16"></label>
                                            <div class="input-div">
                                                <input type="text" class="form-control mt-1" id="stateOfEntry" name="stateOfEntry[]"
                                                    placeholder="New York">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-5 col-lg-6">
                                    <div class="row">
                                        <div class="col-12 mb-3 pt-3">
                                            <label for="methodOfEntry"
                                                class="form-label gap-1 d-flex align-items-center"><span><?php echo getTranslation('Qualification',24,'label'); ?></span><img src="./assets/images/question-icon.svg" data-bs-toggle="tooltip" title="<?php echo getTranslation('Qualification',24,'help'); ?>"
                                                    class="help-icon" alt="Icon" width="16"></label>
                                            <div class="input-div">
                                                <textarea class="form-control mt-1" rows="5" id="methodOfEntry" name="methodOfEntry[]"
                                                    placeholder="Briefly Describe your Entry..."></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-5 col-lg-6">
                                    <div class="row">
                                        <div class="col-12 mb-3 pt-3">
                                            <label for="anyIllegalDocumentOnEntry"
                                                class="form-label gap-1 d-flex align-items-center"><span><?php echo getTranslation('Qualification',25,'label'); ?></span></label>
                                            <div class="input-div">
                                                <textarea class="form-control mt-1" rows="5"
                                                    id="anyIllegalDocumentOnEntry" name="anyIllegalDocumentOnEntry[]"
                                                    placeholder="E.g., someone's else's birth certificate, a forged passport. Describe in detail."></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-5 col-lg-6">
                                    <div class="row">
                                        <div class="col-12 mb-3 pt-3">
                                            <label for="detainedByUSPatrol"
                                                class="form-label gap-1 d-flex align-items-center"><span><?php echo getTranslation('Qualification',26,'label'); ?></span><img
                                                    src="./assets/images/question-icon.svg" data-bs-toggle="tooltip" title="<?php echo getTranslation('Qualification',26,'help'); ?>" class="help-icon" alt="Icon"
                                                    width="16"></label>
                                            <div class="input-div">
                                                <textarea class="form-control mt-1" rows="5" id="detainedByUSPatrol" name="detainedByUSPatrol[]"
                                                    placeholder="Were you finger printed? Were you incarcerated? 
Describe in detail"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-5 col-lg-6">
                                    <div class="row">
                                        <div class="col-12 mb-3 pt-3 text-end">
                                            <p
                                                class="d-flex gap-1 justify-content-end align-items-center more-entries text-primary">
                                                <img src="./assets/images/plus.svg" class="help-icon" alt="Icon" width="13"><span>US
                                                    Entries</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                    <div class="sec-6 mb-4">
                        <h3 class="form-sec-title text-center inter"><?php echo getTranslation('Qualification',64,'label'); ?></h3>
                        <fieldset class="px-sm-5 px-4 py-4">
                            <div class="d-flex flex-column gap-5 mb-4 align-items-center">
                                <p class="text-center mb-0 text-black"><span class="text-red">IMPORTANT</span> Watch
                                    immigration lawyer Nic Suriel explaining the importance of <strong>"Residency
                                        Documents"</strong></p>
                                <video poster="./assets/images/video-poster.png" controls class="info-video">
                                    <source src="./assets/video/sample-video.mp4" type="video/mp4">
                                </video>
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
                                                    <input class="form-check-input" type="checkbox" 
                                                        id="taxReturn" name="documentType[]" value="Tax Return">
                                                </div>
                                                <div class="flex-grow-1">
                                                    <label for="taxReturnYears"
                                                        class="form-label gap-1 d-flex align-items-center"><span><?php echo getTranslation('Qualification',27,'label'); ?></span><img
                                                    src="./assets/images/question-icon.svg" data-bs-toggle="tooltip" title="<?php echo getTranslation('Qualification',27,'help'); ?>" class="help-icon" alt="Icon"
                                                    width="16"></label>
                                                    <div class="input-div">
                                                        <input type="text" name="documentDesc[]" class="form-control mt-1" id="taxReturnYears"
                                                            placeholder="Enter all of the years that you filed a Federal Tax returns [e.g., 2010 through 2023]">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 mb-3 pt-3">
                                            <div class="d-flex gap-3 check-input">
                                                <div>
                                                    <input class="form-check-input" type="checkbox" 
                                                        id="birthCertChildern" name="documentType[]" value="Childern Birth Certificate">
                                                </div>
                                                <div class="flex-grow-1">
                                                    <label for="birthCertNameDate"
                                                        class="form-label gap-1 d-flex align-items-center"><span><?php echo getTranslation('Qualification',28,'label'); ?></span><img
                                                    src="./assets/images/question-icon.svg" data-bs-toggle="tooltip" title="<?php echo getTranslation('Qualification',28,'help'); ?>" class="help-icon" alt="Icon"
                                                    width="16"></label>
                                                    <div class="input-div">
                                                        <input type="text" name="documentDesc[]" class="form-control mt-1"
                                                            id="birthCertNameDate"
                                                            placeholder="[e.g., Rosita Juarez Tipton, 9/18/2019, Wisconsin]">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 mb-3 pt-3">
                                            <div class="d-flex gap-3 check-input">
                                                <div>
                                                    <input class="form-check-input" type="checkbox"  value="W-2" id="w2"
                                                        name="documentType[]">
                                                </div>
                                                <div class="flex-grow-1">
                                                    <label for="w2NameDate"
                                                        class="form-label gap-1 d-flex align-items-center"><span><?php echo getTranslation('Qualification',29,'label'); ?></span><img
                                                    src="./assets/images/question-icon.svg" data-bs-toggle="tooltip" title="<?php echo getTranslation('Qualification',29,'help'); ?>" class="help-icon" alt="Icon"
                                                    width="16"></label>
                                                    <div class="input-div">
                                                        <input type="text" name="documentDesc[]" class="form-control mt-1" id="w2NameDate"
                                                            placeholder="[e.g., Honeywell, AZ, 2020 to 2023 ; Safeway, PA, 2010 to 2019]">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 mb-3 pt-3">
                                            <div class="d-flex gap-3 check-input">
                                                <div>
                                                    <input class="form-check-input" type="checkbox" value="Driving License"
                                                        id="drivingLicense" name="documentType[]">
                                                </div>
                                                <div class="flex-grow-1">
                                                    <label for="drivingLicenseStateExpiry"
                                                        class="form-label gap-1 d-flex align-items-center"><span><?php echo getTranslation('Qualification',30,'label'); ?></span><img
                                                    src="./assets/images/question-icon.svg" data-bs-toggle="tooltip" title="<?php echo getTranslation('Qualification',30,'help'); ?>" class="help-icon" alt="Icon"
                                                    width="16"></label>
                                                    <div class="input-div">
                                                        <input type="text" name="documentDesc[]" class="form-control mt-1"
                                                            id="drivingLicenseStateExpiry"
                                                            placeholder="[e.g., Arizona, 2598617, 2026; Wisconsin, A0463892, 2019">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 mb-3 pt-3">
                                            <div class="d-flex gap-3 check-input">
                                                <div>
                                                    <input class="form-check-input" type="checkbox" value="State ID"
                                                        id="stateIDs" name="documentType[]">
                                                </div>
                                                <div class="flex-grow-1">
                                                    <label for="stateIDsNameNumber"
                                                        class="form-label gap-1 d-flex align-items-center"><span><?php echo getTranslation('Qualification',31,'label'); ?></span><img
                                                    src="./assets/images/question-icon.svg" data-bs-toggle="tooltip" title="<?php echo getTranslation('Qualification',31,'help'); ?>" class="help-icon" alt="Icon"
                                                    width="16"></label>
                                                    <div class="input-div">
                                                        <input type="text" name="documentDesc[]" class="form-control mt-1"
                                                            id="stateIDsNameNumber"
                                                            placeholder="Maine, State ID: 12345678; Ohio, State ID: 326598741">
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
                                                <input class="form-check-input" type="checkbox" value="Other Documents"
                                                    id="validateDoc" name="documentType[]">
                                            </div>
                                            <div class="flex-grow-1">
                                                <label for="validateDocDesc"
                                                    class="form-label gap-1 d-flex align-items-center"><span><?php echo getTranslation('Qualification',32,'label'); ?></span><img
                                                    src="./assets/images/question-icon.svg" data-bs-toggle="tooltip" title="<?php echo getTranslation('Qualification',32,'help'); ?>" class="help-icon" alt="Icon"
                                                    width="16"></label>
                                                <div class="input-div">
                                                    <textarea class="form-control mt-1" rows="5" name="documentDesc[]" id="validateDocDesc"
                                                        placeholder="[Lease or Rental Agreement, Names of the tenant and landlord, Address of the rental property, Duration of the lease (start and end dates), Date the lease was signed.
Utility Bills Type, e.g., electricity, Name of the account holder, Service address, Billing period (dates)
"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                    <div class="sec-7 mb-4">
                        <h3 class="form-sec-title text-center inter"><?php echo getTranslation('Qualification',65,'label'); ?></h3>
                        <fieldset class="px-sm-5 px-4 py-4">
                            <div class="d-flex flex-column gap-5 mb-4 align-items-center">
                                <p class="text-center mb-0 text-black"><span class="text-red">IMPORTANT</span> Watch
                                    immigration lawyer Nic Suriel explaining the importance of <strong>"Encounters with
                                        Law Enforcement Agencies"</strong></p>
                                <video poster="./assets/images/video-poster.png" controls class="info-video">
                                    <source src="./assets/video/sample-video.mp4" type="video/mp4">
                                </video>
                            </div>
                            <div class="text-center col-lg-8 mx-auto">
                                <p class="fw-medium text-black mt-5 inter">Describe if any documented involvement with
                                    US Law Enforcement Agencies (these include warnings, speeding tickets, arrests etc)
                                </p>
                            </div>
                            <div class="row justify-content-around">
                                <div class="col-xl-5 col-lg-6">
                                    <div class="row">
                                        <div class="col-12 mb-3 pt-3">
                                            <label for="dateOfEncounter"
                                                class="form-label gap-1 d-flex align-items-center"><span>Date of
                                                    Encounter</span><img src="./assets/images/question-icon.svg" data-bs-toggle="tooltip"
                                                    class="help-icon" alt="Icon" width="16"></label>
                                            <div class="input-div">
                                                <input type="text" class="form-control mt-1 date" id="dateOfEncounter"
                                                    placeholder="DD / MM / YY">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-5 col-lg-6">
                                    <div class="row">
                                        <div class="col-12 mb-3 pt-3">
                                            <label for="stateOfEntry"
                                                class="form-label gap-1 d-flex align-items-center"><span>State and
                                                    Country of Legal Encounter</span><img
                                                    src="./assets/images/question-icon.svg" data-bs-toggle="tooltip" title="" class="help-icon" alt="Icon"
                                                    width="16"></label>
                                            <div class="input-div">
                                                <input type="text" class="form-control mt-1" id="stateOfEntry"
                                                    placeholder="New York, United States">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-5 col-lg-6">
                                    <div class="row">
                                        <div class="col-12 mb-3 pt-3">
                                            <label for="legalIssue"
                                                class="form-label gap-1 d-flex align-items-center"><span>Nature of Legal
                                                    Issue</span><img src="./assets/images/question-icon.svg" data-bs-toggle="tooltip" title="" class="help-icon" alt="Icon"
                                                    width="16"></label>
                                            <div class="input-div">
                                                <input type="text" class="form-control mt-1" id="legalIssue"
                                                    placeholder="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-5 col-lg-6">
                                    <div class="row">
                                        <div class="col-12 mb-3 pt-3">
                                            <label for="issueDescription"
                                                class="form-label gap-1 d-flex align-items-center"><span>Description</span><img
                                                    src="./assets/images/question-icon.svg" data-bs-toggle="tooltip" title="" class="help-icon" alt="Icon"
                                                    width="16"></label>
                                            <div class="input-div">
                                                <textarea class="form-control mt-1" rows="5" id="issueDescription"
                                                    placeholder="Briefly describe your encounter with any US law enforcement agencies, be it ICE, police or any other agency"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-5 col-lg-6">
                                    <div class="row">
                                        <div class="col-12 mb-3 pt-3 text-start">
                                            <p
                                                class="d-flex gap-1 justify-content-start align-items-center more-encounters text-primary">
                                                <img src="./assets/images/plus.svg" class="help-icon" alt="Icon" width="13"><span>Other
                                                    Legal Encounters</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-5 col-lg-6"></div>
                            </div>
                        </fieldset>
                    </div>
                    <div class="sec-8 mb-4">
                        <h3 class="form-sec-title text-center inter"><?php echo getTranslation('Qualification',66,'label'); ?></h3>
                        <fieldset class="px-sm-3 px-3 py-4">
                            <div class="d-flex flex-column gap-5 mb-4 align-items-center">
                                <p class="text-center mb-0 text-black"><span class="text-red">IMPORTANT</span> Watch
                                    immigration lawyer Nic Suriel explaining the importance of <strong>"Foreign Born
                                        Children Seeking PIPE Benefits"</strong></p>
                                <video poster="./assets/images/video-poster.png" controls class="info-video">
                                    <source src="./assets/video/sample-video.mp4" type="video/mp4">
                                </video>
                            </div>
                            <div class="table-responsive-lg mt-5">
                                <table class="table foreign-table">
                                    <tr>
                                        <th>
                                            <div class="d-flex flex-column align-items-center">
                                                <span>Full Legal Name</span>
                                                <img src="./assets/images/question-icon.svg" data-bs-toggle="tooltip" title="" class="help-icon" alt="Icon" width="16">
                                            </div>
                                        </th>
                                        <th>
                                            <div class="d-flex flex-column align-items-center">
                                                <span>Birthday</span>
                                                <img src="./assets/images/question-icon.svg" data-bs-toggle="tooltip" title="" class="help-icon" alt="Icon" width="16">
                                            </div>
                                        </th>
                                        <th>
                                            <div class="d-flex flex-column align-items-center">
                                                <span>State and Country of Birth</span>
                                                <img src="./assets/images/question-icon.svg" data-bs-toggle="tooltip" title="" class="help-icon" alt="Icon" width="16">
                                            </div>
                                        </th>
                                        <th>
                                            <div class="d-flex flex-column align-items-center">
                                                <span>Mother's Name</span>
                                                <img src="./assets/images/question-icon.svg" data-bs-toggle="tooltip" title="" class="help-icon" alt="Icon" width="16">
                                            </div>
                                        </th>
                                        <th>
                                            <div class="d-flex flex-column align-items-center">
                                                <span>Father's Name</span>
                                                <img src="./assets/images/question-icon.svg" data-bs-toggle="tooltip" title="" class="help-icon" alt="Icon" width="16">
                                            </div>
                                        </th>
                                        <th>
                                            <div class="d-flex flex-column align-items-center">
                                                <span>Gender</span>
                                                <img src="./assets/images/question-icon.svg" data-bs-toggle="tooltip" title="" class="help-icon" alt="Icon" width="16">
                                            </div>
                                        </th>
                                        <th>
                                            <div class="d-flex flex-column align-items-center">
                                                <span>School Attended, state and school years</span>
                                                <img src="./assets/images/question-icon.svg" data-bs-toggle="tooltip" title="" class="help-icon" alt="Icon" width="16">
                                            </div>
                                        </th>
                                        <th>
                                            <div class="d-flex flex-column align-items-center">
                                                <span>Do you access to their US school records?</span>
                                                <img src="./assets/images/question-icon.svg" data-bs-toggle="tooltip" title="" class="help-icon" alt="Icon" width="16">
                                            </div>
                                        </th>
                                    </tr>
                                    <tr>
                                        <td>
                                            <textarea name="" class="form-control table-input"></textarea>
                                        </td>
                                        <td>
                                            <textarea name="" class="form-control table-input"></textarea>
                                        </td>
                                        <td>
                                            <textarea name="" class="form-control table-input"></textarea>
                                        </td>
                                        <td>
                                            <textarea name="" class="form-control table-input"></textarea>
                                        </td>
                                        <td>
                                            <textarea name="" class="form-control table-input"></textarea>
                                        </td>
                                        <td>
                                            <select name="" id="" class="childGender table-input form-control c-select">
                                                <option value="">Select gender</option>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                            </select>
                                        </td>
                                        <td>
                                            <textarea name="" class="form-control table-input"></textarea>
                                        </td>
                                        <td>
                                            <div
                                                class="form-check d-flex align-items-center gap-1 justify-content-center">
                                                <input class="form-check-input" type="checkbox" value="Yes"
                                                    id="accessSchoolsRecords1" name="accessSchoolsRecords[]">
                                                <label class="form-check-label" for="accessSchoolsRecords1"> Yes</label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <textarea name="" class="form-control table-input"></textarea>
                                        </td>
                                        <td>
                                            <textarea name="" class="form-control table-input"></textarea>
                                        </td>
                                        <td>
                                            <textarea name="" class="form-control table-input"></textarea>
                                        </td>
                                        <td>
                                            <textarea name="" class="form-control table-input"></textarea>
                                        </td>
                                        <td>
                                            <textarea name="" class="form-control table-input"></textarea>
                                        </td>
                                        <td>
                                            <select name="" id="" class="childGender table-input form-control c-select">
                                                <option value="">Select gender</option>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                            </select>
                                        </td>
                                        <td>
                                            <textarea name="" class="form-control table-input"></textarea>
                                        </td>
                                        <td>
                                            <div
                                                class="form-check d-flex align-items-center gap-1 justify-content-center">
                                                <input class="form-check-input" type="checkbox" value="Yes"
                                                    id="accessSchoolsRecords2" name="accessSchoolsRecords[]">
                                                <label class="form-check-label" for="accessSchoolsRecords2"> Yes</label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <textarea name="" class="form-control table-input"></textarea>
                                        </td>
                                        <td>
                                            <textarea name="" class="form-control table-input"></textarea>
                                        </td>
                                        <td>
                                            <textarea name="" class="form-control table-input"></textarea>
                                        </td>
                                        <td>
                                            <textarea name="" class="form-control table-input"></textarea>
                                        </td>
                                        <td>
                                            <textarea name="" class="form-control table-input"></textarea>
                                        </td>
                                        <td>
                                            <select name="" id="" class="childGender table-input form-control c-select">
                                                <option value="">Select gender</option>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                            </select>
                                        </td>
                                        <td>
                                            <textarea name="" class="form-control table-input"></textarea>
                                        </td>
                                        <td>
                                            <div
                                                class="form-check d-flex align-items-center gap-1 justify-content-center">
                                                <input class="form-check-input" type="checkbox" value="Yes"
                                                    id="accessSchoolsRecords3" name="accessSchoolsRecords[]">
                                                <label class="form-check-label" for="accessSchoolsRecords3"> Yes</label>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </fieldset>
                    </div>
                    <div class="sec-9 mb-4">
                        <h3
                            class="form-sec-title text-center inter d-flex align-items-center justify-content-center gap-2">
                            <span><?php echo getTranslation('Qualification',67,'label'); ?></span> <small>(Optional)</small>
                        </h3>
                        <fieldset class="px-sm-5 px-4 py-4">
                            <div class="d-flex flex-column gap-5 mb-4 align-items-center">
                                <p class="text-center mb-0 text-black"><span class="text-red">IMPORTANT</span> Watch
                                    immigration lawyer Nic Suriel explaining the importance of
                                    <strong>"Occupation/Employment"</strong></p>
                                <video poster="./assets/images/video-poster.png" controls class="info-video">
                                    <source src="./assets/video/sample-video.mp4" type="video/mp4">
                                </video>
                            </div>
                            <div class="row justify-content-around">
                                <div class="col-xl-5 col-lg-6">
                                    <div class="row">
                                        <div class="col-12 mb-3 pt-3">
                                            <label for="empName"
                                                class="form-label gap-1 d-flex align-items-center"><span>Employer</span><img
                                                    src="./assets/images/question-icon.svg" data-bs-toggle="tooltip" title="" class="help-icon" alt="Icon"
                                                    width="16"></label>
                                            <div class="input-div">
                                                <input type="text" class="form-control mt-1" id="empName"
                                                    placeholder="Employer Name">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-5 col-lg-6">
                                    <div class="row">
                                        <div class="col-12 mb-3 pt-3">
                                            <label for="empAddress"
                                                class="form-label gap-1 d-flex align-items-center"><span>Employer's
                                                    Address</span><img src="./assets/images/question-icon.svg" data-bs-toggle="tooltip"
                                                    class="help-icon" alt="Icon" width="16"></label>
                                            <div class="input-div">
                                                <input type="text" class="form-control mt-1" id="empAddress"
                                                    placeholder="Employer Complete Address">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-5 col-lg-6">
                                    <div class="row">
                                        <div class="col-12 mb-3 pt-3">
                                            <label for="startDate"
                                                class="form-label gap-1 d-flex align-items-center"><span>Start
                                                    Date</span><img src="./assets/images/question-icon.svg" data-bs-toggle="tooltip" title="" class="help-icon" alt="Icon"
                                                    width="16"></label>
                                            <div class="input-div">
                                                <input type="text" class="form-control mt-1 date" id="startDate"
                                                    placeholder="DD / MM / YY">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-5 col-lg-6">
                                    <div class="row">
                                        <div class="col-12 mb-3 pt-3">
                                            <label for="jobTitle"
                                                class="form-label gap-1 d-flex align-items-center"><span>Job
                                                    Title</span><img src="./assets/images/question-icon.svg" data-bs-toggle="tooltip" title="" class="help-icon" alt="Icon"
                                                    width="16"></label>
                                            <div class="input-div">
                                                <input type="text" class="form-control mt-1" id="jobTitle"
                                                    placeholder="Your Job title">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-5 col-lg-6">
                                    <div class="row">
                                        <div class="col-12 mb-3 pt-3">
                                            <label for="lastDate"
                                                class="form-label gap-1 d-flex align-items-center"><span>Last
                                                    Date</span><img src="./assets/images/question-icon.svg" data-bs-toggle="tooltip" title="" class="help-icon" alt="Icon"
                                                    width="16"></label>
                                            <div class="input-div">
                                                <input type="text" class="form-control mt-1 date" id="lastDate"
                                                    placeholder="DD / MM / YY">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-5 col-lg-6">
                                    <div class="row">
                                        <div class="col-12 mb-3 pt-3">
                                            <label for="jobDescription"
                                                class="form-label gap-1 d-flex align-items-center"><span>Job
                                                    Description</span><img src="./assets/images/question-icon.svg" data-bs-toggle="tooltip"
                                                    class="help-icon" alt="Icon" width="16"></label>
                                            <div class="input-div">
                                                <textarea class="form-control mt-1" rows="5" id="jobDescription"
                                                    placeholder="Tell us about your Job..."></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-5 col-lg-6"></div>
                                <div class="col-xl-5 col-lg-6">
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
                                <div class="col-xl-5 col-lg-6"></div>
                            </div>
                        </fieldset>
                    </div>
                    <div class="sec-10 mb-4">
                        <h3
                            class="form-sec-title text-center inter d-flex align-items-center justify-content-center gap-2">
                            <span><?php echo getTranslation('Qualification',68,'label'); ?></span> <small>(Optional)</small>
                        </h3>
                        <fieldset class="px-sm-5 px-4 py-4">
                            <div class="d-flex flex-column gap-5 mb-4 align-items-center">
                                <p class="text-center mb-0 text-black"><span class="text-red">IMPORTANT</span> Watch
                                    immigration lawyer Nic Suriel explaining the importance of <strong>"Education
                                        Craft"</strong></p>
                                <video poster="./assets/images/video-poster.png" controls class="info-video">
                                    <source src="./assets/video/sample-video.mp4" type="video/mp4">
                                </video>
                            </div>
                            <div class="text-center col-xl-6 col-lg-8 mx-auto">
                                <p class="fw-medium text-black mt-5 inter">Describe your higher educational background,
                                    including any certifications or degrees from higher education institution</p>
                            </div>
                            <div class="row justify-content-around">
                                <div class="col-xl-5 col-lg-6">
                                    <div class="row">
                                        <div class="col-12 mb-3 pt-3">
                                            <label for="CertificationDegree"
                                                class="form-label gap-1 d-flex align-items-center"><span>Certification/Degree</span><img
                                                    src="./assets/images/question-icon.svg" data-bs-toggle="tooltip" title="" class="help-icon" alt="Icon"
                                                    width="16"></label>
                                            <div class="input-div">
                                                <input type="text" class="form-control mt-1" id="CertificationDegree"
                                                    placeholder="lorum ipsum">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-5 col-lg-6">
                                    <div class="row">
                                        <div class="col-12 mb-3 pt-3">
                                            <label for="eduUniversity"
                                                class="form-label gap-1 d-flex align-items-center"><span>Institution
                                                    Issued Degree</span><img src="./assets/images/question-icon.svg" data-bs-toggle="tooltip"
                                                    class="help-icon" alt="Icon" width="16"></label>
                                            <div class="input-div">
                                                <input type="text" class="form-control mt-1" id="eduUniversity"
                                                    placeholder="university of New york">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-5 col-lg-6">
                                    <div class="row">
                                        <div class="col-12 mb-3 pt-3">
                                            <label for="degreeDate"
                                                class="form-label gap-1 d-flex align-items-center"><span>Date</span><img
                                                    src="./assets/images/question-icon.svg" data-bs-toggle="tooltip" title="" class="help-icon" alt="Icon"
                                                    width="16"></label>
                                            <div class="input-div">
                                                <input type="text" class="form-control mt-1 date" id="degreeDate"
                                                    placeholder="DD / MM / YY">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-5 col-lg-6">
                                    <div class="row">
                                        <div class="col-12 mb-3 pt-3">
                                            <label for="jobTitle"
                                                class="form-label gap-1 d-flex align-items-center"><span>State and
                                                    Country</span><img src="./assets/images/question-icon.svg" data-bs-toggle="tooltip"
                                                    class="help-icon" alt="Icon" width="16"></label>
                                            <div class="input-div">
                                                <input type="text" class="form-control mt-1" id="jobTitle"
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
                            <span><?php echo getTranslation('Qualification',69,'label'); ?></span>
                        </h3>
                        <fieldset class="px-sm-5 px-4 py-4">
                            <div class="row justify-content-around">
                                <div class="col-xl-5 col-lg-6">
                                    <div class="row">
                                        <div class="col-12 mb-3 pt-3">
                                            <label for="chooseDisease"
                                                class="form-label gap-1 d-flex align-items-start"><span>"Are you
                                                    currently being treated for any of communicable diseases(e.g.,
                                                    tuberculosis)? </span><input class="form-check-input"
                                                    type="checkbox" value="Yes" id="anyDisease" name="anyDisease"><img
                                                    src="./assets/images/question-icon.svg" data-bs-toggle="tooltip" title="" class="help-icon" alt="Icon"
                                                    width="16"></label>
                                            <div class="input-div">
                                                <select class="form-control mt-1" id="chooseDisease">
                                                    <option value="">From the list below, please choose any disease that
                                                        you are currently experiencing.</option>
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
                                        <div class="col-12 mb-3 pt-3">
                                            <label for="missingVaccineText"
                                                class="form-label gap-1 d-flex align-items-center"><span>Are you missing
                                                    any of the US required vaccine? </span><input
                                                    class="form-check-input" type="checkbox" value="Yes"
                                                    id="missingVaccine" name="missingVaccine"><img
                                                    src="./assets/images/question-icon.svg" data-bs-toggle="tooltip" title="" class="help-icon" alt="Icon"
                                                    width="16"></label>
                                            <div class="input-div">
                                                <input type="text" class="form-control mt-1" id="missingVaccineText"
                                                    placeholder="Enter Your  text here">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-5 col-lg-6">
                                    <div class="row">
                                        <div class="col-12 mb-3 pt-3">
                                            <label for="mentalDisorderChoose"
                                                class="form-label gap-1 d-flex align-items-start"><span>Have you ever
                                                    been diagnosed with a mental disorder?</span><input
                                                    class="form-check-input" type="checkbox" value="Yes"
                                                    id="mentalDisorder" name="mentalDisorder"><img
                                                    src="./assets/images/question-icon.svg" data-bs-toggle="tooltip" title="" class="help-icon" alt="Icon"
                                                    width="16"></label>
                                            <div class="input-div">
                                                <select class="form-control mt-1" id="mentalDisorderChoose">
                                                    <option value="">From the list below, please choose any mental issue
                                                        that you are currently experiencing</option>
                                                    <option value="psychotic-disorders">Psychotic Disorders, e.g.,
                                                        Schizophrenia</option>
                                                    <option value="mood-disorders">Mood Disorders</option>
                                                    <option value="anxiety-disorders">Anxiety Disorders</option>
                                                    <option value="personality-disorders">Personality Disorders</option>
                                                    <option value="neurodevelopmental-disorders">Neurodevelopmental
                                                        Disorders, e.g., autism spectrum disorders</option>
                                                    <option value="substance-use-disorders">Substance Use Disorders
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-5 col-lg-6">
                                    <div class="row">
                                        <div class="col-12 mb-3 pt-3">
                                            <label for="accusedDrugText"
                                                class="form-label gap-1 d-flex align-items-center"><span>Have you ever
                                                    been accused of drug addiction or abuse drug trafficking,
                                                    prostitution and commercialized vice?</span><img
                                                    src="./assets/images/question-icon.svg" data-bs-toggle="tooltip" title="" class="help-icon" alt="Icon"
                                                    width="16"></label>
                                            <div class="input-div">
                                                <input type="text" class="form-control mt-1" id="accusedDrugText"
                                                    placeholder="Enter Your  text here">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-5 col-lg-6">
                                    <div class="row">
                                        <div class="col-12 mb-3 pt-3">
                                            <label for="accusedChildAbduction"
                                                class="form-label gap-1 d-flex align-items-center"><span>Have you ever
                                                    been accused of child abduction?</span><img
                                                    src="./assets/images/question-icon.svg" data-bs-toggle="tooltip" title="" class="help-icon" alt="Icon"
                                                    width="16"></label>
                                            <div class="input-div">
                                                <input type="text" class="form-control mt-1" id="accusedChildAbduction"
                                                    placeholder="Enter Your  text here">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-5 col-lg-6">
                                    <div class="row">
                                        <div class="col-12 mb-3 pt-3">
                                            <label for="deportedFromUS"
                                                class="form-label gap-1 d-flex align-items-center"><span>Have you ever
                                                    been deported from the U.S? </span><img
                                                    src="./assets/images/question-icon.svg" data-bs-toggle="tooltip" title="" class="help-icon" alt="Icon"
                                                    width="16"></label>
                                            <div class="input-div">
                                                <input type="text" class="form-control mt-1" id="deportedFromUS"
                                                    placeholder="Enter Your  text here">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-5 col-lg-6">
                                    <div class="row">
                                        <div class="col-12 mb-3 pt-3">
                                            <label for="citizenshipAfter96"
                                                class="form-label gap-1 d-flex align-items-center"><span>Have you ever
                                                    claimed US citizenship after Sept 1996?</span><img
                                                    src="./assets/images/question-icon.svg" data-bs-toggle="tooltip" title="" class="help-icon" alt="Icon"
                                                    width="16"></label>
                                            <div class="input-div">
                                                <input type="text" class="form-control mt-1" id="citizenshipAfter96"
                                                    placeholder="Enter Your  text here">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-5 col-lg-6">
                                    <div class="row">
                                        <div class="col-12 mb-3 pt-3">
                                            <label for="electionsVoted"
                                                class="form-label gap-1 d-flex align-items-center"><span>List the US
                                                    elections you voted in?</span><img
                                                    src="./assets/images/question-icon.svg" data-bs-toggle="tooltip" title="" class="help-icon" alt="Icon"
                                                    width="16"></label>
                                            <div class="input-div">
                                                <input type="text" class="form-control mt-1" id="electionsVoted"
                                                    placeholder="Enter Your  text here">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-5 col-lg-6"></div>
                                <div class="col-xl-5 col-lg-6">
                                    <div class="row">
                                        <div class="col-12 mb-3 pt-3">
                                            <label for="capacityToSupport"
                                                class="form-label gap-1 d-flex align-items-center"><span>Describe your
                                                    capacity to support yourself?</span><img
                                                    src="./assets/images/question-icon.svg" data-bs-toggle="tooltip" title="" class="help-icon" alt="Icon"
                                                    width="16"></label>
                                            <div class="input-div">
                                                <textarea class="form-control mt-1" rows="5" id="capacityToSupport"
                                                    placeholder="Describe your skills"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                    <div class="text-center col-lg-6 mx-auto">
                        <p class="end-note">"If you have any questions, not answered by out (?), please add them below
                            or email us at <br><a href="mailto:support@ImmigrationAI.ai">"support@ImmigrationAI.ai"</a>
                        </p>
                    </div>
                    <div class="col-xl-9 col-lg-10 mx-auto mt-5">
                        <textarea name="other" id="other" class="form-control" rows="8"
                            placeholder="Briefly Describe"></textarea>
                    </div>
                    
                    <div class="text-center my-4">
                        <div id="response"></div>
                        <button class="btn btn-rectangle btn-primary"><span>Submit</span><img src="./assets/images/RightIcon.svg" alt="Icon" height="16"></button>
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
        <script src="https://cdn.tutorialjinni.com/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.21.0/jquery.validate.min.js" integrity="sha512-KFHXdr2oObHKI9w4Hv1XPKc898mE4kgYx58oqsc/JqqdLMDI4YjOLzom+EMlW8HFUd0QfjfAvxSL6sEq/a42fQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="./assets/js/script.js"></script>
        <script>
            function updateFormControls() {
                $('.check-input').each(function() {
                    // Check if any checkbox in the current .check-input div is checked
                    var isChecked = $(this).find('.form-check-input').is(':checked');
                    
                    // Enable or disable the .form-control based on checkbox status
                    $(this).find('.form-control').prop('disabled', !isChecked);
                    $(this).find('.form-control').prop('required', isChecked);
                });
            }
            $(function () {
                $(".date").datepicker();

                $(".calendar").click(function () {
                    $(this).siblings('.date').datepicker("show");
                });
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
                // Run the function on page load
                updateFormControls();
            });
            $(document).on('change', '.form-check-input', function() {
                updateFormControls();
            });
        </script>
    </body>

</html>