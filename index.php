<div style="display: none;">
<?php

require 'sendphpmailer/mailer.php';
include 'config/db_config.php';


    $sub_enddate = date('Y-m-d');
    $sql = "SELECT * FROM user_info WHERE sub_enddate < '".$sub_enddate."' AND user_type = 'Subscriber'";
    $stmt = mysqli_query($dbcon,$sql);
                        
    while($row = mysqli_fetch_array($stmt)){

       $mail->setFrom('lgu.msms@gmail.com', 'SESL');          
    $mail->addAddress($row['email']);
    $mail->isHTML(true);  
    $mail->Subject = 'SESL Subscription';
      $mail->Body    = '
      <div style="text-align:center;font-size:24px;">
      Good day!<br><br>
     <div style="background-color:black;width:300px;margin:auto;color:#fff;font-size:24px;padding:20px 10px;">Your Subscription has been Expired</div></div>';
      $mail->send();

          $sql = "UPDATE `user_info` SET `user_type` = 'Non-subscriber'  WHERE sub_enddate < '".$sub_enddate."' AND user_type = 'Subscriber'";
            mysqli_query($dbcon, $sql);
   
  


}

?>
</div>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/x-icon" href="images/sesl.ico" />
    <title>SESL | Home</title>
    <link rel="stylesheet" href="public/css/css/homepage.css" />
    <link rel="stylesheet" href="public/css/css_responsive/homepage.css">
</head>
<header>
    <nav class="home-navi">
      <table class="home-navi-table">
        <td class="logo-img">
          <img src="images/logo.png" class="home-logo" />
        </td>
        <td class="logo-name">
          <a href="index.php" class="logotext">SESL</a>
          <svg class ="burger-menu" viewBox="0 0 20 12" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M1.5 1H19M1.5 6H19M1.5 11H19" stroke="#2d3a5e" stroke-width="2" stroke-linecap="round"/>
        </svg>
        </td>
        <td class="right-navi">
          <svg class="close-btn" viewBox="0 0 209 209" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M104.5 0C83.8319 0 63.6279 6.12882 46.4429 17.6114C29.258 29.094 15.864 45.4147 7.95463 64.5096C0.0452782 83.6044 -2.02417 104.616 2.00798 124.887C6.04014 145.158 15.9928 163.778 30.6074 178.393C45.222 193.007 63.8421 202.96 84.1131 206.992C104.384 211.024 125.396 208.955 144.49 201.045C163.585 193.136 179.906 179.742 191.389 162.557C202.871 145.372 209 125.168 209 104.5C209 90.7768 206.297 77.1881 201.045 64.5096C195.794 51.831 188.096 40.3111 178.393 30.6073C168.689 20.9036 157.169 13.2062 144.49 7.95459C131.812 2.70297 118.223 0 104.5 0V0ZM132.82 117.98C133.799 118.952 134.576 120.108 135.107 121.381C135.637 122.655 135.911 124.02 135.911 125.4C135.911 126.779 135.637 128.145 135.107 129.419C134.576 130.692 133.799 131.848 132.82 132.819C131.848 133.799 130.692 134.576 129.419 135.107C128.145 135.637 126.78 135.911 125.4 135.911C124.021 135.911 122.655 135.637 121.381 135.107C120.108 134.576 118.952 133.799 117.981 132.819L104.5 119.234L91.0195 132.819C90.0481 133.799 88.8923 134.576 87.6189 135.107C86.3454 135.637 84.9796 135.911 83.6 135.911C82.2205 135.911 80.8546 135.637 79.5812 135.107C78.3078 134.576 77.152 133.799 76.1805 132.819C75.2011 131.848 74.4236 130.692 73.8931 129.419C73.3626 128.145 73.0894 126.779 73.0894 125.4C73.0894 124.02 73.3626 122.655 73.8931 121.381C74.4236 120.108 75.2011 118.952 76.1805 117.98L89.7655 104.5L76.1805 91.0195C74.2128 89.0517 73.1073 86.3828 73.1073 83.6C73.1073 80.8171 74.2128 78.1483 76.1805 76.1805C78.1483 74.2127 80.8172 73.1072 83.6 73.1072C86.3829 73.1072 89.0518 74.2127 91.0195 76.1805L104.5 89.7655L117.981 76.1805C119.948 74.2127 122.617 73.1072 125.4 73.1072C128.183 73.1072 130.852 74.2127 132.82 76.1805C134.787 78.1483 135.893 80.8171 135.893 83.6C135.893 86.3828 134.787 89.0517 132.82 91.0195L119.235 104.5L132.82 117.98Z" fill="black"/>
            </svg>
          <div class="menu-list">
              <a href="#homepage-banner" class="menu">Home</a>
              <a href="#homepage-about" class="menu">About</a>
              <a href="#homepage-contactus" class="menu">Help</a>
              <a href="php/signin.php"><button class="sign-in-button" type="submit" >Sign In</button></a>
          </div>
        </td>
      </table>
    </nav>
