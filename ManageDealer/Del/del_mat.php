<?php include('../../condb.php'); ?>
<?php
$dl_id = $_GET['id'];
if (isset($dl_id)) {
    $sql = "DELETE FROM `dealer` WHERE `dl_id` = '" . $dl_id . "'";
    $result = $condb->query($sql);

    if ($condb->affected_rows) {
        echo '<script> alert("สำเร็จ! ลบข้อมูลผู้จำหน่าย เรียบร้อย")</script>';
        header('Refresh:0; url=../');
    } else {
        echo '<script> alert("ล้มเหลว! ไม่สามารถลบข้อมูลผู้จำหน่ายได้ กรุณาลองใหม่อีกครั้ง")</script>';
        header('Refresh:0; url=../');
    }
} else {
    header('Refresh:0; url=../');
}
?>
