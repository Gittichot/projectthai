<?php
session_start();
include '../../condb.php';
// echo $_POST["boid"];
// echo $_POST["pid"];
$boid = $_POST["boid"];
$sqlbo = "SELECT * FROM booking AS A INNER JOIN booking_detail AS B ON A.Bo_id = B.Boo_id WHERE A.Bo_id = '".$boid."' ";
$querybo = $condb->query($sqlbo);
$booking = mysqli_fetch_array($querybo,MYSQLI_ASSOC);
$Mid = $booking["M_id"];
$Pid = $booking["P_id"];
$id = $booking["Bo_id"];
$quantity = $booking["Boo_amount"];
$total = $booking["Boo_total"];
$date = $booking["Boo_date"];

// echo "Mid :".$Mid." ";
// echo "Pid :".$Pid." ";
// echo "Booking id :".$id." ";
// echo "quantity :".$quantity." ";
// echo "total :".$total." ";
// echo "date :".$date." ";
$sqlbuy = "INSERT INTO `buy`(`B_id`, `Mem_id`, `P_id`, `Bo_id`, `B_Amount`, `B_Total`, `B_Date`) VALUES (null,'".$Mid."', '".$Pid."', '".$id."', '".$quantity."', '".$total."', '".$date."')";
$query = $condb->query($sqlbuy);
if($query){
    if($_SESSION["status"]=='Admin'){

    }
    else {
            echo "<script>";
            echo "alert('ชำระเงินเสร็จสิ้น');";
            echo "window.location='../../Member/booking/Main_booking.php';";
            echo "</script>";
    }

}
else {
    echo "<script>";
    echo "alert('ไม่สามารถชำระเงินได้');";
    echo "window.location='../../Member/booking/Main_booking.php';";
    echo "</script>";
}
?>