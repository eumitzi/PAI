
<?php

$nume=$_GET['nume'];
$prenume=$_GET['prenume'];

mysql_connect("localhost","root");
mysql_select_db("test");
$query =mysql_query("SELECT * FROM angajati where nume='$nume' and prenume='$prenume'"); 

$randuri =mysql_num_rows($query); 


echo "De cate ori apare persoana: ".$randuri."<br>";

if($randuri>1)
{
$stmt1 =mysql_query("SELECT avg(salar) FROM angajati where nume='$nume' and prenume='$prenume'"); 

$media=mysql_fetch_row($stmt1);
echo "Media: ".$media[0]."<br>";

$min =mysql_query("SELECT min(id) FROM angajati where nume='$nume' and prenume='$prenume'"); 
/*
$minim=mysql_fetch_row($min);
echo "Min id: ".$minim[0]."<br>";
*/
$delete =mysql_query("Delete from angajati where nume='$nume' and prenume='$prenume' and id!=$min[0] "); 

$update=mysql_query("Update angajati set salar=$media[0], an=$randuri where nume='$nume' and prenume='$prenume'  "); 


}
else
if($randuri==1)
{
	
$stmt1 =mysql_query("SELECT avg(salar) FROM angajati where nume='$nume' and prenume='$prenume'"); 

$media=mysql_fetch_row($stmt1);
echo "Media: ".$media[0]."<br>";

$min =mysql_query("SELECT min(id) FROM angajati where nume='$nume' and prenume='$prenume'"); 
/*
$minim=mysql_fetch_row($min);
echo "Min id: ".$minim[0]."<br>";
*/
$update1 =mysql_query("Update angajati set an='1' where nume='$nume' and prenume='$prenume'  "); 



}
else
if($randuri==0)
echo "Persoana nu exista!!";


echo "<br><br>";


//AFISARE TABEL


echo "<table border=‘2’ align=‘center’>";

echo"<tr>"; 
        
        echo "<td> ID </td>";
        echo "<td>".$min[0]."</td>";
echo"</tr>"; 
echo"<tr>"; 
        
        echo "<td> Nume </td>";
        echo "<td> $nume </td>";
echo"</tr>"; 
echo"<tr>"; 
        
        echo "<td> Prenume </td>";
        echo "<td> $prenume </td>";
echo"</tr>"; 
echo"<tr>"; 
        
        echo "<td> An </td>";
        echo "<td> $randuri</td>";
echo"</tr>"; 
echo"<tr>"; 
        
        echo "<td> Salar </td>";
        echo "<td>".$media[0]."</td>";
echo"</tr>"; 
echo "</table>"; 

mysql_close();
?> 
