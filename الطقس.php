<?php
ob_start();
/*غير الحقوق واثبت انك فاشل
اذا تريد تنقل اذكر اسمي او اسم قناتي */

/*====================
CH : @AX_GB
DEV : @O_1_W
Translator : @AX_GB
/*====================*/
$token = "6705967103:AAEH-Zg8MzxJ0Q-OvtfXXAkmaCADDWbB9SM";//توكن بوتك
define("API_KEY",$token);
function bot($method,$datas=[]){
$JJJ22J = http_build_query($datas);
$url = "https://api.telegram.org/bot".API_KEY."/".$method."?$JJJ22J";
$JJJ22J = file_get_contents($url);
return json_decode($JJJ22J);
}
$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$chat_id = $message->chat->id;
$text = $message->text;
$get_trgma=file_get_contents('$from_id/trgm.txt');
$chat_id2 = $update->callback_query->message->chat->id;
$message_id = $update->callback_query->message->message_id;
$data = $update->callback_query->data;
$name = $up->from->first_name;
$update = json_decode(file_get_contents("php://input"));
$message = $update->message;
$txt = $message->caption;
$text = $message->text;
$chat_id = $message->chat->id;
$statuss= file_get_contents("$chat_id.txt");
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
if($text and $statuss == "Startinfo"){
$infoup = json_decode(file_get_contents("http://api.weatherstack.com/current?access_key=6838b5470d793ab1e4081f474e6e785d&query=$text"),true);
$infodown1= $infoup["request"]["query"];
$infodown2= $infoup["current"]["temperature"];
$infodown3= $infoup["location"]["localtime"];
$infodown4= $infoup["current"]["wind_speed"];
$infodown5= $infoup["current"]["weather_code"];
$infodown6= $infoup["current"]["wind_degree"];
$infodown7= $infoup["current"]["pressure"];
$infodown8= $infoup["current"]["precip"];
$infodown9= $infoup["current"]["is_day"];
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
 🇪🇬 الدولة : *$infodown1*
- - - - - - - - - - - - - - - - - - - - - 
🌡️  درجة الحرارة: *$infodown2*
 🕚 الوقت والتاريخ: *$infodown3*
🌬️ سرعة الرياح: *$infodown4*
🌈 رمز الطقس للدولة  *$infodown5* 
⛈️ مستوى الرياح *$infodown6*
🌪️ ضغط الرياح *$infodown7*
🌧️ حالة هطول الأمطار *$infodown8*
🌞 الشمس: *$infodown9*
",
'disable_web_page_preview'=>true,
'parse_mode'=>"markdown",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>'🏠 القائمة الرئيسية','callback_data'=>"BeroStart"]],
]
])
]);
file_put_contents("info.txt","");
}
if($text == '/start'){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"*👋 $name /🌤️ يعرض الروبوت معلومات الطقس من جميع أنحاء العالم!*
",
'disable_web_page_preview'=>true,
'parse_mode'=>"markdown",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>'🌤️ عرض الطقس' ,'callback_data'=>"BeroStart"]],
]
])
]);
}
if($data=="BeroStart"){
bot('editmessagetext',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"🗽أرسل اسم الدولة أو المدينة باللغة الإنجليزية فقط! مثال (*Egypt* )
",
'disable_web_page_preview'=>true,
'parse_mode'=>"markdown",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>'🏠 القائمة الرئيسية' ,'callback_data'=>"itsBack"]],
]
])
]);
file_put_contents("$chat_id.txt","Startinfo");
}

if($data=="itsBack"){
bot('editmessagetext',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"*👋 $name /🌤️ يعرض الروبوت معلومات الطقس من جميع أنحاء العالم!*
",
'disable_web_page_preview'=>true,
'parse_mode'=>"markdown",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>'🌤️ عرض الطقس' ,'callback_data'=>"BeroStart"]],
]
])
]);
file_put_contents("$chat_id.txt","");
}
/*غير الحقوق واثبت انك فاشل
اذا تريد تنقل اذكر اسمي او اسم قناتي */

/*====================
CH : @AX_GB
DEV : @O_1_W
Translator : @AX_GB
/*====================*/
echo "𝘉َِ𝘺 . 𝘔َِ𝘙•َِ𝘟 .";