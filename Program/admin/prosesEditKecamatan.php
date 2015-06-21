<title>Proses Edit Kecamatan</title>
<?php
	session_start();
    $path = "../lib_func.php";
    include_once($path);
    //conncet to database
    connect();

	//deklarasi variabel
	$id_kecamatan= $_POST['id_kecamatan'];
	$nama_kecamatan = $_POST['nama_kecamatan'];
	$lat = $_POST['lat'];
	$long = $_POST['long'];
	
	$query = "UPDATE kecamatan SET nama_kecamatan = '$nama_kecamatan',lat = '$lat',lng = '$long' WHERE id_kecamatan = '$id_kecamatan'";

	//eksekusi statement insert data
	if(!mysql_query($query))
	{
		print(mysql_error());
		echo '<script type="text/javascript">';
		echo 'alert("Edit Data Kecamatan Gagal")';
		echo '</script>';
		header( "refresh:0; url=listKecamatan.php" );
	}
	else
	{
		echo '<script type="text/javascript">';
		echo 'alert("Edit Data Kecamatan Berhasil")';
		echo "</script>";
		header( "refresh:0; url=listKecamatan.php" );
	}
	
?>