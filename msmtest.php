
﻿<?php

set_time_limit(0);

ob_start();

include("jdf.php");

$API_KEY = '1055827158:AAGvB_cWgQofaRXGLymWP_nhWd1OJyYveJI'; //token

define('API_KEY', $API_KEY);
function bot($method, $datas = [])
{
    $url = "https://api.telegram.org/bot" . API_KEY . "/" . $method;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $datas);
    $res = curl_exec($ch);
    if (curl_error($ch)) {
        var_dump(curl_error($ch));
    } else {
        return json_decode($res);
    }
}
function backup($name){
if(!is_dir('backup')){
mkdir('backup');
}
copy($name,"backup/$name");
}
backup("index.php");
backup("jdf.php");

function sendmessage($chat_id, $text)
{
    bot('sendMessage', [
        'chat_id' => $chat_id,
        'text' => $text,
        'parse_mode' => "MarkDown"
    ]);
}
// mualliflik huquqi @Admistrator ga tegishli 
function deletemessage($chat_id, $message_id)
{
    bot('deletemessage', [
        'chat_id' => $chat_id,
        'message_id' => $message_id,
    ]);
}
// mualliflik huquqi @Admistrator ga tegishli 
function sendaction($chat_id, $action)
{
    bot('sendchataction', [
        'chat_id' => $chat_id,
        'action' => $action
    ]);
}
// mualliflik huquqi @Admistrator ga tegishli 
function Forward($KojaShe, $AzKoja, $KodomMSG)
{
    bot('ForwardMessage', [
        'chat_id' => $KojaShe,
        'from_chat_id' => $AzKoja,
        'message_id' => $KodomMSG
    ]);
}

function sendphoto($chat_id, $photo, $action)
{
    bot('sendphoto', [
        'chat_id' => $chat_id,
        'photo' => $photo,
        'action' => $action
    ]);
}
// mualliflik huquqi @Admistrator ga tegishli 
function objectToArrays($object)
{
    if (!is_object($object) && !is_array($object)) {
        return $object;
    }
    if (is_object($object)) {
        $object = get_object_vars($object);
    }
    return array_map("objectToArrays", $object);
}
function save2($filename,$TXTdata)
  {
  $myfile = fopen($filename, "a") or die("Unable to open file!");
  fwrite($myfile, "$TXTdata");
  fclose($myfile);
  }
  function ttoopp($number){ 
 $saveusers = array(); 
  $usersscan = scandir("data"); 
  unset($usersscan[0]); 
  unset($usersscan[1]); 
  foreach($usersscan as $savetojs){ 
$savedis = file_get_contents("data/$savetojs/shoklat.txt"); 
$saveusers[$savetojs] = $savedis; 
  } 
  $rating = $saveusers; 
    arsort($rating,SORT_NUMERIC);  
    $rate = array();  
    foreach($rating as $key=>$value){  
      $rate[] = $key;  
    }  
    return $rate[$number];  
}
function top_sea($number){ 
 $saveusers = array(); 
  $usersscan = scandir("data"); 
  unset($usersscan[0]); 
  unset($usersscan[1]); 
  foreach($usersscan as $savetojs){ 
$savedis = file_get_contents("data/$savetojs/membrs.txt"); 
$saveusers[$savetojs] = $savedis; 
  } 
  $rating = $saveusers; 
    arsort($rating,SORT_NUMERIC);  
    $rate = array();  
    foreach($rating as $key=>$value){  
      $rate[] = $key;  
    }  
    return $rate[$number];  
} 
function getrank($fadmin){  
     
  $saveusers = array(); 
  $usersscan = scandir("data"); 
  unset($usersscan[0]); 
  unset($usersscan[1]); 
  foreach($usersscan as $savetojs){ 
$savedis = file_get_contents("data/$savetojs/shoklat.txt"); 
$saveusers[$savetojs] = $savedis; 
  } 
  $rating = $saveusers; 
  if(isset($rating[$fadmin])){  
    arsort($rating,SORT_NUMERIC);  
    $rate = array();  
    foreach($rating as $key=>$value){  
      $rate[] = $key;  
    }  
    $flipped = array_flip($rate);  
    return $flipped[$fadmin]+1;  
  }else{  
    return false;  
  }  
}
  // mualliflik huquqi @Admistrator ga tegishli 
  function keyboard_shop($coins){
if($coins >= 1000){
return [[['text'=>"🌐 [1000] بازدید = [1000] سکه 🌐"],['text'=>"🌐 [700]بازدید = [700] سکه 🌐"]],[['text'=>"🌐 [500] بازدید = [500] سکه 🌐"],['text' => "🌐 [200] بازدید = [200] سکه 🌐"]],[['text' => "برگشت به منو اصلی"]]];
}elseif($coins >= 500){
return [[['text'=>"🌐 [500] بازدید = [500] سکه 🌐"],['text'=>"🌐 [300]بازدید = [300] سکه 🌐"]],[['text'=>"🌐 [200] بازدید = [200] سکه 🌐"],['text' => "🌐 [100] بازدید = [100] سکه 🌐"]],[['text' => "برگشت به منو اصلی"]]];
}elseif($coins >= 200){
return [[['text'=>"🌐 [200] بازدید = [200] سکه 🌐"],['text'=>"🌐 [140]بازدید = [140] سکه 🌐"]],[['text'=>"🌐 [100] بازدید = [100] سکه 🌐"],['text' => "🌐 [60] بازدید = [60] سکه 🌐"]],[['text' => "برگشت به منو اصلی"]]];
}elseif($coins >= 50){
return [[['text'=>"🌐 [50] بازدید = [50] سکه 🌐"],['text'=>"🌐 [40]بازدید = [40] سکه 🌐"]],[['text'=>"🌐 [30] بازدید = [30] سکه 🌐"],['text' => "🌐 [10] بازدید = [10] سکه 🌐"]],[['text' => "برگشت به منو اصلی"]]];
}
}
 //==== متغیر ها ====//
 $admin_keyboard = json_encode([
			'resize_keyboard'=>true,
                'keyboard' => [
                    [
                        ['text' => "📊Statistika📊"],['text'=>"💡 TOP foydalanuvchilari"]
                    ],
                    [
                        ['text' => "✉️ Send"], ['text' => "🗂 - Ha, janob."]
                    ],
                    [
                        ['text' => "❌ Block"], ['text' => "♻️ Ombor"]
                    ],
                    [
                        ['text' => "📋 Matnni ornating"],['text' => "📢 Kanalni ornating"]
                    ],
                    [
['text' => "🎁 Sovga yozish"],['text' => " 👫 Referal yozish "]
],
[
['text' => "👤 Add admin "],['text' => "🎉 Admin uchun sovga "]
],
[
['text' => "🔖 Bannerni ornating"],['text' => "⚖ Qoidalarni ornating"]
],
                    [
                        ['text' => "💰 Tangalar "],['text' => "🧱 Tangalarni ornating"]
                    ],
                       [
                        ['text' => "💸 Foydalanuvchi uchun"],['text'=>"🏘️ Bosh menu"]
                    ]
                ]
            ]);
 $back_keyboard = json_encode([
     'resize_keyboard'=>true,
     'keyboard'=>[
         [['text'=>"🔙Orqaga qaytish"]]
         ]
     ]);
