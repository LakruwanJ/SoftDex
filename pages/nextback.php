<html>

    <head>

        <title>Paging Next Previous Buttons</title>

        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-

              1">

    </head>

    <body>

        <?php
        require '../Classes/DbConnector.php';

use Classes\DbConnector;

$dbcon = new Classes\DbConnector;
$con = $dbcon->getConnection();
// rows per page
$rowsPerPage = 3;

// if $_GET
        if (isset($_GET['page'])) {
            $pageNum = $_GET['page'];
        } else
            $pageNum = 1;

// preceding rows
        $previousRows = ($pageNum - 1) * $rowsPerPage;

// the first, optional value of LIMIT is the start position
//the next required value is the number of rows to retrieve
        $query = "SELECT * FROM temp WHERE name='Abc' LIMIT $previousRows, $rowsPerPage";
        $pstmt = $con->prepare($query);
            $pstmt->execute();
            $result = $pstmt->fetchAll(PDO::FETCH_OBJ);

        echo "<table border=1>\n";
        echo "<tr><th>ID</th><th>Name</th></tr>";

// print the results
foreach ($result as $value) {
            echo "<tr><td>$value->ID</td><td>$value->name</td></tr>";
        }
        echo '</table>';

// Find the number of rows in the query
        $query = "SELECT COUNT(name) AS numrows FROM temp";
        $pstmt = $con->prepare($query);
            $pstmt->execute();
            $row = $pstmt->fetchAll(PDO::FETCH_OBJ);

//use an associative array
foreach ($row as $value) {
    $numrows = $value->numrows;
}
        
// find the last page number
        $lastPage = ceil($numrows / $rowsPerPage);

//we use ceil which rounds up the result, because if we have 4.2 as an answer, we'd need 5 pages.
        $phpself = $_SERVER['PHP_SELF'];

//if the current page is greater than 1, that is, it isn't the first page
//then we print first and previous links
        if ($pageNum > 1) {
            $page = $pageNum - 1;
            $prev = " <a href=\"$phpself?page=$page\" title=\"Page $page\">[Back]</a> ";
            $first = " <a href=\"$phpself?page=1\" title=\"Page 1\">[First Page]</a> ";
        } else {

//otherwise we do not print a link, because the current page is
//the first page, and there are no previous pages
            $prev = ' [Back] ';
            $first = ' [First Page] ';
        }

// We print the links for the next and last page only if the current page
//isn't the last page
        if ($pageNum < $lastPage) {
            $page = $pageNum + 1;
            $next = " <a href=\"$phpself?page=$page\" title=\"Page $page\">[Next]</a> ";
            $last = " <a href=\"$phpself?page=$lastPage\" title=\"Page $lastPage\">[Last Page]</a> ";
        }

//the current page is the last page, so we don't print links for
//the last and next pages, there is of course no next page.
        else {
            $next = ' [Next] ';
            $last = ' [Last Page] ';
        }

//We print the links depending on our selections above
        echo $first . $prev . " Showing page <bold>$pageNum</bold> of <bold>$lastPage</bold> pages " . $next . $last;
        ?>

    </body>

</html>