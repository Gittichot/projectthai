<?php
session_start();
include '../../condb.php';
$id = $_GET['delid'];
$sqldel = "DELETE FROM booking_detail WHERE Bo_id = '$id'";
$querydel = $condb->query($sqldel);
if($querydel){
    echo "<script>";
    echo "alert('ลบข้อมูลเรียบร้อยแล้ว');";
    echo "window.location='../../Main_Admin.php';";
    echo "</script>";
}else{
    echo "<script>";
    echo "alert('ไม่สามารถลบข้อมูลได้)";
    echo "window.location='../../Main_Admin.php';";
    echo "</script>";
}
?>