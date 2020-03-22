<?php
header("Content-type: text/xml");
include('../../condb.php');

$stock_year = isset($_GET["year"]) ? $_GET["year"] : date("Y");
$stock_month = isset($_GET["month"]) ? $_GET["month"] : date("m");

$condition = $stock_year;
if( !empty($stock_month) ) $condition .= "-".$stock_month;

//ตัวแปร array ที่ใ้ชสำหรับแสดงกราฟ
$monthser = array(); // ตัวแปรแกน x
//ตัวแปรแกน y
$cvno = array();
//หมดตัวแปรแกน y

//sql สำหรับดึงข้อมูล
$sql = "SELECT A.da_name, SUM(A.da_amount) AS Total FROM durablearticles_order AS A WHERE A.da_buydate LIKE '{$condition}%' GROUP BY A.da_name";
//จบ sql
$result = $condb->query($sql);
while ($row = $result->fetch_assoc()) {
    //array_push คือการนำค่าที่ได้จาก sql ใส่เข้าไปตัวแปร array
    array_push($monthser, $row["da_name"]);
    array_push($cvno, $row["Total"]);
}
$catigory = "<item>" . implode("</item><item>", $monthser) . "</item>";
$cvnoxml = "<point>" . implode("</point><point>", $cvno) . "</point>";

$xml = '<chart>';
$xml .= '<categories>';
$xml .= $catigory;
$xml .= '</categories>';

$xml .= '<series>';
$xml .= '<name>จำนวน</name>';
$xml .= '<data>';
$xml .= $cvnoxml;
$xml .= '</data>';
$xml .= '</series>';
$xml .= '</chart>';
echo $xml;
