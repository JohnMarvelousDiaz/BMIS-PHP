<?php

$dbhost = "localhost";
$dbusername = "root";
$dbpass = "";
$db_name ="login_db";
$conn = mysqli_connect($dbhost, $dbusername, $dbpass, $db_name);

if(!$conn) {
    echo "Connection failed!";
}

?>
