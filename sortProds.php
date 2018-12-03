<!DOCTYPE html> <!-- Reused header, sets meta char, title, and connects to the DB -->
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
   $option= $_POST["action"]; //get the method of sorting from the form and radio buttons
   echo "<h1>Products sorted by '$option'</h1>";
   echo "$option selected"; //prnt what the selected option was
   if ($option == 'priceAsc'){								//if/elifs depending on what the method of sort was, from input as $option
   	$query = 'SELECT description , cost FROM product ORDER BY cost ASC';		//query to sort by cost Ascending
   	$result = mysqli_query($connection,$query);
   		if (!$result) {
         		die("database query2 failed.");
     		}
   echo "<ol>";
   while ($row = mysqli_fetch_assoc($result)) {	//get all results
   	echo "<li>";
   	echo $row["description"] . ": " . $row["cost"]. "</li>"; //print name and cost
   }
   mysqli_free_result($result);
   }

   elseif ($option == 'priceDesc'){						//elif for price descending sort
        $query = 'SELECT description , cost FROM product ORDER BY cost DESC';  //make query of desc cost
        $result = mysqli_query($connection,$query);
                if (!$result) {
                        die("database query2 failed.");
                }
   echo "<ol>";
   while ($row = mysqli_fetch_assoc($result)) { //get results
        echo "<li>";
        echo $row["description"] . ": " . $row["cost"]. "</li>"; //print in list
   }
   mysqli_free_result($result);
   }

   elseif ($option == 'descAsc'){						//elif for description ascending order
        $query = 'SELECT description , cost FROM product ORDER BY description ASC'; //create query for description ascending
        $result = mysqli_query($connection,$query);
                if (!$result) {
                        die("database query2 failed.");
                }
   echo "<ol>";
   while ($row = mysqli_fetch_assoc($result)) { //get results
        echo "<li>";
        echo $row["description"] . ": " . $row["cost"]. "</li>"; //print name and cost
   }
   mysqli_free_result($result);
   }

   elseif ($option == 'descDesc'){
        $query = 'SELECT description , cost FROM product ORDER BY description DESC';	//last elif for descrition sorted by descending
        $result = mysqli_query($connection,$query);
                if (!$result) {
                        die("database query2 failed.");
                }
   echo "<ol>";
   while ($row = mysqli_fetch_assoc($result)) { //get results
        echo "<li>";
        echo $row["description"] . ": " . $row["cost"]. "</li>"; //print cost and name
   }
   mysqli_free_result($result);
   }

?>
</ol>
<?php
   mysqli_close($connection);
?>
<a href="http://cs3319.gaul.csd.uwo.ca/vm166/assignment3/home.php">Return to home</a> <!-- include link back to home -->

</body>
</html>
