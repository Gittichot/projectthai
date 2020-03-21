<?php
session_start();
if (!$_SESSION['id']) {
    header("Location:../");
} else {
    include '../../condb.php';
    $sql = "SELECT * FROM dealer";
    $result = $condb->query($sql);

    $sql_stockname = "SELECT * FROM material_stock";
    $result_stockname = $condb->query($sql_stockname);


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

        <!--  -->
        <?php
        // include('../../condb.php'); // ดึงไฟล์เชื่อมต่อ Database เข้ามาใช้งาน
        /**
         * ตรวจสอบเงื่อนไขที่ว่า ตัวแปร $_POST['submit'] ได้ถูกกำหนดขึ้นมาหรือไม่
         */
        if (isset($_POST['submit'])) {

            $sql = "INSERT INTO `material_order`(`mt_buydate`, `mt_name`, `mt_amount`, `mt_UnitPrice`, `mt_price`, `mtype_id`, `dl_id`) 
        VALUES ('" . $_POST['mt_buydate'] . "',
                '" . $_POST['mstock_name'] . "', 
                '" . $_POST['mt_amount'] . "', 
                '" . $_POST['mt_UnitPrice'] . "', 
                '" . $_POST['mt_price'] . "', 
                '1', 
                '" . $_POST['dl_id'] . "');";

            $result = $condb->query($sql);
            /**
             * กำหนดตัวแปรเพื่อมารับค่า
             */
            $mstock_name =  $_POST['mstock_name'];
            $mt_amount =  $_POST['mt_amount'];
            // เช็คว่าข้อมูลซ้ำไหม
            $sql_check_stockname = "SELECT * FROM `material_stock` WHERE mstock_name =  '" . $mstock_name . "'";
            $check_stockname = $condb->query($sql_check_stockname);

            //ถ้าข้อมูลซ้ำให้ทำการ UPDATE 
            if ($check_stockname->num_rows > 0) {
                $data = $check_stockname->fetch_assoc();
                $mt_amount += $data["mstock_amount"];
                $sql_UPDATE_mat_order = "UPDATE material_stock SET mstock_amount='{$mt_amount}' WHERE mstock_id={$data['mstock_id']}";
                $result_UPDATE_mat_order = $condb->query($sql_UPDATE_mat_order);
            }
            if ($result_UPDATE_mat_order) {
                echo '<script> alert("สั่งซื้อวัสดุสำเร็จ!")</script>';
                header('Refresh:0; url=../');
            } else {
                echo '<script> alert("สั่งซื้อวัสดุไม่สำเร็จ!")</script>';
                header('Refresh:0;');
            }
        }
        ?>
    </head>

    <body class="sb-nav-fixed">
        <?php include 'Sidebar.php'; ?>
        <!-- Page Content  -->
        <div id="content" class="p-4 p-md-5 pt-5">
            <!-- Table Member -->
            <?php include 'MatAdd_form.php'; ?>


        </div>
        </div>

        <script>
            // ตรวจสอบการกรอกข้อมูลชนิดที่ไม่ช่ตัวเลข
            function IsNumeric(sText, obj) {
                var ValidChars = "0123456789";
                var IsNumber = true;
                var Char;
                for (i = 0; i < sText.length && IsNumber == true; i++) {
                    Char = sText.charAt(i);
                    if (ValidChars.indexOf(Char) == -1) {
                        IsNumber = false;
                    }
                }
                if (IsNumber == false) {
                    alert("กรุณากรอกเฉพาะตัวเลข 0-9");
                    obj.value = sText.substr(0, sText.length - 1);
                }
            }
        </script>

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
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