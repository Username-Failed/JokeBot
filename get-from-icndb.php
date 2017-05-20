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

// Amount set to higher than the number of jokes (to retrieve all)
$amount = 12345;
if (isset($argv[1])) {
    $amount = (int) $argv[1];
}
if (!$amount) {
    $amount = 1;
}

$ch = curl_init();
curl_setopt_array($ch, array(
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => 'http://api.icndb.com/jokes/random/'.((string) $amount)
));
$json = curl_exec($ch);
curl_close($ch);

$data = json_decode($json);


if ($dbc = mysql_connect(DBHOST, DBUSER, DBPW)) {

    if(!mysql_select_db(DBNAME)) {
        trigger_error("Could not select the database!<br />MySQL Error: " . mysql_error());
        exit();
    }
} else {
    trigger_error("Could not connect to MySQL!<br />MySQL Error: " . mysql_error());
    exit();
}

foreach ($data->value as $joke) {
    $joke_msg = $joke->joke;
	
	echo "<hr>Preparing to insert: " . $joke_msg;
	
	$query = "INSERT INTO chuck (joke) VALUES ('" . addslashes($joke_msg) . "')";

    $result = mysql_query($query) or trigger_error("Query</br>MySQL Error: " . mysql_error());

   
}

echo "<hr>All jokes added to DB!";