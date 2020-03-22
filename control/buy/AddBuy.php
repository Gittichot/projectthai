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
$check = "SELECT * FROM stock_product WHERE P_id = '".$id."'";
$qcheck = $condb->query($check);
$result  = mysqli_fetch_array($qcheck,MYSQLI_ASSOC);
$unit = $result["P_unit"];

// echo " id :".$id;
// echo " name :".$pname;
// echo " quantity :".$quantity;
// echo "price :".$price;
// echo " total :".$item_price;
// echo "P_unit : ".$unit;

if($quantity > $unit){

        unset($_SESSION["cart_item"]);
        echo "<script>";
        echo "alert('ไม่สามารถทำรายการได้เนื่องจำนวนสินค้าไม่เพียงพอ');";
        echo "window.location='../../ManageBuy/Buy/Main.php';";
        echo "</script>";
        echo "NO";
}
else{
$sql = "INSERT INTO `buy`(`B_id`, `M_id`, `P_id`, `Bo_id`) VALUES (null,'".$seller."','".$id."',null)";
$sql2 = "INSERT INTO `buy_detail`(`B_id`, `B_amount`, `B_total`, `B_date`) VALUES (null,'".$quantity."','".$item_price."',CURDATE())";
$query = $condb->query($sql);
$query2 = $condb->query($sql2);
if($quantity)
if($query){      
        if($query2){
                $update = "UPDATE `stock_product` SET `P_unit` = (`P_unit` - '".$quantity."')  WHERE `stock_product`.`P_id` = '".$id."' ";        
        $querystock = $condb->query($update);
        if($querystock){
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
        echo "window.location='../../ManageBuy/Buy/Main.php';";
        echo "</script>";   
        }
}else {
        unset($_SESSION["cart_item"]);
        echo "<script>";
        echo "alert('ไม่สามารถทำรายการได้');";
        echo "window.location='../../ManageBuy/Buy/Main.php';";
        echo "</script>";   
}
}
        
else  {
        unset($_SESSION["cart_item"]);
        echo "<script>";
        echo "alert('ไม่สามารถทำรายการได้');";
        echo "window.location='../../ManageBuy/Buy/Main.php';";
        echo "</script>";   
               }    
        }
}
}
?>