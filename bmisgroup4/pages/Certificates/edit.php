<?php
session_start();
include "config.php";
if(empty($_SESSION['adminid']))
{
    header('Location:../LoginPage/LoginPage.php');
}
else
{
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/Certificates_edit.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />  
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" />  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>  
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <link rel="icon" href="../../images/bmsLogo.png">
    <title>Permit</title>
</head>
<body>
<div id="navbar" class="navbar-font">
      <a href="../logout_admin.php" id="admin-nav"  ><img src="../../images/admin.png" alt="default profile" id="navbar-pic" >Log Out<i class="fa-solid fa-right-from-bracket" style="margin-left: 5px;"></i></a>

      <a href="../Dashboard/Dashboard.php">
    <img src="../../images/bmsLogo.png" alt="bmsLogo" id="bmsLogo" class="w3-bar-item"> 
        <h4 id="name">BARANGAY BANCAL </h4> </a>
    </div>
    <div id="sidebar" class="sidebar-font">
    <img src="../../images/admin.png" alt="default profile" id="sidebar-pic" >
        <h4 id="hello">Hello Administrator!</h4>
        <a href="../Dashboard/Dashboard.php" class="dashboard "><i class="fa-solid fa-chart-area"></i>Dashboard</a>
        <a href="../Officials/Officials.php" class="officials"><i class="fa-solid fa-users"></i>Officials</a>
        <a href="../Residentrecord/Residentrecord.php" class="residentrecord"><i class="fa fa-address-card"></i>Resident Record</a>
        <a href="../Household/Household.php" class="household"><i class="fa-solid fa-house-user"></i>Household</a>
        <a href="../Blotter/Blotter.php" class="blotter"><i class="fa-solid fa-stamp"></i>Blotter</a>
        <button class="certs"><i class="fa-regular fa-newspaper"></i>Certification<i class="fa-solid fa-circle-chevron-down" style="margin-left: 32px;"></i></button>
        <div id="certs">
        <a href="../Certificates/Certificates.php" class="certs active"><i class="fa-solid fa-clipboard-check"></i>Permit</a>
        <a href="../Clearance/Clearance.php" class="certs"><i class="fa-solid fa-person-circle-check"></i>Clearance</a>
        <a href="../Indigency/Indigency.php" class="certs"><i class="fa-solid fa-id-card"></i>Indigency</a>
        </div>
        <a href="../Announcement/Announcement.php" class="announcement"><i class="fa-solid fa-bullhorn"></i>Announcements</a>
        <span id='ct7'  style="color: white;
                               font-size: 13px;
                               position:fixed;
                               bottom:10px;
                               left: 23px;
                               "></span>
        
    </div>
    <div class="main">
    <?php
      include "../Permituser/config.php";
      $id = $_POST['id'];
      $query = "SELECT * FROM `tblpermits` WHERE `id`='$id'";
      $sql = mysqli_query($conn, $query);

      if($sql) {
        $row = mysqli_fetch_array($sql)
          ?>
      <div class="loginPopup">
            <div class="formPopup" id="popupForm">
              <form action="" method="post" class="formContainer" autocomplete="off">
              <input type="hidden" name="id" value="<?php echo $row['id']?>"> 
     
                <a href="Certificates.php"><i class="fa-sharp fa-solid fa-xmark" area-hidden="true" id="close-icon" ></i></a>
                
                <div class="form-group col-sm-6">  
                    <strong>Business Owner:</strong>  
                    <input type="text" name="bowner" class="form-control" readonly  value="<?php echo $row['bowner'];?>">  
                  </div>  
                    
                  <div class="form-group col-sm-6">  
                    <strong>Business Name:</strong>  
                    <input type="text" name="bname" class="form-control" readonly  value="<?php echo $row['bname'];?>">  
                  </div>  
      
                  <div class="form-group col-sm-6">  
                      <strong>Business Address:</strong>  
                      <input type="text" name="baddress" class="form-control" readonly  value="<?php echo $row['baddress'];?>">  
                  </div>  
      
                  <div class="form-group col-sm-6">  
                    <strong>Type of Business:</strong>  
                    <input type="text" name="bbusiness" class="form-control" readonly  value="<?php echo $row['bbusiness'];?>">  
                </div>   

                <div class="form-group col-sm-6">  
                    <strong>OR Number :</strong>  
                    <input type="number" name="ornumber" class="form-control" value="<?php echo $row['ornumber'];?>">  
                </div>   

                <div class="form-group col-sm-6 " >  
                        <strong for="status">Status:</strong>  </br>
                        <select name="status" class="form-control">
                          <option disabled selected>Please Select</option>
                          <option value="Approved" <?php echo ($row['status']=='Approved')?"selected":"";?>>Approved</option>
                          <option value="Denied" <?php echo ($row['status']=='Denied')?"selected":"";?>>Denied</option>
                        </select>
                    </div>


                

                <input type="submit" name="submit" id="btn-permit" value="Update Permit" class="btn btn-success save-btn form-control" >
          </form>
        </div>
        <?php
          if(isset($_POST['submit']) ) {
            $id=$_POST['id'];
            $bowner=$_POST['bowner'];
            $bname=$_POST['bname'];
            $baddress=$_POST['baddress'];
            $bbusiness=$_POST['bbusiness'];
            $ornumber=$_POST['ornumber'];
            $status=$_POST['status'];
            
            $ornumberExist = mysqli_query($conn, "SELECT * FROM tblpermits WHERE `ornumber` = '$ornumber' AND `id` !='$id'");
            if(mysqli_num_rows($ornumberExist)>0)
            {
            echo "<script>
            window.location.href='Certificates.php?error=OR number already given!';
            </script>";
            }
            else{
            $query = "UPDATE `tblpermits` SET `bowner`='$bowner',`bname`='$bname',`baddress`='$baddress',`bbusiness`='$bbusiness',`ornumber`='$ornumber',`status`='$status',`date`=NOW() WHERE id='$id'";
            $sql = mysqli_query($conn,$query);  
            echo "<script> window.location.href='Certificates.php' </script>";
            }
        }
      }
    
    ?>
    <h3 style="color: #2C8F82; text-align: left;">Permit</h3>
    <hr style="border: 1px solid #37B3A3;">
    <div class="table-responsive text-nowrap" id="table">
    <table id="example" class="table table-bordered table-hover " style="width:100%;">  
            <thead>  
              <th width="160px">Business Owner</th>  
              <th width="160px">Business Name</th> 
              <th width="180px">Business Address</th> 
              <th width="120px">Type of Business</th> 
              <th width="80px">OR Number</th>
              <th width="100px">Status</th>
              <th width="60px">Edit</th>  
              <th width="60px">Delete</th> 
            </thead>  
            <tbody>  
            <?php
                $sql = "SELECT * FROM `tblpermits`";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($result)) {
                  ?>
                  <tr class="text-center">
                    <td><?php echo $row['bowner'] ?></td>
                    <td><?php echo $row['bname'] ?></td>
                    <td><?php echo $row['baddress'] ?></td>
                    <td><?php echo $row['bbusiness'] ?></td>
                    <td><?php echo $row['ornumber'] ?></td>
                    <td><?php echo $row['status'] ?></td>
                    <td>
                    <form action="edit.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $row['id']?>">
                    <input type="submit" class='btn btn-info btn-xs btn-update' name="edit" value="Edit">
                    </td>
                   </form>
                   <form action="delete.php" method="post">
                    <td>
                    <input type="hidden" name="id" value="<?php echo $row['id']?>">
                    <input type="submit" class='btn btn-danger btn-xs btn-delete' name="delete" value="Delete">
                    </td>
                   </form>
                </tr>
                <?php
                }
              ?>
            </tbody>  
          </table>
          </div>
    </div>
    <script type="text/javascript">  
       var dropdown = document.getElementsByClassName("certs");
