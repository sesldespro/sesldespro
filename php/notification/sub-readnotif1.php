<?php
session_start();//session starts here
if(!$_SESSION['subuser'])
{
    header("Location: signin.php");//redirect to login page to secure the welcome page without login access.
}
?>
<?php
    include("../../config/db_config.php");
    include("../sub/getuserinfo.php");

    $querynotif1 = "SELECT * FROM `user_sub_list` WHERE `user_email`='$g_email' AND `sub_notif`='unread'";
    $runquerynotif1 = mysqli_query($dbcon, $querynotif1);

        while($row = mysqli_fetch_array($runquerynotif1)){
            $sub_id            = $row['0'];
            $user_email        = $row['1'];
            $user_phone        = $row['2'];
            $user_sub_plan     = $row['3'];
            $user_sub_days     = $row['4'];
            $user_sub_locker   = $row['5'];
            $user_sub_disc     = $row['6'];
            $user_sub_pay      = $row['7'];
            $user_reference    = $row['8'];
            $user_sub_date     = $row['9'];
            $user_sub_time     = $row['10'];
            $user_sub_amount   = $row['11'];
            $user_upload       = $row['12'];
            $Sub_Status        = $row['13'];
            $sub_notif         = $row['14'];

        }

        $updatenotif2 = "UPDATE `user_sub_list` SET `sub_notif`='read' WHERE `user_email`='$g_email' AND `sub_id`=$sub_id";

        if(mysqli_query($dbcon, $updatenotif2)){
            echo "<script>window.open('../sub/notification.php','_self')</script>";
        }


?>