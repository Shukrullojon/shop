<?php

namespace App\Services;

use App\Gateways\SmsGateway;

class SmsService
{
    public static function send($data)
    {
        return SmsGateway::post([
            'url' => 'https://notify.eskiz.uz/api/message/sms/send',
            'token' => $data['token'],
            'data' => [
                'mobile_phone' => $data['mobile_phone'],
                'message' => $data['message'],
                'from' => 4546,
            ],
        ]);
    }

    public static function login()
    {
        return SmsGateway::login([
            'url' => "https://notify.eskiz.uz/api/auth/login",
            'data' => [
                'email' => env('eskiz_email'),
                'password' => env('eskiz_password'),
            ],
        ]);
    }
}
