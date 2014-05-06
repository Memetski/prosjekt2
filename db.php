<?php

/*$db = mysql_connect("localhost", "root", "") or die ("Oops! Detta gikk itte"); // Forsøker å koble opp mot phpMyadmin
$db = mysql_select_db("centralpub") or die ("Oops! Detta gikk itte"); // Velger riktig database


$db=mysql_connect("127.0.0.1","root","","centralpub"); // Sjekker tilkobling
if (mysql_connect_errno()) {
  echo "Kunne ikke koble til database: " . mysqli_connect_error();
}
*/


try {
   $db = new PDO('mysql:host=127.0.0.1;dbname=centralpub', 'root', '');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
   die ('Kunne ikke koble til serveren : ' . $e->getMessage());
}

//date_default_timezone_set('Europe/Stockholm');

// $stmt = $db->prepare ("INSERT INTO bruker (uname, pwd, fornavn, etternavn, email) VALUES (?, ?, ?, ?, ?)");
// $stmt->execute (array ($_POST["uname"], $password, $_POST["fornavn"], $_POST["etternavn"], $_POST["email"]));


?>