var i;

for (i = 0; i < dropdown.length; i++) {
  dropdown[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var dropdownContent = this.nextElementSibling;
    if (dropdownContent.style.display === "block") {
      dropdownContent.style.display = "none";
    } else {
      dropdownContent.style.display = "block";
    }
  });
}
    $(document).ready(function () {
    $('#example').DataTable({
        pagingType: 'full_numbers',
        "scrollX": true,
         "scrollY": 420,
    });
    $('.dataTables_length').addClass('bs-select');
  });
    function display_ct7() {
    var x = new Date()
    var ampm = x.getHours( ) >= 12 ? ' PM' : ' AM';
    hours = x.getHours( ) % 12;
    hours = hours ? hours : 12;
    hours=hours.toString().length==1? 0+hours.toString() : hours;
    
    var minutes=x.getMinutes().toString()
    minutes=minutes.length==1 ? 0+minutes : minutes;
    
    var seconds=x.getSeconds().toString()
    seconds=seconds.length==1 ? 0+seconds : seconds;
    
    var month=(x.getMonth() +1).toString();
    month=month.length==1 ? 0+month : month;
    
    var dt=x.getDate().toString();
    dt=dt.length==1 ? 0+dt : dt;
    
    var x1=month + "/" + dt + "/" + x.getFullYear(); 
    x1 = x1 + " - " +  hours + ":" +  minutes + ":" +  seconds + " " + ampm;
    document.getElementById('ct7').innerHTML = x1;
    display_c7();
     }
     function display_c7(){
    var refresh=1000; // Refresh rate in milli seconds
    mytime=setTimeout('display_ct7()',refresh)
    }
    display_c7()
    var h1 = document.getElementById('dateandtime');
    if (h1) {
     h1.innerHTML = display_ct7();
    }
    </script>
</body>
</html>
    <?php } ?>