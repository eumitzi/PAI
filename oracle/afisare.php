
<?php

$conn=OCI_connect("student","","orcl");
$stmt =OCI_Parse($conn, "SELECT * FROM angajati"); 
OCI_Execute($stmt); 


$stmt1 =OCI_Parse($conn, "SELECT count(*) FROM angajati"); 
OCI_Execute($stmt1);

$row = OCI_fetch_row($stmt1);
echo $nr_inreg=$row[0];

if($nr_inreg>0) 
{
$nr_col=OCI_num_fields($stmt);
echo $nr_col;

echo"<br >";
echo "<table border=‘2’ align=‘center’>";
echo"<tr >";

for ($i=1; $i<=$nr_col; $i++){

$var=OCI_field_name($stmt,$i);
echo "<th> $var </th>";
}
echo"</tr>"; 

 $nr_val=0;
// contor indice array
while ($row = OCI_fetch_row($stmt)){
echo"<tr>";
foreach ($row as $value) {
echo "<td> $value</td>";

}
echo "</tr>";
}
echo "</table>"; 
}
else
{
echo "NU exista";

}
OCI_Free_Statement($stmt); 
OCI_Free_Statement($stmt1); 
OCI_close($conn);
?> 
