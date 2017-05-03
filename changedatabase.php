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

    $jokeResult = mysql_query("SELECT * FROM chuck");

    $array = array();
    $idArray = array();

    while($row = mysql_fetch_array($jokeResult)) {
        $array[] = $row["joke"];
        $idArray[] = $row["id"];
        //echo $row["joke"];
    }

    echo "<table>";
    echo "<tr><td>id</td><td>Joke</td><td>Edit</td><td>Delete</td></tr>";

     foreach($array as $key => $value) {
        echo "<tr><td>" . $idArray[$key] . "</td><td>" . $value . "</td>";

        echo "<td><form action='editjoke.php' method='GET'>";
        echo "<input type='submit' value='Edit'>";
        echo "<input type='hidden' name='jokeId' value='" . $idArray[$key] . "'>";
        echo "</form></td>";

        echo "<td><form action='deletejoke.php' method='GET'>";
        echo "<input type='submit' value='Delete'onclick='if (!confirm(\"Do you really want to remove this Joke?\")) return false' >";
        echo "<input type='hidden' name='jokeId' value='" . $idArray[$key] . "'>";
        echo "</form></td>";
        echo "</tr>";
    }

     echo "</table>";

     echo "<form action='createjoke.php' method='GET'>";
     echo "<input type='submit' value='Add Joke'>";
     echo "</form>";
     
     echo "<br />";

     echo "<form action='logout.php' method='GET'>";
     echo "<input type='submit' value='Logout'>";
     echo "</form>";
?>