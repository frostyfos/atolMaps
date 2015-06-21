<!doctype html>
<?php 
    session_start(); 
    $path = "../lib_func.php";
    include_once($path);
    
    connect();
    if(!isset ($_SESSION['myusername'])){
        header(("location:../index.php"));
    }
    
    $sql = "SELECT * FROM kelurahan where id_kelurahan like ".$_POST['id_kelurahan']."";
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
    <title>Olah data Kelurahan</title>
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
                <form class="form-horizontal" action="prosesEditKelurahan.php" method="post">
                    <input type="hidden" name="id_kelurahan" class="form-control" value="'.$row['id_kelurahan'].'"/>';
            ?>
                <div class="form-group">
                    <label for="kecamatan" class="col-sm-4 control-label">Kecamatan</label>
                    <div class="col-sm-5">          
                        <select class="form-control" name="kecamatan" id="kecamatan">';
                            <?php
                            $sql = "SELECT  id_kecamatan,nama_kecamatan from kecamatan ";
                            $hasil = mysql_query($sql);  
                            while($data=mysql_fetch_array($hasil)){
                                echo' <option value="'.$data['id_kecamatan'].'">'.$data['nama_kecamatan'].'</option>';
                            }
                            ?>
                        </select>
                    </div>
                </div>
            <?php
                echo'
                    <div class="form-group">
                        <label for="nama_kelurahan" class="col-sm-4 control-label">Nama Kecamatan</label>
                        <div class="col-sm-5">
                            <input type="text" name="nama_kelurahan" class="form-control" value="'.$row['nama_kelurahan'].'"/>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="lat" class="col-sm-4 control-label">Latitude</label>
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
                <h2 class="text-center">Hapus Data Kelurahan</h2><hr/>
                <form class="form-vertical" action="prosesHapusKelurahan.php" method="post">
                    <input type = "hidden" name = "id_kelurahan" value = "'. $_POST['id_kelurahan'] .'">
                        <table class="table">
                            <tr>
                                <th colspan = "2" class="text-center info"> INFORMASI KECAMATAN</th>
                            </tr>
                            <tr>
                                <th>ID Kelurahan</th>
                                <td>'.$row['id_kelurahan'].'</td>
                            </tr>
                            <tr>
                                <th>ID Kecamatan</th>
                                <td>'.$row['id_kecamatan'].'</td>
                            </tr>
                            <tr>
                                <th>Nama Kelurahan</th>
                                <td>'.$row['nama_kelurahan'].'</td>
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