<!doctype html>
<?php 
    session_start(); 
    $path = "../lib_func.php";
    include_once($path);
    
    connect();

    if(!isset ($_SESSION['myusername'])){
        header(("location:../index.php.php"));
    }
    //pagination
    $num_rec_per_page=10;
    if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
    $start_from = ($page-1) * $num_rec_per_page; 
?>

<html>
<head>
	<meta charset="utf-8">
    <title>Daftar Pemilik Usaha</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.css" rel="stylesheet">
    <!-- custom css -->
    <link href="../css/custom.css" rel="stylesheet">
    <link href="../css/datepicker.css" rel="stylesheet">
</head>

<body>
<div class="container">
    <!-- header -->
    <?php 
        nav();    
    ?>

    <!-- disini konten  -->
    <h2 class="text-center">List User yang terdaftar</h2><hr/><br>
    <!-- ============================== list navigation for tabs ==================================== -->
    <ul class="nav nav-tabs">
                <li class="active"><a href="#dataUserAktif" data-toggle="tab"> Akun User Aktif</a></li>
                <li ><a href="#dataUserNonAktif" data-toggle="tab">Akun User Tidak Aktif</a></li>
             </ul>

    <!-- TAB CONTENT -->
    <div class="tab-content">

    <!-- USER AKTIF -->
        <?php 
            $sqlUserAktif = "SELECT * FROM pengusaha WHERE status_akun = 'aktif' LIMIT $start_from, $num_rec_per_page";
            //eksekusi query
            $query = mysql_query($sqlUserAktif);
            if(!$query)
            {
                print(mysql_error());
            }
        ?>
        <div class="tab-pane active" id="dataUserAktif">
            <!-- SEARCH -->
            <form action = "#" method = "post">
                <div class="col-xs-6 col-sm-6 col-md-6 col-xs-offset-6 col-sm-offset-6">
                <div class="input-group">
                  <input type="text" name="cariUser" class="form-control" placeholder="Cari data Pemilik Usaha...">
                    <span class="input-group-btn">
                        <button type="submit" class="btn btn-default">Search</button>
                    </span>
                </div>
                </div>
            </form><br>
            <!-- tampil data -->               
            <br><br>
            <table class="table table-striped">
                <tr>
                    <th>ID</th>
                    <th>No KTP</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>TTL</th>
                    <th>Jenis Kelamin</th>
                    <th>E-mail</th>
                    <th>Password</th>
                    <th>Status Akun</th>
                </tr>
                <?php 
                    $i = 1;
                    while($row = mysql_fetch_array($query))
                    {
                ?>
                        <tr>
                            <!-- <form method = "post" action = "editHapusUser.php">    -->             
                                <td><?=$row['id_pengusaha']?></td>
                                <td><?=$row['no_ktp']?></td>
                                <td><?=$row['nama_pengusaha']?></td>
                                <td><?=$row['alamat']?></td>
                                <td><?=$row['ttl']?><!-- <input type = "hidden" name = "ttl" value = "<?=$row['ttl']?>"> --></td>
                                <td><?=$row['jenis_kelamin']?></td>
                                <td><?=$row['email']?></td>
                                <td><?=$row['password']?></td>
                                <td><?=$row['status_akun']?></td>
                                <td><button type="button" class="btn btn-primary glyphicon glyphicon-edit" data-toggle="modal" data-target="#UpdateAktif<?=$i?>"></button></td>
                                <td><button class='btn btn-danger glyphicon glyphicon-trash' type="button" data-toggle="modal" data-target="#DeleteAktif<?=$i?>"></button></td>
                                <td><button class='btn btn-warning' type="button" data-toggle="modal" data-target="#Deaktifasi<?=$i?>">Deaktifasi</button></td>
                            <!-- </form> -->
                        </tr>

                        <!-- Modal Update-->
                        <div class="modal fade" id="UpdateAktif<?=$i?>" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="myModalLabel">Edit Data Pemilik Usaha</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form class="form-horizontal" action="prosesEditUser.php" enctype="multipart/form-data" method="post">
                                            <input type="hidden" name="id_pengusaha" class="form-control" value="<?=$row['id_pengusaha']?>"/>
                                            <div class="form-group">
                                                <label for="username" class="control-label">Username (No KTP)</label>
                                                <input type="text" name="username" class="form-control" value="<?=$row['no_ktp']?>"/>
                                            </div>
                                            <div class="form-group">
                                                <label for="nama_pengusaha" class="control-label">Nama Pemilik Usaha</label>
                                                <input type="text" name="nama_pengusaha" class="form-control" value="<?=$row['nama_pengusaha']?>"/>
                                            </div>
                                            <div class="form-group">
                                                <label for="alamat" class="control-label">Alamat</label>
                                                <input type="text" name="alamat" class="form-control" value="<?=$row['alamat']?>"/>
                                            </div>
                                            <div class="form-group">
                                                <label for="ttl" class="control-label">Tanggal Lahir</label>
                                                <div class="input-group date">
                                                    <input type="text" name="ttl" id ="ttl" class="form-control" value="<?=$row['ttl']?>"/>
                                                    <span class="input-group-addon">
                                                        <i class="glyphicon glyphicon-th"></i>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="jenis_kelamin" class="col-sm-4 control-label">Jenis Kelamin</label>
                                                <div class="col-sm-6">
                                                   <label class="radio-inline">
                                                        <input type="radio" name="jenis_kelamin" value="L" />Laki-laki
                                                   </label>
                                                   <label class="radio-inline">
                                                        <input type="radio" name="jenis_kelamin" value="P" />Perempuan
                                                   </label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="email" class="control-label">E - Mail</label>
                                                <input type="text" name="email" class="form-control" value="<?=$row['email']?>"/>
                                            </div>
                                            <div class="form-group">
                                                <label for="password" class="control-label">Password</label>
                                                <input type="password" name="password" class="form-control" value="<?=$row['password']?>"/>
                                            </div>
                                            <div class="form-group"><?=$row['file_ktp']?>
                                                <label for="gambarKtp" class="control-label">Foto KTP</label>
                                                    <input type="hidden" name="fotoLama" class="form-control" value="<?=$row['file_ktp']?>"/>
                                                    <img src="<?=$row['file_ktp']?>" height="100" width="100"/>
                                                    <input type="hidden" name="MAX_FILE_SIZE" value="1000000" />
                                                    <input name="gambarKtp" type="file" />
                                            </div>
                                            <div class="form-group">
                                                <label for="status_akun" class="control-label">Status Akun</label>     
                                                    <select class="form-control" name="status_akun" id="status_akun">
                                                    <option value="aktif">Aktif</option>
                                                    <option value="tidak aktif">Tidak Aktif</option>
                                                </select>
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
                        <div class="modal fade" id="DeleteAktif<?=$i?>" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="myModalLabel">Anda Yakin ingin menghapus Data?</h4>
                                    </div>
                                    <form method="POST" action="prosesHapusUser.php">
                                        <input type="hidden" name="id_pengusaha" value="<?=$row['id_pengusaha']?>">
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                            <button type="button" data-dismiss="modal" class="btn btn-default">Batal</button>
                                        </div>
                                    </form>
                                </div>                          
                            </div>
                        </div><!--  End of Modal Hapus -->

                        <!-- Modal Deaktifasi -->
                        <div class="modal fade" id="Deaktifasi<?=$i?>" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="myModalLabel">Deaktifasi User?</h4>
                                    </div>
                                    <form method="POST" action="aktifDeaktifUser.php">
                                        <input type="hidden" name="id_pengusaha" value="<?=$row['id_pengusaha']?>">
                                        <div class="modal-footer">
                                            <button type="submit" name="deaktifasi" class="btn btn-danger">Deaktifasi</button>
                                            <button type="button" data-dismiss="modal" class="btn btn-default">Batal</button>
                                        </div>
                                    </form>
                                </div>                          
                            </div>
                        </div><!--  End of Modal Deaktifasi -->
                <?php
                    $i++;
                     }
                ?>
            </table>
            <!-- pagination -->
            <?php 
                $sql = "SELECT * FROM pengusaha"; 
                $rs_result = mysql_query($sql); //run the query
                $total_records = mysql_num_rows($rs_result);  //count number of records
                $total_pages = ceil($total_records / $num_rec_per_page); 
            ?>
            <nav class="col-xs-offset-5 col-sm-offset-5 col-md-offset-5 col-lg-offset-5">
                <ul class="pagination">
                    <li>
                        <a href="listUser.php?page=1" aria-label="First Page">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                    <?php 
                        for ($i=1; $i<=$total_pages; $i++) { 
                    ?>
                            <li><a href="listUser.php?page=<?=$i?>"><?=$i?></a></li>
                    <?php
                    };
                    ?>
                    <li>
                        <a href="listUser.php?page=<?=$total_pages?>" aria-label="Last Page">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                </ul>
            </nav>
            
        </div> <!-- end div user aktif -->

    <!-- USER AKTIF TIDAK AKTIF-->
        <?php 
            $sqlUserAktif = "SELECT * FROM pengusaha WHERE status_akun = 'tidak aktif' LIMIT $start_from, $num_rec_per_page";
            //eksekusi query
            $query = mysql_query($sqlUserAktif);
            if(!$query)
            {
                print(mysql_error());
            }
        ?>
        <div class="tab-pane fade" id="dataUserNonAktif">
            <!-- SEARCH -->
            <form action = "#" method = "post">
                <div class="col-xs-6 col-sm-6 col-md-6 col-xs-offset-6 col-sm-offset-6">
                <div class="input-group">
                  <input type="text" name="cariUser" class="form-control" placeholder="Cari data...">
                    <span class="input-group-btn">
                        <button type="submit" class="btn btn-default">Search</button>
                    </span>
                </div>
                </div>
            </form><br>
            <!-- tampil data -->               
            <br><br>
            <table class="table table-striped">
                <tr>
                    <th>ID</th>
                    <th>No KTP</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>TTL</th>
                    <th>Jenis Kelamin</th>
                    <th>E-mail</th>
                    <th>Password</th>
                    <th>Status Akun</th>
                </tr>
                <?php 
                    $i = 1;
                    while($row = mysql_fetch_array($query))
                    {
                ?>
                        <tr>
                            <!-- <form method = "post" action = "editHapusUser.php">    -->             
                                <td><?=$row['id_pengusaha']?></td>
                                <td><?=$row['no_ktp']?></td>
                                <td><?=$row['nama_pengusaha']?></td>
                                <td><?=$row['alamat']?></td>
                                <td><?=$row['ttl']?><!-- <input type = "hidden" name = "ttl" value = "<?=$row['ttl']?>"> --></td>
                                <td><?=$row['jenis_kelamin']?></td>
                                <td><?=$row['email']?></td>
                                <td><?=$row['password']?></td>
                                <td><?=$row['status_akun']?></td>
                                <td><button type="button" class="btn btn-primary glyphicon glyphicon-edit" data-toggle="modal" data-target="#UpdateNonAktif<?=$i?>"></button></td>
                                <td><button class='btn btn-danger glyphicon glyphicon-trash' type="button" data-toggle="modal" data-target="#DeleteNonAktif<?=$i?>"></button></td>
                                <td><button class='btn btn-warning' type="button" data-toggle="modal" data-target="#Aktifasi<?=$i?>">Aktifasi</button></td>
                            <!-- </form> -->
                        </tr>

                         <!-- Modal Update-->
                        <div class="modal fade" id="UpdateNonAktif<?=$i?>" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="myModalLabel">Edit Data Pemilik Usaha</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form class="form-horizontal" action="prosesEditUser.php" enctype="multipart/form-data" method="post">
                                            <input type="hidden" name="id_pengusaha" class="form-control" value="<?=$row['id_pengusaha']?>"/>
                                            <div class="form-group">
                                                <label for="username" class="control-label">Username (No KTP)</label>
                                                <input type="text" name="username" class="form-control" value="<?=$row['no_ktp']?>"/>
                                            </div>
                                            <div class="form-group">
                                                <label for="nama_pengusaha" class="control-label">Nama Pemilik Usaha</label>
                                                <input type="text" name="nama_pengusaha" class="form-control" value="<?=$row['nama_pengusaha']?>"/>
                                            </div>
                                            <div class="form-group">
                                                <label for="alamat" class="control-label">Alamat</label>
                                                <input type="text" name="alamat" class="form-control" value="<?=$row['alamat']?>"/>
                                            </div>
                                            <div class="form-group">
                                                <label for="ttl" class="control-label">Tanggal Lahir</label>
                                                <div class="input-group date">
                                                    <input type="text" name="ttl" id ="ttl" class="form-control" value="<?=$row['ttl']?>"/>
                                                    <span class="input-group-addon">
                                                        <i class="glyphicon glyphicon-th"></i>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="jenis_kelamin" class="col-sm-4 control-label">Jenis Kelamin</label>
                                                <div class="col-sm-6">
                                                   <label class="radio-inline">
                                                        <input type="radio" name="jenis_kelamin" value="L" />Laki-laki
                                                   </label>
                                                   <label class="radio-inline">
                                                        <input type="radio" name="jenis_kelamin" value="P" />Perempuan
                                                   </label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="email" class="control-label">E - Mail</label>
                                                <input type="text" name="email" class="form-control" value="<?=$row['email']?>"/>
                                            </div>
                                            <div class="form-group">
                                                <label for="password" class="control-label">Password</label>
                                                <input type="password" name="password" class="form-control" value="<?=$row['password']?>"/>
                                            </div>
                                            <div class="form-group">
                                                <label for="gambarKtp" class="control-label">Foto KTP</label>
                                                    <img src="<?=$row['file_ktp']?>" height="100" width="100"/>
                                                    <input type="hidden" name="MAX_FILE_SIZE" value="1000000" />
                                                    <input name="gambarKtp" type="file" />
                                            </div>
                                            <div class="form-group">
                                                <label for="status_akun" class="control-label">Status Akun</label>     
                                                    <select class="form-control" name="status_akun" id="status_akun">
                                                    <option value="aktif">Aktif</option>
                                                    <option value="tidak aktif">Tidak Aktif</option>
                                                </select>
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
                        <div class="modal fade" id="DeleteNonAktif<?=$i?>" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="myModalLabel">Anda Yakin ingin menghapus Data?</h4>
                                    </div>
                                    <form method="POST" action="prosesHapusUser.php">
                                        <input type="hidden" name="id_pengusaha" value="<?=$row['id_pengusaha']?>">
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                            <button type="button" data-dismiss="modal" class="btn btn-default">Batal</button>
                                        </div>
                                    </form>
                                </div>                          
                            </div>
                        </div><!--  End of Modal Hapus -->

                        <!-- Modal Aktifasi -->
                        <div class="modal fade" id="Aktifasi<?=$i?>" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="myModalLabel">Aktifasi User?</h4>
                                    </div>
                                    <form method="POST" action="aktifDeaktifUser.php">
                                        <input type="hidden" name="id_pengusaha" value="<?=$row['id_pengusaha']?>">
                                        <input type="hidden" name="noKtp" value="<?=$row['no_ktp']?>">
                                        <input type="hidden" name="password" value="<?=$row['password']?>">
                                        <input type="hidden" name="email" value="<?=$row['email']?>">
                                        <div class="modal-footer">
                                            <button type="submit" name="aktifasi" class="btn btn-success">Aktifasi</button>
                                            <button type="button" data-dismiss="modal" class="btn btn-default">Batal</button>
                                        </div>
                                    </form>
                                </div>                          
                            </div>
                        </div><!--  End of Modal Aktifasi -->
                <?php
                    $i++;
                    }
                ?>
            </table>
            <!-- pagination -->
            <?php 
                $sql = "SELECT * FROM pengusaha"; 
                $rs_result = mysql_query($sql); //run the query
                $total_records = mysql_num_rows($rs_result);  //count number of records
                $total_pages = ceil($total_records / $num_rec_per_page); 
            ?>
            <nav class="col-xs-offset-5 col-sm-offset-5 col-md-offset-5 col-lg-offset-5">
                <ul class="pagination">
                    <li>
                        <a href="listUser.php?page=1" aria-label="First Page">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                    <?php 
                        for ($i=1; $i<=$total_pages; $i++) { 
                    ?>
                            <li><a href="listUser.php?page=<?=$i?>"><?=$i?></a></li>
                    <?php
                    };
                    ?>
                    <li>
                        <a href="listUser.php?page=<?=$total_pages?>" aria-label="Last Page">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
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
    <script src="../js/bootstrap-datepicker.js"></script>
    <script>
            $('.input-group.date #ttl').datepicker({});
    </script>
</html>