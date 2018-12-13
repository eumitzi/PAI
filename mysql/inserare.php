<?php


$id=$_GET['id'];
$nume=$_GET['nume'];
$prenume=$_GET['prenume'];
$an=$_GET['an'];
$salar=$_GET['salar'];

mysql_connect("localhost","root");
mysql_select_db("test");
$query=mysql_query("SELECT * FROM angajati where nume='$nume' and an=$an");
$nr_inreg =mysql_num_rows($query); 



if($nr_inreg!=0)
      {
      $update =mysql_query("UPDATE angajati SET salar=$salar where nume='$nume' and an=$an"); 
     
      }
else
      {
      $insert =mysql_query("INSERT INTO angajati VALUES ($id,'$nume','$prenume',$an,$salar)"); 
   
      
      }

      



mysql_close();
?> 


