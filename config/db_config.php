<?php

$serverName = "localhost";
$dbUserName = "root";
$dbPassword = "";
$dbName = "sesl";

$dbcon = mysqli_connect($serverName,$dbUserName,$dbPassword,$dbName);

if(!$dbcon)
{
    die("Connection Failed: ".mysqli_connect_error());
}
?>
