<?php
session_start();
include "config.php";
if(isset($_POST['submit'])) {
    $id=$_POST['id'];
    $title=$_POST['title'];
    $content=$_POST['content'];
    $date=$_POST['date'];

    
    $query="INSERT INTO `tblannouncements`(`id`,`title`,`date`,`content`) VALUES (NULL,'$title','$date','$content')" ;
    $sql = mysqli_query($conn,$query);

    if ($sql) {
        header("Location: ../Announcement/Announcement.php");
    }
}

?>