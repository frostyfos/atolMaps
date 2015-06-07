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
    <title>Insert Data Usaha Baru</title>
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
    <?php 
    	nav();    
    ?>