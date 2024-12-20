<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="css/reglog.css" />
        <title>Sign in & Sign up Form</title>

        <style>
            body {
                margin: 0;
                padding: 0;
                overflow-x: hidden; /* This hides the horizontal scrollbar */
            }

        </style>
    </head>
    <body>
        <div class="container">
            <div class="forms-container">
                <div class="signin-signup">

                    <?php
                    if (isset($_GET['e'])) {
                        if ($_GET['e'] === "1") {
                            ?>
                            <div class="px-5"><div class="alert alert-danger alert-sm" role="alert" width=80%>Username or Password Incorrect.</div></div>
                            <?php
                        } else if ($_GET['e'] === "2") {
                            ?>
                            <div class="px-5"><div class="alert alert-danger alert-sm" role="alert" width=80%>Please fill all the fields.</div></div>
                            <?php
                        } else if ($_GET['e'] === "3") {
                            ?>
                            <div class="px-5"><div class="alert alert-danger alert-sm" role="alert" width=80%>Passwords are not same.</div></div>
                            <?php
                        } else if ($_GET['e'] === "4") {
                            ?>
                            <div class="px-5"><div class="alert alert-danger alert-sm" role="alert" width=80%>Please enter a valid email.</div></div>
                            <?php
                        } else if ($_GET['e'] === "5") {
                            ?>
                            <div class="px-5"><div class="alert alert-danger alert-sm" role="alert" width=80%>Username already taken.</div></div>
                            <?php
                        } else if ($_GET['e'] === "6") {
                            ?>
                            <div class="px-5"><div class="alert alert-danger alert-sm" role="alert" width=80%>This email alrady in system</div></div>
                            <?php
                        } else if ($_GET['e'] === "7") {
                            ?>
                            <div class="px-5"><div class="alert alert-success alert-sm" role="alert" width=80%>Registation Sucessfully.</div></div>
                            <?php
                        } else if ($_GET['e'] === "8") {
                            ?>
                            <div class="px-5"><div class="alert alert-danger alert-sm" role="alert" width=80%>Please fill all the fields.</div></div>
                            <?php }
                    }
                    ?>

                    <form action="Classes/reglog.php" class="sign-in-form needs-validation" method="POST">
                        <img src="img/logo3.png" alt="logo" style="height:60px;"><br><br>
                        <h2 class="title">Sign in</h2>
                        <div class="input-field">
                            <i class="fas fa-user"></i>
                            <input type="text" placeholder="Username" class="form-outline" name="username" required/>
                        </div>
                        <div class="input-field">
                            <i class="fas fa-lock"></i>
                            <input type="password" placeholder="Password" name="password" required/>
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

                        <input type="submit" value="Login" class="btn solid" name="signIn"/>
                        <br><br>
                    </form>

                    <form action="Classes/reglog.php" class="sign-up-form needs-validation" method="POST">
                        <img src="img/logo3.png" alt="logo" style="height:60px;"><br><br>
                        <h2 class="title">Sign up</h2>
                        <div class="input-field">
                            <i class="fas fa-user"></i>
                            <input type="text" placeholder="Username" name="username" required/>
                        </div>
                        <div class="input-field">
                            <i class="fas fa-envelope"></i>
                            <input type="email" placeholder="Email" name="email" required />
                        </div>
                        <div class="input-field">
                            <i class="fas fa-lock"></i>
                            <input type="password" placeholder="Password" name="pWord" id="pWord" required/>
                        </div>
                        <div class="input-field">
                            <i class="fas fa-lock"></i>
                            <input type="password" placeholder="Re-enter Password" name="pWord2" id="pWord2" required/>
                        </div>

                        <p id="password-error" style="color: red;"></p>
                        <script>
                            const passwordInput = document.getElementById("pWord");
                            const passwordError = document.getElementById("password-error");


                            passwordInput.addEventListener("input", function () {
                                const password = passwordInput.value;

                                const hasLowerCase = /[a-z]/.test(password);
                                const hasUpperCase = /[A-Z]/.test(password);
                                const hasDigit = /\d/.test(password);
                                const hasSpecialChar = /[!@#$%^&*()_+{}\[\]:;<>,.?~\-]/.test(password);
                                const isLengthValid = password.length >= 8 && password.length <= 20;

                                if (!isLengthValid) {
                                    passwordError.textContent = "Password must be between 8 and 20 characters.";
                                } else if (!hasLowerCase) {
                                    passwordError.textContent = "Password must contain at least one lowercase letter.";
                                } else if (!hasUpperCase) {
                                    passwordError.textContent = "Password must contain at least one uppercase letter.";
                                } else if (!hasDigit) {
                                    passwordError.textContent = "Password must contain at least one digit.";
                                } else if (!hasSpecialChar) {
                                    passwordError.textContent = "Password must contain at least one special character.";
                                } else {
                                    passwordError.textContent = "";
                                }

                                const reenteredPasswordInput = document.getElementById("pWord2");

                                function checkPasswordMatch() {
                                    const password = passwordInput.value;
                                    const reenteredPassword = reenteredPasswordInput.value;

                                    if (password === reenteredPassword) {
                                        passwordError.textContent = "";
                                    } else {
                                        passwordError.textContent = "Passwords do not match.";
                                    }
                                }
//
                                reenteredPasswordInput.addEventListener("input", checkPasswordMatch);

                                const signupButton = document.getElementById("signup-button");

                                // Function to check and disable the button
                                function checkAndDisableButton() {
                                    if (passwordError.textContent.trim() !== "") {
                                        signupButton.disabled = true;
                                    } else if (passwordError.textContent.trim() === "") {
                                        signupButton.disabled = false;
                                    }
                                }

                                // Call the function initially and whenever the content of passwordError changes
                                checkAndDisableButton();
                                passwordError.addEventListener("input", checkAndDisableButton);

                            });</script>
                        <input type="submit" value="Register" class="btn solid" name="signUp" id="signup-button"/>

                        <br><br>
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
        <script>
            document.addEventListener("DOMContentLoaded", function () {
                const container = document.querySelector(".container");
                const urlParams = new URLSearchParams(window.location.search);
                const mode = urlParams.get("mode");

                if (mode === "signup") {
                    container.classList.add("sign-up-mode");
                }
            });
        </script>
        <script src="js/reglog.js"></script>
        <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>

    </body>
</html>
