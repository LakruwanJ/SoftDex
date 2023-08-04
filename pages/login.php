<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="/CSS/stylel.css">
  <title>Login</title>

</head>
<body class="container border border-primary-subtle col-4  mt-3 p-0" >
  <div class="A">
    <div>
  <p class="text-center fs-1">Login</p>
  </div>
  <div class="text-center container">
      <img src=".../img/login.jpg" class="img-thumbnail" alt="login" width="200px" heigth="200px">
  </div>
  <form class="mb-5">
    <p class="m-3">Choose your account type here</p>
    <div class="btn-group row container m-2 align-items-center" role="group" aria-label="Basic radio toggle button group">
      <input type="radio" class="btn-check " name="btnradio" id="btnradio1" autocomplete="off" checked>
      <label class="btn btn btn-outline-primary btn-sm  btn-font-fs-6 col-sm-4 " for="btnradio1">Admin</label>
    
      <input type="radio" class="btn-check " name="btnradio" id="btnradio2" autocomplete="off">
      <label class="btn btn btn-outline-primary btn-sm btn-font-fs-6 col-sm-4 " for="btnradio2">Developer</label>
    
      <input type="radio" class="btn-check" name="btnradio" id="btnradio3" autocomplete="off">
      <label class="btn btn btn-outline-primary btn-sm btn-font-fs-6 col-sm-4 " for="btnradio3">Customer</label>
    </div>
    <div class="mb-3 m-3">
      <label for="exampleInputEmail1" class="form-label">Email address</label>
      <input type="email" class="form-control border border-primary-subtle" id="exampleInputEmail1" placeholder="enter your email here" aria-label="email" aria-describedby="addon-wrapping">
      <div id="emailHelp" class="form-text">Your email is safe with us.</div>
    </div>
    <div class="mb-3 m-3">
      <label for="exampleInputPassword1" class="form-label">Password</label>
      <input type="password" class="form-control border border-primary-subtle" id="exampleInputPassword1" placeholder="enter your password here" aria-label="password" aria-describedby="addon-wrapping" >
    </div>
  <div class="d-grid gap-2 col-6 mx-auto">
    <button type="submit" class="btn btn-primary m-3 3">Login</button>
  </div>
  <div class="d-inline-flex align-items-center justify-content-center">
    <p class="m-2 2 me-2 ">Don't have an account?</p>
     <a href="signup.html" src="signup.html">Sign up </a>
  </div> 
  </form>
  </div>
</body>
</html>