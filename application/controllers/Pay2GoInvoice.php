<?php

Class Pay2GoInvoice extends CI_Controller
{

    //HashKey = BvaotUvHl1a0FoXSxe6u17S5yal1mVqO
    //HashIV = r5N3p2Yjnw7UuEes
    //A = 07628153,Allenlu,I + 44

    public function index()
    {

        $post_create_invoice = [
            "RespondType" => 'JSON',
            "Version" => '1.4',
            "TimeStamp" => time(),
            //"TransNum",
            "MerchantOrderNo" => 'M0006',
            "Status" => '1',
            //CreateStatusTime,
            "Category" => 'B2C',
            "BuyerName" => 'Allen touch test',
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
            "ItemName" => 'milk',
            "ItemCount" => 1,
            "ItemUnit" => 'piece',
            "ItemPrice" => 500,
            "ItemAmt" => 500,
            "ItemTaxType" => 1,
            "Comment" => "Touch Test"
        ];

        //step 1.create invoice, status must be '0', its mean that invoice 
        //is ready to issue. platform just saves stack file.
        //step 2. touch the stack file, then issue the invoice.
        $post_create_invoice_touch = [
            "RespondType" => 'JSON',
            "Version" => '1.0',
            "TimeStamp" => time(),
            //TransNum,
            "InvoiceTransNo" => '18050811232477700',
            "MerchantOrderNo" => 'M0005',
            "TotalAmt" => 500
        ];



        $post_delete_invoice = [
            "RespondType" => 'JSON',
            "Version" => '1.0',
            "TimeStamp" => time(),
            "InvoiceNumber" => 'ZR00000001',
            "InvalidReason" => 'Invalid test',
        ];

        $post_discount_invoice = [
            "RespondType" => 'JSON',
            "Version" => '1.3',
            "TimeStamp" => time(),
            "InvoiceNo" => 'ZR00000002',
            "MerchantOrderNo" => 'M0002',
            "ItemName" => 'TESTITEM1',
            "ItemCount" => 1,
            "ItemUnit" => 'piece',
            "ItemPrice" => 500,
            "ItemAmt" => 500,
            "TaxTypeForMixed" => 1,
            "ItemTaxAmt" => 0,
            "TotalAmt" => 500,
            "Status" => 1
        ];




        $post_query_invoice = [
            "RespondType" => 'JSON',
            "Version" => '1.1',
            "TimeStamp" => time(),
            "SearchType" => '0',
            "MerchantOrderNo" => 'M0003',
            "TotalAmt" => 500,
            "InvoiceNumber" => 'ZR00000003',
            "RandomNum" => '8204',
            "DisplayFlag" => '0'
        ];


        //Create Invoice, if status = 1, the api will issue the invoice 
        //immediately; Otherwise, server will hold the invoice data until get 
        //another invoice touch request.
        //$this->postReq($post_create_invoice, 'https://cinv.pay2go.com/API/invoice_issue');
        //
        //touch Create Invoice that server have stack invoice file.
        // $this->postReq($post_create_invoice_touch, 'https://cinv.pay2go.com/API/invoice_touch_issue');
        // 
        ////Invalid Invoice
        //$this->postReq($post_delete_invoice, 'https://cinv.pay2go.com/API/invoice_invalid');
        //
        //Invoice Get Discount
        //$this->postReq($post_discount_invoice, 'https://cinv.pay2go.com/API/allowance_issue');
        //
        ////Query Invoice
        $this->postReq($post_query_invoice, 'https://cinv.pay2go.com/API/invoice_search');
    }

    public function postdata()
    {

        $post_create_invoice = [
            "RespondType" => $this->input->post('RespondType'),
            "Version" => $this->input->post('Version'),
            "TimeStamp" => time(),
            //"TransNum",
            "MerchantOrderNo" => $this->input->post('MerchantOrderNo'),
            "Status" => $this->input->post('Status'),
            //CreateStatusTime,
            "Category" => $this->input->post('Category'),
            "BuyerName" => $this->input->post('BuyerName'),
            //"BuyerUBN" => 25113939,
            "BuyerAddress" => $this->input->post('BuyerAddress'),
            //"BuyerEmail", => 'allen.lu@neweb.com.tw',
            //"CarrierType",
            //"CarrierNum",
            //"LoveCode",
            "PrintFlag" => $this->input->post('PrintFlag'),
            "TaxType" => $this->input->post('TaxType'),
            "TaxRate" => $this->input->post('TaxRate'),
            //CustomerClearance,
            "Amt" => $this->input->post('Amt'),
            //AmtSales,
            //AmtZero,
            //AmtFree,
            "TaxAmt" => $this->input->post('TaxAmt'),
            "TotalAmt" => $this->input->post('TotalAmt'),
            "ItemName" => $this->input->post('ItemName'),
            "ItemCount" => $this->input->post('ItemCount'),
            "ItemUnit" => $this->input->post('ItemUnit'),
            "ItemPrice" => $this->input->post('ItemPrice'),
            "ItemAmt" => $this->input->post('ItemAmt'),
            "ItemTaxType" => $this->input->post('ItemTaxType'),
            "Comment" => $this->input->post('Comment')
        ];


        $this->postReq($post_create_invoice, 'https://cinv.pay2go.com/API/invoice_issue');
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
        $postData = trim(bin2hex(openssl_encrypt(
                    $this->addpadding($post_data_str), 'AES-256-CBC', $Key, OPENSSL_RAW_DATA | OPENSSL_ZERO_PADDING, $iv)));


        $MerchantID = '31027295';

        $transaction_data_array = array(
            "MerchantID_" => $MerchantID,
            "PostData_" => $postData
        );

        $transaction_data_str = http_build_query($transaction_data_array);
        $result = $this->curl_work($postUrl, $transaction_data_str);


        print_r($result["web_info"]);
    }

    public function view($page = 'index')
    {
        $this->load->helper('form');

        if (!file_exists(APPPATH . 'views/pay2goinvoice/' . $page . '.php')) {
            // Whoops, we don't have a page for that!
            show_404();
        }


        $data['title'] = "this is eInvoice test";

        $this->load->view('template/header', $data);
        $this->load->view('pay2goinvoice/' . $page);
        $this->load->view('template/footer');
    }
}
