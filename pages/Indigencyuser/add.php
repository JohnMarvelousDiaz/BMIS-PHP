<?php
session_start();
include "config.php";
if(isset($_POST['submit'])) {
    $id=$_POST['id'];
    $userid=$_SESSION['userid'];
    $rname=$_POST['rname'];
    $age=$_POST['age'];
    $address=$_POST['address'];
    $civil=$_POST['civil'];
    $ornumber=$_POST['ornumber'];
    $status=$_POST['status'];

    
    $query="INSERT INTO `tblindigency`(`id`,`user_id`,`rname`,`age`,`address`,`civil`,`status`) VALUES (NULL,'$userid','$rname','$age','$address','$civil','Waiting')" ;
    $sql = mysqli_query($conn,$query);

    if ($sql) {
        header("Location: ../Indigencyuser/Indigencyuser.php");
    }
}

?>