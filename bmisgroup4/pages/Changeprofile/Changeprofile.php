<?php
isset($_SESSION) || session_start();
$userid=$_SESSION['userid'];
include "config.php";
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
    <link rel="stylesheet" href="../../css/Changeprofile.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" /> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>  
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="icon" href="../../images/bmsLogo.png">
    <title>Change Profile</title>
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
      <li><a href="../Permituser/Permituser.php">Back to Home <i class="fa-solid fa-home"></i></a></li>
      <li><a href="../logout_user.php">Log out <i class="fa-solid fa-arrow-right-from-bracket"></i></a></li>
    </ul>
  </div>
  <a href="../Permituser/Permituser.php">
    <img src="../../images/bmsLogo.png" alt="bmsLogo" id="bmsLogo" > 
        <h4 id="name">BARANGAY BANCAL </h4> </a>
    </div>
    <div id="sidebar" class="sidebar-font" >
    <img src="../../image/<?=$images['img_url']?>" alt="default profile" id="sidebar-pic" >
        <h4 id="hello">Hello <?php echo $_SESSION['name'];?>!</h4>
        <a href="../Settingsuser/Settingsuser.php" class="userinfo"><i class="fa-solid fa-circle-info"></i>User Account Info</a>
        <a href="../Changeprofile/Changeprofile.php" class="cprofile active"><i class="fa-regular fa-image"></i>Change Profile </a>
        <a href="../Changepass/Changepass.php" class="cpass"><i class="fa-solid fa-user-lock"></i>Change Password</a>
        <span id='ct7'  style="color: white;
                               font-size: 13px;
                               position:absolute;
                               bottom:70px;
                               left: 23px;
                               "></span>
    </div>
    <div class="main">
    <h3 id="changepic">Change Profile Picture</h3>
    <hr style="border: 1px solid #37B3A3;">
    <div class="main-position">
        <div class="width-inherit">
                    <?php if (isset($_GET['success'])) { ?>
                        <p class="success"><?php echo $_GET['success']; ?></p>
                    <?php } ?>
                    <?php if (isset($_GET['error'])) { ?>
                        <p class="error"><?php echo $_GET['error']; ?></p>
                    <?php } ?>
        <form action="add.php" method="post" autocomplete="off" enctype="multipart/form-data">
        <div class="form-group col-sm-12">
        <img src="../../image/<?=$images['img_url']?>" alt="default profile" id="default" onclick="FullView(this.src)">
        </div>
        <div class="fomr-group col-sm-6">
        <label class="form-label" for="customFile">Insert Profile Picture</label>
        <input type="file" id="file" name="image" class="form-control "/>
        </div>
        </br></br></br></br></br></br></br></br></br></br></br></br>
        <div style="margin-left: 15px;">
                    <input type="submit" name="submit" value="Save" class="btn btn-success save-btn " >
                    </div>
        </form>
        <input type="submit" name="cancel" value="Cancel" class="btn btn-danger save-btn cancel" onClick="document.location.href='Changeprofile.php';">
    </div>
    </div>
    <div id="fullimageview">
        <img id="FullImage" >
        <span id="CloseButton" onclick="CloseFullView()">&times;</span>
    </div>
    </div>
    <?php
      }}
    ?>

    <script type="text/javascript">
function FullView(ImgLink) {
    document.getElementById("FullImage").src = ImgLink;
    document.getElementById("fullimageview").style.display = "block";
}

function CloseFullView() {
    document.getElementById("fullimageview").style.display = "none";
}

$(".success").fadeTo(1500, 500).slideUp(500, function(){
    $(".success").alert('close');
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