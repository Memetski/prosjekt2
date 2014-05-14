<?php
session_start();
require_once 'db.php';
$sql = 'SELECT * FROM bruker WHERE uid=?';
$sth = $db->prepare ($sql);
$sth->execute (array ($_SESSION['uid'])); 
if ($row=$sth->fetch()) {?>
<b>Velkommen<br/>
	<?php echo $row['fornavn']; ?> <?php echo $row['etternavn']; ?> </b><br>
	<a href="javascript:endreBrukerdetaljerDialog()">Endre brukerdata</a><br/>
	<input type="button" value="Logg ut" onclick="javascript:loggut();"/>
	<input type="button" value="Kart" onclick="javascript:map();"/>
	<input type="button" value="Registrer band" onclick="javascript:band();"/>
	<?php
} else {
	echo "Du er jo ikke logget inn!?!?!";
}
?>
