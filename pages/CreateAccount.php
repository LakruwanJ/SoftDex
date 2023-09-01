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
        <script src="../JS/CreateAccount.js"></script>
    </head>
    <body>
        <div class="header">
            <h1>Welcome to SoftDex!  </h1>
        </div>

        <div class="container">
            <div class="row">
                <div class="left-side">
                    
                    <img src="../img/addsoftwareimg.avif" alt="" class="img-fluid mb-3 d-none d-md-block">
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
                            <!-- <label>
                               <input type="radio" name="category" value="admin" onclick="toggleFields()"> Admin
                             </label>-->

                        </div>
                    </div>
                </div>

                <div class="right-side">

                    <form action="CreateAccountProcess.php" method="post">

                        <div id="userFields" ><br>
                            <h2>Create an account as a user</h2>



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
                                            <input id="firstName" type="text" name="firstname" placeholder="First Name" class="form-control bg-white border-left-0 border-md">
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
                                            <input id="lastName" type="text" name="lastname" placeholder="Last Name" class="form-control bg-white border-left-0 border-md">
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <!-- <!--Email
                                  <div class="input-group col-lg-12 mb-4">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-white px-4 border-md border-right-0">
                                            <i class="fa fa-envelope text-muted"></i>
                                        </span>
                                    </div>
                                    <input id="email" type="email" name="email" placeholder="Email Address" class="form-control bg-white border-left-0 border-md">
                                </div>
            
                            <!--password
                            <div class="input-group col-lg-6 mb-4">
                              <div class="input-group-prepend">
                                  <span class="input-group-text bg-white px-4 border-md border-right-0">
                                      <i class="fa fa-lock text-muted"></i>
                                  </span>
                              </div>
                              <input id="password" type="password" name="password" placeholder="Password" class="form-control bg-white border-left-0 border-md">
                          </div>
      
                            <!-- Password Confirmation
                            <div class="input-group col-lg-6 mb-4">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-white px-4 border-md border-right-0">
                                        <i class="fa fa-lock text-muted"></i>
                                    </span>
                                </div>
                                <input id="passwordConfirmation" type="text" name="passwordConfirmation" placeholder="Confirm Password" class="form-control bg-white border-left-0 border-md">
                            </div>-->

                            <!-- Gender -->
                            <div class="form-group">
                                <div class="row">

