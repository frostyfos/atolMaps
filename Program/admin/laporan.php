<!doctype html>
<?php 
    session_start(); 
    $path = "../lib_func.php";
    include_once($path);
    
    if(!isset ($_SESSION['myusername'])){
        header(("location:../index.php"));
    }
    
?>

<html>
<head>
    <meta charset="utf-8">
    <title>Laporan Usaha</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap core CSS -->
    <link href="/atolMaps/program/css/bootstrap.css" rel="stylesheet">
    <!-- custom css -->
    <link href="/atolMaps/program/css/custom.css" rel="stylesheet">
    <link href="../css/datepicker.css" rel="stylesheet">
</head>

<body>
<div class="container">
   <?php 
        //$path = $_SERVER['DOCUMENT_ROOT'];
           connect();
        // $tglAwal = $_POST['tglAwal'];
        // $tglAkhir = $_POST['tglAkhir'];
           $kecamatan = $_POST['kecamatan'];
        
        $sql_bahan = "SELECT usaha.*,kec.*,count(id_usaha) as 'jumlah' FROM usaha join kecamatan kec on usaha.id_kecamatan=kec.id_kecamatan where kec.id_kecamatan = '".$kecamatan."' group by kec.id_kecamatan";
        //eksekusi query
        $query = mysql_query($sql_bahan);
        if(!$query)
        {
            print(mysql_error());
        }
        echo '<div id="printable">';
        //tampil data  
        while($row = mysql_fetch_array($query))
        {
        echo "<h3 class='text-center'>Hasil Laporan usaha di Kecamatan ".$row['nama_kecamatan']."</h3><hr/>";             
        echo '<br><br><table class="table table-striped">';
        echo '<tr>';
        echo '<th>ID</th>';
        echo '<th>nama Kecamatan</th>';
        echo '<th>Jumlah Usaha</th>';
        echo '</tr>';
        //tampil data transaksi
        
            echo "<tr>";
            echo '<td>'.$row['id_kecamatan'].'</td>';
            echo '<td>'.$row['nama_kecamatan'].'</td>';
            echo '<td>'.$row['jumlah'].'</td>';
            echo "</tr>";
         }
         echo "</table>";
    echo '</div>'; 
echo '</div>';
echo '</div>';
echo '<div class="col-xs-4 col-sm-4 col-md-4 col-xs-offset-4 col-sm-offset-5 col-md-offset-5">
        <input type="button" id="print" class = "btn btn-primary submit_button" value="Print Report">
</div>';

?> 
    
    <!-- footer -->
    <div class="row">
        <div class="navbar navbar-default navbar-fixed-bottom ">
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