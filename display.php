<html>
<head>
    <link rel="stylesheet" type="text/css" href="resources/css.css" media = "screen" />
	</head>
<body>
	<center>
	<p><a href = "http://web-students.armstrong.edu/~ps4843/form.php">Link back to form</a>
</p>



</center>
<p>
	<h3>
		List of current armstrong acm student chapter members:
	</h3>
</p>

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
echo "Connected successfully <br><br>";



$mydb = mysqli_select_db($conn, 'ps4843');



$query="SELECT * FROM acm_data";
$result=mysqli_query($conn, $query);

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


?>

<p><a href = "http://web-students.armstrong.edu/~ps4843/search.php"> Click here to search the database by last name</a> </p>
</body>
</html>