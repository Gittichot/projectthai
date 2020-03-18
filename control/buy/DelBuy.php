<?php
session_start();
include '../../condb.php';
$id = $_GET['delid'];
$sqldel = "DELETE FROM buy WHERE B_id = '$id'";
$querydel = $condb->query($sqldel);
$status = $_SESSION["status"];
if($querydel){      
    if($status=='Admin'){
    echo "<script>";
    echo "alert('ทำรายการเรียบร้อยแล้ว');";
    echo "window.location='../../Mainadmin.php';";
    echo "</script>";   
    }
    else {
    echo "<script>";
    echo "alert('ทำรายการเรียบร้อยแล้ว');";
    echo "window.location='../../Member/MainMember.php';";
    echo "</script>";   
    }
    }
    else if($status=='Admin'){
        echo "<script>";
        echo "alert('ทำรายการเรียบร้อยแล้ว');";
        echo "window.location='../../Mainadmin.php';";
        echo "</script>";   
        }
        else {
        echo "<script>";
        echo "alert('ทำรายการเรียบร้อยแล้ว');";
        echo "window.location='../../Member/MainMember.php';";
        echo "</script>";   
        }
?>