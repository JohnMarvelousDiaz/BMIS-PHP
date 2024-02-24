<?php
session_start();
include "config.php";
if(isset($_POST['submit'])) {
    $id=$_POST['id'];
    $userid=$_SESSION['userid'];
    $rname=$_POST['rname'];
    $age=$_POST['age'];
    $purpose=$_POST['purpose'];
    $civil=$_POST['civil'];
    $ornumber=$_POST['ornumber'];
    $status=$_POST['status'];

    
    $query="INSERT INTO `tblclearances`(`id`,`user_id`,`rname`,`age`,`purpose`,`civil`,`status`) VALUES (NULL,'$userid','$rname','$age','$purpose','$civil','Waiting')" ;
    $sql = mysqli_query($conn,$query);

    if ($sql) {
        header("Location: ../Clearanceuser/Clearanceuser.php");
    }
}

?>