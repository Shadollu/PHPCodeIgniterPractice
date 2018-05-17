<?php

class Encrypt_data extends CI_Model
{

    private function addpadding($string, $blocksize = 32)
    {
        $len = strlen($string);
        $pad = $blocksize - ($len % $blocksize);
        $string .= str_repeat(chr($pad), $pad);
        return $string;
    }

//excute the invoice Data. using curl
    private function curl_work($url = "", $parameter = "")
    {
        $curl_options = array(
            CURLOPT_URL => $url, CURLOPT_HEADER => false, CURLOPT_RETURNTRANSFER => true, CURLOPT_USERAGENT => "Google Bot",
            CURLOPT_FOLLOWLOCATION => true, CURLOPT_SSL_VERIFYPEER => FALSE, CURLOPT_SSL_VERIFYHOST => FALSE,
            CURLOPT_POST => "1", CURLOPT_POSTFIELDS => $parameter);

        $ch = curl_init();

        curl_setopt_array($ch, $curl_options);
        $result = curl_exec($ch);
        $retcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $curl_error = curl_errno($ch);

        curl_close($ch);

        $return_info = array("url" => $url,
            "send_parameter" => $parameter,
            "http_status" => $retcode,
            "curl_error_no" => $curl_error,
            "web_info" => $result
        );

        return $return_info;
    }

//encrypt the post data, post it to server.
    public function postReq($post_data_array, $postUrl)
    {
        $post_data_str = http_build_query($post_data_array);
        $Key = 'BvaotUvHl1a0FoXSxe6u17S5yal1mVqO';
        $iv = 'r5N3p2Yjnw7UuEes';

//encrypt it!
        $postData = trim(bin2hex(openssl_encrypt(
                    $this->addpadding($post_data_str), 'AES-256-CBC', $Key, OPENSSL_RAW_DATA | OPENSSL_ZERO_PADDING, $iv)));

        $MerchantID = '31027295';

        $transaction_data_array = array(
            "MerchantID_" => $MerchantID,
            "PostData_" => $postData
        );

        $transaction_data_str = http_build_query($transaction_data_array);

//get response data from server.
        $result = $this->curl_work($postUrl, $transaction_data_str);

        $jsonobj = json_decode($result['web_info']);

        $data['title'] = "執行結果";
        $data['status'] = $jsonobj->{'Status'};
        $data['message'] = $jsonobj->{'Message'};

        if ($jsonobj->{'Result'} != null) {
            $data['result'] = json_decode($jsonobj->{'Result'});
        } else {
            $data['result'] = ['查詢結果' => 'NULL'];
        }

        return $data;

//        $this->db_model->insert_db($data);
//        $this->index('result', $data);
    }
}
