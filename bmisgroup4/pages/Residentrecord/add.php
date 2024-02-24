<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php
include "config.php";

if(isset($_POST['submit'])) {
    
    $name=$_POST['name'];
    $contact=$_POST['contact'];
    $age=$_POST['age'];
    $gender=$_POST['gender'];
    $address=$_POST['address'];
    $uname=$_POST['uname'];
    $password=$_POST['password'];

    $unameExist = mysqli_query($conn, "SELECT * FROM tblresidents WHERE `User` = '$uname'");
    if(mysqli_num_rows($unameExist)>0)
    {   
        echo "<script>
        window.location.href='Residentrecord.php?error=Username already existed!';
        </script>";
    }
    else{
    $query="INSERT INTO `tblresidents`(`id`,`name`,`contact`,`age`,`gender`,`address`,`User`,`Pass`,`img_url`) VALUES(NULL,'$name','$contact','$age','$gender','$address','$uname','$password','default.jpg')" ;
    $sql = mysqli_query($conn,$query);
    header("Location: ../Residentrecord/Residentrecord.php");
    
}
}
?>

