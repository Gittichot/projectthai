<?php include('../../condb.php'); ?>
<?php
$dastock_id = $_GET['id'];
if (isset($dastock_id)) {
    $sql = "DELETE FROM `durablearticles_stock` WHERE `dastock_id` = '" . $dastock_id . "'";
    $result = $condb->query($sql);

    if ($condb->affected_rows) {
        echo '<script> alert("สำเร็จ! ลบข้อมูลครุภัณฑ์เรียบร้อย")</script>';
        header('Refresh:0; url=../');
    } else {
        echo '<script> alert("ล้มเหลว! ไม่สามารถลบข้อมูลครุภัณฑ์ได้ กรุณาลองใหม่อีกครั้ง")</script>';
        header('Refresh:0; url=../');
    }
} else {
    header('Refresh:0; url=../');
}
?>
