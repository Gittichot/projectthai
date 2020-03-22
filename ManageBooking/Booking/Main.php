<?php
session_start();
error_reporting(0);
if(!$_SESSION["status"]){
    if(!$_SESSION["id"]){
        echo "<script>";
        echo "alert('ท่านไม่มีสิทธิ์การเข้าใช้งาน');";
        echo "window.location='../../index.php';";
        echo "</script>";

    }        
}else{
require '../../control/buy/controller.php';
$db_handle = new DBController();
if(!empty($_GET["action"])) {
    switch($_GET["action"]) {
        case "add":
            if(!empty($_POST["quantity"])) {
                $productByCode = $db_handle->runQuery("SELECT * FROM stock_product WHERE P_id = '".$_GET["id"]."' ");
                $itemArray = array($productByCode[0]["P_id"]=>array('name'=>$productByCode[0]["P_name"], 'id'=>$productByCode[0]["P_id"], 'quantity'=>$_POST["quantity"], 'price'=>$productByCode[0]["P_price"],));

            if(!empty($_SESSION["Booking_cart"])) {
                if(in_array($productByCode[0]["P_id"], array_keys($_SESSION["Booking_cart"]))) {
                    foreach($_SESSION["Booking_cart"] as $k => $v) {
                        if($productByCode[0]["P_id"] == $k) {
                            if(empty($_SESSION["Booking_cart"][$k]["quantity"])) {
                                $_SESSION["Booking_cart"][$k]["quantity"] = 0;
                            }
                            $_SESSION["Booking_cart"][$k]["quantity"] += $_POST["quantity"];
                        }
                    }
                } else {
                    $_SESSION["Booking_cart"] = array_merge($_SESSION["Booking_cart"], $itemArray);
                }
            } else {
                $_SESSION["Booking_cart"] = $itemArray;
            }
        }
        break;
        case "remove":
            if(!empty($_SESSION["Booking_cart"])) {
                foreach($_SESSION["Booking_cart"] as $k => $v) {
                    if($_GET["id"] == $k)
                    unset($_SESSION["Booking_cart"][$k]);
                    if(empty($_SESSION["Booking_cart"]))
                    unset($_SESSION["Booking_cart"]);
                }
            }
        break;
        case "empty":
            unset($_SESSION["Booking_cart"]);
        break;
    }
}
?>
<!doctype html>
<html lang="en">

<head>
    <title>การจองสินค้า</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="../../DataTables/datatables.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
    .no-records {
    text-align: center;
    clear: both;
    margin: 40px 0;
    color: red;
    }
    img{
   	float: left;
   	margin: 5px;
   	width: 60px;
   	height: 60px;
   }
    </style>
</head>

<body>
<?php include './Sidebar.php'; ?>

<!-- Page Content  -->
    <div id="content" class="p-4 p-md-5 pt-5">  
<div class="row">
<!-- Card Buy Content  -->
<?php include './TableBooking.php'; ?>
<?php include './BookingForm.php'; ?>
    <!-- END Page Content  --></div></div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="../../js/jquery.min.js"></script>
    <script src="../../js/popper.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../js/main.js"></script>
</body>

</html>
<?php } ?>