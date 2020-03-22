<?php
session_start();
include '../../condb.php';
// echo $_POST["boid"];
// echo $_POST["pid"];
$boid = $_POST["boid"];
$Mid = $_POST["mid"];
$Pid = $_POST["pid"];
$quantity = $_POST["quantity"];
$total = $_POST["total"];

echo "Bo_id ".$boid." ,";
echo "M_id ".$Mid." ,";
echo "P_id ".$Pid." ,";
echo "Bo_amount ".$quantity." ,";
echo "Bo_total ".$total;

$sqlbuy = "INSERT INTO `buy`(`B_id`, `M_id`, `P_id`, `Bo_id`) VALUES (null,'".$Mid."', '".$Pid."', '".$boid."')";
$sqlbuydetail = "INSERT INTO `buy_detail`(`B_id`, `B_amount`, `B_total`, `B_date`) VALUES (null,'".$quantity."', '".$total."', CURDATE())";
$query = $condb->query($sqlbuy);
$query2 = $condb->query($sqlbuydetail);
if($query){
    if($query2){
        $sqlchange = "UPDATE booking_detail AS A SET A.Bo_status = 2 WHERE A.Bo_id = '".$boid."'";
        $updatesql = $condb->query($sqlchange);
        echo "<script>";
        echo "alert('ชำระเงินเสร็จสิ้น');";
        echo "window.location='../../Member/booking/Main_booking.php';";
        echo "</script>";
    }else{
        echo "<script>";
        echo "alert('ไม่สามารถชำระเงินได้');";
        echo "window.location='../../Member/booking/Main_booking.php';";
        echo "</script>";
}
}else{
    echo "<script>";
    echo "alert('ไม่สามารถชำระเงินได้');";
    echo "window.location='../../Member/booking/Main_booking.php';";
    echo "</script>";
}
?>