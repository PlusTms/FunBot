<?php /* Telegram Channel: @NorbertTeam
@Roonx_Team */
define('API_KEY','توکن');
$admin =  "ای دی عددی";
$update = json_decode(file_get_contents('php://input'));
$from_id = $update->message->from->id;
$chat_id = $update->message->chat->id;
$chatid = $update->callback_query->message->chat->id;
$data = $update->callback_query->data;
$text = $update->message->text;
$message_id = $update->callback_query->message->message_id;
$message_id_feed = $update->message->message_id;

$fal = file_get_contents("http://api.roonx.com/falhafez/index.php");
$textstart = file_get_contents("textstart.txt");
$textchannel = file_get_contents("textchannel.txt");
$jok = file_get_contents("http://api.roonx.com/jock/index.php");
$love = file_get_contents("http://api.roonx.com/textlove/index.php");
$dastan = file_get_contents("http://api.roonx.com/dastankotah/index.php");
$chistan = file_get_contents("http://api.roonx.com/chistan/index.php");
$danstaniha = file_get_contents("http://api.roonx.com/danstaniha/index.php");
$abouttext= file_get_contents("abouttext.txt");
$commands= file_get_contents("commands.txt");
$time= file_get_contents("http://api.roonx.com/date-time/?roonx=time");
$date= file_get_contents("http://api.roonx.com/date-time/?roonx=date");
function roonx($method,$datas=[]){
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
if(preg_match('/^\/([Ss]tart)/',$text)){
roonx('sendMessage',[
    'chat_id'=>$chat_id,
    'text'=>"$textstart
ای دی کانال ما:
$textchannel",
    'parse_mode'=>'html',
   'reply_markup'=>json_encode([
      'inline_keyboard'=>[
          [
     ['text'=>'فال خافظ','callback_data'=>'fal'],['text'=>'جک','callback_data'=>'jok'],['text'=>'چیستان','callback_data'=>'chistan']
          ],
		  [
		    ['text'=>'داستان','callback_data'=>'dastan'],['text'=>'دانستنی ها','callback_data'=>'danstaniha']
			], [
		    ['text'=>'درباره ما','callback_data'=>'about'],['text'=>'دستورات','callback_data'=>'commands']
        ], [
		    ['text'=>'ساعت و تاریخ','callback_data'=>'timaanddate']
        ]]
		])
  ]);
}elseif(preg_match('/^\/([Ff]al)/',$text)){
roonx('sendMessage',[
    'chat_id'=>$chat_id,
    'text'=>$fal,
    'parse_mode'=>'html'
  ]);
}elseif(preg_match('/^\/([Jj]ok)/',$text)){
roonx('sendMessage',[
    'chat_id'=>$chat_id,
    'text'=>$jok,
    'parse_mode'=>'html'
  ]);
}elseif(preg_match('/^\/([Ll]ove)/',$text)){
roonx('sendMessage',[
    'chat_id'=>$chat_id,
    'text'=>$love,
    'parse_mode'=>'html'
  ]);
}elseif(preg_match('/^\/([Dd]astan)/',$text)){
roonx('sendMessage',[
    'chat_id'=>$chat_id,
    'text'=>$love,
    'parse_mode'=>'html'
  ]);
}elseif(preg_match('/^\/([Cc]histan)/',$text)){
roonx('sendMessage',[
    'chat_id'=>$chat_id,
    'text'=>$love,
    'parse_mode'=>'html'
  ]);
}elseif(preg_match('/^\/([Dd]anstaniha)/',$text)){
roonx('sendMessage',[
    'chat_id'=>$chat_id,
    'text'=>$danstaniha,
    'parse_mode'=>'html'
  ]);
}elseif ($data == "about") {
  roonx('editMessagetext',[
    'chat_id'=>$chatid,
	'message_id'=>$message_id,
    'text'=>$abouttext,
    'parse_mode'=>'html',
   'reply_markup'=>json_encode([
      'inline_keyboard'=>[
       
	  [
		['text'=>'برگردیم اول ◀','callback_data'=>'menu']
      ]
      ]
    ])
  ]);
 }elseif ($data == "commands") {
  roonx('editMessagetext',[
    'chat_id'=>$chatid,
	'message_id'=>$message_id,
    'text'=>$commands,
    'parse_mode'=>'html',
   'reply_markup'=>json_encode([
      'inline_keyboard'=>[
       
	  [
		['text'=>'برگردیم اول ◀','callback_data'=>'menu']
      ]
      ]
    ])
  ]);
 }
elseif ($data == "timaanddate") {
  roonx('editMessagetext',[
    'chat_id'=>$chatid,
	'message_id'=>$message_id,
    'text'=>"ساعت :⏰
 $time

تاریخ:⌛️
 $date",
    'parse_mode'=>'html',
   'reply_markup'=>json_encode([
      'inline_keyboard'=>[
       
	  [
		['text'=>'برگردیم اول ◀','callback_data'=>'menu']
      ]
      ]
    ])
  ]);
 }
elseif ($data == "danstaniha") {
  roonx('editMessagetext',[
    'chat_id'=>$chatid,
	'message_id'=>$message_id,
    'text'=>$danstaniha,
    'parse_mode'=>'html',
    'reply_markup'=>json_encode([
      'inline_keyboard'=>[
        [
          ['text'=>'دوباره بده','callback_data'=>'danstaniha']
        ],
	  [
		['text'=>'برگردیم اول ◀','callback_data'=>'menu']
      ]
      ]
    ])
  ]);
 }elseif ($data == "chistan") {
  roonx('editMessagetext',[
    'chat_id'=>$chatid,
	'message_id'=>$message_id,
    'text'=>$chistan,
    'parse_mode'=>'html',
    'reply_markup'=>json_encode([
      'inline_keyboard'=>[
        [
          ['text'=>'دوباره بده','callback_data'=>'chistan']
        ],
	  [
		['text'=>'برگردیم اول ◀','callback_data'=>'menu']
      ]
      ]
    ])
  ]);
 }elseif ($data == "dastan") {
  roonx('editMessagetext',[
    'chat_id'=>$chatid,
	'message_id'=>$message_id,
    'text'=>$dastan,
    'parse_mode'=>'html',
    'reply_markup'=>json_encode([
      'inline_keyboard'=>[
        [
          ['text'=>'دوباره بده','callback_data'=>'dastan']
        ],
	  [
		['text'=>'برگردیم اول ◀','callback_data'=>'menu']
      ]
      ]
    ])
  ]);
 }elseif ($data == "jok") {
  roonx('editMessagetext',[
    'chat_id'=>$chatid,
	'message_id'=>$message_id,
    'text'=>$jok,
    'parse_mode'=>'html',
    'reply_markup'=>json_encode([
      'inline_keyboard'=>[
        [
          ['text'=>'دوباره بده','callback_data'=>'jok']
        ],
	  [
		['text'=>'برگردیم اول ◀','callback_data'=>'menu']
      ]
      ]
    ])
  ]);
 }elseif ($data == "love") {
  roonx('editMessagetext',[
    'chat_id'=>$chatid,
	'message_id'=>$message_id,
    'text'=>$love,
    'parse_mode'=>'html',
    'reply_markup'=>json_encode([
      'inline_keyboard'=>[
        [
          ['text'=>'دوباره بده','callback_data'=>'love']
        ],
	  [
		['text'=>'برگردیم اول ◀','callback_data'=>'menu']
      ]
      ]
    ])
  ]);
 }
elseif ($data == "fal") {
  roonx('editMessagetext',[
    'chat_id'=>$chatid,
	'message_id'=>$message_id,
    'text'=>'خب حالا نیت کنید بعد روی دکمه بزنید',
    'parse_mode'=>'html',
    'reply_markup'=>json_encode([
      'inline_keyboard'=>[
        [
          ['text'=>'نیت کردم','callback_data'=>'fall']
        ],
	  [
		['text'=>'برگردیم اول ◀','callback_data'=>'menu']
      ]
      ]
    ])
  ]);
 }elseif ($data == "fall") {
  roonx('editMessagetext',[
    'chat_id'=>$chatid,
	'message_id'=>$message_id,
    'text'=>$fal,
    'parse_mode'=>'html',
    'reply_markup'=>json_encode([
      'inline_keyboard'=>[
        [
          ['text'=>'دوباره','callback_data'=>'fall']
        ],
	  [
		['text'=>'برگردیم اول ◀','callback_data'=>'menu']
      ]
      ]
    ])
  ]);
 }
elseif ($data == "menu") {
  roonx('editMessagetext',[
    'chat_id'=>$chatid,
	'message_id'=>$message_id,
    'text'=>"$textstart
ای دی کانال ما:
$textchannel",
    'parse_mode'=>'html',
   'reply_markup'=>json_encode([
     'inline_keyboard'=>[
          [
     ['text'=>'فال خافظ','callback_data'=>'fal'],['text'=>'جک','callback_data'=>'jok'],['text'=>'چیستان','callback_data'=>'chistan']
          ],
		  [
		    ['text'=>'داستان','callback_data'=>'dastan'],['text'=>'دانستنی ها','callback_data'=>'danstaniha']
			], [
		    ['text'=>'درباره ما','callback_data'=>'about'],['text'=>'دستورات','callback_data'=>'commands']
        ], [
		    ['text'=>'ساعت و تاریخ','callback_data'=>'timaanddate']
        ]]
		])
  ]);
}
elseif(preg_match('/^\/([Ss]tats)/',$text) and $from_id == $admin){
    $user = file_get_contents('Member.txt');
    $member_id = explode("\n",$user);
    $member_count = count($member_id) -1;
    roonx('sendMessage',[
      'chat_id'=>$chat_id,
      'text'=>"تعداد کل اعضا: $member_count",
      'parse_mode'=>'HTML'
    ]);
}unlink("error_log");
$user = file_get_contents('Member.txt');
    $members = explode("\n",$user);
    if (!in_array($chat_id,$members)){
      $add_user = file_get_contents('Member.txt');
      $add_user .= $chat_id."\n";
     file_put_contents('Member.txt',$add_user);
    }

//@Roonx_Team
	?>