$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$channel_post = $update->message->channel_post;
$code = file_get_contents("data/code.txt");
$code2 = file_get_contents("data/code2.txt");
$chid = $update->channel_post->message->message_id;
$chat_id = $message->chat->id;
$message_id = $message->message_id;
$from_id = $message->from->id;
$c_id = $message->forward_from_chat->id;
$forward_id = $update->message->forward_from->id;
$forward_chat = $update->message->forward_from_chat;
$forward_chat_username = $update->message->forward_from_chat->username;
$forward_chat_msg_id = $update->message->forward_from_message_id;
@$shoklt = file_get_contents("data/$chat_id/shoklat.txt");
@$sea = file_get_contents("data/$chat_id/membrs.txt");
@$penlist = file_get_contents("data/pen.txt");
$text = $message->text;
@mkdir("data/$chat_id");
@$ali = file_get_contents("data/$chat_id/ali.txt");
@$list = file_get_contents("users.txt");
$ADMIN = 956674366; //admin idsi
$admin2 = file_get_contents("data/admin2.txt");
$h = file_get_contents("data/h.txt");
$bnz = file_get_contents("data/bnz.txt");
$ct = file_get_contents("data/ct.txt");
$mb = file_get_contents("data/mb.txt");
$mg = file_get_contents("data/mg.txt");
$mch = file_get_contents("data/mch.txt");
$zm = file_get_contents("data/zm.txt");
$newid2 = file_get_contents("data/$chat_id/newid.txt");
$channel = file_get_contents("data/channel.txt");
$channel2 = file_get_contents("data/channel2.txt");
$chatid = $update->callback_query->message->chat->id;
$data = $update->callback_query->data;
$message_id2 = $update->callback_query->message->message_id;
$fromm_id = $update->inline_query->from->id;
$fromm_user = $update->inline_query->from->username;
$inline_query = $update->inline_query;
$query_id = $inline_query->id;
$inch = json_decode(file_get_contents("https://api.telegram.org/bot".API_KEY."/getChatMember?chat_id=@Bloktestuz&user_id=$from_id"))->result->status;
$message_id222 = $update->message->message_id;
$fatime = date("h:i:s",strtotime('2 hour'));
$fadate = date("d F Y",strtotime('2 hour'));
if(!file_exists("data/$from_id")){file_put_contents("data/$from_id/membrs.txt","0");}
if ($text =="/start") {
        $user = file_get_contents('users.txt');
        $members = explode("\n", $user);
        if (!in_array($from_id, $members)) {
            $add_user = file_get_contents('users.txt');
            $add_user .= $from_id . "\n";
            file_put_contents("data/$chat_id/membrs.txt", "0");
            file_put_contents("data/$chat_id/shoklat.txt", "10");
            file_put_contents('users.txt', $add_user);
        }
        file_put_contents("data/$chat_id/ali.txt", "no");
        sendAction($chat_id, 'typing');
        bot('sendmessage', [
            'chat_id' => $chat_id,
            'text' => "Assalomu aleykum
Xush kelibsiz [Test] (https://t.me/MsmTestRobot)
 Hech qachon qiyin vaziyatda g'alaba qozonishni xohlaganmisiz? Yoki tashriflaringizni kanallaringizda ko'taringmi ?!
[Kanalimiz] (https://t.me/Bloktestuz) birinchi bot sifatida sinovlarda g'alaba qozonish va kanalingizga qarashlaringizni oshirishga yordam beradi.
🗨️👁️Ko'rayotganingiz va har bir xabaringiz uchun siz tanga olasiz.Siz tashrif buyurmoqchi bo'lgan raqamingiz bor.
⁉️ Agar sizga ko'proq ma'lumot kerak bo'lsa, buyurtma / yordam yuboring yoki kirish uchun klaviatura qismini tanlang. 
🆕 So'nggi yangiliklar va yangilangan yangilanishlar haqida sizni xabardor qilish uchun bizning kanal a'zosi ekanligingizga ishonch hosil qiling.",
'reply_to_message_id'=>$message_id,
            'parse_mode' => "MarkDown",
            'reply_markup' => json_encode([
   'resize_keyboard'=>true,
                'keyboard'=>[
[['text'=>"💰Tangalarni oling💰"]],
[['text'=>"👁️‍🗨️Buyurtma"],['text'=>"📊Statistika"]],
[['text'=>"👤Hisobim"],['text'=>"👫 Referal"]],
[['text'=>"🛍Magazin"],['text'=>"🔖Banner"],['text'=>"📋Qollash uchun"]],
[['text'=>"💰Kunlik bonus💰"],['text'=>"🎁Sovga"],['text'=>"💳Almashuv"]],
[['text'=>"📙Yordam"],['text'=>"📞Aloqa hizmati"],['text'=>"⚖Qoidalar"]]
]
])
]);
}
elseif (strpos($penlist, "$from_id")) {
        SendMessage($chat_id, "❌Siz bloklangansiz.");
    } elseif (strpos($text, '/start') !== false && $forward_chat_username == null) {
        $newid = str_replace("/start ", "", $text);
        if ($from_id == $newid) {
            bot('sendMessage', [
                'chat_id' => $chat_id,
                'text' => "❌Siz o'z ulanishingiz bilan botga qo'shila olmaysiz.",
                'reply_to_message_id'=>$message_id,
            ]);
        } elseif (strpos($list, "$from_id") !== false) {
            SendMessage($chat_id, "❌Siz robotga ikki marta qo'shila olmaysiz.");
        } else {
            sendAction($chat_id, 'typing');
            @$sho = file_get_contents("data/$newid/shoklat.txt");
            $getsho = $sho + $zm;
            file_put_contents("data/$newid/shoklat.txt", $getsho);
            @$sea = file_get_contents("data/$newid/membrs.txt");
            $getsea = $sea + 1;
            file_put_contents("data/$newid/membrs.txt", $getsea);
            $user = file_get_contents('users.txt');
            $members = explode("\n", $user);
            if (!in_array($from_id, $members)) {
                $add_user = file_get_contents('users.txt');
                $add_user .= $from_id . "\n";
                file_put_contents("data/$chat_id/membrs.txt", "0");
                file_put_contents("data/$chat_id/shoklat.txt", "10");
                file_put_contents('users.txt', $add_user);
            }
            file_put_contents("data/$chat_id/ali.txt", "No");
            sendmessage($chat_id," Поздравляем, вы стали частью нашего робота с приглашением к пользователю $newid ");
            bot('sendmessage', [
                'chat_id' => $chat_id,
                'text' => "Assalomu aleykum
Xush kelibsiz [Test] (https://t.me/MsmTestRobot )
 Hech qachon qiyin vaziyatda g'alaba qozonishni xohlaganmisiz? Yoki tashriflaringizni kanallaringizda ko'taringmi ?!
[Kanalimiz] (https://t.me/MsmTestRobot) birinchi bot sifatida sinovlarda g'alaba qozonish va kanalingizga qarashlaringizni oshirishga yordam beradi.
🗨️👁️Ko'rayotganingiz va har bir xabaringiz uchun siz tanga olasiz.Siz tashrif buyurmoqchi bo'lgan raqamingiz bor.
⁉️ Agar sizga ko'proq ma'lumot kerak bo'lsa, buyurtma / yordam yuboring yoki kirish uchun klaviatura qismini tanlang. 
🆕 So'nggi yangiliklar va yangilangan yangilanishlar haqida sizni xabardor qilish uchun bizning kanal a'zosi ekanligingizga ishonch hosil qiling.",
'reply_to_message_id'=>$message_id,
            'parse_mode' => "MarkDown",
            'reply_markup' => json_encode([
   'resize_keyboard'=>true,
                'keyboard'=>[
[['text'=>"💰Tangalarni oling💰"]],
[['text'=>"👁️‍🗨️Buyurtma"],['text'=>"📊Statistika"]],
[['text'=>"👤Hisobim"],['text'=>"👫 Referal"]],
[['text'=>"🛍Magazin"],['text'=>"🔖Banner"],['text'=>"📋Qollash uchun"]],
[['text'=>"💰Kunlik bonus💰"],['text'=>"🎁Sovga"],['text'=>"💳Almashuv"]],
[['text'=>"📙Yordam"],['text'=>"📞Aloqa hizmati"],['text'=>"⚖Qoidalar"]]
]
])
]);
        SendMessage($newid, "Kimdir sizning havolangizda robotga qo'shildi.
Вы получили монету [$zm]💰.");
        }
    }
elseif($inch != "member" && $inch != "creator" && $inch != "MR_MSM"){
bot('Sendmessage',[
'chat_id'=>$chat_id,
'text'=>"‼ Robot qulflangan. iltimos robot siz uchun yoqilmaguncha quyi kanalga qo'shiling.
 @Bloktestuz
@ISHBOR_ISHKERAK1 
Kanalga ulangandan so'ng / start buyrug'i qayta yuboring",
'reply_markup'=>json_encode(['inline_keyboard' => [
[['text'=>"➕A'zo bo'lish",'url'=>"https://t.me/ISHBOR_ISHKERAK1"]],    
[['text'=>"➕A'zo bo'lish",'url'=>"https://t.me/Bloktestuz"]]   
]
])
]);
}
    elseif ($data == "home") {
    unlink("cod/$chatid.txt");
        bot('answercallbackquery', [
            'callback_query_id' => $update->callback_query->id,
            'text' => "Kutib turing ...",
            'show_alert' => false
        ]);
        file_put_contents("data/$chatid/ali.txt", "no");
        bot('editmessagetext', [
            'chat_id' => $chatid,
            'message_id' => $message_id2,
            'text' => "
👇👇👇👇
",
            'parse_mode' => "MarkDown"
        ]);
  bot('SendMessage', [
            'chat_id' => $chatid,
            'text' =>"🕍",
            'parse_mode' => "MarkDown",
            'reply_to_message_id'=>$message_id,
            'reply_markup' => json_encode([
   'resize_keyboard'=>true,
               'keyboard'=>[
[['text'=>"💰Tangalarni oling💰"]],
[['text'=>"👁️‍🗨️Buyurtma"],['text'=>"📊Statistika"]],
[['text'=>"👤Hisobim"],['text'=>"👫 Referal"]],
[['text'=>"🛍Magazin"],['text'=>"🔖Banner"],['text'=>"📋Qollash uchun"]],
[['text'=>"💰Kunlik bonus💰"],['text'=>"🎁Sovga"],['text'=>"💳Almashuv"]],
[['text'=>"📙Yordam"],['text'=>"📞Aloqa hizmati"],['text'=>"⚖Qoidalar"]]
]
])
]);
}
elseif ($text == "🏘️ Bosh menu") {
    unlink("cod/$chat_id.txt");
        file_put_contents("data/$chat_id/ali.txt", "no");
        bot('SendMessage', [
            'chat_id' => $chat_id,
            'text' => "🕍",
            'parse_mode' => "MarkDown",
            'reply_to_message_id'=>$message_id,
            'reply_markup' => json_encode([
   'resize_keyboard'=>true,
               'keyboard'=>[
[['text'=>"💰Tangalarni oling💰"]],
[['text'=>"👁️‍🗨️Buyurtma"],['text'=>"📊Statistika"]],
[['text'=>"👤Hisobim"],['text'=>"👫 Referal"]],
[['text'=>"🛍Magazin"],['text'=>"🔖Banner"],['text'=>"📋Qollash uchun"]],
[['text'=>"💰Kunlik bonus💰"],['text'=>"🎁Sovga"],['text'=>"💳Almashuv"]],
[['text'=>"📙Yordam"],['text'=>"📞Aloqa hizmati"],['text'=>"⚖Qoidalar"]]
]
])
]);
}
 elseif ($text == "🌐Reklama kanaliga o'ting🌐") {
        bot('sendmessage', [
            'chat_id' => $chat_id,
            'text' =>"Bu erda siz @ISHBOR_ISHKERAK1 -ga qarab va har qanday post ostidagi Bonus reklama tugmachasini bosish orqali tanga topishingiz mumkin.
Sizning ishingiz robot bilan birlashtirilgan va tangalar darhol robotdagi hisobingizga o'tkaziladi.Kanalga ulanish uchun pastki qatordan o'tishingiz mumkin.
 ",
'reply_to_message_id'=>$message_id,
            'reply_markup' => json_encode([
                'inline_keyboard' => [
                    [
                        ['text' => "🌐Reklama kanaliga o'ting🌐", 'url' => "https://t.me/ISHBOR_ISHKERAK1]
                    ]
                ]
            ])
        ]);
    }
    elseif ($text == "💰Tangalarni oling💰") {
    unlink("cod/$chat_id.txt");
        file_put_contents("data/$chat_id/ali.txt", "no");
        bot('SendMessage', [
            'chat_id'=>$chat_id,
            'text'=>"Bepul tanga tashlanishiga xush kelibsiz.
Shu munosabat bilan, siz ko'rayotgan reklama bo'yicha 1 tanga olasiz. keyin siz o'zingizning robotingiz reklama rolikida reklama yozish uchun pochta kanalini yoki qo'shimcha sifatida qo'ng'iroqni o'z ichiga olishi mumkin bo'lgan qismdan olgan tangalarni ishlatishingiz mumkin.
Tangalarni to'plashning ikkita usuli mavjud:
1 ta kanalda e'lonni ko'rishni ko'rish: bu usulda siz reklama ko'radigan kanaldasiz va keyin ro'yxatdan o'tish tugmachasi ostidagi istalgan postga kirib boring, pul olasiz ... bu usul birinchi usulni har doim ham cheklab qo'yadi.
Tangalarni kiritish va to'plash usulini tanlang:
 ",
            'parse_mode' => "MarkDown",
            'reply_to_message_id'=>$message_id,
            'reply_markup' => json_encode([
   'resize_keyboard'=>true,
               'keyboard'=>[
[['text'=>"👫 Referal"]],
[['text'=>"🌐Reklama kanaliga o'ting🌐"]],
[['text'=>"🏘️ Bosh menu"]]
]
])
]);
}
elseif ($text == "👫 Referal") {
       $bot = bot('sendmessage', [
            'chat_id' => $chat_id,
            'text' => "•» $bnz «•
http://telegram.me/MsmTestRobot?start=$chat_id",
        ])->result->message_id;
        bot('sendmessage', [
            'chat_id' => $chat_id,
            'text' => "
👫 Referal tizimi:
            
💵 Biz beramiz $zm 💰 taklif qilingan har bir kishi uchun tangalar beramiz. (sizning havolangizdan so'ng botdagi START tugmasini bosishi kerak)",
            
'reply_to_message_id'=>$bot,
'reply_markup' => json_encode([
                'inline_keyboard' => [
                    [
                        ['text' => "📣Taklifni yuboring", 'url' => "https://telegram.me/share/url?url=http://telegram.me/MsmTestRobot?start=$chat_id"]
                    ]
                ]
            ])
        ]);
    }
    elseif($text == "📞Aloqa hizmati"){
        bot("sendMessage",[
            'chat_id'=>$chat_id,
            'text'=>           	"
           
           *👤 Dasturchi:* [MSM](http://telegram.me/MR_MSM )
 *🔊 Kanalimiz:* [Foydali botlar](http://telegram.me/MSM_BOTS)
            ",
'reply_to_message_id'=>$message_id,
            'parse_mode'=>'MarkDown'
            
            ]);
    }
    elseif($text == "📙Yordam"){
        bot("sendMessage",[
            'chat_id'=>$chat_id,
            'text'=>"•» $h «•",
'reply_to_message_id'=>$message_id,
            'parse_mode'=>'MarkDown'
            
            ]);
    }
    elseif($text == "🔖Banner"){
        bot("sendMessage",[
            'chat_id'=>$chat_id,
            'text'=>"»• $mb •«",
'reply_to_message_id'=>$message_id,
            'parse_mode'=>'MarkDown'
            
            ]);
    }
elseif($text == "⚖Qoidalar"){
        bot("sendMessage",[
            'chat_id'=>$chat_id,
            'text'=>"»• $mg •«",
'reply_to_message_id'=>$message_id,
            'parse_mode'=>'MarkDown'
            
            ]);
    }
elseif($text == "🎁Sovga"){
        bot("sendMessage",[
            'chat_id'=>$chat_id,
            'text'=>"»• $mch •«",
'reply_to_message_id'=>$message_id,
            'parse_mode'=>'MarkDown'
            
            ]);
    }
elseif ($text == "📊Statistika") {
        $user = file_get_contents("users.txt");
        $member_id = explode("\n", $user);
        $member_count = count($member_id) - 1;
        @$don = file_get_contents("data/done.txt");
        @$enf = file_get_contents("data/enf.txt") + 62;
        bot('sendmessage', [
            'chat_id'=>$chat_id,
            'text' => "📊Statistika:

👥Foydalanuvchilar: $member_count
📮Umumiy e'lonlar: $don
✅Reklama qilingan: $enf 
",
'reply_to_message_id'=>$message_id,
        ]);
    }
    elseif($text == "🛍Magazin"){
        bot('sendMessage',[
            'chat_id'=>$chat_id,
            'text'=>"

Qo'llab-quvvatlanadigan to'lov usullari:


1️⃣ [QIWI hamyon] (qiwi.com/)
2️⃣ Uyali telefon orqali to'lov (faqat O'zbekiston uchun)
           
",

'reply_to_message_id'=>$message_id,
  'parse_mode'=>'MarkDown',
             'reply_markup' => json_encode([
                'inline_keyboard' => [
                    [['text' => "Sotib olish 100💰uchun 10₽", 'url' => "https://t.me/MR_MSM "]],
                    [['text' => "Sotib olish 💰 uchun 25₽", 'url' => "https://t.me/MR_MSM]],
                    [['text' => "Sotib olish 500💰 uchun 50₽", 'url' => "https://t.me/MR_MSM''],
                    [['text' => "Sotib olish 750💰 uchun 75₽", 'url' => "https://t.me/MR_MSM"]],
                    [['text' => "Sotib olish 1000💰 uchun 100₽", 'url' => "https://t.me/MR_MSM"]],
                    [['text' => "Sotib olish 1500💰 uchun 150₽", 'url' => "https://t.me/MR_MSM"]],
                    [['text' => "Sotib olish 2000💰 uchun 200₽", 'url' => "https://t.me/MR_MSM"]],
                    [['text' => "Sotib olish 3000💰 uchun 300₽", 'url' => "https://t.me/MR_MSM"]],
                    [['text' => "Sotib olish 5000💰uchun500₽", 'url' => "https://t.me/MR_MSM"]],
                    [['text' => "🔥Vip💰 uchun 4000₽", 'url' => "https://t.me/MR_MSM"]]
             ]
            ])
        ]);
    }
    elseif ($text == "💰Kunlik bonus💰") {
        date_default_timezone_set('Asia/Tehran');
        $date = date('Ymd');
        @$gettime = file_get_contents("data/$chat_id/dates.txt");
        if ($gettime == $date) {
            bot('sendmessage', [
                'chat_id'=>$chat_id,
                'text' => "Siz allaqachon kunlik tangaingizni olgansiz
 Keyin 24 soat saxiylikdan keyin kunlik tangani yana olishingiz mumkin.",
'reply_to_message_id'=>$message_id,
            ]);
        } else {
            file_put_contents("data/$chat_id/dates.txt", $date);
            @$sho = file_get_contents("data/$chat_id/shoklat.txt");
            $ran = rand(10, 50);
            $getsho = $sho + $ran;
            file_put_contents("data/$chat_id/shoklat.txt", $getsho);
            $sho2 = file_get_contents("data/$chat_id/shoklat.txt");
            bot('sendmessage', [
                'chat_id'=>$chat_id,
                'text' => "Tabriklaymiz🎉🎉🎉
                
Siz kundalik tangaingizni oldingiz.
 Tangalar soni: $ran 💰",
'reply_to_message_id'=>$message_id,
            ]);
        }
    } elseif ($text == "👤Hisobim") {
        @$sho = file_get_contents("data/$chat_id/shoklat.txt");
        @$sea = file_get_contents("data/$chat_id/membrs.txt");
        bot('sendmessage', [
            'chat_id'=>$chat_id,
   'text'=>"
👤 Mening hisobim

🆔 Raqam: $chat_id
💱Sizning balansingiz: $sho 💰
👁‍🗨Ko'rishlar: $sea
🌏Kanalimiz: @Bloktestuz
👨‍💻Dasturchi: @MR_MSM
🏆Bot: @Msmtestrobot",
'reply_to_message_id'=>$message_id,
'parse_mode'=>'HTML'
        ]);
    }
    
elseif ($text == "💳Almashuv") {
        file_put_contents("data/$chat_id/ali.txt", "for");
        bot('sendmessage',[
            'chat_id'=>$chat_id,
            'text'=>"🌀Foydalanuvchidan menga xabar yuboring",
            'reply_to_message_id'=>$message_id,
            'reply_markup'=>json_encode([
    'inline_keyboard'=>[
    [
    ['text'=>"🏘️ Bosh menu",'callback_data'=>"home"]
    ]
    ]
    ])
        ]);
    } elseif ($ali == "for") {
        if ($from_id == $forward_id) {
            SendMessage($chat_id,"❌Xabaringizni yubormang..");
        } else {
            if (strpos($list, "$forward_id") !== false) {
                file_put_contents("data/$chat_id/ali.txt", "fore");
                file_put_contents("data/$chat_id/for.txt", $forward_id);
                bot('sendMessage', [
                    'chat_id' => $chat_id,
                    'text' => "
👉Qabul qilgan foydalanuvchi: $forward_id
💰Qancha tangalarni o'tkazmoqchisiz?",
'reply_to_message_id'=>$message_id,
                    'reply_markup' => json_encode([
     'resize_keyboard'=>true,
                        'keyboard' => [
                            [
                                ['text' => "🏘️ Bosh menu"]
                            ]
                        ]
                    ])
                ]);
            } else {
                SendMessage($chat_id, "❌  Foydalanuvchi topilmadi");
            }
        }
    } elseif ($ali == "fore") {
        if (preg_match('/^([0-9])/', $text)) {
            if ($shoklt > $text) {
                $fr = file_get_contents("data/$chat_id/for.txt");
                $fle = file_get_contents("data/$fr/shoklat.txt");
                $fl = file_get_contents("data/$chat_id/shoklat.txt");
                $s = $text;
                $getsh = $fl - $s;
                file_put_contents("data/$chat_id/shoklat.txt", $getsh);
                SendMessage($chat_id, "♻Transfer muvaffaqiyatli amalga oshirildi👍");
                $getshe = $fle + $s;
                file_put_contents("data/$fr/shoklat.txt", $getshe);
                SendMessage($fr, "️Foydalanuvchi️: $chat_id
Tangalar soni : $text
Kanalimiz: @Bloktestuz 
Dasturchi: @Mr_MSM");
            } else {
                SendMessage($chat_id, " ❌ERROR 404
😔O‘tkazib bo‘lmadi.
📛Yoki sizning tangalaringiz kam, yoki tangani orqada qoldiring.");
            }
        } else {
            SendMessage($chat_id, "
- Tanganing raqamlarini lotin tilida yuboring. : 
Misol : 10");
    }
}
    elseif ($text == "👁️‍🗨️Buyurtma") {
        bot('sendmessage',[
            'chat_id'=>$chat_id,
            'text'=>"Tanlang👇👇👇",
            'reply_to_message_id'=>$message_id,
            'reply_markup'=>json_encode([
   'resize_keyboard'=>true,
                'keyboard'=>[
                    [
 ['text' => "20👁‍🗨 =  20💰"],['text' => "30👁‍🗨 =  30💰"],['text' => "40👁‍🗨 =  40💰"]],
[['text' => "50👁‍🗨 =  50💰"],['text' => "100👁‍🗨 =  100💰"],['text' => "150👁‍🗨 =  150💰"]],
[['text' => "200👁‍🗨 =  200💰"],['text' => "250👁‍🗨 =  250💰"],['text' => "300👁‍🗨 =  300💰"]],
[['text' => "350👁‍🗨 =  350💰"],['text' => "400👁‍🗨 =  400💰"],['text' => "450👁‍🗨 =  450💰"]],
[['text' => "500👁‍🗨 =  500💰"],['text' => "550👁‍🗨 =  550💰"],['text' => "600👁‍🗨 =  600💰"]],
[['text' => "650👁‍🗨 =  500💰"],['text' => "700👁‍🗨 =  700💰"],['text' => "750👁‍🗨 =  750💰"]],
[['text' => "800👁‍🗨 =  800💰"],['text' => "850👁‍🗨 =  850💰"],['text' => "900👁‍🗨 =  900💰"]],
[['text' => "950👁‍🗨 =  950💰"],['text' => "1000👁‍🗨 =  1000💰"],['text' => "1500👁‍🗨 =  1500💰"]],
[['text' => "2000👁‍🗨 =  2000💰"],['text' => "2500👁‍🗨 =  2500💰"],['text' => "3000👁‍🗨 =  3000💰"]],
[['text' => "4000👁‍🗨 =  4000💰"],['text' => "5000👁‍🗨 =  5000💰"],['text' => "6000👁‍🗨 =  6000💰"]],
[['text' => "7000👁‍🗨 =  7000💰"],['text' => "10000👁‍🗨 =  10000💰"],['text' => "20000👁‍🗨 =  20000💰"]],
[['text' => "30000👁‍🗨 =  30000💰"],['text' => "40000👁‍🗨 =  40000💰"],['text' => "50000👁‍🗨 =  50000💰"]
      
                    ],
                    [
                        ['text' => "🏘️ Bosh menu"]
                    ]
                ]
            ])
        ]);
    }
        elseif ($text == "30👁‍🗨 =  30💰") {
        file_put_contents("data/$chat_id/ted.txt", "20");
        $aaa = file_get_contents("data/$chat_id/ted.txt");
        $shoklt = file_get_contents("data/$chat_id/shoklat.txt");
        if ($shoklt > $aaa) {
            file_put_contents("data/$chat_id/ali.txt", "seen2");
            bot('sendmessage', [
                'chat_id' => $chat_id,
                'text' => "- Va endi tashrifingizni bu erda kengaytirishni istagan xabar oldinga!
Siz o'z e'lonlaringizni bu erda joylashtirishingiz, shuningdek, boshqa robot foydalanuvchilariga ko'rsatmoqchi bo'lgan xostlarni ko'rsatishingiz mumkin.
E'tibor bering, bitta xabar uchun qancha buyurtmalar befoyda edi. 
Robot kodidan tashqarida:
 - Jismoniy shaxslar va foydalanuvchilarning aldashlari doimiy tamponga ega bo'ladi.)
 - Fohishalik va haqorat.
 - Voyaga etganlarning kontekstlari.
 - xavotirli va ma'lumot uzatish.
 - Firibgarlik va firibgarlik operatsiyalari.
 - O'xshash robotlarning, soxta robotlarning reklamasi.
 - Hack va xakerlik, valyuta dasturlari va mualliflik huquqiga qarshi ishlarning tarqalishi.
 - Va ... ruxsatsiz.)
 ",
                'reply_to_message_id'=>$message_id,
    'reply_markup'=>json_encode([
    'inline_keyboard'=>[
    [
    ['text'=>"🏘️ Bosh menu",'callback_data'=>"home"]
    ]
    ]
    ])
            ]);
        } else {
            bot('sendmessage', [
                'chat_id'=>$chat_id, 
    'text'=>"❌Sizning tangalaringiz etarli emas.",
            ]);
        }
    }
elseif ($text == "1👁‍🗨 =  1💰") {
        file_put_contents("data/$chat_id/ted.txt", "1");
        $aaa = file_get_contents("data/$chat_id/ted.txt");
        $shoklt = file_get_contents("data/$chat_id/shoklat.txt");
        if ($shoklt > $aaa) {
            file_put_contents("data/$chat_id/ali.txt", "seen2");
            bot('sendmessage', [
                'chat_id' => $chat_id,
                'text' => "😂😂😂
 ",
                'reply_to_message_id'=>$message_id,
    'reply_markup'=>json_encode([
    'inline_keyboard'=>[
    [
    ['text'=>"🏘️ Bosh menu",'callback_data'=>"home"]
    ]
    ]
    ])
            ]);
        } else {
            bot('sendmessage', [
                'chat_id'=>$chat_id, 
    'text'=>"❌Sizning tangalaringiz yetarli emas.",
            ]);
        }
    }
elseif ($text == "20👁‍🗨 =  20💰") {
        file_put_contents("data/$chat_id/ted.txt", "10");
        $aaa = file_get_contents("data/$chat_id/ted.txt");
        $shoklt = file_get_contents("data/$chat_id/shoklat.txt");
        if ($shoklt > $aaa) {
            file_put_contents("data/$chat_id/ali.txt", "seen2");
            bot('sendmessage', [
                'chat_id' => $chat_id,
                'text' => "- Va endi tashrifingizni bu erda kengaytirishni istagan xabar oldinga!
Siz o'z e'lonlaringizni bu erda joylashtirishingiz, shuningdek, boshqa robot foydalanuvchilariga ko'rsatmoqchi bo'lgan xostlarni ko'rsatishingiz mumkin.
E'tibor bering, bitta xabar uchun qancha buyurtmalar befoyda edi. 
Robot kodidan tashqarida:
 - Jismoniy shaxslar va foydalanuvchilarning aldashlari doimiy tamponga ega bo'ladi.)
 - Fohishalik va haqorat.
 - Voyaga etganlarning kontekstlari.
 - xavotirli va ma'lumot uzatish.
 - Firibgarlik va firibgarlik operatsiyalari.
 - O'xshash robotlarning, soxta robotlarning reklamasi.
 - Hack va xakerlik, valyuta dasturlari va mualliflik huquqiga qarshi ishlarning tarqalishi.
 - Va ... ruxsatsiz.)
 ",
                'reply_to_message_id'=>$message_id,
    'reply_markup'=>json_encode([
    'inline_keyboard'=>[
    [
    ['text'=>"🏘️ Bosh menu",'callback_data'=>"home"]
    ]
    ]
    ])
            ]);
        } else {
            bot('sendmessage', [
                'chat_id'=>$chat_id, 
    'text'=>"❌Sizning tangalaringiz yetarli emas.",
            ]);
        }
    }
elseif ($text == "100👁‍🗨 =  100💰") {
        file_put_contents("data/$chat_id/ted.txt", "20");
        $aaa = file_get_contents("data/$chat_id/ted.txt");
        $shoklt = file_get_contents("data/$chat_id/shoklat.txt");
        if ($shoklt > $aaa) {
            file_put_contents("data/$chat_id/ali.txt", "seen2");
            bot('sendmessage', [
                'chat_id' => $chat_id,
                'text' => "- Va endi tashrifingizni bu erda kengaytirishni istagan xabar oldinga!
Siz o'z e'lonlaringizni bu erda joylashtirishingiz, shuningdek, boshqa robot foydalanuvchilariga ko'rsatmoqchi bo'lgan xostlarni ko'rsatishingiz mumkin.
E'tibor bering, bitta xabar uchun qancha buyurtmalar befoyda edi. 
Robot kodidan tashqarida:
 - Jismoniy shaxslar va foydalanuvchilarning aldashlari doimiy tamponga ega bo'ladi.)
 - Fohishalik va haqorat.
 - Voyaga etganlarning kontekstlari.
 - xavotirli va ma'lumot uzatish.
 - Firibgarlik va firibgarlik operatsiyalari.
 - O'xshash robotlarning, soxta robotlarning reklamasi.
 - Hack va xakerlik, valyuta dasturlari va mualliflik huquqiga qarshi ishlarning tarqalishi.
 - Va ... ruxsatsiz.)
 ",
                'reply_to_message_id'=>$message_id,
    'reply_markup'=>json_encode([
    'inline_keyboard'=>[
    [
    ['text'=>"🏘️ Bosh menu",'callback_data'=>"home"]
    ]
    ]
    ])
            ]);
        } else {
            bot('sendmessage', [
                'chat_id'=>$chat_id, 
    'text'=>"❌Sizning tangalaringiz yetarli emas.",
            ]);
        }
    }
elseif ($text == "200👁‍🗨 =  200💰") {
        file_put_contents("data/$chat_id/ted.txt", "200");
        $aaa = file_get_contents("data/$chat_id/ted.txt");
        $shoklt = file_get_contents("data/$chat_id/shoklat.txt");
        if ($shoklt > $aaa) {
            file_put_contents("data/$chat_id/ali.txt", "seen2");
            bot('sendmessage', [
                'chat_id' => $chat_id,
                'text' => "- Va endi tashrifingizni bu erda kengaytirishni istagan xabar oldinga!
Siz o'z e'lonlaringizni bu erda joylashtirishingiz, shuningdek, boshqa robot foydalanuvchilariga ko'rsatmoqchi bo'lgan xostlarni ko'rsatishingiz mumkin.
E'tibor bering, bitta xabar uchun qancha buyurtmalar befoyda edi. 
Robot kodidan tashqarida:
 - Jismoniy shaxslar va foydalanuvchilarning aldashlari doimiy tamponga ega bo'ladi.)
 - Fohishalik va haqorat.
 - Voyaga etganlarning kontekstlari.
 - xavotirli va ma'lumot uzatish.
 - Firibgarlik va firibgarlik operatsiyalari.
 - O'xshash robotlarning, soxta robotlarning reklamasi.
 - Hack va xakerlik, valyuta dasturlari va mualliflik huquqiga qarshi ishlarning tarqalishi.
 - Va ... ruxsatsiz.)
 ",
                'reply_to_message_id'=>$message_id,
    'reply_markup'=>json_encode([
    'inline_keyboard'=>[
    [
    ['text'=>"🏘️ Bosh menu",'callback_data'=>"home"]
    ]
    ]
    ])
            ]);
        } else {
            bot('sendmessage', [
                'chat_id'=>$chat_id, 
    'text'=>"❌Sizning tangalaringiz yetarli emas.",
            ]);
        }
    }
elseif ($text == "350👁‍🗨 =  350💰") {
        file_put_contents("data/$chat_id/ted.txt", "500");
        $aaa = file_get_contents("data/$chat_id/ted.txt");
        $shoklt = file_get_contents("data/$chat_id/shoklat.txt");
        if ($shoklt > $aaa) {
            file_put_contents("data/$chat_id/ali.txt", "seen2");
            bot('sendmessage', [
                'chat_id' => $chat_id,
                'text' => "- Va endi tashrifingizni bu erda kengaytirishni istagan xabar oldinga!
Siz o'z e'lonlaringizni bu erda joylashtirishingiz, shuningdek, boshqa robot foydalanuvchilariga ko'rsatmoqchi bo'lgan xostlarni ko'rsatishingiz mumkin.
E'tibor bering, bitta xabar uchun qancha buyurtmalar befoyda edi. 
Robot kodidan tashqarida:
 - Jismoniy shaxslar va foydalanuvchilarning aldashlari doimiy tamponga ega bo'ladi.)
 - Fohishalik va haqorat.
 - Voyaga etganlarning kontekstlari.
 - xavotirli va ma'lumot uzatish.
 - Firibgarlik va firibgarlik operatsiyalari.
 - O'xshash robotlarning, soxta robotlarning reklamasi.
 - Hack va xakerlik, valyuta dasturlari va mualliflik huquqiga qarshi ishlarning tarqalishi.
 - Va ... ruxsatsiz.)
 ",
                'reply_to_message_id'=>$message_id,
    'reply_markup'=>json_encode([
    'inline_keyboard'=>[
    [
    ['text'=>"🏘️ Bosh menu",'callback_data'=>"home"]
    ]
    ]
    ])
            ]);
        } else {
            bot('sendmessage', [
                'chat_id'=>$chat_id, 
    'text'=>"❌Sizning tangalaringiz yetarli emas.",
            ]);
        }
    }
 elseif ($text == "50👁‍🗨 =  50💰") {
        file_put_contents("data/$chat_id/ted.txt", "45");
        $aaa = file_get_contents("data/$chat_id/ted.txt");
        $shoklt = file_get_contents("data/$chat_id/shoklat.txt");
        if ($shoklt > $aaa) {
            file_put_contents("data/$chat_id/ali.txt", "seen2");

            bot('sendmessage', [
                'chat_id' => $chat_id,
                'text' => "- Va endi tashrifingizni bu erda kengaytirishni istagan xabar oldinga!
Siz o'z e'lonlaringizni bu erda joylashtirishingiz, shuningdek, boshqa robot foydalanuvchilariga ko'rsatmoqchi bo'lgan xostlarni ko'rsatishingiz mumkin.
E'tibor bering, bitta xabar uchun qancha buyurtmalar befoyda edi. 
Robot kodidan tashqarida:
 - Jismoniy shaxslar va foydalanuvchilarning aldashlari doimiy tamponga ega bo'ladi.)
 - Fohishalik va haqorat.
 - Voyaga etganlarning kontekstlari.
 - xavotirli va ma'lumot uzatish.
 - Firibgarlik va firibgarlik operatsiyalari.
 - O'xshash robotlarning, soxta robotlarning reklamasi.
 - Hack va xakerlik, valyuta dasturlari va mualliflik huquqiga qarshi ishlarning tarqalishi.
 - Va ... ruxsatsiz.)
 ",
                'reply_to_message_id'=>$message_id,
    'reply_markup'=>json_encode([
    'inline_keyboard'=>[
    [
    ['text'=>"🏘️ Bosh menu",'callback_data'=>"home"]
    ]
    ]
    ])
            ]);
        } else {
            bot('sendmessage', [
                'chat_id'=>$chat_id,
                'text' =>"❌Sizning tangalaringiz yetarli emas.",
            ]);
        }
    } elseif ($text == "40👁‍🗨 =  40💰") {
        file_put_contents("data/$chat_id/ted.txt", "80");
        $aaa = file_get_contents("data/$chat_id/ted.txt");
        $shoklt = file_get_contents("data/$chat_id/shoklat.txt");
        if ($shoklt > $aaa) {
            file_put_contents("data/$chat_id/ali.txt", "seen2");

            bot('sendmessage', [
                'chat_id' => $chat_id,
                'text' => "- Va endi tashrifingizni bu erda kengaytirishni istagan xabar oldinga!
Siz o'z e'lonlaringizni bu erda joylashtirishingiz, shuningdek, boshqa robot foydalanuvchilariga ko'rsatmoqchi bo'lgan xostlarni ko'rsatishingiz mumkin.
E'tibor bering, bitta xabar uchun qancha buyurtmalar befoyda edi. 
Robot kodidan tashqarida:
 - Jismoniy shaxslar va foydalanuvchilarning aldashlari doimiy tamponga ega bo'ladi.)
 - Fohishalik va haqorat.
 - Voyaga etganlarning kontekstlari.
 - xavotirli va ma'lumot uzatish.
 - Firibgarlik va firibgarlik operatsiyalari.
 - O'xshash robotlarning, soxta robotlarning reklamasi.
 - Hack va xakerlik, valyuta dasturlari va mualliflik huquqiga qarshi ishlarning tarqalishi.
 - Va ... ruxsatsiz.)
 ",
                'reply_to_message_id'=>$message_id,
    'reply_markup'=>json_encode([
    'inline_keyboard'=>[
    [
    ['text'=>"🏘️ Bosh menu",'callback_data'=>"home"]
    ]
    ]
    ])
            ]);
        } else {
            bot('sendmessage', [
                'chat_id'=>$chat_id,
                'text' => "❌Sizning tangalaringiz yetarli emas.",
            ]);
        }
    } elseif ($text == "150👁‍🗨 =  150💰") {
        file_put_contents("data/$chat_id/ted.txt", "130");
        $aaa = file_get_contents("data/$chat_id/ted.txt");
        $shoklt = file_get_contents("data/$chat_id/shoklat.txt");
        if ($shoklt > $aaa) {
            file_put_contents("data/$chat_id/ali.txt", "seen2");

            bot('sendmessage', [
                'chat_id' => $chat_id,
                'text' => "- Va endi tashrifingizni bu erda kengaytirishni istagan xabar oldinga!
Siz o'z e'lonlaringizni bu erda joylashtirishingiz, shuningdek, boshqa robot foydalanuvchilariga ko'rsatmoqchi bo'lgan xostlarni ko'rsatishingiz mumkin.
E'tibor bering, bitta xabar uchun qancha buyurtmalar befoyda edi. 
Robot kodidan tashqarida:
 - Jismoniy shaxslar va foydalanuvchilarning aldashlari doimiy tamponga ega bo'ladi.)
 - Fohishalik va haqorat.
 - Voyaga etganlarning kontekstlari.
 - xavotirli va ma'lumot uzatish.
 - Firibgarlik va firibgarlik operatsiyalari.
 - O'xshash robotlarning, soxta robotlarning reklamasi.
 - Hack va xakerlik, valyuta dasturlari va mualliflik huquqiga qarshi ishlarning tarqalishi.
 - Va ... ruxsatsiz.)
 ",
                'reply_to_message_id'=>$message_id,
    'reply_markup'=>json_encode([
    'inline_keyboard'=>[
    [
    ['text'=>"🏘️ Bosh menu",'callback_data'=>"home"]
    ]
    ]
    ])
            ]);
            } else {
            bot('sendmessage', [
                'chat_id'=>$chat_id,
                'text' => "❌Sizning tangalaringiz yetarli emas.",
            ]);
        }
    } elseif ($text == "250👁‍🗨 =  250💰") {
        file_put_contents("data/$chat_id/ted.txt", "240");
        $aaa = file_get_contents("data/$chat_id/ted.txt");
        $shoklt = file_get_contents("data/$chat_id/shoklat.txt");
        if ($shoklt > $aaa) {
            file_put_contents("data/$chat_id/ali.txt", "seen2");

            bot('sendmessage', [
                'chat_id' => $chat_id,
                'text' => "-Va endi tashrifingizni bu erda kengaytirishni istagan xabar oldinga!
Siz o'z e'lonlaringizni bu erda joylashtirishingiz, shuningdek, boshqa robot foydalanuvchilariga ko'rsatmoqchi bo'lgan xostlarni ko'rsatishingiz mumkin.
E'tibor bering, bitta xabar uchun qancha buyurtmalar befoyda edi. 
Robot kodidan tashqarida:
 - Jismoniy shaxslar va foydalanuvchilarning aldashlari doimiy tamponga ega bo'ladi.)
 - Fohishalik va haqorat.
 - Voyaga etganlarning kontekstlari.
 - xavotirli va ma'lumot uzatish.
 - Firibgarlik va firibgarlik operatsiyalari.
 - O'xshash robotlarning, soxta robotlarning reklamasi.
 - Hack va xakerlik, valyuta dasturlari va mualliflik huquqiga qarshi ishlarning tarqalishi.
 - Va ... ruxsatsiz.)
 ",
                'reply_to_message_id'=>$message_id,
    'reply_markup'=>json_encode([
    'inline_keyboard'=>[
    [
    ['text'=>"🏘️ Bosh menu",'callback_data'=>"home"]
    ]
    ]
    ])
            ]);
        } else {
            bot('sendmessage', [
                'chat_id'=>$chat_id,
                'text' => "❌Sizning tangalaringiz yetarli emas.",
            ]);
        }
    } elseif ($text == "300👁‍🗨 =  300💰") {
        file_put_contents("data/$chat_id/ted.txt", "300");
        $aaa = file_get_contents("data/$chat_id/ted.txt");
        $shoklt = file_get_contents("data/$chat_id/shoklat.txt");
        if ($shoklt > $aaa) {
            file_put_contents("data/$chat_id/ali.txt", "seen2");

            bot('sendmessage', [
                'chat_id' => $chat_id,
                'text' => "- Va endi tashrifingizni bu erda kengaytirishni istagan xabar oldinga!
Siz o'z e'lonlaringizni bu erda joylashtirishingiz, shuningdek, boshqa robot foydalanuvchilariga ko'rsatmoqchi bo'lgan xostlarni ko'rsatishingiz mumkin.
E'tibor bering, bitta xabar uchun qancha buyurtmalar befoyda edi. 
Robot kodidan tashqarida:
 - Jismoniy shaxslar va foydalanuvchilarning aldashlari doimiy tamponga ega bo'ladi.)
 - Fohishalik va haqorat.
 - Voyaga etganlarning kontekstlari.
 - xavotirli va ma'lumot uzatish.
 - Firibgarlik va firibgarlik operatsiyalari.
 - O'xshash robotlarning, soxta robotlarning reklamasi.
 - Hack va xakerlik, valyuta dasturlari va mualliflik huquqiga qarshi ishlarning tarqalishi.
 - Va ... ruxsatsiz.)
 ",
                'reply_to_message_id'=>$message_id,
    'reply_markup'=>json_encode([
    'inline_keyboard'=>[
    [
    ['text'=>"🏘️ Bosh menu",'callback_data'=>"home"]
    ]
    ]
    ])
            ]);
        } else {
            bot('sendmessage', [
                'chat_id'=>$chat_id,
                'text' => "❌Sizning tangalaringiz yetarli emas.",
            ]);
        }
    } elseif ($text == "350👁‍🗨 =  350💰") {
        file_put_contents("data/$chat_id/ted.txt", "240");
        $aaa = file_get_contents("data/$chat_id/ted.txt");
        $shoklt = file_get_contents("data/$chat_id/shoklat.txt");
        if ($shoklt > $aaa) {
            file_put_contents("data/$chat_id/ali.txt", "seen2");

            bot('sendmessage', [
                'chat_id' => $chat_id,
                'text' => "-Va endi tashrifingizni bu erda kengaytirishni istagan xabar oldinga!
Siz o'z e'lonlaringizni bu erda joylashtirishingiz, shuningdek, boshqa robot foydalanuvchilariga ko'rsatmoqchi bo'lgan xostlarni ko'rsatishingiz mumkin.
E'tibor bering, bitta xabar uchun qancha buyurtmalar befoyda edi. 
Robot kodidan tashqarida:
 - Jismoniy shaxslar va foydalanuvchilarning aldashlari doimiy tamponga ega bo'ladi.)
 - Fohishalik va haqorat.
 - Voyaga etganlarning kontekstlari.
 - xavotirli va ma'lumot uzatish.
 - Firibgarlik va firibgarlik operatsiyalari.
 - O'xshash robotlarning, soxta robotlarning reklamasi.
 - Hack va xakerlik, valyuta dasturlari va mualliflik huquqiga qarshi ishlarning tarqalishi.
 - Va ... ruxsatsiz.)
 ",
                'reply_to_message_id'=>$message_id,
    'reply_markup'=>json_encode([
    'inline_keyboard'=>[
    [
    ['text'=>"🏘️ Bosh menu",'callback_data'=>"home"]
    ]
    ]
    ])
            ]);
        } else {
            bot('sendmessage', [
                'chat_id'=>$chat_id,
                'text' => "❌Sizning tangalaringiz yetarli emas.",
            ]);
        }
    } elseif ($text == "400👁‍🗨 =  400💰") {
        file_put_contents("data/$chat_id/ted.txt", "300");
        $aaa = file_get_contents("data/$chat_id/ted.txt");
        $shoklt = file_get_contents("data/$chat_id/shoklat.txt");
        if ($shoklt > $aaa) {
            file_put_contents("data/$chat_id/ali.txt", "seen2");

            bot('sendmessage', [
                'chat_id' => $chat_id,
                'text' => "- Va endi tashrifingizni bu erda kengaytirishni istagan xabar oldinga!
Siz o'z e'lonlaringizni bu erda joylashtirishingiz, shuningdek, boshqa robot foydalanuvchilariga ko'rsatmoqchi bo'lgan xostlarni ko'rsatishingiz mumkin.
E'tibor bering, bitta xabar uchun qancha buyurtmalar befoyda edi. 
Robot kodidan tashqarida:
 - Jismoniy shaxslar va foydalanuvchilarning aldashlari doimiy tamponga ega bo'ladi.)
 - Fohishalik va haqorat.
 - Voyaga etganlarning kontekstlari.
 - xavotirli va ma'lumot uzatish.
 - Firibgarlik va firibgarlik operatsiyalari.
 - O'xshash robotlarning, soxta robotlarning reklamasi.
 - Hack va xakerlik, valyuta dasturlari va mualliflik huquqiga qarshi ishlarning tarqalishi.
 - Va ... ruxsatsiz.)
 ",
                'reply_to_message_id'=>$message_id,
    'reply_markup'=>json_encode([
    'inline_keyboard'=>[
    [
    ['text'=>"🏘️ Bosh menu",'callback_data'=>"home"]
    ]
    ]
    ])
            ]);
        } else {
            bot('sendmessage', [
                'chat_id'=>$chat_id,
                'text' => "❌Sizning tangalaringiz yetarli emas.",
            ]);
        }
    }elseif ($text == "450👁‍🗨 =  450💰") {
        file_put_contents("data/$chat_id/ted.txt", "240");
        $aaa = file_get_contents("data/$chat_id/ted.txt");
        $shoklt = file_get_contents("data/$chat_id/shoklat.txt");
        if ($shoklt > $aaa) {
            file_put_contents("data/$chat_id/ali.txt", "seen2");

            bot('sendmessage', [
                'chat_id' => $chat_id,
                'text' => "-Va endi tashrifingizni bu erda kengaytirishni istagan xabar oldinga!
Siz o'z e'lonlaringizni bu erda joylashtirishingiz, shuningdek, boshqa robot foydalanuvchilariga ko'rsatmoqchi bo'lgan xostlarni ko'rsatishingiz mumkin.
E'tibor bering, bitta xabar uchun qancha buyurtmalar befoyda edi. 
Robot kodidan tashqarida:
 - Jismoniy shaxslar va foydalanuvchilarning aldashlari doimiy tamponga ega bo'ladi.)
 - Fohishalik va haqorat.
 - Voyaga etganlarning kontekstlari.
 - xavotirli va ma'lumot uzatish.
 - Firibgarlik va firibgarlik operatsiyalari.
 - O'xshash robotlarning, soxta robotlarning reklamasi.
 - Hack va xakerlik, valyuta dasturlari va mualliflik huquqiga qarshi ishlarning tarqalishi.
 - Va ... ruxsatsiz.)
 ",
                'reply_to_message_id'=>$message_id,
    'reply_markup'=>json_encode([
    'inline_keyboard'=>[
    [
    ['text'=>"🏘️ Bosh menu",'callback_data'=>"home"]
    ]
    ]
    ])
            ]);
        } else {
            bot('sendmessage', [
                'chat_id'=>$chat_id,
                'text' => "❌Sizning tangalaringiz yetarli emas.",
            ]);
        }
    } elseif ($text == "500👁‍🗨 =  500💰") {
        file_put_contents("data/$chat_id/ted.txt", "300");
        $aaa = file_get_contents("data/$chat_id/ted.txt");
        $shoklt = file_get_contents("data/$chat_id/shoklat.txt");
        if ($shoklt > $aaa) {
            file_put_contents("data/$chat_id/ali.txt", "seen2");

            bot('sendmessage', [
                'chat_id' => $chat_id,
                'text' => "- Va endi tashrifingizni bu erda kengaytirishni istagan xabar oldinga!
Siz o'z e'lonlaringizni bu erda joylashtirishingiz, shuningdek, boshqa robot foydalanuvchilariga ko'rsatmoqchi bo'lgan xostlarni ko'rsatishingiz mumkin.
E'tibor bering, bitta xabar uchun qancha buyurtmalar befoyda edi. 
Robot kodidan tashqarida:
 - Jismoniy shaxslar va foydalanuvchilarning aldashlari doimiy tamponga ega bo'ladi.)
 - Fohishalik va haqorat.
 - Voyaga etganlarning kontekstlari.
 - xavotirli va ma'lumot uzatish.
 - Firibgarlik va firibgarlik operatsiyalari.
 - O'xshash robotlarning, soxta robotlarning reklamasi.
 - Hack va xakerlik, valyuta dasturlari va mualliflik huquqiga qarshi ishlarning tarqalishi.
 - Va ... ruxsatsiz.)
 ",
                'reply_to_message_id'=>$message_id,
    'reply_markup'=>json_encode([
    'inline_keyboard'=>[
    [
    ['text'=>"🏘️ Bosh menu",'callback_data'=>"home"]
    ]
    ]
    ])
            ]);
        } else {
            bot('sendmessage', [
                'chat_id'=>$chat_id,
                'text' => "❌Sizning tangalaringiz yetarli emas.",
            ]);
        }
    }elseif ($text == "550👁‍🗨 =  550💰") {
        file_put_contents("data/$chat_id/ted.txt", "300");
        $aaa = file_get_contents("data/$chat_id/ted.txt");
        $shoklt = file_get_contents("data/$chat_id/shoklat.txt");
        if ($shoklt > $aaa) {
            file_put_contents("data/$chat_id/ali.txt", "seen2");

            bot('sendmessage', [
                'chat_id' => $chat_id,
                'text' => "- Va endi tashrifingizni bu erda kengaytirishni istagan xabar oldinga!
Siz o'z e'lonlaringizni bu erda joylashtirishingiz, shuningdek, boshqa robot foydalanuvchilariga ko'rsatmoqchi bo'lgan xostlarni ko'rsatishingiz mumkin.
E'tibor bering, bitta xabar uchun qancha buyurtmalar befoyda edi. 
Robot kodidan tashqarida:
 - Jismoniy shaxslar va foydalanuvchilarning aldashlari doimiy tamponga ega bo'ladi.)
 - Fohishalik va haqorat.
 - Voyaga etganlarning kontekstlari.
 - xavotirli va ma'lumot uzatish.
 - Firibgarlik va firibgarlik operatsiyalari.
 - O'xshash robotlarning, soxta robotlarning reklamasi.
 - Hack va xakerlik, valyuta dasturlari va mualliflik huquqiga qarshi ishlarning tarqalishi.
 - Va ... ruxsatsiz.)
 ",
                'reply_to_message_id'=>$message_id,
    'reply_markup'=>json_encode([
    'inline_keyboard'=>[
    [
    ['text'=>"🏘️ Bosh menu",'callback_data'=>"home"]
    ]
    ]
    ])
            ]);
        } else {
            bot('sendmessage', [
                'chat_id'=>$chat_id,
                'text' => "❌Sizning tangalaringiz yetarli emas.",
            ]);
        }
    }elseif ($text == "600👁‍🗨 =  600💰") {
        file_put_contents("data/$chat_id/ted.txt", "240");
        $aaa = file_get_contents("data/$chat_id/ted.txt");
        $shoklt = file_get_contents("data/$chat_id/shoklat.txt");
        if ($shoklt > $aaa) {
            file_put_contents("data/$chat_id/ali.txt", "seen2");

            bot('sendmessage', [
                'chat_id' => $chat_id,
                'text' => "-Va endi tashrifingizni bu erda kengaytirishni istagan xabar oldinga!
Siz o'z e'lonlaringizni bu erda joylashtirishingiz, shuningdek, boshqa robot foydalanuvchilariga ko'rsatmoqchi bo'lgan xostlarni ko'rsatishingiz mumkin.
E'tibor bering, bitta xabar uchun qancha buyurtmalar befoyda edi. 
Robot kodidan tashqarida:
 - Jismoniy shaxslar va foydalanuvchilarning aldashlari doimiy tamponga ega bo'ladi.)
 - Fohishalik va haqorat.
 - Voyaga etganlarning kontekstlari.
 - xavotirli va ma'lumot uzatish.
 - Firibgarlik va firibgarlik operatsiyalari.
 - O'xshash robotlarning, soxta robotlarning reklamasi.
 - Hack va xakerlik, valyuta dasturlari va mualliflik huquqiga qarshi ishlarning tarqalishi.
 - Va ... ruxsatsiz.)
 ",
                'reply_to_message_id'=>$message_id,
    'reply_markup'=>json_encode([
    'inline_keyboard'=>[
    [
    ['text'=>"🏘️ Bosh menu",'callback_data'=>"home"]
    ]
    ]
    ])
            ]);
        } else {
            bot('sendmessage', [
                'chat_id'=>$chat_id,
                'text' => "❌Sizning tangalaringiz yetarli emas.",
            ]);
        }
    } elseif ($text == "650👁‍🗨 =  650💰") {
        file_put_contents("data/$chat_id/ted.txt", "300");
        $aaa = file_get_contents("data/$chat_id/ted.txt");
        $shoklt = file_get_contents("data/$chat_id/shoklat.txt");
        if ($shoklt > $aaa) {
            file_put_contents("data/$chat_id/ali.txt", "seen2");

            bot('sendmessage', [
                'chat_id' => $chat_id,
                'text' => "- Va endi tashrifingizni bu erda kengaytirishni istagan xabar oldinga!
Siz o'z e'lonlaringizni bu erda joylashtirishingiz, shuningdek, boshqa robot foydalanuvchilariga ko'rsatmoqchi bo'lgan xostlarni ko'rsatishingiz mumkin.
E'tibor bering, bitta xabar uchun qancha buyurtmalar befoyda edi. 
Robot kodidan tashqarida:
 - Jismoniy shaxslar va foydalanuvchilarning aldashlari doimiy tamponga ega bo'ladi.)
 - Fohishalik va haqorat.
 - Voyaga etganlarning kontekstlari.
 - xavotirli va ma'lumot uzatish.
 - Firibgarlik va firibgarlik operatsiyalari.
 - O'xshash robotlarning, soxta robotlarning reklamasi.
 - Hack va xakerlik, valyuta dasturlari va mualliflik huquqiga qarshi ishlarning tarqalishi.
 - Va ... ruxsatsiz.)
 ",
                'reply_to_message_id'=>$message_id,
    'reply_markup'=>json_encode([
    'inline_keyboard'=>[
    [
    ['text'=>"🏘️ Bosh menu",'callback_data'=>"home"]
    ]
    ]
    ])
            ]);
        } else {
            bot('sendmessage', [
                'chat_id'=>$chat_id,
                'text' => "❌Sizning tangalaringiz yetarli emas.",
            ]);
        }
     }elseif ($text == "700👁‍🗨 =  700💰") {
        file_put_contents("data/$chat_id/ted.txt", "300");
        $aaa = file_get_contents("data/$chat_id/ted.txt");
        $shoklt = file_get_contents("data/$chat_id/shoklat.txt");
        if ($shoklt > $aaa) {
            file_put_contents("data/$chat_id/ali.txt", "seen2");

            bot('sendmessage', [
                'chat_id' => $chat_id,
                'text' => "- Va endi tashrifingizni bu erda kengaytirishni istagan xabar oldinga!
Siz o'z e'lonlaringizni bu erda joylashtirishingiz, shuningdek, boshqa robot foydalanuvchilariga ko'rsatmoqchi bo'lgan xostlarni ko'rsatishingiz mumkin.
E'tibor bering, bitta xabar uchun qancha buyurtmalar befoyda edi. 
Robot kodidan tashqarida:
 - Jismoniy shaxslar va foydalanuvchilarning aldashlari doimiy tamponga ega bo'ladi.)
 - Fohishalik va haqorat.
 - Voyaga etganlarning kontekstlari.
 - xavotirli va ma'lumot uzatish.
 - Firibgarlik va firibgarlik operatsiyalari.
 - O'xshash robotlarning, soxta robotlarning reklamasi.
 - Hack va xakerlik, valyuta dasturlari va mualliflik huquqiga qarshi ishlarning tarqalishi.
 - Va ... ruxsatsiz.)
 ",
                'reply_to_message_id'=>$message_id,
    'reply_markup'=>json_encode([
    'inline_keyboard'=>[
    [
    ['text'=>"🏘️ Bosh menu",'callback_data'=>"home"]
    ]
    ]
    ])
            ]);
        } else {
            bot('sendmessage', [
                'chat_id'=>$chat_id,
                'text' => "❌Sizning tangalaringiz yetarli emas.",
            ]);
        }
    }elseif ($text == "750👁‍🗨 =  750💰") {
        file_put_contents("data/$chat_id/ted.txt", "240");
        $aaa = file_get_contents("data/$chat_id/ted.txt");
        $shoklt = file_get_contents("data/$chat_id/shoklat.txt");
        if ($shoklt > $aaa) {
            file_put_contents("data/$chat_id/ali.txt", "seen2");

            bot('sendmessage', [
                'chat_id' => $chat_id,
                'text' => "-Va endi tashrifingizni bu erda kengaytirishni istagan xabar oldinga!
Siz o'z e'lonlaringizni bu erda joylashtirishingiz, shuningdek, boshqa robot foydalanuvchilariga ko'rsatmoqchi bo'lgan xostlarni ko'rsatishingiz mumkin.
E'tibor bering, bitta xabar uchun qancha buyurtmalar befoyda edi. 
Robot kodidan tashqarida:
 - Jismoniy shaxslar va foydalanuvchilarning aldashlari doimiy tamponga ega bo'ladi.)
 - Fohishalik va haqorat.
 - Voyaga etganlarning kontekstlari.
 - xavotirli va ma'lumot uzatish.
 - Firibgarlik va firibgarlik operatsiyalari.
 - O'xshash robotlarning, soxta robotlarning reklamasi.
 - Hack va xakerlik, valyuta dasturlari va mualliflik huquqiga qarshi ishlarning tarqalishi.
 - Va ... ruxsatsiz.)
 ",
                'reply_to_message_id'=>$message_id,
    'reply_markup'=>json_encode([
    'inline_keyboard'=>[
    [
    ['text'=>"🏘️ Bosh menu",'callback_data'=>"home"]
    ]
    ]
    ])
            ]);
        } else {
            bot('sendmessage', [
                'chat_id'=>$chat_id,
                'text' => "❌Sizning tangalaringiz yetarli emas.",
            ]);
        }
    } elseif ($text == "800👁‍🗨 =  800💰") {
        file_put_contents("data/$chat_id/ted.txt", "300");
        $aaa = file_get_contents("data/$chat_id/ted.txt");
        $shoklt = file_get_contents("data/$chat_id/shoklat.txt");
        if ($shoklt > $aaa) {
            file_put_contents("data/$chat_id/ali.txt", "seen2");

            bot('sendmessage', [
                'chat_id' => $chat_id,
                'text' => "- Va endi tashrifingizni bu erda kengaytirishni istagan xabar oldinga!
Siz o'z e'lonlaringizni bu erda joylashtirishingiz, shuningdek, boshqa robot foydalanuvchilariga ko'rsatmoqchi bo'lgan xostlarni ko'rsatishingiz mumkin.
E'tibor bering, bitta xabar uchun qancha buyurtmalar befoyda edi. 
Robot kodidan tashqarida:
 - Jismoniy shaxslar va foydalanuvchilarning aldashlari doimiy tamponga ega bo'ladi.)
 - Fohishalik va haqorat.
 - Voyaga etganlarning kontekstlari.
 - xavotirli va ma'lumot uzatish.
 - Firibgarlik va firibgarlik operatsiyalari.
 - O'xshash robotlarning, soxta robotlarning reklamasi.
 - Hack va xakerlik, valyuta dasturlari va mualliflik huquqiga qarshi ishlarning tarqalishi.
 - Va ... ruxsatsiz.)
 ",
                'reply_to_message_id'=>$message_id,
    'reply_markup'=>json_encode([
    'inline_keyboard'=>[
    [
    ['text'=>"🏘️ Bosh menu",'callback_data'=>"home"]
    ]
    ]
    ])
            ]);
        } else {
            bot('sendmessage', [
                'chat_id'=>$chat_id,
                'text' => "❌Sizning tangalaringiz yetarli emas.",
            ]);
        }
     }elseif ($text == "850👁‍🗨 =  850💰") {
        file_put_contents("data/$chat_id/ted.txt", "300");
        $aaa = file_get_contents("data/$chat_id/ted.txt");
        $shoklt = file_get_contents("data/$chat_id/shoklat.txt");
        if ($shoklt > $aaa) {
            file_put_contents("data/$chat_id/ali.txt", "seen2");

            bot('sendmessage', [
                'chat_id' => $chat_id,
                'text' => "- Va endi tashrifingizni bu erda kengaytirishni istagan xabar oldinga!
Siz o'z e'lonlaringizni bu erda joylashtirishingiz, shuningdek, boshqa robot foydalanuvchilariga ko'rsatmoqchi bo'lgan xostlarni ko'rsatishingiz mumkin.
E'tibor bering, bitta xabar uchun qancha buyurtmalar befoyda edi. 
Robot kodidan tashqarida:
 - Jismoniy shaxslar va foydalanuvchilarning aldashlari doimiy tamponga ega bo'ladi.)
 - Fohishalik va haqorat.
 - Voyaga etganlarning kontekstlari.
 - xavotirli va ma'lumot uzatish.
 - Firibgarlik va firibgarlik operatsiyalari.
 - O'xshash robotlarning, soxta robotlarning reklamasi.
 - Hack va xakerlik, valyuta dasturlari va mualliflik huquqiga qarshi ishlarning tarqalishi.
 - Va ... ruxsatsiz.)
 ",
                'reply_to_message_id'=>$message_id,
    'reply_markup'=>json_encode([
    'inline_keyboard'=>[
    [
    ['text'=>"🏘️ Bosh menu",'callback_data'=>"home"]
    ]
    ]
    ])
            ]);
        } else {
            bot('sendmessage', [
                'chat_id'=>$chat_id,
                'text' => "❌Sizning tangalaringiz yetarli emas.",
            ]);
        }
    }elseif ($text == "900👁‍🗨 =  900💰") {
        file_put_contents("data/$chat_id/ted.txt", "240");
        $aaa = file_get_contents("data/$chat_id/ted.txt");
        $shoklt = file_get_contents("data/$chat_id/shoklat.txt");
        if ($shoklt > $aaa) {
            file_put_contents("data/$chat_id/ali.txt", "seen2");

            bot('sendmessage', [
                'chat_id' => $chat_id,
                'text' => "-Va endi tashrifingizni bu erda kengaytirishni istagan xabar oldinga!
Siz o'z e'lonlaringizni bu erda joylashtirishingiz, shuningdek, boshqa robot foydalanuvchilariga ko'rsatmoqchi bo'lgan xostlarni ko'rsatishingiz mumkin.
E'tibor bering, bitta xabar uchun qancha buyurtmalar befoyda edi. 
Robot kodidan tashqarida:
 - Jismoniy shaxslar va foydalanuvchilarning aldashlari doimiy tamponga ega bo'ladi.)
 - Fohishalik va haqorat.
 - Voyaga etganlarning kontekstlari.
 - xavotirli va ma'lumot uzatish.
 - Firibgarlik va firibgarlik operatsiyalari.
 - O'xshash robotlarning, soxta robotlarning reklamasi.
 - Hack va xakerlik, valyuta dasturlari va mualliflik huquqiga qarshi ishlarning tarqalishi.
 - Va ... ruxsatsiz.)
 ",
                'reply_to_message_id'=>$message_id,
    'reply_markup'=>json_encode([
    'inline_keyboard'=>[
    [
    ['text'=>"🏘️ Bosh menu",'callback_data'=>"home"]
    ]
    ]
    ])
            ]);
        } else {
            bot('sendmessage', [
                'chat_id'=>$chat_id,
                'text' => "❌Sizning tangalaringiz yetarli emas.",
            ]);
        }
    } elseif ($text == "1000👁‍🗨 =  1000💰") {
        file_put_contents("data/$chat_id/ted.txt", "300");
        $aaa = file_get_contents("data/$chat_id/ted.txt");
        $shoklt = file_get_contents("data/$chat_id/shoklat.txt");
        if ($shoklt > $aaa) {
            file_put_contents("data/$chat_id/ali.txt", "seen2");

            bot('sendmessage', [
                'chat_id' => $chat_id,
                'text' => "- Va endi tashrifingizni bu erda kengaytirishni istagan xabar oldinga!
Siz o'z e'lonlaringizni bu erda joylashtirishingiz, shuningdek, boshqa robot foydalanuvchilariga ko'rsatmoqchi bo'lgan xostlarni ko'rsatishingiz mumkin.
E'tibor bering, bitta xabar uchun qancha buyurtmalar befoyda edi. 
Robot kodidan tashqarida:
 - Jismoniy shaxslar va foydalanuvchilarning aldashlari doimiy tamponga ega bo'ladi.)
 - Fohishalik va haqorat.
 - Voyaga etganlarning kontekstlari.
 - xavotirli va ma'lumot uzatish.
 - Firibgarlik va firibgarlik operatsiyalari.
 - O'xshash robotlarning, soxta robotlarning reklamasi.
 - Hack va xakerlik, valyuta dasturlari va mualliflik huquqiga qarshi ishlarning tarqalishi.
 - Va ... ruxsatsiz.)
 ",
                'reply_to_message_id'=>$message_id,
    'reply_markup'=>json_encode([
    'inline_keyboard'=>[
    [
    ['text'=>"🏘️ Bosh menu",'callback_data'=>"home"]
    ]
    ]
    ])
            ]);
        } else {
            bot('sendmessage', [
                'chat_id'=>$chat_id,
                'text' => "❌Sizning tangalaringiz yetarli emas.",
            ]);
        }
     }elseif ($text == "1500👁‍🗨 =  1500💰") {
        file_put_contents("data/$chat_id/ted.txt", "300");
        $aaa = file_get_contents("data/$chat_id/ted.txt");
        $shoklt = file_get_contents("data/$chat_id/shoklat.txt");
        if ($shoklt > $aaa) {
            file_put_contents("data/$chat_id/ali.txt", "seen2");

            bot('sendmessage', [
                'chat_id' => $chat_id,
                'text' => "- Va endi tashrifingizni bu erda kengaytirishni istagan xabar oldinga!
Siz o'z e'lonlaringizni bu erda joylashtirishingiz, shuningdek, boshqa robot foydalanuvchilariga ko'rsatmoqchi bo'lgan xostlarni ko'rsatishingiz mumkin.
E'tibor bering, bitta xabar uchun qancha buyurtmalar befoyda edi. 
Robot kodidan tashqarida:
 - Jismoniy shaxslar va foydalanuvchilarning aldashlari doimiy tamponga ega bo'ladi.)
 - Fohishalik va haqorat.
 - Voyaga etganlarning kontekstlari.
 - xavotirli va ma'lumot uzatish.
 - Firibgarlik va firibgarlik operatsiyalari.
 - O'xshash robotlarning, soxta robotlarning reklamasi.
 - Hack va xakerlik, valyuta dasturlari va mualliflik huquqiga qarshi ishlarning tarqalishi.
 - Va ... ruxsatsiz.)
 ",
                'reply_to_message_id'=>$message_id,
    'reply_markup'=>json_encode([
    'inline_keyboard'=>[
    [
    ['text'=>"🏘️ Bosh menu",'callback_data'=>"home"]
    ]
    ]
    ])
            ]);
        } else {
            bot('sendmessage', [
                'chat_id'=>$chat_id,
                'text' => "❌Sizning tangalaringiz yetarli emas.",
            ]);
        }
      }elseif ($text == "800👁‍🗨 =  800💰") {
        file_put_contents("data/$chat_id/ted.txt", "300");
        $aaa = file_get_contents("data/$chat_id/ted.txt");
        $shoklt = file_get_contents("data/$chat_id/shoklat.txt");
        if ($shoklt > $aaa) {
            file_put_contents("data/$chat_id/ali.txt", "seen2");

            bot('sendmessage', [
                'chat_id' => $chat_id,
                'text' => "- Va endi tashrifingizni bu erda kengaytirishni istagan xabar oldinga!
Siz o'z e'lonlaringizni bu erda joylashtirishingiz, shuningdek, boshqa robot foydalanuvchilariga ko'rsatmoqchi bo'lgan xostlarni ko'rsatishingiz mumkin.
E'tibor bering, bitta xabar uchun qancha buyurtmalar befoyda edi. 
Robot kodidan tashqarida:
 - Jismoniy shaxslar va foydalanuvchilarning aldashlari doimiy tamponga ega bo'ladi.)
 - Fohishalik va haqorat.
 - Voyaga etganlarning kontekstlari.
 - xavotirli va ma'lumot uzatish.
 - Firibgarlik va firibgarlik operatsiyalari.
 - O'xshash robotlarning, soxta robotlarning reklamasi.
 - Hack va xakerlik, valyuta dasturlari va mualliflik huquqiga qarshi ishlarning tarqalishi.
 - Va ... ruxsatsiz.)
 ",
                'reply_to_message_id'=>$message_id,
    'reply_markup'=>json_encode([
    'inline_keyboard'=>[
    [
    ['text'=>"🏘️ Bosh menu",'callback_data'=>"home"]
    ]
    ]
    ])
            ]);
        } else {
            bot('sendmessage', [
                'chat_id'=>$chat_id,
                'text' => "❌Sizning tangalaringiz yetarli emas.",
            ]);
        }
     }elseif ($text == "850👁‍🗨 =  850💰") {
        file_put_contents("data/$chat_id/ted.txt", "300");
        $aaa = file_get_contents("data/$chat_id/ted.txt");
        $shoklt = file_get_contents("data/$chat_id/shoklat.txt");
        if ($shoklt > $aaa) {
            file_put_contents("data/$chat_id/ali.txt", "seen2");

            bot('sendmessage', [
                'chat_id' => $chat_id,
                'text' => "- Va endi tashrifingizni bu erda kengaytirishni istagan xabar oldinga!
Siz o'z e'lonlaringizni bu erda joylashtirishingiz, shuningdek, boshqa robot foydalanuvchilariga ko'rsatmoqchi bo'lgan xostlarni ko'rsatishingiz mumkin.
E'tibor bering, bitta xabar uchun qancha buyurtmalar befoyda edi. 
Robot kodidan tashqarida:
 - Jismoniy shaxslar va foydalanuvchilarning aldashlari doimiy tamponga ega bo'ladi.)
 - Fohishalik va haqorat.
 - Voyaga etganlarning kontekstlari.
 - xavotirli va ma'lumot uzatish.
 - Firibgarlik va firibgarlik operatsiyalari.
 - O'xshash robotlarning, soxta robotlarning reklamasi.
 - Hack va xakerlik, valyuta dasturlari va mualliflik huquqiga qarshi ishlarning tarqalishi.
 - Va ... ruxsatsiz.)
 ",
                'reply_to_message_id'=>$message_id,
    'reply_markup'=>json_encode([
    'inline_keyboard'=>[
    [
    ['text'=>"🏘️ Bosh menu",'callback_data'=>"home"]
    ]
    ]
    ])
            ]);
        } else {
            bot('sendmessage', [
                'chat_id'=>$chat_id,
                'text' => "❌Sizning tangalaringiz yetarli emas.",
            ]);
        }
    }elseif ($text == "900👁‍🗨 =  900💰") {
        file_put_contents("data/$chat_id/ted.txt", "240");
        $aaa = file_get_contents("data/$chat_id/ted.txt");
        $shoklt = file_get_contents("data/$chat_id/shoklat.txt");
        if ($shoklt > $aaa) {
            file_put_contents("data/$chat_id/ali.txt", "seen2");

            bot('sendmessage', [
                'chat_id' => $chat_id,
                'text' => "-Va endi tashrifingizni bu erda kengaytirishni istagan xabar oldinga!
Siz o'z e'lonlaringizni bu erda joylashtirishingiz, shuningdek, boshqa robot foydalanuvchilariga ko'rsatmoqchi bo'lgan xostlarni ko'rsatishingiz mumkin.
E'tibor bering, bitta xabar uchun qancha buyurtmalar befoyda edi. 
Robot kodidan tashqarida:
 - Jismoniy shaxslar va foydalanuvchilarning aldashlari doimiy tamponga ega bo'ladi.)
 - Fohishalik va haqorat.
 - Voyaga etganlarning kontekstlari.
 - xavotirli va ma'lumot uzatish.
 - Firibgarlik va firibgarlik operatsiyalari.
 - O'xshash robotlarning, soxta robotlarning reklamasi.
 - Hack va xakerlik, valyuta dasturlari va mualliflik huquqiga qarshi ishlarning tarqalishi.
 - Va ... ruxsatsiz.)
 ",
                'reply_to_message_id'=>$message_id,
    'reply_markup'=>json_encode([
    'inline_keyboard'=>[
    [
    ['text'=>"🏘️ Bosh menu",'callback_data'=>"home"]
    ]
    ]
    ])
            ]);
        } else {
            bot('sendmessage', [
                'chat_id'=>$chat_id,
                'text' => "❌Sizning tangalaringiz yetarli emas.",
            ]);
        }
    } elseif ($text == "1000👁‍🗨 =  1000💰") {
        file_put_contents("data/$chat_id/ted.txt", "300");
        $aaa = file_get_contents("data/$chat_id/ted.txt");
        $shoklt = file_get_contents("data/$chat_id/shoklat.txt");
        if ($shoklt > $aaa) {
            file_put_contents("data/$chat_id/ali.txt", "seen2");

            bot('sendmessage', [
                'chat_id' => $chat_id,
                'text' => "- Va endi tashrifingizni bu erda kengaytirishni istagan xabar oldinga!
Siz o'z e'lonlaringizni bu erda joylashtirishingiz, shuningdek, boshqa robot foydalanuvchilariga ko'rsatmoqchi bo'lgan xostlarni ko'rsatishingiz mumkin.
E'tibor bering, bitta xabar uchun qancha buyurtmalar befoyda edi. 
Robot kodidan tashqarida:
 - Jismoniy shaxslar va foydalanuvchilarning aldashlari doimiy tamponga ega bo'ladi.)
 - Fohishalik va haqorat.
 - Voyaga etganlarning kontekstlari.
 - xavotirli va ma'lumot uzatish.
 - Firibgarlik va firibgarlik operatsiyalari.
 - O'xshash robotlarning, soxta robotlarning reklamasi.
 - Hack va xakerlik, valyuta dasturlari va mualliflik huquqiga qarshi ishlarning tarqalishi.
 - Va ... ruxsatsiz.)
 ",
                'reply_to_message_id'=>$message_id,
    'reply_markup'=>json_encode([
    'inline_keyboard'=>[
    [
    ['text'=>"🏘️ Bosh menu",'callback_data'=>"home"]
    ]
    ]
    ])
            ]);
        } else {
            bot('sendmessage', [
                'chat_id'=>$chat_id,
                'text' => "❌Sizning tangalaringiz yetarli emas.",
            ]);
        }
     }elseif ($text == "1500👁‍🗨 =  1500💰") {
        file_put_contents("data/$chat_id/ted.txt", "300");
        $aaa = file_get_contents("data/$chat_id/ted.txt");
        $shoklt = file_get_contents("data/$chat_id/shoklat.txt");
        if ($shoklt > $aaa) {
            file_put_contents("data/$chat_id/ali.txt", "seen2");

            bot('sendmessage', [
                'chat_id' => $chat_id,
                'text' => "- Va endi tashrifingizni bu erda kengaytirishni istagan xabar oldinga!
Siz o'z e'lonlaringizni bu erda joylashtirishingiz, shuningdek, boshqa robot foydalanuvchilariga ko'rsatmoqchi bo'lgan xostlarni ko'rsatishingiz mumkin.
E'tibor bering, bitta xabar uchun qancha buyurtmalar befoyda edi. 
Robot kodidan tashqarida:
 - Jismoniy shaxslar va foydalanuvchilarning aldashlari doimiy tamponga ega bo'ladi.)
 - Fohishalik va haqorat.
 - Voyaga etganlarning kontekstlari.
 - xavotirli va ma'lumot uzatish.
 - Firibgarlik va firibgarlik operatsiyalari.
 - O'xshash robotlarning, soxta robotlarning reklamasi.
 - Hack va xakerlik, valyuta dasturlari va mualliflik huquqiga qarshi ishlarning tarqalishi.
 - Va ... ruxsatsiz.)
 ",
                'reply_to_message_id'=>$message_id,
    'reply_markup'=>json_encode([
    'inline_keyboard'=>[
    [
    ['text'=>"🏘️ Bosh menu",'callback_data'=>"home"]
    ]
    ]
    ])
            ]);
        } else {
            bot('sendmessage', [
                'chat_id'=>$chat_id,
                'text' => "❌Sizning tangalaringiz yetarli emas.",
            ]);
        }
     }elseif ($text == "2000👁‍🗨 =  2000💰") {
        file_put_contents("data/$chat_id/ted.txt", "300");
        $aaa = file_get_contents("data/$chat_id/ted.txt");
        $shoklt = file_get_contents("data/$chat_id/shoklat.txt");
        if ($shoklt > $aaa) {
            file_put_contents("data/$chat_id/ali.txt", "seen2");

            bot('sendmessage', [
                'chat_id' => $chat_id,
                'text' => "- Va endi tashrifingizni bu erda kengaytirishni istagan xabar oldinga!
Siz o'z e'lonlaringizni bu erda joylashtirishingiz, shuningdek, boshqa robot foydalanuvchilariga ko'rsatmoqchi bo'lgan xostlarni ko'rsatishingiz mumkin.
E'tibor bering, bitta xabar uchun qancha buyurtmalar befoyda edi. 
Robot kodidan tashqarida:
 - Jismoniy shaxslar va foydalanuvchilarning aldashlari doimiy tamponga ega bo'ladi.)
 - Fohishalik va haqorat.
 - Voyaga etganlarning kontekstlari.
 - xavotirli va ma'lumot uzatish.
 - Firibgarlik va firibgarlik operatsiyalari.
 - O'xshash robotlarning, soxta robotlarning reklamasi.
 - Hack va xakerlik, valyuta dasturlari va mualliflik huquqiga qarshi ishlarning tarqalishi.
 - Va ... ruxsatsiz.)
 ",
                'reply_to_message_id'=>$message_id,
    'reply_markup'=>json_encode([
    'inline_keyboard'=>[
    [
    ['text'=>"🏘️ Bosh menu",'callback_data'=>"home"]
    ]
    ]
    ])
            ]);
        } else {
            bot('sendmessage', [
                'chat_id'=>$chat_id,
                'text' => "❌Sizning tangalaringiz yetarli emas.",
            ]);
        }
     }elseif ($text == "2500👁‍🗨 =  2500💰") {
        file_put_contents("data/$chat_id/ted.txt", "300");
        $aaa = file_get_contents("data/$chat_id/ted.txt");
        $shoklt = file_get_contents("data/$chat_id/shoklat.txt");
        if ($shoklt > $aaa) {
            file_put_contents("data/$chat_id/ali.txt", "seen2");

            bot('sendmessage', [
                'chat_id' => $chat_id,
                'text' => "- Va endi tashrifingizni bu erda kengaytirishni istagan xabar oldinga!
Siz o'z e'lonlaringizni bu erda joylashtirishingiz, shuningdek, boshqa robot foydalanuvchilariga ko'rsatmoqchi bo'lgan xostlarni ko'rsatishingiz mumkin.
E'tibor bering, bitta xabar uchun qancha buyurtmalar befoyda edi. 
Robot kodidan tashqarida:
 - Jismoniy shaxslar va foydalanuvchilarning aldashlari doimiy tamponga ega bo'ladi.)
 - Fohishalik va haqorat.
 - Voyaga etganlarning kontekstlari.
 - xavotirli va ma'lumot uzatish.
 - Firibgarlik va firibgarlik operatsiyalari.
 - O'xshash robotlarning, soxta robotlarning reklamasi.
 - Hack va xakerlik, valyuta dasturlari va mualliflik huquqiga qarshi ishlarning tarqalishi.
 - Va ... ruxsatsiz.)
 ",
                'reply_to_message_id'=>$message_id,
    'reply_markup'=>json_encode([
    'inline_keyboard'=>[
    [
    ['text'=>"🏘️ Bosh menu",'callback_data'=>"home"]
    ]
    ]
    ])
            ]);
        } else {
            bot('sendmessage', [
                'chat_id'=>$chat_id,
                'text' => "❌Sizning tangalaringiz yetarli emas.",
            ]);
        }
    }elseif ($text == "3000👁‍🗨 =  3000💰") {
        file_put_contents("data/$chat_id/ted.txt", "240");
        $aaa = file_get_contents("data/$chat_id/ted.txt");
        $shoklt = file_get_contents("data/$chat_id/shoklat.txt");
        if ($shoklt > $aaa) {
            file_put_contents("data/$chat_id/ali.txt", "seen2");

            bot('sendmessage', [
                'chat_id' => $chat_id,
                'text' => "-Va endi tashrifingizni bu erda kengaytirishni istagan xabar oldinga!
Siz o'z e'lonlaringizni bu erda joylashtirishingiz, shuningdek, boshqa robot foydalanuvchilariga ko'rsatmoqchi bo'lgan xostlarni ko'rsatishingiz mumkin.
E'tibor bering, bitta xabar uchun qancha buyurtmalar befoyda edi. 
Robot kodidan tashqarida:
 - Jismoniy shaxslar va foydalanuvchilarning aldashlari doimiy tamponga ega bo'ladi.)
 - Fohishalik va haqorat.
 - Voyaga etganlarning kontekstlari.
 - xavotirli va ma'lumot uzatish.
 - Firibgarlik va firibgarlik operatsiyalari.
 - O'xshash robotlarning, soxta robotlarning reklamasi.
 - Hack va xakerlik, valyuta dasturlari va mualliflik huquqiga qarshi ishlarning tarqalishi.
 - Va ... ruxsatsiz.)
 ",
                'reply_to_message_id'=>$message_id,
    'reply_markup'=>json_encode([
    'inline_keyboard'=>[
    [
    ['text'=>"🏘️ Bosh menu",'callback_data'=>"home"]
    ]
    ]
    ])
            ]);
        } else {
            bot('sendmessage', [
                'chat_id'=>$chat_id,
                'text' => "❌Sizning tangalaringiz yetarli emas.",
            ]);
        }
    } elseif ($text == "4000👁‍🗨 =  4000💰") {
        file_put_contents("data/$chat_id/ted.txt", "300");
        $aaa = file_get_contents("data/$chat_id/ted.txt");
        $shoklt = file_get_contents("data/$chat_id/shoklat.txt");
        if ($shoklt > $aaa) {
            file_put_contents("data/$chat_id/ali.txt", "seen2");

            bot('sendmessage', [
                'chat_id' => $chat_id,
                'text' => "- Va endi tashrifingizni bu erda kengaytirishni istagan xabar oldinga!
Siz o'z e'lonlaringizni bu erda joylashtirishingiz, shuningdek, boshqa robot foydalanuvchilariga ko'rsatmoqchi bo'lgan xostlarni ko'rsatishingiz mumkin.
E'tibor bering, bitta xabar uchun qancha buyurtmalar befoyda edi. 
Robot kodidan tashqarida:
 - Jismoniy shaxslar va foydalanuvchilarning aldashlari doimiy tamponga ega bo'ladi.)
 - Fohishalik va haqorat.
 - Voyaga etganlarning kontekstlari.
 - xavotirli va ma'lumot uzatish.
 - Firibgarlik va firibgarlik operatsiyalari.
 - O'xshash robotlarning, soxta robotlarning reklamasi.
 - Hack va xakerlik, valyuta dasturlari va mualliflik huquqiga qarshi ishlarning tarqalishi.
 - Va ... ruxsatsiz.)
 ",
                'reply_to_message_id'=>$message_id,
    'reply_markup'=>json_encode([
    'inline_keyboard'=>[
    [
    ['text'=>"🏘️ Bosh menu",'callback_data'=>"home"]
    ]
    ]
    ])
            ]);
        } else {
            bot('sendmessage', [
                'chat_id'=>$chat_id,
                'text' => "❌Sizning tangalaringiz yetarli emas.",
            ]);
        }
     }elseif ($text == "5000👁‍🗨 =  5000💰") {
        file_put_contents("data/$chat_id/ted.txt", "300");
        $aaa = file_get_contents("data/$chat_id/ted.txt");
        $shoklt = file_get_contents("data/$chat_id/shoklat.txt");
        if ($shoklt > $aaa) {
            file_put_contents("data/$chat_id/ali.txt", "seen2");

            bot('sendmessage', [
                'chat_id' => $chat_id,
                'text' => "- Va endi tashrifingizni bu erda kengaytirishni istagan xabar oldinga!
Siz o'z e'lonlaringizni bu erda joylashtirishingiz, shuningdek, boshqa robot foydalanuvchilariga ko'rsatmoqchi bo'lgan xostlarni ko'rsatishingiz mumkin.
E'tibor bering, bitta xabar uchun qancha buyurtmalar befoyda edi. 
Robot kodidan tashqarida:
 - Jismoniy shaxslar va foydalanuvchilarning aldashlari doimiy tamponga ega bo'ladi.)
 - Fohishalik va haqorat.
 - Voyaga etganlarning kontekstlari.
 - xavotirli va ma'lumot uzatish.
 - Firibgarlik va firibgarlik operatsiyalari.
 - O'xshash robotlarning, soxta robotlarning reklamasi.
 - Hack va xakerlik, valyuta dasturlari va mualliflik huquqiga qarshi ishlarning tarqalishi.
 - Va ... ruxsatsiz.)
 ",
                'reply_to_message_id'=>$message_id,
    'reply_markup'=>json_encode([
    'inline_keyboard'=>[
    [
    ['text'=>"🏘️ Bosh menu",'callback_data'=>"home"]
    ]
    ]
    ])
            ]);
        } else {
            bot('sendmessage', [
                'chat_id'=>$chat_id,
                'text' => "❌Sizning tangalaringiz yetarli emas.",
            ]);
        }
      }elseif ($text == "6000👁‍🗨 =  6000💰") {
        file_put_contents("data/$chat_id/ted.txt", "300");
        $aaa = file_get_contents("data/$chat_id/ted.txt");
        $shoklt = file_get_contents("data/$chat_id/shoklat.txt");
        if ($shoklt > $aaa) {
            file_put_contents("data/$chat_id/ali.txt", "seen2");

            bot('sendmessage', [
                'chat_id' => $chat_id,
                'text' => "- Va endi tashrifingizni bu erda kengaytirishni istagan xabar oldinga!
Siz o'z e'lonlaringizni bu erda joylashtirishingiz, shuningdek, boshqa robot foydalanuvchilariga ko'rsatmoqchi bo'lgan xostlarni ko'rsatishingiz mumkin.
E'tibor bering, bitta xabar uchun qancha buyurtmalar befoyda edi. 
Robot kodidan tashqarida:
 - Jismoniy shaxslar va foydalanuvchilarning aldashlari doimiy tamponga ega bo'ladi.)
 - Fohishalik va haqorat.
 - Voyaga etganlarning kontekstlari.
 - xavotirli va ma'lumot uzatish.
 - Firibgarlik va firibgarlik operatsiyalari.
 - O'xshash robotlarning, soxta robotlarning reklamasi.
 - Hack va xakerlik, valyuta dasturlari va mualliflik huquqiga qarshi ishlarning tarqalishi.
 - Va ... ruxsatsiz.)
 ",
                'reply_to_message_id'=>$message_id,
    'reply_markup'=>json_encode([
    'inline_keyboard'=>[
    [
    ['text'=>"🏘️ Bosh menu",'callback_data'=>"home"]
    ]
    ]
    ])
            ]);
        } else {
            bot('sendmessage', [
                'chat_id'=>$chat_id,
                'text' => "❌Sizning tangalaringiz yetarli emas.",
            ]);
        }
     }elseif ($text == "7000👁‍🗨 =  7000💰") {
        file_put_contents("data/$chat_id/ted.txt", "300");
        $aaa = file_get_contents("data/$chat_id/ted.txt");
        $shoklt = file_get_contents("data/$chat_id/shoklat.txt");
        if ($shoklt > $aaa) {
            file_put_contents("data/$chat_id/ali.txt", "seen2");

            bot('sendmessage', [
                'chat_id' => $chat_id,
                'text' => "- Va endi tashrifingizni bu erda kengaytirishni istagan xabar oldinga!
Siz o'z e'lonlaringizni bu erda joylashtirishingiz, shuningdek, boshqa robot foydalanuvchilariga ko'rsatmoqchi bo'lgan xostlarni ko'rsatishingiz mumkin.
E'tibor bering, bitta xabar uchun qancha buyurtmalar befoyda edi. 
Robot kodidan tashqarida:
 - Jismoniy shaxslar va foydalanuvchilarning aldashlari doimiy tamponga ega bo'ladi.)
 - Fohishalik va haqorat.
 - Voyaga etganlarning kontekstlari.
 - xavotirli va ma'lumot uzatish.
 - Firibgarlik va firibgarlik operatsiyalari.
 - O'xshash robotlarning, soxta robotlarning reklamasi.
 - Hack va xakerlik, valyuta dasturlari va mualliflik huquqiga qarshi ishlarning tarqalishi.
 - Va ... ruxsatsiz.)
 ",
                'reply_to_message_id'=>$message_id,
    'reply_markup'=>json_encode([
    'inline_keyboard'=>[
    [
    ['text'=>"🏘️ Bosh menu",'callback_data'=>"home"]
    ]
    ]
    ])
            ]);
        } else {
            bot('sendmessage', [
                'chat_id'=>$chat_id,
                'text' => "❌Sizning tangalaringiz yetarli emas.",
            ]);
        }
    }elseif ($text == "10000👁‍🗨 =  10000💰") {
        file_put_contents("data/$chat_id/ted.txt", "240");
        $aaa = file_get_contents("data/$chat_id/ted.txt");
        $shoklt = file_get_contents("data/$chat_id/shoklat.txt");
        if ($shoklt > $aaa) {
            file_put_contents("data/$chat_id/ali.txt", "seen2");

            bot('sendmessage', [
                'chat_id' => $chat_id,
                'text' => "-Va endi tashrifingizni bu erda kengaytirishni istagan xabar oldinga!
Siz o'z e'lonlaringizni bu erda joylashtirishingiz, shuningdek, boshqa robot foydalanuvchilariga ko'rsatmoqchi bo'lgan xostlarni ko'rsatishingiz mumkin.
E'tibor bering, bitta xabar uchun qancha buyurtmalar befoyda edi. 
Robot kodidan tashqarida:
 - Jismoniy shaxslar va foydalanuvchilarning aldashlari doimiy tamponga ega bo'ladi.)
 - Fohishalik va haqorat.
 - Voyaga etganlarning kontekstlari.
 - xavotirli va ma'lumot uzatish.
 - Firibgarlik va firibgarlik operatsiyalari.
 - O'xshash robotlarning, soxta robotlarning reklamasi.
 - Hack va xakerlik, valyuta dasturlari va mualliflik huquqiga qarshi ishlarning tarqalishi.
 - Va ... ruxsatsiz.)
 ",
                'reply_to_message_id'=>$message_id,
    'reply_markup'=>json_encode([
    'inline_keyboard'=>[
    [
    ['text'=>"🏘️ Bosh menu",'callback_data'=>"home"]
    ]
    ]
    ])
            ]);
        } else {
            bot('sendmessage', [
                'chat_id'=>$chat_id,
                'text' => "❌Sizning tangalaringiz yetarli emas.",
            ]);
        }
    } elseif ($text == "20000👁‍🗨 =  20000💰") {
        file_put_contents("data/$chat_id/ted.txt", "300");
        $aaa = file_get_contents("data/$chat_id/ted.txt");
        $shoklt = file_get_contents("data/$chat_id/shoklat.txt");
        if ($shoklt > $aaa) {
            file_put_contents("data/$chat_id/ali.txt", "seen2");

            bot('sendmessage', [
                'chat_id' => $chat_id,
                'text' => "- Va endi tashrifingizni bu erda kengaytirishni istagan xabar oldinga!
Siz o'z e'lonlaringizni bu erda joylashtirishingiz, shuningdek, boshqa robot foydalanuvchilariga ko'rsatmoqchi bo'lgan xostlarni ko'rsatishingiz mumkin.
E'tibor bering, bitta xabar uchun qancha buyurtmalar befoyda edi. 
Robot kodidan tashqarida:
 - Jismoniy shaxslar va foydalanuvchilarning aldashlari doimiy tamponga ega bo'ladi.)
 - Fohishalik va haqorat.
 - Voyaga etganlarning kontekstlari.
 - xavotirli va ma'lumot uzatish.
 - Firibgarlik va firibgarlik operatsiyalari.
 - O'xshash robotlarning, soxta robotlarning reklamasi.
 - Hack va xakerlik, valyuta dasturlari va mualliflik huquqiga qarshi ishlarning tarqalishi.
 - Va ... ruxsatsiz.)
 ",
                'reply_to_message_id'=>$message_id,
    'reply_markup'=>json_encode([
    'inline_keyboard'=>[
    [
    ['text'=>"🏘️ Bosh menu",'callback_data'=>"home"]
    ]
    ]
    ])
            ]);
        } else {
            bot('sendmessage', [
                'chat_id'=>$chat_id,
                'text' => "❌Sizning tangalaringiz yetarli emas.",
            ]);
        }
     }elseif ($text == "30000👁‍🗨 =  30000💰") {
        file_put_contents("data/$chat_id/ted.txt", "300");
        $aaa = file_get_contents("data/$chat_id/ted.txt");
        $shoklt = file_get_contents("data/$chat_id/shoklat.txt");
        if ($shoklt > $aaa) {
            file_put_contents("data/$chat_id/ali.txt", "seen2");

            bot('sendmessage', [
                'chat_id' => $chat_id,
                'text' => "- Va endi tashrifingizni bu erda kengaytirishni istagan xabar oldinga!
Siz o'z e'lonlaringizni bu erda joylashtirishingiz, shuningdek, boshqa robot foydalanuvchilariga ko'rsatmoqchi bo'lgan xostlarni ko'rsatishingiz mumkin.
E'tibor bering, bitta xabar uchun qancha buyurtmalar befoyda edi. 
Robot kodidan tashqarida:
 - Jismoniy shaxslar va foydalanuvchilarning aldashlari doimiy tamponga ega bo'ladi.)
 - Fohishalik va haqorat.
 - Voyaga etganlarning kontekstlari.
 - xavotirli va ma'lumot uzatish.
 - Firibgarlik va firibgarlik operatsiyalari.
 - O'xshash robotlarning, soxta robotlarning reklamasi.
 - Hack va xakerlik, valyuta dasturlari va mualliflik huquqiga qarshi ishlarning tarqalishi.
 - Va ... ruxsatsiz.)
 ",
                'reply_to_message_id'=>$message_id,
    'reply_markup'=>json_encode([
    'inline_keyboard'=>[
    [
    ['text'=>"🏘️ Bosh menu",'callback_data'=>"home"]
    ]
    ]
    ])
            ]);
        } else {
            bot('sendmessage', [
                'chat_id'=>$chat_id,
                'text' => "❌Sizning tangalaringiz yetarli emas.",
            ]);
        }
     }elseif ($text == "40000👁‍🗨 =  40000💰") {
        file_put_contents("data/$chat_id/ted.txt", "300");
        $aaa = file_get_contents("data/$chat_id/ted.txt");
        $shoklt = file_get_contents("data/$chat_id/shoklat.txt");
        if ($shoklt > $aaa) {
            file_put_contents("data/$chat_id/ali.txt", "seen2");

            bot('sendmessage', [
                'chat_id' => $chat_id,
                'text' => "- Va endi tashrifingizni bu erda kengaytirishni istagan xabar oldinga!
Siz o'z e'lonlaringizni bu erda joylashtirishingiz, shuningdek, boshqa robot foydalanuvchilariga ko'rsatmoqchi bo'lgan xostlarni ko'rsatishingiz mumkin.
E'tibor bering, bitta xabar uchun qancha buyurtmalar befoyda edi. 
Robot kodidan tashqarida:
 - Jismoniy shaxslar va foydalanuvchilarning aldashlari doimiy tamponga ega bo'ladi.)
 - Fohishalik va haqorat.
 - Voyaga etganlarning kontekstlari.
 - xavotirli va ma'lumot uzatish.
 - Firibgarlik va firibgarlik operatsiyalari.
 - O'xshash robotlarning, soxta robotlarning reklamasi.
 - Hack va xakerlik, valyuta dasturlari va mualliflik huquqiga qarshi ishlarning tarqalishi.
 - Va ... ruxsatsiz.)
 ",
                'reply_to_message_id'=>$message_id,
    'reply_markup'=>json_encode([
    'inline_keyboard'=>[
    [
    ['text'=>"🏘️ Bosh menu",'callback_data'=>"home"]
    ]
    ]
    ])
            ]);
        } else {
            bot('sendmessage', [
                'chat_id'=>$chat_id,
                'text' => "❌Sizning tangalaringiz yetarli emas.",
            ]);
        }
     }elseif ($text == "50000👁‍🗨 =  50000💰") {
        file_put_contents("data/$chat_id/ted.txt", "300");
        $aaa = file_get_contents("data/$chat_id/ted.txt");
        $shoklt = file_get_contents("data/$chat_id/shoklat.txt");
        if ($shoklt > $aaa) {
            file_put_contents("data/$chat_id/ali.txt", "seen2");

            bot('sendmessage', [
                'chat_id' => $chat_id,
                'text' => "- Va endi tashrifingizni bu erda kengaytirishni istagan xabar oldinga!
Siz o'z e'lonlaringizni bu erda joylashtirishingiz, shuningdek, boshqa robot foydalanuvchilariga ko'rsatmoqchi bo'lgan xostlarni ko'rsatishingiz mumkin.
E'tibor bering, bitta xabar uchun qancha buyurtmalar befoyda edi. 
Robot kodidan tashqarida:
 - Jismoniy shaxslar va foydalanuvchilarning aldashlari doimiy tamponga ega bo'ladi.)
 - Fohishalik va haqorat.
 - Voyaga etganlarning kontekstlari.
 - xavotirli va ma'lumot uzatish.
 - Firibgarlik va firibgarlik operatsiyalari.
 - O'xshash robotlarning, soxta robotlarning reklamasi.
 - Hack va xakerlik, valyuta dasturlari va mualliflik huquqiga qarshi ishlarning tarqalishi.
 - Va ... ruxsatsiz.)
 ",
                'reply_to_message_id'=>$message_id,
    'reply_markup'=>json_encode([
    'inline_keyboard'=>[
    [
    ['text'=>"🏘️ Bosh menu",'callback_data'=>"home"]
    ]
    ]
    ])
            ]);
        } else {
            bot('sendmessage', [
                'chat_id'=>$chat_id,
                'text' => "❌Sizning tangalaringiz yetarli emas.",
            ]);
        }
    }
