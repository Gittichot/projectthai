<?php
session_start();
include '../../condb.php';
$id = $_POST['pid'];
$Amount  = $_POST['amount'];
$price  = $_POST['price'];

// echo $id;
// echo $Amount;
// echo $price;
// echo $_SESSION["status"];

$sql = "UPDATE `stock_product` SET `P_unit`= `P_unit`+'".$Amount."',`P_price`='".$price."',`P_add_history_date`= CURDATE() WHERE P_id = '".$id."' ";
$query = $condb->query($sql);
if($query){
    echo "<script>";
    echo "alert('นำเข้าสินค้าเสร็จสิ้น');";
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