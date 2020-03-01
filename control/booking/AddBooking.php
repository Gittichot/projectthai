<?php
session_start();
include '../../condb.php';
// $Pid = $_POST['Pid'];
// $am  = $_POST['Am'];
// $bt  = $_POST['Ptt'];
// $bd = $_POST['Bd'];
// $bc  = $_POST['Cn'];
// $bct = $_POST['Ct'];
// $bca = $_POST['CAdd'];
// $gt  = $_POST['gt'];
// $bcg  = $_POST['Datetype'];

// echo $Pid;
// echo $am;
// echo $bt;
// echo $bd;
// echo $bc;
// echo $bct;
// echo $bca;
// echo $gt;
// echo $bcg;
$sql = "INSERT INTO booking_detail(Bo_id, P_id, Bo_amount, Bo_Total, Bo_date, Bo_Cus, Bo_Custel, Bo_CusAdd, Get_type, Bo_Cusget)
        VALUES(null,'".$_POST['Pid']."','".$_POST['Am']."','".$_POST['Ptt']."','".$_POST['Bd']."','".$_POST['Cn']."','".$_POST['Ct']."','".$_POST['CAdd']."','".$_POST['gt']."','".$_POST['Datetype']."')";
$query = $condb->query($sql);
if($query){
        echo "<script>";
        echo "alert('เพิ่มข้อมูลเรียบร้อยแล้ว');";
        echo "window.location='../../Main_Admin.php';";
        echo "</script>";
}else{
        echo "<script>";
        echo "alert('ไม่สามารถเพิ่มข้อมูลได้');";
        echo "window.location='../../Main_Admin.php';";
        echo "</script>";
}
?>