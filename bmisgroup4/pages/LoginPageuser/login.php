<?php
session_start();
include "../Residentrecord/config.php"; 

if (isset($_POST['uname']) && isset($_POST['password'])) {
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $uname = validate($_POST['uname']);
    $password = validate($_POST['password']);

    if (empty($uname)) {
        header("Location: LoginPageuser.php?error=Username is required");
        exit();
    } else if (empty($password)) {
        header("Location: LoginPageuser.php?error=Password is required");
        exit();
    } else {
        $sql = "SELECT * FROM tblresidents WHERE User='$uname' AND Pass='$password' ";

        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result)) {
           $row  = mysqli_fetch_assoc($result);
           $name= $row['name'];
           $_SESSION['name']=$name;
           $id = $row['id'];
           $_SESSION['userid']=$id;
           if($row['User'] === $uname && $row['Pass'] === $password) {
            $address = $row['address'];
            $_SESSION['address']=$address;
            $age = $row['age'];
            $_SESSION['age']=$age;
            $gender = $row['gender'];
            $_SESSION['gender']=$gender;
            $password =$row['Pass'];
            $_SESSION['password']=$password;
            
                header("Location: ../Announcementuser/Announcementuser.php");
           } else {
            header("Location: LoginPageuser.php?error=Username or Password is incorrect");
             exit();
           }
        } else {
            header("Location: LoginPageuser.php?error=Username or Password is incorrect");
            exit();
        }
    }

}else {
    header("Location: LoginPageuser.php?error");
    exit();
}

?>