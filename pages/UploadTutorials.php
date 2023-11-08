
<!DOCTYPE html>
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

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@yaireo/tagify@4.3.1/dist/tagify.css">
        <script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify@4.3.1/dist/tagify.min.js"></script>

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


            <form action="../Process/UploadTutorialsProcess.php" method="post" enctype="multipart/form-data">

                <div class="row">

                    <div class="col-md-4">

                        <!--  upload sections -->
                        <br>
                        <img src="../img/UploadTutorials/tuteform.jpg" alt="" class="img-fluid mb-3 d-none d-md-block">
                        <br>

                        <!-- Upload Tutorials -->
                        <div class="section1">

                            <div class="form-group">
                                <label for="uploadtutorials">Upload Tutorials</label>
                                <input type="file" name="uploadtutorials" id="uploadtutorials" required>
                            </div>
                        </div>


                    </div>

                    <div class="col-md-8">
                        <br>
                        <h3 style="text-align: center; color: darkslateblue"><b> Upload Your Tutorials Here! </b></h3>
                        <br>


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
                        <div class="form-group">
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
                        </div>



                        <!--category-->
                        <div class="form-group">
                            <div class="row">

                                <div class="col-lg-6 mb-4">
                                    <label for="category">Category</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                                <i class="fa fa-list-check text-muted"></i>
                                            </span>
                                        </div>
                                        <select id="category" name="category" style="max-width: 670px" class="custom-select form-control bg-white border-left-0 border-md h-100 font-weight-bold text-muted">
                                            <option value="Web Browser">Web Browser</option>
                                            <option value="Media Players and Editors">Media Players and Editors</option>
                                            <option value="Operating System">Operating System</option>
                                            <option value="Productivity Software">Productivity Software</option>
                                            <option value="Graphic Design and Editing">Graphic Design and Editing</option>
                                            <option value="Video Editing Software">Video Editing Software</option>
                                            <option value="Antivirus and Security Software">Antivirus and Security Software</option>
                                            <option value="Web Development and Design Tools">Web Development and Design Tools</option>
                                            <option value="Communication and Collaboration Tools">Communication and Collaboration Tools</option>
                                            <option value="File Compression and Archiving">File Compression and Archiving</option>
                                            <option value="Utility Software">Utility Software</option>
                                            <option value="Virtualization Software">Virtualization Software</option>
                                            <option value="Gaming Software">Gaming Software</option>
                                            <option value="Education and Learning Software">Education and Learning Software</option>
                                            <option value="Financial and Accounting Software">Financial and Accounting Software</option>
                                            <option value="Programming Tools">Programming Tools</option>
                                            <option value="File Sharing and Cloud Storage">File Sharing and Cloud Storage</option>
                                            <option value="Entertainment and Content Creation">Entertainment and Content Creation</option>
                                        </select>
                                    </div>  
                                </div>

                                <div class="col-lg-6 mb-4">
                                    <label for="language">Language</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                                <i class="fa fa-language text-muted"></i>
                                            </span>
                                        </div>
                                        <select id="language" name="language" style="max-width: 300px" class="custom-select form-control bg-white border-left-0 border-md h-100 font-weight-bold text-muted">
                                            <option value="English">English</option>
                                            <option value="Russian">Russian</option>
                                            <option value="Japanese">Japanese</option>
                                            <option value="Arabic">Arabic</option>
                                        </select>
                                    </div>
                                </div>


                            </div>
                        </div>



                        <!--short description-->
                        <div class="form-group">
                            <label for="shortDescription">Short Description</label>
                            <textarea id="shortDescription" name="shortDescription" placeholder="Add a short description here" class="form-control" required></textarea>
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