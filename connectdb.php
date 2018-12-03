

<?php		//gotten from example in class
$dbhost = "localhost";
$dbuser= "root";
$dbpass = "kilcoo5";	//dont look at my password creep  >:( 
$dbname = "assignment3";
$connection = mysqli_connect($dbhost, $dbuser,$dbpass,$dbname); //create connection
if (mysqli_connect_errno()) {
     die("database connection failed :" .
     mysqli_connect_error() .
     "(" . mysqli_connect_errno() . ")"
         );
    }
?>
