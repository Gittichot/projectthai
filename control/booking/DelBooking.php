<?php
session_start();
include '../../condb.php';
$id = $_GET['delid'];
// echo $id;
$booking = "SELECT * FROM booking AS A INNER JOIN booking_detail AS B ON A.Bo_id = B.Bo_id WHERE A.Bo_id = '".$id."'";
$querybo = $condb->query($booking);
$row = mysqli_fetch_array($querybo, MYSQLI_ASSOC);
$pid = $row["P_id"];
$quantity = $row["Bo_amount"];
// echo $pid;
// echo $quantity;
$updatestock = "UPDATE `stock_product` SET `P_unit` = (`P_unit` - '".$quantity."')  WHERE `stock_product`.`P_id` = '".$id."' ";
$del1 = "DELETE FROM booking_detail WHERE Bo_id = '".$id."' ";
$del2 = "DELETE FROM booking WHERE Bo_id = '".$id."' ";
$query1 = $condb->query($del1);
$query2 = $condb->query($del2);
if($query1){
    if($query2){
        $queryupdate = $condb->query($updatestock);
        echo "<script>";
        echo "alert('ยกเลิกสินค้าเสร็จสิ้น');";
        echo "window.location='../../Member/bill/Main.php';";
        echo "</script>";   
    }else{
        echo "<script>";
        echo "alert('ไม่สามารถยกเลิกสินค้าได้');";
        echo "window.location='../../Member/bill/Main.php';";
        echo "</script>";  
    }
}else{
    echo "<script>";
    echo "alert('ไม่สามารถยกเลิกสินค้าได้');";
    echo "window.location='../../Member/bill/Main.php';";
    echo "</script>";    
}
?>