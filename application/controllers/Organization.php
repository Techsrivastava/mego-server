<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Organization extends CI_Controller 
{

   public function __construct() 
   {
        parent::__construct();
		$this->load->helper('url'); 
		$this->load->database(); 
		$this->load->library('session');        
		$this->load->model('Model_admin_auth');
		$this->load->model('Model_admin');
        $this->load->model('catlog/Brand_model');
        $this->load->model('catlog/category_model');
        $this->load->model('catlog/subcategory_model');
        $this->load->model('catlog/subsubcategory_model');
		$this->load->model('organization/Organization_model');
		// if (empty($this->session->userdata('sampark_session'))) {
		//   redirect(site_url('admin'));
		// }
		$this->_admin = $this->session->userdata('sampark_session');
       
    }
     public function getDeptDesig($dept_id)
    {
//  echo 'dfsdfds'; die;
        $tbl=DB_PREFIX.'role';
        $tableData = $this->db->get_where($tbl,array('PR_DEPT_ID'=>$dept_id))->result();
        $htm = '';
        $htm .= '<option value="">Select</option>';
        foreach ($tableData as $item){
            $htm .= '<option value="'.$item->ROLE_ID.'">';
            $htm .= $item->ROLE_NAME;
            $htm .= '</option>';
        }


//      $cat_id = $_REQUEST['cat_id'];
        echo $htm;
    }
    public function getCountryStateData($country_id)
    {
       // echo $country_id; exit;
//  echo 'dfsdfds'; die;
        $tbl=DB_PREFIX.'states';
        $tableData = $this->db->get_where($tbl,array('country_id'=>$country_id))->result();
        $htm = '';
        $htm .= '<option value="">Select State</option>';
        foreach ($tableData as $item){
            $htm .= '<option value="'.$item->id.'">';
            $htm .= $item->name;
            $htm .= '</option>';
        }


//      $cat_id = $_REQUEST['cat_id'];
        echo $htm;
    }
    public function getStateCityData($state_id)
    {
//  echo 'dfsdfds'; die;
        $tbl=DB_PREFIX.'cities';
        $tableData = $this->db->get_where($tbl,array('state_id'=>$state_id))->result();
        $htm = '';
        $htm .= '<option value="">Select City</option>';
        foreach ($tableData as $item){
            $htm .= '<option value="'.$item->id.'">';
            $htm .= $item->name;
            $htm .= '</option>';
        }


//      $cat_id = $_REQUEST['cat_id'];
        echo $htm;
    }
    public function getDeptDesigManager($desig_id)
    {
//  echo 'dfsdfds'; die;
        $tbl=DB_PREFIX.'employee';
        $de=$desig_id-1;
        $tableData = $this->db->get_where($tbl,array('PR_DESIGNATION_ID'=>$de))->result();
        $htm = '';
        $htm .= '<option value="">Select</option>';
        foreach ($tableData as $item){
            $htm .= '<option value="'.$item->PR_EMPLOYEE_ID.'">';

            $htm .= $item->PR_EMPLOYEE_CODE;
            $htm .= '-';
            $htm .= $item->PR_NAME;         
        }


//      $cat_id = $_REQUEST['cat_id'];
        echo $htm;
    }
    public function employee() 
    {
        error_reporting(0);
        if($this->input->get('token')!=$this->session->userdata['sampark_session']['token'])
        {
                redirect(site_url('admin/admin_login_auth'));
        }
        $data['title'] = 'Employee';  
        $data['menu'] = $this->Model_admin->getUserMenuData(array('IS_VIEW' => 'w')); 
        $data['empcount'] = $this->Organization_model->gettotalEmployee();
        $data['aempcount'] = $this->Organization_model->gettotalAEmployee();
        $this->load->view('template/admin_header',$data); 
        $this->load->view('organization/employee');
        $this->load->view('template/admin_footer');
    }
    public function fos() 
    {
        error_reporting(0);
        if($this->input->get('token')!=$this->session->userdata['sampark_session']['token'])
        {
                redirect(site_url('admin/admin_login_auth'));
        }
        $data['title'] = 'FOS';  
        $data['menu'] = $this->Model_admin->getUserMenuData(array('IS_VIEW' => 'w')); 
        //$data['empcount'] = $this->Organization_model->gettotalEmployee();
        $data['foscount'] = $this->Organization_model->gettotalAlFos();
        $data['applyfoscount'] = $this->Organization_model->getAppliedtotalAlFos();
        $this->load->view('template/admin_header',$data); 
        $this->load->view('organization/fos');
        $this->load->view('template/admin_footer');
    }
     public function disributord() 
    {
        error_reporting(0);
        if($this->input->get('token')!=$this->session->userdata['sampark_session']['token'])
        {
                redirect(site_url('admin/admin_login_auth'));
        }
        $data['title'] = 'Distributor';  
        $data['menu'] = $this->Model_admin->getUserMenuData(array('IS_VIEW' => 'w')); 
        $data['empcount'] = $this->Organization_model->gettotalDistributor();
        $data['aempcount'] = $this->Organization_model->gettotalADistributor();
        $this->load->view('template/admin_header',$data); 
        $this->load->view('organization/distributord');
        $this->load->view('template/admin_footer');
    }






     public function addemployee() 
    {
        error_reporting(0);
        if($this->input->get('token')!=$this->session->userdata['sampark_session']['token'])
        {
                redirect(site_url('admin/admin_login_auth'));
        }
        $data['title'] = 'Employee'; 
        $emp_id=$this->uri->segment(3); 
        //echo $emp_id; exit;
        $data['menu'] = $this->Model_admin->getUserMenuData(array('IS_VIEW' => 'w')); 
        $data['empdata'] = $this->Organization_model->getEmployeeData(array('EMPLOYEE_ID'=>$emp_id)); 
        $data['department'] = $this->Organization_model->getDepartmentData(); 
        $data['warehouse'] = $this->Organization_model->getWarehouseData(); 
        $this->load->view('template/admin_header',$data); 
        $this->load->view('organization/addEmployee');
        $this->load->view('template/admin_footer');
    }
   
     public function viewemployee() 
    {
        error_reporting(0);
        if($this->input->get('token')!=$this->session->userdata['sampark_session']['token'])
        {
                redirect(site_url('admin/admin_login_auth'));
        }
        $data['title'] = 'Employee'; 
        $emp_id=$this->uri->segment(3); 
        //echo $emp_id; exit;
        $data['menu'] = $this->Model_admin->getUserMenuData(array('IS_VIEW' => 'w')); 
        $data['empdata'] = $this->Organization_model->getEmployeeData(array('EMPLOYEE_ID'=>$emp_id)); 
        $data['empcompdata'] = $this->Organization_model->getPrevEmployeeData(array('EMPLOYEE_ID'=>$emp_id)); 
        $data['department'] = $this->Organization_model->getDepartmentData(); 
        $data['country'] = $this->Organization_model->getCountryData(); 
        $this->load->view('template/admin_header',$data); 
        $this->load->view('organization/viewEmployee');
        $this->load->view('template/admin_footer');
    }
    public function addempdetail()
    {
        $cur_date=date('Y-m-d h:i:s');
        $data = array(
            "PR_COMPANY_ID"=>'1',  
            "PR_DEPARTMENT_ID"=>$this->input->post('emp_dept'),              
            "PR_DESIGNATION_ID"=>$this->input->post('emp_desigdata'),                     
            "PR_REPORTING_MANAGER"=>$this->input->post('emp_reportmanager'),  
              "PR_WAREHOUSE_ID"=>$this->input->post('emp_warehouse'),          
            "PR_NAME"=>$this->input->post('emp_name'),
            "PR_EMAIL"=>$this->input->post('emp_pemail'),
            "PR_PASSWORD"=>md5('123456'),  
            "PR_COMPANY_EMAIL"=>$this->input->post('emp_cemail'),
            "PR_PHONE"=>$this->input->post('emp_mobile1'),
            "PR_PHONE2"=>$this->input->post('emp_mobile2'),
            "PR_GENDER"=>$this->input->post('emp_gender'),
            "PR_EMERGENCY_CONTACT_NO"=>$this->input->post('emp_emergencyno'),          
            "PR_EMERGENCY_RELATION"=>$this->input->post('emp_relation'),
            "PR_EMERGENCY_RELATION_NAME"=>$this->input->post('emp_relativename'),
            "PR_DOB"=>$this->input->post('emp_dob'),
          
            "PR_OTHER_RELATION"=>$this->input->post('emp_otherrelativename'),
            "PR_BLOOD_GROUP"=>$this->input->post('emp_bloodgroup'),
            "PR_EMPLOYEE_STATUS"=>'1',
            "PR_FRM_STS"=>'2',
            "PR_CREATED_AT"=>$cur_date
        );

        if($id = $this->Organization_model->addRow('pr_employee',$data)){
            //$this->session->set_flashdata('success', 'Employee added successfully.');
            $empcode='SAMPARK'.$id;
            $edata=array('PR_EMPLOYEE_CODE'=>$empcode,'PR_FRM_STS'=>'2');
            $this->Organization_model->updateRow('pr_employee',$edata,array('PR_EMPLOYEE_ID'=>$id ));
            redirect("organization/addEmpAddress/".$id."/2?token=".$this->session->userdata['sampark_session']['token'],'refresh');
        } else
        {
            $this->session->set_flashdata('fail', 'Employee can not be Inserted.');
            redirect("organization/addemployee?token=".$this->session->userdata['sampark_session']['token'],'refresh');
        }

    }
     public function updateempdetail()
    {
        $cur_date=date('Y-m-d h:i:s');
        $emp_id=$this->input->post('emp_employeeid');
        $data = array(
            "PR_COMPANY_ID"=>'1',  
            "PR_DEPARTMENT_ID"=>$this->input->post('emp_dept'),              
            "PR_DESIGNATION_ID"=>$this->input->post('emp_desigdata'),                     
            "PR_REPORTING_MANAGER"=>$this->input->post('emp_reportmanager'),            
            "PR_NAME"=>$this->input->post('emp_name'),
            "PR_EMAIL"=>$this->input->post('emp_pemail'),
            "PR_PASSWORD"=>md5('123456'),  
            "PR_COMPANY_EMAIL"=>$this->input->post('emp_cemail'),
            "PR_PHONE"=>$this->input->post('emp_mobile1'),
            "PR_PHONE2"=>$this->input->post('emp_mobile2'),
            "PR_GENDER"=>$this->input->post('emp_gender'),
            "PR_EMERGENCY_CONTACT_NO"=>$this->input->post('emp_emergencyno'),          
            "PR_EMERGENCY_RELATION"=>$this->input->post('emp_relation'),
            "PR_EMERGENCY_RELATION_NAME"=>$this->input->post('emp_relativename'),
            "PR_DOB"=>$this->input->post('emp_dob'),
            "PR_OTHER_RELATION"=>$this->input->post('emp_otherrelativename'),
            "PR_BLOOD_GROUP"=>$this->input->post('emp_bloodgroup'),
            "PR_WAREHOUSE_ID"=>$this->input->post('emp_warehouse'),
            "PR_CTC"=>$this->input->post('emp_ctc'),
            "PR_EMPLOYEE_STATUS"=>'1',
            "PR_FRM_STS"=>'2',
            "PR_CREATED_AT"=>$cur_date
        );

        if($this->Organization_model->updateRow('pr_employee',$data,array('PR_EMPLOYEE_ID'=>$emp_id))){
            
            redirect("organization/addEmpAddress/".$emp_id."/2?token=".$this->session->userdata['sampark_session']['token'],'refresh');
        } else
        {
            $this->session->set_flashdata('fail', 'Employee can not be Updated.');
            redirect("organization/addemployee?token=".$this->session->userdata['sampark_session']['token'],'refresh');
        }

    }
     public function updatedistributordtl()
    {
            error_reporting(0);
        $path = 'assets/upload_image/user/';
        $emp_id=$this->input->post('emp_employeeid');
        $gstfile = '';
        if (isset($_FILES['emp_gstinfile']) && $_FILES['emp_gstinfile']['name'] != ''){
            $config['upload_path'] =$path;
            $config['allowed_types'] = '*';
            $config['max_size'] = '10240'; //max_size in kb
          
            $new_name = $_FILES['emp_gstinfile']['name'];
            $config['file_name'] = 'GST_'.$emp_id.'_'. rand(100, 100000);
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if ($this->upload->do_upload('emp_gstinfile')) {
                $dataupload = $this->upload->data();
                $gstfile = $dataupload['file_name'];
            } 
            else 
            {
                $gstfile = "";
            } 
           
        }
        $bankfile = '';
        if (isset($_FILES['emp_bankfile']) && $_FILES['emp_bankfile']['name'] != ''){
            $config['upload_path'] =$path;
            $config['allowed_types'] = '*';
            $config['max_size'] = '10240'; //max_size in kb
          
            $new_name = $_FILES['emp_bankfile']['name'];
            $config['file_name'] = 'GST_'.$emp_id.'_'.rand(100, 100000);
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if ($this->upload->do_upload('emp_bankfile')) {
                $dataupload = $this->upload->data();
                $bankfile = $dataupload['file_name'];
            } 
            else 
            {
                $bankfile = "";
            } 
           
        }
         $pancardfile = '';
        if (isset($_FILES['emp_bankfile']) && $_FILES['emp_bankfile']['name'] != ''){
            $config['upload_path'] =$path;
            $config['allowed_types'] = '*';
            $config['max_size'] = '10240'; //max_size in kb
          
            $new_name = $_FILES['emp_bankfile']['name'];
            $config['file_name'] = 'PANCARD_'.$emp_id.'_'.rand(100, 100000);
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if ($this->upload->do_upload('emp_bankfile')) {
                $dataupload = $this->upload->data();
                $pancardfile = $dataupload['file_name'];
            } 
            else 
            {
                $pancardfile = "";
            } 
           
        }
        $empdata= $this->Organization_model->getEmployeeData(array('EMPLOYEE_ID'=>$emp_id)); 
        if($pancardfile=="")
        {
            $pancardfile=$empdata->PR_PANCARD_FILE;
        }
        if($gstfile=="")
        {
            $gstfile=$empdata->PR_GST_FILE;
        }
        if($bankfile=="")
        {
            $bankfile=$empdata->PR_BANK_FILE;
        }
        if($this->input->post('emp_desigdata')=="")
        {
            $desig=$empdata->PR_DESIGNATION_ID;
        }
        else
        {
            $desig=$this->input->post('emp_desigdata');
        }


        $cur_date=date('Y-m-d h:i:s');
        
        $data = array(
            "PR_COMPANY_ID"=>'1',                     
            "PR_NAME"=>$this->input->post('emp_name'),
            "PR_EMAIL"=>$this->input->post('emp_email'),
            "PR_PASSWORD"=>md5('123456'),            
            "PR_PHONE"=>$this->input->post('emp_mobile1'),
            "PR_PHONE2"=>$this->input->post('emp_mobile2'),   
            "PR_DEPARTMENT_ID"=>$this->input->post('emp_dept'),              
            "PR_DESIGNATION_ID"=>$desig,                     
            "PR_REPORTING_MANAGER"=>$this->input->post('emp_reportmanager'),  
            "PR_WAREHOUSE_ID"=>$this->input->post('emp_warehouse'),
            "PR_LAND_LINE_NO"=>$this->input->post('emp_landline'),   
            "PR_FAX_NO"=>$this->input->post('emp_faxno'),   
            "PR_FIRM_TYPE"=>$this->input->post('emp_firmtype'),   
            "PR_OTHER_FIRM_TYPE"=>$this->input->post('emp_otherfirmname'),   
           
            "PR_PRESENT_COUNTRY"=>$this->input->post('emp_presentcountry'),              
            "PR_PRESENT_STATE"=>$this->input->post('emp_presentstate'),                     
            "PR_PRESENT_CITY"=>$this->input->post('emp_presentcity'),            
            "PR_PRESENT_PINCODE"=>$this->input->post('emp_presentpincode'),
            "PR_PRESENT_ADDRESS"=>$this->input->post('present_address'),
            "PR_GST_NO"=>$this->input->post('emp_gstno'),  
            "PR_GST_FILE"=>$gstfile,
            "PR_PANCARD"=>$this->input->post('emp_pancardno'),
            "PR_PANCARD_FILE"=>$pancardfile,
            "PR_BANK_NAME"=>$this->input->post('emp_bankname'),
            "PR_IFSC_CODE"=>$this->input->post('emp_ifsccode'),
            "PR_BANK_ACCOUNT_NO"=>$this->input->post('emp_accountno'),
            "PR_BANK_FILE"=>$bankfile,

            "PR_EMPLOYEE_STATUS"=>'1',
            "PR_FRM_STS"=>'2',
            "PR_MODIFIED_AT"=>$cur_date
        );

        if($this->Organization_model->updateRow('pr_employee',$data,array('PR_EMPLOYEE_ID'=>$emp_id))){
            
            redirect("outer/addDistributorBExp/".$emp_id."/2");
        } else
        {
            $this->session->set_flashdata('fail', 'Employee can not be Updated.');
            redirect("outer/addDistributor/".$emp_id."/1");
        }

    }
     public function updatedistributordtlByAdmin()
    {
            error_reporting(0);
        $path = 'assets/upload_image/user/';
        $emp_id=$this->input->post('emp_employeeid');
        $gstfile = '';
        if (isset($_FILES['emp_gstinfile']) && $_FILES['emp_gstinfile']['name'] != ''){
            $config['upload_path'] =$path;
            $config['allowed_types'] = '*';
            $config['max_size'] = '10240'; //max_size in kb
          
            $new_name = $_FILES['emp_gstinfile']['name'];
            $config['file_name'] = 'GST_'.$emp_id.'_'. rand(100, 100000);
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if ($this->upload->do_upload('emp_gstinfile')) {
                $dataupload = $this->upload->data();
                $gstfile = $dataupload['file_name'];
            } 
            else 
            {
                $gstfile = "";
            } 
           
        }
        $bankfile = '';
        if (isset($_FILES['emp_bankfile']) && $_FILES['emp_bankfile']['name'] != ''){
            $config['upload_path'] =$path;
            $config['allowed_types'] = '*';
            $config['max_size'] = '10240'; //max_size in kb
          
            $new_name = $_FILES['emp_bankfile']['name'];
            $config['file_name'] = 'GST_'.$emp_id.'_'.rand(100, 100000);
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if ($this->upload->do_upload('emp_bankfile')) {
                $dataupload = $this->upload->data();
                $bankfile = $dataupload['file_name'];
            } 
            else 
            {
                $bankfile = "";
            } 
           
        }
        $cur_date=date('Y-m-d h:i:s');
        $empdata= $this->Organization_model->getEmployeeData(array('EMPLOYEE_ID'=>$emp_id)); 
        if($pancardfile=="")
        {
            $pancardfile=$empdata->PR_PANCARD_FILE;
        }
        if($gstfile=="")
        {
            $gstfile=$empdata->PR_GST_FILE;
        }
        if($bankfile=="")
        {
            $bankfile=$empdata->PR_BANK_FILE;
        }
        $data = array(
            "PR_COMPANY_ID"=>'1',                     
            "PR_NAME"=>$this->input->post('emp_name'),
            "PR_EMAIL"=>$this->input->post('emp_email'),
            "PR_PASSWORD"=>md5('123456'),            
            "PR_PHONE"=>$this->input->post('emp_mobile1'),
            "PR_PHONE2"=>$this->input->post('emp_mobile2'),   

            "PR_LAND_LINE_NO"=>$this->input->post('emp_landline'),   
            "PR_FAX_NO"=>$this->input->post('emp_faxno'),   
            "PR_FIRM_TYPE"=>$this->input->post('emp_firmtype'),   
            "PR_OTHER_FIRM_TYPE"=>$this->input->post('emp_otherfirmname'),   
           
            "PR_PRESENT_COUNTRY"=>$this->input->post('emp_presentcountry'),              
            "PR_PRESENT_STATE"=>$this->input->post('emp_presentstate'),                     
            "PR_PRESENT_CITY"=>$this->input->post('emp_presentcity'),            
            "PR_PRESENT_PINCODE"=>$this->input->post('emp_presentpincode'),
            "PR_PRESENT_ADDRESS"=>$this->input->post('present_address'),
            

            "PR_GST_NO"=>$this->input->post('emp_gstno'),  
            "PR_GST_FILE"=>$gstfile,
            "PR_PANCARD"=>$this->input->post('emp_dob'),
            "PR_PANCARD_FILE"=>$this->input->post('emp_otherrelativename'),
            "PR_BANK_NAME"=>$this->input->post('emp_bankname'),
            "PR_IFSC_CODE"=>$this->input->post('emp_ifsccode'),
            "PR_BANK_ACCOUNT_NO"=>$this->input->post('emp_accountno'),
            "PR_BANK_FILE"=>$bankfile,

            "PR_EMPLOYEE_STATUS"=>'1',
            "PR_FRM_STS"=>'2',
            "PR_MODIFIED_AT"=>$cur_date
        );

        if($this->Organization_model->updateRow('pr_employee',$data,array('PR_EMPLOYEE_ID'=>$emp_id))){
            
            redirect("organization/addaDistributorBExp/".$emp_id."/2?token=".$this->session->userdata['sampark_session']['token'],'refresh');
        } else
        {
            $this->session->set_flashdata('fail', 'Employee can not be Updated.');
            redirect("organization/addaDistributor/".$emp_id."/1?token=".$this->session->userdata['sampark_session']['token'],'refresh');
        }

    }
     public function adddistributordtlByAdmin()
    {
            error_reporting(0);
        $path = 'assets/upload_image/user/';
       // $emp_id=$this->input->post('emp_employeeid');
        $gstfile = '';
        if (isset($_FILES['emp_gstinfile']) && $_FILES['emp_gstinfile']['name'] != ''){
            $config['upload_path'] =$path;
            $config['allowed_types'] = '*';
            $config['max_size'] = '10240'; //max_size in kb
          
            $new_name = $_FILES['emp_gstinfile']['name'];
            $config['file_name'] = 'GST_'.$emp_id.'_'. rand(100, 100000);
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if ($this->upload->do_upload('emp_gstinfile')) {
                $dataupload = $this->upload->data();
                $gstfile = $dataupload['file_name'];
            } 
            else 
            {
                $gstfile = "";
            } 
           
        }
        $bankfile = '';
        if (isset($_FILES['emp_bankfile']) && $_FILES['emp_bankfile']['name'] != ''){
            $config['upload_path'] =$path;
            $config['allowed_types'] = '*';
            $config['max_size'] = '10240'; //max_size in kb
          
            $new_name = $_FILES['emp_bankfile']['name'];
            $config['file_name'] = 'GST_'.$emp_id.'_'.rand(100, 100000);
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if ($this->upload->do_upload('emp_bankfile')) {
                $dataupload = $this->upload->data();
                $bankfile = $dataupload['file_name'];
            } 
            else 
            {
                $bankfile = "";
            } 
           
        }
        $cur_date=date('Y-m-d h:i:s');
        
        $data = array(
            "PR_COMPANY_ID"=>'1',                     
            "PR_NAME"=>$this->input->post('emp_name'),
            "PR_EMAIL"=>$this->input->post('emp_email'),
            "PR_PASSWORD"=>md5('123456'),            
            "PR_PHONE"=>$this->input->post('emp_mobile1'),
            "PR_PHONE2"=>$this->input->post('emp_mobile2'),   

            "PR_LAND_LINE_NO"=>$this->input->post('emp_landline'),   
            "PR_FAX_NO"=>$this->input->post('emp_faxno'),   
            "PR_FIRM_TYPE"=>$this->input->post('emp_firmtype'),   
            "PR_OTHER_FIRM_TYPE"=>$this->input->post('emp_otherfirmname'),   
           
            "PR_PRESENT_COUNTRY"=>$this->input->post('emp_presentcountry'),              
            "PR_PRESENT_STATE"=>$this->input->post('emp_presentstate'),                     
            "PR_PRESENT_CITY"=>$this->input->post('emp_presentcity'),            
            "PR_PRESENT_PINCODE"=>$this->input->post('emp_presentpincode'),
            "PR_PRESENT_ADDRESS"=>$this->input->post('present_address'),
            

            "PR_GST_NO"=>$this->input->post('emp_gstno'),  
            "PR_GST_FILE"=>$gstfile,
            "PR_PANCARD"=>$this->input->post('emp_dob'),
            "PR_PANCARD_FILE"=>$this->input->post('emp_otherrelativename'),
            "PR_BANK_NAME"=>$this->input->post('emp_bankname'),
            "PR_IFSC_CODE"=>$this->input->post('emp_ifsccode'),
            "PR_BANK_ACCOUNT_NO"=>$this->input->post('emp_accountno'),
            "PR_BANK_FILE"=>$bankfile,

            "PR_EMPLOYEE_STATUS"=>'1',
            "PR_FRM_STS"=>'2',
            "PR_MODIFIED_AT"=>$cur_date
        );

        if($emp_id=$this->Organization_model->addRow('pr_employee',$data)){
            
            redirect("organization/addaDistributorBExp/".$emp_id."/2?token=".$this->session->userdata['sampark_session']['token'],'refresh');
        } else
        {
            $this->session->set_flashdata('fail', 'Employee can not be Updated.');
            redirect("organization/addaDistributor/".$emp_id."/1?token=".$this->session->userdata['sampark_session']['token'],'refresh');
        }

    }
     public function updatedistributorexpdtl()
    {
       error_reporting(0);
        $emp_id=$this->input->post('emp_employeeid');

        $company_name=$this->input->post('emp_name');
        $count=COUNT($company_name);
    
    
        $cur_date=date('Y-m-d h:i:s');
        for($i=0; $i<$count; $i++)
        {   
          
        $data = array(
            //"PR_COMPANY_ID"=>'1',                     
            "PR_COMPANY_NAME"=>$this->input->post('emp_name')[$i],
            "PR_WORK_STS"=>$this->input->post('emp_workingsts')[$i],
            "PR_DISTRIBUTOR_ID"=>$emp_id,
                    
            "PR_START_DATE"=>$this->input->post('emp_startDate')[$i],
            "PR_END_DATE"=>$this->input->post('emp_endDate')[$i],   

            "PR_BUISNESS_TYPE"=>$this->input->post('emp_buisness_type')[$i],   
            "PR_LAST_ANNUAL"=>$this->input->post('emp_turnover')[$i],   
            "PR_NO_OF_SALESMAN"=>$this->input->post('noofsalesman')[$i],   
            "PR_NO_OF_RETAILER"=>$this->input->post('emp_noofretailer')[$i],   
            "PR_OTHER_STAFF_COUNT"=>$this->input->post('noofotherstaff')[$i],   
           
            "PR_CREATED_AT"=>$cur_date
        );
        $this->Organization_model->addRow('pr_distributor_bexp',$data);

        }

      
            
            redirect("outer/addDistributPDetail/".$emp_id."/3");
       

    }
     public function updatedistributorexpdtlByAdmin()
    {
       error_reporting(0);
        $emp_id=$this->input->post('emp_employeeid');

        $company_name=$this->input->post('emp_name');
        $count=COUNT($company_name);
    
    
        $cur_date=date('Y-m-d h:i:s');
        for($i=0; $i<$count; $i++)
        {   
          
        $data = array(
            //"PR_COMPANY_ID"=>'1',                     
            "PR_COMPANY_NAME"=>$this->input->post('emp_name')[$i],
            "PR_WORK_STS"=>$this->input->post('emp_workingsts')[$i],
            "PR_DISTRIBUTOR_ID"=>$emp_id,
                    
            "PR_START_DATE"=>$this->input->post('emp_startDate')[$i],
            "PR_END_DATE"=>$this->input->post('emp_endDate')[$i],   

            "PR_BUISNESS_TYPE"=>$this->input->post('emp_buisness_type')[$i],   
            "PR_LAST_ANNUAL"=>$this->input->post('emp_turnover')[$i],   
            "PR_NO_OF_SALESMAN"=>$this->input->post('noofsalesman')[$i],   
            "PR_NO_OF_RETAILER"=>$this->input->post('emp_noofretailer')[$i],   
            "PR_OTHER_STAFF_COUNT"=>$this->input->post('noofotherstaff')[$i],   
           
            "PR_CREATED_AT"=>$cur_date
        );
        $this->Organization_model->addRow('pr_distributor_bexp',$data);

        }

      
            
            redirect("organization/addaDistributPDetail/".$emp_id."/3?token=".$this->session->userdata['sampark_session']['token'],'refresh');
       

    }
    public function updateDistributordetail()
    {
       error_reporting(0);
        $emp_id=$this->input->post('emp_employeeid');

        $company_name=$this->input->post('emp_name');
        $count=COUNT($company_name);
    
    
        $cur_date=date('Y-m-d h:i:s');
        for($i=0; $i<$count; $i++)
        {   

        // $_FILES[$field_name]['name']= $files[$field_name]['name'][$i];
        // $_FILES[$field_name]['type']= $files[$field_name]['type'][$i];
        // $_FILES[$field_name]['tmp_name'] = $files[$field_name]['tmp_name'][$i];
        // $_FILES[$field_name]['error']= $files[$field_name]['error'][$i]; 
        // $_FILES[$field_name]['size'] = $files[$field_name]['size'][$i];
            
        // $this->upload->initialize($this->set_upload_options($path));

        // $this->upload->do_upload($field_name);  

          
        $data = array(
            //"PR_COMPANY_ID"=>'1',                     
            "PR_DISTRIBUTOR_ID"=>$emp_id,
            "PR_TITLE"=>$this->input->post('emp_title')[$i],
            "PR_NAME"=>$this->input->post('emp_name')[$i],
                    
            "PR_PHONE"=>$this->input->post('emp_phone')[$i],
            "PR_EMAIL"=>$this->input->post('emp_email')[$i], 
            "PR_EMAIL2"=>$this->input->post('emp_email2')[$i],   

            "PR_CONTACT_NO"=>$this->input->post('emp_emergencymobile')[$i],   
            "PR_CONTACT_NAME"=>$this->input->post('emp_emergencypersonname')[$i],   
            "PR_DOB"=>$this->input->post('emp_dob')[$i],   
            "PR_MARRIAGE_DATE"=>$this->input->post('emp_marriagedate')[$i],   
            "PR_AADHAR"=>$this->input->post('emp_aadharno')[$i],   
           
            "PR_CREATED_AT"=>$cur_date
        );

        $edata=array("PR_EMPLOYEE_STATUS"=>'3');
        $this->Organization_model->addRow('pr_distributor_directors',$data);

        $this->Organization_model->updateRow('pr_employee',$edata,array('PR_EMPLOYEE_ID'=>$emp_id));

        }

      
            
            redirect("outer/thanku2/".$emp_id."/3");
       

    }
     public function updateDistributordetailByadmin()
    {
       error_reporting(0);
        $emp_id=$this->input->post('emp_employeeid');

        $company_name=$this->input->post('emp_name');
        $count=COUNT($company_name);
    
    
        $cur_date=date('Y-m-d h:i:s');
        for($i=0; $i<$count; $i++)
        {   

        // $_FILES[$field_name]['name']= $files[$field_name]['name'][$i];
        // $_FILES[$field_name]['type']= $files[$field_name]['type'][$i];
        // $_FILES[$field_name]['tmp_name'] = $files[$field_name]['tmp_name'][$i];
        // $_FILES[$field_name]['error']= $files[$field_name]['error'][$i]; 
        // $_FILES[$field_name]['size'] = $files[$field_name]['size'][$i];
            
        // $this->upload->initialize($this->set_upload_options($path));

        // $this->upload->do_upload($field_name);  

          
        $data = array(
            //"PR_COMPANY_ID"=>'1',                     
            "PR_DISTRIBUTOR_ID"=>$emp_id,
            "PR_TITLE"=>$this->input->post('emp_title')[$i],
            "PR_DIRECTOR_DESIG"=>$this->input->post('emp_desig')[$i],
            "PR_NAME"=>$this->input->post('emp_name')[$i],
                    
            "PR_PHONE"=>$this->input->post('emp_phone')[$i],
            "PR_EMAIL"=>$this->input->post('emp_email')[$i], 
            "PR_EMAIL2"=>$this->input->post('emp_email2')[$i],   

            "PR_CONTACT_NO"=>$this->input->post('emp_emergencymobile')[$i],   
            "PR_CONTACT_NAME"=>$this->input->post('emp_emergencypersonname')[$i],   
            "PR_DOB"=>$this->input->post('emp_dob')[$i],   
            "PR_MARRIAGE_DATE"=>$this->input->post('emp_marriagedate')[$i],   
            "PR_AADHAR"=>$this->input->post('emp_aadharno')[$i],   
           
            "PR_CREATED_AT"=>$cur_date
        );
        $this->Organization_model->addRow('pr_distributor_directors',$data);

        }

      
            
            redirect("organization/distributor/".$emp_id."/3");
       

    }

    public function setagreementDate()
    {
       //error_reporting(0);
        $emp_id=$this->input->post('emp_employeeid');
//echo $emp_id; exit;
        $aggrementDate=$this->input->post('emp_date');
      
    
        $cur_date=date('Y-m-d h:i:s');
       

        $data = array(
            //"PR_COMPANY_ID"=>'1',                     
            "PR_AGGREMENT_DATE"=>$aggrementDate,
            "PR_EMPLOYEE_STATUS"=>'4',
            
        );
        $this->Organization_model->updateRow('pr_employee',$data,array('PR_EMPLOYEE_ID'=>$emp_id));

        
                 $t=$this->session->userdata['sampark_session']['token'];
        redirect('organization/distributor/?token="<?php echo $t; ?>"');
       

    }

    public function sendAgreement()
    {
       //error_reporting(0);
        $emp_id=$this->uri->segment(3);
        $empdata = $this->Organization_model->getEmployeeData(array('EMPLOYEE_ID'=>$emp_id)); 
        $aggrementDate=$this->input->post('emp_date');
       
        $logoimg=base_url()."assets/images/sampark_logo.jpg";
        $backimg=base_url()."assets/images/after_bg.png";
        $cur_date=date('Y-m-d h:i:s');
       

        $data = array(
            //"PR_COMPANY_ID"=>'1',                     
           
            "PR_EMPLOYEE_STATUS"=>'5'
            
        );

        $this->Organization_model->updateRow('pr_employee',$data,array('PR_EMPLOYEE_ID'=>$emp_id));

          $this->load->library('phpmailer_lib');
        
                // PHPMailer object
                $mail = $this->phpmailer_lib->load();
                
               $mail->setFrom('rohit.cbtech@gmail.com', 'SAMPARK');
               $mail->addReplyTo('rohit.cbtech@gmail.com', 'SAMPARK');
                
                // Add a recipient
                $mail->addAddress($empdata->PR_EMAIL);
                
                // Email subject
                $mail->Subject = 'Hello from Impact Group';
                
                // Set email format to HTML
                $mail->isHTML(true);
                
                $logoimg=base_url()."assets/images/sampark_logo.jpg";
                $backimg=base_url()."assets/images/after_bg.png";

                 $mailContent ='<!DOCTYPE html>
                <html>
                <head>

                <meta content="text/html; charset=utf-8" http-equiv="Content-Type"/>
                <meta content="width=device-width" name="viewport"/>
                <meta content="IE=edge" http-equiv="X-UA-Compatible"/>
                <title></title>
                <link href="https://fonts.googleapis.com/css?family=Cabin" rel="stylesheet" type="text/css"/>
                <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css"/>
                <style type="text/css">
                body {
                margin: 0;
                padding: 0;
                }
                table,
                td,
                tr {
                vertical-align: top;
                border-collapse: collapse;
                }
                * {
                line-height: inherit;
                }
                a[x-apple-data-detectors=true] {
                color: inherit !important;
                text-decoration: none !important;
                }
                </style>
                <style id="media-query" type="text/css">
                @media (max-width: 670px) {
                .block-grid,
                .col {
                min-width: 320px !important;
                max-width: 100% !important;
                display: block !important;
                }
                .block-grid {
                width: 100% !important;
                }
                .col {
                width: 100% !important;
                }
                .col_cont {
                margin: 0 auto;
                }
                img.fullwidth,
                img.fullwidthOnMobile {
                max-width: 100% !important;
                }
                .no-stack .col {
                min-width: 0 !important;
                display: table-cell !important;
                }
                .no-stack.two-up .col {
                width: 50% !important;
                }
                .no-stack .col.num2 {
                width: 16.6% !important;
                }
                .no-stack .col.num3 {
                width: 25% !important;
                }
                .no-stack .col.num4 {
                width: 33% !important;
                }
                .no-stack .col.num5 {
                width: 41.6% !important;
                }
                .no-stack .col.num6 {
                width: 50% !important;
                }
                .no-stack .col.num7 {
                width: 58.3% !important;
                }
                .no-stack .col.num8 {
                width: 66.6% !important;
                }
                .no-stack .col.num9 {
                width: 75% !important;
                }
                .no-stack .col.num10 {
                width: 83.3% !important;
                }
                .video-block {
                max-width: none !important;
                }
                .mobile_hide {
                min-height: 0px;
                max-height: 0px;
                max-width: 0px;
                display: none;
                overflow: hidden;
                font-size: 0px;
                }
                .desktop_hide {
                display: block !important;
                max-height: none !important;
                }
                }
                </style>
                <style id="menu-media-query" type="text/css">
                @media (max-width: 670px) {
                .menu-checkbox[type="checkbox"]~.menu-links {
                display: none !important;
                padding: 5px 0;
                }
                .menu-checkbox[type="checkbox"]~.menu-links span.sep {
                display: none;
                }
                .menu-checkbox[type="checkbox"]:checked~.menu-links,
                .menu-checkbox[type="checkbox"]~.menu-trigger {
                display: block !important;
                max-width: none !important;
                max-height: none !important;
                font-size: inherit !important;
                }
                .menu-checkbox[type="checkbox"]~.menu-links>a,
                .menu-checkbox[type="checkbox"]~.menu-links>span.label {
                display: block !important;
                text-align: center;
                }
                .menu-checkbox[type="checkbox"]:checked~.menu-trigger .menu-close {
                display: block !important;
                }
                .menu-checkbox[type="checkbox"]:checked~.menu-trigger .menu-open {
                display: none !important;
                }
                #menuf91tyo~div label {
                border-radius: 0% !important;
                }
                #menuf91tyo:checked~.menu-links {
                background-color: #000000 !important;
                }
                #menuf91tyo:checked~.menu-links a {
                color: #ffffff !important;
                }
                #menuf91tyo:checked~.menu-links span {
                color: #ffffff !important;
                }
                }
                </style>
                </head>
                <body class="clean-body" style="margin: 0; padding: 0; -webkit-text-size-adjust: 100%; background-color: #FFF;">
                <table bgcolor="#000000" cellpadding="0" cellspacing="0" class="nl-container" role="presentation" style="table-layout: fixed; vertical-align: top; min-width: 320px; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #FFF; width: 100%;" valign="top" width="100%">
                <tbody>
                <tr style="vertical-align: top;" valign="top">
                <td style="word-break: break-word; vertical-align: top;" valign="top">
                <div style="background-color:#000000;">
                <div class="block-grid mixed-two-up" style="min-width: 320px; max-width: 650px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; Margin: 0 auto; background-color: #ffffff;">
                <div style="border-collapse: collapse;display: table;width: 100%;background-color:#ffffff;">
                <div class="col num4" style="display: table-cell; vertical-align: top; max-width: 320px; min-width: 216px; width: 216px;">
                <div class="col_cont" style="width:100% !important;">
                <div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:0px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;">
                <div align="center" class="img-container center fixedwidth" style="padding-right: 0px;padding-left: 0px;">
                <div style="font-size:1px;line-height:5px"> </div>
                <img align="center" alt="logo zex music" border="0" class="center fixedwidth" src="'.$logoimg.'" style="text-decoration: none; -ms-interpolation-mode: bicubic; height: auto; border: 0; width: 100%; max-width: 130px; display: block;" title="logo zex music" width="130"/>
                <div style="font-size:1px;line-height:5px"> </div>
                </div>
                </div>
                </div>
                </div>
                </div>
                </div>
                </div>
                <div style="background-color:#000000;">
                <div class="block-grid" style="min-width: 320px; max-width: 650px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; margin: 0 auto; background-color: #f1d1b8;">
                <div style="border-collapse: collapse;display: table;width: 100%;background-image: url('.$backimg.');background-size: cover;background-position: center;background-repeat: no-repeat;" >

                <div class="col num12" style="min-width: 320px; max-width: 650px; display: table-cell; vertical-align: top; width: 650px;">
                <div class="col_cont" style="width:100% !important;">
                <div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:45px; padding-bottom:45px; padding-right: 0px; padding-left: 0px;">

                <div style="color:#393d47;font-family:"Cabin", Arial, "Helvetica Neue", Helvetica, sans-serif;line-height:1.2;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px;">
                <div style="line-height: 1.2; font-size: 12px; font-family: "Cabin", Arial, "Helvetica Neue", Helvetica, sans-serif; color: #393d47; mso-line-height-alt: 14px;">
                   
                <p  style="-webkit-text-size-adjust: none; text-decoration: none; display: inline-block; color: #ffffff; background-color: #f0795c; border-radius: 30px; -webkit-border-radius: 30px; -moz-border-radius: 30px; width: auto; width: auto; border-top: 1px solid #f0795c; border-right: 1px solid #f0795c; border-bottom: 1px solid #f0795c; border-left: 1px solid #f0795c; padding-top: 5px; padding-bottom: 5px; font-family: "Cabin", Arial, "Helvetica Neue", Helvetica, sans-serif; text-align: center; mso-border-alt: none; word-break: keep-all;">&nbsp;&nbsp;&nbsp;<strong>Dear</strong> '.$empdata->PR_NAME.',<br/><br/>

  <a href="http://3.7.157.160/sampark/outer/aggrement/'.$emp_id .'/1" style="-webkit-text-size-adjust: none; text-decoration: none; display: inline-block; color: #ffffff; background-color: #f0795c; border-radius: 30px; -webkit-border-radius: 30px; -moz-border-radius: 30px; width: auto; width: auto; border-top: 1px solid #f0795c; border-right: 1px solid #f0795c; border-bottom: 1px solid #f0795c; border-left: 1px solid #f0795c; padding-top: 5px; padding-bottom: 5px; font-family: "Cabin", Arial, "Helvetica Neue", Helvetica, sans-serif; text-align: center; mso-border-alt: none; word-break: keep-all;" target="_blank">CLICK HERE</a><br/><br/>
