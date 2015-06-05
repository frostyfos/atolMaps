<!doctype html>
<?php 
    session_start(); 
    $path = $_SERVER['DOCUMENT_ROOT'];
    $path .= "/atolMaps/program/lib_func.php";
    include_once($path);
?>

<html>
<head>
    <meta charset="utf-8">
    <title>Sign Up</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap core CSS -->
    <link href="/atolMaps/program/css/bootstrap.css" rel="stylesheet">
    <!-- custom css -->
    <link href="/atolMaps/program/css/custom.css" rel="stylesheet">
    <link href="/broto/css/datepicker.css" rel="stylesheet">
</head>

<body>
<div class="container">
    <!-- header -->
    <!-- disini konten  -->
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
    <script src="/atolMaps/program/js/jquery-1.11.3.min.js"></script>
    <script src="/atolMaps/program/js/bootstrap.js"></script>
    <script src="/atolMaps/program/js/bootstrap-datepicker.js"></script>

    <script>
            $('.input-group.date #ttl').datepicker({});

    </script>
</body>
</html>