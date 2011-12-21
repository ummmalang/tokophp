<?php
$id_mysql = mysql_connect('localhost', 'root', '');
$db_toko = mysql_select_db("toko",$id_mysql);

$ambil = "SELECT jumlah FROM item";
$query = mysql_query($ambil, $id_mysql);
$tangkep = mysql_fetch_array($query);

echo "$tangkep[0]";
mysql_close($id_mysql);
?>