<title>Proses Edit User</title>
<?php
	session_start();
    $path = "../lib_func.php";
    include_once($path);
    //conncet to database
    connect();

	//deklarasi variabel
	$id_pengusaha= $_POST['id_pengusaha'];
	$nama = $_POST['nama_pengusaha'];
	$alamat = $_POST['alamat'];
	$jk = $_POST['jenis_kelamin'];
	$username = $_POST['username'];
	$alamat = $_POST['alamat'];
	$password = $_POST['password'];
	$email = $_POST['email'];
	$status_akun = $_POST['status_akun'];
	$encrypted = md5($password); // Encrypting pssword using md5 algo
	$ttl = $_POST['ttl'];
	$fotoLama = $_POST['fotoLama'];

	if($_FILES['gambarKtp']['error']==4){
		$UploadGambar = $fotoLama;
	}else if($_FILES['gambarKtp']['error']==0){
		$namafilebaru="../gambar/".$_FILES['gambarKtp']['name'];
	
		if(move_uploaded_file($_FILES['gambarKtp']['tmp_name'],
			$namafilebaru)==true){
			$UploadGambar = $_FILES['gambarKtp']['name'];
			echo "File telah tersimpan.";
		}
			else{
				echo "Gagal menyimpan file upload";
			}
	}
	else
	echo "Gagal Upload";
	$filektp = $UploadGambar;
			
	$sql = "UPDATE pengusaha SET no_ktp = '$username', nama_pengusaha = '$nama', alamat = '$alamat', ttl = '$ttl', jenis_kelamin = '$jk', file_ktp = '$filektp', email='$email', password='$encrypted', status_akun = '$status_akun' WHERE id_pengusaha = '$id_pengusaha'";
		
	//eksekusi statement insert data
	if(!mysql_query($sql))
	{
		print(mysql_error());
		echo '<script type="text/javascript">';
		echo 'alert("Edit Data Pengusaha Gagal")';
		echo '</script>';
		header( "refresh:0; url=listUser.php" );
	}
	else
	{
		print(mysql_error());
		echo '<script type="text/javascript">';
		echo 'alert("Edit Data Pengusaha Berhasil")';
		echo "</script>";
		header( "refresh:0; url=listUser.php" );
	}
	
?>