<?php
session_start();
include "config.php";
if(isset($_POST['submit'])) {
    $id=$_POST['id'];
    $userid=$_SESSION['userid'];
    $complainant=$_POST['complainant'];
    $ptc=$_POST['ptc'];
    $complaint=$_POST['complaint'];
    $loi=$_POST['loi'];
    $date=$_POST['date'];
    $status=$_POST['status'];

    
    $query="INSERT INTO `tblblotters`(`id`,`user_id`,`complainant`,`ptc`,`complaint`,`loi`,`status`) VALUES (NULL,'$userid','$complainant','$ptc','$complaint','$loi','Waiting')" ;
    $sql = mysqli_query($conn,$query);

    if ($sql) {
        header("Location: ../Blotteruser/Blotteruser.php");
    }
}

?>