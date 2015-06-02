<!doctype html>
<?php 
    session_start(); 
    $path = $_SERVER['DOCUMENT_ROOT'];
    $path .= "/atolMaps/program/lib_func.php";
    include_once($path);
    
    if(!isset ($_SESSION['myusername'])){
        formLogin();
    }
    
?>

<html>
<head>
	<meta charset="utf-8">
    <title>Halaman Pengusaha</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap core CSS -->
    <link href="/atolMaps/program/css/bootstrap.css" rel="stylesheet">
    <!-- custom css -->
    <link href="/atolMaps/program/css/custom.css" rel="stylesheet">
</head>

<body>
<div class="container">
    <?php 
        if(isset ($_SESSION['myusername'])){
            nav();
    
	connect();
	$sql_usaha = "SELECT * FROM usaha,pengusaha WHERE pengusaha.no_ktp like '".$_SESSION['myusername']."'";
        //eksekusi query
        $query = mysql_query($sql_usaha);
        if(!$query)
        {
            print(mysql_error());
        }
    echo '<a href="/atolmaps/program/pengusaha/insert_usaha.php"><span class="glyphicon glyphicon-plus"></span>Tambah data usaha</a>';
	
    echo '<form action = "#.php" method = "post">
            <div class="col-xs-6 col-sm-6 col-md-6 col-xs-offset-6 col-sm-offset-6">
            <div class="input-group">

              <input type="text" name="cari_usaha" class="form-control" placeholder="Cari data usaha...">
                <span class="input-group-btn">
                    <button class="btn btn-default" type="button">Search</button>
                </span>
            </div>
            </div>
            </form><br>';//search
        //tampil data  
		echo '<span class="glyphicon" ></span><hr><center>Data Usaha Anda</center>';             
        echo '<br><br><table class="table table-striped">';
        echo '<tr>';
        echo '<th>NO</th>';
        echo '<th>Usaha</th>';
        echo '<th>Status</th>';
        echo '</tr>';
        //tampil data transaksi
        while($row = mysql_fetch_array($query))
        {
            echo "<tr>";
            echo '<form method = "post" action = "edit_hapus_meja.php">';
            echo '<td>' . $row['id_usaha'] . '<input type = "hidden" name = "id_usaha" value = "'. $row['id_usaha'] .'"></td>';
            echo '<td>' . $row['nama_usaha'] . '<input type = "hidden" name = "nama_usaha" value = "'. $row['nama_usaha'] .'"></td>';
			echo '<td>' . $row['produk_utama'] . '<input type = "hidden" name = "produk_utama" value = "'. $row['produk_utama'] .'"></td>';
			echo '<td>' . $row['alamat_usaha'] . '<input type = "hidden" name = "alamat_usaha" value = "'. $row['alamat_usaha'] .'"></td>';
            echo '<td>' . $row['status_usaha'] . '<input type = "hidden" name = "status" value = "'. $row['status_usaha'] .'"></td>';
            echo '<td><input type = "submit" name = "update" value = "Update" class="btn btn-default"></td>';
            echo '<td><input type = "submit" name = "delete" value = "delete" class="btn btn-default"></td>';
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
    <script src="/atolMaps/program/js/jquery-1.11.3.min.js"></script>
	<script src="/atolMaps/program/js/bootstrap.js"></script>
</body>
</html>