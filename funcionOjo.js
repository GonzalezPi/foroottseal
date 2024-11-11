    const togglePassword = document.getElementById('togglePassword');
    const passwordInput = document.getElementById('password');
    const eyeIcon = document.getElementById('eyeIcon');
    const togglePassword2 = document.getElementById('togglePassword2');
    const passwordInput2 = document.getElementById('passwordConf');
    const eyeIcon2 = document.getElementById('eyeIcon2');


    togglePassword.addEventListener('click', () => {
        const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordInput.setAttribute('type', type);
        eyeIcon.textContent = type === 'password' ? 'visibility_off' : 'visibility';
    });
    
    togglePassword2.addEventListener('click', () => {
        const type = passwordInput2.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordInput2.setAttribute('type', type);
        eyeIcon2.textContent = type === 'password' ? 'visibility_off' : 'visibility';
    });