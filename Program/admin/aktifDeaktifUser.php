<title>Proses Edit User</title>
<?php
	session_start();
    $path = "../lib_func.php";
    include_once($path);
    //conncet to database
    connect();

	//deklarasi variabel
	$id_pengusaha= $_POST['id_pengusaha'];
	if(isset($_POST['deaktifasi'])){
		echo "deaktifasi";
		$sql = "UPDATE pengusaha SET status_akun = 'tidak aktif' WHERE id_pengusaha = '$id_pengusaha'";
		
		if(!mysql_query($sql))
		{
			print(mysql_error());
			echo '<script type="text/javascript">';
			echo 'alert("Edit Data Pengusaha Gagal")';
			echo '</script>';
			header( "refresh:0; url=listUser.php" );
		}
		else
		{
			print(mysql_error());
			echo '<script type="text/javascript">';
			echo 'alert("Edit Data Pengusaha Berhasil")';
			echo "</script>";
			header( "refresh:0; url=listUser.php" );
		}
	}elseif(isset($_POST['aktifasi'])){ 
		echo "aktifasi";
		$sql = "UPDATE pengusaha SET status_akun = 'aktif' WHERE id_pengusaha = '$id_pengusaha'";
		
		if(!mysql_query($sql))
		{
			print(mysql_error());
			echo '<script type="text/javascript">';
			echo 'alert("Edit Data Pengusaha Gagal")';
			echo '</script>';
			header( "refresh:0; url=listUser.php" );
		}
		else
		{
			print(mysql_error());
			echo '<script type="text/javascript">';
			echo 'alert("Edit Data Pengusaha Berhasil")';
			echo "</script>";
			header( "refresh:0; url=listUser.php" );
		}
	}
?>