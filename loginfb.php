<?php
session_start();

require_once 'vendor/autoload.php';

$fb = new Facebook\Facebook ([
    'app_id'                => 'YOUR_APP_ID',
    'app_secret'            => 'YOUR_APP_SECRET',
    'default_graph_version' => 'v2.8'
]);
$access_token = "";
//make sure your url is same like your facebook apps website base url
$redirect = 'http://localhost/login-with-facebook-sdk-5/success.php';

$helper = $fb->getRedirectLoginHelper();
try
{
    $access_token = $helper->getAccessToken();
}
catch(Facebook\Exceptions\FacebookSDKException $e)
{
    echo 'Facebook SDK Error : '.$e->getMessage();
    exit;
}
//access token isn't defined
if(!isset($access_token))
{
    $permission = ['email'];
    $loginurl   = $helper->getLoginUrl($redirect, $permission);
    echo '<a href="'.$loginurl.'">login with FB</a>';
}
?>