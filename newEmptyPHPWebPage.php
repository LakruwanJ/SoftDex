<!DOCTYPE html>
<html>
<head>
    <title>Print Query String Value</title>
</head>
<body>
    <?php
    // Check if the 'search' parameter exists in the query string
    if (isset($_GET['search'])) {
        $searchValue = $_GET['search'];
        echo "<p>Search value: $searchValue</p>";
    }

    // Check if the 'sort' parameter exists in the query string
    if (isset($_GET['sort'])) {
        $sortValue = $_GET['sort'];
        echo "<p>Sort value: $sortValue</p>";
    }
    ?>
</body>
</html>
