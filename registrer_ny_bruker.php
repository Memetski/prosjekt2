<!DOCTYPE html> 

<html lang="en"><head>  
<meta charset="utf-8">  
<title>Registrere ny bruker</title> 
 
<script src="sample-registration-form-validation.js"></script>  
</head>  


<h1>Registrer ny bruker</h1>  

<form action='db_ny_bruker.php' method="POST">  
<ul>  
<label for="uname">Bruker ID:</label> 
<input type="text" name="uname" size="12" /><br>
<label for="passid">Passord:</label>
<input type="password" name="pwd" size="12" /><br>
<label for="username">Fornavn:</label> 
<input type="text" name="fornavn" size="50" /><br>
<label for="username">Etternavn:</label> 
<input type="text" name="etternavn" size="50" /><br>
<label for="email">Email:</label>
<input type="text" name="email" size="50" /> <br>



<input type="submit" name="submit" value="Registrer" /><br>
</ul>  
</form>  
</body>  
</html>  

