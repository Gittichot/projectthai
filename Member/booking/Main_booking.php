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
include '../../condb.php';
 $id = $_SESSION["id"];
$sql = "SELECT * FROM booking AS A INNER JOIN booking_detail AS B ON A.Bo_id = B.Bo_id INNER JOIN booking_type AS C ON B.Bo_status = C.type_id INNER JOIN Get_Type AS D ON B.Get_type = D.Get_id INNER JOIN member AS E ON A.M_id = E.id INNER JOIN stock_product AS F ON A.P_id = F.P_id WHERE A.M_id = '".$id."' ";

$query = $condb->query($sql);
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
    .nobill {
        background-color: rgb(255,0,0);
    }
    .bill {
        background-color: rgb(0,255,0);
    }
    </style>
</head>

<body class="sb-nav-fixed">
<?php include './Sidebar.php'; ?>

<!-- Page Content  -->
    <div id="content" class="p-4 p-md-5 pt-5">
<!-- Card Content  -->
<?php include './Table_booking.php';
?>
    <!-- END Page Content  --></div>
    <script src="../../js/jquery.min.js"></script>

    <script src="../../DataTables/datatables.min.js" crossorigin="anonymous"></script>

    <script src="../../js/main.js"></script>

    <script src="../../js/popper.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    
    <script src="../../js/bootstrap.min.js"></script>

    <script >
    $('#Bookingdt').DataTable();
    </script>
</body>

</html>
<?php } ?>