//👁‍🗨Количество: $co
elseif ($ali == "seen2") {
        if ($forward_chat_username != null) {
            $msg_id = bot('ForwardMessage', [
                'chat_id' => $channel,
                'from_chat_id' => "$chat_id",
                'message_id' => $message_id222
            ])->result->message_id;
            bot('sendMessage', [
                'chat_id' => $channel,
                'text' => " ⚙ Yangi xabar ro'yxatdan o'tdi.
🔢Buyurtma kodi: $msg_id 
👁‍🗨Miqdori: $co
⏳Vaqti: $fatime
📅Sanasi: $fadate ",
                'reply_to_message_id' => $msg_id,
                'parse_mode' => "MarkDown",
                'reply_markup' => json_encode([
                    'inline_keyboard' => [
                        [
                            ['text' => "💰Bonus ", 'callback_data' => "ok"],['text'=>" ⚙️Shikoyat",'callback_data'=>"spam"],["text"=>"🔙Orqaga","url"=>"https://t.me/MsmTestRobot"]
                        ],
                    ]
                ])
            ]);
            @$aaa = file_get_contents("data/$chat_id/ted.txt");
            @$sho = file_get_contents("data/$chat_id/shoklat.txt");
            $getsho = $sho - $al;
            file_put_contents("data/$chat_id/shoklat.txt", $getsho);
            @$don = file_get_contents("data/done.txt");
            $getdon = $don + 1;
            file_put_contents("data/done.txt", $getdon);
            file_put_contents("ads/cont/$msg_id.txt", $al);
            file_put_contents("ads/date/$msg_id.txt", $fadate);
            file_put_contents("ads/time/$msg_id.txt", $fatime);
            file_put_contents("ads/admin/$msg_id.txt", $chat_id);
            file_put_contents("ads/seen/$msg_id.txt", "0");
            file_put_contents("ads/user/$msg_id.txt", "");
            file_put_contents("data/$chat_id/ali.txt", "no");
            bot('sendMessage', [
                'chat_id' => $chat_id,
                'text' => "😊Rahmat, sizning reklamaingiz yozib olinadi va reklama kanalida namoyish etiladi..
🔎Buyurtma kodi: $msg_id
📜Sizning reklama usulingiz : http://telegram.me/Botkestluz/$msg_id
♻️Xabarga buyurtma berganingizdan so'ng, sizga xabarnoma yuboriladi.
 ",
'reply_to_message_id'=>$message_id,
'reply_markup' => json_encode([
    'resize_keyboard'=>true,
    'keyboard'=>[
[['text'=>"💰Tangalarni oling💰"]],
[['text'=>"👁️‍🗨️Buyurtma"],['text'=>"📊Statistika"]],
[['text'=>"👤Hisobim"],['text'=>"👫 Referal"]],
[['text'=>"🛍Magazin"],['text'=>"🔖Banner"],['text'=>"📋Qollash uchun"]],
[['text'=>"💰Kunlik bonus💰"],['text'=>"🎁Sovga"],['text'=>"💳Almashuv"]],
[['text'=>"📙Yordam"],['text'=>"📞Aloqa hizmati"],['text'=>"⚖Qoidalar"]]
]
])
]);
}
else {
            sendmessage($chat_id, "Iltimos, xabaringizni kanalingiz orqali yuboring ... 😐");
        }
    }if ($data == "ok") {
        $message_id12 = $update->callback_query->message->reply_to_message->message_id;
        $fromm_id = $update->callback_query->from->id;
        @$ue = file_get_contents("ads/user/$message_id12.txt");
        @$se = file_get_contents("ads/seen/$message_id12.txt");
        if (strpos($ue, "$fromm_id") !== false) {
            bot('answercallbackquery', [
                'callback_query_id' => $update->callback_query->id,
                'text' => "Siz allaqachon ushbu xabarni ko'rgansiz..❗️",
                'show_alert' => false
            ]);
        } else {
            $user = file_get_contents("ads/user/$message_id12.txt");
            $members = explode("\n", $user);
            if (!in_array($fromm_id, $members)) {
                $add_user = file_get_contents("ads/user/$message_id12.txt");
                $add_user .= $fromm_id . "\n";
                file_put_contents("ads/user/$message_id12.txt", $add_user);
            }
            @$sho2 = file_get_contents("data/$newid2/shoklat.txt");
            $getsho = $sho2 + 1;
            file_put_contents("data/$newid2/shoklat.txt", $getsho);
            $getse = $se + $ct;
            file_put_contents("ads/seen/$message_id12.txt", $getse);
            @$sho = file_get_contents("data/$fromm_id/shoklat.txt");
            $getsho = $sho + $ct;
            file_put_contents("data/$fromm_id/shoklat.txt", $getsho);
            if(!file_exists("data/$fromm_id/seen.txt")){
                file_put_contents("data/$fromm_id/seen.txt","0");
            }
            $seen = file_get_contents("data/$fromm_id/seen.txt");
            $sea = file_get_contents("data/$fromm_id/membrs.txt");
			if(strpos(file_get_contents("data/status.txt"),"👤 شناسه کاربری » $fromm_id
👁‍🗨 بازدید » $seen
👥 زیرمجموعه » $sea") !== false){
$add_seen = $seen + 1;
$add_seen2 = str_replace("👤 شناسه کاربری » $fromm_id
👁‍🗨 بازدید » $seen
👥 زیرمجموعه » $sea","👤 شناسه کاربری » $fromm_id
👁‍🗨 بازدید » $add_seen
👥 زیرمجموعه » $sea\n\n",file_get_contents("data/status.txt"));
file_put_contents("data/status.txt",$add_seen2);
}else{
    $add_seen = $seen + 1;
save2("data/status.txt","👤 شناسه کاربری » $fromm_id
👁‍🗨 بازدید » $add_seen
👥 زیرمجموعه » $sea\n\n");
}
            bot('answercallbackquery', [
                'callback_query_id' => $update->callback_query->id,
                'text' => "Xabarni ko'rish uchun sizga + 1 tanga💰 hisoblangan",
                'show_alert' => false
            ]);
        }
        $end = file_get_contents("ads/seen/$message_id12.txt");
        $ad = file_get_contents("ads/admin/$message_id12.txt");
        $co = file_get_contents("ads/cont/$message_id12.txt");
        $te = file_get_contents("ads/time/$message_id12.txt");
        $de = file_get_contents("ads/date/$message_id12.txt");
        if ($end == $co) {
            file_put_contents("data/$chat_id/ali.txt", "no");
            bot('sendMessage', [
                'chat_id' => $ad,
                'text' => "✅Buyurtma bajarildi * * $message_id12** 
👁 🗨 Siz so'ragan tashriflar soni: $co
⌚Ko'rish vaqti: $te
🗓️Ko'rish sanasi: $de
⏱️So‘rovni tugatish: $ fatime
😊Biz siz bilan faxrlanamiz
",
                'parse_mode' => "MarkDown"
            ]);
            @$don = file_get_contents("data/done.txt");
            $getdon = $don - 1;
            file_put_contents("data/done.txt", $getdon);
            @$enn = file_get_contents("data/enf.txt");
            $getenf = $enn + 1;
            file_put_contents("data/enf.txt", $getenf);
            $de = $message_id12 + 1;
            deletemessage($channel, $message_id12);
            deletemessage($channel, $de);
            unlink("ads/seen/$message_id12.txt");
            unlink("ads/admin/$message_id12.txt");
            unlink("ads/cont/$message_id12.txt");
            unlink("ads/time/$message_id12.txt");
            unlink("ads/user/$message_id12.txt");
            unlink("ads/date/$message_id12.txt");
        }
    } 
elseif ($text == "📋Qollash uchun") {
        file_put_contents("data/$chat_id/ali.txt", "mlm");
        bot('sendmessage', [
            'chat_id' => $chat_id,
            'text' => "Kodingizni yuboring:",
            'reply_to_message_id'=>$message_id,
            'reply_markup'=>json_encode([
        'inline_keyboard'=>[
        [
        ['text'=>"🏘️ Bosh menu",'callback_data'=>"home"]
        ]
        ]
        ])
        ]);
    } 
    else if($data == "spam"){
$message_id12 = $update->callback_query->message->reply_to_message->message_id;
$id = $update->callback_query->from->id;
$name = $update->callback_query->from->first_name;
$block = file_get_contents("data/$id/block-spam.txt");
if($block == true){
 bot('answercallbackquery', [
                'callback_query_id' => $update->callback_query->id,
                'text' => "- Bloklanganligi sababli bu haqida xabar berolmaysiz !!",
                'show_alert' => true
            ]);
}else{
bot('answercallbackquery', [
                'callback_query_id' => $update->callback_query->id,
                'text' => "Hisobot muvaffaqiyatli qabul qilindi!",
                'show_alert' => false
            ]);
file_put_contents("data/spam.txt",$message_id12);
file_put_contents("data/id.txt",$id);

bot('sendMessage',[
 'chat_id'=>"956674366",
  'message_id'=>$message_id,
 'text'=>"[📛](https://T.me/MsmTestRobot/$message_id12) Уважаемый пользователь admin [$name](tg://user?id=$id) сообщил следующее сообщение .",
 'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>"👁Xabar ko'rinishini ko'rsatish",'url'=>"https://t.me/MsmTestRobot/$message_id12"]
],
[
['text'=>"❌ Yo'q qilish",'callback_data'=>"del spam"],['text'=>"🚫ban",'callback_data'=>"block user"]
]
]
])
 ]);
}
}
elseif($data == "del spam"){
$msg_id = file_get_contents("data/spam.txt");
deletemessage($channel,$msg_id);
deletemessage($channel,$msg_id + 1);
 bot('EditMessageText',[
 'chat_id'=>'742420221',
 'message_id'=>$message_id12,
 'text'=>"Ushbu postni olib tashlang !!",
 ]);
 unlink("data/spam.txt");
  unlink("data/id.txt");

 }
 elseif($data == "block user"){
  $id = file_get_contents("data/id.txt");
 file_put_contents("data/$id/block-spam.txt","true");
 bot('EditMessagetext',[
 'chat_id'=>'742420221',
 'message_id'=>$message_id12,
 'text'=>"Istalgan foydalanuvchi endi xabar berolmaydi!"
 ]);
  unlink("data/spam.txt");
  unlink("data/id.txt");
 }
 elseif ($ali == "mlm") {
        file_put_contents("data/$chat_id/ali.txt", "");
        if (file_exists("ads/admin/$text.txt")) {
            $ge = file_get_contents("ads/seen/$text.txt");
            $ad = file_get_contents("ads/admin/$text.txt");
            $co = file_get_contents("ads/cont/$text.txt");
            $te = file_get_contents("ads/time/$text.txt");
            $de = file_get_contents("ads/date/$text.txt");
            bot('sendMessage', [
                'chat_id' => $chat_id,
                'text' => "🗒️ $Text kuzatuv kodi xususiyatlari
👁️‍🗨️Siz so'ragan tashriflar soni: $co
⏳Tashrif vaqti: $te
🗓️Mehmon so'rovining sanasi: $de
🗣️Oldingi tashriflar soni: $ge
🕰️Keyingi soatlar: $fatime
",
'reply_to_message_id'=>$message_id,
                'reply_markup' => json_encode([
                    'inline_keyboard' => [
                        [
                            ['text' => "🏘️ Bosh menu",'callback_data'=>"home"]
                        ]
                    ]
                ])
            ]);
        } else {
            bot('sendMessage', [
                'chat_id' => $chat_id,
                'text' => "Ushbu reklama tugaydi yoki umuman ro'yxatdan o'tmagan.",
            ]);
        }
    }
   if ($chatid == $ADMIN or $chat_id == $ADMIN) {
if(preg_match('/^\/([Pp][Aa][Nn][Ee][Ll])/',$text)){
        file_put_contents("data/$chat_id/ali.txt", "no");
        sendAction($chat_id, 'typing');
        bot('sendmessage', [
            'chat_id' => $chat_id,
            'text' => "پنل باز شد",
            'parse_mode' => "MarkDown",
            'reply_to_message_id'=>$message_id,
            'reply_markup' => json_encode([
			'resize_keyboard'=>true,
                'keyboard' => [
                    [
                        ['text' => "📊Statistika📊"],['text'=>"💡 TOP foydalanuvchilari"]
                    ],
                    [
                        ['text' => "✉️ Send"], ['text' => "🗂 - Ha, janob."]
                    ],
                    [
                        ['text' => "❌ Block"], ['text' => "♻️ Ombor"]
                    ],
                    [
                        ['text' => "📋 Matnni ornating"],['text' => "📢 Kanalni ornating"]
                    ],
                    [
['text' => "🎁 Sovga yozish"],['text' => " 👫 Referal yozish "]
],
[
['text' => "👤 Add admin "],['text' => "🎉 Admin uchun sovga "]
],
[
['text' => "🔖 Bannerni ornating"],['text' => "⚖ Qoidalarni ornating"]
],
                    [
                        ['text' => "💰 Tangalar "],['text' => "🧱 Tangalarni ornating"]
                    ],
                       [
                        ['text' => "💸 Foydalanuvchi uchun"],['text'=>"🏘️ Bosh menu"]
                    ]
                ]
            ])
        ]);
    } 
   
			elseif($text == "💡 TOP foydalanuvchilari" && $chat_id == $ADMIN){ 
 $one_seen = ttoopp(0);
 $two_seen = ttoopp(1);
 $three_seen = ttoopp(2);
 $four_seen = ttoopp(3);
 $five_seen = ttoopp(4);
 $o_sea = top_sea(0);
 $th_sea = top_sea(1);
 $t_sea = top_sea(2);
 $f_sea = top_sea(3);
 $fi_sea =top_sea(4);
 bot('SendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"Eng yaxshi foydalanuvchilar (tanga)

 1 - [$one_seen](tg://user?id=$one_seen)
 2 - [$two_seen](tg://user?id=$two_seen)
 3 - [$three_seen](tg://user?id=$three_seen)
 4 - [$four_seen](tg://user?id=$four_seen)
 5 - [$five_seen](tg://user?id=$five_seen)
 
 -  Foydalanuvchilar to'plami ) :
 
 1 - [$o_sea](tg://user?id=$o_sea)
 2 - [$t_sea](tg://user?id=$t_sea)
 3 - [$th_sea](tg://user?id=$th_sea)
 4 - [$f_sea](tg://user?id=$f_sea)
 5 - [$fi_sea](tg://user?id=$fi_sea)",
 'parse_mode'=>'MarkDown'
 ]); 
 /*bot('SendMessage',[ 
  'chat_id'=>$chat_id, 
  'text'=>" Список посещений и подмножество количества пользователей. : 
 
_$status _",
  'parse_mode'=>'MarkDown', 
  'reply_to_message_id'=>$message_id, 
  ]); 
 } 
 /* 
 elseif($data == "check"){ 
 $msg_id = file_get_contents("data/bot-msgid.txt"); 
 $txt = file_get_contents("data/bot-text.txt"); 
 $fp = fopen("users.txt", 'r'); 
        while (!feof($fp)) { 
            $ckar = fgets($fp); 
 } 
 $seen = file_get_contents("data/$ckar/seen.txt"); 
  $str = str_replace("بازدید : $seen",'بازدید : 0',file_get_contents("data/$ckar/status.txt")); 
  $str2 = str_replace($seen,'0',file_get_contents("data/$ckar/seen.txt")); 
  file_put_contents("data/$ckar/status.txt",$str); 
  file_put_contents("data/$ckar/seen.txt",$str2); 
  bot('AnswerCallbackQuery',[ 
  'callback_query_id'=>$update->callback_query->id, 
  'text'=>"🚸 اطلاعات پاک شدند !!" 
  ]); 
  bot('editMessageText',[ 
  'chat_id'=>$update->callback_query->from->id, 
  'message_id'=>$msg_id, 
  'text'=>$txt, 
  'parse_mode'=>'MarkDown', 
  ]); 
  unlink("data/bot-msgid.txt"); 
  unlink("data/bot-text.txt"); 
 } 
 */
}	
    elseif($text == "🔙Orqaga qaytish" && $chat_id == $ADMIN){
    file_put_contents("data/$chat_id/ali.txt","none");
    sendAction($chat_id, 'typing');
        bot('sendmessage', [
            'chat_id' => $chat_id,
            'text' =>" - Hurmatli direktor, tanga boshqaruv paneliga xush kelibsiz .",
            'parse_mode' => "MarkDown",
            'reply_to_message_id'=>$message_id,
            'reply_markup' => $admin_keyboard
            ]);
    }
	
		elseif($text == "💡 TOP foydalanuvchilari" && $chat_id == $ADMIN){
 $status = file_get_contents("data/status.txt"); 
 SendAction($chat_id,'upload_ducument'); 
  /*bot('SendMessage',[ 
  'chat_id'=>$chat_id, 
  'text'=>"Список посещений и подмножество количества пользователей. :
   
_$status _", 
  'parse_mode'=>'MarkDown', 
  'reply_to_message_id'=>$message_id, 
  ]); 
 } */
bot('SendDocument',[
'chat_id'=>$chat_id,
'document'=>new CURLFile("data/status.txt"),
'reply_to_message_id'=>$message_id
]);
}
 /* 
 elseif($data == "check"){ 
 $msg_id = file_get_contents("data/bot-msgid.txt"); 
 $txt = file_get_contents("data/bot-text.txt"); 
 $fp = fopen("users.txt", 'r'); 
        while (!feof($fp)) { 
            $ckar = fgets($fp); 
 } 
 $seen = file_get_contents("data/$ckar/seen.txt"); 
  $str = str_replace("بازدید : $seen",'بازدید : 0',file_get_contents("data/$ckar/status.txt")); 
  $str2 = str_replace($seen,'0',file_get_contents("data/$ckar/seen.txt")); 
  file_put_contents("data/$ckar/status.txt",$str); 
  file_put_contents("data/$ckar/seen.txt",$str2); 
  bot('AnswerCallbackQuery',[ 
  'callback_query_id'=>$update->callback_query->id, 
  'text'=>"🚸 اطلاعات پاک شدند !!" 
  ]); 
  bot('editMessageText',[ 
  'chat_id'=>$update->callback_query->from->id, 
  'message_id'=>$msg_id, 
  'text'=>$txt, 
  'parse_mode'=>'MarkDown', 
  ]); 
  unlink("data/bot-msgid.txt"); 
  unlink("data/bot-text.txt"); 
 } 
 */
			
					elseif ($text == "📊Statistika📊" && $chat_id == $ADMIN){
        $user = file_get_contents("users.txt");
        $member_id = explode("\n", $user);
        $member_count = count($member_id) - 1;
        @$don = file_get_contents("data/done.txt");
        @$enf = file_get_contents("data/enf.txt");
        bot('sendmessage', [
            'chat_id'=>$chat_id,
            'text' => "📊Statistika:

👥Foydalanuvchilar: $member_count
📮Umumiy e'lonlar: $don
✅Reklama qilingan : $enf",
'reply_to_message_id'=>$message_id,
        ]);
    } elseif ($text == "✉️ Send" && $chat_id == $ADMIN ){
        file_put_contents("data/$chat_id/ali.txt", "send");
        bot('sendmessage', [
            'chat_id' => $chat_id,
            'text' =>" - Xo'sh, menga xabaringizni yuboring, shunda men uni foydalanuvchilarga yuboraman. Bunga vaqtim yo'q.",
            'reply_to_message_id'=>$message_id,
            'reply_markup'=>$back_keyboard
        ]);
    } elseif ($ali == "send") {
        file_put_contents("data/$chat_id/ali.txt", "no");
        $fp = fopen("users.txt", 'r');
        while (!feof($fp)) {
            $ckar = fgets($fp);
            sendmessage($ckar, $text);
        }
        bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' =>"Muvaffaqiyatli barcha foydalanuvchilarga yuborildi.",
            'reply_to_message_id'=>$message_id,
            'reply_markup' => $admin_keyboard
        ]);
    } elseif ($text == "🗂 - Ha, janob." && $chat_id == $ADMIN){
        file_put_contents("data/$chat_id/ali.txt", "fwd");
        bot('sendmessage', [
            'chat_id' => $chat_id,
            'text' =>" - Shunday qilib, xabaringizni yuboring, lekin men bu haqda tez orada xursand emasman.",
            'reply_to_message_id'=>$message_id,
            'reply_markup'=>$back_keyboard
        ]);
    } elseif ($ali == 'fwd') {
        file_put_contents("data/$chat_id/ali.txt", "no");
        $forp = fopen("users.txt", 'r');
        while (!feof($forp)) {
            $fakar = fgets($forp);
            Forward($fakar, $chat_id, $message_id);
        }
        bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' => "U muvaffaqiyatli qo'ndi.",
            'reply_to_message_id'=>$message_id,
            'reply_markup' => $admin_keyboard
        ]);
    } elseif ($text == "❌ Block" && $chat_id == $ADMIN ){
       
        file_put_contents("data/$chat_id/ali.txt", "pen");
       bot('sendmessage', [
            'chat_id' => $chat_id,
            'text' => "Uni robotdan blokirovka qilish uchun faqat raqamli identifikatorni yuboring",
            'reply_to_message_id'=>$message_id,
            'reply_markup'=>$back_keyboard
        ]);
    } elseif ($ali == 'pen') {
        $myfile2 = fopen("data/pen.txt", 'a') or die("Unable to open file!");
        fwrite($myfile2, "$text\n");
        fclose($myfile2);
        file_put_contents("data/$chat_id/ali.txt", "No");
        bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' =>" Men uni muvaffaqiyatli blokladim.
 Va ishni ham.
 $text ",
 'reply_to_message_id'=>$message_id,
            'parse_mode' => "MarkDown",
            'reply_markup' => $admin_keyboard
        ]);
    } elseif ($text == "♻️ Ombor" && $chat_id == $ADMIN){
        
        file_put_contents("data/$chat_id/ali.txt", "unpen");
       bot('sendmessage', [
            'chat_id' => $chat_id,
            'text' =>"-Siz shunchaki berasiz. Menga kengaytma identifikatorini bering .",
            'reply_to_message_id'=>$message_id,
'reply_markup'=>$back_keyboard
        ]);
    } elseif ($ali == 'unpen') {
        $newlist = str_replace($text, "", $penlist);
        file_put_contents("data/pen.txt", $newlist);
        file_put_contents("data/$chat_id/ali.txt", "No");
        bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' =>" Men buni aniq ko'rsatdim.
 Va ishni ham.
 $text ",
 'reply_to_message_id'=>$message_id,
 'reply_markup' => $admin_keyboard
        ]);
    } 
    elseif ($text == "📢 Kanalni ornating" && $chat_id == $ADMIN){
        
        file_put_contents("data/$chat_id/ali.txt", "setc");
        bot('sendmessage', [
            'chat_id' => $chat_id,
            'text' => "Отправьте мне ссылки Вашего канала",
            'reply_to_message_id'=>$message_id,
            'reply_markup'=>$back_keyboard
        ]);
    } elseif ($ali == 'setc') {
        file_put_contents("data/channel.txt", $text);
        file_put_contents("data/$chat_id/ali.txt", "No");
        bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' => "Ulangan
 
 $text ",
 'reply_to_message_id'=>$message_id,
 'reply_markup' => $admin_keyboard
        ]);
    } 
    elseif ($text == "💰 Tangalar " && $chat_id == $ADMIN) {
        
        file_put_contents("data/$chat_id/ali.txt", "setct");
        bot('sendmessage', [
            'chat_id' => $chat_id,
            'text' =>"Raqamni kiriting",
            'reply_to_message_id'=>$message_id,
            'reply_markup'=>$back_keyboard
        ]);
    } elseif ($ali == 'setct') {
        file_put_contents("data/ct.txt", $text);
        file_put_contents("data/$chat_id/ali.txt", "No");
        bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' => "Bajarildi✅✅✅",
 'reply_to_message_id'=>$message_id,
 'reply_markup' => $admin_keyboard
        ]);
    }
