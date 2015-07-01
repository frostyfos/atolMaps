<?php
	session_start();
    $path = "../lib_func.php";
    include_once($path);
    $no_ktp = $_SESSION['myusername'];
    connect();


    $sqlID = mysql_query("SELECT * FROM pengusaha WHERE no_ktp LIKE '$no_ktp'");
    while($data = mysql_fetch_array($sqlID)){
    	$id_pengusaha = $data['id_pengusaha'];
    }
    //conncet to database
    connect();
    error_reporting( E_ALL );
	//deklarasi variabel
	$nama = $_POST['nama'];
	
	$produk = $_POST['produk'];
	$alamat = $_POST['alamat'];
	$kecamatan = $_POST['kecamatan'];
	$kelurahan = $_POST['kelurahan'];
	$telp = $_POST['telp'];
	$lat = $_POST['lat'];
	$lng = $_POST['lng'];
	$skala = $_POST['skala'];
	$sektor = $_POST['sektor'];
	$status = $_POST['status'];


	//$encrypted = md5($password); // Encrypting pssword using md5 algo
	//insert gambar 1
	if($_FILES['gambar1']['error']==4){
		$UploadGambar1 = "default.jpg";
	}
	if($_FILES['gambar1']['error']==0){
		$namafilebaru1="../gambar/".$_FILES['gambar1']['name'];
	
		if(move_uploaded_file($_FILES['gambar1']['tmp_name'],
			$namafilebaru1)==true){
			$UploadGambar1 = $_FILES['gambar1']['name'];
			echo "File telah tersimpan.";
		}
			else{
				echo "Gagal menyimpan file upload";
			}
	}
	else
	echo "Gagal Upload";
	$fileGambar1 = "gambar/".$UploadGambar1;

	//insert gambar 2
	if($_FILES['gambar2']['error']==4){
		$UploadGambar2 = "default.jpg";
	}
	if($_FILES['gambar2']['error']==0){
		$namafilebaru2="../gambar/".$_FILES['gambar2']['name'];
	
		if(move_uploaded_file($_FILES['gambar2']['tmp_name'],
			$namafilebaru2)==true){
			$UploadGambar2 = $_FILES['gambar2']['name'];
			echo "File telah tersimpan.";
		}
			else{
				echo "Gagal menyimpan file upload";
			}
	}
	else
	echo "Gagal Upload";
	$fileGambar2 = "gambar/".$UploadGambar2;

	//insert gambar 3
	if($_FILES['gambar3']['error']==4){
		$UploadGambar3 = "default.jpg";
	}
	if($_FILES['gambar3']['error']==0){
		$namafilebaru3="../gambar/".$_FILES['gambar3']['name'];
	
		if(move_uploaded_file($_FILES['gambar3']['tmp_name'],
			$namafilebaru3)==true){
			$UploadGambar3 = $_FILES['gambar3']['name'];
			echo "File telah tersimpan.";
		}
			else{
				echo "Gagal menyimpan file upload";
			}
	}
	else
	echo "Gagal Upload";
	$fileGambar3 = "gambar/".$UploadGambar3;

	//insert gambar 4
	if($_FILES['gambar4']['error']==4){
		$UploadGambar4 = "default.jpg";
	}
	if($_FILES['gambar4']['error']==0){
		$namafilebaru4="../gambar/".$_FILES['gambar4']['name'];
	
		if(move_uploaded_file($_FILES['gambar4']['tmp_name'],
			$namafilebaru4)==true){
			$UploadGambar4 = $_FILES['gambar4']['name'];
			echo "File telah tersimpan.";
		}
			else{
				echo "Gagal menyimpan file upload";
			}
	}
	else
	echo "Gagal Upload";
	$fileGambar4 = "gambar/".$UploadGambar4;

	//insert gambar 5
	if($_FILES['gambar5']['error']==4){
		$UploadGambar5 = "default.jpg";
	}
	if($_FILES['gambar5']['error']==0){
		$namafilebaru5="../gambar/".$_FILES['gambar5']['name'];
	
		if(move_uploaded_file($_FILES['gambar5']['tmp_name'],
			$namafilebaru5)==true){
			$UploadGambar5 = $_FILES['gambar5']['name'];
			echo "File telah tersimpan.";
		}
			else{
				echo "Gagal menyimpan file upload";
			}
	}
	else
	echo "Gagal Upload";
	$fileGambar5 = "gambar/".$UploadGambar5;

	$sql = "INSERT INTO usaha VALUES(NULL,'$nama','$id_pengusaha','$produk','$alamat','$kelurahan','$kecamatan','$telp','$lat','$lng',NULL,'$skala','$sektor','$fileGambar1','$fileGambar2','$fileGambar3','$fileGambar4','$fileGambar5','$status')";
		
		//eksekusi statement insert data
		if(!mysql_query($sql))
		{
			echo '<script type="text/javascript">';
			echo 'alert("Tambah Data Pengusaha Gagal")';
			echo '</script>';
			header( "refresh:0; url=insert_usaha.php" );
			echo mysql_error();
			
		}
		else
		{
			echo '<script type="text/javascript">';
			echo 'alert("Tambah Data Pengusaha Berhasil")';
			echo "</script>";
			header( "refresh:0; url=tampilUsahaBandung.php" );
		}
	
?>