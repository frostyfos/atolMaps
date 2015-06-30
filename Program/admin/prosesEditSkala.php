<title>Proses Edit Skala</title>
<?php
	session_start();
    $path = "../lib_func.php";
    include_once($path);
    //conncet to database
    connect();

	//deklarasi variabel
	$id_skala= $_POST['id_skala'];
	$skala = $_POST['skala'];
		
		$query = "UPDATE skala_usaha SET skala = '$skala' WHERE id_skala = '$id_skala'";

		//eksekusi statement insert data
		if(!mysql_query($query))
		{
			print(mysql_error());
			echo '<script type="text/javascript">';
			echo 'alert("Edit Data Skala Gagal")';
			echo '</script>';
			header( "refresh:0; url=listSkala.php" );
		}
		else
		{
			echo '<script type="text/javascript">';
			echo 'alert("Edit Data Skala Berhasil")';
			echo "</script>";
			header( "refresh:0; url=listSkala.php" );
		}
	
?>