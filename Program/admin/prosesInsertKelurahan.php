<title></title>
<?php


	session_start();
    $path = "../lib_func.php";
    include_once($path);
    //conncet to database
    connect();

	//deklarasi variabel
	$nama = $_POST['nama'];
	$lat = $_POST['lat'];
	$long = $_POST['long'];
	$kecamatan = $_POST['kecamatan'];

		
	$sql = "INSERT INTO kelurahan VALUES(NULL,'$nama',(select id_kecamatan from kecamatan where nama_kecamatan = '$kecamatan'),'lat','long')";
		
	//eksekusi statement insert data
	if(!mysql_query($sql))
	{
		echo '<script type="text/javascript">';
		echo 'alert("Tambah Data kelurahan Gagal")';
		echo '</script>';
		header( "refresh:0; url=insertKelurahan.php" );
	}
	else
	{
		echo '<script type="text/javascript">';
		echo 'alert("Tambah Data Kelurahan Berhasil")';
		echo "</script>";
		header( "refresh:0; url=admin.php" );
	}
	
?>