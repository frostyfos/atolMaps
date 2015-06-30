
<!doctype html>
<?php 
    session_start(); 
    $path = "../lib_func.php";
    include_once($path);

    connect();
    
   if(!isset ($_SESSION['myusername'])){
        header(("location:../index.php"));
    }

    //pagination
    $num_rec_per_page=10;
    if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
    $start_from = ($page-1) * $num_rec_per_page; 
    
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
	$sql_usaha = "SELECT u.*,kel.nama_kelurahan,kec.nama_kecamatan,sek.sektor,ska.skala,peng.*
         FROM usaha u join kelurahan kel on u.id_kelurahan=kel.id_kelurahan
                    join kecamatan kec on u.id_kecamatan=kec.id_kecamatan
                    join skala_usaha ska on u.id_skala=ska.id_skala
                    join sektor_usaha sek on u.id_sektor=sek.id_sektor
                    join pengusaha peng on u.id_pengusaha=peng.id_pengusaha
                    
        LIMIT $start_from, $num_rec_per_page";
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
    ?>
         </table>;
         <!-- pagination -->
            <?php 
                $sql = "SELECT * FROM usaha"; 
                $rs_result = mysql_query($sql); //run the query
                $total_records = mysql_num_rows($rs_result);  //count number of records
                $total_pages = ceil($total_records / $num_rec_per_page); 
            ?>
            <nav class="col-xs-offset-5 col-sm-offset-5 col-md-offset-5 col-lg-offset-5">
                <ul class="pagination">
                    <li>
                        <a href="tampilUsahaBandung.php?page=1" aria-label="First Page">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                    <?php 
                        for ($i=1; $i<=$total_pages; $i++) { 
                    ?>
                            <li><a href="tampilUsahaBandung.php?page=<?=$i?>"><?=$i?></a></li>
                    <?php
                    };
                    ?>
                    <li>
                        <a href="tampilUsahaBandung.php?page=<?=$total_pages?>" aria-label="Last Page">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                </ul>
            </nav>
    <?php
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