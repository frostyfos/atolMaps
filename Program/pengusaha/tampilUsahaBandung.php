<!doctype html>
<?php 
    session_start(); 
    $path = "../lib_func.php";
    include_once($path);
    
   if(!isset ($_SESSION['myusername'])){
        header(("location:../formLogin.php"));
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
		echo '<span class="glyphicon" ></span><hr><center>Data Usaha di Kabupaten Bandung</center>';             
        echo '<br><br><table class="table table-striped">';
        echo '<tr>';
        echo '<th>NO</th>';
        echo '<th>Nama Usaha</th>';
        echo '<th>Produk Utama</th>';
		echo '<th>Sektor Usaha</th>';
		echo '<th>Skala Usaha</th>';
		echo '<th>Alamat</th>';
		echo '<th>Kelurahan</th>';
		echo '<th>Kecamatan</th>';
		echo '<th>Gambar</th>';
        echo '</tr>';
        //tampil data transaksi
        while($row = mysql_fetch_array($query))
        {
            echo "<tr>";
            echo '<form method = "post" action = "tampilPetaUsaha.php">';
            echo '<td>' . $row['id_usaha'] . '<input type = "hidden" name = "id_usaha" value = "'. $row['id_usaha'] .'"></td>';
            echo '<td>' . $row['nama_usaha'] . '<input type = "hidden" name = "nama_usaha" value = "'. $row['nama_usaha'] .'"></td>';
			echo '<td>' . $row['produk_utama'] . '<input type = "hidden" name = "produk_utama" value = "'. $row['produk_utama'] .'"></td>';
			echo '<td>' . $row['skala'] . '<input type = "hidden" name = "Skala" value = "'. $row['skala'] .'"></td>';
			echo '<td>' . $row['sektor'] . '<input type = "hidden" name = "sektor" value = "'. $row['sektor'] .'"></td>';
			echo '<td>' . $row['alamat_usaha'] . '<input type = "hidden" name = "alamat_usaha" value = "'. $row['alamat_usaha'] .'"></td>';
			echo '<td>' . $row['nama_kelurahan'] . '<input type = "hidden" name = "kelurahan" value = "'. $row['nama_kelurahan'] .'"></td>';
			echo '<td>' . $row['nama_kecamatan'] . '<input type = "hidden" name = "kecamatan" value = "'. $row['nama_kecamatan'] .'"></td>';
			
            echo '<td><img src="../gambar/'.$row['gambar1'].' " height="50" width="50" data-toggle="modal" data-target="#myModal"/>
			<button type="button" class="btn btn-sm" data-toggle="modal" data-target="#myModal">
			  Lihat Gambar
			</button>
			</td>';
			
			echo '<!-- Button trigger modal -->
			
			
			<!-- Modal -->
			<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			  <div class="modal-dialog">
				<div class="modal-content">
				  <div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Foto Usaha</h4>
				  </div>
				  <div class="modal-body">
					<img src="../gambar/'.$row['gambar1'].' " height="200" width="200"/>
					<img src="../gambar/'.$row['gambar2'].' " height="200" width="200"/>
					<img src="../gambar/'.$row['gambar3'].' " height="200" width="200"/>
					<img src="../gambar/'.$row['gambar4'].' " height="200" width="200"/>
					<img src="../gambar/'.$row['gambar5'].' " height="200" width="200"/>
				  </div>
				  <div class="modal-footer">
					<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
					
				  </div>
				</div>
			  </div>
			</div>';
			
			
            echo '</form>';
            echo "</tr>";
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
</body>
</html>