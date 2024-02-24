<?php
include "config.php";
if(isset($_POST['delete'])) {
    $id  = $_POST['id'];

    $query1="DELETE FROM `tblclearances` WHERE user_id='$id'";
    $sql1 = mysqli_query($conn,$query1);

    $query2="DELETE FROM `tblindigency` WHERE user_id='$id'";
    $sql2 = mysqli_query($conn,$query2);

    $query3="DELETE FROM `tblpermits` WHERE user_id='$id'";
    $sql3 = mysqli_query($conn,$query3);

    $query4="DELETE FROM `tblblotters` WHERE user_id='$id'";
    $sql4 = mysqli_query($conn,$query4);

    $query5="DELETE FROM `tblresidents` WHERE id='$id'";
    $sql5 = mysqli_query($conn,$query5);

    header("Location: ../Residentrecord/Residentrecord.php");
}


?>