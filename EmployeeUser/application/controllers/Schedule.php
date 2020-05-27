<?php

defined('BASEPATH') OR exit('No direct script access allowed');
include('C:\xampp\htdocs\EmployeeUser\application\controllers\take_api.php');
class Schedule extends CI_Controller {

    public function __construct(){
        parent::__construct();
        if($this->session->userdata('username')==null){
            redirect('Login', 'refresh');
        }
    }
    public function index()
    {
        $user_id=$this->session->userdata('user_id');
        $data=[
            'title'=>'Schedule List',
            'user'=>take_api::API('get','http://127.0.0.1:8000/api/Emp/user/'.$user_id),
            'schedule'=>take_api::API('get','http://127.0.0.1:8000/api/Schedule/user/'.$user_id)
        ];
        $this->load->view('template/header',$data);
        $this->load->view('schedule/index',$data);
        $this->load->view('template/footer');
    }
}

/* End of file Schedule.php */
