<?php


	session_start();
    $path = $_SERVER['DOCUMENT_ROOT'];
    $path .= "/atolMaps/program/lib_func.php";
    include_once($path);
    //conncet to database
    connect();

	//deklarasi variabel
	$nama = $_POST['nama'];
	$alamat = $_POST['alamat'];
	$jk = $_POST['jk'];
	$username = $_POST['username'];
	$alamat = $_POST['alamat'];
	$password = $_POST['password'];
	$email = $_POST['email'];
	//$encrypted = md5($password); // Encrypting pssword using md5 algo
	$ttl = $_POST['ttl'];
	

		echo "<pre>";
		//print_r($_FILES['userfile']);
		echo "</pre>";
		if($_FILES['userfile']['error']==0){
			$namafilebaru="gambar/".$_FILES['userfile']['name'];
		
		if(move_uploaded_file($_FILES['userfile']['tmp_name'],
			$namafilebaru)==true){
		echo "File telah tersimpan.";
		}
		else
		echo "Gagal menyimpan file upload";
		}
		else
		echo "Gagal Upload";
		
		$filektp = "gambar/".$_FILES['userfile']['name'];
		
			$sql = "INSERT INTO pengusaha(no_ktp,nama_pengusaha,alamat,ttl,jenis_kelamin,file_ktp,email,password) VALUES('$username','$nama','$alamat','$ttl','$jk','$filektp','$email','$password')";
		
		//eksekusi statement insert data
		if(!mysql_query($sql))
		{
			echo '<script type="text/javascript">';
			echo 'alert("Tambah Data Pengusaha Gagal")';
			echo '</script>';
			header( "refresh:0; url=index.php" );
		}
		else
		{
			echo '<script type="text/javascript">';
			echo 'alert("Tambah Data Pengusaha Berhasil")';
			echo "</script>";
			header( "refresh:0; url=index.php" );
		}
	
?>