<?php
session_start();
    include 'condb.php';
    $username = $_POST['username'];
    $password = $_POST['password'];
    $realuser = md5($username);
    $realpassword = md5($password);

    $sql = "SELECT * FROM member WHERE M_User = '".$realuser."' AND M_Pass = '".$realpassword."' ";
    $query = $condb->query($sql);
    $result = mysqli_fetch_array($query,MYSQLI_ASSOC);
    if($result) {
        if($result["M_Status"]==1) {
            $_SESSION["status"] = 'Admin';
            $_SESSION["id"] = $result["id"];
            $_SESSION["Fname"] = $result["M_Fname"];
            $_SESSION["Lname"] = $result["M_Lname"];
            header("location: ./Mainadmin.php");

        }
        else if($result["M_Status"]==2){
            $_SESSION["status"] = "Member";
            $_SESSION["id"] = $result["id"];
            $_SESSION["Fname"] = $result["M_Fname"];
            $_SESSION["Lname"] = $result["M_Lname"];
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
    
     ?>