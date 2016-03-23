<?php
session_start();
require_once("twitteroauth.php"); //Path to twitteroauth library

$twitteruser = "jobplanetid";
$notweets = 30;
$consumerkey = "QbwBihijsfjcZrNg1k2Jg2QrO";
$consumersecret = "pu2Rh4e7DwR5hPqvvSMN5phGE8ApKCHmVXHv5nSQ0U289GtYCL";
$accesstoken = "55170784-cnrIhizW33ygXqU6XtnxMzXCUS3OwVujAwEQ4gC1H";
$accesstokensecret = "UVcNv1oiAmGXR9ud3EtYrdGNMttUw79IZWNTEiPxIBYXX";

function getConnectionWithAccessToken($cons_key, $cons_secret, $oauth_token, $oauth_token_secret) {
  $connection = new TwitterOAuth($cons_key, $cons_secret, $oauth_token, $oauth_token_secret);
  return $connection;
}

$connection = getConnectionWithAccessToken($consumerkey, $consumersecret, $accesstoken, $accesstokensecret);

$tweets = $connection->get("https://api.twitter.com/1.1/statuses/user_timeline.json?screen_name=".$twitteruser."&count=".$notweets);

echo json_encode($tweets);
?>
