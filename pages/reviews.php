<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
        <link rel="stylesheet" type="text/css" href="../css/Reviews.css">
        
    </head>
    <body>
        
        
        
        <div class="Reviews">
            <div class="inner">
                <h2>Reviews</h2>
                
                
                <div class="border"></div>
                <div class="review-button">
        <a href="feedbackform.php">Add Your Review</a>
    </div>
                <div class="row">
                    
                    <div class="col">
                        <div class="review">
                            <img src="../img/p1.png" alt="Person 1">
                            <div class="name">John smith</div>
                            <div class="rating">
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                            </div>


                            <p>"As a software developer, SoftDex has been a game-changer for me. I uploaded my custom software, and it gained visibility among a large user base. The feedback system is helpful, and I can easily engage with my users. It's an excellent platform for showcasing and promoting software products!"</p>
                        </div>
                    </div>
                    <div class="col">
                        <div class="review">
                            <img src="../img/p2.png" alt="Person 2">
                            <div class="name">jane robinson</div>
                            <div class="rating">
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                            </div>
                            <p>"I stumbled upon SoftDex while looking for premium software, and I'm thrilled with my discovery! The quality and variety of software available here are top-notch. The payment process was secure, and I received instant access to my premium software. Kudos to the SoftDex team for creating such a reliable platform!"</p>
                        </div>
                    </div>
                    <div class="col">
                        <div class="review">
                            <img src="../img/p3.png" alt="Person 3">
                            <div class="name">Jennifer Carter</div>
                            <div class="rating">
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                            </div>
                            <p>"SoftDex is a valuable resource for software enthusiasts like me. The ability to compare different software products, read user reviews, and get detailed descriptions is incredibly helpful. The only suggestion I have is to add more open-source software to the collection.It's a must-visit for software seekers!" "</p>
                        </div>
                    </div>
                    
                    </div>
                </div>
            </div>
        <script>
        function scrollToFeedbackForm() {
            const feedbackForm = document.querySelector(".feedback-form");
            feedbackForm.scrollIntoView({ behavior: "smooth" });
        }
    </script>
    </body>
</html>
