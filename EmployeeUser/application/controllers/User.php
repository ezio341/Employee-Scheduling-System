<?php

defined('BASEPATH') OR exit('No direct script access allowed');
include('C:\xampp\htdocs\EmployeeUser\application\controllers\take_api.php');
class User extends CI_Controller {

    public function __construct(){
        parent::__construct();
        if($this->session->userdata('username')==null){
            redirect('Login', 'refresh');
        }
    }
    public function home(){
        $data=['title'=>'Home'];
        $this->load->view('template/header',$data);
        $this->load->view('home');
        $this->load->view('template/footer');
    }
    public function index()
    {
        $user_id=$this->session->userdata('user_id');
        $data=[
            'title'=>'User Profile',
            'user'=>take_api::API('get', 'http://127.0.0.1:8000/api/Emp/user/'.$user_id),
            'acc'=>take_api::API('get', 'http://127.0.0.1:8000/api/User/'.$user_id)
        ];
        $this->load->view('template/header',$data);
        $this->load->view('user/index',$data);
        $this->load->view('template/footer');
    }
    public function edit(){
        $user_id=$this->session->userdata('user_id');
        $data=[
            'title'=>'Edit Your Profile',
            'user'=>take_api::API('get', 'http://127.0.0.1:8000/api/Emp/user/'.$user_id),
            'acc'=>take_api::API('get', 'http://127.0.0.1:8000/api/User/'.$user_id)
        ];
        $this->form_validation->set_rules('name','Name', 'required');
        $this->form_validation->set_rules('age','Age', 'required|numeric');
        $this->form_validation->set_rules('address','Address', 'required');
        $this->form_validation->set_rules('email','Email', 'required|valid_email');

        if($this->form_validation->run()){
            $this->session->set_flashdata('edit_status', true);
            $dataset=[
                'name'=>$this->input->post('name'),
                'age'=>$this->input->post('age'),
                'address'=>$this->input->post('address'),
                'email'=>$this->input->post('email')
            ];
            take_api::API('put','http://127.0.0.1:8000/api/User/update/'.$user_id, $dataset);
            take_api::API('put','http://127.0.0.1:8000/api/Emp/update/'.$user_id, $dataset);
            $this->session->set_flashdata('status', 'Data has been modified');

            redirect('User', 'refresh');
        }else{
            $this->load->view('template/header',$data);
            $this->load->view('user/edit',$data);
            $this->load->view('template/footer');
        }
    }
    public function change_pass(){
        $data=[
            'title'=>'Change Password'
        ];
        $this->form_validation->set_rules('oldpass','Old Password', 'required');
        $this->form_validation->set_rules('newpass','New Password', 'required');
        $this->form_validation->set_rules('confirmpass','Confirm Password', 'required');

        if($this->form_validation->run())
		{

            $user_id=$this->session->userdata('user_id');
			$old_pass=$this->input->post('oldpass');
			$new_pass=$this->input->post('newpass');
			$confirm_pass=$this->input->post('confirmpass');
            $pass=take_api::API('get','http://127.0.0.1:8000/api/User/'.$user_id);
            foreach($pass['value'] as $pass);
			$pass=$pass['password'];
			if((!strcmp(sha1($old_pass), $pass))&& (!strcmp($new_pass, $confirm_pass))){
                $dataset=[
                    'password'=>sha1($new_pass)
                ];
                take_api::API('put', 'http://127.0.0.1:8000/api/User/update/'.$user_id,$dataset);
                $this->session->set_flashdata('status', 'Password has been changed');
                redirect('user', 'refresh');
			}
			else{
                $this->session->set_flashdata('status', 'Invalid Password or The Password Different');
			}
        }
        $this->load->view('template/header',$data);
        $this->load->view('user/changepass',$data);
        $this->load->view('template/footer');
    }
}

/* End of file User.php */