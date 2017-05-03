<?php

/*
Edit the config.php.template file before you can use this script
 */
$configDone = false;

include("config.php");

if($configDone == false) {
    echo "Error: Config File not made";
    exit();
}

if ($dbc = mysql_connect(DBHOST, DBUSER, DBPW)) {

    if(!mysql_select_db(DBNAME)) {
        trigger_error("Could not select the database!<br />MySQL Error: " . mysql_error());
        exit();
    }
} else {
    trigger_error("Could not connect to MySQL!<br />MySQL Error: " . mysql_error());
    exit();
}
$jokeSQL = "UPDATE chuck SET joke = '" . $_POST['joke'] ."' WHERE id = " . $_POST['jokeId'];

mysql_query($jokeSQL);

header("Location: changedatabase.php");
?>