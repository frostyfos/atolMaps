<!doctype html>
<?php
	    session_start(); 
    $path = "../lib_func.php";
    include_once($path);
    
    if(!isset ($_SESSION['myusername'])){
        header(("location:../index.php"));
    }
?>
<html>
<head>
<!-- <meta charset="utf-8">
<title>Laporan Data Usaha</title>
<script type="text/javascript" src="../jquery/jquery-ui.min.js"></script>
<script type="text/javascript" src="../jquery/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="../metro/build/js/metro.min.js"></script>
<link rel="stylesheet" href="../metro/build/css/metro.min.css">
<link rel="stylesheet" href="../jquery/jquery-ui.min.css">
<link href="../metro/build/css/metro-icons.css" rel="stylesheet">
<link rel="stylesheet" href="../css/css.css"> -->
<meta charset="utf-8">
    <title>Laporan Usaha</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap core CSS -->
    <link href="/atolMaps/program/css/bootstrap.css" rel="stylesheet">
    <!-- custom css -->
    <link href="/atolMaps/program/css/custom.css" rel="stylesheet">
    <link href="../css/datepicker.css" rel="stylesheet">
<script type="text/javascript">
	$(document).ready(function(e) {
      
		$("#kelurahan").hide();
		$("#sektor").hide();
		$("#skala").hide();
		$("#kecamatan").hide();
		
		var keyword = "";
		var kategori = "";
		
		$("#kategori").change(function(){
			$("#kategori option:selected").each(function() {
                if($(this).attr("value")=="Kecamatan")
				{
					$("#kelurahan").hide();
					$("#sektor").hide();
					$("#skala").hide();
					$("#kecamatan").show();
				}
				if($(this).attr("value")=="Semua Data")
				{
					$("#kelurahan").hide();
					$("#sektor").hide();
					$("#skala").hide();
					$("#kecamatan").hide();
				}
				if($(this).attr("value")=="Kelurahan")
				{
					$("#kecamatan").hide();
					$("#sektor").hide();
					$("#skala").hide();
					$("#kelurahan").show();
				}
				if($(this).attr("value")=="Sektor Usaha")
				{
					$("#kecamatan").hide();
					$("#sektor").show();
					$("#skala").hide();
					$("#kelurahan").hide();
				}
				if($(this).attr("value")=="Skala Usaha")
				{
					$("#kecamatan").hide();
					$("#sektor").hide();
					$("#skala").show();
					$("#kelurahan").hide();
				}
            });
		});
		
		$("#filter_map").click(function(){
			if($("#kecamatan").is(":visible"))
			{
				kategori = "kecamatan";
				keyword = $("#kecamatan").val();
			}
			if($("#kelurahan").is(":visible"))
			{
				kategori = "kelurahan";
				keyword = $("#kelurahan").val();
			}
			if($("#sektor").is(":visible"))
			{
				kategori = "sektor";
				keyword = $("#sektor").val();
			}
			if($("#skala").is(":visible"))
			{
				kategori = "skala";
				keyword = $("#skala").val();
			}
			window.location = "usaha_report_proses.php?kategori="+kategori+"&keyword="+keyword;
		});
	});	
</script>
<body>
<header>
    <!-- <div align="left" class="no-margin" style="background-color:#0072C6">
        <img src="../asset/Untitled-1.png" />   
    </div> -->
</header>
<?php
	nav();//include("menu.php");
	connect();
?>
<section>
	<h3 align="center">Laporan Data Usaha</h3>
	Filter Laporan Data Usaha Berdasarkan:<br>
	<div class="input-control select full-size">
		<select name="kategori" id="kategori">
			<option value="Semua Data">Semua Data</option>
			<option value="Kecamatan">Kecamatan</option>
			<option value="Kelurahan">Kelurahan</option>
			<option value="Sektor Usaha">Sektor Usaha</option>
			<option value="Skala Usaha">Skala Usaha</option>
		</select>
		<br>
		<select name="kelurahan" id="kelurahan">
			<?php
				connect();
				$sql = "SELECT id_kelurahan, nama FROM kelurahan ORDER BY nama";
				$query = mysql_query($sql);
				if(!$query)
				{
					echo 'Error : '.mysql_error();
				}
				while($row = mysql_fetch_array($query))
				{
					?>
						<option value="<?=$row['id_kelurahan']?>"><?=$row['nama']?></option>
					<?php
				}
			?>
		</select>
		<select name="kecamatan" id="kecamatan">
			<?php
				connect();
				$sql = "SELECT id_kecamatan, nama FROM kecamatan ORDER BY nama";
				$query = mysql_query($sql);
				if(!$query)
				{
					echo 'Error : '.mysql_error();
				}
				while($row = mysql_fetch_array($query))
				{
					?>
						<option value="<?=$row['id_kecamatan']?>"><?=$row['nama']?></option>
					<?php
				}
			?>
		</select>
		<select name="skala" id="skala">
			<?php
				connect();
				$sql = "SELECT id_skala, jenis_skala FROM skala_usaha ORDER BY jenis_skala";
				$query = mysql_query($sql);
				if(!$query)
				{
					echo 'Error : '.mysql_error();
				}
				while($row = mysql_fetch_array($query))
				{
					?>
						<option value="<?=$row['id_skala']?>"><?=$row['jenis_skala']?></option>
					<?php
				}
			?>
		</select>
		<select name="sektor" id="sektor">
			<?php
				connect();
				$sql = "SELECT id_sektor, jenis_sektor FROM sektor_usaha ORDER BY jenis_sektor";
				$query = mysql_query($sql);
				if(!$query)
				{
					echo 'Error : '.mysql_error();
				}
				while($row = mysql_fetch_array($query))
				{
					?>
						<option value="<?=$row['id_sektor']?>"><?=$row['jenis_sektor']?></option>
					<?php
				}
			?>
		</select>
	</div>
	<br><br><br>
	<div align="right">
		<button class="button" id="filter_map"><span class="mif-filter"> Filter Laporan</span></button>
	</div>
</section>
<footer>
	<?php
		footer();
	?>
</footer>
</body>
</body>
</html>
<?php
	
?>