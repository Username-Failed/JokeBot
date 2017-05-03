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

    $text = $array[$key] . "";

    $_SESSION['lastJoke'] = $key;

    $result_json = array('color' => 'red', 'message' => $text, 'notify' => 'false', 'message_format' => 'text');
    //headers for not caching the results
    header('Cache-Control: no-cache, must-revalidate');
    header('Expires: Mon, Jul 26 1997 05:00:00 GMT');
    //headers to tell that the result is JSON
    header('Content-type: application/json');
    //send the result now
    echo json_encode($result_json);
    
    mysql_close($dbc);
?>