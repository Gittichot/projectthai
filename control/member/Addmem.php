<?php
session_start();
include '../../condb.php';
// $Fname = $_POST['Fname'];
// $Lname  = $_POST['Lname'];
// $tel  = $_POST['Phone'];
// $add = $_POST['Add'];
$User  = $_POST['user'];
$pass = $_POST['pass'];
$username = md5($User);
$password = md5($pass);

// echo $Fname;
// echo $Lname;
// echo $add;
// echo $tel;
// echo $User;
// echo $pass;
$sql = "INSERT INTO member(id, M_Fname, M_Lname, M_User, M_Pass, M_Add, M_Tel, M_Status)
        VALUES(null,'".$_POST['Fname']."','".$_POST['Lname']."','".$username."','".$password."','".$_POST['Add']."','".$_POST['Phone']."','2')";
$query = $condb->query($sql);
if($query){
        echo "<script>";
        echo "alert('เพิ่มข้อมูลเรียบร้อยแล้ว');";
        echo "window.location='../../ManageMember/Main.php';";
        echo "</script>";
}else{
        echo "<script";
        echo "alert('ไม่สามารถเพิ่มข้อมูลได้');";
        echo "window.location='../../ManageMember/Main.php';";
        echo "</script>";
}
?>