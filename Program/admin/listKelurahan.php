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
    <title>Daftar Kelurahan</title>
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
    <h2 class="text-center">List Kelurahan</h2><hr/><br>
    <!-- USER AKTIF -->
        <?php 
            $sqlSkala = "SELECT id_kelurahan,kecamatan.id_kecamatan AS id_kecamatan,nama_kecamatan,nama_kelurahan, 
                         kelurahan.lat AS lat, kelurahan.lng AS lng FROM kelurahan, Kecamatan 
                         WHERE Kecamatan.id_kecamatan = kelurahan.id_kecamatan ORDER BY id_kelurahan LIMIT $start_from, $num_rec_per_page";
            //eksekusi query
            $query = mysql_query($sqlSkala);
            if(!$query)
            {
                print(mysql_error());
            }

        ?>

            <form action = "hasilCariKelurahan.php" method = "post">
            <div class="col-xs-6 col-sm-6 col-md-6 col-xs-offset-6 col-sm-offset-6">
            <div class="input-group">
                <input type="text" name="dataCari" class="form-control" placeholder="Cari Nama Kelurahan...">
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
                    <th>ID Kelurahan</th>
                    <th>Nama Kecamatan</th>
                    <th>Nama Kelurahan</th>
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
                            <td><?=$row['id_kelurahan']?></td>
                            <td><?=$row['nama_kecamatan']?></td>
                            <td><?=$row['nama_kelurahan']?></td>
                            <td><?=$row['lat']?></td>
                            <td><?=$row['lng']?></td>
                            <td><button type="button" class="btn btn-primary glyphicon glyphicon-edit" data-toggle="modal" data-target="#Update<?=$i?>"></button></td>
                            <td><button class='btn btn-danger glyphicon glyphicon-trash' type="button" data-toggle="modal" data-target="#Delete<?=$i?>"></button></td>
                        </tr>

                        <!-- Modal Update-->
                        <div class="modal fade" id="Update<?=$i?>" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="myModalLabel">Edit Data Kelurahan</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form class="form-horizontal" action="prosesEditKelurahan.php" method="post" data-toggle="validator" role="form">
                                            <input type="hidden" name="id_kelurahan" class="form-control" value="<?=$row['id_kelurahan']?>"/>
                                            <div class="form-group">
                                                <label for="kecamatan" class="control-label">Kecamatan</label>        
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
                                            <div class="form-group">
                                                <label for="nama_kelurahan" class="control-label">Nama Kelurahan</label>
                                                <input type="text" name="nama_kelurahan" class="form-control" value="<?=$row['nama_kelurahan']?>" data-error="Wajib di Isi" required/>
                                                <div class="help-block with-errors"></div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="lat" class="control-label">Latitude</label>
                                                <input type="text" name="lat" class="form-control" value="<?=$row['lat']?>" data-error="Wajib di Isi" required/>
                                                <div class="help-block with-errors"></div>
                                            </div>

                                            <div class="form-group">
                                                <label for="long" class="control-label">Longitude</label>
                                                <input type="text" name="long" class="form-control" value="<?=$row['lng']?>" data-error="Wajib di Isi" required/>
                                                <div class="help-block with-errors"></div>
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
                                    <form method="POST" action="prosesHapusKelurahan.php">
                                        <input type="hidden" name="id_kelurahan" value="<?=$row['id_kelurahan']?>">
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

            <!-- pagination -->
            <?php 
                $sql = "SELECT * FROM kelurahan"; 
                $rs_result = mysql_query($sql); //run the query
                $total_records = mysql_num_rows($rs_result);  //count number of records
                $total_pages = ceil($total_records / $num_rec_per_page); 
            ?>
            <nav class="col-xs-offset-5 col-sm-offset-5 col-md-offset-5 col-lg-offset-5">
                <ul class="pagination">
                    <li>
                        <a href="listKelurahan.php?page=1" aria-label="First Page">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                    <?php 
                        for ($i=1; $i<=$total_pages; $i++) { 
                    ?>
                            <li><a href="listKelurahan.php?page=<?=$i?>"><?=$i?></a></li>
                    <?php
                    };
                    ?>
                    <li>
                        <a href="listKelurahan.php?page=<?=$total_pages?>" aria-label="Last Page">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                </ul>
            </nav>

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
    <script src="../js/validator.min.js"></script>
</body>
</html>