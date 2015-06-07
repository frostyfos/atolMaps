<title>Proses Edit User</title>
<?php


	session_start();
    $path = "../lib_func.php";
    include_once($path);
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
	$status_akun = $_POST['status_akun'];
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
		
			$sql = "UPDATE pengusaha SET no_ktp = '$username', nama_pengusaha = '$nama', alamat = '$alamat', ttl = '$ttl', jenis_kelamin = '$jk', file_ktp = '$filektp', email='$email', password='$password', status_akun = '$status_akun' WHERE id_pengusaha = '$id_pengusaha'";
		
		//eksekusi statement insert data
		if(!mysql_query($sql))
		{
			print(mysql_error());
			echo '<script type="text/javascript">';
			echo 'alert("Edit Data Pengusaha Gagal")';
			
			echo '</script>';
			header( "refresh:0; url=editHapusUser.php" );
		}
		else
		{
			echo '<script type="text/javascript">';
			echo 'alert("Edit Data Pengusaha Berhasil")';
			echo "</script>";
			header( "refresh:0; url=listUser.php" );
		}
	
?>