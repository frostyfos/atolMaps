<title>Proses Edit User</title>
<?php
	session_start();
    $path = "../lib_func.php";
    include_once($path);
    //conncet to database
    //adm.bdgatlmap@gmail.com
    connect();
	//deklarasi variabel
	$id_pengusaha= $_POST['id_pengusaha'];
	if(isset($_POST['deaktifasi'])){
		$sql = "UPDATE pengusaha SET status_akun = 'tidak aktif' WHERE id_pengusaha = '$id_pengusaha'";
		
		if(!mysql_query($sql))
		{
			print(mysql_error());
			echo '<script type="text/javascript">';
			echo 'alert("Deaktifasi User Gagal")';
			echo '</script>';
			header( "refresh:0; url=listUser.php" );
		}
		else
		{
			print(mysql_error());
			echo '<script type="text/javascript">';
			echo 'alert("Deaktifasi User Berhasil")';
			echo "</script>";
			header( "refresh:0; url=listUser.php" );
		}
	}elseif(isset($_POST['aktifasi'])){ 
		$email = $_POST['email'];
	    $noKtp = $_POST['noKtp'];
	    $password = $_POST['password'];
	    $tmpPassword = $_POST['tmpPassword'];
	    
		$sql = "UPDATE pengusaha SET status_akun = 'aktif' WHERE id_pengusaha = '$id_pengusaha'";

		$to      = $email;
		$subject = 'Aktifasi akun';
		$message = '
		 
		Akun anda telah di aktifasi!
		dengan ketentuan sebagai berikut : 
		 
		------------------------
		Username: '.$noKtp.'
		Password: '.$tmpPassword.'
		------------------------
		 
		'; // Our message above including the link
		                     
		$headers = 'From:adm.bdgatlmap@gmail.com' . "\r\n"; // Set from headers
		mail($to, $subject, $message, $headers); // Send our email
		
		if(!mysql_query($sql))
		{
			print(mysql_error());
			echo '<script type="text/javascript">';
			echo 'alert("Aktifasi User Gagal")';
			echo '</script>';
			header( "refresh:0; url=listUser.php" );
		}
		else
		{
			print(mysql_error());
			echo '<script type="text/javascript">';
			echo 'alert("Aktifasi User Berhasil")';
			echo "</script>";
			header( "refresh:0; url=listUser.php" );
		}
	}
?>