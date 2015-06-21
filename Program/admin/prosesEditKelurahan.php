<title>Proses Edit Kelurahan</title>
<?php
	session_start();
    $path = "../lib_func.php";
    include_once($path);
    //conncet to database
    connect();

	//deklarasi variabel
	$id_kelurahan= $_POST['id_kelurahan'];
	$kecamatan= $_POST['kecamatan'];
	$nama_kelurahan = $_POST['nama_kelurahan'];
	$lat = $_POST['lat'];
	$long = $_POST['long'];
	
	$query = "UPDATE Kelurahan SET id_kecamatan = '$kecamatan', nama_kelurahan = '$nama_kelurahan',lat = '$lat',lng = '$long' WHERE id_kelurahan = '$id_kelurahan'";

	//eksekusi statement insert data
	if(!mysql_query($query))
	{
		print(mysql_error());
		echo '<script type="text/javascript">';
		echo 'alert("Edit Data Kelurahan Gagal")';
		echo '</script>';
		header( "refresh:0; url=listKelurahan.php" );
	}
	else
	{
		echo '<script type="text/javascript">';
		echo 'alert("Edit Data Kelurahan Berhasil")';
		echo "</script>";
		header( "refresh:0; url=listKelurahan.php" );
	}
	
?>