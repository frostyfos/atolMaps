<!doctype html>
<?php 
    session_start(); 
    $path = "../lib_func.php";
    include_once($path);
    
    if(!isset ($_SESSION['myusername'])){
        header(("location:../index.php"));
    }
    connect();
    
?>

<html>
<head>
    <meta charset="utf-8">
    <title>Laporan Usaha</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.css" rel="stylesheet">
    <!-- custom css -->
    <link href="../css/custom.css" rel="stylesheet">
</head>

<body>
<div class="container">
   <?php 
        nav();
        
        $sql_bahan = "SELECT u.*,kel.nama_kelurahan,kec.nama_kecamatan,sek.sektor,ska.skala
                 FROM usaha u join kelurahan kel on u.id_kelurahan=kel.id_kelurahan
                                        join kecamatan kec on u.id_kecamatan=kec.id_kecamatan
                                        join skala_usaha ska on u.id_skala=ska.id_skala
                                        join sektor_usaha sek on u.id_sektor=sek.id_sektor";
        //eksekusi query
        $query = mysql_query($sql_bahan);
        if(!$query)
        {
            print(mysql_error());
        }
        echo '<div id="printable">';

        //tampil data
        echo "<h2 class='text-center'>Hasil Laporan usaha</h2><hr/>";  
        echo '<div class="col-xs-4 col-sm-4 col-md-4 col-xs-offset-4 col-sm-offset-5 col-md-offset-5">
        <input type="button" id="print" class = "btn btn-primary submit_button" value="Print Report">
        </div><br/>';
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
        echo '</tr>';  
        while($row = mysql_fetch_array($query))
        {
            
        ?>
            <tr>
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
            </tr>
        <?php    
         }
         echo "</table>";
    echo '</div>'; 
echo '</div>';
echo '</div>';


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
	<!-- javascript -->
    <script src="../js/jquery-1.11.3.min.js"></script>
    <script src="../js/bootstrap.js"></script>
    <script src="../js/jQuery.print.js"></script>
    <script>
            $(document).ready(function(){

                $("#print").click(function(){
                    $("#printable").print({

                        globalStyles : false,
                        stylesheet : "../css/bootstrap.css",
                        noPrintSelector : ".submit_button" // Don't print this
                    })
                })
            })
        </script>
</body>
</html>