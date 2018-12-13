<?php

$conn=OCI_connect("student","student","orcl");

$id=$_GET['id'];
$nume=$_GET['nume'];
$prenume=$_GET['prenume'];
$an=$_GET['an'];
$salar=$_GET['salar'];


$stmt =OCI_Parse($conn, "SELECT count(*) FROM angajati222 where nume='$nume' and an=$an"); 
OCI_Execute($stmt); 

$nr_inreg=OCI_fetch_row($stmt);

if($nr_inreg[0]!=0)
      {
      $update =OCI_Parse($conn, "UPDATE angajati222 SET salar=$salar where nume='$nume' and an=$an"); 
      OCI_Execute($update); 
      OCI_Free_Statement($update); 

      }
else
      {
      $insert =OCI_Parse($conn, "INSERT INTO angajati222 VALUES ($id,'$nume','$prenume',$an,$salar)"); 
      OCI_Execute($insert); 
      OCI_Free_Statement($insert); 
      
      }

      
//echo "<br>AFISARE TABEL DUPA UPDATE SAU INSERARE <br>";
/*
$stmt1 =OCI_Parse($conn, "SELECT count(*) FROM angajati222"); 
OCI_Execute($stmt1);

$nr_inreg=OCI_fetch_row($stmt1);

$stmt2 =OCI_Parse($conn, "SELECT * FROM angajati222"); 
OCI_Execute($stmt2);


for ($i=1; $i<=$nr_inreg[0]; $i++){

$var=OCI_field_name($stmt2,$i);
echo "<th> $var </th>";
}
echo"</tr>"; 


while ($row = OCI_fetch_row($stmt2)){
echo"<tr>";
foreach ($row as $value) {
echo "<td> $value</td>";

}
echo "</tr>";
}
echo "</table>"; 
*/
OCI_Free_Statement($stmt); 
//OCI_Free_Statement($stmt1);
//OCI_Free_Statement($stmt2); 

OCI_close($conn);
?> 


