<?php
isset($_SESSION) || session_start();
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
    <link rel="stylesheet" href="../../css/Dashboard.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" /> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <link rel="icon" href="../../images/bmsLogo.png">
    <title>Dashboard</title>
</head>
<body>
    <div id="navbar" class="navbar-font">
      <a href="../logout_admin.php" id="admin-nav" ><img src="../../images/admin.png" alt="default profile" id="navbar-pic" >Log Out<i class="fa-solid fa-right-from-bracket" style="margin-left: 5px;"></i></a>
      <a href="../Dashboard/Dashboard.php">
    <img src="../../images/bmsLogo.png" alt="bmsLogo" id="bmsLogo" class="w3-bar-item"> 
        <h4 id="name">BARANGAY BANCAL </h4> </a>
    </div>
    
    <div id="sidebar" class="sidebar-font" >
    <img src="../../images/admin.png" alt="default profile" id="sidebar-pic" >
        <h4 id="hello">Hello Administrator!</h4>
        <a href="../Dashboard/Dashboard.php" class="dashboard active"><i class="fa-solid fa-chart-area"></i>Dashboard</a>
        <a href="../Officials/Officials.php" class="officials"><i class="fa-solid fa-users"></i> Officials</a>
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
    <?php
     $tOfficials = "SELECT * FROM tblofficials";

      if ($result = mysqli_query($conn, $tOfficials)) {
        $Officialscount = mysqli_num_rows( $result );
      } 

      $tResident = "SELECT * FROM tblresidents";

      if ($result = mysqli_query($conn, $tResident)) {
          $residentcount = mysqli_num_rows( $result );
      } 

      $tHousehold = "SELECT * FROM tblhouseholds";

      if ($result = mysqli_query($conn, $tHousehold)) {
          $householdcount = mysqli_num_rows( $result );
      }
      $householdquery = "SELECT zone as zonenumber, COUNT(id) as householdcount FROM tblhouseholds GROUP BY zonenumber ORDER BY `zone` ASC;";
      $hsql = mysqli_query($conn, $householdquery);

      foreach($hsql as $data) {
        $hzone[]= $data['zonenumber'];
        $hcount[] = $data['householdcount'];
      }
      
      $tBlotter = "SELECT * FROM tblblotters";

      if ($result = mysqli_query($conn, $tBlotter)) {
          $blottercount = mysqli_num_rows( $result );
      }

      $blotterquery = "SELECT DATE_FORMAT(date, '%M %Y') as monthyear, COUNT(id) as blottercount FROM tblblotters WHERE date !=''  GROUP BY monthyear ORDER BY `date` ASC;";
      $bsql = mysqli_query($conn, $blotterquery);
      
      foreach($bsql as $data) {
        $bmonth[]= $data['monthyear'];
        $bcount[]= $data['blottercount'];
      }

      $tPermit = "SELECT * FROM tblpermits";

      if ($result = mysqli_query($conn, $tPermit)) {
          $permitcount = mysqli_num_rows( $result );
      }

      $permitquery = "SELECT DATE_FORMAT(date, '%M %D') as monthday, COUNT(id) as permitcount FROM tblpermits WHERE date !='' AND status !='Denied' GROUP BY monthday ORDER BY `date` ASC;";
      $psql = mysqli_query($conn, $permitquery);

      foreach($psql as $data) {
        $pmonth[]= $data['monthday'];
        $pcount[]= $data['permitcount'];
      }

      

      $tClearance = "SELECT * FROM tblclearances";

      if ($result = mysqli_query($conn, $tClearance)) {
          $clearancecount = mysqli_num_rows( $result );
      }

      $clearancequery = "SELECT DATE_FORMAT(date, '%M %D') as month_day, COUNT(id) as clearancecount FROM tblclearances WHERE date !='' AND status !='Denied' GROUP BY month_day ORDER BY `date` ASC;";
      $csql = mysqli_query($conn, $clearancequery);

      foreach($csql as $data) {
        $cmonth[]= $data['month_day'];
        $ccount[]= $data['clearancecount'];
      }


      $tIndigency = "SELECT * FROM tblindigency";

      if ($result = mysqli_query($conn, $tIndigency)) {
          $indigencycount = mysqli_num_rows( $result );
      }

      $indigencyquery = "SELECT DATE_FORMAT(date, '%M %D') as monthday_, COUNT(id) as indigencycount FROM tblindigency WHERE date !='' AND status !='Denied' GROUP BY monthday_ ORDER BY `date` ASC;";
      $isql = mysqli_query($conn, $indigencyquery);

      foreach($isql as $data) {
        $imonth[]= $data['monthday_'];
        $icount[]= $data['indigencycount'];
      }

      $tCertificates = $permitcount + $clearancecount + $indigencycount;

      $tMale = "SELECT gender FROM tblresidents WHERE gender = 'Male'";

      if ($result = mysqli_query($conn, $tMale)) {
          $malecount = mysqli_num_rows( $result );
      }

      $tFemale = "SELECT gender FROM tblresidents WHERE gender = 'Female'";

      if ($result = mysqli_query($conn, $tFemale)) {
          $femalecount = mysqli_num_rows( $result );
      }
      $tAnnouncements = "SELECT * FROM tblannouncements";

      if ($result = mysqli_query($conn, $tAnnouncements)) {
        $announcementcount = mysqli_num_rows( $result );
      } 

