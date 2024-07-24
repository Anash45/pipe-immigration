$(document).ready(function () {
    if ($('.code-box').length > 0) {
        $('.code-box').on('input', function () {
            let nextBox = $(this).next('.code-box');
            if (nextBox.length && $(this).val().length) {
                nextBox.focus();
            }
        });

        $('.code-box').on('keydown', function (e) {
            let prevBox = $(this).prev('.code-box');
            if (e.key === "Backspace" && !$(this).val().length && prevBox.length) {
                prevBox.focus();
            }
        });

        $('.code-box').on('paste', function (e) {
            let pasteData = e.originalEvent.clipboardData.getData('text');
            pasteData = pasteData.slice(0, 6); // limit to 6 characters
            $('.code-box').each(function (index) {
                $(this).val(pasteData[index] || '');
                if (index < pasteData.length) {
                    $(this).next('.code-box').focus();
                }
            });
        });
    }

    if ($('.help-icon').length > 0) {
        $('.help-icon').each(function () {
            new bootstrap.Tooltip($(this));
        });
    }

    if ($('#qualification-form').length > 0) {
        $("#qualification-form").validate({
            errorClass: "msg-error",
            errorElement: "span",
            rules: {
                firstName: "required",
                middleName: {
                    required: false
                },
                lastName: "required",
                birthday: "required",
                birthPlace: "required",
                citizenshipCountry: "required",
                gender: "required",
                careOfName: "required",
                street1: "required",
                street2: {
                    required: false
                },
                zipCode: "required",
                city: "required",
                state: "required",
                cellPhone: "required",
                homePhone: {
                    required: false
                },
                workPhone: {
                    required: false
                },
                currentEmail: {
                    required: false,
                    email: true
                },
                emergencyContact: "required",
                emergencyPhone: "required",
                'residency[]': {
                    required: true,
                    minlength: 1
                },
                spouseName: "required",
                dateOfMarriage: "required",
                stateCountryOfMarriage: "required",
                spouseBirthday: "required",
                proofOfSpouseCitizenship: "required",
                // New rules for residencyType (radio) and residency (text)
                residencyType: {
                    required: true
                },
                residency: {
                    required: true
                }
            },
            messages: {
                firstName: {
                    required: '<span class="en">Please enter your first name</span><span class="es">Por favor, ingrese su nombre</span>'
                },
                lastName: {
                    required: '<span class="en">Please enter your last name</span><span class="es">Por favor, ingrese su apellido</span>'
                },
                birthday: {
                    required: '<span class="en">Please enter your birthday</span><span class="es">Por favor, ingrese su fecha de nacimiento</span>'
                },
                birthPlace: {
                    required: '<span class="en">Please enter your birth place</span><span class="es">Por favor, ingrese su lugar de nacimiento</span>'
                },
                citizenshipCountry: {
                    required: '<span class="en">Please enter your country of citizenship</span><span class="es">Por favor, ingrese su país de ciudadanía</span>'
                },
                gender: {
                    required: '<span class="en">Please select your gender</span><span class="es">Por favor, seleccione su género</span>'
                },
                careOfName: {
                    required: '<span class="en">Please enter the care of name</span><span class="es">Por favor, ingrese el nombre a cargo</span>'
                },
                street1: {
                    required: '<span class="en">Please enter the street address</span><span class="es">Por favor, ingrese la dirección</span>'
                },
                zipCode: {
                    required: '<span class="en">Please enter the zip code</span><span class="es">Por favor, ingrese el código postal</span>'
                },
                city: {
                    required: '<span class="en">Please enter the city</span><span class="es">Por favor, ingrese la ciudad</span>'
                },
                state: {
                    required: '<span class="en">Please enter the state</span><span class="es">Por favor, ingrese el estado</span>'
                },
                cellPhone: {
                    required: '<span class="en">Please enter the cell phone number</span><span class="es">Por favor, ingrese el número de celular</span>'
                },
                currentEmail: {
                    email: '<span class="en">Please enter a valid email address</span><span class="es">Por favor, ingrese una dirección de correo electrónico válida</span>'
                },
                emergencyContact: {
                    required: '<span class="en">Please enter the emergency contact name</span><span class="es">Por favor, ingrese el nombre del contacto de emergencia</span>'
                },
                emergencyPhone: {
                    required: '<span class="en">Please enter the emergency contact phone number</span><span class="es">Por favor, ingrese el número de teléfono del contacto de emergencia</span>'
                },
                'residency[]': {
                    required: '<span class="en">Please select at least one residency option</span><span class="es">Por favor, seleccione al menos una opción de residencia</span>'
                },
                spouseName: {
                    required: '<span class="en">Please enter your spouse\'s name</span><span class="es">Por favor, ingrese el nombre de su cónyuge</span>'
                },
                dateOfMarriage: {
                    required: '<span class="en">Please enter the date of marriage</span><span class="es">Por favor, ingrese la fecha de matrimonio</span>'
                },
                stateCountryOfMarriage: {
                    required: '<span class="en">Please enter the state or country of marriage</span><span class="es">Por favor, ingrese el estado o país de matrimonio</span>'
                },
                spouseBirthday: {
                    required: '<span class="en">Please enter your spouse\'s birthday</span><span class="es">Por favor, ingrese la fecha de nacimiento de su cónyuge</span>'
                },
                proofOfSpouseCitizenship: {
                    required: '<span class="en">Please provide proof of spouse\'s citizenship</span><span class="es">Por favor, proporcione prueba de la ciudadanía de su cónyuge</span>'
                },
                residencyType: {
                    required: '<span class="en">Please select your residency type</span><span class="es">Por favor, seleccione su tipo de residencia</span>'
                },
                residency: {
                    required: '<span class="en">Please enter your residency details</span><span class="es">Por favor, ingrese los detalles de su residencia</span>'
                }
            },
            highlight: function (element) {
                $(element).addClass('input-error');
            },
            unhighlight: function (element) {
                $(element).removeClass('input-error');
            },
            errorPlacement: function (error, element) {
                if (element.attr("name") == "residency[]") {
                    error.insertAfter("#residency-options"); // Assuming there's an element with ID 'residency-options' wrapping the checkboxes
                } else {
                    error.insertAfter(element);
                }
            },
            submitHandler: function (form) {
                $.ajax({
                    url: form.action,
                    type: form.method,
                    data: $(form).serialize(),
                    success: function (response) {
                        // Handle the response from the server
                        console.log(response);
                        response = JSON.parse(response);
                        console.log(response);

                        if (response.type == 'success') {
                            $('#response').html(`<div class='alert alert-success'><span class='en'>User data inserted successfully!</span><span class='es'>¡Datos del usuario insertados con éxito!</span></div>`);
                        } else {
                            $('#response').html(`<div class='alert alert-danger'><span class='en'>Error inserting user data!</span><span class='es'>¡Error al insertar los datos del usuario!</span></div>`);
                        }

                        $(form).trigger('reset');
                        console.log('Form submitted successfully');
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        // Handle any errors
                        console.log('Error submitting form: ' + textStatus);
                    }
                });
            }
        });
    }
})