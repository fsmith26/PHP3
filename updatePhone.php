
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
<?php
	$newnumb = $_POST["newphone"];
	echo 'New phone number ' . $newnumb;
	echo '<br>';
	$cusID = $_POST["cusID"];
	echo 'CustomerID: ' . $cusID;
	$query = "UPDATE customer SET phonenumber = '$newnumb' WHERE cusID = '$cusID'";
    	$result=mysqli_query($connection,$query);
    	if (!$result) {
         die("database query2 failed.");
     	}
	echo '<h1> SUCCESS, Phone number was changed to ' . $newnumb . '</h1>';  
?>

<a href="http://cs3319.gaul.csd.uwo.ca/vm166/assignment3/home.php">Return to home</a>


<?php
   mysqli_close($connection);
?>
</body>
</html>
