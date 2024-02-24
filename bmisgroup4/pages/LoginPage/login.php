<?php
session_start();
include "db_conn.php"; 

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
        header("Location: LoginPage.php?error=Username is required");
        exit();
    } else if (empty($password)) {
        header("Location: LoginPage.php?error=Password is required");
        exit();
    } else {
        $sql = "SELECT * FROM loginform WHERE User='$uname' AND Pass='$password' ";

        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result)) {
           $row  = mysqli_fetch_assoc($result);
           $id= $row['id'];
            $_SESSION['adminid']=$id;
           if($row['User'] === $uname && $row['Pass'] === $password) {
                
                header("Location: ../Dashboard/Dashboard.php");
           } else {
            header("Location: LoginPage.php?error=Username or Password is incorrect");
             exit();
           }
        } else {
            header("Location: LoginPage.php?error=Username or Password is incorrect");
            exit();
        }
    }

}else {
    header("Location: LoginPage.php?error");
    exit();
}

?>