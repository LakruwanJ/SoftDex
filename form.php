<!DOCTYPE html>
<html>
<head>
    <title>Form Example</title>
</head>
<body>

<form method="post" action="process_form.php">
    <label for="name">Name:</label>
    <input type="text" name="name" id="name" required>

    <label for="email">Email:</label>
    <input type="email" name="email" id="email" required>

    <input type="submit" name="submit" value="Submit">
</form>

</body>
</html>
