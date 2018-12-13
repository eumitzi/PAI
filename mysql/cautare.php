
<?php

$nume=$_GET['nume'];
$prenume=$_GET['prenume'];
mysql_connect("localhost","root");
mysql_select_db("test");
$query =mysql_query("SELECT * FROM angajati where nume='$nume' and prenume='$prenume'"); 


$randuri =mysql_num_rows($query); 



echo "<table border=‘2’ align=‘center’>";
echo"<tr >";

for ($i=0; $i<=$randuri; $i++){

$var=mysql_field_name($query,$i);
echo "<th> $var </th>";
}
echo"</tr>"; 

while ($row = mysql_fetch_row($query)){
echo"<tr>";
foreach ($row as $value) {
echo "<td> $value</td>";

}
echo "</tr>";
}
echo "</table>"; 
mysql_close();
?> 
