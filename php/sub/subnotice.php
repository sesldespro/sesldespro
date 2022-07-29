<?php
    date_default_timezone_set('Asia/Singapore');
    $todaydate= date('Y-m-d');
    $todaytime= date('H:i:s');

    include("../../config/db_config.php"); 
    $run = "SELECT * FROM user_info WHERE username ='{$_SESSION['subuser']}' && end_notice =''";
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

        $d1= new DateTime($g_sub_enddate." ".$g_sub_time);
        $d2= new DateTime($todaydate." ".$todaytime);
        $interval= $d1->diff($d2);
        $hours = ($interval->days * 24) + $interval->h;

        if($hours<24){
            $update_details = "UPDATE `user_info` SET  `end_notice`='unread' WHERE `user_detail_id`=$g_user_id";
            mysqli_query($dbcon, $update_details);
        }
    
    }


    

?>