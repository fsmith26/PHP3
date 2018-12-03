<!DOCTYPE html>    <!-- header info of meta char, title, and connecting to the db -->
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
	$customer= $_POST["cusID"]; //get cusID from form
	$product= $_POST["prodID"]; //get prodID from form
	$purchased= $_POST["quantity"]; //and also get quantity from the form (a lot of forms to ensure valid inputs)
	$exists = 0; //variable decleration
	$update = 0;
if($purchased <= '0'){ //check if quantity is less than 0
	echo '<h1> ERROR: CANNOT HAVE NEGATIVE OR 0 QUANTITY </h1>';//print if negative
	?><a href="http://cs3319.gaul.csd.uwo.ca/vm166/assignment3/home.php">Return to home</a> <?php // link back to home
	echo '<br>';
	die("^Please Try Again");
}


$query = "SELECT * FROM purchases"; //query to get purchases
$result = mysqli_query($connection, $query);
if (!$result) {
         die("database query2 failed.");
     }
while ($row = mysqli_fetch_assoc($result)) { //for each row, check if purchase exists
        if ($row["cusID"] == $customer && $row["prodID"] == $product) {
                echo 'Duplicate keys found <br>'; //if already exists
		$exists = 1;	//mark as existing
		echo 'Checking Quantity <br>'; 
                if($row["Quantity"] < $purchased){ //if Quantity given is higher than that in DB
			echo 'Quantity is higher than in DB, updating <br>';
			$update = 1; //mark update as true
                }
		else if($row["Quantity"] >= $purchased){ //if smaller, do nothing, cant go down in quantity
			echo 'Quantity given is smaller than in DB, doing nothing';	
		}
	}       
}


if ($exists == 0){ //if does not exist in Db yet
	$query = 'INSERT INTO purchases values("'.$customer.'","'.$product.'","'.$purchased.'")'; //query to insert purchase
	if (!mysqli_query($connection, $query)) {
        	die("database query2 failed.");
	}
	$result=mysqli_query($connection,$query); //get results

echo "<h1> SUCCESS, customer: $customer has purchased $purchased of item#: $product"; //print confirmation
}

elseif ($exists == 1 && $update == 1){ //if exists and need to update,
	$query = 'UPDATE purchases SET Quantity = '.$purchased.' WHERE cusID = "'.$customer.'"   AND prodID = "'.$product.'" '; //update instead of insert
	mysqli_query($connection,$query); //run query
	echo $query;
	echo '<br>';
	echo 'Quantity updated to ' . $purchased; //print confirmation
		}

?>

<?php
   mysqli_close($connection);
?>
<a href="http://cs3319.gaul.csd.uwo.ca/vm166/assignment3/home.php">Return to home</a> <!-- link to home page -->

</body>
</html>
