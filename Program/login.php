<?php 

    session_start();
    $path = "lib_func.php";
    include_once($path);
    //conncet to database
    connect();

    //deklarasi variabel
    $username = $_POST['myusername'];
    $password = $_POST['mypassword'];
    $jabatan = $_POST['myjabatan'];

     if (!$_POST['myusername'] | !$_POST['mypassword'])
     {
        print "<script>alert('isi username dan password anda!');
        javascript:history.go(-1);</script>";
        exit;
     }

     //proteksi
    $username = stripslashes($username);
    $password = stripslashes($password);
    $username = mysql_real_escape_string($username);
    $password = mysql_real_escape_string($password);
    $password = md5($password);

    if($jabatan === "admin"){
        $sql="SELECT * FROM admin WHERE BINARY username_admin='$username' and BINARY password_admin='$password'";
    }elseif($jabatan === "pengusaha"){
        $sql="SELECT * FROM pengusaha WHERE BINARY no_ktp='$username' and BINARY password='$password' and status_akun like 'aktif'";
    }

    $valid=mysql_query($sql);
    // cek validasi *tapi masih make script lama
    $count=mysql_num_rows($valid);

    if($count==1 && $jabatan == "admin"){
        $_SESSION['myusername'] = $username;
        $_SESSION['mypassword'] = $password;
        $_SESSION['myjabatan'] = $jabatan;
        header("location:admin/admin.php");
    }else if($count==1 && $jabatan == "pengusaha"){
        $_SESSION['myusername'] = $username;
        $_SESSION['mypassword'] = $password;
        $_SESSION['myjabatan'] = $jabatan;
        header("location:pengusaha/pengusaha.php");
    }else {
        print "<script>alert('isi username dan password salah atau akun anda belum di aktifkan!');
        javascript:history.go(-1);</script>";
        exit;
        header("location:login.php");
    }
 ?>