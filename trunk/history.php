<?php
	$ambil = $_GET['ambil'];
	
	$id_mysql = mysql_connect('localhost', 'root', '');
	$db_toko = mysql_select_db("toko", $id_mysql);
	
	$beli = "SELECT nama,jumlah,harga,toko,tanggal FROM tabel_beli WHERE nama = '$ambil' LIMIT 0 , 30";
	$querybeli = mysql_query($beli, $id_mysql);
	$jual = "SELECT nama,Jumlah,harga,diskon,toko,tanggal,id_nota FROM tabel_jual WHERE nama = '$ambil' LIMIT 0 , 30";
	$queryjual = mysql_query($jual, $id_mysql);
	
	echo "<br><br>";
	
	echo "<table border=\"1\" align=\"left\">
	<tr>
	<th>Tabel Pembelian</th>
	</tr>
	<tr>
	<th>Nama</th>
	<th>Jumlah</th>
	<th>Harga</th>
	<th>Toko</th>
	<th>Tanggal</th>
	</tr>";
	
	while ($row=mysql_fetch_array($querybeli))
	{
		echo "<tr><td>";
		echo $row[0];
		echo "</td><td>";
		echo $row[1];
		echo "</td><td>";
		echo $row[2];
		echo "</td><td>";
		echo $row[3];
		echo "</td><td>";
		echo $row[4];
		echo "</td>";
		echo "</tr>";
	}
	echo "<td colspan=\"2\"><input type=\"button\" value=\"Back\" onclick=\"self.history.back()\" align=\"right\" />
			</td>";
	echo "</table>";
	
	
	echo "<table border=\"1\" align=\"right\">
	<tr>
	<th>Tabel Penjualan</th>
	</tr>
	<tr>
	<th>Nama</th>
	<th>Jumlah</th>
	<th>Harga</th>
	<th>Diskon</th>
	<th>Toko</th>
	<th>Tanggal</th>
	<th>Id_Nota</th>
	</tr>";
	
	while ($row=mysql_fetch_array($queryjual))
	{
		echo "<tr><td>";
		echo $row[0];
		echo "</td><td>";
		echo $row[1];
		echo "</td><td>";
		echo $row[2];
		echo "</td><td>";
		echo $row[3];
		echo "</td><td>";
		echo $row[4];
		echo "</td><td>";
		echo $row[5];
		echo "</td><td>";
		echo $row[6];
		echo "</td>";
		echo "</tr>";
	}
	echo "</table>";
		
	mysql_close($id_mysql);
?>