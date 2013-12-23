<?php
session_start();
unset($_SESSION['user']);
unset($_SESSION);
header("location:index.php");
?>
