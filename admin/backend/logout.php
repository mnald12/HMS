<?php
session_start();

unset($_SESSION['username']);
$_SESSION['login-message'] = "You have been logged out!";

session_destroy();

header('location: ../index.php');

?>