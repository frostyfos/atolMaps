<title>Proses Hapus User</title>
<?php
	session_start();
    $path = "../lib_func.php";
    include_once($path);
    //conncet to database
    connect();

	//deklarasi variabel
	$id_usaha= $_POST['id_usaha'];
	
	//statement delete data
	$sql = "DELETE FROM usaha WHERE id_usaha = '$id_usaha'";
		
	//eksekusi statement delete data
	if(!mysql_query($sql))
	{
		echo '<script type="text/javascript">';
		echo 'alert("Proses Penghapusan Data Gagal")';
		echo '</script>';
		header( "refresh:0; url=tampilUsahaBandung.php" );
	}
	else
	{
		echo '<script type="text/javascript">';
		echo 'alert("Proses Penghapusan Data Berhasil")';
		echo "</script>";
		header( "refresh:0; url=tampilUsahaBandung.php" );
	}		
?>