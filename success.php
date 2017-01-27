<?php

session_start();

require_once 'vendor/autoload.php';
$fb = new Facebook\Facebook ([
    'app_id' => '592008274151588',
    'app_secret' => 'babba5e0c05b1fdfded7fcc51fc8db0e',
    'default_graph_version' => 'v2.8'
]);

$helper = $fb->getRedirectLoginHelper();
try
{
    $access_token = $helper->getAccessToken();
    if($access_token)
    {
        $fb->setDefaultAccessToken($access_token);
        try
        {
            $response = $fb->get('/me?fields=email,name');
            $usernode = $response->getGraphUser();
            echo 'Name : '.$usernode->getName();
            echo '<a href="logout.php">Logout</a>';
        }
        catch(Facebook\Exceptions\FacebookSDKException $e)
        {
          echo 'Facebook SDK returned an error: ' . $e->getMessage();
          exit;
        }
    }
    else
    {
        echo "failed";
    }
}
catch(Facebook\Exceptions\FacebookSDKException $e)
{
    echo "Facebook SDK Error : ".$e->getMessage();
}

?>