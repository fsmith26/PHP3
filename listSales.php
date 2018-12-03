<!DOCTYPE html>  <!-- header that creates meta charset, title, and includes the php to connect to db -->
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
   $prodID= $_POST["prodID"]; //get prodID from form on home page
   echo '<h1>Sales Info for Product Number: ' .$prodID .  '</h1>';
   $queryGetProd = "SELECT * FROM product INNER JOIN purchases ON product.prodID = purchases.prodID WHERE product.prodID = '$prodID'"; //query to get info of products
   $result=mysqli_query($connection,$queryGetProd); //get results
   if (!$result) {
         die("database query2 failed.");
   }
   $row= mysqli_fetch_assoc($result);
   $prodName = $row["description"]; //get each products name
   $prodCost = $row["cost"];	    //and product cost
   //query to Sum the amount of selected product
   $query = "SELECT SUM(Quantity) AS 'numBought' FROM (purchases INNER JOIN customer ON purchases.cusID = customer.cusID) INNER JOIN product ON product.prodID = purchases.prodID WHERE product.prodID = '$prodID'";
   $result=mysqli_query($connection,$query); //get results of sum
   if (!$result) {
         die("database query2 failed.");
   }
   $row=mysqli_fetch_assoc($result); //identify row of the sum
   $money = $row[numBought] * $prodCost; //get the money made in sales of the product
   if ($row[numBought] == 0){ //if no product is bought
   echo '<h2> ERROR, product has never been sold </h2>'; //print error
   }
   else{
   echo '<h2>Product: ' . $prodName . ' has been sold ' . $row[numBought] . ' times, and has made: $' . $money . ' in sales</h2>'; //print results,money made and num bought
   mysqli_free_result($result);
  }
?>
<?php
   mysqli_close($connection);
?>
<a href="http://cs3319.gaul.csd.uwo.ca/vm166/assignment3/home.php">Return to home</a> <!-- link back to home page-->
</body>
</html>
