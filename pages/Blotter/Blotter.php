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
    <link rel="stylesheet" href="../../css/Blotter.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />  
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" />  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>  
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <link rel="icon" href="../../images/bmsLogo.png">
    <title>Blotter</title>
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
        <a href="../Dashboard/Dashboard.php" class="dashboard"><i class="fa-solid fa-chart-area"></i>Dashboard</a>
        <a href="../Officials/Officials.php" class="officials "><i class="fa-solid fa-users"></i> Officials</a>
        <a href="../Residentrecord/Residentrecord.php" class="residentrecord"><i class="fa fa-address-card"></i>    Resident Record</a>
        <a href="../Household/Household.php" class="household"><i class="fa-solid fa-house-user"></i>Household</a>
        <a href="../Blotter/Blotter.php" class="blotter active"><i class="fa-solid fa-stamp"></i>Blotter</a>
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
    <h3 style="color: #2C8F82;">Blotter</h3>
    <hr style="border: 1px solid #37B3A3;">
        <div class="table-responsive text-nowrap" id="table">
        <table id="example" class="table table-bordered table-hover " style="width:100%;">  
            <thead>  
              <th width="120px"class="text-center">Complainant</th>  
              <th width="130px"class="text-center">Person to Complain</th> 
              <th width="100px"class="text-center">Complaint</th> 
              <th width="130px"class="text-center">Location of Incidence</th>
              <th width="100px"class="text-center">Date Scheduled</th>
              <th width="100px"class="text-center">Status</th>
              <th width="60px"class="text-center">Edit</th>  
              <th width="60px"class="text-center">Delete</th>  
            </thead>  
            <tbody>  
            <?php
                $sql = "SELECT * FROM `tblblotters`";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($result)) {
                  ?>
                  <tr class="text-center">
                    <td><?php echo $row['complainant'] ?></td>
                    <td><?php echo $row['ptc'] ?></td>
                    <td><?php echo $row['complaint'] ?></td>
                    <td><?php echo $row['loi'] ?></td>
                    <td><?php echo $row['date'] ?></td>
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
<?php
}
?>
