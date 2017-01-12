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
	

<!DOCTYPE html>

  <head>
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
<?php	
		$xslDoc = new DOMDocument();
	$xslDoc->load('galderakErakutsi.xsl');
	$xmlDoc = new DOMDocument();
	$xmlDoc->load('galderak.xml');
	$proc = new XSLTProcessor();
	$proc->importStylesheet($xslDoc);
	echo $proc->transformToXML($xmlDoc);
?>
	</div>
    </section>
	<footer class='main' id='f1'>
		<p><a href="http://en.wikipedia.org/wiki/Quiz" target="_blank">What is a Quiz?</a></p>
		<a href='https://github.com'>Link GITHUB</a>
	</footer>
</div>
</body>
</html>