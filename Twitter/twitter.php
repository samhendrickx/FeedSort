<?php 
require_once('TwitterAPIExchange.php'); 

$settings = array(
    'oauth_access_token' => "1065463758-y3xsF5uVoSkoaKWvcqqq2vVHrNtDPOY8SRf85Hn",
    'oauth_access_token_secret' => "9ZbKKEp9Ovui9Lfnmpp5oP7iJfmHU5ZZE0wWhAiCbTDXc",
    'consumer_key' => "tEgP0hkcxoe9Iwe2V8svmRMHy",
    'consumer_secret' => "85xePpAO46G1XuaKjEaoYck53RGPxydXpFre9x6ylUh8LTMnQg"
);

$url = 'https://api.twitter.com/1.1/statuses/user_timeline.json';
$getfield = '?screen_name=samhendrickx';
$requestMethod = 'GET';

$twitter = new TwitterAPIExchange($settings);
$response = $twitter->setGetfield($getfield)
    ->buildOauth($url, $requestMethod)
    ->performRequest();

echo '<script>console.log(JSON.parse('.var_export($response, true).'))</script>';

//var_dump(json_decode($response));
//echo count(json_decode($response));

echo '<h2>Sam\'s Twitter</h2>';

foreach (json_decode($response) as $value) {
	$entities = $value->{'entities'};
	
	echo '<p>' . $value->{'text'} . '</p>';
	if(count($entities->{'media'})){
		$media = $entities->{'media'}[0];
		echo '<img src="' .$media->{'media_url'} . '">';
	}

}


?>