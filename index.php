<?php
include './defines/db_conn.php';
include './defines/functions.php';
if (isLoggedIn()) {
    $clientId = $_SESSION['ClientID'];
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
        <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="./assets/css/style.css?v=4">
    </head>

    <body class="iq-page red-hat-display lang-<?php echo getLanguage(); ?>">
        <main class="page-main py-5">
            <div class="container pb-5 px-4">
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
                }else{
                    echo $checkPaymentStatus;
                }
                ?>
                <div class="d-flex gap-5 justify-content-center flex-wrap">
                    <div class="selection-outer">
                        <a href="immigration-inquiry.php" class="selection-box">
                            <img src="./assets/images/inquiry-select.png" alt="Image"
                                class="img-fluid w-100 select-img">
                            <h4 class="iqc-title inter opacity-0">Inquiry Request</h4>
                        </a>
                    </div>
                    <div class="selection-outer  <?php echo $disabled = ($checkPaymentStatus == 'not-cleared' || $checkPaymentStatus == 'no-inquiry') ? 'disabled' : ''; ?>">
                        <a href="./qualification-form.php" class="selection-box">
                            <img src="./assets/images/qualification-select.png" alt="Image"
                                class="img-fluid w-100 select-img">
                            <h4 class="iqc-title inter">Qualification Process</h4>
                        </a>
                    </div>
                </div>
            </div>
        </main>
    </body>

    <body>
        <script src="./assets/js/jquery-3.6.1.min.js"></script>
        <script src="./assets/js/bootstrap.bundle.min.js"></script>
        <script src="./assets/js/script.js?v=4"></script>
    </body>

</html>