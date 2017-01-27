<?php
//initiate session
session_start();
//unset session with known app_id
unset($_SESSION['fb_YOUR-APP-ID_access_token']);
//destroy session
session_destroy();
//return to loginfb page
header('location:loginfb.php');
?>