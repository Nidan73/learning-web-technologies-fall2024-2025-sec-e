document.addEventListener("DOMContentLoaded", () => {
    const form = document.getElementById("loginForm");
    form.addEventListener("submit", validateForm);
});

function validateForm(event) {
    event.preventDefault(); 
    const usernameInput = document.getElementById("username");
    const passwordInput = document.getElementById("password");
    const errorMsg = document.getElementById("errorMsg");

    errorMsg.textContent = "";

    
    const username = usernameInput.value.trim();
    const password = passwordInput.value.trim();

    if (username === "") {
        errorMsg.textContent = "Please enter your username.";
        return;
    }

    if (password === "") {
        errorMsg.textContent = "Please enter your password.";
        return;
    }

    
    validateCredentials(username, password);
}

function validateCredentials(username, password) {
    const xhttp = new XMLHttpRequest();
    xhttp.open("POST", "../controller/logincheck.php", true);
    xhttp.setRequestHeader("Content-Type", "application/json");

    xhttp.onreadystatechange = function () {
        if (xhttp.readyState === 4) {
            if (xhttp.status === 200) {
                const response = JSON.parse(xhttp.responseText);
                const errorMsg = document.getElementById("errorMsg");

                if (response.status === "error") {
                    errorMsg.textContent = response.message;
                } else if (response.status === "success") {
                    window.location.href = "../view/home.php"; 
                }
            } else {
                console.error("Error during login request");
            }
        }
    };

    const data = JSON.stringify({ username, password });
    xhttp.send(data);
}
