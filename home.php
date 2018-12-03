<!DOCTYPE html>
<html> <!-- Home page for Fletcher Smiths Assignment3 DB frontend, fsmith26, Dec 3rd 2018. -->
<head>
<meta charset="utf-8">
<title>Fletchers home page</title>
<style>
.center {      <!-- CSS to center the title Card -->
	text-align: center;
	color: black;
	}
</style>
</head>
<body>

<?php include 'connectdb.php';?> 	<!--call php to connect to db, input sql password -->
<h1 class="center">Fletcher's Online Store!</h1> <!--Header for titleof website! --> 

<!--task 1, list customer information, on select list purchases -->
	<form action="getProds.php" method="post">  <!--html form for task 1 (list purchases) -->
	<h2>Select Customer to view purchases</h2>  <!--Display text-->
	<?php include 'query1.php'; ?>                <!--include query1, which lists customer info as a radio button, and also passes cusID as a radio-->
	<input type="submit" value="Get Customer purchases"> <!-- submit form button -->
	</form>

<!--task2 list products in order depending on selected parameter -->
	<h2> Sort Products </h2>		
	<form action="sortProds.php" method="post">
	<?php include 'query2.php'; ?>
	<input type="submit" value="Sort products">
	</form>

<!--task3 inserting new purchase into db -->
	<h2> Insert New Purchase </h2>
	<form action='newPurch.php' method="post"> <!--form to send info to newpurch.php -->
	<fieldset id='cusID'>	<!--using fieldsets to allow multiple sets of radio buttons -->
	<?php include 'listNames.php' ?> <!--include listnames, whih produces radio buttons of names in DB (ensuring good cusID's)-->
	</fieldset> <!--end fieldset for cusID-->

	<fieldset id='prodID'> <!--same process, radio buttons of prodID -->
	<?php include 'listProds.php' ?> <!--produces radio buttons of existing products -->
	</fieldset> <!--end field -->

	Quantity of items purchased:<br>  <!--setup to recieve quantity in textbox-->
	(Please enter a number)
	<input type="text" name="quantity" pattern= "^[0-9]+"> <br> <!--text field with a pattern, regex ensures(only numbers are entered)-->
	<input type="submit" value="Add Purchase"> <!--submit all fields in the form-->
	</form>

<!--task4 insert a customer into db -->
	<form action= "newCustomer.php" method="post"> <!--create form to send to php-->
	<fieldset> <!--fieldsets, as have multiple input sections -->
	<h2>Insert New Customer</h2>
	FirstName: <br>
		<input type="text" name="fname" pattern= "[A-Za-z]+" > <br>  <!--for firstname, lastname,and City, create a text field that only allows words-->
	Last Name: <br>
		<input type="text" name="lname" pattern= "[A-Za-z]+"> <br> 
	City: <br>
		<input type="text" name="city" pattern= "[A-Za-z]+"> <br>
	Phone#: <br>
		<input type="text" name="phone" pattern= "[0-9]{3}-[0-9]{4}"> <br> <!--phone number input, only allows ###-#### -->
	<?php include 'listAgents.php' ?>	<!--agent ID is needed, so include listagents php to create radio buttons (ensure proper values) -->
	<input type="submit" value="Insert Customer"> <!--submit form -->
	</fieldset>
	</form>
<!--task 5, update phone numb, prompt change first -->
	<form action= "promptPhone.php" method="post"> <!-- form for task 5, send to promptPhone php-->
	<h2> Update Customer Phone number</h2>
	<?php include 'listNames.php'; ?> <!--include my php to list Names as radio buttons and select -->
	<input type="submit" value="Update Phone#"> <!-- submit form-->
	</form>

<!--task6, delete customer from DB -->
	<form action= "deleteCust.php" method="post"> <!-- form to send to deleteCust.php-->
	<h2>Delete Customer From Database</h2>
	<?php include 'listNames.php'; ?>	<!--Get cus id from radio buttons-->
	<input type="submit" value="Remove Customer"> <!-- Submit the form-->
	</form>

<!-- task8 (done out of order) list products that have never been purchased-->
	<form action="showNotBought.php" method="post">	<!--form to send infoto showNotBought.php-->
	<h2>Show Unpurchased Items</h2>
	<input type="submit" value="List Items"> <!--submit form, no input needed-->
	</form>

<!--task 7, list customers who bought more than a input amount of values-->
	<form action="checkQuantity.php" method="post"> <!--form to send input to check Quantity.php-->
	<h2>Who bought more than X items?</h2> <!--text to explain input-->
	Quantity of item:<br>
	(Enter a number)
	<input type="text" name="quant" pattern= "^[0-9]+"> <br> <!--Input for quantity, with a pattern to only allow numbers--> 
	<input type= "submit" name ="submit"> <!--submit form info-->
	</form>

<!--task 9, Get sales info of a given product-->
	<form action="listSales.php" method="post"> <!-- form to get info and sed to listSales,-->
	<h2>Get Sales Info</h2>
	<?php include "listProds.php" ?> <!--include php that makes radio buttons to sellect prodID-->
	<input type= "submit" name ="Get Sales"> <!-- send form data-->
	</form>


</body>
</html>
