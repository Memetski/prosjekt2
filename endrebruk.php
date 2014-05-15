<?php
session_start();
require_once 'db.php';

?>


<!-- Dialog for changing user details -->
<div id="endreBrukerdetaljerDialog" style="float:right;" title="Registrer ny bruker">
<form onsubmit="return false;">
<label for="uname">Bruker ID</label>       <input type="text" name="uname" title="Din e-post adresse"/><br/>
<label for="owd">Gjeldende passord</label> <input type="password" name="opwd" title="For å endre passord må du oppgi både nåværende og nytt passord"/><br/>
<label for="pwd">Passord</label>           <input type="password" name="pwd" title="La være blankt for ikke å endre passord"/><br/>
<label for="pwd1">Bekreft passord</label>  <input type="password" name="pwd1" title="La være blankt for ikke å endre passord"/><br/>
<label for="fornavn">Fornavn</label>         <input type="text" name="fornavn"/><br/>
<label for="etternavn">Etternavn</label>       <input type="text" name="etternavn"/><br/>
<label for="email">Email</label>           <input type="text" name="email"/><br/>
<input type="button" value="Oppdater brukerdata" onclick="javascript:endreBrukerInsert(this.form);"/>
</form>
