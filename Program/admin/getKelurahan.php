<?php
	session_start(); 
    $path = "../lib_func.php";
    include_once($path);
    
    connect();

 	$id = isset($_GET['id_kecamatan']) ? intval($_GET['id_kecamatan']) : 0;
	$query = "SELECT id_kelurahan,nama_kelurahan FROM kelurahan WHERE id_kecamatan='$id'";
	$result = mysql_query($query);
	$respon = array();
	while ($hasil = mysql_fetch_array($result))
	{
    	$respon[] = $hasil;
	}
	echo json_encode($respon);
?>