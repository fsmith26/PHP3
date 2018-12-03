<?php
$query = "SELECT * FROM customer ORDER BY lastname";
$result = mysqli_query($connection,$query);
   if (!$result) {
        die("databases query failed.");
    }
   echo "Who would you like to select? </br>";
   while ($row = mysqli_fetch_assoc($result)) {
        echo '<input type="radio" name="cusID" value="';
    	echo $row["cusID"];
	echo '"name="names">' . $row["firstname"] ." ". $row["lastname"]. "<br>";
   }
   mysqli_free_result($result);
?>
