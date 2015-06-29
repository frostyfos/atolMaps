<title>Proses insert Usaha</title>
<?php
	session_start();
    $path = "../lib_func.php";
    include_once($path);

    //conncet to database
    connect();
    error_reporting( E_ALL );
	//deklarasi variabel
	$id_usaha = $_POST['id_usaha'];
	$nama = $_POST['nama'];
	$id_pengusaha = $_POST['id_pengusaha'];
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
	$img1 = $_POST['fotoLama1'];
	$img2 = $_POST['fotoLama2'];
	$img3 = $_POST['fotoLama3'];
	$img4 = $_POST['fotoLama4'];
	$img5 = $_POST['fotoLama5'];

	//insert gambar 1
	if($_FILES['gambar1']['error']==4){
		$UploadGambar1 = $img1;
		$fileGambar1 =$UploadGambar1;
	}else if($_FILES['gambar1']['error']==0){
		$namafilebaru1="../gambar/".$_FILES['gambar1']['name'];
	
		if(move_uploaded_file($_FILES['gambar1']['tmp_name'],
			$namafilebaru1)==true){
			$UploadGambar1 = $_FILES['gambar1']['name'];
			echo "File telah tersimpan.";
			$fileGambar1 = "../gambar/".$UploadGambar1;
		}
			else{
				echo "Gagal menyimpan file upload";
			}
	}
	else
	echo "Gagal Upload";
	

	//insert gambar 2
	if($_FILES['gambar2']['error']==4){
		$UploadGambar2 = $img2;
		$fileGambar2 = $UploadGambar2;
	}elseif($_FILES['gambar2']['error']==0){
		$namafilebaru2="../gambar/".$_FILES['gambar2']['name'];
	
		if(move_uploaded_file($_FILES['gambar2']['tmp_name'],
			$namafilebaru2)==true){
			$UploadGambar2 = $_FILES['gambar2']['name'];
			echo "File telah tersimpan.";
		}
			else{
				echo "Gagal menyimpan file upload";
				$fileGambar2 = "../gambar/".$UploadGambar2;
			}
	}
	else
	echo "Gagal Upload";
	

	//insert gambar 3
	if($_FILES['gambar3']['error']==4){
		$UploadGambar3 = $img3;
		$fileGambar3 = $UploadGambar3;
	}elseif($_FILES['gambar3']['error']==0){
		$namafilebaru3="../gambar/".$_FILES['gambar3']['name'];
	
		if(move_uploaded_file($_FILES['gambar3']['tmp_name'],
			$namafilebaru3)==true){
			$UploadGambar3 = $_FILES['gambar3']['name'];
			echo "File telah tersimpan.";
			$fileGambar3 = "../gambar/".$UploadGambar3;
		}
			else{
				echo "Gagal menyimpan file upload";
			}
	}
	else
	echo "Gagal Upload";
	

	//insert gambar 4
	if($_FILES['gambar4']['error']==4){
		$UploadGambar4 = $img4;
		$fileGambar4 = $UploadGambar4;
	}elseif($_FILES['gambar4']['error']==0){
		$namafilebaru4="../gambar/".$_FILES['gambar4']['name'];
	
		if(move_uploaded_file($_FILES['gambar4']['tmp_name'],
			$namafilebaru4)==true){
			$UploadGambar4 = $_FILES['gambar4']['name'];
			echo "File telah tersimpan.";
			$fileGambar4 = "../gambar/".$UploadGambar4;
		}
			else{
				echo "Gagal menyimpan file upload";
			}
	}
	else
	echo "Gagal Upload";

	//insert gambar 5
	if($_FILES['gambar5']['error']==4){
		$UploadGambar5 = $img5;
		$fileGambar5 = $UploadGambar5;
	}elseif($_FILES['gambar5']['error']==0){
		$namafilebaru5="../gambar/".$_FILES['gambar5']['name'];
	
		if(move_uploaded_file($_FILES['gambar5']['tmp_name'],
			$namafilebaru5)==true){
			$UploadGambar5 = $_FILES['gambar5']['name'];
			echo "File telah tersimpan.";
			$fileGambar5 ="../gambar/".$UploadGambar5;
		}
			else{
				echo "Gagal menyimpan file upload";
			}
	}
	else
	echo "Gagal Upload";
	
	
	$sql = "UPDATE usaha SET nama_usaha = '$nama', id_pengusaha = '$id_pengusaha', produk_utama = '$produk',
							 alamat_usaha = '$alamat', id_kelurahan = '$kelurahan', id_kecamatan = '$kecamatan',
							 telp = '$telp', lat = '$lat', lng = '$lng',id_skala = '$skala', id_sektor = '$sektor',
							 gambar1 = '$fileGambar1',gambar2 = '$fileGambar2',gambar3 = '$fileGambar3',
							 gambar4 = '$fileGambar4',gambar5 = '$fileGambar5', status_usaha = '$status' 
			WHERE id_usaha = '$id_usaha'";
		
	//eksekusi statement insert data
	if(!mysql_query($sql))
	{
		echo mysql_error();
		echo '<script type="text/javascript">';
		echo 'alert("Tambah Data Pengusaha Gagal")';
		echo '</script>';
		header( "refresh:0; url=tampilUsahaBandung.php" );
	}
	else
	{
		echo '<script type="text/javascript">';
		echo 'alert("Tambah Data Pengusaha Berhasil")';
		echo "</script>";
		header( "refresh:0; url=tampilUsahaBandung.php" );
	}
	
?>