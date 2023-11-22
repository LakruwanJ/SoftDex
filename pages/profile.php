<?php

use Classes\DbConnector;
use Classes\Select;

require_once '../Classes/Select.php';

$dbcon = new DbConnector();
$con = $dbcon->getConnection();
$rs = new Classes\Select();


session_start();
if (isset($_SESSION["user"])) {
    $user = $_SESSION["user"];
}else{
    header("Location: ../softdex.php");
}


$rs = new Classes\Select();

$rs2 = $rs->selectDeveloper($user);
foreach ($rs2 as $dev) {
    $did = $dev->Did;
    $user = $dev->username;
    $shortdes = $dev->shortdes;
    $education = $dev->education;
    $languages = $dev->languages;
    $prolang = $dev->prolang;
    $experience = $dev->experience;
    $description = $dev->description;
    $datesince = $dev->datesince;
    $country = $dev->country;
}

/*
if (isset($_SESSION["user"])) {
    $user = $_SESSION["user"];
} else {
    header("Location: ../softdex.php");
}

if (isset($user->Uid)) {
 $uid = $user->Uid;
   
    $rs = new Classes\Select();
   $rs3 = $rs->selectUser($user);
foreach ($rs3 as $us) {
    $uid = $us->Uid;
    $user = $us->username;
    $country = $us->country;
}

} elseif (isset($user->DID)) {
    
    $did = $user->DID;
   $rs = new Classes\Select();

$rs2 = $rs->selectDeveloper($user);
foreach ($rs2 as $dev) {
    $did = $dev->Did;
    $user = $dev->username;
    $shortdes = $dev->shortdes;
    $education = $dev->education;
    $languages = $dev->languages;
    $prolang = $dev->prolang;
    $experience = $dev->experience;
    $description = $dev->description;
    $datesince = $dev->datesince;
    $country = $dev->country;
}
} elseif (isset($user->Aid)) {
    
    $aid = $user->Aid;
  
    $rs = new Classes\Select();
   $rs4 = $rs->selectAdmin($user);
foreach ($rs4 as $us) {
    $uid = $us->Uid;
    $user = $us->username;
}

}

/*$rs3 = $rs->selectUser($user);
foreach ($rs2 as $user) {
    $uid = $user->Uid;
    $user = $user->username;
    $country = $dev->country;
}
*/
?>


<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Profile Page</title>
        <!-- CSS -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
        <link rel="stylesheet" type="text/css" href="../css/profile.css">
        <link rel="stylesheet" type="text/css" href="../css/timeline.css">
        <link rel="stylesheet" type="text/css" href="../css/timeline_timeline.css">


    </head>

    <body>
        <div class="header__wrapper">
            <header></header>
            <div class="cols__container">
                <div class="left__col">
                    <div class="img__container">
                        
                        <?php
                                    $imageFormats = ['png', 'jpg'];
                                    $imagePath = '../img/user/' . $user . '/' . $user;

                                    foreach ($imageFormats as $format) {
                                        $imageUrl = $imagePath . '.' . $format;

                                        if (file_exists($imageUrl)) {
                                            echo '<img class="d-block mx-auto mb-3 mt-3" src="' . $imageUrl . '" height="130px" alt="Logo Image" />';
                                            break;
                                        }
                                    }
                                    ?>
                        
                    </div>
                    <h2><?php echo $user; ?></h2>

                    <div class="rating">
                        <span class="fa fa-star checked" ></span>
                        <span>(5.0)</span>
                    </div>
                    <a href="BecomeDev.php">
                        <button>Edit Profile</button>
                    </a>

                    <hr>
                    <div class="details">
                        <p><strong><i class="fas fa-map-marker-alt"></i> From:</strong><?php echo $country; ?> </p>
                        <p><strong><i class="far fa-calendar"></i> Member Since:</strong> <?php echo $datesince; ?> </p>
                        <p><strong><i class="fas fa-tasks"></i> Number of Projects:</strong> 57</p>
                    </div>
                    <!-- Add the "Create Customized Software with Me" button -->
                    <a href="../pages/CustomizedSwForm.php">
                        <button>To create a customized software</button>
                    </a>
                    
                    <br>
                    <div class="card-container">
                        <br>
                        <div class="card">
                            <ul class="saliha">
                                <li>40<br>Uploaded</li>
                            </ul>
                        </div>
                        <div class="card">
                            <ul class="saliha">
                                <li>15<br>Customized</li>
                            </ul>
                        </div>
                        <div class="card">
                            <ul class="saliha">
                                <li>56<br>Tutorials</li>
                            </ul>
                        </div>
                        <br><br>
                    </div>
                    <br>
                    <div class="content">
                        <p>
                            <?php echo $shortdes; ?> 
                        </p>
                       

                        <!-- New Language Skills section -->
                        <div class="language_skills">
                            <h2>Language Speaking</h2>
                            <ul style="display: flex;flex-direction: column;align-items: center;gap: 5px;">
                                <li style="width: 90%;margin: 0;"> <?php echo $languages; ?> </li>
