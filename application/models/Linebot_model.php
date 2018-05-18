<?php

class Linebot_model extends CI_Model
{

    public function send_msg($userid, $resultStr)
    {
        //從Line Developer上申請的Token
        $accessToken = 'VcC9lWBYYACb0/nxzr8rUf+CaElUkRw5dNwoz6rQCHlCySrGQs3HtZtj5RJB/qq+dIIf8vbQtH7fx23riR3SDEz1BRvpGrXz4vHwf9Tv5Y9akc2L7S+0buPuX0tvf3w3tsqY3vug7UyVWIOWlrK3YgdB04t89/1O/w1cDnyilFU=';


        $resultdata = "";
        foreach ($resultStr['result'] as $key => $value) {
            $resultdata .= $key . ":" . $value . PHP_EOL;
        }

        $postData = [
            "to" => $userid,
            "messages" => [
                [
                    "type" => "text",
                    "text" => $resultStr['title'] . PHP_EOL . $resultStr['status'] . PHP_EOL . $resultStr['message']
                ]
                ,
                [
                    "type" => "text",
                    "text" => "查詢內容：" . PHP_EOL . $resultdata
                ]
            ]
        ];

        //post url init

        $ch = curl_init("https://api.line.me/v2/bot/message/push");
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
