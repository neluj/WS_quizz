
<?php

//$esteka = mysqli_connect("mysql.hostinger.es", "u421176028_root", "123456",  "mysql_select_db");
$esteka = mysqli_connect("localhost", "root",  "", "quiz");

$email = $_POST['email'];

if (!filter_var($email, FILTER_VALIDATE_EMAIL) === false) {

	if (!$esteka)
	{ 	
		echo "Hutsegitea MySQLra konetatzerakoan". PHP_EOL;
		echo "error depurazio akatsa: " . mysqli_connect_error().PHP_EOL;
		exit;
	}

	switch($_POST['espe']){
	case 'best':	
			$inter=$_POST['besterik'];
		break;
	default:
			$inter=$_POST['espe']; 
	}

	$sql = "INSERT INTO erabiltzaile 
		(Izena, Abizena1, Abizena2,Posta, Pasahitza, Telefonoa ,Espezialitatea,Interesak) VALUES
		
		('$_POST[name]' ,
		'$_POST[lastname1]'	,
		'$_POST[lastname2]',
		'$_POST[email]' ,
		'$_POST[passwd]' ,
		'$_POST[telnum]' ,
		 '$inter' ,
		'$_POST[interesak]' )";

	$ema=mysqli_query($esteka,$sql);

	if (!$ema){
		die('Errorea query-a gauzatzerakoan: '.msqli_error());
	}


	echo "erregistro berri bat gauzatu da";
	echo "<p> <a href='IkusiErabiltzaileak.php'> Erregistroak ikusi </a>";


} else {
  echo("$email is not a valid email address");
}
mysqli_close($esteka);

?>
