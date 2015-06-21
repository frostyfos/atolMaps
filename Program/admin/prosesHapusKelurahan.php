<title>Proses Hapus Kelurahan</title>
<?php
	session_start();
    $path = "../lib_func.php";
    include_once($path);
    //conncet to database
    connect();

	//deklarasi variabel
	$id_kelurahan= $_POST['id_kelurahan'];
	
	//statement delete data
	$sql = "DELETE FROM kelurahan WHERE id_kelurahan = '$id_kelurahan'";
		
	//eksekusi statement delete data
	if(!mysql_query($sql))
	{
		print(mysql_error());
		echo '<script type="text/javascript">';
		echo 'alert("Proses Penghapusan Data Gagal")';
		echo '</script>';
		header( "refresh:0; url=listKelurahan.php" );
	}
	else
	{
		echo '<script type="text/javascript">';
		echo 'alert("Proses Penghapusan Data Berhasil")';
		echo "</script>";
		header( "refresh:0; url=listKelurahan.php" );
	}		
?>