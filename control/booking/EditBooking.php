<?php
session_start();
include '../../condb.php';
$Boid = $_POST['Boid'];
$Pid = $_POST['Pid'];
$am  = $_POST['Am'];
$bt  = $_POST['Ptt'];
$bd = $_POST['Bd'];
$bc  = $_POST['Cn'];
$bct = $_POST['Ct'];
$bca = $_POST['CAdd'];
$gt  = $_POST['gt'];
$bcg  = $_POST['Datetype'];

// echo $Pid;
// echo $am;
// echo $bt;
// echo $bd;
// echo $bc;
// echo $bct;
// echo $bca;
// echo $gt;
// echo $bcg;
$sql = "UPDATE `booking_detail` SET `Bo_amount`='".$Am."',`Bo_Total`='".$Ptt."',`Bo_date`='".$Bd."',`Bo_Cus`='".$Cn."',`Bo_Custel`='".$Ct."',`Bo_CusAdd`='".$CAdd."' ,`Get_type`='".$gt."',`Bo_Cusget`='".$Datetype."'  WHERE Bo_id = '".$id."' ";
$query = $condb->query($sql);
if($query){
    echo "<script>";
    echo "alert('แก้ไขเรียบร้อย');";
    echo "window.location='./Main_Admin.php';";
    echo "</script>";
}
else{
    echo "<script>";
    echo "alert('เกิดข้อผิดพลาด');";
    echo "window.location='./Main_Admin.php';";
    echo "</script>";
}

?>