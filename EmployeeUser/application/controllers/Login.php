<?php

defined('BASEPATH') OR exit('No direct script access allowed');
include('C:\xampp\htdocs\EmployeeUser\application\controllers\take_api.php');
class Login extends CI_Controller {

    public function __construct(){
        parent::__construct();
    }

    public function index()
    {
        $data=[
            'title'=>'Login'
        ];
        $this->load->view('template/login_header',$data);
        $this->load->view('login/index',$data);
        $this->load->view('template/footer');
    }
    public function validating(){
        $username=htmlspecialchars($this->input->post('username'));
        $password=htmlspecialchars($this->input->post('password'));
        $validusername=false;
        $validpass=false;
        $data=null;

        $apiUser=take_api::API('get','http://127.0.0.1:8000/api/User');
        foreach($apiUser['value'] as $item){
            if($item['username']==$username && $item['password']==sha1($password)){
                $validusername=true;
                $validpass=true;
                $data=[
                    'user'=>$item
                ];
            }
        }
        if($validpass && $validusername){
            $this->session->set_userdata('username',$data['user']['username']);
            $this->session->set_userdata('user_id',$data['user']['id']);
            
            redirect('User/home');
        }else{
            $data['message']="invalid username and password";
            $data['title']='login';
            $this->load->view('template/login_header',$data);
            $this->load->view('login/index',$data);
            $this->load->view('template/footer');
        }
    }
    public function logout(){
        $this->session->sess_destroy();
        redirect('Login','refresh');
    }

}

/* End of file Login.php */
