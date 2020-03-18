<?php
session_start();
include '../../condb.php';
$total_price = 0;
$total_buy = 0;
$total_amount = 0;
if(isset($_SESSION["Booking_cart"])) {
        foreach($_SESSION["Booking_cart"] as $item) {
                $item_price = $item["quantity"] * $item["price"];
                $total_buy += $item["price"];
                $id = $item["id"];
$pname = $item["name"];
$quantity = $item["quantity"];
$price = $item["price"];
$total_amount += $item["quantity"];
$total_price += ($item["price"] * $item["quantity"]);
$cname = $_POST["cusname"];
$cadd = $_POST["caddress"];
$ctel = $_POST["ctel"];
$cdate = $_POST["getdate"];
$ctype = $_POST["gettype"];
$seller = $_SESSION["id"];

// echo $cname;
// echo $cadd;
// echo $ctel;
// echo $cdate;
// echo $ctype;
// echo " id :".$id;
// echo " name :".$pname;
// echo " quantity :".$quantity;
// echo "price :".$price;
// echo " total :".$total_buy;
// echo " total Buy :".$total_price;


$sql = "INSERT INTO `booking`(`Bo_id`, `M_id`, `P_id`) VALUES (null ,'".$seller."','".$id."')";
$sql2 = "INSERT INTO `booking_detail`(`Boo_id`, `Boo_amount`, `Boo_total`, `Boo_date`, `Boo_cus`, `Boo_cadd`, `Boo_ctel`, `Boo_cget`, `Get_type`) VALUES (null,'".$quantity."','".$total_buy."',CURDATE(),'".$cname."','".$cadd."','".$ctel."','".$cdate."','".$ctype."')";
$query = $condb->query($sql);
$query2 = $condb->query($sql2);
if($query){
        if($query2){      
                $update = "UPDATE `stock_product` SET `P_unit` = (`P_unit` - '".$quantity."')  WHERE `stock_product`.`P_id` = '".$id."' ";        
                $querystock = $condb->query($update);
                if($querystock){
                if($status=='Admin'){
                unset($_SESSION["Booking_cart"]);
                echo "<script>";
                echo "alert('ทำรายการเรียบร้อยแล้ว');";
                echo "window.location='../../ManageBooking/Booking/Main.php';";
                echo "</script>";   
                }
                else {
                unset($_SESSION["Booking_cart"]);
                echo "<script>";
                echo "alert('ทำรายการเรียบร้อยแล้ว');";
                echo "window.location='../../Member/booking/Main_booking.php';";
                echo "</script>";   
                }
                }
                else if($status=='Admin'){
                        unset($_SESSION["Booking_cart"]);
                        echo "<script>";
                        echo "alert('ไม่สามารถทำรายการได้');";
                        echo "window.location='../../ManageBooking/Booking/Main.php';";
                        echo "</script>";   
                        }
                        else {
                        unset($_SESSION["Booking_cart"]);
                        echo "<script>";
                        echo "alert('ไม่สามารถทำรายการได้');";
                        echo "window.location='';";
                        echo "</script>";   
                        }
        }
        else    if($status=='Admin'){
                unset($_SESSION["Booking_cart"]);
                echo "<script>";
                echo "alert('ไม่สามารถทำรายการได้');";
                echo "window.location='../../ManageBooking/Booking/Main.php';";
                echo "</script>";   
                }
                else {
                unset($_SESSION["Booking_cart"]);
                echo "<script>";
                echo "alert('ไม่สามารถทำรายการได้');";
                echo "window.location='';";
                echo "</script>";   
                       }     
}
else if($status=='Admin'){
        unset($_SESSION["Booking_cart"]);
        echo "<script>";
        echo "alert('ไม่สามารถทำรายการได้');";
        echo "window.location='../../ManageBooking/Booking/Main.php';";
        echo "</script>";   
        }
        else {
        unset($_SESSION["Booking_cart"]);
        echo "<script>";
        echo "alert('ไม่สามารถทำรายการได้');";
        echo "window.location='';";
        echo "</script>";   
        }
}
}
?>