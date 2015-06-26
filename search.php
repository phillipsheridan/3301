

<!DOCTYPE html>
<html>
<head>
	<title> Search Members
	</title>
	<link rel = "stylesheet" type = "text/css" href = "resources/css.css" media = "screen"/>
</head>
<p><body>
	<h3> Search Members <h3>
		<br><p> Search by last name. </p>
		<form method = "post" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
			<input type = "text" name = "lastName">
			<input type = "submit" name = "submit" value = "Search">
		</form>
<?php


$servername = "";
$username = "ps4843";
$password = "ZVDihC7K";
$db_name = "ps4843";
$table = "acm_members";





// Create connection
$conn = new mysqli($servername, $username, $password, $db_name);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "";



$mydb = mysqli_select_db($conn, 'ps4843');


if(isset($_POST['submit'])) {
	if (preg_match("/^[ a-zA-Z]+/", $_POST['lastName'])) {
		$lastName = $_POST['lastName'];

		$search = "SELECT id, firstName, 
	lastName, email, major, dateJoined, grandfathered, paid FROM acm_data 
WHERE lastName LIKE '%".$lastName."%';";

$result = mysqli_query($conn, $search);

echo "<table>";

echo "<table border = '1'>
<th>ID</th>
<th>First Name</th>
<th>Last Name</th>
<th>Email</th>
<th>Date Joined</th>
<th>Major</th>
<th>Grandfathered?</th>
<th>Paid?</th>  
";

if ($result->num_rows > 0) {
     // output data of each row
     while($row = $result->fetch_assoc()) {
         echo "<tr><td>". $row["id"]. "</td><td>". 
         $row["firstName"]. "</td><td>" . $row["lastName"] . "</td><td>" . $row["email"] . "</td><td>"
         . $row["dateJoined"] . "</td><td>" . $row["major"] . "</td><td>" . $row["grandfathered"] . "</td><td>"
         . $row["paid"] ."</td></tr> ";
     }
} else {
     echo "0 results";
}

echo "</table>";

$conn->close();


	}
}
?>

<p><a href = "http://web-students.armstrong.edu/~ps4843/form.php"> Click here to return to form</a> </p>

<p><a href = "http://web-students.armstrong.edu/~ps4843/display.php"> Click here to return to list of all members</a> </p>
</body>
</html>