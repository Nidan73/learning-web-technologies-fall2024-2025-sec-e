document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('editProfileForm');
    const username = document.getElementById('username');
    const email = document.getElementById('email');
    const password = document.getElementById('password');
    const usernameError = document.getElementById('usernameError');
    const emailError = document.getElementById('emailError');
    const passwordError = document.getElementById('passwordError');

    
    function clearErrors() {
        usernameError.textContent = '';
        emailError.textContent = '';
        passwordError.textContent = '';
    }

    function validateForm() {
        let isValid = true;
        clearErrors();

        if (username.value.trim() === '') {
            usernameError.textContent = 'Username is required.';
            isValid = false;
        }

        if (email.value.trim() === '') {
            emailError.textContent = 'Email is required.';
            isValid = false;
        } else if (!/^\S+@\S+\.\S+$/.test(email.value)) {
            emailError.textContent = 'Enter a valid email address.';
            isValid = false;
        }

        if (password.value.trim() === '') {
            passwordError.textContent = 'Password is required.';
            isValid = false;
        } else if (password.value.length < 4) {
            passwordError.textContent = 'Password must be at least 4 characters.';
            isValid = false;
        }

        return isValid;
    }

    form.addEventListener('submit', (e) => {
        e.preventDefault(); 

        if (!validateForm()) {
            return;
        }


        const formData = {
            user_id: form.user_id.value,
            username: username.value.trim(),
            email: email.value.trim(),
            password: password.value.trim(),
        };

        
        const data = JSON.stringify(formData);

        const xhttp = new XMLHttpRequest();
        

        xhttp.open('POST', '../controller/updateProfileController.php', true);
        
  
        xhttp.setRequestHeader('Content-Type', 'application/json');
        
        xhttp.send(data);

      
        xhttp.onreadystatechange = function () {
            if (this.readyState === 4) {
                if (this.status === 200) {
                    try {
                        const response = JSON.parse(this.responseText);
                        if (response.success) {
                            alert('Profile updated successfully!');
                            window.location.href = '../view/profile.php'; 
                        } else {
                            alert(response.message || 'Error updating profile.');
                        }
                    } catch (error) {
                        console.error('Invalid JSON response:', error);
                        alert('An error occurred. Please try again later.');
                    }
                } else {
                    alert('Failed to send request. Please try again later.');
                }
            }
        };
    });
});
