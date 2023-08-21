<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Resources extends CI_Controller 
{

    public function __construct() 
    {
        parent::__construct();
		$this->load->helper('url'); 
        $this->load->database(); 
        $this->load->library('session');
        $this->load->model('Resources_model'); 
       
    }
	public function micrometer()
	{
	    $data['title'] = 'Micrometer'; 
        $data['micrometerData'] = $this->Resources_model->getpublicationData(array('publication_id'=>'1'));
		$this->load->view('template/frontend_header',$data); 
        $this->load->view('frontend/resources/micrometer');
        $this->load->view('template/frontend_footer');
    } 
    public function microdrive()
    {
        $data['title'] = 'Micro Drive'; 
        $data['microdriveData'] = $this->Resources_model->getpublicationData(array('publication_id'=>'3'));
        $this->load->view('template/frontend_header',$data); 
        $this->load->view('frontend/resources/microdive');
        $this->load->view('template/frontend_footer');
    } 
     public function digimeter()
    {
        $data['title'] = 'Digi Meter'; 
        $data['digimeterData'] = $this->Resources_model->getpublicationData(array('publication_id'=>'2'));
        $this->load->view('template/frontend_header',$data); 
        $this->load->view('frontend/resources/microscope');
        $this->load->view('template/frontend_footer');
    }
    public function microscape()
    {
        $data['title'] = 'Microscape'; 
        $data['microscopeData'] = $this->Resources_model->getpublicationData(array('publication_id'=>'2'));
        $this->load->view('template/frontend_header',$data); 
        $this->load->view('frontend/resources/microspace');
        $this->load->view('template/frontend_footer');
    } 
    public function micromirror()
    {
        $data['title'] = 'Micromirror'; 
        $data['micromirrorData'] = $this->Resources_model->getpublicationData(array('publication_id'=>'4'));
        $this->load->view('template/frontend_header',$data); 
        $this->load->view('frontend/resources/micromirror');
        $this->load->view('template/frontend_footer');
    } 
    public function annualreport()
    {
        $data['title'] = 'Annual Reports'; 
        $data['annualreportData'] = $this->Resources_model->getpublicationData(array('publication_id'=>'6'));
        $this->load->view('template/frontend_header',$data); 
        $this->load->view('frontend/resources/annual_report');
        $this->load->view('template/frontend_footer');
    } 
    public function otherpublications()
    {
        $data['title'] = 'Other Publication'; 
        $data['otherpublicationData'] = $this->Resources_model->getpublicationData(array('publication_id'=>'8'));
        $this->load->view('template/frontend_header',$data); 
        $this->load->view('frontend/resources/other_publication');
        $this->load->view('template/frontend_footer');
    } 
    public function getMicrometerData()
    {
        $year=$_REQUEST['year'];//exit;
        $micrometerData = $this->Resources_model->getMicrometer(array('publication_id'=>'1','year'=>$year));
        $output='';
        foreach ($micrometerData as $micrometerRow) 
        {                                           
                                            
        $output.='<li class="col-md-4  col-lg-4  col-xs-12 col-sm-6">
                                                <!-- <img src="'.base_url().'assets/images/year_box.png" class="img-responsive">
                                                <p class="relative_pra">2019-2020</p> -->
                                                <div class="data_fluid  col_100  left"><!-- year_box -->
                                                    <div class="annual_details  col_100  left">
                                                        <div class="col-md-8  col-lg-8  col-xs-12  col-sm-12  padding_none"><!-- column -->
                                                            <p style="font-weight: 600;">
                                                           ';
                                                            $rkdated=date("Y-d",strtotime($micrometerRow->created_at));
                                                           
                                                           $output.='MFIN Annual Report,'.$rkdated.'</p>
                                                        </div><!-- column -->
                                                        <div class="col-md-4  col-lg-4  col-xs-12  col-sm-12 padding_none"><!-- column -->
                                                            <a href="#0"><p><i style="color: #333;" class="fa fa-download"></i>&nbsp;&nbsp;<span style="color: #c5391b;font-weight: 600;">Get Report</span></p></a>
                                                        </div><!-- column -->
                                                    </div>
                                                    <div class="data_year  col_100 left"><!-- data_year -->
                                                        ';
                                                        if($micrometerRow->image)
                                                        {
                                                       
                                                       $output.='<img src="'.base_url().'assets/upload_image/publications/<?php echo $micrometerRow->image; ?>" class="img-responsive">';
                                                   
                                                        }
                                                        else
                                                        {
                                                        
                                                        $output.='<img src="'.base_url().'assets/images/micrometer.jpeg" class="img-responsive">';
                                                        
                                                        }
                                                     
                                                        
                                                        $output.='<div class="data_fluid_ribbonss"><!-- report_year -->
                                                            <img src="'.base_url().'assets/images/data_ribbons.png" class="img-responsive">
                                                            <div class="relative_view">
                                                                <div class="col-md-6  col-lg-6">
                                                                    <span class="pull-left" style="color: #fff;">Synopsis Free for All</span>
                                                                </div>
                                                                <div class="col-md-6  col-lg-6" >
                                                                ';
                                                                if($micrometerRow->price)
                                                                {
                                                                $output.='
                                                                <span><a data-toggle="modal" data-target="#paymentmodal" style="color: #fff;">Download</a></span>
                                                                ';
                                                                }
                                                                else
                                                                {
                                                                $output.='
                                                                <span><a target="_blank" href="'.base_url().'assets/upload_image/publications/<?php echo $micrometerRow->file; ?>" style="color: #fff;">Download</a></span>
                                                                ';
                                                                }
                                                               $output.='
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div><!-- data_year -->
                                                    <div class="micro_date  col_100  left"><!-- micro_date -->
                                                        <div class="col-md-8  col-lg-8  col-xs-12  col-sm-12 padding_none"><!-- column -->
                                                            <p>'.$micrometerRow->file_name.'</p>
                                                        </div><!-- column -->
                                                        <div class="col-md-4  col-lg-4  col-xs-12  col-sm-12 text-right"><!-- column -->
                                                            <p ><a style="color: #008993" href="#0"><i style="color: #d53b17" class="fa fa-share-alt" aria-hidden="true"></i>&nbsp; Share Now</a></p>
                                                        </div><!-- column -->
                                                    </div><!-- micro_date -->
                                                </div><!-- year_box -->
                                            </li><!-- column -->';

                                            }
                                         
    
        echo $output;


    }
  
   

}
