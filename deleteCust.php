<!-- intro similar to others, includes meta charset, title, and connects to db -->
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
	$cusID = $_POST['cusID']; //get cus id from form
	echo 'Attempting to Delete Customer ' . $cusID . '<br>';
	$query1 = 'DELETE FROM purchases WHERE cusID = "'.$cusID.'"'; //creat query to delete purchases at cusID (instead of a cascade delete table, did it manually)
	mysqli_query($connection,$query1); 	//get results
	$query2= 'DELETE FROM customer WHERE cusID = "'.$cusID.'"'; //query to delete customer at cusID now that purchases are gone
	$result=mysqli_query($connection,$query2); //get results
    	if (!$result) {
         die("database query2 failed.");
        }
	echo 'Customer: ' . $cusID . ' has been removed from the database' . '<br>'; //prnt customer who was deleted
?>



<?php
   mysqli_close($connection);
?>

<a href="http://cs3319.gaul.csd.uwo.ca/vm166/assignment3/home.php">Return to home</a> <!-- return to home -->

</body>
</html>
