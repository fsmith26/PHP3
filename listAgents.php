<!-- PHP function that gets a list of agents in the DB, sets them as radio buttons to select their AgentID-->
<?php
$query = "SELECT * FROM agent"; //query to select agents
$result = mysqli_query($connection,$query);	//get results of query
   if (!$result) {
        die("databases query failed.");
    }
   echo "Which agent? </br>";
   while ($row = mysqli_fetch_assoc($result)) { //for every row of results
        echo '<input type="radio" name="agentID" value="'; //create button of
    	echo $row["agentID"];				   //AgentID as value
	echo '"name="names">' . $row["firstname"] ." ". $row["lastname"]. "<br>"; //and list their first and last name
   }
   mysqli_free_result($result);
?>
