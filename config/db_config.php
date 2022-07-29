<?php

$serverName = "184.168.103.93";
$dbUserName = "despro";
$dbPassword = "NDPLyq%})w@l";
$dbName = "sesl";

$dbcon = mysqli_connect($serverName,$dbUserName,$dbPassword,$dbName);

if(!$dbcon)
{
    die("Connection Failed: ".mysqli_connect_error());
}
?>
