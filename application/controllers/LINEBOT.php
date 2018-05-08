<?php

Class LineBot extends CI_Controller
{

    public function index()
    {
        $accessToken = 'VcC9lWBYYACb0/nxzr8rUf+CaElUkRw5dNwoz6rQCHlCySrGQs3HtZtj5RJB/qq+dIIf8vbQtH7fx23riR3SDEz1BRvpGrXz4vHwf9Tv5Y9akc2L7S+0buPuX0tvf3w3tsqY3vug7UyVWIOWlrK3YgdB04t89/1O/w1cDnyilFU=';

        $jsonString = file_get_contents('php://input');

        $file = fopen("D:\\PHP_Line_Log.txt", "a+");

        fwrite($file, $jsonString . PHP_EOL);

        $jsonObj = json_decode($jsonString);

        $event = $jsonObj->{"events"}[0];
        $type = $event->{"message"}->{"type"};
        $message = $event->{"message"};
        $replyToken = $event->{"replyToken"};

        $postData = [
            "replyToken" => $replyToken,
            "messages" => [
                [
                    "type" => "text",
                    "text" => $message->{"text"}
                ],
                [
                    "type" => "text",
                    "text" => "G"
                ]
            ]
        ];

        fwrite($file, json_encode($postData) . "\n");

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

        $result = curl_exec($ch);
        fwrite($file, $result . "\n");
        fclose($file);
        curl_close($ch);
    }
}
