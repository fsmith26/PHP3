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
	$customer= $_POST["cusID"];
	$product= $_POST["prodID"];
	$purchased= $_POST["quantity"];
	$exists = 0;
	$update = 0;
if($purchased <= '0'){
	echo '<h1> ERROR: CANNOT HAVE NEGATIVE OR 0 QUANTITY </h1>';
	?><a href="http://cs3319.gaul.csd.uwo.ca/vm166/assignment3/home.php">Return to home</a> <?php
	echo '<br>';
	die("^Please Try Again");
}


$query = "SELECT * FROM purchases";
$result = mysqli_query($connection, $query);
if (!$result) {
         die("database query2 failed.");
     }
while ($row = mysqli_fetch_assoc($result)) {
        if ($row["cusID"] == $customer && $row["prodID"] == $product) {
                echo 'Duplicate keys found <br>';
		$exists = 1;
		echo 'Checking Quantity <br>'; 
                if($row["Quantity"] < $purchased){
			echo 'Quantity is higher than in DB, updating <br>';
			$update = 1;
                }
		else if($row["Quantity"] >= $purchased){
			echo 'Quantity given is smaller than in DB, doing nothing';	
		}
	}       
}


if ($exists == 0){
	$query = 'INSERT INTO purchases values("'.$customer.'","'.$product.'","'.$purchased.'")';
	if (!mysqli_query($connection, $query)) {
        	die("database query2 failed.");
	}
	$result=mysqli_query($connection,$query);

echo "<h1> SUCCESS, customer: $customer has purchased $purchased of item#: $product";
}

elseif ($exists == 1 && $update == 1){
	$query = 'UPDATE purchases SET Quantity = '.$purchased.' WHERE cusID = "'.$customer.'"   AND prodID = "'.$product.'" '; // somehow get last val as int
	mysqli_query($connection,$query);
	echo $query;
	echo '<br>';
	echo 'Quantity updated to ' . $purchased;
		}

?>

<?php
   mysqli_close($connection);
?>
<a href="http://cs3319.gaul.csd.uwo.ca/vm166/assignment3/home.php">Return to home</a>

</body>
</html>
