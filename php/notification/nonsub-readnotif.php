<?php
session_start();//session starts here
if(!$_SESSION['user'])
{
    header("Location: signin.php");//redirect to login page to secure the welcome page without login access.
}
?>
<?php
    include("../../config/db_config.php");
    include("../nonsub/getuserinfo.php");

    $displaynotif = "SELECT * FROM `locker_rental` WHERE `fullname`='$g_fullname' AND `notif_status`='unread'";
    $rundisplaynotif = mysqli_query($dbcon, $displaynotif);

        while($row = mysqli_fetch_array($rundisplaynotif)){
            $rent_id           = $row['0'];
            $acct_num          = $row['1'];
            $rent_date         = $row['2'];
            $rent_time         = $row['3'];
            $rent_enddate      = $row['4'];
            $rent_endtime      = $row['5'];
            $fullname          = $row['6'];
            $user_address      = $row['7'];
            $phone             = $row['8'];
            $locker_num        = $row['9'];
            $locker_size       = $row['10'];
            $locker_otp        = $row['11'];
            $locker_duration   = $row['12'];
            $receiver_name     = $row['13'];
            $payment_method    = $row['14'];
            $total_payment     = $row['15'];
            $notif_status      = $row['16'];
        }

        $updatenotif = "UPDATE `locker_rental` SET `notif_status`='read' WHERE `rent_id`=$rent_id";

        if(mysqli_query($dbcon, $updatenotif)){
            echo "<script>window.open('../nonsub/notification.php','_self')</script>";
        }

?>