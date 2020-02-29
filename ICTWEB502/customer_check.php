<!DOCTYPE html>

<html>
<head></head>
<body>
<?php
$connection = new mysqli("localhost", "root", "", "clients");
if ($connection->connect_error){ die("Connection failed : " . $connection->connect_error );}

else {
echo "Connection Successful <br/>";

$match = false;

echo $_POST['fname'];
echo "<br/>";
echo $_POST['email'];
echo "<br/>";
echo $_POST['phone'];
echo "<br/>";

$sql_string = "SELECT * FROM clients.customer";
$match = false;
$result = mysqli_query($connection, $sql_string);

 while ($row = mysqli_fetch_assoc($result)) {
    
			 if (($row['customerName'] === $_POST['fname']) & ($row['customerEmail'] === $_POST['email']) & ($row['customerContact'] === $_POST['phone'])){
				 $match = true;
			 }
			 
 }//while
 
 if ($match === false){
	 echo "<br/>";
	 echo "This is a new cusomer";
	 // insert code here to insert a new customer in to the CUSTOMER table of your database
	 // insert a new booking for this customer under the BOOKINGS table of your database
 }
 else {
	 echo "<br/>";
	 echo "This is an existing cusomer";
	 // insert a new booking for this customer under the BOOKINGS table of your database

 }
}

//$connection->query("INSERT INTO clients.clients (first_name, last_name, email_address, phone_number) VALUES ('". $_POST["fname"] ."' ,'". $_POST["lname"] ."', '" . $_POST["email"] ."', ". intval($_POST["phone"]) .")");
//echo $connection->error;




?>
</body>
</html>