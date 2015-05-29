<?php 
    function formLogin(){
?>
    <div class="container">
     <div class="row">
      <!--   <img src="/broto/img/logo.png" class="col-xs-offset-2 col-sm-offset-5 col-md-offset-4 col-lg-offset-5" id="login-logo"> -->
        <h1 class="text-center">LOGIN</h1>
        <form class="form-horizontal" action="/atolMaps/program/login.php" method="post">

            <div class="form-group">
                <label for="myusername" class="col-sm-4 control-label">Username</label>
                <div class="col-sm-4">
                    <input type="text" name="myusername" class="form-control" placeholder="username petugas"/>
                </div>
            </div>

            <div class="form-group">
                <label for="mypassword" class="col-sm-4 control-label">Password</label>
                <div class="col-sm-4">
                    <input type="password" name="mypassword" id="mypassword" class="form-control" placeholder="password petugas"/>
                </div>
            </div>

            <div class="form-group">
                <label for="myjabatan" class="col-sm-4 control-label">Jabatan</label>
                <div class="col-sm-4">
                    <select class="form-control" name="myjabatan" id="myjabatan">
                        <option value="admin">Admin</option>
                        <option value="pengusaha">Pengusaha</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-4 col-sm-4">
                    <button type="submit" class="btn btn-primary">Sign In</button>
                </div>
            </div>
        </form>
    </div>
</div>
<?php 
    }
 ?>

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
                         <li class="dropdown"><a href="#" data-toggle="dropdown">User<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">List Pengusaha</a></li>
                                <li><a href="#">Insert Usaha</a></li>
                            </ul>
                        </li>
                        <li class="dropdown"><a href="#" data-toggle="dropdown">Pengusaha<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="/broto/pelayan/meja.php">List Usaha</a></li>
                                <li><a href="/broto/pelayan/pesanan.php">Inert Usaha</a></li>
                            </ul>
                        </li>
                        <li class="dropdown"><a href="#" data-toggle="dropdown">Sektor<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">List Sektor</a></li>
                                <li><a href="#">Insert Sektor</a></li>
                            </ul>
                        </li>
                        <li class="dropdown"><a href="#" data-toggle="dropdown">Skala<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">List Skala</a></li>
                                <li><a href="#">Insert Skala</a></li>
                            </ul>
                        </li>
                        <li class="dropdown"><a href="#" data-toggle="dropdown">Kecamatan<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="">List Kecamatan</a></li>
                                <li><a href="">Insert Kecamatan</a></li>
                            </ul>
                        </li>  
                        <li class="dropdown"><a href="#" data-toggle="dropdown">Kelurahan<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">List Kelurahan</a></li>
                                <li><a href="#">List Desa</a></li>
                            </ul>
                        </li> 
                    </ul>
                    <ul class="nav navbar-nav navbar-right" id="padding_right">
                        <li><a href="/atolMaps/program/logout.php">Logout</a></li>
                    </ul>
                </div>  
            </nav>
        </div> <!-- end of header row -->
<?php
    }
?>