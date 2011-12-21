<?php
	$id_mysql = mysql_connect('localhost', 'root', '');
	$db_toko = mysql_select_db("toko", $id_mysql);
	
{
	$sql = "SELECT password, kategori FROM user WHERE user_id = '$user_id'";
	$hasil = mysql_query($sql, $id_mysql);
	if (! $hasil)
		return FALSE;
	$baris = mysql_fetch_row($hasil);
	$pass_di_db = $baris[0];
	$kategori = $baris[1];
	
	$passw_user = md5($password);
	if ($passw_user == $passw_di_db)
		return TRUE;
	else
		return FALSE;
}

funtion otentikasi_ok()
{
	session_start();
	if (empty($_SESSION["user_id"]))
		return FALSE;
		
	$user_id = $_SESSION["user_id"];
	$password = $_SESSION["password"];
	$kategori = $_SESSION["kategori"];
	
	if (password_ok($user_id, $password))
	{
		$id_mysql = mysql_connect('localhost', 'root', '');
		$db_toko = mysql_select_db("toko", $id_mysql);
		$nama_skrip = basename($_SERVER['PHP_SELF']);
		$sql = "SELECT hak FROM akses where Skrip = '$nama_skrip'";
		$hasil = mysql_query($sql,$id_mysql);
		$baris = mysql_fetch_row($hasil);
		$hak = $baris[0];
		mysql_close($id_mysql);
		
		if(strpos($hak, $kategori) === FALSE)
			return FALSE;
		else
			return TRUE;
	}
	
	function ambil_kategori($user_id)
	{
		$id_mysql = mysql_connect('localhost', 'root', '');
		$db_toko = mysql_select_db("toko", $id_mysql);
		
		$sql = "SELECT kategori FROM user WHERE user_id = '$user_id'";
		$hasil = mysql_query($sql, $id_mysql);
		if(! $hasil)
		{
			mysql_close($id_mysql);
			
			return FALSE;
		}
		
		$baris = mysql_fetch_row($hasil);
		$kategori = $baris[0];
		mysql_close($id_mysql);
		
		return $kategori;
	}
?>