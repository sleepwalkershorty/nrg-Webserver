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
	$name = $_POST['name'];
	json_decode($name);
	$device = $_POST['device'];
	json_decode($device);
	$imei = $_POST['imei'];
	json_decode($imei);
	$country = $_POST['country'];
	json_decode($country);
	$gender = $_POST['gender'];
	json_decode($gender);
	
	$sql = "INSERT INTO users (name, device, imei, country, gender)
	VALUES ('$name', '$device', '$imei', '$country', '$gender')";
	
	if (mysqli_query($con, $sql))
	{
		if ($result = mysqli_query($con, "SELECT * FROM users"))
		{
			$highscores = array();
			if(mysqli_num_rows($result) > 0) {
				while($highscore = mysqli_fetch_assoc($result)) {
					$highscores[] = array('highscore'=>$highscore);
				}
			}

			echo json_encode(array('highscores'=>$highscores));
			
			
			// $response = array();
			// $response["highscores"] = array();
			// 
			// $highscores = array();
			// 
			// while ($row = mysqli_fetch_assoc($result))
			// {
				// $highscores["name"] = $row['name'];
			// }
			// 
			// array_push( $response["highscores"], $highscores);
			// echo json_encode($response);
		}
		else
		{
			echo "Error: " . $sql . "<br>" . mysqli_error($con);
		}
	} 
	else 
	{
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