<!--                                    <div class="input-group col-lg-6 mb-4">
                                        <label for="gender">Gender</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text bg-white px-4 border-md border-right-0">
                                                    <i class="fa fa-user text-muted"></i>
                                                </span>
                                            </div>
                                            <select id="gender" name="Gender" style="max-width: 300px" class="custom-select form-control bg-white border-left-0 border-md h-100 font-weight-bold text-muted">
                                                <option value="">Male</option>
                                                <option value="">Female</option>
                                            </select>


                                        </div> 
                                    </div>-->

                                    <!-- country -->
                                    <div class="input-group col-lg-6 mb-4">
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

                                                <input id="country" type="text" name="country" placeholder="Country" class="form-control bg-white border-md border-left-0 pl-3">
                                                </div> 
                                                </div>
                                                </div>
                                                </div>

                                                <!-- Phone Number -->

                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="input-group col-lg-12 mb-4">
                                                            <label for="phoneNo">Phone Number</label> 
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text bg-white px-4 border-md border-right-0">
                                                                        <i class="fa fa-phone-square text-muted"></i>
                                                                    </span>
                                                                </div>
                                                                <select id="countryCode" name="countryCode" style="max-width: 80px" class="custom-select form-control bg-white border-left-0 border-md h-100 font-weight-bold text-muted">
                                                                    <option value="">+94</option>
                                                                    <option value="">+10</option>
                                                                    <option value="">+15</option>
                                                                    <option value="">+18</option>
                                                                </select>
                                                                <input id="phoneNumber" type="tel" name="phone" placeholder="Phone Number" class="form-control bg-white border-md border-left-0 pl-3">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!--Add a profile pic-->
                                                <div class="form-group">
                                                    <label for="profilepic">Profile Picture</label>
                                                    <input type="file" id="profilepic" name="profilepic" class="form-control-file">
                                                </div>



                                        </div>


                                        <div id="developerFields" style="display: none;">
                                            <h2>Create an account as a developer</h2>
                                           

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
                                                                <input id="firstName" type="text" name="firstname" placeholder="First Name" class="form-control bg-white border-left-0 border-md">
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
                                                                <input id="lastName" type="text" name="lastname" placeholder="Last Name" class="form-control bg-white border-left-0 border-md">
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                                <!--Email-->
                                                <!-- <div class="input-group col-lg-12 mb-4">
                                                     <div class="input-group-prepend">
                                                         <span class="input-group-text bg-white px-4 border-md border-right-0">
                                                             <i class="fa fa-envelope text-muted"></i>
                                                         </span>
                                                     </div>
                                                     <input id="email" type="email" name="email" placeholder="Email Address" class="form-control bg-white border-left-0 border-md">
                                                 </div>
 
                                                <!--password-->
                                                <!--<div class="input-group col-lg-6 mb-4">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text bg-white px-4 border-md border-right-0">
                                                            <i class="fa fa-lock text-muted"></i>
                                                        </span>
                                                    </div>
                                                    <input id="password" type="password" name="password" placeholder="Password" class="form-control bg-white border-left-0 border-md">
                                                </div>-->

                                                <!-- Password Confirmation -->
                                                <!-- <div class="input-group col-lg-6 mb-4">
                                                     <div class="input-group-prepend">
                                                         <span class="input-group-text bg-white px-4 border-md border-right-0">
                                                             <i class="fa fa-lock text-muted"></i>
                                                         </span>
                                                     </div>
                                                     <input id="passwordConfirmation" type="text" name="passwordConfirmation" placeholder="Confirm Password" class="form-control bg-white border-left-0 border-md">
                                                 </div>-->


                                                <!-- Gender -->
                                                <div class="form-group">
                                                    <div class="row">

                                                        <div class="input-group col-lg-6 mb-4">
                                                            <label for="gender">Gender</label>
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text bg-white px-4 border-md border-right-0">
                                                                        <i class="fa fa-user text-muted"></i>
                                                                    </span>
                                                                </div>
                                                                <select id="gender" name="Gender" style="max-width: 300px" class="custom-select form-control bg-white border-left-0 border-md h-100 font-weight-bold text-muted">
                                                                    <option value="">Male</option>
                                                                    <option value="">Female</option>
                                                                </select>


                                                            </div> 
                                                        </div>

                                                        <!-- country -->
                                                        <div class="input-group col-lg-6 mb-4">
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

                                                                    <input id="country" type="text" name="country" placeholder="Country" class="form-control bg-white border-md border-left-0 pl-3">
                                                                    </div> 
                                                                    </div>
                                                                    </div>
                                                                    </div>
                                                                    <!-- Phone Number -->
                                                                    <div class="form-group">
                                                                        <div class="row">
                                                                            <div class="input-group col-lg-12 mb-4">
                                                                                <label for="phoneNo">Phone Number</label> 
                                                                                <div class="input-group">
                                                                                    <div class="input-group-prepend">
                                                                                        <span class="input-group-text bg-white px-4 border-md border-right-0">
                                                                                            <i class="fa fa-phone-square text-muted"></i>
                                                                                        </span>
                                                                                    </div>
                                                                                    <select id="countryCode" name="countryCode" style="max-width: 80px" class="custom-select form-control bg-white border-left-0 border-md h-100 font-weight-bold text-muted">
                                                                                        <option value="">+94</option>
                                                                                        <option value="">+10</option>
                                                                                        <option value="">+15</option>
                                                                                        <option value="">+18</option>
                                                                                    </select>
                                                                                    <input id="phoneNumber" type="tel" name="phone" placeholder="Phone Number" class="form-control bg-white border-md border-left-0 pl-3">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <!--Skills/Expertise-->
                                                                     <div class="form-group">
                                                                        <div class="row">
                                                                    <div class="input-group col-lg-12 mb-4">
                                                                        <label for="skills">Skills / Expertise</label>
                                                            <div class="input-group">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                                                                <i class="fa fa-file text-muted"></i>
                                                                            </span>
                                                                        </div>
                                                                        <input id="skills" type="skills" name="skills" placeholder="Skills / Expertise" class="form-control bg-white border-left-0 border-md">
                                                                    </div>
                                                                    </div>
                                                                        </div>
                                                                     </div>

                                                                    <!--Experience-->
                                                                     <div class="form-group">
                                                                        <div class="row">
                                                                    <div class="input-group col-lg-12 mb-4">
                                                                        <label for="experience">Experience</label>
                                                            <div class="input-group">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                                                                <i class="fa fa-file text-muted"></i>
                                                                            </span>
                                                                        </div>
                                                                        <input id="experience" type="experience" name="experience" placeholder="Experience" class="form-control bg-white border-left-0 border-md">
                                                                    </div>
                                                                        </div>
                                                                     </div>
                                                                     </div>
                                                                    
                                                                    <!--Add a profile pic-->
                                                <div class="form-group">
                                                    <label for="profilepic">Profile Picture</label>
                                                    <input type="file" id="profilepic" name="profilepic" class="form-control-file">
                                                </div>

                                                            

                                                        </div>

                                                        <!-- 
                                                       <div id="adminFields" style="display: none;"><br>
                                                         <h2>Create an account as an admin</h2>
                                                         <div class="row">
                                                           
                                                        <!--First Name
                                                        <div class="input-group col-lg-6 mb-4">
                                                          <div class="input-group-prepend">
                                                              <span class="input-group-text bg-white px-4 border-md border-right-0">
                                                                 <i class="fa fa-user text-muted"></i>
                                                              </span>
                                                          </div>
                                                          <input id="firstName" type="text" name="firstname" placeholder="First Name" class="form-control bg-white border-left-0 border-md">
                                                      </div>
                                                        <!--Last Name
                                                        <div class="input-group col-lg-6 mb-4">
                                                          <div class="input-group-prepend">
                                                              <span class="input-group-text bg-white px-4 border-md border-right-0">
                                                                  <i class="fa fa-user text-muted"></i>
                                                              </span>
                                                          </div>
                                                          <input id="lastName" type="text" name="lastname" placeholder="Last Name" class="form-control bg-white border-left-0 border-md">
                                                      </div>
                                                        <!--Email
                                                        <div class="input-group col-lg-12 mb-4">
                                                          <div class="input-group-prepend">
                                                              <span class="input-group-text bg-white px-4 border-md border-right-0">
                                                                  <i class="fa fa-envelope text-muted"></i>
                                                              </span>
                                                          </div>
                                                          <input id="email" type="email" name="email" placeholder="Email Address" class="form-control bg-white border-left-0 border-md">
                                                      </div>
                                  
                                                        <!--password
                                                        <div class="input-group col-lg-6 mb-4">
                                                          <div class="input-group-prepend">
                                                              <span class="input-group-text bg-white px-4 border-md border-right-0">
                                                                  <i class="fa fa-lock text-muted"></i>
                                                              </span>
                                                          </div>
                                                          <input id="password" type="password" name="password" placeholder="Password" class="form-control bg-white border-left-0 border-md">
                                                      </div>
                                  
                                                        <!-- Password Confirmation 
                                                        <div class="input-group col-lg-6 mb-4">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text bg-white px-4 border-md border-right-0">
                                                                    <i class="fa fa-lock text-muted"></i>
                                                                </span>
                                                            </div>
                                                            <input id="passwordConfirmation" type="text" name="passwordConfirmation" placeholder="Confirm Password" class="form-control bg-white border-left-0 border-md">
                                                        </div>
                                    
                                                        
                                                        <!-- Gender 
                                                        <div class="input-group col-lg-6 mb-4">
                                                          <div class="input-group-prepend">
                                                              <span class="input-group-text bg-white px-4 border-md border-right-0">
                                                                <i class="fa fa-user text-muted"></i>
                                                              </span>
                                                          </div>
                                                          <select id="gender" name="Gender" style="max-width: 150px" class="custom-select form-control bg-white border-left-0 border-md h-100 font-weight-bold text-muted">
                                                            <option value="">Male</option>
                                                            <option value="">Female</option>
                                                           
                                                        <input id="gender" type="text" name="gender" placeholder="Gender" class="form-control bg-white border-md border-left-0 pl-3">
                                                      </div>  
                                    
                                                        <!-- country 
                                                        <div class="input-group col-lg-6 mb-4">
                                                         <div class="input-group-prepend">
                                                             <span class="input-group-text bg-white px-4 border-md border-right-0">
                                                               <i class="fa fa-flag text-muted"></i>
                                                             </span>
                                                         </div>
                                                         <select id="country" name="country" style="max-width: 150px" class="custom-select form-control bg-white border-left-0 border-md h-100 font-weight-bold text-muted">
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
                                                          
                                                       <input id="country" type="text" name="country" placeholder="Country" class="form-control bg-white border-md border-left-0 pl-3">
                                                     </div>
                                                     
                                                        <!--Role
                                                        <div class="input-group col-lg-12 mb-4">
                                                         <div class="input-group-prepend">
                                                             <span class="input-group-text bg-white px-4 border-md border-right-0">
                                                                 <i class="fa fa-user text-muted"></i>
                                                             </span>
                                                         </div>
                                                         <input id="role" type="role" name="role" placeholder="Role / Postition" class="form-control bg-white border-left-0 border-md">
                                                     </div>
                                       
                                                        <!-- Phone Number 
                                                        <div class="input-group col-lg-12 mb-4">
                                                          <div class="input-group-prepend">
                                                              <span class="input-group-text bg-white px-4 border-md border-right-0">
                                                                  <i class="fa fa-phone-square text-muted"></i>
                                                              </span>
                                                          </div>
                                                          <select id="countryCode" name="countryCode" style="max-width: 80px" class="custom-select form-control bg-white border-left-0 border-md h-100 font-weight-bold text-muted">
                                                              <option value="">+94</option>
                                                              <option value="">+10</option>
                                                              <option value="">+15</option>
                                                              <option value="">+18</option>
                                                          </select>
                                                          <input id="phoneNumber" type="tel" name="phone" placeholder="Phone Number" class="form-control bg-white border-md border-left-0 pl-3">
                                                      </div>
                                    
                                                      </div>
                                                  </div>-->
                                                        <br>
                                                        <div class="form-group text-center">
                                                            <div class="d-flex justify-content-center">
                                                                <button type="submit" id="createAccountBtn" class="btn btn-primary w-50">Create Account</button>
                                                            </div>
                                                        </div>

<!--                                                        <div class="form-group text-center">
                                                            <div class="d-flex justify-content-center">
                                                                <button type="button" id="editProfileBtn" class="btn btn-secondary w-50" onclick="toggleEditMode()">Edit Profile</button>
                                                            </div>
                                                        </div>-->

                                                        <div class="form-group text-center">
                                                            <div class="d-flex justify-content-center">
                                                                <button type="submit" id="saveChangesBtn" class="btn btn-primary w-50" style="display: none;">Save Changes</button>
                                                            </div>
                                                        </div>

                                                        </form>



                                                    </div>


                                                </div>
                                            </div>



                                            <script>
                                                function toggleEditMode() {
                                                    var createAccountBtn = document.getElementById('createAccountBtn');
                                                    var editProfileBtn = document.getElementById('editProfileBtn');
                                                    var saveChangesBtn = document.getElementById('saveChangesBtn');


                                                    createAccountBtn.style.display = 'none';
                                                    editProfileBtn.style.display = 'none';


                                                    saveChangesBtn.style.display = 'block';


                                                }
                                            </script>

                                            </body>
                                            </html>

