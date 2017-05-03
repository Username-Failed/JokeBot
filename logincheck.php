<?php
    if($_POST["user"] == "admin") {
        if($_POST["password"] == "password") {
            header("Location: changedatabase.php");
        } else {
            echo "Incorrect Username and/or Password";
            exit();
        }
    } else {
        echo "Incorrect Username and/or Password";
        exit();
    }
?>