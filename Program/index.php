<!doctype html>
<?php 
    session_start(); 
    $path = "lib_func.php";
    include_once($path);
    
    // if(!isset ($_SESSION['myusername'])){
    //     formLogin();
    // }
    
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
</head>

<body>
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
                    <!-- <a href="#"><img src="#" id="nav-logo"></a> -->
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
        <div id="map-canvas">

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
    // <script type="text/javascript"
    //     src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAEDx3SuCm6B1iGH23GY6FKSZuS9cQUiRw">
    // </script>
    // <script type="text/javascript">
    //   function initialize() {
    //     var mapOptions = {
    //       center: { lat: -6.914744, lng: 107.609810},
    //       zoom: 13
    //     };
    //     var map = new google.maps.Map(document.getElementById('map-canvas'),
    //         mapOptions);
    //   }
    //   google.maps.event.addDomListener(window, 'load', initialize);
    // </script>
</body>
</html>