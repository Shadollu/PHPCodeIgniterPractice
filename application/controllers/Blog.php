<?php

class Blog extends CI_Controller
{

    public function index()
    {
        $this->load->helper(array('form', 'url'));

        $this->load->library('form_validation');


        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required',
            array('required' => 'You Must provide a %s.'));

        $this->form_validation->set_rules('passconf', 'Password Confirmation', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('myform');
        } else {
            
            //its like asp.net mvc's viewData ...
            $data['username'] = $this->input->post('username');
            $data['email'] = $this->input->post('email');
            $this->load->view('formsuccess',$data);
            
            
        }
    }
}
