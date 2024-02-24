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
    <link rel="stylesheet" href="../../css/Officials_edit.css"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />  
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" />  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>  
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <link rel="icon" href="../../images/bmsLogo.png">
    <title>Officials</title>
</head>
<body>
<div id="navbar" class="navbar-font">
      <a href="../logout_admin.php" id="admin-nav"  ><img src="../../images/admin.png" alt="default profile" id="navbar-pic" >Log Out<i class="fa-solid fa-right-from-bracket" style="margin-left: 5px;"></i></a>

      <a href="../Dashboard/Dashboard.php">
    <img src="../../images/bmsLogo.png" alt="bmsLogo" id="bmsLogo" class="w3-bar-item"> 
        <h4 id="name">BARANGAY BANCAL </h4> </a>
    </div>
    
    <<div id="sidebar" class="sidebar-font">
    <img src="../../images/admin.png" alt="default profile" id="sidebar-pic" >
        <h4 id="hello">Hello Administrator!</h4>
        <a href="../Dashboard/Dashboard.php" class="dashboard"><i class="fa-solid fa-chart-area"></i>Dashboard</a>
        <a href="../Officials/Officials.php" class="officials active"><i class="fa-solid fa-users"></i> Officials</a>
        <a href="../Residentrecord/Residentrecord.php" class="residentrecord"><i class="fa fa-address-card"></i>    Resident Record</a>
        <a href="../Household/Household.php" class="household"><i class="fa-solid fa-house-user"></i>Household</a>
        <a href="../Blotter/Blotter.php" class="blotter"><i class="fa-solid fa-stamp"></i>Blotter</a>
        <button class="certs"><i class="fa-regular fa-newspaper"></i>Certification<i class="fa-solid fa-circle-chevron-down" style="margin-left: 32px;"></i></button>
        <div id="certs">
        <a href="../Certificates/Certificates.php" class="certs"><i class="fa-solid fa-clipboard-check"></i>Permit</a>
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
    <button type="submit" id="btn-submit" onclick="openForm()">Add Official</button>  
    <hr style="border: 1px solid #37B3A3;">
    <?php
      include "config.php";
      $id = $_POST['id'];

      $query = "SELECT * FROM `tblofficials` WHERE id='$id'";
      $sql = mysqli_query($conn, $query);

      if($sql) {
        $row = mysqli_fetch_array($sql)
          ?>
           <div class="loginPopup">
        <div class="formPopup" id="popupForm">
          <form method="post" action="edit.php" class="formContainer" autocomplete="off">
          <input type="hidden" name="id" value="<?php echo $row['id']?>"> 
            <a href="Officials.php"><i class="fa-sharp fa-solid fa-xmark" area-hidden="true" id="close-icon" ></i></a>
            
            <div class="form-group col-sm-6">  
                <strong>Name:</strong>  
                <input type="text" name="name" class="form-control" value="<?php echo $row['name']?>" >  
              </div>  
                
              <div class="form-group col-sm-6">  
                <strong>Contact:</strong>  
                <input type="text" name="contact" class="form-control" value="<?php echo $row['contact']?>" >  
              </div>  
  
              <div class="form-group col-sm-6">  
                  <strong>Zone:</strong>  
                  <input type="text" name="address" class="form-control" value="<?php echo $row['address']?>">  
              </div>  
  
              <div class="form-group col-sm-6">  
                  <strong>Position:</strong>  
                  <input type="text" name="position" class="form-control" value="<?php echo $row['position']?>" >  
              </div>  
  
              <div class="form-group col-sm-6">  
                  <strong>Start of Term:</strong>  
                  <input type="date" name="start" class="form-control"  value="<?php echo $row['start']?>">  
              </div>  
  
              <div class="form-group col-sm-6">  
                  <strong>End of Term:</strong>  
                  <input type="date" name="end" class="form-control"   value="<?php echo $row['end']?>">  
              </div>  
              <input type="submit" name="submit" id="addofficial" value="Update Official" class="btn btn-success save-btn form-control" >
              
          </form>
        </div>
          <?php
          if(isset($_POST['submit']) ) {
            $name=$_POST['name'];
            $contact=$_POST['contact'];
            $address=$_POST['address'];
            $position=$_POST['position'];
            $start=$_POST['start'];
            $end=$_POST['end'];

            $query = "UPDATE `tblofficials` SET `name`='$name',`contact`='$contact',`address`='$address',`position`='$position',`start`='$start',`end`='$end' WHERE id='$id'";
            $sql = mysqli_query($conn,$query);

            if ($sql) {
              echo "<script> window.location.href='Officials.php';</script>";
          }
          }
        
      }
    
    ?>
    <br/>  
          <div class="table-responsive text-nowrap" id="table">
          <table id="example" class="table table-bordered table-hover " style="width:100%">
            <thead>  
              <th width="200px"class="text-center">Name</th>  
              <th width="140px"class="text-center">Contact</th> 
              <th width="200px"class="text-center">Zone</th> 
              <th width="130px"class="text-center">Position</th> 
              <th width="120px"class="text-center">Start of Term</th>
              <th width="120px"class="text-center">End of Term</th>
              <th width="80px"class="text-center">Edit</th>  
              <th width="80px"class="text-center">Delete</th>  
            </thead>  
            <tbody>  
              <?php
                $sql = "SELECT * FROM `tblofficials`";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($result)) {
                  ?>
                  <tr>
                    <td><?php echo $row['name'] ?></td>
                    <td><?php echo $row['contact'] ?></td>
                    <td><?php echo $row['address'] ?></td>
                    <td><?php echo $row['position'] ?></td>
                    <td><?php echo $row['start'] ?></td>
                    <td><?php echo $row['end'] ?></td>
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