<?php 
    session_start(); 
    $path = "lib_func.php";
    include_once($path);
    connect();
  //create xml
    function parseToXML($htmlStr)
{
    $xmlStr=str_replace('<','&lt;',$htmlStr);
    $xmlStr=str_replace('>','&gt;',$xmlStr);
    $xmlStr=str_replace('"','&quot;',$xmlStr);
    $xmlStr=str_replace("'",'&#39;',$xmlStr);
    $xmlStr=str_replace("&",'&amp;',$xmlStr);
    return $xmlStr;
}
    $queryXml = "SELECT nama_usaha,alamat_usaha,lat,lng FROM usaha WHERE 1";
    $resultXml = mysql_query($queryXml);
    if (!$resultXml) {
      die('Invalid query: ' . mysql_error());
    }

    header("Content-type: text/xml; charset=utf-8");
    echo '<?xml version="1.0" encoding="utf-8" ?>';

    // Start XML file, echo parent node
    echo '<markers>';

    // Iterate through the rows, printing XML nodes for each
    while ($parseXml = @mysql_fetch_assoc($result)){
      // ADD TO XML DOCUMENT NODE
      echo '<marker ';
      echo 'nama Usaha="' . parseToXML($parseXml['nama_usaha']) . '" ';
      echo 'Alamat Usaha="' . parseToXML($parseXml['alamat_usaha']) . '" ';
      echo 'lat="' . $parseXml['lat'] . '" ';
      echo 'lng="' . $parseXml['lng'] . '" ';
      echo '/>';
    }

    // End XML file
    echo '</markers>';
?>