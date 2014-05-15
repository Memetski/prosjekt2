
<?php
session_start();
require_once 'db.php';

$sql = 'INSERT INTO bruker (uname, fornavn, etternavn, email, pwd) VALUES (?, ?, ?, ?, ?)';
$sth = $db->prepare ($sql);
$res = $sth->execute (array ($_POST['uname'], $_POST['fornavn'], $_POST['etternavn'], $_POST['email'], md5($_POST['pwd'])));
if ($res==1)
	echo json_encode (array ('ok'=>'OK'));
else
	echo json_encode (array ('message'=>'Brukernavnet finnes allerede i databasen.'));
?>






