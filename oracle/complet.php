<?php
echo $opt=$_GET['opt'];
$nume=$_POST['nume'];
echo $nume;
$conect=oci_connect("student","student","orcl");
if($opt == '1')
{
$stat=oci_parse($conect,"select * from angajati1");
oci_execute($stat);
echo "<table border='3' bgcolor='green' align='center'>";
echo "<tr>";
echo "<th>ID</th>";
echo "<th>Nume</th>";
echo "<th>Prenume</th>";
echo "<th>Anul angajari</th>";
echo "<th>Salar</th>";


while($row=oci_fetch_row($stat))
{
 print("<tr>\n".
	"<td>$row[0]</td>\n".
	"<td>$row[1]</td>\n".
	"<td>$row[2]</td>\n".
	"<td>$row[3]</td>\n".
	"<td>$row[4]</td>\n".
	"</tr>");
}
echo "</table>";
}
elseif($opt == '2')
{
echo $nume=$_POST['nume'];
$prenume=$_POST['prenume'];
$salar=$_POST['salar'];
echo $an=$_POST['an'];

$valoare=oci_parse($conect,"select count(*) from angajati1 where nume='$nume' and an='$an'");
oci_execute($valoare);
$rand=oci_fetch_row($valoare);
$nr= $rand[0];

	if($nr > 0)
	{
	 $update = oci_parse($conect,"update angajati1 set salar='$salar' where nume='$nume' and an='$an'");
	 oci_execute($update);
	}
	else
	{
	$stat=oci_parse($conect,"select max(id) from angajati1");
	oci_execute($stat);
	$row=oci_fetch_row($stat);
	$idmax=$row[0]+1;
	$randnou =oci_parse($conect,"insert into angajati1 values($idmax,'$nume','$prenume',$an ,$salar)");
	oci_execute($randnou);
	}
}
elseif($opt=='3')
{
echo $nume=$_POST['nume'];
$prenume=$_POST['prenume'];
$salar=$_POST['salar'];
echo $an=$_POST['an'];
$valoare=oci_parse($conect,"select count(*) from angajati1 where nume='$nume' and prenume='$prenume'");
oci_execute($valoare);
$rand=oci_fetch_row($valoare);
echo $nr= $rand[0];

	if($nr > 0)
	{
	 $update = oci_parse($conect,"update angajati1 set salar='$salar' where nume='$nume' and an='$an'");
	 oci_execute($update);
	 ///
	 $stat=oci_parse($conect,"select * from angajati1 where nume='$nume' and prenume='$prenume'");
	oci_execute($stat);
	echo "<table border='3' bgcolor='green' align='center'>";
	echo "<tr>";
	echo "<th>ID</th>";
	echo "<th>Nume</th>";
	echo "<th>Prenume</th>";
	echo "<th>Anul angajari</th>";
	echo "<th>Salar</th>";
	while($row=oci_fetch_row($stat))
	{
	print("<tr>\n".
	"<td>$row[0]</td>\n".
	"<td>$row[1]</td>\n".
	"<td>$row[2]</td>\n".
	"<td>$row[3]</td>\n".
	"<td>$row[4]</td>\n".
	"</tr>");
	}
	echo "</table>";	
	}
	else
	{
	echo "Nu exista asa ceva";
	}
}
elseif($opt=='4')
{
	echo $nume=$_POST['nume'];
	$prenume=$_POST['prenume'];
	$st=oci_parse($conect,"select count(*) from angajati1 where nume='$nume' and prenume='$prenume'");
	oci_execute($st);
	$nr=$st[0];
	if($nr > 1)
	{
		$med=oci_parse($conect,"select average(salar) from angajati1 where nume-'$nume' and prenume='$prenume'");
		oci_execute($med);
		$rand=oci_fetch_row($med);
		$medie=$rand[0];
		
		$min=oci_parse($conect,"select min(id) from angajati1 where nume-'$nume' and prenume='$prenume'");
		oci_execute($min);
		$rand=oci_fetch_row($min);
		$idmin=$rand[0];
		
		$id=oci_parse($conect,"delete from angajati1 where nume-'$nume' and prenume='$prenume and id!=$idmin'");
		oci_execute($id);
		$rand=oci_fetch_row($min);
		$idmin=$rand[0];
		
		$sal=oci_parse($conect,"insert into angajati1 values('$idmin','$nume','$prenume',2012,'$medie')");
		oci_execute($sal);
		$rand=oci_fetch_row($sal);
		$idmin=$rand[3];
		//echo $idmin;
		for($i=0;$i<4;$i++)
		{
		echo $rand['$i'];
		}
		
	}
}
else
{
echo "asta e";
}
oci_close($conect);
?>