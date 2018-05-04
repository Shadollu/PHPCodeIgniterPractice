<?php

Class LINEBOT extends CI_Controller{
 
    public function index()
    {
        $accessToken = 'myChannelAccessToken';

        $jsonString = file_get_contents('php://input');

        $file = fopen("D:\\PHP_Line_Log.txt","a+");

        fwrite($file,$jsonString."\n");

        $jsonObj = json_decode($jsonString);

        $event = $jsonObj->{"events"}[0];
        $type = $event->{"message"}->{"type"};
        $message = $event->{"message"};
        $replyToken = $event->{"replyToken"};

        $postData =[
          "replyToken" => $replyToken,
          "messages" => [
              [
                  "type" => "text",
                  "text" => $message->{"text"}
              ]
          ]
        ];

        fwrite($file,json_encode($postData)."\n");

        $ch = curl_init("https://api.line.me/v2/bot/message/reply");

        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($post_data));
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Authorization: Bearer '.$access_token
            //'Authorization: Bearer '. TOKEN
        ));

        $result = curl_exec($ch);
        fwrite($file, $result."\n");  
        fclose($file);
        curl_close($ch); 

    }
    
}


