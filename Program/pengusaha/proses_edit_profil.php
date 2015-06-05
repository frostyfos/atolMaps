<title>Proses SignUp</title>
<?php


	session_start();
    $path = $_SERVER['DOCUMENT_ROOT'];
    $path .= "/atolMaps/program/lib_func.php";
    include_once($path);
	if(!isset ($_SESSION['myusername'])){
        header(("location:/atolMaps/program/formLogin.php"));
    }
	
    //conncet to database
    connect();

	//deklarasi variabel
	$id_pengusaha= $_POST['id_pengusaha'];
	$nama = $_POST['nama'];
	$alamat = $_POST['alamat'];
	$jk = $_POST['jk'];
	$username = $_POST['username'];
	$alamat = $_POST['alamat'];
	$password = $_POST['password'];
	$email = $_POST['email'];
	//$encrypted = md5($password); // Encrypting pssword using md5 algo
	$ttl = $_POST['ttl'];
	
		if($_FILES['userfile']['error']==0){
			$namafilebaru="../gambar/".$_FILES['userfile']['name'];
		
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
		
			$sql = "UPDATE pengusaha SET no_ktp = '$username', nama_pengusaha = '$nama', alamat = '$alamat', ttl = '$ttl', jenis_kelamin = '$jk', file_ktp = '$filektp', email='$email', password='$password' WHERE id_pengusaha = '$id_pengusaha'";
		
		//eksekusi statement insert data
		if(!mysql_query($sql))
		{
			print(mysql_error());
			echo '<script type="text/javascript">';
			echo 'alert("Edit Data Pengusaha Gagal")';
			
			echo '</script>';
			header( "refresh:0; url=/atolMaps/program/pengusaha/editProfil.php" );
		}
		else
		{
			echo '<script type="text/javascript">';
			echo 'alert("Edit Data Pengusaha Berhasil")';
			echo "</script>";
			header( "refresh:0; url=/atolMaps/program/pengusaha/profil.php" );
		}
	
?>