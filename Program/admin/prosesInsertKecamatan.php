<title>Proses Tambah Kecamatan</title>
<?php


	session_start();
    $path = $_SERVER['DOCUMENT_ROOT'];
    $path .= "/atolMaps/program/lib_func.php";
    include_once($path);
    //conncet to database
    connect();

	//deklarasi variabel
	$id = $_POST ['id'];
	$nama = $_POST['nama'];
	$alamat = $_POST['alamat'];
	$latitude = $_POST['latitude'];
	$longitude = $_POST['longitude'];
	
	//$encrypted = md5($password); // Encrypting pssword using md5 algo
	$ttl = $_POST['ttl'];
	
		if($_FILES['userfile']['error']==0){
			$namafilebaru="/atolMaps/program/gambar/".$_FILES['userfile']['name'];
		
		if(move_uploaded_file($_FILES['userfile']['tmp_name'],
			$namafilebaru)==true){
		echo "File telah tersimpan.";
		}
		else
		echo "Gagal menyimpan file upload";
		}
		else
		echo "Gagal Upload";
		
		$fotocamat = "gambar/".$_FILES['userfile']['name'];
		
			$sql = "INSERT INTO kecamatan(id_kecamatan,nama_kecamatan,alamat_kecamatan,latitude,longitude) VALUES('$id','$nama','$alamat','$ttl','$latitude','$longitude','$fotocamat')";
		
		//eksekusi statement insert data
		if(!mysql_query($sql))
		{
			echo '<script type="text/javascript">';
			echo 'alert("Tambah Data Kecamatan Gagal")';
			echo '</script>';
			header( "refresh:0; url=/atolMaps/program/admin/insertKecamatan.php" );
		}
		else
		{
			echo '<script type="text/javascript">';
			echo 'alert("Tambah Data Kecamatan Berhasil")';
			echo "</script>";
			header( "refresh:0; url=/atolMaps/program/admin/admin.php" );
		}
	
?>