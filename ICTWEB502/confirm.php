<!DOCTYPE html>
<html>
<head></head>
<body>

Confirmation Page

<table>
<tr><td>Name</td><td><?php echo $_POST['fname'] ?></td> </tr>
 <tr><td>Last Name</td><td><?php echo $_POST["lname"] ?></td> </tr>
 <tr><td>email</td><td><?php echo $_POST["email"] ?></td> </tr>
 <tr><td>phone</td><td><?php echo $_POST["phone"] ?> </td> </tr>
 <tr><td>product 1</td><td></td> </tr>
 <tr><td></td><td></td> </tr>
 <tr><td>Address</td><td></td> </tr>
 <tr><td>Unit</td><td><?php echo $_POST["addr_unit"] ?></td> </tr>
 <tr><td>Street #</td><td><?php echo $_POST["addr_str_no"] ?></td> </tr>
 <tr><td>Street Name</td><td><?php echo $_POST["str_name"] ?></td> </tr>
 <tr><td>Street Type</td><td><?php echo $_POST["str_type"] ?></td> </tr>
 <tr><td>Suburb</td><td><?php echo $_POST["suburb"] ?></td> </tr>
 <tr><td>Postcode</td><td><?php echo $_POST["postcode"] ?> </td> </tr>
 <tr><td>State</td><td></td> </tr>
 </table>
	
<?php

// Create connection
$conn = new mysqli( "localhost", "root", "", "clients10" );
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$fname = $_POST["fname"];
$lname = $_POST["lname"];
$email = $_POST["email"];
$tel = $_POST["phone"];
		
$sql = "INSERT INTO clients (client_fname,client_lname,email_address,phone) VALUES ('$fname','$lname','$email','$tel')";
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>

<a href="db_connect.php">View Customer</a>
</body>
</html>