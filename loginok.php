<?php
session_start();
require_once 'db.php';
$sql = 'SELECT * FROM bruker WHERE uname=?';
$sth = $db->prepare ($sql);
$sth->execute (array ($_SESSION['user']));
if ($row=$sth->fetch()) {?>
<b>Velkommen<br/>
	<?php echo $row['fornavn']; ?> <?php echo $row['etternavn']; ?></b><br>
	<a href="javascript:endreBrukerdetaljer()">Endre brukerdata</a><br/>
	<input type="button" value="Logg ut" onclick="javascript:loggut();"/>
	<?php
} else {
	echo "Du er jo ikke logget inn!?!?!";
}
?>
	