&nbsp;&nbsp;&nbsp;Here is wishing you and the entire family a wonderful 2021 !<br/>
<br/><br/>
&nbsp;&nbsp;&nbsp;Regards<br/>
&nbsp;&nbsp;&nbsp;Team Impact</p>
                </div>
                </div>

              



                </div>

                </div>
                </div>

                </div>
                </div>
                </div>
                <div style="background-color:#000000;">
                <div class="block-grid two-up no-stack" style="min-width: 320px; max-width: 650px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; Margin: 0 auto; background-color: #1a6b41;">
                <div style="border-collapse: collapse;display: table;width: 100%;background-color:#1a6b41;">

                <div class="col num6" style="display: table-cell; vertical-align: top; max-width: 320px; min-width: 324px; width: 325px;">
                <div class="col_cont" style="width:100% !important;">
                <div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:0px; padding-bottom:0px; padding-right: 0px; padding-left: 0px;">
                <table cellpadding="0" cellspacing="0" class="social_icons" role="presentation" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt;" valign="top" width="100%">
                <tbody>
                <tr style="vertical-align: top;" valign="top">
                <td style="word-break: break-word; vertical-align: top; padding-top: 10px; padding-right: 10px; padding-bottom: 10px; padding-left: 20px;" valign="top">
                <table align="left" cellpadding="0" cellspacing="0" class="social_table" role="presentation" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-tspace: 0; mso-table-rspace: 0; mso-table-bspace: 0; mso-table-lspace: 0;" valign="top">
                <tbody>
                <tr align="left" style="vertical-align: top; display: inline-block; text-align: left;" valign="top">
                <td style="word-break: break-word; vertical-align: top; padding-bottom: 0; padding-right: 4px; padding-left: 0px;" valign="top"><a href="https://www.facebook.com/" target="_blank"><img alt="Facebook" height="32" src="'.base_url().'assets/images/facebook2x.png" style="text-decoration: none; -ms-interpolation-mode: bicubic; height: auto; border: 0; display: block;" title="facebook" width="32"/></a></td>
                <td style="word-break: break-word; vertical-align: top; padding-bottom: 0; padding-right: 4px; padding-left: 0px;" valign="top"><a href="https://www.twitter.com/" target="_blank"><img alt="Twitter" height="32" src="'.base_url().'assets/images/twitter2x.png" style="text-decoration: none; -ms-interpolation-mode: bicubic; height: auto; border: 0; display: block;" title="twitter" width="32"/></a></td>
                <td style="word-break: break-word; vertical-align: top; padding-bottom: 0; padding-right: 4px; padding-left: 0px;" valign="top"><a href="https://www.linkedin.com/" target="_blank"><img alt="Linkedin" height="32" src="'.base_url().'assets/images/linkedin2x.png" style="text-decoration: none; -ms-interpolation-mode: bicubic; height: auto; border: 0; display: block;" title="linkedin" width="32"/></a></td>
                <td style="word-break: break-word; vertical-align: top; padding-bottom: 0; padding-right: 4px; padding-left: 0px;" valign="top"><a href="https://www.instagram.com/" target="_blank"><img alt="Instagram" height="32" src="'.base_url().'assets/images/instagram2x.png" style="text-decoration: none; -ms-interpolation-mode: bicubic; height: auto; border: 0; display: block;" title="instagram" width="32"/></a></td>
                </tr>
                </tbody>
                </table>
                </td>
                </tr>
                </tbody>
                </table>
                </div>

                </div>
                </div>

                <div class="col num6" style="display: table-cell; vertical-align: top; max-width: 320px; min-width: 324px; width: 325px;">
                <div class="col_cont" style="width:100% !important;">
                <div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;">

                <div style="color:#393d47;font-family:Arial, Helvetica Neue, Helvetica, sans-serif;line-height:1.2;padding-top:10px;padding-right:20px;padding-bottom:10px;padding-left:10px;">
                <div style="line-height: 1.2; font-size: 12px; color: #393d47; font-family: Arial, Helvetica Neue, Helvetica, sans-serif; mso-line-height-alt: 14px;">
                <p style="font-size: 14px; line-height: 1.2; word-break: break-word; text-align: right; mso-line-height-alt: 17px; margin: 0;"><span style="color: #ffffff;">SAMPARK <a href="#0" rel="noopener" style="color: #ffffff;" target="_blank"></a> <br/></span></p>
                </div>
                </div>

                </div>

                </div>
                </div>

                </div>
                </div>
                </div>

                </td>
                </tr>
                </tbody>
                </table>

                </body>
                </html>';
                $mail->Body =$mailContent;// $mess;//$mailContent;
                
                // Send email
                if(!$mail->send()){
                    echo 'Message could not be sent.';
                    echo 'Mailer Error: ' . $mail->ErrorInfo;
                }else{
                    echo 'Message has been sent';
                }




                 $t=$this->session->userdata['sampark_session']['token'];
        redirect("organization/distributor/?token='<?php echo $t; ?>'");
       

    }
    
    
    public function addEmpAddress() 
    {
        error_reporting(0);
        if($this->input->get('token')!=$this->session->userdata['sampark_session']['token'])
        {
                redirect(site_url('admin/admin_login_auth'));
        }
        $data['title'] = 'Employee'; 
        $emp_id=$this->uri->segment(3); 
        
        $data['empdata'] = $this->Organization_model->getEmployeeData(array('EMPLOYEE_ID'=>$emp_id)); 

        $data['menu'] = $this->Model_admin->getUserMenuData(array('IS_VIEW' => 'w')); 
        $data['country'] = $this->Organization_model->getCountryData(); 
        $this->load->view('template/admin_header',$data); 
        $this->load->view('organization/addEmpAddress');
        $this->load->view('template/admin_footer');
    }
    public function addemployeeaddress()
    {
        
        $emp_id=$this->input->post('emp_employeeid');
        $path = 'assets/upload_image/user/';
        
        $aadhar_file = '';
        


        if (isset($_FILES['emp_aadharfile']) && $_FILES['emp_aadharfile']['name'] != ''){
            $config['upload_path'] =$path;
            $config['allowed_types'] = '*';
            $config['max_size'] = '10240'; //max_size in kb
          
            $new_name = $_FILES['emp_aadharfile']['name'];
            $config['file_name'] = 'AADHAR_'.$emp_id.'_'. rand(100, 100000);
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if ($this->upload->do_upload('emp_aadharfile')) {
                $dataupload = $this->upload->data();
                $aadhar_file = $dataupload['file_name'];
            } 
            else 
            {
                $aadhar_file = "";
            } 
           
        }
        
       
        $pan_file = '';
        
        if (isset($_FILES['emp_pancardfile']) && $_FILES['emp_pancardfile']['name'] != ''){
            $config['upload_path'] =$path;
            $config['allowed_types'] = '*';
            $config['max_size'] = '10240'; //max_size in kb
          
            $new_name = $_FILES['emp_pancardfile']['name'];
            $config['file_name'] = 'PANCARD_'.$emp_id.'_'. rand(100, 100000);
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if ($this->upload->do_upload('emp_pancardfile')) {
                $dataupload = $this->upload->data();
                $pan_file = $dataupload['file_name'];
            } 
            else 
            {
                $pan_file = "";
            } 
           
        }
        
        $bank_file = '';
        
        if (isset($_FILES['emp_bankfile']) && $_FILES['emp_bankfile']['name'] != ''){
            $config['upload_path'] =$path;
            $config['allowed_types'] = '*';
            $config['max_size'] = '10240'; //max_size in kb
          
            $new_name = $_FILES['emp_bankfile']['name'];
            $config['file_name'] = 'BANK'.$emp_id.'_'. rand(100, 100000);
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if ($this->upload->do_upload('emp_bankfile')) {
                $dataupload = $this->upload->data();
                $bank_file = $dataupload['file_name'];
            } 
            else 
            {
                $bank_file = "";
            } 
           
        }
        

         $cvfile = '';
       
        if (isset($_FILES['emp_resumefile']) && $_FILES['emp_resumefile']['name'] != ''){
            $config['upload_path'] =$path;
            $config['allowed_types'] = '*';
            $config['max_size'] = '10240'; //max_size in kb
          
            $new_name = $_FILES['emp_resumefile']['name'];
            $config['file_name'] = 'CV_'.$emp_id.'_'. rand(100, 100000);
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if ($this->upload->do_upload('emp_resumefile')) {
                $dataupload = $this->upload->data();
                $cvfile = $dataupload['file_name'];
            } 
            else 
            {
                $cvfile = "";
            } 
           
        }
        
        $profileimg = '';
        if(isset($_FILES['emp_image']))
        {
        if (isset($_FILES['emp_image']) && $_FILES['emp_image']['name'] != ''){
            $config['upload_path'] =$path;
            $config['allowed_types'] = '*';
            $config['max_size'] = '10240'; //max_size in kb
          
            $new_name = $_FILES['emp_image']['name'];
            $config['file_name'] = 'PROFILE_IMG_'.$emp_id.'_'. rand(100, 100000);
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if ($this->upload->do_upload('emp_image')) {
                $dataupload = $this->upload->data();
                $profileimg = $dataupload['file_name'];
            } 
            else 
            {
                $profileimg = "";
            } 
           
        }
        }
        
        $data = array(
            
            "PR_PRESENT_COUNTRY"=>$this->input->post('emp_presentcountry'),              
            "PR_PRESENT_STATE"=>$this->input->post('emp_presentstate'),                     
            "PR_PRESENT_CITY"=>$this->input->post('emp_presentcity'),            
            "PR_PRESENT_PINCODE"=>$this->input->post('emp_presentpincode'),
            "PR_PRESENT_ADDRESS"=>$this->input->post('present_address'),
            
            "PR_PERMANENT_COUNTRY"=>$this->input->post('emp_permanentcountry'),
            "PR_PERMANENT_STATE"=>$this->input->post('emp_permanentstate'),
            "PR_PERMANENT_CITY"=>$this->input->post('emp_permanentcity'),
            "PR_PERMANENT_PINCODE"=>$this->input->post('emp_permanentpincode'),
            "PR_PERMANENT_ADDRESS"=>$this->input->post('permanent_address'),    

            "PR_AADHAR_CARD"=>$this->input->post('emp_aadharno'),
            "PR_AADHAR_CARD_FILE"=>$aadhar_file,
            "PR_PANCARD"=>$this->input->post('emp_pancardno'),
            "PR_PANCARD_FILE"=>$pan_file,
            "PR_CV_FILE"=>$cvfile,
            "PR_IMAGE"=>$profileimg,

            "PR_BANK_NAME"=>$this->input->post('emp_bankname'),
            "PR_IFSC_CODE"=>$this->input->post('emp_ifsccode'),
            "PR_BANK_ACCOUNT_NO"=>$this->input->post('emp_accountno'),
            "PR_BANK_FILE"=>$bank_file,
            "PR_FRM_STS"=>'3'
        );

        $this->Organization_model->updateRow('pr_employee',$data,array('PR_EMPLOYEE_ID'=>$emp_id));
            
        redirect("organization/addEmpPrevDtl/".$emp_id."/3?token=".$this->session->userdata['sampark_session']['token'],'refresh');
       

    }

    public function addEmpPrevDtl() 
    {
        error_reporting(0);
        if($this->input->get('token')!=$this->session->userdata['sampark_session']['token'])
        {
                redirect(site_url('admin/admin_login_auth'));
        }
        $emp_id=$this->uri->segment(3); 
        $data['title'] = 'Employee';  
        $data['menu'] = $this->Model_admin->getUserMenuData(array('IS_VIEW' => 'w')); 
        $data['empcompdata'] = $this->Organization_model->getPrevEmployeeData(array('EMPLOYEE_ID'=>$emp_id)); 
        $this->load->view('template/admin_header',$data); 
        $this->load->view('organization/addEmpPrevDtl');
        $this->load->view('template/admin_footer');
    }
     public function addemployeeprevdetail()
    {
        
        $emp_id=$this->input->post('emp_employeeid');
        $path = 'assets/upload_image/user/';
        

        $companyname=$this->input->post('emp_compname');
        $companyaddress=$this->input->post('emp_compaddress');
        $ctc=$this->input->post('emp_compctc');
        $startdate=$this->input->post('emp_startfrom');
        $enddate=$this->input->post('emp_to');
        $appointment=$this->input->post('emp_appointment');
        $offer=$this->input->post('emp_offerletter');
        $salary=$this->input->post('emp_salaryslip');
        $leaving=$this->input->post('emp_compleavingletter');

        if($this->input->post('emp_offerletter'))
        {


        $offerletter_file = '';
        if (isset($_FILES['emp_offerletter']) && $_FILES['emp_offerletter']['name'] != ''){
            $config['upload_path'] =$path;
            $config['allowed_types'] = '*';
            $config['max_size'] = '10240'; //max_size in kb
          
            $new_name = $_FILES['emp_offerletter']['name'];
            $config['file_name'] = 'OFFERLETTER_'.$emp_id.'_'. rand(100, 100000);
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if ($this->upload->do_upload('emp_offerletter')) {
                $dataupload = $this->upload->data();
                $offerletter_file = $dataupload['file_name'];
            } 
            else 
            {
                $offerletter_file = "";
            } 
           
        }
            
        }
        if($this->input->post('emp_salaryslip'))
        {
        $salarySlip_file = '';
        
        if (isset($_FILES['emp_salaryslip']) && $_FILES['emp_salaryslip']['name'] != ''){
            $config['upload_path'] =$path;
            $config['allowed_types'] = '*';
            $config['max_size'] = '10240'; //max_size in kb
          
            $new_name = $_FILES['emp_salaryslip']['name'];
            $config['file_name'] = 'SALARYSLIP_'.$emp_id.'_'. rand(100, 100000);
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if ($this->upload->do_upload('emp_salaryslip')) {
                $dataupload = $this->upload->data();
                $salarySlip_file = $dataupload['file_name'];
            } 
            else 
            {
                $salarySlip_file = "";
            } 
           
        }
        }
        if($this->input->post('emp_compleavingletter'))
        {
        $leavingletter_file = '';
        
        if (isset($_FILES['emp_compleavingletter']) && $_FILES['emp_compleavingletter']['name'] != ''){
            $config['upload_path'] =$path;
            $config['allowed_types'] = '*';
            $config['max_size'] = '10240'; //max_size in kb
          
            $new_name = $_FILES['emp_compleavingletter']['name'];
            $config['file_name'] = 'LEAVING_LETTER_'.$emp_id.'_'. rand(100, 100000);
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if ($this->upload->do_upload('emp_compleavingletter')) {
                $dataupload = $this->upload->data();
                $leavingletter_file = $dataupload['file_name'];
            } 
            else 
            {
                $leavingletter_file = "";
            } 
           
        }
        }
        $data = array(            
            "PR_COMPANY_NAME"=>$companyname,  
            "PR_EMPLOYEE_ID"=>$this->input->post('emp_employeeid'),              
            "PR_COMPANY_ADDRESS"=>$companyaddress,                     
            "PR_SALARY"=>$ctc,            
            "PR_START_DATE"=>$startdate,            
            "PR_END_DATE"=>$enddate,
            "PR_APPOINTMENT_TERM"=>$appointment,
            "PR_OFFER_LETTER"=>$offerletter_file,
            "PR_SALARY_SLIP"=>$salarySlip_file,
            "PR_LEAVING_LETTER"=>$leavingletter_file,
            "PR_STATUS"=>'1' 
            
        );

        $this->Organization_model->addRow('pr_empexperiencedetail',$data);
           
        redirect("organization/users?token=".$this->session->userdata['sampark_session']['token'],'refresh');
       

    }
	public function designation() 
    {
        error_reporting(0);
        if($this->input->get('token')!=$this->session->userdata['sampark_session']['token'])
        {
                redirect(site_url('admin/admin_login_auth'));
        }
        $data['title'] = 'Designation';   
        $data['menu'] = $this->Model_admin->getUserMenuData(array('IS_VIEW' => 'w')); 
        $data['desigList'] = $this->Organization_model->getDesignationData();         
        $this->load->view('template/admin_header',$data); 
        $this->load->view('organization/designation');
        $this->load->view('template/admin_footer');
    }
     public function addDesignation()
    {
        $cur_date=date('Y-m-d h:i:s');
        $data = array(
             "ROLE_NAME"=>$this->input->post('desig_name'),
                     
            "ROLE_DESC"=>$this->input->post('desig_desc'),
            "PR_DEPT_ID"=>$this->input->post('desig_depart'),
            
            "ROLE_STATUS"=>$this->input->post('desig_status'),
            "ROLE_CREATED_AT"=>$cur_date

        );

        if($id = $this->Organization_model->addModel($data)){
            $this->session->set_flashdata('success', 'Designation added successfully.');
            redirect("organization/department_designation?token=".$this->session->userdata['sampark_session']['token'],'refresh');
        } else
        {
            $this->session->set_flashdata('fail', 'Designation can not be Inserted.');
            redirect("organization/department_designation?token=".$this->session->userdata['sampark_session']['token'],'refresh');
        }

    }
    public function addDepartment()
    {
        $cur_date=date('Y-m-d h:i:s');
        $data = array(
            "PR_DEPARTMENT_NAME"=>$this->input->post('dept_name'),
                     
            "PR_DEPARTMENT_DESC"=>$this->input->post('dept_desc'),
            
            "PR_DEPARTMENT_STATUS"=>$this->input->post('dept_status'),
            "PR_CREATED_AT"=>$cur_date

        );

        if($id = $this->Organization_model->addRow('pr_department',$data)){
            $this->session->set_flashdata('success', 'Department added successfully.');
            redirect("organization/department_designation?token=".$this->session->userdata['sampark_session']['token'],'refresh');
        } else
        {
            $this->session->set_flashdata('fail', 'Department can not be Inserted.');
            redirect("organization/department_designation?token=".$this->session->userdata['sampark_session']['token'],'refresh');
        }

    }
    public function designationEdit()
    {
        $id=$this->uri->segment(3);
        //echo $id; exit;
        $editData = $this->Organization_model->getData(array('ROLE_ID'=>$id,'single'=>'1'));
        $departmentData = $this->Organization_model->getDepartmentData();
        //echo '<pre>'.$editData->CATEGORY_ID; print_r($editData); die;
            $htm = '';
            $htm .= '<div class="row">';
             $htm .= '<div class="col-md-12 form-group">';
            $htm .= '   <label for="email1">DEPARTMENT</label>';
            $htm .= '   <select class="form-control" style="width: 100%;" data-select2-id="1" tabindex="1" id="desig_dept" name="desig_dept" aria-hidden="true">';
            $htm .= '<option  value="">Select Department</option>';
            foreach ($departmentData as $deptrow) {
               
            
            

            if($editData->PR_DEPT_ID==$deptrow->PR_DEPARTMENT_ID){ 
             $htm .= '<option selected="selected" value="'.$deptrow->PR_DEPARTMENT_ID.'">'.$deptrow->PR_DEPARTMENT_NAME.'</option>';
            }
            else
            {
             $htm .='<option value="'.$deptrow->PR_DEPARTMENT_ID.'">'.$deptrow->PR_DEPARTMENT_NAME.'</option>';
            }

            }

            
            $htm .= '   </select>';
            $htm .= '</div>';
            $htm .= '<div class="col-md-6 form-group">';
            $htm .= '   <label for="email1">DESIGNATION</label>';
            $htm .= '   <input type="text" class="form-control" id="cat_category" aria-describedby="emailHelp" name="desig_name" value="'.$editData->ROLE_NAME.'" placeholder="Enter Designation Name">';
            $htm .= '</div>';
            $htm .= '<input type="hidden" name="id" value="'.$editData->ROLE_ID.'">';
           
            $htm .= '';
          
           
            $htm .= '';
            $active = '';
            $deactive = '';
            if($editData->ROLE_STATUS == 1){
                $active = 'selected';
            }elseif ($editData->ROLE_STATUS == 0){
                $deactive = 'selected';
            }
            $htm .= '<div class="col-md-6 form-group">';
            $htm .= '   <label for="email1">STATUS</label>';
            $htm .= '   <select class="form-control" style="width: 100%;" data-select2-id="1" tabindex="1" id="desig_status" name="desig_status" aria-hidden="true">';
            $htm .= '       <option '.$active.' value="1">Active</option>';
            $htm .= '       <option '.$deactive.' value="0">De-Active</option>';
            $htm .= '   </select>';
            $htm .= '</div>';
            $htm .= '';
            $htm .= '<div class="col-md-12 form-group">';
            $htm .= '   <label for="email1"> DESCRIPTION</label>';
            $htm .= '   <textarea class="form-control" rows="3" id="desig_desc" name="desig_desc" placeholder="Enter Brand Description" spellcheck="false">'.$editData->ROLE_DESC.'</textarea>';
            $htm .= '</div>';
            $htm .= '</div>';

            echo $htm;
    }
    public function departmentEdit()
    {
        $id=$this->uri->segment(3);
        //echo $id; exit;
        $editData = $this->Organization_model->getDepartData(array('PR_DEPARTMENT_ID'=>$id,'single'=>'1'));
      
            $htm = '';
            $htm .= '<div class="row">';
            
            $htm .= '<div class="col-md-6 form-group">';
            $htm .= '   <label for="email1">DEPARTMENT</label>';
            $htm .= '   <input type="text" class="form-control" id="cat_category" aria-describedby="emailHelp" name="dept_name" value="'.$editData->PR_DEPARTMENT_NAME.'" placeholder="Enter Designation Name">';
            $htm .= '</div>';
            $htm .= '<input type="hidden" name="id" value="'.$editData->PR_DEPARTMENT_ID.'">';
           
            $htm .= '';
          
           
            $htm .= '';
            $active = '';
            $deactive = '';
            if($editData->PR_DEPARTMENT_STATUS == 1){
                $active = 'selected';
            }elseif ($editData->PR_DEPARTMENT_STATUS == 0){
                $deactive = 'selected';
            }
            $htm .= '<div class="col-md-6 form-group">';
            $htm .= '   <label for="email1">STATUS</label>';
            $htm .= '   <select class="form-control" style="width: 100%;" data-select2-id="1" tabindex="1" id="dept_status" name="desig_status" aria-hidden="true">';
            $htm .= '       <option '.$active.' value="1">Active</option>';
            $htm .= '       <option '.$deactive.' value="0">De-Active</option>';
            $htm .= '   </select>';
            $htm .= '</div>';
            $htm .= '';
            $htm .= '<div class="col-md-12 form-group">';
            $htm .= '   <label for="email1"> DESCRIPTION</label>';
            $htm .= '   <textarea class="form-control" rows="3" id="desig_desc" name="dept_desc" spellcheck="false">'.$editData->PR_DEPARTMENT_DESC.'</textarea>';
            $htm .= '</div>';
            $htm .= '</div>';

            echo $htm;
    }
    public function designationUpdate()
    {
        //print_r($_POST); die;
        //$category_code = $this->category_model->getMaxId();
        $cur_date=date('Y-m-d h:i:s');
        $cat_id = $this->input->post('id');

            
            $data["ROLE_NAME"]=$this->input->post('desig_name');
            $data["ROLE_DESC"]=$this->input->post('desig_desc');
            $data["PR_DEPT_ID"]=$this->input->post('desig_dept');
            $data["ROLE_STATUS"]=$this->input->post('desig_status');
            $data["ROLE_UPDATED_AT"]=$cur_date;

        if($id = $this->Organization_model->editModel($data,$cat_id)){
            $this->session->set_flashdata('success', 'Designation updated successfully.');
            redirect("organization/department_designation?token=".$this->session->userdata['sampark_session']['token'],'refresh');
        
        }
        else
        {
            $this->session->set_flashdata('fail', 'Designation can not be Inserted.');
            redirect("organization/department_designation?token=".$this->session->userdata['sampark_session']['token'],'refresh');
            
        }

    }
     public function departmentUpdate()
    {
        //print_r($_POST); die;
        //$category_code = $this->category_model->getMaxId();
        $cur_date=date('Y-m-d h:i:s');
        $dept_id = $this->input->post('id');

            
            $data["PR_DEPARTMENT_NAME"]=$this->input->post('dept_name');
            $data["PR_DEPARTMENT_DESC"]=$this->input->post('dept_desc');
           
            $data["PR_DEPARTMENT_STATUS"]=$this->input->post('dept_status');
            $data["PR_UPDATED_AT"]=$cur_date;

        if($id = $this->Organization_model->updateRow('pr_department',$data,array('PR_DEPARTMENT_ID'=>$dept_id))){
            $this->session->set_flashdata('success', 'Departmentmnet updated successfully.');
            redirect("organization/department_designation?token=".$this->session->userdata['sampark_session']['token'],'refresh');
        
        }
        else
        {
            $this->session->set_flashdata('fail', 'Designation can not be Inserted.');
            redirect("organization/department_designation?token=".$this->session->userdata['sampark_session']['token'],'refresh');
            
        }

    }
     public function designationDelete($item_id)
    {
        if($this->Organization_model->deleteModel($item_id)){
            $this->session->set_flashdata('success', 'Designation Delete Successfully!');
            redirect("organization/department_designation?token=".$this->session->userdata['sampark_session']['token'],'refresh');
        }
    }
     public function departmentDelete($item_id)
    {
        if($this->Organization_model->deleteDept($item_id)){
            $this->session->set_flashdata('success', 'Department Delete Successfully!');
            redirect("organization/department_designation?token=".$this->session->userdata['sampark_session']['token'],'refresh');
        }
    }
    
    public function designation_permission() 
    {
        if($this->input->get('token')!=$this->session->userdata['sampark_session']['token'])
        {
                redirect(site_url('admin/admin_login_auth'));
        }
        $data['title'] = 'Designation Permission';   
        $data['menu'] = $this->Model_admin->getUserMenuData(array('IS_VIEW' => 'w'));       
        $this->load->view('template/admin_header',$data); 
        $this->load->view('organization/desig_permission');
        $this->load->view('template/admin_footer');
    }


    public function department_designation() 
    {
        if($this->input->get('token')!=$this->session->userdata['sampark_session']['token'])
        {
                redirect(site_url('admin/admin_login_auth'));
        }
        $data['title'] = 'Designation Permission';   
        $data['menu'] = $this->Model_admin->getUserMenuData(array('IS_VIEW' => 'w')); 
        $data['department'] = $this->Organization_model->getDepartmentData();       
        $this->load->view('template/admin_header',$data); 
        $this->load->view('organization/department_designation');
        $this->load->view('template/admin_footer');
    }


    public function appDesignation_permission() 
    {
        if($this->input->get('token')!=$this->session->userdata['sampark_session']['token'])
        {
                redirect(site_url('admin/admin_login_auth'));
        }
        $data['title'] = 'App Designation Permission';   
        $data['menu'] = $this->Model_admin->getUserMenuData(array('IS_VIEW' => 'w')); 
        $data['appmenu'] = $this->Model_admin->getAppMenuData(array('IS_VIEW' => 'm'));       
        $this->load->view('template/admin_header',$data); 
        $this->load->view('organization/appMenudesig_permission');
        $this->load->view('template/admin_footer');
    }
    public function users() 
    {
        if($this->input->get('token')!=$this->session->userdata['sampark_session']['token'])
        {
                redirect(site_url('admin/admin_login_auth'));
        }
        $data['title'] = 'User';   
        $data['menu'] = $this->Model_admin->getUserMenuData(array('IS_VIEW' => 'w'));       
        $data['userLists'] = $this->Organization_model->getUserData(array('count'=>'all'));     
        $this->load->view('template/admin_header',$data); 
        $this->load->view('organization/user');
        $this->load->view('template/admin_footer');
    }
    public function appliedusers() 
    {
        if($this->input->get('token')!=$this->session->userdata['sampark_session']['token'])
        {
                redirect(site_url('admin/admin_login_auth'));
        }
        $data['title'] = 'User';   
        $data['menu'] = $this->Model_admin->getUserMenuData(array('IS_VIEW' => 'w'));       
        $data['userLists'] = $this->Organization_model->getAppliedUserData(array('count'=>'all'));     
        $this->load->view('template/admin_header',$data); 
        $this->load->view('organization/applieduser');
        $this->load->view('template/admin_footer');
    }
    public function applieddistributors() 
    {
        if($this->input->get('token')!=$this->session->userdata['sampark_session']['token'])
        {
                redirect(site_url('admin/admin_login_auth'));
        }
        $data['title'] = 'User';   
        $data['menu'] = $this->Model_admin->getUserMenuData(array('IS_VIEW' => 'w'));       
        $data['distributor'] = $this->Organization_model->getDistributorDatas(array('count'=>'all'));     
        $this->load->view('template/admin_header',$data); 
        $this->load->view('organization/applieddistributors');
        $this->load->view('template/admin_footer');
    }
    public function distributor() 
    {
        if($this->input->get('token')!=$this->session->userdata['sampark_session']['token'])
        {
                redirect(site_url('admin/admin_login_auth'));
        }
        $data['title'] = 'User';   
        $data['menu'] = $this->Model_admin->getUserMenuData(array('IS_VIEW' => 'w'));   
        $user_id=$this->session->userdata['sampark_session']['USER_ID'];    
        $data['distributor'] = $this->Organization_model->getDistributorData(array('count'=>'all','PR_REPORTING_MANAGER'=>$user_id));     
        $this->load->view('template/admin_header',$data); 
        $this->load->view('organization/distributor');
        $this->load->view('template/admin_footer');
    }

    public function distributorList() 
    {
        if($this->input->get('token')!=$this->session->userdata['sampark_session']['token'])
        {
                redirect(site_url('admin/admin_login_auth'));
        }
        $data['title'] = 'User';   
        $data['menu'] = $this->Model_admin->getUserMenuData(array('IS_VIEW' => 'w'));   
        $user_id=$this->session->userdata['sampark_session']['USER_ID'];    
        $data['distributor'] = $this->Organization_model->getDistributorData(array('count'=>'all','PR_REPORTING_MANAGER'=>$user_id));     
        $this->load->view('template/admin_header',$data); 
        $this->load->view('organization/distributor');
        $this->load->view('template/admin_footer');
    }


