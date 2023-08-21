<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {


    public function __construct() {
        parent::__construct();
        // $this->load->library('phpqrcode/qrlib');
        // $this->load->library("Pdf");  
        $this->load->model('Recruiter_model');      
        // require_once APPPATH . 'third_party/PHPExcel.php';
        // $this->excel = new PHPExcel();
         
    }
 
    public function index() 
    {
        $data['title'] = 'Recruiter Dashboard';
        //print_r($this->session->userdata()); exit;
        //$data['menu'] = $this->Employee->getUserMenuData1(array('ROLE_ID' => '1', 'IS_VIEW' => 'w'));    
        //$this->load->view('template/header', $data);
        $this->load->view('recruiter/login', $data);
        //$this->load->view('template/footer', $data);
    }
   



 public function login_auth() 
    {
        $this->session->unset_userdata('user_session');
        $data['title'] = 'Authentication';             
      
        $data['password_error'] = $data['email_error'] = 0;
        $data['title'] = 'Admin Page';
        $postData = $this->input->post();
        $redId=$postData['jid']; //exit;
        if (isset($postData['email'])) {
            $email = $postData['email'];
            $password = $postData['password']; 

            $emailExist = $this->Recruiter_model->getUserList(array('email' => $email,'ROLE'=>'5'));
           // print_r($emailExist); exit;
            if ($emailExist) 
            {
            $verifyLogin = $this->Recruiter_model->logincheck(array('single' => true, 'email' => $email, 'password' =>MD5($password)));
            if($verifyLogin=='true')
            {       
                    $userData= $this->Recruiter_model->getUserData($email);
                    $token=substr(md5(uniqid(rand(), true)), 0, 32);
                        $session_data = array(
                        'USER_ID' => $userData->PR_EMPLOYEE_ID,
                        'COMPANY_ID' => $userData->PR_COMPANY_ID,
                        'token' => $token,
                        'NAME' => $userData->PR_NAME,
                        'ROLE_NAME' => $userData->ROLE_NAME,
                        'IMAGE' => $userData->PR_IMAGE,
                        'EMAIL' => $userData->PR_EMAIL,
                        'PHONE' => $userData->PR_PHONE,
                        'ROLE_ID' => $userData->PR_ROLE_ID,
                        'CURRENT_PASSWORD'=>$userData->PR_PASSWORD,
                        );
                    $this->session->set_userdata('user_session',$session_data);
                    if($userData->PR_ROLE_ID=="5")
                    {
                        if($redId)
                        {
                            redirect(base_url().'job-Details?jid='.$redId);
                        }
                        else
                        {

                        redirect(base_url('web?token='.$token));

                        }
                       // $this->load->view('web', $data);
                    }
                    else
                    {
                    redirect(base_url('recruiter?token='.$token));
                    }
            }else{
                $data['password_error'] = 1;
                $_SESSION['msg'] = "Wrong Password ! Please try again";
                redirect(base_url('recruiter'));
            }
            } else {
                $data['email_error'] = 1;
                $_SESSION['msg'] = "User does not exist ! Please try again";
                 redirect(base_url());
            }
        }        
        
        
            $this->load->view('web/recruiter', $data);
        //}
        

        
        $_SESSION['msg'] = "Welcome to VcareJobs ";

    }

 public function rec_login_auth() 
    {
        $this->session->unset_userdata('user_session');
        $data['title'] = 'Authentication';             
       
        $data['password_error'] = $data['email_error'] = 0;
        $data['title'] = 'Admin Page';
        $postData = $this->input->post();
        if (isset($postData['email'])) {
            $email = $postData['email'];
            $password = $postData['password']; 

            $emailExist = $this->Recruiter_model->getUserList222(array('email' => $email,'ROLE'=>'2'));
           // print_r($emailExist); exit;
            if ($emailExist) 
            {
            $verifyLogin = $this->Recruiter_model->logincheck(array('single' => true, 'email' => $email, 'password' =>MD5($password)));
            if($verifyLogin=='true')
            {       
                    $userData= $this->Recruiter_model->getUserData($email);
                    $token=substr(md5(uniqid(rand(), true)), 0, 32);
                        $session_data = array(
                        'USER_ID' => $userData->PR_EMPLOYEE_ID,
                        'COMPANY_ID' => $userData->PR_COMPANY_ID,
                        'token' => $token,
                        'NAME' => $userData->PR_NAME,
                        'EMPLOYEE_STATUS' => $userData->PR_EMPLOYEE_STATUS,
                        'ROLE_NAME' => $userData->ROLE_NAME,
                        'IMAGE' => $userData->PR_IMAGE,
                        'EMAIL' => $userData->PR_EMAIL,
                        'PHONE' => $userData->PR_PHONE,
                        'ROLE_ID' => $userData->PR_ROLE_ID,
                        'CURRENT_PASSWORD'=>$userData->PR_PASSWORD,
                        );
                    $this->session->set_userdata('user_session',$session_data);
                    if($userData->PR_ROLE_ID=="5")
                    {
                        redirect(base_url('web?token='.$token));
                       // $this->load->view('web', $data);
                    }
                    else
                    {
                    redirect(base_url('recruiter?token='.$token));
                    }
            }else{
                $data['password_error'] = 1;
                $_SESSION['msg'] = "Wrong Password ! Please try again";

                redirect(base_url('Recruiter-login'));
            }
            } else {
                $data['email_error'] = 1;
                $_SESSION['msg'] = "Employer does not exist ! Please try again";
                redirect(base_url('Recruiter-login'));
            }
        }        
        
        
            $this->load->view('web/recruiter', $data);
        //}
        

        
        $_SESSION['msg'] = "Welcome to VcareJobs ";

    }

    public function admin_login_auth() 
    {
        $this->session->unset_userdata('user_session');
        $data['title'] = 'Authentication';              
       
        $data['password_error'] = $data['email_error'] = 0;
        $data['title'] = 'Admin Page';
        $postData = $this->input->post();
        if (isset($postData['email'])) {
            $email = $postData['email'];
            $password = $postData['password']; 

            $emailExist = $this->Recruiter_model->getUserList222(array('email' => $email,'ROLE'=>'1'));
           // print_r($emailExist); exit;
            if ($emailExist) 
            {
            $verifyLogin = $this->Recruiter_model->logincheck(array('single' => true, 'email' => $email, 'password' =>$password));
            if($verifyLogin=='true')
            {       
                    $userData= $this->Recruiter_model->getUserData($email);
                    $token=substr(md5(uniqid(rand(), true)), 0, 32);
                        $session_data = array(
                        'USER_ID' => $userData->PR_EMPLOYEE_ID,
                        'COMPANY_ID' => $userData->PR_COMPANY_ID,
                        'token' => $token,
                        'NAME' => $userData->PR_NAME,
                        'EMPLOYEE_STATUS' => $userData->PR_EMPLOYEE_STATUS,
                        'ROLE_NAME' => $userData->ROLE_NAME,
                        'IMAGE' => $userData->PR_IMAGE,
                        'EMAIL' => $userData->PR_EMAIL,
                        'PHONE' => $userData->PR_PHONE,
                        'ROLE_ID' => $userData->PR_ROLE_ID,
                        'CURRENT_PASSWORD'=>$userData->PR_PASSWORD,
                        );
                    $this->session->set_userdata('user_session',$session_data);
                    
                    redirect(base_url('admin/dashboard?token='.$token));
                    
            }else{
                $data['password_error'] = 1;
                $_SESSION['msg'] = "Wrong Password ! Please try again";

                redirect(base_url('admin'));
            }
            } else {
                $data['email_error'] = 1;
                $_SESSION['msg'] = "Employer does not exist ! Please try again";
                redirect(base_url('admin'));
            }
        }        
        
        
            $this->load->view('admin/login', $data);
        //}
        

        
        $_SESSION['msg'] = "Welcome to Mego Dashboard ";

    }


    public function logout()
    {
         $this->session->unset_userdata('user_session');
     
        header("Refresh:0");
        redirect(base_url());
    }
 

    
  

}
