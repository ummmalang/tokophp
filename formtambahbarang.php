<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Tambah Barang</title>
</head>

<body>
<h1>Menambah Barang</h1>
<form name "formtambah" action="formtambahbarang.php" method="post">
	<table border="1" bgcolor="#99FF66">
		<tr>
			<td>Nama</td>
			<td> <input name="textnama" type="text" size="35" maxlength="35" /></td>
		</tr>
		<tr>
			<td>Jumlah</td>
			<td> <input name="textjumlah" type="text" size="5" maxlength="5" /></td>
		</tr>
		<tr>
			<td>Harga</td>
			<td> <input name="textharga" type="text" size="10" maxlength="10" /></td>
		</tr>
		<tr>
			<td>Toko</td>
			<td> <input name="texttoko" type="text" size="30" maxlength="30" /></td>
		</tr>
		
		<tr>
			<td colspan="2"><input name="buttonsimpan" type="submit" value="simpan" />
			<input type="button" value="Back" onclick="self.history.back()" align="right" />
			</td>
		</tr>
	</table>
	</form>
	
<?php
	if ($_POST["buttonsimpan"] == "simpan")
	{
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
	}
?>

</body>
</html>
