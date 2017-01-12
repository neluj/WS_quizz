<?php
session_start();
	 
	if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) 
	{
		 echo "Saioa hasita " . $_SESSION['username'] . " posta helbidearekin";
		 echo '<br><a href=handlingQuizes.php>Zure Galderak</a>';
		 echo '<br><a href=InsertQuestion.php>Galdera egin</a>';
		 echo '<br><a href=logout.php>Saioa amaitu</a>';
	} else {
	   echo "Saioa anonimo bezela hasita";	 
	}
?>
	

<!doctype HTML>
<html>
  <head> 
	<script type="text/javascript" language = "javascript">
		xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function(){
		//alert(xhttp.readyState);
		if ((xhttp.readyState==4)&&(xhttp.status==200 ))
		{ document.getElementById("txtHint").innerHTML= xhttp.responseText;
		}};
		function izenakIkusi(){
		xhttp.open("GET","zureGalderakIkusi.php", true);
		xhttp.send();
		}
	</script>
	
	<script type="text/javascript" language = "javascript">
		xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange=function(){
		if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{document.getElementById("txtHint").innerHTML=xmlhttp.responseText; }
		}
		function showPeli(str){
			if(str=="") {
				document.getElementById("txtHint").innerHTML="";
				return;
			}
			xmlhttp.open("GET", "pelikulakoDatuak.php?q="+str, true);
			xmlhttp.send();
		}
</script>

  
  
    <meta name="tipo_contenido" content="text/html;" http-equiv="content-type" charset="utf-8">
	<title>Galdera Egin</title>
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
	
		<form>
		<input type="button" name="kideakIkusi" value="Galderak ikusi"
		onclick ="izenakIkusi()">
		</form>
		<div id="txtHint" style="width:1100px; height:600px; overflow: scroll;">
		</div>		
		</div>
	
	
	
    </section>
	<footer class='main' id='f1'>
		<p><a href="http://en.wikipedia.org/wiki/Quiz" target="_blank">What is a Quiz?</a></p>
		<a href='https://github.com'>Link GITHUB</a>
	</footer>
</div>
</body>
</html>