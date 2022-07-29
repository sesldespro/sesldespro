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

    $displaynotif4 = "SELECT * FROM `user_info` WHERE `fullname`='$g_fullname' AND `end_notice`='unread'";
    $rundisplaynotif4 = mysqli_query($dbcon, $displaynotif4);

        while($row = mysqli_fetch_array($rundisplaynotif4)){
            $user_id      = $row['0'];
            $username     = $row['1'];
            $fullname     = $row['2'];
            $address      = $row['3'];
            $birthday     = $row['4'];
            $gender       = $row['5'];
            $phone        = $row['6'];
            $email        = $row['7'];
            $password     = $row['8'];
            $user_type    = $row['9'];
            $user_penalty = $row['10'];
            $sub_date     = $row['11'];
            $sub_time     = $row['12'];
            $sub_enddate  = $row['13'];
            $sub_endtime  = $row['14'];
            $end_notice   = $row['17'];

        }

        $updatenotif4 = "UPDATE `user_info` SET `end_notice`='read' WHERE `user_detail_id`=$user_id";

        if(mysqli_query($dbcon, $updatenotif4)){
            echo "<script>window.open('../sub/notification.php','_self')</script>";
        }

?>