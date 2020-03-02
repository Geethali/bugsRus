<!DOCTYPE html>
<html>
<head></head>
<body>

<p style="font-family:algeria; font-size:200%;">CONFIRMATION PAGE</p><br>

<table>
 <tr><td>Name</td><td><?php echo $_POST['fname'] ?></td> </tr>
 <tr><td>email</td><td><?php echo $_POST["email"] ?></td> </tr>
 <tr><td>Contact</td><td><?php echo $_POST["contact"] ?> </td> </tr>
 <tr><td>Type of Pest Problem</td><td><?php echo $_POST["pest_type"] ?> </td> </tr>
 <tr><td>Date for Visit</td><td><?php echo $_POST["date"] ?> </td> </tr>
 <tr><td>Best Time</td><td><?php echo $_POST["best_time"] ?> </td> </tr>
 <tr><td>Comments</td><td><?php echo $_POST["comments"] ?> </td> </tr>
 <tr><td></td><td></td></tr>
</table>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bugsrus";

// Create connection
$conn = new mysqli( $servername, $username, $password, $dbname );
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$fname = $_POST["fname"];
$email = $_POST["email"];
$contact = $_POST["contact"];
$pest_type =$_POST["pest_type"];
$date =$_POST["date"];
$best_time =$_POST["best_time"];
$comments =$_POST["comments"];

$sql_string = "SELECT * FROM bugsrus.customer";
$match = false;
$result = mysqli_query($conn, $sql_string);

 while ($row = mysqli_fetch_assoc($result)) {
    
			 if (($row['customerName'] === $_POST['fname']) & ($row['customerEmail'] === $_POST['email']) & ($row['customerContact'] === $_POST['contact'])){
				 $match = true;
			 }
			 
 }//while
 
 if ($match === false){
	 echo "<br/>";
	 echo "This is a new customer";
	 // insert code here to insert a new customer in to the CUSTOMER table of your database
	 $sql = "INSERT INTO customer (customerName,customerEmail,customerContact) VALUES ('$fname','$email','$contact')";
     if ($conn->query($sql) === TRUE) {
		 echo "<br/>";
         echo "New customer created successfully\n";
     } else {
		 echo "<br/>";
         echo "Error: " . $sql . "<br>" . $conn->error;
     }
	 // insert a new booking for this customer under the BOOKINGS table of your database
 }
 else {
	 echo "<br/>";
	 echo "This is an existing customer\n";
	 // insert a new booking for this customer under the BOOKINGS table of your database

 }

$ssql_string = "SELECT * FROM bugsrus.service";
$sbsql_string = "SELECT customerID FROM bugsRus.customer where customerEmail='$email' AND customerContact='$contact'";
$smatch = 0;
$sresult = mysqli_query($conn, $ssql_string);
$sbresult = mysqli_query($conn, $sbsql_string);
$sbarray = mysqli_fetch_array($sbresult);
$custID = $sbarray['customerID'];

 while ($srow = mysqli_fetch_assoc($sresult)) {
    
			 if (($srow['serviceName'] === $_POST['pest_type'])){
				 $smatch = $srow['serviceCode'];
			 }
			 
 }

$sbsql = "INSERT INTO bugsrus.servicebooking (bookingDate,timeOfTheDay,comments,customerID,serviceCode) VALUES ( '$date','$best_time','$comments','$custID','$smatch')";
if ($conn->query($sbsql) === TRUE) {
		 echo "<br/>";
         echo "New booking created successfully\n";
     } else {
		 echo "<br/>";
         echo "Error: " . $sbsql . "<br>" . $conn->error;
     }

//echo $connection->error;

$conn->close();
	

?>


</body>
</html>