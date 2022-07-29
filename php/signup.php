<?php 
    include("../config/db_config.php");
    date_default_timezone_set('Asia/Singapore');
    $currentDate= date('Y-m-d');
    $currentTime= date('H:i:s');
?>

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

$id_key = generate_string($permitted_chars, 6);

?>

<?php
   include("../config/db_config.php");

    $username = $email = "";
    $user_err = $fullname_err = $pass1_err = $email_err = $phone_err = $checkbox_err = '';
    $ref_err = $date_err = $time_err = $attach_err = $numlock_err = '';
    if(isset($_POST['register'])){
        $username   = mysqli_real_escape_string($dbcon,$_POST['username']);
        $fullname   = $_POST['fullname'];
        $address1   = $_POST['address1'];
        $address2   = $_POST['address2'];
        $city       = $_POST['city'];
        $zipcode    = $_POST['zipcode'];
        $province   = $_POST['province'];
        $birthday   = $_POST['birthday'];
        $gender     = $_POST['gender'];
        $phone      = $_POST['phone'];
        $email      = $_POST['email'];
        $password   = $_POST['password'];
        $password_2 = $_POST['password_2'];
        $ref        = $_POST['reference'];
        $sdate      = $_POST['pdate'];
        $stime      = $_POST['ptime'];
        $locker_num = $_POST['locker_num'];

        //VALIDATIONS

        $check_user_query="select * from user_info WHERE username='$username'";
        // var_dump($check_user_query);
        $run_query=mysqli_query($dbcon,$check_user_query);
        // var_dump(mysqli_num_rows($run_query));
        if(mysqli_num_rows($run_query)>0)
        {
            $user_err = '<span class="text-info">Username is already taken.</span>';
        } elseif (empty($username)) {
            $user_err = '<span class="text-info">Username is empty.</span>';
        }

        if (empty($fullname)) {
            $fullname_err = '<span class="text-info">Fullname is empty</span>';
        } elseif (!preg_match("/^([a-zA-Z' ]+)$/",$fullname)) {
            $fullname_err = '<span class="text-info">Fullname cannot contain number/special character.</span>';
        }

        if (empty($password)) {
            $pass1_err = '<span class="text-info">Password is empty.</span>';
        } elseif ($password != $password_2) {
            $pass1_err = '<span class="text-info">Passwords does not match.</span>';
        } elseif(strlen($password) < 6) 
        {
            $pass1_err = '<span class="text-info">Password must be at least 6 characters.</span>';
        }

        $check_email_query="select * from user_info WHERE email='$email'";
        $run_query2=mysqli_query($dbcon,$check_email_query);
        
        if (empty($email)) {
            $email_err = '<span class="text-info">Email is empty.</span>';
        } elseif(mysqli_num_rows($run_query2)>0)
        {
            $email_err = '<span class="text-info">Email is already taken.</span>';
        } 

        if (empty($phone)) {
            $phone_err = '<span class="text-info">Mobile Number is empty.</span>';
        } elseif ((substr($phone, 0, 4) != "+639") && (strlen($phone)!=13)) {
            $phone_err = '<span class="text-info">Mobile number must starts with +639</span>';
        } elseif (strlen($phone)!=13){
            $phone_err = '<span class="text-info">Mobile number must be +639 plus 9 more digits.</span>';
        }

        $check_ref="select * from user_sub_list WHERE user_reference='$ref'";
        $run_ref=mysqli_query($dbcon,$check_ref);

        if(mysqli_num_rows($run_ref)>0){
            $ref_err= '<span class="text-info">Reference number is already taken.</span>';
        }
        elseif (empty($ref)) {
            $ref_err = '<span class="text-info">Reference Number is empty.</span>';
            // echo "<script>window.open('subscription.php?subscription=$g_subplan&error=true','_self')</script>";
            // return;
        } 
        elseif ((!preg_match('/^[0-9]*$/', $ref)) && (strlen($ref)!=13)) {
            $ref_err = '<span class="text-info">Reference Number must not contain letters or special characters</span>';
            // echo "<script>window.open('subscription.php?subscription=$g_subplan&error=true','_self')</script>";
            // return;
        } 
        elseif (strlen($ref)!=13){
            $ref_err = '<span class="text-info">Reference Number must be 13 digit number.</span>';
            // echo "<script>window.open('subscription.php?subscription=$g_subplan&error=true','_self')</script>";
            // return;
        }

        if (empty($sdate)) {
            $date_err = '<span class="text-info">Date is empty.</span>';
        }
        if (empty($stime)) {
            $time_err = '<span class="text-info">Time is empty.</span>';
        }

        if(!is_uploaded_file($_FILES["attach"]["tmp_name"])) {
            $attach_err = '<span class="text-info">Please upload Image.</span>';
            echo '<script type="text/javascript"> alert("Subscription Request Failed") </script>';
            // echo "<script>window.open('subscription.php?subscription=$g_subplan&error=true','_self')</script>";
            // return;
        }

        $v1 = rand(1111,9999);
        $v2 = rand(1111,9999);

        $v3 = $v1.$v2;
        $v3 = md5($v3);

        $fileName = $_FILES["attach"]["name"];
        $destination = "../images/".$v3.$fileName;
        $destinationDb = "/SESL/images/".$v3.$fileName;
    
        $attach = mysqli_real_escape_string($dbcon, $destinationDb);
        if(isset($fileName) and !empty($fileName))
        {       
            move_uploaded_file($_FILES["attach"]["tmp_name"], $destination);
        }


        if ((empty($user_err)) && (empty($fullname_err)) && (empty($pass1_err)) && (empty($email_err)) && (empty($phone_err)) && (empty($ref_err)) && (empty($attach_err)) && (empty($date_err)) && (empty($time_err))) {
            // $pass = md5($password);
            // var_dump('here');
            if (empty($address1)){
                $address = $address2 .", ". $city .", ". $province .", ". $zipcode;
            }
            elseif (empty($address2)) {
                $address = $address1 .", ". $city .", ". $province .", ". $zipcode;
            }
            elseif (empty($city))  {
                $address = $address1 .", ". $address2 .", ". $province .", ". $zipcode;
            }
            elseif (empty($province)) {
                $address = $address1 .", ". $address2 .", ". $city .", ". $zipcode;
            }
            elseif (empty($zipcode)) {
                $address = $address1 .", ". $address2 .", ". $city .", ". $province;
            }
            $insert_user="INSERT INTO user_info (username, fullname, user_address, birthday, gender, phone, email, user_password, user_type , id_key) VALUES ('$username', '$fullname', '$address', '$birthday', '$gender', '$phone', '$email', '$password','Non-subscriber', '$id_key')";
            if(mysqli_query($dbcon, $insert_user)){
                $insert_sub = "INSERT INTO `user_sub_list`(`user_email`, `user_phone`, `user_sub_plan`, `user_sub_days`, `user_sub_locker`, `user_sub_disc`, `user_sub_pay`, `user_reference`, `user_sub_date`, `user_sub_time`, `user_sub_amount`, `user_upload`, `Sub_Status`) VALUES ('".$email."','".$phone."','Non-subscriber','7 Days','".$locker_num."','0 %','99php','".$ref."','".$sdate."','".$stime."','99', '".$attach."','pending');";
                if(mysqli_query($dbcon, $insert_sub)){
                    $insert_rent = "INSERT INTO `locker_rental`(`rent_date`, `rent_time`, `fullname`, `user_address`, `phone`, `locker_num`, `locker_otp`, `locker_duration`, `email`) VALUES ('".$currentDate."','".$currentTime."','".$fullname."','".$address."','".$phone."','".$locker_num."','".$id_key."','".$ref."','".$email."');";
                    if(mysqli_query($dbcon, $insert_rent)){
                        $update_details = "UPDATE `rent_details` SET  `LockerStatus`='Unavailable', `user_fullname`='$fullname', `rent_otp`='$id_key', `rent_start_date`='$currentDate', `rent_start_time`='$currentTime'  WHERE LockerNum='$locker_num'";
                        if(mysqli_query($dbcon, $update_details)){
                            echo '<script type="text/javascript"> alert("Successfully created an account. Please wait for admin to confirm your request.") </script>';
                            echo "<script>window.open('signin.php','_self')</script>";
                        } 
                    }
                }
            }
            else {
                echo '<script type="text/javascript"> alert("Registration Failed") </script>';
                echo "<script>window.open('signup.php','_self')</script>";
            }
        }

        
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/x-icon" href="../images/sesl.ico" />


    <title>SESL | Sign Up</title>

    <link rel="stylesheet" href="../public/css/css/sign_up.css" />
    <link rel="stylesheet" href="../public/css/css_responsive/signup.css">

</head>
<body>
    <!-- <div class="signup-img-left"></div> -->
            <nav class="home-navi">
                <table class="home-navi-table">
                <td class="logo-img">
                    <img src="../images/logo.png" class="home-logo"/>
                    <img src="../images/logo-res.png" class="home-logo-new">
                </td>
                <td class="logo-name">
                    <a href="../index.php" class="logotext">SESL</a>
                    <svg class ="burger-menu" viewBox="0 0 20 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M1.5 1H19M1.5 6H19M1.5 11H19" stroke="white" stroke-width="2" stroke-linecap="round"/>
                    </svg>
                </td>
                <td class="right-navi">
                    <svg class="close-btn" viewBox="0 0 209 209" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M104.5 0C83.8319 0 63.6279 6.12882 46.4429 17.6114C29.258 29.094 15.864 45.4147 7.95463 64.5096C0.0452782 83.6044 -2.02417 104.616 2.00798 124.887C6.04014 145.158 15.9928 163.778 30.6074 178.393C45.222 193.007 63.8421 202.96 84.1131 206.992C104.384 211.024 125.396 208.955 144.49 201.045C163.585 193.136 179.906 179.742 191.389 162.557C202.871 145.372 209 125.168 209 104.5C209 90.7768 206.297 77.1881 201.045 64.5096C195.794 51.831 188.096 40.3111 178.393 30.6073C168.689 20.9036 157.169 13.2062 144.49 7.95459C131.812 2.70297 118.223 0 104.5 0V0ZM132.82 117.98C133.799 118.952 134.576 120.108 135.107 121.381C135.637 122.655 135.911 124.02 135.911 125.4C135.911 126.779 135.637 128.145 135.107 129.419C134.576 130.692 133.799 131.848 132.82 132.819C131.848 133.799 130.692 134.576 129.419 135.107C128.145 135.637 126.78 135.911 125.4 135.911C124.021 135.911 122.655 135.637 121.381 135.107C120.108 134.576 118.952 133.799 117.981 132.819L104.5 119.234L91.0195 132.819C90.0481 133.799 88.8923 134.576 87.6189 135.107C86.3454 135.637 84.9796 135.911 83.6 135.911C82.2205 135.911 80.8546 135.637 79.5812 135.107C78.3078 134.576 77.152 133.799 76.1805 132.819C75.2011 131.848 74.4236 130.692 73.8931 129.419C73.3626 128.145 73.0894 126.779 73.0894 125.4C73.0894 124.02 73.3626 122.655 73.8931 121.381C74.4236 120.108 75.2011 118.952 76.1805 117.98L89.7655 104.5L76.1805 91.0195C74.2128 89.0517 73.1073 86.3828 73.1073 83.6C73.1073 80.8171 74.2128 78.1483 76.1805 76.1805C78.1483 74.2127 80.8172 73.1072 83.6 73.1072C86.3829 73.1072 89.0518 74.2127 91.0195 76.1805L104.5 89.7655L117.981 76.1805C119.948 74.2127 122.617 73.1072 125.4 73.1072C128.183 73.1072 130.852 74.2127 132.82 76.1805C134.787 78.1483 135.893 80.8171 135.893 83.6C135.893 86.3828 134.787 89.0517 132.82 91.0195L119.235 104.5L132.82 117.98Z" fill="black"/>
                        </svg>
                    <div class="menu-list">
                        <a href="../index.php" class="menu">Home</a>
                        <a href="../php/abouthomepage.php" target="_blank" class="menu">About</a>
                        <a href="../php/help.php" class="menu">Help</a>
                        <a href="../php/signin.php"><button class="sign-in-button" type="submit" >Sign In</button></a>
                    </div>
                </td>
                </table>
            </nav>
            <div class="signup-img-right"></div>
            <div class="signup-main">
                <div class="signup-container">
                    <div class="header-text">
                        <h1>Create New Account</h1>
                        <p>Already have an account? <a href="./signin.php" class="signin-text">Sign In</a></p>
                    </div>
                            <form action ="signup.php" method="POST" class="input-fields" enctype="multipart/form-data">
                                <div class="inputs">
                                    <label >Username</label><br>
                                    <input type="text" class="border" id="username" name="username" value="<?php if (isset($_POST['username'])) { echo htmlentities($_POST['username']); } ?>">
                                    <?php echo $user_err; ?>
                                </div>
                                <div class="inputs">
                                    <label >Full Name</label><br>
                                    <input type="text" class="border" id="fullname" name="fullname" value="<?php if (isset($_POST['fullname'])) { echo htmlentities($_POST['fullname']); } ?>" >
                                    <?php echo $fullname_err; ?>
                                </div>
                                <div class="inputs">
                                    <label >Unit / Floor / Building No.</label><br>
                                    <input type="text" class="border" id="address1" name="address1" value="<?php if (isset($_POST['address1'])) { echo htmlentities($_POST['address1']); } ?>" >
                                </div>
                                <div class="inputs">
                                    <label >Street / Block / Barangay</label><br>
                                    <input type="text" class="border" id="address2" name="address2" value="<?php if (isset($_POST['address2'])) { echo htmlentities($_POST['address2']); } ?>" >
                                </div>
                                <div class="flex-container">
                                    <div class="inputs">
                                        <label >City / Municipality</label><br>
                                        <input type="text" class="border cityprov" id="city" name="city" value="<?php if (isset($_POST['city'])) { echo htmlentities($_POST['city']); } ?>" >
                                    </div>
                                    <div class="inputs">
                                        <label >Province</label><br>
                                        <input type="text" class="border cityprov" id="province" name="province" value="<?php if (isset($_POST['province'])) { echo htmlentities($_POST['province']); } ?>" >
                                    </div>
                                    <div class="inputs">
                                        <label >Zip Code</label><br>
                                        <input type="text" class="border zipcode" id="zipcode" name="zipcode" value="<?php if (isset($_POST['zipcode'])) { echo htmlentities($_POST['zipcode']); } ?>" >
                                    </div>
                                </div>
                                <div class="inputs">
                                    <label >Birthday</label><br>
                                    <input type="date" class="border" id="birthday" name="birthday" value="<?php if (isset($_POST['birthday'])) { echo htmlentities($_POST['birthday']); } ?>">
                                </div>
                                <div class="inputs">
                                    <label >Gender</label><br>
                                    <select name="gender" class="gender-border" value="<?php if (isset($_POST['gender'])) { echo htmlentities($_POST['gender']); } ?>" >
                                        <option>Female</option>
                                        <option>Male</option>
                                        <option>Others</option>
                                    </select>
                                    <!-- <input type="text" class="border" id="gender" name="gender" value=""> -->
                                </div>
                                <div class="inputs">
                                    <label for="phone">Mobile Number</label><br>
                                    <input type="text" class="border" id="phone" name="phone" placeholder="+639123456789" value="<?php if (isset($_POST['phone'])) { echo htmlentities($_POST['phone']); } ?>" >
                                    <?php echo $phone_err; ?>
                                </div>
                                <div class="inputs">
                                    <label for="email">Email</label><br>
                                    <input type="email" class="border" id="email" name="email" value="<?php if (isset($_POST['email'])) { echo htmlentities($_POST['email']); } ?>" >
                                    <?php echo $email_err; ?>
                                </div>
                                <div class="inputs">
                                    <label >Password</label><br>
                                    <input type="password" class="border" id="password" name="password" >
                                    <?php echo $pass1_err; ?>
                                </div>
                                <div class="inputs">
                                    <label >Confirm Password</label><br>
                                    <input type="password" class="border" id="cpass" name="password_2" value="">
                                </div><br>
                                <div class="payment-details">
                                    <p><b>Payment Details </b><a href="#" id="howTo" class="signin-text">Click here on how to pay.</a></p>
                                </div>
                                <div id="howToModal" class="modal">
                                    <span class="close">&times;</span>
                                    <div class="modal-content">
                                        <div class="how-to-steps">1. Open your Gcash app.</div>
                                        <?php
                                            $get_number = "SELECT phone from user_info WHERE user_type='Admin'";
                                            $get_number = mysqli_query($dbcon,$get_number);

                                            while($row = mysqli_fetch_array($get_number)){
                                                $admin_number = $row['0'];
                                            }
                                        ?>
                                        <div class="how-to-steps">2. Send money to <?php echo $admin_number?>.</div>
                                        <div class="how-to-steps">3. Save your transaction's reference number.</div>
                                        <div class="how-to-steps">4. Open the SESL website.</div>
                                        <div class="how-to-steps">5. Input your details.</div>
                                        <div class="how-to-steps">6. Provide the transaction details</div>
                                        <div class="how-to-steps">7. Sign up and wait for the admin to confirm your subscription.</div>
                                    </div>
                                </div>
                                <div class="inputs">
                                    <label >Reference Number <i>(Must be 13 digits)</i></label><br>
                                    <input type="text" class="border" id="reference" name="reference" value="<?php if (isset($_POST['reference'])) { echo htmlentities($_POST['reference']); } ?>" >
                                </div>
                                <div class="flex-container">
                                    <div class="inputs">
                                        <label >Locker Number</label><br>
                                        <?php
                                            $showLockerNum = "select LockerNum from rent_details where LockerStatus = 'Available'";
                                            $LockerAvailableResult = mysqli_query($dbcon, $showLockerNum);
                                            
                                            echo'<select name="locker_num" class="gender-border" id="locker_num" onchanged="getSelectedValue();">';
                                            while($LockerAvailable = $LockerAvailableResult->fetch_array())
                                            {
                                                echo"<option value='$LockerAvailable[0]'>";
                                                echo $LockerAvailable[0].'</option>';
                                            }
                                            echo '</select>';
                                            ?>                                    
                                    </div>
                                    <div class="inputs">
                                        <label >Date of payment</label><br>
                                        <input type="date" class="border date-time" id="pdate" name="pdate" value="<?php if (isset($_POST['pdate'])) { echo htmlentities($_POST['pdate']); } ?>" >
                                    </div>
                                    <div class="inputs">
                                        <label >Time of paymnet</label><br>
                                        <input type="time" class="border date-time" id="ptime" name="ptime" value="<?php if (isset($_POST['ptime'])) { echo htmlentities($_POST['ptime']); } ?>" >
                                    </div>
                                </div>
                                <div class="inputs">
                                    <label >Proof of Payment</label><br>
                                    <input type="file" class="border img-attach" name="attach" placeholder="Attachment">
                                    <?php echo $attach_err;?>
                                </div><br><br>
                                <div class="end-text">
                                <label class="check-container">
                                    <input type="checkbox" checked="checked" name="checkedbox" required>
                                    <span class="checkmark"></span>
                                    I agree to the <a href="../php/tos.php" target="_blank" class="terms-policy"> Terms of Service</a> and
                                        <a href="../php/privacypolicy.php" target="_blank" class="terms-policy">Privacy Policy</a><br>
                                </label>
                                <div class="buttons">
                                    <button class="signup-btn" name='register' type="submit">Sign Up</button>
                                    <button class="reset-btn" type="reset">Reset</button>
                                </div>             
                                </div>

                            </form>


                </div>
            </div>

            <script>
                const burgermenu = document.querySelector('.burger-menu')
                const close = document.querySelector('.close-btn')
                const navi = document.querySelector('.right-navi')

                burgermenu.addEventListener('click',() => {
                    navi.classList.add('open-nav')
                })

                close.addEventListener('click',() => {
                    navi.classList.remove('open-nav')
                })

                var modal = document.getElementById("howToModal");

                var img = document.getElementById("howTo");
                var modalImg = document.getElementById("howToImg");
                img.onclick = function(){
                    modal.style.display = "block";
                    modalImg.src = "../images/HowToPay.png";
                }

                var span = document.getElementsByClassName("close")[0];

                span.onclick = function() {
                modal.style.display = "none";
                }

            </script>
</body>
</html>