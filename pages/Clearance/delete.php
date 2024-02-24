<?php
include "../Clearanceuser/config.php";

if(isset($_POST['delete'])) {
    $id  = $_POST['id'];

    $query="DELETE FROM `tblclearances` WHERE id='$id'";
    $sql = mysqli_query($conn,$query);

    header("Location: ../Clearance/Clearance.php");
}


?>