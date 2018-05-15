<?php

//HashKey = BvaotUvHl1a0FoXSxe6u17S5yal1mVqO
//HashIV = r5N3p2Yjnw7UuEes
//A = 07628153,Allenlu,I + 44
Class Pay2GoInvoice extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('db_model');
    }

    //get data from page, using CI's $this->input->post(NULL,TRUE) to get data array.
    public function get_data($page)
    {
        //$this->input->post(NULL,TRUE) 會返回所有post的資料
        $get_array = $this->input->post(NULL, TRUE);
        $get_array['TimeStamp'] = time();
        $api_url = '';

        switch ($page) {
            case "issue_invoice":
                $api_url = 'https://cinv.pay2go.com/API/invoice_issue';
                break;
            case 'touch_invoice':
                $api_url = 'https://cinv.pay2go.com/API/invoice_touch_issue';
                break;
            case 'delete_invoice':
                $api_url = 'https://cinv.pay2go.com/API/invoice_invalid';
                break;
            case 'discount_invoice':
                $api_url = 'https://cinv.pay2go.com/API/allowance_issue';
                break;
            case 'query_invoice':
                $api_url = 'https://cinv.pay2go.com/API/invoice_search';
                break;
            default:
                break;
        }
        $this->postReq($get_array, $api_url);
    }

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

    public function query_db()
    {
        $getdata = $this->input->post(NULL, TRUE);
        $this->index('query_db_result', $this->db_model->query_db($getdata));
    }

    //encrypt the post data, post it to server.
    private function postReq($post_data_array, $postUrl)
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

        $this->db_model->save_db($data);
        $this->index('result', $data);
    }

    //detect view
    public function index($page = 'index', $data = NULL)
    {
        $this->load->helper('form');
        $this->load->helper('url');

        if (!file_exists(APPPATH . 'views/pay2goinvoice/' . $page . '.php')) {
            // Whoops, we don't have a page for that!
            show_404();
        }

        if ($data == NULL) {
            $data['title'] = "This is e-Invoice Test";
        }

        $this->load->view('template/header', $data);
        $this->load->view('pay2goinvoice/' . $page);
        $this->load->view('template/footer');
    }
}
