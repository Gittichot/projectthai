<?php
session_start();
include '../../condb.php';
$Bid = $_POST['Bid']
$pam  = $_POST['pam'];
$Btt  = $_POST['Btt'];
$bd = $_POST['bd'];
//  echo $Bid;
//  echo $Pid;
//  echo $pam;
//  echo $Btt;
//  echo $bd;

$sql = "UPDATE `buy` SET `B_amount`='".$pam."',`B_total`='".$Btt."',`B_date`='".$bd."' WHERE B_id = '".$Bid."' ";
$query = $condb->query($sql);
if($query){
    echo "<script>";
    echo "alert('แก้ไขเรียบร้อย');";
    echo "window.location='../../View/Buy/Main_Buy.php';";
    echo "</script>";
}
else{
    echo "<script>";
    echo "alert('เกิดข้อผิดพลาด');";
    echo "window.location='../../View/Buy/Main_Buy.php';";
    echo "</script>";
}

?>