<?php
isset($_SESSION) || session_start();
include "../Announcement/config.php";
$userid = $_SESSION['userid'];
if(empty($_SESSION['userid']))
{
    header('location:../LoginPageuser/LoginPageuser.php');
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
    <link rel="stylesheet" href="../../css/Announcementuser.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />  
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" />  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>  
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> 
    <link rel="icon" href="../../images/bmsLogo.png">
    <title>Announcement</title>
</head>
<body>
<?php
            $query = "SELECT img_url FROM tblresidents WHERE id='$userid'";
            $sql = mysqli_query($conn,$query);

            if(mysqli_num_rows($sql)>0){
                while($images = mysqli_fetch_assoc($sql)){
        ?>
<div id="navbar" class="navbar-font">
    <div class="dropdown" >
    <button class="btn dropdown-toggle btn-lg " type="button"  data-toggle="dropdown"><img src="../../image/<?=$images['img_url']?>" alt="default profile" id="navbar-pic" >Resident
    <span class="caret"></span></button>
    <ul class="dropdown-menu" id="dropdown" style="right:0;">
      <li><a href="../Settingsuser/Settingsuser.php">Account Settings <i class="fa-solid fa-sliders"></i></a></li>
      <li><a href="../logout_user.php">Log out <i class="fa-solid fa-arrow-right-from-bracket"></i></a></li>
    </ul>
  </div>
  <a href="../Permituser/Permituser.php">
    <img src="../../images/bmsLogo.png" alt="bmsLogo" id="bmsLogo" class="w3-bar-item"> 
        <h4 id="name">BARANGAY BANCAL </h4> </a>
    </div>
    <div id="sidebar" class="sidebar-font" >
    <img src="../../image/<?=$images['img_url']?>" alt="default profile" id="sidebar-pic" >
        <h4 id="hello">Hello <?php echo $_SESSION['name'];?>!</h4>
        <a href="../Announcementuser/Announcementuser.php" class="announcement active"><i class="fa-solid fa-bullhorn"></i>Announcements</a>
        <button class="certs"><i class="fa-regular fa-newspaper"></i>Certification<i class="fa-solid fa-circle-chevron-down" style="margin-left: 32px;"></i></button>
        <div id="certs">
        <a href="../Permituser/Permituser.php" class="certs "><i class="fa-solid fa-clipboard-check"></i>Permit</a>
        <a href="../Clearanceuser/Clearanceuser.php" class="certs"><i class="fa-solid fa-person-circle-check"></i>Clearance</a>
        <a href="../Indigencyuser/Indigencyuser.php" class="certs"><i class="fa-solid fa-id-card"></i>Indigency</a>
        </div>
        <a href="../Blotteruser/Blotteruser.php" class="blotter"><i class="fa-solid fa-stamp"></i>Blotter</a>
        <span id='ct7'  style="color: white;
                               font-size: 13px;
                               position:fixed;
                               bottom:10px;
                               left: 23px;
                               "></span>
    </div>
    <?php }}?>
    <div class="main">
      <div class="header">
        <h3 id= "annTitle"style="color: #2C8F82;">Announcements</h3>
        <hr style="border: 1px solid #37B3A3;">
      </div>
        <?php
                $sql = "SELECT * FROM `tblannouncements` ORDER BY id DESC";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($result)) {
                  ?>
                <div class="annTab table-responsive text-nowrap">
                    <div class="annTitle"><i class="fa-sharp fa-solid fa-thumbtack"></i>&nbsp;<?php echo $row['title'] ?></div>
                    <div class="annContent"><?php echo $row['content'] ?></div>
                    <div class="annDate">Date of Event: <?php echo $row['date'] ?></div>
                </div>
                <?php
                }
              ?>          
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