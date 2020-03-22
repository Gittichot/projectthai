<?php
session_start();
error_reporting(0);
if(!$_SESSION["status"]){
    if(!$_SESSION["id"]){
        echo "<script>";
        echo "alert('ท่านไม่มีสิทธิ์การเข้าใช้งาน');";
        echo "window.location='./index.php';";
        echo "</script>";
    }        
}else{
include './condb.php';
$id = $_SESSION["id"];
$sql = "SELECT * FROM buy AS A INNER JOIN buy_detail AS B ON A.B_id = B.B_id INNER JOIN stock_product AS C ON A.P_id = C.P_id INNER JOIN member AS D ON A.M_id = D.id";
$today = "SELECT A.id , A.M_Fname, A.M_Lname, A.M_Add, A.M_Tel, C.B_date, COUNT(B.B_id) AS Total, SUM(C.B_total) AS Totalbuy FROM member AS A LEFT JOIN buy AS B ON A.id = B.M_id INNER JOIN buy_detail AS C ON B.B_id = C.B_id WHERE C.B_date = CURDATE()";
$query = $condb->query($sql);
$querytoday = $condb->query($today);
// totalBuy
$sqltotalbuy = "SELECT COUNT(A.B_id) AS Totalbuy FROM buy AS A";
$totalbuy = $condb->query($sqltotalbuy);
//totalbooking
$sqltotalbo = "SELECT COUNT(A.Bo_id) AS Totalbooking FROM booking AS A";
$totalbo = $condb->query($sqltotalbo);
//totalmember
$sqltotalm = "SELECT COUNT(A.id) AS Total FROM member AS A WHERE A.M_Status = 2";
$totalm = $condb->query($sqltotalm);
//totalstock
$sqltotalst = "SELECT SUM(A.P_unit) AS Totalstock FROM stock_product AS A";
$totalst = $condb->query($sqltotalst);
?>
<!doctype html>
<html lang="en">
<head>
    <title>หน้า Admin</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./DataTables/datatables.css">
    <link rel="stylesheet" href="./css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body class="sb-nav-fixed">
<?php include './Sidebar.php'; ?>

<!-- Page Content  -->
    <div id="content" class="p-4 p-md-5 pt-5">
<!-- Card Content  -->
 <?php include './Card.php'; ?>
  <!-- Table Member -->
  <?php include './table_member.php'; ?>
    <!-- END Page Content  -->
    </div>
    <!-- JQuery -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
    <script src="./js/jquery.min.js"></script>
    <!-- DataTable -->
    <script src="./DataTables/datatables.min.js" crossorigin="anonymous"></script>
    <script src="./js/DataTable.js"></script>
    <!-- Chart -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="./js/barchart.js"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="./js/main.js"></script> 
    
    <script src="./js/popper.js"></script>
    <script src="./js/bootstrap.min.js"></script>
</body>

</html>
<?php }?>