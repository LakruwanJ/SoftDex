<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Line Count Calculator</title>
</head>
<body>
    <h1>Line Count Calculator</h1>
    <button onclick="calculateLineCount()">Calculate Line Count</button>
    <p>Total Lines: <?php $line?><span id="lineCount">0</span></p>

    <script>
        let lineCountResult = 0;

        function calculateLineCount() {
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
            xhr.open('GET', 'Search.php', true);
            xhr.send();
        }
    </script>
</body>
</html>
