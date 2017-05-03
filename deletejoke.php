<?php

include("checkforsession.php");

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

$command = "DELETE FROM chuck WHERE id = " . $_GET['jokeId'];

mysql_query($command);

header("Location: changedatabase.php");

?>