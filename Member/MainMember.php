<?php
session_start();
error_reporting(0);
if(!$_SESSION["status"]){
    if(!$_SESSION["id"]){
        echo "<script>";
        echo "alert('ท่านไม่มีสิทธิ์การเข้าใช้งาน');";
        echo "window.location='../index.php';";
        echo "</script>";
    }        
}else{
include '../condb.php';
require '../control/buy/controller.php';
$db_handle = NEW DBController();
$sql = "SELECT * FROM member WHERE id = '".$_SESSION["id"]."' ";
$query = $condb->query($sql);
$result = mysqli_fetch_array($query,MYSQLI_ASSOC);
$id = $_SESSION["id"];
$totalbuy = "SELECT * FROM buy AS A
INNER JOIN buy_detail AS B
ON A.B_id = B.B_id
INNER JOIN stock_product AS C
ON A.P_id = C.P_id WHERE A.M_id = '".$id."' ";
$querytotal = $condb->query($totalbuy);
?>
<!doctype html>
<html lang="en">
<head>
    <title>หน้าสมาชิก</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../DataTables/datatables.css">
    <link rel="stylesheet" href="../css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body class="sb-nav-fixed">
<?php include './Sidebar.php'; ?>
<div id="content" class="p-4 p-md-5 pt-5">
<!-- Page Content  -->
<?php include './Profile.php';
      include './Table_total.php';
?>
    <!-- END Page Content  -->
    </div>
    <!-- JQuery -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
    <script src="../js/jquery.min.js"></script>
    <!-- DataTable -->
    <script src="../DataTables/datatables.min.js" crossorigin="anonymous"></script>
    <script src="../js/DataTable.js"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="../js/main.js"></script> 
    
    <script src="../js/popper.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script>
        $('#table').DataTable();
    </script>
</body>

</html>
<?php }?>