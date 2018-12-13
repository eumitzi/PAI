<?php

@mysql_connect("localhost","","") or die("Eroare de conectare!");
mysql_select_db("admitere") or die("Nu se conecteaza la baza de date!");

$id=$_POST['id'];

$query = mysql_query("select * from candidati where  id=$id ");

$var= mysql_num_rows($query);

if($var==0)
{
 echo "Nu exista persoana";
}
else
 mysql_query("delete from candidati where id=$id");
mysql_close();

?>