
function validateLoginForm() {
    // Get the username and password input elements
    var usernameInput = document.getElementById("username");
    var passwordInput = document.getElementById("password");

    // Get the error message elements
    var usernameError = document.getElementById("username-error");
    var passwordError = document.getElementById("password-error");

    // Reset any previous error messages
    usernameError.textContent = "";
    passwordError.textContent = "";

    if (usernameInput.value.trim() === "") {
        usernameError.textContent = "Please enter a username";
        usernameInput.focus();
        return false;
    }
    return true;
}

function validateForm() {
    const username = document.getElementById("username").value;
    const password = document.getElementById("password").value;
    const email = document.getElementById("email").value;
    const phone = document.getElementById("phone").value;
    const age = document.getElementById("age").value;

    if (username === "") {
        alert("Username must be filled out");
        return false;
    }

    if (password === "") {
        alert("Password must be filled out");
        return false;
    }

    if (email === "") {
        alert("Email must be filled out");
        return false;
    }

    if (phone === "") {
        alert("Phone number must be filled out");
        return false;
    }

    if (phone.length < 10) {
        alert("Phone number must be at least 10 digits");
        return false;
    }

    if (age === "") {
        alert("Age must be filled out");
        return false;
    }

    if (age < 0) {
        alert("Age must be a positive number");
        return false;
    }

    return true;
}

