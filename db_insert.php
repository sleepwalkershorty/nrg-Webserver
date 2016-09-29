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

//echo "Successfully connected to db!<br>";

// $result = mysqli_query($con, "SELECT * FROM users");

if (isset($_POST['name']))
{
	$jsonInput = $_POST['name'];
	json_decode($jsonInput);
	echo $jsonInput;

	$sql = "INSERT INTO users (name, device, imei, country, gender)
	VALUES ('$jsonInput', 'LG 401', '1524523', '31', '1')";

	if (mysqli_query($con, $sql)) {
    		echo "New record created successfully";
	} else {
    		echo "Error: " . $sql . "<br>" . mysqli_error($con);
	}

}


// if ($result = mysqli_query($con, "SELECT * FROM users")) {
//     printf("Select returned %d rows.\n", $result->num_rows);

    /* free result set */
//     $result->close();
//}

//$sql = "INSERT INTO users (name, device, imei, country, gender)
//VALUES ('John', 'LG 401', '1524523', '31', '1')";

//if (mysqli_query($con, $sql)) {
//    echo "New record created successfully";
//} else {
//    echo "Error: " . $sql . "<br>" . mysqli_error($con);
//}


mysqli_close($con);
?>
