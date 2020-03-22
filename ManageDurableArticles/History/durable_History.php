<?php
session_start();
if (!$_SESSION["id"]) {
    echo "<script>";
    echo "alert('ท่านไม่มีสิทธิ์การเข้าใช้งาน');";
    echo "window.location='../';";
    echo "</script>";
} else {
    include('../../condb.php');
    $sql = "SELECT  durablearticles_order.da_id,
                    durablearticles_order.da_buydate,
                    durablearticles_order.da_name,
                    durablearticles_order.da_detel,
                    durablearticles_order.da_amount,
                    durablearticles_order.da_price,
                    mattype.mtype_name,
                    dealer.dl_fname,
                    dealer.dl_lname,
                    dealer.dl_phone
            FROM
                durablearticles_order
            INNER JOIN mattype ON durablearticles_order.mtype_id = mattype.mtype_id
            INNER JOIN dealer ON durablearticles_order.dl_id = dealer.dl_id";
	$result = $condb->query($sql);
?>
    <!doctype html>
    <html lang="en">

    <head>
        <title>ประวัติการสั่งซื้อวัสดุ</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round" rel="stylesheet">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
        <link rel="stylesheet" href="<?= DataTables ?>datatables.css">
        <link rel="stylesheet" href="<?= CSS ?>style.css" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    </head>

    <body>
        <?PHP include('Sidebar.php'); ?>
        <!-- Page Content  -->
        <div id="content" class="p-4 p-md-5 pt-5">
            <!-- Table Member -->
            <?php include 'form_history.php'; ?>

            <!-- END Page Content  -->
        </div>

        <!-- JQuery -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
        <script src="./js/jquery.min.js"></script>
        <!-- DataTable -->
        <script src="<?= DataTables ?>datatables.min.js"></script>
        <script src="<?= JS ?>datatable.js"></script>
        <!-- Chart -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="<?= JS ?>barchart.js"></script>

        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="<?= JS ?>main.js"></script>

        <script src="<?= JS ?>/js/popper.js"></script>
        <script src="<?= JS ?>/js/bootstrap.min.js"></script>
    </body>

    </html>
<?PHP } ?>