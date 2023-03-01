<?php

namespace App\Helper;

/**
 * Telegram send message
 */
class Telegram
{
	
	// function __construct(argument)
	// {
	// 	// code...
	// }

	public function sendMessage($message)
	{
		$token = env('TELEGRAM_BOT_TOKEN');
        $admin_id = env('TELEGRAM_USER_ID');
        $data = [
            'text' => $message,
            'parse_mode' => 'HTML',
            'chat_id' => $admin_id,
        ];

        file_get_contents("https://api.telegram.org/bot$token/sendMessage?" . http_build_query($data) );

	}

}
