<!DOCTYPE html>			<!--same beggining as most of my php files, header, title, meta char, and connecting to DB -->
<html>
<head>
<meta charset="utf-8">
<title>Fletchers assignment3</title>
</head>

<body>
<?php
include 'connectdb.php';
?>
<h1>Products bought by that Customer</h1>
<?php
   $cusID = $_POST["cusID"]; //get customer ID from form on home page
   //SQL query finds what products the customer has purcchased
   $query = "SELECT * FROM (purchases INNER JOIN customer ON purchases.cusID = customer.cusID) INNER JOIN product ON product.prodID = purchases.prodID WHERE customer.cusID = '$cusID'";
   $result = mysqli_query($connection,$query); //get result
    if (!$result) {
         die("database query2 failed.");
     }
    echo "<ol>";
	while ($row = mysqli_fetch_assoc($result)) { //while rows exist (for every row)
    	echo "<li>";
    	echo $row["description"] . "</li>"; //print the name of the product in a list, 
	}
	echo "<ol>";
	mysqli_free_result($result); //free results
?>
	<a href="http://cs3319.gaul.csd.uwo.ca/vm166/assignment3/home.php">Return to home</a> <!-- include a link back to home page -->

<?php
   mysqli_close($connection);
?>
</body>
</html>