<li style="width: 90%;margin: 0;">Sinhala</li>
                            </ul>
                        </div>
                        <br>
                        <hr>

                        <!-- New Language Skills section -->
                        <div class="language_skills">
                            <h2>Language Skills</h2>
                            <ul style="display: flex;flex-direction: column;align-items: center;gap: 5px;">
                                <li style="width: 90%;margin: 0;"><?php echo $prolang; ?></li>
                                <li style="width: 90%;margin: 0;">JavaScript</li>
                                <li style="width: 90%;margin: 0;">Python</li>
                                <li style="width: 90%;margin: 0;">HTML</li>
                                <li style="width: 90%;margin: 0;">CSS</li>
                                <li style="width: 90%;margin: 0;">Java</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="right__col">
                    <div class="tab-container">
                        <div class="tablinks">
                            <button class="tablink" onclick="openCity('About_me', this, 'rgb(0, 155, 255)')" id="defaultOpen"><strong>About
                                    Me</strong></button>
                            <button class="tablink" onclick="openCity('Software', this, 'rgb(0, 155, 255)')"><strong>Software</strong></button>
                            <button class="tablink" onclick="openCity('Customized', this, 'rgb(0, 155, 255)')"><strong>Customized</strong></button>
                            <button class="tablink" onclick="openCity('Tutorial', this, 'rgb(0, 155, 255)')"><strong>Tutorial</strong></button>
                            <button class="tablink" onclick="openCity('Timeline', this, 'rgb(0, 155, 255)')"><strong>Timeline</strong></button>
                        </div>

                        <div id="About_me" class="tabcontent">
                            <h1>About Me</h1>
                            <p><?php echo $description; ?></p><br>
 <hr>
                        <!-- New Education section -->
                        <div class="education">
                            <h2>Education</h2>
                            <ol>
                                <li>
                                    <?php echo $education; ?> 
                                </li>

                            </ol>
                        </div>
                        <hr>
                        <!-- New Experience section -->
                        <div class="education">
                            <h2>Experience</h2>
                            <ol>
                                <li>
                                    <?php echo $experience; ?> 
                                </li>
                            </ol>
                        </div>
                        <hr>
                          
                            <u>
                                <h1>Reviews</h1>
                            </u>
                            <div class="row">
                                <div class="col-md-12">
                                    <table>
                                        <tr>
                                            <td><a href="#"><img class="rounded-circle" src="https://mdbootstrap.com/img/new/avatars/2.jpg"
                                                                 height="40" alt /></a></td>
                                            <td class="ps-3">
                                                By user
                                            </td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td class="ps-3"><i class="fa fa-star text-success"></i>&nbsp;5.0
                                                &nbsp;&nbsp;&centerdot;&nbsp;&nbsp;
                                                <?php echo "1 month ago"; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td class="ps-3">
                                                <p>Janvi is easy to communicate with, she responds fast. Just tell her how you want the output to
                                                    be and her team will revise it based from your feedback. I like how they worked on the logo
                                                    design for my brand. They also did my social media kit but I did not expect it to be just the
                                                    logo with a white background. I'd say it was not their strong suite, but Janvi still welcomed my
                                                    suggestions and applied it on the design. I appreciate their work and their effort. Overall, I
                                                    am quite satisfied because Janvi welcomed my suggestions and revision requests. I'd say, great
                                                    customer service.</p>
                                            </td>
                                        </tr>
                                    </table>
                                    <hr>
                                </div>
                            </div>
                        </div>

                        <div id="Software" class="tabcontent">
                            <h1>Software</h1>
                            <a href="AddSoftware.php">
                        <button id="sw-button">Add Software</button>
                    </a>
                            
                            <p>From here, you can find software which has been developed by me.</p>
                            <!-- Most Downloaded Software Section -->


                            <div class="row">


                                <?php
                                foreach ($rs->selectDesc($did) as $value) {
                                    ?>
                                    <div class="col-lg-4 col-md-4 col-sm-6 software-item">
                                        <?php
                                        $imageFormats = ['png', 'jpg']; // List of possible image formats
                                        $imagePath = '../img/sw/' . $value->Sid . '/logo'; // Base path without extension

                                        foreach ($imageFormats as $format) {
                                            $imageUrl = $imagePath . '.' . $format;

                                            if (file_exists($imageUrl)) {
                                                echo '<img class="d-block mx-auto mb-3 mt-3" src="' . $imageUrl . '" height="150px" alt="Logo Image" />';
                                                break; // Stop when the first valid image format is found
                                            }
                                        }
                                        ?>
                                        <h2><?php echo $value->name ?></h2>
                                        <p><?php echo $value->shortdescription ?></p>


                                    </div>

                                <?php } ?>

                            </div>
                        </div>



                    </div>

                    <div id="Customized" class="tabcontent">
                        <h1>Customized</h1>
                        <button id="sw-button">Ongoing Projects</button>
                        <p>From here, you can find customized software which has been developed by me according to user
                            requirements.</p>

                        <div class="most-downloaded-software">

                            <!-- Software Item 1 -->
                            <div class="software-item">
                                <img src="../img/img1.jpg" alt="Software 1 Logo" class="software-logo">
                                <h2>Customized 1</h2>
                                <p>An innovative travel task manager</p>
                            </div>
                            <!-- Software Item 2 -->
                            <div class="software-item">
                                <img src="../img/img2.jpg" alt="Software 2 Logo" class="software-logo">
                                <h2>Customized 2</h2>
                                <p>Master the art of digital photography with our comprehensive tutorial series.</p>
                            </div>
                            <!-- Software Item 3 -->
                            <div class="software-item">
                                <img src="../img/img3.jpg" alt="Software 3 Logo" class="software-logo">
                                <h2>Customized 3</h2>
                                <p>A cutting-edge video editing software with powerful tools for professionals.</p>
                            </div>
                        </div>

                        <div class="most-downloaded-software">

                            <!-- Software Item 1 -->
                            <div class="software-item">
                                <img src="../img/img4.jpg" alt="Software 1 Logo" class="software-logo">
                                <h2>Customized 4</h2>
                                <p>Learn how to create stunning websites with the latest web development technologies.</p>
                            </div>
                            <!-- Software Item 2 -->
                            <div class="software-item">
                                <img src="../img/img5.jpg" alt="Software 2 Logo" class="software-logo">
                                <h2>Customized 5</h2>
                                <p>A comprehensive language learning app for all levels. Explore interactive lessons.</p>
                            </div>
                            <!-- Software Item 3 -->
                            <div class="software-item">
                                <img src="../img/img6.jpg" alt="Software 3 Logo" class="software-logo">
                                <h2>Customized 6</h2>
                                <p>A user-friendly personal finance app for budgeting and tracking expenses.</p>
                            </div>
                        </div>
                    </div>


                    <div id="Tutorial" class="tabcontent">
                        <h1>Tutorial</h1>
                        
                        <a href="../pages/UploadTutorials.php">
                        <button id="sw-button">Add Tutorial</button>
                    </a>
                       
                        <p>From here, you can find tutorials related to software developed by me according to user requirements.</p>

                        <div class="most-downloaded-software">
                            <!-- Software Item 1 -->
                            <div class="software-item">
                                <img src="../img/tutorial.jpg" alt="Software 1 Logo" class="software-logo">
                                <h2>Tutorial 1</h2>
                                <p>An innovative mobile task manager app that simplifies your daily routines, boosts productivity, and
                                    enhances collaboration with intuitive features and seamless cloud synchronization. </p>
                            </div>
                            <!-- Software Item 2 -->
                            <div class="software-item">
                                <img src="../img/tutorial.jpg" alt="Software 1 Logo" class="software-logo">
                                <h2>Tutorial 2</h2>
                                <p>Master the art of digital photography with our comprehensive tutorial series.</p>
                            </div>
                            <!-- Software Item 3 -->
                            <div class="software-item">
                                <img src="../img/tutorial.jpg" alt="Software 1 Logo" class="software-logo">
                                <h2>Tutorial 3</h2>
                                <p>Master the art of digital photography with our comprehensive tutorial series. Explore camera
                                    settings, composition, and post-processing techniques.</p>
                            </div>
                        </div>
                        <div class="most-downloaded-software">

                            <!-- Software Item 1 -->
                            <div class="software-item">
                                <img src="../img/tutorial.jpg" alt="Software 1 Logo" class="software-logo">
                                <h2>Tutorial 4</h2>
                                <p>A comprehensive language learning app for all levels. Explore interactive lessons, practice
                                    pronunciation, and immerse yourself in real-world conversations, making language acquisition engaging
                                    and effective.</p>
                            </div>
                            <!-- Software Item 2 -->
                            <div class="software-item">
                                <img src="../img/tutorial.jpg" alt="Software 1 Logo" class="software-logo">
                                <h2>Tutorial 5</h2>
                                <p>A cutting-edge video editing software with powerful tools for professionals. Edit, enhance, and
                                    create stunning videos effortlessly, with advanced effects and seamless sharing options for all your
                                    projects.</p>
                            </div>
                            <!-- Software Item 3 -->
                            <div class="software-item">
                                <img src="../img/tutorial.jpg" alt="Software 3 Logo" class="software-logo">
                                <h2>Tutorial 6</h2>
                                <p>Learn how to create stunning websites with the latest web development technologies. This tutorial
                                    covers HTML, CSS, and JavaScript techniques.</p>
                            </div>
                        </div>

                    </div>

                    <div id="Timeline" class="tabcontent">
                        <h1>Timeline</h1>

                        <div class="container">
                            <div class="row">
                                <div class="timeline-centered">

                                    <article class="timeline-entry">

                                        <div class="timeline-entry-inner">
                                            <time class="timeline-time" datetime="2014-01-10T03:45"><span>03:45 AM</span>
                                                <span>Today</span></time>

                                            <div class="timeline-icon bg-success">
                                                <i class="entypo-feather"></i>
                                            </div>

                                            <div class="timeline-label">
                                                <h2><a href="#">Art Ramadani</a> <span>posted a status update</span></h2>
                                                <p>Tolerably earnestly middleton extremely distrusts she boy now not. Add and offered prepare
                                                    how cordial two promise. Greatly who affixed suppose but enquire compact prepare all put.
                                                    Added forth chief trees but rooms think may.</p>
                                            </div>
                                        </div>

                                    </article>

                                    <article class="timeline-entry left-aligned">

                                        <div class="timeline-entry-inner">
                                            <time class="timeline-time" datetime="2014-01-10T03:45"><span>03:45 AM</span>
                                                <span>Today</span></time>

                                            <div class="timeline-icon bg-secondary">
                                                <i class="entypo-suitcase"></i>
                                            </div>

                                            <div class="timeline-label">
                                                <h2><a href="#">Job Meeting</a></h2>
                                                <p>You have a meeting at <strong>Laborator Office</strong> Today.</p>
                                            </div>
                                        </div>

                                    </article>

                                    <article class="timeline-entry">

                                        <div class="timeline-entry-inner">
                                            <time class="timeline-time" datetime="2014-01-09T13:22"><span>03:45 AM</span>
                                                <span>Today</span></time>

                                            <div class="timeline-icon bg-info">
                                                <i class="entypo-location"></i>
                                            </div>

                                            <div class="timeline-label">
                                                <h2><a href="#">Arlind Nushi</a> <span>checked in at</span> <a href="#">Laborator</a></h2>
                                                <blockquote>Great place, feeling like in home.</blockquote>
                                            </div>
                                        </div>

                                    </article>

                                    <article class="timeline-entry left-aligned">

                                        <div class="timeline-entry-inner">
                                            <time class="timeline-time" datetime="2014-01-10T03:45"><span>03:45 AM</span>
                                                <span>Today</span></time>

                                            <div class="timeline-icon bg-warning">
                                                <i class="entypo-camera"></i>
                                            </div>

                                            <div class="timeline-label">
                                                <h2><a href="#">Arber Nushi</a> <span>changed his</span> <a href="#">Profile Picture</a></h2>

                                                <blockquote>Pianoforte principles our unaffected not for astonished travelling are particular.
                                                </blockquote>

                                                <img src="http://themes.laborator.co/neon/assets/images/timeline-image-3.png"
                                                     class="img-responsive img-rounded full-width">
                                            </div>
                                        </div>
                                    </article>

                                    <article class="timeline-entry begin">

                                        <div class="timeline-entry-inner">

                                            <div class="timeline-icon"
                                                 style="-webkit-transform: rotate(-90deg); -moz-transform: rotate(-90deg);">
                                                <i class="entypo-flight"></i>
                                            </div>
                                        </div>
                                    </article>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <script>
                function openCity(cityName, elmnt, color) {
                    var i, tabcontent, tablinks;
                    tabcontent = document.getElementsByClassName("tabcontent");
                    for (i = 0; i < tabcontent.length; i++) {
                        tabcontent[i].style.display = "none";
                    }
                    tablinks = document.getElementsByClassName("tablink");
                    for (i = 0; i < tablinks.length; i++) {
                        tablinks[i].style.backgroundColor = "";
                    }
                    document.getElementById(cityName).style.display = "block";
                    elmnt.style.backgroundColor = color;
                }

                // Get the element with id="defaultOpen" and click on it
                document.getElementById("defaultOpen").click();
            </script>
        </div>
    </div>
    <script src="../JS/profile.js"></script>
</body>

</html>