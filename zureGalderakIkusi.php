<?php
	session_start();
	$linki= new mysqli("localhost", "root",  "", "quiz");
	$erabiltzailea = $_SESSION['username'];
	
	if($linki->connect_errno){
		echo "Errorea datu basera konektatzen".$linki->connect_error;
	}
	else{
		
		$sqli="SELECT * FROM galderak WHERE EgilearenEposta='$erabiltzailea'";
		$emaitza=$linki->query($sqli);
		if(!($emaitza)){
			echo"erabiltzailea: ".$erabiltzailea;
			echo "erabiltzailearen galderak aurkitzen errorea ". $linki->close();
		}
		else{
			echo '<table><tr><th>Gaia</th><th>Galdera</th><th>Erantzuna</th><th>Zailtasuna</th></tr>';
			while($row = $emaitza->fetch_assoc()){
				echo '<tr><td>'.$row['Gaia'].'</td><td>'.$row['GalderarenTestua'].'</td><td>'.$row['ErantzunTestua'].'</td><td>'.$row['Zailtasuna'].'</td> 
				<td><input type="submit" name="galderaEditatu" value="editatu" onSubmit ="kk.php"></td><tr><tr><tr><tr><tr>';
			}
		
	}
}
?>