<?php
session_start();
include '../../condb.php';
$Pid = $_POST['Pid'];
$pam  = $_POST['pam'];
$Btt  = $_POST['Btt'];
$bd = $_POST['bd'];
//  echo $Pid;
//  echo $pam;
//  echo $Btt;
//  echo $bd;
$sql = "INSERT INTO `buy_detail`(B_id, P_id, B_amount, B_total, B_date) VALUES('','".$Pid."','".$pam."','".$Btt."','".$bd."')";
$query = $condb->query($sql);
if($query){
        echo "<script>";
        echo "alert('เพิ่มข้อมูลเรียบร้อยแล้ว');";
        echo "window.location='../../View/Buy/Main_Buy.php';";
        echo "</script>";
}else{
        echo "<script>";
        echo "alert('ไม่สามารถเพิ่มข้อมูลได้');";
        echo "window.location='../../View/Buy/Main_Buy.php';";
        echo "</script>";
}
?>