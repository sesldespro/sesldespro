<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/x-icon" href="../images/sesl.ico" />
    <title>SESL | About</title>
    <link rel="stylesheet" href="../public/css/css/abouthomepage.css" />
    <link rel="stylesheet" href="../public/css/css_responsive/abouthome.css">
</head>
<body>
    <!-- <nav class="home-navi">
      <table class="home-navi-table">
        <td class="logo-img">
          <img src="../images/logo.png" class="home-logo" />
        </td>
        <td class="logo-name">
          <a href="../php/homepage.php" class="logotext">SESL</a>
          <svg class ="burger-menu" viewBox="0 0 20 12" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M1.5 1H19M1.5 6H19M1.5 11H19" stroke="#2d3a5e" stroke-width="2" stroke-linecap="round"/>
        </svg>
        </td>
        <td class="right-navi">
          <svg class="close-btn" viewBox="0 0 209 209" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M104.5 0C83.8319 0 63.6279 6.12882 46.4429 17.6114C29.258 29.094 15.864 45.4147 7.95463 64.5096C0.0452782 83.6044 -2.02417 104.616 2.00798 124.887C6.04014 145.158 15.9928 163.778 30.6074 178.393C45.222 193.007 63.8421 202.96 84.1131 206.992C104.384 211.024 125.396 208.955 144.49 201.045C163.585 193.136 179.906 179.742 191.389 162.557C202.871 145.372 209 125.168 209 104.5C209 90.7768 206.297 77.1881 201.045 64.5096C195.794 51.831 188.096 40.3111 178.393 30.6073C168.689 20.9036 157.169 13.2062 144.49 7.95459C131.812 2.70297 118.223 0 104.5 0V0ZM132.82 117.98C133.799 118.952 134.576 120.108 135.107 121.381C135.637 122.655 135.911 124.02 135.911 125.4C135.911 126.779 135.637 128.145 135.107 129.419C134.576 130.692 133.799 131.848 132.82 132.819C131.848 133.799 130.692 134.576 129.419 135.107C128.145 135.637 126.78 135.911 125.4 135.911C124.021 135.911 122.655 135.637 121.381 135.107C120.108 134.576 118.952 133.799 117.981 132.819L104.5 119.234L91.0195 132.819C90.0481 133.799 88.8923 134.576 87.6189 135.107C86.3454 135.637 84.9796 135.911 83.6 135.911C82.2205 135.911 80.8546 135.637 79.5812 135.107C78.3078 134.576 77.152 133.799 76.1805 132.819C75.2011 131.848 74.4236 130.692 73.8931 129.419C73.3626 128.145 73.0894 126.779 73.0894 125.4C73.0894 124.02 73.3626 122.655 73.8931 121.381C74.4236 120.108 75.2011 118.952 76.1805 117.98L89.7655 104.5L76.1805 91.0195C74.2128 89.0517 73.1073 86.3828 73.1073 83.6C73.1073 80.8171 74.2128 78.1483 76.1805 76.1805C78.1483 74.2127 80.8172 73.1072 83.6 73.1072C86.3829 73.1072 89.0518 74.2127 91.0195 76.1805L104.5 89.7655L117.981 76.1805C119.948 74.2127 122.617 73.1072 125.4 73.1072C128.183 73.1072 130.852 74.2127 132.82 76.1805C134.787 78.1483 135.893 80.8171 135.893 83.6C135.893 86.3828 134.787 89.0517 132.82 91.0195L119.235 104.5L132.82 117.98Z" fill="black"/>
            </svg>
          <div class="menu-list">
              <a href="../php/homepage.php" class="menu">Home</a>
              <a href="#" class="menu">About</a>
              <a href="#" class="menu">Help</a>
              <a href="./sign_in.html"><button class="sign-in-button" type="submit" >Sign In</button></a>
          </div>
        </td>
      </table>
    </nav> -->
    <div class="TOSContainer">
      <div class="TOSText">
        <img src="../images/aboutus-img.png" class="about-logo" />
        <h1>About Us</h1>
        <p>The Smart Electronic Storage Locker (SESL) was established in 2021 by a group of students obtaining a Bachelor of Science in Computer Engineering and a Bachelor of Science in Information and Communications Technology. They went on to receive their capstone project in Thesis Design at Rizal Technological University.</p><br>
                <p>Due to the difficulties encountered by both customers and delivery riders, the group decided to design a smart electronic storage locker that would help store parcels safely and provide convenience both to the customers and the riders. With the ideas and knowledge of different students seeking accomplishment to attain their future professions, we, the proponents, are dedicated to bringing efficiency, convenience, and high-quality service to our clients.</p>
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
