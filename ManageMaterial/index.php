<?php
session_start();
if (!$_SESSION['id']) {
    header("Location:../");
} else {
    include '../condb.php';
    // ฟังก์ชันนับเดือน
    $now = new \DateTime('now');
    $month = $now->format('m');

    // ฟังก์ชันนับปี พ.ศ.ป
    $now = new \DateTime('now');
    $year = $now->format('Y');

    // ฟังก์ชันนับวัน
    $d = cal_days_in_month(CAL_GREGORIAN, $month, $year);

    // หาจำนวนของข้อมูลรายปีแบบ array
    $sql_check_stock_year = "SELECT SUM(material_order.mt_amount) AS Total, material_order.mt_name, material_stock.mstock_name FROM material_order INNER JOIN material_stock WHERE material_order.mt_name = material_stock.mstock_name AND YEAR(material_order.mt_buydate) = '" . $year . "' GROUP BY material_order.mt_name ";
    $result_check_stock_year = $condb->query($sql_check_stock_year);
    $stock_year = [];
    while ($query_stock_year = mysqli_fetch_array($result_check_stock_year, MYSQLI_ASSOC)) {
        $stock_year[] = $query_stock_year["Total"];
    }
    // echo count($stock_year)."<br>";
    for ($i = 0; $i < count($stock_year); $i++) {
        // สถิติต่อปี
        // echo $stock_year[$i], ", ";
    }
    //  echo "<br>";

    // หาจำนวนของข้อมูลรายเดือนแบบ array
    $sql_check_stock_month = "SELECT SUM(material_order.mt_amount) AS Total, material_order.mt_name, material_stock.mstock_name FROM material_order INNER JOIN material_stock WHERE material_order.mt_name = material_stock.mstock_name AND MONTH(material_order.mt_buydate) = '" . $month . "' AND YEAR(material_order.mt_buydate) = '" . $year . "' GROUP BY material_order.mt_name ";
    $result_check_stock_month = $condb->query($sql_check_stock_month);
    $stock_month = [];
    while ($query = mysqli_fetch_array($result_check_stock_month, MYSQLI_ASSOC)) {
        $stock_month[] = $query["Total"];
    }
    // echo count($stock_month)."<br>";
    for ($i = 0; $i < count($stock_month); $i++) {
        // สถิติต่อเดือน
        // echo $stock_month[$i], ", ";
    }
    //  echo "<br>";
    // คำนวณ
    $avg_stock = [];
    for ($i = 0; $i < count($stock_month); $i++) {
        // หาค่าเฉลี่ยต่อวัน
        $avg[$i] =  ceil($stock_month[$i] / $d);
        // echo"ค่าเฉลี่ย:";
        // echo $avg[$i].",";
    }
    // echo "<br>";
    // เรียกข้อมูลจำนวนวัสดุในคลัง
    $sql_amount = "SELECT material_stock.mstock_name, material_stock.mstock_amount,material_stock.mstock_waittime FROM material_stock INNER JOIN material_order WHERE material_stock.mstock_name = material_order.mt_name GROUP BY material_stock.mstock_name";
    $result_amount = $condb->query($sql_amount);
    $stock_name = [];
    $stock_amount = [];
    $stock_wait = [];
    while ($query_amount = mysqli_fetch_array($result_amount, MYSQLI_ASSOC)) {
        $stock_name[] = $query_amount["mstock_name"];
        $stock_amount[] = $query_amount["mstock_amount"];
        $stock_wait[] = $query_amount["mstock_waittime"];
    }
    $str = "";
    for ($i = 0; $i < count($stock_amount); $i++) {
        if ($stock_amount[$i] < $avg[$i]) {
            $newstock = ceil($avg[$i] * $stock_wait[$i] * 1.1); //1.1คือ 110%
            $str = $str . " สินค้า : " . $stock_name[$i] . " มีจำนวน : " . $stock_amount[$i] . " ชิ้น ควรซื้อเพิ่มอย่างน้อย : " . $newstock . " ชิ้น \\n";
        }
        // echo $stock_name[$i].",".$stock_amount[$i]."<br>";
    }
    if ($str != "") {
        echo "<script> alert('" . $str . "')</script>";
    }

    // เรียกข้อมูลมาโชว์ในตาราง
    $sql = "SELECT * FROM `material_stock`";
    $result = $condb->query($sql);
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

    <body class="sb-nav-fixed">
        <?php include 'Sidebar.php'; ?>
        <!-- Page Content  -->
        <div id="content" class="p-4 p-md-5 pt-5">
            <!-- Table Member -->
            <?php include 'table_material.php'; ?>

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
        <script>
            function deleteItem(id) {
                if (confirm('คุณต้องการลบข้อมูลใช่หรือไม่') == true) {
                    window.location = `Del/del_mat.php?id=${id}`;
                }
            };
        </script>
    </body>

    </html>
<?PHP } ?>