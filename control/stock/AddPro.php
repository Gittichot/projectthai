<?php
session_start();
include '../../condb.php';
// $Fname = $_POST['Fname'];
// $Lname  = $_POST['Lname'];
// $tel  = $_POST['Phone'];
// $add = $_POST['Add'];
// $User  = $_POST['User'];
// $pass = $_POST['Pass'];
// $sal = $_POST['Sal'];
// $OT  = $_POST['OT'];
$sql = "INSERT INTO stock_product(P_id, P_name, P_unit, P_price)
        VALUES('','".$_POST['Pname']."','".$_POST['amount']."','".$_POST['price']."')";
$query = $condb->query($sql);
if($query){
        echo "<script>";
        echo "alert('เพิ่มข้อมูลเรียบร้อยแล้ว');";
        echo "window.location='../../ManageStock/Main.php';";
        echo "</script>";
}else{
        echo "<script";
        echo "alert('ไม่สามารถเพิ่มข้อมูลได้');";
        echo "window.location='../../ManageStock/Main.php';";
        echo "</script>";
}
?>