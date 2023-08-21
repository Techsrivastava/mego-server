<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Homepage extends CI_Controller 
{

   public function __construct() 
   {
        parent::__construct();
			$this->load->helper('url'); 
			$this->load->database(); 
			$this->load->library('session');
			$this->load->model('Model_admin_auth');
			$this->load->model('Model_admin');
			$this->load->model('Home_model');
			if (empty($this->session->userdata('mfin_session'))) {
			redirect(site_url('admin'));
			}
			$this->_admin = $this->session->userdata('mfin_session');
       
    }
	public function index() 
	{
		$data['title'] = 'Home Page';   
		$data['menu'] = $this->Model_admin->getUserMenuData(array('IS_VIEW' => 'w'));
		$data['bannerList'] = $this->Home_model->getBanners();

		$data['whatmfindoes'] = $this->Home_model->gethomepageData(array('HEADER' => 'whatmfindoes'));
		$data['StrengtheningtheEcosystem'] = $this->Home_model->gethomepageData(array('HEADER' => 'StrengtheningtheEcosystem'));
		$data['SupporttotheMembers'] = $this->Home_model->gethomepageData(array('HEADER' => 'SupporttotheMembers'));
		$data['ClientProtection'] = $this->Home_model->gethomepageData(array('HEADER' => 'ClientProtection'));

		$this->load->view('template/admin_header',$data); 
	    $this->load->view('admin/homepage');
		$this->load->view('template/admin_footer');
	}
	 public function addbanner() {
       
        $blank = "";

        $config['upload_path'] ='assets/upload_image/banner/';
        $config['allowed_types'] = '*';
        $config['max_size'] = '10240'; //max_size in kb
      
        $new_name = $_FILES['images_1']['name'];
        $config['file_name'] = 'Homebanner_' . rand(100, 100000);
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if ($this->upload->do_upload('images_1')) {
            $dataupload = $this->upload->data();
            $banner = $dataupload['file_name'];
        } 
        else 
        {
            $banner = "";
        } 
         

        $entry_date = date('Y-m-d h:i:s');
        $data = array(
         	'CATEGORY'    =>'home',
            'TITLE'       => $this->input->post('title'),
            'DESCRIPTION' => $this->input->post('desc'),                        
            'SHORTING_ID' => $this->input->post('sort'),            
            'IMAGE'       => $banner,           
            'ENTRY_DATE'  => $entry_date,
            'STATUS'      =>  $this->input->post('status')
        );
        $insertedData = $this->Home_model->addRow('banner',$data);
        $_SESSION['msg'] = "Data Submitted Successfully ";
        redirect(base_url('Homepage'), 'refresh');
    }	

    public function updatecontent()
    {
    	$header=$this->input->post('header');
    	$entry_date = date('Y-m-d h:i:s');
        $data = array(
         	'updated_at'  => $entry_date,
            'content'      =>  $this->input->post('content')
        );
        $insertedData = $this->Home_model->updateRow('indexcontent',$data,array('id'=>$header));
        $_SESSION['msg'] = "Data Submitted Successfully ";
        redirect(base_url('Homepage'), 'refresh');

    }
	
}
	
	 