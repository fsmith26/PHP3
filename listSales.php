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
   $prodID= $_POST["prodID"];
   echo '<h1>Sales Info for Product Number: ' .$prodID .  '</h1>';
   $queryGetProd = "SELECT * FROM product INNER JOIN purchases ON product.prodID = purchases.prodID WHERE product.prodID = '$prodID'";
   $result=mysqli_query($connection,$queryGetProd);
   if (!$result) {
         die("database query2 failed.");
   }
   $row= mysqli_fetch_assoc($result);
   $prodName = $row["description"];
   $prodCost = $row["cost"];
   $query = "SELECT SUM(Quantity) AS 'numBought' FROM (purchases INNER JOIN customer ON purchases.cusID = customer.cusID) INNER JOIN product ON product.prodID = purchases.prodID WHERE product.prodID = '$prodID'";
   $result=mysqli_query($connection,$query);
   if (!$result) {
         die("database query2 failed.");
   }
   $row=mysqli_fetch_assoc($result);
   $money = $row[numBought] * $prodCost; 
   if ($row[numBought] == 0){
   echo '<h2> ERROR, product has never been sold </h2>';
   }
   else{
   echo '<h2>Product: ' . $prodName . ' has been sold ' . $row[numBought] . ' times, and has made: $' . $money . ' in sales</h2>';
   mysqli_free_result($result);
  }
?>
<?php
   mysqli_close($connection);
?>
<a href="http://cs3319.gaul.csd.uwo.ca/vm166/assignment3/home.php">Return to home</a>
</body>
</html>
