<title></title>
<?php
	session_start();
    $path = "../lib_func.php";
    include_once($path);
    //conncet to database
    connect();

	//deklarasi variabel
	$skala = $_POST['skala'];
		
	$sql = "INSERT INTO skala_usaha(skala) VALUES('$skala')";
		
	//eksekusi statement insert data
	if(!mysql_query($sql))
	{
		echo '<script type="text/javascript">';
		echo 'alert("Tambah Data Pengusaha Gagal")';
		echo '</script>';
		header( "refresh:0; url=insertSkala.php" );
	}
	else
	{
		echo '<script type="text/javascript">';
		echo 'alert("Tambah Data Pengusaha Berhasil")';
		echo "</script>";
		header( "refresh:0; url=listSkala.php" );
	}
	
?>