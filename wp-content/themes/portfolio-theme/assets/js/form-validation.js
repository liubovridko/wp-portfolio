document.addEventListener('DOMContentLoaded', function () {

    // Get the form element
    const form = document.querySelector('form.forminator-custom-form');

    if (form) {
        // Add event listener to the name input field for validation
        const nameInput = form.querySelector('input[name="text-1"]');
        const emailInput = form.querySelector('input[name="email-1"]');
        const messageTextarea = form.querySelector('textarea[name="textarea-1"]');
        const submitButton = form.querySelector('button.forminator-button-submit');

        nameInput.addEventListener('blur', function () {
            validateNameField(nameInput);
            toggleSubmitButton();
        });

        nameInput.addEventListener('focus', function () {
            toggleSubmitButton();
        });

        emailInput.addEventListener('blur', function () {
            toggleSubmitButton();
        });

        messageTextarea.addEventListener('blur', function () {
            toggleSubmitButton();
        });

        // Add custom render event listener for Forminator form
        document.addEventListener('forminator:render', function () {
            if (form.querySelectorAll('.forminator-has_error').length > 0) {
                $('.forminator-response-message.forminator-error').hide();
                submitButton.setAttribute('disabled', 'disabled');
            }
        });

        function validateNameField(input) {
            const nameValue = input.value.trim();

            // Regular expression to check if the value contains only letters and spaces
            const lettersOnly = /^[^\d]+$/;

            // Validate the name input
            if (!lettersOnly.test(nameValue)) {

                // Add error message in the Forminator's error format
                const errorMessage = 'Please enter a valid name without numbers.';

                // Add error message if it doesn't exist
                if (!input.nextElementSibling || !input.nextElementSibling.classList.contains('forminator-error-message')) {
                    const errorContainer = document.createElement('span');
                    errorContainer.classList.add('forminator-error-message');
                    errorContainer.id = `${input.id}-error`;
                    errorContainer.innerText = errorMessage;
                    input.parentNode.appendChild(errorContainer);
                }

                // Add aria-invalid and aria-describedby attributes
                input.setAttribute('aria-invalid', 'true');
                input.setAttribute('aria-describedby', `${input.id}-error`);

                // Add invalid class to input
                input.classList.add('forminator-has_error');
                input.parentNode.classList.add('forminator-has_error');

                return false;
            } else {
                // Remove any previous error messages
                if (input.nextElementSibling && input.nextElementSibling.classList.contains('forminator-error-message')) {
                    input.nextElementSibling.remove();
                }
                input.removeAttribute('aria-invalid');
                input.removeAttribute('aria-describedby');
                input.classList.remove('forminator-has_error');
                input.parentNode.classList.remove('forminator-has_error');

                return true;
            }
        }

        function toggleSubmitButton() {
            const nameValid = validateNameField(nameInput);
            const emailHasError = emailInput.parentNode.classList.contains('forminator-has_error');
            const messageHasError = messageTextarea.parentNode.classList.contains('forminator-has_error');

            if (nameValid && !emailHasError && !messageHasError) {
                submitButton.removeAttribute('disabled');
            } else {
                submitButton.setAttribute('disabled', 'disabled');
            } 
        }
 
    } else {
        console.log('Form not found');
    }
});
