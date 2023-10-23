var registerTab = document.getElementById('registerTab');
var loginTab = document.getElementById('loginTab');
var registerForm = document.getElementById('register-form');
var loginForm = document.getElementById('login_from');

function showForm(tab, form) {
    tab.addEventListener('click', function(event) {
        event.preventDefault();

        // Hide all forms
        registerForm.style.display = 'none';
        loginForm.style.display = 'none';
        // Add other forms to hide if needed

        // Display the corresponding form
        form.style.display = 'block';
    });
}

showForm(registerTab, registerForm);
showForm(loginTab, loginForm);
