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
    <title>Insert Data Usaha Baru</title>
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
    ?>
<!-- disini konten  -->
    <!-- footer -->
    
    <?php 
        if(isset ($_SESSION['myusername'])){
            nav();
    
        echo '<div class="row">
            <div class="navbar navbar-inverse navbar-fixed-bottom ">
                <div class="container">
                    <p class="navbar-text pull-left">Copyright &copy 2015 Maps</p>
                </div>
            </div>
        </div>
    </div> <!-- end of container -->
     <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <h2 class="text-center">Masukan Data Usaha</h2><hr/>
                <form class="form-horizontal" action="/atolmaps/program/pengusaha/proses_insert_usaha.php" enctype="multipart/form-data" method="post">

					
                    <div class="form-group">
                        <label for="nama" class="col-sm-4 control-label">Nama Usaha</label>
                        <div class="col-sm-5">
                            <input type="text" name="nama" class="form-control" placeholder="Nama usaha"/>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="produk" class="col-sm-4 control-label">Produk Utama</label>
                        <div class="col-sm-5">
                            <input type="text" name="produk" class="form-control" placeholder="Produk Utama"/>
                        </div>
                    </div>

					<div class="form-group">
                        <label for="alamat" class="col-sm-4 control-label">Alamat</label>
                        <div class="col-sm-5">
                            <input type="text" name="alamat" class="form-control" placeholder="alamat usaha"/>
                        </div>
                    </div>
					
					<div class="form-group row" >
                <label for="kecamatan" class="col-sm-4 control-label">Kecamatan</label>
                <div class="col-sm-2">          
                    <select class="form-control" name="kecamatan" id="kecamatan">';
                        $sql = "SELECT  * from kecamatan ";
                        $hasil = mysql_query($sql);  
                        while($row=mysql_fetch_array($hasil)){
                            echo' <option value="'.$row['id_kecamatan'].'">'.$row['nama_kecamatan'].'</option>';
                        }
echo              '</select>
                </div>
				</div>

                    <div class="form-group row" >
                <label for="kelurahan" class="col-sm-4 control-label">Kelurahan</label>
                <div class="col-sm-2">          
                    <select class="form-control" name="kelurahan" id="kelurahan">';
                        $sql = "SELECT  * from kelurahan ";
                        $hasil = mysql_query($sql);  
                        while($row=mysql_fetch_array($hasil)){
                            echo' <option value="'.$row['id_kelurahan'].'">'.$row['nama_kelurahan'].'</option>';
                        }
echo              '</select>
                </div>
				</div>

                    <div class="form-group">
                        <label for="telp" class="col-sm-4 control-label">No Telepon</label>
                        <div class="col-sm-5">
                            <input type="text" name="telepon" class="form-control" placeholder="Nomor kuntak usaha"/>
                        </div>
                    </div>
					
					<div class="form-group">
                        <label for="lat" class="col-sm-4 control-label">Latitude</label>
                        <div class="col-sm-5">
                            <input type="text" name="lat" class="form-control" placeholder="Koordinat latitude"/>
                        </div>
                    </div>
		
					<div class="form-group">
                        <label for="long" class="col-sm-4 control-label">Longitude</label>
                        <div class="col-sm-5">
                            <input type="text" name="long" class="form-control" placeholder="Koordinat longitude"/>
                        </div>
                    </div>
				
					<div class="form-group">
                        <label for="peta" class="col-sm-4 control-label">Peta Usaha</label>
                        <div class="col-sm-5">
                            <input type="text" name="peta" class="form-control" placeholder="Peta Usaha"/>
                        </div>
                    </div>
					
					<div class="form-group row" >
                <label for="skala" class="col-sm-4 control-label">Skala Usaha</label>
                <div class="col-sm-2">          
                    <select class="form-control" name="skala" id="skala">';
                        $sql = "SELECT  * from skala_usaha ";
                        $hasil = mysql_query($sql);  
                        while($row=mysql_fetch_array($hasil)){
                            echo' <option value="'.$row['id_skala'].'">'.$row['skala'].'</option>';
                        }
echo              '</select>
                </div>
				</div>
				
				<div class="form-group row" >
                <label for="sektor" class="col-sm-4 control-label">Sektor Usaha</label>
                <div class="col-sm-2">          
                    <select class="form-control" name="sektor" id="sektor">';
                        $sql = "SELECT  * from sektor_usaha ";
                        $hasil = mysql_query($sql);  
                        while($row=mysql_fetch_array($hasil)){
                            echo' <option value="'.$row['id_sektor'].'">'.$row['sektor'].'</option>';
                        }
echo              '</select>
                </div>
				</div>
				
				<div class="form-group">
                        <label for="gambar1" class="col-sm-4 control-label">Gambar Usaha</label>
                        <div class="col-sm-5">
                           <input type="hidden" name="MAX_FILE_SIZE" value="1000000" /><input name="userfile" type="file" />
                        </div>
                    </div>
					
				
				<div class="form-group">
                        <label for="gambar2" class="col-sm-4 control-label">Gambar Usaha</label>
                        <div class="col-sm-5">
                           <input type="hidden" name="MAX_FILE_SIZE" value="1000000" /><input name="userfile" type="file" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="gambar3" class="col-sm-4 control-label">Gambar Usaha</label>
                        <div class="col-sm-5">
                           <input type="hidden" name="MAX_FILE_SIZE" value="1000000" /><input name="userfile" type="file" />
                        </div>
                    </div>
					<div class="form-group">
                        <label for="gambar4" class="col-sm-4 control-label">Gambar Usaha</label>
                        <div class="col-sm-5">
                           <input type="hidden" name="MAX_FILE_SIZE" value="1000000" /><input name="userfile" type="file" />
                        </div>
                    </div>
					<div class="form-group">
                        <label for="gambar5" class="col-sm-4 control-label">Gambar Usaha</label>
                        <div class="col-sm-5">
                           <input type="hidden" name="MAX_FILE_SIZE" value="1000000" /><input name="userfile" type="file" />
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
     </div>';
		}else{
    echo '<div class="alert alert-warning text-center" role="alert"><p>Anda tidak mempunyai hak akses</p></div>';
}
	 ?>
	<!-- javascript -->
    <script src="/atolMaps/program/js/jquery-1.11.3.min.js"></script>
	<script src="/atolMaps/program/js/bootstrap.js"></script>
    <script src="/atolMaps/program/js/bootstrap-datepicker.js"></script>

    <script>
            $('.input-group.date #ttl').datepicker({});
			
			
    </script>
</body>
</html>