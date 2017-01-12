
<?php
//$esteka = mysqli_connect("mysql.hostinger.es", "u421176028_root", "123456",  "mysql_select_db");
$esteka = mysqli_connect("localhost", "root",  "", "quiz");

$ema = mysqli_query($esteka, "select * from erabiltzaile");

echo '<table border=1> <tr> <th> Izena </th>
		<th> Abizena </th>
		<th> Posta </th>
		<th> Pasahitza </th>	
		<th> Telefonoa </th>
		<th> Espezialitatea </th>
		<th> Interesak </th>
		<th> Argazkia </th>
		</tr>';
while( $row=mysqli_fetch_array($ema, MYSQLI_ASSOC)) {
	echo '<tr><td>'.$row['Izena'].'</td> <td>'.$row['Abizena1'].
		 '<td>'.$row['Posta'].'</td> <td>'.$row['Pasahitza'].
		 '<td>'.$row['Telefonoa'].'</td> <td>'.$row['Espezialitatea'].
		 '<td>'.$row['Interesak'].'</td> <td>'.$row['Argazkia'].'</td> </tr>';
}
echo '</table>';
mysqli_free_result($ema);
mysqli_close($esteka);
?>
