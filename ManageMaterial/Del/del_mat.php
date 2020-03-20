<?php include('../../condb.php'); ?>
<?php
$mstock_id = $_GET['id'];
if (isset($mstock_id)) {
    $sql = "DELETE FROM `material_stock` WHERE `mstock_id` = '" . $mstock_id . "'";
    $result = $condb->query($sql);

    if ($condb->affected_rows) {
        echo '<script> alert("สำเร็จ! ลบข้อมูลวัสดุเรียบร้อย")</script>';
        header('Refresh:0; url=../');
    } else {
        echo '<script> alert("ล้มเหลว! ไม่สามารถลบข้อมูลวัสดุได้ กรุณาลองใหม่อีกครั้ง")</script>';
        header('Refresh:0; url=../');
    }
} else {
    header('Refresh:0; url=../');
}
?>
