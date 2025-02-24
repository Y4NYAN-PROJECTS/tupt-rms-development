document.addEventListener('DOMContentLoaded', () => {
    // Object to store references to input fields
    const inputs = {
        firstname: document.getElementById('firstname'), // First name input
        middlename: document.getElementById('middlename'), // Middle name input
        lastname: document.getElementById('lastname'), // Last name input
        idnumber: document.getElementById('idnumber'), // ID number input
        email: document.getElementById('email'), // Email input
        password: document.getElementById('password'), // Password input
        confirmpassword: document.getElementById('confirmpassword'), // Confirm password input
    };

    const submitButton = document.getElementById('submit'); // Submit button reference

    // Function: Validation for name fields (letters only)
    const validateName = (input) => /^[a-zA-Z\s]+$/.test(input.value);
    const validateIdNumber = (input) => /^(TUPT|INSP)-\d{2}-\d{4}$/.test(input.value);
    const validateEmail = (input) => /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/.test(input.value);
    const validatePassword = (input) => input.value.length >= 8;
    const validateConfirmPassword = () => inputs.password.value === inputs.confirmpassword.value;
    const setInvalid = (input) => input.classList.add('is-invalid');
    const setValid = (input) => input.classList.remove('is-invalid');

    const toggleSubmit = () => {
        submitButton.disabled = Object.values(inputs).some(input => input.classList.contains('is-invalid'));
    };

    const updateIdNumberFormat = (input) => {
        let value = input.value.replace(/[^A-Za-z0-9]/g, ''); // Remove non-alphanumeric characters
        if (value.length <= 4) {
            value = value.replace(/[^A-Za-z]/g, '').toUpperCase(); // Keep only letters for the prefix
        } else {
            let afterPrefix = value.slice(4).replace(/[a-zA-Z]/g, ''); // Remove letters after the prefix
            value = value.slice(0, 4).toUpperCase() + afterPrefix;
        }
        if (value.length > 4) {
            const prefix = value.slice(0, 4).toUpperCase();
            let numbers = value.slice(4).replace(/[^0-9]/g, ''); // Keep only numbers
            if (numbers.length > 6) numbers = numbers.slice(0, 6);
            value = numbers.length > 2
                ? `${prefix}-${numbers.slice(0, 2)}-${numbers.slice(2)}`
                : `${prefix}-${numbers}`;
        }
        return value;
    };

    // Function: Save input data to localStorage
    const saveInput = (key, value) => localStorage.setItem(key, value);

    // Function: Load input data from localStorage
    const loadInput = (key) => localStorage.getItem(key) || '';

    // Function: Validate input, transform value, and manage validation states
    const handleInputValidation = (input, validator, transform = null) => {
        const value = transform ? transform(input) : input.value; // Transform input value if provided
        input.value = value; // Update the input's value
        if (validator(input)) {
            setValid(input); // Mark input as valid
        } else {
            setInvalid(input); // Mark input as invalid
        }
        saveInput(input.id, value); // Save the input value to localStorage
        toggleSubmit(); // Enable or disable the submit button
    };

    // Attach event listeners for each input
    inputs.firstname.addEventListener('input', () => handleInputValidation(inputs.firstname, validateName, input => input.value.toUpperCase()));
    inputs.middlename.addEventListener('input', () => handleInputValidation(inputs.middlename, validateName, input => input.value.toUpperCase()));
    inputs.lastname.addEventListener('input', () => handleInputValidation(inputs.lastname, validateName, input => input.value.toUpperCase()));
    inputs.idnumber.addEventListener('input', () => handleInputValidation(inputs.idnumber, validateIdNumber, updateIdNumberFormat));
    inputs.email.addEventListener('input', () => handleInputValidation(inputs.email, validateEmail));
    inputs.password.addEventListener('input', () => handleInputValidation(inputs.password, validatePassword));
    inputs.confirmpassword.addEventListener('input', () => handleInputValidation(inputs.confirmpassword, validateConfirmPassword));

    // On page load: restore saved values and validate each input
    Object.values(inputs).forEach(input => {
        input.value = loadInput(input.id); // Load the saved value
        if (input.id === 'idnumber') {
            input.value = updateIdNumberFormat(input); // Format ID number
        }
        const validator = input === inputs.confirmpassword // Check if the input is the confirm password field
            ? validateConfirmPassword // If true, use the `validateConfirmPassword` function for validation
            : input === inputs.idnumber // If not, check if the input is the ID number field
                ? validateIdNumber // If true, use the `validateIdNumber` function for validation
                : input === inputs.email // If not, check if the input is the email field
                    ? validateEmail // If true, use the `validateEmail` function for validation
                    : validateName; // If none of the above, default to using the `validateName` function for validation

        // Call the handleInputValidation function, passing the input, the selected validator, and a transform function if necessary
        handleInputValidation(input,validator, input === inputs.idnumber ? updateIdNumberFormat : null);
    });
});

// const submitButton = document.getElementById('submit');
// submitButton.addEventListener('click', (event) => {
//     // Clear the localStorage
//     localStorage.clear();

//     // You can include additional logic if needed
//     console.log('Form submitted and localStorage cleared.');
// });
