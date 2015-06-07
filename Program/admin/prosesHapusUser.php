<title>Proses Hapus User</title>
<?php
	session_start();
    $path = "../lib_func.php";
    include_once($path);
    //conncet to database
    connect();

	//deklarasi variabel
	$id_pengusaha= $_POST['id_pengusaha'];
	
	if(isset($_POST['ya']))
	{
		//statement delete data
		$sql = "DELETE FROM pengusaha WHERE id_pengusaha = '$id_pengusaha'";
		
		//eksekusi statement delete data
		if(!mysql_query($sql))
		{
			echo '<script type="text/javascript">';
			echo 'alert("Proses Penghapusan Data Gagal")';
			echo '</script>';
			header( "refresh:0; url=listUser.php" );
		}
		else
		{
			echo '<script type="text/javascript">';
			echo 'alert("Proses Penghapusan Data Berhasil")';
			echo "</script>";
			header( "refresh:0; url=listUser.php" );
		}		
	}
	elseif(isset($_POST['tidak']))
	{
		echo '<script type="text/javascript">';
		echo 'alert("Proses Penghapusan Data Dibatalkan")';
		echo "</script>";
		header( "refresh:0; url=listUser.php" );
	}
	
?>