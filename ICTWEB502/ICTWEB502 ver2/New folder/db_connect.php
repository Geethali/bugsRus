<!DOCTYPE html>
<html>
<head></head>
<body>
	<table border="1">
		<tr>
			<td>CLIENT ID</td>
			<td>FIRST NAME</td>
			<td>LAST NAME</td>
			<td>EMAIL</td>
			<td>PHONE</td>
		</tr>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "clients";

// Create connection
$conn = new mysqli( $servername, $username, $password, $dbname );
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT client_id, client_fname, client_lname, email_address, phone FROM clients";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		$cid = $row["client_id"];
		$fname = $row["client_fname"];
		$lname = $row["client_lname"];
		$email = $row["email_address"];
		$tel = $row["phone"];
		
		echo "<tr><td>$cid</td><td>$fname</td><td>$lname</td><td>$email</td><td>$tel</td></tr>";
        //echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
    }
} else {
    echo "0 results";
}
$conn->close();
?>

	</table>
</body>
</html>