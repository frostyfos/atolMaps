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
    <title>Insert Data Usaha Baru</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.css" rel="stylesheet">
    <!-- custom css -->
    <link href="../css/custom.css" rel="stylesheet">
    <script src="../js/jquery.geocomplete.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAEDx3SuCm6B1iGH23GY6FKSZuS9cQUiRw"></script>
    <script src="http://maps.googleapis.com/maps/api/js?sensor=false&amp;libraries=places"></script>
</head>

<body>
<div class="container">
    <!-- header -->
    <?php 
        nav();    
    ?>
<!-- disini konten  -->
    

    <div class="row">
            <div class="navbar navbar-inverse navbar-fixed-bottom ">
                <div class="container">
                    <p class="navbar-text pull-left">Copyright &copy 2015 Maps</p>
                </div>
            </div>
        </div>
    </div> <!-- end of container -->

     <div class="row">
        <h2 class="text-center">Masukan Data Usaha</h2><hr/>
            <div class="col-xs-7 col-xs-offset-1 col-sm-6 col-md-5 col-lg-5">
                <form class="form-horizontal" action="prosesInsertUsaha.php" enctype="multipart/form-data" method="post" data-toggle="validator" role="form">	
                    <div class="form-group">
                        <label for="nama" class="col-sm-3 control-label">Nama Usaha</label>
                        <div class="col-sm-7">
                            <input type="text" name="nama" class="form-control" placeholder="Nama usaha" data-error="Wajib di Isi" required/>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="id_pengusaha" class="col-sm-3 control-label">Nama Pengusaha</label>
                        <div class="col-sm-7">          
                            <select class="form-control" name="id_pengusaha" id="id_pengusaha">
                                <?php 
                                    $sql = "SELECT  * from pengusaha ";
                                    $hasil = mysql_query($sql);  
                                    while($row=mysql_fetch_array($hasil)){
                                ?>
                                    <option value="<?php echo $row['id_pengusaha']; ?>">
                                        <?php  echo $row['nama_pengusaha'];?>
                                    </option>
                                <?php
                                    }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="produk" class="col-sm-3 control-label">Produk Utama</label>
                        <div class="col-sm-7">
                            <input type="text" name="produk" class="form-control" placeholder="Produk Utama" data-error="Wajib di Isi" required/>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>

					<div class="form-group row">
                        <label for="alamat" class="col-sm-3 control-label">Alamat</label> 
                        <div class="col-sm-7">
                                <input type="text" name="alamat" id="geocomplete" class="form-control" placeholder="alamat usaha" data-error="Wajib di Isi" required/>  
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="lat" class="col-sm-3 control-label">Latitude</label>
                        <div class="col-sm-7">
                            <input type="text" name="lat" class="form-control" placeholder="Koordinat latitude" readonly/>
                        </div>
                    </div>
            
                    <div class="form-group row">
                       <label for="lng" class="col-sm-3 control-label">Longitude</label>
                       <div class="col-sm-7">
                           <input type="text" name="lng" class="form-control" placeholder="Koordinat longitude" readonly/>
                       </div>
                    </div>
					
				<div class="form-group row" >
                    <label for="kecamatan" class="col-sm-3 control-label">Kecamatan</label>
                    <div class="col-sm-7">          
                        <select class="form-control" name="kecamatan" id="kecamatan">
                            <?php 
                                $sql = "SELECT  * from kecamatan ";
                                $hasil = mysql_query($sql);  
                                while($row=mysql_fetch_array($hasil)){
                            ?>
                                <option value="<?php echo $row['id_kecamatan']; ?>">
                                    <?php  echo $row['nama_kecamatan']; ?>
                                </option>';
                            <?php
                                }
                            ?>
                            
                        </select>
                    </div>
				</div>

                <div class="form-group row" >
                <label for="kelurahan" class="col-sm-3 control-label">Kelurahan</label>
                <div class="col-sm-7">          
                    <select class="form-control" name="kelurahan" id="kelurahan">
                        <?php 
                            $sql = "SELECT * FROM kelurahan INNER JOIN kecamatan ON kelurahan.id_kecamatan = kecamatan.id_kecamatan ORDER BY nama_kelurahan";
                            $hasil = mysql_query($sql);  
                            while($row=mysql_fetch_array($hasil)){
                        ?>
                            <option value="<?php echo $row['id_kelurahan']; ?>" class="<?php echo $row['id_kecamatan']; ?>">
                                <?php  echo $row['nama_kelurahan']; ?>
                            </option>';
                        <?php
                            }
                        ?>
                    </select>
                </div>
				</div>

                <div class="form-group">
                    <label for="telp" class="col-sm-3 control-label">No Telepon</label>
                    <div class="col-sm-7">
                        <input type="text" name="telp" class="form-control" placeholder="Nomor kuntak usaha" data-error="Wajib di Isi" required/>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
					
					
					<div class="form-group row" >
                <label for="skala" class="col-sm-3 control-label">Skala Usaha</label>
                <div class="col-sm-7">          
                    <select class="form-control" name="skala" id="skala">
                        <?php 
                            $sql = "SELECT  * from skala_usaha ";
                            $hasil = mysql_query($sql);  
                            while($row=mysql_fetch_array($hasil)){
                        ?>
                            <option value="<?php echo $row['id_skala']; ?>">
                                <?php  echo $row['skala'];?>
                            </option>
                        <?php
                            }
                        ?>
                    </select>
                </div>
				</div>
				
				<div class="form-group row" >
                <label for="sektor" class="col-sm-3 control-label">Sektor Usaha</label>
                <div class="col-sm-7">          
                    <select class="form-control" name="sektor" id="sektor">
                        <?php 
                            $sql = "SELECT  * from sektor_usaha ";
                            $hasil = mysql_query($sql);  
                            while($row=mysql_fetch_array($hasil)){
                        ?>
                            <option value="<?php echo $row['id_sektor']; ?>">
                                <?php  echo $row['sektor'];?>
                            </option>';
                        <?php
                            }
                        ?>
                    </select>
                </div>
				</div>
				
				    <div class="form-group">
                        <label for="gambar1" class="col-sm-3 control-label">Gambar Usaha 1</label>
                        <div class="col-sm-7">
                           <input type="hidden" name="MAX_FILE_SIZE" value="1000000" /><input name="gambar1" type="file" />
                        </div>
                    </div>
					
				
				    <div class="form-group">
                        <label for="gambar2" class="col-sm-3 control-label">Gambar Usaha 2</label>
                        <div class="col-sm-7">
                           <input type="hidden" name="MAX_FILE_SIZE" value="1000000" /><input name="gambar2" type="file" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="gambar3" class="col-sm-3 control-label">Gambar Usaha 3</label>
                        <div class="col-sm-7">
                           <input type="hidden" name="MAX_FILE_SIZE" value="1000000" /><input name="gambar3" type="file" />
                        </div>
                    </div>
					<div class="form-group">
                        <label for="gambar4" class="col-sm-3 control-label">Gambar Usaha 4</label>
                        <div class="col-sm-7">
                           <input type="hidden" name="MAX_FILE_SIZE" value="1000000" /><input name="gambar4" type="file" />
                        </div>
                    </div>
					<div class="form-group">
                        <label for="gambar5" class="col-sm-3 control-label">Gambar Usaha 5</label>
                        <div class="col-sm-7">
                           <input type="hidden" name="MAX_FILE_SIZE" value="1000000" /><input name="gambar5" type="file" />
                        </div>
                    </div>

                    <div class="form-group row" >
                        <label for="status" class="col-sm-3 control-label">Status Usaha</label>
                        <div class="col-sm-7">          
                            <select class="form-control" name="status" id="status">
                                <option value="aktif">Aktif</option>
                                <option value="tidak aktif">Tidak Aktif</option>
                            </select>
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
            <div class="col-xs-2 col-xs-offset-1 col-sm-6 col-md-1 col-lg-1">
                <div class="map_canvas"></div>
            </div><!-- end of canvas -->
        </div> 
     </div>
	<!-- javascript -->
    <script src="../js/jquery-1.11.3.min.js"></script>
	<script src="../js/bootstrap.js"></script>
    <script src="../js/jquery.chained.min.js"></script>
    <script src="../js/jquery.geocomplete.js"></script>
    <script src="../js/validator.min.js"></script>
    <script>
            $("#kelurahan").chained("#kecamatan");	
    </script>
    <script>
      $(function(){
        var center = new google.maps.LatLng(-6.865221399999999,107.49197670000001);

        $("#geocomplete").geocomplete({
          map: ".map_canvas",
          details: "form",
          types: ["geocode", "establishment"],
          country: 'ID'
        });

        var map =  $("#geocomplete").geocomplete("map")

        map.setCenter(center);
        map.setZoom(13);
      });
    </script>
</body>
</html>