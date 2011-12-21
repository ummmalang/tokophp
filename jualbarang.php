<?php
	
	$id_mysql = mysql_connect('localhost', 'root', '');
	$db_toko = mysql_select_db("toko", $id_mysql);
	
	$texttanggal = date("d/m/y");
	$q=mysql_fetch_object(mysql_query("select count(id_nota) as value from table_nota where id_nota like '%$texttanggal'",$id_mysql));
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
						
			$sql = "INSERT INTO tabel_jual" . "(nama, tanggal, jumlah, harga, diskon, id_nota)" .
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
?>
			
			