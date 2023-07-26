<!DOCTYPE html>
<html>
<head>
    <title>JavaScript to PHP on One Page</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

</head>
<body>
    <h1>Save JavaScript Variable into PHP Variable</h1>
    <button onclick="calculateLineCount('Search.php')">Calculate Line Count</button>

    <button onclick="saveToPhp()" >Save to PHP</button>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['lineCount'])) {
        // Get the JavaScript variable value from the AJAX request and store it in a PHP variable
        $phpVariable = $_POST['lineCount'];
        
        // Use the $phpVariable in PHP as needed (e.g., save it to a file, store in a database, etc.)
        // For this example, we'll simply display the value below:
        echo "<p>PHP Variable Value: $phpVariable</p>";
    }
    ?>

    <script>
        // JavaScript variable to be sent to PHP
        let lineCountResult = 0;

        function calculateLineCount(page) {
            const xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function () {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        const content = xhr.responseText;
                        lineCountResult = content.split('\n').length;
                        document.getElementById('lineCount').textContent = lineCountResult;                        
                    } else {
                        alert('Error fetching the PHP file. Please try again.');
                    }
                }
            };
            xhr.open('GET', page, true);
            xhr.send();
        }

        function saveToPhp() {
            // Create a hidden form and append the JavaScript value as a field
            document.write(lineCountResult);
            var form = document.createElement('form');
            form.method = 'post';
            form.style.display = 'none';
            document.body.appendChild(form);

            var input = document.createElement('input');
            input.type = 'hidden';
            input.name = 'jsVariable';
            input.value = lineCountResult;
            form.appendChild(input);

            // Submit the form to the same page
            form.submit();
        }
        
        </script>
        
        <?php
$lines = "Result: "."<script>document.writeln(lineCountResult);</script>";
echo $lines;
?>
</body>
</html>
