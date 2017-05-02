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

    $jokeResult = mysql_query("SELECT * FROM chuck");

    $array = array();

    while($row = mysql_fetch_array($jokeResult)) {
        $array[] = $row["joke"];
        //echo $row["joke"];
    }

     foreach($array as $key => $value) {
        echo $key + 1 . ". " . $value;
        echo "<br /><br />";
    }

     echo "<form action='createjoke.php' method='GET'>";
     echo "<input type='submit' value='Add Joke'>";
     echo "</form>";
?>