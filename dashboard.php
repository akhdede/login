<?php
require_once "db_conf.php";
require_once "Login.php";
$dashboard = new Login($db_con);
$data = $dashboard->sdhLogin(); //simpan fungsi sdhLogin() dalam variable data
if(!$data){ //jika user belum login
	header("location:index.php"); //arahkan ke halaman login
}
if(isset($_GET['logout'])){ //jika user mengklik link logout
	$dashboard->logout(); //aktifkan fungsi logout()
	header("location:index.php"); //arahkan ke halaman login
}
echo "selamat datang, <b><i>".$_SESSION['user_session']."</b></i><br>"; //tampilkan session user
echo "<a href=\"dashboard.php?logout\">logout</a>"; //link untuk proses logout
?>
