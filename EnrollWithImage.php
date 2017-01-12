<?php

//$esteka = mysqli_connect("mysql.hostinger.es", "u421176028_root", "123456",  "mysql_select_db");
$esteka = mysqli_connect("localhost", "root",  "", "quiz");

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

if(isset($_POST['submit']) && $_FILES['argazkia']['size'] > 0)
{
$fileName = $_FILES['argazkia']['name'];
$tmpName  = $_FILES['argazkia']['tmp_name'];
$fileSize = $_FILES['argazkia']['size'];
$fileType = $_FILES['argazkia']['type'];

$fp      = fopen($tmpName, 'r');
$content = fread($fp, filesize($tmpName));
$content = addslashes($content);
fclose($fp);

if(!get_magic_quotes_gpc())
{
    $fileName = addslashes($fileName);
}


$sql = "INSERT INTO erabiltzaile 
	(Izena, Abizena1, Abizena2,Posta, Pasahitza, Telefonoa ,Espezialitatea,Interesak, Argazkia) VALUES
	
	('$_POST[name]' ,
	'$_POST[lastname1]'	,
	'$_POST[lastname2]',
	'$_POST[email]' ,
	'$_POST[passwd]' ,
	'$_POST[telnum]' ,
	'$inter' ,
	'$_POST[interesak]' 
	'$content')";

$ema=mysqli_query($esteka,$sql);

if (!$ema){
	echo('Errorea query-a gauzatzerakoan: ');
}
else{
	echo "erregistro berri bat gauzatu da";
	echo "<p> <a href='IkusiErabiltzaileak.php'> Erregistroak ikusi </a>";
}
mysqli_close($esteka);
}
?>
