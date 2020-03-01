<?php
session_start();
include '../../condb.php';
$id = $_POST['mid'];
$Fname = $_POST['Fname'];
$Lname  = $_POST['Lname'];
$tel  = $_POST['Phone'];
$add = $_POST['Add'];

// echo $id;
// echo $Fname;
// echo $Lname;
// echo $add;
// echo $tel;

$sql = "UPDATE `member` SET `M_Fname`='".$Fname."',`M_Lname`='".$Lname."',`M_Add`='".$add."',`M_Tel`='".$tel."' WHERE id = '".$id."' ";
$query = $condb->query($sql);
if($query){
    echo "<script>";
    echo "alert('แก้ไขเรียบร้อย');";
    echo "window.location='../../ManageMember/Main.php';";
    echo "</script>";
}
else{
    echo "<script>";
    echo "alert('เกิดข้อผิดพลาด');";
    echo "window.location='../../ManageMember/Main.php';";
    echo "</script>";
}

?>