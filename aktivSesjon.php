    <?php
    header ('Content-type: application/json');
    session_start();
    require_once 'db.php';
	
	
    $sql = 'SELECT * FROM bruker WHERE uid=?';	// Henter ut brukerID
    $sth = $db->prepare ($sql);
	if(isset($_SESSION['uid'])) {	// Dersom det eksisterer en sesjon, utfør kallet. Ellers henvis til innlogging
    $sth->execute (array ($_SESSION['uid']));
	}else header("Location:login.html");
	
	
    if ($row=$sth->fetch()) {	// Hvis man lyktes i å hente ut brukerID, returner til Ajax-funksjonen
    echo json_encode (array ('login'=>'OK'));
    } else {
    echo json_encode (array ('logon'=>'NOPE'));
    }
    ?> 