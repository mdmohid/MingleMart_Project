document.addEventListener('DOMContentLoaded', () => {
  // Form validation for login
  const loginForm = document.querySelector('form[action="login.php"]');
  if (loginForm) {
      loginForm.addEventListener('submit', (e) => {
          const email = loginForm.querySelector('input[name="email"]').value;
          const password = loginForm.querySelector('input[name="password"]').value;
          if (!email || !password) {
              e.preventDefault();
              alert('Please fill in all fields.');
          }
      });
  }

  // Form validation for signup
  const signupForm = document.querySelector('form[action="signup.php"]');
  if (signupForm) {
      signupForm.addEventListener('submit', (e) => {
          const name = signupForm.querySelector('input[name="name"]').value;
          const email = signupForm.querySelector('input[name="email"]').value;
          const password = signupForm.querySelector('input[name="password"]').value;
          const confirmPassword = signupForm.querySelector('input[name="confirm_password"]').value;
          if (!name || !email || !password || !confirmPassword) {
              e.preventDefault();
              alert('Please fill in all fields.');
          } else if (password !== confirmPassword) {
              e.preventDefault();
              alert('Passwords do not match.');
          }
      });
  }

  // Form validation for contact
  const contactForm = document.querySelector('form[action="contact.php"]');
  if (contactForm) {
      contactForm.addEventListener('submit', (e) => {
          const name = contactForm.querySelector('input[name="name"]').value;
          const email = contactForm.querySelector('input[name="email"]').value;
          const subject = contactForm.querySelector('input[name="subject"]').value;
          const feedback = contactForm.querySelector('textarea[name="feedback"]').value;
          if (!name || !email || !subject || !feedback) {
              e.preventDefault();
              alert('Please fill in all fields.');
          }
      });
  }
});