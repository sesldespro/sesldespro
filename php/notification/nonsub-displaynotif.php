<?php
    include("../../config/db_config.php");
    include("../nonsub/getuserinfo.php");
    
    $dp=0;
    
    $displaynotif3 = "SELECT * FROM `locker_rental` WHERE `fullname`='$g_fullname' AND `pickup_notif_status`='unread' order by rent_time ASC";
    $rundisplaynotif3 = mysqli_query($dbcon, $displaynotif3);

        while($row = mysqli_fetch_array($rundisplaynotif3)){
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

            $dp++;
            // 576FB0

            echo'<a href="../notification/nonsub-readnotif2.php" class="viewnotif" style="color:black; font-size: 18px;">
                    <div class="notif-content" style="display:flex; align-items: center; margin: 0px 50px; height:fit-content;">
                        <div class="notif-icon" style="display:flex; margin-bottom: 20px; align-items: center; width: 100%; height:fit-content;
                        background-color: #ffffff; border-radius: 10px; padding: 0px 20px;">
                        <svg width="42" height="42" viewBox="0 0 42 42" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect width="42" height="42" rx="10" fill="#3C817E"/>
                            </svg> 
                            <div class="displaynotif" style="background-color: #ffffff; margin-bottom: 20px; margin:auto; width: 100%;  "> Hi '.$fullname.' Your package at Locker <span style="color:#576FB0; font-size: 18px; font-weight:bold;">'.$locker_num.'</span> has already been claimed. <br><span style="color:#87898D; font-size: 15px;">'.$rent_date.' | ' .$rent_time. '</span> <br>
                            </div>
                        </div>
                    </div>
                </a>';

    }

    $dd=0;
    
    $displaynotif4 = "SELECT * FROM `locker_rental` WHERE `fullname`='$g_fullname' AND `drop_notif_status`='unread' order by rent_time ASC";
    $rundisplaynotif4 = mysqli_query($dbcon, $displaynotif4);

        while($row = mysqli_fetch_array($rundisplaynotif4)){
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

            $dd++;
            // 576FB0

            echo'<a href="../notification/nonsub-readnotif3.php" class="viewnotif" style="color:black; font-size: 18px;">
                    <div class="notif-content" style="display:flex; align-items: center; margin: 0px 50px; height:fit-content;">
                        <div class="notif-icon" style="display:flex; margin-bottom: 20px; align-items: center; width: 100%; height:fit-content;
                        background-color: #ffffff; border-radius: 10px; padding: 0px 20px;">
                        <svg width="42" height="42" viewBox="0 0 42 42" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect width="42" height="42" rx="10" fill="#3C817E"/>
                            </svg> 
                            <div class="displaynotif" style="background-color: #ffffff; margin-bottom: 20px; margin:auto; width: 100%;  "> The package has been dropped on your Locker (<span style="color:#576FB0; font-size: 18px; font-weight:bold;">'.$locker_num.'</span>). You can claim it anytime within your subscription period. <br><span style="color:#87898D; font-size: 15px;">'.$rent_date.' | ' .$rent_time. '</span> <br>
                            </div>
                        </div>
                    </div>
                </a>';

    }

    $dn=0;
    
    $displaynotif = "SELECT * FROM `locker_rental` WHERE `fullname`='$g_fullname' AND `notif_status`='unread' order by rent_time ASC";
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

            $dn++;
            // 576FB0

            echo'<a href="../notification/nonsub-readnotif.php" class="viewnotif" style="color:black; font-size: 18px;">
                    <div class="notif-content" style="display:flex; align-items: center; margin: 0px 50px; height:fit-content;">
                        <div class="notif-icon" style="display:flex; margin-bottom: 20px; align-items: center; width: 100%; height:fit-content;
                        background-color: #ffffff; border-radius: 10px; padding: 0px 20px;">
                        <svg width="42" height="42" viewBox="0 0 42 42" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect width="42" height="42" rx="10" fill="#3C817E"/>
                            </svg> 
                            <div class="displaynotif" style="background-color: #ffffff; margin-bottom: 20px; margin:auto; width: 100%;  "> Rented <span style="color:#576FB0; font-size: 18px; font-weight:bold;">'.$locker_size.'</span> Locker <span style="color:#576FB0; font-size: 18px; font-weight:bold;">'.$locker_num.'</span> as  pick up services <br><span style="color:#87898D; font-size: 15px;">'.$rent_date.' | ' .$rent_time. '</span> <br>
                            </div>
                        </div>
                    </div>
                </a>';

    }

    $dnn =0;

    $querynotif1 = "SELECT * FROM `user_sub_list` WHERE `user_email`='$g_email' AND `sub_notif`='unread' order by user_sub_time ASC";
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
            

        $dnn++;


        echo'<a href="../notification/nonsub-readnotif1.php" class="viewnotif" style="color:black; font-size: 18px;">
                <div class="notif-content" style="display:flex;  align-items: center; margin: 0px 50px; height:fit-content;">
                    <div class="notif-icon" style="display:flex;  margin-bottom: 20px;  align-items: center; width: 100%; height:fit-content;
                    background-color: #ffffff; border-radius: 10px; padding: 0px 20px;">
                    <svg width="42" height="42" viewBox="0 0 42 42" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect width="42" height="42" rx="10" fill="#3C817E"/>
                        </svg>
                        <div class="displaynotif" style="background-color: #ffffff; margin-bottom: 20px;  margin:auto; width: 100%; ">
                                Oh Hello There! <span style="color:#576FB0; font-size: 18px; font-weight:bold;">'.$g_fullname.'</span> you are now a subscriber! Enjoy! <br><span style="color:#87898D; font-size: 15px;">'.$user_sub_date.' | ' .$user_sub_time. '</span><br>
                            </div>
                    </div>
                </div>
            </a>';
    }


    $dr=0;
    
    $displayread = "SELECT * FROM `locker_rental` WHERE `fullname`='$g_fullname' AND `notif_status`='read' order by rent_time ASC";
    $rundisplayread = mysqli_query($dbcon, $displayread);

        while($row = mysqli_fetch_array($rundisplayread)){
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

            $dr++;

            echo'<a href="#" class="viewnotif1" style="color:black; font-size: 18px;">
                <div class="notif-content" style="display:flex; align-items: center; margin: 0px 50px; height:fit-content;">
                    <div class="notif-icon1" style="display:flex; margin-bottom: 20px; align-items: center; width: 100%; height:fit-content;
                    background-color: #EFEFEF; border-radius: 10px; box-shadow: rgba(187, 187, 199, 0.4) 0px 7px 29px 0px; padding: 0px 20px;">
                    <svg width="42" height="42" viewBox="0 0 42 42" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect width="42" height="42" rx="10" fill="#3C817E"/>
                        </svg> 
                        <div class="displaynotif1" style="padding: 10px 20px;margin-bottom: 20px; margin:auto; width: 100%; background-color: #EFEFEF; "> Rented Locker <span style="color:#576FB0; font-size: 18px; font-weight:bold;">'.$locker_num.'</span> as  pick up services <br><span style="color:#87898D; font-size: 15px;">'.$rent_date.' | ' .$rent_time. '</span> <br>
                        </div>
                    </div>
                </div>
            </a>';
        }

        $dnn =0;

        $querynotif2 = "SELECT * FROM `user_sub_list` WHERE `user_email`='$g_email' AND `sub_notif`='read' order by user_sub_time ASC";
        $runquerynotif2 = mysqli_query($dbcon, $querynotif2);
    
            while($row = mysqli_fetch_array($runquerynotif2)){
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
    
            $dnn++;
    
    
            echo'<a href="#" class="viewnotif1" style="color:black; font-size: 18px;">
                    <div class="notif-content" style="display:flex;  align-items: center; margin: 0px 50px; height:fit-content;">
                        <div class="notif-icon1" style="display:flex;  margin-bottom: 20px;  align-items: center; width: 100%; height:fit-content;
                        background-color: #EFEFEF; border-radius: 10px; box-shadow: rgba(187, 187, 199, 0.4) 0px 7px 29px 0px; padding: 10px 20px;">
                        <svg width="42" height="42" viewBox="0 0 42 42" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect width="42" height="42" rx="10" fill="#3C817E"/>
                            </svg>
                            <div class="displaynotif1" style="background-color: #EFEFEF; margin-bottom: 20px;  margin:auto; width: 100%; ">
                                Oh Hello There! <span style="color:#576FB0; font-size: 18px; font-weight:bold;">'.$g_fullname.'</span> you are now a subscriber! Enjoy! <br><span style="color:#87898D; font-size: 15px;">'.$user_sub_date.' | ' .$user_sub_time. '</span><br>
                            </div>
                        </div>
                    </div>
                </a>';
        }

    $drp=0;
    
    $displayread3 = "SELECT * FROM `locker_rental` WHERE `fullname`='$g_fullname' AND `pickup_notif_status`='read' order by rent_time ASC";
    $rundisplayread3 = mysqli_query($dbcon, $displayread3);

        while($row = mysqli_fetch_array($rundisplayread3)){
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

            $drp++;

            echo'<a href="#" class="viewnotif1" style="color:black; font-size: 18px;">
                <div class="notif-content" style="display:flex; align-items: center; margin: 0px 50px; height:fit-content;">
                    <div class="notif-icon1" style="display:flex; margin-bottom: 20px; align-items: center; width: 100%; height:fit-content;
                    background-color: #EFEFEF; border-radius: 10px; box-shadow: rgba(187, 187, 199, 0.4) 0px 7px 29px 0px; padding: 0px 20px;">
                    <svg width="42" height="42" viewBox="0 0 42 42" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect width="42" height="42" rx="10" fill="#3C817E"/>
                        </svg> 
                        <div class="displaynotif1 style="background-color: #ffffff; margin-bottom: 20px; margin:auto; width: 100%;  "> Your package at Locker <span style="color:#576FB0; font-size: 18px; font-weight:bold;">'.$locker_num.'</span> has already been claimed. <br><span style="color:#87898D; font-size: 15px;">'.$rent_date.' | ' .$rent_time. '</span> <br>
                        </div>
                    </div>
                </div>
            </a>';
        }

        $drd=0;
    
    $displayread4 = "SELECT * FROM `locker_rental` WHERE `fullname`='$g_fullname' AND `drop_notif_status`='read' order by rent_time ASC";
    $rundisplayread4 = mysqli_query($dbcon, $displayread4);

        while($row = mysqli_fetch_array($rundisplayread4)){
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

            $drd++;

            echo'<a href="#" class="viewnotif1" style="color:black; font-size: 18px;">
                <div class="notif-content" style="display:flex; align-items: center; margin: 0px 50px; height:fit-content;">
                    <div class="notif-icon1" style="display:flex; margin-bottom: 20px; align-items: center; width: 100%; height:fit-content;
                    background-color: #EFEFEF; border-radius: 10px; box-shadow: rgba(187, 187, 199, 0.4) 0px 7px 29px 0px; padding: 0px 20px;">
                    <svg width="42" height="42" viewBox="0 0 42 42" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect width="42" height="42" rx="10" fill="#3C817E"/>
                        </svg> 
                        <div class="displaynotif" style="background-color: none; margin-bottom: 20px; margin:auto; width: 100%;  "> The package has been dropped on your Locker <span style="color:#576FB0; font-size: 18px; font-weight:bold;">'.$locker_num.'</span>. You can claim it anytime within your subscription period. <br><span style="color:#87898D; font-size: 15px;">'.$rent_date.' | ' .$rent_time. '</span> <br>
                        </div>
                    </div>
                </div>
            </a>';
        }
?>

