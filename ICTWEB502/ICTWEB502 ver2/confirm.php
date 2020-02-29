<!DOCTYPE html>

<html>
 <head></head>
 
<body>

<?php
 echo "<h1>Confirmation page</h1>";
 echo "<b>".$_POST['fname']." ".$_POST['lname']."</b>"."<br/>";
 echo $_POST['email']."<br/>";
 echo $_POST['phone']."<br/>";
 echo "<p/>";
 echo "<b>Address:</b>"."<br/>";
 echo $_POST['addr_unit']." / ".$_POST['addr_str_no']."<br/>";
 echo $_POST['str_name']." ". $_POST['str_type']."<br/>";
 echo $_POST['suburb']."<br/>";
 echo $_POST['postcode']."<br/>";
 echo $_POST['state'];
 echo "<p/>";
 echo "<h2>Thank you for your order.</h2>";
 
?>

</body>

</html>