<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Fletchers assignment3</title>
</head>
<body>
<?php
include 'connectdb.php';
?>
<h1>Update Customer Phone</h1>

<?php 
	$custID = $_POST["cusID"]; 
	$query = 'SELECT * FROM customer WHERE cusID = '.$custID.' ';
	$result=mysqli_query($connection,$query);
        if (!$result) {
        	die("database query2 failed.");
        }
	$row=mysqli_fetch_assoc($result);
	echo "Would you like to change the Phone number of customerID: " . $custID;
	echo '<br>';
	echo 'Current Phone: ' . $row['phonenumber']; 	
?>

<form action='updatePhone.php' method="post">
New Customer Phone Number:<br>
(Please format as ###-####)
<input type="text" name="newphone" pattern= "[0-9]{3}-[0-9]{4}">><br>
<?php
	$custID = $_POST["cusID"]; 
	echo '<input type="hidden" name="cusID" value= "'.$custID.'" >';
?>
</form>

<?php
   mysqli_close($connection);
?>

<a href="http://cs3319.gaul.csd.uwo.ca/vm166/assignment3/home.php">Return to home</a>

</body>
</html>
