<!doctype html>
<?php 
    session_start(); 
    $path = "lib_func.php";
    include_once($path);  
?>

<html>
<head>
	<meta charset="utf-8">
    <title>Sign Up</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <!-- custom css -->
    <link href="css/custom.css" rel="stylesheet">
    <link href="css/datepicker.css" rel="stylesheet">
</head>

<body>
<div class="container">
<!-- header -->
    <div class="row">
            <div class="navbar navbar-inverse navbar-fixed-top ">
                <div class="container">
                    <ul class="nav navbar-nav">
                        <li>
                            <a href="index.php" class="text-center">HOME</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
<!-- disini konten  -->
     <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <h2 class="text-center">Masukan Data Pengusaha</h2><hr/>
                <form class="form-horizontal" action="proses_signup.php" enctype="multipart/form-data" method="post" data-toggle="validator" role="form">

					
                    <div class="form-group">
                        <label for="email" class="col-sm-4 control-label">Email</label>
                        <div class="col-sm-5">
                            <input type="text" name="email" class="form-control" placeholder="Email pengusaha" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" data-error="contoh penulisan e-mail : email@email.com" required/>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="username" class="col-sm-4 control-label">No KTP</label>
                        <div class="col-sm-5">
                            <input type="text" name="username" class="form-control" placeholder="username pengusaha" pattern="[0-9]{9,17}" data-error="Masukkan No KTP" required/>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>

					<div class="form-group">
                        <label for="password" class="col-sm-4 control-label">Password</label>
                        <div class="col-sm-5">
                            <input type="password" name="password" id="password" class="form-control" placeholder="password pengusaha" data-minlength="6" data-error="Password minimal 6 karakter" required/>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="validPassword" class="col-sm-4 control-label">Validasi Password</label>
                        <div class="col-sm-5">
                            <input type="password" name="validPassword" id="validPassword" data-match="#password" data-match-error="Password yang anda masukan tidak cocok" class="form-control" placeholder="Validasi password pengusaha" required/>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="nama" class="col-sm-4 control-label">Nama</label>
                        <div class="col-sm-5">
                            <input type="text" name="nama" class="form-control" placeholder="nama pengusaha" data-error="Wajib di Isi" required/>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="alamat" class="col-sm-4 control-label">Alamat</label>
                        <div class="col-sm-5">
                            <input type="text" name="alamat" class="form-control" placeholder="alamat pengusaha" data-error="Wajib di Isi" required/>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="jk" class="col-sm-4 control-label">Jenis Kelamin</label>
                        <div class="col-sm-5">
                           <label class="radio-inline">
                                <input type="radio" name="jk" value="L" checked/>Laki-laki
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
                            <input type="text" name="ttl" id ="ttl" class="form-control" placeholder="tempat dan tanggal lahir pengusaha" data-error="Wajib di Isi" required/>
                            <span class="input-group-addon">
                                <i class="glyphicon glyphicon-th"></i>
                            </span>            
                        </div>
                        <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="filektp" class="col-sm-4 control-label">Foto KTP</label>
                        <div class="col-sm-5">
                           <input type="hidden" name="MAX_FILE_SIZE" value="1000000" /><input name="userfile" type="file" data-error="Wajib Mengirim Foto Ktp" required/>
                           <div class="help-block with-errors"></div>
                        </div>
                    </div>


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
    <script src="js/jquery-1.11.3.min.js"></script>
	<script src="js/bootstrap.js"></script>
    <script src="js/bootstrap-datepicker.js"></script>

    <script>
            $('.input-group.date #ttl').datepicker({});
    </script>
    <script src="js/validator.min.js"></script>
</body>
</html>