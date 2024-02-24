<?php
include "../Indigencyuser/config.php";

if(isset($_POST['delete'])) {
    $id  = $_POST['id'];

    $query="DELETE FROM `tblindigency` WHERE id='$id'";
    $sql = mysqli_query($conn,$query);

    header("Location: ../Indigency/Indigency.php");
}


?>