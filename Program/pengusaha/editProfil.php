<!doctype html>
<?php 
    session_start(); 
    $path = "../lib_func.php";
    include_once($path);
    connect();

    if(!isset ($_SESSION['myusername'])){
        header(("location:../index.php.php"));
    }
?>

<html>
<head>
	<meta charset="utf-8">
    <title>Edit Profile Pengusaha</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap core CSS -->
    <link href="/atolMaps/program/css/bootstrap.css" rel="stylesheet">
    <!-- custom css -->
    <link href="/atolMaps/program/css/custom.css" rel="stylesheet">
    <link href="/broto/css/datepicker.css" rel="stylesheet">
</head>

<body>

<?php 
            $sqlProfil = "SELECT * FROM pengusaha where no_ktp like ".$_SESSION['myusername']."";
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
                <h2 class="text-center">Edit Data Pengusaha</h2><hr/>
                <form class="form-horizontal" action="proses_edit_profil.php" enctype="multipart/form-data" method="post">

					<input type="hidden" name="id_pengusaha" class="form-control" value="'.$row['id_pengusaha'].'"/>
                    <div class="form-group">
                        <label for="email" class="col-sm-4 control-label">Email</label>
                        <div class="col-sm-5">
                            <input type="text" name="email" class="form-control" value="'.$row['email'].'"/>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="username" class="col-sm-4 control-label">Username/KTP</label>
                        <div class="col-sm-5">
                            <input type="text" name="username" class="form-control" value="'.$row['no_ktp'].'"/>
                        </div>
                    </div>

					<div class="form-group">
                        <label for="password" class="col-sm-4 control-label">Password</label>
                        <div class="col-sm-5">
                            <input type="password" name="password" class="form-control" value="'.$row['password'].'"/>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="nama" class="col-sm-4 control-label">Nama</label>
                        <div class="col-sm-5">
                            <input type="text" name="nama" class="form-control" value="'.$row['nama_pengusaha'].'"/>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="alamat" class="col-sm-4 control-label">Alamat</label>
                        <div class="col-sm-5">
                            <input type="text" name="alamat" class="form-control" value="'.$row['alamat'].'"/>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="jk" class="col-sm-4 control-label">Jenis Kelamin</label>
                        <div class="col-sm-5">
                           <label class="radio-inline">
                                <input type="radio" name="jk" value="L" />Laki-laki
                           </label>
                           <label class="radio-inline">
                                <input type="radio" name="jk" value="P" />Perempuan
                           </label>
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
                        <label for="filektp" class="col-sm-4 control-label">Foto KTP</label>
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
    <script src="../js/jquery-1.11.3.min.js"></script>
	<script src="../js/bootstrap.js"></script>
    <script src="../js/bootstrap-datepicker.js"></script>

    <script>
            $('.input-group.date #ttl').datepicker({});
    </script>
</body>
</html>