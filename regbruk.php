<?php

require_once 'db.php';

?>

<!-- Dialog for registering new users -->
<div id="nyBruker" style="float:right;" title="Registrer ny bruker">
<form onsubmit="return false;">
<label for="uname">Bruker navn:</label>    	<input type="text" name="uname" size="12" /><br>
<label for="pwd">Passord</label>     		<input type="password" name="pwd" size="12" /><br>
<label for="fornavn">Fornavn</label>   		<input type="text" name="fornavn" size="50" /><br>
<label for="etternavn">Etternavn</label> 	<input type="text" name="etternavn" size="50" /><br>
<label for="email">Email</label>        	<input type="text" name="email" size="50" /> <br>
<input type="button" value="Registrer ny bruker" onclick="javascript:brukerInsert(this.form);"/>
</form>
</div>


<!--
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
 <textarea id="Comments" name="Comments">
 example text
 </textarea>
<input type="submit" name="mysubmit" value="Save Post" />
 </form>
-->




