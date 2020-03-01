<?php
session_start();
include '../../condb.php';
$Pid = $_POST['pid'];
$Pname = $_POST['pname'];
$Amount  = $_POST['amount'];
$price  = $_POST['price'];
// echo $id;
// echo $Fname;
// echo $Lname;
// echo $add;
// echo $tel;
// echo $sal;
$sql = "UPDATE `stock_product` SET `P_name`='".$Pname."',`P_unit`='".$Amount."',`P_price`='".$price."' WHERE P_id = '".$Pid."' ";
$query = $condb->query($sql);
if($query){
    echo "<script>";
    echo "alert('แก้ไขเรียบร้อย');";
    echo "window.location='../../ManageStock/Main.php';";
    echo "</script>";
}
else{
    echo "<script>";
    echo "alert('เกิดข้อผิดพลาด');";
    echo "window.location='../../ManageStock/Main.php';";
    echo "</script>";
}

?>