<title>Proses Hapus Kecamatan</title>
<?php
	session_start();
    $path = "../lib_func.php";
    include_once($path);
    //conncet to database
    connect();

	//deklarasi variabel
	$id_kecamatan= $_POST['id_kecamatan'];
	//statement delete data
	$sql = "DELETE FROM kecamatan WHERE id_kecamatan = '$id_kecamatan'";
	
	//eksekusi statement delete data
	if(!mysql_query($sql))
	{
		print(mysql_error());
		echo '<script type="text/javascript">';
		echo 'alert("Proses Penghapusan Data Gagal")';
		echo '</script>';
		header( "refresh:0; url=listKecamatan.php" );
	}
	else
	{
		echo '<script type="text/javascript">';
		echo 'alert("Proses Penghapusan Data Berhasil")';
		echo "</script>";
		header( "refresh:0; url=listKecamatan.php" );
	}		

?>