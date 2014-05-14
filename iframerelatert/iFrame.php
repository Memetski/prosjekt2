<!--
<FORM 
action='save_upload.php' method=post enctype='multipart/form-data' target=hidden_upload>
<DIV>
	<input type=file name='upload_scn' class=file_upload>
</DIV>
<INPUT type=submit name=submit value=Upload />

<IFRAME id=hidden_upload name=hidden_upload src='' onLoad='uploadDone("hidden_upload")'
        style='width:0;height:0;border:0px solid #fff'>
</IFRAME>
		
</FORM>
-->


<form id="save_upload.php" method="post" enctype="multipart/form-data" action="save_upload.php">
<input name="file" id="file" size="27" type="file" /><br />
<input type="submit" name="action" value="Upload" /><br />
<iframe id="upload_target" name="upload_target" src="" style="width:0;height:0;border:0px solid #fff;"></iframe>
</form>