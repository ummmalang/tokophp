<html>
<head><title>Lihat Barang</title></head>
<body>
<?php
	$id_mysql = mysql_connect('localhost', 'root', '');
	$db_toko = mysql_select_db("toko", $id_mysql);
	
	$jumlahlama = "SELECT nama,jumlah FROM item";
	$lama = mysql_query($jumlahlama, $id_mysql);
	//$tangkep = mysql_fetch_array($lama);
	
	$jumlah = mysql_num_rows($lama);
	
	echo "Jumlah rekord : $jumlah";
	
	echo "<br><br>";
	
	echo "<table border=\"1\" align=\"center\">
	<tr>
	<th>Nama</th>
	<th>Jumlah</th>
	</tr>";
	
	while ($row=mysql_fetch_array($lama))
	{
		echo "<tr><td>";
		echo "<a href=\"history.php?ambil=$row[0]\">$row[0]</a>";
		echo "</td><td>";
		echo $row[1];
		echo "</td>
				<td>
					<a href=\"delete.php?nama=$row[0]\">delete</a>
					<a href=\"edit.php?nama=$row[0]\">edit</a>
				</td>";
		echo "</tr>";
	}
	echo "<td colspan=\"2\"><input type=\"button\" value=\"Back\" onclick=\"self.history.back()\" align=\"right\" />
			</td>";
	echo "</table>";
	mysql_close($id_mysql);
	
?>
</body>
</html>