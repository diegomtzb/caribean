<?php
/*
$conn=mysqli_connect("localhost","caribeanUser","password","caribean");
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}*/

$conn=mysqli_connect("mysql11.ezhostingserver.com","caribeanserviceu","Caribeandb***","caribeanservice");
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>