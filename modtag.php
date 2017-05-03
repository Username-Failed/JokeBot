<?php
    $altOk = true;

    if(empty($_POST["joke"])) {
        $altOk = false;
        echo "Error: joke missing </br>";
    } else {
    	if (strpos($_POST["joke"], ";") !== false) {
	    	$altOk = false;
		    echo "Error: \";\" is not legal </br>";
    	}
    }

    if ($altOk == true) {
    echo "Thank you for your joke, it will now be sent to our database. </br>";
    echo "Joke: " . strip_tags($_POST["joke"]) . "</br>";

    include("config.php");

    if ($dbc = mysql_connect (DBHOST, DBUSER, DBPW)) {
        if(!mysql_select_db(DBNAME)) {
            trigger_error("Couldn't select database</br>MySQL Error: " . mysql_error());
            exit();
        }
    } else {
        trigger_error("Could not connect to MySQL</br>MySQL Error: " . mysql_error());
        exit();
    }

    $query = "INSERT INTO chuck (joke) VALUES ('" . strip_tags($_POST["joke"]) . "')";

    $result = mysql_query($query) or trigger_error("Query</br>MySQL Error: " . mysql_error());

    } else {
        echo "Please fix the error(s) on the site before </br>";
    }
?>

<form action="changedatabase.php" method="GET">
    <input type="submit" value="Back to overview" />
</form>