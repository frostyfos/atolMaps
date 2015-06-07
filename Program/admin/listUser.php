<!doctype html>
<?php 
    session_start(); 
    $path = "../lib_func.php";
    include_once($path);
    
    connect();

    if(!isset ($_SESSION['myusername'])){
        header(("location:../formLogin.php"));
    }
    
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
                <li><a href="#dataUserAktif" data-toggle="tab"> Akun User Aktif</a></li>
                <li><a href="#dataUserNonAktif" data-toggle="tab">Akun User Tidak Aktif</a></li>
             </ul>

    <!-- TAB CONTENT -->
    <div class="tab-content">

    <!-- USER AKTIF -->
        <?php 
            $sqlUserAktif = "SELECT id_pengusaha,no_ktp,nama_pengusaha,alamat,ttl,jenis_kelamin,email,password,status_akun FROM pengusaha WHERE status_akun = 'aktif'";
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
                    while($row = mysql_fetch_array($query))
                    {
                        echo "<tr>";
                            echo '<form method = "post" action = "editHapusUser.php">';
                                
                                echo '<td>' . $row['id_pengusaha'] . '<input type = "hidden" name = "id_pengusaha" value = "'. $row['id_pengusaha'] .'"></td>';
                                echo '<td>' . $row['no_ktp'] . '<input type = "hidden" name = "noKtp" value = "'. $row['no_ktp'] .'"></td>';
                                echo '<td>' . $row['nama_pengusaha'] . '<input type = "hidden" name = "nama" value = "'. $row['nama_pengusaha'] .'"></td>';
                                echo '<td>' . $row['alamat'] . '<input type = "hidden" name = "alamat" value = "'. $row['alamat'] .'"></td>';
                                echo '<td>' . $row['ttl'] . '<input type = "hidden" name = "ttl" value = "'. $row['ttl'] .'"></td>';
                                echo '<td>' . $row['jenis_kelamin'] . '<input type = "hidden" name = "jk" value = "'. $row['jenis_kelamin'] .'"></td>';
                                echo '<td>' . $row['email'] . '<input type = "hidden" name = "email" value = "'. $row['email'] .'"></td>';
                                echo '<td>' . $row['password'] . '<input type = "hidden" name = "password" value = "'. $row['password'] .'"></td>';
                                echo '<td>' . $row['status_akun'] . '<input type = "hidden" name = "status_akun" value = "'. $row['status_akun'] .'"></td>';
                                echo '<td><input type = "submit" name = "update" value = "Update" class="btn btn-default"></td>';
                                echo '<td><input type = "submit" name = "delete" value = "delete" class="btn btn-default"></td>';
                            echo '</form>';
                        echo "</tr>";
                     }
                ?>
            </table>
        </div> <!-- end div user aktif -->
    <!-- USER AKTIF TIDAK AKTIF-->
        <?php 
            $sqlUserAktif = "SELECT id_pengusaha,no_ktp,nama_pengusaha,alamat,ttl,jenis_kelamin,email,password,status_akun FROM pengusaha WHERE status_akun = 'tidak aktif'";
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
                    while($row = mysql_fetch_array($query))
                    {
                        echo "<tr>";
                            echo '<form method = "post" action = "editHapusUser.php">';
                                echo '<td>' . $row['id_pengusaha'] . '<input type = "hidden" name = "id_pengusaha" value = "'. $row['id_pengusaha'] .'"></td>';
                                echo '<td>' . $row['no_ktp'] . '<input type = "hidden" name = "noKtp" value = "'. $row['no_ktp'] .'"></td>';
                                echo '<td>' . $row['nama_pengusaha'] . '<input type = "hidden" name = "nama" value = "'. $row['nama_pengusaha'] .'"></td>';
                                echo '<td>' . $row['alamat'] . '<input type = "hidden" name = "alamat" value = "'. $row['alamat'] .'"></td>';
                                echo '<td>' . $row['ttl'] . '<input type = "hidden" name = "ttl" value = "'. $row['ttl'] .'"></td>';
                                echo '<td>' . $row['jenis_kelamin'] . '<input type = "hidden" name = "jk" value = "'. $row['jenis_kelamin'] .'"></td>';
                                echo '<td>' . $row['email'] . '<input type = "hidden" name = "email" value = "'. $row['email'] .'"></td>';
                                echo '<td>' . $row['password'] . '<input type = "hidden" name = "password" value = "'. $row['password'] .'"></td>';
                                echo '<td>' . $row['status_akun'] . '<input type = "hidden" name = "status_akun" value = "'. $row['status_akun'] .'"></td>';
                                echo '<td><input type = "submit" name = "update" value = "Update" class="btn btn-default"></td>';
                                echo '<td><input type = "submit" name = "delete" value = "delete" class="btn btn-default"></td>';
                            echo '</form>';
                        echo "</tr>";
                     }
                ?>
            </table>
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
</body>
</html>