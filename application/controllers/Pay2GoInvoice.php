<?php

//HashKey = BvaotUvHl1a0FoXSxe6u17S5yal1mVqO
//HashIV = r5N3p2Yjnw7UuEes
//A = 07628153,Allenlu,I + 44
Class Pay2GoInvoice extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function issue_invoice()
    {

        $get_post_value = ["TimeStamp" => time()];

        //$this->input->post(NULL,TRUE) 會返回所有post的資料
        $get_array = $this->input->post(NULL, TRUE);

        $final_data = array_merge($get_post_value, $get_array);

        //Create Invoice, if status = 1, the api will issue the invoice 
        //immediately; Otherwise, server will hold the invoice data until get 
        //another invoice touch request.

        $this->postReq($final_data, 'https://cinv.pay2go.com/API/invoice_issue');
    }

    public function touch_invoice()
    {

        $get_post_value = ["TimeStamp" => time()];

        //$this->input->post(NULL,TRUE) 會返回所有post的資料
        $get_array = $this->input->post(NULL, TRUE);

        $final_data = array_merge($get_post_value, $get_array);

        //touch Create Invoice that server have stack invoice file.
        $this->postReq($final_data, 'https://cinv.pay2go.com/API/invoice_touch_issue');
    }

    public function delete_invoice()
    {

        $get_post_value = ["TimeStamp" => time()];

        //$this->input->post(NULL,TRUE) 會返回所有post的資料
        $get_array = $this->input->post(NULL, TRUE);

        $final_data = array_merge($get_post_value, $get_array);

        ////Invalid Invoice
        $this->postReq($final_data, 'https://cinv.pay2go.com/API/invoice_invalid');
    }

    public function discount_invoice()
    {

        $get_post_value = ["TimeStamp" => time()];

        //$this->input->post(NULL,TRUE) 會返回所有post的資料
        $get_array = $this->input->post(NULL, TRUE);

        $final_data = array_merge($get_post_value, $get_array);

        //Invoice Get Discount
        $this->postReq($final_data, 'https://cinv.pay2go.com/API/allowance_issue');
    }

    public function query_invoice()
    {

        $get_post_value = ["TimeStamp" => time()];

        //$this->input->post(NULL,TRUE) 會返回所有post的資料
        $get_array = $this->input->post(NULL, TRUE);

        $final_data = array_merge($get_post_value, $get_array);

        ////Query Invoice
        $this->postReq($final_data, 'https://cinv.pay2go.com/API/invoice_search');
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

        $jsonobj = json_decode($result['web_info']);

        $jobj_status = $jsonobj->{'Status'};
        $jobj_message = $jsonobj->{'Message'};
        $jobj_Result = $jsonobj->{'Result'};

        $data['title'] = "執行結果";
        $data['status'] = $jobj_status;
        $data['message'] = $jobj_message;
        $data['result'] = json_decode($jobj_Result);

        $this->load->helper('form');
        $this->load->helper('url');

        $this->load->view('template/header', $data);
        $this->load->view('pay2goinvoice/result');
        $this->load->view('template/footer');
    }

    public function index($page = 'index')
    {
        $this->load->helper('form');
        $this->load->helper('url');

        if (!file_exists(APPPATH . 'views/pay2goinvoice/' . $page . '.php')) {
            // Whoops, we don't have a page for that!
            show_404();
        }


        $data['title'] = "This is e-Invoice Test";

        $this->load->view('template/header', $data);
        $this->load->view('pay2goinvoice/' . $page);
        $this->load->view('template/footer');
    }
}
