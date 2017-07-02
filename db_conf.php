<?php
$host		= "localhost";
$namadb		= "login";	//nama database
$pengguna	= "login";	//user mysql
$sandi		= "login123";	//pass mysql
try{
	$db_con = new PDO("mysql:host=$host;dbname=$namadb",$pengguna,$sandi); 
	$db_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
	echo "error: ".$e->getMessage();
	return false;
}
?>
