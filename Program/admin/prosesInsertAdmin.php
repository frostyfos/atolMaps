<title>Proses SignUp</title>
<?php
	session_start();
    $path = "../lib_func.php";
    include_once($path);
    //conncet to database
    connect();

	//deklarasi variabel
	$username = $_POST['username'];
	$password = $_POST['password'];
	$encrypted = md5($password); // Encrypting pssword using md5 algo
	
		
	$sql = "INSERT INTO admin(username_admin,password_admin) VALUES('$username','$encrypted')";
		
	//eksekusi statement insert data
	if(!mysql_query($sql))
	{
		echo '<script type="text/javascript">';
		echo 'alert("Tambah Data Pengusaha Gagal")';
		echo '</script>';
		header( "refresh:0; url=insertAdmin.php" );
	}
	else
	{
		echo '<script type="text/javascript">';
		echo 'alert("Tambah Data Pengusaha Berhasil")';
		echo "</script>";
		header( "refresh:0; url=listAdmin.php" );
	}
	
?>