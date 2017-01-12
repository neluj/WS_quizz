<?php
 session_start();
	 
	if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) 
	{
		 echo "Saioa hasita " . $_SESSION['username'] . " posta helbidearekin";
		 echo '<br><a href=handlingQuizes.php>Zure Galderak</a>';
		 echo '<br><a href=InsertQuestion.php>Galdera egin</a>';
		 echo '<br><a href=logout.php>Saioa amaitu</a>';
	} else {
	   echo "Galderaren bat egiteko errregistratu";	 
	   exit;
	}
	
?>

<!DOCTYPE html>

  <head>
    <meta name="tipo_contenido" content="text/html;" http-equiv="content-type" charset="utf-8">
	<title>Galdera Egin</title>
	<script type="text/javascript">
	 function egiaztatu(){
	 	var gai = document.getElementById("gaia").value;
	 	if (gai == null || gai == "") {
	 		alert("Gaira ezin da hutsik egon");
	 		return false;
	 	}
		var gald = document.getElementById("galderaText").value;
	 	if (gald == null || gald == "") {
	 		alert("Galdera ezin da hutsik egon");
	 		return false;
	 	}
		var eran = document.getElementById("erantzunText").value;
	 	if (eran == null || eran == "") {
	 		alert("Erantzuna ezin da hutsik egon");
	 		return false;
	 	}
	 }
	 </script>
    <link rel='stylesheet' type='text/css' href='stylesPWS/style.css' />
	<link rel='stylesheet' 
		   type='text/css' 
		   media='only screen and (min-width: 530px) and (min-device-width: 481px)'
		   href='stylesPWS/wide.css' />
	<link rel='stylesheet' 
		   type='text/css' 
		   media='only screen and (max-width: 480px)'
		   href='stylesPWS/smartphone.css' />
		   	<link rel='stylesheet' type='text/css' href='stylesPWS/izenburuak.css' /> 

  </head>
  <body>
  <div id='page-wrap'>
	<header class='main' id='h1'>
      <span class="right"><a href="SignIn.html">LogIn</a> </span>
      <span class="right" style="display:none;"><a href="/logout">LogOut</a> </span>
	<h2>Quiz: crazy questions</h2>
    </header>
	<nav class='main' id='n1' role='navigation'>
		<span><a href='layout.html'>Home</a></span>
		<span><a href='/quizzes'>Quizzes</a></span>
	    <span><a href='signUp.html'>Sign Up</a></span>
		<span><a href='credits.html'>Credits</a></span>
	</nav>
    <section class="main" id="s1" >
	<div>
	<form action="SaveQuestion.php" enctype="multipart/form-data" method="post" id = "galdera" name = "galdera" onSubmit = "return egiaztatu()">
	<label for="name">Gaia</label>
	<br>
	<input type="text"  name="gaia" id="gaia" value="" >
	<br>
	<label for="galderaText">Egin galdera</label>
	<br>
	<textarea name="galderaText" id="galderaText" rows="10" cols="40" value=""></textarea>
	<br>
	<label for="erantzunText">Erantzun zuzena</label>
	<br>
	<textarea name="erantzunText" id="erantzunText" rows="10" cols="40" value=""></textarea>	
	<br>
	<select name="zailtasuna" id="zailtasuna">
	<option value="hutsa"></option>
    <option value=1>1</option>
    <option value=2>2</option>
    <option value=3>3</option>
    <option value=4>4</option>
    <option value=5>5</option> 
	<input type="submit" name="submit" value="Galdetu" /> 	
    </select>
	</form>
	</div>
    </section>
	<footer class='main' id='f1'>
		<p><a href="http://en.wikipedia.org/wiki/Quiz" target="_blank">What is a Quiz?</a></p>
		<a href='https://github.com'>Link GITHUB</a>
	</footer>
</div>
</body>
</html>