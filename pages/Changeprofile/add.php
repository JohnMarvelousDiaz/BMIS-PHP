<?php
isset($_SESSION) || session_start();
$userid=$_SESSION['userid'];
include "config.php";
if (isset($_POST['submit'])) {
    if($_FILES['image']['error'] === 4){
        echo "<script>
        window.location.href='Changeprofile.php?error=Image Does not Exist';
        </script>";
    }else{
        $fileName =$_FILES['image']['name'];
        $fileSize =$_FILES['image']['size'];
        $tmpName =$_FILES['image']['tmp_name'];

        $validImageExtension =['jpg' ,'jpeg', 'png'];
        $imageExtension = explode('.', $fileName);
        $imageExtension = strtolower(end($imageExtension));
        if(!in_array($imageExtension, $validImageExtension)) {
            echo "<script>
        window.location.href='Changeprofile.php?error=Invalid Image Extension';
        </script>";
        }else if($fileSize > 1000000) {
            echo "<script>
            window.location.href='Changeprofile.php?error=Image Size is too large';
            </script>";
        }else{
            $newImageName = uniqid();
            $newImageName1 = $newImageName. '.' .$imageExtension;

            move_uploaded_file($tmpName, '../../image/'.$newImageName1);
            $query="UPDATE tblresidents SET img_url='$newImageName1' WHERE id='$userid'";
            $sql = mysqli_query($conn,$query);
            echo "<script>
            window.location.href='Changeprofile.php?success=Successfully Added';
            </script>";
        }
    }
}

?>