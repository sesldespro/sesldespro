<?php

require 'mailer.php';
include 'config/db_config.php';


    $sub_enddate = date('Y-m-d');
    $sql = "SELECT * FROM user_info WHERE sub_enddate < '".$sub_enddate."'";
    $stmt = mysqli_query($dbcon,$sql);
                        
    while($row = mysqli_fetch_array($stmt)){

    $mail->setFrom('lgu.msms@gmail.com', 'MUNICIPAL EDUCATIONAL ASSISTANCE');          
    $mail->addAddress($row['email']);
    $mail->isHTML(true);  
    $mail->Subject = 'Sipocot Scholarship Program of the LGU';
      $mail->Body    = 'Good day!<br><br>
    This is the Sipocot Scholarship Program of the LGU.
    We regret to inform you that your application was rejected by the selection committee due to missing requirements that you submitted. 
    <br><br><b>Note:</b> Before clicking the submit button, double-check that all of the requirements have been met.<br><br> For Re-application, just click the button below.<br><br><a href="https://lgusipocot.com/applynow.php">Reapply</a>';
      $mail->send();
  


}

?>