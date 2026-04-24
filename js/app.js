document.addEventListener("DOMContentLoaded", () => {

  const togglePassword = document.getElementById('togglePassword');
  const password = document.getElementById('password');

  if (togglePassword && password) {
    togglePassword.addEventListener('change', function () {
      password.type = this.checked ? 'text' : 'password';
    });
  }

});