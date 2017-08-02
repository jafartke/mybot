<?php
$postdata = json_decode(file_get_contents("php://input"), true);
$action = '';
$message = $postdata['item']['message']['message'];
$name = explode(" ", $message);
$url = "http://api.giphy.com/v1/gifs/search?q=".$name[1]."&api_key=dc6zaTOxFJmzC";
//$url = "http://api.giphy.com/v1/gifs/search?q=friday&api_key=dc6zaTOxFJmzC";
$json = file_get_contents($url);
$obj = json_decode($json);
echo "<pre>";
$minCount =  0;
$maxCount =  count($obj->data);
$gifURL =  $obj->data[rand($minCount,$maxCount)]->images->original_still->url;

$return =  '{
"color": "green",
"card": {
"style": "link",
"url": "http://i0.kym-cdn.com/photos/images/newsfeed/000/131/786/tumblr_ljkeuyjp1a1qafrh6.gif",
"id": null,
"title": "GIFY",
"description": "$gifURL",
"date": 1497609802,
"thumbnail": {
"url": "https://c.martech.zone/wp-content/uploads/2010/06/example-logo.png",
"url@2x": "https://c.martech.zone/wp-content/uploads/2010/06/example-logo.png",
"width": 1193,
"height": 564
}
},
"message": "What do you want.. <img src="$gifURL">'.$image.'?",
"message_format": "html"
}';
return $return;
?>
