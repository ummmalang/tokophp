<?php
	$textnama = $_POST['textnama'];
	$textjumlah = $_POST['textjumlah'];
	$textharga = $_POST['textharga'];
	$texttoko = $_POST['texttoko'];
	
	$texttanggal = date("d/m/y");
	
	$id_mysql = mysql_connect('localhost', 'root', '');
	$db_toko = mysql_select_db("toko", $id_mysql);
	
	$sql = "INSERT INTO tabel_beli" . "(nama, tanggal, jumlah, harga, toko)" .
			"VALUES('$textnama', '$texttanggal', '$textjumlah', '$textharga', '$texttoko')";
	$hasil = mysql_query($sql, $id_mysql);
	$jumlahlama = "SELECT jumlah FROM item WHERE nama = '$textnama'";
	$lama = mysql_query($jumlahlama, $id_mysql);
	$tangkep = mysql_fetch_array($lama);
	$jumlahbaru = ($tangkep['jumlah'] + $textjumlah);
	
	$edit = "UPDATE item SET jumlah = '$jumlahbaru' WHERE nama = '$textnama'" ;
	$berubah = mysql_query($edit, $id_mysql);
	
	if (empty($hasil))
		print("gagal menyimpan data nama = '$textnama'");
	else
		print("data nama = '$textnama' telah di simpan");
	
	mysql_close($id_mysql);
?>
