
<?php

$con=mysqli_connect("127.0.0.1","root","","centralpub");
// Sjekker tilkobling
if (mysqli_connect_errno()) {
  echo "Kunne ikke koble til database: " . mysqli_connect_error();
}



mysqli_query($con,"INSERT INTO bruker (uname, pwd, fornavn, etternavn, email)
VALUES ('" . $_POST["uname"] . "', '" . $_POST["pwd"] . "', '" . $_POST["fornavn"] . "', 
'" . $_POST["etternavn"] . "', '" . $_POST["email"] . "')");

mysqli_close($con);
header ("Location: index.php");

/*
try {
   $db = new PDO('mysql:host=127.0.0.1;dbname=centralpub', 'root', '');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
   die ('Kunne ikke koble til serveren : ' . $e->getMessage());
     
}
date_default_timezone_set('Europe/Stockholm');
	
	PDO_query($db,"INSERT INTO bruker (uname, pwd, fornavn, etternavn, email)
VALUES ('" . $_POST["uname"] . "', '" . $_POST["pwd"] . "', '" . $_POST["fornavn"] . "', 
'" . $_POST["etternavn"] . "', '" . $_POST["email"] . "')");

*/

?>