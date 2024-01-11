<?php

namespace App\Gateways;

class SmsGateway
{
    public static function login($data){
        $ch = curl_init($data['url']);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json',
                "Accept: application/json",
            )
        );
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data['data'],true));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        $return = curl_exec($ch);
        curl_close($ch);
        return json_decode($return,true);
    }

    public static function post($data){
        $ch = curl_init($data['url']);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json',
                "Accept: application/json",
                "Authorization: Bearer ".$data['token'],
            )
        );
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data['data'],true));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        $return = curl_exec($ch);
        curl_close($ch);
        return json_decode($return,true);
    }
}