public function retailerList() 
    {
        
        $data['title'] = 'User';   
        $data['menu'] = $this->Model_admin->getUserMenuData(array('IS_VIEW' => 'w'));   
        $user_id=$this->session->userdata['sampark_session']['USER_ID'];    
    $data['retailerList'] = $this->Organization_model->getRetailerrData(array('count'=>'all','PR_REPORTING_MANAGER'=>$user_id));  $this->load->view('template/admin_header',$data); 
        $this->load->view('organization/retailerList');
        $this->load->view('template/admin_footer');
    }

    public function retailer() 
    {
        error_reporting(0);
        // if($this->input->get('token')!=$this->session->userdata['sampark_session']['token'])
        // {
        //         redirect(site_url('admin/admin_login_auth'));
        // }
        $data['title'] = 'Retailer';  
        $data['menu'] = $this->Model_admin->getUserMenuData(array('IS_VIEW' => 'w')); 
        //$data['retailerList'] = $this->Product_model->getRetailerList();    
        $this->load->view('template/admin_header',$data); 
        $this->load->view('organization/retailer');
        $this->load->view('template/admin_footer');
    }



    public function addUser()
    {
        $email=$this->input->post('email');
        $emailExist = $this->Model_admin_auth->getUserList(array('EMAIL' => $email));
        if($emailExist) 
        {
            $this->session->set_flashdata('fail', 'User  Already Exist with this Email.');
            redirect("organization/users?token=".$this->session->userdata['sampark_session']['token'],'refresh');
        }
        else
        {

         $path = 'assets/upload_image/user/';
         $userimage="";
         if (isset($_FILES['user_image']) && $_FILES['user_image']['name'] != ''){
            $config['upload_path'] =$path;
            $config['allowed_types'] = '*';
            $config['max_size'] = '10240'; //max_size in kb
          
            $new_name = $_FILES['user_image']['name'];
            $config['file_name'] = 'user_' . rand(100, 100000);
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if ($this->upload->do_upload('user_image')) {
                $dataupload = $this->upload->data();
                $userimage = $dataupload['file_name'];
            } 
            else 
            {
                $userimage = "";
            } 
           
        }
        $cur_date=date('Y-m-d h:i:s');
        $data = array(
            "ROLE_ID"=>$this->input->post('designation'),                     
            "USER_CODE"=>'SAMP',            
            "PASSWORD"=>md5('123456'),
            "TITLE"=>$this->input->post('title'),
            "NAME"=>$this->input->post('name'),
            "EMAIL"=>$this->input->post('email'),
            "PHONE"=>$this->input->post('phone'),
            "PRESENT_ADDRESS"=>$this->input->post('present_address'),
            "PERMANENT_ADDRESS"=>$this->input->post('permanent_address'),
            "AADHAR_CARD_NO"=>$this->input->post('aadhar'),
            "PANCARD_NO"=>$this->input->post('pancard'),
            "ACCOUNT_NO"=>$this->input->post('accountno'),
            "IFSC_CODE"=>$this->input->post('ifsc'),
            "BANK_NAME"=>$this->input->post('bankname'),
            "STATUS"=>$this->input->post('u_status'),
            "IMAGE"=>$userimage,
            "CREATED_AT"=>$cur_date

        );

        if($id = $this->Organization_model->adduser($data)){
            $this->session->set_flashdata('success', 'User added successfully.');
            redirect("organization/users?token=".$this->session->userdata['sampark_session']['token'],'refresh');
        } else
        {
            $this->session->set_flashdata('fail', 'User can not be Inserted.');
            redirect("organization/users?token=".$this->session->userdata['sampark_session']['token'],'refresh');
        }

    }

    }
    public function addAppliedUsers()
    {
        $email=$this->input->post('emp_email');
        $emailExist = $this->Organization_model->getUserList(array('EMAIL' => $email));
//print_r($emailExist); exit;
        if($emailExist) 
        {
            $this->session->set_flashdata('fail', 'User  Already Exist with this Email.');
            redirect("organization/appliedusers?token=".$this->session->userdata['sampark_session']['token'],'refresh');
        }
        else
        {

        $cur_date=date('Y-m-d h:i:s');
        //$email=$this->input->post('emp_email');
        $name=$this->input->post('emp_name');
        $data = array(
            "PR_NAME"=>$this->input->post('emp_name'),     
            "PR_EMAIL"=>$this->input->post('emp_email'),                     
            "PR_EMPLOYEE_CODE"=>'SAMP',            
            "PR_PASSWORD"=>md5('123456'),
            "PR_EMPLOYEE_STATUS"=>'2',            
            "PR_CREATED_AT"=>$cur_date

        );

        if($id = $this->Organization_model->addRow('pr_employee',$data))
        {
                $empcode='SAMPARK'.$id;
                $edata=array('PR_EMPLOYEE_CODE'=>$empcode);
                $this->Organization_model->updateRow('pr_employee',$edata,array('PR_EMPLOYEE_ID'=>$id ));


               $this->load->library('phpmailer_lib');
        
                // PHPMailer object
                $mail = $this->phpmailer_lib->load();
                
               $mail->setFrom('rohit.cbtech@gmail.com', 'SAMPARK');
               $mail->addReplyTo('rohit.cbtech@gmail.com', 'SAMPARK');
                
                // Add a recipient
                $mail->addAddress($email);
                
                // Email subject
                $mail->Subject = 'Hello from Impact Group';
                
                // Set email format to HTML
                $mail->isHTML(true);
                
                
//echo  $mess; exit;
                // Email body content
        
                   $logoimg=base_url()."assets/images/sampark_logo.jpg";
                $backimg=base_url()."assets/images/after_bg.png";

                 $mailContent ='<!DOCTYPE html>
                <html>
                <head>

                <meta content="text/html; charset=utf-8" http-equiv="Content-Type"/>
                <meta content="width=device-width" name="viewport"/>
                <meta content="IE=edge" http-equiv="X-UA-Compatible"/>
                <title></title>
                <link href="http://fonts.googleapis.com/css?family=Cabin" rel="stylesheet" type="text/css"/>
                <link href="http://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css"/>
                <style type="text/css">
                body {
                margin: 0;
                padding: 0;
                }
                table,
                td,
                tr {
                vertical-align: top;
                border-collapse: collapse;
                }
                * {
                line-height: inherit;
                }
                a[x-apple-data-detectors=true] {
                color: inherit !important;
                text-decoration: none !important;
                }
                </style>
                <style id="media-query" type="text/css">
                @media (max-width: 670px) {
                .block-grid,
                .col {
                min-width: 320px !important;
                max-width: 100% !important;
                display: block !important;
                }
                .block-grid {
                width: 100% !important;
                }
                .col {
                width: 100% !important;
                }
                .col_cont {
                margin: 0 auto;
                }
                img.fullwidth,
                img.fullwidthOnMobile {
                max-width: 100% !important;
                }
                .no-stack .col {
                min-width: 0 !important;
                display: table-cell !important;
                }
                .no-stack.two-up .col {
                width: 50% !important;
                }
                .no-stack .col.num2 {
                width: 16.6% !important;
                }
                .no-stack .col.num3 {
                width: 25% !important;
                }
                .no-stack .col.num4 {
                width: 33% !important;
                }
                .no-stack .col.num5 {
                width: 41.6% !important;
                }
                .no-stack .col.num6 {
                width: 50% !important;
                }
                .no-stack .col.num7 {
                width: 58.3% !important;
                }
                .no-stack .col.num8 {
                width: 66.6% !important;
                }
                .no-stack .col.num9 {
                width: 75% !important;
                }
                .no-stack .col.num10 {
                width: 83.3% !important;
                }
                .video-block {
                max-width: none !important;
                }
                .mobile_hide {
                min-height: 0px;
                max-height: 0px;
                max-width: 0px;
                display: none;
                overflow: hidden;
                font-size: 0px;
                }
                .desktop_hide {
                display: block !important;
                max-height: none !important;
                }
                }
                </style>
                <style id="menu-media-query" type="text/css">
                @media (max-width: 670px) {
                .menu-checkbox[type="checkbox"]~.menu-links {
                display: none !important;
                padding: 5px 0;
                }
                .menu-checkbox[type="checkbox"]~.menu-links span.sep {
                display: none;
                }
                .menu-checkbox[type="checkbox"]:checked~.menu-links,
                .menu-checkbox[type="checkbox"]~.menu-trigger {
                display: block !important;
                max-width: none !important;
                max-height: none !important;
                font-size: inherit !important;
                }
                .menu-checkbox[type="checkbox"]~.menu-links>a,
                .menu-checkbox[type="checkbox"]~.menu-links>span.label {
                display: block !important;
                text-align: center;
                }
                .menu-checkbox[type="checkbox"]:checked~.menu-trigger .menu-close {
                display: block !important;
                }
                .menu-checkbox[type="checkbox"]:checked~.menu-trigger .menu-open {
                display: none !important;
                }
                #menuf91tyo~div label {
                border-radius: 0% !important;
                }
                #menuf91tyo:checked~.menu-links {
                background-color: #000000 !important;
                }
                #menuf91tyo:checked~.menu-links a {
                color: #ffffff !important;
                }
                #menuf91tyo:checked~.menu-links span {
                color: #ffffff !important;
                }
                }
                </style>
                </head>
                <body class="clean-body" style="margin: 0; padding: 0; -webkit-text-size-adjust: 100%; background-color: #FFF;">
                <table bgcolor="#000000" cellpadding="0" cellspacing="0" class="nl-container" role="presentation" style="table-layout: fixed; vertical-align: top; min-width: 320px; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #FFF; width: 100%;" valign="top" width="100%">
                <tbody>
                <tr style="vertical-align: top;" valign="top">
                <td style="word-break: break-word; vertical-align: top;" valign="top">
                <div style="background-color:#000000;">
                <div class="block-grid mixed-two-up" style="min-width: 320px; max-width: 650px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; Margin: 0 auto; background-color: #ffffff;">
                <div style="border-collapse: collapse;display: table;width: 100%;background-color:#ffffff;">
                <div class="col num4" style="display: table-cell; vertical-align: top; max-width: 320px; min-width: 216px; width: 216px;">
                <div class="col_cont" style="width:100% !important;">
                <div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:0px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;">
                <div align="center" class="img-container center fixedwidth" style="padding-right: 0px;padding-left: 0px;">
                <div style="font-size:1px;line-height:5px"> </div>
                <img align="center" alt="logo zex music" border="0" class="center fixedwidth" src="'.$logoimg.'" style="text-decoration: none; -ms-interpolation-mode: bicubic; height: auto; border: 0; width: 100%; max-width: 130px; display: block;" title="logo zex music" width="130"/>
                <div style="font-size:1px;line-height:5px"> </div>
                </div>
                </div>
                </div>
                </div>
                </div>
                </div>
                </div>
                <div style="background-color:#000000;">
                <div class="block-grid" style="min-width: 320px; max-width: 650px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; margin: 0 auto; background-color: #f1d1b8;">
                <div style="border-collapse: collapse;display: table;width: 100%;background-image: url('.$backimg.');background-size: cover;background-position: center;background-repeat: no-repeat;" >

                <div class="col num12" style="min-width: 320px; max-width: 650px; display: table-cell; vertical-align: top; width: 650px;">
                <div class="col_cont" style="width:100% !important;">
                <div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:45px; padding-bottom:45px; padding-right: 0px; padding-left: 0px;">

                <div style="color:#393d47;font-family:"Cabin", Arial, "Helvetica Neue", Helvetica, sans-serif;line-height:1.2;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px;">
                <div style="line-height: 1.2; font-size: 12px; font-family: "Cabin", Arial, "Helvetica Neue", Helvetica, sans-serif; color: #393d47; mso-line-height-alt: 14px;">
                
                <p  style="-webkit-text-size-adjust: none; text-decoration: none; display: inline-block; color: #ffffff; background-color: #f0795c; border-radius: 30px; -webkit-border-radius: 30px; -moz-border-radius: 30px; width: auto; width: auto; border-top: 1px solid #f0795c; border-right: 1px solid #f0795c; border-bottom: 1px solid #f0795c; border-left: 1px solid #f0795c; padding-top: 5px; padding-bottom: 5px; font-family: "Cabin", Arial, "Helvetica Neue", Helvetica, sans-serif; text-align: center; mso-border-alt: none; word-break: keep-all;">&nbsp;&nbsp;&nbsp;<strong>Dear</strong> '.$name.',<br/>

