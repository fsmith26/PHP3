<?php	//PHP file to list customer name as radio buttons to get customer ID
$query = "SELECT * FROM customer ORDER BY lastname"; //query to find all customers
$result = mysqli_query($connection,$query); //get results
   if (!$result) {
        die("databases query failed.");
    }
   echo "Who would you like to select? </br>";
   while ($row = mysqli_fetch_assoc($result)) { //for each row of results until their are none left
        echo '<input type="radio" name="cusID" value="'; //make radio buttons 
    	echo $row["cusID"]; //with the value of cusID
	echo '"name="names">' . $row["firstname"] ." ". $row["lastname"]. "<br>"; //and print their names out
   }
   mysqli_free_result($result);
?>
