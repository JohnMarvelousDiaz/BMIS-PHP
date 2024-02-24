<?php
include "../Blotteruser/config.php";

if(isset($_POST['delete'])) {
    $id  = $_POST['id'];

    $query="DELETE FROM `tblpermits` WHERE id='$id'";
    $sql = mysqli_query($conn,$query);

    header("Location: ../Certificates/Certificates.php");
}


?>