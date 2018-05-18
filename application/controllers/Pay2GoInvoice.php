<?php

//HashKey = BvaotUvHl1a0FoXSxe6u17S5yal1mVqO
//HashIV = r5N3p2Yjnw7UuEes
//A = 07628153,Allenlu,I + 44
//如果要Push到Heroku ： 1.變更Config的Baseurl,2.把Db_model相關的程式碼先註解調
Class Pay2GoInvoice extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
       // $this->load->model('Db_model');
        $this->load->model('Encrypt_data');
        $this->load->model('Linebot_model');
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
        

        $return_data = $this->Encrypt_data->postReq($get_array, $api_url);
        $this->index('result', $return_data);

        //$this->Db_model->insert_db($return_data);

        $this->Linebot_model->send_msg("U6ff789d36d6f22b7484a0ad6d8b32d5d", $return_data);
    }

    public function query_db($pagedata)
    {

        $getdata = $this->input->post(NULL, TRUE);
        $getdata['page'] = $pagedata;

        //$query = $this->Db_model->query_db($getdata);

        if ($pagedata == 'query_db_result') {
            $this->index('query_db_result', $query);
        } else {
            $this->index('edit_db', $query);
        }
    }

    public function comfirm_edit()
    {
        $data = $this->input->post(NULL, TRUE);

        switch ($data['submit']) {
            case 'edit':
                //這個元素只在Controller進行辨識,不需要送進model            
                unset($data['submit']);

               // $this->Db_model->update_db($data);
                break;

            case 'delete':
              //  $this->Db_model->delete_db($data['id']);
                break;
        }

        echo '<script language="javascript">';
        echo 'alert("data successfully edit")';
        echo '</script>';

        $this->index('query_db');
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

        $this->load->view('Template/header', $data);
        $this->load->view('pay2goinvoice/' . $page);
        $this->load->view('Template/footer');
    }
}
