<!doctype html>
<?php 
    session_start(); 
    $path = $_SERVER['DOCUMENT_ROOT'];
    $path .= "/atolMaps/program/lib_func.php";
    include_once($path);
    
    connect();

    if(!isset ($_SESSION['myusername'])){
        header(("location:/atolMaps/program/formLogin.php"));
    }
    
?>

<html>
<head>
	<meta charset="utf-8">
    <title>Daftar Desa</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap core CSS -->
    <link href="/atolMaps/program/css/bootstrap.css" rel="stylesheet">
    <!-- custom css -->
    <link href="/atolMaps/program/css/custom.css" rel="stylesheet">
</head>

<body>
<div class="container">
    <!-- header -->
    <?php 
        nav();    
    ?>

    <!-- disini konten  -->
    <h2 class="text-center">List Desa</h2><hr/><br>
    <!-- USER AKTIF -->
        <?php 
            $sqlDesa = "SELECT * FROM kelurahan"; 
            //eksekusi query
            $query = mysql_query($sqlDesa);
            if(!$query)
            {
                print(mysql_error());
            }
        ?>
            <!-- tampil data -->               
            <br><br>
            <table class="table table-striped">
                <tr>
                    <th>ID</th>
                    <th>List Desa</th>
                </tr>
                <?php 
                    while($row = mysql_fetch_array($query))
                    {
                        echo "<tr>";
                            echo '<form method = "post" action = "#">';
                                echo '<td>' . $row['id_kelurahan'] . '<input type = "hidden" name = "id_kelurahan" value = "'. $row['id_kelurahan'] .'"></td>';
                                echo '<td>' . $row['nama_kelurahan'] . '<input type = "hidden" name = "nama_kelurahan" value = "'. $row['nama_kelurahan'] .'"></td>';
                                echo '<td><input type = "submit" name = "update" value = "Update" class="btn btn-default"></td>';
                                echo '<td><input type = "submit" name = "delete" value = "delete" class="btn btn-default"></td>';
                            echo '</form>';
                        echo "</tr>";
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
	<!-- javascript -->
    <script src="/atolMaps/program/js/jquery-1.11.3.min.js"></script>
	<script src="/atolMaps/program/js/bootstrap.js"></script>
</body>
</html>