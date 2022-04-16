<?php

session_start();
session_destroy();
header("Location: main.php");

?>

<!-- php -S localhost:8000 -->