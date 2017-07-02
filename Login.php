<?php
class Login{
	private $error;
	function __construct($db_con){ 
		$this->db = $db_con;
		session_start(); //start session
	}	
// fungsi login	
	public function login($username,$password){
		try{
			$query = $this->db->prepare("select * from admin where username=:username && password=:password");
			$query->bindParam(":username",$username);
			$query->bindParam(":password",$password);
			$query->execute();
			$data = $query->fetch();
			if($username == $data['username'] and $password == $data['password']){ //apabila username dan password sesuai dengan data yang ada di table admin
				$_SESSION['user_session'] = $data['username']; //create session
				return true;
			}else{
				echo "username atau password salah"; //pesan yang ditampilkan apabila terjadi kesalahan penginputan username atau password
				return false;
			}
		}catch(PDOException $e){
			echo $e->getMessage();
			return false;
		}
	}
// fungsi apabila user sudah melakukan login
	public function sdhLogin(){
		if(isset($_SESSION['user_session'])){ 
			return true;
		}
	}
// fungsi logout
	public function logout(){
		session_destroy();
		unset($_SESSION['user_session']);
		return true;
	}
// fungsi untuk menampilkan pesan error saat terjadi kesalahan pada penginputan username atau password 	
	public function getError(){
		return $this->error;
	}
}
?>
