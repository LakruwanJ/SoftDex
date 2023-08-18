<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login Form</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<style>
  
  .input-field i {
    position: absolute;
    top: 50%;
    left: 10px;
    transform: translateY(-50%);
  }
  .input-field input {
    width: 100%;
    padding: 10px;
    border: none;
    border-bottom: 1px solid #ccc;
    outline: none;
  }
  .input-field label {
    position: absolute;
    top: 50%;
    left: 10px;
    transform: translateY(-50%);
    color: #999;
    pointer-events: none;
    transition: 0.2s ease all;
  }
  .input-field input:focus + label,
  .input-field input:valid + label {
    top: 0;
    transform: translateY(0);
    font-size: 12px;
    color: #3498db;
  }
  .btn {
    background-color: #3498db;
    color: #ffffff;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: 0.3s ease background-color;
  }
  .btn:hover {
    background-color: #2980b9;
  }
</style>
</head>
<body>
<div class="sign-in-form">
  <h2 class="title">Sign in</h2>
  <div class="input-field">
    <i class="fas fa-user"></i>
    <input type="text" id="username" required>
    <label for="username">Username</label>
  </div>
  <div class="input-field">
    <i class="fas fa-lock"></i>
    <input type="password" id="password" required>
    <label for="password">Password</label>
  </div>
  <input type="submit" value="Login" class="btn solid">
  <p class="social-text">Or Sign in with social platforms</p>
  <div class="social-media">
    <a href="#" class="social-icon"><i class="fab fa-facebook-f"></i></a>
    <a href="#" class="social-icon"><i class="fab fa-twitter"></i></a>
    <a href="#" class="social-icon"><i class="fab fa-google"></i></a>
    <a href="#" class="social-icon"><i class="fab fa-linkedin-in"></i></a>
  </div>
</div>
</body>
</html>
