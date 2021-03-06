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
    <title>Daftar Skala Usaha</title>
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
    
    <!-- USER AKTIF -->
        <?php 
            $dataCari = $_POST['dataCari'];
            $sqlSkala = "SELECT * FROM skala_usaha WHERE skala LIKE '%$dataCari%'";
            //eksekusi query
            $query = mysql_query($sqlSkala);
            if(!$query)
            {
                print(mysql_error());
            }
            $count=mysql_num_rows($query);

            if ($count == 1){
        ?>
            <h2 class="text-center">Hasil Pencarian Skala Usaha</h2><hr/><br>
            <!-- tampil data -->   
            <form action = "hasilCariSkala.php" method = "post">
            <div class="col-xs-6 col-sm-6 col-md-6 col-xs-offset-6 col-sm-offset-6">
            <div class="input-group">
              <input type="text" name="dataCari" class="form-control" placeholder="Cari data Skala...">
                <span class="input-group-btn">
                    <button class="btn btn-default" type="submit">Search</button>
                </span>
            </div>
            </div>
            </form><br>            
            <br><br>
            <table class="table table-striped">
                <tr>
                    <th>ID</th>
                    <th>Skala Usaha</th>
                    <th colspan="2">Aksi</th>
                </tr>
                <?php 
                    $i = 1;
                    while($row = mysql_fetch_array($query))
                    {
                ?>
                    <tr>
                        <td><?=$row['id_skala'] ?><input type = "hidden" name = "id_skala" value = "<?=$row['id_skala']?>"></td>
                        <td><?=$row['skala'] ?><input type = "hidden" name = "skala" value = "<?=$row['skala']?>"></td>
                        <td><button type="button" class="btn btn-primary glyphicon glyphicon-edit" data-toggle="modal" data-target="#Update<?=$i?>"></button></td>
                        <td><button class='btn btn-danger glyphicon glyphicon-trash' type="button" data-toggle="modal" data-target="#Delete<?=$i?>"></button></td>
                    </tr>

                    <!-- Modal Update-->
                    <div class="modal fade" id="Update<?=$i?>" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="myModalLabel">Edit Data Skala Usaha</h4>
                                </div>
                                <div class="modal-body">
                                    <form class="form-horizontal" action="prosesEditSkala.php" method="post">
                                        <input type="hidden" name="id_skala" class="form-control" value="<?=$row['id_skala']?>"/>
                                        <div class="form-group">
                                            <label for="skala" class="control-label">Skala</label>                                           
                                            <input type="text" name="skala" class="form-control" value="<?=$row['skala']?>"/>                                           
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
                                <form method="POST" action="prosesHapusSkala.php">
                                    <input type="hidden" name="id_skala" value="<?=$row['id_skala']?>">
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
    <?php 
    }else{
        print "<script>alert('Data yang anda cari tidak ditemukan');
        javascript:history.go(-1);</script>";
        exit;
        header("location:listSkala.php");
    }
    ?>
	<!-- javascript -->
    <script src="../js/jquery-1.11.3.min.js"></script>
	<script src="../js/bootstrap.js"></script>
</body>
</html>