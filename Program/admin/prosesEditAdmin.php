<title>Proses Edit Admin</title>
<?php
	session_start();
    $path = "../lib_func.php";
    include_once($path);
    //conncet to database
    connect();

	//deklarasi variabel
	$usernameAdmin= $_POST['usernameAdmin'];
	$password= $_POST['password'];
	$encrypted = md5($password); // Encrypting pssword using md5 algo
	$username_admin = $_POST['username_admin'];
		
	$query = "UPDATE admin SET username_admin = '$username_admin',password_admin = '$encrypted' WHERE username_admin = '$usernameAdmin'";

	//eksekusi statement insert data
	if(!mysql_query($query))
	{
		print(mysql_error());
		echo '<script type="text/javascript">';
		echo 'alert("Edit Data Admin Gagal")';
		echo '</script>';
		header( "refresh:0; url=listAdmin.php" );
	}
	else
	{
		echo '<script type="text/javascript">';
		echo 'alert("Edit Data Admin Berhasil")';
		echo "</script>";
		header( "refresh:0; url=listAdmin.php" );
	}
	
?>