<!DOCTYPE html>
<html>
<head>
    <title>Thank You</title>
</head>
<body>

<?php
// Check if the name is present in the query string
if (isset($_GET['name'])) {
    $name = $_GET['name'];
    echo "<h1>Thank You, $name!</h1>";
    echo "<p>Your form has been submitted successfully.</p>";
} else {
    echo "<h1>Thank You!</h1>";
    echo "<p>Your form has been submitted successfully.</p>";
}
?>

</body>
</html>
