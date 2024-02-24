<?php
session_start();
include "config.php";
if(isset($_POST['submit'])) {
    $id=$_POST['id'];
    $userid=$_SESSION['userid'];
    $bowner=$_POST['bowner'];
    $bname=$_POST['bname'];
    $baddress=$_POST['baddress'];
    $bbusiness=$_POST['bbusiness'];
    $ornumber=$_POST['ornumber'];
    $status=$_POST['status'];

    
    $query="INSERT INTO `tblpermits`(`id`,`user_id`,`bowner`,`bname`,`baddress`,`bbusiness`,`status`) VALUES (NULL,'$userid','$bowner','$bname','$baddress','$bbusiness','Waiting')" ;
    $sql = mysqli_query($conn,$query);

    if ($sql) {
        header("Location: ../Permituser/Permituser.php");
    }
}

?>