<?php

include("../../config/db_config.php");
include("../sub/getuserinfo.php");

$n =0;

$querynotif = "SELECT * FROM `locker_rental` WHERE `fullname`='$g_fullname' AND `notif_status`='unread'";
$runquerynotif = mysqli_query($dbcon, $querynotif);

while($row = mysqli_fetch_array($runquerynotif)){
    $fullname = ['6'];
    $notif_status  = $row['16'];

    $n++;
}

$nn =0;

$querynotif1 = "SELECT * FROM `user_sub_list` WHERE `user_email`='$g_email' AND `sub_notif`='unread'";
$runquerynotif1 = mysqli_query($dbcon, $querynotif1);

while($row = mysqli_fetch_array($runquerynotif1)){
    $user_email = $row['1'];
    $sub_notif  = $row['14'];

    $nn++;
}

$np =0;

$querynotif2 = "SELECT * FROM `locker_rental` WHERE `fullname`='$g_fullname' AND `pickup_notif_status`='unread'";
$runquerynotif2 = mysqli_query($dbcon, $querynotif2);

while($row = mysqli_fetch_array($runquerynotif2)){
    $fullname = ['6'];
    $pickup_notif_status  = $row['27'];

    $np++;
}

$nd =0;

$querynotif3 = "SELECT * FROM `locker_rental` WHERE `fullname`='$g_fullname' AND `drop_notif_status`='unread'";
$runquerynotif3 = mysqli_query($dbcon, $querynotif3);

while($row = mysqli_fetch_array($runquerynotif3)){
    $fullname = ['6'];
    $pickup_notif_status  = $row['32'];

    $nd++;
}

$ne =0;

$querynotif4 = "SELECT * FROM `user_info` WHERE `fullname`='$g_fullname' AND `end_notice`='unread'";
$runquerynotif4 = mysqli_query($dbcon, $querynotif4);

while($row = mysqli_fetch_array($runquerynotif4)){
    $fullname = ['2'];
    $end_notice  = $row['17'];

    $ne++;
}

?>
<?php 

$total = $n + $nn + $np + $nd +$ne;
if($n>0 || $nn>0 || $np>0 || $nd>0 || $ne>0){
    echo '<i class="count">'.$total.'</i>';
} 
else{
}

?>