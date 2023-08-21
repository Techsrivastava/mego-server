<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller 
{

    public function __construct() 
    {
        parent::__construct();
		$this->load->helper('url'); 
        $this->load->database(); 
        $this->load->library('session');
        $this->load->model('Login_model');  
       
    }
	public function login()
	{
	    $data['title'] = 'Admin Login'; 
		$this->load->view('template/frontend_header',$data); 
        $this->load->view('frontend/login');
        $this->load->view('template/frontend_footer');
    } 
    public function dashboard()
    {
        $data['title'] = 'User Dashboard'; 
        $this->load->view('template/frontend_header',$data); 
        $this->load->view('userDashboard');
        $this->load->view('template/frontend_footer');
    } 
    public function register()
    {
        $data['title'] = 'Admin Login'; 
        $this->load->view('template/frontend_header',$data); 
        $this->load->view('frontend/register');
        $this->load->view('template/frontend_footer');
    }  

    public function login_auth() 
    {
		$data['title'] = 'User Authentication';      
        if(!empty($this->session->userdata('mfin_user_session'))){
        redirect(site_url('home'));
        }
        $data['password_error'] = $data['email_error'] = 0;
        $data['title'] = 'Login Page';
        $postData = $this->input->post();
        if (isset($postData['email'])) 
        {
            $email = $postData['email'];
            $password = $postData['password'];

            $emailExist = $this->Login_model->getUserList(array('count' => true, 'email' => $email));
            if ($emailExist) {
                $verifyLogin = $this->Login_model->getUserList(array('single' => true, 'email' => $email, 'password' =>MD5($password)));
                if(!empty($verifyLogin)){
                    $this->session->set_userdata('mfin_user_session',$verifyLogin);
                    redirect(site_url('user/dashboard'));
            }else{
                $data['password_error'] = 1;
            }
            } else {
                $data['email_error'] = 1;
            }
        }
        
                
        $this->load->view('Login', $data);
    }

    public function addUser() {
       
        $blank = "";

    
        $entry_date = date('Y-m-d h:i:s');
        $data = array(
            'name'         => $this->input->post('name'),
            'phone'        => $this->input->post('phone'),
            'email'        => $this->input->post('email'),                        
            'city'         => $this->input->post('city'),            
            'password'     => $this->input->post('password'),        
            'designation'  => $this->input->post('designation'),
            'user_type'  => '6',
            'register_date'  =>  date('Y-m-d'),
            'created_at'  => $entry_date,

            'designation'  => $this->input->post('designation'),
            'organization' => $this->input->post('organization'),
        );
        $insertedData = $this->Login_model->addRow('users',$data);
        $_SESSION['msg'] = "Data Submitted Successfully ";
        redirect(base_url('user/login'), 'refresh');
    }   

   
    public function logout()
    {
         $this->session->unset_userdata('mfin_session');
          redirect(site_url('Admin'));
    }

}