&nbsp;&nbsp;&nbsp;We wish to thank you for choosing to apply to Impact Group, a company now in 10 countries with promising &nbsp;&nbsp;&nbsp;career growth path and learning.
<br/>
&nbsp;&nbsp;&nbsp;Our open, transparent, people centric policies and processes, have attracted top talent globally and we look &nbsp;&nbsp;&nbsp;forward to hearing from you, soon.<br/>

&nbsp;&nbsp;&nbsp;Just click the link below and fill / upload all requested information / documents, as a part of our screening &nbsp;&nbsp;&nbsp;process.
  <a href="http://3.7.157.160/sampark/outer/addEmployee/'.$id .'/1" style="-webkit-text-size-adjust: none; text-decoration: none; display: inline-block; color: #ffffff; background-color: #f0795c; border-radius: 30px; -webkit-border-radius: 30px; -moz-border-radius: 30px; width: auto; width: auto; border-top: 1px solid #f0795c; border-right: 1px solid #f0795c; border-bottom: 1px solid #f0795c; border-left: 1px solid #f0795c; padding-top: 5px; padding-bottom: 5px; font-family: "Cabin", Arial, "Helvetica Neue", Helvetica, sans-serif; text-align: center; mso-border-alt: none; word-break: keep-all;" target="_blank">CLICK HERE</a><br/><br/>
