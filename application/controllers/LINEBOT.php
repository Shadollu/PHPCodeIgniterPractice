<?php

Class LineBot extends CI_Controller
{

    public function index()
    {
        //從Line Developer上申請的Token
        $accessToken = 'VcC9lWBYYACb0/nxzr8rUf+CaElUkRw5dNwoz6rQCHlCySrGQs3HtZtj5RJB/qq+dIIf8vbQtH7fx23riR3SDEz1BRvpGrXz4vHwf9Tv5Y9akc2L7S+0buPuX0tvf3w3tsqY3vug7UyVWIOWlrK3YgdB04t89/1O/w1cDnyilFU=';

        //取得機器人丟過來的訊息
        $jsonString = file_get_contents('php://input');
        //轉成JSON
        $jsonObj = json_decode($jsonString);

        //設定變數給JSON的各欄位
        $event = $jsonObj->{"events"}[0];
        $type = $event->{"message"}->{"type"};
        $message = $event->{"message"};
        $replyToken = $event->{"replyToken"};

        //回覆的訊息,replyToken
        $postData = [
            "replyToken" => $replyToken,
            "messages" => [
                [
                    "type" => "text",
                    "text" => $jsonString
                ]
            ]
        ];

        //post url init
        $ch = curl_init("https://api.line.me/v2/bot/message/reply");

        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postData));
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Authorization: Bearer ' . $accessToken
            //'Authorization: Bearer '. TOKEN
        ));

        curl_exec($ch);
        curl_close($ch);
    }
}
