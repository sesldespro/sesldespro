<?php 
    include("../../config/db_config.php"); 
    include("../nonsub/getuserinfo.php");
    $run = "SELECT * FROM profile_image WHERE user_gender='$g_gender'";
    $run = mysqli_query($dbcon, $run);

    while($row = mysqli_fetch_array($run)){
        $user_gender = $row['1'];
        $profile_images = $row['2'];

    }
?>
<img src = "<?php echo $profile_images; ?>">