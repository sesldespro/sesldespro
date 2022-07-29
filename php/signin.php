<?php
    session_start();
    // include("../config/db_config.php");

    date_default_timezone_set('Asia/Singapore');
    $todaydate= date('Y-m-d');
    $todaytime= date('H:i:s');
    

    $signin_err = "";
    $username = $password = "";



    if(isset($_POST['login'])){
        require("../config/db_config.php");
      
        $username = $_POST['username'];
        $password = $_POST['password'];  

        // Check User Account
        $check_admin="select * from user_info WHERE username='$username' AND user_password='$password' AND user_type='Admin'";
        $runadmin = mysqli_query($dbcon, $check_admin);

        if(mysqli_num_rows($runadmin)) 
        { 

            echo "<script>window.open('../Admin/AdminDashboard.php','_self')</script>";
    
            $_SESSION['admin'] = $username;//here session is used and value of $user_email store in $_SESSION.
          
        }
        else{
            $signin_err = '<span class="text-info">Invalid Credentials.</span>';
        }

        $check_user="select * from user_info WHERE username='$username' AND user_password='$password' AND user_type='Non-subscriber'";
        $run = mysqli_query($dbcon, $check_user);

        if(mysqli_num_rows($run)) 
        { 

            echo "<script>window.open('nonsub/dashboard.php','_self')</script>";
    
            $_SESSION['user'] = $username;//here session is used and value of $user_email store in $_SESSION.
          
        }
        else{
            $signin_err = '<span class="text-info">Invalid Credentials.</span>';
        }
        
        $check_userbasic="select * from user_info WHERE username='$username' AND user_password='$password' AND user_type='Subscriber'";
        $run2 = mysqli_query($dbcon, $check_userbasic);

        if(mysqli_num_rows($run2)) 
        {
            echo "<script>window.open('sub/dashboard.php','_self')</script>";
    
            $_SESSION['subuser'] = $username;//here session is used and value of $user_email store in $_SESSION.
        }
        else{
            $signin_err = '<span class="text-info">Invalid Credentials.</span>';
        }
    }

    if(isset($_POST['sign-up'])){
      require("../config/db_config.php");

      $check_lockernum = "SELECT LockerNum FROM `rent_details` WHERE LockerStatus='Available'";
      $check_run = mysqli_query($dbcon,$check_lockernum);

      while($row = mysqli_fetch_array($check_run)){
        $avail_locker = $row['0'];
      }

      if(empty($avail_locker))
      {
        echo '<script type="text/javascript"> alert("No locker is available at this moment. Please try again later.") </script>';
        echo "<script>window.open('signin.php','_self')</script>";
      }
      else{
        echo "<script>window.open('signup.php','_self')</script>";
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
    <title>SESL | Sign In</title>
    <link rel="stylesheet" href="../public/css/css/sign_in.css">
    <link rel="stylesheet" href="../public/css/css_responsive/signin.css">
</head>
<body>
    <nav class="home-navi">
        <table class="home-navi-table">
          <td class="logo-img">
            <img src="../images/logo.png" class="home-logo" />
          </td>
          <td class="logo-name">
            <a href="../index.php" class="logotext">SESL</a>
            <svg class ="burger-menu" viewBox="0 0 20 12" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M1.5 1H19M1.5 6H19M1.5 11H19" stroke="#2d3a5e" stroke-width="2" stroke-linecap="round"/>
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
      <div class="main-container">
        <div class="signin-container">
          <div class="signin-text">
            <h3>Welcome! <br>Please Sign In!</h3> 
          </div>
          <?php echo $signin_err; ?>
          <form action="signin.php" method="POST" class="signin-contents">
            <div class="signin-fields">
              <label for="username">Username*</label><br>
              <input type="text" id="username" name="username" value="" required><br>
            </div>
            <div class="signin-fields">
              <label for="password">Password*</label><br>
              <input type="password" id="password" name="password" value="" required><br>
            </div>
            <div class="bottom-signin">
              <button class="signin-btn-field" name="login" type="submit">Sign In</button>
            </div>
          </form>
          <form action="signin.php" method="POST" class="signin-contents">
            <div class="signin-fields">
              <div class="bottom-signin">
                <p>First time to subscribe? <button class="signup-text" name="sign-up" type="submit">Sign Up here.</button></p>
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

    </script>
</body>
</html>