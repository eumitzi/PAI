<?php

@mysql_connect("localhost","","") or die("Eraore");
mysql_select_db("admitere");

$query = mysql_query("select * from candidati");

echo "<table border='1'>";
echo "<th>ID</th>";
echo "<th>Nume</th>";
echo "<th>Prenume</th>";
echo "<th>Adresa</th>";
echo "<th>Medie bac</th>";
echo "<th>Medie anuala</th>";

$min_bac=10;
$min_anual=10;
	while($row=mysql_fetch_row($query))
	{
		if($min_bac>$row[4])$min_bac=$row[4];
		if($min_anual>$row[5])$min_anual=$row[5];
		echo "<tr>";
		echo "<td>".$row[0]."</td>";
		echo "<td>".$row[1]."</td>";
		echo "<td>".$row[2]."</td>";
		echo "<td>".$row[3]."</td>";
		echo "<td>".$row[4]."</td>";
		echo "<td>".$row[5]."</td>";
		echo "</tr>";
		
		

	}
echo "</table>";
	echo "Min Bac :".$min_bac;
	echo "Min Anual :".$min_anual;
	mysql_close();
?>