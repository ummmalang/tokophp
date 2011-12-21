<?php
	$id_mysql = mysql_connect('localhost', 'root', '');
	$db_toko = mysql_select_db("toko", $id_mysql);
	
	$textnama = $_POST['textnama'];
	
	$sql = "INSERT INTO item" . "(nama)" . "VALUES('$textnama')";
	$hasil = mysql_query($sql,$id_mysql);
	
	if (empty($hasil))
		print("gagal menyimpan data nama = '$textnama'");
	else
		print("data nama = '$textnama' telah di simpan");
	
	mysql_close($id_mysql);
?>
