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
                        <a href="admin.php"><img src="/broto/img/logo.png" id="nav-logo"></a>
                    </div>
                    <div class="collapse navbar-collapse" id="collapse">
                        <ul class="nav navbar-nav">
                             <li class="dropdown "><a href="#" data-toggle="dropdown">User<span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="listUser.php">List Pengusaha</a></li>
                                    <li><a href="InsertPengusaha.php">Insert Pemilik Usaha</a></li>
                                </ul>
                            </li>
                            <li class="dropdown"><a href="#" data-toggle="dropdown">Pengusaha<span class="caret"></span></a>
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
                                <a href="#" data-toggle="dropdown">Request Password</a>
                            </li>
                            <li>
                                <a href="#" data-toggle="dropdown">Laporan</a>
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