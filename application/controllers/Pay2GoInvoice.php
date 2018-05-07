<?php

Class Pay2GoInvoice extends CI_Controller
{

    //HashKey = BvaotUvHl1a0FoXSxe6u17S5yal1mVqO
    //HashIV = r5N3p2Yjnw7UuEes

    public function index()
    {


        $post_create_invoice = [
            "RespondType" => 'JSON',
            "Version" => '1.4',
            "TimeStamp" => time(),
            //"TransNum",
            "MerchantOrderNo" => 'M0001',
            "Status" => '1',
            //CreateStatusTime,
            "Category" => 'B2C',
            "BuyerName" => 'somebody',
            //"BuyerUBN" => 25113939,
            "BuyerAddress" => 'Nangang Distinct, Taipei, Taiwan',
            //"BuyerEmail", => 'allen.lu@neweb.com.tw',
            //"CarrierType",
            //"CarrierNum",
            //"LoveCode",
            "PrintFlag" => 'Y',
            "TaxType" => '1',
            "TaxRate" => 5,
            //CustomerClearance,
            "Amt" => 490,
            //AmtSales,
            //AmtZero,
            //AmtFree,
            "TaxAmt" => 10,
            "TotalAmt" => 500,
            "ItemName" => 'TESTITEM1',
            "ItemCount" => 1,
            "ItemUnit" => 'piece',
            "ItemPrice" => 500,
            "ItemAmt" => 500,
            "ItemTaxType" => 1,
            "Comment" => "This is Pay2Go E-Ticket Api test"
        ];


        $post_delete_invoice = [
            "RespondType" => 'JSON',
            "Version" => '1.0',
            "TimeStamp" => time(),
            "InvoiceNumber" => 'ZR00000001',
            "InvalidReason" => 'Invalid test',
        ];



        //$this->postReq($post_create_invoice, 'https://cinv.pay2go.com/API/invoice_issue');
        $this->postReq($post_delete_invoice, 'https://cinv.pay2go.com/API/invoice_invalid');
    }

    //encrypt the post data.
    function addpadding($string, $blocksize = 32)
    {
        $len = strlen($string);
        $pad = $blocksize - ($len % $blocksize);
        $string .= str_repeat(chr($pad), $pad);
        return $string;
    }

    //excute the invoice Data. using curl
    function curl_work($url = "", $parameter = "")
    {
        $curl_options = array(
            CURLOPT_URL => $url,
            CURLOPT_HEADER => false,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_USERAGENT => "Google Bot",
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_SSL_VERIFYPEER => FALSE,
            CURLOPT_SSL_VERIFYHOST => FALSE,
            CURLOPT_POST => "1",
            CURLOPT_POSTFIELDS => $parameter
        );

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

    function postReq($post_data_array, $postUrl)
    {
        $post_data_str = http_build_query($post_data_array);
        $Key = 'BvaotUvHl1a0FoXSxe6u17S5yal1mVqO';
        $iv = 'r5N3p2Yjnw7UuEes';

        //encrypt it!
        $postData = trim(bin2hex(openssl_encrypt($this->addpadding($post_data_str), 'AES-256-CBC', $Key, OPENSSL_RAW_DATA | OPENSSL_ZERO_PADDING, $iv)));


        $MerchantID = '31027295';

        $transaction_data_array = array(
            "MerchantID_" => $MerchantID,
            "PostData_" => $postData
        );

        $transaction_data_str = http_build_query($transaction_data_array);
        $result = $this->curl_work($postUrl, $transaction_data_str);


        print_r($result["web_info"]);
    }
}
