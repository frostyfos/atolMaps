<!doctype html>
<?php 
    session_start(); 
    include("../lib_func.php");
?>

<html>
<head>
	<meta charset="utf-8">
    <title>Lupa Password</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.css" rel="stylesheet">
    <!-- custom css -->
    <link href="../css/custom.css" rel="stylesheet">
</head>

<body>
<div class="container">
    <div class="row">
            <div class="navbar navbar-inverse navbar-fixed-top ">
                <div class="container">
                    <ul class="nav navbar-nav">
                        <li>
                            <a href="../index.php" class="text-center">HOME</a>
                        </li>
                    </ul>
                </div>
            </div>
    </div>
    <!-- disini konten  -->
    <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <h2 class="text-center">Masukan Data Untuk Meminta Password Baru</h2><hr/>
                <form class="form-horizontal" action="reqPass.php" method="post" data-toggle="validator" role="form">

                    <div class="form-group">
                        <label for="nama" class="col-sm-4 control-label">Nama</label>
                        <div class="col-sm-5">
                            <input type="text" name="nama" class="form-control" placeholder="Masukan Nama Anda" data-error="Wajib di Isi" required/>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="alamat" class="col-sm-4 control-label">No KTP</label>
                        <div class="col-sm-5">
                            <input type="text" name="noKtp" class="form-control" placeholder="Masukan No KTP Anda" data-error="Wajib di Isi" required/>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="username" class="col-sm-4 control-label">E - mail</label>
                        <div class="col-sm-5">
                            <input type="text" name="email" class="form-control" placeholder="Masukan E-mail Anda" data-error="Wajib di Isi" required/>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-4 col-sm-5">
                           <button type="submit" class="btn btn-primary">Submit</button>
                           <!-- <button type="clear" class="btn btn-default">Clear</button> -->
                        </div>
                    </div>
                </form>
            </div>
        </div> 
     </div>

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
    <script src="../js/jquery-1.11.3.min.js"></script>
	<script src="../js/bootstrap.js"></script>
    <script src="../js/validator.min.js"></script>
</body>
</html>