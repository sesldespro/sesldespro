<?php 
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
        $g_id_key       = $row['15'];
    }
?>
