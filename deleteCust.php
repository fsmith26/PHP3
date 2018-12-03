
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
	$cusID = $_POST['cusID'];
	echo 'Attempting to Delete Customer ' . $cusID . '<br>';
	$query1 = 'DELETE FROM purchases WHERE cusID = "'.$cusID.'"';
	mysqli_query($connection,$query1); 
	$query2= 'DELETE FROM customer WHERE cusID = "'.$cusID.'"';
	echo $query2;
	$result=mysqli_query($connection,$query2);
    	if (!$result) {
         die("database query2 failed.");
        }
	echo 'Customer: ' . $cusID . ' has been removed from the database' . '<br>';
?>



<?php
   mysqli_close($connection);
?>

<a href="http://cs3319.gaul.csd.uwo.ca/vm166/assignment3/home.php">Return to home</a>

</body>
</html>