?>

    <div class="main">  
            <div class="tResident">
            <a href="../Residentrecord/Residentrecord.php">
                <div class="trLogo">                
                    <i class="fa fa-address-card trIcon"></i>              
                </div>
                </a>
                <p id="dbLabel">TOTAL RESIDENT</p>
                <p id="dbTotal"><?php echo $residentcount?></p>
            </div>
    
            <div class="tHousehold">
                <a href="../Household/Household.php">
                <div class="thLogo">
                    <i class="fa-solid fa-house-user thIcon"></i>
                </div>
                </a>
                <p id="dbLabel">TOTAL HOUSEHOLD</p>
                <p id="dbTotal"><?php echo $householdcount?></p>
            </div>
    
            <div class="reqBlotter">
                <a href="../Blotter/Blotter.php">
                <div class="rbLogo">
                    <i class="fa-solid fa-stamp rbIcon"></i>
                </div>
                </a>    
                <p id="dbLabel">TOTAL BLOTTERS FILED</p>
                <p id="dbTotal"><?php echo $blottercount?></p>
            </div>
    
            <div class="reqCert">
                <a href="../Certificates/Certificates.php">
                <div class="rcLogo">               
                    <i class="fa-regular fa-newspaper rcIcon"></i>               
                </div>
                </a>
                <p id="dbLabel">CERTIFICATION REQUESTS</p>
                <p id="dbTotal"><?php echo $tCertificates ?></p>
            </div>
      
            <div class="tOfficials">
            <a href="../Officials/Officials.php">
                <div class="toLogo">                
                <i class="fa-solid fa-users toIcon"></i>             
                </div>
                </a>
                <p id="dbLabel">TOTAL OFFICIALS</p>
                <p id="dbTotal"><?php echo $Officialscount ?></p>
            </div>

            <div class="tAnnouncements">
            <a href="../Announcements/Announcement.php">
                <div class="taLogo">                
                <i class="fa-solid fa-bullhorn taIcon"></i>          
                </div>
                </a>
                <p id="dbLabel">TOTAL ANNOUNCEMENTS</p>
                <p id="dbTotal"><?php echo $announcementcount?></p>
            </div>
           
            <div class="doughnut-box">
                <a href="../Residentrecord/Residentrecord.php">
                <p id="doughnut-text">Resident Record</p>
                </a>
            <canvas id="myChart" class="doughnut" ></canvas>
            </div>

            <div class="linegraph-box">
                <a href="../Blotter/Blotter.php">
                <p id="blotter-text">Blotter Requested</p>
                </a>
                <canvas id="myChart1" class="bargraph" > </canvas>
            </div>
            <div class="multipleline-box">
                <a href="../Household/Household.php">
                <p id="household-text">Household</p>
                 </a>
                <canvas id="myChart2" class="polararea" ></canvas>
            </div>  
            <div class="line-box1">
                <a href="../Certificates/Certificates.php">
                <p id="permit-text">Permit Requested</p>
                 </a>
                <canvas id="myChart3" class="linegraph1" ></canvas>
            </div> 
            <div class="line-box2">
                <a href="../Clearance/Clearance.php">
                <p id="clearance-text">Clearance Requested</p>
                 </a>
                <canvas id="myChart4" class="linegraph2" ></canvas>
            </div> 
            <div class="line-box3">
                <a href="../Indigency/Indigency.php">
                <p id="indigency-text">Indigency Requested</p>
                 </a>
                <canvas id="myChart5" class="linegraph3" ></canvas>
            </div> 
            
    </div>
    <script>
        var xValues = ["Male", "Female"];
        var yValues = [<?php echo $malecount ?>, <?php echo $femalecount ?>]
        var barColors = [
          "#00aba9",
          "#b91d47"
        ];
        
        new Chart("myChart", {
          type: "pie",
          data: {
            labels: xValues,
            datasets: [{
              backgroundColor: barColors,
              data: yValues
            }]
          },
        });
        </script>
        
      <script>
          const dates = <?php echo json_encode($bmonth )?>;
          const data2 = <?php echo json_encode($bcount )?>;
          var barColors = 'rgba(255, 26, 104, 0.2)';
          var borderColors = 'rgba(255, 26, 104, 1)';
          const data = {
      labels: dates, 
      datasets: [{
        label: 'Approved Blotters',
        data: data2,
        skipNull: true,
        backgroundColor: barColors,
        borderColor: borderColors,
        borderWidth: 1
        
      }]
    };

    
    const config = {
      type: 'bar',
      data,
      options: {
        scales: {
          xAxes: [{
            ticks: {
                fontSize: 10
            }
        }],
          yAxes: 
          [{ticks: {min: 0, max: 20}}],
        }
      }
    };

   
    const myChart = new Chart(
      document.getElementById('myChart1'),
      config
    );
  </script>
  <script>
  var ctx = document.getElementById('myChart2').getContext('2d');
  const hlabels = <?php echo json_encode($hzone)?>;
  const hdata = <?php echo json_encode($hcount)?>;
  var chartOptions = {
  legend: {
    display: true,
    position: 'left',
    labels: {
      
      boxWidth: 20,
      itemWidth: 20,
      fontColor: 'black',
      fontSize: 10
    }
  }
};
  var chart = new Chart(ctx, {
    type: 'polarArea',

    data: {
      labels: hlabels,
      datasets: [{
        backgroundColor: ['rgba(255, 0, 0,0.5)', 
                          'rgba(255, 165, 0,0.5)', 
                          'rgba(255, 255, 0,0.5)',
                          'rgba(0, 128, 0,0.5)',
                          'rgba(0, 0, 255,0.5)',
                          'rgba(75, 0, 130,0.5)',
                          'rgba(238, 130, 238,0.5)'],
        bordercolor: '#fff',
        data: hdata,
      }]
    },
    options: chartOptions
  });

  </script>
  <script>
    var xValues = <?php echo json_encode($pmonth )?>;
    var yValues = <?php echo json_encode($pcount   )?>;
