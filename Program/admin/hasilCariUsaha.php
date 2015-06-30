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
        <?php
            $dataCari = $_POST['dataCari'];  

            $sql_usaha = "SELECT u.*,kel.nama_kelurahan,kec.nama_kecamatan,sek.sektor,ska.skala
                 FROM usaha u join kelurahan kel on u.id_kelurahan=kel.id_kelurahan
                                        join kecamatan kec on u.id_kecamatan=kec.id_kecamatan
                                        join skala_usaha ska on u.id_skala=ska.id_skala
                                        join sektor_usaha sek on u.id_sektor=sek.id_sektor
                 WHERE u.nama_usaha LIKE '%$dataCari%' ORDER BY u.id_usaha";
            //eksekusi query
            $query = mysql_query($sql_usaha);
            if(!$query)
            {
                print(mysql_error());
            }
            $count=mysql_num_rows($query);

            if ($count == 1){
            
        ?>
            <h2 class="text-center">Hasil Pencarian Data Usaha</h2><hr/><br>
            <form action = "hasilCariUsaha.php" method = "post">
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
                    <th>ID Usaha</th>
                    <th>Nama Usaha</th>
                    <th>Id Pemilik Usaha</th>
                    <th>No Telepon Usha</th>
                    <th>Produk Utama</th>
                    <th>Sektor Usaha</th>
                    <th>Skala Usaha</th>
                    <th>Alamat</th>
                    <th>Kelurahan</th>
                    <th>Kecamatan</th>
                    <th>Status Usaha</th>
                    <th colspan = "3">Aksi</th>
                </tr>
                <?php 
                    $i = 1;
                    while($row = mysql_fetch_array($query))
                    {
                ?>
                    <tr>
                         <form method = "post" action = "editUsaha.php">
                            <input type="hidden" name="id_usaha" class="form-control" value="<?=$row['id_usaha']?>"/>
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
                            <td><button type="button" class="btn btn-success glyphicon glyphicon-picture" data-toggle="modal" data-target="#myModal<?=$i?>"></button></td>
                            <!-- <td><button type="submit" class="btn btn-primary glyphicon glyphicon-edit" data-toggle="modal" data-target="#Update<?=$i?>"></button></td> -->
                            <td><button type="submit" class="btn btn-primary glyphicon glyphicon-edit"></button></td>
                            <td><button class='btn btn-danger glyphicon glyphicon-trash' type="button" data-toggle="modal" data-target="#Delete<?=$i?>"></button></td>
                        </form>
                    </tr>
                    <!-- Button trigger modal -->
            
                    <!-- modal gambar -->
                    <div class="modal fade" id="myModal<?=$i?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Foto Usaha</h4>
                          </div>
                          <div class="modal-body">
                            <img src="<?=$row['gambar1']?>" height="200" width="200"/>
                            <img src="<?=$row['gambar2']?>" height="200" width="200"/>
                            <img src="<?=$row['gambar3']?>" height="200" width="200"/>
                            <img src="<?=$row['gambar4']?>" height="200" width="200"/>
                            <img src="<?=$row['gambar5']?>" height="200" width="200"/>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                          </div>
                        </div>
                      </div>
                    </div>

                  <!-- Modal Hapus -->
                  <div class="modal fade" id="Delete<?=$i?>" tabindex="-1" role="dialog" aria-hidden="true">
                      <div class="modal-dialog">
                          <div class="modal-content">
                              <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                  <h4 class="modal-title" id="myModalLabel">Anda Yakin ingin menghapus Data?</h4>
                              </div>
                              <form method="POST" action="prosesHapusUsaha.php">
                                  <input type="hidden" name="id_usaha" value="<?=$row['id_usaha']?>">
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
        header("location:tamoilUsahaBandung.php");
    }
    ?>
	<!-- javascript -->
    <script src="../js/jquery-1.11.3.min.js"></script>
	<script src="../js/bootstrap.js"></script>
</body>
</html>