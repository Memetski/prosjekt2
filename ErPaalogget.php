<?php

session_start();
header ('Content-type: application/json');
require_once 'db.php';


$sql = 'SELECT * FROM bruker WHERE uname=? AND pwd=?';
$stm = $db->prepare ($sql);
$stm->execute (array ($_POST['uname'], md5($_POST['pwd'])));
if ($row = $stm->fetch()) {
$_SESSION['uid'] = $row['uid'];
echo  json_encode (array("ok"=>"OK"));
} else
echo 'No match for username/password';

?>