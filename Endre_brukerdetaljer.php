<?php 
session_start();
require_once 'db.php';


if ($_POST['uname']!=$_SESSION['user'])
	die (json_encode (array ('message'=>'Det er VELDIG dårlig gjort å prøve å lure systemet!')));

	if (isset($_POST['pwd'])) {
	$sql = 'SELECT * FROM bruker WHERE uname=? and pwd=?';
	$sth = $db->prepare ($sql);
	$sth->execute (array ($_SESSION['user'], md5($_POST['opwd'])));
	if ($row = $sth->fetch()) {
	} else
		die (json_encode (array ('message'=>'Feil på det gamle passordet. Ingen oppdatering utført!')));
	$sth->fetchAll();
	$sql = 'UPDATE bruker SET pwd=? WHERE uname=? and pwd=?';
	$sth = $db->prepare ($sql);
	$res = $sth->execute (array (md5($_POST['pwd']), $_SESSION['user'], md5($_POST['opwd'])));
	if ($sth->rowCount()==1)
		$pwdUpdated = 1;
}
$sql = 'UPDATE bruker SET fornavn=?, etternavn=? WHERE uname=?';
$sth = $db->prepare ($sql);
$res = $sth->execute (array ($_POST['fornavn'], $_POST['etternavn'], $_SESSION['user']));
if ($sth->rowCount()==1||(isset($pwdUpdated)))
	echo json_encode (array ('message'=>'Oppdatering er lagret i databasen'));
else
	echo json_encode (array ('message'=>'Ingen oppdateringer'));
	
	
	
	
?>