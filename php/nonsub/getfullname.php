<?php 
    include("../../config/db_config.php"); 
    $run = "SELECT * FROM user_info WHERE username='{$_SESSION['user']}'";
    $run = mysqli_query($dbcon, $run);

    while($row = mysqli_fetch_array($run)){
        $g_username = $row['1'];
        $g_fullname = $row['2'];
        $g_address  = $row['3'];
        $g_birthday = $row['4'];
        $g_gender   = $row['5'];
        $g_phone    = $row['6'];
        $g_email    = $row['7'];
        $g_password = $row['8'];
    }
?>
<h1><?php echo 'Good Day ' . $g_fullname . '!' ; ?></h1>


