
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
                        <li><a href="/broto/logout.php">Logout</a></li>
                    </ul>
                </div>  
            </nav>
        </div> <!-- end of header row -->
<?php
    }
?>