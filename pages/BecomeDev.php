<!DOCTYPE html>
<?php
require '../Classes/Select.php';

use Classes\Select;

$select = new \Classes\Select();

$fname = null;
$lname = null;
$email = null;
$country = null;
$shortdes = null;
$education = null;
$languages = null;
$prolang = null;
$experience = null;
$description = null;
$did = null;

session_start();
if (isset($_SESSION["user"])) {
    $user = $_SESSION["user"];

    foreach ($select->selectDeveloper($user) as $u) {
        $did = $u->Did;
        $uname = $u->username;
        $fname = $u->fname;
        $lname = $u->lname;
        $email = $u->email;
        $country = $u->country;
        $shortdes = $u->shortdes;
        $education = $u->education;
        $languages = $u->languages;
        $prolang = $u->prolang;
        $experience = $u->experience;
        $description = $u->description;
    }
    
    foreach ($select->selectUser($user) as $u) {
        $uid = $u->Uid;
        $uname = $u->username;
        $fname = $u->fname;
        $lname = $u->lname;
        $email = $u->email;
        $country = $u->country;
    }
} else {
    header("Location: ../index.php");
}
?>
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

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@yaireo/tagify@4.3.1/dist/tagify.css">
        <script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify@4.3.1/dist/tagify.min.js"></script>

        <script src="../JS/CreateAccount.js"></script>
    </head>
    <body>
        <div class="header">
            <h1>Welcome to SoftDex!  </h1>
        </div>

        <div class="container">
            <br>
            <?php
            if (isset($_GET['m'])) {
                if ($_GET['m'] === "2") {
                    ?>
                    <div class="alert alert-danger " role="alert">Something went wrong. Try again</div>
                    <?php
                } else if ($_GET['m'] === "1") {
                    ?>
                    <div class="alert alert-success " role="alert">Sucessfully saved your data!</div>
                    <?php
                }
            }
            ?>
            <br>
        </div>

        <div class="container">
            <form action="../Process/BecomeDevProcess.php" class="needs-validation" method="post">
                <div class="row">
                    <div class="left-side">

                        <img src="../img/createProfile/registration-form.jpg" alt="" class="img-fluid mb-3 d-none d-md-block">
                        <br>
                        <h1>Update Your Account as a Developer </h1>



                        <div class="container">
                            <div class="form-group">

                            </div>
                        </div>
                    </div>

                    <div class="right-side">

                        <div id="developerFields" ><br>

                            <!--First Name-->
                            <div class="form-group">
                                <div class="row">
                                    <div class="input-group col-lg-6 mb-2">
                                        <label for="firstname">First Name</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text bg-white px-4 border-md border-right-0">
                                                    <i class="fa fa-user text-muted"></i>
                                                </span>
                                            </div>
                                            <input id="firstName" type="text" name="firstname" placeholder="First Name" value="<?php echo $fname; ?>" class="form-control bg-white border-left-0 border-md" oninput="validateName('firstName')" >

                                        </div>

                                    </div>
                                    <!--Last Name-->
                                    <div class="input-group col-lg-6 mb-2">
                                        <label for="lastname">Last Name</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text bg-white px-4 border-md border-right-0">
                                                    <i class="fa fa-user text-muted"></i>
                                                </span>
                                            </div>
                                            <input id="lastName" type="text" name="lastname" placeholder="Last Name" value="<?php echo $lname; ?>" class="form-control bg-white border-left-0 border-md" oninput="validateName('lastName')" >

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="input-group col-lg-6">
                                        <p id="firstNameError" style="color: red;"></p> 

                                    </div>
                                    <!--Last Name-->
                                    <div class="input-group col-lg-6">
                                        <p id="lastNameError" style="color: red;"></p>
                                    </div>
                                </div>
                            </div>


                            <!--username-->
                            <div class="form-group">
                                <div class="row">
                                    <div class="input-group col-lg-6 mb-4">
                                        <label for="firstname">Username</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text bg-white px-4 border-md border-right-0">
                                                    <i class="fa fa-user text-muted"></i>
                                                </span>
                                            </div>
                                            <input id="firstName" type="text" name="user" value="<?php echo $user; ?>" class="form-control bg-white border-left-0 border-md" disabled>
                                            <p id="firstNameError" style="color: red;"></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="user" value="<?php echo $uname; ?>">
                            <input type="hidden" name="uid" value="<?php echo $uid; ?>">
                            <input type="hidden" name="did" value="<?php echo $did; ?>">

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
                                            <input id="email" type="email" name="email" value="<?php echo $email; ?>" placeholder="Email Address" class="form-control bg-white border-left-0 border-md" >
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--                            password
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
                            
                                                                 Password Confirmation
                                                                <div class="input-group col-lg-6 mb-4">
                                                                    <label for="confirmpassword">Confirm Password</label>
                                                                    <div class="input-group">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                                                                <i class="fa fa-lock text-muted"></i>
                                                                            </span>
                                                                        </div>
                                                                        <input id="passwordConfirmation" type="password" name="passwordConfirmation" placeholder="Confirm Password" class="form-control bg-white border-left-0 border-md" >
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>-->

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
                                                <option value="Sri Lanka">Sri Lanka</option>
                                                <option value="Americ">America</option>
                                                <option value="Austraila">Austraila</option>
                                                <option value="Bangladesh">Bangladesh</option>
                                                <option value="Brazil">Brazil</option>          
                                                <option value="Canada">Canada</option>
                                                <option value="China">China</option>
                                                <option value="Denmark">Denmark</option>
                                                <option value="France">France</option>
                                                <option value="Germany">Germany</option>
                                                <option value="India">India</option>
                                                <option value="Iraq">Iraq</option>
                                                <option value="Canada">Canada</option>
                                                <option value="Nepal">Nepal</option>
                                                <option value="America">America</option>
                                                <option value="Japan">Japan</option>
                                                <option value="India">India</option>
                                                <option value="Austraila">Austraila</option>
                                                <option value="Vietnam">Vietnam</option>
                                                <option value="<?php echo $country; ?>" selected><?php echo $country; ?></option>

                                            </select>
                                        </div> 
                                    </div>
                                </div>
                            </div>

                            <!--languages-->
                            <div class="form-group">
                                <div class="row">

                                    <div class="col-lg-12 mb-4">
                                        <label for="tags">Languages (Type and Press enter or add a comma after each languages) </label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text bg-white px-4 border-md border-right-0">
                                                    <i class="fa fa-tag text-muted"></i>
                                                </span>
                                            </div>
                                            <input name="lang" id="lang" placeholder="Languages" value="<?php echo $languages; ?>" class="form-control" >
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <!--programming Languages-->
                            <div class="form-group">
                                <div class="row">

                                    <div class="col-lg-12 mb-4">
                                        <label for="tags"> Programming Languages (Type and Press enter or add a comma after each programming languages) </label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text bg-white px-4 border-md border-right-0">
                                                    <i class="fa fa-tag text-muted"></i>
                                                </span>
                                            </div>
                                            <input name="prolang" id="prolang" placeholder="Programing Languages" value="<?php echo $prolang; ?>" class="form-control" >
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <!--ShortDescription-->
                            <div class="form-group">
                                <label for="shortDescription">Short Description</label>
                                <textarea id="shortDescription" name="shortDescription" placeholder="Add a short description here" value="<?php echo $shortdes; ?>" class="form-control"></textarea>
                            </div>

                            <!--Education-->
                            <div class="form-group">
                                <label for="education">Education</label>
                                <div id="editor-container" name="education" ></div>
                                <input type="hidden" name="education" value="aaa" id="hiddenskills">

                            </div>

                            <!--Experience-->
                            <div class="form-group">
                                <label for="experience">Experience</label>
                                <div id="editor-container1" name="experience" ></div>
                                <input type="hidden" name="experience" id="hiddenexperience">

                            </div>

                            <!--Description-->
                            <div class="form-group">
                                <label for="Description">Description</label>
                                <div id="editor-container2" ></div>
                                <input type="hidden" name="Description" id="hiddenDescription">

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
                                <?php if ($shortdes === null) { ?>
                                    <button type="submit" id="createAccountBtn" class="btn btn-primary w-50" name="BecomeaDeveloper">Become a Developer</button>
                                <?php } else {
                                    ?>
                                    <button type="submit" id="createAccountBtn" class="btn btn-primary w-50" name="BecomeaDeveloper">Edit Profile</button>
                                    <?php
                                }
                                ?>
                            </div>
                        </div>



                    </div>


                </div>
            </form>
        </div>





        <script>
            new Tagify(document.querySelector('input[name=lang]'), {
            });
        </script>

        <script>
            new Tagify(document.querySelector('input[name=prolang]'), {
            });
        </script>


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
            var defaultContent = [
                {insert: '<?php echo $prolang; ?>'}
            ];

            var quillSkill = new Quill('#editor-container', {
                theme: 'snow'
            });

            var quillExperience = new Quill('#editor-container1', {
                theme: 'snow'
            });
            var quillDescription = new Quill('#editor-container2', {
                theme: 'snow'
            });
            quillDescription.setContents(defaultContent);

            document.querySelector('form').addEventListener('submit', function () {
                var skillContent = quillSkill.root.innerHTML;
                var experienceContent = quillExperience.root.innerHTML;
                var descriptionContent = quillDescription.root.innerHTML;

                document.getElementById("hiddenskills").value = skillContent;
                document.getElementById("hiddenexperience").value = experienceContent;
                document.getElementById("hiddenDescription").value = descriptionContent;
            });
        </script>

    </body>
</html>

