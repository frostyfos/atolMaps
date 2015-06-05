<<<<<<< HEAD
<title></title>
<?php
=======
<title>Proses SignUp</title>
<?php


>>>>>>> 123657fbea84b1a6d0955cf36b51800943ab3484
	session_start();
    $path = $_SERVER['DOCUMENT_ROOT'];
    $path .= "/atolMaps/program/lib_func.php";
    include_once($path);
    //conncet to database
    connect();

	//deklarasi variabel
	$nama = $_POST['nama'];
	$lat = $_POST['lat'];
	$long = $_POST['long'];
<<<<<<< HEAD
	$kecamatan = $_POST['nama_kecamatan'];

	$sql = "INSERT INTO kelurahan VALUES(NULL,'$nama',(SELECT id_kecamatan FROM kecamatan WHERE nama_kecamatan LIKE '$kecamatan'),'$lat','$long')";
		
	//eksekusi statement insert data
	if(!mysql_query($sql))
	{
		print mysql_error();
		echo '<script type="text/javascript">';
		echo 'alert("Tambah Data Kelurahan Gagal")';
		echo '</script>';
		header( "refresh:0; url=/atolMaps/program/admin/insertKelurahan.php" );
	}
	else
	{
		echo '<script type="text/javascript">';
		echo 'alert("Tambah Data Kelurahan Berhasil")';
		echo "</script>";
		header( "refresh:0; url=/atolMaps/program//admin/admin.php" );
	}
	
=======
	$username = $_POST['username'];
	$alamat = $_POST['alamat'];
	$password = $_POST['password'];
	$email = $_POST['email'];
	$status = $_POST['status'];
	//$encrypted = md5($password); // Encrypting pssword using md5 algo
	$ttl = $_POST['ttl'];
	
		if($_FILES['userfile']['error']==4){
			$FileUpload = "default.jpg";
		}
		if($_FILES['userfile']['error']==0){
			$namafilebaru="../gambar/".$_FILES['userfile']['name'];
		
			if(move_uploaded_file($_FILES['userfile']['tmp_name'],
				$namafilebaru)==true){
				$FileUpload = $_FILES['userfile']['name'];
				echo "File telah tersimpan.";
			}
				else{
					echo "Gagal menyimpan file upload";
				}
		}
		else
		echo "Gagal Upload";
		
		$filektp = "gambar/".$FileUpload;
		
			$sql = "INSERT INTO pengusaha(no_ktp,nama_pengusaha,alamat,ttl,jenis_kelamin,file_ktp,email,password,status_akun) VALUES('$username','$nama','$alamat','$ttl','$jk','$filektp','$email','$password','$status')";
		
		//eksekusi statement insert data
		if(!mysql_query($sql))
		{
			echo '<script type="text/javascript">';
			echo 'alert("Tambah Data Pengusaha Gagal")';
			echo '</script>';
			header( "refresh:0; url=/atolMaps/program/admin/insertPengusaha.php" );
		}
		else
		{
			echo '<script type="text/javascript">';
			echo 'alert("Tambah Data Pengusaha Berhasil")';
			echo "</script>";
			header( "refresh:0; url=/atolMaps/program/admin/admin.php" );
		}
>>>>>>> 123657fbea84b1a6d0955cf36b51800943ab3484
	
?>