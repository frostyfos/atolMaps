<?php 

    session_start();
    $path = $_SERVER['DOCUMENT_ROOT'];
    $path .= "/atolMaps/program/lib_func.php";
    include_once($path);
    //conncet to database
    connect();

    //ambil username dan password dari DB
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

    if($jabatan === "admin"){
        $sql="SELECT * FROM admin WHERE BINARY username_admin='$username' and BINARY password_admin='$password'";
    }elseif($jabatan === "pengusaha"){
        $sql="SELECT noKtp,password FROM pengusaha WHERE BINARY noKtp='$username' and BINARY password='$password'";
    }

    $valid=mysql_query($sql);
    // cek validasi *tapi masih make script lama
    $count=mysql_num_rows($valid);

    if($count==1){
        $_SESSION['myusername'] = $username;
        $_SESSION['mypassword'] = $password;
        $_SESSION['myjabatan'] = $jabatan;
        header("location:/atolMaps/program/index.php");
    }
    else {
        print "<script>alert('isi username dan password salah!');
        javascript:history.go(-1);</script>";
        exit;
        header("location:/atolMaps/program/login.php");
    }
 ?>