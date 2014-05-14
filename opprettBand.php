
<?php
session_start();
require_once 'db.php';

$sql = 'INSERT INTO bands (bname, year, info) VALUES (?, ?, ?)';
$sth = $db->prepare ($sql);
$res = $sth->execute (array ($_POST['bname'], $_POST['year'], $_POST['info']));
if ($res==1)
	echo json_encode (array ('ok'=>'OK'));
else
	echo json_encode (array ('message'=>'Dette bandet er allerede registrert'));
	
	
	
//	$stmt = $db->prepare ("INSERT INTO bands (bname, year, info, ) VALUES (?, ?, ?)");
//	$stmt->execute (array ($_POST["bname"], $password, $_POST["year"], $_POST["info"]));
	
	
?>


