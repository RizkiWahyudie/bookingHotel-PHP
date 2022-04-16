<?php

session_start();
session_destroy();
header("Location: index.php");

?>

<!-- php -S localhost:8000 -->