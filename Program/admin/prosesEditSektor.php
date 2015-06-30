<title>Proses Edit Sektor</title>
<?php
	session_start();
    $path = "../lib_func.php";
    include_once($path);
    //conncet to database
    connect();

	//deklarasi variabel
	$id_sektor= $_POST['id_sektor'];
	$sektor = $_POST['sektor'];
	
	$query = "UPDATE sektor_usaha SET sektor = '$sektor' WHERE id_sektor = '$id_sektor'";

	//eksekusi statement insert data
	if(!mysql_query($query))
	{
		print(mysql_error());
		echo '<script type="text/javascript">';
		echo 'alert("Edit Data Sektor Gagal")';
		echo '</script>';
		header( "refresh:0; url=listSektor.php" );
	}
	else
	{
		echo '<script type="text/javascript">';
		echo 'alert("Edit Data Sektor Berhasil")';
		echo "</script>";
		header( "refresh:0; url=listSektor.php" );
	}
?>