<title>Proses Hapus Sektor</title>
<?php
	session_start();
    $path = "../lib_func.php";
    include_once($path);
    //conncet to database
    connect();

	//deklarasi variabel
	$id_sektor= $_POST['id_sektor'];
	
		//statement delete data
		$sql = "DELETE FROM sektor_usaha WHERE id_sektor = '$id_sektor'";
		
		//eksekusi statement delete data
		if(!mysql_query($sql))
		{
			print(mysql_error());
			echo '<script type="text/javascript">';
			echo 'alert("Proses Penghapusan Data Gagal")';
			echo '</script>';
			header( "refresh:0; url=listSektor.php" );
		}
		else
		{
			echo '<script type="text/javascript">';
			echo 'alert("Proses Penghapusan Data Berhasil")';
			echo "</script>";
			header( "refresh:0; url=listSektor.php" );
		}		
	
?>