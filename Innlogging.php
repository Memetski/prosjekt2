<?php
session_start();					// Starter sesjon
require_once 'db.php';				// Inkluderer filen db


if(isset($_SESSION['uname']) && $_SESSION['uname'] != ''){ // Henvis til forsiden dersom bruker er innlogget
	echo '<script type="text/javascript">window.location = "index.php"; </script>';
}

?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Innloggingsskjema CentralPub</title>
<script type="text/javascript" src="jquery-1.9.1.js"></script>
<script type="text/javascript">

$(document).ready(function() {

$('#username').focus();
$('#login').click(function(){

	var username = $('#username');
	var password  = $('#password');
	var login_result = $('.login_result');
	
	login_result.html('loading..'); // Animert pre-loader
		if(username.val() == ''){ // sjekker om brukernavnet som leses inn har en verdi
			username.focus();  
			login_result.html('<span class="error">Enter the username</span>');
			return false;
		}
		if(password.val() == ''){ // Sjekker om passordet som leses inn har en verdi
			password.focus();
			login_result.html('<span class="error">Enter the password</span>');
			return false;
		}
		
		if(username.val() != '' && password.val() != ''){ // Sjekker at brukerdataene som leses inn har innhold
			//var UrlToPass = 'action=login&username='+username.val()+'&password='+password.val();
			//var UrlToPass = 'uname': form.uname.value, 'pwd': form.pwd.value,
			$.ajax({ // Utfører Ajax-request mot php-fil som sjekker opp mot databasen
			type : 'POST',
			data: {'uname': form.uname.value, 'pwd': form.pwd.value},
			//data : UrlToPass,
			url  : 'ErPaalogget.php',
			success: function(responseText){ // Henter resultatet og tilpasser de aktuelle scenariene
				if(responseText == 0){
					login_result.html('<span class="error">Username or Password Incorrect!</span>');
				}
				else if(responseText == 'OK'){
					window.location = 'index.php';
				}
				else{
					alert('Problem with sql query');
				}
			}
			});
		}
		return false;

	});

});




</script>

<style type="text/css">

body{
	margin: 0;
	padding: 0;
	font-family: arial;
	color: #2C2C2C;
	font-size: 14px;
}
h1 a{
	color:#2C2C2C;
	text-decoration:none;
}
h1 a:hover{
	text-decoration:underline;
}
.as_wrapper{
	margin: 0 auto;
	width: 1000px;
}
.mytable{
	margin: 0 auto;
	padding: 20px;
	border:2px dashed #17A3F7;
}
.as_login_heading{
	margin:0;
	padding:0;
	font-weight:bold;
	text-align:left;
	font-size:18px;
}
.success{
	color:#009900;
}
.error{
	color:#F33C21;
}
.talign_left{
	text-align:left;
}
.as_input{
	border:0;
	outline:0;
	margin:0;
	padding:0;
	padding:5px;
	width:180px;
	border:#0081b5 solid 1px;
}
.as_input:hover{
	border:#321363 solid 1px;
}
.as_input.error{
	border:#ed1846 solid 1px;
}
.as_button{
	background:#ed1846;
	border:none;
	outline:none;
	margin:0;
	padding:0;
	color:#FFF;
	padding:5px 10px;
	font-weight:300;
	cursor:pointer;
}
.as_button:hover{
	background:#fe0238;
}
.as_button:active{
	background:#a1147d;
}
.login_result{
	display:block;
	width:100%;
	text-align:center;
	height:25px;
}

</style>
</head>

<body>
<div class="as_wrapper">
<h1><a href="">Innloggingsskjema for CentralPub</a></h1>

<br/>
<form>
<table class="mytable">
<tr>
	<td colspan="2"><h3 class="as_login_heading">Login</h3></td>
</tr>
<tr>
	<td colspan="2"><div class="login_result" id="login_result"></div></td>
</tr>
<tr>
	<td>Username</td>
    <td><input type="text" name="username" id="username" class="as_input" /></td>
</tr>
<tr>
	<td>Password</td>
    <td><input type="password" name="password" id="password" class="as_input" /></td>
</tr>
<tr>
	<td></td>
</tr>
<tr>
	<td colspan="2"><input type="button" name="login" id="login" class="as_button" value="Login &raquo;" /></td>
</tr>
</table>
</form>
</div>
</body>




</html>