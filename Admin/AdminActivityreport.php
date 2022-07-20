<?php
session_start();//session starts here
if(!$_SESSION['admin'])
{
    header("Location:../php/signin.php");//redirect to login page to secure the welcome page without login access.
}
?>

<?php 
    include("../config/db_config.php"); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/x-icon" href="../images/sesl.ico" />
    <title>SESL Admin Transaction</title>
    <link rel="stylesheet" href="../public/css/cssadmin/AdminActivityreport.css">
</head>
<body>

    <!-- Side Menu -->
    <div class="sidemenu">
        <div class="logo">
            <a href="../html/Admindashboard.php" class="logotext">
                <img src="../images/logo.png" class="logo-mobile">
            </a>
        </div>
        <div class="MenuServices">
        <a href ="../Admin/AdminDashboard.php" alt="Dashboard">
            <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M4.125 3.25H11.625V0.75H4.125V3.25ZM12.875 4.5V13.25H15.375V4.5H12.875ZM11.625 14.5H4.125V17H11.625V14.5ZM2.875 13.25V4.5H0.375V13.25H2.875ZM4.125 14.5C3.43464 14.5 2.875 13.9404 2.875 13.25H0.375C0.375 15.3211 2.05393 17 4.125 17V14.5ZM12.875 13.25C12.875 13.9404 12.3154 14.5 11.625 14.5V17C13.6961 17 15.375 15.3211 15.375 13.25H12.875ZM11.625 3.25C12.3154 3.25 12.875 3.80964 12.875 4.5H15.375C15.375 2.42893 13.6961 0.75 11.625 0.75V3.25ZM4.125 0.75C2.05393 0.75 0.375 2.42893 0.375 4.5H2.875C2.875 3.80964 3.43464 3.25 4.125 3.25V0.75ZM19.125 3.25H25.375V0.75H19.125V3.25ZM26.625 4.5V8.25H29.125V4.5H26.625ZM25.375 9.5H19.125V12H25.375V9.5ZM17.875 8.25V4.5H15.375V8.25H17.875ZM19.125 9.5C18.4346 9.5 17.875 8.94036 17.875 8.25H15.375C15.375 10.3211 17.0539 12 19.125 12V9.5ZM26.625 8.25C26.625 8.94036 26.0654 9.5 25.375 9.5V12C27.4461 12 29.125 10.3211 29.125 8.25H26.625ZM25.375 3.25C26.0654 3.25 26.625 3.80964 26.625 4.5H29.125C29.125 2.42893 27.4461 0.75 25.375 0.75V3.25ZM19.125 0.75C17.0539 0.75 15.375 2.42893 15.375 4.5H17.875C17.875 3.80964 18.4346 3.25 19.125 3.25V0.75ZM4.125 19.5H11.625V17H4.125V19.5ZM12.875 20.75V25.75H15.375V20.75H12.875ZM11.625 27H4.125V29.5H11.625V27ZM2.875 25.75V20.75H0.375V25.75H2.875ZM4.125 27C3.43464 27 2.875 26.4404 2.875 25.75H0.375C0.375 27.8211 2.05393 29.5 4.125 29.5V27ZM12.875 25.75C12.875 26.4404 12.3154 27 11.625 27V29.5C13.6961 29.5 15.375 27.8211 15.375 25.75H12.875ZM11.625 19.5C12.3154 19.5 12.875 20.0596 12.875 20.75H15.375C15.375 18.6789 13.6961 17 11.625 17V19.5ZM4.125 17C2.05393 17 0.375 18.6789 0.375 20.75H2.875C2.875 20.0596 3.43464 19.5 4.125 19.5V17ZM19.125 14.5H25.375V12H19.125V14.5ZM26.625 15.75V25.75H29.125V15.75H26.625ZM25.375 27H19.125V29.5H25.375V27ZM17.875 25.75V15.75H15.375V25.75H17.875ZM19.125 27C18.4346 27 17.875 26.4404 17.875 25.75H15.375C15.375 27.8211 17.0539 29.5 19.125 29.5V27ZM26.625 25.75C26.625 26.4404 26.0654 27 25.375 27V29.5C27.4461 29.5 29.125 27.8211 29.125 25.75H26.625ZM25.375 14.5C26.0654 14.5 26.625 15.0596 26.625 15.75H29.125C29.125 13.6789 27.4461 12 25.375 12V14.5ZM19.125 12C17.0539 12 15.375 13.6789 15.375 15.75H17.875C17.875 15.0596 18.4346 14.5 19.125 14.5V12Z" fill="#C4C4C4"/>
            </svg>
                
            <span class="tooltip">Dashboard</span>
        </a>
        
        <a href ="../Admin/AdminSubscription.php">
            <svg width="27" height="26" viewBox="0 0 27 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M10.9621 9.83031L12.1509 10.2166L10.9621 9.83031ZM2.24798 10.3303L1.51325 11.3416L2.24798 10.3303ZM9.12151 15.495L10.3103 15.8813L9.12151 15.495ZM9.04885 15.2714L9.78358 14.2602L9.04885 15.2714ZM6.83157 23.7136L6.09684 22.7023L6.83157 23.7136ZM13.8676 18.7724L14.6023 17.7612L13.8676 18.7724ZM13.6324 18.7724L14.3672 19.7837L13.6324 18.7724ZM20.9762 23.4899L19.7874 23.8762L20.9762 23.4899ZM18.4511 15.2714L17.7164 14.2602L18.4511 15.2714ZM18.3785 15.495L17.1897 15.8813L18.3785 15.495ZM25.252 10.3303L25.9868 11.3416L25.252 10.3303ZM16.5379 9.83031L17.7267 9.44404L16.5379 9.83031ZM13.9402 1.83541L12.7514 2.22168L13.9402 1.83541ZM13.5598 1.83541L14.7486 2.22168L13.5598 1.83541ZM12.7514 2.22168L15.3491 10.2166L17.7267 9.44404L15.129 1.44914L12.7514 2.22168ZM16.7281 11.2185H25.1345V8.71851H16.7281V11.2185ZM24.5173 9.31904L17.7164 14.2602L19.1859 16.2827L25.9868 11.3416L24.5173 9.31904ZM17.1897 15.8813L19.7874 23.8762L22.165 23.1037L19.5673 15.1088L17.1897 15.8813ZM21.4032 22.7023L14.6023 17.7612L13.1328 19.7837L19.9337 24.7248L21.4032 22.7023ZM12.8977 17.7612L6.09684 22.7023L7.5663 24.7248L14.3672 19.7837L12.8977 17.7612ZM7.71263 23.8762L10.3103 15.8813L7.93268 15.1088L5.33498 23.1037L7.71263 23.8762ZM9.78358 14.2602L2.98271 9.31904L1.51325 11.3416L8.31412 16.2827L9.78358 14.2602ZM2.36554 11.2185H10.7719V8.71851H2.36554V11.2185ZM12.1509 10.2166L14.7486 2.22168L12.371 1.44914L9.77327 9.44404L12.1509 10.2166ZM10.7719 11.2185C11.4001 11.2185 11.9568 10.814 12.1509 10.2166L9.77327 9.44404C9.91384 9.01142 10.317 8.71851 10.7719 8.71851V11.2185ZM2.98271 9.31904C3.80561 9.91691 3.3827 11.2185 2.36554 11.2185V8.71851C0.960881 8.71851 0.376869 10.516 1.51325 11.3416L2.98271 9.31904ZM10.3103 15.8813C10.5044 15.2839 10.2918 14.6294 9.78358 14.2602L8.31412 16.2827C7.94611 16.0153 7.79212 15.5414 7.93268 15.1088L10.3103 15.8813ZM6.09684 22.7023C6.91974 22.1044 8.02695 22.9088 7.71263 23.8762L5.33498 23.1037C4.90092 24.4396 6.42992 25.5505 7.5663 24.7248L6.09684 22.7023ZM14.6023 17.7612C14.0941 17.3919 13.4059 17.3919 12.8977 17.7612L14.3672 19.7837C13.9992 20.0511 13.5008 20.0511 13.1328 19.7837L14.6023 17.7612ZM19.7874 23.8762C19.4731 22.9088 20.5803 22.1044 21.4032 22.7023L19.9337 24.7248C21.0701 25.5505 22.5991 24.4396 22.165 23.1037L19.7874 23.8762ZM17.7164 14.2602C17.2082 14.6294 16.9956 15.2839 17.1897 15.8813L19.5673 15.1088C19.7079 15.5414 19.5539 16.0153 19.1859 16.2827L17.7164 14.2602ZM25.1345 11.2185C24.1173 11.2185 23.6944 9.91692 24.5173 9.31904L25.9868 11.3416C27.1231 10.516 26.5391 8.71851 25.1345 8.71851V11.2185ZM15.3491 10.2166C15.5432 10.814 16.0999 11.2185 16.7281 11.2185V8.71851C17.183 8.71851 17.5862 9.01142 17.7267 9.44404L15.3491 10.2166ZM15.129 1.44914C14.695 0.113235 12.805 0.113242 12.371 1.44914L14.7486 2.22168C14.4343 3.18905 13.0657 3.18906 12.7514 2.22168L15.129 1.44914Z" fill="#C4C4C4"/>
            </svg>    
            <span class="tooltip">Subscription</span>
        </a>
        <a href ="../Admin/AdminUserlist.php">
            <svg width="29" height="24" viewBox="0 0 29 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M20.4791 22.7004V20.4087C20.4791 19.1931 19.9963 18.0273 19.1367 17.1678C18.2772 16.3082 17.1114 15.8254 15.8958 15.8254H6.72915C5.51357 15.8254 4.34778 16.3082 3.48824 17.1678C2.6287 18.0273 2.14581 19.1931 2.14581 20.4087V22.7004M27.3541 22.7004V20.4087C27.3534 19.3932 27.0154 18.4067 26.3932 17.6041C25.771 16.8014 24.8999 16.2282 23.9166 15.9743M19.3333 2.22432C20.3192 2.47675 21.193 3.05013 21.8171 3.85405C22.4411 4.65798 22.7798 5.64673 22.7798 6.66443C22.7798 7.68212 22.4411 8.67087 21.8171 9.4748C21.193 10.2787 20.3192 10.8521 19.3333 11.1045M15.8958 6.6587C15.8958 9.19 13.8438 11.242 11.3125 11.242C8.78117 11.242 6.72915 9.19 6.72915 6.6587C6.72915 4.12739 8.78117 2.07536 11.3125 2.07536C13.8438 2.07536 15.8958 4.12739 15.8958 6.6587Z" stroke="#C4C4C4" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            <span class="tooltip">User</span>
        </a>
        <a href ="../Admin/AdminTransaction.php">
            <svg width="28" height="31" viewBox="0 0 28 31" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M13.75 27.929L14.6248 28.6755L15.2471 27.9463L14.6418 27.2029L13.75 27.929ZM2.4 15.429C2.4 14.7939 1.88513 14.279 1.25 14.279C0.614873 14.279 0.1 14.7939 0.1 15.429H2.4ZM13.75 1.779C13.1149 1.779 12.6 2.29387 12.6 2.929C12.6 3.56412 13.1149 4.079 13.75 4.079V1.779ZM25.1 15.429C25.1 16.0641 25.6149 16.579 26.25 16.579C26.8851 16.579 27.4 16.0641 27.4 15.429H25.1ZM13.2663 25.5134C12.8653 25.0209 12.141 24.9467 11.6484 25.3477C11.1559 25.7487 11.0817 26.473 11.4827 26.9656L13.2663 25.5134ZM11.4997 28.7943C11.0874 29.2774 11.1449 30.0032 11.628 30.4155C12.1111 30.8278 12.837 30.7704 13.2493 30.2873L11.4997 28.7943ZM9.4765 12.388C8.84137 12.388 8.3265 12.9028 8.3265 13.538C8.3265 14.1731 8.84137 14.688 9.4765 14.688V12.388ZM18.0235 14.688C18.6586 14.688 19.1735 14.1731 19.1735 13.538C19.1735 12.9028 18.6586 12.388 18.0235 12.388V14.688ZM11.3462 11.1021V9.95207H10.1962V11.1021H11.3462ZM14.3376 11.1021L14.3376 9.95207H14.3376V11.1021ZM10.1962 19.8093C10.1962 20.4445 10.711 20.9593 11.3462 20.9593C11.9813 20.9593 12.4962 20.4445 12.4962 19.8093H10.1962ZM15.7265 11.6897L16.4991 10.8379H16.4991L15.7265 11.6897ZM16.4744 13.2922L17.6225 13.2277L16.4744 13.2922ZM15.7265 15.1619L14.974 14.2923L15.7265 15.1619ZM13.6432 2.98241L12.9392 2.07308L12.0032 2.7977L12.7545 3.71236L13.6432 2.98241ZM13.9832 5.20809C14.3863 5.69887 15.111 5.76992 15.6017 5.36678C16.0925 4.96364 16.1636 4.23897 15.7604 3.74819L13.9832 5.20809ZM16.0031 2.6097C16.5054 2.22089 16.5973 1.49857 16.2085 0.996364C15.8197 0.494154 15.0974 0.402223 14.5951 0.791031L16.0031 2.6097ZM21.4675 15.3756C21.4675 19.6083 18.0362 23.0397 13.8034 23.0397V25.3397C19.3064 25.3397 23.7675 20.8786 23.7675 15.3756H21.4675ZM13.8034 23.0397C9.57065 23.0397 6.13932 19.6083 6.13932 15.3756H3.83932C3.83932 20.8786 8.3004 25.3397 13.8034 25.3397V23.0397ZM6.13932 15.3756C6.13932 11.1428 9.57065 7.71147 13.8034 7.71147V5.41147C8.3004 5.41147 3.83932 9.87255 3.83932 15.3756H6.13932ZM13.8034 7.71147C18.0362 7.71147 21.4675 11.1428 21.4675 15.3756H23.7675C23.7675 9.87255 19.3064 5.41147 13.8034 5.41147V7.71147ZM13.75 26.779C7.48157 26.779 2.4 21.6974 2.4 15.429H0.1C0.1 22.9677 6.21131 29.079 13.75 29.079V26.779ZM13.75 4.079C20.0184 4.079 25.1 9.16056 25.1 15.429H27.4C27.4 7.89031 21.2887 1.779 13.75 1.779V4.079ZM14.6418 27.2029L13.2663 25.5134L11.4827 26.9656L12.8582 28.6551L14.6418 27.2029ZM12.8752 27.1825L11.4997 28.7943L13.2493 30.2873L14.6248 28.6755L12.8752 27.1825ZM9.4765 14.688H18.0235V12.388H9.4765V14.688ZM11.3462 12.2521H14.3376V9.95207H11.3462V12.2521ZM10.1962 11.1021V15.6961H12.4962V11.1021H10.1962ZM10.1962 15.6961V19.8093H12.4962V15.6961H10.1962ZM14.2207 14.5521C14.223 14.5518 14.2107 14.553 14.177 14.5547C14.146 14.5562 14.1055 14.5577 14.0554 14.559C13.9552 14.5617 13.8285 14.5635 13.6821 14.5645C13.3898 14.5665 13.0357 14.5652 12.6907 14.5625C12.3465 14.5598 12.015 14.5557 11.7694 14.5523C11.6466 14.5506 11.5455 14.5491 11.4751 14.548C11.44 14.5475 11.4125 14.547 11.3939 14.5467C11.3846 14.5466 11.3775 14.5465 11.3727 14.5464C11.3704 14.5463 11.3686 14.5463 11.3674 14.5463C11.3668 14.5463 11.3664 14.5463 11.3661 14.5463C11.366 14.5463 11.3659 14.5463 11.3658 14.5463C11.3658 14.5463 11.3658 14.5463 11.3658 14.5463C11.3657 14.5463 11.3657 14.5463 11.3462 15.6961C11.3266 16.8459 11.3266 16.8459 11.3266 16.8459C11.3266 16.8459 11.3267 16.8459 11.3267 16.8459C11.3268 16.8459 11.3269 16.8459 11.3271 16.8459C11.3275 16.8459 11.328 16.8459 11.3286 16.846C11.3299 16.846 11.3318 16.846 11.3343 16.8461C11.3393 16.8461 11.3466 16.8463 11.3562 16.8464C11.3754 16.8467 11.4034 16.8472 11.4392 16.8477C11.5107 16.8489 11.6133 16.8504 11.7376 16.8521C11.9861 16.8556 12.3224 16.8597 12.6726 16.8624C13.3248 16.8676 14.1601 16.8702 14.4546 16.8401L14.2207 14.5521ZM14.3376 12.2521C14.3132 12.2521 14.3279 12.2498 14.3841 12.262C14.4349 12.273 14.5011 12.292 14.5748 12.3205C14.7295 12.3801 14.8648 12.4607 14.9539 12.5415L16.4991 10.8379C16.1519 10.523 15.7531 10.3098 15.4025 10.1746C15.0652 10.0444 14.6825 9.95208 14.3376 9.95207L14.3376 12.2521ZM14.9539 12.5415C15.1243 12.696 15.1946 12.8036 15.2333 12.8877C15.2736 12.9751 15.3122 13.1077 15.3262 13.3567L17.6225 13.2277C17.5978 12.7872 17.5182 12.3506 17.3222 11.9251C17.1245 11.4962 16.8403 11.1473 16.4991 10.8379L14.9539 12.5415ZM15.3262 13.3567C15.342 13.6393 15.3099 13.804 15.2676 13.9131C15.2284 14.0144 15.1542 14.1364 14.974 14.2923L16.479 16.0315C16.8935 15.6729 17.2153 15.2526 17.4123 14.744C17.6063 14.2432 17.6508 13.7304 17.6225 13.2277L15.3262 13.3567ZM14.974 14.2923C14.8001 14.4427 14.5617 14.5172 14.2207 14.5521L14.4546 16.8401C14.9682 16.7876 15.7739 16.6416 16.479 16.0315L14.974 14.2923ZM12.7545 3.71236L13.9832 5.20809L15.7604 3.74819L14.5318 2.25246L12.7545 3.71236ZM14.3472 3.89175L16.0031 2.6097L14.5951 0.791031L12.9392 2.07308L14.3472 3.89175Z" fill="#C4C4C4"/>
            </svg>
                
                
            <span class="tooltip">Transaction&nbsp;History</span>
        </a>
        <a href ="../Admin/AdminActivityreport.php">
            <svg width="23" height="28" viewBox="0 0 23 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M14.25 1.54077L15.1339 0.656888C14.8995 0.422468 14.5815 0.290771 14.25 0.290771V1.54077ZM4.25 1.54077V0.290771V1.54077ZM1.75 4.04077H0.5H1.75ZM1.75 24.0408H0.5H1.75ZM21.75 9.04077H23C23 8.70925 22.8683 8.39131 22.6339 8.15689L21.75 9.04077ZM14.25 9.04077H13C13 9.73113 13.5596 10.2908 14.25 10.2908V9.04077ZM16.75 16.5408C17.4404 16.5408 18 15.9811 18 15.2908C18 14.6004 17.4404 14.0408 16.75 14.0408V16.5408ZM6.75 14.0408C6.05964 14.0408 5.5 14.6004 5.5 15.2908C5.5 15.9811 6.05964 16.5408 6.75 16.5408V14.0408ZM16.75 21.5408C17.4404 21.5408 18 20.9811 18 20.2908C18 19.6004 17.4404 19.0408 16.75 19.0408V21.5408ZM6.75 19.0408C6.05964 19.0408 5.5 19.6004 5.5 20.2908C5.5 20.9811 6.05964 21.5408 6.75 21.5408V19.0408ZM9.25 11.5408C9.94036 11.5408 10.5 10.9811 10.5 10.2908C10.5 9.60042 9.94036 9.04077 9.25 9.04077V11.5408ZM6.75 9.04077C6.05964 9.04077 5.5 9.60042 5.5 10.2908C5.5 10.9811 6.05964 11.5408 6.75 11.5408V9.04077ZM14.25 0.290771H4.25V2.79077H14.25V0.290771ZM4.25 0.290771C3.25544 0.290771 2.30161 0.685859 1.59835 1.38912L3.36612 3.15689C3.60054 2.92247 3.91848 2.79077 4.25 2.79077V0.290771ZM1.59835 1.38912C0.895088 2.09238 0.5 3.04621 0.5 4.04077H3C3 3.70925 3.1317 3.39131 3.36612 3.15689L1.59835 1.38912ZM0.5 4.04077V24.0408H3V4.04077H0.5ZM0.5 24.0408C0.5 25.0353 0.895088 25.9892 1.59835 26.6924L3.36612 24.9247C3.1317 24.6902 3 24.3723 3 24.0408H0.5ZM1.59835 26.6924C2.30161 27.3957 3.25544 27.7908 4.25 27.7908V25.2908C3.91848 25.2908 3.60054 25.1591 3.36612 24.9247L1.59835 26.6924ZM4.25 27.7908H19.25V25.2908H4.25V27.7908ZM19.25 27.7908C20.2446 27.7908 21.1984 27.3957 21.9016 26.6924L20.1339 24.9247C19.8995 25.1591 19.5815 25.2908 19.25 25.2908V27.7908ZM21.9016 26.6924C22.6049 25.9892 23 25.0353 23 24.0408H20.5C20.5 24.3723 20.3683 24.6902 20.1339 24.9247L21.9016 26.6924ZM23 24.0408V9.04077H20.5V24.0408H23ZM22.6339 8.15689L15.1339 0.656888L13.3661 2.42465L20.8661 9.92465L22.6339 8.15689ZM13 1.54077V9.04077H15.5V1.54077H13ZM14.25 10.2908H21.75V7.79077H14.25V10.2908ZM16.75 14.0408H6.75V16.5408H16.75V14.0408ZM16.75 19.0408H6.75V21.5408H16.75V19.0408ZM9.25 9.04077H6.75V11.5408H9.25V9.04077Z" fill="url(#paint0_linear_816_11522)"/>
                <defs>
                <linearGradient id="paint0_linear_816_11522" x1="2" y1="1.84041" x2="20" y2="25.3404" gradientUnits="userSpaceOnUse">
                <stop stop-color="#131C35"/>
                <stop offset="0.484375" stop-color="#3C817E"/>
                <stop offset="1" stop-color="#CEC09D"/>
                </linearGradient>
                </defs>
            </svg>
                
            <span class="tooltip">Activity&nbsp;Report</span>
        </a>
        <a href ="../Admin/AdminSetting.php">
            <svg width="31" height="31" viewBox="0 0 31 31" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M25 19.5408L26.1436 20.0455L26.1489 20.0332L25 19.5408ZM25.4125 21.8158L24.5189 22.6899L24.5286 22.6997L25.4125 21.8158ZM25.4875 21.8908L24.6036 22.7747L24.6041 22.7751L25.4875 21.8908ZM25.4875 25.4283L24.6041 24.5439L24.6031 24.5449L25.4875 25.4283ZM21.95 25.4283L22.8344 24.5449L22.8339 24.5444L21.95 25.4283ZM21.875 25.3533L22.7589 24.4693L22.7491 24.4597L21.875 25.3533ZM19.6 24.9408L20.0924 26.0898L20.1047 26.0843L19.6 24.9408ZM18.35 26.8283L17.1 26.8233V26.8283H18.35ZM13.35 26.9283H14.6C14.6 26.9185 14.5999 26.9088 14.5997 26.899L13.35 26.9283ZM12 25.0408L11.4953 26.1843C11.5194 26.195 11.5438 26.2049 11.5685 26.2139L12 25.0408ZM9.725 25.4533L8.85087 24.5596L8.84111 24.5694L9.725 25.4533ZM9.65 25.5283L8.76611 24.6444L8.76562 24.6449L9.65 25.5283ZM6.1125 25.5283L6.99688 24.6449L6.99589 24.6439L6.1125 25.5283ZM5.37928 23.7595H6.62928H5.37928ZM6.1125 21.9908L6.99589 22.8751L6.99638 22.8747L6.1125 21.9908ZM6.1875 21.9158L7.07143 22.7997L7.08108 22.7899L6.1875 21.9158ZM6.6 19.6408L5.45101 20.1332L5.45642 20.1455L6.6 19.6408ZM4.7125 18.3908L4.71749 17.1408H4.7125V18.3908ZM2 15.8908H0.75H2ZM4.5 13.3908V14.6408V13.3908ZM4.6125 13.3908V14.6408C4.62224 14.6408 4.63199 14.6407 4.64173 14.6404L4.6125 13.3908ZM6.5 12.0408L5.35642 11.5361C5.34579 11.5602 5.33592 11.5846 5.32683 11.6093L6.5 12.0408ZM6.0875 9.76577L6.98113 8.89164L6.97138 8.88189L6.0875 9.76577ZM6.0125 9.69077L6.89638 8.80689L6.89589 8.8064L6.0125 9.69077ZM6.0125 6.15327L6.89589 7.03765L6.89687 7.03666L6.0125 6.15327ZM9.55 6.15327L8.66562 7.03666L8.66612 7.03716L9.55 6.15327ZM9.625 6.22827L8.74106 7.11221L8.75092 7.12185L9.625 6.22827ZM11.9 6.64077V5.39077C11.7262 5.39077 11.5543 5.42702 11.3953 5.49719L11.9 6.64077ZM12 6.64077V7.89077C12.1693 7.89077 12.3368 7.85638 12.4924 7.7897L12 6.64077ZM13.25 4.75327L14.5 4.75826V4.75327H13.25ZM15.75 2.04077V0.790771V2.04077ZM18.25 4.65327H17L17 4.65826L18.25 4.65327ZM19.5 6.54077L20.0047 5.39713L19.9924 5.39185L19.5 6.54077ZM21.775 6.12827L22.6491 7.0219L22.6589 7.01215L21.775 6.12827ZM21.85 6.05327L22.7339 6.93715L22.7344 6.93666L21.85 6.05327ZM23.6187 5.32005V6.57006V5.32005ZM25.3875 6.05327L24.5031 6.93666L24.5041 6.93765L25.3875 6.05327ZM25.3875 9.59077L24.5041 8.7064L24.5036 8.70689L25.3875 9.59077ZM25.3125 9.66577L24.4286 8.78184L24.4189 8.79169L25.3125 9.66577ZM24.9 11.9408H26.15C26.15 11.767 26.1138 11.5951 26.0436 11.4361L24.9 11.9408ZM24.9 12.0408H23.65C23.65 12.2101 23.6844 12.3776 23.7511 12.5332L24.9 12.0408ZM26.7875 13.2908L26.7825 14.5408H26.7875V13.2908ZM26.8875 18.2908L26.8875 17.0408L26.8825 17.0408L26.8875 18.2908ZM18.25 15.7908C18.25 17.1715 17.1307 18.2908 15.75 18.2908V20.7908C18.5114 20.7908 20.75 18.5522 20.75 15.7908H18.25ZM15.75 18.2908C14.3693 18.2908 13.25 17.1715 13.25 15.7908H10.75C10.75 18.5522 12.9886 20.7908 15.75 20.7908V18.2908ZM13.25 15.7908C13.25 14.4101 14.3693 13.2908 15.75 13.2908V10.7908C12.9886 10.7908 10.75 13.0293 10.75 15.7908H13.25ZM15.75 13.2908C17.1307 13.2908 18.25 14.4101 18.25 15.7908H20.75C20.75 13.0293 18.5114 10.7908 15.75 10.7908V13.2908ZM23.8564 19.0361C23.5892 19.6416 23.5095 20.3133 23.6275 20.9645L26.0874 20.5185C26.0585 20.3588 26.078 20.194 26.1436 20.0455L23.8564 19.0361ZM23.6275 20.9645C23.7456 21.6158 24.0561 22.2167 24.5189 22.6899L26.3061 20.9417C26.1926 20.8256 26.1164 20.6782 26.0874 20.5185L23.6275 20.9645ZM24.5286 22.6997L24.6036 22.7747L26.3714 21.0069L26.2964 20.9319L24.5286 22.6997ZM24.6041 22.7751C24.7203 22.8912 24.8125 23.0291 24.8754 23.1808L27.1849 22.2235C26.9962 21.7683 26.7196 21.3547 26.3709 21.0064L24.6041 22.7751ZM24.8754 23.1808C24.9383 23.3326 24.9707 23.4953 24.9707 23.6595H27.4707C27.4707 23.1667 27.3736 22.6787 27.1849 22.2235L24.8754 23.1808ZM24.9707 23.6595C24.9707 23.8238 24.9383 23.9864 24.8754 24.1382L27.1849 25.0955C27.3736 24.6403 27.4707 24.1523 27.4707 23.6595H24.9707ZM24.8754 24.1382C24.8125 24.2899 24.7203 24.4278 24.6041 24.5439L26.3709 26.3126C26.7196 25.9644 26.9961 25.5508 27.1849 25.0955L24.8754 24.1382ZM24.6031 24.5449C24.487 24.6611 24.3492 24.7533 24.1974 24.8162L25.1548 27.1256C25.61 26.9369 26.0236 26.6603 26.3719 26.3117L24.6031 24.5449ZM24.1974 24.8162C24.0457 24.8791 23.883 24.9115 23.7188 24.9115V27.4115C24.2116 27.4115 24.6995 27.3144 25.1548 27.1256L24.1974 24.8162ZM23.7188 24.9115C23.5545 24.9115 23.3918 24.8791 23.2401 24.8162L22.2827 27.1256C22.738 27.3144 23.2259 27.4115 23.7188 27.4115V24.9115ZM23.2401 24.8162C23.0883 24.7533 22.9505 24.6611 22.8344 24.5449L21.0656 26.3117C21.4139 26.6603 21.8275 26.9369 22.2827 27.1256L23.2401 24.8162ZM22.8339 24.5444L22.7589 24.4694L20.9911 26.2372L21.0661 26.3122L22.8339 24.5444ZM22.7491 24.4597C22.2759 23.9969 21.675 23.6864 21.0237 23.5683L20.5777 26.0282C20.7375 26.0572 20.8849 26.1333 21.0009 26.2468L22.7491 24.4597ZM21.0237 23.5683C20.3725 23.4502 19.7008 23.53 19.0953 23.7972L20.1047 26.0843C20.2532 26.0188 20.418 25.9992 20.5777 26.0282L21.0237 23.5683ZM19.1076 23.7918C18.5138 24.0463 18.0074 24.4689 17.6507 25.0075L19.7351 26.3879C19.8226 26.2558 19.9468 26.1521 20.0924 26.0897L19.1076 23.7918ZM17.6507 25.0075C17.294 25.5461 17.1026 26.1773 17.1 26.8233L19.6 26.8333C19.6006 26.6748 19.6476 26.52 19.7351 26.3879L17.6507 25.0075ZM17.1 26.8283V27.0408H19.6V26.8283H17.1ZM17.1 27.0408C17.1 27.3723 16.9683 27.6902 16.7339 27.9247L18.5016 29.6924C19.2049 28.9892 19.6 28.0353 19.6 27.0408H17.1ZM16.7339 27.9247C16.4995 28.1591 16.1815 28.2908 15.85 28.2908V30.7908C16.8446 30.7908 17.7984 30.3957 18.5016 29.6924L16.7339 27.9247ZM15.85 28.2908C15.5185 28.2908 15.2005 28.1591 14.9661 27.9247L13.1983 29.6924C13.9016 30.3957 14.8554 30.7908 15.85 30.7908V28.2908ZM14.9661 27.9247C14.7317 27.6902 14.6 27.3723 14.6 27.0408H12.1C12.1 28.0353 12.4951 28.9892 13.1983 29.6924L14.9661 27.9247ZM14.6 27.0408V26.9283H12.1V27.0408H14.6ZM14.5997 26.899C14.5841 26.2345 14.369 25.5901 13.9823 25.0495L11.9489 26.5038C12.0438 26.6364 12.0965 26.7945 12.1003 26.9575L14.5997 26.899ZM13.9823 25.0495C13.5957 24.5088 13.0553 24.097 12.4315 23.8676L11.5685 26.2139C11.7215 26.2702 11.8541 26.3712 11.9489 26.5038L13.9823 25.0495ZM12.5047 23.8972C11.8992 23.63 11.2275 23.5502 10.5763 23.6683L11.0223 26.1282C11.182 26.0992 11.3468 26.1188 11.4953 26.1843L12.5047 23.8972ZM10.5763 23.6683C9.92501 23.7864 9.32406 24.0969 8.85092 24.5597L10.5991 26.3468C10.7151 26.2333 10.8625 26.1572 11.0223 26.1282L10.5763 23.6683ZM8.84111 24.5694L8.76611 24.6444L10.5339 26.4121L10.6089 26.3371L8.84111 24.5694ZM8.76562 24.6449C8.64954 24.7611 8.51168 24.8533 8.35993 24.9162L9.31728 27.2256C9.77252 27.0369 10.1861 26.7603 10.5344 26.4117L8.76562 24.6449ZM8.35993 24.9162C8.20818 24.9791 8.04552 25.0115 7.88125 25.0115V27.5115C8.37406 27.5115 8.86203 27.4144 9.31728 27.2256L8.35993 24.9162ZM7.88125 25.0115C7.71698 25.0115 7.55432 24.9791 7.40257 24.9162L6.44522 27.2256C6.90047 27.4144 7.38844 27.5115 7.88125 27.5115V25.0115ZM7.40257 24.9162C7.25082 24.8533 7.11296 24.7611 6.99687 24.6449L5.22812 26.4117C5.5764 26.7603 5.98998 27.0369 6.44522 27.2256L7.40257 24.9162ZM6.99589 24.6439C6.87967 24.5278 6.78747 24.3899 6.72457 24.2382L4.41513 25.1955C4.60385 25.6508 4.88045 26.0644 5.22911 26.4126L6.99589 24.6439ZM6.72457 24.2382C6.66166 24.0864 6.62928 23.9238 6.62928 23.7595H4.12928C4.12928 24.2523 4.22642 24.7403 4.41513 25.1955L6.72457 24.2382ZM6.62928 23.7595C6.62928 23.5953 6.66166 23.4326 6.72457 23.2808L4.41513 22.3235C4.22642 22.7787 4.12928 23.2667 4.12928 23.7595H6.62928ZM6.72457 23.2808C6.78747 23.1291 6.87967 22.9912 6.99589 22.8751L5.22911 21.1064C4.88045 21.4547 4.60385 21.8683 4.41513 22.3235L6.72457 23.2808ZM6.99638 22.8747L7.07138 22.7997L5.30362 21.0319L5.22862 21.1069L6.99638 22.8747ZM7.08108 22.7899C7.5439 22.3167 7.85437 21.7158 7.97245 21.0645L5.51256 20.6185C5.4836 20.7782 5.40744 20.9256 5.29392 21.0417L7.08108 22.7899ZM7.97245 21.0645C8.09053 20.4133 8.01082 19.7416 7.74358 19.1361L5.45642 20.1455C5.52197 20.294 5.54152 20.4588 5.51256 20.6185L7.97245 21.0645ZM7.74892 19.1484C7.49444 18.5546 7.07188 18.0482 6.53327 17.6915L5.15289 19.7758C5.28501 19.8633 5.38865 19.9875 5.45108 20.1332L7.74892 19.1484ZM6.53327 17.6915C5.99466 17.3348 5.3635 17.1434 4.71749 17.1408L4.70751 19.6408C4.86597 19.6414 5.02078 19.6883 5.15289 19.7758L6.53327 17.6915ZM4.7125 17.1408H4.5V19.6408H4.7125V17.1408ZM4.5 17.1408C4.16848 17.1408 3.85054 17.0091 3.61612 16.7747L1.84835 18.5424C2.55161 19.2457 3.50544 19.6408 4.5 19.6408V17.1408ZM3.61612 16.7747C3.3817 16.5402 3.25 16.2223 3.25 15.8908H0.75C0.75 16.8853 1.14509 17.8392 1.84835 18.5424L3.61612 16.7747ZM3.25 15.8908C3.25 15.5593 3.3817 15.2413 3.61612 15.0069L1.84835 13.2391C1.14509 13.9424 0.75 14.8962 0.75 15.8908H3.25ZM3.61612 15.0069C3.85054 14.7725 4.16848 14.6408 4.5 14.6408V12.1408C3.50544 12.1408 2.55161 12.5359 1.84835 13.2391L3.61612 15.0069ZM4.5 14.6408H4.6125V12.1408H4.5V14.6408ZM4.64173 14.6404C5.30623 14.6249 5.95068 14.4098 6.49131 14.0231L5.03694 11.9897C4.90433 12.0845 4.74626 12.1373 4.58327 12.1411L4.64173 14.6404ZM6.49131 14.0231C7.03194 13.6364 7.44374 13.0961 7.67317 12.4722L5.32683 11.6093C5.27055 11.7623 5.16955 11.8949 5.03694 11.9897L6.49131 14.0231ZM7.64358 12.5455C7.91082 11.94 7.99053 11.2683 7.87245 10.617L5.41256 11.063C5.44152 11.2228 5.42197 11.3875 5.35642 11.5361L7.64358 12.5455ZM7.87245 10.617C7.75437 9.96578 7.4439 9.36483 6.98108 8.89169L5.19392 10.6399C5.30744 10.7559 5.3836 10.9033 5.41256 11.063L7.87245 10.617ZM6.97138 8.88189L6.89638 8.80689L5.12862 10.5747L5.20362 10.6497L6.97138 8.88189ZM6.89589 8.8064C6.77967 8.69031 6.68747 8.55244 6.62457 8.4007L4.31513 9.35805C4.50385 9.81329 4.78045 10.2269 5.12911 10.5751L6.89589 8.8064ZM6.62457 8.4007C6.56166 8.24895 6.52928 8.08629 6.52928 7.92202H4.02928C4.02928 8.41483 4.12642 8.9028 4.31513 9.35805L6.62457 8.4007ZM6.52928 7.92202C6.52928 7.75775 6.56166 7.59509 6.62457 7.44335L4.31513 6.486C4.12642 6.94124 4.02928 7.42921 4.02928 7.92202H6.52928ZM6.62457 7.44335C6.68747 7.2916 6.77967 7.15374 6.89589 7.03765L5.12911 5.2689C4.78045 5.61717 4.50385 6.03075 4.31513 6.486L6.62457 7.44335ZM6.89687 7.03666C7.01297 6.92044 7.15083 6.82824 7.30257 6.76534L6.34522 4.45591C5.88998 4.64462 5.4764 4.92122 5.12812 5.26988L6.89687 7.03666ZM7.30257 6.76534C7.45432 6.70243 7.61698 6.67005 7.78125 6.67005V4.17005C7.28844 4.17005 6.80047 4.26719 6.34522 4.45591L7.30257 6.76534ZM7.78125 6.67005C7.94552 6.67005 8.10818 6.70243 8.25993 6.76534L9.21728 4.45591C8.76203 4.26719 8.27406 4.17005 7.78125 4.17005V6.67005ZM8.25993 6.76534C8.41167 6.82824 8.54953 6.92044 8.66563 7.03666L10.4344 5.26988C10.0861 4.92122 9.67252 4.64462 9.21728 4.45591L8.25993 6.76534ZM8.66612 7.03716L8.74112 7.11215L10.5089 5.34439L10.4339 5.26939L8.66612 7.03716ZM8.75092 7.12185C9.22406 7.58467 9.825 7.89514 10.4763 8.01322L10.9223 5.55333C10.7625 5.52437 10.6151 5.44822 10.4991 5.33469L8.75092 7.12185ZM10.4763 8.01322C11.1275 8.13131 11.7992 8.05159 12.4047 7.78435L11.3953 5.49719C11.2468 5.56274 11.082 5.5823 10.9223 5.55333L10.4763 8.01322ZM11.9 7.89077H12V5.39077H11.9V7.89077ZM12.4924 7.7897C13.0862 7.53521 13.5926 7.11265 13.9493 6.57404L11.8649 5.19367C11.7774 5.32578 11.6532 5.42943 11.5076 5.49185L12.4924 7.7897ZM13.9493 6.57404C14.306 6.03543 14.4974 5.40427 14.5 4.75826L12 4.74829C11.9994 4.90674 11.9524 5.06155 11.8649 5.19367L13.9493 6.57404ZM14.5 4.75327V4.54077H12V4.75327H14.5ZM14.5 4.54077C14.5 4.20925 14.6317 3.89131 14.8661 3.65689L13.0983 1.88912C12.3951 2.59238 12 3.54621 12 4.54077H14.5ZM14.8661 3.65689C15.1005 3.42247 15.4185 3.29077 15.75 3.29077V0.790771C14.7554 0.790771 13.8016 1.18586 13.0983 1.88912L14.8661 3.65689ZM15.75 3.29077C16.0815 3.29077 16.3995 3.42247 16.6339 3.65689L18.4016 1.88912C17.6984 1.18586 16.7446 0.790771 15.75 0.790771V3.29077ZM16.6339 3.65689C16.8683 3.89131 17 4.20925 17 4.54077H19.5C19.5 3.54621 19.1049 2.59238 18.4016 1.88912L16.6339 3.65689ZM17 4.54077V4.65327H19.5V4.54077H17ZM17 4.65826C17.0026 5.30427 17.194 5.93543 17.5507 6.47404L19.6351 5.09367C19.5476 4.96155 19.5006 4.80674 19.5 4.64829L17 4.65826ZM17.5507 6.47404C17.9074 7.01265 18.4138 7.43521 19.0076 7.6897L19.9924 5.39185C19.8468 5.32943 19.7226 5.22578 19.6351 5.09367L17.5507 6.47404ZM18.9953 7.68435C19.6008 7.95159 20.2725 8.03131 20.9237 7.91322L20.4777 5.45333C20.318 5.4823 20.1532 5.46274 20.0047 5.39719L18.9953 7.68435ZM20.9237 7.91322C21.575 7.79514 22.1759 7.48467 22.6491 7.02185L20.9009 5.23469C20.7849 5.34822 20.6375 5.42437 20.4777 5.45333L20.9237 7.91322ZM22.6589 7.01215L22.7339 6.93715L20.9661 5.16939L20.8911 5.24439L22.6589 7.01215ZM22.7344 6.93666C22.8505 6.82044 22.9883 6.72824 23.1401 6.66534L22.1827 4.35591C21.7275 4.54462 21.3139 4.82122 20.9656 5.16988L22.7344 6.93666ZM23.1401 6.66534C23.2918 6.60243 23.4545 6.57006 23.6187 6.57006V4.07005C23.1259 4.07005 22.638 4.16719 22.1827 4.35591L23.1401 6.66534ZM23.6187 6.57006C23.783 6.57006 23.9457 6.60243 24.0974 6.66534L25.0548 4.35591C24.5995 4.16719 24.1116 4.07005 23.6187 4.07005V6.57006ZM24.0974 6.66534C24.2492 6.72824 24.387 6.82044 24.5031 6.93666L26.2719 5.16988C25.9236 4.82122 25.51 4.54462 25.0548 4.35591L24.0974 6.66534ZM24.5041 6.93765C24.6203 7.05374 24.7125 7.1916 24.7754 7.34335L27.0849 6.386C26.8961 5.93075 26.6196 5.51717 26.2709 5.1689L24.5041 6.93765ZM24.7754 7.34335C24.8383 7.4951 24.8707 7.65775 24.8707 7.82202H27.3707C27.3707 7.32921 27.2736 6.84124 27.0849 6.386L24.7754 7.34335ZM24.8707 7.82202C24.8707 7.98629 24.8383 8.14895 24.7754 8.3007L27.0849 9.25805C27.2736 8.80281 27.3707 8.31483 27.3707 7.82202H24.8707ZM24.7754 8.3007C24.7125 8.45244 24.6203 8.5903 24.5041 8.7064L26.2709 10.4751C26.6196 10.1269 26.8961 9.71329 27.0849 9.25805L24.7754 8.3007ZM24.5036 8.70689L24.4286 8.78189L26.1964 10.5497L26.2714 10.4747L24.5036 8.70689ZM24.4189 8.79169C23.9561 9.26483 23.6456 9.86578 23.5275 10.517L25.9874 10.963C26.0164 10.8033 26.0926 10.6559 26.2061 10.5399L24.4189 8.79169ZM23.5275 10.517C23.4095 11.1683 23.4892 11.84 23.7564 12.4455L26.0436 11.4361C25.978 11.2875 25.9585 11.1228 25.9874 10.963L23.5275 10.517ZM23.65 11.9408V12.0408H26.15V11.9408H23.65ZM23.7511 12.5332C24.0056 13.127 24.4281 13.6334 24.9667 13.9901L26.3471 11.9057C26.215 11.8182 26.1113 11.694 26.0489 11.5484L23.7511 12.5332ZM24.9667 13.9901C25.5053 14.3468 26.1365 14.5382 26.7825 14.5408L26.7925 12.0408C26.634 12.0401 26.4792 11.9932 26.3471 11.9057L24.9667 13.9901ZM26.7875 14.5408H27V12.0408H26.7875V14.5408ZM27 14.5408C27.3315 14.5408 27.6495 14.6725 27.8839 14.9069L29.6516 13.1391C28.9484 12.4359 27.9946 12.0408 27 12.0408V14.5408ZM27.8839 14.9069C28.1183 15.1413 28.25 15.4593 28.25 15.7908H30.75C30.75 14.7962 30.3549 13.8424 29.6516 13.1391L27.8839 14.9069ZM28.25 15.7908C28.25 16.1223 28.1183 16.4402 27.8839 16.6747L29.6516 18.4424C30.3549 17.7392 30.75 16.7853 30.75 15.7908H28.25ZM27.8839 16.6747C27.6495 16.9091 27.3315 17.0408 27 17.0408V19.5408C27.9946 19.5408 28.9484 19.1457 29.6516 18.4424L27.8839 16.6747ZM27 17.0408H26.8875V19.5408H27V17.0408ZM26.8825 17.0408C26.2365 17.0434 25.6053 17.2348 25.0667 17.5915L26.4471 19.6758C26.5792 19.5883 26.734 19.5414 26.8925 19.5408L26.8825 17.0408ZM25.0667 17.5915C24.5281 17.9482 24.1056 18.4546 23.8511 19.0484L26.1489 20.0332C26.2113 19.8875 26.315 19.7633 26.4471 19.6758L25.0667 17.5915Z" fill="#C4C4C4"/>
            </svg>
            <span class="tooltip">Setting</span>
        </a>
        </div>
        <div class="log">
        <a href ="../Admin/logout.php" class="logout" style="text-align: center;">
            <svg width="32" height="31" viewBox="0 0 32 31" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M23.4375 6.8125C23.4375 7.50286 23.9971 8.0625 24.6875 8.0625C25.3779 8.0625 25.9375 7.50286 25.9375 6.8125H23.4375ZM23.3125 2V3.25V2ZM3.375 2V0.75V2ZM25.9375 24C25.9375 23.3096 25.3779 22.75 24.6875 22.75C23.9971 22.75 23.4375 23.3096 23.4375 24H25.9375ZM13 14.5C12.3096 14.5 11.75 15.0596 11.75 15.75C11.75 16.4404 12.3096 17 13 17V14.5ZM29.5 15.75L30.2265 16.7672L31.6506 15.75L30.2265 14.7328L29.5 15.75ZM25.414 11.2953C24.8523 10.8941 24.0716 11.0242 23.6703 11.586C23.2691 12.1477 23.3992 12.9284 23.961 13.3297L25.414 11.2953ZM23.961 18.1703C23.3992 18.5716 23.2691 19.3523 23.6703 19.914C24.0716 20.4758 24.8523 20.6059 25.414 20.2047L23.961 18.1703ZM25.9375 6.8125V3.375H23.4375V6.8125H25.9375ZM23.3125 0.75L3.375 0.75V3.25L23.3125 3.25V0.75ZM0.749999 3.375V27.4375H3.25V3.375H0.749999ZM3.375 30.0625H23.3125V27.5625H3.375V30.0625ZM25.9375 27.4375V24H23.4375V27.4375H25.9375ZM23.3125 30.0625C24.7622 30.0625 25.9375 28.8872 25.9375 27.4375H23.4375C23.4375 27.5065 23.3815 27.5625 23.3125 27.5625V30.0625ZM0.749999 27.4375C0.749999 28.8872 1.92525 30.0625 3.375 30.0625V27.5625C3.30596 27.5625 3.25 27.5065 3.25 27.4375H0.749999ZM3.375 0.75C1.92525 0.75 0.749999 1.92525 0.749999 3.375H3.25C3.25 3.30597 3.30596 3.25 3.375 3.25V0.75ZM25.9375 3.375C25.9375 1.92525 24.7622 0.75 23.3125 0.75V3.25C23.3815 3.25 23.4375 3.30597 23.4375 3.375H25.9375ZM13 17H29.5V14.5H13V17ZM30.2265 14.7328L25.414 11.2953L23.961 13.3297L28.7735 16.7672L30.2265 14.7328ZM28.7735 14.7328L23.961 18.1703L25.414 20.2047L30.2265 16.7672L28.7735 14.7328Z" fill="#F85050"/>
            </svg>
        </a> 
        </div>       
    </div>

    <!-- Content -->
    <div class="SubscriptionContent">
        <div class="Navigation">
            <h2>ACTIVITY REPORT</h2>
        </div>
        <div class="ActivityContent">
            <div class="ActivityTable">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Locker No.</th>
                        <th>Account No.</th>
                        <th>Rented Start</th>
                        <th>Rented End</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                            $x = 0;
                            $ActivitySql = "SELECT * FROM locker_rental WHERE rent_enddate!='0000-00-00' AND rent_endtime!='00:00:00' ORDER BY rent_id DESC";
                            $ActivityRun = mysqli_query($dbcon,$ActivitySql);
                            while($ActivityRow = mysqli_fetch_array($ActivityRun)){
                                $A_acctno               = $ActivityRow['1'];
                                $A_renteddate           = $ActivityRow['2'];
                                $A_rentedtime           = $ActivityRow['3'];
                                $A_rentedenddate        = $ActivityRow['4'];
                                $A_rentedendtime        = $ActivityRow['5'];
                                $A_lockerno             = $ActivityRow['9'];
                                $A_size                 = $ActivityRow['10'];
                                $x++;
                                $alternate=$x%2;

                                echo '
                                <tr>';
                                switch ($alternate) {
                                    case 0:
                                        echo '<td><b style="color:#2DB6B0">'.$A_lockerno.'</b></td>';
                                        break;
                                    
                                    default:
                                        echo '<td><b style="color:#2D3A5E">'.$A_lockerno.'</b></td>';
                                        break;
                                }
                                echo'
                                    <td>'.$A_acctno.'</td>
                                    <td>'.$A_renteddate.' | '.$A_rentedtime.'</td>
                                    <td>'.$A_rentedenddate.' | '.$A_rentedendtime.'</td>
                                </tr>';
                                
                            }//While Subscription List

                            ?>
                    </tbody>
                </table>
                            <?php
                            switch ($x) {
                                case 0:
                                    echo '<div class="NoResults" style="">
                                    <img src="../images/aboutus-img.png" class="NoResultsImg" style="">
                                    <p class="NoResultsP" style="">No Activity</p>
                                    <small class="NoResultSmall" style="text-align:center; margin-top:0px;color:#a4a4a4;">Sorry, there is no activity at the momment. Please drink a coffe while waiting</small></div>';
                                
                                    break;
                                
                                default:
                                    
                                    break;
                            }
                            ?>
            </div>
        </div>
       
    </div>

    <!------------------------------------------------ Pop Up Images ----------------------------------------------------------->

    <div class="PopupImage">
        <div class="PopupImageContainer">
            <div class="Topbar">
                <p class="ImageFile">Attachment</p>
                <span class="CloseBtn">x</span>
            </div>
            <div class="image">
                <img src="../images/Avatar1.png" onerror="this.src='../images/NoImages.png'">
            </div>
        </div>
    </div>

    <script>
        document.querySelectorAll('td img').forEach(image =>{
            image.onclick = () =>{
                document.querySelector('.PopupImage').style.display = 'flex';
                document.querySelector('.PopupImage img').src = image.getAttribute('src');
            }
        });

        document.querySelector('.CloseBtn').addEventListener("click", function() {
	    document.querySelector('.PopupImage').style.display = "none";
        });
    </script>

</body>
</html>