<!doctype html>
<?php 
    session_start(); 
    $path = "../lib_func.php";
    include_once($path);
    
    connect();

    if(!isset ($_SESSION['myusername'])){
        header(("location:../index.php"));
    }
    
?>

<html>
<head>
	<meta charset="utf-8">
    <title>Daftar Kecamatan</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.css" rel="stylesheet">
    <!-- custom css -->
    <link href="../css/custom.css" rel="stylesheet">
</head>

<body>
<div class="container">
    <!-- header -->
    <?php 
        nav();    
    ?>

    <!-- disini konten  -->
    <h2 class="text-center">List Kecamatan</h2><hr/><br>
    <!-- USER AKTIF -->
        <?php 
            $sqlSkala = "SELECT * FROM kecamatan";
            //eksekusi query
            $query = mysql_query($sqlSkala);
            if(!$query)
            {
                print(mysql_error());
            }
        ?>
            <form action = "hasilCariKecamatan.php" method = "post">
            <div class="col-xs-6 col-sm-6 col-md-6 col-xs-offset-6 col-sm-offset-6">
            <div class="input-group">
              <input type="text" name="dataCari" class="form-control" placeholder="Cari Nama Kecamatan...">
                <span class="input-group-btn">
                    <button class="btn btn-default" type="submit">Search</button>
                </span>
            </div>
            </div>
            </form><br> 
            <!-- tampil data -->               
            <br><br>
            <table class="table table-striped">
                <tr>
                    <th>ID</th>
                    <th>Nama Kecamatan</th>
                    <th>Latitude</th>
                    <th>Longitude</th>
                    <th colspan="2">Aksi</th>
                </tr>
                <?php 
                    $i = 1;
                    while($row = mysql_fetch_array($query))
                    {
                ?>
                        <tr>
                            <td><?=$row['id_kecamatan']?><input type = "hidden" name = "id_kecamatan" value = "<?=$row['id_kecamatan']?>"></td>
                            <td><?=$row['nama_kecamatan']?><input type = "hidden" name = "nama_kecamatan" value = "<?=$row['nama_kecamatan']?>"></td>
                            <td><?=$row['lat']?><input type = "hidden" name = "lat" value = "'. $row['lat'] .'"></td>
                            <td><?=$row['lng']?><input type = "hidden" name = "long" value = "'. $row['lng'] .'"></td>
                            <td><button type="button" class="btn btn-primary glyphicon glyphicon-edit" data-toggle="modal" data-target="#Update<?=$i?>"></button></td>
                            <td><button class='btn btn-danger glyphicon glyphicon-trash' type="button" data-toggle="modal" data-target="#Delete<?=$i?>"></button></td>
                        </tr>

                    <!-- Modal Update-->
                    <div class="modal fade" id="Update<?=$i?>" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="myModalLabel">Edit Data Kecamatan</h4>
                                </div>
                                <div class="modal-body">
                                    <form class="form-horizontal" action="prosesEditKecamatan.php" method="post">
                                        <input type="hidden" name="id_kecamatan" class="form-control" value="<?=$row['id_kecamatan']?>"/>
                                        <div class="form-group">
                                            <label for="nama_kecamatan" class="control-label">Nama Kecamatan</label>
                                            <input type="text" name="nama_kecamatan" class="form-control" value="<?=$row['nama_kecamatan']?>"/>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="lat" class="control-label">Latitude</label>
                                            <input type="text" name="lat" class="form-control" value="<?=$row['lat']?>"/>
                                        </div>

                                        <div class="form-group">
                                            <label for="long" class="control-label">Longitude</label>
                                            <input type="text" name="long" class="form-control" value="<?=$row['lng']?>"/>                                       
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
                                <form method="POST" action="prosesHapusKecamatan.php">
                                    <input type="hidden" name="id_kecamatan" value="<?=$row['id_kecamatan']?>">
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
            </table>
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
</body>
</html>