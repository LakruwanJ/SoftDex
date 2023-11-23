
<!DOCTYPE html>

<?php

/*require '../Classes/Select.php';

use Classes\Select;

$id = null;
$slct = new Select();
$slct->selectSw($id); */

session_start();
if (isset($_SESSION["user"])) {
    $user = $_SESSION["user"];


?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="../css/AddSoftware.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.2/css/bootstrap.min.css" />
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet" />
        <link rel="stylesheet" href="path/to/bootstrap.min.css">
        <script src="https://kit.fontawesome.com/b0ede3d087.js" crossorigin="anonymous"></script>

       
        <script src="../JS/Addsoftware.js"></script>


    </head>


    <body>
        <!-- Display error message based on error code -->
        <?php
        if (isset($_GET["error"])) {

            if ($_GET["error"] == 0) {
                echo "<p style='color:red; text-align:center;'> Please Try Again!</p>";
            } elseif ($_GET["error"] == 1) {
                echo "<p style='color:red; text-align:center;'> Please Click Submit Button</p>";
            } elseif ($_GET["error"] == 2) {
                echo "<p style='color:red; text-align:center;'> Please fill all the fields</p>";
            }
        }
        ?>

        <div class="container">


            <form id="myForm" action="../Process/UploadTutorialsProcess.php" method="post" enctype="multipart/form-data">

                <div class="row">

                    <div class="col-md-4">

                        <!--  upload sections -->
                        <br>
                        <img src="../img/UploadTutorials/tuteform.jpg" alt="" class="img-fluid mb-3 d-none d-md-block">
                        <br>
                        
                          <!-- Upload Background image -->
                        <div class="section1">

                            <div class="form-group">
                                <label for="backimg">Background Image</label>
                                <input type="file" name="backimg" id="backimg" required >
                            </div>
                        </div>

                        <!-- Upload Tutorials -->
                        <div class="section1">

                            <div class="form-group">
                                <label for="uploadtutorials">Upload Tutorials</label>
                                <input type="file" name="uploadtutorials" id="uploadtutorials" required >
                            </div>
                        </div>


                    </div>

                    <div class="col-md-8">
                        <br>
                        <h3 style="text-align: center; color: darkslateblue"><b> Upload Your Tutorials Here! </b></h3>
                        <br>


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
                         
                         <!--Software ID-->
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-12 mb-4">
                                    <label for="SoftwareName">Software Name</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                                <i class="fa fa-book text-muted"></i>
                                            </span>
                                        </div>
                                        <!--<option value='?php $slct->selectSw($id) ?>">?php $slct->selectSw($id) ?></option>-->
                                        <select id="SoftwareName" name="SoftwareName" style="max-width: 300px" class="custom-select form-control bg-white border-left-0 border-md h-100 font-weight-bold text-muted" required>
                                            <option value="">Choose the Software</option>
                                            <option value="Chrome">Chrome</option>
                                        <option value="Google Class Room">Google Class Room</option>
                                        <option value="Capcut">Capcut</option>
                                        <option value="Mozilla Firefox">Mozilla Firefox</option>
                                          <option value="Microsoft Word">Microsoft Word</option>
                                        <option value="iTunes">iTunes</option>
                                        <option value="KMPlayer">KMPlayer</option>
                                        <option value="Visual Studio Code">Visual Studio Code</option>
                                        <option value="Netflix">Netflix</option>
                                        <option value="VinMate">VinMate</option>
                                        <option value="iTunes">iTunes</option>
                                        <option value="KMPlayer">KMPlayer</option>
                                        <option value="Code::Blocks">Code::Blocks</option>
                                        <option value="uTorrent">uTorrent</option>
                                        <option value="minitabt">Minitab</option>
                                        <option value="lightroom">Adobe Lightroom</option>
                                        <option value="netbeans">Netbeans</option>
                                        <option value="netbeans">Avast Antivirus</option>
                                       
                                        

                                        </select>
                                       
                                       <!-- <input id="SoftwareName" type="text" name="SoftwareName" placeholder=" Software Name" class="form-control bg-white border-left-0 border-md" required>-->
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--Tutorial Title-->
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-12 mb-4">
                                    <label for="title">Title</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                                <i class="fa fa-book text-muted"></i>
                                            </span>
                                        </div>

                                        <input id="title" type="text" name="title" placeholder=" Title" class="form-control bg-white border-left-0 border-md" required>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--Author-->
                        <!--<div class="form-group">
                            <div class="row">
                                <div class="col-lg-12 mb-4">
                                    <label for="author">Author</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                                <i class="fa fa-user text-muted"></i>
                                            </span>
                                        </div>

                                        <input id="author" type="text" name="author" placeholder=" Author" class="form-control bg-white border-left-0 border-md" required>
                                    </div>
                                </div>
                            </div>
                        </div>-->





                        <!--short description-->
                        <div class="form-group">
                            <label for="shortDescription">Description</label>
                            <textarea id="shortDescription" name="shortDescription" placeholder="Add a short description here" class="form-control" required></textarea>
                        </div>

                        <br>
                        <br>
                        <br>
                        <br>
                        <!--Submit button-->
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary w-50" name="submit">Submit</button>
                        </div>


                    </div>

                </div>


            </form>
        </div>

        <br>
        <br>
 <script>
            document.getElementById('myForm').addEventListener('submit', function (event) {
                var SoftwareName = document.getElementById('SoftwareName');

                if (SoftwareName.value === '') {
                    alert('Please select an option.');
                    event.preventDefault();
                }
            });
        </script>
    </body>
</html>
<?php
}
 
?>