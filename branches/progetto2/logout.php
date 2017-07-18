<?php
session_start();
unset($_SESSION['loginlev']);
header('location: home.php');
?>