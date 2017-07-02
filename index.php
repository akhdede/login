<?php
require_once "db_conf.php";
require_once "Login.php";
$login = new Login($db_con);
if($login->sdhLogin()){ //jika user sudah login
	header("location:dashboard.php"); //langsung arahkan ke halaman dashboard
}
if(isset($_POST['login'])){ //jika user melakukan proses login(menekan tombol login)
	$username = $_POST['username']; //ambil data dari form username
	$password = md5($_POST['password']); //ambil data dari form password
	if($login->login($username,$password)){ //jika username dan password yang dimasukkan sesuai dengan yang ada di database
		header("location:dashboard.php"); //arahkan ke halaman dashboard
	}else{ //jika tidak sesuai
		$error = $login->getError(); //tampilkan pesan kesalahan
	}
}
?>
<pre>
<form method="post">
	<input type="text" name="username" placeholder="username">
	
	<input type="password" name="password" placeholder="password">
	
	<button type="submit" name="login">login</button>
</form>
</pre>
