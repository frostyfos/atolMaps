<!doctype html>
<?php 
    session_start(); 
    $path = "../lib_func.php";
    include_once($path);
    
    connect();

    $sqlProfil = "SELECT * FROM pengusaha where id_pengusaha like ".$_POST['id_pengusaha']."";
            //eksekusi query
            $query = mysql_query($sqlProfil);
            if(!$query)
            {
                print(mysql_error());
            }
?>

<html>
<head>
    <meta charset="utf-8">
    <title>Olah data User</title>
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
                <h2 class="text-center">Edit Data Pengusaha</h2><hr/>
                <form class="form-horizontal" action="prosesEditUser.php" enctype="multipart/form-data" method="post">

                    <input type="hidden" name="id_pengusaha" class="form-control" value="'.$row['id_pengusaha'].'"/>
                    <div class="form-group">
                        <label for="email" class="col-sm-4 control-label">Email</label>
                        <div class="col-sm-5">
                            <input type="text" name="email" class="form-control" value="'.$row['email'].'"/>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="username" class="col-sm-4 control-label">Username/KTP</label>
                        <div class="col-sm-5">
                            <input type="text" name="username" class="form-control" value="'.$row['no_ktp'].'"/>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password" class="col-sm-4 control-label">Password</label>
                        <div class="col-sm-5">
                            <input type="password" name="password" class="form-control" value="'.$row['password'].'"/>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="nama" class="col-sm-4 control-label">Nama</label>
                        <div class="col-sm-5">
                            <input type="text" name="nama" class="form-control" value="'.$row['nama_pengusaha'].'"/>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="alamat" class="col-sm-4 control-label">Alamat</label>
                        <div class="col-sm-5">
                            <input type="text" name="alamat" class="form-control" value="'.$row['alamat'].'"/>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="jk" class="col-sm-4 control-label">Jenis Kelamin</label>
                        <div class="col-sm-5">
                           <label class="radio-inline">
                                <input type="radio" name="jk" value="L" />Laki-laki
                           </label>
                           <label class="radio-inline">
                                <input type="radio" name="jk" value="P" />Perempuan
                           </label>
                        </div>
                    </div>

                    <div class="form-group">
                    
                        <label for="ttl" class="col-sm-4 control-label">Tanggal Lahir</label>
                        <div class="col-sm-5">
                        <div class="input-group date">
                            <input type="text" name="ttl" id ="ttl" class="form-control" value="'.$row['ttl'].'"/>
                            <span class="input-group-addon">
                                <i class="glyphicon glyphicon-th"></i>
                            </span>
                        </div>
                        </div>
                    </div>

                    <div class="form-group">
                    <label for="status_akun" class="col-sm-4 control-label">Jabatan</label>
                        <div class="col-sm-4">
                            <select class="form-control" name="status_akun">
                                <option value="aktif">Aktif</option>
                                <option value="tidak aktif">Tidak Aktif</option>
                            </select>
                        </div>
                     </div>

                    
                    <div class="form-group">
                        <label for="filektp" class="col-sm-4 control-label">Foto KTP</label>
                        <div class="col-sm-5">
                            <input type = "hidden" name = "fotoLama" value = "'. $row['file_ktp'] .'">
                            <img src="../'.$row['file_ktp'].'" alt="Smiley face" height="250" width="350""/>
                           <input type="hidden" name="MAX_FILE_SIZE" value="1000000" /><input name="userfile" type="file" />
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
            <h2 class="text-center">Hapus Data Pemilik Usaha</h2><hr/>

            <form class="form-vertical" action="prosesHapusUser.php" method="post">
                <input type = "hidden" name = "delete">
                <input type = "hidden" name = "id_pengusaha" value = "'. $_POST['id_pengusaha'] .'">
                    <table class="table">
                            <tr>
                                <th colspan = "2" class="text-center info"> INFORMASI PEMILIK USAHA</th>
                            </tr>
                            <tr>
                                <th>ID Pengusaha</th>
                                <td>'.$row['id_pengusaha'].'</td>
                            </tr>
                            <tr>
                                <th>Usernama(No KTP)</th>
                                <td>'.$row['no_ktp'].'</td>
                            </tr>
                            <tr>
                                <th>Nama </td>
                                <td>'.$row['nama_pengusaha'].'</th>
                            </tr>
                            <tr>
                                <th>Alamat Pengusaha</th>
                                <td>'.$row['alamat'].'</td>
                            </tr>
                            <tr>
                                <th>Tanggal Lahir</th>
                                <td>'.$row['ttl'].'</td>
                            </tr>
                            <tr>
                                <th>Jenis Kelamin</th>
                                <td>'.$row['jenis_kelamin'].'</td>
                            </tr>
                            <tr>
                                <th>Status Akun</th>
                                <td>'.$row['status_akun'].'</td>
                            </tr>
                            <tr>
                                <th>Foto KTP</th>
                                <td><img src="../'.$row['file_ktp'].'" alt="Smiley face" height="250" width="350""/></td>
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