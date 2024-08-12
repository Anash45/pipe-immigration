<?php
include './defines/db_conn.php';
include './defines/functions.php';
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Create Account - US PIPE Immigration Program</title>
        <link rel="shortcut icon" href="./assets/images/Favicon.webp" type="image/x-icon">
        <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="./assets/css/style.css?v=5">
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
                    <p class="form-desc"> <?php echo getTranslation('Create Account', 1, 'label'); ?></p>
                </div>
                <div class="page-form-sec py-5 flex-grow-1">
                    <form class="px-sm-5 px-0 py-5 mt-sm-5 mt-0" action="" id="registerForm" method="post">
                        <div class="px-4">
                            <h3 class="fw-bold text-white text-center mb-5">
                                <?php echo getTranslation('Create Account', 0, 'label'); ?>
                            </h3>
                            <div class="form-group mb-4">
                                <label for="first_name"><?php echo getTranslation('Create Account', 8, 'label'); ?></label>
                                <div class="input-div">
                                    <input type="text" id="first_name" name="first_name"
                                        placeholder="<?php echo getTranslation('Create Account', 8, 'placeholder'); ?>" class="form-control poppins">
                                    <img src="./assets/images/user.svg" alt="first_name" class="inp-icon-left">
                                    <img src="./assets/images/question-icon.svg" alt="Icon" width="16"
                                        class="inp-icon-right help-icon" data-bs-toggle="tooltip"
                                        title="<?php echo getTranslation('Create Account', 8, 'help'); ?>">
                                </div>
                            </div>
                            <div class="form-group mb-4">
                                <label for="last_name"><?php echo getTranslation('Create Account', 9, 'label'); ?></label>
                                <div class="input-div">
                                    <input type="text" id="last_name" name="last_name"
                                        placeholder="<?php echo getTranslation('Create Account', 9, 'placeholder'); ?>" class="form-control poppins">
                                    <img src="./assets/images/user.svg" alt="last_name" class="inp-icon-left">
                                    <img src="./assets/images/question-icon.svg" alt="Icon" width="16"
                                        class="inp-icon-right help-icon" data-bs-toggle="tooltip"
                                        title="<?php echo getTranslation('Create Account', 9, 'help'); ?>">
                                </div>
                            </div>
                            <div class="form-group mb-4">
                                <label
                                    for="email_or_phone"><?php echo getTranslation('Create Account', 2, 'label'); ?></label>
                                <div class="input-div">
                                    <input type="text" id="email_or_phone" name="email_or_phone"
                                        placeholder="<?php echo getTranslation('Create Account', 2, 'placeholder'); ?>" class="form-control poppins" value="<?php echo $VerifyemailOrPhone = (isset($_REQUEST['verify'])) ? $_REQUEST['verify'] : ''; ?>">
                                    <img src="./assets/images/envelope.svg" alt="Email" class="inp-icon-left">
                                    <img src="./assets/images/question-icon.svg" alt="Icon" width="16"
                                        class="inp-icon-right help-icon" data-bs-toggle="tooltip"
                                        title="<?php echo getTranslation('Create Account', 2, 'help'); ?>">
                                </div>
                            </div>
                            <div class="form-group mb-4">
                                <label
                                    for="password"><?php echo getTranslation('Create Account', 3, 'label'); ?></label>
                                <div class="input-div">
                                    <input type="password" id="password" name="password" placeholder="<?php echo getTranslation('Create Account', 3, 'placeholder'); ?>"
                                        class="form-control poppins">
                                    <img src="./assets/images/lock.svg" alt="Lock" class="inp-icon-left">
                                    <img src="./assets/images/question-icon.svg" alt="Icon" width="16"
                                        class="inp-icon-right help-icon" data-bs-toggle="tooltip"
                                        title="<?php echo getTranslation('Create Account', 3, 'help'); ?>">
                                    <img src="./assets/images/eye.svg" onclick="toggleViewPassword(event)" alt="Icon"
                                        width="14" class="show-password">
                                </div>
                            </div>
                            <div class="form-group mb-4">
                                <label
                                    for="confirm_password"><?php echo getTranslation('Log In', 7, 'label'); ?></label>
                                <div class="input-div">
                                    <input type="password" id="confirm_password" name="confirm_password"
                                        placeholder="<?php echo getTranslation('Create Account', 3, 'placeholder'); ?>" class="form-control poppins">
                                    <img src="./assets/images/lock.svg" alt="Lock" class="inp-icon-left">
                                    <img src="./assets/images/question-icon.svg" alt="Icon" width="16"
                                        class="inp-icon-right help-icon" data-bs-toggle="tooltip"
                                        title="<?php echo getTranslation('Log In', 7, 'help'); ?>">
                                    <img src="./assets/images/eye.svg" onclick="toggleViewPassword(event)" alt="Icon"
                                        width="14" class="show-password">
                                </div>
                                <!-- <p class="mt-3 text-start text-white mb-1">
                                    <span class="en"> If you've already registered and trying to verify the account
                                        click on "Verify Account", fill your email and click "Resend Code". </span>
                                    <span class="es">Si ya se ha registrado y está intentando verificar la cuenta, haga
                                        clic en "Verificar cuenta", complete su correo electrónico y haga clic en
                                        "Reenviar código".</span>
                                </p>
                                <p class="text-end"><a href="#" class="text-white forgot-link"
                                        onclick="openResendVerificationModal()"><span class="en">Verify
                                            account</span><span class="es">Verificar cuenta</span></a>
                                </p> -->
                            </div>
                            <div class="btns px-4 text-center pt-4">
                                <div id="responseMessage" class="mb-3"></div>
                                <button class="btn btn-primary w-100 px-5 fw-bold inter text-white" type="submit"><span
                                        class="en">Sign Up</span> <span class="es">Inscribirse</span></button>
                                <div class="text-center mt-4">
                                    <a href="#" class="create-account-link text-white d-inline-block mb-3"><span
                                            class="en">Already have an account?</span><span class="es">¿Ya tienes una
                                            cuenta?</span></a>
                                    <a href="./login.php"
                                        class="btn btn-primary w-100 px-5 fw-bold text-white"><?php echo getTranslation('Log In', 4, 'label'); ?></a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </section>
        </main>
        <div class="modal fade forgot-modal" id="verifyCodeModal" tabindex="-1" aria-labelledby="verifyCodeModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body poppins text-center">
                        <form action="" method="post" id="verifyCodeForm">
                            <div class="d-flex align-items-center justify-content-between mb-1">
                                <img src="./assets/images/arrow-left.svg" alt="Arrow" height="16"
                                    data-bs-dismiss="modal">
                            </div>
                            <h4 class="fm-subtitle mb-0 inter">Check your text/email for a six-digit code</h4>
                            <h2 class="pt-4 pb-3 fm-title inter">Verify</h2>
                            <p class="text-center text-secondary"><span class="en">Please enter the code we send you. If your cell blocks unwanted text, email us at <?php echo $supportEmail; ?> or create an account with an email or a phone that can receive our text.</span><span class="es">Por favor introduce el código que te enviamos. Si su celular bloquea texto no deseado, envíenos un correo electrónico a <?php echo $supportEmailSpanish; ?> o crear una cuenta con un correo electrónico o un teléfono que pueda recibir nuestro texto.</span></p>
                            <div class="mb-4" id="emailInput" style="display: none;">
                                <label for="verify_email_or_phone">Enter your email/phone number: </label>
                                <input type="text" class="form-control mt-3" name="verify_email_or_phone"
                                    id="verify_email_or_phone"
                                    value="<?php echo $VerifyemailOrPhone = (isset($_REQUEST['verify'])) ? $_REQUEST['verify'] : ''; ?>">
                            </div>
                            <p class="mb-4 fm-desc"><span class="en">Please enter the code we sent you to
                                    email</span><span class="es">Por favor ingresa el código que te enviamos al correo
                                    electrónico</span></p>
                            <div class="code-input mb-5">
                                <input type="text" maxlength="1" class="code-box" id="codeBox1">
                                <input type="text" maxlength="1" class="code-box" id="codeBox2">
                                <input type="text" maxlength="1" class="code-box" id="codeBox3">
                                <input type="text" maxlength="1" class="code-box" id="codeBox4">
                                <input type="text" maxlength="1" class="code-box" id="codeBox5">
                                <input type="text" maxlength="1" class="code-box" id="codeBox6">
                            </div>
                            <div class="mb-4">
                                <p class="fm-desc">Didn't Receive the Code ?</p>
                                <span class="fm-link" style="cursor:pointer;" onclick="resendCode()"><span
                                        class="en">Resend Code</span> <span class="es">Reenviar código</span></span>
                            </div>
                            <div class="py-5 px-5">
                                <button class="btn btn-primary w-100 px-5 mb-4 inter fw-bold text-white"
                                    type="submit">Verify</button>
                                <p class="mb-0" id="verifyResponse"></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>

    <body>
        <script src="./assets/js/jquery-3.6.1.min.js"></script>
        <script src="./assets/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.21.0/jquery.validate.min.js"
            integrity="sha512-KFHXdr2oObHKI9w4Hv1XPKc898mE4kgYx58oqsc/JqqdLMDI4YjOLzom+EMlW8HFUd0QfjfAvxSL6sEq/a42fQ=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="./assets/js/script.js?v=5"></script>
        <script>

            function resendCode() {
                let email = $('#email_or_phone').val();
                $.ajax({
                    url: "resend-code-process.php",
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
                            message = response.message;
                            $("#verifyResponse").addClass('text-success').removeClass('text-danger');
                        } else if (response.status === 'already_verified') {
                            message = response.message + '<br><a href="login.php">Login</a>';
                            $("#verifyResponse").addClass('text-danger').removeClass('text-success');
                        } else if (response.status === 'error') {
                            // $('#emailInput').show();
                            message = response.message;
                            $("#verifyResponse").addClass('text-danger').removeClass('text-success');
                        } else {
                            message = '<span class="en">An error occurred. Please try again.</span>' +
                                '<span class="es">Ocurrió un error. Por favor, intente de nuevo.</span>';
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
                $("#verifyCodeForm").submit(function (event) {
                    event.preventDefault(); // Prevent the default form submission

                    // Gather the verification code from the input fields
                    let verificationCode = '';
                    $(".code-box").each(function () {
                        verificationCode += $(this).val();
                    });

                    // Post the data to the server
                    $.ajax({
                        url: "verification-code-process.php",
                        type: "POST",
                        data: {
                            verify_email_or_phone: $("#verify_email_or_phone").val(),
                            verification_code: verificationCode
                        },
                        success: function (response) {
                            console.log(response);
                            response = JSON.parse(response);
                            // Display the response message
                            $("#verifyResponse").text(response.message);

                            if (response.status === 'success') {
                                $("#verifyResponse").html('<span class="en">' + response.message + ' <br><a href="login.php">Login</a></span></span><span class="es">' + response.message + ' <br><a href="login.php">Login</a></span></span>').addClass('text-success').removeClass('text-danger');
                                $('#verifyCodeForm').trigger('reset');
                            } else if (response.status === 'locked') {
                                $("#verifyResponse").html('<span class="en">The validation code has been incorrectly entered 5 times. Your account will be locked for 24 hours. If you need help, email us at support@immigrationAI.Lawyer.</span><span class="es">El código de validación se ha ingresado incorrectamente 5 veces. Su cuenta se bloqueará durante 24 horas. Si necesita ayuda, envíenos un correo electrónico a support@immigrationAI.Lawyer.</span>').addClass('text-danger');
                            } else if (response.status === 'already_verified') {
                                $("#verifyResponse").html('<span class="en">User already verified! <br><a href="login.php">Login</a></span><span class="es">¡Usuario ya verificado! <br><a href="login.php">Login</a></span>').addClass('text-danger');
                            } else {
                                $("#verifyResponse").html('<span class="en">' + response.message + '</span><span class="es">' + response.message + '</span>').addClass('text-danger');
                            }
                        },
                        error: function (xhr, status, error) {
                            // Display generic error message
                            $("#verifyResponse").text("An error occurred. Please try again.");
                        }
                    });
                });
            });

            function openVerificationModal(emailOrPhone) {
                $('#verify_email_or_phone').val(emailOrPhone);
                $('#email_or_phone').val(emailOrPhone);
                $('#verifyCodeModal').modal('show');
            }

            function openResendVerificationModal() {
                if($('#email_or_phone').val() == '' || isEmailOrPhone($('#email_or_phone').val()) == 'invalid'){
                    $('#responseMessage').html('<span class="en">Enter your email or phone first!</span><span class="es">¡Primero introduce tu correo electrónico o teléfono!</span>').addClass('text-danger').removeClass('text-success');
                }else{
                    $('#verifyCodeModal').modal('show');
                    $('#responseMessage').html('').addClass('text-danger').removeClass('text-success');
                }
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
            $(document).ready(function () {
                // Custom validation method to check email or phone

                $(document).ready(function () {
                    // Ensure jQuery Validate Plugin is available
                    if ($.validator) {
                        // Custom validation method to check email or phone
                        $.validator.addMethod("emailOrPhone", function (value, element) {
                            // Regular expressions for email and phone validation
                            var emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
                            var phonePattern = /^\+?(\d{1,3})?[-.\s]?(\(?\d{1,4}\)?)?[-.\s]?\d{1,4}[-.\s]?\d{1,4}[-.\s]?\d{1,9}$/; // More flexible phone number pattern

                            // Check if the value matches either email or phone pattern
                            return this.optional(element) || emailPattern.test(value) || phonePattern.test(value);
                        }, '<span class="en">Please enter a valid email or phone number</span><span class="es">Por favor, ingrese un correo electrónico o número de teléfono válido</span>');

                        $('#registerForm').validate({
                            errorClass: "msg-error",
                            errorElement: "span",
                            rules: {
                                first_name: {
                                    required: true
                                },
                                last_name: {
                                    required: true
                                },
                                email_or_phone: {
                                    required: true,
                                    emailOrPhone: true
                                },
                                password: {
                                    required: true,
                                    minlength: 6
                                },
                                confirm_password: {
                                    required: true,
                                    equalTo: "#password"
                                }
                            },
                            messages: {
                                first_name: {
                                    required: '<span class="en">Please enter your first name</span><span class="es">Por favor, introduzca su nombre de pila</span>'
                                },
                                last_name: {
                                    required: '<span class="en">Please enter your last name</span><span class="es">Por favor ingrese su apellido</span>'
                                },
                                email_or_phone: {
                                    required: '<span class="en">Please enter a valid email or phone</span><span class="es">Por favor, ingrese un correo electrónico o teléfono válido</span>',
                                    emailOrPhone: '<span class="en">Please enter a valid email or phone number</span><span class="es">Por favor, ingrese un correo electrónico o número de teléfono válido</span>'
                                },
                                password: {
                                    required: '<span class="en">Please provide a password</span><span class="es">Por favor, proporcione una contraseña</span>',
                                    minlength: '<span class="en">Your password must be at least 6 characters long</span><span class="es">Su contraseña debe tener al menos 6 caracteres</span>'
                                },
                                confirm_password: {
                                    required: '<span class="en">Please confirm your password</span><span class="es">Por favor, confirme su contraseña</span>',
                                    equalTo: '<span class="en">Passwords do not match</span><span class="es">Las contraseñas no coinciden</span>'
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
                                var formData = $(form).serialize();

                                $.ajax({
                                    url: 'register-process.php',
                                    type: 'POST',
                                    data: formData,
                                    success: function (response) {
                                        console.log(response);
                                        response = JSON.parse(response);
                                        if (response.status === 'success') {
                                            let email = response.email_or_phone;
                                            
                                            $('#verifyResponse').html('').addClass('text-success').removeClass('text-danger');
                                            $(form)[0].reset(); // Reset form fields
                                            openVerificationModal(email);
                                        } else {
                                            $('#responseMessage').html('<p>' + response.message + '</p>').addClass('text-danger').removeClass('text-success');
                                        }
                                    },
                                    error: function (xhr, status, error) {
                                        $('#responseMessage').html('<p>An error occurred: ' + error + '</p>').addClass('text-danger').removeClass('text-success');
                                    }
                                });

                                return false; // Prevent default form submission
                            }
                        });
                    } else {
                        console.error('jQuery Validation plugin is not loaded');
                    }


                    <?php
                    if (isset($_REQUEST['verify'])) {
                        ?>
                        resendCode();
                        openVerificationModal('<?php echo $VerifyemailOrPhone = (isset($_REQUEST['verify'])) ? $_REQUEST['verify'] : ''; ?>');
                        <?php
                    }
                    ?>
                });
            });

        </script>
    </body>

</html>