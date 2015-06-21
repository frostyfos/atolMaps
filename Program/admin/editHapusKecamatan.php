<!doctype html>
<?php 
    session_start(); 
    $path = "../lib_func.php";
    include_once($path);
    
    connect();
    if(!isset ($_SESSION['myusername'])){
        header(("location:../index.php.php"));
    }
    
    $sql = "SELECT * FROM kecamatan where id_kecamatan like ".$_POST['id_kecamatan']."";
    //eksekusi query
    $query = mysql_query($sql);
    if(!$query)
    {
        print(mysql_error());
    }
?>

<html>
<head>
    <meta charset="utf-8">
    <title>Olah data Kecamatan</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.css" rel="stylesheet">
    <!-- custom css -->
    <link href="../css/custom.css" rel="stylesheet">
    <link href="/broto/css/datepicker.css" rel="stylesheet">
</head>

<body>
<div class="container">
    <!-- header -->
    <?php nav(); ?>
    <!-- disini konten  -->
    <?php 
        if(isset($_POST["update"]))
        {
            while($row = mysql_fetch_array($query))
            {
            echo '<div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <h2 class="text-center">Edit Data Kecamatan</h2><hr/>
                <form class="form-horizontal" action="prosesEditKecamatan.php" method="post">
                    <input type="hidden" name="id_kecamatan" class="form-control" value="'.$row['id_kecamatan'].'"/>
                    <div class="form-group">
                        <label for="nama_kecamatan" class="col-sm-4 control-label">Nama Kecamatan</label>
                        <div class="col-sm-5">
                            <input type="text" name="nama_kecamatan" class="form-control" value="'.$row['nama_kecamatan'].'"/>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="lat" class="col-sm-4 control-label">Latitude/KTP</label>
                        <div class="col-sm-5">
                            <input type="text" name="lat" class="form-control" value="'.$row['lat'].'"/>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="long" class="col-sm-4 control-label">Longitude</label>
                        <div class="col-sm-5">
                            <input type="text" name="long" class="form-control" value="'.$row['lng'].'"/>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-4 col-sm-5">
                           <input type="submit" name="ya" class="btn btn-default" value="ya"/>
                           <input type="submit" name="tidak" class="btn btn-default" value="tidak"/>
                        </div>
                    </div>
                </form>
            </div>
            </div> 
            </div>';
            }
        }
        else if(isset($_POST["delete"]))
        {
            while($row = mysql_fetch_array($query))
            {
            echo '<div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <h2 class="text-center">Hapus Data Kecamatan</h2><hr/>
                <form class="form-vertical" action="prosesHapusKecamatan.php" method="post">
                    <input type = "hidden" name = "id_kecamatan" value = "'. $_POST['id_kecamatan'] .'">
                        <table class="table">
                            <tr>
                                <th colspan = "2" class="text-center info"> INFORMASI KECAMATAN</th>
                            </tr>
                            <tr>
                                <th>ID Kecamatan</th>
                                <td>'.$row['id_kecamatan'].'</td>
                            </tr>
                            <tr>
                                <th>Nama Kecamatan</th>
                                <td>'.$row['nama_kecamatan'].'</td>
                            </tr>
                            <tr>
                                 <th>Latitude </td>
                                <td>'.$row['lat'].'</th>
                            </tr>
                            <tr>
                                <th>Longitude</th>
                                <td>'.$row['lng'].'</td>
                            </tr>
                                
                            <tr>
                                <td colspan="2">
                                    <b>Hapus Data ? <b><br/>
                                    <input type="submit" name="ya" class="btn btn-default" value="ya"/>
                                    <input type="submit" name="tidak" class="btn btn-default" value="tidak"/>
                                </td>
                            </tr>             
                        </table>
                </form>
            </div>
            </div> 
         </div>';   
            }   
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
     
     </div>';
    <!-- javascript -->
    <script src="../js/jquery-1.11.3.min.js"></script>
    <script src="../js/bootstrap.js"></script>
</body>
</html>