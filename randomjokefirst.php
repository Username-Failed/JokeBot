<html>
    <head>
        <title>Randomly selected Chuck Norris joke</title>    
    </head>

    <body>
        <?php
            $jokeId = rand(1, 3);

            if ($jokeId == 1) {
                echo "Chuck Norris doesn't need to shave. The hairs on his chin jump off from fear.";
            } elseif ($jokeId == 2) {
                echo "Chuck Norris can hear a silent fart.";
            } elseif ($jokeId == 3) {
                echo "Chuck Norris has never combed his hair...it surrenders everyday.";
            } else {
                echo "Error";
            }
        ?>
        <br />
        <a href="javascript:history.go(0)">Click to get a new joke</a>
    </body>
</html>