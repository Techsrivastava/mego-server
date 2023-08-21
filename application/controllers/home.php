<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller 
{

   public function __construct() 
   {
        parent::__construct();
			$this->load->helper('url'); 
			$this->load->database(); 
			$this->load->library('session');
			$this->load->model('Common_model');		
       
    }	
	public function index() 
	{
			$data['title'] = 'MFIN INDIA';   
			$data['banners'] = $this->Common_model->getBanners(array('CATEGORY'=>'home'));
			$data['whatmfindoes'] = $this->Common_model->getindexContent(array('header'=>'whatmfindoes'));
			$data['strengtheningecosystem'] = $this->Common_model->getindexContent(array('header'=>'StrengtheningtheEcosystem'));
			$data['supporttomembers'] = $this->Common_model->getindexContent(array('header'=>'SupporttotheMembers'));
			$data['clientProtection'] = $this->Common_model->getindexContent(array('header'=>'clientProtection'));

			$data['events'] = $this->Common_model->getEvents();
			$data['successStories'] = $this->Common_model->getsuccessStories();

			$data['pressrelease'] = $this->Common_model->getpressrelease(array('type'=>'pressrelease'));
			$data['mfinnews'] = $this->Common_model->getmfinnews(array('type'=>'mfinnews'));
			$data['awards'] = $this->Common_model->getawards(array('type'=>'awards'));

			//$data['resourceCentreData'] = $this->Common_model->getresourceCentreData();


			$this->load->view('template/frontend_header',$data); 
	        $this->load->view('home');
			$this->load->view('template/frontend_footer');
    }	
	
}
	
	 