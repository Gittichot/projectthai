<?php
session_start();
include('../../condb.php');
$sql = "SELECT * FROM `material_order` ";
$query = $condb->query($sql);
?>
<!doctype html>
<html lang="en">

<head>
<title>Main Admin</title>
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
    <div id="content" class="p-1 p-mt-5 pt-5">
        <div class="card">
            <div class="card-header">
                <form class="form" method="GET" id="form" action="">
                    <!-- Table -->
                    <h4>จัดการข้อมูลวัสดุ</h4>
                    <div class="table-responsive">
                        <table class="table table-bordered text-center DataTable" id="homeTable" width="100%" cellspacing="0">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">ลำดับ</th>
                                    <th scope="col">วันที่</th>
                                    <th scope="col">ชื่อวัสดุ</th>
                                    <th scope="col">จำนวน</th>
                                    <th scope="col">ราคาต่อหน่วย</th>
                                    <th scope="col">ราคารวม</th>
                                    <th scope="col">ที่จัดเก็บ</th>
                                    <th scope="col">ประเภท</th>
                                    <th scope="col">ชื่อจำหน่าย</th>
                                    <th scope="col">เบอร์โทรจำหน่าย</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql = "SELECT
                                    material_order.mt_id,
                                    material_order.mt_buydate,
                                    material_order.mt_name,
                                    material_order.mt_amount,
                                    material_order.mt_UnitPrice,
                                    material_order.mt_price,
                                    material_order.mt_location,
                                    mattype.mtype_name,
                                    dealer.dl_name,
                                    dealer.dl_phone
                                FROM
                                    material_order
                                INNER JOIN mattype ON material_order.mtype_id = mattype.mtype_id
                                INNER JOIN dealer ON material_order.dl_id = dealer.dl_id";
                                $result = $condb->query($sql);
                                $num = 0;
                                while ($row = $result->fetch_assoc()) {
                                    $num++;
                                ?>
                                    <tr>
                                        <td><?php echo $num; ?></td>
                                        <td><?php echo $row['mt_buydate']; ?></td>
                                        <td><?php echo $row['mt_name']; ?></td>
                                        <td><?php echo $row['mt_amount']; ?></td>
                                        <td><?php echo $row['mt_UnitPrice']; ?> บาท</td>
                                        <td><?php echo $row['mt_price']; ?> บาท</td>
                                        <td><?php echo $row['mt_location']; ?></td>
                                        <td><?php echo $row['mtype_name']; ?></td>
                                        <td><?php echo $row['dl_name']; ?></td>
                                        <td><?php echo $row['dl_phone']; ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </form>
            </div>
        </div>
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