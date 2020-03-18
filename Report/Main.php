<?php
session_start();
include '../condb.php';
$stock = "SELECT * FROM stock_product";
$stockquery = $condb->query($stock);
$totalbuy = "";
$stts = $_SESSION["status"];
$id = $_SESSION["id"];
if ($stts=='Admin'){
    $totalbuy = "SELECT * FROM buy AS A INNER JOIN member AS B ON A.Mem_id = B.id INNER JOIN stock_product AS C ON A.P_id = C.P_id WHERE A.B_Date = CURDATE()";
}else{
    $totalbuy = "SELECT * FROM buy AS A INNER JOIN stock_product AS B ON A.P_id = B.P_id WHERE A.Mem_id = '".$id."' ";
}
$querytotal = $condb->query($totalbuy);
?>
<!doctype html>
<html lang="en">
<head>
    <title>Report</title>
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

<!-- Page Content  -->
    <div id="content" class="p-4 p-md-5 pt-5">
<!-- Card Content  -->
  <!-- Table  -->
<?php if($stts=='Admin'){
    include './Table_total_admin.php';
 }else {
     include './Table_total_buy.php';
 } ?>
<!-- Chart Content  -->
<?php include './Table_Stock.php'; ?>
    <!-- END Table Member  -->
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
    <script >
    $('#Protable').DataTable();
    $('#buytable').DataTable();
    $('#tablebuy').DataTable();
    </script>
</body>

</html>