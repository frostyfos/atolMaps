<?php 
	session_start();
	$path = $_SERVER['DOCUMENT_ROOT'];
    $path .= "../lib_func.php";
    include_once($path);
    //conncet to database
    connect();

    //deklarasi variabel
	$nama = $_POST['nama'];
	$noKtp = $_POST['noKtp'];
	$email = $_POST['email'];

	 if (!$_POST['nama'] | !$_POST['noKtp'] | !$_POST['email'])
     {
        print "<script>alert('tolong isi data yang diminta');
        javascript:history.go(-1);</script>";
        exit;
     }

     $sql = "INSERT INTO reqPass(no_ktp,nama,email) VALUES('$noKtp','$nama','$email')";

     //eksekusi statement insert
		if(!mysql_query($sql))
		{
			echo '<script type="text/javascript">';
			echo 'alert("Proses Memasukan Data Gagal")';
			echo '</script>';
			header( "refresh:0; url=../index.php" );
		}
		else
		{
			echo '<script type="text/javascript">';
			echo 'alert("Proses Memasukan Data Berhasil")';
			echo "</script>";
			header( "refresh:0; url=formRequestPassword.php" );
		}
 ?>