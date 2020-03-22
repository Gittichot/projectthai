<?php
session_start();
error_reporting(0);
if(!$_SESSION["status"]){
    if(!$_SESSION["id"]){
        echo "<script>";
        echo "alert('URL??');";
        echo "window.location='../../index.php';";
        echo "</script>";
    }        
}else{
include '../../condb.php';
$sql = "SELECT * FROM stock_product";
$query = $condb->query($sql);
?>
<!doctype html>
<html lang="en">

<head>
    <title>สร้างสินค้า</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="../../../vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="../../DataTables/datatables.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- Vendor CSS-->
    <link href="../../../vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="../../../vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">
    <link rel="stylesheet" href="../../../css/style.css">
    <!-- Formadd CSS-->
    <link href="../../../css/main.min.css" rel="stylesheet" media="all">
</head>

<body>
<?php include './Sidebar.php'; ?>

<!-- Page Content  -->
    <div id="content" class="p-4 p-md-5 pt-5">
    <?php include './FormCreate.php'; ?>
 <!-- Table Manage Member -->
    <!-- END Table Member  -->
    <!-- END Page Content  --></div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="../../../js/jquery.min.js"></script>
    <script src="../../../js/popper.js"></script>
    <script src="../../../js/bootstrap.min.js"></script>
    <script src="../../../js/main.js"></script>
    <!-- Jquery JS Form add -->
    <script src="../../../vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS Form add -->
    <script src="../../../vendor/select2/select2.min.js"></script>
    <script src="../../../vendor/datepicker/moment.min.js"></script>
    <script src="../../../vendor/datepicker/daterangepicker.js"></script>
    <!-- Main JS Form add -->
    <script src="../../../js/global.js"></script>
</body>

</html>
<?php } ?>