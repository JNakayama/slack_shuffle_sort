<?php
    if ($_GET['channel']) {
        $channel = $_GET['channel'];
    } else {
       $channel = "[投稿するSlackのチャンネル]";
    }

    $ary = array([参加メンバーの配列]);
    $text = "\n発表順は・・・\n";
    $text .= "ジャラジャラジャラジャラドン！！！！！！\n\n\n";
    shuffle($ary);

    foreach($ary as $key => $val) {
        $new[$key] = $val;
        $text .= $key + 1 . " 番 : " . $val . "\n";
    }

print str_replace("\n", '<br>',  $text);

//gnavi slack_token
$slackApiKey = "[Slack APIのトークン]";

$channel = urlencode("#" . $channel);
$text = urlencode($text);
$url = "https://slack.com/api/chat.postMessage?token=${slackApiKey}&channel=${channel}&text=${text}";
file_get_contents($url);

?>
