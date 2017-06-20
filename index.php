<script
  src="https://code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous"></script>
<script>
$(document).ready(function(){
    var finalURL = "";
    $.getJSON('https://api.giphy.com/v1/gifs/search?q=friday&api_key=dc6zaTOxFJmzC', function(data) {
    $.each(data.data,function(i,obj){
    					finalURL = obj.embed_url;
    });
    console.log(finalURL)
    });
});
</script>
<?php
//echo $imageURL = '<script>document.write(finalURL);</script>';
//exit;
$postdata = json_decode(file_get_contents("php://input"), true);
$action = '';
$message = $postdata['item']['message']['message'];
$name = explode(" ", $message);
$url = "http://api.giphy.com/v1/gifs/search?q=".$name[1]."&api_key=dc6zaTOxFJmzC";
$json = file_get_contents($url);
$obj = json_decode($json);
$image = $obj->data->images->fixed_height->url;

echo '{
"color": "green",
"card": {
"style": "link",
"url": "http://i0.kym-cdn.com/photos/images/newsfeed/000/131/786/tumblr_ljkeuyjp1a1qafrh6.gif",
"id": null,
"title": "Timely card layout",
"description": "  has submitted his timesheet",
"date": 1497609802,
"thumbnail": {
"url": "https://c.martech.zone/wp-content/uploads/2010/06/example-logo.png",
"url@2x": "https://c.martech.zone/wp-content/uploads/2010/06/example-logo.png",
"width": 1193,
"height": 564
}
},
"message": "What do you want.. <img src="https://giphy.com/embed/3o84U0cCBPv6F0IIZa">'.$image.'?",
"message_format": "html"
}';
?>
