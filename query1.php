<?php //first query i made, lists all customer info as radio buttons
$query = "SELECT * FROM customer ORDER BY lastname"; //query to find rows of customer
$result = mysqli_query($connection,$query);
   if (!$result) {
        die("databases query failed.");
    }
   echo "Who would you like to select? </br>";
   while ($row = mysqli_fetch_assoc($result)) { //for each row
        echo '<input type="radio" name="cusID" value="'; //make a radtio button
    	echo $row["cusID"]; //of customer id
	echo '">' . $row["firstname"] ." ". $row["lastname"]  .", ". $row["city"].", ". $row["phonenumber"]. " AgentID:  " . $row["agentID"]. "<br>"; //print all
   }
   mysqli_free_result($result);
?>
