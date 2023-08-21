<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller 
{

    public function __construct() 
    {
        parent::__construct();
		$this->load->helper('url'); 
        $this->load->database(); 
        $this->load->library('session');
        $this->load->model('Model_admin_auth');  
        $this->load->model('Model_admin');
        $this->load->model('Api_model');    
        
        $this->load->model('Data_model');
    }
	public function index()
	{
	    $data['title'] = 'Admin Login'; 
		$this->load->view('alogin', $data);
    }   

    public function admin_login_auth() 
    {
		$data['title'] = 'Admin Authentication';             
       
        $data['password_error'] = $data['email_error'] = 0;
        $data['title'] = 'Admin Page';
        $postData = $this->input->post();
        if (isset($postData['email'])) {
            $email = $postData['email'];
            $password = $postData['password']; 

            $emailExist = $this->Model_admin_auth->getUserList(array('email' => $email));
            //print_r($emailExist); exit;
            if ($emailExist) 
            {
                //print_r($emailExist); exit;
            $verifyLogin = $this->Model_admin_auth->logincheck(array('single' => true, 'email' => $email, 'password' =>MD5($password)));
           
            if($verifyLogin=='1')
            {   
           //  echo $verifyLogin; exit;    
                    $userData= $this->Model_admin_auth->getUserData($email);
                    $token=substr(md5(uniqid(rand(), true)), 0, 32);
                        $session_data = array(
                        'USER_ID' => $userData->PR_EMPLOYEE_ID,
                        'token' => $token,
                        'NAME' => $userData->PR_NAME,
                        'ROLE_NAME' => $userData->ROLE_NAME,
                        'IMAGE' => $userData->PR_IMAGE,
                        'EMAIL' => $userData->PR_EMAIL,
                        'PHONE' => $userData->PR_PHONE,
                        'ROLE_ID' => $userData->PR_DESIGNATION_ID
                        );
                    $this->session->set_userdata('user_session',$session_data);
                    redirect(base_url('admin/dashboard?token='.$token));
            }else{
                $data['password_error'] = 1;
                $_SESSION['msg'] = "Wrong Password ! Please try again";
            }
            } else {
                $data['email_error'] = 1;
                $_SESSION['msg'] = "User does not exist ! Please try again";
            }
        }        
                
        $this->load->view('alogin', $data);
        $_SESSION['msg'] = "Welcome to Job Portal ";

    }

    public function dashboard() 
    {
        //print_r($this->session->userdata('user_session')); exit;
            if($this->input->get('token')==$this->session->userdata['user_session']['token'])
            {              
                $data['title'] = 'Admin Dashboard';   
                $data['menu'] = $this->Model_admin->getUserMenuData(array('IS_VIEW' => 'w'));
                $this->load->view('template/admin_header',$data); 
                $this->load->view('admin/dashboard');
                $this->load->view('template/admin_footer');
            }
            else
            {
                redirect(site_url('admin/admin_login_auth'));
            
            }
    }
    public function companies() 
    {
        $data['title'] = 'Menu Add';   
        $data['menu'] = $this->Model_admin->getUserMenuData(array('IS_VIEW' => 'w'));   
        $data['companyList'] = $this->Data_model->getCompanyList();     
        $this->load->view('template/admin_header',$data); 
        $this->load->view('company');
        $this->load->view('template/admin_footer');
    }
    public function users() 
    {
        $data['title'] = 'Menu Add';   
        $data['menu'] = $this->Model_admin->getUserMenuData(array('IS_VIEW' => 'w'));   
        $data['usersList'] = $this->Data_model->getUsersList();       
        $this->load->view('template/admin_header',$data); 
        $this->load->view('users');
        $this->load->view('template/admin_footer');
    }
    public function jobs() 
    {
        $data['title'] = 'Menu Add';   
        $data['menu'] = $this->Model_admin->getUserMenuData(array('IS_VIEW' => 'w'));   
        $data['jobsList'] = $this->Data_model->getJobsList();     
        $this->load->view('template/admin_header',$data); 
        $this->load->view('jobs');
        $this->load->view('template/admin_footer');
    }
   
    public function logout()
    {
         $this->session->unset_userdata('user_session');
          redirect(site_url('admin'));
    }
    
    public function checkout() 
    {
        error_reporting(0);
        $EMPLOYEE_CODE=$_REQUEST['EMPLOYEE_CODE'];
        $PACKAGE_ID=$_REQUEST['PACKAGE_ID'];
        
        $data['PACKAGE']= $this->Api_model->getPackageData(array('PACKAGE_ID' => $PACKAGE_ID));
        $data['USERDATA']= $this->Api_model->getUserData(array('EMPLOYEE_ID' => $EMPLOYEE_CODE));
        $data['title'] = 'Package Chekout';   
        $this->load->view('checkout',$data);
          
    }
    public function payment_response() 
	{
	     error_reporting(0);
			$data['title'] = 'Payment';  
			//print_r($_REQUEST); 
			$insert = $this->Api_model->savePaymentRespdata($_REQUEST);
        	$order_id=$insert; 
           // $userData = $this->Model_admin_auth->getUserList(array('single' => true, 'id' =>$_REQUEST['user_id']));
             $entry_date = date('Y-m-d');
        	if($_REQUEST['txStatus']=='SUCCESS')
        	{
            // $r=$this->session->userdata('saloon_session')->id;

            // $this->Payment_model->updateRow('user_services',array('PR_STATUS'=>'2'),array('PR_USER_ID'=>$r));

	        $this->load->view('paymentsuccess',$_REQUEST);
        	}
		
	}
	

}
