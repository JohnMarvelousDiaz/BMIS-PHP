<?php
include "config.php";
if(isset($_POST['submit'])) {
    $household=$_POST['household'];
    $contact=$_POST['contact'];
    $zone=$_POST['zone'];
    $totalm=$_POST['totalm'];
    $head=$_POST['head'];
    
    $householdExist = mysqli_query($conn, "SELECT * FROM tblhouseholds WHERE `household` = '$household'");
    if(mysqli_num_rows($householdExist)>0)
    {
        echo "<script>
        window.location.href='Household.php?error=Household No. already existed!';
        </script>";
    }
    else{
    $query="INSERT INTO `tblhouseholds`(`id`,`household`,`contact`,`zone`,`totalm`,`head`) VALUES(NULL,'$household','$contact','$zone','$totalm','$head')" ;
    $sql = mysqli_query($conn,$query);
    echo "<script> window.location.href='../Household/Household.php' </script>";
}
}
?>