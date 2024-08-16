<?php
include './defines/db_conn.php';
include './defines/functions.php';
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login - US PIPE Immigration Program</title>
        <link rel="shortcut icon" href="./assets/images/Favicon.webp" type="image/x-icon">
        <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="./assets/css/style.css?v=7">
    </head>

    <body class="login-page red-hat-display lang-<?php echo getLanguage(); ?>">
        <main class="page-main">
            <section class="page-img">
                <img src="./assets/images/login.png" alt="Login Page Image" class="img-fluid">
            </section>
            <section class="page-form pt-2 d-flex flex-column">
                <div class="d-sm-none d-flex justify-content-around align-items-center mt-3 mb-4">
                    <a href="?lang=english"
                        class="lang-link active <?php echo $active = (getLanguage() == 'english') ? 'active' : ''; ?> inter">ENGLISH</a><a
                        href="?lang=spanish"
                        class="lang-link <?php echo $active = (getLanguage() == 'spanish') ? 'active' : ''; ?> inter">SPANISH</a>
                </div>
                <div class="px-sm-4 px-3 text-center mb-3 pf-text">
                    <div class="text-center mb-2 d-flex">
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
                    <h2 class="fw-bold form-title mb-4"> US PIPE <br> IMMIGRATION PROGRAM </h2>
                    <p class="form-desc"> <?php echo getTranslation('Create Account', 1, 'label'); ?> </p>
                </div>
                <div class="page-form-sec py-5 flex-grow-1">
                    <form class="px-sm-5 px-0 py-5 mt-sm-5 mt-0" action="" method="post" id="loginForm">
                        <div class="px-4">
                            <h3 class="fw-bold text-white text-center mb-5">
                                <?php echo getTranslation('Log In', 0, 'help'); ?>
                            </h3>
                            <div class="form-group mb-4">
                                <label for="email"><?php echo getTranslation('Log In', 1, 'label'); ?></label>
                                <div class="input-div">
                                    <input type="text" id="email" placeholder="<?php echo getTranslation('Log In', 1, 'placeholder'); ?>"
                                        class="form-control poppins">
                                    <img src="./assets/images/envelope.svg" alt="Email" class="inp-icon-left">
                                    <img src="./assets/images/question-icon.svg" alt="Icon" width="16"
                                        class="inp-icon-right help-icon" data-bs-toggle="tooltip"
                                        title="<?php echo getTranslation('Log In', 1, 'help'); ?>">
                                </div>
                            </div>
                            <div class="form-group mb-sm-5 mb-4">
                                <label for="password"><?php echo getTranslation('Log In', 2, 'label'); ?></label>
                                <div class="input-div">
                                    <input type="password" id="password" placeholder="<?php echo getTranslation('Log In', 2, 'placeholder'); ?>"
                                        class="form-control poppins">
                                    <img src="./assets/images/lock.svg" alt="Lock" class="inp-icon-left">
                                    <img src="./assets/images/eye.svg" onclick="toggleViewPassword(event)" alt="Icon"
                                        width="14" class="show-password">
                                    <img src="./assets/images/question-icon.svg" alt="Icon" width="16"
                                        class="inp-icon-right help-icon" data-bs-toggle="tooltip"
                                        title="<?php echo getTranslation('Log In', 2, 'help'); ?>">
                                </div>
                                <p class="text-end"><a href="#" onclick="openForgotModal()"
                                        class="text-white forgot-link"><?php echo getTranslation('Log In', 3, 'label'); ?></a>
                                </p>
                            </div>
                            <div class="btns px-4 text-center pt-4">
                                <div id="loginResponse" class="alert"></div>
                                <button class="btn btn-primary w-100 px-5 inter fw-bold text-white"
                                    type="submit"><?php echo getTranslation('Log In', 4, 'label'); ?></button>
                                <div class="text-center mt-4">
                                    <a href="#" class="create-account-link text-white d-inline-block mb-3"><span
                                            class="en">Don't have an account?</span><span class="es">¿No tienes una
                                            cuenta?</span></a>
                                    <a href="./register.php"
                                        class="btn btn-primary w-100 px-5 fw-bold text-white"><?php echo getTranslation('Log In', 5, 'label'); ?></a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </section>
        </main>
        <!-- Modal -->
        <div class="modal fade forgot-modal" id="forgotModal" tabindex="-1" aria-labelledby="forgotModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body poppins text-center">
                        <h2 class="py-4 fm-title inter mt-4 text-black"><span class="en">Forgot Password?</span><span
                                class="es"> ¿Has olvidado tu contraseña?</span></h2>
                        <div class="text-center">
                            <img src="./assets/images/forgot-password.png" alt="Forgot" class="img-fluid" width="217">
                        </div>
                        <div class="mb-4">
                            <p class="mt-4 inter fm-text"><span class="d-md-block d-inline"><span class="en">We'll send
                                        you an email or a text to the address</span><span class="es">Le enviaremos un
                                        correo electrónico o un mensaje de texto a la dirección</span></span>
                                <span class="d-md-block d-inline"><span class="en">that you registered with
                                        us</span><span class="es">que registraste con nosotros</span></span>
                            </p>
                        </div>
                        <div id="emailPhoneConfirm"
                            class="d-flex align-items-center justify-content-center pt-3 forgot-email-phone flex-column gap-2">
                            <!-- <p class="mb-0">or cell phone number where we can text you</p> -->
                            <!-- <p class="text-black mb-0 d-flex align-items-center gap-4 justify-content-center"><img
                                    src="./assets/images/phone.svg" alt="Icon" height="21"><span>+923095248482</span> -->
                            </p>
                        </div>
                        <div id="verifyResponse"></div>
                        <div class="py-5 mb-5 px-5">
                            <button class="btn btn-primary w-100 px-5 inter fw-bold text-white" type="submit"
                                onclick="sendCode()"><span class="en">Next</span><span
                                    class="es">Próximo</span></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade forgot-modal" id="verifyCodeModal" tabindex="-1" aria-labelledby="verifyCodeModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body poppins text-center">
                        <form action="" method="post" id="verifyCodeForm">
                            <div class="d-flex align-items-center justify-content-between mb-5">
                                <img src="./assets/images/arrow-left.svg" alt="Arrow" height="16"
                                    onclick="closeVerifyAndOpenForgotModal()">
                                <h4 class="fm-subtitle mb-0 inter"><span class="en">Forgot Password</span><span
                                        class="es">Has olvidado tu contraseña</span></h4>
                                <img src="./assets/images/arrow-left.svg" alt="Arrow" height="16"
                                    onclick="closeVerifyAndOpenForgotModal()" class="opacity-0">
                            </div>
                            <h2 class="py-4 fm-title inter"><span class="en">Verify</span><span
                                    class="es">Verificar</span></h2>
                            <p class="mb-5 fm-desc"><span class="en">Please enter the code we sent you to email/phone
                                    number</span><span class="es">Por favor ingresa el código que te enviamos al correo
                                    electrónico/número de teléfono</span></p>
                            <div class="code-input mb-5">
                                <input type="text" maxlength="1" class="code-box" id="codeBox1">
                                <input type="text" maxlength="1" class="code-box" id="codeBox2">
                                <input type="text" maxlength="1" class="code-box" id="codeBox3">
                                <input type="text" maxlength="1" class="code-box" id="codeBox4">
                                <input type="text" maxlength="1" class="code-box" id="codeBox5">
                                <input type="text" maxlength="1" class="code-box" id="codeBox6">
                            </div>
                            <div class="mb-4">
                                <label for="new_password"><span class="en">New Password</span><span class="es">Nueva
                                        contraseña</span></label>
                                <input type="password" class="form-control" id="new_password">
                            </div>
                            <div id="resetResponse"></div>
                            <div class="py-5 mb-5 px-5">
                                <button class="btn btn-primary w-100 px-5 inter fw-bold text-white" type="button"
                                    onclick="setNewPassword()"><span class="en">Verify</span><span
                                        class="es">Verificar</span></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade code-response-modal" id="correctCodeModal" tabindex="-1"
            aria-labelledby="correctCodeModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body p-5 poppins text-center inter">
                        <div class="pb-5">
                            <img src="./assets/images/correct-code.svg" alt="Icon" height="184" class="mb-3 img-fluid">
                            <h4 class="cr-title mb-3"><span class="en">Congratulations !</span><span
                                    class="es">Felicidades !</span></h4>
                            <p class="mb-0 cr-text"><span class="en">Password Reset successful <br> You'll be redirected
                                    to the login screen now </span><span class="es">Restablecimiento de contraseña
                                    exitoso <br> Serás redirigido al inicio de sesión pantalla ahora</span></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade code-response-modal" id="incorrectCodeModal" tabindex="-1"
            aria-labelledby="incorrectCodeModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body p-5 poppins text-center inter">
                        <div class="pb-5">
                            <img src="./assets/images/incorrect-code.svg" alt="Icon" height="184"
                                class="mb-3 img-fluid">
                            <h4 class="cr-title mb-3"><span class="en">Incorrect Code !</span><span class="es">Código
                                    incorrecto !</span></h4>
                            <p class="mb-0 cr-text"><span class="en">Oops! It looks like you've entered the code
                                    incorrectly three times. We've sent you a new code to try again.</span><span
                                    class="es">¡Ups! Parece que has introducido el código incorrectamente tres veces. Te
                                    hemos enviado un nuevo código para que vuelvas a intentarlo.</span></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>

    <body>
        <script src="./assets/js/jquery-3.6.1.min.js"></script>
        <script src="./assets/js/bootstrap.bundle.min.js"></script>
        <script src="./assets/js/script.js?v=7"></script>
        <script>
            function openCodeModal() {
                $('#forgotModal').modal('hide');
                $('#verifyCodeModal').modal('show');
            }
            function toggleViewPassword(event) {
                let target = $(event.target);
                let passwordInput = target.siblings('.form-control');
                if (passwordInput.attr('type') === 'password') {
                    passwordInput.attr('type', 'text');
                    target.text('Hide');
                } else {
                    passwordInput.attr('type', 'password');
                    target.text('Show');
                }
            }

            function setNewPassword() {
                let verificationCode = '';
                let new_password = $('#new_password').val();
                let email = $('#email').val();

                if (new_password.length >= 6) {

                    $(".code-box").each(function () {
                        verificationCode += $(this).val();
                    });
                    // Prepare data to send
                    let data = {
                        verification_code: verificationCode,
                        new_password: new_password,
                        email: email
                    };

                    // Send data via AJAX
                    $.ajax({
                        url: 'verification-forgot-code-process.php',
                        type: 'POST',
                        data: data,
                        success: function (response) {
                            console.log(response);
                            response = JSON.parse(response);
                            // Determine the message to display based on response status
                            let message;
                            $('#verifyCodeModal').modal('hide');
                            $('#new_password').val('');
                            $('.code-box').val('');
                            $('#email').val('');
                            $('#resetResponse').html('');
                            $('#verifyResponse').html('');
                            if (response.status === 'success') {
                                $('#correctCodeModal').modal('show');
                            } else {
                                $('#incorrectCodeModal').modal('show');
                            }

                        },
                        error: function (xhr, status, error) {
                            // Handle errors if any
                            $('#resetResponse').html('<span class="en">An error occurred. Please try again later.</span><span class="es">Ocurrió un error. Por favor, inténtelo de nuevo más tarde.</span>').addClass('text-danger');
                        }
                    });
                } else {
                    $('#resetResponse').html('<span class="en">Password should be atleast 6 characters long!</span><span class="es">¡La contraseña debe tener al menos 6 caracteres!</span>').addClass('text-danger');
                }
            }
            function openForgotModal() {
                if ($('#email').val() == '') {
                    $("#loginResponse").html(
                        '<span class="en">Enter email/phone number first!</span>' +
                        '<span class="es">¡Primero ingrese el correo electrónico!</span>'
                    ).addClass('alert-danger').removeClass('alert-success');
                } else {
                    $('#emailPhoneConfirm').html(`<p class="mb-0">Email/Phone number</p>
                            <p class="text-black mb-0 d-flex align-items-center gap-4 justify-content-center"><img
                                    src="./assets/images/mail-fill.svg" alt="Icon"
                                    height="21"><span>${$('#email').val()}</span></p>`);
                    $('#forgotModal').modal('show');
                }
            }

            function closeVerifyAndOpenForgotModal() {

                $('#verifyCodeModal').modal('hide');
                $('#forgotModal').modal('show');
            }

            function sendCode() {
                let email = $('#email').val();
                $.ajax({
                    url: "forgot-password-code.php",
                    type: "POST",
                    data: {
                        email_or_phone: email
                    },
                    success: function (response) {
                        console.log(response);
                        response = JSON.parse(response);
                        // Determine the message to display based on response status
                        let message;
                        if (response.status === 'success') {
                            openCodeModal();
                        } else {
                            message = response.message;
                            $("#verifyResponse").addClass('text-danger').removeClass('text-success');
                        }

                        // Display the message
                        $("#verifyResponse").html(message);
                    },
                    error: function (xhr, status, error) {
                        // Display generic error message
                        $("#verifyResponse").html(
                            '<span class="en">An error occurred. Please try again.</span>' +
                            '<span class="es">Ocurrió un error. Por favor, intente de nuevo.</span>'
                        ).addClass('text-danger').removeClass('text-success');
                    }
                });
            }

            $(document).ready(function () {

                $('#verifyCodeForm').on('submit', function (e) {
                    e.preventDefault();
                    let code = '';
                    $('.code-box').each(function () {
                        code += $(this).val();
                    })

                    if (!validateCode(code)) {
                        $('#verifyCodeModal').modal('hide');
                        $('#incorrectCodeModal').modal('show');
                    } else {
                        $('#verifyCodeModal').modal('hide');
                        $('#correctCodeModal').modal('show');
                    }
                })
            });
            function validateCode(code) {
                return code.length === 6
            }
            $(document).ready(function () {
                $("#loginForm").on("submit", function (event) {
                    event.preventDefault(); // Prevent the default form submission

                    // Get form data
                    var emailOrPhone = $("#email").val();
                    var password = $("#password").val();

                    // Prepare data for AJAX request
                    var formData = {
                        email_or_phone: emailOrPhone,
                        password: password
                    };

                    $.ajax({
                        url: "login-process.php",
                        type: "POST",
                        data: formData,
                        success: function (response) {
                            console.log(response);
                            response = JSON.parse(response);
                            // Handle the response from the server
                            if (response.status === 'success') {
                                // Save ClientID and name in session (Note: This should be handled by the server)
                                // Redirect or handle the login success (e.g., redirect to a dashboard page)
                                if(response.user == 'admin'){
                                    window.location.href = 'fillPdfG8.php'; // Update this URL as needed
                                }else{
                                    window.location.href = 'index.php'; // Update this URL as needed
                                }
                            } else if (response.status === 'error') {
                                // Show error message
                                if (response.type != undefined && response.type == 'not_verified') {
                                    window.location.href = 'register.php?verify=' + emailOrPhone;
                                }
                                $("#loginResponse").html(response.message).addClass('alert-danger').removeClass('alert-success');
                            }
                        },
                        error: function (xhr, status, error) {
                            // Handle any errors that occurred during the AJAX request
                            $("#loginResponse").html(
                                '<span class="en">An error occurred. Please try again.</span>' +
                                '<span class="es">Ocurrió un error. Por favor, intente de nuevo.</span>'
                            ).addClass('alert-danger').removeClass('alert-success');
                        }
                    });
                });
            });

        </script>
    </body>

</html>