<?php
	//connect database
    session_start(); 
    $path = $_SERVER['DOCUMENT_ROOT'];
    $path .= "/atolMaps/program/lib_func.php";
    include_once($path);
    
    connect();

	$id_kecamatan = $_POST['id_kecamatan'];
	//validasi penghapusan/edit data
	if(isset($_POST["update"]))
	{
		$nama = $_POST['nama'];
		$lat = $_POST['lat'];
		$long = $_POST['long'];
		
		//statement update data
			$sql = "UPDATE pengusaha 
			SET nama = '$nama', lat = '$lat', long = '$long' 
			WHERE id_kecamatan = '$id_kecamatan'";
			
			//eksekusi statement update data
			if(!mysql_query($sql))
			{
				echo '<script type="text/javascript">';
				echo 'alert("Proses Update Kecamatan Gagal")';
				echo '</script>';
				header( "refresh:0; url=/atolMaps/program/admin/listKecamatan.php" );
			}
			else
			{
				echo '<script type="text/javascript">';
				echo 'alert("Proses Update Kecamatan Berhasil")';
				echo "</script>";
				header( "refresh:0; url=/atolMaps/program/admin/listKecamatan.php" );
			}	
		elseif(isset($_POST['tidak']))
		{
			echo '<script type="text/javascript">';
			echo 'alert("Proses Edit Kecamatan Dibatalkan")';
			echo "</script>";
			header( "refresh:0; url=/atolMaps/program/admin/listKecamatan.php" );
		}
	}
	/*elseif(isset($_POST["delete"]))
	{
		if(isset($_POST['ya']))
		{
			//statement delete data
			$sql = "DELETE FROM pantry WHERE id_pantry = '$id_pantry'";
		
			//eksekusi statement delete data
			if(!mysql_query($sql))
			{
				echo '<script type="text/javascript">';
				echo 'alert("Proses Penghapusan Data Gagal")';
				echo '</script>';
				header( "refresh:0; url=/broto/admin/show_petugas.php" );
			}
			else
			{
				echo '<script type="text/javascript">';
				echo 'alert("Proses Penghapusan Data Berhasil")';
				echo "</script>";
				header( "refresh:0; url=/atolMaps/program/admin/listUser.php" );
			}		
		}
		elseif(isset($_POST['tidak']))
		{
			echo '<script type="text/javascript">';
			echo 'alert("Proses Penghapusan Data Dibatalkan")';
			echo "</script>";
			header( "refresh:0; url=/atolMaps/program/admin/listUser.php" );
		}
	}*/
?>