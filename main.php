<?php

/*
By : @JJJNTJ 
CH : @SERO_BOTS 
*/

ob_start();
$token = "6224092708:AAGGDVtj1RTI0ozf33AbhEbxrJIWJNjR6zg"; 
define("API_KEY",$token);
echo file_get_contents("https://api.telegram.org/bot" . API_KEY . "/setwebhook?url=" . $_SERVER['SERVER_NAME'] . "" . $_SERVER['SCRIPT_NAME']);
function bot($method,$datas=[]){
$JJJ22J = http_build_query($datas);
$url = "https://api.telegram.org/bot".API_KEY."/".$method."?$JJJ22J";
$JJJ22J = file_get_contents($url);
return json_decode($JJJ22J);
}
$update = json_decode(file_get_contents('php://input'));
;
$message = $update->message;
$chat_id = $message->chat->id;
$text = $message->text;
$chat_id2 = $update->callback_query->message->chat->id;
$message_id = $update->callback_query->message->message_id;
$data = $update->callback_query->data;
$name = $message->from->first_name;
$update = json_decode(file_get_contents("php://input"));
$message = $update->message;
$txt = $message->caption;
$text = $message->text;
$chat_id = $message->chat->id;
$from_id = $message->from->id;
$new = $message->new_chat_members;
$message_id = $message->message_id;
$type = $message->chat->type;
$name = $message->from->first_name;
if(isset($update->callback_query)){

$up = $update->callback_query;
$chat_id = $up->message->chat->id;
$from_id = $up->from->id;
$user = $up->from->username;
$name = $up->from->first_name;
$message_id = $up->message->message_id;
$data = $up->data;
}

$nm = $from_id->from->first_name;

$bott = bot('getme',['bot'])->result->username;
if($text == '/start'){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"


$nm
*مرحبا بك عزيزي المستخدم* ( [$name](tg://user?id=$chat_id) )

- في بوت ترند التفاعل في المجموعات

- فقط اضفني لكروبك وسأتفعل تلقائيا ✅
",
'disable_web_page_preview'=>true,
'parse_mode'=>"markdown",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"اضافه البوت 🏅",'url'=>"https://t.me/$bott?startgroup=new" ]],
]
])
]);
}

$group = json_decode(file_get_contents("groups.json"), true);
if ($message and !in_array($chat_id,$group['Trend']['send']['uname'])){
	$tc = $update->message->chat->type;
 if($tc! = "private"){
$group['Trend']['send']['uname'][] =$chat_id;
$group['Trend']['send']['add'][] = 0;
file_put_contents("groups.json",json_encode($group));
exit();
}
} 

if ($message and in_array($chat_id,$group['Trend']['send']['uname'])){
	$tc = $update->message->chat->type;
 if($tc! = "private"){
$yes = array_search($chat_id,$group['Trend']['send']['uname']);
$group['Trend']['send']['add'][$yes]+=1;
file_put_contents("groups.json",json_encode($group));
}
} 

$title = $from_id;
$Trend = json_decode(file_get_contents("$chat_id.json"), true);
if ($message and !in_array($title,$Trend['Trend']['send']['uname'])){
$Trend['Trend']['send']['uname'][] =$title;
$Trend['Trend']['send']['add'][] = 0;
file_put_contents("$chat_id.json",json_encode($Trend));
exit();
}

if ($message and in_array($title,$Trend['Trend']['send']['uname'])){
$yes = array_search($title,$Trend['Trend']['send']['uname']);
$Trend['Trend']['send']['add'][$yes]+=1;
file_put_contents("$chat_id.json",json_encode($Trend));
}
if($text == "ترند"){
$Trend = json_decode(file_get_contents("$chat_id.json"),1);
$f= $Trend['Trend']['send']['add'];
rsort($f);
for($i=0;$i<5;$i++){
$dets = json_decode(file_get_contents("http://api.telegram.org/bot$token/getChat?chat_id=$f[$i]"));
$name =$dets->result->first_name;
if($f[$i] != null){
$V = array_search($f[$i],$Trend['Trend']['send']['add']);
$uS = $Trend['Trend']['send']['uname'][$V];
$u=$i+1;

$Numbers = array(
'1' ,
'2' ,
'3',
'4' ,
'5', 


);
$NumbersBe = array('1️⃣' ,
'2️⃣' ,
'3️⃣' , 
'4️⃣' , 
'5️⃣' , 

);

$u = str_replace($Numbers,$NumbersBe,$u);

$dh=bot("getchat",['chat_id'=>$uS])->result->first_name;
if($dh != null) {
	$fk = $dh;
	} 
	if($dh == null) {
		$fk = $uS;
		} 
$ok = $ok. " $u :(*$f[$i]*) -> [$fk](tg://user?id=$uS) \n";
}
}

$dh=bot("getchat",['chat_id'=>$chat_id])->result->title;
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"*

- المستخدمين الاكثر تفاعلا في الكروب (  $dh ) 
*
$ok
  ",
'parse_mode'=>"Markdown",
'reply_to_message_id'=>$message->message_id,
]);
}


if($text == "ترند كروبات"){
$Trend = json_decode(file_get_contents("groups.json"),1);
$f= $Trend['Trend']['send']['add'];
rsort($f);
for($i=0;$i<5;$i++){
$dets = json_decode(file_get_contents("http://api.telegram.org/bot$token/getChat?chat_id=$f[$i]"));
$name =$dets->result->title;
if($f[$i] != null){
$V = array_search($f[$i],$Trend['Trend']['send']['add']);
$uS = $Trend['Trend']['send']['uname'][$V];
$u=$i+1;

$Numbers = array(
'1' ,
'2' ,
'3',
'4' ,
'5', 


);
$NumbersBe = array('1️⃣' ,
'2️⃣' ,
'3️⃣' , 
'4️⃣' , 
'5️⃣' , 

);

$u = str_replace($Numbers,$NumbersBe,$u);

$dh=bot("getchat",['chat_id'=>$uS])->result->title;
if($dh != null) {
	$fk = $dh;
	} 
	if($dh == null) {
		$fk = $uS;
		} 
$ok = $ok. " $u :(*$f[$i]*) -> [$fk](t.me/Sero_Bots) \n";
}
}


bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"*

- اكثر الكروبات المتفاعله في البوت :
*
$ok
  ",
'parse_mode'=>"Markdown",
'reply_to_message_id'=>$message->message_id,
]);
}