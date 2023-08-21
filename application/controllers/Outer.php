<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Outer extends CI_Controller 
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
		
       
    }



  public function image() {
       
        // $aResponce = array('STATUS' => 'FAILURE', 'MESSAGE' => 'Not valid data');


        // // $path='assets/uploaded_images/';
        // // file_put_contents($path . $IMAGE, $IMAGE);

        // $config['upload_path'] = 'assets/upload_image/gallery';
        // $config['allowed_types'] = '*';
        // $config['max_size'] = '10240'; //max_size in kb
        // if ($_FILES['IMAGE']['name']) {
        //     $new_name = $_FILES['IMAGE']['name'];
        //     $config['file_name'] =time().'_'.$_FILES['IMAGE']['name'];
        //     $this->load->library('upload', $config);
        //     $this->upload->initialize($config);
        //     if ($this->upload->do_upload('IMAGE')) {
        //         $dataupload = $this->upload->data();
        //         $photo = $dataupload['file_name'];
        //     } else {
        //         $photo = "";
        //     }
        // } else {
        //     $photo = "";
        // }

     $config['upload_path'] = 'files';
        $config['allowed_types'] = '*';
        $config['max_size'] = '10240'; //max_size in kb
        if ($_FILES['IMAGE']['name']) {
            $new_name = $_FILES['IMAGE']['name'];
            $config['file_name'] = $_FILES['IMAGE']['name'];
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if ($this->upload->do_upload('IMAGE')) {
                $dataupload = $this->upload->data();
                $photo = $dataupload['file_name'];
            } else {
                $photo = "";
            }
        } else {
            $photo = "";
        }



      if($photo)
        {

            $c=base_url().'files/'.$photo;
            $aResponce = array('STATUS' => 'SUCCESS', 'MESSAGE' => 'File Uploaded successfully ','FILE_NAME'=>$photo,'FILE_URL'=>$c);
        }
        else
        {
             $aResponce = array('STATUS' => 'FAILURE', 'MESSAGE' => 'File Uploaded not uploaded ','FILE_NAME'=>'','FILE_URL'=>'');
        }

        echo json_encode($aResponce);
        exit();
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
    
     public function addemployee() 
    {
        error_reporting(0);
       
        $data['title'] = 'Employee'; 
        $emp_id=$this->uri->segment(3); 
        //echo $emp_id; exit;
        $data['menu'] = $this->Model_admin->getUserMenuData(array('IS_VIEW' => 'w')); 
        $data['empdata'] = $this->Organization_model->getEmployeeData(array('EMPLOYEE_ID'=>$emp_id)); 
        $data['department'] = $this->Organization_model->getDepartmentData(); 
        $data['designation'] = $this->Organization_model->getDesignationData(); 
        $this->load->view('template/outer_header',$data); 
        $this->load->view('outer/addEmployee');
        $this->load->view('template/outer_footer');
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
        error_reporting(0);
        $cur_date=date('Y-m-d h:i:s');
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
            "PR_EMPLOYEE_STATUS"=>'1',
            "PR_FRM_STS"=>'2',
            "PR_CREATED_AT"=>$cur_date
        );

        if($id = $this->Organization_model->addRow('pr_employee',$data)){
            //$this->session->set_flashdata('success', 'Employee added successfully.');
            $empcode='SAMPARK'.$id;
            $edata=array('PR_EMPLOYEE_CODE'=>$empcode,'PR_FRM_STS'=>'2');
            $this->Organization_model->updateRow('pr_employee',$edata,array('PR_EMPLOYEE_ID'=>$id ));
            redirect("outer/addEmpAddress/".$id."/2");
        } else
        {
            $this->session->set_flashdata('fail', 'Employee can not be Inserted.');
            redirect("outer/addemployees/".$id."/1");
        }

    }
     public function updateempdetail()
    {
        error_reporting(0);
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
            "PR_EMPLOYEE_STATUS"=>'1',
            "PR_FRM_STS"=>'2',
            "PR_CREATED_AT"=>$cur_date
        );

        if($this->Organization_model->updateRow('pr_employee',$data,array('PR_EMPLOYEE_ID'=>$emp_id))){
            
            redirect("outer/addEmpAddress/".$emp_id."/2");
        } else
        {
            $this->session->set_flashdata('fail', 'Employee can not be Updated.');
            redirect("outer/addemployee/".$emp_id."/1");
        }

    }
    
    public function addEmpAddress() 
    {
        error_reporting(0);
       
        $data['title'] = 'Employee'; 
        $emp_id=$this->uri->segment(3); 
        
        $data['empdata'] = $this->Organization_model->getEmployeeData(array('EMPLOYEE_ID'=>$emp_id)); 

        $data['menu'] = $this->Model_admin->getUserMenuData(array('IS_VIEW' => 'w')); 
        $data['country'] = $this->Organization_model->getCountryData(); 
        $this->load->view('template/outer_header',$data); 
        $this->load->view('outer/addEmpAddress');
        $this->load->view('template/outer_footer');
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
            "PR_EMPLOYEE_STATUS"=>'3' ,
            "PR_BANK_NAME"=>$this->input->post('emp_bankname'),
            "PR_IFSC_CODE"=>$this->input->post('emp_ifsccode'),
            "PR_BANK_ACCOUNT_NO"=>$this->input->post('emp_accountno'),
            "PR_BANK_FILE"=>$bank_file,
            "PR_FRM_STS"=>'3'
        );

        $this->Organization_model->updateRow('pr_employee',$data,array('PR_EMPLOYEE_ID'=>$emp_id));
            
        redirect("outer/addEmpPrevDtl/".$emp_id."/3");
       

    }

    public function addEmpPrevDtl() 
    {
        error_reporting(0);
        
        $emp_id=$this->uri->segment(3); 
        $data['title'] = 'Employee';  
        $data['menu'] = $this->Model_admin->getUserMenuData(array('IS_VIEW' => 'w')); 
        $data['empcompdata'] = $this->Organization_model->getPrevEmployeeData(array('EMPLOYEE_ID'=>$emp_id)); 
        $this->load->view('template/outer_header',$data); 
        $this->load->view('outer/addEmpPrevDtl');
        $this->load->view('template/outer_footer');
    }
    public function thanku() 
    {
        error_reporting(0);
        
        
        $data['title'] = 'Employee';  

        $this->load->view('template/outer_header',$data); 
        $this->load->view('outer/thanku');
        $this->load->view('template/outer_footer');
    }
     public function thanku2() 
    {
        error_reporting(0);
        
        
        $data['title'] = 'Employee';  

        $this->load->view('template/outer_header',$data); 
        $this->load->view('outer/thanku2');
        $this->load->view('template/outer_footer');
    }
     public function thanku3() 
    {
        error_reporting(0);
        
        
        $data['title'] = 'Employee';  

        $this->load->view('template/outer_header',$data); 
        $this->load->view('outer/thanku3');
        $this->load->view('template/outer_footer');
    }
     public function addemployeeprevdetail()
    {
        error_reporting(0);
        
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
            "PR_STATUS"=>'3' 
            
        );

        $this->Organization_model->addRow('pr_empexperiencedetail',$data);
           
        redirect("outer/thanku");
       

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
            //print_r($_POST); die;
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
        if($this->Organization_model->warehouseDelete($item_id))
        {
            $this->session->set_flashdata('success', 'Warehouse Delete Successfully!');
            redirect("organization/warehouse?token=".$this->session->userdata['sampark_session']['token'],'refresh');
        }
    }
     public function addDistributor() 
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
        $this->load->view('template/outer_header',$data); 
        $this->load->view('outer/addDistriutor');
        $this->load->view('template/outer_footer');
    }
      public function addDistributorBExp() 
    {
        error_reporting(0);        
        $data['title'] = 'Employee'; 
        $emp_id=$this->uri->segment(3); 
        //echo $emp_id; exit;
        $data['menu'] = $this->Model_admin->getUserMenuData(array('IS_VIEW' => 'w')); 
        $data['empdata'] = $this->Organization_model->getEmployeeData(array('EMPLOYEE_ID'=>$emp_id)); 
        $data['department'] = $this->Organization_model->getDepartmentData(); 
        $data['warehouse'] = $this->Organization_model->getWarehouseData(); 
        $this->load->view('template/outer_header',$data); 
        $this->load->view('outer/addDistributorExp');
        $this->load->view('template/outer_footer');
    }
    public function addDistributPDetail() 
    {
        error_reporting(0);        
        $data['title'] = 'Employee'; 
        $emp_id=$this->uri->segment(3); 
        //echo $emp_id; exit;
        $data['menu'] = $this->Model_admin->getUserMenuData(array('IS_VIEW' => 'w')); 
        $data['empdata'] = $this->Organization_model->getEmployeeData(array('EMPLOYEE_ID'=>$emp_id)); 
        $data['department'] = $this->Organization_model->getDepartmentData(); 
        $data['warehouse'] = $this->Organization_model->getWarehouseData(); 
        $this->load->view('template/outer_header',$data); 
        $this->load->view('outer/addDistrubutorDetails');
        $this->load->view('template/outer_footer');
    }
    public function aggrement() 
    {
        error_reporting(0);       
        // $data['title'] = 'Employee'; 
        $emp_id=$this->uri->segment(3); 
        $data['empdata'] = $this->Organization_model->getEmployeeData(array('EMPLOYEE_ID'=>$emp_id)); 
        // print_r($data['empdata']); exit;
        $data['directorData'] = $this->Organization_model->getDirectorData(array('PR_DISTRIBUTOR_ID'=>$emp_id)); 
        //print_r($data['directorData']); exit;
        $this->load->view('template/outer_header',$data); 
        $this->load->view('outer/aggrement');
        $this->load->view('template/outer_footer');
    } 
    public function acceptaggrement()
    {
        //error_reporting(0);
        $emp_id=$this->uri->segment(3); 
        $aggrementDate=$this->input->post('emp_date');      
        $cur_date=date('Y-m-d h:i:s'); 
        $data = array(            
            "PR_EMPLOYEE_STATUS"=>'6'            
        );
        $this->Organization_model->updateRow('pr_employee',$data,array('PR_EMPLOYEE_ID'=>$emp_id));
        redirect("outer/thanku3"); 
    }

	
}
	
	  