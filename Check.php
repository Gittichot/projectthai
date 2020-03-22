<?php
session_start();
    include './condb.php';
    error_reporting(0);
    if(empty($_POST['password'])){
        echo "<script>";
        echo "alert('Please Input your Password');";
        echo "window.location='./index.php';";
        echo "</script>";
    }
    else if(empty($_POST['username'])){
        echo "<script>";
        echo "alert('Please Input your Username');";
        echo "window.location='./index.php';";
        echo "</script>";
    }
    else {
        $username = $_POST['username'];
    $password = $_POST['password'];
    $protectuser = $condb->real_escape_string($username);
    $protectpass = $condb->real_escape_string($password);
    $realuser = md5($protectuser);
    $realpassword = md5($protectpass);

    $sql = "SELECT * FROM member WHERE M_User = '".$realuser."' AND M_Pass = '".$realpassword."' ";
    $query = $condb->query($sql);
    $result = mysqli_fetch_array($query,MYSQLI_ASSOC);
    if($result) {
        if($result["M_Status"]==1) {
            $_SESSION["status"] = 'Admin';
            $_SESSION["id"] = $result["id"];
            $_SESSION["cart_item"] = '';
            header("location: ./Mainadmin.php");

        }
        else if($result["M_Status"]==2){
            $_SESSION["status"] = "Member";
            $_SESSION["id"] = $result["id"];
            $_SESSION["Fname"] = $result["M_Fname"];
            $_SESSION["Lname"] = $result["M_Lname"];
            $fname = $_SESSION["Fname"];
            $lname = $_SESSION["Lname"];
            $_SESSION["cart_member"] = '';
            header("location: ./Member/MainMember.php");

        }
        else {
            echo "<script>";
            echo "alert('Your Username and Password is Wrong');";
            echo "window.location='./index.php';";
            echo "</script>";

        }
    }
    else {
        echo "<script>";
        echo "alert('Your Username and Password is Wrong');";
        echo "window.location='./index.php';";
        echo "</script>";
    }
}
    
    
     ?>