</header>
<body>
    <div class="homepage-body">
      <div class="homepage-banner" id="homepage-banner">
        <div class="homepage-banner-logo">
          <img src="images/logo.png" class="banner-logo" />
        </div>
        <div class="homepage-banner-title">Welcome to SESL</div>
        <div class="homepage-banner-text">
          <span><img src="images/Done.png" class="done-img" /> Secured and Safe Packages</span><br>
          <span><img src="images/Done.png" class="done-img" /> Improved Customer Satisfaction</span>
        </div>
        <div class="homepage-banner-button">
          <a href="php/signin.php"><button class="getting-started-button" type="submit">Getting Started</button></a>
        </div>
      </div>
      <div class="homepage-about" id="homepage-about">
        <div class="aboutus-img-container">
          <img src="images/aboutus-img.png" class="about-logo" />
        </div>
        <div class="TOSContainer">
          <div class="TOSText">
            <h1>About Us</h1>
            <p>The Smart Electronic Storage Locker (SESL) was established in 2021 by a group of students obtaining a Bachelor of Science in Computer Engineering and a Bachelor of Science in Information and Communications Technology. They went on to receive their capstone project in Thesis Design at Rizal Technological University.</p><br>
            <p>Due to the difficulties encountered by both customers and delivery riders, the group decided to design a smart electronic storage locker that would help store parcels safely and provide convenience both to the customers and the riders. With the ideas and knowledge of different students seeking accomplishment to attain their future professions, we, the proponents, are dedicated to bringing efficiency, convenience, and high-quality service to our clients.</p>
          </div>
        </div>
      </div>
      <div class="homepage-contactus" id="homepage-contactus">
        <div class="contactus-container">
          <div class="settings-content">
            <div class="contactus-email">
              <div class="contact-content">
                <img src="images/Email.png" class="contact-icons" />
                <p class="text-clear">Email</p>
                <p class="text-fade">sesldespro@gmail.com</p>
              </div>
            </div>
            <div class="contactus-phone">
              <div class="contact-content">
                <img src="images/Phone.png" class="contact-icons" />
                <p class="text-clear">Phone</p>
                <p class="text-fade">(+63) 9000000000</p>
                <p class="text-fade">(02) 0000-0000</p>
              </div>  
            </div>
          </div>
        </div>
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
<footer>
  <div class="footer-container">
    <div class="logo-container">
      <img src="images/logo-res.png" class="footer-logo" />
      <div class="footer-logo-text">SESL</div>
    </div>
    <div class="bottom-footer-text">
      <div class="rights-container">
        <p class="rights">All Rights Reserved 2022.</p>
        <p class="purposes">For school purposes only*</p>
      </div>
      <div class="right-bottom-footer-text">
        <a href="php/tos.php" target="_blank"><p class="tos">Terms of Services</p></a>
        <p>|</p>
        <a href="php/privacypolicy.php" target="_blank"><p class="privacy-pol">Privacy Policy</p></a>
      </div>
    </div>
  </div>
</footer>
</html>
