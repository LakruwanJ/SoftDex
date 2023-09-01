<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../css/createAccount.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.2/css/bootstrap.min.css" />
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet" />
        <script src="https://kit.fontawesome.com/b0ede3d087.js" crossorigin="anonymous"></script>
        
         <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">

        <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
        
        <script src="../JS/CreateAccount.js"></script>
    </head>
    <body>
        <div class="header">
            <h1>Welcome to SoftDex!  </h1>
        </div>

        <div class="container">
            <form action="CreateAccountProcess.php" method="post">
                <div class="row">
                    <div class="left-side">

                        <img src="../img/createProfile/registration-form.jpg" alt="" class="img-fluid mb-3 d-none d-md-block">
                        <br>
                        <h1>Create Account</h1>

                        <div class="container">
                            <div class="form-group">
                                
                                <label>
                                    <input type="radio" name="category" value="user" onclick="toggleFields()" checked> User
                                </label>
                              
                                <label>
                                    <input type="radio" name="category" value="developer" onclick="toggleFields()" > Developer
                                </label>


                            </div>
                        </div>
                    </div>

                    <div class="right-side">



                        <div id="userFields" ><br>
                            <h2>Create your Profile</h2>

                              <div class="form-group">
                           
                                  <input type="hidden" name="user"  id="hiddenuser">

                        </div>

                            <!--First Name-->
                            <div class="form-group">
                                <div class="row">
                                    <div class="input-group col-lg-6 mb-4">
                                        <label for="firstname">First Name</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text bg-white px-4 border-md border-right-0">
                                                    <i class="fa fa-user text-muted"></i>
                                                </span>
                                            </div>
                                            <input id="firstName" type="text" name="firstname" placeholder="First Name" class="form-control bg-white border-left-0 border-md" oninput="validateName('firstName')">
                                            <p id="firstNameError" style="color: red;"></p>
                                        </div>
                                    </div>

                                    <!--Last Name-->
                                    <div class="input-group col-lg-6 mb-4">
                                        <label for="lastname">Last Name</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text bg-white px-4 border-md border-right-0">
                                                    <i class="fa fa-user text-muted"></i>
                                                </span>
                                            </div>
                                            <input id="lastName" type="text" name="lastname" placeholder="Last Name" class="form-control bg-white border-left-0 border-md" oninput="validateName('lastName')">
                                            <p id="lastNameError" style="color: red;"></p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--Email-->
                            <div class="form-group">
                                <div class="row">
                                    <div class="input-group col-lg-12 mb-4">
                                        <label for="email">Email</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text bg-white px-4 border-md border-right-0">
                                                    <i class="fa fa-envelope text-muted"></i>
                                                </span>
                                            </div>
                                            <input id="email" type="email" name="email" placeholder="Email Address" class="form-control bg-white border-left-0 border-md">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--password-->
                            <div class="form-group">
                                <div class="row">
                                    <div class="input-group col-lg-6 mb-4">
                                        <label for="password">Password</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text bg-white px-4 border-md border-right-0">
                                                    <i class="fa fa-lock text-muted"></i>
                                                </span>
                                            </div>
                                            <input id="password" type="password" name="password" placeholder="Password" class="form-control bg-white border-left-0 border-md">
                                        </div>
                                    </div>

                                    <!-- Password Confirmation-->
                                    <div class="input-group col-lg-6 mb-4">
                                        <label for="confirmpassword">Confirm Password</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text bg-white px-4 border-md border-right-0">
                                                    <i class="fa fa-lock text-muted"></i>
                                                </span>
                                            </div>
                                            <input id="passwordConfirmation" type="password" name="passwordConfirmation" placeholder="Confirm Password" class="form-control bg-white border-left-0 border-md">
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <!-- country -->
                            <div class="form-group">
                                <div class="row">

                                    <div class="input-group col-lg-12 mb-4">
                                        <label for="country">Country</label> 
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text bg-white px-4 border-md border-right-0">
                                                    <i class="fa fa-flag text-muted"></i>
                                                </span>
                                            </div>
                                            <select id="country" name="country" style="max-width: 300px" class="custom-select form-control bg-white border-left-0 border-md h-100 font-weight-bold text-muted">
                                                <option value="">Sri Lanka</option>
                                                <option value="">America</option>
                                                <option value="">Austraila</option>
                                                <option value="">Bangladesh</option>
                                                <option value="">Brazil</option>          
                                                <option value="">Canada</option>
                                                <option value="">China</option>
                                                <option value="">Denmark</option>
                                                <option value="">France</option>
                                                <option value="">Germany</option>
                                                <option value="">India</option>
                                                <option value="">Iraq</option>
                                                <option value="">Canada</option>
                                                <option value="">Nepal</option>
                                                <option value="">America</option>
                                                <option value="">Japan</option>
                                                <option value="">India</option>
                                                <option value="">Austraila</option>
                                                <option value="">Vietnam</option>

                                            </select>
                                        </div> 
                                    </div>
                                </div>
                            </div>


                            <!--Add a profile pic
                            <div class="form-group">
                                <label for="profilepic">Profile Picture</label>
                                <input type="file" id="profilepic" name="profilepic" class="form-control-file">
                            </div>-->
                        </div>



                        <div id="developerFields" style="display: none;">
                            <h2>Update your profile as a developer</h2>


                            <!--First Name-->
                            <div class="form-group">
                                <div class="row">
                                    <div class="input-group col-lg-6 mb-4">
                                        <label for="firstname">First Name</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text bg-white px-4 border-md border-right-0">
                                                    <i class="fa fa-user text-muted"></i>
                                                </span>
                                            </div>
                                            <input id="firstName" type="text" name="firstname" placeholder="First Name" class="form-control bg-white border-left-0 border-md" oninput="validateName('firstName')">
                                            <p id="firstNameError" style="color: red;"></p>
                                        </div>
                                    </div>

                                    <!--Last Name-->
                                    <div class="input-group col-lg-6 mb-4">
                                        <label for="lastname">Last Name</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text bg-white px-4 border-md border-right-0">
                                                    <i class="fa fa-user text-muted"></i>
                                                </span>
                                            </div>
                                            <input id="lastName" type="text" name="lastname" placeholder="Last Name" class="form-control bg-white border-left-0 border-md" oninput="validateName('lastName')">
                                            <p id="lastNameError" style="color: red;"></p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--Email-->
                            <div class="form-group">
                                <div class="row">
                                    <div class="input-group col-lg-12 mb-4">
                                        <label for="email">Email</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text bg-white px-4 border-md border-right-0">
                                                    <i class="fa fa-envelope text-muted"></i>
                                                </span>
                                            </div>
                                            <input id="email" type="email" name="email" placeholder="Email Address" class="form-control bg-white border-left-0 border-md">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--password-->
                            <div class="form-group">
                                <div class="row">
                                    <div class="input-group col-lg-6 mb-4">
                                        <label for="password">Password</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text bg-white px-4 border-md border-right-0">
                                                    <i class="fa fa-lock text-muted"></i>
                                                </span>
                                            </div>
                                            <input id="password" type="password" name="password" placeholder="Password" class="form-control bg-white border-left-0 border-md">
                                        </div>
                                    </div>

                                    <!-- Password Confirmation-->
                                    <div class="input-group col-lg-6 mb-4">
                                        <label for="confirmpassword">Confirm Password</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text bg-white px-4 border-md border-right-0">
                                                    <i class="fa fa-lock text-muted"></i>
                                                </span>
                                            </div>
                                            <input id="passwordConfirmation" type="password" name="passwordConfirmation" placeholder="Confirm Password" class="form-control bg-white border-left-0 border-md">
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <!-- country -->
                            <div class="form-group">
                                <div class="row">

                                    <div class="input-group col-lg-12 mb-4">
                                        <label for="country">Country</label> 
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text bg-white px-4 border-md border-right-0">
                                                    <i class="fa fa-flag text-muted"></i>
                                                </span>
                                            </div>
                                            <select id="country" name="country" style="max-width: 300px" class="custom-select form-control bg-white border-left-0 border-md h-100 font-weight-bold text-muted">
                                                <option value="">Sri Lanka</option>
                                                <option value="">America</option>
                                                <option value="">Austraila</option>
                                                <option value="">Bangladesh</option>
                                                <option value="">Brazil</option>          
                                                <option value="">Canada</option>
                                                <option value="">China</option>
                                                <option value="">Denmark</option>
                                                <option value="">France</option>
                                                <option value="">Germany</option>
                                                <option value="">India</option>
                                                <option value="">Iraq</option>
                                                <option value="">Canada</option>
                                                <option value="">Nepal</option>
                                                <option value="">America</option>
                                                <option value="">Japan</option>
                                                <option value="">India</option>
                                                <option value="">Austraila</option>
                                                <option value="">Vietnam</option>

                                            </select>
                                        </div> 
                                    </div>
                                </div>
                            </div>

                          

                            <!--Skills/Expertise-->
                            <div class="form-group">
                            <label for="skills">Skills/Expertise</label>
                            <div id="editor-container" name="skills" ></div>
                            <input type="hidden" name="skills" id="hiddenskills">
                            
                        </div>

                            <!--Experience-->
                           <div class="form-group">
                            <label for="experience">Experience</label>
                            <div id="editor-container1" name="experience" ></div>
                            <input type="hidden" name="experience" id="hiddenexperience">
                            
                        </div>

                            <!--Add a profile pic
                            <div class="form-group">
                                <label for="profilepic">Profile Picture</label>
                                <input type="file" id="profilepic" name="profilepic" class="form-control-file">
                            </div>-->



                        </div>


                        <br>
                        <div class="form-group text-center">
                            <div class="d-flex justify-content-center">
                                <button type="submit" id="createAccountBtn" class="btn btn-primary w-50">Create Account</button>
                            </div>
                        </div>







                    </div>


                </div>
            </form>
        </div>




        <script>
            function validateName(fieldName) {
                const input = document.getElementById(fieldName);
                const error = document.getElementById(`${fieldName}Error`);
                const namePattern = /^[A-Za-z]+$/;

                if (!namePattern.test(input.value)) {
                    error.textContent = 'Please enter a valid name with only letters.';
                } else {
                    error.textContent = '';
                }
            }
        </script>

        <script>
    var quillSkill = new Quill('#editor-container', {
        theme: 'snow'
    });

    var quillExperience = new Quill('#editor-container1', {
        theme: 'snow'
    });

    document.querySelector('form').addEventListener('submit', function () {
        var skillContent = quillSkill.root.innerHTML;
        var experienceContent = quillExperience.root.innerHTML;

        document.getElementById("hiddenskills").value = skillContent;
        document.getElementById("hiddenexperience").value = experienceContent;
    });
</script>

    </body>
</html>

