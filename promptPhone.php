<!DOCTYPE html>  <!-- Start of file, includes meta char, titile, and connect to DB -->
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
	$custID = $_POST["cusID"];  //get customer id from form
	$query = 'SELECT * FROM customer WHERE cusID = '.$custID.' '; //query to find the customers info
	$result=mysqli_query($connection,$query);
        if (!$result) {
        	die("database query2 failed.");
        }
	$row=mysqli_fetch_assoc($result); //get result
	echo "Would you like to change the Phone number of customerID: " . $custID; //write text to prompt phone change
	echo '<br>';
	echo 'Current Phone: ' . $row['phonenumber']; 	// print current phone numer
?>

<form action='updatePhone.php' method="post"> <!--create form to ACTUALLY change phone number-->
New Customer Phone Number: <br>
(Please format as ###-####)
<input type="text" name="newphone" pattern= "[0-9]{3}-[0-9]{4}"><br> <!--create text input that only allows phone number formatted input-->
<?php
	$custID = $_POST["cusID"];  // get customer ID to send to form as well
	echo '<input type="hidden" name="cusID" value= "'.$custID.'">'; // make it a hidden input so it is not shown
?>
</form> <!--form is sent to updatePhone.php, which actually changes -->

<?php
   mysqli_close($connection);
?>

<a href="http://cs3319.gaul.csd.uwo.ca/vm166/assignment3/home.php">Return to home</a>

</body>
</html>
