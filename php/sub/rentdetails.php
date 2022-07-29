<?php 
    include("../../config/db_config.php");
    include("../sub/getuserinfo.php");
    $run = "SELECT * FROM rent_details WHERE user_fullname = '$g_fullname'";
    $run = mysqli_query($dbcon, $run);

    while($row = mysqli_fetch_array($run)){
        $LockerID       = $row['0'];
        $LockerNum      = $row['1'];
        $LockerSize     = $row['2'];
        $LockerDuration = $row['3'];
        $LockerStatus   = $row['4'];
        $user_fullname  = $row['5'];
        $rent_otp       = $row['6'];
        $rent_end_date  = $row['9'];
        $rent_end_time  = $row['10'];
    }

    

    $check_rent= "SELECT * FROM rent_details WHERE user_fullname ='$g_fullname'";
    $run_check_rent = mysqli_query($dbcon, $check_rent);

    if(mysqli_num_rows($run_check_rent)==1){
        echo '<div class="locker-content">
                <div class="rent-details">
                    <div class="numtext">
                        <div>'.$LockerNum.'</div>
                    </div>
                    <div class="info-text">
                        <p class="headtext">'.$rent_otp.'</p>
                        <p class="subtext">One-Time Password(OTP)</p><br>
                        <p class="headtext">'.$rent_end_date.' | '.$rent_end_time.'</p>
                        <p class="subtext">Rent Duration</p>
                    </div>
                </div>
                </div>';
        
            
    }
    elseif(mysqli_num_rows($run_check_rent)!=1){
        echo '<div class="locker-content">
        
        <div class="rent-details">
            <div class="numtext">
                <div>00</div>
            </div>
            <div class="info-text">
                <p class="headtext">No locker rented</p>
                <p class="subtext">One-Time Password(OTP)</p><br>
                <p class="headtext">No locker rented</p>
                <p class="subtext">Rent Duration</p>
                
            </div>
        </div>
        </div>';
    }

?>