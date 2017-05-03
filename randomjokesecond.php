<?php

    function testForLastJoke($jokeId, $lastJoke, $jokeArray) {
        if ($jokeId == $lastJoke['lastJoke']) {
            $jokeId = array_rand($jokeArray, 1);
            //echo "Value Changed <br />";
            $jokeId = testForLastJoke($jokeId, $lastJoke, $jokeArray);
        }
        return $jokeId;
    }

    session_start();

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

    $key = array_rand($array, 1);

    $key = testForLastJoke($key, $_SESSION['lastJoke'], $array);

    echo "<h1>" . $array[$key] . "</h1>";

    $_SESSION['lastJoke'] = $key;

    /*
    if (mysql_num_rows($jokeResult) > 0) {
        // output data of each row
        while($row = mysql_fetch_assoc($jokeResult)) {
            echo "id: " . $row["id"]. " - Joke: " . $row["joke"] . "<br>";
        }
    } else {
        echo "0 results";
    }
    */
    mysql_close($dbc);
?>

<br />
<a href="randomjokesecond.php">Click to get a new joke</a>