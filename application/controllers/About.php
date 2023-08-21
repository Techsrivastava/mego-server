<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class About extends CI_Controller 
{

   public function __construct() 
   {
        parent::__construct();
			$this->load->helper('url'); 
			$this->load->database(); 
			$this->load->library('session');
			$this->load->model('Model_admin_auth');
			$this->load->model('Model_admin');
			$this->load->model('About_model');
			// if (empty($this->session->userdata('mfin_session'))) {
			// redirect(site_url('admin'));
			// }
			$this->_admin = $this->session->userdata('mfin_session');
       
    }
	public function acheivments() 
    {
            $data['title'] = 'ACHEIVMENT';   
           
            $this->load->view('template/frontend_header',$data); 
            $this->load->view('frontend/about/achievements');
            $this->load->view('template/frontend_footer');
    }   
    public function history() 
    {
            $data['title'] = 'HISTORY';   
           
            $this->load->view('template/frontend_header',$data); 
            $this->load->view('frontend/about/history');
            $this->load->view('template/frontend_footer');
    }   
    public function industry() 
    {
            $data['title'] = 'INDUSTRY';   
           
            $this->load->view('template/frontend_header',$data); 
            $this->load->view('frontend/about/mfin_industry_association');
            $this->load->view('template/frontend_footer');
    } 
    public function ceo_message() 
    {
            $data['title'] = 'CEO MESSAGE';   
           
            $this->load->view('template/frontend_header',$data); 
            $this->load->view('frontend/about/mfin_industry_association');
            $this->load->view('template/frontend_footer');
    } 
    public function leadership() 
    {
            $data['title'] = 'LEADERSHIP';   
           
            $this->load->view('template/frontend_header',$data); 
            $this->load->view('frontend/about/leadership');
            $this->load->view('template/frontend_footer');
    }  
    public function reach() 
    {
            $data['title'] = 'REACH';   
           
            $this->load->view('template/frontend_header',$data); 
            $this->load->view('frontend/about/mfin_reach');
            $this->load->view('template/frontend_footer');
    }     
    public function sro() 
    {
            $data['title'] = 'SRO';   
           
            $this->load->view('template/frontend_header',$data); 
            $this->load->view('frontend/about/mfin_sro');
            $this->load->view('template/frontend_footer');
    }   
    public function team() 
    {
            $data['title'] = 'TEAM';   
           
            $this->load->view('template/frontend_header',$data); 
            $this->load->view('frontend/about/mfin_team');
            $this->load->view('template/frontend_footer');
    }   
    
	
	
}
	
	 