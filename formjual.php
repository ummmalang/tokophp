<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Form Jual</title>
</head>

<body>
<h1>Form Penjualan</h1>
<form name="formjual" action="formjual.php" method="post">
<table border="1" bgcolor="#99FF66">
		<tr>
			<td>Nomor</td>
			<td>Nama Barang</td>
			<td>Quantity</td>
			<td>Harga Satuan</td>
			<td>Diskon</td>
			<td>Total</td>
		</tr>
<?php
	$a=1;
		while($a<=10)
		{
			$textnama="textnama".$a;
			$kuantiti="kuantiti".$a;
			$hargasatuan="hargasatuan".$a;
			$diskon="diskon".$a;
			$total="total".$a;
			print("<tr valign='middle' align='center'>\n");
			print("<td>'$a'</td>\n");
			print("<td><input name='$textnama' type='$text' size='35' maxlength='35' /></td>\n");
			print("<td><input name='$kuantiti' id='$idq' type='text' size='10' maxlength='10' /></td>\n");
			print("<td><input name='$hargasatuan' id='$idh' type='text' size='15' maxlength='15' onkeyup='$total.value=$kuantiti.value*$hargasatuan.value' /></td>\n");
			print("<td><input name='$diskon' id='$idd' type='text' size='15' maxlength='15' onkeyup='$total.value=$total.value-$diskon.value' /></td>\n");
			print("<td><input name='$total' id='$idt' type='text' size='15' maxlength='15' /></td>\n");
			print("</tr>");
			$a++;
		}
		
?>

		<tr>
			<td colspan="2"><input name="buttonjual" type="submit" value="Finish" />
			<input type="button" value="Back" onclick="self.history.back()" align="right" />
			</td>
		</tr>

	<?php
		if ($_POST["buttonjual"] == "Finish")
		{		
			$id_mysql = mysql_connect('localhost', 'root', '');
			$db_toko = mysql_select_db("toko", $id_mysql);
			$b=1;
			while($b<=10)
			{
			if(!empty($_POST["textnama".$b]))
				{
					$sisa = "SELECT jumlah FROM item WHERE nama = '".$_POST['textnama'.$b]."'";
					$lama = mysql_query($sisa, $id_mysql);
					$tangkep = mysql_fetch_array($lama);
					$cek = ($tangkep['jumlah'] >= $_POST["kuantiti".$b]);
					if ($cek)
					{
						$jumlahbaru = ($tangkep['jumlah'] - $_POST["kuantiti".$b]);
						$edit = "UPDATE item SET jumlah = '$jumlahbaru' WHERE nama = '".$_POST['textnama'.$b]."'";
						mysql_query($edit);
					}
					else
					{
						echo '<script>alert("persediaan '.$_POST['textnama'.$b].' tidak cukup");</script>';
						return false;
					}
					
				}$b++;
			}
					
			$texttanggal = date("d/m/y");
			$q=mysql_fetch_object(mysql_query("select count(id_nota) as value from table_nota where 							id_nota like '%$texttanggal'",$id_mysql));
			$n=$q->value+1;
			$nota = $n."/".$texttanggal;
			$sql = "INSERT INTO table_nota VALUES('', '$nota', '$texttanggal')";
			$hasil = mysql_query($sql, $id_mysql);
			
			$i=1;
			while($i<=10)
			{
				$index1="textnama".$i;
				if(!empty($_POST[$index1]))
				{
					$index2="kuantiti".$i;
					$index3="hargasatuan".$i;
					$index4="diskon".$i;
								
					$sql = "INSERT INTO tabel_jual" . "(nama, tanggal, jumlah, harga, diskon, 	id_nota)" .
							"VALUES('$_POST[$index1]', '$texttanggal', '$_POST[$index2]', '$_POST[$index3]', '$_POST[$index4]', '$nota')";
					$hasil = mysql_query($sql, $id_mysql);
							
					if (empty($hasil))
						print("gagal menyimpan data nama = '$_POST[$index1]'");
					else
						print("data nama = '$_POST[$index1]' telah di simpan");
					
				}
				$i++;
			}
			mysql_close($id_mysql);
		}
	?>
			
			
</body>
</html>