elseif ($text == "🧱 Tangalarni ornating" && $chat_id == $ADMIN) {
        
        file_put_contents("data/$chat_id/ali.txt", "setzm");
        bot('sendmessage', [
            'chat_id' => $chat_id,
            'text' =>"Raqamni kiriting",
            'reply_to_message_id'=>$message_id,
            'reply_markup'=>$back_keyboard
        ]);
    } elseif ($ali == 'setzm') {
        file_put_contents("data/zm.txt", $text);
        file_put_contents("data/$chat_id/ali.txt", "No");
        bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' => "Bajarildi✅✅✅",
 'reply_to_message_id'=>$message_id,
 'reply_markup' => $admin_keyboard
        ]);
    }
    elseif ($text == "👤 Add admin" && $chat_id == $ADMIN) {
        
        file_put_contents("data/$chat_id/ali.txt", "setadmin");
        bot('sendmessage', [
            'chat_id' => $chat_id,
            'text' =>" - Иди, дай мне номер телефона.",
            'reply_to_message_id'=>$message_id,
            'reply_markup'=>$back_keyboard
        ]);
    } elseif ($ali == 'setadmin') {
        file_put_contents("data/admin2.txt", $text);
        file_put_contents("data/$chat_id/ali.txt", "No");
        bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' => "Bajarildi✅✅✅",
 'reply_to_message_id'=>$message_id,
 'reply_markup' => $admin_keyboard
        ]);
    }
    elseif ($text == "📋 Matnni ornating" && $chat_id == $ADMIN) {
        
        file_put_contents("data/$chat_id/ali.txt", "sethelp");
        bot('sendmessage', [
            'chat_id' => $chat_id,
            'text' => " Matningizni yuboring.",
            'reply_to_message_id'=>$message_id,
            'reply_markup'=>$back_keyboard
        ]);
    } elseif ($ali == 'sethelp') {
        file_put_contents("data/h.txt", $text);
        file_put_contents("data/$chat_id/ali.txt", "No");
        bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' => "Bajarildi✅✅✅", 
 'reply_to_message_id'=>$message_id,
 'reply_markup' => $admin_keyboard
        ]);
    }
    elseif ($text == " 👫 Referal yozish " && $chat_id == $ADMIN) {
        
        file_put_contents("data/$chat_id/ali.txt", "setbnz");
        bot('sendmessage', [
            'chat_id' => $chat_id,
            'text' => "Matningizni yuboring.",
            'reply_to_message_id'=>$message_id,
            'reply_markup'=>$back_keyboard
        ]);
    } elseif ($ali == 'setbnz') {
        file_put_contents("data/bnz.txt", $text);
        file_put_contents("data/$chat_id/ali.txt", "No");
        bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' => "Bajarildi✅✅✅",
 'reply_to_message_id'=>$message_id,
 'reply_markup' => $admin_keyboard
        ]);
    }
    elseif ($text == "🎁 Sovga yozish" && $chat_id == $ADMIN) {
        
        file_put_contents("data/$chat_id/ali.txt", "setmch");
        bot('sendmessage', [
            'chat_id' => $chat_id,
            'text' => "Matningizni yuboring.",
            'reply_to_message_id'=>$message_id,
            'reply_markup'=>$back_keyboard
        ]);
    } elseif ($ali == 'setmch') {
        file_put_contents("data/mch.txt", $text);
        file_put_contents("data/$chat_id/ali.txt", "No");
        bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' => "Bajarildi✅✅✅",
 'reply_to_message_id'=>$message_id,
 'reply_markup' => $admin_keyboard
        ]);
    }
