<?php 
//instantiate the newsAPI
require_once('./dependencies/callApi.php');
$result = json_decode(curl_exec($curl));
if(!$result){
    echo'connection failure';
    curl_close($curl);
}

$tweet_text = $result ->articles[0] ->title;
$tweet_image = $result ->articles[0] ->urlToImage;
$tweet_url = $url = $result ->articles[0] ->url;

//instantiate twitter wrapper
require_once('./dependencies/TwitterAPIExchange.php');
// /** Set access tokens here - see: https://dev.twitter.com/apps/ **/
$settings = array(
    'oauth_access_token' => "#",
    'oauth_access_token_secret' => "#",
    'consumer_key' => "#",
    'consumer_secret' => "#"
);
// // $status_update = 'Headlines will go here';
$url = 'https://api.twitter.com/1.1/statuses/update.json';
$requestMethod = 'POST';
$postfields = array(
                        'status' => $tweet_text.' '.$tweet_url

);
$twitter = new TwitterAPIExchange($settings);
echo $twitter->buildOauth($url, $requestMethod)
             ->setPostfields($postfields)
             ->performRequest();


