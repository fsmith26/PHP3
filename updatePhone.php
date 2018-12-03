<!-- header of meta char, title, and connect to db -->
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
<?php	//this file takes the form, from an already formed php page
	$newnumb = $_POST["newphone"];	//get confirmed new phone from the form
	echo 'New phone number ' . $newnumb;
	echo '<br>';
	$cusID = $_POST["cusID"]; //get cusID from previous form
	echo 'CustomerID: ' . $cusID;
	$query = "UPDATE customer SET phonenumber = '$newnumb' WHERE cusID = '$cusID'"; //sql query to update db using cusID and new Phone num
    	$result=mysqli_query($connection,$query); //get results
    	if (!$result) {
         die("database query2 failed.");
     	}
	echo '<h1> SUCCESS, Phone number was changed to ' . $newnumb . '</h1>';  //print confirmation
?>

<a href="http://cs3319.gaul.csd.uwo.ca/vm166/assignment3/home.php">Return to home</a> <!-- include link back to home page -->


<?php
   mysqli_close($connection);
?>
</body>
</html>
