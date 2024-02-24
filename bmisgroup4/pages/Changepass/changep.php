<?php 
include('Changepass.php');
$user_id =$_SESSION['userid'];
if (isset($_POST['oldpass']) && isset($_POST['newpass']) && isset($_POST['confirmpass'])) {

    function validate($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $oldpass = validate($_POST['oldpass']);
    $newpass = validate($_POST['newpass']);
    $confirmpass = validate($_POST['confirmpass']);

    if(empty($oldpass)){
        echo "<script>window.location.href='Changepass.php?error=Old Password is required';</script>";
        exit();
    }
    else if(empty($newpass)){
        echo "<script>window.location.href='Changepass.php?error=New Password is required';</script>";
        exit();
    }
    else if(empty($confirmpass)){
        echo "<script>window.location.href='Changepass.php?error=Confirm your Password';</script>";
        exit();
    }
    else{
        $sql = "SELECT Pass FROM  tblresidents WHERE id='$user_id' AND Pass='$oldpass' AND '$newpass'='$confirmpass'";
        $result = mysqli_query($conn, $sql);
        
        if (mysqli_num_rows($result) === 1) {
            $sql_2 = "UPDATE tblresidents SET Pass ='$newpass' WHERE id='$user_id'";
            $result_2 = mysqli_query($conn, $sql_2);
            echo "<script>window.location.href='Changepass.php?success=Password changed successfully';</script>";

            exit();
        }
        else {
            echo "<script>window.location.href='Changepass.php?error=Password did not match';</script>";

            exit();
        }
    }
}
else {
    echo "<script>window.location.href='Changepass.php';</script>";
}
?>