<title>Proses Hapus Skala</title>
<?php
	session_start();
    $path = "../lib_func.php";
    include_once($path);
    //conncet to database
    connect();

	//deklarasi variabel
	$id_skala= $_POST['id_skala'];
	
		//statement delete data
		$sql = "DELETE FROM skala_usaha WHERE id_skala = '$id_skala'";
		
		//eksekusi statement delete data
		if(!mysql_query($sql))
		{
			print(mysql_error());
			echo '<script type="text/javascript">';
			echo 'alert("Proses Penghapusan Data Gagal")';
			echo '</script>';
			header( "refresh:0; url=listSkala.php" );
		}
		else
		{
			echo '<script type="text/javascript">';
			echo 'alert("Proses Penghapusan Data Berhasil")';
			echo "</script>";
			header( "refresh:0; url=listSkala.php" );
		}		
	
?>