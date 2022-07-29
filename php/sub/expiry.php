<?php

$permitted_chars = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';

function generate_string($input, $strength = 16) {
    $input_length = strlen($input);
    $random_string = '';
    for($i = 0; $i < $strength; $i++) {
        $random_character = $input[mt_rand(0, $input_length - 1)];
        $random_string .= $random_character;
    }

    return $random_string;
}

$new_otp = generate_string($permitted_chars, 6);

?>
<?php
    date_default_timezone_set('Asia/Singapore');
    $todaydate= date('Y-m-d');
    $todaytime= date('H:i:s');

    include("../../config/db_config.php");
    $run = "SELECT * FROM user_info WHERE username ='{$_SESSION['subuser']}'";
    $run = mysqli_query($dbcon, $run);

    while($row = mysqli_fetch_array($run)){
        $g_user_id      = $row['0'];
        $g_username     = $row['1'];
        $g_fullname     = $row['2'];
        $g_address      = $row['3'];
        $g_birthday     = $row['4'];
        $g_gender       = $row['5'];
        $g_phone        = $row['6'];
        $g_email        = $row['7'];
        $g_password     = $row['8'];
        $g_user_type    = $row['9'];
        $g_user_penalty = $row['10'];
        $g_sub_date     = $row['11'];
        $g_sub_time     = $row['12'];
        $g_sub_enddate  = $row['13'];
        $g_sub_endtime  = $row['14'];
        $g_end_notice   = $row['17'];
    
    }


    if($todaydate < $g_sub_enddate && $todaytime != $g_sub_endtime){
    } 
    elseif($todaydate < $g_sub_enddate && $todaytime = $g_sub_endtime){
    }
    else{
        $updateuser = "UPDATE `user_info` SET  `user_type`='Non-subscriber', `sub_date`='', `sub_time`='', `sub_enddate`='', `sub_endtime`='', `duration`='end' WHERE fullname='$g_fullname'";
        $runupuser = mysqli_query($dbcon, $updateuser);

        $updaterent = "UPDATE `rent_details` SET  `LockerStatus`='Available', `user_fullname`='', `rent_otp`='$new_otp', `rent_start_date`='', `rent_start_time`='', `rent_end_date`='', `rent_end_time`='' WHERE `user_fullname`='$g_fullname'";
        $runuprent = mysqli_query($dbcon, $updaterent);

        if(mysqli_query($dbcon, $updateuser)){
            session_destroy();
            echo '<script type="text/javascript"> alert("Your subscription has ended, Please login again.") </script>';
            echo "<script>window.open('../signin.php','_self')</script>";
        }
    } 

?>