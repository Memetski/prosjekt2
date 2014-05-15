<?php

session_start();
require_once 'db.php';

?>

<!-- Dialog for registering av nytt band -->
<div id="nyttBand" style="float:right;" title="Registrer nytt band">
<form onsubmit="return false;">
<label for="bname">Band navn:</label>    <input type="text" name="bname" size="12" /><br>
<label for="year">År opprettet</label>     <input type="date" name="year" size="12" /><br>
<label for="info">En intro til bandet</label> <BR>  <input height="200" type="text" name="info" size="150" /><br>
<input type="button" value="Registrer nytt band" onclick="javascript:bandInsert(this.form);"/>
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




