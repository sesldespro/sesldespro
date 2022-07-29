<?php
session_start();//session starts here
if(!$_SESSION['user'])
{
    header("Location: signin.php");//redirect to login page to secure the welcome page without login access.
}
?>

<?php

    $current_pass_err ="";
    $new_pass_err="";


    if(isset($_POST['save'])){

        require("../../config/db_config.php");
        $user_acc = $_SESSION['user'];
        $current_pass = $_POST['current_pass'];
        $new_pass     = $_POST['new_pass'];
        $c_new_pass   = $_POST['c_new_pass'];


        $check_pass = "SELECT * FROM user_info WHERE username='$user_acc'";
        $query_pass = mysqli_query($dbcon, $check_pass);

        while($row = mysqli_fetch_array($query_pass)){
            $current_passdb = $row['user_password'];
        }

        if(empty($current_pass)){
            $current_pass_err = '<span class="text-info">Current Password is Empty.</span>';
        }elseif($current_pass !== $current_passdb){
            $current_pass_err = '<span class="text-info">Current Password is Incorrect.</span>';
        
        }

        if(empty($new_pass)){
            $new_pass_err = '<span class="text-info">New Password is Empty.</span>';
        }elseif($new_pass != $c_new_pass){
            $new_pass_err = '<span class="text-info">Passwords Does Not Match</span>';
        }elseif(strlen($new_pass) < 6) {
            $new_pass_err = '<span class="text-info">New Password must be at least 6 Characters</span>';
        }
        

        if((empty($new_pass_err))){
            $insert_new_pass = "UPDATE `user_info` SET `user_password`='$new_pass' WHERE `username`='$user_acc'";
            if(mysqli_query($dbcon, $insert_new_pass)){

                session_destroy();
                echo '<script type="text/javascript"> alert("Successfully Changed Password, Reload the Page and Login with New Password") </script>';
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
    <link rel="shortcut icon" type="image/x-icon" href="../../images/sesl.ico" />
    <title>Change Password</title>
    <link rel="stylesheet" href="../../public/css/css/changepass.css"/>
    <link rel="stylesheet" href="../../public/css/css_responsive/changepass.css">
</head>
<body>
    <div class="sidebar-wrapper">
        <div class="header">
            <img src="../../images/logo-res.png" class="head-logo">
            <img src="../../images/logo.png" class="logo-mobile">
            <a href="../nonsub/dashboard.php" class="logotext">SESL</a>
            <svg class="close-btn" viewBox="0 0 209 209" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M104.5 0C83.8319 0 63.6279 6.12882 46.4429 17.6114C29.258 29.094 15.864 45.4147 7.95463 64.5096C0.0452782 83.6044 -2.02417 104.616 2.00798 124.887C6.04014 145.158 15.9928 163.778 30.6074 178.393C45.222 193.007 63.8421 202.96 84.1131 206.992C104.384 211.024 125.396 208.955 144.49 201.045C163.585 193.136 179.906 179.742 191.389 162.557C202.871 145.372 209 125.168 209 104.5C209 90.7768 206.297 77.1881 201.045 64.5096C195.794 51.831 188.096 40.3111 178.393 30.6073C168.689 20.9036 157.169 13.2062 144.49 7.95459C131.812 2.70297 118.223 0 104.5 0V0ZM132.82 117.98C133.799 118.952 134.576 120.108 135.107 121.381C135.637 122.655 135.911 124.02 135.911 125.4C135.911 126.779 135.637 128.145 135.107 129.419C134.576 130.692 133.799 131.848 132.82 132.819C131.848 133.799 130.692 134.576 129.419 135.107C128.145 135.637 126.78 135.911 125.4 135.911C124.021 135.911 122.655 135.637 121.381 135.107C120.108 134.576 118.952 133.799 117.981 132.819L104.5 119.234L91.0195 132.819C90.0481 133.799 88.8923 134.576 87.6189 135.107C86.3454 135.637 84.9796 135.911 83.6 135.911C82.2205 135.911 80.8546 135.637 79.5812 135.107C78.3078 134.576 77.152 133.799 76.1805 132.819C75.2011 131.848 74.4236 130.692 73.8931 129.419C73.3626 128.145 73.0894 126.779 73.0894 125.4C73.0894 124.02 73.3626 122.655 73.8931 121.381C74.4236 120.108 75.2011 118.952 76.1805 117.98L89.7655 104.5L76.1805 91.0195C74.2128 89.0517 73.1073 86.3828 73.1073 83.6C73.1073 80.8171 74.2128 78.1483 76.1805 76.1805C78.1483 74.2127 80.8172 73.1072 83.6 73.1072C86.3829 73.1072 89.0518 74.2127 91.0195 76.1805L104.5 89.7655L117.981 76.1805C119.948 74.2127 122.617 73.1072 125.4 73.1072C128.183 73.1072 130.852 74.2127 132.82 76.1805C134.787 78.1483 135.893 80.8171 135.893 83.6C135.893 86.3828 134.787 89.0517 132.82 91.0195L119.235 104.5L132.82 117.98Z" fill="black"/>
                </svg>
        </div>
        <div class="sidebar-buttons">
            <ul class="sidebar-list">
                <a href="../nonsub/dashboard.php"><li class="list"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0.75 2C0.75 1.30964 1.30964 0.75 2 0.75H9.42857C10.1189 0.75 10.6786 1.30965 10.6786 2V10.5714C10.6786 11.2618 10.1189 11.8214 9.42857 11.8214H2C1.30965 11.8214 0.75 11.2618 0.75 10.5714V2ZM14.4643 2C14.4643 1.30964 15.0239 0.75 15.7143 0.75H22C22.6904 0.75 23.25 1.30964 23.25 2V6C23.25 6.69036 22.6904 7.25 22 7.25H15.7143C15.0239 7.25 14.4643 6.69035 14.4643 6V2ZM0.75 16.8571C0.75 16.1668 1.30964 15.6071 2 15.6071H9.42857C10.1189 15.6071 10.6786 16.1668 10.6786 16.8571V22C10.6786 22.6904 10.1189 23.25 9.42857 23.25H2C1.30965 23.25 0.75 22.6904 0.75 22V16.8571ZM14.4643 12.2857C14.4643 11.5954 15.0239 11.0357 15.7143 11.0357H22C22.6904 11.0357 23.25 11.5954 23.25 12.2857V22C23.25 22.6904 22.6904 23.25 22 23.25H15.7143C15.0239 23.25 14.4643 22.6904 14.4643 22V12.2857Z" stroke="#576FB0" stroke-width="1.5"/>
                    </svg>
                     Dashboard</li></a>
                <a href="../nonsub/activity.php"><li class="list"><svg width="21" height="26" viewBox="0 0 21 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M13 1H3.4C2.76348 1 2.15303 1.25286 1.70294 1.70294C1.25286 2.15303 1 2.76348 1 3.4V22.6C1 23.2365 1.25286 23.847 1.70294 24.2971C2.15303 24.7471 2.76348 25 3.4 25H17.8C18.4365 25 19.047 24.7471 19.4971 24.2971C19.9471 23.847 20.2 23.2365 20.2 22.6V8.2M13 1L20.2 8.2M13 1V8.2H20.2M15.4 14.2H5.8M15.4 19H5.8M8.2 9.4H5.8" stroke="#576FB0" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>                                       
                     Activity</li></a>
                <a href="../nonsub/notification.php"><li class="list"><svg width="22" height="26" viewBox="0 0 22 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M10.8462 25C11.7734 25 12.5851 24.4804 13.0047 23.7181C13.3324 23.1226 12.7567 22.5385 12.0769 22.5385H9.61538C8.93565 22.5385 8.35929 23.1224 8.68552 23.7188C9.10236 24.4807 9.91079 25 10.8462 25ZM18.5913 17.9759C18.3604 17.7451 18.2308 17.432 18.2308 17.1056V11.4615C18.2308 7.98009 16.5172 5.02108 13.4943 3.92273C13.0332 3.75518 12.6923 3.33677 12.6923 2.84615C12.6923 1.82462 11.8677 1 10.8462 1C9.82462 1 9 1.82462 9 2.84615C9 3.33669 8.65899 3.75498 8.19767 3.92175C5.1655 5.01791 3.46154 7.96793 3.46154 11.4615V17.1056C3.46154 17.432 3.33187 17.7451 3.10105 17.9759L1.2549 19.822C1.09169 19.9852 1 20.2066 1 20.4374C1 20.9181 1.38964 21.3077 1.87029 21.3077H19.822C20.3027 21.3077 20.6923 20.9181 20.6923 20.4374C20.6923 20.2066 20.6006 19.9852 20.4374 19.822L18.5913 17.9759Z" stroke="#576FB0" stroke-width="1.5"/>
                    </svg>                                        
                     Notification</li></a>
                <a href="../nonsub/profile.php"><li class="list"><svg width="24" height="26" viewBox="0 0 24 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M22.3333 25V22.3333C22.3333 20.9188 21.7714 19.5623 20.7712 18.5621C19.771 17.5619 18.4145 17 17 17H6.33333C4.91885 17 3.56229 17.5619 2.5621 18.5621C1.5619 19.5623 1 20.9188 1 22.3333V25M17 6.33333C17 9.27885 14.6122 11.6667 11.6667 11.6667C8.72115 11.6667 6.33333 9.27885 6.33333 6.33333C6.33333 3.38781 8.72115 1 11.6667 1C14.6122 1 17 3.38781 17 6.33333Z" stroke="#576FB0" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>                   
                     Profile</li></a>
                <a href="../nonsub/setting.php"><li class="list"><svg width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M13 16.2727C14.8075 16.2727 16.2727 14.8075 16.2727 13C16.2727 11.1925 14.8075 9.72727 13 9.72727C11.1925 9.72727 9.72727 11.1925 9.72727 13C9.72727 14.8075 11.1925 16.2727 13 16.2727Z" stroke="url(#paint0_linear_245_524)" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M21.0727 16.2727C20.9275 16.6018 20.8842 16.9668 20.9484 17.3206C21.0125 17.6745 21.1812 18.0011 21.4327 18.2582L21.4982 18.3236C21.701 18.5263 21.862 18.7669 21.9718 19.0318C22.0816 19.2966 22.1381 19.5805 22.1381 19.8673C22.1381 20.154 22.0816 20.4379 21.9718 20.7028C21.862 20.9676 21.701 21.2083 21.4982 21.4109C21.2956 21.6138 21.0549 21.7747 20.7901 21.8845C20.5252 21.9943 20.2413 22.0508 19.9545 22.0508C19.6678 22.0508 19.3839 21.9943 19.119 21.8845C18.8542 21.7747 18.6135 21.6138 18.4109 21.4109L18.3455 21.3455C18.0884 21.094 17.7618 20.9253 17.4079 20.8611C17.054 20.7969 16.689 20.8402 16.36 20.9855C16.0373 21.1237 15.7622 21.3534 15.5683 21.646C15.3745 21.9387 15.2705 22.2817 15.2691 22.6327V22.8182C15.2691 23.3968 15.0392 23.9518 14.6301 24.361C14.2209 24.7701 13.6659 25 13.0873 25C12.5086 25 11.9537 24.7701 11.5445 24.361C11.1353 23.9518 10.9055 23.3968 10.9055 22.8182V22.72C10.897 22.3589 10.7801 22.0087 10.57 21.7149C10.3599 21.4212 10.0663 21.1974 9.72727 21.0727C9.39824 20.9275 9.03324 20.8842 8.67936 20.9484C8.32547 21.0125 7.99892 21.1812 7.74182 21.4327L7.67636 21.4982C7.47373 21.701 7.2331 21.862 6.96823 21.9718C6.70336 22.0816 6.41945 22.1381 6.13273 22.1381C5.846 22.1381 5.56209 22.0816 5.29722 21.9718C5.03235 21.862 4.79172 21.701 4.58909 21.4982C4.38623 21.2956 4.2253 21.0549 4.11551 20.7901C4.00571 20.5252 3.94919 20.2413 3.94919 19.9545C3.94919 19.6678 4.00571 19.3839 4.11551 19.119C4.2253 18.8542 4.38623 18.6135 4.58909 18.4109L4.65455 18.3455C4.90604 18.0884 5.07475 17.7618 5.13891 17.4079C5.20308 17.054 5.15976 16.689 5.01455 16.36C4.87626 16.0373 4.64664 15.7622 4.35396 15.5683C4.06128 15.3745 3.71831 15.2705 3.36727 15.2691H3.18182C2.60316 15.2691 2.04821 15.0392 1.63904 14.6301C1.22987 14.2209 1 13.6659 1 13.0873C1 12.5086 1.22987 11.9537 1.63904 11.5445C2.04821 11.1353 2.60316 10.9055 3.18182 10.9055H3.28C3.64108 10.897 3.99128 10.7801 4.28505 10.57C4.57883 10.3599 4.8026 10.0663 4.92727 9.72727C5.07249 9.39824 5.11581 9.03324 5.05164 8.67936C4.98748 8.32547 4.81877 7.99892 4.56727 7.74182L4.50182 7.67636C4.29896 7.47373 4.13803 7.2331 4.02823 6.96823C3.91843 6.70336 3.86192 6.41945 3.86192 6.13273C3.86192 5.846 3.91843 5.56209 4.02823 5.29722C4.13803 5.03235 4.29896 4.79172 4.50182 4.58909C4.70445 4.38623 4.94508 4.2253 5.20995 4.11551C5.47482 4.00571 5.75873 3.94919 6.04545 3.94919C6.33218 3.94919 6.61609 4.00571 6.88096 4.11551C7.14583 4.2253 7.38646 4.38623 7.58909 4.58909L7.65455 4.65455C7.91165 4.90604 8.2382 5.07475 8.59209 5.13891C8.94597 5.20308 9.31096 5.15976 9.64 5.01455H9.72727C10.0499 4.87626 10.3251 4.64664 10.5189 4.35396C10.7128 4.06128 10.8168 3.71831 10.8182 3.36727V3.18182C10.8182 2.60316 11.0481 2.04821 11.4572 1.63904C11.8664 1.22987 12.4213 1 13 1C13.5787 1 14.1336 1.22987 14.5428 1.63904C14.9519 2.04821 15.1818 2.60316 15.1818 3.18182V3.28C15.1832 3.63104 15.2872 3.97401 15.4811 4.26669C15.6749 4.55937 15.9501 4.78899 16.2727 4.92727C16.6018 5.07249 16.9668 5.11581 17.3206 5.05164C17.6745 4.98748 18.0011 4.81877 18.2582 4.56727L18.3236 4.50182C18.5263 4.29896 18.7669 4.13803 19.0318 4.02823C19.2966 3.91843 19.5805 3.86192 19.8673 3.86192C20.154 3.86192 20.4379 3.91843 20.7028 4.02823C20.9676 4.13803 21.2083 4.29896 21.4109 4.50182C21.6138 4.70445 21.7747 4.94508 21.8845 5.20995C21.9943 5.47482 22.0508 5.75873 22.0508 6.04545C22.0508 6.33218 21.9943 6.61609 21.8845 6.88096C21.7747 7.14583 21.6138 7.38646 21.4109 7.58909L21.3455 7.65455C21.094 7.91165 20.9253 8.2382 20.8611 8.59209C20.7969 8.94597 20.8402 9.31096 20.9855 9.64V9.72727C21.1237 10.0499 21.3534 10.3251 21.646 10.5189C21.9387 10.7128 22.2817 10.8168 22.6327 10.8182H22.8182C23.3968 10.8182 23.9518 11.0481 24.361 11.4572C24.7701 11.8664 25 12.4213 25 13C25 13.5787 24.7701 14.1336 24.361 14.5428C23.9518 14.9519 23.3968 15.1818 22.8182 15.1818H22.72C22.369 15.1832 22.026 15.2872 21.7333 15.4811C21.4406 15.6749 21.211 15.9501 21.0727 16.2727Z" stroke="url(#paint1_linear_245_524)" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <defs>
                    <linearGradient id="paint0_linear_245_524" x1="13" y1="1" x2="13" y2="25" gradientUnits="userSpaceOnUse">
                    <stop stop-color="#1FB89C"/>
                    <stop offset="0.510417" stop-color="#3C817E"/>
                    <stop offset="1" stop-color="#B0A994"/>
                    </linearGradient>
                    <linearGradient id="paint1_linear_245_524" x1="13" y1="1" x2="13" y2="25" gradientUnits="userSpaceOnUse">
                    <stop stop-color="#1FB89C"/>
                    <stop offset="0.510417" stop-color="#3C817E"/>
                    <stop offset="1" stop-color="#B0A994"/>
                    </linearGradient>
                    </defs>
                    </svg>
                     Settings</li></a>
            </ul>
            <div class="logout">
                <a href="../nonsub/logout.php" class="logout-text"><svg width="27" height="26" viewBox="0 0 27 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M20.05 5.2C20.05 5.61421 20.3858 5.95 20.8 5.95C21.2142 5.95 21.55 5.61421 21.55 5.2H20.05ZM19.6 1V1.75V1ZM2.2 1V0.25V1ZM21.55 20.2C21.55 19.7858 21.2142 19.45 20.8 19.45C20.3858 19.45 20.05 19.7858 20.05 20.2H21.55ZM10.6 12.25C10.1858 12.25 9.85 12.5858 9.85 13C9.85 13.4142 10.1858 13.75 10.6 13.75V12.25ZM25 13L25.4359 13.6103L26.2903 13L25.4359 12.3897L25 13ZM21.2359 9.3897C20.8989 9.14894 20.4305 9.22701 20.1897 9.56407C19.9489 9.90113 20.027 10.3695 20.3641 10.6103L21.2359 9.3897ZM20.3641 15.3897C20.027 15.6305 19.9489 16.0989 20.1897 16.4359C20.4305 16.773 20.8989 16.8511 21.2359 16.6103L20.3641 15.3897ZM21.55 5.2V2.2H20.05V5.2H21.55ZM19.6 0.25L2.2 0.25V1.75L19.6 1.75V0.25ZM0.249999 2.2V23.2H1.75V2.2H0.249999ZM2.2 25.15H19.6V23.65H2.2V25.15ZM21.55 23.2V20.2H20.05V23.2H21.55ZM19.6 25.15C20.677 25.15 21.55 24.277 21.55 23.2H20.05C20.05 23.4485 19.8485 23.65 19.6 23.65V25.15ZM0.249999 23.2C0.249999 24.277 1.12304 25.15 2.2 25.15V23.65C1.95147 23.65 1.75 23.4485 1.75 23.2H0.249999ZM2.2 0.25C1.12305 0.25 0.249999 1.12304 0.249999 2.2H1.75C1.75 1.95147 1.95147 1.75 2.2 1.75V0.25ZM21.55 2.2C21.55 1.12304 20.677 0.25 19.6 0.25V1.75C19.8485 1.75 20.05 1.95147 20.05 2.2H21.55ZM10.6 13.75H25V12.25H10.6V13.75ZM25.4359 12.3897L21.2359 9.3897L20.3641 10.6103L24.5641 13.6103L25.4359 12.3897ZM24.5641 12.3897L20.3641 15.3897L21.2359 16.6103L25.4359 13.6103L24.5641 12.3897Z" fill="url(#paint0_linear_59_103)"/>
                    <defs>
                    <linearGradient id="paint0_linear_59_103" x1="13" y1="1" x2="13" y2="24.4" gradientUnits="userSpaceOnUse">
                    <stop stop-color="#F85050"/>
                    <stop offset="1" stop-color="#DD3333"/>
                    </linearGradient>
                    </defs>
                    </svg>
                    Logout</a>
            </div>
        </div>
    </div>
    <svg class ="burger-menu" viewBox="0 0 20 12" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M1.5 1H19M1.5 6H19M1.5 11H19" stroke="#2d3a5e" stroke-width="2" stroke-linecap="round"/>
    </svg>
    <div class="changepass-container">
        <div class="navigation">
            <h1 class="navi-color"><a href="../nonsub/setting.php" class="head-navi">Settings ></a>  Change Password</h1>
        </div>
        <div class="change-container">
            <form action="changepass.php" method="POST">
                <div class="changepass-fields">
                    <h1>Please Input all fields to Change Password</h1><br>
                    <label>Current Password</label>
                    <input type="text" class="change-field" name="current_pass">
                    <?php echo $current_pass_err;?><br>
                    <label>New Password</label>
                    <input type="password" class="change-field" name="new_pass">
                    <?php echo $new_pass_err;?><br>
                    <label>Confirm New Password</label>
                    <input type="password" class="change-field" name="c_new_pass">
                        <div class="change-buttons">
                            <button type="button" class="cancel-btn" value="cancel" onClick="location.href='dashboard.php';">Cancel</button>
                            <button type="submit" class="save-btn" name="save">Save</button>
                        </div>
                </div>
            </form>    
        </div>
    </div>

    <script>
        const burgermenu = document.querySelector('.burger-menu')
        const close = document.querySelector('.close-btn')
        const navi = document.querySelector('.sidebar-wrapper')
  
        burgermenu.addEventListener('click',() => {
            navi.classList.add('open-nav')
        })
  
        close.addEventListener('click',() => {
            navi.classList.remove('open-nav')
        })
  
    </script>
</body>
</html>