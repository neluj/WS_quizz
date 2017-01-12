<?php
session_start();
//$esteka = mysqli_connect("mysql.hostinger.es", "u421176028_root", "123456",  "mysql_select_db");
$esteka = mysqli_connect("localhost", "root",  "", "quiz");
$erabiltzailea = $_SESSION['username'];
$erantzuna = $_POST['erantzunText'];
$galdera=$_POST['galderaText'];
$zailtasuna = $_POST['zailtasuna'];
$gaia = $_POST['gaia'];
	$sql = "INSERT INTO galderak 
		(EgilearenEposta, Gaia, ErantzunTestua, GalderarenTestua, Zailtasuna) VALUES
		
		('$erabiltzailea' ,
		'$gaia'	,
		'$erantzuna'	,
		'$galdera',
		'$zailtasuna')";

	$ema=mysqli_query($esteka,$sql);

	if (!$ema){
		die('Errorea query-a gauzatzerakoan: '.msqli_error());
	}
	else{
		$xml = simplexml_load_file('galderak.xml');
		if(!$xml)
		{
			echo "Ezin izan da galdera xml fitxategian txertatu, solilik datu basean";
		}
		else{
			$assessmentItem = $xml->addChild('assessmentItem');
			
			$assessmentItem->addAttribute('complexity',$zailtasuna);
			$assessmentItem->addAttribute('subject',$gaia);
			
			$itemBody = $assessmentItem->addChild('itemBody');
			$itemBody->addChild('p',$galdera);
			
			$correctResponse = $assessmentItem->addChild('correctResponse');
			$correctResponse->addChild('value',$erantzuna);
			
			$xml->asXML('galderak.xml');

			
			echo "Galdera berri bat egin da";
			echo "<p> <a href='seeXMLQuenstions.php'> Galdera lista ikusi </a>";
		}
	}
	


mysqli_close($esteka);

?>