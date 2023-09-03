<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Responsive Profile Page</title>
  <!-- CSS -->
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
            <img src="../img/img_dev.jpg" alt="K. L. Jayathissa" />
        </div>
        <h2>K. L. Jayathissa</h2>
        <p>UX/UI Designer</p>
        <div class="rating">
          <span class="fa fa-star checked"></span>
          <span class="fa fa-star checked"></span>
          <span class="fa fa-star checked"></span>
          <span class="fa fa-star checked"></span>
          <span class="fa fa-star"></span>
          <span>(349 Ratings)</span>
        </div>
        <button>Edit Profile</button>
        <hr>
        <div class="details">
          <p><strong><i class="fas fa-map-marker-alt"></i> From:</strong> Colombo, Sri Lanka</p>
          <p><strong><i class="far fa-calendar"></i> Member Since:</strong> January 2018</p>
          <p><strong><i class="fas fa-tasks"></i> Number of Projects:</strong> 57</p>
        </div>
        <!-- Add the "Create Customized Software with Me" button -->
        <button>To create a customized software</button>

        <div class="card-container">
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
        </div>

        <div class="content">
          <p>
            I am a dedicated developer striving to provide automated solutions and innovational ideas.
            I am working from last 5 years in the field of open source solutions.I do your work as it's my own and
            provide you complete assurance until the work is done.
          </p>
          <hr>
          <!-- New Education section -->
          <div class="education">
            <h2>Education</h2>
            <ol>
              <li>
                <strong>B.Sc. in Computer Science and Technology</strong><br />
                Uva Wellassa University of Sri Lanka, Graduated in 2019
              </li>
              <li>
                <strong>B.Sc. in Software Development - University of Toronto, Canada</strong><br />
                Graduated 2021
              </li>
            </ol>
          </div>
          <hr>
          <!-- New Experience section -->
          <div class="education">
            <h2>Experience</h2>
            <ol>
              <li>
                <strong>UX/UI Designer</strong><br />
                <p>skilled UX/UI designer with a passion for creating intuitive user experiences.
                  Proficient in designing user interfaces for web and mobile applications.
                  Experienced in working collaboratively with development teams</p>
              </li>
              <li>
                <strong>Senior Software Engineer at ABC Tech Solutions</strong><br />
                <p>Developed and maintained web applications using Java, Spring, and Hibernate.
                  Led a team of 5 developers to successfully deliver a complex CRM system ahead of schedule.
                  Implemented CI/CD pipelines with Jenkins, reducing deployment time by 30%.
                  Collaborated with product managers and UX designers to define requirements and improve user
                  experience.
                  Conducted code reviews and mentored junior developers to enhance code quality and knowledge sharing.
                </p>
              </li>
            </ol>
          </div>
          <hr>

          <!-- New Language Skills section -->
          <div class="language_skills">
            <h2>Language Skills</h2>
            <ul style="display: flex;flex-direction: column;align-items: center;gap: 5px;">
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
            <p>As a UX/UI Designer for a website, my passion lies in creating seamless and engaging digital experiences
              that captivate users from the moment they land on the site. Through extensive user research and empathy, I
              gain valuable insights into the target audience's preferences and pain points, allowing me to design
              solutions that resonate with their needs. I believe in a user-centered design approach, where I prioritize
              usability and accessibility, ensuring that every element of the website is intuitive and easy to navigate
              across various devices and platforms.</p>
            <p>During the UX design phase, I meticulously create wireframes and prototypes to visualize the website's
              layout and structure. This iterative process enables me to fine-tune the user journey and information
              architecture, leading to a cohesive and delightful user experience. I conduct usability tests to validate
              and refine my designs, continuously seeking feedback to make data-driven improvements.</p>
            <p>In the UI design phase, my focus shifts to crafting visually stunning interfaces that align with the
              website's branding and identity. I pay meticulous attention to typography, color palettes, and iconography
              to create a cohesive and aesthetically pleasing design language. Implementing the latest design trends and
              techniques, I incorporate subtle animations and interactions to enhance user engagement and elevate the
              overall experience.</p><br>

            <u>
              <h1>Most downloaded software</h1>
            </u>

            <!-- Most Downloaded Software Section -->
            <div class="most-downloaded-software">

              <!-- Software Item 1 -->
              <div class="software-item">
                <img src="../img/sw/sw0016/logo.png" alt="Software 1 Logo" class="software-logo">
                <h2>Software 1</h2>
                <p>Software 1 Description</p>
              </div>
              <!-- Software Item 2 -->
              <div class="software-item">
                <img src="../img/sw/sw0017/logo.jpg" alt="Software 2 Logo" class="software-logo">
                <h2>Software 2</h2>
                <p>Software 2 Description</p>
              </div>
              <!-- Software Item 3 -->
              <div class="software-item">
                <img src="../img/sw/sw0018/logo.png" alt="Software 3 Logo" class="software-logo">
                <h2>Software 3</h2>
                <p>Software 3 Description</p>
              </div>
            </div>
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
                      <?php echo $developer; ?>
                    </td>
                  </tr>
                  <tr>
                    <td></td>
                    <td class="ps-3"><i class="fa fa-star text-success"></i>&nbsp;
                      <?php echo $rate; ?>
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
            <button id="sw-button">Add Software</button>
            <p>From here, you can find software which has been developed by me.</p>
            <!-- Most Downloaded Software Section -->
            <div class="most-downloaded-software">

              <!-- Software Item 1 -->
              <div class="software-item">
                <img src="../img/sw/sw0004/logo.png" alt="Software 1 Logo" class="software-logo">
                <h2>Software 1</h2>
                <p>Software 1 Description</p>
              </div>
              <!-- Software Item 2 -->
              <div class="software-item">
                <img src="../img/sw/sw0005/logo.png" alt="Software 2 Logo" class="software-logo">
                <h2>Software 2</h2>
                <p>Software 2 Description</p>
              </div>
              <!-- Software Item 3 -->
              <div class="software-item">
                <img src="../img/sw/sw0006/logo.png" alt="Software 3 Logo" class="software-logo">
                <h2>Software 3</h2>
                <p>Software 3 Description</p>
              </div>
            </div>
            <div class="most-downloaded-software">

              <!-- Software Item 1 -->
              <div class="software-item">
                <img src="../img/sw/sw0007/logo.png" alt="Software 1 Logo" class="software-logo">
                <h2>Software 1</h2>
                <p>Software 1 Description</p>
              </div>
              <!-- Software Item 2 -->
              <div class="software-item">
                <img src="../img/sw/sw0008/logo.png" alt="Software 2 Logo" class="software-logo">
                <h2>Software 2</h2>
                <p>Software 2 Description</p>
              </div>
              <!-- Software Item 3 -->
              <div class="software-item">
                <img src="../img/sw/sw0009/logo.png" alt="Software 3 Logo" class="software-logo">
                <h2>Software 3</h2>
                <p>Software 3 Description</p>
              </div>
            </div>
            <!-- Repeat similar blocks for other projects -->
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
          <button id="sw-button">Add Tutorial</button>
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