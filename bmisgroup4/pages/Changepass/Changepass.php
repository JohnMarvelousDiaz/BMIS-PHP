<?php
isset($_SESSION) || session_start();
include "../Residentrecord/config.php";
$userid =$_SESSION['userid'];
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
    <link rel="stylesheet" href="../../css/Changepass.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" /> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>  
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="icon" href="../../images/bmsLogo.png">
    <title>Change Password</title>
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
    <img src="../../images/bmsLogo.png" alt="bmsLogo" id="bmsLogo" class="w3-bar-item"> 
        <h4 id="name">BARANGAY BANCAL </h4> </a>
    </div>
  
    <div id="sidebar" class="sidebar-font" >
    <img src="../../image/<?=$images['img_url']?>" alt="default profile" id="sidebar-pic" >
        <h4 id="hello">Hello <?php echo $_SESSION['name'];?>!</h4>
        <a href="../Settingsuser/Settingsuser.php" class="userinfo"><i class="fa-solid fa-circle-info"></i>User Account Info</a>
        <a href="../Changeprofile/Changeprofile.php" class="cprofile"><i class="fa-regular fa-image"></i>Change Profile </a>
        <a href="../Changepass/Changepass.php" class="cpass active"><i class="fa-solid fa-user-lock"></i>Change Password</a>
        <span id='ct7'  style="color: white;
                               font-size: 13px;
                               position:absolute;
                               bottom:70px;
                               left: 23px;
                               "></span>
        <?php }}?>

    </div>
    <div class="main">
    <?php
      $query = "SELECT * FROM tblresidents WHERE `id`='$userid'";
      $sql = mysqli_query($conn, $query);

      if($sql) {
       $row = mysqli_fetch_array($sql)
      
          ?>
      <h3 id="changepass">Change Password</h3>
      <hr style="border: 1px solid #37B3A3;">
      <div class="main-position">
        <div class="width-inherit">
      <?php if (isset($_GET['success'])) { ?>
                        <p class="success"><?php echo $_GET['success']; ?></p>
                    <?php } ?>
                    <?php if (isset($_GET['error'])) { ?>
                        <p class="error"><?php echo $_GET['error']; ?></p>
                    <?php } ?>
    <form method="post" action="changeP.php"  class="formContainer" autocomplete="off">
    <input type="hidden" name="id" value="<?php echo $row['id']?>"> 
                  <div class="form-group  col-sm-7" >  
                      <strong>Old password:</strong>  
                      <input type="password" name="oldpass" class="form-control" id="myInput1" >  
                      <input class="form-group" type="checkbox" onclick="myFunction1()"> Show Password
                  </div>  
                  <div class="form-group col-sm-7">  
                      <strong>New Password:</strong>  
                      <input type="password" name="newpass" class="form-control" id="myInput2" >  
                      <input class="form-group" type="checkbox" onclick="myFunction2()"> Show Password
                    </div>  
                    </br></br></br></br>
                    <div class="form-group col-sm-7 ">  
                        <strong >Confirm Password:</strong>  
                        <input type="password" name="confirmpass"  class="form-control" id="myInput3" > 
                        <input class="form-group" type="checkbox" onclick="myFunction3()"> Show Password
                    </div>  
                    </br></br></br></br></br></br></br></br></br></br>
                    <div style="margin-left: 15px;">
                    <input type="submit" name="submit" value="Save" class="btn btn-success save-btn " >
                    </div>
              </form>
              <input type="submit" name="cancel" value="Cancel" class="btn btn-danger save-btn cancel" onClick="document.location.href='Changepass.php';">
              </div>
      </div>
      </div>
    </div>
    <?php }?>


    <script type="text/javascript">
 $(".success").fadeTo(1500, 500).slideUp(500, function(){
    $(".success").alert('close');
});

function myFunction1() {
  var x = document.getElementById("myInput1");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
function myFunction2() {
  var x = document.getElementById("myInput2");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
function myFunction3() {
  var x = document.getElementById("myInput3");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}

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