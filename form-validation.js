const firstName = document.getElementById('first-name');
const lastName = document.getElementById('last-name');
const dob = document.getElementById('dob');
const username = document.getElementById('username');
const password = document.getElementById('password');
const confirmPassword = document.getElementById('confirm-password');
const form = document.querySelector('.registration-form');
const passwordRegex = /^(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*]).{8,}$/;
const usernameRegex = /^[a-zA-Z0-9]{6,}$/;

function showError(input, message) {
    const formInput = input.parentElement;
    formInput.classList.add('error');
    let error = formInput.querySelector('.error-message');
    if (!error) {
        error = document.createElement('span');
        error.classList.add('error-message');
        formInput.appendChild(error);
    }
    error.textContent = message;
}

function clearError(input) {
    const formInput = input.parentElement;
    formInput.classList.remove('error');
    const error = formInput.querySelector('.error-message');
    if (error) {
        error.remove();
    }
}

firstName.addEventListener('input', function () {
    if (firstName.value.trim() === '') {
        showError(firstName, 'First name is required.');
    } else {
        clearError(firstName);
    }
});

lastName.addEventListener('input', function () {
    if (lastName.value.trim() === '') {
        showError(lastName, 'Last name is required.');
    } else {
        clearError(lastName);
    }
});

dob.addEventListener('input', function () {
    if (dob.value === '') {
        showError(dob, 'Date of birth is required.');
    } else {
        clearError(dob);
    }
});

username.addEventListener('input', function () {
    if (!usernameRegex.test(username.value)) {
        showError(username, 'Username must be at least 6 characters long and contain only letters and numbers.');
    } else {
        clearError(username);
    }
});

password.addEventListener('input', function () {
    if (!passwordRegex.test(password.value)) {
        showError(password, 'Password must include at least 8 characters, 1 uppercase letter, 1 number, and 1 special character.');
    } else {
        clearError(password);
    }
});

confirmPassword.addEventListener('input', function () {
    if (confirmPassword.value !== password.value) {
        showError(confirmPassword, 'Passwords do not match.');
    } else {
        clearError(confirmPassword);
    }
});

form.addEventListener('submit', function (e) {
    if (firstName.value.trim() === '') {
        showError(firstName, 'First name is required.');
    }
    if (lastName.value.trim() === '') {
        showError(lastName, 'Last name is required.');
    }
    if (dob.value === '') {
        showError(dob, 'Date of birth is required.');
    }
    if (!usernameRegex.test(username.value)) {
        showError(username, 'Username must be at least 6 characters long and contain only letters and numbers.');
    }
    if (!passwordRegex.test(password.value)) {
        showError(password, 'Password must include at least 8 characters, 1 uppercase letter, 1 number, and 1 special character.');
    }
    if (confirmPassword.value !== password.value) {
        showError(confirmPassword, 'Passwords do not match.');
    }

    const errors = document.querySelectorAll('.error-message');
    if (errors.length > 0) {
        e.preventDefault(); 
    }
});
