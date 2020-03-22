<?php
session_start();
if (!$_SESSION["id"]) {
    echo "<script>";
    echo "alert('ท่านไม่มีสิทธิ์การเข้าใช้งาน');";
    echo "window.location='../';";
    echo "</script>";
} else {
    include '../../condb.php';
    $sql = "SELECT * FROM dealer";
    $result = $condb->query($sql);

?>
    <!doctype html>
    <html lang="en">

    <head>
        <title>สั่งซื้อวัสดุ</title>
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

            $da_name = $_POST['da_name'];
            $da_buydate = $_POST['da_buydate'];
            $da_amount = $_POST['da_amount'];
            $da_price = $_POST['da_price'];
            $dastock_detel = $_POST['dastock_detel'];
            $dastock_location = $_POST['dastock_location'];
            $dl_id = $_POST['dl_id'];

            $sql_order = "INSERT INTO `durablearticles_order`(`da_buydate`, `da_name`, `da_amount`, `da_price`, `mtype_id`, `dl_id`)  
                VALUES ('" . $da_buydate . "',
                        '" . $da_name . "', 
                        '" . $da_amount . "', 
                        '" . $da_price . "',  
                        '2', 
                        '" . $dl_id . "');";

                $result_order = $condb->query($sql_order);

            $sql_storck = "INSERT INTO `durablearticles_stock`(`dastock_name`, `dastock_detel`, `dastock_amoun`, `dastock_location`)
                VALUES ('" . $da_name . "',
                        '" . $dastock_detel . "',
                        '" . $da_amount . "',
                        '" . $dastock_location . "');";
            
            $result_stock = $condb->query($sql_storck);

            if ($result_order == TRUE AND $result_stock == TRUE) {
                echo '<script> alert("สั่งซื้อครุภัณฑ์สำเร็จ!")</script>';
                header('Refresh:0; url=../');
            } else {
                echo '<script> alert("สั่งซื้อครุภัณฑ์ไม่สำเร็จ!")</script>';
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
            <?php include 'durableAdd_form.php'; ?>


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