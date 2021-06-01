<?php

    use BotMan\BotMan\BotMan;
    use BotMan\BotMan\BotManFactory;
    use BotMan\BotMan\Drivers\DriverManager;
    use BotMan\Drivers\Telegram\TelegramDriver;

    require_once    'vendor/autoload.php';

    $configs        =
    [
        'telegram'  =>
        [
            'token' =>  "1713395477:AAF_7M4NAQU2CTrOrFCUHsOLSvPfq3yQHWk"
        ]
    ];
    
    DriverManager::loadDriver(TelegramDriver::class);
    
    $botman         =   BotManFactory::create($configs);

    $botman->hears('{chat}', function(BotMan $bot, $chat){
        $user       =   $bot->getUser();
        include    'command/Api.php';
        if($chat === "/start"){
            $message    =   "Pasti ".$user->getFirstName()." lagi gabut ya, kalo lagi gabut yu chat sama aku :D, silahkan mau nanya apa ^_^.";
        }else{
            $message    =   getChat($chat);
        }
        $bot->reply($message);
    });
    $botman->listen();