&nbsp;&nbsp;&nbsp;Here is wishing you and the entire family a wonderful 2021 !<br/>
<br/><br/>
&nbsp;&nbsp;&nbsp;Regards<br/>
&nbsp;&nbsp;&nbsp;Team Impact</p>
                </div>
                </div>

              

                <div align="center" class="button-container" style="padding-top:10px;padding-right:10px;padding-bottom:0px;padding-left:10px;">
              

                </div>


                </div>

                </div>
                </div>

                </div>
                </div>
                </div>
                <div style="background-color:#000000;">
                <div class="block-grid two-up no-stack" style="min-width: 320px; max-width: 650px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; Margin: 0 auto; background-color: #1a6b41;">
                <div style="border-collapse: collapse;display: table;width: 100%;background-color:#1a6b41;">

                <div class="col num6" style="display: table-cell; vertical-align: top; max-width: 320px; min-width: 324px; width: 325px;">
                <div class="col_cont" style="width:100% !important;">
                <div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:0px; padding-bottom:0px; padding-right: 0px; padding-left: 0px;">
                <table cellpadding="0" cellspacing="0" class="social_icons" role="presentation" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt;" valign="top" width="100%">
                <tbody>
                <tr style="vertical-align: top;" valign="top">
                <td style="word-break: break-word; vertical-align: top; padding-top: 10px; padding-right: 10px; padding-bottom: 10px; padding-left: 20px;" valign="top">
                <table align="left" cellpadding="0" cellspacing="0" class="social_table" role="presentation" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-tspace: 0; mso-table-rspace: 0; mso-table-bspace: 0; mso-table-lspace: 0;" valign="top">
                <tbody>
                <tr align="left" style="vertical-align: top; display: inline-block; text-align: left;" valign="top">
                <td style="word-break: break-word; vertical-align: top; padding-bottom: 0; padding-right: 4px; padding-left: 0px;" valign="top"><a href="https://www.facebook.com/" target="_blank"><img alt="Facebook" height="32" src="'.base_url().'assets/images/facebook2x.png" style="text-decoration: none; -ms-interpolation-mode: bicubic; height: auto; border: 0; display: block;" title="facebook" width="32"/></a></td>
                <td style="word-break: break-word; vertical-align: top; padding-bottom: 0; padding-right: 4px; padding-left: 0px;" valign="top"><a href="https://www.twitter.com/" target="_blank"><img alt="Twitter" height="32" src="'.base_url().'assets/images/twitter2x.png" style="text-decoration: none; -ms-interpolation-mode: bicubic; height: auto; border: 0; display: block;" title="twitter" width="32"/></a></td>
                <td style="word-break: break-word; vertical-align: top; padding-bottom: 0; padding-right: 4px; padding-left: 0px;" valign="top"><a href="https://www.linkedin.com/" target="_blank"><img alt="Linkedin" height="32" src="'.base_url().'assets/images/linkedin2x.png" style="text-decoration: none; -ms-interpolation-mode: bicubic; height: auto; border: 0; display: block;" title="linkedin" width="32"/></a></td>
                <td style="word-break: break-word; vertical-align: top; padding-bottom: 0; padding-right: 4px; padding-left: 0px;" valign="top"><a href="https://www.instagram.com/" target="_blank"><img alt="Instagram" height="32" src="'.base_url().'assets/images/instagram2x.png" style="text-decoration: none; -ms-interpolation-mode: bicubic; height: auto; border: 0; display: block;" title="instagram" width="32"/></a></td>
                </tr>
                </tbody>
                </table>
                </td>
                </tr>
                </tbody>
                </table>
                </div>

                </div>
                </div>

                <div class="col num6" style="display: table-cell; vertical-align: top; max-width: 320px; min-width: 324px; width: 325px;">
                <div class="col_cont" style="width:100% !important;">
                <div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;">

                <div style="color:#393d47;font-family:Arial, Helvetica Neue, Helvetica, sans-serif;line-height:1.2;padding-top:10px;padding-right:20px;padding-bottom:10px;padding-left:10px;">
                <div style="line-height: 1.2; font-size: 12px; color: #393d47; font-family: Arial, Helvetica Neue, Helvetica, sans-serif; mso-line-height-alt: 14px;">
                <p style="font-size: 14px; line-height: 1.2; word-break: break-word; text-align: right; mso-line-height-alt: 17px; margin: 0;"><span style="color: #ffffff;">SAMPARK <a href="#0" rel="noopener" style="color: #ffffff;" target="_blank"></a> <br/></span></p>
                </div>
                </div>

                </div>

                </div>
                </div>

                </div>
                </div>
                </div>

                </td>
                </tr>
                </tbody>
                </table>

                </body>
                </html>';
                $mail->Body =$mailContent;// $mess;//$mailContent;
                
                // Send email
                if(!$mail->send()){
                    echo 'Message could not be sent.';
                    echo 'Mailer Error: ' . $mail->ErrorInfo;
                }else{
                    echo 'Message has been sent';
                }

            $this->session->set_flashdata('success', 'User added successfully.');
            redirect("organization/appliedusers?token=".$this->session->userdata['sampark_session']['token'],'refresh');
        } else
        {
            $this->session->set_flashdata('fail', 'User can not be Inserted.');
            redirect("organization/appliedusers?token=".$this->session->userdata['sampark_session']['token'],'refresh');
        }

    }

    }
    public function addDistributor()
    {
        $email=$this->input->post('emp_email');
        $emailExist = $this->Organization_model->getUserList(array('EMAIL' => $email));
//print_r($emailExist); exit;
        if($emailExist) 
        {
            $this->session->set_flashdata('fail', 'User  Already Exist with this Email.');
            redirect("organization/applieddistributors?token=".$this->session->userdata['sampark_session']['token'],'refresh');
        }
        else
        {

        $cur_date=date('Y-m-d h:i:s');
        //$email=$this->input->post('emp_email');
        $name=$this->input->post('emp_name');
        $data = array(
            "PR_NAME"=>$this->input->post('emp_name'),     
            "PR_EMAIL"=>$this->input->post('emp_email'),                     
            "PR_EMPLOYEE_CODE"=>'SAMP',            
            "PR_PASSWORD"=>md5('123456'),
            "PR_DESIGNATION_ID"=>'11',
            "PR_EMPLOYEE_STATUS"=>'2',            
            "PR_CREATED_AT"=>$cur_date

        );

        if($id = $this->Organization_model->addRow('pr_employee',$data))
        {
                $empcode='DISTRIBUTOR'.$id;
                $edata=array('PR_EMPLOYEE_CODE'=>$empcode);
                $this->Organization_model->updateRow('pr_employee',$edata,array('PR_EMPLOYEE_ID'=>$id ));


               $this->load->library('phpmailer_lib');
        
                // PHPMailer object
                $mail = $this->phpmailer_lib->load();
                
               $mail->setFrom('rohit.cbtech@gmail.com', 'SAMPARK');
               $mail->addReplyTo('rohit.cbtech@gmail.com', 'SAMPARK');
                
                // Add a recipient
                $mail->addAddress($email);
                
                // Email subject
                $mail->Subject = 'Hello from Impact Group';
                
                // Set email format to HTML
                $mail->isHTML(true);
                
                $logoimg=base_url()."assets/images/sampark_logo.jpg";
                $backimg=base_url()."assets/images/after_bg.png";

                 $mailContent ='<!DOCTYPE html>
                <html>
                <head>

                <meta content="text/html; charset=utf-8" http-equiv="Content-Type"/>
                <meta content="width=device-width" name="viewport"/>
                <meta content="IE=edge" http-equiv="X-UA-Compatible"/>
                <title></title>
                <link href="https://fonts.googleapis.com/css?family=Cabin" rel="stylesheet" type="text/css"/>
                <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css"/>
                <style type="text/css">
                body {
                margin: 0;
                padding: 0;
                }
                table,
                td,
                tr {
                vertical-align: top;
                border-collapse: collapse;
                }
                * {
                line-height: inherit;
                }
                a[x-apple-data-detectors=true] {
                color: inherit !important;
                text-decoration: none !important;
                }
                </style>
                <style id="media-query" type="text/css">
                @media (max-width: 670px) {
                .block-grid,
                .col {
                min-width: 320px !important;
                max-width: 100% !important;
                display: block !important;
                }
                .block-grid {
                width: 100% !important;
                }
                .col {
                width: 100% !important;
                }
                .col_cont {
                margin: 0 auto;
                }
                img.fullwidth,
                img.fullwidthOnMobile {
                max-width: 100% !important;
                }
                .no-stack .col {
                min-width: 0 !important;
                display: table-cell !important;
                }
                .no-stack.two-up .col {
                width: 50% !important;
                }
                .no-stack .col.num2 {
                width: 16.6% !important;
                }
                .no-stack .col.num3 {
                width: 25% !important;
                }
                .no-stack .col.num4 {
                width: 33% !important;
                }
                .no-stack .col.num5 {
                width: 41.6% !important;
                }
                .no-stack .col.num6 {
                width: 50% !important;
                }
                .no-stack .col.num7 {
                width: 58.3% !important;
                }
                .no-stack .col.num8 {
                width: 66.6% !important;
                }
                .no-stack .col.num9 {
                width: 75% !important;
                }
                .no-stack .col.num10 {
                width: 83.3% !important;
                }
                .video-block {
                max-width: none !important;
                }
                .mobile_hide {
                min-height: 0px;
                max-height: 0px;
                max-width: 0px;
                display: none;
                overflow: hidden;
                font-size: 0px;
                }
                .desktop_hide {
                display: block !important;
                max-height: none !important;
                }
                }
                </style>
                <style id="menu-media-query" type="text/css">
                @media (max-width: 670px) {
                .menu-checkbox[type="checkbox"]~.menu-links {
                display: none !important;
                padding: 5px 0;
                }
                .menu-checkbox[type="checkbox"]~.menu-links span.sep {
                display: none;
                }
                .menu-checkbox[type="checkbox"]:checked~.menu-links,
                .menu-checkbox[type="checkbox"]~.menu-trigger {
                display: block !important;
                max-width: none !important;
                max-height: none !important;
                font-size: inherit !important;
                }
                .menu-checkbox[type="checkbox"]~.menu-links>a,
                .menu-checkbox[type="checkbox"]~.menu-links>span.label {
                display: block !important;
                text-align: center;
                }
                .menu-checkbox[type="checkbox"]:checked~.menu-trigger .menu-close {
                display: block !important;
                }
                .menu-checkbox[type="checkbox"]:checked~.menu-trigger .menu-open {
                display: none !important;
                }
                #menuf91tyo~div label {
                border-radius: 0% !important;
                }
                #menuf91tyo:checked~.menu-links {
                background-color: #000000 !important;
                }
                #menuf91tyo:checked~.menu-links a {
                color: #ffffff !important;
                }
                #menuf91tyo:checked~.menu-links span {
                color: #ffffff !important;
                }
                }
                </style>
                </head>
                <body class="clean-body" style="margin: 0; padding: 0; -webkit-text-size-adjust: 100%; background-color: #FFF;">
                <table bgcolor="#000000" cellpadding="0" cellspacing="0" class="nl-container" role="presentation" style="table-layout: fixed; vertical-align: top; min-width: 320px; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #FFF; width: 100%;" valign="top" width="100%">
                <tbody>
                <tr style="vertical-align: top;" valign="top">
                <td style="word-break: break-word; vertical-align: top;" valign="top">
                <div style="background-color:#000000;">
                <div class="block-grid mixed-two-up" style="min-width: 320px; max-width: 650px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; Margin: 0 auto; background-color: #ffffff;">
                <div style="border-collapse: collapse;display: table;width: 100%;background-color:#ffffff;">
                <div class="col num4" style="display: table-cell; vertical-align: top; max-width: 320px; min-width: 216px; width: 216px;">
                <div class="col_cont" style="width:100% !important;">
                <div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:0px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;">
                <div align="center" class="img-container center fixedwidth" style="padding-right: 0px;padding-left: 0px;">
                <div style="font-size:1px;line-height:5px"> </div>
                <img align="center" alt="logo zex music" border="0" class="center fixedwidth" src="'.$logoimg.'" style="text-decoration: none; -ms-interpolation-mode: bicubic; height: auto; border: 0; width: 100%; max-width: 130px; display: block;" title="logo zex music" width="130"/>
                <div style="font-size:1px;line-height:5px"> </div>
                </div>
                </div>
                </div>
                </div>
                </div>
                </div>
                </div>
                <div style="background-color:#000000;">
                <div class="block-grid" style="min-width: 320px; max-width: 650px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; margin: 0 auto; background-color: #f1d1b8;">
                <div style="border-collapse: collapse;display: table;width: 100%;background-image: url('.$backimg.');background-size: cover;background-position: center;background-repeat: no-repeat;" >

                <div class="col num12" style="min-width: 320px; max-width: 650px; display: table-cell; vertical-align: top; width: 650px;">
                <div class="col_cont" style="width:100% !important;">
                <div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:45px; padding-bottom:45px; padding-right: 0px; padding-left: 0px;">

                <div style="color:#393d47;font-family:"Cabin", Arial, "Helvetica Neue", Helvetica, sans-serif;line-height:1.2;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px;">
                <div style="line-height: 1.2; font-size: 12px; font-family: "Cabin", Arial, "Helvetica Neue", Helvetica, sans-serif; color: #393d47; mso-line-height-alt: 14px;">
                   
                <p  style="-webkit-text-size-adjust: none; text-decoration: none; display: inline-block; color: #ffffff; background-color: #f0795c; border-radius: 30px; -webkit-border-radius: 30px; -moz-border-radius: 30px; width: auto; width: auto; border-top: 1px solid #f0795c; border-right: 1px solid #f0795c; border-bottom: 1px solid #f0795c; border-left: 1px solid #f0795c; padding-top: 5px; padding-bottom: 5px; font-family: "Cabin", Arial, "Helvetica Neue", Helvetica, sans-serif; text-align: center; mso-border-alt: none; word-break: keep-all;">&nbsp;&nbsp;&nbsp;<strong>Dear</strong> '.$name.',<br/><br/>

