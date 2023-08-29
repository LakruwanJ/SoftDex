<?php

namespace Classes;

if (isset($_COOKIE['schWord'])) {
    unset($_COOKIE['schWord']);
}

if (isset($_COOKIE['schOpPl'])) {
    unset($_COOKIE['schOpPl']);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["searchbar"])) {
        setcookie(schWord, $_POST["searchbar"]);
        header("Location: pages.php?page=Search.php");
    } else {
        header("Location: pages.php");
    }
} else {
    header("Location: index.php");
}  