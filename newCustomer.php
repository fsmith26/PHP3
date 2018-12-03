<!DOCTYPE html> <!-- PHP page to add a new customer, starts with meta char, title, and connecting to db -->
<html>
<head>
	<meta charset="utf-8">
	<title>Fletchers assignment3</title>
</head>
<body>
<?php
include 'connectdb.php';
?>
<h1>Insert New Customer</h1>
<?php 			//get the values from the vorms, and print them to the screen
   $firstname = $_POST['fname'];
   $lastname = $_POST["lname"];
   $city = $_POST["city"];
   $phonenum = $_POST["phone"];
   $agentID = $_POST["agentID"];   
   echo 'Firstname: ' .$firstname . '<br>';
   echo 'Lastname: ' .$lastname . '<br>';
   echo 'City: ' .$city . '<br>' ;
   echo 'Phone#: ' .$phonenum . '<br>';
   echo 'AgentID: ' .$agentID. '<br>' ;

   if(is_numeric($firstname) == 'TRUE' OR is_numeric($lastname) == 'TRUE' OR is_numeric($city) == 'TRUE' OR is_numeric($phone) == "FALSE" ){ //check for proper inputs
   echo '<h1> Data invalid, Please try again </h1>';	//print if error
   }
   else{ //if good inputs
   $query= 'SELECT max(cusID) AS maxid FROM customer'; //query to create a valid new cusID
   $result= mysqli_query($connection,$query);
   if (!$result) {
          die("database max query failed.");
   }
   $row=mysqli_fetch_assoc($result); //get the row of highest current cusID
   $newkey = intval($row['maxid']) + 1; //add 1 to get a unique ID
   $newcusID = (string)$newkey; //create new key
   //Query to insert customer into list, using variables from form and newcusID that was just made
   $queryIns = 'INSERT INTO customer VALUES("'.$newcusID.'","'.$firstname.'","'.$lastname.'","'.$city.'","'.$phonenum.'" ,"'.$agentID.'")';
   if (!$result) {
          die("database max query failed.");
   }
   $result= mysqli_query($connection,$queryIns); //get results
   echo '<h2> SUCCESS, Customer Added! </h2>'; //print success
   }
?>



<?php
   mysqli_close($connection);
?>
<a href="http://cs3319.gaul.csd.uwo.ca/vm166/assignment3/home.php">Return to home</a> <!-- link back to home page-->

</body>
</html>
