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
    <title>Data Kecamatan</title>
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
    <h2 class="text-center">Data Kecamatan</h2><hr/><br>
    <div align="right"><a href="/atolmaps/program/kecamatan/editdata.php" ><h4>Edit Data</h4></a></div>
    <!-- USER AKTIF -->
        <?php 
            $sqlPengusaha = "SELECT * FROM pengusaha where id like ".$_SESSION['myusername']."";
            //eksekusi query
            $query = mysql_query($sqlKecamatan);
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
		  echo'  <div class="col-md-7 col-md-push-3">
                    <table class="table">
                        <tr>
                            <th colspan = "2" class="text-center info"> INFORMASI KECAMATAN</th>
                        </tr>
                        <tr>
                            <th>ID Pengusaha</th>
                            <td>'.$row['id_pengusaha'].'</td>
                        </tr>
                        <tr>
                            <th>Nama </td>
                            <td>'.$row['nama_kecamatan'].'</th>
                        </tr>
                        <tr>
                            <th>Alamat Pengusaha</th>
                            <td>'.$row['alamat'].'</td>
                        </tr>
                        <tr>
                            <th>Foto Kecamatan</th>
                            <td><img src="/atolmaps/program/'.$row['fotocamat'].'" alt="Smiley face" height="250" width="350""/></td>
                        </tr>              
					</table">
				</div>';			
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