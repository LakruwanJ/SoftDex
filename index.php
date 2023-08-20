<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="css/reglog.css" />
        <title>Sign in & Sign up Form</title>
    </head>
    <body>
        <div class="container">
            <div class="forms-container">
                <div class="signin-signup">

                    <form action="#" class="sign-in-form">
                        <img src="img/logo3.png" alt="logo" style="height:60px;"><br><br>
                        <h2 class="title">Sign in</h2>
                        <div class="input-field">
                            <i class="fas fa-user"></i>
                            <input type="text" placeholder="Username" class="form-outline"/>
                        </div>
                        <div class="input-field">
                            <i class="fas fa-lock"></i>
                            <input type="password" placeholder="Password" />
                        </div><br>
                        <table border="0" class="sign-in-form" width="80%">
                            <tbody>
                                <tr>
                                    <td align="center"><div class="remember-forgot">
                            <label class="remember-label">
                                <input type="checkbox" name="remember" id="remember" />
                                Remember me
                            </label>
                            
                        </div></td>
                                    <td align="center"><a href="#" class="forgot-link" align="right">Forgot Password?</a></td>
                                </tr>
                            </tbody>
                        </table>


                        <input type="submit" value="Login" class="btn solid" />

                    </form>

                    <form action="#" class="sign-up-form">
                        <img src="img/logo3.png" alt="logo" style="height:60px;"><br><br>
                        <h2 class="title">Sign up</h2>
                        <div class="input-field">
                            <i class="fas fa-user"></i>
                            <input type="text" placeholder="Username" />
                        </div>
                        <div class="input-field">
                            <i class="fas fa-envelope"></i>
                            <input type="email" placeholder="Email" />
                        </div>
                        <div class="input-field">
                            <i class="fas fa-lock"></i>
                            <input type="password" placeholder="Password" />
                        </div>
                        <input type="submit" class="btn" value="Sign up" />
                    </form>
                </div>
            </div>

            <div class="panels-container">
                <div class="panel left-panel">
                    <div class="content">
                        <h3>Are You New Here?</h3>
                        <p>
                           Unlock Limitless Possibilities: Join the Digital Revolution with SoftDex! Your Journey Starts Here.
                        </p>
                        <button class="btn transparent" id="sign-up-btn">
                            Sign up
                        </button>
                    </div>
                    <img src="img/login.svg" class="image" alt="" />
                </div>
                <div class="panel right-panel">
                    <div class="content">
                        <h3>Are you Ready to connect?</h3>
                        <p>
                            Unlock Limitless Possibilities: embark on a extraordinary journey....
                        </p>
                        <button class="btn transparent" id="sign-in-btn">
                            Sign in
                        </button>
                    </div>
                    <img src="img/register.svg" class="image" alt="" />
                </div>
            </div>
        </div>

        <script src="js/reglog.js"></script>
        
    </body>
</html>
