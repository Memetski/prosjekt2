<?php

//header ('Content-type: application/json');
session_start();
require_once 'db.php';


$sql = 'SELECT * FROM bruker WHERE uname=? AND pwd=?';
$stm = $db->prepare ($sql);
$stm->execute (array ($_POST['username'], md5($_POST['password'])));
if ($row = $stm->fetch()) {
$_SESSION['user'] = $_POST['username'];
echo  "OK";
} else
echo 'No match for username/password';

?>