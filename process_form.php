<!DOCTYPE html>
<html>
<head>
    <title>Thank You</title>
</head>
<body>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Process the form data here
    $name = isset($_POST["name"]) ? htmlspecialchars($_POST["name"]) : "";
    $email = isset($_POST["email"]) ? htmlspecialchars($_POST["email"]) : "";

    // Perform any necessary actions with the form data (e.g., save to database, send email)

    // Redirect the user to the thank-you page with name in the query string
    header("Location: pages.php?page=Search.php");
    exit;
}
?>

</body>
</html>
