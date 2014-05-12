
<?php

session_start();
require_once 'db.php';
$password = md5($_POST['pwd']); 
//echo $password;
//var_dump($db);

$stmt = $db->prepare ("INSERT INTO bruker (uname, pwd, fornavn, etternavn, email) VALUES (?, ?, ?, ?, ?)");
$stmt->execute (array ($_POST["uname"], $password, $_POST["fornavn"], $_POST["etternavn"], $_POST["email"]));


/*
mysql_query($db, "INSERT INTO bruker (uname, pwd, fornavn, etternavn, email)
VALUES ('" . $_POST["uname"] . "', '" . $password . "', '" . $_POST["fornavn"] . "', 
'" . $_POST["etternavn"] . "', '" . $_POST["email"] . "')");

mysql_close($db);*/


header ("Location: centralpub.html");

?>