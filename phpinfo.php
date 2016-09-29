<?php

$mysql_hostname = "localhost";
$mysql_user = "root";
$mysql_password = "stephenking";
$mysql_database = "geo_hero";

$con = mysqli_connect($mysql_hostname, $mysql_user, $mysql_password, $mysql_database);

// Check connection
    if (!$con)
    {
        die('Could not connect: ' . mysql_error());
    }

$result = mysql_query("SELECT * FROM users")
    or die (mysql_error());

    while($row = mysql_fetch_array($result))
    { echo $result; 
        echo "You are successfully connected";
        $_SESSION["authenticated"] = true;
        exit;
    }

    mysql_close($con);
?>
