<?php

session_start();

if($_SESSION['validToken'] == false) {
    echo "<h1>Access Denied</h1>";
    echo "<form action='login.php' method='GET'>";
    echo "<input type='submit' value='Go to Login'>";
    echo "</form>";
    exit();
}

?>