<title>Proses Tambah Kecamatan</title>
<?php


	session_start();
    $path = $_SERVER['DOCUMENT_ROOT'];
    $path .= "/atolMaps/program/lib_func.php";
    include_once($path);
    //connect to database
    connect();

	//deklarasi variabel
	$nama = $_POST['nama'];
	$latitude = $_POST['lat'];
	$longitude = $_POST['long'];
		
		$sql = "INSERT INTO kecamatan VALUES(NULL,'$nama','$latitude','$longitude')";
		
		//eksekusi statement insert data
		if(!mysql_query($sql))
		{
			echo '<script type="text/javascript">';
			echo 'alert("Tambah Data Kecamatan Gagal")';
			echo '</script>';
			header( "refresh:0; url=/atolMaps/Program/admin/insertKecamatan.php" );
		}
		else
		{
			echo '<script type="text/javascript">';
			echo 'alert("Tambah Data Kecamatan Berhasil")';
			echo "</script>";
			header( "refresh:0; url=/atolMaps/Program/admin/admin.php" );
		}
	
?>