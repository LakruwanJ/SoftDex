<!DOCTYPE html>
<?php
require '../Classes/customizedsoftware.php';

use Classes\cusomizedsw;

session_start();
if (isset($_SESSION["user"])) {
    $user = $_SESSION["user"];
} else {
    header("Location: ../index.php");
}
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

        <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">

        <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

        <script src="../JS/Addsoftware.js"></script>



    </head>


    <body>


        <div class="container">
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
            } elseif (isset($_GET["success"])) {
                if ($_GET["success"] == 0) {
                    echo "<p style='color:green; text-align:center;'> Successfully sent your request!</p>";
                }
            }
            ?>

            <form id="myForm"action="../Process/customizedSwProcess.php" method="post" enctype="multipart/form-data">

                <div class="row">

                    <div class="col-md-4">

                        <!--  upload sections -->
                        <br>
                        <img src="../img/customizedSW/customizeSW.gif" alt="" class="img-fluid mb-3 d-none d-md-block">
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>

                        <!-- Upload Documents -->
                        <div class="section1">

                            <div class="form-group">
                                <label for="customizezSwForm">If you have any document, Upload here</label>
                                <input type="file" name="customizedSwDoc" id="customizezSwForm" >
                            </div>
                        </div>


                    </div>

                    <div class="col-md-8">
                        <br>
                        <h3 style="text-align: center; color: darkslateblue"><b> Request Your Cutomized Software Here! </b></h3>
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

                        <!--Developer-->
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-12 mb-4">
                                    <label for="developer">Developer</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                                <i class="fa fa-user text-muted"></i>
                                            </span>
                                        </div>
                                        <select id="developer" name="developer" style="max-width: 300px" class="custom-select form-control bg-white border-left-0 border-md h-100 font-weight-bold text-muted" required>
                                            <option value="">Choose the developer</option>
                                            <option value="Rose">Rose</option>
                                            <option value="SulaK">SulaK</option>
                                            <option value="Christ">Christ</option>
                                            <option value="Jack">Jack</option>
                                            <option value="PGeo">PGeo</option>
                                            <option value="Carol">Carol</option>
                                            <option value="Lifranchi">Lifranchi</option>


                                        </select>

                                    </div>
                                </div>
                            </div>
                        </div>



                        <!--project Title-->
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-12 mb-4">
                                    <label for="title">Project Title</label>
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




                        <!--short description-->
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea id="description" name="description" placeholder="Description" class="form-control" required></textarea>
                        </div>


                        <!--Special requirements-->
                        <div class="form-group">
                            <label for="systemreq">Special Requirements</label>
                            <div id="editor-container" ></div>
                            <input type="hidden" name="specialReq" id="hiddenSystemReq" >

                        </div>

                             <!--project price-->
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-12 mb-4">
                                    <label for="Price">Budget Range</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                                <i class="fa fa-sack-dollar text-muted"></i>
                                            </span>
                                        </div>

                                        <input id="Price" type="text" name="Price" placeholder=" Budget Range" class="form-control bg-white border-left-0 border-md" required>
                                    </div>
                                </div>
                            </div>
                        </div>
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
            var quillSystemReq = new Quill('#editor-container', {
                theme: 'snow'
            });



            document.querySelector('form').addEventListener('submit', function () {
                var systemReqContent = quillSystemReq.root.innerHTML;


                document.getElementById("hiddenSystemReq").value = systemReqContent;

            });
        </script>

        <script>
            document.getElementById('myForm').addEventListener('submit', function (event) {
                var developer = document.getElementById('developer');

                if (developer.value === '') {
                    alert('Please select an option.');
                    event.preventDefault();
                }
            });
        </script>
    </body>
</html>