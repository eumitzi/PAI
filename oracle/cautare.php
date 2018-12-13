
<?php

$nume=$_GET['nume'];
$prenume=$_GET['prenume'];
$conn=OCI_connect("student","student","orcl");

$stmt =OCI_Parse($conn, "SELECT * FROM angajati222 where nume='$nume' and prenume='$prenume'"); 
OCI_Execute($stmt); 


$stmt1 =OCI_Parse($conn, "SELECT count(*) FROM angajati222"); 
OCI_Execute($stmt1);

$nr_inreg=OCI_fetch_row($stmt1);


echo "<table border=‘2’ align=‘center’>";
echo"<tr >";

for ($i=1; $i<=$nr_inreg[0]-1; $i++){

$var=OCI_field_name($stmt,$i);
echo "<th> $var </th>";
}
echo"</tr>"; 

while ($row = OCI_fetch_row($stmt)){
echo"<tr>";
foreach ($row as $value) {
echo "<td> $value</td>";

}
echo "</tr>";
}
echo "</table>"; 

OCI_Free_Statement($stmt); 
OCI_Free_Statement($stmt1); 
OCI_close($conn);
?> 
