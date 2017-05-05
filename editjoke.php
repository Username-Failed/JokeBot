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
$jokeSQL = "SELECT joke FROM chuck WHERE id = " . $_GET['jokeId'];

$jokeText = mysql_query($jokeSQL);

$array = array();

while($row = mysql_fetch_array($jokeText)) {
    $array[] = $row["joke"];
}

?>

<h1>Edit Joke</h1>
<form action="editedjoke.php" method="POST">
    Joke:
    <br />
    <textarea name="joke" cols="50" rows="10"><?php echo $array[0] ?></textarea>
    <br />
    <input type="submit" value="Edit Joke">
    <input type="hidden" name="jokeId" value="<?php echo $_GET['jokeId'] ?>">
</form>

<?php
function startsWith($haystack, $needle)
{
    $length = strlen($needle);
    return (substr($haystack, 0, $length) === $needle);
}

if(startsWith($array[0], "http")) {
    echo "<img src='" . $array[0] . "'>";
}
?>