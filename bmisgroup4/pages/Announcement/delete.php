<?php
include "config.php";

if(isset($_POST['delete'])) {
    $id  = $_POST['id'];

    $query="DELETE FROM `tblannouncements` WHERE id='$id'";
    $sql = mysqli_query($conn,$query);

    header("Location: ../Announcement/Announcement.php");
}


?>