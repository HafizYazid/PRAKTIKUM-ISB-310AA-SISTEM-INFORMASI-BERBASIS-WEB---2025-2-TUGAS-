document.addEventListener('DOMContentLoaded', () => {
  const usernameField = document.getElementById('username');
  if (usernameField) {
    usernameField.focus();
  }

  const loginForm = document.getElementById('login-form');
  if (loginForm) {
    loginForm.addEventListener('submit', (event) => {
      const submitButton = loginForm.querySelector('button[type="submit"]');
      if (submitButton) {
        submitButton.textContent = 'Signing in...';
        submitButton.disabled = true;
      }
      // Form will submit normally after this
    });
  }
});
