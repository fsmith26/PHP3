<!DOCTYPE html>	<!-- Opener found on alll files, sets header, meta charset, and connects to the db -->
<html>
<head>
<meta charset="utf-8">
<title>Fletchers assignment3</title>
</head>
<body>
<?php
include 'connectdb.php';
?>
<ol>
<?php					//PHP file to find customers who bought more than x products
	$quantity = $_POST["quant"];	//get variable from form, quantity that is entered
	echo '<h1> Displaying customers who bought more than: ' .$quantity . ' items</h1><br>'; //print title
	//SQL query to find where purchases is more than input
	$query = "SELECT * FROM (purchases INNER JOIN customer ON purchases.cusID = customer.cusID) INNER JOIN product ON product.prodID = purchases.prodID ";
	$result=mysqli_query($connection,$query); //get results
        if (!$result) {
        die("database query2 failed.");
        }
        while ($row=mysqli_fetch_assoc($result)) {	//for each row
	        if ($row["Quantity"] > $quantity){	//if the row quantity is greater
			echo '<li>';
        		echo $row["firstname"] . " " . $row["lastname"] . " purchased:" .$row[description] ." x" . $row[Quantity]; //print the row values in list
			echo '</li>';
        }	}
     mysqli_free_result($result);
?>

<?php
   mysqli_close($connection); //close connection
?>
</ol>
<a href="http://cs3319.gaul.csd.uwo.ca/vm166/assignment3/home.php">Return to home</a> <!-- link back to home page-->
</body>
</html>
