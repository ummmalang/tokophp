<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Tambah Barang</title>
</head>

<body>
<h1>Barang Baru</h1>
	<form name "formbarangbaru" action="formbarangbaru.php" method="post">
	<table border="1" bgcolor="#99FF66">
		<tr>
			<td>Nama</td>
			<td> <input name="textnama" type="text" size="35" maxlength="35" /></td>
		</tr>
		
		<tr>
			<td colspan="2"><input name="buttonsimpan" type="submit" value="simpan" />
			<a href="index.php"</a> <input type="button" value="Back" onclick="self.history.back()" align="right" />
			</td>
			
		</tr>
	</table>
	</form>
	

<?php
	if ($_POST["buttonsimpan"] == "simpan")
	{
		$id_mysql = mysql_connect('localhost', 'root', '');
		$db_toko = mysql_select_db("toko", $id_mysql);
		
		$textnama = $_POST['textnama'];
		$ambil = "SELECT nama FROM item WHERE nama = '$textnama'";
		$queryambil = mysql_query($ambil,$id_mysql);
		$tangkep = mysql_num_rows($queryambil);
		//$cek = ($queryambil[0] = $_POST['textnama']);
		if ($tangkep >= 1)
		{
			echo '<script>alert("Barang dengan nama '.$_POST['textnama'].' sudah ada");</script>';
			return false;
		}
		else
		{
			$sql = "INSERT INTO item" . "(nama)" . "VALUES('$textnama')";
			$hasil = mysql_query($sql,$id_mysql);
			
			if (empty($hasil))
			{
				print("gagal menyimpan data nama = '$textnama'");
			}
			else
			{
				print("data nama = '$textnama' telah di simpan");
			}
		}
		
		mysql_close($id_mysql);
	}
?>


</body>
</html>