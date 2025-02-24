document.getElementById('show-password').addEventListener('change', function () {
    const passwordField = document.getElementById('password');
    passwordField.type = this.checked ? 'text' : 'password';
});

document.addEventListener("DOMContentLoaded", function () {
    const { checkLogin, idnumber, idnumberError, passwordError } = loginData;

    const idnumberInput = document.getElementById('idnumber');
    const passwordInput = document.getElementById('password');

    if (checkLogin) {
        if (idnumberError && passwordError) {
            idnumberInput.focus();
            idnumberInput.classList.add("is-invalid");
            passwordInput.classList.add("is-invalid");

            idnumberInput.addEventListener('input', function () {
                idnumberInput.classList.remove("is-invalid");
                passwordInput.classList.remove("is-invalid");
            });
        } else if (idnumberError) {
            idnumberInput.value = idnumber;
            idnumberInput.focus();
            idnumberInput.classList.add("is-invalid");

            idnumberInput.addEventListener('input', function () {
                idnumberInput.classList.remove("is-invalid");
            });
        } else if (passwordError) {
            idnumberInput.value = idnumber;
            passwordInput.focus();
            idnumberInput.classList.remove("is-invalid");
            passwordInput.classList.add("is-invalid");

            passwordInput.addEventListener('input', function () {
                passwordInput.classList.remove("is-invalid");
            });
        } else {
            idnumberInput.classList.remove("is-invalid");
            passwordInput.classList.remove("is-invalid");
        }
    }
});
