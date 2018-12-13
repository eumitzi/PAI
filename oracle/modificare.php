
<?php

$nume=$_GET['nume'];
$prenume=$_GET['prenume'];

$conn=OCI_connect("student","student","orcl");

$stmt =OCI_Parse($conn, "SELECT count(*) FROM angajati222 where nume='$nume' and prenume='$prenume'"); 
OCI_Execute($stmt); 
$nr=OCI_fetch_row($stmt);
echo "De cate ori apare persoana: ".$nr[0]."<br>";

if($nr[0]>1)
{
$stmt1 =OCI_Parse($conn, "SELECT avg(salar) FROM angajati222 where nume='$nume' and prenume='$prenume'"); 
OCI_Execute($stmt1); 
$media=OCI_fetch_row($stmt1);
echo "Media: ".$media[0]."<br>";
OCI_Free_Statement($stmt1);

$min =OCI_Parse($conn, "SELECT min(id) FROM angajati222 where nume='$nume' and prenume='$prenume'"); 
OCI_Execute($min);
$minim=OCI_fetch_row($min);
echo "Min id: ".$minim[0]."<br>";
OCI_Free_Statement($min);

$delete =OCI_Parse($conn, "Delete from angajati222 where nume='$nume' and prenume='$prenume' and id!=$minim[0] "); 
OCI_Execute($delete);
OCI_Free_Statement($delete);

$update =OCI_Parse($conn, "Update angajati222 set salar=$media[0], an=$nr[0] where nume='$nume' and prenume='$prenume'  "); 
OCI_Execute($update);
OCI_Free_Statement($update);


}
else
if($nr[0]==1)
{
$update1 =OCI_Parse($conn, "Update angajati222 set an='1' where nume='$nume' and prenume='$prenume'  "); 
OCI_Execute($update1);
OCI_Free_Statement($update1);


}
else
if($nr[0]==0)
echo "Persoana nu exista!!";





//AFISARE TABEL


echo "<table border=‘2’ align=‘center’>";

echo"<tr>"; 
        
        echo "<td> ID </td>";
        echo "<td> $minim[0] </td>";
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
        echo "<td> $nr[0]</td>";
echo"</tr>"; 
echo"<tr>"; 
        
        echo "<td> Salar </td>";
        echo "<td> $media[0] </td>";
echo"</tr>"; 
echo "</table>"; 

OCI_Free_Statement($stmt); 
//OCI_Free_Statement($stmt1); 
OCI_close($conn);
?> 
