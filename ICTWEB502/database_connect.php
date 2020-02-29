<!DOCTYPE html>

<html>
<head></head>

<body>
<?php


$connection = new mysqli("localhost", "root", "", "clients");
if ($connection->connect_error){ die("Connection failed : " . $connection->connect_error );}
else {
echo "Connection Successful <br/>";
}
INSERT INTO table_name (column1, column2, column3, ...)
VALUES (value1, value2, value3, ...);



$result = mysqli_query($connection, "INSERT INTO clients.clients ('clientID', 'first_name', 'last_name', 'email_address', 'phone_number') VALUES (2,'John','Wick','john@wick.com',0401111111)");
While ($row =mysqli fetch assoc($result)) {
	
	               echo "ID: ".$row['clientID']."<br/> first name:".$row['fist name']. "<br/>
Last name:.$row['lastname']."<br/>:.$row['email address'];
            }//while
			
?>

</body>

</html>