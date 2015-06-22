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
                
                <form class="form-horizontal" action="prosesEditUsaha.php" method="post">
                                <input type="hidden" name="id_usaha" class="form-control" value="<?=$row['id_usaha']?>"/>
                                <div class="form-group">
                                    <label for="nama_usaha" class="control-label">Nama Usaha</label>
                                    <input type="text" name="nama_usaha" class="form-control" value="<?=$row['nama_usaha']?>"/>
                                </div>
                                <div class="form-group">
                                    <label for="id_pengusaha" class="control-label">Nama Pemilik Usaha</label>        
                                        <select class="form-control" name="id_pengusaha" id="id_pengusaha">
                                            <?php 
                                                $sql = "SELECT  * from pengusaha ";
                                                $hasil = mysql_query($sql);  
                                                while($data=mysql_fetch_array($hasil)){
                                            ?>
                                                <option value="<?php echo $data['id_pengusaha']; ?>">
                                                    <?php echo $data['nama_pengusaha'];?>
                                                </option>
                                            <?php
                                                }
                                            ?>
                                        </select>
                                </div> 

                                <div class="form-group">
                                    <label for="telp" class="control-label">No Telepon</label>
                                    <input type="text" name="telp" class="form-control" value="<?=$row['telp']?>"/>
                                </div>

                                <div class="form-group">
                                    <label for="produk_utama" class="control-label">Produk Utama</label>
                                    <input type="text" name="produk_utama" class="form-control" value="<?=$row['produk_utama']?>"/>
                                </div>

                                <div class="form-group" >
                                    <label for="skala" class="control-label">Skala Usaha</label>       
                                        <select class="form-control" name="skala" id="skala">
                                            <?php 
                                                $sql = "SELECT  * from skala_usaha ";
                                                $hasil = mysql_query($sql);  
                                                while($skala=mysql_fetch_array($hasil)){
                                            ?>
                                                <option value="<?php echo $skala['id_skala']; ?>">
                                                    <?php  echo $skala['skala'];?>
                                                </option>
                                            <?php
                                                }
                                            ?>
                                        </select>
                                </div>
                                    
                                <div class="form-group" >
                                    <label for="sektor" class="control-label">Sektor Usaha</label>       
                                        <select class="form-control" name="sektor" id="sektor">
                                            <?php 
                                                $sql = "SELECT  * from sektor_usaha ";
                                                $hasil = mysql_query($sql);  
                                                while($sektor=mysql_fetch_array($hasil)){
                                            ?>
                                                <option value="<?php echo $sektor['id_sektor']; ?>">
                                                    <?php  echo $sektor['sektor'];?>
                                                </option>';
                                            <?php
                                                }
                                            ?>
                                        </select>
                                </div>

                                <div class="form-group">
                                    <label for="alamat" class="control-label">Alamat</label> 
                                    <input type="text" name="alamat" id="geocomplete" class="form-control" value="<?=$row['alamat_usaha']?>"/>  
                                </div>
                                <input type="text" name="lng" class="form-control" placeholder="Koordinat longitude" readonly/>
                                <input type="text" name="lat" class="form-control" placeholder="Koordinat latitude" readonly/>
                                <div class="map_canvas"></div>

                                <div class="form-group">
                                    <label for="kecamatan" class="control-label">Kecamatan</label>         
                                        <select class="form-control" name="kecamatan" id="kecamatan">
                                            <?php 
                                                $sql = "SELECT  * from kecamatan ";
                                                $hasil = mysql_query($sql);  
                                                while($kecamatan=mysql_fetch_array($hasil)){
                                            ?>
                                                <option value="<?php echo $kecamatan['id_kecamatan']; ?>">
                                                    <?php  echo $kecamatan['nama_kecamatan']; ?>
                                                </option>';
                                            <?php
                                                }
                                            ?>                                          
                                        </select>
                                </div>

                                <div class="form-group">
                                    <label for="kelurahan" class="control-label">Kelurahan</label>         
                                        <select class="form-control" name="kelurahan" id="kelurahan">
                                            <?php 
                                                $sql = "SELECT * FROM kelurahan INNER JOIN kecamatan ON kelurahan.id_kecamatan = kecamatan.id_kecamatan ORDER BY nama_kelurahan";
                                                $hasil = mysql_query($sql);  
                                                while($kelurahan=mysql_fetch_array($hasil)){
                                            ?>
                                                <option value="<?php echo $kelurahan['id_kelurahan']; ?>" class="<?php echo $kelurahan['id_kecamatan']; ?>">
                                                    <?php  echo $kelurahan['nama_kelurahan']; ?>
                                                </option>';
                                            <?php
                                                }
                                            ?>
                                        </select>
                                </div>
                                <div class="form-group">
                                    <label for="status" class="control-label">Status Usaha</label>        
                                    <select class="form-control" name="status" id="status">
                                        <option value="aktif">Aktif</option>
                                        <option value="tidak aktif">Tidak Aktif</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="gambar1" class="control-label">Gambar Usaha 1</label>
                                    <input type="hidden" name="MAX_FILE_SIZE" value="1000000" /><input name="gambar1" type="file" />
                                </div>
                                <div class="form-group">
                                    <label for="gambar2" class="control-label">Gambar Usaha 2</label>
                                    <input type="hidden" name="MAX_FILE_SIZE" value="1000000" /><input name="gambar2" type="file" />
                                </div>
                                <div class="form-group">
                                    <label for="gambar3" class="control-label">Gambar Usaha 3</label>
                                    <input type="hidden" name="MAX_FILE_SIZE" value="1000000" /><input name="gambar3" type="file" />
                                </div>
                                <div class="form-group">
                                    <label for="gambar4" class="control-label">Gambar Usaha 4</label>
                                    <input type="hidden" name="MAX_FILE_SIZE" value="1000000" /><input name="gambar4" type="file" />
                                </div>
                                <div class="form-group">
                                    <label for="gambar5" class="control-label">Gambar Usaha 5</label>
                                    <input type="hidden" name="MAX_FILE_SIZE" value="1000000" /><input name="gambar5" type="file" />
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Ubah</button>
                                    <button type="reset" class="btn btn-default">Reset</button>
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