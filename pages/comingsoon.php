<?php
$message = null;
if (isset($_GET['error'])) {
    if ($_GET['error'] == 1) {
        $message = "<h6 class='text-danger'>Please submit form through post method</h6>";
    } else if ($_GET['error'] == 2) {
        $message = "<h6 class='text-danger'>Please submit the form through the submit button</h6>";
    } else if ($_GET['error'] == 3) {
        $message = "<h6 class='text-danger'>Please fill all feilds</h6>";
    }
}
?>


<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="../css/comingsoon.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.2/css/bootstrap.min.css" />
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet" />
<link rel="stylesheet" href="path/to/bootstrap.min.css">
<script src="https://kit.fontawesome.com/b0ede3d087.js" crossorigin="anonymous"></script>

</head>


<body>


<div class="container">

   <form action="comingswregister.php" method="post" enctype="multipart/form-data">


        <div class="row">

            



            <div class="col-md-12">
                <br>
                <h3 style="text-align: center; color: darkslateblue"><b>  Submit your upcoming software details here! </b></h3>
                <br>




                <!--Developer Name-->
                    

                <div class="form-group">
                    <div class="row">
                     
                        <div class="col-lg-12 mb-4">
                             <?= $message ?>
                            <label for="title">Developer Name</label> 
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-white px-4 border-md border-right-0">
                                        <i class="fa fa-user text-muted"></i>
                                    </span>
                                </div>

                                <input id="namedevelpoer" type="text" name="devname" placeholder=" Developer Name" class="form-control bg-white border-left-0 border-md" required>
                            </div>
                        </div>
                    </div>
                </div>



               


                <!--Name of the Software-->
                <div class="form-group">
                    <div class="row">

                        <div class="col-lg-6 mb-4">
                            <label for="nameofsoftware">Name of the Software</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-white px-4 border-md border-right-0">
                                        <i class="fa fa-cogs text-muted"></i>

                                    </span>
                                </div>
                                <input type="text" class="form-control" id="nameofsoftware" name="swname" placeholder=" Name of the Software"value="">
                            </div>  
                        </div>

                        <div class="col-lg-6 mb-4">
                            <label for="language">Category </label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-white px-4 border-md border-right-0">
                                        <i class="fa fa-folder text-muted"></i>

                                    </span>
                                </div>
                                <input type="text" class="form-control" id="namedevelpoer" name="category"  placeholder="Social media / Education / Multimedia"value="">
                            </div>
                        </div>


                    </div>
                </div>

      

                <!--Details about software-->


               <div class="form-group">
                <div class="row">
                    <div class="col-lg-12 mb-4">
                        <label for="detailsoftware">Details about software</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-white px-4 border-md border-right-0">
                                    <i class="fa fa-book text-muted"></i>
                                </span>
                            </div>

                            <input type="text" class="form-control" id="detailsoftware"  name="details"  placeholder="Details about software"value="">
                        </div>
                    </div>
                </div>
            </div>

               
               <!--Date of launch-->


               <div class="form-group">
                <div class="row">
                    <div class="col-lg-12 mb-4">
                        <label for="launchdate">Date of launch</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-white px-4 border-md border-right-0">
                                    <i class="fa fa-calendar text-muted"></i>

                                </span>
                            </div>

                            <input type="datetime-local" class="form-control" id="launchdate" name="dateofrelease" value="">
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



</body>
</html>