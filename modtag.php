<?php
    $altOk = true;

    if(empty($_POST["joke"])) {
        $altOk = false;
        echo "Fejl: joke mangler </br>";
    } else {
    	if (strpos($_POST["joke"], ";") !== false) {
	    	$altOk = false;
		    echo "Fejl: \";\" er ikke tilladt </br>";
    	}
    }

    if ($altOk == true) {
    echo "Tak for din joke. Oplysningerne herunder vil sendes til vores database. </br>";
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
        echo "Ret venligst fejlen(e) p&aring; forrige side </br>";
    }
?>

<form action="changedatabase.php" method="GET">
    <input type="submit" value="Tilbage til forside" />
</form>