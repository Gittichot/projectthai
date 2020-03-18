<?php
session_start();
include '../../condb.php';
$total_price = 0;
$total_buy = 0;
$total_amount = 0;
if(isset($_SESSION["cart_item"])) {
        foreach($_SESSION["cart_item"] as $item) {
                $item_price = $item["quantity"] * $item["price"];
                $total_buy += $item["price"];
                $id = $item["id"];
$pname = $item["name"];
$quantity = $item["quantity"];
$price = $item["price"];
$total_amount += $item["quantity"];
$total_price += ($item["price"] * $item["quantity"]);
$seller = $_SESSION["id"];
$status = $_SESSION["status"];
// echo " id :".$id;
// echo " name :".$pname;
// echo " quantity :".$quantity;
// echo "price :".$price;
// echo " total :".$total_buy;
// echo " total Buy :".$total_price;

$sql = "INSERT INTO `buy`(`B_id`, `Mem_id`, `P_id`, `Bo_id`, `B_Amount`, `B_Total`, `B_Date`) VALUES (null,'".$seller."','".$id."',null,'".$quantity."','".$total_buy."',CURDATE())";
$query = $condb->query($sql);
if($query){      
        $update = "UPDATE `stock_product` SET `P_unit` = (`P_unit` - '".$quantity."')  WHERE `stock_product`.`P_id` = '".$id."' ";        
        $querystock = $condb->query($update);
        if($querystock){
        if($status=='Admin'){
        unset($_SESSION["cart_item"]);
        echo "<script>";
        echo "alert('ทำรายการเรียบร้อยแล้ว');";
        echo "window.location='../../ManageBuy/Buy/Main.php';";
        echo "</script>";   
        }
        else {
        unset($_SESSION["cart_item"]);
        echo "<script>";
        echo "alert('ทำรายการเรียบร้อยแล้ว');";
        echo "window.location='../../Member/buy/Main_Buy.php';";
        echo "</script>";   
        }
        }
        else if($status=='Admin'){
                unset($_SESSION["cart_item"]);
                echo "<script>";
                echo "alert('ไม่สามารถทำรายการได้');";
                echo "window.location='../../ManageBuy/Buy/Main.php';";
                echo "</script>";   
                }
                else {
                unset($_SESSION["cart_item"]);
                echo "<script>";
                echo "alert('ไม่สามารถทำรายการได้');";
                echo "window.location='../../Member/buy/Main_Buy.php';";
                echo "</script>";   
                }
}
else    if($status=='Admin'){
        unset($_SESSION["cart_item"]);
        echo "<script>";
        echo "alert('ไม่สามารถทำรายการได้');";
        echo "window.location='../../ManageBuy/Buy/Main.php';";
        echo "</script>";   
        }
        else {
        unset($_SESSION["cart_item"]);
        echo "<script>";
        echo "alert('ไม่สามารถทำรายการได้');";
        echo "window.location='../../Member/buy/Main_Buy.php';";
        echo "</script>";   
               }       
        }
}
?>