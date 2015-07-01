<?php
	error_reporting(0);
    include("../lib_func.php");
	require_once("../PHPExcel.php");
	require_once("../PHPExcel/IOFactory.php");
	connect();
    error_reporting(0);
	// $kategori = $_GET['kategori'];
	// $keyword = $_GET['keyword'];
	
	// if($kategori == '') //kalau user milih semua data
	// 	$sql = "SELECT usaha.id_usaha AS id_usaha, usaha.nama_usaha AS nama_usaha, usaha.alamat AS alamat, produk_utama, deskripsi, usaha.lat AS lat, usaha.lng AS lng, usaha.status_aktivasi, pemilik_usaha.nama_pemilik AS nama_pemilik, usaha.id_pemilik AS id_pemilik, kecamatan.nama AS nama_kecamatan, kelurahan.nama AS nama_kelurahan, skala_usaha.jenis_skala AS jenis_skala, sektor_usaha.jenis_sektor AS jenis_sektor, no_telp
 //                FROM usaha JOIN pemilik_usaha ON pemilik_usaha.no_ktp = usaha.id_pemilik JOIN kelurahan USING(id_kelurahan) JOIN kecamatan ON kecamatan.id_kecamatan = usaha.id_kecamatan JOIN sektor_usaha USING(id_sektor) JOIN skala_usaha USING(id_skala) 
 //                ORDER BY id_usaha";
	// else //kalau user filter data berdasarkan kecamatan/kelurahan dll
	// 	$sql = "SELECT usaha.id_usaha AS id_usaha, usaha.nama_usaha AS nama_usaha, usaha.alamat AS alamat, produk_utama, deskripsi, usaha.lat AS lat, usaha.lng AS lng, usaha.status_aktivasi, pemilik_usaha.nama_pemilik AS nama_pemilik, usaha.id_pemilik AS id_pemilik, kecamatan.nama AS nama_kecamatan, kelurahan.nama AS nama_kelurahan, skala_usaha.jenis_skala AS jenis_skala, sektor_usaha.jenis_sektor AS jenis_sektor, no_telp
 //                FROM usaha JOIN pemilik_usaha ON pemilik_usaha.no_ktp = usaha.id_pemilik JOIN kelurahan USING(id_kelurahan) JOIN kecamatan ON kecamatan.id_kecamatan = usaha.id_kecamatan JOIN sektor_usaha USING(id_sektor) JOIN skala_usaha USING(id_skala) 
 //                WHERE usaha.id_$kategori = '$keyword' ORDER BY id_usaha";
	//echo $sql;
	$selectSql= "SELECT usaha.id_usaha AS id_usaha, usaha.nama_usaha AS nama_usaha, usaha.alamat_usaha AS alamat, produk_utama, usaha.lat AS lat, usaha.lng AS lng, usaha.status_usaha, pengusaha.nama_pengusaha AS nama_pemilik, usaha.id_pengusaha AS id_pemilik, kecamatan.nama_kecamatan AS nama_kecamatan, kelurahan.nama_kelurahan AS nama_kelurahan, skala_usaha.skala AS jenis_skala, sektor_usaha.sektor AS jenis_sektor, telp
                FROM usaha JOIN pengusaha ON pengusaha.id_pengusaha = usaha.id_pengusaha JOIN kelurahan USING(id_kelurahan) JOIN kecamatan ON kecamatan.id_kecamatan = usaha.id_kecamatan JOIN sektor_usaha USING(id_sektor) JOIN skala_usaha USING(id_skala) 
                ORDER BY id_usaha";







    $query = mysql_query($selectSql);

		if(!$query)
			echo mysql_error();

        $objPHPExcel = new PHPExcel();
        $objPHPExcel->getProperties()->setTitle("Laporan Data Usaha Kab. Bandung Barat");
        $objPHPExcel->getProperties()->setDescription("Berisi data usaha (ID Usaha, Nama Usaha, Produk Utama, Alamat, Pemilik, Kecamatan, Kelurahan, Skala Usaha, Sektor Usaha)");
        $objPHPExcel->setActiveSheetIndex(0);

        // Header laporan
        $objPHPExcel->getActiveSheet()->setCellValue('A1','Laporan Data Usaha Kab. Bandung Barat');
        $objPHPExcel->getActiveSheet()->mergeCells('A1:J1');
        $objPHPExcel->getActiveSheet()->getStyle('A1')->getFont()->setSize(16);
        $objPHPExcel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);
        $objPHPExcel->getActiveSheet()->getRowDimension('1')->setRowHeight(30);
        $objPHPExcel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER)->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);

        // Tanggal laporan
        $today = date("d-m-Y");
        $objPHPExcel->getActiveSheet()->setCellValue('I3','Tanggal: '.$today);
        $objPHPExcel->getActiveSheet()->getStyle('I3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
        $objPHPExcel->getActiveSheet()->getStyle('I3')->getFont()->setBold(true);

        // Header tabel produk
        $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(10);
        $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(65);
        $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(25);
        $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(15);
        $objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(25);

        $objPHPExcel->getActiveSheet()->getRowDimension('5')->setRowHeight(15);

        $objPHPExcel->getActiveSheet()->setCellValue('A5','ID Usaha');
        $objPHPExcel->getActiveSheet()->setCellValue('B5','Nama Usaha');
        $objPHPExcel->getActiveSheet()->setCellValue('C5','Alamat');
        $objPHPExcel->getActiveSheet()->setCellValue('D5','Pemilik Usaha');
        $objPHPExcel->getActiveSheet()->setCellValue('E5','Produk Utama');
        $objPHPExcel->getActiveSheet()->setCellValue('F5','Kecamatan');
        $objPHPExcel->getActiveSheet()->setCellValue('G5','Kelurahan');
        $objPHPExcel->getActiveSheet()->setCellValue('H5','Skala Usaha');
        $objPHPExcel->getActiveSheet()->setCellValue('I5','Sektor Usaha');

        $objPHPExcel->getActiveSheet()->getStyle('A5:I5')->getFont()->setBold(true);
        $objPHPExcel->getActiveSheet()->getStyle('A5:I5')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

        // Border header tabel
        $styleArray = array(
                'fill' => array(
                        'type' => PHPExcel_Style_Fill::FILL_SOLID,
                        'color' => array('rgb'=>'E1E0F7'),
                    ),
                'borders' => array(
                    'outline' => array(
                            'style' => PHPExcel_Style_Border::BORDER_THIN,
                    ),
                ),
                );
                $objPHPExcel->getActiveSheet()->getStyle('A5')->applyFromArray($styleArray);
                $objPHPExcel->getActiveSheet()->getStyle('B5')->applyFromArray($styleArray);
                $objPHPExcel->getActiveSheet()->getStyle('C5')->applyFromArray($styleArray);
                $objPHPExcel->getActiveSheet()->getStyle('D5')->applyFromArray($styleArray);
                $objPHPExcel->getActiveSheet()->getStyle('E5')->applyFromArray($styleArray);
                $objPHPExcel->getActiveSheet()->getStyle('F5')->applyFromArray($styleArray);
                $objPHPExcel->getActiveSheet()->getStyle('G5')->applyFromArray($styleArray);
                $objPHPExcel->getActiveSheet()->getStyle('H5')->applyFromArray($styleArray);
                $objPHPExcel->getActiveSheet()->getStyle('I5')->applyFromArray($styleArray);

        //isi tabel
        $row = 6;
    
        while($data = mysql_fetch_array($query))
        {
            $objPHPExcel->getActiveSheet()->setCellValue('A'.$row, $data['id_usaha']);
            $objPHPExcel->getActiveSheet()->setCellValue('B'.$row, $data['nama_usaha']);
            $objPHPExcel->getActiveSheet()->setCellValue('C'.$row, $data['alamat']);
            $objPHPExcel->getActiveSheet()->setCellValue('D'.$row, $data['nama_pemilik']);
            $objPHPExcel->getActiveSheet()->setCellValue('E'.$row, $data['produk_utama']);
            $objPHPExcel->getActiveSheet()->setCellValue('F'.$row, $data['nama_kecamatan']);
            $objPHPExcel->getActiveSheet()->setCellValue('G'.$row, $data['nama_kelurahan']);
            $objPHPExcel->getActiveSheet()->setCellValue('H'.$row, $data['jenis_skala']);
            $objPHPExcel->getActiveSheet()->setCellValue('I'.$row, $data['jenis_sektor']);
            $objPHPExcel->getActiveSheet()->getStyle("A".($row).":I".($row))->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);              
            $row++;
        }


        //Menuliskan skrip pada file yang telah dibuat.
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        ob_end_clean();

        // Mendefinisikan header dan melakukan unggah secara otomatis.
        $filename='Laporan_Usaha_'.$today.'.xlsx';

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="'.$filename.'"');
        header('Cache-Control: max-age=0');
        
        $objWriter->save('php://output');
        header(("location:buatLaporan.php"));
	//query nya ganti sama yang ada di report_example.php

?>