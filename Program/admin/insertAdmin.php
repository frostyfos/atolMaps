<!doctype html>
<?php 
    session_start(); 
    $path = "../lib_func.php";
    include_once($path);
    
    if(!isset ($_SESSION['myusername'])){
        header(("location:../index.php.php"));
    }  
?>

<html>
<head>
	<meta charset="utf-8">
    <title>Form Insert Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.css" rel="stylesheet">
    <!-- custom css -->
    <link href="../css/custom.css" rel="stylesheet">
    <link href="../css/datepicker.css" rel="stylesheet">
</head>

<body>
<div class="container">
    <!-- header -->
    <?php 
        nav();
    ?>
    <!-- disini konten  -->
    
     <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <h2 class="text-center">Masukan Data Admin</h2><hr/>
                <form class="form-horizontal" action="prosesInsertAdmin.php" enctype="multipart/form-data" method="post" data-toggle="validator" role="form">
                    
                    <div class="form-group">
                        <label for="username" class="col-sm-4 control-label">Username Admin</label>
                        <div class="col-sm-5">
                            <input type="text" name="username" class="form-control" placeholder="username pengusaha" data-error="Wajib di Isi" required/>
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
    </div> <!-- end of container -->
	<!-- javascript -->
    <script src="../js/jquery-1.11.3.min.js"></script>
	<script src="../js/bootstrap.js"></script>
    <script src="../js/bootstrap-datepicker.js"></script>
    <script>
            $('.input-group.date #ttl').datepicker({});
    </script>
    <script src="../js/validator.min.js"></script>
</body>
</html>