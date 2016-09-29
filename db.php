<?php

//phpinfo();

$mysql_hostname = "localhost:12346";
$mysql_user = "root";
$mysql_password = "stephenking";
$mysql_database = "geo_hero";

$con = mysqli_connect($mysql_hostname, $mysql_user, $mysql_password, $mysql_database);

// Check connection
    if (!$con)
    {
        die('Could not connect: ' . mysqli_connect_error());
    }

echo "Successfully connected to db!<br>";

// $result = mysqli_query($con, "SELECT * FROM users");
if ($result = mysqli_query($con, "SELECT * FROM users")) {
    printf("Select returned %d rows.\n", $result->num_rows);

    /* free result set */
    $result->close();
}

mysqli_close($con);
?>
