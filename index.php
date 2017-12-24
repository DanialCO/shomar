<?php
/*
ربات نوشته شده توسط دانیال ملک زاده
*/
ob_start();

$API_KEY = 'توکن ربات';

define('API_KEY',$API_KEY);

function world($method,$datas=[]){
    $url = "https://api.telegram.org/bot".API_KEY."/".$method;
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch,CURLOPT_POSTFIELDS,$datas);
    $res = curl_exec($ch);
    if(curl_error($ch)){
        var_dump(curl_error($ch));
    }else{
        return json_decode($res);
    }
}

$update = json_decode(file_get_contents('php://input'));
$chat_id = $update->message->chat->id;
$text = $update->message->text;
$from = $update->message->from->id;

if(preg_match('/^\/([sS]tart)/',$text)){
	  world('sendMessage',[
      'chat_id'=>$chat_id,
      'text'=>"خب دوست من حالا ایدی عددی فردی که میخوای شمارشو دریافت کنی بفرست اگه ابدب عددیشو نداری میتونی به ربات @Uinforobot بری یک پیام ازش فروارد کنی و ایدی عددیشو بگیری بعد از گرفتن ایدی عددیش بفرست واطم تا شمارشو بهت بدم",

'parse_mode'=>'HTML'
    ]);
  }

if ($text){

$dani = $text;

$shom = file_get_contents("https://api.worldtm.uk/number?id=$dani");

world('sendMessage',[
      'chat_id'=>$chat_id,
      'text'=>"$shom",

'parse_mode'=>'HTML'
    ]);
  }

// Telegram CH : @worldtm Telegram ID : @JanPHP

?>
