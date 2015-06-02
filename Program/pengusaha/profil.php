<!doctype html>
<?php 
    session_start(); 
    $path = $_SERVER['DOCUMENT_ROOT'];
    $path .= "/atolMaps/program/lib_func.php";
    include_once($path);
    
    connect();

    if(!isset ($_SESSION['myusername'])){
        header(("location:/atolMaps/program/formLogin.php"));
    }
    
?>

<html>
<head>
	<meta charset="utf-8">
    <title>DProfil Pengusaha</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap core CSS -->
    <link href="/atolMaps/program/css/bootstrap.css" rel="stylesheet">
    <!-- custom css -->
    <link href="/atolMaps/program/css/custom.css" rel="stylesheet">
</head>

<body>
<div class="container">
    <!-- header -->
    <?php 
        nav();    
    ?>

    <!-- disini konten  -->
    <h2 class="text-center">Profil Pengusaha</h2><hr/><br>
    <div align="right"><a href="/atolmaps/program/pengusaha/editprofil.php" ><h4>Edit Profil</h4></a></div>
    <!-- USER AKTIF -->
        <?php 
            $sqlPengusaha = "SELECT * FROM pengusaha where no_ktp like ".$_SESSION['myusername']."";
            //eksekusi query
            $query = mysql_query($sqlPengusaha);
            if(!$query)
            {
                print(mysql_error());
            }
        ?>
            <!-- tampil data -->               
            <br><br>
          <?php
		  while($row = mysql_fetch_array($query))
                    {
		  echo'  <div class="form-group">
                        <label for="id" class=" control-label">ID pengusaha : '.$row['id_pengusaha'].'</label><br>
						<label for="username" class=" control-label">Username/no KTP pengusaha : '.$row['no_ktp'].'</label><br>
						<label for="nama" class=" control-label">Nama pengusaha : '.$row['nama_pengusaha'].'</label><br>
						<label for="alamat" class=" control-label">Alamat : '.$row['alamat'].'</label><br>
						<label for="ttl" class=" control-label">Tempat Tanggal Lahir : '.$row['ttl'].'</label><br>
						<label for="jk" class=" control-label">Jenis Kelamin : '.$row['jenis_kelamin'].'</label><br>
						<label for="email" class=" control-label">Email : '.$row['email'].'</label><br>
                        <label for="status" class=" control-label">Status Akun : '.$row['status_akun'].'</label><br>
						<label for="status" class=" control-label"></label>
                    
					
					</div>';
		echo '  <div class="form-group">
                        <label for="id" class=" control-label">Foto KTP : </label><br>
				<img src="/atolmaps/program/'.$row['file_ktp'].'" alt="Smiley face height="42" width="100""/></div>
		';			
					}
					?>
    <!-- footer -->
        <div class="row">
            <div class="navbar navbar-inverse navbar-fixed-bottom ">
                <div class="container">
                    <p class="navbar-text pull-left">Copyright &copy 2015 Maps</p>
                </div>
            </div>
        </div>
    </div> <!-- end of container -->
	<!-- javascript -->
    <script src="/atolMaps/program/js/jquery-1.11.3.min.js"></script>
	<script src="/atolMaps/program/js/bootstrap.js"></script>
</body>
</html>