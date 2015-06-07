<title></title>
<?php


	session_start();
    $path = "/lib_func.php";
    include_once($path);
    //conncet to database
    connect();

	//deklarasi variabel
	$sektor = $_POST['sektor'];
		
	$sql = "INSERT INTO sektor_usaha(sektor) VALUES('$sektor')";
		
	//eksekusi statement insert data
	if(!mysql_query($sql))
	{
		echo '<script type="text/javascript">';
		echo 'alert("Tambah Data Pengusaha Gagal")';
		echo '</script>';
		header( "refresh:0; url=insertSektor.php" );
	}
	else
	{
		echo '<script type="text/javascript">';
		echo 'alert("Tambah Data Pengusaha Berhasil")';
		echo "</script>";
		header( "refresh:0; url=admin.php" );
	}
	
?>