var lineColors = "rgba(255,0,0,0.5)";

new Chart("myChart3", {
  type: "line",
  data: {
    labels: xValues,
    datasets: [{
      label: 'Approved Permits',
      fill: false,
      lineTension: 0.4,
      borderColor: lineColors,
      backgroundColor: lineColors,
      data: yValues
    }]
  },
  options: {
    scales: {
      xAxes: [{
            ticks: {
                fontSize: 10
            }
        }],
          yAxes: 
          [{ticks: {min: 0, max: 10}}],
        },
    layout: {
            padding: {
                y: 50
            }
        }
   }
});
  </script>
   <script>
    var xValues = <?php echo json_encode($cmonth )?>;
    var yValues = <?php echo json_encode($ccount )?>;
var lineColors = "rgba(0, 128, 0,0.5)";

new Chart("myChart4", {
  type: "line",
  data: {
    labels: xValues,
    datasets: [{
      label: 'Approved Clearances',
      fill: false,
      lineTension: 0.4,
      borderColor: lineColors,
      backgroundColor: lineColors,
      data: yValues
    }]
  },
  options: {
    scales: {
      xAxes: [{
            ticks: {
                fontSize: 10
            }
        }],
          yAxes: 
          [{ticks: {min: 0, max: 10}}],
        },
    layout: {
            padding: {
                y: 50
            }
        }
   }
});
  </script>
  <script>
    var xValues = <?php echo json_encode($imonth )?>;
    var yValues = <?php echo json_encode($icount )?>;
var lineColors = "rgba(0, 0, 255,0.5)";

new Chart("myChart5", {
  type: "line",
  data: {
    labels: xValues,
    datasets: [{
      label: 'Approved Indigencies',
      fill: false,
      lineTension: 0.4,
      borderColor: lineColors,
      backgroundColor: lineColors,
      data: yValues
    }]
  },
  options: {
    scales: {
      xAxes: [{
            ticks: {
                fontSize: 10
            }
        }],
          yAxes: 
          [{ticks: {min: 0, max: 10}}],
        },
    layout: {
            padding: {
                y: 50
            }
        }
   }
});
  </script>
  <script>
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
