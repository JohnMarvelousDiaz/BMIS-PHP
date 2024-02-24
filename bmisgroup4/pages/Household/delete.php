<?php
include "config.php";

if(isset($_POST['delete'])) {
    $id  = $_POST['id'];

    $query="DELETE FROM `tblhouseholds` WHERE id='$id'";
    $sql = mysqli_query($conn,$query);

    header("Location: ../Household/Household.php");
}


?>