<?php 


//instantiate twitter wrapper
require_once('./dependencies/TwitterAPIExchange.php');
// /** Set access tokens here - see: https://dev.twitter.com/apps/ **/
$settings = array(
    'oauth_access_token' => "1265261723537334272-Sr4E9M86CveK21soFKDthgx8ZPwHKr",
    'oauth_access_token_secret' => "iUFwzeYXWROPkVVGY01DYa6CO0RZUmBcwISv0i9lQiRe5",
    'consumer_key' => "VkqglAlqokK3dyReI0LV60lc2",
    'consumer_secret' => "2zIUn5ZZByRgfOKvCRWftQLWLw4w0dPBLXdNj6qC0bfDQQvQKu"
);


for($k=1;$k <= 3; $k++){
   
    // GET list of users based on search for all pages up to abs number (e.g. 3)
    $query = 'canada sports&page='.strval($k);
    $url = 'https://api.twitter.com/1.1/users/search.json';
    $requestMethod = 'GET';
    $getfield = '?q='.$query;
    
    $twitter = new TwitterAPIExchange($settings);
    $res=  json_decode($twitter->setGetfield($getfield)
        ->buildOauth($url, $requestMethod)
        ->performRequest());
    
    for($i=0;$i<= count($res);$i++){
        // follow every user on returned page that is not already followed/ requested
        if(($res[$i]->following != '1') && ($res[$i]->follow_request_sent == NULL)){
            $user_id = $res[$i]->id;
            $url = 'https://api.twitter.com/1.1/friendships/create.json';
                        $requestMethod = 'POST';
                        $postfields = array(
                            'user_id' => $user_id,
                            'follow' => true
                        );
                        $twitter = new TwitterAPIExchange($settings);
                        $followed = json_decode($twitter->buildOauth($url, $requestMethod)
                                    ->setPostfields($postfields)
                                    ->performRequest());
        }
        
    } 
    
}

           
           





















?>

