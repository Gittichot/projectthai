<?php
session_start();
include '../../condb.php';
$id = $_GET['delid'];
$booking = "SELECT * FROM booking AS A INNER JOIN booking_detail AS B ON A.Bo_id = B.Boo_id WHERE Bo_id = '".$id."'";
$querybo = $condb->query($booking);
$row = mysqli_fetch_array($querybo,MYSQLI_ASSOC);
$pid = $row["P_id"];
$quantity = $row["Boo_amount"];
?>