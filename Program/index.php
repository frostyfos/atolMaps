<!doctype html>
<?php 
    session_start(); 
    $path = "lib_func.php";
    include_once($path);
    connect();
    error_reporting(0);
    //pagination
    $num_rec_per_page=5;
    if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
    $start_from = ($page-1) * $num_rec_per_page; 
	
	$id_kecamatan = $_POST['fKecamatan'];
           $sqlFilter = "SELECT lat,lng FROM kecamatan WHERE id_kecamatan = '$id_kecamatan'";
           $resultFilter = mysql_query($sqlFilter);
           $rowF = mysql_fetch_array($resultFilter);
          if (isset($_POST['filter'])) {
            $lat = $rowF['lat'];
            $lng = $rowF['lng'];
          }else {
            $lat = -6.914744;
            $lng = 107.609810;
          }
?>

<html>
<head>
    <meta charset="utf-8">
    <title>Peta Usaha Kabupaten Bandung Barat</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <!-- custom css -->
    <link href="css/custom.css" rel="stylesheet">
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAEDx3SuCm6B1iGH23GY6FKSZuS9cQUiRw">
    </script>
	<script type="text/javascript">
    //<![CDATA[
	var customIcons = {
      restaurant: {
        icon: 'http://labs.google.com/ridefinder/images/mm_20_blue.png'
      },
      bar: {
        icon: 'http://labs.google.com/ridefinder/images/mm_20_red.png'
      }
    };

    function load() {
      var map = new google.maps.Map(document.getElementById("map"), {
        center: new google.maps.LatLng(<?=$lat?>, <?=$lng?>),
        zoom: 13,
        mapTypeId: 'roadmap'
      });
      var infoWindow = new google.maps.InfoWindow;

      // Change this depending on the name of your PHP file
      downloadUrl("xmlMarker.php", function(data) {
        var xml = data.responseXML;
        var markers = xml.documentElement.getElementsByTagName("marker");
        for (var i = 0; i < markers.length; i++) {
          var name = markers[i].getAttribute("name");
          var address = markers[i].getAttribute("address");
          var point = new google.maps.LatLng(
              parseFloat(markers[i].getAttribute("lat")),
              parseFloat(markers[i].getAttribute("lng")));
          var html = "<b>" + name + "</b> <br/>" + address;
          var icon = customIcons[name] || {};
          var marker = new google.maps.Marker({
            map: map,
            position: point,
            icon: icon.icon
          });
          bindInfoWindow(marker, map, infoWindow, html);
        }
      });
    }

    function bindInfoWindow(marker, map, infoWindow, html) {
      google.maps.event.addListener(marker, 'click', function() {
        infoWindow.setContent(html);
        infoWindow.open(map, marker);
      });
    }

    function downloadUrl(url, callback) {
      var request = window.ActiveXObject ?
          new ActiveXObject('Microsoft.XMLHTTP') :
          new XMLHttpRequest;

      request.onreadystatechange = function() {
        if (request.readyState == 4) {
          request.onreadystatechange = doNothing;
          callback(request, request.status);
        }
      };

      request.open('GET', url, true);
      request.send(null);
    }

    function doNothing() {}

    //]]>

  </script>
    
</head>

