<?php
include "config.php";
if(isset($_POST['submit'])) {
    $id=$_POST['id'];
    $name=$_POST['name'];
    $contact=$_POST['contact'];
    $address=$_POST['address'];
    $position=$_POST['position'];
    $start=$_POST['start'];
    $end=$_POST['end'];
    

    $query="INSERT INTO `tblofficials`(`id`,`name`,`contact`,`address`,`position`,`start`,`end`) VALUES(NULL,'$name','$contact','$address','$position','$start','$end')" ;
    $sql = mysqli_query($conn,$query);

    if ($sql) {
        header("Location: ../Officials/Officials.php");
    }
}

?>