<?php
$effortObj = new peopleEffort();
//$effortObj->addPeopleEffort($_POST['mode'], $_POST['user'], $_POST['project_id'], $_POST['effort'], $_POST['note'], $_POST['date'], $_POST['unit'], $_POST['effort_type']);
$postdata = json_decode(file_get_contents("php://input"), true);
$action = '';
$message = $postdata['item']['message']['message'];
$name = explode(" ", $message);
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
"message": "What do you want '.$name[1].'?",
"message_format": "html"
}';
?>