elseif ($text == "⚖ Qoidalarni ornating" && $chat_id == $ADMIN) {
        
        file_put_contents("data/$chat_id/ali.txt", "setmg");
        bot('sendmessage', [
            'chat_id' => $chat_id,
            'text' => "Matningizni yuboring.",
            'reply_to_message_id'=>$message_id,
            'reply_markup'=>$back_keyboard
        ]);
    } elseif ($ali == 'setmg') {
        file_put_contents("data/mg.txt", $text);
        file_put_contents("data/$chat_id/ali.txt", "No");
        bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' => "Bajarildi✅✅✅",
 'reply_to_message_id'=>$message_id,
 'reply_markup' => $admin_keyboard
        ]);
    }
elseif ($text == "🔖 Bannerni ornating" && $chat_id == $ADMIN) {
        
        file_put_contents("data/$chat_id/ali.txt", "setmb");
        bot('sendmessage', [
            'chat_id' => $chat_id,
            'text' => "Matningizni yuboring.",
            'reply_to_message_id'=>$message_id,
            'reply_markup'=>$back_keyboard
        ]);
    } elseif ($ali == 'setmb') {
        file_put_contents("data/mb.txt", $text);
        file_put_contents("data/$chat_id/ali.txt", "No");
        bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' => "Bajarildi✅✅✅",
 'reply_to_message_id'=>$message_id,
 'reply_markup' => $admin_keyboard
        ]);
    }
     elseif ($text == "💸 Foydalanuvchi uchun" && $chat_id == $ADMIN) {
        
        file_put_contents("data/$chat_id/ali.txt", "buy");
        bot('sendmessage', [
            'chat_id' => $chat_id,
            'text' => "Foydalanuvchi 🆔 raqamini yuborish.",
            'reply_to_message_id'=>$message_id,
            'reply_markup'=>$back_keyboard
        ]);
    } elseif ($ali == 'buy') {
        file_put_contents("data/buy.txt", $text);
        file_put_contents("data/$chat_id/ali.txt", "buy2");
        bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' => "Количество монеты",
            'reply_to_message_id'=>$message_id,
            'parse_mode' => "MarkDown",
            'reply_markup'=>$back_keyboard
        ]);
    } elseif ($ali == 'buy2') {
    $buy = file_get_contents("data/buy.txt");
          $fle = file_get_contents("data/$buy/shoklat.txt");
               $getshe = $fle + $text;
                file_put_contents("data/$buy/shoklat.txt", $getshe);
        file_put_contents("data/$chat_id/ali.txt", "");
        bot('sendMessage', [
            'chat_id' => $buy,
            'text' =>  "Hurmatli foydalanuvchi ...
$text tanga sizga menejment tomonidan yuborilgan !!"
]);
        bot('sendMessage', [
                    'chat_id' => $chat_id,
            'text' =>"Отправлено успешно.",
            'reply_to_message_id'=>$message_id,
            'reply_markup' => $admin_keyboard
        ]);
    }
unlink("data/ali.txt");
}
/*
@WievSbot ning kodi 
@Admistrator tomonidan 
tarjima qilinib tarqatildi. 
Bundanda ajoyib botlar 
@Loyihalar1 kanalida
*/
?