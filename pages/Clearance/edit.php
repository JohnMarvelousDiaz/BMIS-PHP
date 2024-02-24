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
    <link rel="stylesheet" href="../../css/Clearance_edit.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />  
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" />  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>  
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <link rel="icon" href="../../images/bmsLogo.png">
    <title>Clearance</title>
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
        <a href="../Certificates/Certificates.php" class="certs"><i class="fa-solid fa-clipboard-check"></i>Permit</a>
        <a href="../Clearance/Clearance.php" class="certs active"><i class="fa-solid fa-person-circle-check"></i>Clearance</a>
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
      include "../Clearanceuser/config.php";
      $id = $_POST['id'];
      $query = "SELECT * FROM tblclearances WHERE `id`='$id'";
      $sql = mysqli_query($conn, $query);

      if($sql) {
        $row = mysqli_fetch_array($sql)
          ?>
          <div class="loginPopup">
          <div class="formPopup" id="popupForm">
            <form method="post" action="" class="formContainer" autocomplete="off">
            <input type="hidden" name="id" value="<?php echo $row['id']?>"> 

   
              <a href="Clearance.php"><i class="fa-sharp fa-solid fa-xmark" area-hidden="true" id="close-icon"></i></a>
              
              <div class="form-group col-sm-6">  
                  <strong>Resident Name:</strong>  
                  <input type="text" name="rname" class="form-control"  readonly value="<?php echo $row['rname'];?>">  
                </div>  
                  
                <div class="form-group col-sm-6">  
                  <strong>Age:</strong>  
                  <input type="number" min="16"name="age" class="form-control" readonly value="<?php echo $row['age'];?>">  
                </div>  

                <div class="form-group col-sm-6">  
                  <strong>Purpose:</strong>  
                  <input type="text" name="purpose" class="form-control" readonly value="<?php echo $row['purpose'];?>">  
                </div>  

                <div class="form-group col-sm-6">  
                  <strong for="civil">Civil Status:</strong>  
                  <select disabled selected name="civil" class="form-control" >
                      <option disabled selected>Please Select</option>
                      <option value="Single" <?php echo ($row['civil']=='Single')?"selected":"";?>>Single</option>
                      <option value="Married" <?php echo ($row['civil']=='Married')?"selected":"";?>>Married</option>
                      <option value="Widowed" <?php echo ($row['civil']=='Widowed')?"selected":"";?>>Widowed</option>
                      <option value="Divorced" <?php echo ($row['civil']=='Divorced')?"selected":"";?>>Divorced</option>
                      <option value="Separated" <?php echo ($row['civil']=='Separated')?"selected":"";?>>Separated</option>
                  </select> 
                </div>  

                <div class="form-group col-sm-6">  
                    <strong>OR Number :</strong>  
                    <input type="number" name="ornumber" class="form-control" value="<?php echo $row['ornumber'];?>">  
                </div>   

                <div class="form-group col-sm-6 " >  
                        <strong for="status">Status:</strong></br>
                        <select name="status" class="form-control">
                          <option disabled selected>Please Select</option>
                          <option value="Approved" <?php echo ($row['status']=='Approved')?"selected":"";?>>Approved</option>
                          <option value="Denied" <?php echo ($row['status']=='Denied')?"selected":"";?>>Denied</option>
                        </select>
                    </div>

                
                 <input type="submit" name="submit" id="btn-clearance" value="Update Clearance" class="btn btn-success save-btn form-control" >
        </form>
      </div>
      <?php
      if(isset($_POST['submit']) ) {
            $id=$_POST['id'];
            $rname=$_POST['rname'];
            $age=$_POST['age'];
            $purpose=$_POST['purpose'];
            $ornumber=$_POST['ornumber'];
            $status=$_POST['status'];
            
            $ornumberExist = mysqli_query($conn, "SELECT * FROM tblclearances WHERE `ornumber` = '$ornumber' AND `id` !='$id'");
            if(mysqli_num_rows($ornumberExist)>0)
            {
              echo "<script>
              window.location.href='Clearance.php?error=OR number already given!';
              </script>";
            }
            else{
            $query = "UPDATE `tblclearances` SET `rname`='$rname',`age`='$age',`purpose`='$purpose',`ornumber`='$ornumber',`status`='$status',`date`=NOW() WHERE id='$id'";
            $sql = mysqli_query($conn,$query);  
            echo "<script> window.location.href='../Clearance/Clearance.php' </script>";
            }
          }       
      }   
    ?>
    <h3 style="color: #2C8F82; text-align: left;">Clearance</h3>
    <hr style="border: 1px solid #37B3A3;">
    <div class="table-responsive text-nowrap" id="table">
    <table id="example" class="table table-bordered table-hover " style="width:100%;">  
            <thead>  
            <th width="180px">Resident Name</th>  
              <th width="100px">Age</th> 
              <th width="120px">Purpose</th> 
              <th width="120px">Civil Status</th> 
              <th width="120px">OR Number</th>
              <th width="120px">Status</th>
              <th width="70px">Edit</th>  
              <th width="70px">Delete</th> 
            </thead>  
            <tbody> 
            <?php
                $sql = "SELECT * FROM tblclearances";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($result)) {
                  ?>
                  <tr class="text-center">
                    <td><?php echo $row['rname'] ?></td>
                    <td><?php echo $row['age'] ?></td>
                    <td><?php echo $row['purpose'] ?></td>
                    <td><?php echo $row['civil'] ?></td>
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
