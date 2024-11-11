    const togglePassword = document.getElementById('togglePasswordLogIn');
    const passwordInput = document.getElementById('contraInput');
    const eyeIcon = document.getElementById('ojoLogIn');


    togglePassword.addEventListener('click', () => {
        const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordInput.setAttribute('type', type);
        eyeIcon.textContent = type === 'password' ? 'visibility_off' : 'visibility';
    });
    