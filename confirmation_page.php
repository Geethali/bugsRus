<!DOCTYPE html>
<html>
<head></head>
<body>

Confirmation Page

<table>
 <tr><td>Name</td><td><?php echo $_POST['fname'] ?></td> </tr>
 <tr><td>email</td><td><?php echo $_POST["email"] ?></td> </tr>
 <tr><td>Contact</td><td><?php echo $_POST["contact"] ?> </td> </tr>
 <tr><td></td><td></td></tr>
</table>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "geethali";

// Create connection
$conn = new mysqli( $servername, $username, $password, $dbname );
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$fname = $_POST["fname"];
$email = $_POST["email"];
$contact = $_POST["contact"];
		
$sql = "INSERT INTO customer (customerName,customerEmail,customerContact) VALUES ('$fname','$email','$contact')";
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>


</body>
</html>