<?php
isset($_SESSION) || session_start();
include "../LoginPage/db_conn.php";
if(empty($_SESSION['userid']))
{
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/LoginPageuser.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>  
    <link rel="icon" href="../../images/bmsLogo.png">
    <title>Resident</title>
</head>
<body>
    <div id="navbar" class="navbar-font">
        <a id="admin-nav" style="margin-right: 5px;"  >RESIDENT</a>
    <h4 id="name">BARANGAY BANCAL MIS </h4>
    </div>
    <div class="grid-container">
    <div class="container"></div>
    <div class="container"></div>
    <div class="container"></div>
    <div class="container"></div>
    <div class="container" id="container-1" >
        <div class="logo">
            <img src="../../images/bmsLogo.png" alt="bmsLogo" id="bmsLogo">
        </div>
        <form method="post" action="login.php">
        <div id="SignIn">
            <h3>Sign In</h3>
        </div>
        <div id="input-text" >                  
            <input type="text" id="text" name="uname" placeholder="Username" size="25px" autocomplete="off" >      
            <i class="fa fa-envelope admin-text" aria-hidden="true"></i>        
        </div>
        <div id="Password">           
            <input type="password" id="password" name="password"  placeholder="Password" size="25px" >
            <i class="fa fa-key key-pass" aria-hidden="true"></i>
        </div>
       
        
            <div  >
                <button id="login"><a style="text-decoration: none; color: white;">
                Log In
             </a> </button>
            </div>
            <?php if (isset($_GET['error'])) { ?>
            <p class= "error" ><?php echo $_GET['error']; ?> </p>
       <?php } ?>
            </form>
    </div>
</div>
<div id="footer">
</div>
</body>
</html>
<?php
}
else 
{
    header("Location: ../Announcementuser/Announcementuser.php");
}
?>