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
    <link rel="stylesheet" href="../../css/Settingsuser.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" /> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>  
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="icon" href="../../images/bmsLogo.png">
    <title>User Information</title>
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
        <a href="../Settingsuser/Settingsuser.php" class="userinfo active"><i class="fa-solid fa-circle-info"></i>User Account Info</a>
        <a href="../Changeprofile/Changeprofile.php" class="cprofile"><i class="fa-regular fa-image"></i>Change Profile </a>
        <a href="../Changepass/Changepass.php" class="cpass"><i class="fa-solid fa-user-lock"></i>Change Password</a>
        <span id='ct7'  style="color: white;
                               font-size: 13px;
                               position:absolute;
                               bottom:70px;
                               left: 23px;
                               "></span>

    </div>
    <div class="main">
    <?php
      include "../Residentrecord/config.php";
      $user_id =$_SESSION['userid'];
      $query = "SELECT * FROM `tblresidents` WHERE `id`='$user_id'";
      $sql = mysqli_query($conn, $query);

      if($sql) {
       $row = mysqli_fetch_array($sql)
          ?>

    <h3 id="useraccinfo">User Account Information</h3>
    <hr style="border: 1px solid #37B3A3;">
    <div class="main-position">
    <div class="width-inherit">
                    <?php if (isset($_GET['success'])) { ?>
                        <p class="success" ><?php echo $_GET['success']; ?></p>
                    <?php } ?>
                    <?php if (isset($_GET['error'])) { ?>
                        <p class="error" ><?php echo $_GET['error']; ?></p>
                    <?php } ?>
     
     
    <form method="post" action="Settingsuser.php"  class="formContainer" autocomplete="off">
    <input type="hidden" name="id" value="<?php echo $row['id']?>"> 
                  <div class="form-group  col-sm-3" >  
                      <strong>Username:</strong>  
                      <input type="text" name="uname" class="form-control"  value="<?php echo $row['User'];?>">  
                  </div>  
                  <div class="form-group col-sm-4">  
                      <strong>Name:</strong>  
                      <input type="text" name="name" class="form-control" readonly  value="<?php echo $row['name'];?>">  
                    </div>  
                    </br></br></br></br>
                    <div class="form-group col-sm-2" >  
                        <strong for="gender">Gender:</strong>  </br>
                        <select name="gender" disabled class="form-control">
                          <option disabled selected>Please Select</option>
                          <option value="Male"  <?php echo ($row['gender']=='Male')?"selected":"";?>>Male</option>
                          <option value="Female"  <?php echo ($row['gender']=='Female')?"selected":"";?>>Female</option>
                        </select>
                    </div>  

                    <div class="form-group col-sm-2 ">  
                        <strong >Age:</strong>  
                        <input type="number" min="1" max="100"  name="age" readonly class="form-control"  value="<?php echo $row['age'];?>"> 
                    </div>  
                    
                      
                    <div class="form-group col-sm-3 ">  
                      <strong>Contact:</strong>  
                      <input type="text" name="contact" class="form-control"  value="<?php echo $row['contact'];?>">  
                    </div>  
                  
                    </br></br></br></br>
                    <div class="form-group col-sm-7" >  
                        <strong>Address:</strong>  
                        <input type="text" name="address" class="form-control" readonly value="<?php echo $row['address'];?>,Bancal, Meycauayan, Bulacan">  
                    </div>  

    
                    </br></br></br></br></br>
                    <div style="margin-left: 15px;">
                    <input type="submit" name="submit" id="submit" value="Save" class="btn btn-success save-btn " >
                    <a href="Settingsuser.php">
                    <input type="submit" name="cancel" value="Cancel" class="btn btn-danger save-btn " >
                    </a>
                    </div>
              </form>
              </div>
              </div>
    </div>
    <?php
      }}
    ?>
    <?php
          if(isset($_POST['submit']) ) {
            $contact=$_POST['contact'];
            $uname=$_POST['uname'];
            $unameExist = mysqli_query($conn, "SELECT * FROM tblresidents WHERE `User` = '$uname' AND `id` !='$user_id' ");
            if(mysqli_num_rows($unameExist)>0)
            {
              echo "<script>
              window.location.href='Settingsuser.php?error=Username already existed!';
              </script>";
            }
            else {
            $query = "UPDATE `tblresidents` SET `contact`='$contact',`User`='$uname' WHERE `id`='$user_id' ";
            $sql = mysqli_query($conn,$query);
            
              echo "<script>
              window.location.href='Settingsuser.php?success=User Account Information Updated Successfully';
              </script>";
            }
            
            
          
          }
        
      }
    
    ?>

    <script type="text/javascript">

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