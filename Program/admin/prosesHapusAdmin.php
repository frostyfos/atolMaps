<title>Proses Hapus Admin</title>
<?php
	session_start();
    $path = "../lib_func.php";
    include_once($path);
    //conncet to database
    connect();

	//deklarasi variabel
	$username_admin= $_POST['username_admin'];
	
		//statement delete data
		$sql = "DELETE FROM admin WHERE username_admin = '$username_admin'";
		
		//eksekusi statement delete data
		if(!mysql_query($sql))
		{
			print(mysql_error());
			echo '<script type="text/javascript">';
			echo 'alert("Proses Penghapusan Data Gagal")';
			echo '</script>';
			header( "refresh:0; url=listAdmin.php" );
		}
		else
		{
			echo '<script type="text/javascript">';
			echo 'alert("Proses Penghapusan Data Berhasil")';
			echo "</script>";
			header( "refresh:0; url=listAdmin.php" );
		}		
	
?>