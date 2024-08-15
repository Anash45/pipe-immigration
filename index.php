<?php
include './defines/db_conn.php';
include './defines/functions.php';
if (isLoggedIn()) {
    $clientId = $_SESSION['ClientID'];
    $documents = getDocumentsByClientId($clientId);
    $checkPaymentStatus = isPaymentCleared($clientId);
} else {
    header('location: login.php');
}
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Inquiry/Qualification - US PIPE Immigration Program</title>
        <link rel="shortcut icon" href="./assets/images/Favicon.webp" type="image/x-icon">
        <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="./assets/css/style.css?v=6">
    </head>

    <body class="iq-page red-hat-display lang-<?php echo getLanguage(); ?>">
        <main class="page-main py-5">
            <div class="container pb-5 px-4">
                <div class="d-flex justify-content-center gap-3 mb-4">
                    <?php
                    if (isAdmin() || isManager()) {
                        echo '<a href="./fillPdfG8.php" class="btn btn-rectangle mx-0 btn-primary"><span class="en">Dashboard</span> <span
                            class="es">Panel</span></a>';
                    }
                    ?>
                    <a href="logout.php" class="btn btn-rectangle mx-0 btn-danger"><span class="en">LOGOUT</span> <span
                            class="es">CERRAR SESIÓN</span></a>
                </div>
                <div class="text-center mb-5 d-flex">
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
                <?php
                if ($checkPaymentStatus == 'no-inquiry') {
                    echo '
        <h3 class="text-center iq-title mb-5 pb-4">
            <span class="en">Please complete your inquiry form to proceed.</span>
            <span class="es">Por favor, complete su formulario de consulta para proceder.</span>
        </h3>';
                } elseif ($checkPaymentStatus == 'not-cleared') {
                    echo '
        <h3 class="text-center iq-title mb-5 pb-4">
            <span class="en">Your payment is not verified yet. Come back later.</span>
            <span class="es">Su pago aún no está verificado. Vuelve mas tarde.</span>
        </h3>';
                } elseif ($checkPaymentStatus == 'cleared') {
                    echo '
        <h3 class="text-center text-success mb-5 pb-4">
            <span class="en">You have successfully completed your inquiry and payment. </span>
            <span class="es">Ha completado con éxito su consulta y pago. </span>
        </h3>';
                } else {
                    echo $checkPaymentStatus;
                }
                ?>
                <div class="d-flex gap-5 justify-content-center flex-wrap mb-5">
                    <div class="selection-outer">
                        <a href="immigration-inquiry.php" class="selection-box">
                            <?php echo $image1 = (getLanguage() == 'english') ? '<img src="./assets/images/inquiry-select.png" alt="Image"
                                class="img-fluid w-100 select-img">' : '<img src="./assets/images/InquiryIconSpanish.jpg" alt="Image"
                                class="img-fluid w-100 select-img">'; ?>
                            <h4 class="iqc-title inter opacity-0"><span class="en">Inquiry Request</span><span
                                    class="es">Preguntas Request</span></h4>
                        </a>
                    </div>
                    <div
                        class="selection-outer  <?php echo $disabled = ($checkPaymentStatus == 'not-cleared' || $checkPaymentStatus == 'no-inquiry') ? 'disabled' : ''; ?>">
                        <a href="./qualification-form.php" class="selection-box">
                            <?php echo $image2 = (getLanguage() == 'english') ? '<img src="./assets/images/qualification-select.png" alt="Image"
                                class="img-fluid w-100 select-img">' : '<img src="./assets/images/QualificationIconES.jpg" alt="Image"
                                class="img-fluid w-100 select-img">'; ?>
                            <h4 class="iqc-title inter"><span class="en">Qualification Process</span> <span
                                    class="es">Proceso de Calificación</span></h4>
                        </a>
                    </div>
                </div>
                <?php
                if (!empty($documents)) {
                    ?>
                    <h1 class="fw-bold mb-3">USCIS Documents</h1>
                    <div class="row">
                        <?php foreach ($documents as $doc): ?>
                            <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
                                <a class="card" target="_blank" href="<?php echo htmlspecialchars($doc['LinktoUSCISdoc']); ?>">
                                    <img src="./assets/images/USCISFormIcon.webp" class="card-img-top" alt="Document Image">
                                    <div class="card-body">
                                        <h5 class="card-title text-info text-center">
                                            <?php echo htmlspecialchars($doc['docname']); ?>
                                        </h5>
                                    </div>
                                </a>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <?php
                }
                ?>
            </div>
        </main>
    </body>

    <body>
        <script src="./assets/js/jquery-3.6.1.min.js"></script>
        <script src="./assets/js/bootstrap.bundle.min.js"></script>
        <script src="./assets/js/script.js?v=6"></script>
    </body>

</html>