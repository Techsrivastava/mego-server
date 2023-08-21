<?php
defined('BASEPATH') OR exit('No direct script access allowed'); 

class Admin extends CI_Controller { 

    public function __construct()   
    {
        parent::__construct(); 
       // $this->load->library('phpqrcode/qrlib');
      //  $this->load->library("Pdf");  
        $this->load->model('Recruiter_model');   
        $this->load->model('Admin_model'); 
        $this->load->model('Api_model');      
      //  require_once APPPATH . 'third_party/PHPExcel.php';
        //$this->excel = new PHPExcel();         
    } 
   public function index() 
    {
        $data['title'] = 'Mego | Dashboard';        
       // $this->load->view('template/adminPageHead', $data);    
        $this->load->view('admin/login', $data);
     //   $this->load->view('template/adminPageFooter', $data);
    } 
 public function login_auth() 
    {
        $data['title'] = 'Authentication';             
       
        $data['password_error'] = $data['email_error'] = 0;
        $data['title'] = 'Admin Page';
        $postData = $this->input->post();
        if (isset($postData['email'])) {
            $email = $postData['email'];
            $password = $postData['password']; 

            $emailExist = $this->Recruiter_model->getUserList(array('email' => $email));
           // print_r($emailExist); exit;
            if ($emailExist) 
            {
            $verifyLogin = $this->Recruiter_model->logincheck(array('single' => true, 'email' => $email, 'password' =>MD5($password)));
            //echo $verifyLogin; exit;
            if($verifyLogin=="true")
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
                        'ROLE_ID' => $userData->PR_DESIGNATION_ID
                        );
                    $this->session->set_userdata('user_session',$session_data);
                    redirect(base_url('recruiter?token='.$token));
            }else{
                $data['password_error'] = 1;
                $_SESSION['msg'] = "Wrong Password ! Please try again";
                redirect(base_url('Recruiter-login')."?token=".$token);

            }
            } else {
                $data['email_error'] = 1;
                $_SESSION['msg'] = "User does not exist ! Please try again";
                 redirect(base_url('Recruiter-login')."?token=".$token);
            }
        }        
                
        $this->load->view('admin_login', $data);
        $_SESSION['msg'] = "Welcome to SAMPARK ";

    }


    public function dashboard() 
    {
        $data['title'] = 'Mego | Dashboard';
        $data['users'] = $this->Admin_model->getUsersList(); 
        $data['activeusers'] = $this->Admin_model->getUsersListSts(array('STATUS'=>'1'));
        $data['inactiveusers'] = $this->Admin_model->getUsersListSts(array('STATUS'=>'0')); 
        $data['package'] = $this->Admin_model->getPackageList();  

        $this->load->view('template/adminPageHead', $data);    
        $this->load->view('admin/dashboard', $data);
        $this->load->view('template/adminPageFooter', $data);
    }
    public function salesEnquiry() 
    {
        $data['title'] = 'Mego | Sales Enquiry'; 
        $data['enquiry'] = $this->Admin_model->getQueryList(array('SEARCH_BY'=>'salesenquiry'));       
        $this->load->view('template/adminPageHead', $data);    
        $this->load->view('admin/salesEnquiry', $data);
        $this->load->view('template/adminPageFooter', $data);
    }
    public function contactus() 
    {
        $data['title'] = 'Mego | Contact Us'; 
        $data['enquiry'] = $this->Admin_model->getQueryList(array('SEARCH_BY'=>'contactus'));        
        $this->load->view('template/adminPageHead', $data);    
        $this->load->view('admin/contactus', $data);
        $this->load->view('template/adminPageFooter', $data);
    }
    public function users() 
    {
        $data['title'] = 'Mego | Users';    
        $data['users'] = $this->Admin_model->getUsersList(array('SEARCH_BY'=>'5'));    
        $this->load->view('template/adminPageHead', $data);    
        $this->load->view('admin/users', $data);
        $this->load->view('template/adminPageFooter', $data);
    }
    public function getLikedList() 
    {
        $data['title'] = 'Mego | Liked List';  
        $id=$this->uri->segment(3);   
        $data['users'] = $this->Admin_model->getUsersFriendList(array('USER_ID'=>$id));    
        $this->load->view('template/adminPageHead', $data);    
        $this->load->view('admin/friendList', $data);
        $this->load->view('template/adminPageFooter', $data);
    }
     public function updateEmployersts() 
    {
        $employerId=$this->input->post('employerId');
        $sts=$this->input->post('sts');
        $this->Admin_model->updateRow('pr_users',array('PR_STATUS'=>$sts),array('PR_USER_ID'=>$employerId));
        
        $_SESSION['msg'] = "Status updated successfully";       
        
        
    }
     public function updatePackagests() 
    {
        $packageId=$this->input->post('packageId');
        $sts=$this->input->post('sts');
        $this->Admin_model->updateRow('pr_employee',array('STATUS'=>$sts),array('PACKAGE_ID'=>$packageId));
        
        $_SESSION['msg'] = "Status updated successfully";       
        
        
    }
    public function deletePackage() 
    {
        $packageId=$this->input->post('packageId');
       
        $this->Recruiter_model->deleteRow('pr_package',array('PR_PACKAGE_ID'=>$packageId));
        $_SESSION['msg'] = "Package Deleted Successfully ";
        
        return true;
    }
    public function deleteUser() 
    {
        $userId=$this->input->post('userId');
       
        $this->Recruiter_model->deleteRow('pr_users',array('PR_USER_ID'=>$userId));
        $_SESSION['msg'] = "User Deleted Successfully ";
        
        return true;
    }
    public function package() 
    {
        $data['title'] = 'Mego | Package';     
        $data['packages'] = $this->Admin_model->getPackageList();    
        $this->load->view('template/adminPageHead', $data);    
        $this->load->view('admin/package', $data);
        $this->load->view('template/adminPageFooter', $data);
    }
    public function submitPackage()
    {
        $tdate=date('Y-m-d h:i:s');
        $packageId=$this->input->post('packageID');
        if($packageId)
        {
         $data = array(            
            'PR_PACKAGE_NAME' => $this->input->post('package'),
            'PR_PACKAGE_DESC' => $this->input->post('packageDesc'),           
            'PR_DURATION'=>$this->input->post('validity'),      
            'PR_STATUS'=>$this->input->post('status'),
            'PR_PRICE'=>$this->input->post('price'),
            'PR_ENTRY_DATE'=>$tdate,
        );
        $packageTid=$this->Admin_model->updateRow('pr_package',$data,array('PR_PACKAGE_ID'=>$packageId));  
        if($packageTid)
        {
           $_SESSION['msg'] = "Package Updated Successfully"; 
        }
        else
        {
            $_SESSION['msg'] = "Something went wrong,Please try again";
        }

    }
    else
    {
        $data = array(            
             'PR_PACKAGE_NAME' => $this->input->post('package'),
            'PR_PACKAGE_DESC' => $this->input->post('packageDesc'),           
            'PR_DURATION'=>$this->input->post('validity'),      
            'PR_STATUS'=>$this->input->post('status'),
            'PR_PRICE'=>$this->input->post('price'),
            'PR_ENTRY_DATE'=>$tdate,
        );
        $packageTid=$this->Admin_model->addRow('pr_package',$data);  
        if($packageTid)
        {
           $_SESSION['msg'] = "Package Added Successfully"; 
        }
        else
        {
            $_SESSION['msg'] = "Something went wrong,Please try again";
        }
        
      }  
        redirect(base_url('admin/package'));
    }














    public function industry() 
    {
        $data['title'] = 'Mego | Dashboard';        
        $data['industryList'] = $this->Admin_model->getIndustryList();   
        $data['departmentList'] = $this->Admin_model->getDepartmentList(); 
        $data['designationList'] = $this->Admin_model->getDesignationList();   
        $data['skillsList'] = $this->Admin_model->getSkillsList();     
        $this->load->view('template/adminPageHead', $data);    
        $this->load->view('admin/industry', $data);
        $this->load->view('template/adminPageFooter', $data);
    }
    public function sales() 
    {
        $data['title'] = 'Mego | Dashboard';        
        $this->load->view('template/adminPageHead', $data);    
        $this->load->view('admin/industry', $data);
        $this->load->view('template/adminPageFooter', $data);
    }
    public function usersList() 
    {
        $data['title'] = 'Mego | Dashboard';        
        $this->load->view('template/adminPageHead', $data);    
        $this->load->view('admin/industry', $data);
        $this->load->view('template/adminPageFooter', $data);
    }

    public function companyList() 
    {
        $data['title'] = 'Mego | Dashboard';        
        $this->load->view('template/adminPageHead', $data);    
        $this->load->view('admin/industry', $data);
        $this->load->view('template/adminPageFooter', $data);
    }

    public function packageList() 
    {
        $data['title'] = 'Mego | Dashboard';        
        $this->load->view('template/adminPageHead', $data);    
        $this->load->view('admin/industry', $data);
        $this->load->view('template/adminPageFooter', $data);
    }

 public function complainList() 
    {
        $data['title'] = 'Mego | Complain ';  
        $data['complain'] = $this->Admin_model->getUserComplainList();        
        $this->load->view('template/adminPageHead', $data);    
        $this->load->view('admin/complainList', $data);
        $this->load->view('template/adminPageFooter', $data);
    }

 
    public function getIndustryData()
    {
        $id=$this->uri->segment(3);
        $Data= $this->Admin_model->getIndustryList(array('INDUSTRY_ID'=>$id,'rowData'=>'single')); 
        echo json_encode($Data);   
    } 


  public function checkout() 
    {
        error_reporting(0);
        $EMPLOYEE_CODE=$_REQUEST['EMPLOYEE_CODE'];
        $PACKAGE_ID=$_REQUEST['PACKAGE_ID'];
        
        $data['PACKAGE']= $this->Api_model->getPackageTrData(array('PACKAGE_ID' => $PACKAGE_ID));
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


    public function licence() 
    {
        error_reporting(0);       
        $this->load->view('outer/licence',$data);
          
    }
    public function help() 
    {
        error_reporting(0);       
        $this->load->view('outer/help_support',$data);
          
    }
    public function community_guide() 
    {
        error_reporting(0);       
        $this->load->view('outer/community_guide',$data);
          
    }
    public function safety_tips() 
    {
        error_reporting(0);       
        $this->load->view('outer/safety_tips',$data);
          
    }
    public function safety_center() 
    {
        error_reporting(0);       
        $this->load->view('outer/safety_center',$data);
          
    }
    public function privacy_policy() 
    {
        error_reporting(0);       
        $this->load->view('outer/privacy_policy',$data);
          
    }
     public function privacy_prefrence() 
    {
        error_reporting(0);       
        $this->load->view('outer/privacy_prefrence',$data);
          
    }
      public function terms() 
    {
        error_reporting(0);       
        $this->load->view('outer/terms',$data);
          
    }
    

}
