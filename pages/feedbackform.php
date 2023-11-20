





<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="../css/feedback.css">
    </head>
    <body>
        
        <div class="feedback-form">
            
            
            <h2>Review</h2>
            <p class="caption">We value your feedback. Please share your thoughts with us.</p>
            <form action="../Process/reviewprocess.php" method="POST">
                
                <div class="input-group">
                    <label for="email">Email:</label>
                    <input type="email" name="email" placeholder="Enter your email address" required>
                </div>
                <div class="input-group">
                    <label for="feedback">Your Feedback:</label>
                    <textarea placeholder="Enter your feedback here" rows="6" name="feedback" required></textarea>
                </div>

                <div class="actions button">
                    <button type="submit" name="Add your Feedback">Add your Review</button>
                
                
                </div> 
            </form>
        </div>
    </body>
</html>

