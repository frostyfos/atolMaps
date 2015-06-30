<?php 
    function connect(){
        $host='localhost';
        $dbName = 'bdgmaps';
        $user = 'root';
        $pass = '';

        $link=mysql_connect($host,$user,$pass); 
        mysql_select_db($dbName,$link); 
        if(!$link) 
            echo "Error : ".mysql_error(); 
        return $link; 
    }
    
 ?>

<?php 
  function modalGambarUsaha(){
?>
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
<?php
  }  
?>

 <?php 
    // navigation
    function nav(){
        if ($_SESSION['myjabatan'] == "admin"){
  ?>             
            <div class="row">
                <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#collapse">
                            <span class="sr-only">Toggle Navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <!-- image / logo here -->
                        <a href="admin.php"><img src="../gambar/logo.png" id="nav-logo"></a>
                    </div>
                    <div class="collapse navbar-collapse" id="collapse">
                        <ul class="nav navbar-nav">
                            <li class="dropdown"><a href="#" data-toggle="dropdown">Admin<span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="listAdmin.php">List Admin</a></li>
                                    <li><a href="insertAdmin.php">Insert Admin</a></li>
                                </ul>
                            </li>
                             <li class="dropdown "><a href="#" data-toggle="dropdown">User
                                <?php connect();
                                      $result = mysql_query("SELECT COUNT(nama_pengusaha) AS jumlah FROM pengusaha WHERE status_akun LIKE 'tidak aktif' ");
                                      $jumlah = mysql_fetch_array($result);
                                      if($jumlah['jumlah'] > 0){
                                ?>         
                                     <span class="badge"><?= $jumlah['jumlah']; ?></span>
                                <?php
                                        }
                                ?>
                                
                                <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="listUser.php">List Pengusaha</a></li>
                                    <li><a href="InsertPengusaha.php">Insert Pemilik Usaha</a></li>
                                </ul>
                            </li>
                            <li class="dropdown"><a href="#" data-toggle="dropdown">Usaha<span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="tampilUsahaBandung.php">List Usaha</a></li>
                                    <li><a href="insert_usaha.php">Insert Usaha</a></li>
                                </ul>
                            </li>
                            <li class="dropdown"><a href="#" data-toggle="dropdown">Sektor<span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="listSektor.php">List Sektor</a></li>
                                    <li><a href="insertSektor.php">Insert Sektor</a></li>
                                </ul>
                            </li>
                            <li class="dropdown"><a href="#" data-toggle="dropdown">Skala<span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="listSkala.php">List Skala</a></li>
                                    <li><a href="insertSkala.php">Insert Skala</a></li>
                                </ul>
                            </li>
                            <li class="dropdown"><a href="#" data-toggle="dropdown">Kecamatan<span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="listKecamatan.php">List Kecamatan</a></li>
                                    <li><a href="insertKecamatan.php">Insert Kecamatan</a></li>
                                </ul>
                            </li>  
                            <li class="dropdown"><a href="#" data-toggle="dropdown">Kelurahan<span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="listKelurahan.php">List Kelurahan</a></li>
                                    <li><a href="insertKelurahan.php">Insert Kelurahan</a></li>
                                </ul>
                            </li> 
                            <li>
                                <a href="laporan.php" >Report</a>
                            </li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="../logout.php">Logout</a></li>
                        </ul>
                    </div>  
                </nav>
            </div> <!-- end of header row -->
<?php
        }else if($_SESSION['myjabatan'] == "pengusaha"){
?>
            <div class="row">
                <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                    <div class="navbar-header">
                         <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#collapse">
                            <span class="sr-only">Toggle Navigation</span>
                             <span class="icon-bar"></span>
                             <span class="icon-bar"></span>
                             <span class="icon-bar"></span>
                        </button>
                        <!-- image / logo here -->
                        <!-- <a href="/broto/index.php"><img src="#" id="nav-logo"></a> -->
                    </div>
                    <div class="collapse navbar-collapse" id="collapse">
                        <ul class="nav navbar-nav">
                            <li>
                                <a href="tampilUsahaBandung.php">List Usaha</a>
                            </li>
                            <li>
                                <a href="insert_usaha.php">Insert Usaha</a>
                            </li>
                            <li>
                                <a href="pengusaha.php">Usaha Anda</a>
                            </li>
                            <li>
                                <a href="profil.php">Profile</a>
                            </li>
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="../logout.php">Logout</a></li>
                        </ul>
                    </div>  
                </nav>
            </div> <!-- end of header row -->
<?php
        }
    }


?>