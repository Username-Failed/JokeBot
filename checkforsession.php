<?php

session_start();

if(empty($_SESSION['validToken'])) {
    echo "<h1>Access Denied</h1>";
    echo "<form action='login.php' method='GET'>";
    echo "<input type='submit' value='Go to Login'>";
    echo "</form>";
    exit();
}

?>