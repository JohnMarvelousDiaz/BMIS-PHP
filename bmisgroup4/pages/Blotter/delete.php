<?php
include "../Blotteruser/config.php";

if(isset($_POST['delete'])) {
    $id  = $_POST['id'];

    $query="DELETE FROM `tblblotters` WHERE id='$id'";
    $sql = mysqli_query($conn,$query);

    header("Location: ../Blotter/Blotter.php");
}


?>