function validateLoginForm() {
    const username = document.getElementById('username').value;
    const password = document.getElementById('password').value;
    if (!username || !password) {
        alert("All fields are required.");
        return false;
    }
    return true;
}

function validateSignupForm() {
    const username = document.getElementById('username').value;
    const name = document.getElementById('name').value;
    const password = document.getElementById('password').value;
    const contact = document.getElementById('contact').value;
    if (!username || !name || !password || !contact) {
        alert("All fields are required.");
        return false;
    }
    return true;
}

function validateEditForm() {
    const name = document.getElementById('name').value;
    const username = document.getElementById('username').value;
    const contact = document.getElementById('contact').value;
    if (!name || !username || !contact) {
        alert("All fields are required.");
        return false;
    }
    return true;
}

function searchAuthors() {
    const query = document.getElementById('searchInput').value;
    const xhr = new XMLHttpRequest();
    xhr.open("GET", `../controller/search.php?q=${query}`, true);
    xhr.onload = function() {
        if (xhr.status === 200) {
            document.getElementById('authorList').innerHTML = xhr.responseText;
        }
    };
    xhr.send();
}
