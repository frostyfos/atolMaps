<!doctype html>
<?php 
    session_start(); 
    $path = $_SERVER['DOCUMENT_ROOT'];
    $path .= "/atolMaps/program/lib_func.php";
    include_once($path);
    
  
?>

<html>
<head>
	<meta charset="utf-8">
    <title>Form Kecamatan</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap core CSS -->
    <link href="/atolMaps/program/css/bootstrap.css" rel="stylesheet">
    <!-- custom css -->
    <link href="/atolMaps/program/css/custom.css" rel="stylesheet">
    <link href="/broto/css/datepicker.css" rel="stylesheet">
</head>

<body>
<div class="container">
    <!-- header -->
    <?php 
        nav();
        connect();
    ?>
    <!-- disini konten  -->
    
     <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <h2 class="text-center">Masukan Data Kelurahan</h2><hr/>
                <form class="form-horizontal" action="/atolMaps/Program/admin/prosesInsertKelurahan.php" method="post">

                    <div class="form-group row" >
                <label for="kecamatan" class="col-sm-4 control-label">Kecamatan</label>
                <div class="col-sm-2">          
                    <select class="form-control" name="kecamatan" id="kecamatan">';
                        <?php
                        $sql = "SELECT  id_kecamatan,nama_kecamatan from kecamatan ";
                        $hasil = mysql_query($sql);  
                        while($row=mysql_fetch_array($hasil)){
                            echo' <option value="'.$row['nama_kecamatan'].'">'.$row['nama_kecamatan'].'</option>';
                        }
                        ?>
echo              '</select>
                </div>
                </div>

                    <div class="form-group">
                        <label for="nama" class="col-sm-4 control-label">Nama Kelurahan</label>
                        <div class="col-sm-5">
                            <input type="text" name="nama" class="form-control" placeholder="nama kelurahaan"/>
                        </div>
                    </div>

                     <div class="form-group">
                        <label for="lat" class="col-sm-4 control-label">Latitude</label>
                        <div class="col-sm-5">
                            <input type="text" name="lat" class="form-control" placeholder="latitude kelurahan"/>

                        </div>
                    </div>

					<div class="form-group">

						<label for="long" class="col-sm-4 control-label">Longitude</label>
                        <div class="col-sm-5">
                            <input type="text" name="long" class="form-control" placeholder="longitude kelurahan"/>
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
    <script src="/atolMaps/program/js/jquery-1.11.3.min.js"></script>
	<script src="/atolMaps/program/js/bootstrap.js"></script>


</body>
</html>