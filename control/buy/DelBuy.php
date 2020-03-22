<?php
session_start();
include '../../condb.php';
$id = $_GET['delid'];
$sqldel = "DELETE FROM buy WHERE B_id = '$id'";
$sqldel2 = "DELETE FROM buy_detail WHERE B_id = '$id'";
$querydel = $condb->query($sqldel);
$status = $_SESSION["status"];
if($querydel){
    if($sqldel2){
        if($status=='Admin'){
    echo "<script>";
    echo "alert('ลบข้อมูลเสร็จสิ้น');";
    echo "window.location='../../Mainadmin.php';";
    echo "</script>";   
    }
    else {
    echo "<script>";
    echo "alert('ลบข้อมูลเสร็จสิ้น');";
    echo "window.location='../../Member/MainMember.php';";
    echo "</script>";   
    }
    }else if($status=='Admin'){
        echo "<script>";
        echo "alert('ไม่สามารถลบข้อมูลได้');";
        echo "window.location='../../Mainadmin.php';";
        echo "</script>";   
        }
        else {
        echo "<script>";
        echo "alert('ไม่สามารถลบข้อมูลได้');";
        echo "window.location='../../Member/MainMember.php';";
        echo "</script>";   
        }  
    }
    else if($status=='Admin'){
        echo "<script>";
        echo "alert('ไม่สามารถลบข้อมูลได้');";
        echo "window.location='../../Mainadmin.php';";
        echo "</script>";   
        }
        else {
        echo "<script>";
        echo "alert('ไม่สามารถลบข้อมูลได้');";
        echo "window.location='../../Member/MainMember.php';";
        echo "</script>";   
        }
?>