<body onload="load()">
    <h2 class="text-center">Peta Usaha Bandung Barat</h2><hr>
        <form action = "" method = "post">
            <div class="col-xs-3 col-sm-3 col-md-3 col-xs-offset-9 col-sm-offset-9">
            <div class="input-group">
                <select class="form-control" name="fKecamatan" id="fKecamatan">
                        <?php 
                            $sqlKecamatan = "SELECT  * from kecamatan ";
                            $filter = mysql_query($sqlKecamatan);  
                            while($filterKec=mysql_fetch_array($filter)){
                        ?>
                            <option value="<?php echo $filterKec['id_kecamatan']; ?>">
                                <?php  echo $filterKec['nama_kecamatan']; ?>
                            </option>';
                        <?php
                             }
                        ?>
                </select>
                <span class="input-group-btn">
                    <button type="submit" name="filter" class="btn btn-primary"><span class="glyphicon glyphicon-refresh"></span></button>
                </span>
            </div>
            </div>
        </form>
        <div class="col-sm-12 col-md-12 col-lg-12">
            <div id="map"></div>
        </div><br><br>

    <div class="container">
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- image / logo here -->
                <a href="admin.php"><img src="gambar/logo.png" id="nav-logo"></a>
            </div>
            <div class="collapse navbar-collapse" id="collapse">
                <ul class="nav navbar-nav navbar-right" id="padding_right">
                    <li>
                        <a href="signup.php">Sign Up</a>
                    </li>
                    <li>
                        <a href="formLogin.php">Login</a>
                    </li>
                </ul>
            </div>  
        </nav>
        
        <!-- disini konten  -->
        <br><br><br>
        <h2 class="text-center">.</h2><hr/><br>
        <h2 class="text-center">Daftar Usaha Bandung Barat</h2><hr/><br>
        <!-- ============================== list navigation for tabs ==================================== -->
        <ul class="nav nav-tabs">
                <li class="active"><a href="#Batujajar" data-toggle="tab">Batujajar</a></li>
                <li><a href="#Cipongkor" data-toggle="tab">Cipongkor</a></li>
                <li><a href="#Rongga" data-toggle="tab">Rongga</a></li>
                <li><a href="#Cikalongwetan" data-toggle="tab">Cikalongwetan</a></li>
                <li><a href="#Cisarua" data-toggle="tab">Cisarua</a></li>
                <li><a href="#Sindangkerta" data-toggle="tab">Sindangkerta</a></li>
                <li><a href="#Cihampelas" data-toggle="tab">Cihampelas</a></li>
                <li><a href="#Gununghalu" data-toggle="tab">Gununghalu</a></li>
                <li><a href="#Lembang" data-toggle="tab">Lembang</a></li>
                <li><a href="#Cililin" data-toggle="tab">Cililin</a></li>
                <li><a href="#Ngamprah" data-toggle="tab">Ngamprah</a></li>
                <li><a href="#Saguling" data-toggle="tab">Saguling</a></li>
                <li><a href="#Cipatat" data-toggle="tab">Cipatat</a></li>
                <li><a href="#Padalarang" data-toggle="tab">Padalarang</a></li>
                <li><a href="#Cipeundeuy" data-toggle="tab">Cipeundeuy</a></li>
                <li><a href="#Parongpong" data-toggle="tab">Parongpong</a></li>
        </ul>

        <!-- TAB CONTENT -->
        <div class="tab-content">

        <!-- Kecamatan BATUJAJAR -->
            <?php 
                $sql_usaha = "SELECT u.*,kel.nama_kelurahan,kec.nama_kecamatan,sek.sektor,ska.skala
                     FROM usaha u join kelurahan kel on u.id_kelurahan=kel.id_kelurahan
                                            join kecamatan kec on u.id_kecamatan=kec.id_kecamatan
                                            join skala_usaha ska on u.id_skala=ska.id_skala
                                            join sektor_usaha sek on u.id_sektor=sek.id_sektor
                     where kec.nama_kecamatan like 'Batujajar' LIMIT $start_from, $num_rec_per_page";
                //eksekusi query
                $query = mysql_query($sql_usaha);
                if(!$query)
                {
                    print(mysql_error());
                }
            ?>
            <div class="tab-pane active" id="Batujajar">
                <!-- tampil data -->               
                <br><br>
                <table class="table table-striped">
                    <tr>
                        <th>ID Usaha</th>
                        <th>Nama Usaha</th>
                        <th>ID Pemilik Usaha</th>
                        <th>No Telpon Usaha</th>
                        <th>Produk Utama</th>
                        <th>Sektor Usaha</th>
                        <th>Skala Usaha</th>
                        <th>Alamat</th>
                        <th>Kelurahan</th>
                        <th>Status Usaha</th>
                        <th>Gambar</th>
                    </tr>
                    <?php 
                        $i = 1;
                        while($row = mysql_fetch_array($query))
                        {
                    ?>
                            <tr>
                                <!-- <form method = "post" action = "editHapusUser.php">    -->             
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
                                <td> <?=$row['status_usaha']?></td> 
                                <td><button type="button" class="btn btn-success glyphicon glyphicon-picture" data-toggle="modal" data-target="#modalGbr1<?=$i?>"></button></td>
                                <!-- </form> -->
                            </tr>
                            <!-- modal gambar -->
                            <div class="modal fade" id="modalGbr1<?=$i?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                        $i++;
                         }
                    ?>
                </table>
                <!-- pagination -->
                <?php 
                    $sql = "SELECT * FROM usaha"; 
                    $rs_result = mysql_query($sql); //run the query
                    $total_records = mysql_num_rows($rs_result);  //count number of records
                    $total_pages = ceil($total_records / $num_rec_per_page); 
                ?>
                <nav class="col-xs-offset-5 col-sm-offset-5 col-md-offset-5 col-lg-offset-5">
                    <ul class="pagination">
                        <li>
                            <a href="index.php?page=1" aria-label="First Page">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                        <?php 
                            for ($i=1; $i<=$total_pages; $i++) { 
                        ?>
                                <li><a href="index.php?page=<?=$i?>"><?=$i?></a></li>
                        <?php
                        };
                        ?>
                        <li>
                            <a href="index.php?page=<?=$total_pages?>" aria-label="Last Page">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div> <!-- end div batujajar -->

            <!-- Kecamatan Cipongkor -->
            <?php 
                $sql_usaha = "SELECT u.*,kel.nama_kelurahan,kec.nama_kecamatan,sek.sektor,ska.skala
                     FROM usaha u join kelurahan kel on u.id_kelurahan=kel.id_kelurahan
                                            join kecamatan kec on u.id_kecamatan=kec.id_kecamatan
                                            join skala_usaha ska on u.id_skala=ska.id_skala
                                            join sektor_usaha sek on u.id_sektor=sek.id_sektor
                     where kec.nama_kecamatan like 'Cipongkor' LIMIT $start_from, $num_rec_per_page";
                //eksekusi query
                $query = mysql_query($sql_usaha);
                if(!$query)
                {
                    print(mysql_error());
                }
            ?>
            <div class="tab-pane" id="Cipongkor">
                <!-- tampil data -->               
                <br><br>
                <table class="table table-striped">
                    <tr>
                        <th>ID Usaha</th>
                        <th>Nama Usaha</th>
                        <th>ID Pemilik Usaha</th>
                        <th>No Telpon Usaha</th>
                        <th>Produk Utama</th>
                        <th>Sektor Usaha</th>
                        <th>Skala Usaha</th>
                        <th>Alamat</th>
                        <th>Kelurahan</th>
                        <th>Status Usaha</th>
                        <th>Gambar</th>
                    </tr>
                    <?php 
                        $i = 1;
                        while($row = mysql_fetch_array($query))
                        {
                    ?>
                            <tr>
                                <!-- <form method = "post" action = "editHapusUser.php">    -->             
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
                                <td> <?=$row['status_usaha']?></td> 
                                <td><button type="button" class="btn btn-success glyphicon glyphicon-picture" data-toggle="modal" data-target="#modalGbr2<?=$i?>"></button></td>
                                <!-- </form> -->
                            </tr>
                            <!-- modal gambar -->
                            <div class="modal fade" id="modalGbr2<?=$i?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                        $i++;
                         }
                    ?>
                </table>
                <!-- pagination -->
                <?php 
                    $sql = "SELECT * FROM usaha"; 
                    $rs_result = mysql_query($sql); //run the query
                    $total_records = mysql_num_rows($rs_result);  //count number of records
                    $total_pages = ceil($total_records / $num_rec_per_page); 
                ?>
                <nav class="col-xs-offset-5 col-sm-offset-5 col-md-offset-5 col-lg-offset-5">
                    <ul class="pagination">
                        <li>
                            <a href="index.php?page=1" aria-label="First Page">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                        <?php 
                            for ($i=1; $i<=$total_pages; $i++) { 
                        ?>
                                <li><a href="index.php?page=<?=$i?>"><?=$i?></a></li>
                        <?php
                        };
                        ?>
                        <li>
                            <a href="index.php?page=<?=$total_pages?>" aria-label="Last Page">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div> <!-- end div Cipongkor -->

            <!-- Kecamatan Rongga -->
            <?php 
                $sql_usaha = "SELECT u.*,kel.nama_kelurahan,kec.nama_kecamatan,sek.sektor,ska.skala
                     FROM usaha u join kelurahan kel on u.id_kelurahan=kel.id_kelurahan
                                            join kecamatan kec on u.id_kecamatan=kec.id_kecamatan
                                            join skala_usaha ska on u.id_skala=ska.id_skala
                                            join sektor_usaha sek on u.id_sektor=sek.id_sektor
                     where kec.nama_kecamatan like 'Rongga' LIMIT $start_from, $num_rec_per_page";
                //eksekusi query
                $query = mysql_query($sql_usaha);
                if(!$query)
                {
                    print(mysql_error());
                }
            ?>
            <div class="tab-pane" id="Rongga">
                <!-- tampil data -->               
                <br><br>
                <table class="table table-striped">
                    <tr>
                        <th>ID Usaha</th>
                        <th>Nama Usaha</th>
                        <th>ID Pemilik Usaha</th>
                        <th>No Telpon Usaha</th>
                        <th>Produk Utama</th>
                        <th>Sektor Usaha</th>
                        <th>Skala Usaha</th>
                        <th>Alamat</th>
                        <th>Kelurahan</th>
                        <th>Status Usaha</th>
                        <th>Gambar</th>
                    </tr>
                    <?php 
                        $i = 1;
                        while($row = mysql_fetch_array($query))
                        {
                    ?>
                            <tr>
                                <!-- <form method = "post" action = "editHapusUser.php">    -->             
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
                                <td> <?=$row['status_usaha']?></td> 
                                <td><button type="button" class="btn btn-success glyphicon glyphicon-picture" data-toggle="modal" data-target="#modalGbr3<?=$i?>"></button></td>
                                <!-- </form> -->
                            </tr>
                            <!-- modal gambar -->
                            <div class="modal fade" id="modalGbr3<?=$i?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                        $i++;
                         }
                    ?>
                </table>
                <!-- pagination -->
                <?php 
                    $sql = "SELECT * FROM usaha"; 
                    $rs_result = mysql_query($sql); //run the query
                    $total_records = mysql_num_rows($rs_result);  //count number of records
                    $total_pages = ceil($total_records / $num_rec_per_page); 
                ?>
                <nav class="col-xs-offset-5 col-sm-offset-5 col-md-offset-5 col-lg-offset-5">
                    <ul class="pagination">
                        <li>
                            <a href="index.php?page=1" aria-label="First Page">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                        <?php 
                            for ($i=1; $i<=$total_pages; $i++) { 
                        ?>
                                <li><a href="index.php?page=<?=$i?>"><?=$i?></a></li>
                        <?php
                        };
                        ?>
                        <li>
                            <a href="index.php?page=<?=$total_pages?>" aria-label="Last Page">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div> <!-- end div Rongga -->

            <!-- Kecamatan Cikalongwetan -->
            <?php 
                $sql_usaha = "SELECT u.*,kel.nama_kelurahan,kec.nama_kecamatan,sek.sektor,ska.skala
                     FROM usaha u join kelurahan kel on u.id_kelurahan=kel.id_kelurahan
                                            join kecamatan kec on u.id_kecamatan=kec.id_kecamatan
                                            join skala_usaha ska on u.id_skala=ska.id_skala
                                            join sektor_usaha sek on u.id_sektor=sek.id_sektor
                     where kec.nama_kecamatan like 'Cikalongwetan' LIMIT $start_from, $num_rec_per_page";
                //eksekusi query
                $query = mysql_query($sql_usaha);
                if(!$query)
                {
                    print(mysql_error());
                }
            ?>
            <div class="tab-pane" id="Cikalongwetan">
                <!-- tampil data -->               
                <br><br>
                <table class="table table-striped">
                    <tr>
                        <th>ID Usaha</th>
                        <th>Nama Usaha</th>
                        <th>ID Pemilik Usaha</th>
                        <th>No Telpon Usaha</th>
                        <th>Produk Utama</th>
                        <th>Sektor Usaha</th>
                        <th>Skala Usaha</th>
                        <th>Alamat</th>
                        <th>Kelurahan</th>
                        <th>Status Usaha</th>
                        <th>Gambar</th>
                    </tr>
                    <?php 
                        $i = 1;
                        while($row = mysql_fetch_array($query))
                        {
                    ?>
                            <tr>
                                <!-- <form method = "post" action = "editHapusUser.php">    -->             
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
                                <td> <?=$row['status_usaha']?></td> 
                                <td><button type="button" class="btn btn-success glyphicon glyphicon-picture" data-toggle="modal" data-target="#modalGbr4<?=$i?>"></button></td>
                                <!-- </form> -->
                            </tr>
                            <!-- modal gambar -->
                            <div class="modal fade" id="modalGbr4<?=$i?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                        $i++;
                         }
                    ?>
                </table>
                <!-- pagination -->
                <?php 
                    $sql = "SELECT * FROM usaha"; 
                    $rs_result = mysql_query($sql); //run the query
                    $total_records = mysql_num_rows($rs_result);  //count number of records
                    $total_pages = ceil($total_records / $num_rec_per_page); 
                ?>
                <nav class="col-xs-offset-5 col-sm-offset-5 col-md-offset-5 col-lg-offset-5">
                    <ul class="pagination">
                        <li>
                            <a href="index.php?page=1" aria-label="First Page">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                        <?php 
                            for ($i=1; $i<=$total_pages; $i++) { 
                        ?>
                                <li><a href="index.php?page=<?=$i?>"><?=$i?></a></li>
                        <?php
                        };
                        ?>
                        <li>
                            <a href="index.php?page=<?=$total_pages?>" aria-label="Last Page">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div> <!-- end div Cikalongwetan -->

            <!-- Kecamatan Cisarua -->
            <?php 
                $sql_usaha = "SELECT u.*,kel.nama_kelurahan,kec.nama_kecamatan,sek.sektor,ska.skala
                     FROM usaha u join kelurahan kel on u.id_kelurahan=kel.id_kelurahan
                                            join kecamatan kec on u.id_kecamatan=kec.id_kecamatan
                                            join skala_usaha ska on u.id_skala=ska.id_skala
                                            join sektor_usaha sek on u.id_sektor=sek.id_sektor
                     where kec.nama_kecamatan like 'Cisarua' LIMIT $start_from, $num_rec_per_page";
                //eksekusi query
                $query = mysql_query($sql_usaha);
                if(!$query)
                {
                    print(mysql_error());
                }
            ?>
            <div class="tab-pane" id="Cisarua">
                <!-- tampil data -->               
                <br><br>
                <table class="table table-striped">
                    <tr>
                        <th>ID Usaha</th>
                        <th>Nama Usaha</th>
                        <th>ID Pemilik Usaha</th>
                        <th>No Telpon Usaha</th>
                        <th>Produk Utama</th>
                        <th>Sektor Usaha</th>
                        <th>Skala Usaha</th>
                        <th>Alamat</th>
                        <th>Kelurahan</th>
                        <th>Status Usaha</th>
                        <th>Gambar</th>
                    </tr>
                    <?php 
                        $i = 1;
                        while($row = mysql_fetch_array($query))
                        {
                    ?>
                            <tr>
                                <!-- <form method = "post" action = "editHapusUser.php">    -->             
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
                                <td> <?=$row['status_usaha']?></td> 
                                <td><button type="button" class="btn btn-success glyphicon glyphicon-picture" data-toggle="modal" data-target="#modalGbr5<?=$i?>"></button></td>
                                <!-- </form> -->
                            </tr>
                            <!-- modal gambar -->
                            <div class="modal fade" id="modalGbr5<?=$i?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                        $i++;
                         }
                    ?>
                </table>
                <!-- pagination -->
                <?php 
                    $sql = "SELECT * FROM usaha"; 
                    $rs_result = mysql_query($sql); //run the query
                    $total_records = mysql_num_rows($rs_result);  //count number of records
                    $total_pages = ceil($total_records / $num_rec_per_page); 
                ?>
                <nav class="col-xs-offset-5 col-sm-offset-5 col-md-offset-5 col-lg-offset-5">
                    <ul class="pagination">
                        <li>
                            <a href="index.php?page=1" aria-label="First Page">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                        <?php 
                            for ($i=1; $i<=$total_pages; $i++) { 
                        ?>
                                <li><a href="index.php?page=<?=$i?>"><?=$i?></a></li>
                        <?php
                        };
                        ?>
                        <li>
                            <a href="index.php?page=<?=$total_pages?>" aria-label="Last Page">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div> <!-- end div Cisarua -->

            <!-- Kecamatan Sindangkerta -->
            <?php 
                $sql_usaha = "SELECT u.*,kel.nama_kelurahan,kec.nama_kecamatan,sek.sektor,ska.skala
                     FROM usaha u join kelurahan kel on u.id_kelurahan=kel.id_kelurahan
                                            join kecamatan kec on u.id_kecamatan=kec.id_kecamatan
                                            join skala_usaha ska on u.id_skala=ska.id_skala
                                            join sektor_usaha sek on u.id_sektor=sek.id_sektor
                     where kec.nama_kecamatan like 'Sindangkerta' LIMIT $start_from, $num_rec_per_page";
                //eksekusi query
                $query = mysql_query($sql_usaha);
                if(!$query)
                {
                    print(mysql_error());
                }
            ?>
            <div class="tab-pane" id="Sindangkerta">
                <!-- tampil data -->               
                <br><br>
                <table class="table table-striped">
                    <tr>
                        <th>ID Usaha</th>
                        <th>Nama Usaha</th>
                        <th>ID Pemilik Usaha</th>
                        <th>No Telpon Usaha</th>
                        <th>Produk Utama</th>
                        <th>Sektor Usaha</th>
                        <th>Skala Usaha</th>
                        <th>Alamat</th>
                        <th>Kelurahan</th>
                        <th>Status Usaha</th>
                        <th>Gambar</th>
                    </tr>
                    <?php 
                        $i = 1;
                        while($row = mysql_fetch_array($query))
                        {
                    ?>
                            <tr>
                                <!-- <form method = "post" action = "editHapusUser.php">    -->             
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
                                <td> <?=$row['status_usaha']?></td> 
                                <td><button type="button" class="btn btn-success glyphicon glyphicon-picture" data-toggle="modal" data-target="#modalGbr6<?=$i?>"></button></td>
                                <!-- </form> -->
                            </tr>
                            <!-- modal gambar -->
                            <div class="modal fade" id="modalGbr6<?=$i?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                        $i++;
                         }
                    ?>
                </table>
                <!-- pagination -->
                <?php 
                    $sql = "SELECT * FROM usaha"; 
                    $rs_result = mysql_query($sql); //run the query
                    $total_records = mysql_num_rows($rs_result);  //count number of records
                    $total_pages = ceil($total_records / $num_rec_per_page); 
                ?>
                <nav class="col-xs-offset-5 col-sm-offset-5 col-md-offset-5 col-lg-offset-5">
                    <ul class="pagination">
                        <li>
                            <a href="index.php?page=1" aria-label="First Page">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                        <?php 
                            for ($i=1; $i<=$total_pages; $i++) { 
                        ?>
                                <li><a href="index.php?page=<?=$i?>"><?=$i?></a></li>
                        <?php
                        };
                        ?>
                        <li>
                            <a href="index.php?page=<?=$total_pages?>" aria-label="Last Page">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div> <!-- end div Sindangkerta -->

            <!-- Kecamatan Cihampelas -->
            <?php 
                $sql_usaha = "SELECT u.*,kel.nama_kelurahan,kec.nama_kecamatan,sek.sektor,ska.skala
                     FROM usaha u join kelurahan kel on u.id_kelurahan=kel.id_kelurahan
                                            join kecamatan kec on u.id_kecamatan=kec.id_kecamatan
                                            join skala_usaha ska on u.id_skala=ska.id_skala
                                            join sektor_usaha sek on u.id_sektor=sek.id_sektor
                     where kec.nama_kecamatan like 'Cihampelas' LIMIT $start_from, $num_rec_per_page";
                //eksekusi query
                $query = mysql_query($sql_usaha);
                if(!$query)
                {
                    print(mysql_error());
                }
            ?>
            <div class="tab-pane" id="Cihampelas">
                <!-- tampil data -->               
                <br><br>
                <table class="table table-striped">
                    <tr>
                        <th>ID Usaha</th>
                        <th>Nama Usaha</th>
                        <th>ID Pemilik Usaha</th>
                        <th>No Telpon Usaha</th>
                        <th>Produk Utama</th>
                        <th>Sektor Usaha</th>
                        <th>Skala Usaha</th>
                        <th>Alamat</th>
                        <th>Kelurahan</th>
                        <th>Status Usaha</th>
                        <th>Gambar</th>
                    </tr>
                    <?php 
                        $i = 1;
                        while($row = mysql_fetch_array($query))
                        {
                    ?>
                            <tr>
                                <!-- <form method = "post" action = "editHapusUser.php">    -->             
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
                                <td> <?=$row['status_usaha']?></td> 
                                <td><button type="button" class="btn btn-success glyphicon glyphicon-picture" data-toggle="modal" data-target="#modalGbr7<?=$i?>"></button></td>
                                <!-- </form> -->
                            </tr>
                            <!-- modal gambar -->
                            <div class="modal fade" id="modalGbr7<?=$i?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                        $i++;
                         }
                    ?>
                </table>
                <!-- pagination -->
                <?php 
                    $sql = "SELECT * FROM usaha"; 
                    $rs_result = mysql_query($sql); //run the query
                    $total_records = mysql_num_rows($rs_result);  //count number of records
                    $total_pages = ceil($total_records / $num_rec_per_page); 
                ?>
                <nav class="col-xs-offset-5 col-sm-offset-5 col-md-offset-5 col-lg-offset-5">
                    <ul class="pagination">
                        <li>
                            <a href="index.php?page=1" aria-label="First Page">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                        <?php 
                            for ($i=1; $i<=$total_pages; $i++) { 
                        ?>
                                <li><a href="index.php?page=<?=$i?>"><?=$i?></a></li>
                        <?php
                        };
                        ?>
                        <li>
                            <a href="index.php?page=<?=$total_pages?>" aria-label="Last Page">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div> <!-- end div Cihampelas -->

            <!-- Kecamatan Gununghalu -->
            <?php 
                $sql_usaha = "SELECT u.*,kel.nama_kelurahan,kec.nama_kecamatan,sek.sektor,ska.skala
                     FROM usaha u join kelurahan kel on u.id_kelurahan=kel.id_kelurahan
                                            join kecamatan kec on u.id_kecamatan=kec.id_kecamatan
                                            join skala_usaha ska on u.id_skala=ska.id_skala
                                            join sektor_usaha sek on u.id_sektor=sek.id_sektor
                     where kec.nama_kecamatan like 'Gununghalu' LIMIT $start_from, $num_rec_per_page";
                //eksekusi query
                $query = mysql_query($sql_usaha);
                if(!$query)
                {
                    print(mysql_error());
                }
            ?>
            <div class="tab-pane" id="Gununghalu">
                <!-- tampil data -->               
                <br><br>
                <table class="table table-striped">
                    <tr>
                        <th>ID Usaha</th>
                        <th>Nama Usaha</th>
                        <th>ID Pemilik Usaha</th>
                        <th>No Telpon Usaha</th>
                        <th>Produk Utama</th>
                        <th>Sektor Usaha</th>
                        <th>Skala Usaha</th>
                        <th>Alamat</th>
                        <th>Kelurahan</th>
                        <th>Status Usaha</th>
                        <th>Gambar</th>
                    </tr>
                    <?php 
                        $i = 1;
                        while($row = mysql_fetch_array($query))
                        {
                    ?>
                            <tr>
                                <!-- <form method = "post" action = "editHapusUser.php">    -->             
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
                                <td> <?=$row['status_usaha']?></td> 
                                <td><button type="button" class="btn btn-success glyphicon glyphicon-picture" data-toggle="modal" data-target="#modalGbr8<?=$i?>"></button></td>
                                <!-- </form> -->
                            </tr>
                            <!-- modal gambar -->
                            <div class="modal fade" id="modalGbr8<?=$i?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                        $i++;
                         }
                    ?>
                </table>
                <!-- pagination -->
                <?php 
                    $sql = "SELECT * FROM usaha"; 
                    $rs_result = mysql_query($sql); //run the query
                    $total_records = mysql_num_rows($rs_result);  //count number of records
                    $total_pages = ceil($total_records / $num_rec_per_page); 
                ?>
                <nav class="col-xs-offset-5 col-sm-offset-5 col-md-offset-5 col-lg-offset-5">
                    <ul class="pagination">
                        <li>
                            <a href="index.php?page=1" aria-label="First Page">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                        <?php 
                            for ($i=1; $i<=$total_pages; $i++) { 
                        ?>
                                <li><a href="index.php?page=<?=$i?>"><?=$i?></a></li>
                        <?php
                        };
                        ?>
                        <li>
                            <a href="index.php?page=<?=$total_pages?>" aria-label="Last Page">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div> <!-- end div Gununghalu -->

            <!-- Kecamatan Lembang -->
            <?php 
                $sql_usaha = "SELECT u.*,kel.nama_kelurahan,kec.nama_kecamatan,sek.sektor,ska.skala
                     FROM usaha u join kelurahan kel on u.id_kelurahan=kel.id_kelurahan
                                            join kecamatan kec on u.id_kecamatan=kec.id_kecamatan
                                            join skala_usaha ska on u.id_skala=ska.id_skala
                                            join sektor_usaha sek on u.id_sektor=sek.id_sektor
                     where kec.nama_kecamatan like 'Lembang' LIMIT $start_from, $num_rec_per_page";
                //eksekusi query
                $query = mysql_query($sql_usaha);
                if(!$query)
                {
                    print(mysql_error());
                }
            ?>
            <div class="tab-pane" id="Lembang">
                <!-- tampil data -->               
                <br><br>
                <table class="table table-striped">
                    <tr>
                        <th>ID Usaha</th>
                        <th>Nama Usaha</th>
                        <th>ID Pemilik Usaha</th>
                        <th>No Telpon Usaha</th>
                        <th>Produk Utama</th>
                        <th>Sektor Usaha</th>
                        <th>Skala Usaha</th>
                        <th>Alamat</th>
                        <th>Kelurahan</th>
                        <th>Status Usaha</th>
                        <th>Gambar</th>
                    </tr>
                    <?php 
                        $i = 1;
                        while($row = mysql_fetch_array($query))
                        {
                    ?>
                            <tr>
                                <!-- <form method = "post" action = "editHapusUser.php">    -->             
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
                                <td> <?=$row['status_usaha']?></td> 
                                <td><button type="button" class="btn btn-success glyphicon glyphicon-picture" data-toggle="modal" data-target="#modalGbr9<?=$i?>"></button></td>
                                <!-- </form> -->
                            </tr>
                            <!-- modal gambar -->
                            <div class="modal fade" id="modalGbr9<?=$i?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                        $i++;
                         }
                    ?>
                </table>
                <!-- pagination -->
                <?php 
                    $sql = "SELECT * FROM usaha"; 
                    $rs_result = mysql_query($sql); //run the query
                    $total_records = mysql_num_rows($rs_result);  //count number of records
                    $total_pages = ceil($total_records / $num_rec_per_page); 
                ?>
                <nav class="col-xs-offset-5 col-sm-offset-5 col-md-offset-5 col-lg-offset-5">
                    <ul class="pagination">
                        <li>
                            <a href="index.php?page=1" aria-label="First Page">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                        <?php 
                            for ($i=1; $i<=$total_pages; $i++) { 
                        ?>
                                <li><a href="index.php?page=<?=$i?>"><?=$i?></a></li>
                        <?php
                        };
                        ?>
                        <li>
                            <a href="index.php?page=<?=$total_pages?>" aria-label="Last Page">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div> <!-- end div Lembang -->

            <!-- Kecamatan Cililin -->
            <?php 
                $sql_usaha = "SELECT u.*,kel.nama_kelurahan,kec.nama_kecamatan,sek.sektor,ska.skala
                     FROM usaha u join kelurahan kel on u.id_kelurahan=kel.id_kelurahan
                                            join kecamatan kec on u.id_kecamatan=kec.id_kecamatan
                                            join skala_usaha ska on u.id_skala=ska.id_skala
                                            join sektor_usaha sek on u.id_sektor=sek.id_sektor
                     where kec.nama_kecamatan like 'Cililin' LIMIT $start_from, $num_rec_per_page";
                //eksekusi query
                $query = mysql_query($sql_usaha);
                if(!$query)
                {
                    print(mysql_error());
                }
            ?>
            <div class="tab-pane" id="Cililin">
                <!-- tampil data -->               
                <br><br>
                <table class="table table-striped">
                    <tr>
                        <th>ID Usaha</th>
                        <th>Nama Usaha</th>
                        <th>ID Pemilik Usaha</th>
                        <th>No Telpon Usaha</th>
                        <th>Produk Utama</th>
                        <th>Sektor Usaha</th>
                        <th>Skala Usaha</th>
                        <th>Alamat</th>
                        <th>Kelurahan</th>
                        <th>Status Usaha</th>
                        <th>Gambar</th>
                    </tr>
                    <?php 
                        $i = 1;
                        while($row = mysql_fetch_array($query))
                        {
                    ?>
                            <tr>
                                <!-- <form method = "post" action = "editHapusUser.php">    -->             
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
                                <td> <?=$row['status_usaha']?></td> 
                                <td><button type="button" class="btn btn-success glyphicon glyphicon-picture" data-toggle="modal" data-target="#modalGbr10<?=$i?>"></button></td>
                                <!-- </form> -->
                            </tr>
                            <!-- modal gambar -->
                            <div class="modal fade" id="modalGbr10<?=$i?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                        $i++;
                         }
                    ?>
                </table>
                <!-- pagination -->
                <?php 
                    $sql = "SELECT * FROM usaha"; 
                    $rs_result = mysql_query($sql); //run the query
                    $total_records = mysql_num_rows($rs_result);  //count number of records
                    $total_pages = ceil($total_records / $num_rec_per_page); 
                ?>
                <nav class="col-xs-offset-5 col-sm-offset-5 col-md-offset-5 col-lg-offset-5">
                    <ul class="pagination">
                        <li>
                            <a href="index.php?page=1" aria-label="First Page">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                        <?php 
                            for ($i=1; $i<=$total_pages; $i++) { 
                        ?>
                                <li><a href="index.php?page=<?=$i?>"><?=$i?></a></li>
                        <?php
                        };
                        ?>
                        <li>
                            <a href="index.php?page=<?=$total_pages?>" aria-label="Last Page">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div> <!-- end div Cililin -->

            <!-- Kecamatan Ngamprah -->
            <?php 
                $sql_usaha = "SELECT u.*,kel.nama_kelurahan,kec.nama_kecamatan,sek.sektor,ska.skala
                     FROM usaha u join kelurahan kel on u.id_kelurahan=kel.id_kelurahan
                                            join kecamatan kec on u.id_kecamatan=kec.id_kecamatan
                                            join skala_usaha ska on u.id_skala=ska.id_skala
                                            join sektor_usaha sek on u.id_sektor=sek.id_sektor
                     where kec.nama_kecamatan like 'Ngamprah' LIMIT $start_from, $num_rec_per_page";
                //eksekusi query
                $query = mysql_query($sql_usaha);
                if(!$query)
                {
                    print(mysql_error());
                }
            ?>
            <div class="tab-pane" id="Ngamprah">
                <!-- tampil data -->               
                <br><br>
                <table class="table table-striped">
                    <tr>
                        <th>ID Usaha</th>
                        <th>Nama Usaha</th>
                        <th>ID Pemilik Usaha</th>
                        <th>No Telpon Usaha</th>
                        <th>Produk Utama</th>
                        <th>Sektor Usaha</th>
                        <th>Skala Usaha</th>
                        <th>Alamat</th>
                        <th>Kelurahan</th>
                        <th>Status Usaha</th>
                        <th>Gambar</th>
                    </tr>
                    <?php 
                        $i = 1;
                        while($row = mysql_fetch_array($query))
                        {
                    ?>
                            <tr>
                                <!-- <form method = "post" action = "editHapusUser.php">    -->             
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
                                <td> <?=$row['status_usaha']?></td> 
                                <td><button type="button" class="btn btn-success glyphicon glyphicon-picture" data-toggle="modal" data-target="#modalGbr11<?=$i?>"></button></td>
                                <!-- </form> -->
                            </tr>
                            <!-- modal gambar -->
                            <div class="modal fade" id="modalGbr11<?=$i?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                        $i++;
                         }
                    ?>
                </table>
                <!-- pagination -->
                <?php 
                    $sql = "SELECT * FROM usaha"; 
                    $rs_result = mysql_query($sql); //run the query
                    $total_records = mysql_num_rows($rs_result);  //count number of records
                    $total_pages = ceil($total_records / $num_rec_per_page); 
                ?>
                <nav class="col-xs-offset-5 col-sm-offset-5 col-md-offset-5 col-lg-offset-5">
                    <ul class="pagination">
                        <li>
                            <a href="index.php?page=1" aria-label="First Page">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                        <?php 
                            for ($i=1; $i<=$total_pages; $i++) { 
                        ?>
                                <li><a href="index.php?page=<?=$i?>"><?=$i?></a></li>
                        <?php
                        };
                        ?>
                        <li>
                            <a href="index.php?page=<?=$total_pages?>" aria-label="Last Page">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div> <!-- end div Ngamprah -->

            <!-- Kecamatan Saguling -->
            <?php 
                $sql_usaha = "SELECT u.*,kel.nama_kelurahan,kec.nama_kecamatan,sek.sektor,ska.skala
                     FROM usaha u join kelurahan kel on u.id_kelurahan=kel.id_kelurahan
                                            join kecamatan kec on u.id_kecamatan=kec.id_kecamatan
                                            join skala_usaha ska on u.id_skala=ska.id_skala
                                            join sektor_usaha sek on u.id_sektor=sek.id_sektor
                     where kec.nama_kecamatan like 'Saguling' LIMIT $start_from, $num_rec_per_page";
                //eksekusi query
                $query = mysql_query($sql_usaha);
                if(!$query)
                {
                    print(mysql_error());
                }
            ?>
            <div class="tab-pane" id="Saguling">
                <!-- tampil data -->               
                <br><br>
                <table class="table table-striped">
                    <tr>
                        <th>ID Usaha</th>
                        <th>Nama Usaha</th>
                        <th>ID Pemilik Usaha</th>
                        <th>No Telpon Usaha</th>
                        <th>Produk Utama</th>
                        <th>Sektor Usaha</th>
                        <th>Skala Usaha</th>
                        <th>Alamat</th>
                        <th>Kelurahan</th>
                        <th>Status Usaha</th>
                        <th>Gambar</th>
                    </tr>
                    <?php 
                        $i = 1;
                        while($row = mysql_fetch_array($query))
                        {
                    ?>
                            <tr>
                                <!-- <form method = "post" action = "editHapusUser.php">    -->             
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
                                <td> <?=$row['status_usaha']?></td> 
                                <td><button type="button" class="btn btn-success glyphicon glyphicon-picture" data-toggle="modal" data-target="#modalGbr12<?=$i?>"></button></td>
                                <!-- </form> -->
                            </tr>
                            <!-- modal gambar -->
                            <div class="modal fade" id="modalGbr12<?=$i?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                        $i++;
                         }
                    ?>
                </table>
                <!-- pagination -->
                <?php 
                    $sql = "SELECT * FROM usaha"; 
                    $rs_result = mysql_query($sql); //run the query
                    $total_records = mysql_num_rows($rs_result);  //count number of records
                    $total_pages = ceil($total_records / $num_rec_per_page); 
                ?>
                <nav class="col-xs-offset-5 col-sm-offset-5 col-md-offset-5 col-lg-offset-5">
                    <ul class="pagination">
                        <li>
                            <a href="index.php?page=1" aria-label="First Page">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                        <?php 
                            for ($i=1; $i<=$total_pages; $i++) { 
                        ?>
                                <li><a href="index.php?page=<?=$i?>"><?=$i?></a></li>
                        <?php
                        };
                        ?>
                        <li>
                            <a href="index.php?page=<?=$total_pages?>" aria-label="Last Page">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div> <!-- end div Saguling -->

            <!-- Kecamatan Cipatat -->
            <?php 
                $sql_usaha = "SELECT u.*,kel.nama_kelurahan,kec.nama_kecamatan,sek.sektor,ska.skala
                     FROM usaha u join kelurahan kel on u.id_kelurahan=kel.id_kelurahan
                                            join kecamatan kec on u.id_kecamatan=kec.id_kecamatan
                                            join skala_usaha ska on u.id_skala=ska.id_skala
                                            join sektor_usaha sek on u.id_sektor=sek.id_sektor
                     where kec.nama_kecamatan like 'Cipatat' LIMIT $start_from, $num_rec_per_page";
                //eksekusi query
                $query = mysql_query($sql_usaha);
                if(!$query)
                {
                    print(mysql_error());
                }
            ?>
            <div class="tab-pane" id="Cipatat">
                <!-- tampil data -->               
                <br><br>
                <table class="table table-striped">
                    <tr>
                        <th>ID Usaha</th>
                        <th>Nama Usaha</th>
                        <th>ID Pemilik Usaha</th>
                        <th>No Telpon Usaha</th>
                        <th>Produk Utama</th>
                        <th>Sektor Usaha</th>
                        <th>Skala Usaha</th>
                        <th>Alamat</th>
                        <th>Kelurahan</th>
                        <th>Status Usaha</th>
                        <th>Gambar</th>
                    </tr>
                    <?php 
                        $i = 1;
                        while($row = mysql_fetch_array($query))
                        {
                    ?>
                            <tr>
                                <!-- <form method = "post" action = "editHapusUser.php">    -->             
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
                                <td> <?=$row['status_usaha']?></td> 
                                <td><button type="button" class="btn btn-success glyphicon glyphicon-picture" data-toggle="modal" data-target="#modalGbr13<?=$i?>"></button></td>
                                <!-- </form> -->
                            </tr>
                            <!-- modal gambar -->
                            <div class="modal fade" id="modalGbr13<?=$i?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                        $i++;
                         }
                    ?>
                </table>
                <!-- pagination -->
                <?php 
                    $sql = "SELECT * FROM usaha"; 
                    $rs_result = mysql_query($sql); //run the query
                    $total_records = mysql_num_rows($rs_result);  //count number of records
                    $total_pages = ceil($total_records / $num_rec_per_page); 
                ?>
                <nav class="col-xs-offset-5 col-sm-offset-5 col-md-offset-5 col-lg-offset-5">
                    <ul class="pagination">
                        <li>
                            <a href="index.php?page=1" aria-label="First Page">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                        <?php 
                            for ($i=1; $i<=$total_pages; $i++) { 
                        ?>
                                <li><a href="index.php?page=<?=$i?>"><?=$i?></a></li>
                        <?php
                        };
                        ?>
                        <li>
                            <a href="index.php?page=<?=$total_pages?>" aria-label="Last Page">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div> <!-- end div Cipatat -->

            <!-- Kecamatan Padalarang -->
            <?php 
                $sql_usaha = "SELECT u.*,kel.nama_kelurahan,kec.nama_kecamatan,sek.sektor,ska.skala
                     FROM usaha u join kelurahan kel on u.id_kelurahan=kel.id_kelurahan
                                            join kecamatan kec on u.id_kecamatan=kec.id_kecamatan
                                            join skala_usaha ska on u.id_skala=ska.id_skala
                                            join sektor_usaha sek on u.id_sektor=sek.id_sektor
                     where kec.nama_kecamatan like 'Padalarang' LIMIT $start_from, $num_rec_per_page";
                //eksekusi query
                $query = mysql_query($sql_usaha);
                if(!$query)
                {
                    print(mysql_error());
                }
            ?>
            <div class="tab-pane" id="Padalarang">
                <!-- tampil data -->               
                <br><br>
                <table class="table table-striped">
                    <tr>
                        <th>ID Usaha</th>
                        <th>Nama Usaha</th>
                        <th>ID Pemilik Usaha</th>
                        <th>No Telpon Usaha</th>
                        <th>Produk Utama</th>
                        <th>Sektor Usaha</th>
                        <th>Skala Usaha</th>
                        <th>Alamat</th>
                        <th>Kelurahan</th>
                        <th>Status Usaha</th>
                        <th>Gambar</th>
                    </tr>
                    <?php 
                        $i = 1;
                        while($row = mysql_fetch_array($query))
                        {
                    ?>
                            <tr>
                                <!-- <form method = "post" action = "editHapusUser.php">    -->             
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
                                <td> <?=$row['status_usaha']?></td> 
                                <td><button type="button" class="btn btn-success glyphicon glyphicon-picture" data-toggle="modal" data-target="#modalGbr14<?=$i?>"></button></td>
                                <!-- </form> -->
                            </tr>
                            <!-- modal gambar -->
                            <div class="modal fade" id="modalGbr14<?=$i?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                        $i++;
                         }
                    ?>
                </table>
                <!-- pagination -->
                <?php 
                    $sql = "SELECT * FROM usaha"; 
                    $rs_result = mysql_query($sql); //run the query
                    $total_records = mysql_num_rows($rs_result);  //count number of records
                    $total_pages = ceil($total_records / $num_rec_per_page); 
                ?>
                <nav class="col-xs-offset-5 col-sm-offset-5 col-md-offset-5 col-lg-offset-5">
                    <ul class="pagination">
                        <li>
                            <a href="index.php?page=1" aria-label="First Page">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                        <?php 
                            for ($i=1; $i<=$total_pages; $i++) { 
                        ?>
                                <li><a href="index.php?page=<?=$i?>"><?=$i?></a></li>
                        <?php
                        };
                        ?>
                        <li>
                            <a href="index.php?page=<?=$total_pages?>" aria-label="Last Page">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div> <!-- end div Padalarang -->

            <!-- Kecamatan Cipeundeuy -->
            <?php 
                $sql_usaha = "SELECT u.*,kel.nama_kelurahan,kec.nama_kecamatan,sek.sektor,ska.skala
                     FROM usaha u join kelurahan kel on u.id_kelurahan=kel.id_kelurahan
                                            join kecamatan kec on u.id_kecamatan=kec.id_kecamatan
                                            join skala_usaha ska on u.id_skala=ska.id_skala
                                            join sektor_usaha sek on u.id_sektor=sek.id_sektor
                     where kec.nama_kecamatan like 'Cipeundeuy' LIMIT $start_from, $num_rec_per_page";
                //eksekusi query
                $query = mysql_query($sql_usaha);
                if(!$query)
                {
                    print(mysql_error());
                }
            ?>
            <div class="tab-pane" id="Cipeundeuy">
                <!-- tampil data -->               
                <br><br>
                <table class="table table-striped">
                    <tr>
                        <th>ID Usaha</th>
                        <th>Nama Usaha</th>
                        <th>ID Pemilik Usaha</th>
                        <th>No Telpon Usaha</th>
                        <th>Produk Utama</th>
                        <th>Sektor Usaha</th>
                        <th>Skala Usaha</th>
                        <th>Alamat</th>
                        <th>Kelurahan</th>
                        <th>Status Usaha</th>
                        <th>Gambar</th>
                    </tr>
                    <?php 
                        $i = 1;
                        while($row = mysql_fetch_array($query))
                        {
                    ?>
                            <tr>
                                <!-- <form method = "post" action = "editHapusUser.php">    -->             
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
                                <td> <?=$row['status_usaha']?></td> 
                                <td><button type="button" class="btn btn-success glyphicon glyphicon-picture" data-toggle="modal" data-target="#modalGbr15<?=$i?>"></button></td>
                                <!-- </form> -->
                            </tr>
                            <!-- modal gambar -->
                            <div class="modal fade" id="modalGbr15<?=$i?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                        $i++;
                         }
                    ?>
                </table>
                <!-- pagination -->
                <?php 
                    $sql = "SELECT * FROM usaha"; 
                    $rs_result = mysql_query($sql); //run the query
                    $total_records = mysql_num_rows($rs_result);  //count number of records
                    $total_pages = ceil($total_records / $num_rec_per_page); 
                ?>
                <nav class="col-xs-offset-5 col-sm-offset-5 col-md-offset-5 col-lg-offset-5">
                    <ul class="pagination">
                        <li>
                            <a href="index.php?page=1" aria-label="First Page">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                        <?php 
                            for ($i=1; $i<=$total_pages; $i++) { 
                        ?>
                                <li><a href="index.php?page=<?=$i?>"><?=$i?></a></li>
                        <?php
                        };
                        ?>
                        <li>
                            <a href="index.php?page=<?=$total_pages?>" aria-label="Last Page">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div> <!-- end div Cipeundeuy -->

            <!-- Kecamatan Parongpong -->
            <?php 
                $sql_usaha = "SELECT u.*,kel.nama_kelurahan,kec.nama_kecamatan,sek.sektor,ska.skala
                     FROM usaha u join kelurahan kel on u.id_kelurahan=kel.id_kelurahan
                                            join kecamatan kec on u.id_kecamatan=kec.id_kecamatan
                                            join skala_usaha ska on u.id_skala=ska.id_skala
                                            join sektor_usaha sek on u.id_sektor=sek.id_sektor
                     where kec.nama_kecamatan like 'Parongpong' LIMIT $start_from, $num_rec_per_page";
                //eksekusi query
                $query = mysql_query($sql_usaha);
                if(!$query)
                {
                    print(mysql_error());
                }
            ?>
            <div class="tab-pane" id="Parongpong">
                <!-- tampil data -->               
                <br><br>
                <table class="table table-striped">
                    <tr>
                        <th>ID Usaha</th>
                        <th>Nama Usaha</th>
                        <th>ID Pemilik Usaha</th>
                        <th>No Telpon Usaha</th>
                        <th>Produk Utama</th>
                        <th>Sektor Usaha</th>
                        <th>Skala Usaha</th>
                        <th>Alamat</th>
                        <th>Kelurahan</th>
                        <th>Status Usaha</th>
                        <th>Gambar</th>
                    </tr>
                    <?php 
                        $i = 1;
                        while($row = mysql_fetch_array($query))
                        {
                    ?>
                            <tr>
                                <!-- <form method = "post" action = "editHapusUser.php">    -->             
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
                                <td> <?=$row['status_usaha']?></td> 
                                <td><button type="button" class="btn btn-success glyphicon glyphicon-picture" data-toggle="modal" data-target="#modalGbr16<?=$i?>"></button></td>
                                <!-- </form> -->
                            </tr>
                            <!-- modal gambar -->
                            <div class="modal fade" id="modalGbr16<?=$i?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                        $i++;
                         }
                    ?>
                </table>
                <!-- pagination -->
                <?php 
                    $sql = "SELECT * FROM usaha"; 
                    $rs_result = mysql_query($sql); //run the query
                    $total_records = mysql_num_rows($rs_result);  //count number of records
                    $total_pages = ceil($total_records / $num_rec_per_page); 
                ?>
                <nav class="col-xs-offset-5 col-sm-offset-5 col-md-offset-5 col-lg-offset-5">
                    <ul class="pagination">
                        <li>
                            <a href="index.php?page=1" aria-label="First Page">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                        <?php 
                            for ($i=1; $i<=$total_pages; $i++) { 
                        ?>
                                <li><a href="index.php?page=<?=$i?>"><?=$i?></a></li>
                        <?php
                        };
                        ?>
                        <li>
                            <a href="index.php?page=<?=$total_pages?>" aria-label="Last Page">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div> <!-- end div Parongpong -->
        </div>

        <!-- grafik usaha -->
        <br><br><br><h2 class="text-center">Grafik Usaha Bandung Barat</h2><hr>
        <div class="col-sm-12 col-md-12 col-lg-12">
            <canvas id="chartUsaha"></canvas>
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
    <script src="js/jquery-1.11.3.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/chart.js"></script>
    <?php 
        $sqlChart = "SELECT COUNT(nama_usaha)as jumlahUsaha FROM usaha GROUP BY id_kecamatan";
        //eksekusi query
        $query = mysql_query($sqlChart);
        if(!$query)
        {
            print(mysql_error());
        }
    ?>
    <script>
    var randomScalingFactor = function(){ return Math.round(Math.random()*100)};
    var barChartData = {
        labels : ["Batujajar","Cipongkor","Rongga","Cikalongwetan","Sindangkerta","Cisarua","Cihampelas",
                  "Gununghalu","Lembang","Cililin","Ngamprah","Cipatat","Padalarang",
                  "Cipeundeuy","Parongpong","Saguling"
                 ],
        datasets : [
            {
                fillColor : "rgb(52, 152, 219)",
                strokeColor : "rgba(220,220,220,0.8)",
                highlightFill: "rgb(52, 152, 219)",
                highlightStroke: "rgba(220,220,220,1)",
                data : [
                    <?php 
                        while($row = mysql_fetch_array($query))
                        { 
                            echo $row['jumlahUsaha'] .',';
                        }
                    ?>
                ]
            },
        ]
    }
        var ctx = document.getElementById("chartUsaha").getContext("2d");
        window.myBar = new Chart(ctx).Bar(barChartData, {
            responsive : true
        });
    </script>
</body>
</html>