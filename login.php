<?php
	$pesan = $_GET["pesan"]];
	if (empty($pesan))
		$pesan = "Silahkan Login";
?>

<html>
<head>
<title>Login</title>
</head>
<body>
<center>
<form name="formlogin" method="post" action="cekpass.php">
	<table width="264" border="2" bgcolor="#CCFFFF" cellspacing="-" cellpadding="-">
		<tr align="center">
			<td colspan="3">
			<?php echo "<b>$pesan</b>"; ?>
			</td>
		</tr>
		<tr>
		<td width="78">User ID:</td>
		<td width="178" colspan="2">
			<input name="textuserid" type="text" size="10" maxlength="8" /></td>
		</tr>
		<tr>
			<td>Password:</td>
			<td colspan="2">
				<input name="textpassword" type="password" size="20" maxlength="20" /></td>
		</tr>
		<tr>
			<td colspan="3" align="center">
			<input type="submit" name="tombollogin" value="login" /></td>
		</tr>
	</table>
</form>
</center>
</body>
</html>