<?php
	//connect database
    session_start(); 
    $path = $_SERVER['DOCUMENT_ROOT'];
    $path .= "/atolMaps/program/lib_func.php";
    include_once($path);
    
    connect();

	$id_pengusaha = $_POST['id_pengusaha'];
	//validasi penghapusan/edit data
	if(isset($_POST["update"]))
	{
		$no_ktp = $_POST['noKtp'];
		$nama = $_POST['nama'];
		$alamat = $_POST['alamat'];
		$ttl = $_POST['ttl'];
		$jk = $_POST['jk'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		//$encrypted = md5($password);
		$status_akun = $_POST['status_akun'];

		if($_FILES['fotoktp']['error']==0){
			$namafilebaru="../gambar/".$_FILES['fotoktp']['name'];
		
		if(move_uploaded_file($_FILES['fotoktp']['tmp_name'],
			$namafilebaru)==true){
		echo "File telah tersimpan.";
		}
		else
		echo "Gagal menyimpan file upload";
		}
		else
		echo "Gagal Upload";
		
		$filektp = "gambar/".$_FILES['fotoktp']['name'];

		if(isset($_POST['ya']))
		{
			//statement update data
			$sql = "UPDATE pengusaha 
			SET no_ktp = '$no_ktp', nama = '$nama', alamat = '$alamat', ttl = '$ttl', jk = '$jk', file_ktp = '$filektp', email = '$email', password = '$password' 
			WHERE id_pengusaha = '$id_pengusaha'";
			
			//eksekusi statement update data
			if(!mysql_query($sql))
			{
				echo '<script type="text/javascript">';
				echo 'alert("Proses Update Data Gagal")';
				echo '</script>';
				header( "refresh:0; url=/atolMaps/program/admin/listUser.php" );
			}
			else
			{
				echo '<script type="text/javascript">';
				echo 'alert("Proses Update Data Berhasil")';
				echo "</script>";
				header( "refresh:0; url=/atolMaps/program/admin/listUser.php" );
			}	
		}
		elseif(isset($_POST['tidak']))
		{
			echo '<script type="text/javascript">';
			echo 'alert("Proses Edit Data Dibatalkan")';
			echo "</script>";
			header( "refresh:0; url=/atolMaps/program/admin/listUser.php" );
		}
	}
	elseif(isset($_POST["delete"]))
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
	}
?>