&nbsp;&nbsp;&nbsp;We wish to thank you for choosing to apply to Impact Group, a company now in 10 countries, with a rewarding &nbsp;&nbsp;&nbsp;business growth path.<br/>

&nbsp;&nbsp;&nbsp;Our open, transparent, partner & market centric policies and processes, have made us a preferred choice of &nbsp;&nbsp;&nbsp;partner and we look forward to hearing from you, soon.<br/>

&nbsp;&nbsp;&nbsp;Just click the link below and fill / upload all requested information / documents, as a part of our screening &nbsp;&nbsp;&nbsp;process.
  <a href="http://3.7.157.160/sampark/outer/addDistributor/'.$id .'/1" style="-webkit-text-size-adjust: none; text-decoration: none; display: inline-block; color: #ffffff; background-color: #f0795c; border-radius: 30px; -webkit-border-radius: 30px; -moz-border-radius: 30px; width: auto; width: auto; border-top: 1px solid #f0795c; border-right: 1px solid #f0795c; border-bottom: 1px solid #f0795c; border-left: 1px solid #f0795c; padding-top: 5px; padding-bottom: 5px; font-family: "Cabin", Arial, "Helvetica Neue", Helvetica, sans-serif; text-align: center; mso-border-alt: none; word-break: keep-all;" target="_blank">CLICK HERE</a><br/><br/>
