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
    <title>Sign Up</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.css" rel="stylesheet">
    <!-- custom css -->
    <link href="../css/custom.css" rel="stylesheet">
    <link href="../css/datepicker.css" rel="stylesheet">
</head>

<body>
<div class="container">
   <?php 
        //$path = $_SERVER['DOCUMENT_ROOT'];
           

    
        if(isset ($_SESSION['myusername'])){
            nav();
        }


?> 
<form class="form-horizontal" method="post" action="usaha_report_proses.php">
        <!-- <div class="form-group">
                        
            <label for="tglAwal" class="col-sm-4 control-label">Tanggal Awal</label>
            <div class="col-sm-5">
            <div class="input-group date">
                <input type="text" name="tglAwal" id ="tglAwal" class="form-control" placeholder="tanggal mulai laporan"/>
                <span class="input-group-addon">
                    <i class="glyphicon glyphicon-th"></i>
                </span>
            </div>
            </div>
        </div>

        <div class="form-group">
                        
            <label for="tglAkhir" class="col-sm-4 control-label">Tanggal Akhir</label>
            <div class="col-sm-5">
            <div class="input-group date">
                <input type="text" name="tglAkhir" id ="tglAkhir" class="form-control" placeholder="tanggal akhir laporan"/>
                <span class="input-group-addon">
                    <i class="glyphicon glyphicon-th"></i>
                </span>
            </div>
            </div>
        </div>

        <div class="form-group row" >
                <label for="kecamatan" class="col-sm-3 control-label">Kecamatan</label>
                <div class="col-sm-7">          
                    <select class="form-control" name="kecamatan" id="kecamatan">
                        <?php 
                            $sql = "SELECT  * from kecamatan ";
                            $hasil = mysql_query($sql);  
                            while($kecamatan=mysql_fetch_array($hasil)){
                        ?>
                            <option value="<?php echo $kecamatan['id_kecamatan']; ?>">
                                <?php  echo $kecamatan['nama_kecamatan'];?>
                            </option>';
                        <?php
                            }
                        ?>
                    </select>
                </div>
                </div> -->
            <div class="form-group">
                <span class="glyphicon" ></span><hr><h2 align="center">Pembuatan Laporan Data Usaha di Kabupaten Bandung</h2>
            </div>

                    <div class="form-group">
                        <div class="col-sm-offset-4 col-sm-5">
                           <button type="submit" class="btn btn-primary" align="center">Buat dan Download Laporan</button>
                           
                        </div>
                    </div>
    </form>
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
    <script src="../js/bootstrap-datepicker.js"></script>
    <script>
            $('.input-group.date #tglAwal').datepicker({});
            $('.input-group.date #tglAkhir').datepicker({});
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