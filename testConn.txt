<?php
$servername = "";
$username = "ps4843";
$password = "ZVDihC7K";
$db_name = "ps4843";
$table = "acm_members";



// Create connection
$conn = new mysqli("", $username, $password, $db_name);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";



$mydb = mysqli_select_db($conn, 'ps4843');

$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$email = $_POST['email'];
$major = $_POST['major'];
$dateJoined = $_POST['dateJoined'];
$grandfathered = $_POST['grandfathered'];
$paid = $_POST['paid'];

$add = "INSERT INTO acm_table (firstName, 
	lastName, email, major, dateJoined, grandfathered, paid) 
VALUES ('$firstName', '$lastName', '$email', '$major', 
	'$dateJoined', '$grandfathered','$paid');";

$result = mysqli_query($conn, $add);

if ($result = true) {
    echo "New record created successfully";
} else {
    echo "Error: " . $add . "<br>" . mysqli_error($conn);
}


mysqli_close($conn);
?>