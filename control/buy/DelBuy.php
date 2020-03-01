<?php
session_start();
include '../../condb.php';
$id = $_GET['delid'];
$sqldel = "DELETE FROM buy_detail WHERE B_id = '$id'";
$querydel = $condb->query($sqldel);
if($querydel){
    echo "<script>";
    echo "alert('ลบข้อมูลเรียบร้อยแล้ว');";
    echo "window.location='../../View/Buy/Main_Buy.php';";
    echo "</script>";
}else{
    echo "<script>";
    echo "alert('ไม่สามารถลบข้อมูลได้)";
    echo "window.location='../../View/Buy/Main_Buy.php';";
    echo "</script>";
}
?>