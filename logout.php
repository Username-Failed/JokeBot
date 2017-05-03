<?php
session_start();
$_SESSION['validToken'] = false;
//session_destroy();
header("Location: login.php");
?>