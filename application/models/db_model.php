<?php

class db_model extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
    }

    //insert data to database
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

    //query data from database
    public function query_db($querystring)
    {
        //自己寫sql command, 使用 escape_like_str來達成跳脫
//        $sql = "select * from log where logtime LIKE '%" . $this->db->escape_like_str($querystring['logtime']) . "%'";
//        $sql = $this->db->get('log');
//        $query = $this->db->query($sql);
//        
        //使用查詢生成器來組sql command

        if ($querystring['page'] == 'query_db_result') {
            $this->db->like('logtime', $querystring['logtime']);
        } else {
            $this->db->like('id', $querystring['page']);
        }

        $query = $this->db->get('log');

        $data['result'] = $query->result();
        $data['title'] = 'This is DB query result';

        return $data;
    }

    public function delete_db($id)
    {
        return $this->db->delete('log', array('id' => $id));
    }

    public function update_db($data)
    {
        $this->db->set($data);
        $this->db->insert('log');
    }
}
