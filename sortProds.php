<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Sorted Products</title>
</head>
<body>
<?php
include 'connectdb.php';
?>
<ol>
<?php
   $option= $_POST["action"];
   echo "<h1>Products sorted by '$option'</h1>";
   echo "$option selected";
   if ($option == 'priceAsc'){
   	$query = 'SELECT description , cost FROM product ORDER BY cost ASC';
   	$result = mysqli_query($connection,$query);
   		if (!$result) {
         		die("database query2 failed.");
     		}
   echo "<ol>";
   while ($row = mysqli_fetch_assoc($result)) {
   	echo "<li>";
   	echo $row["description"] . ": " . $row["cost"]. "</li>";
   }
   mysqli_free_result($result);
   }

   elseif ($option == 'priceDesc'){
        $query = 'SELECT description , cost FROM product ORDER BY cost DESC';
        $result = mysqli_query($connection,$query);
                if (!$result) {
                        die("database query2 failed.");
                }
   echo "<ol>";
   while ($row = mysqli_fetch_assoc($result)) {
        echo "<li>";
        echo $row["description"] . ": " . $row["cost"]. "</li>";
   }
   mysqli_free_result($result);
   }

   elseif ($option == 'descAsc'){
        $query = 'SELECT description , cost FROM product ORDER BY description ASC';
        $result = mysqli_query($connection,$query);
                if (!$result) {
                        die("database query2 failed.");
                }
   echo "<ol>";
   while ($row = mysqli_fetch_assoc($result)) {
        echo "<li>";
        echo $row["description"] . ": " . $row["cost"]. "</li>";
   }
   mysqli_free_result($result);
   }

   elseif ($option == 'descDesc'){
        $query = 'SELECT description , cost FROM product ORDER BY description DESC';
        $result = mysqli_query($connection,$query);
                if (!$result) {
                        die("database query2 failed.");
                }
   echo "<ol>";
   while ($row = mysqli_fetch_assoc($result)) {
        echo "<li>";
        echo $row["description"] . ": " . $row["cost"]. "</li>";
   }
   mysqli_free_result($result);
   }

?>
</ol>
<?php
   mysqli_close($connection);
?>
<a href="http://cs3319.gaul.csd.uwo.ca/vm166/assignment3/home.php">Return to home</a>

</body>
</html>
