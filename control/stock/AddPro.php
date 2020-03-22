<?php 
session_start();
include '../../condb.php';
$name = $_POST["pname"];
$quantity = $_POST["amount"];
$price = $_POST["price"];
$img = $_POST["img"];

echo $_SESSION["status"];
// $sql = "INSERT INTO `stock_product`(`P_id`, `P_name`, `P_unit`, `P_price`, `P_add_history_date`, `P_Image`) VALUES (null, '".$name."', '".$quantity."', '".$price."', CURDATE(), '".$img."')";
// $query = $condb->query($sql);
// if($query){
//     echo "<script>";
//     echo "alert('เพิ่มสินค้าเสร็จสิ้น');";
//     echo "window.location='../../ManageStock/Main.php';";
//     echo "</script>";
// }else{
//     echo "<script>";
//     echo "alert('ไม่สามารถเพิ่มสินค้าได้');";
//     echo "window.location='../../ManageStock/Main.php';";
//     echo "</script>";
// }

?>