<?php

class db_model extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
    }

    public function save_db($data)
    {
        date_default_timezone_set('Asia/Taipei');
        $datetime = date('Y-m-d');
        
        $db_data = array(
            'logtime' => $datetime,
            'result' => json_encode($data['result']),
            'result_status' => $data['status'],
            'message' => $data['message'],
        );

        return $this->db->insert('log', $db_data);
    }

    public function query_db($querystring)
    {
        $sql = "select * from log where logtime LIKE '%" . $this->db->escape_like_str($querystring['logtime']) . "%'";

        $query = $this->db->query($sql);
        $data['result'] = $query->result();


        $data['title'] = 'This is DB query result';

        return $data;
    }
}
