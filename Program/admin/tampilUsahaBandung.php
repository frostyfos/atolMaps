
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
    <title>List Usaha di Bandung</title>
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
    <?php 
        if(isset ($_SESSION['myusername'])){
            nav();
    
	connect();
	$sql_usaha = "SELECT u.*,kel.nama_kelurahan,kec.nama_kecamatan,sek.sektor,ska.skala
				 FROM usaha u join kelurahan kel on u.id_kelurahan=kel.id_kelurahan
										join kecamatan kec on u.id_kecamatan=kec.id_kecamatan
										join skala_usaha ska on u.id_skala=ska.id_skala
										join sektor_usaha sek on u.id_sektor=sek.id_sektor
										";
        //eksekusi query
        $query = mysql_query($sql_usaha);
        if(!$query)
        {
            print(mysql_error());
        }
    echo '<a href="insert_usaha.php"><span class="glyphicon glyphicon-plus"></span>Tambah data usaha</a>';
	
    echo '<div class="row">
	  
	  <div class="col-lg-6 pull-right">
		<div class="input-group">
		  <input type="text" class="form-control" aria-label="..." placeholder="Cari data...">
		  <div class="input-group-btn">
			<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Cari Berdasarkan... <span class="caret"></span></button>
			<ul class="dropdown-menu dropdown-menu-right" role="menu">
			  <li><a href="#">Nama Usaha</a></li>
			  <li><a href="#">Sektor</a></li>
			  <li><a href="#">Skala Usaha</a></li>
			  <li class="divider"></li>
			  <li><a href="#">Separated link</a></li>
			</ul>
		  </div><!-- /btn-group -->
		</div><!-- /input-group -->
	  </div><!-- /.col-lg-6 -->
	</div><!-- /.row -->';
        //tampil data  
		echo '<span class="glyphicon" ></span><hr><h2 align="center">Data Usaha di Kabupaten Bandung</h2>';             
        echo '<br><br><table class="table table-striped">';
        echo '<tr>';
        echo '<th>ID Usaha</th>';
        echo '<th>Nama Usaha</th>';
        echo '<th>Id Pemilik Usaha</th>';
        echo '<th>No Telepon Usha</th>';
        echo '<th>Produk Utama</th>';
		echo '<th>Sektor Usaha</th>';
		echo '<th>Skala Usaha</th>';
		echo '<th>Alamat</th>';
		echo '<th>Kelurahan</th>';
		echo '<th>Kecamatan</th>';
		echo '<th>Status Usaha</th>';
		echo '<th colspan = "3">Aksi</th>';
        echo '</tr>';

        $i = 1;
        while($row = mysql_fetch_array($query))
        {
        ?>
             <tr>
             <form method = "post" action = "editUsaha.php">
             	<input type="hidden" name="id_usaha" class="form-control" value="<?=$row['id_usaha']?>"/>
	            <td> <?=$row['id_usaha']?></td>
	            <td> <?=$row['nama_usaha']?></td>
				<td> <?=$row['id_pengusaha']?></td>
				<td> <?=$row['telp']?></td>
				<td> <?=$row['produk_utama']?></td>
				<td> <?=$row['skala']?></td>
				<td> <?=$row['sektor']?></td>
				<td> <?=$row['alamat_usaha']?></td>
				<td> <?=$row['nama_kelurahan']?></td>
				<td> <?=$row['nama_kecamatan']?></td>
				<td> <?=$row['status_usaha']?></td>		
				<td><button type="button" class="btn btn-success glyphicon glyphicon-picture" data-toggle="modal" data-target="#myModal<?=$i?>"></button></td>
				<!-- <td><button type="submit" class="btn btn-primary glyphicon glyphicon-edit" data-toggle="modal" data-target="#Update<?=$i?>"></button></td> -->
				<td><button type="submit" class="btn btn-primary glyphicon glyphicon-edit"></button></td>
	            <td><button class='btn btn-danger glyphicon glyphicon-trash' type="button" data-toggle="modal" data-target="#Delete<?=$i?>"></button></td>
 			</tr>
 			</form>
			<!-- Button trigger modal -->
			
			<!-- modal gambar -->
			<div class="modal fade" id="myModal<?=$i?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			  <div class="modal-dialog">
				<div class="modal-content">
				  <div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Foto Usaha</h4>
				  </div>
				  <div class="modal-body">
					<img src="<?=$row['gambar1']?>" height="200" width="200"/>
					<img src="<?=$row['gambar2']?>" height="200" width="200"/>
					<img src="<?=$row['gambar3']?>" height="200" width="200"/>
					<img src="<?=$row['gambar4']?>" height="200" width="200"/>
					<img src="<?=$row['gambar5']?>" height="200" width="200"/>
				  </div>
				  <div class="modal-footer">
					<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
				  </div>
				</div>
			  </div>
			</div>

			<!-- Modal Update-->
            <div class="modal fade" id="Update<?=$i?>" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Edit Data Usaha</h4>
                        </div>
                        <div class="modal-body">
                            <form class="form-horizontal" id="formUpdate" action="prosesEditUsaha.php" method="post">
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
                        <div class="modal-footer"></div>
                    </div>
                </div>
            </div><!-- end of modal update -->

             <!-- Modal Hapus -->
             <div class="modal fade" id="Delete<?=$i?>" tabindex="-1" role="dialog" aria-hidden="true">
                 <div class="modal-dialog">
                     <div class="modal-content">
                         <div class="modal-header">
                             <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                             <h4 class="modal-title" id="myModalLabel">Anda Yakin ingin menghapus Data?</h4>
                         </div>
                         <form method="POST" action="prosesHapusUsaha.php">
                             <input type="hidden" name="id_usaha" value="<?=$row['id_usaha']?>">
                             <div class="modal-footer">
                                 <button type="submit" class="btn btn-danger">Hapus</button>
                                 <button type="button" data-dismiss="modal" class="btn btn-default">Batal</button>
                             </div>
                         </form>
                     </div>                          
                 </div>
             </div><!--  End of Modal Hapus -->
 
    <?php
            $i++;
         }
         echo "</table>";
    echo '</div>'; //end of tab admin
echo '</div>'; //end of tab content
}else{
    echo '<div class="alert alert-warning text-center" role="alert"><p>Anda tidak mempunyai hak akses</p></div>';
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
 <?php 
          
    ?> 
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