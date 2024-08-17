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
                firstName: {
                    required: true,
                    maxlength: 255

                },
                middleName: {
                    required: true,
                    maxlength: 255

                },
                lastName: {
                    required: true,
                    maxlength: 255

                },
                birthday:{
                    required: true
                },
                birthPlace: {
                    required: true,
                    maxlength: 255

                },
                citizenshipCountry: {
                    required: true,
                    maxlength: 255

                },
                gender:{
                    required: true
                },
                street1:{
                    required: true,
                    maxlength: 255
                },
                street2: {
                    required: false,
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
                    maxlength: 50

                },
                cellPhone: {
                    required: true,
                    maxlength: 20

                },
                homePhone: {
                    required: false,
                    maxlength: 20
                },
                workPhone: {
                    required: false,
                    maxlength: 20
                },
                currentEmail: {
                    required: false,
                    email: true
                },
                emergencyContact:{
                    required: true,
                    maxlength: 255
                },
                emergencyPhone:{
                    required: true,
                    maxlength: 20
                },
                'residencyType[]': {
                    required: true,
                    minlength: 1
                },
                spouseName:{
                    required: true,
                    maxlength: 255
                },
                exSpouseName:{
                    maxlength: 255
                },
                exPlaceOfMarriage:{
                    maxlength: 255
                },
                exPlaceOfDivorce:{
                    maxlength: 255
                },
                dateOfMarriage:{
                    required: true
                },
                stateCountryOfMarriage:{
                    required: true,
                    maxlength: 255
                },
                spouseBirthday:{
                    required: true
                },
                proofOfSpouseCitizenship:{
                    required: true,
                    maxlength: 255
                },
                careOfName: {
                    maxlength: 100
                },
                residency: {
                    maxlength: 20
                },
                "methodOfEntry[]": {
                    maxlength: 1500
                },
                "anyIllegalDocumentOnEntry[]": {
                    maxlength: 1500
                },
                "detainedByUSPatrol[]": {
                    maxlength: 1500
                },
                "documentDesc[]": {
                    maxlength: 1000
                },
                "stateCountryOfLegalEncounter[]": {
                    maxlength: 255
                },
                "natureOfLegalIssue[]": {
                    maxlength: 255
                },
                "issueDescription[]": {
                    maxlength: 1000
                },
                "childFullLegalName[]": {
                    maxlength: 255
                },
                "childStateCountryOfBirth[]": {
                    maxlength: 255
                },
                "childMothersName[]": {
                    maxlength: 255
                },
                "childFathersName[]": {
                    maxlength: 1000
                },
                "employerName[]": {
                    maxlength: 255
                },
                "employerAddress[]": {
                    maxlength: 255
                },
                "jobTitle[]": {
                    maxlength: 255
                },
                "jobDescription[]": {
                    maxlength: 1000
                },
                "certificationDegree[]": {
                    maxlength: 255
                },
                "degreeUniversity[]": {
                    maxlength: 255
                },
                "degreeStateAndCountry[]": {
                    maxlength: 255
                },
                "accusedDrugAddiction": {
                    maxlength: 255
                },
                "accusedChildAbduction": {
                    maxlength: 255
                },
                "deportedFromUS": {
                    maxlength: 255
                },
                "citizenshipAfter96": {
                    maxlength: 255
                },
                "electionsVoted": {
                    maxlength: 255
                },
                "capacityToSupport": {
                    maxlength: 255
                },
                "otherQuestions": {
                    maxlength: 1500
                },
            },
            messages: {
                firstName: {
                    required: '<span class="en">Please enter your first name</span><span class="es">Por favor, ingrese su nombre</span>',
                    maxlength: '<span class="en">Max length 255 characters!</span><span class="es">¡Longitud máxima 255 caracteres!</span>'
                },
                lastName: {
                    required: '<span class="en">Please enter your last name</span><span class="es">Por favor, ingrese su apellido</span>',
                    maxlength: '<span class="en">Max length 255 characters!</span><span class="es">¡Longitud máxima 255 caracteres!</span>'
                },
                middleName:{
                    maxlength: '<span class="en">Max length 255 characters!</span><span class="es">¡Longitud máxima 255 caracteres!</span>'
                },
                birthday: {
                    required: '<span class="en">Please enter your birthday</span><span class="es">Por favor, ingrese su fecha de nacimiento</span>'
                },
                birthPlace: {
                    required: '<span class="en">Please enter your birth place</span><span class="es">Por favor, ingrese su lugar de nacimiento</span>',
                    maxlength: '<span class="en">Max length 255 characters!</span><span class="es">¡Longitud máxima 255 caracteres!</span>'
                },
                citizenshipCountry: {
                    required: '<span class="en">Please enter your country of citizenship</span><span class="es">Por favor, ingrese su país de ciudadanía</span>',
                    maxlength: '<span class="en">Max length 255 characters!</span><span class="es">¡Longitud máxima 255 caracteres!</span>'
                },
                gender: {
                    required: '<span class="en">Please select your gender</span><span class="es">Por favor, seleccione su género</span>'
                },
                street1: {
                    required: '<span class="en">Please enter the street address</span><span class="es">Por favor, ingrese la dirección</span>',
                    maxlength: '<span class="en">Max length 255 characters!</span><span class="es">¡Longitud máxima 255 caracteres!</span>'
                },
                street2: {
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
                cellPhone: {
                    required: '<span class="en">Please enter the cell phone number</span><span class="es">Por favor, ingrese el número de celular</span>',
                    maxlength: '<span class="en">Max length 20 characters!</span><span class="es">¡Longitud máxima 20 caracteres!</span>'
                },
                currentEmail: {
                    email: '<span class="en">Please enter a valid email address</span><span class="es">Por favor, ingrese una dirección de correo electrónico válida</span>',
                    maxlength: '<span class="en">Max length 255 characters!</span><span class="es">¡Longitud máxima 255 caracteres!</span>'
                },
                emergencyContact: {
                    required: '<span class="en">Please enter the emergency contact name</span><span class="es">Por favor, ingrese el nombre del contacto de emergencia</span>',
                    maxlength: '<span class="en">Max length 255 characters!</span><span class="es">¡Longitud máxima 255 caracteres!</span>'
                },
                emergencyPhone: {
                    required: '<span class="en">Please enter the emergency contact phone number</span><span class="es">Por favor, ingrese el número de teléfono del contacto de emergencia</span>',
                    maxlength: '<span class="en">Max length 20 characters!</span><span class="es">¡Longitud máxima 20 caracteres!</span>'
                },
                'residencyType[]': {
                    required: '<span class="en">Please select at least one residency option</span><span class="es">Por favor, seleccione al menos una opción de residencia</span>'
                },
                spouseName: {
                    required: '<span class="en">Please enter your spouse\'s name</span><span class="es">Por favor, ingrese el nombre de su cónyuge</span>',
                    maxlength: '<span class="en">Max length 255 characters!</span><span class="es">¡Longitud máxima 255 caracteres!</span>'
                },
                exSpouseName:{
                    maxlength: '<span class="en">Max length 255 characters!</span><span class="es">¡Longitud máxima 255 caracteres!</span>'
                },
                exPlaceOfMarriage:{
                    maxlength: '<span class="en">Max length 255 characters!</span><span class="es">¡Longitud máxima 255 caracteres!</span>'
                },
                exPlaceOfDivorce:{
                    maxlength: '<span class="en">Max length 255 characters!</span><span class="es">¡Longitud máxima 255 caracteres!</span>'
                },
                dateOfMarriage: {
                    required: '<span class="en">Please enter the date of marriage</span><span class="es">Por favor, ingrese la fecha de matrimonio</span>'
                },
                stateCountryOfMarriage: {
                    required: '<span class="en">Please enter the state or country of marriage</span><span class="es">Por favor, ingrese el estado o país de matrimonio</span>',
                    maxlength: '<span class="en">Max length 255 characters!</span><span class="es">¡Longitud máxima 255 caracteres!</span>'
                },
                spouseBirthday: {
                    required: '<span class="en">Please enter your spouse\'s birthday</span><span class="es">Por favor, ingrese la fecha de nacimiento de su cónyuge</span>'
                },
                proofOfSpouseCitizenship: {
                    required: '<span class="en">Please provide proof of spouse\'s citizenship</span><span class="es">Por favor, proporcione prueba de la ciudadanía de su cónyuge</span>',
                    maxlength: '<span class="en">Max length 255 characters!</span><span class="es">¡Longitud máxima 255 caracteres!</span>'
                },
                residency: {
                    maxlength: '<span class="en">Max length 20 characters!</span><span class="es">¡Longitud máxima 20 caracteres!</span>'
                },
                homePhone: {
                    maxlength: '<span class="en">Max length 20 characters!</span><span class="es">¡Longitud máxima 20 caracteres!</span>'
                },
                workPhone: {
                    maxlength: '<span class="en">Max length 20 characters!</span><span class="es">¡Longitud máxima 20 caracteres!</span>'
                },
                "methodOfEntry[]": {
                    maxlength: '<span class="en">Max length 1500 characters!</span><span class="es">¡Longitud máxima 1500 caracteres!</span>'
                },
                "anyIllegalDocumentOnEntry[]": {
                    maxlength: '<span class="en">Max length 1500 characters!</span><span class="es">¡Longitud máxima 1500 caracteres!</span>'
                },
                "detainedByUSPatrol[]": {
                    maxlength: '<span class="en">Max length 1500 characters!</span><span class="es">¡Longitud máxima 1500 caracteres!</span>'
                },
                "documentDesc[]": {
                    maxlength: '<span class="en">Max length 1500 characters!</span><span class="es">¡Longitud máxima 1500 caracteres!</span>'
                },
                "stateCountryOfLegalEncounter[]": {
                    maxlength: '<span class="en">Max length 255 characters!</span><span class="es">¡Longitud máxima 255 caracteres!</span>'
                },
                "natureOfLegalIssue[]": {
                    maxlength: '<span class="en">Max length 255 characters!</span><span class="es">¡Longitud máxima 255 caracteres!</span>'
                },
                "issueDescription[]": {
                    maxlength: '<span class="en">Max length 1000 characters!</span><span class="es">¡Longitud máxima 1000 caracteres!</span>'
                },
                "childFullLegalName[]": {
                    maxlength: '<span class="en">Max length 255 characters!</span><span class="es">¡Longitud máxima 255 caracteres!</span>'
                },
                "childStateCountryOfBirth[]": {
                    maxlength: '<span class="en">Max length 255 characters!</span><span class="es">¡Longitud máxima 255 caracteres!</span>'
                },
                "childMothersName[]": {
                    maxlength: '<span class="en">Max length 255 characters!</span><span class="es">¡Longitud máxima 255 caracteres!</span>'
                },
                "childFathersName[]": {
                    maxlength: '<span class="en">Max length 1000 characters!</span><span class="es">¡Longitud máxima 1000 caracteres!</span>'
                },
                "employerName[]": {
                    maxlength: '<span class="en">Max length 255 characters!</span><span class="es">¡Longitud máxima 255 caracteres!</span>'
                },
                "employerAddress[]": {
                    maxlength: '<span class="en">Max length 255 characters!</span><span class="es">¡Longitud máxima 255 caracteres!</span>'
                },
                "jobTitle[]": {
                    maxlength: '<span class="en">Max length 255 characters!</span><span class="es">¡Longitud máxima 255 caracteres!</span>'
                },
                "jobDescription[]": {
                    maxlength: '<span class="en">Max length 1000 characters!</span><span class="es">¡Longitud máxima 1000 caracteres!</span>'
                },
                "certificationDegree[]": {
                    maxlength: '<span class="en">Max length 255 characters!</span><span class="es">¡Longitud máxima 255 caracteres!</span>'
                },
                "degreeUniversity[]": {
                    maxlength: '<span class="en">Max length 255 characters!</span><span class="es">¡Longitud máxima 255 caracteres!</span>'
                },
                "degreeStateAndCountry[]": {
                    maxlength: '<span class="en">Max length 255 characters!</span><span class="es">¡Longitud máxima 255 caracteres!</span>'
                },
                "accusedDrugAddiction": {
                    maxlength: '<span class="en">Max length 255 characters!</span><span class="es">¡Longitud máxima 255 caracteres!</span>'
                },
                "accusedChildAbduction": {
                    maxlength: '<span class="en">Max length 255 characters!</span><span class="es">¡Longitud máxima 255 caracteres!</span>'
                },
                "deportedFromUS": {
                    maxlength: '<span class="en">Max length 255 characters!</span><span class="es">¡Longitud máxima 255 caracteres!</span>'
                },
                "citizenshipAfter96": {
                    maxlength: '<span class="en">Max length 255 characters!</span><span class="es">¡Longitud máxima 255 caracteres!</span>'
                },
                "electionsVoted": {
                    maxlength: '<span class="en">Max length 255 characters!</span><span class="es">¡Longitud máxima 255 caracteres!</span>'
                },
                "capacityToSupport": {
                    maxlength: '<span class="en">Max length 255 characters!</span><span class="es">¡Longitud máxima 255 caracteres!</span>'
                },
                "otherQuestions": {
                    maxlength: '<span class="en">Max length 1500 characters!</span><span class="es">¡Longitud máxima 1500 caracteres!</span>'
                },
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
                            $(form).trigger('reset');
                            location.reload();
                        } else {
                            $('#response').html(`<div class='alert alert-danger'>${response.message}</div>`);
                        }

                        // console.log('Form submitted successfully');
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

function isEmailOrPhone(input) {
    // Regular expression for phone number (format: +123 456 7890 or 123-456-7890)
    const phonePattern = /^\+?(\d{1,3})?[-.\s]?(\(?\d{1,4}\)?)?[-.\s]?\d{1,4}[-.\s]?\d{1,4}[-.\s]?\d{1,9}$/;

    // Regular expression for email
    const emailPattern = /^[\w._%+-]+@[\w.-]+\.[a-zA-Z]{2,}$/;

    // Check if the input matches the phone number pattern
    if (phonePattern.test(input)) {
        return 'phone';
    }

    // Check if the input matches the email pattern
    if (emailPattern.test(input)) {
        return 'email';
    }

    // If neither pattern matches
    return 'invalid';
}

$(document).ready(function () {
    // Set the maximum date to today
    var today = new Date();
    var maxDate = today.toISOString().split('T')[0]; // Format as YYYY-MM-DD

    // Apply the datepicker to all <input type="date"> fields
    $('input[type="date"]').each(function () {
        $(this).closest('.input-div').addClass('cover-calendar');
        $(this).datepicker({
            dateFormat: 'yy-mm-dd', // Format as YYYY-MM-DD
            changeMonth: true, // Show month dropdown
            changeYear: true,  // Show year dropdown
            maxDate: maxDate,  // Set max date to today
            yearRange: 'c-100:c+10' // Set range for the year dropdown (e.g., 100 years ago to 10 years in the future)
        });

        $(this).change(function () {
            $(this).valid();
        });
    });
    // document.querySelectorAll('input[type="date"]').forEach(function (input) {
    //     input.addEventListener('mousedown', function (event) {
    //         if (event.target.type === 'date') {
    //             event.preventDefault();  // Prevent the default calendar popup
    //         }
    //     });
    // });

});

$(document).ready(function () {
    $('.radio-type-check').on('change', function () {
        console.log('checked');
        if ($(this).is(':checked')) {
            $('.radio-type-check').not(this).prop('checked', false);
        }
    });
});