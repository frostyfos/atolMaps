<!doctype html>
<?php 
    session_start(); 
    $path = $_SERVER['DOCUMENT_ROOT'];
    $path .= "/atolMaps/program/lib_func.php";
    include_once($path);
    connect();
  
    
?>

<html>
<head>
	<meta charset="utf-8">
    <title>Edit Data Kecamatan</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap core CSS -->
    <link href="/atolMaps/program/css/bootstrap.css" rel="stylesheet">
    <!-- custom css -->
    <link href="/atolMaps/program/css/custom.css" rel="stylesheet">
    <link href="/broto/css/datepicker.css" rel="stylesheet">
</head>

<body>

<?php 
            $sqlProfil = "SELECT * FROM pengusaha where id like ".$_SESSION['myusername']."";
            //eksekusi query
            $query = mysql_query($sqlProfil);
            if(!$query)
            {
                print(mysql_error());
            }
        ?>

<div class="container">
<!-- header -->
<div class="row">
            <div class="navbar navbar-inverse navbar-fixed-top ">
                <div class="container">
                    <ul class="nav navbar-nav">
                        <li>
                            <a href="/atolMaps/program/index.php" class="text-center">HOME</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
<!-- disini konten  -->
    <?php
	while($row = mysql_fetch_array($query))
                    {
	 echo '<div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <h2 class="text-center">Edit Data Kecamatan</h2><hr/>
                <form class="form-horizontal" action="/atolmaps/program/kecamatan/proses_edit_kecamatan.php" enctype="multipart/form-data" method="post">

					<input type="hidden" name="id_kecamatan" class="form-control" value="'.$row['id_kecamatan'].'"/>
                    <div class="form-group">
                        <label for="email" class="col-sm-4 control-label">Email</label>
                        <div class="col-sm-5">
                            <input type="text" name="email" class="form-control" value="'.$row['email'].'"/>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="id" class="col-sm-4 control-label">ID Kecamatan</label>
                        <div class="col-sm-5">
                            <input type="text" name="id" class="form-control" value="'.$row['id'].'"/>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="nama" class="col-sm-4 control-label">Nama</label>
                        <div class="col-sm-5">
                            <input type="text" name="nama" class="form-control" value="'.$row['nama_kecamatan'].'"/>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="alamat" class="col-sm-4 control-label">Alamat</label>
                        <div class="col-sm-5">
                            <input type="text" name="alamat" class="form-control" value="'.$row['alamat'].'"/>
                        </div>
                    </div>

                    <div class="form-group">
                    
                        <label for="ttl" class="col-sm-4 control-label">Tanggal Lahir</label>
                        <div class="col-sm-5">
                        <div class="input-group date">
                            <input type="text" name="ttl" id ="ttl" class="form-control" value="'.$row['ttl'].'"/>
                            <span class="input-group-addon">
                                <i class="glyphicon glyphicon-th"></i>
                            </span>
                        </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="fotocamat" class="col-sm-4 control-label">Foto Kecamatan</label>
                        <div class="col-sm-5">
                           <input type="hidden" name="MAX_FILE_SIZE" value="1000000" /><input name="userfile" type="file" />
                        </div>
                    </div>';
					
					
					}
	?>

                    <div class="form-group">
                        <div class="col-sm-offset-4 col-sm-5">
                           <button type="submit" class="btn btn-primary">Submit</button>
                           <button type="reset" class="btn btn-default">Clear</button>
                        </div>
                    </div>
                </form>
            </div>
        </div> 
     </div>';
     <!-- footer -->
        <div class="row">
            <div class="navbar navbar-inverse navbar-fixed-bottom ">
                <div class="container">
                    <p class="navbar-text pull-left">Copyright &copy 2015 Maps</p>
                </div>
            </div>
        </div>
	<!-- javascript -->
    <script src="/atolMaps/program/js/jquery-1.11.3.min.js"></script>
	<script src="/atolMaps/program/js/bootstrap.js"></script>
    <script src="/atolMaps/program/js/bootstrap-datepicker.js"></script>

    <script>
            $('.input-group.date #ttl').datepicker({});
    </script>
</body>
</html>