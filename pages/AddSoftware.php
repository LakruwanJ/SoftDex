
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
        
        
        <div class="header">
            <h2> Unleash the Brilliance of Your Software to the World! </h2>
        </div>
        
                <!-- Display error message based on error code -->
            
        <?php
if(isset($_GET['error'])){
    if($_GET['error'] == 1){
        echo  "<p style='color:red; text-align:center;'> Please fill all the fields</p>";
    } 
}
?>
        
        
        <div class="container">
            
    
         
            
        <form action="AddSoftwareProcess.php" method="post">
            
                <div class="row">

                    <div class="col-md-4">
                        <!--  upload sections -->

                        <br>
                        <img src="../img/addsoftwareimg.avif" alt="" class="img-fluid mb-3 d-none d-md-block">
                        <br>



                        <!-- Software Logo -->
                        <div class="form-group">
                            <label for="softwareLogo">Software Logo</label>
                            <input type="file" name="softwareLogo" id="softwareLogo" accept="image/*">
                        </div>

                        <br>
                        <!--upload images-->
                        <div class="form-group">
                            <label for="softwareImage">Upload Images</label>
                            <input type="file" name="softwareImage[]" multiple class="form-control-file">
                        </div>

                        <br>

                        <!--upload videos-->
                        <div class="form-group">
                            <label for="video">Upload Video</label>
                            <input type="file" id="video" name="video" class="form-control-file">
                        </div>
                        <br>


                        <!--upload software-->
                        <div class="form-group">
                            <label for="software">Upload Software</label>
                            <input type="file" id="software" name="software" class="form-control-file">
                        </div>


                    </div>




                    <div class="col-md-8">



                        <!--software name-->
                        <div class="form-group">
                            <div class="row">

                                <!-- Software name -->

                                <div class="col-lg-12 mb-4">
                                    <label for="softwareName">Software Name</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                                <i class="fa fa-gears text-muted"></i>
                                            </span>
                                        </div>

                                        <input id="softwareName" type="text" name="softwareName" placeholder="Software Name" class="form-control bg-white border-left-0 border-md">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--software version-->
                        <div class="form-group">
                            <div class="row">

                                <div class="col-lg-6 mb-4">
                                    <label for="version">Version</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                                <i class="fa fa-code-compare text-muted"></i>
                                            </span>
                                        </div>
                                        <input id="version" type="text" name="version" placeholder="Version" class="form-control bg-white border-left-0 border-md">
                                    </div>
                                </div>

                                <!-- Platform -->
                                <div class="col-lg-6 mb-4">
                                    <label for="platform">Platform</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                                <i class="fa fa-laptop-code text-muted"></i>
                                            </span>
                                        </div>
                                        <select id="platform" name="platform" style="max-width: 300px" class="custom-select form-control bg-white border-left-0 border-md h-100 font-weight-bold text-muted">
                                            <option value="">Windows</option>
                                            <option value="paid">Linux</option>
                                            <option value="">Android</option>
                                            <option value="paid">Ubuntu</option>
                                            <option value="paid">MacOS</option>
                                            >
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--liecence-->
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-6 mb-4">
                                    <label for="license">License</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                                <i class="fa fa-file-code text-muted"></i>
                                            </span>
                                        </div>
                                        <select id="license" name="license" style="max-width: 300px" class="custom-select form-control bg-white border-left-0 border-md h-100 font-weight-bold text-muted">
                                            <option value="">Free</option>
                                            <option value="paid">Paid</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- Amount -->
                                <div id="amountContainer" class="col-lg-6 mb-4" style="display: none;">
                                    <label for="amount">Amount</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                                <i class="fa fa-sack-dollar text-muted"></i>
                                            </span>
                                        </div>
                                        <input id="amount" type="text" name="amount" placeholder="Amount" class="form-control bg-white border-left-0 border-md">
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
                                            <option value="">Web Browser</option>
                                            <option value="">Media Players and Editors</option>
                                            <option value="">Operating System</option>
                                            <option value="">Productivity Software</option>
                                            <option value="">Graphic Design and Editing</option>
                                            <option value="">Video Editing Software</option>
                                            <option value="">Antivirus and Security Software</option>
                                            <option value="">Web Development and Design Tools</option>
                                            <option value="">Communication and Collaboration Tools</option>
                                            <option value="">File Compression and Archiving</option>
                                            <option value="">Utility Software</option>
                                            <option value="">Virtualization Software</option>
                                            <option value="">Gaming Software</option>
                                            <option value="">Education and Learning Software</option>
                                            <option value="">Financial and Accounting Software</option>
                                            <option value="">Programming Tools</option>
                                            <option value="">File Sharing and Cloud Storage</option>
                                            <option value="">Entertainment and Content Creation</option>
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
                                            <option value="">English</option>
                                            <option value="paid">Russian</option>
                                            <option value="">Japanese</option>
                                            <option value="paid">Arabic</option>
                                            <option value="">Spanish</option>
                                            <option value="paid">German</option>
                                            <option value="">French</option>
                                            <option value="paid">Hindi</option>
                                        </select>
                                    </div>
                                </div>


                            </div>
                        </div>



                        <!--tags-->
                        <div class="form-group">
                            <div class="row">

                                <div class="col-lg-12 mb-4">
                                    <label for="tags">Tags  (Type and Press enter or add a comma after each tag) </label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                                <i class="fa fa-tag text-muted"></i>
                                            </span>
                                        </div>
                                        <input name="tags" id="tags" placeholder="Tags"  class="form-control" >
                                    </div>

                                </div>
                            </div>
                        </div>

                        <!--system requirements-->
                        <div class="form-group">
                            <label for="systemreq">System Requirements</label>
                            <div id="editor-container" ></div>
                            <input type="hidden" name="systemreq" id="hiddenSystemReq">

                        </div>

                        <!--short description-->
                        <div class="form-group">
                            <label for="shortDescription">Short Description</label>
                            <textarea id="shortDescription" name="shortDescription" placeholder="Add a short description here" class="form-control"></textarea>
                        </div>

                        <!--long description-->
                        <div class="form-group">
                            <label for="longDescription">Long Description</label>
                            <div id="editor-container1" ></div>
                            <input type="hidden" name="longDescription" id="hiddenLongDescription">

                        </div>

                        
      
                        <!--Submit button-->
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary w-50" >Submit</button>
                        </div>


                    </div>

                </div>

       
    </form>
</div>

<br>
<br>



<script>
    var quill = new Quill('#editor-container', {
        theme: 'snow'
    });
</script>

<script>
    var quill = new Quill('#editor-container1', {
        theme: 'snow'
    });
</script>

<script>
    new Tagify(document.querySelector('input[name=tags]'), {
    });
</script>

<script>
   var systemReqContent = quillSystemReq.root.innerHTML;
var longDescriptionContent = quillLongDescription.root.innerHTML;

document.getElementById("hiddenSystemReq").value = systemReqContent;
document.getElementById("hiddenLongDescription").value = longDescriptionContent;

</script>




</body>
</html>