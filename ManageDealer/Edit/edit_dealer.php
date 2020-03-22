<?php
session_start();
if (!$_SESSION["id"]) {
    echo "<script>";
    echo "alert('ท่านไม่มีสิทธิ์การเข้าใช้งาน');";
    echo "window.location='../';";
    echo "</script>";
} else {
    include '../../condb.php';
    $dl_id = $_GET['id'];
    $sql = "SELECT * FROM `dealer` WHERE `dl_id` = '" . $dl_id . "'  ";
    $result = $condb->query($sql);
    $row = $result->fetch_assoc();

    if (empty($row)) {
        echo '<script> alert("ไม่พบข้อมูลที่ต้องการแก้ไข !")</script>';
        echo '<script> window.location = "../"</script>';
    }
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
            /**
             * กำหนดตัวแปรเพื่อมารับค่า
             */
            $dl_id = $_POST['dl_id'];
            $dl_fname =  $_POST['dl_fname'];
            $dl_lname =  $_POST['dl_lname'];
            $dl_phone =  $_POST['dl_phone'];
            // เช็คว่าข้อมูลซ้ำไหม
            $sql_check_stockname = "SELECT * FROM `dealer` WHERE dl_name =  '" . $dl_fname . "' AND `dl_lname` =  '" . $dl_lname . "'";
            $check_stockname = $condb->query($sql_check_stockname);

            $check = true;
            if ($_POST["dl_fname_old"] == $dl_fname) {
                $check = false;
            }

            if (!empty($check_stockname->num_rows) && $check) {
                echo '<script> alert("มีข้อมูลนี้อยู่ในระบบแล้ว!")</script>';
                header('Refresh:0;');
                exit;
            }
            //ตรวจสอบชื่อวัสดุซ้ำหรือไม่
            $sql_update_dealer = "UPDATE `dealer`
                                 SET `dl_fname`= '" . $dl_fname . "',
                                     `dl_lname`= '" . $dl_lname . "',
                                     `dl_phone`= '" . $dl_phone . "'
                            WHERE dl_id = '" . $dl_id . "';";

            $result_update_dealer = $condb->query($sql_update_dealer);
            echo $result_update_dealer;
            if ($result_update_dealer) {
                echo '<script> alert("แก้ไขข้อมูลสำเร็จ !")</script>';
                header('Refresh:0; url=../');
            } else {
                echo '<script> alert("แก้ไขข้อมูลไม่สำเร็จ!")</script>';
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
            <?php include 'form_edit.php'; ?>
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