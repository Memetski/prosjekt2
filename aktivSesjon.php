    <?php
    header ('Content-type: application/json');
    session_start();
    require_once 'db.php';
	
	
    $sql = 'SELECT * FROM bruker WHERE uid=?';
    $sth = $db->prepare ($sql);
	if(isset($_SESSION['uid'])) {
    $sth->execute (array ($_SESSION['uid']));
	}else header("Location:login.html");
	
	
    if ($row=$sth->fetch()) {
    echo json_encode (array ('login'=>'OK'));
    } else {
    echo json_encode (array ('logon'=>'NOPE'));
    }
    ?> 