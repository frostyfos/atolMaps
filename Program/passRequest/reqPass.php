<?php 
	session_start();
    include("../lib_func.php");
    //conncet to database
    connect();

    //deklarasi variabel
	$nama = $_POST['nama'];
	$noKtp = $_POST['noKtp'];
	$email = $_POST['email'];
	$hash = md5( rand(0,1000) );
	$password = rand(1000,5000);

	$nama = mysql_escape_string($nama);
	$noKtp = mysql_escape_string($noKtp);
	$email = mysql_escape_string($email);
	$hash = mysql_escape_string($hash);
	$password = mysql_escape_string($password);

	//sendmail
	$to      = $email; // Send email to our user
	$subject = 'Ganti Password | Verification'; // Give the email a subject 
	$message = '
	 
	Password anda telah diubah!
	dengan ketentuan sebagai berikut : 
	 
	------------------------
	Username: '.$noKtp.'
	Password: '.$password.'
	------------------------
	 
	'; // Our message above including the link
	                     
	$headers = 'From:adm.bdgatlmap@gmail.com' . "\r\n"; // Set from headers
	mail($to, $subject, $message, $headers); // Send our email

	 if (!$_POST['nama'] | !$_POST['noKtp'] | !$_POST['email'])
     {
        print "<script>alert('tolong isi data yang diminta');
        javascript:history.go(-1);</script>";
        exit;
     }

     $sql = "INSERT INTO reqPass(no_ktp,nama,email,hash) VALUES('$noKtp','$nama','$email','$hash')";

     //eksekusi statement insert
		if(!mysql_query($sql))
		{
			echo '<script type="text/javascript">';
			echo 'alert("Proses Memasukan Data Gagal")';
			echo '</script>';
			header( "refresh:0; url=../index.php" );
			$sqlUpdate = "UPDATE pengusaha SET password='$password' WHERE no_ktp = '$noKtp'";
			mysql_query($sqlUpdate);
		}
		else
		{
			echo '<script type="text/javascript">';
			echo 'alert("Kami sudah mengirim e-mail berisi password baru anda ke alamat email anda")';
			echo "</script>";
			header( "refresh:0; url=formRequestPassword.php" );
		}
 ?>