<!-- similar to other list php functions i made, this makes radio buttons of products that exist in the db, and selects prodID-->
<?php
$query = "SELECT * FROM product"; //get query of all prods
$result = mysqli_query($connection,$query);
   if (!$result) {
        die("databases query failed.");
    }
   echo "Which Product? </br>";
   while ($row = mysqli_fetch_assoc($result)) { //fetch result of query, and a while for every row
        echo '<input type="radio" name="prodID" value="'; //create radio buttons
    	echo $row["prodID"];				  //that have the value of prodID when selected
	echo '"name="prods". >' . $row["description"] . "<br>"; //print the name of product next to button
   }
   mysqli_free_result($result);
?>
