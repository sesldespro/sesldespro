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

    $displaynotif3 = "SELECT * FROM `locker_rental` WHERE `fullname`='$g_fullname' AND `drop_notif_status`='unread'";
    $rundisplaynotif3 = mysqli_query($dbcon, $displaynotif3);

        while($row = mysqli_fetch_array($rundisplaynotif3)){
            $rent_id                = $row['0'];
            $acct_num               = $row['1'];
            $rent_date              = $row['2'];
            $rent_time              = $row['3'];
            $rent_enddate           = $row['4'];
            $rent_endtime           = $row['5'];
            $fullname               = $row['6'];
            $user_address           = $row['7'];
            $phone                  = $row['8'];
            $locker_num             = $row['9'];
            $locker_size            = $row['10'];
            $locker_otp             = $row['11'];
            $locker_duration        = $row['12'];
            $receiver_name          = $row['13'];
            $payment_method         = $row['14'];
            $total_payment          = $row['15'];
            $notif_status           = $row['16'];
            $pickup_date            = $row['26'];
            $pickup_notif_status    = $row['27'];
            $pickup_activity        = $row['28'];
            $pickup_receiver        = $row['29'];
            $pickup_receiver_phone  = $row['30'];
            $drop_date              = $row['31'];
            $drop_notif_status      = $row['32'];
            $drop_locker_activity   = $row['33'];
            $drop_rider             = $row['34'];
            $drop_rider_phone       = $row['35'];

        }

        $updatenotif3 = "UPDATE `locker_rental` SET `drop_notif_status`='read' WHERE `rent_id`=$rent_id";

        if(mysqli_query($dbcon, $updatenotif3)){
            echo "<script>window.open('../sub/notification.php','_self')</script>";
        }

?>