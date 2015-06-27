<!DOCTYPE html>
<html>

<head>
	<title>
	Submit Form
	</title>
<link rel="stylesheet" type="text/css" href="resources/css.css">
	<style>

body {
  color: white;
    background-color: black;
    font-family: AppleGothic, Helvetica, Times;
}

.error {
	color: #FF0000;
}
table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
}
th, td {
    padding: 5px;
    text-align: left;    
}
img {
  
  float: top;
}
</style>
	</head>
<body>
	

  <br>
  </br>
	
	<center>
    <img src ="https://pbs.twimg.com/profile_images/338674000/acm2.jpg" alt = "acm logo" height = "100" width = "100">
		<h1>Welcome ACM administrator! Add a member's info below. </h1>
    
    <br>
    </br>

    <p class= "error"> * required</p>


<?php



$servername = "";
$username = "ps4843";
$password = "ZVDihC7K";
$db_name = "ps4843";
$table = "acm_members";
$valid = true;
$date_regex = '/^(19|20)\d\d[\-\/.](0[1-9]|1[012])[\-\/.](0[1-9]|[12][0-9]|3[01])$/';



// Create connection
$conn = new mysqli($servername, $username, $password, $db_name);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "";



$mydb = mysqli_select_db($conn, 'ps4843');


$firstNameErr = $lastNameErr = $emailErr = $majorErr = $dateJoinedErr = $grandfatheredErr = $paidErr = "";
$firstName = $lastName = $email = $major = $dateJoined = $grandfathered = $paid = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $firstName = test_input($_POST["firstName"]);
  $lastName = test_input($_POST["lastName"]);
  $email = test_input($_POST["email"]);
  $major = test_input($_POST["major"]);
  $dateJoined = test_input($_POST["dateJoined"]);
  $grandfathered = test_input($_POST["grandfathered"]);
  $paid = test_input($_POST["paid"]);
}




if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["firstName"])) {
    $firstNameErr = "First name is required";
    $valid = false;
  } 
  else if (!preg_match("/^[a-zA-Z]*$/",$POST["firstName"])){
  	$firstNameErr = "Only letters and white space allowed";
  	$valid = false;

}
  	else {
    $firstName = test_input($_POST["firstName"]);
  }
if (empty($_POST["lastName"])) {
    $lastNameErr = "Last name is required";
    $valid = false;
  } else if (!preg_match("/^[a-zA-Z]*$/",$POST["lastName"])){
  	$lastNameErr = "Only letters and white space allowed";
  	$valid = false;
  }
  else {
    $lastName = test_input($_POST["lastName"]);
  }


  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
    $valid = false;
  } else if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
  	$emailErr = "Invalid email format";
  	$valid = false;
  }
  else {
    $email = test_input($_POST["email"]);
  }


  if (empty($_POST["major"])) {
    $majorErr = "Major is required";
    $valid = false;
  } 
  else if (!preg_match("/^[a-zA-Z]*$/",$POST["major"])) {
  	$majorErr = "Only letters and white space allowed";
  	$valid = false;
  }
  else {
    $major = test_input($_POST["major"]);
  }


  if (empty($_POST["dateJoined"])) {
    $dateJoinedErr = "Date joined is required";
    $valid = false;
  } else if (!preg_match($date_regex, $dateJoined)) {
    $dateJoinedErr = "Your date joined does not match the format given";
    $valid = false;

  } else {
    $dateJoined = test_input($_POST["dateJoined"]);
  }


  if (empty($_POST["grandfathered"])) {
    $grandfatheredErr = "true or false is required";
    $valid = false;
    
  } 
  else {
    $grandfathered = test_input($_POST["grandfathered"]);
  }
 

  if (empty($_POST["paid"])) {
    $paidErr = "true or false is required";
    $valid = false;
  }
  

  else {
    $paid = test_input($_POST["paid"]);
  }
}

function test_input($data) {
  $data = trim($data);
  $data = htmlspecialchars($data);
  $data = stripslashes($data);
  return $data;
} 


?>		


<form action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method = "POST">
	<table border="1" style="width:100%" >
		
			<tr>
				<td>First Name: </td>
				<td>
			<input type = "text" name = "firstName" value = "<?php echo $firstName;?>"> <span class="error">* <?php echo $firstNameErr;?></span>
		</td>
			</tr>
			<tr>
				<td>Last Name: </td>
				<td>
			<input type = "text" name = "lastName" value = "<?php echo $lastName;?>"> <span class="error">* <?php echo $lastNameErr;?></span>
		</td>
			</tr>
			<tr>
				<td>Email: </td>
				<td>
			<input type = "text" name = "email" value = "<?php echo $email;?>"> <span class="error">* <?php echo $emailErr;?></span>
		</td>
			</tr>
			
			<tr>
				<td>Major: </td>
				<td>
			<input type = "text" name = "major" value = "<?php echo $major;?>"> <span class="error">* <?php echo $majorErr;?></span>
		</td>
			</tr>
			<tr>
				<td>Date Joined: </td>
				<td><input type = "text" name = "dateJoined" value = "<?php echo $dateJoined;?>"> <span class="error">*(YYYY-MM-DD) <?php echo $dateJoinedErr;?></span>
			
		</td>
			</tr>
			<tr>
				<td>Grandfathered?: </td>
				<td><input type = "text" name = "grandfathered" value = "<?php echo $grandfathered;?>"> <span class="error">* <?php echo $grandfatheredErr;?></span>
			

		</td>
			</tr>
            <tr>
                <td>Paid?: </td>
                <td><input type = "text" name = "paid" value = "<?php echo $paid;?>"> <span class="error">* <?php echo $paidErr;?></span>
            

        </td>
            </tr>
			
	</table>
	<p><input type ="submit" value="submit"></p>
</form>


<br/>
<br/>




<span>
<?php



if ($valid and $_SERVER['REQUEST_METHOD'] == 'POST') {

	
echo "<h2>Your Input:</h2>";
echo "Name: " . $firstName . " " . $lastName;
echo "<br>Email: ";
echo $email;
echo "<br>Major: ";
echo $major;
echo "<br>Date Joined: ";
echo $dateJoined;
echo "<br>Grandfathered: ";
echo $grandfathered;
echo "<br>Paid: ";
echo $paid;





if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
    
$add = "INSERT INTO acm_data (firstName, 
	lastName, email, major, dateJoined, grandfathered, paid) 
VALUES ('$firstName', '$lastName', '$email', '$major', 
	'$dateJoined', '$grandfathered','$paid');";

$result = mysqli_query($conn, $add);

if ($result = true) {
    echo "<br><br>New record created successfully. Due to time constraints, do not refresh unless fields have been changed";
} else {
    echo "Error: " . $add . "<br>" . mysqli_error($conn);
}

}
mysqli_close($conn);


?>
</span>

<p><a href = "http://web-students.armstrong.edu/~ps4843/search.php"> Click here to search the database by last name</a> </p>

<p>
    <a href = "http://web-students.armstrong.edu/~ps4843/display.php">
    Click for list of current members in the database</a>
  </p>
</center>


</body>
</html>