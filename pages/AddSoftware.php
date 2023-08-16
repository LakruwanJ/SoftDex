
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


    </head>


    <body>
        
        <div class="header">
            <h1>  Upload your Software Here! </h1>
        </div>
    <div class="container">
        <div class="row">
            
             <div class="col-md-4">
                <!--  upload sections -->
                
                <br>
            <img src="https://bootstrapious.com/i/snippets/sn-registeration/illustration.svg" alt="" class="img-fluid mb-3 d-none d-md-block">
            <br>
                <form action="#" method="post">
                   
                 <!--upload images-->
                    <div class="form-group">
                        <label for="images">Upload Images</label>
                        <input type="file" id="images" name="images" class="form-control-file">
                    </div>
                    <br>
                    
                     <!--upload videos-->
                    <div class="form-group">
                        <label for="video">Upload Video</label>
                        <input type="file" id="video" name="video" class="form-control-file">
                    </div>
                    <br>
                    
                     <!--upload tutorials-->
                     <div class="form-group">
                        <label for="tutorials">Upload Tutorials</label>
                        <input type="file" id="tutorials" name="tutorials" class="form-control-file">
                    </div>
                     <br>
                      <!--upload software-->
                     <div class="form-group">
                        <label for="software">Upload Software</label>
                        <input type="file" id="software" name="software" class="form-control-file">
                    </div>
                    <button type="submit" class="btn btn-primary">Upload </button>
                </form>
            </div>
            
            
            
            
            <div class="col-md-8">
              

                <!--  form fields -->
                <form action="#" method="post">
                    
                    <!--software name-->
                    <div class="form-group">
                        <div class="row">
                            
                            <!-- Software name -->
                            
                            <div class="col-lg-12 mb-4">
                            <label for="softwareName">Software Name</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-white px-4 border-md border-right-0">
                                            <i class="fa fa-envelope text-muted"></i>
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
                                            <i class="fa fa-envelope text-muted"></i>
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
                                            <i class="fa fa-envelope text-muted"></i>
                                        </span>
                                    </div>
                                    <input id="platform" type="text" name="platform" placeholder="Platform" class="form-control bg-white border-left-0 border-md">
                                </div>
                            </div>
                        </div>
                    </div>

                     <!--liecence-->
                     <div class="form-group">
                        <div class="row">
                           
                            <div class="col-lg-6 mb-4">
                                <label for="liencence">Liecence</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-white px-4 border-md border-right-0">
                                            <i class="fa fa-envelope text-muted"></i>
                                        </span>
                                    </div>
                                    <input id="lisence" type="text" name="lisence" placeholder="Lisence" class="form-control bg-white border-left-0 border-md">
                                </div>
                            </div>

                            <!-- Amount -->
                            <div class="col-lg-6 mb-4">
                                <label for="amount">Amount</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-white px-4 border-md border-right-0">
                                            <i class="fa fa-envelope text-muted"></i>
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
                           
                            <div class="col-lg-12 mb-4">
                                <label for="category">Category</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-white px-4 border-md border-right-0">
                                            <i class="fa fa-envelope text-muted"></i>
                                        </span>
                                    </div>
                                    <input id="category" type="text" name="category"" placeholder="Category" class="form-control bg-white border-left-0 border-md">
                                </div>
                            </div>

                         
                        </div>
                    </div>
                     
                     <!--tags-->
                    <div class="form-group">
                        <div class="row">
                            
                            <div class="col-lg-12 mb-4">
                                <label for="tags">Tags</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-white px-4 border-md border-right-0">
                                            <i class="fa fa-envelope text-muted"></i>
                                        </span>
                                    </div>
                                    <input id="tags" type="text" name="tags" placeholder="Tags" class="form-control bg-white border-left-0 border-md">
                                </div>
                            </div>
                        </div>
                    </div>
                     
                           <!--system requirements-->
                    <div class="form-group">
                        <div class="row">
                            
                            <div class="col-lg-12 mb-4">
                                <label for="systemreq">System Requirements</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-white px-4 border-md border-right-0">
                                            <i class="fa fa-envelope text-muted"></i>
                                        </span>
                                    </div>
                                    <input id="systemreq" type="text" name="systemreq" placeholder="System Requirements" class="form-control bg-white border-left-0 border-md">
                                </div>
                            </div>
                        </div>
                    </div>
                           
                     <!--short description-->
                    <div class="form-group">
                        <label for="shortDescription">Short Description</label>
                        <textarea id="shortDescription" name="shortDescription" placeholder="Add a short description here" class="form-control"></textarea>
                    </div>
                     
                      <!--long description-->
                    <div class="form-group">
                        <label for="longDescription">Long Description</label>
                       <div id="editor-container"></div>

                    </div>
                     
                    <button type="submit" class="btn btn-primary">Submit </button>
                    
                </form>
            </div>
         
    </div>
    

    <script>
    var quill = new Quill('#editor-container', {
        theme: 'snow' 
    });
    </script>

    </body>
    </html>