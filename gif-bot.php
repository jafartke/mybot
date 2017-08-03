<?php

$postdata = json_decode(file_get_contents("php://input"), true);
$action = '';
$message    = $postdata['item']['message']['message'];
$name       = explode(" ", $message);
$url        = "http://api.giphy.com/v1/gifs/search?q=".$name[1]."&api_key=dc6zaTOxFJmzC";
$json       = file_get_contents($url);
$obj        = json_decode($json);
$minCount   =  0;
$maxCount   =  count($obj->data);
$gifURL     =  $obj->data[rand($minCount,$maxCount)]->images->original_still->url;

echo '{
"color": "green",
"message": "/gif <img src='.$gifURL.'>",
"message_format": "html"
}';
?>