&nbsp;&nbsp;&nbsp;Here is wishing you and the entire family a wonderful 2021 !<br/>
<br/><br/>
&nbsp;&nbsp;&nbsp;Regards<br/>
&nbsp;&nbsp;&nbsp;Team Impact</p>
                </div>
                </div>

              



                </div>

                </div>
                </div>

                </div>
                </div>
                </div>
                <div style="background-color:#000000;">
                <div class="block-grid two-up no-stack" style="min-width: 320px; max-width: 650px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; Margin: 0 auto; background-color: #1a6b41;">
                <div style="border-collapse: collapse;display: table;width: 100%;background-color:#1a6b41;">

                <div class="col num6" style="display: table-cell; vertical-align: top; max-width: 320px; min-width: 324px; width: 325px;">
                <div class="col_cont" style="width:100% !important;">
                <div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:0px; padding-bottom:0px; padding-right: 0px; padding-left: 0px;">
                <table cellpadding="0" cellspacing="0" class="social_icons" role="presentation" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt;" valign="top" width="100%">
                <tbody>
                <tr style="vertical-align: top;" valign="top">
                <td style="word-break: break-word; vertical-align: top; padding-top: 10px; padding-right: 10px; padding-bottom: 10px; padding-left: 20px;" valign="top">
                <table align="left" cellpadding="0" cellspacing="0" class="social_table" role="presentation" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-tspace: 0; mso-table-rspace: 0; mso-table-bspace: 0; mso-table-lspace: 0;" valign="top">
                <tbody>
                <tr align="left" style="vertical-align: top; display: inline-block; text-align: left;" valign="top">
                <td style="word-break: break-word; vertical-align: top; padding-bottom: 0; padding-right: 4px; padding-left: 0px;" valign="top"><a href="https://www.facebook.com/" target="_blank"><img alt="Facebook" height="32" src="'.base_url().'assets/images/facebook2x.png" style="text-decoration: none; -ms-interpolation-mode: bicubic; height: auto; border: 0; display: block;" title="facebook" width="32"/></a></td>
                <td style="word-break: break-word; vertical-align: top; padding-bottom: 0; padding-right: 4px; padding-left: 0px;" valign="top"><a href="https://www.twitter.com/" target="_blank"><img alt="Twitter" height="32" src="'.base_url().'assets/images/twitter2x.png" style="text-decoration: none; -ms-interpolation-mode: bicubic; height: auto; border: 0; display: block;" title="twitter" width="32"/></a></td>
                <td style="word-break: break-word; vertical-align: top; padding-bottom: 0; padding-right: 4px; padding-left: 0px;" valign="top"><a href="https://www.linkedin.com/" target="_blank"><img alt="Linkedin" height="32" src="'.base_url().'assets/images/linkedin2x.png" style="text-decoration: none; -ms-interpolation-mode: bicubic; height: auto; border: 0; display: block;" title="linkedin" width="32"/></a></td>
                <td style="word-break: break-word; vertical-align: top; padding-bottom: 0; padding-right: 4px; padding-left: 0px;" valign="top"><a href="https://www.instagram.com/" target="_blank"><img alt="Instagram" height="32" src="'.base_url().'assets/images/instagram2x.png" style="text-decoration: none; -ms-interpolation-mode: bicubic; height: auto; border: 0; display: block;" title="instagram" width="32"/></a></td>
                </tr>
                </tbody>
                </table>
                </td>
                </tr>
                </tbody>
                </table>
                </div>

                </div>
                </div>

                <div class="col num6" style="display: table-cell; vertical-align: top; max-width: 320px; min-width: 324px; width: 325px;">
                <div class="col_cont" style="width:100% !important;">
                <div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;">

                <div style="color:#393d47;font-family:Arial, Helvetica Neue, Helvetica, sans-serif;line-height:1.2;padding-top:10px;padding-right:20px;padding-bottom:10px;padding-left:10px;">
                <div style="line-height: 1.2; font-size: 12px; color: #393d47; font-family: Arial, Helvetica Neue, Helvetica, sans-serif; mso-line-height-alt: 14px;">
                <p style="font-size: 14px; line-height: 1.2; word-break: break-word; text-align: right; mso-line-height-alt: 17px; margin: 0;"><span style="color: #ffffff;">SAMPARK <a href="#0" rel="noopener" style="color: #ffffff;" target="_blank"></a> <br/></span></p>
                </div>
                </div>

                </div>

                </div>
                </div>

                </div>
                </div>
                </div>

                </td>
                </tr>
                </tbody>
                </table>

                </body>
                </html>';
                $mail->Body =$mailContent;// $mess;//$mailContent;
                
                // Send email
                if(!$mail->send()){
                    echo 'Message could not be sent.';
                    echo 'Mailer Error: ' . $mail->ErrorInfo;
                }else{
                    echo 'Message has been sent';
                }

            $this->session->set_flashdata('success', 'User added successfully.');
            redirect("organization/applieddistributors?token=".$this->session->userdata['sampark_session']['token'],'refresh');
        } 
        else
        {
            $this->session->set_flashdata('fail', 'User can not be Inserted.');
            redirect("organization/applieddistributors?token=".$this->session->userdata['sampark_session']['token'],'refresh');
        }

    }

    }
    function send(){
        // Load PHPMailer library
        $this->load->library('phpmailer_lib');
        
        // PHPMailer object
        $mail = $this->phpmailer_lib->load();
        
       $mail->setFrom('rohit.cbtech@gmail.com', 'SAMPARK');
       $mail->addReplyTo('rohit.cbtech@gmail.com', 'SAMPARK');
        
        // Add a recipient
        $mail->addAddress('rohitkr3294@gmail.com');
        
        // Email subject
        $mail->Subject = 'Hello Rk';
        
        // Set email format to HTML
        $mail->isHTML(true);
        
        $logoimg=base_url()."assets/images/sampark_logo.jpg";
        $backimg=base_url()."assets/images/after_bg.png";
        // Email body content
        $mailContent ='<!DOCTYPE html>
                <html>
                <head>

                <meta content="text/html; charset=utf-8" http-equiv="Content-Type"/>
                <meta content="width=device-width" name="viewport"/>
                <meta content="IE=edge" http-equiv="X-UA-Compatible"/>
                <title></title>
                <link href="https://fonts.googleapis.com/css?family=Cabin" rel="stylesheet" type="text/css"/>
                <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css"/>
                <style type="text/css">
                body {
                margin: 0;
                padding: 0;
                }
                table,
                td,
                tr {
                vertical-align: top;
                border-collapse: collapse;
                }
                * {
                line-height: inherit;
                }
                a[x-apple-data-detectors=true] {
                color: inherit !important;
                text-decoration: none !important;
                }
                </style>
                <style id="media-query" type="text/css">
                @media (max-width: 670px) {
                .block-grid,
                .col {
                min-width: 320px !important;
                max-width: 100% !important;
                display: block !important;
                }
                .block-grid {
                width: 100% !important;
                }
                .col {
                width: 100% !important;
                }
                .col_cont {
                margin: 0 auto;
                }
                img.fullwidth,
                img.fullwidthOnMobile {
                max-width: 100% !important;
                }
                .no-stack .col {
                min-width: 0 !important;
                display: table-cell !important;
                }
                .no-stack.two-up .col {
                width: 50% !important;
                }
                .no-stack .col.num2 {
                width: 16.6% !important;
                }
                .no-stack .col.num3 {
                width: 25% !important;
                }
                .no-stack .col.num4 {
                width: 33% !important;
                }
                .no-stack .col.num5 {
                width: 41.6% !important;
                }
                .no-stack .col.num6 {
                width: 50% !important;
                }
                .no-stack .col.num7 {
                width: 58.3% !important;
                }
                .no-stack .col.num8 {
                width: 66.6% !important;
                }
                .no-stack .col.num9 {
                width: 75% !important;
                }
                .no-stack .col.num10 {
                width: 83.3% !important;
                }
                .video-block {
                max-width: none !important;
                }
                .mobile_hide {
                min-height: 0px;
                max-height: 0px;
                max-width: 0px;
                display: none;
                overflow: hidden;
                font-size: 0px;
                }
                .desktop_hide {
                display: block !important;
                max-height: none !important;
                }
                }
                </style>
                <style id="menu-media-query" type="text/css">
                @media (max-width: 670px) {
                .menu-checkbox[type="checkbox"]~.menu-links {
                display: none !important;
                padding: 5px 0;
                }
                .menu-checkbox[type="checkbox"]~.menu-links span.sep {
                display: none;
                }
                .menu-checkbox[type="checkbox"]:checked~.menu-links,
                .menu-checkbox[type="checkbox"]~.menu-trigger {
                display: block !important;
                max-width: none !important;
                max-height: none !important;
                font-size: inherit !important;
                }
                .menu-checkbox[type="checkbox"]~.menu-links>a,
                .menu-checkbox[type="checkbox"]~.menu-links>span.label {
                display: block !important;
                text-align: center;
                }
                .menu-checkbox[type="checkbox"]:checked~.menu-trigger .menu-close {
                display: block !important;
                }
                .menu-checkbox[type="checkbox"]:checked~.menu-trigger .menu-open {
                display: none !important;
                }
                #menuf91tyo~div label {
                border-radius: 0% !important;
                }
                #menuf91tyo:checked~.menu-links {
                background-color: #000000 !important;
                }
                #menuf91tyo:checked~.menu-links a {
                color: #ffffff !important;
                }
                #menuf91tyo:checked~.menu-links span {
                color: #ffffff !important;
                }
                }
                </style>
                </head>
                <body class="clean-body" style="margin: 0; padding: 0; -webkit-text-size-adjust: 100%; background-color: #FFF;">
                <table bgcolor="#000000" cellpadding="0" cellspacing="0" class="nl-container" role="presentation" style="table-layout: fixed; vertical-align: top; min-width: 320px; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #FFF; width: 100%;" valign="top" width="100%">
                <tbody>
                <tr style="vertical-align: top;" valign="top">
                <td style="word-break: break-word; vertical-align: top;" valign="top">
                <div style="background-color:#000000;">
                <div class="block-grid mixed-two-up" style="min-width: 320px; max-width: 650px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; Margin: 0 auto; background-color: #ffffff;">
                <div style="border-collapse: collapse;display: table;width: 100%;background-color:#ffffff;">
                <div class="col num4" style="display: table-cell; vertical-align: top; max-width: 320px; min-width: 216px; width: 216px;">
                <div class="col_cont" style="width:100% !important;">
                <div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:0px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;">
                <div align="center" class="img-container center fixedwidth" style="padding-right: 0px;padding-left: 0px;">
                <div style="font-size:1px;line-height:5px"> </div>
                <img align="center" alt="logo zex music" border="0" class="center fixedwidth" src="'.$logoimg.'" style="text-decoration: none; -ms-interpolation-mode: bicubic; height: auto; border: 0; width: 100%; max-width: 130px; display: block;" title="logo zex music" width="130"/>
                <div style="font-size:1px;line-height:5px"> </div>
                </div>
                </div>
                </div>
                </div>
                </div>
                </div>
                </div>
                <div style="background-color:#000000;">
                <div class="block-grid" style="min-width: 320px; max-width: 650px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; margin: 0 auto; background-color: #f1d1b8;">
                <div style="border-collapse: collapse;display: table;width: 100%;background-image: url('.$backimg.');background-size: cover;background-position: center;background-repeat: no-repeat;" >

                <div class="col num12" style="min-width: 320px; max-width: 650px; display: table-cell; vertical-align: top; width: 650px;">
                <div class="col_cont" style="width:100% !important;">
                <div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:45px; padding-bottom:45px; padding-right: 0px; padding-left: 0px;">

                <div style="color:#393d47;font-family:"Cabin", Arial, "Helvetica Neue", Helvetica, sans-serif;line-height:1.2;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px;">
                <div style="line-height: 1.2; font-size: 12px; font-family: "Cabin", Arial, "Helvetica Neue", Helvetica, sans-serif; color: #393d47; mso-line-height-alt: 14px;">
                <p style="font-size: 24px; line-height: 1.2; word-break: break-word; text-align: center; font-family: "Cabin", Arial, "Helvetica Neue", Helvetica, sans-serif; mso-line-height-alt: 29px; margin: 0;"><span style="font-size: 24px; color: #000000;"><strong>Your <span style="color: #f0795c;">Zex Music </span></strong></span><span style="font-size: 18px; color: #000000;"><strong><span style="font-size: 24px;">Membership Is Almost Up</span><br/></strong></span></p>
                </div>
                </div>

                <div style="color:#393d47;font-family:"Cabin", Arial, "Helvetica Neue", Helvetica, sans-serif;line-height:1.5;padding-top:10px;padding-right:45px;padding-bottom:10px;padding-left:45px;">
                <div style="line-height: 1.5; font-size: 12px; font-family: "Cabin", Arial, "Helvetica Neue", Helvetica, sans-serif; color: #393d47; mso-line-height-alt: 18px;">
                <p style="font-size: 18px; line-height: 1.5; word-break: break-word; text-align: center; font-family: "Cabin", Arial, "Helvetica Neue", Helvetica, sans-serif; mso-line-height-alt: 27px; margin: 0;"><span style="font-size: 18px;"><span style="color: #5c5c5c;">If you want to enjoy our music, activate the automatic renewal </span><span style="color: #5c5c5c;">before October 20. </span></span><span style="font-size: 18px;"><span style="color: #5c5c5c;">Otherwise, the contract will be cancelled and you </span><span style="color: #5c5c5c;">will no longer be able to use </span></span><span style="font-size: 18px; color: #5c5c5c;">our service.</span></p>
                </div>
                </div>

                <div align="center" class="button-container" style="padding-top:10px;padding-right:10px;padding-bottom:0px;padding-left:10px;">
                <a href="http://www.example.com" style="-webkit-text-size-adjust: none; text-decoration: none; display: inline-block; color: #ffffff; background-color: #f0795c; border-radius: 30px; -webkit-border-radius: 30px; -moz-border-radius: 30px; width: auto; width: auto; border-top: 1px solid #f0795c; border-right: 1px solid #f0795c; border-bottom: 1px solid #f0795c; border-left: 1px solid #f0795c; padding-top: 5px; padding-bottom: 5px; font-family: "Cabin", Arial, "Helvetica Neue", Helvetica, sans-serif; text-align: center; mso-border-alt: none; word-break: keep-all;" target="_blank"><span style="padding-left:20px;padding-right:20px;font-size:14px;display:inline-block;"><span style="font-size: 16px; line-height: 2; word-break: break-word; font-family: "Cabin", Arial, "Helvetica Neue", Helvetica, sans-serif; mso-line-height-alt: 32px;"><span data-mce-style="font-size: 14px; line-height: 28px;" style="font-size: 14px; line-height: 28px;">CLICK HERE</span></span></span></a>

                </div>


                </div>

                </div>
                </div>

                </div>
                </div>
                </div>
                <div style="background-color:#000000;">
                <div class="block-grid two-up no-stack" style="min-width: 320px; max-width: 650px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; Margin: 0 auto; background-color: #1a6b41;">
                <div style="border-collapse: collapse;display: table;width: 100%;background-color:#1a6b41;">

                <div class="col num6" style="display: table-cell; vertical-align: top; max-width: 320px; min-width: 324px; width: 325px;">
                <div class="col_cont" style="width:100% !important;">
                <div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:0px; padding-bottom:0px; padding-right: 0px; padding-left: 0px;">
                <table cellpadding="0" cellspacing="0" class="social_icons" role="presentation" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt;" valign="top" width="100%">
                <tbody>
                <tr style="vertical-align: top;" valign="top">
                <td style="word-break: break-word; vertical-align: top; padding-top: 10px; padding-right: 10px; padding-bottom: 10px; padding-left: 20px;" valign="top">
                <table align="left" cellpadding="0" cellspacing="0" class="social_table" role="presentation" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-tspace: 0; mso-table-rspace: 0; mso-table-bspace: 0; mso-table-lspace: 0;" valign="top">
                <tbody>
                <tr align="left" style="vertical-align: top; display: inline-block; text-align: left;" valign="top">
                <td style="word-break: break-word; vertical-align: top; padding-bottom: 0; padding-right: 4px; padding-left: 0px;" valign="top"><a href="https://www.facebook.com/" target="_blank"><img alt="Facebook" height="32" src="'.base_url().'assets/images/facebook2x.png" style="text-decoration: none; -ms-interpolation-mode: bicubic; height: auto; border: 0; display: block;" title="facebook" width="32"/></a></td>
                <td style="word-break: break-word; vertical-align: top; padding-bottom: 0; padding-right: 4px; padding-left: 0px;" valign="top"><a href="https://www.twitter.com/" target="_blank"><img alt="Twitter" height="32" src="'.base_url().'assets/images/twitter2x.png" style="text-decoration: none; -ms-interpolation-mode: bicubic; height: auto; border: 0; display: block;" title="twitter" width="32"/></a></td>
                <td style="word-break: break-word; vertical-align: top; padding-bottom: 0; padding-right: 4px; padding-left: 0px;" valign="top"><a href="https://www.linkedin.com/" target="_blank"><img alt="Linkedin" height="32" src="'.base_url().'assets/images/linkedin2x.png" style="text-decoration: none; -ms-interpolation-mode: bicubic; height: auto; border: 0; display: block;" title="linkedin" width="32"/></a></td>
                <td style="word-break: break-word; vertical-align: top; padding-bottom: 0; padding-right: 4px; padding-left: 0px;" valign="top"><a href="https://www.instagram.com/" target="_blank"><img alt="Instagram" height="32" src="'.base_url().'assets/images/instagram2x.png" style="text-decoration: none; -ms-interpolation-mode: bicubic; height: auto; border: 0; display: block;" title="instagram" width="32"/></a></td>
                </tr>
                </tbody>
                </table>
                </td>
                </tr>
                </tbody>
                </table>
                </div>

                </div>
                </div>

                <div class="col num6" style="display: table-cell; vertical-align: top; max-width: 320px; min-width: 324px; width: 325px;">
                <div class="col_cont" style="width:100% !important;">
                <div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;">

                <div style="color:#393d47;font-family:Arial, Helvetica Neue, Helvetica, sans-serif;line-height:1.2;padding-top:10px;padding-right:20px;padding-bottom:10px;padding-left:10px;">
                <div style="line-height: 1.2; font-size: 12px; color: #393d47; font-family: Arial, Helvetica Neue, Helvetica, sans-serif; mso-line-height-alt: 14px;">
                <p style="font-size: 14px; line-height: 1.2; word-break: break-word; text-align: right; mso-line-height-alt: 17px; margin: 0;"><span style="color: #ffffff;">SAMPARK <a href="#0" rel="noopener" style="color: #ffffff;" target="_blank"></a> <br/></span></p>
                </div>
                </div>

                </div>

                </div>
                </div>

                </div>
                </div>
                </div>

                </td>
                </tr>
                </tbody>
                </table>

                </body>
                </html>';
        $mail->Body = $mailContent;
        
        // Send email
        if(!$mail->send()){
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        }else{
            echo 'Message has been sent';
        }
    }
    public function user_permission() 
    {
        if($this->input->get('token')!=$this->session->userdata['sampark_session']['token'])
        {
                redirect(site_url('admin/admin_login_auth'));
        }
        $data['title'] = 'User Permission';   
        $data['menu'] = $this->Model_admin->getUserMenuData(array('IS_VIEW' => 'w'));    

        $this->load->view('template/admin_header',$data); 
        $this->load->view('organization/user_permission');
        $this->load->view('template/admin_footer');
    }
    public function userEdit()
    {
        $id=$this->uri->segment(3);
        //echo $id; exit;
        $editData = $this->Organization_model->getUserDatass($id);
        $designationList= $this->Organization_model->getDesignationData();   
        //echo '<pre>'.$editData->CATEGORY_ID; print_r($editData); die;
            $htm = '';
            $htm .= '<div class="row">';
            $htm .= '<div class="col-md-3 form-group">';
            $htm .= '   <label for="email1">DESIGNATION</label>';
            
            $htm .= '<input type="hidden" name="id" value="'.$editData->USER_ID.'">';           
            $htm .= '';

            $htm .= '<select class="form-control" required="required"  style="width: 100%;" id="designation" name="designation" aria-hidden="true">
                  <option value="">Select Designation</option>';
                 
            foreach($designationList as $row)
            {
                 
           $htm .= '<option value="'.$row->ROLE_ID.'"';

            if($row->ROLE_ID==$editData->ROLE_ID)
            {
              $htm .= 'selected="selected"';
            }

            $htm .= '>'.$row->ROLE_NAME.'</option>';
             }
              
                
            $htm .= '</select></div>';
           

            $htm .= '<div class="col-md-3 form-group">
            <label for="email1">TITLE</label>
            <select class="form-control" required="required"  style="width: 100%;" data-select2-id="1" tabindex="1" id="title" name="title" aria-hidden="true">
             <option value="">Select Title</option>
              <option  selected="selected" value="Mr.">Mr.</option>
              <option value="Ms.">Ms.</option>              
              <option value="Mrs.">Mrs.</option>
              <option value="Miss.">Miss.</option>
            </select>
          </div> ';  
     
          $htm .= '<div class="col-md-3 form-group">
            <label for="email1">NAME</label>
            <input type="text" required="required"  class="form-control" id="name" aria-describedby="emailHelp" name="name" value="'.$editData->NAME.'" placeholder="Enter Name">
          
          </div>  
           <div class="col-md-3 form-group">
            <label for="email1">EMAIL</label>
            <input type="text" readonly="readonly"  class="form-control" id="email" aria-describedby="emailHelp" name="email" placeholder="Enter Email"  value="'.$editData->EMAIL.'" >
            <!-- <small id="emailHelp" class="form-text text-muted">Enter New Category.</small> -->
          </div> 
           <div class="col-md-3 form-group">
            <label for="email1">PHONE</label>
            <input type="text"  required="required"  class="form-control" id="phone" aria-describedby="emailHelp"  value="'.$editData->PHONE.'"  name="phone" placeholder="Enter Phone">
            <!-- <small id="emailHelp" class="form-text text-muted">Enter New Category.</small> -->
          </div> 
           <div class="col-md-3 form-group">
            <label for="email1">AADHAR CARD</label>
            <input type="text" class="form-control" id="aadhar" aria-describedby="emailHelp" name="aadhar"  value="'.$editData->AADHAR_CARD_NO.'"  placeholder="Enter Aadhar Card">
            <!-- <small id="emailHelp" class="form-text text-muted">Enter New Category.</small> -->
          </div> 
           <div class="col-md-3 form-group">
            <label for="email1">PAN CARD</label>
            <input type="text" required="required"  class="form-control" id="pancard" aria-describedby="emailHelp" value="'.$editData->PANCARD_NO.'"  name="pancard" placeholder="Enter Pancard">
            <!-- <small id="emailHelp" class="form-text text-muted">Enter New Category.</small> -->
          </div> 
          <div class="col-md-3 form-group">
            <label for="email1">BANK NAME</label>
            <input type="text" required="required"  class="form-control" id="bankname" aria-describedby="emailHelp" value="'.$editData->BANK_NAME.'"  name="bankname" placeholder="Enter Bank Name">
            <!-- <small id="emailHelp" class="form-text text-muted">Enter New Category.</small> -->
          </div> 
           <div class="col-md-3 form-group">
            <label for="email1">IFSC CODE</label>
            <input type="text" required="required"  class="form-control" id="ifsc" aria-describedby="emailHelp" value="'.$editData->IFSC_CODE.'"  name="ifsc" placeholder="Enter IFSC Code">
            <!-- <small id="emailHelp" class="form-text text-muted">Enter New Category.</small> -->
          </div> 
          <div class="col-md-3 form-group">
            <label for="email1">BANK ACCOUNT NO</label>
            <input type="text" required="required"  class="form-control" id="accountno" aria-describedby="emailHelp" value="'.$editData->ACCOUNT_NO.'"  name="accountno" placeholder="Enter Account Number">
            <!-- <small id="emailHelp" class="form-text text-muted">Enter New Category.</small> -->
          </div> 
        

          <div class="col-md-3 form-group">
            <label for="email1">IMAGE</label>
            <input type="file"   class="form-control" id="user_image" aria-describedby="emailHelp" value="'.$editData->IMAGE.'"  name="user_image" >
            <!-- <small id="emailHelp" class="form-text text-muted">Enter New Category.</small> -->
          </div> ';
            $htm .= '';
            $active = '';
            $deactive = '';
            if($editData->STATUS == 1){
                $active = 'selected';
            }elseif ($editData->STATUS == 0){
                $deactive = 'selected';
            }
            $htm .= '<div class="col-md-3 form-group">';
            $htm .= '   <label for="email1">STATUS</label>';
            $htm .= '   <select class="form-control" style="width: 100%;" data-select2-id="1" tabindex="1" id="desig_status" name="u_status" aria-hidden="true">';
            $htm .= '       <option '.$active.' value="1">Active</option>';
            $htm .= '       <option '.$deactive.' value="0">De-Active</option>';
            $htm .= '   </select>';
            $htm .= '</div>';
            $htm .= ''; 
          

          $htm .= '<div class="col-md-6 form-group">
            <label for="email1">PRESENT ADDRESS</label>
            <textarea class="form-control" required="required"  rows="3" id="present_address" name="present_address" placeholder="Enter Present Address" spellcheck="false">'.$editData->PRESENT_ADDRESS.'</textarea>
            <!-- <small id="emailHelp" class="form-text text-muted">Enter New Category.</small> -->
          </div> 
          <div class="col-md-6 form-group">
            <label for="email1">PERMANENT ADDRESS</label>
            <textarea class="form-control" required="required"  rows="3" id="permanent_address" name="permanent_address" placeholder="Enter Permanent Address" spellcheck="false">'.$editData->PERMANENT_ADDRESS.'</textarea>
            <!-- <small id="emailHelp" class="form-text text-muted">Enter New Category.</small> -->
          </div>'; 
                  

          
           

            echo $htm;
    }
     public function userUpdate()
    {
        $cat_id = $this->input->post('id');
        
         $path = 'assets/upload_image/user/';
         $userimage="";
         if (isset($_FILES['user_image']) && $_FILES['user_image']['name'] != ''){
            $config['upload_path'] =$path;
            $config['allowed_types'] = '*';
            $config['max_size'] = '10240'; //max_size in kb
          
            $new_name = $_FILES['user_image']['name'];
            $config['file_name'] = 'user_' . rand(100, 100000);
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if ($this->upload->do_upload('user_image')) {
                $dataupload = $this->upload->data();
                $userimage = $dataupload['file_name'];
            } 
            else 
            {
                $userimage = "";
            } 
           
        }
        $cur_date=date('Y-m-d h:i:s');
        $data = array(
            "ROLE_ID"=>$this->input->post('designation'),                     
          
            "TITLE"=>$this->input->post('title'),
            "NAME"=>$this->input->post('name'),
            //"EMAIL"=>$this->input->post('email'),
            "PHONE"=>$this->input->post('phone'),
            "PRESENT_ADDRESS"=>$this->input->post('present_address'),
            "PERMANENT_ADDRESS"=>$this->input->post('permanent_address'),
            "AADHAR_CARD_NO"=>$this->input->post('aadhar'),
            "PANCARD_NO"=>$this->input->post('pancard'),
            "ACCOUNT_NO"=>$this->input->post('accountno'),
            "IFSC_CODE"=>$this->input->post('ifsc'),
            "BANK_NAME"=>$this->input->post('bankname'),
            "STATUS"=>$this->input->post('u_status'),
            "IMAGE"=>$userimage,
            "UPDATED_AT"=>$cur_date

        );

        if($id = $this->Organization_model->usereditModel($data,$cat_id)){
            $this->session->set_flashdata('success', 'User updated successfully.');
            redirect("organization/users?token=".$this->session->userdata['sampark_session']['token'],'refresh');
        

    }

    }

    public function userDelete($item_id)
    {
        if($this->Organization_model->deleteUserModel($item_id)){
            $this->session->set_flashdata('success', 'User Delete Successfully!');
            redirect("organization/users?token=".$this->session->userdata['sampark_session']['token'],'refresh');
        }
    }
      public function roleupdatePermission() {

        $role_id = $this->input->post('role_id');
        $menu_id = $this->input->post('view');
        $deleteROleData = $this->Organization_model->deleteRoleData($role_id);
        foreach ($menu_id as $mid) {
            $data = array(
                'role_id' => $role_id,
                'menu_id' => $mid,
            );
           // print_r($data); exit;
            $insertedData = $this->Organization_model->updatepermission($data);
        }
        if ($insertedData) {

            $_SESSION['msg'] = "Data Inserted Successfully ";
            redirect("organization/designation_permission/".$role_id."?token=".$this->session->userdata['sampark_session']['token'],'refresh');
        } else {
            $_SESSION['msg'] = "Oops something went wrong ! ";
        }
    }
    public function approleupdatePermission() {

        $role_id = $this->input->post('role_id');
        $menu_id = $this->input->post('view');
        $deleteROleData = $this->Organization_model->deleteRoleData($role_id);
        foreach ($menu_id as $mid) {
            $data = array(
                'role_id' => $role_id,
                'menu_id' => $mid,
            );
           // print_r($data); exit;
            $insertedData = $this->Organization_model->updatepermission($data);
        }
        if ($insertedData) {

            $_SESSION['msg'] = "Data Inserted Successfully ";
            redirect("organization/appDesignation_permission/".$role_id."?token=".$this->session->userdata['sampark_session']['token'],'refresh');
        } else {
            $_SESSION['msg'] = "Oops something went wrong ! ";
        }
    }
      public function userupdatePermission() {

        $user_id = $this->input->post('user_id');
        $menu_id = $this->input->post('view');
        $deleteROleData = $this->Organization_model->deleteUserMenuData($user_id);
        foreach ($menu_id as $mid) {
            $data = array(
                'user_id' => $user_id,
                'menu_id' => $mid,
            );
           // print_r($data); exit;
            $insertedData = $this->Organization_model->updateuserpermission($data);
        }
        if ($insertedData) {

            $_SESSION['msg'] = "Data Inserted Successfully ";
            redirect("organization/user_permission/".$user_id."?token=".$this->session->userdata['sampark_session']['token'],'refresh');
        } else {
            $_SESSION['msg'] = "Oops something went wrong ! ";
        }
    }

    public function appMenu() 
    {
        error_reporting(0);
        if($this->input->get('token')!=$this->session->userdata['sampark_session']['token'])
        {
                redirect(site_url('admin/admin_login_auth'));
        }
        $data['title'] = 'App Menu';   
        $data['menu'] = $this->Model_admin->getUserMenuData(array('IS_VIEW' => 'w')); 
        $data['appmenu'] = $this->Model_admin->getAppMenuData(array('IS_VIEW' => 'm'));    
                
        $this->load->view('template/admin_header',$data); 
        $this->load->view('organization/app_menu');
        $this->load->view('template/admin_footer');
    }
     public function addappMenu()
    {
        $cur_date=date('Y-m-d h:i:s');
        if($this->input->post('menu_parent'))
        {
            $p=$this->input->post('menu_parent');
        }
        else
        {
            $p="0";
        }
        $data = array(
            "MENU_NAME"=>$this->input->post('menu_name'),                    
            "MENU_CODE"=>$this->input->post('menu_code'),
            "MENU_PARENT_ID"=>$p,
            "SORTORDER"=>$this->input->post('sort_order'),
            "IS_VIEW"=>'m',
            "WEBVIEW_URL"=>$this->input->post('web_url'),
            "MENU_STATUS"=>$this->input->post('menu_status'),
            "ENTRYDATE"=>$cur_date

        );
        $tbl=DB_PREFIX.'menu';
        if($id = $this->Organization_model->addRow($tbl,$data)){
            $this->session->set_flashdata('success', 'App Menu added successfully.');
            redirect("organization/appmenu?token=".$this->session->userdata['sampark_session']['token'],'refresh');
        } else
        {
            $this->session->set_flashdata('fail', 'App Menu can not be Inserted.');
            redirect("organization/appmenu?token=".$this->session->userdata['sampark_session']['token'],'refresh');
        }

    }
    public function appMenuEdit()
    {
        $id=$this->uri->segment(3);
        //echo $id; exit;
        $editData = $this->Organization_model->getData(array('ROLE_ID'=>$id,'single'=>'1'));
        //echo '<pre>'.$editData->CATEGORY_ID; print_r($editData); die;
            $htm = '';
            $htm .= '<div class="row">';
            $htm .= '<div class="col-md-6 form-group">';
            $htm .= '   <label for="email1">DESIGNATION</label>';
            $htm .= '   <input type="text" class="form-control" id="cat_category" aria-describedby="emailHelp" name="desig_name" value="'.$editData->ROLE_NAME.'" placeholder="Enter Designation Name">';
            $htm .= '</div>';
            $htm .= '<input type="hidden" name="id" value="'.$editData->ROLE_ID.'">';
           
            $htm .= '';
          
           
            $htm .= '';
            $active = '';
            $deactive = '';
            if($editData->ROLE_STATUS == 1){
                $active = 'selected';
            }elseif ($editData->ROLE_STATUS == 0){
                $deactive = 'selected';
            }
            $htm .= '<div class="col-md-6 form-group">';
            $htm .= '   <label for="email1">STATUS</label>';
            $htm .= '   <select class="form-control" style="width: 100%;" data-select2-id="1" tabindex="1" id="desig_status" name="desig_status" aria-hidden="true">';
            $htm .= '       <option '.$active.' value="1">Active</option>';
            $htm .= '       <option '.$deactive.' value="0">De-Active</option>';
            $htm .= '   </select>';
            $htm .= '</div>';
            $htm .= '';
            $htm .= '<div class="col-md-12 form-group">';
            $htm .= '   <label for="email1"> DESCRIPTION</label>';
            $htm .= '   <textarea class="form-control" rows="3" id="desig_desc" name="desig_desc" placeholder="Enter Brand Description" spellcheck="false">'.$editData->ROLE_DESC.'</textarea>';
            $htm .= '</div>';
            $htm .= '</div>';

            echo $htm;
    }
    public function appMenuUpdate()
    {
//      print_r($_POST); die;
        //$category_code = $this->category_model->getMaxId();
        $cur_date=date('Y-m-d h:i:s');
        $cat_id = $this->input->post('id');

            
            $data["ROLE_NAME"]=$this->input->post('desig_name');
            $data["ROLE_DESC"]=$this->input->post('desig_desc');
          
            $data["ROLE_STATUS"]=$this->input->post('desig_status');
            $data["ROLE_UPDATED_AT"]=$cur_date;

        if($id = $this->Organization_model->editModel($data,$cat_id)){
            $this->session->set_flashdata('success', 'Designation updated successfully.');
            redirect("organization/designation?token=".$this->session->userdata['sampark_session']['token'],'refresh');
        }
        else
        {
            $this->session->set_flashdata('fail', 'Designation can not be Inserted.');
            redirect("organization/designation?token=".$this->session->userdata['sampark_session']['token'],'refresh');
        }

    }
     public function appMenuDelete($item_id)
    {
        if($this->Organization_model->deleteModel($item_id)){
            $this->session->set_flashdata('success', 'Designation Delete Successfully!');
            redirect("organization/designation?token=".$this->session->userdata['sampark_session']['token'],'refresh');
        }
    }


    public function warehouse() 
    {
        error_reporting(0);
        if($this->input->get('token')!=$this->session->userdata['sampark_session']['token'])
        {
                redirect(site_url('admin/admin_login_auth'));
        }
        $data['title'] = 'Warehouse';   
        $data['menu'] = $this->Model_admin->getUserMenuData(array('IS_VIEW' => 'w')); 
        $data['warehouseList'] = $this->Organization_model->getWareHouseData();         
        $this->load->view('template/admin_header',$data); 
        $this->load->view('organization/warehouse');
        $this->load->view('template/admin_footer');
    }
     public function addWarehouse()
    {
        $cur_date=date('Y-m-d h:i:s');
        $data = array(
            "PR_WAREHOUSE_NAME"=>$this->input->post('warehouse_name'),                     
            "PR_ADDRESS"=>$this->input->post('warehouse_addr'),            
            "PR_STATUS"=>$this->input->post('warehouse_status'),
            "PR_CREATED_AT"=>$cur_date

        );

        if($id = $this->Organization_model->addRow('pr_warehouse',$data)){
            $this->session->set_flashdata('success', 'Warehouse added successfully.');
           redirect("organization/warehouse?token=".$this->session->userdata['sampark_session']['token'],'refresh');
        
        } else
        {
            $this->session->set_flashdata('fail', 'Warehouse can not be Inserted.');
           redirect("organization/warehouse?token=".$this->session->userdata['sampark_session']['token'],'refresh');

        }

    }
    public function warehouseEdit()
    {
        $id=$this->uri->segment(3);
        //echo $id; exit;
        $editData = $this->Organization_model->warehouseGetData(array('PR_WAREHOUSE_ID'=>$id,'single'=>'1'));
        //echo '<pre>'.$editData->CATEGORY_ID; print_r($editData); die;
            $htm = '';
            $htm .= '<div class="row">';
            $htm .= '<div class="col-md-6 form-group">';
            $htm .= '   <label for="email1">WAREHOUSE</label>';
            $htm .= '   <input type="text" class="form-control" id="warehouse_name" aria-describedby="emailHelp" name="warehouse_name" value="'.$editData->PR_WAREHOUSE_NAME.'" placeholder="Enter Warehouse Name">';
            $htm .= '</div>';
            $htm .= '<input type="hidden" name="id" value="'.$editData->PR_WAREHOUSE_ID.'">';
           
            $htm .= '';
          
           
            $htm .= '';
            $active = '';
            $deactive = '';
            if($editData->PR_STATUS == 1){
                $active = 'selected';
            }elseif ($editData->PR_STATUS == 0){
                $deactive = 'selected';
            }
            $htm .= '<div class="col-md-6 form-group">';
            $htm .= '   <label for="email1">STATUS</label>';
            $htm .= '   <select class="form-control" style="width: 100%;" data-select2-id="1" tabindex="1" id="warehouse_status" name="warehouse_status" aria-hidden="true">';
            $htm .= '       <option '.$active.' value="1">Active</option>';
            $htm .= '       <option '.$deactive.' value="0">De-Active</option>';
            $htm .= '   </select>';
            $htm .= '</div>';
            $htm .= '';
            $htm .= '<div class="col-md-12 form-group">';
            $htm .= '   <label for="email1"> ADDRESS</label>';
            $htm .= '   <textarea class="form-control" rows="3" id="warehouse_addr" name="warehouse_addr" placeholder="Enter Brand Description" spellcheck="false">'.$editData->PR_ADDRESS.'</textarea>';
            $htm .= '</div>';
            $htm .= '</div>';

            echo $htm;
    }
    public function warehouseUpdate()
    {
//      print_r($_POST); die;
        //$category_code = $this->category_model->getMaxId();
        $cur_date=date('Y-m-d h:i:s');
        $warehouse_id = $this->input->post('id');

            
            $data["PR_WAREHOUSE_NAME"]=$this->input->post('warehouse_name');
            $data["PR_ADDRESS"]=$this->input->post('warehouse_addr');          
            $data["PR_STATUS"]=$this->input->post('warehouse_status');
            $data["PR_UPDATED_AT"]=$cur_date;

        if($id = $this->Organization_model->editWarehouse($data,$warehouse_id)){
            $this->session->set_flashdata('success', 'Warehouse updated successfully.');
            redirect("organization/warehouse?token=".$this->session->userdata['sampark_session']['token'],'refresh');
        }
        else
        {
            $this->session->set_flashdata('fail', 'Warehouse can not be Inserted.');
            redirect("organization/warehouse?token=".$this->session->userdata['sampark_session']['token'],'refresh');
        }

    }
     public function warehouseDelete($item_id)
    {
        if($this->Organization_model->warehouseDelete($item_id)){
            $this->session->set_flashdata('success', 'Warehouse Delete Successfully!');
            redirect("organization/warehouse?token=".$this->session->userdata['sampark_session']['token'],'refresh');
        }
    }

    public function addaDistributor() 
    {
        error_reporting(0);
        
        $data['title'] = 'Employee'; 
        $emp_id=$this->uri->segment(3); 
        //echo $emp_id; exit;
        $data['menu'] = $this->Model_admin->getUserMenuData(array('IS_VIEW' => 'w')); 
        $data['empdata'] = $this->Organization_model->getEmployeeData(array('EMPLOYEE_ID'=>$emp_id)); 
        $data['department'] = $this->Organization_model->getDepartmentData(); 
        $data['warehouse'] = $this->Organization_model->getWarehouseData(); 
         $data['country'] = $this->Organization_model->getCountryData();
        $this->load->view('template/admin_header',$data); 
        $this->load->view('organization/addDistriutor');
        $this->load->view('template/admin_footer');
    }
      public function addaDistributorBExp() 
    {
        error_reporting(0);
        
        $data['title'] = 'Employee'; 
        $emp_id=$this->uri->segment(3); 
        //echo $emp_id; exit;
        $data['menu'] = $this->Model_admin->getUserMenuData(array('IS_VIEW' => 'w')); 
        $data['empdata'] = $this->Organization_model->getEmployeeData(array('EMPLOYEE_ID'=>$emp_id)); 
        $data['department'] = $this->Organization_model->getDepartmentData(); 
        $data['warehouse'] = $this->Organization_model->getWarehouseData(); 
        $this->load->view('template/admin_header',$data); 
        $this->load->view('organization/addDistributorExp');
        $this->load->view('template/admin_footer');
    }
    public function addaDistributPDetail() 
    {
        error_reporting(0);
        
        $data['title'] = 'Employee'; 
        $emp_id=$this->uri->segment(3); 
        //echo $emp_id; exit;
        $data['menu'] = $this->Model_admin->getUserMenuData(array('IS_VIEW' => 'w')); 
        $data['empdata'] = $this->Organization_model->getEmployeeData(array('EMPLOYEE_ID'=>$emp_id)); 
        $data['department'] = $this->Organization_model->getDepartmentData(); 
        $data['warehouse'] = $this->Organization_model->getWarehouseData(); 
        $this->load->view('template/admin_header',$data); 
        $this->load->view('organization/addDistrubutorDetails');
        $this->load->view('template/admin_footer');
    }
    public function approveDistributor()
    {
       //error_reporting(0);
        $emp_id=$this->uri->segment(3); 

       
        $cur_date=date('Y-m-d h:i:s');
       

        $data = array(
            
            "PR_EMPLOYEE_STATUS"=>'1',
            
        );
        $this->Organization_model->updateRow('pr_employee',$data,array('PR_EMPLOYEE_ID'=>$emp_id));
        redirect("organization/distributor?token=".$this->session->userdata['sampark_session']['token'],'refresh');
       

    }
      public function addfos() 
    {
        error_reporting(0);
        if($this->input->get('token')!=$this->session->userdata['sampark_session']['token'])
        {
                redirect(site_url('admin/admin_login_auth'));
        }
        $data['title'] = 'Fos'; 
        $emp_id=$this->uri->segment(3); 
        //echo $emp_id; exit;
        $data['menu'] = $this->Model_admin->getUserMenuData(array('IS_VIEW' => 'w')); 
        $data['empdata'] = $this->Organization_model->getEmployeeData(array('EMPLOYEE_ID'=>$emp_id)); 
      
        $this->load->view('template/admin_header',$data); 
        $this->load->view('organization/addfos');
        $this->load->view('template/admin_footer');
    }
    public function fosList() 
    {
        if($this->input->get('token')!=$this->session->userdata['sampark_session']['token'])
        {
                redirect(site_url('admin/admin_login_auth'));
        }
        $data['title'] = 'User';   
        $data['menu'] = $this->Model_admin->getUserMenuData(array('IS_VIEW' => 'w'));       
        $data['userLists'] = $this->Organization_model->getUserData(array('count'=>'all','DESIGNATION_ID'=>'12'));     
        $this->load->view('template/admin_header',$data); 
        $this->load->view('organization/fosList');
        $this->load->view('template/admin_footer');
    }


      public function addRetailer()
    {
        $user_id=$this->session->userdata['sampark_session']['USER_ID'];  
        $cur_date=date('Y-m-d h:i:s');
        $data = array(
            "PR_DESIGNATION_ID"=>"13",          
            "PR_PASSWORD"=>md5('123456'),            
            "PR_NAME"=>$this->input->post('name'),
            "PR_EMAIL"=>$this->input->post('email'),
            "PR_PHONE"=>$this->input->post('phone'),
            "PR_PRESENT_ADDRESS"=>$this->input->post('address'),
            "PR_PERMANENT_ADDRESS"=>$this->input->post('address'),
            //"PR_AADHAR_CARD_NO"=>$this->input->post('aadhar'),
            "PR_GST_NO"=>$this->input->post('gst_no'),            
            "PR_EMPLOYEE_STATUS"=>"1",//$this->input->post('u_status'),            
            "PR_REPORTING_MANAGER"=>$user_id,
            "PR_CREATED_AT"=>$cur_date

        );        

        if($id = $this->Organization_model->addRow('pr_employee',$data)){

            $retailercode="RETAILER".$id;

            $this->Organization_model->updateRow('pr_employee',array('PR_EMPLOYEE_CODE'=>$retailercode),array('PR_EMPLOYEE_ID'=>$id));
            $this->session->set_flashdata('success', 'User added successfully.');
            redirect("organization/retailerList?token=".$this->session->userdata['sampark_session']['token'],'refresh');
        } else
        {
            $this->session->set_flashdata('fail', 'Retailer can not be Inserted.');
            redirect("organization/retailer?token=".$this->session->userdata['sampark_session']['token'],'refresh');
        }

    

    }
    
    

	
}
	
	  