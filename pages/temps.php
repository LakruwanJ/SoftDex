<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Animated Register/Login</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
<style>
  body {
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    margin: 0;
    background-color: #f8f9fa;
  }
  .card {
    width: 350px;
    transition: transform 0.6s;
  }
  .toggle-form {
    cursor: pointer;
    color: blue;
  }
</style>
</head>
<body>
<div class="card">
  <div class="card-body">
    <h5 class="card-title animate__animated animate__fadeInDown" id="form-title">Register</h5>
    <form id="register-form">
      <div class="mb-3 animate__animated animate__fadeInLeft">
        <label for="registerUsername" class="form-label">Username</label>
        <input type="text" class="form-control" id="registerUsername" required>
      </div>
      <div class="mb-3 animate__animated animate__fadeInLeft">
        <label for="registerPassword" class="form-label">Password</label>
        <input type="password" class="form-control" id="registerPassword" required>
      </div>
      <button type="submit" class="btn btn-primary animate__animated animate__fadeInUp">Register</button>
    </form>
    <form id="login-form" style="display: none;">
      <div class="mb-3 animate__animated animate__fadeInRight">
        <label for="loginUsername" class="form-label">Username</label>
        <input type="text" class="form-control" id="loginUsername" required>
      </div>
      <div class="mb-3 animate__animated animate__fadeInRight">
        <label for="loginPassword" class="form-label">Password</label>
        <input type="password" class="form-control" id="loginPassword" required>
      </div>
      <button type="submit" class="btn btn-primary animate__animated animate__fadeInUp">Login</button>
    </form>
    <p class="mt-3">
      <span id="toggle-text">Already have an account? Login</span>
      <span class="toggle-form" id="toggle-form">Don't have an account? Register</span>
    </p>
  </div>
</div>
<script>
  const registerForm = document.getElementById('register-form');
  const loginForm = document.getElementById('login-form');
  const formTitle = document.getElementById('form-title');
  const toggleText = document.getElementById('toggle-text');
  const toggleForm = document.getElementById('toggle-form');
  
  toggleForm.addEventListener('click', () => {
    registerForm.classList.toggle('animate__fadeOutLeft');
    loginForm.classList.toggle('animate__fadeOutRight');
    
    setTimeout(() => {
      formTitle.textContent = formTitle.textContent === 'Register' ? 'Login' : 'Register';
      toggleText.textContent = toggleText.textContent === "Don't have an account? Register" ? "Already have an account? Login" : "Don't have an account? Register";
      registerForm.classList.toggle('animate__fadeOutLeft');
      loginForm.classList.toggle('animate__fadeOutRight');
      
      registerForm.classList.toggle('animate__fadeInRight');
      loginForm.classList.toggle('animate__fadeInLeft');
    }, 500);
  });
</script>
</body>
</html>
