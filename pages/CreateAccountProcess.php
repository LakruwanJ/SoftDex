<?php
require '../Classes/DbConnector.php';

use Classes\DbConnector;

$dbcon = new DbConnector(); 


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['category'])) {
        $category = $_POST['category'];
        

        // Common fields
        $firstName = $_POST['firstname'];
        $lastName = $_POST['lastname'];
        $gender = $_POST['Gender'];
        $country = $_POST['country'];
        $phoneNumber = $_POST['phone'];

        // ... Validate common fields here ...

        if ($category === 'user') {
            // Process user account registration
            $dbcon->execute("INSERT INTO user (fname, lname, country, ) VALUES (?, ?, ?, ?, ?)",
                            [$firstName, $lastName, $gender, $country, $phoneNumber]);
        } elseif ($category === 'developer') {
            // Developer-specific fields
            $skills = $_POST['skills'];
            $experience = $_POST['experience'];

            // ... Validate developer-specific fields here ...

            // Process developer account registration
            $dbcon->execute("INSERT INTO developer (first_name, last_name, gender, country, phone, skills, experience) VALUES (?, ?, ?, ?, ?, ?, ?)",
                            [$firstName, $lastName, $gender, $country, $phoneNumber, $skills, $experience]);
        } else {
            // Handle unexpected category value
        }

        // ... Redirect to a success page or back to the form with messages ...
    }
}


