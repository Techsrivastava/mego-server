<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Catlog extends CI_Controller 
{
   public function __construct()  
   {
        parent::__construct();
		$this->load->helper('url'); 
		$this->load->database(); 
		$this->load->library('session');
		$this->load->model('Model_admin');
        $this->load->model('catlog/Brand_model');
        $this->load->model('catlog/category_model');
        $this->load->model('catlog/subcategory_model');
        $this->load->model('catlog/subsubcategory_model');
        $this->load->model('catlog/Product_model');
        $this->load->model('organization/Organization_model');
        $this->load->model('catlog/Attribute_model');
		if (empty($this->session->userdata('sampark_session'))) {
		  redirect(site_url('admin'));
		}
		$this->_admin = $this->session->userdata('sampark_session');
       
    }
	public function attributes() 
	{
		$data['title'] = 'Attribute';   
		$data['menu'] = $this->Model_admin->getUserMenuData(array('IS_VIEW' => 'w'));		
		$this->load->view('template/admin_header',$data); 
	    $this->load->view('catlog/attribute');
		$this->load->view('template/admin_footer');
	}
    /*********BRAND****************************/
    public function brand() 
    {
        $data['title'] = 'Brand';   
        $data['menu'] = $this->Model_admin->getUserMenuData(array('IS_VIEW' => 'w'));   
        $data['brandList'] = $this->Brand_model->getBrand();      
        $this->load->view('template/admin_header',$data); 
        $this->load->view('catlog/brand');
        $this->load->view('template/admin_footer');
    }
     public function addBrand()
    {
        //$category_code = $this->category_model->getMaxId();
        $cur_date=date('Y-m-d h:i:s');
        $cat_id = $this->input->post('id');
        $path = 'assets/upload_image/brand/';
        $cat_image = '';
        $cat_icon = '';
        if (isset($_FILES['brand_image']) && $_FILES['brand_image']['name'] != ''){
            $config['upload_path'] =$path;
            $config['allowed_types'] = '*';
            $config['max_size'] = '10240'; //max_size in kb
          
            $new_name = $_FILES['brand_image']['name'];
            $config['file_name'] = 'brand_' . rand(100, 100000);
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if ($this->upload->do_upload('brand_image')) {
                $dataupload = $this->upload->data();
                $cat_image = $dataupload['file_name'];
            } 
            else 
            {
                $cat_image = "";
            } 
           
        }


        $data = array(
            "brand_name"=>$this->input->post('brand_name'),
            "brand_logo"=>$cat_image,           
            "brand_description"=>$this->input->post('brand_desc'),
            "brand_sort_order"=>$this->input->post('brand_sort_order'),
            "brand_status"=>$this->input->post('brand_status'),
            "brand_date_added"=>$cur_date

        );

        if($id = $this->Brand_model->addModel($data)){
            $this->session->set_flashdata('success', 'Brand added successfully.');
            redirect("catlog/brand?token=".$this->session->userdata['sampark_session']['token'],'refresh');
        } else
        {
            $this->session->set_flashdata('fail', 'Brand can not be Inserted.');
            redirect("catlog/brand?token=".$this->session->userdata['sampark_session']['token'],'refresh');
        }

    }
    public function brandEdit()
    {
        $id=$this->uri->segment(3);
        //echo $id; exit;
        $editData = $this->Brand_model->getData(array('brand_id'=>$id,'single'=>'1'));
        //echo '<pre>'.$editData->CATEGORY_ID; print_r($editData); die;
            $htm = '';
            $htm .= '<div class="row">';
            $htm .= '<div class="col-md-6 form-group">';
            $htm .= '   <label for="email1">BRAND NAME</label>';
            $htm .= '   <input type="text" class="form-control" id="cat_category" aria-describedby="emailHelp" name="brand_name" value="'.$editData->brand_name.'" placeholder="Enter Brand Name">';
            $htm .= '</div>';
            $htm .= '<input type="hidden" name="id" value="'.$editData->brand_id.'">';
            $htm .= '<div class="col-md-6 form-group">';
            $htm .= '   <label for="email1">LOGO</label>';
            $htm .= '   <input type="file" class="form-control" id="cat_image" aria-describedby="emailHelp" value="'.$editData->brand_logo.'" name="brand_logo" >';
            $htm .= '</div>';
            $htm .= '';
          
            $htm .= '<div class="col-md-6 form-group">';
            $htm .= '   <label for="email1">SORT ORDER</label>';
            $htm .= '   <input type="text" class="form-control" id="cat_sort_order" value="'.$editData->brand_sort_order.'" aria-describedby="emailHelp" name="brand_sort_order" placeholder="Enter Shorting Order No">';
            $htm .= '</div>';
            $htm .= '';
            $htm .= '';
            $active = '';
            $deactive = '';
            if($editData->brand_status == 1){
                $active = 'selected';
            }elseif ($editData->brand_status == 0){
                $deactive = 'selected';
            }
            $htm .= '<div class="col-md-6 form-group">';
            $htm .= '   <label for="email1">STATUS</label>';
            $htm .= '   <select class="form-control" style="width: 100%;" data-select2-id="1" tabindex="1" id="cat_status" name="brand_status" aria-hidden="true">';
            $htm .= '       <option '.$active.' value="1">Active</option>';
            $htm .= '       <option '.$deactive.' value="0">De-Active</option>';
            $htm .= '   </select>';
            $htm .= '</div>';
            $htm .= '';
            $htm .= '<div class="col-md-12 form-group">';
            $htm .= '   <label for="email1">BRAND DESCRIPTION</label>';
            $htm .= '   <textarea class="form-control" rows="3" id="cat_desc" name="brand_desc" placeholder="Enter Brand Description" spellcheck="false">'.$editData->brand_description.'</textarea>';
            $htm .= '</div>';
            $htm .= '</div>';

            echo $htm;
    }
    public function brandUpdate()
    {
//      print_r($_POST); die;
        //$category_code = $this->category_model->getMaxId();
        $cur_date=date('Y-m-d h:i:s');
        $cat_id = $this->input->post('id');

        $path = 'assets/upload_image/brand/';
        $cat_image = '';
        $cat_icon = '';

        if (isset($_FILES['brand_image']) && $_FILES['brand_image']['name'] != ''){
            $config['upload_path'] =$path;
            $config['allowed_types'] = '*';
            $config['max_size'] = '10240'; //max_size in kb
          
            $new_name = $_FILES['brand_image']['name'];
            $config['file_name'] = 'brand_' . rand(100, 100000);
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if ($this->upload->do_upload('brand_image')) {
                $dataupload = $this->upload->data();
                $cat_image = $dataupload['file_name'];
            } 
            else 
            {
                $cat_image = "";
            } 
            $data["brand_logo"]=$cat_image;
        }

       
        
            $data["brand_name"]=$this->input->post('brand_name');
            $data["brand_description"]=$this->input->post('brand_desc');
            $data["brand_sort_order"]=$this->input->post('brand_sort_order');
            $data["brand_status"]=$this->input->post('brand_status');
            $data["brand_date_modified"]=$cur_date;

        if($id = $this->Brand_model->editModel($data,$cat_id)){
            $this->session->set_flashdata('success', 'Brand updated successfully.');
            redirect("catlog/brand?token=".$this->session->userdata['sampark_session']['token'],'refresh');
        }
        else
        {
            $this->session->set_flashdata('fail', 'Brand can not be Inserted.');
            redirect("catlog/brand?token=".$this->session->userdata['sampark_session']['token'],'refresh');
        }

    }
    /***********BRAND END********************/
    public function category() 
    {
        $data['title'] = 'Category';   
        $data['menu'] = $this->Model_admin->getUserMenuData(array('IS_VIEW' => 'w'));      
        $data['categoryList'] = $this->category_model->getCategory();
        $this->load->view('template/admin_header',$data); 
        $this->load->view('catlog/category');
        $this->load->view('template/admin_footer');
    }
    public function addCategory()
    {
        //$category_code = $this->category_model->getMaxId();
        $cur_date=date('Y-m-d h:i:s');
        $cat_id = $this->input->post('id');
        $path = 'assets/upload_image/category/';
        $cat_image = '';
        $cat_icon = '';
        if (isset($_FILES['cat_image']) && $_FILES['cat_image']['name'] != ''){
            $config['upload_path'] =$path;
            $config['allowed_types'] = '*';
            $config['max_size'] = '10240'; //max_size in kb
          
            $new_name = $_FILES['cat_image']['name'];
            $config['file_name'] = 'category_' . rand(100, 100000);
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if ($this->upload->do_upload('cat_image')) {
                $dataupload = $this->upload->data();
                $cat_image = $dataupload['file_name'];
            } 
            else 
            {
                $cat_image = "";
            } 
            $data["category_image"]=$cat_image;
        }

        if (isset($_FILES['cat_icon']) && $_FILES['cat_icon']['name'] != ''){
            $config['upload_path'] =$path;
            $config['allowed_types'] = '*';
            $config['max_size'] = '10240'; //max_size in kb
          
            $new_name = $_FILES['cat_icon']['name'];
            $config['file_name'] = 'category_' . rand(100, 100000);
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if ($this->upload->do_upload('cat_icon')) {
                $dataupload = $this->upload->data();
                $cat_icon = $dataupload['file_name'];
            } 
            else 
            {
                $cat_icon = "";
            } 
            $data["category_icon"]=$cat_icon;
        }

        $data = array(
            "CATEGORY_NAME"=>$this->input->post('cat_category'),
            "CATEGORY_IMAGE"=>$cat_image,
            "CATEGORY_ICON"=>$cat_icon,
            "CATEGORY_DESCRIPTION"=>$this->input->post('cat_desc'),
            "CATEGORY_SORT_ORDER"=>$this->input->post('cat_sort_order'),
            "CATEGORY_STATUS"=>$this->input->post('cat_status'),
            "CATEGORY_CREATED_AT"=>$cur_date

        );

        if($id = $this->category_model->addModel($data)){
            $this->session->set_flashdata('success', 'Category updated successfully.');
            redirect("catlog/category?token=".$this->session->userdata['sampark_session']['token'],'refresh');
        } else
        {
            $this->session->set_flashdata('fail', 'Category can not be Inserted.');
            redirect("category?token=".$this->session->userdata['sampark_session']['token'],'refresh');
        }

    }
    public function categoryEdit()
    {
        $id=$this->uri->segment(3);
        //echo $id; exit;
        $editData = $this->category_model->getData(array('CATEGORY_ID'=>$id,'single'=>'1'));
        //echo '<pre>'.$editData->CATEGORY_ID; print_r($editData); die;
            $htm = '';
            $htm .= '<div class="row">';
            $htm .= '<div class="col-md-12 form-group">';
            $htm .= '   <label for="email1">CATEGORY NAME</label>';
            $htm .= '   <input type="text" class="form-control" id="cat_category" aria-describedby="emailHelp" name="cat_category" value="'.$editData->CATEGORY_NAME.'" placeholder="Enter Category Name">';
            $htm .= '</div>';
            $htm .= '<input type="hidden" name="id" value="'.$editData->CATEGORY_ID.'">';
            $htm .= '<div class="col-md-6 form-group">';
            $htm .= '   <label for="email1">IMAGE</label>';
            $htm .= '   <input type="file" class="form-control" id="cat_image" aria-describedby="emailHelp" value="'.$editData->CATEGORY_IMAGE.'" name="cat_image" >';
            $htm .= '</div>';
            $htm .= '';
            $htm .= '<div class="col-md-6 form-group">';
            $htm .= '   <label for="email1">ICON</label>';
            $htm .= '   <input type="file" class="form-control" id="cat_icon" value="'.$editData->CATEGORY_ICON.'" aria-describedby="emailHelp" name="cat_icon" >';
            $htm .= '</div>';
            $htm .= '';
            $htm .= '';
            $htm .= '<div class="col-md-6 form-group">';
            $htm .= '   <label for="email1">SORT ORDER</label>';
            $htm .= '   <input type="text" class="form-control" id="cat_sort_order" value="'.$editData->CATEGORY_SORT_ORDER.'" aria-describedby="emailHelp" name="cat_sort_order" placeholder="Enter Shorting Order No">';
            $htm .= '</div>';
            $htm .= '';
            $htm .= '';
            $active = '';
            $deactive = '';
            if($editData->CATEGORY_STATUS == 1){
                $active = 'selected';
            }elseif ($editData->CATEGORY_STATUS == 0){
                $deactive = 'selected';
            }
            $htm .= '<div class="col-md-6 form-group">';
            $htm .= '   <label for="email1">STATUS</label>';
            $htm .= '   <select class="form-control" style="width: 100%;" data-select2-id="1" tabindex="1" id="cat_status" name="cat_status" aria-hidden="true">';
            $htm .= '       <option '.$active.' value="1">Active</option>';
            $htm .= '       <option '.$deactive.' value="0">De-Active</option>';
            $htm .= '   </select>';
            $htm .= '</div>';
            $htm .= '';
            $htm .= '<div class="col-md-12 form-group">';
            $htm .= '   <label for="email1">CATEGORY DESCRIPTION</label>';
            $htm .= '   <textarea class="form-control" rows="3" id="cat_desc" name="cat_desc" placeholder="Enter Category Description" spellcheck="false">'.$editData->CATEGORY_DESCRIPTION.'</textarea>';
            $htm .= '</div>';
            $htm .= '</div>';

            echo $htm;
    }
    public function categoryUpdate()
    {
//      print_r($_POST); die;
        //$category_code = $this->category_model->getMaxId();
        $cur_date=date('Y-m-d h:i:s');
        $cat_id = $this->input->post('id');

        $path = 'assets/upload_image/category/';
        $cat_image = '';
        $cat_icon = '';

        if (isset($_FILES['cat_image']) && $_FILES['cat_image']['name'] != ''){
            $config['upload_path'] =$path;
            $config['allowed_types'] = '*';
            $config['max_size'] = '10240'; //max_size in kb
          
            $new_name = $_FILES['cat_image']['name'];
            $config['file_name'] = 'category_' . rand(100, 100000);
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if ($this->upload->do_upload('cat_image')) {
                $dataupload = $this->upload->data();
                $cat_image = $dataupload['file_name'];
            } 
            else 
            {
                $cat_image = "";
            } 
            $data["CATEGORY_IMAGE"]=$cat_image;
        }

        if (isset($_FILES['cat_icon']) && $_FILES['cat_icon']['name'] != ''){
            $config['upload_path'] =$path;
            $config['allowed_types'] = '*';
            $config['max_size'] = '10240'; //max_size in kb
          
            $new_name = $_FILES['cat_icon']['name'];
            $config['file_name'] = 'category_' . rand(100, 100000);
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if ($this->upload->do_upload('cat_icon')) {
                $dataupload = $this->upload->data();
                $cat_icon = $dataupload['file_name'];
            } 
            else 
            {
                $cat_icon = "";
            } 
            $data["CATEGORY_ICON"]=$cat_icon;
        }
        
            $data["CATEGORY_NAME"]=$this->input->post('cat_category');
            $data["CATEGORY_DESCRIPTION"]=$this->input->post('cat_desc');
            $data["CATEGORY_SORT_ORDER"]=$this->input->post('cat_sort_order');
            $data["CATEGORY_STATUS"]=$this->input->post('cat_status');
            $data["CATEGORY_UPDATED_AT"]=$cur_date;

        if($id = $this->category_model->editModel($data,$cat_id)){
            $this->session->set_flashdata('success', 'Category updated successfully.');
            redirect("catlog/category?token=".$this->session->userdata['sampark_session']['token'],'refresh');
        }
        else
        {
            $this->session->set_flashdata('fail', 'Category can not be Inserted.');
            redirect("category?token=".$this->session->userdata['sampark_session']['token'],'refresh');
        }

    }
    /**************CATEGORY DATA END***************/
    /**************SUB CATEGORY DATA***************/
    public function subCategory() 
    {
        $data['title'] = 'Sub Category';   
        $data['menu'] = $this->Model_admin->getUserMenuData(array('IS_VIEW' => 'w'));  
        $data['subcategoryList'] = $this->subcategory_model->getData(array('count'=>'all'));     
        $this->load->view('template/admin_header',$data); 
        $this->load->view('catlog/subcategory');
        $this->load->view('template/admin_footer');
    }
    public function addSubCategory()
    {
        //$category_code = $this->category_model->getMaxId();
        $cur_date=date('Y-m-d h:i:s');
        $cat_id = $this->input->post('id');
        $path = 'assets/upload_image/subcategory/';
        $cat_image = '';
        $cat_icon = '';
        if (isset($_FILES['sub_image']) && $_FILES['sub_image']['name'] != ''){
            $config['upload_path'] =$path;
            $config['allowed_types'] = '*';
            $config['max_size'] = '10240'; //max_size in kb
          
            $new_name = $_FILES['sub_image']['name'];
            $config['file_name'] = 'subcategory_' . rand(100, 100000);
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if ($this->upload->do_upload('sub_image')) {
                $dataupload = $this->upload->data();
                $cat_image = $dataupload['file_name'];
            } 
            else 
            {
                $cat_image = "";
            } 
           
        }

        if (isset($_FILES['sub_icon']) && $_FILES['sub_icon']['name'] != ''){
            $config['upload_path'] =$path;
            $config['allowed_types'] = '*';
            $config['max_size'] = '10240'; //max_size in kb
          
            $new_name = $_FILES['sub_icon']['name'];
            $config['file_name'] = 'subcategory_' . rand(100, 100000);
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if ($this->upload->do_upload('sub_icon')) {
                $dataupload = $this->upload->data();
                $cat_icon = $dataupload['file_name'];
            } 
            else 
            {
                $cat_icon = "";
            } 
           
        }

        $data = array(
            "CATEGORY_ID"=>$this->input->post('category'),
            "SUB_CATEGORY_NAME"=>$this->input->post('sub_category'),
            "SUB_CATEGORY_IMAGE"=>$cat_image,
            "SUB_CATEGORY_ICON"=>$cat_icon,
            "SUB_CATEGORY_DESC"=>$this->input->post('sub_desc'),
            "SUB_CATEGORY_SORT_ORDER"=>$this->input->post('sub_sort_order'),
            "SUB_CATEGORY_STATUS"=>$this->input->post('sub_status'),
            "SUB_CATEGORY_CREATED_AT"=>$cur_date

        );

        if($id = $this->subcategory_model->addModel($data)){
            $this->session->set_flashdata('success', 'Sub Category updated successfully.');
            redirect("catlog/subcategory?token=".$this->session->userdata['sampark_session']['token'],'refresh');
        } else
        {
            $this->session->set_flashdata('fail', 'Sub Category can not be Inserted.');
            redirect("subcategory?token=".$this->session->userdata['sampark_session']['token'],'refresh');
        }

    }
    public function subcategoryEdit()
    {
        $id=$this->uri->segment(3);
        $categoryModalList=$this->category_model->getCategory();
        //echo $id; exit;
        $editData = $this->subcategory_model->getData(array('SUB_CATEGORY_ID'=>$id,'single'=>'1'));
        //echo '<pre>'.$editData->CATEGORY_ID; print_r($editData); die;
            $htm = '';
            $htm .= '<div class="row">';
            $htm .= '<div class="col-md-6 form-group" data-select2-id="13">';
            $htm .= '<label for="email1">CATEGORY</label>';
            $htm .= '<select class="form-control" style="width: 100%;" id="category" name="category" aria-hidden="true">';
            $htm .= '<option >Select Category</option>';
            
                  foreach($categoryModalList as $row)
                  {
                 
            $htm .= '<option value="'.$row->CATEGORY_ID.'"';

            if($row->CATEGORY_ID==$editData->CATEGORY_ID)
            {
              $htm .= 'selected="selected"';
            }

            $htm .= '>'.$row->CATEGORY_NAME.'</option>';
             }
              
                
            $htm .= '</select></div>';
           
            
              
            $htm .= '<div class="col-md-6 form-group">';
            $htm .= '   <label for="email1">CATEGORY NAME</label>';
            $htm .= '   <input type="text" class="form-control" id="cat_category" aria-describedby="emailHelp" name="cat_category" value="'.$editData->SUB_CATEGORY_NAME.'" placeholder="Enter Sub Category Name">';
            $htm .= '</div>';
            $htm .= '<input type="hidden" name="id" value="'.$editData->SUB_CATEGORY_ID.'">';
            $htm .= '<div class="col-md-6 form-group">';
            $htm .= '   <label for="email1">IMAGE</label>';
            $htm .= '   <input type="file" class="form-control" id="cat_image" aria-describedby="emailHelp" value="'.$editData->SUB_CATEGORY_IMAGE.'" name="cat_image" >';
            $htm .= '</div>';
            $htm .= '';
            $htm .= '<div class="col-md-6 form-group">';
            $htm .= '   <label for="email1">ICON</label>';
            $htm .= '   <input type="file" class="form-control" id="cat_icon" value="'.$editData->SUB_CATEGORY_ICON.'" aria-describedby="emailHelp" name="cat_icon" >';
            $htm .= '</div>';
            $htm .= '';
            $htm .= '';
            $htm .= '<div class="col-md-6 form-group">';
            $htm .= '   <label for="email1">SORT ORDER</label>';
            $htm .= '   <input type="text" class="form-control" id="cat_sort_order" value="'.$editData->SUB_CATEGORY_SORT_ORDER.'" aria-describedby="emailHelp" name="cat_sort_order" placeholder="Enter Shorting Order No">';
            $htm .= '</div>';
            $htm .= '';
            $htm .= '';
            $active = '';
            $deactive = '';
            if($editData->SUB_CATEGORY_STATUS == 1){
                $active = 'selected';
            }elseif ($editData->SUB_CATEGORY_STATUS == 0){
                $deactive = 'selected';
            }
            $htm .= '<div class="col-md-6 form-group">';
            $htm .= '   <label for="email1">STATUS</label>';
            $htm .= '   <select class="form-control" style="width: 100%;" data-select2-id="1" tabindex="1" id="cat_status" name="cat_status" aria-hidden="true">';
            $htm .= '       <option '.$active.' value="1">Active</option>';
            $htm .= '       <option '.$deactive.' value="0">De-Active</option>';
            $htm .= '   </select>';
            $htm .= '</div>';
            $htm .= '';
            $htm .= '<div class="col-md-12 form-group">';
            $htm .= '   <label for="email1">CATEGORY DESCRIPTION</label>';
            $htm .= '   <textarea class="form-control" rows="3" id="cat_desc" name="cat_desc" placeholder="Enter Category Description" spellcheck="false">'.$editData->SUB_CATEGORY_DESC.'</textarea>';
            $htm .= '</div>';
            $htm .= '</div>';

            echo $htm;
    }
    public function subcategoryUpdate()
    {
//      print_r($_POST); die;
        //$category_code = $this->category_model->getMaxId();
        $cur_date=date('Y-m-d h:i:s');
        $cat_id = $this->input->post('id');

        $path = 'assets/upload_image/subcategory/';
        $cat_image = '';
        $cat_icon = '';

        if (isset($_FILES['cat_image']) && $_FILES['cat_image']['name'] != ''){
            $config['upload_path'] =$path;
            $config['allowed_types'] = '*';
            $config['max_size'] = '10240'; //max_size in kb
          
            $new_name = $_FILES['cat_image']['name'];
            $config['file_name'] = 'subcategory_' . rand(100, 100000);
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if ($this->upload->do_upload('cat_image')) {
                $dataupload = $this->upload->data();
                $cat_image = $dataupload['file_name'];
            } 
            else 
            {
                $cat_image = "";
            } 
            $data["SUB_CATEGORY_IMAGE"]=$cat_image;
        }

        if (isset($_FILES['cat_icon']) && $_FILES['cat_icon']['name'] != ''){
            $config['upload_path'] =$path;
            $config['allowed_types'] = '*';
            $config['max_size'] = '10240'; //max_size in kb
          
            $new_name = $_FILES['cat_icon']['name'];
            $config['file_name'] = 'subcategory_' . rand(100, 100000);
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if ($this->upload->do_upload('cat_icon')) {
                $dataupload = $this->upload->data();
                $cat_icon = $dataupload['file_name'];
            } 
            else 
            {
                $cat_icon = "";
            } 
            $data["SUB_CATEGORY_ICON"]=$cat_icon;
        }
            $data["CATEGORY_ID"]=$this->input->post('category');
            $data["SUB_CATEGORY_NAME"]=$this->input->post('cat_category');
            $data["SUB_CATEGORY_DESC"]=$this->input->post('cat_desc');
            $data["SUB_CATEGORY_SORT_ORDER"]=$this->input->post('cat_sort_order');
            $data["SUB_CATEGORY_STATUS"]=$this->input->post('cat_status');
            $data["SUB_CATEGORY_UPDATED_AT"]=$cur_date;

        if($id = $this->subcategory_model->editModel($data,$cat_id)){
            $this->session->set_flashdata('success', 'Sub Category updated successfully.');
            redirect("catlog/subcategory?token=".$this->session->userdata['sampark_session']['token'],'refresh');
        }
        else
        {
            $this->session->set_flashdata('fail', 'Category can not be Inserted.');
            redirect("subcategory?token=".$this->session->userdata['sampark_session']['token'],'refresh');
        }

    }
    /**************SUB CATEGORY DATA END***************/
    public function subSubCategory() 
    {
        $data['title'] = 'Sub Sub Category';   
        $data['menu'] = $this->Model_admin->getUserMenuData(array('IS_VIEW' => 'w'));    
        $data['subcategoryList'] = $this->subsubcategory_model->getsubSubCategory();   
        $this->load->view('template/admin_header',$data); 
        $this->load->view('catlog/subsubcategory');
        $this->load->view('template/admin_footer');
    }
    public function addSubSubCategory()
    {
        //$category_code = $this->category_model->getMaxId();
        $cur_date=date('Y-m-d h:i:s');
        $cat_id = $this->input->post('id');
        $path = 'assets/upload_image/subsubcategory/';
        $cat_image = '';
        $cat_icon = '';
        if (isset($_FILES['sub_sub_image']) && $_FILES['sub_sub_image']['name'] != ''){
            $config['upload_path'] =$path;
            $config['allowed_types'] = '*';
            $config['max_size'] = '10240'; //max_size in kb
          
            $new_name = $_FILES['sub_sub_image']['name'];
            $config['file_name'] = 'subsubcategory_' . rand(100, 100000);
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if ($this->upload->do_upload('sub_sub_image')) {
                $dataupload = $this->upload->data();
                $cat_image = $dataupload['file_name'];
            } 
            else 
            {
                $cat_image = "";
            } 
           
        }

        if (isset($_FILES['sub_sub_icon']) && $_FILES['sub_sub_icon']['name'] != ''){
            $config['upload_path'] =$path;
            $config['allowed_types'] = '*';
            $config['max_size'] = '10240'; //max_size in kb
          
            $new_name = $_FILES['sub_sub_icon']['name'];
            $config['file_name'] = 'subsubcategory_' . rand(100, 100000);
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if ($this->upload->do_upload('sub_sub_icon')) {
                $dataupload = $this->upload->data();
                $cat_icon = $dataupload['file_name'];
            } 
            else 
            {
                $cat_icon = "";
            } 
           
        }

        $data = array(
            "CATEGORY_ID"=>$this->input->post('sscategory'),
            "SUB_CATEGORY_ID"=>$this->input->post('sssubcategory'),
            "SUB_SUB_CATEGORY_NAME"=>$this->input->post('subsubcategory'),
            "SUB_SUB_CATEGORY_IMAGE"=>$cat_image,
            "SUB_SUB_CATEGORY_ICON"=>$cat_icon,
            "SUB_SUB_CATEGORY_DESC"=>$this->input->post('sub_sub_desc'),
            "SUB_SUB_CATEGORY_SORT_ORDER"=>$this->input->post('sub_sub_sort_order'),
            "SUB_SUB_CATEGORY_STATUS"=>$this->input->post('sub_sub_status'),
            "SUB_SUB_CATEGORY_CREATED_AT"=>$cur_date

        );

        if($id = $this->subsubcategory_model->addModel($data)){
            $this->session->set_flashdata('success', 'Sub Sub Category updated successfully.');
            redirect("catlog/subsubcategory?token=".$this->session->userdata['sampark_session']['token'],'refresh');
        } else
        {
            $this->session->set_flashdata('fail', 'Sub Category can not be Inserted.');
            redirect("subsubcategory?token=".$this->session->userdata['sampark_session']['token'],'refresh');
        }

    }
    public function subsubcategoryEdit()
    {
        $id=$this->uri->segment(3);
        $categoryModalList=$this->category_model->getCategory();
        //echo $id; exit;
        $editData = $this->subsubcategory_model->getData(array('SUB_SUB_CATEGORY_ID'=>$id,'single'=>'1'));
        //echo '<pre>'.$editData->CATEGORY_ID; print_r($editData); die;
        $ioc="getsubCategory($(this).val(),'sub_category_id')";
            $htm = '';
            $htm .= '<div class="row">';
            $htm .= '<div class="col-md-6 form-group" data-select2-id="13">';
            $htm .= '<label for="email1">CATEGORY</label>';
            $htm .= '<select class="form-control" style="width: 100%;" id="category" name="category" aria-hidden="true"  onchange="'.$ioc.'">';
            $htm .= '<option >Select Category</option>';
            
                  foreach($categoryModalList as $row)
                  {
                 
            $htm .= '<option value="'.$row->CATEGORY_ID.'"';

            if($row->CATEGORY_ID==$editData->CATEGORY_ID)
            {
              $htm .= 'selected="selected"';
            }

            $htm .= '>'.$row->CATEGORY_NAME.'</option>';
             }
              
                
            $htm .= '</select></div>';
           
          $htm .= '<div class="col-md-6  form-group" >
            <label for="email1">SUB CATEGORY</label>
           <select  name="subcategory" class="form-control" required="required" style="width: 100%;" data-select2-id="1" tabindex="1" id="sub_category_id" aria-hidden="true">
                  <option >Select Sub  Category</option>
         
            </select>
           
          </div> ';

            
              
            $htm .= '<div class="col-md-6 form-group">';
            $htm .= '   <label for="email1">CATEGORY NAME</label>';
            $htm .= '   <input type="text" class="form-control" id="cat_category" aria-describedby="emailHelp" name="cat_category" value="'.$editData->SUB_SUB_CATEGORY_NAME.'" placeholder="Enter Sub Category Name">';
            $htm .= '</div>';
            $htm .= '<input type="hidden" name="id" value="'.$editData->SUB_SUB_CATEGORY_ID.'">';
            $htm .= '<div class="col-md-6 form-group">';
            $htm .= '   <label for="email1">IMAGE</label>';
            $htm .= '   <input type="file" class="form-control" id="cat_image" aria-describedby="emailHelp" value="'.$editData->SUB_SUB_CATEGORY_IMAGE.'" name="cat_image" >';
            $htm .= '</div>';
            $htm .= '';
            $htm .= '<div class="col-md-6 form-group">';
            $htm .= '   <label for="email1">ICON</label>';
            $htm .= '   <input type="file" class="form-control" id="cat_icon" value="'.$editData->SUB_SUB_CATEGORY_ICON.'" aria-describedby="emailHelp" name="cat_icon" >';
            $htm .= '</div>';
            $htm .= '';
            $htm .= '';
            $htm .= '<div class="col-md-6 form-group">';
            $htm .= '   <label for="email1">SORT ORDER</label>';
            $htm .= '   <input type="text" class="form-control" id="cat_sort_order" value="'.$editData->SUB_SUB_CATEGORY_SORT_ORDER.'" aria-describedby="emailHelp" name="cat_sort_order" placeholder="Enter Shorting Order No">';
            $htm .= '</div>';
            $htm .= '';
            $htm .= '';
            $active = '';
            $deactive = '';
            if($editData->SUB_SUB_CATEGORY_STATUS == 1){
                $active = 'selected';
            }elseif ($editData->SUB_SUB_CATEGORY_STATUS == 0){
                $deactive = 'selected';
            }
            $htm .= '<div class="col-md-6 form-group">';
            $htm .= '   <label for="email1">STATUS</label>';
            $htm .= '   <select class="form-control" style="width: 100%;" data-select2-id="1" tabindex="1" id="cat_status" name="cat_status" aria-hidden="true">';
            $htm .= '       <option '.$active.' value="1">Active</option>';
            $htm .= '       <option '.$deactive.' value="0">De-Active</option>';
            $htm .= '   </select>';
            $htm .= '</div>';
            $htm .= '';
            $htm .= '<div class="col-md-12 form-group">';
            $htm .= '   <label for="email1">CATEGORY DESCRIPTION</label>';
            $htm .= '   <textarea class="form-control" rows="3" id="cat_desc" name="cat_desc" placeholder="Enter Category Description" spellcheck="false">'.$editData->SUB_SUB_CATEGORY_DESC.'</textarea>';
            $htm .= '</div>';
            $htm .= '</div>';

            echo $htm;
    }
    public function subsubcategoryUpdate()
    {
//      print_r($_POST); die;
        //$category_code = $this->category_model->getMaxId();
        $cur_date=date('Y-m-d h:i:s');
        $cat_id = $this->input->post('id');

        $path = 'assets/upload_image/subsubcategory/';
        $cat_image = '';
        $cat_icon = '';

        if (isset($_FILES['cat_image']) && $_FILES['cat_image']['name'] != ''){
            $config['upload_path'] =$path;
            $config['allowed_types'] = '*';
            $config['max_size'] = '10240'; //max_size in kb
          
            $new_name = $_FILES['cat_image']['name'];
            $config['file_name'] = 'subcategory_' . rand(100, 100000);
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if ($this->upload->do_upload('cat_image')) {
                $dataupload = $this->upload->data();
                $cat_image = $dataupload['file_name'];
            } 
            else 
            {
                $cat_image = "";
            } 
            $data["SUB_SUB_CATEGORY_IMAGE"]=$cat_image;
        }

        if (isset($_FILES['cat_icon']) && $_FILES['cat_icon']['name'] != ''){
            $config['upload_path'] =$path;
            $config['allowed_types'] = '*';
            $config['max_size'] = '10240'; //max_size in kb
          
            $new_name = $_FILES['cat_icon']['name'];
            $config['file_name'] = 'subcategory_' . rand(100, 100000);
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if ($this->upload->do_upload('cat_icon')) {
                $dataupload = $this->upload->data();
                $cat_icon = $dataupload['file_name'];
            } 
            else 
            {
                $cat_icon = "";
            } 
            $data["SUB_SUB_CATEGORY_ICON"]=$cat_icon;
        }
            $data["CATEGORY_ID"]=$this->input->post('category');
            $data["SUB_CATEGORY_ID"]=$this->input->post('subcategory');
            $data["SUB_SUB_CATEGORY_NAME"]=$this->input->post('cat_category');
            $data["SUB_SUB_CATEGORY_DESC"]=$this->input->post('cat_desc');
            $data["SUB_SUB_CATEGORY_SORT_ORDER"]=$this->input->post('cat_sort_order');
            $data["SUB_SUB_CATEGORY_STATUS"]=$this->input->post('cat_status');
            $data["SUB_SUB_CATEGORY_UPDATED_AT"]=$cur_date;

        if($id = $this->subsubcategory_model->editModel($data,$cat_id)){
            $this->session->set_flashdata('success', 'SUb Sub Category updated successfully.');
            redirect("catlog/subsubcategory?token=".$this->session->userdata['sampark_session']['token'],'refresh');
        }
        else
        {
            $this->session->set_flashdata('fail', 'Category can not be Inserted.');
            redirect("subsubcategory?token=".$this->session->userdata['sampark_session']['token'],'refresh');
        }

    } 

    public function product() 
    {
        $data['title'] = 'Product';   
        $data['menu'] = $this->Model_admin->getUserMenuData(array('IS_VIEW' => 'w')); 
        $data['productList'] = $this->Product_model->getProductList();    
        $data['warehouseList'] = $this->Organization_model->getWareHouseData();    
        $this->load->view('template/admin_header',$data); 
        $this->load->view('catlog/product');
        $this->load->view('template/admin_footer');
    }

     public function productcat() 
    {
        $data['title'] = 'Product';   
        $data['menu'] = $this->Model_admin->getUserMenuData(array('IS_VIEW' => 'w')); 
        $data['catproductList'] = $this->Product_model->getcatProductList();    
        $data['warehouseList'] = $this->Organization_model->getWareHouseData();    
        $this->load->view('template/admin_header',$data); 
        $this->load->view('catlog/productCat');
        $this->load->view('template/admin_footer');
    }
    public function getProductData()
    {
        $warehouse_id=$_REQUEST['warehouse_id'];//exit;
        $warehousePrdData = $this->Product_model->getWareHouseProduct($warehouse_id);
        $output='';
        $i=1;
        foreach ($warehousePrdData as $prow) 
        {  
           
                $getProdStockQty=$this->Product_model->getPrdWStockData(array('product_id'=>$prow->product_id,'warehouse_id'=>$warehouse_id));  
                $edit=base_url()."'catlog/prd_edit/".$prow->product_id;
                $delete=base_url()."'catlog/productDelete/".$prow->product_id;
                           
               
                $output.='<tr>';
                $output.=' <td>'.$i.'</td>';
                $output.=' <td>'.$prow->pcategory.'</td>';
                $output.=' <td>PRD-'.$prow->product_id.'</td>';
                $output.=' <td>'.$prow->PR_PRODUCT_NAME.'</td>';
                $output.=' <td>'.$getProdStockQty->stock.'</td>';
                $output.=' <td>'.$prow->PR_NO_OF_PIECE_PER_CARTON.'</td>';
                $output.=' <td>'.$getProdStockQty->stock*$prow->PR_NO_OF_PIECE_PER_CARTON.'</td>';
                $output.=' <td>Rs.'.$prow->PR_MRP.'</td>';
                $output.=' <td>Rs.'.$prow->PR_SP_PRICE.'</td>';
                $output.=' <td>Rs.'.$prow->PR_PRICE.'</td>';
                $output.=' <td>';
                if($prow->PR_STATUS=='1')
                    { 
                        $output.=' <span class="btn btn-success btn-xs">Active</span>'; 
                    } 
                    else
                    { 
                        $output.=' <span class="btn btn-danger btn-xs">De-Active</span>';
                    }
                $output.='</td>';
                $output.=' <td>';
                $output.=' <a href="'.$edit.'"  class="btn btn-success btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>';
                $output.=' <a href="'.$delete.'" onclick="return confirm("Are you sure want to delete this item!"")" class="btn btn-danger btn-xs"><i class="fa fa-trash" aria-hidden="true"></i></a>';
                     
                $output.=' </td>';
                $output.=' </tr>';
        $i++; }
       
    echo $output;
    }  
     public function getProductAttrData()
    {
        $product_id=$_REQUEST['product_id'];//exit;
        $prdPrdData = $this->Product_model->getAttrProduct($product_id);
        $output='';
        $i=1;
        $tqty="";
        foreach ($prdPrdData as $prow) 
        {  
           
                $getProdattrStockQty=$this->Product_model->getPrdWAStockData(array('product_id'=>$prow->product_id,'product_attr_id'=>$prow->product_attr_id,'product_attr_type_id'=>$prow->product_attr_type_id));  
                 $tqty=$tqty+$getProdattrStockQty->stock;          
               
                $output.='<tr>';
                $output.=' <td>'.$i.'</td>';
                $output.=' <td>PRD-'.$prow->ATTRIBUTE_DESC.'</td>';
                $output.=' <td>'.$prow->ATTRIBUTE_TYPE_NAME.'</td>';
                $output.=' <td>'.$getProdattrStockQty->stock.'</td>';
               
                $output.=' </tr>';


        $i++; }

        $output.='<tr><td></td><td></td><td style="text-align:right; color:blue;">Total Quantity :-</td><td>'.$tqty.'</td></tr>';
       
    echo $output;
    }  
    

    public function categoryDelete($item_id)
    {
        if($this->category_model->deleteModel($item_id)){
            $this->session->set_flashdata('success', 'Category Delete Successfully!');
            redirect('catlog/category','refresh');
        }
    }
    public function subCategoryDelete($item_id)
    {
        if($this->subcategory_model->deleteModel($item_id)){
            $this->session->set_flashdata('success', 'Category Delete Successfully!');
            redirect("catlog/subcategory?token=".$this->session->userdata['sampark_session']['token'],'refresh');
        }
    }
    public function brandDelete($item_id)
    {
        if($this->Brand_model->deleteModel($item_id)){
            $this->session->set_flashdata('success', 'Brand Delete Successfully!');
            redirect("catlog/brand?token=".$this->session->userdata['sampark_session']['token'],'refresh');
        }
    }
    public function productDelete($item_id)
    {
        if($this->Product_model->deleteModel($item_id)){
            $this->session->set_flashdata('success', 'Product Delete Successfully!');
            redirect("catlog/product?token=".$this->session->userdata['sampark_session']['token'],'refresh');
        }
    }
   public function getsubCategory($cat_id)
    {
//  echo 'dfsdfds'; die;
        $tbl=DB_PREFIX.'sub_category';
        $tableData = $this->db->get_where($tbl,array('CATEGORY_ID'=>$cat_id))->result();
        $htm = '';
        $htm .= '<option value="">Select</option>';
        foreach ($tableData as $item){
            $htm .= '<option value="'.$item->SUB_CATEGORY_ID.'">';
            $htm .= $item->SUB_CATEGORY_NAME;
            $htm .= '</option>';
        }


//      $cat_id = $_REQUEST['cat_id'];
        echo $htm;
    }

    public function getProductByCategory($pcat_id)
    {
//  echo 'dfsdfds'; die;
        $tbl=DB_PREFIX.'product';
        $tableData =$this->Product_model->getProductList(array('PR_PRD_CAT_ID'=>$pcat_id));
        $htm = '';
        $htm .= '<option value="">Select Available Product Pack</option>';
        foreach ($tableData as $item){
            $pv=$item->PR_PRODUCT_VOLUME.' '.$item->PR_PRODUCT_PACK;
            $htm .= '<option value="'.$item->PR_PRODUCT_ID.'">';
            $htm .= $item->PR_PRODUCT_NAME.' ('.$pv.') ('.$item->ATTRIBUTE_DESC.')';
            $htm .= '</option>';
        }


//      $cat_id = $_REQUEST['cat_id'];
        echo $htm;
    }

     public function getPrdCountData($pid,$qty)
    {

        $tbl=DB_PREFIX.'product';
        $tableData =$this->Product_model->getProductList(array('PRODUCT_ID'=>$pid,'single'=>true));
       // print_r($tableData);
        $htm=$qty*$tableData->PR_NO_OF_PIECE_PER_CARTON;
       
        echo $htm;
        //echo json_decode($htm);
    }
     public function getPrductCountData($pid,$qty)
    {

        $tbl=DB_PREFIX.'product';
        $tableData =$this->Product_model->getProductList(array('PRODUCT_ID'=>$pid,'single'=>true));
       // print_r($tableData);
        $htm['quantity']=$qty*$tableData->PR_NO_OF_PIECE_PER_CARTON;
        $htm['pprice']=$tableData->PR_MRP*$tableData->PR_NO_OF_PIECE_PER_CARTON;
        $htm['subprice']=$qty*$tableData->PR_MRP*$tableData->PR_NO_OF_PIECE_PER_CARTON;
        //print_r($htm);
        echo json_encode($htm);
    }
     public function getRePrductCountData($pid,$qty)
    {

        $tbl=DB_PREFIX.'product';
        $tableData =$this->Product_model->getProductList(array('PRODUCT_ID'=>$pid,'single'=>true));
       // print_r($tableData);
        //$htm['quantity']=$qty*$tableData->PR_NO_OF_PIECE_PER_CARTON;
        $htm['pprice']=$tableData->PR_SP_PRICE;
        $htm['subprice']=$qty*$tableData->PR_SP_PRICE;
        //print_r($htm);
        echo json_encode($htm);
    }




    public function prd_add() 
    {
            $data['title'] = 'Product';   
            $data['menu'] = $this->Model_admin->getUserMenuData(array('IS_VIEW' => 'w'));
            //$data['pcategoryList'] = $this->Product_model->getProductList();
            $cattbl=DB_PREFIX.'category';
            $btbl=DB_PREFIX.'brand';
            $data['categoryModalList'] = $this->db->get_where($cattbl,array('STATUS',1))->result();
            $data['brandsList'] = $this->db->get_where($btbl,array('STATUS',1))->result();
           // $data['getColors'] = $this->Model_admin->getColors(); 
            $data['warehouseList'] = $this->Organization_model->getWareHouseData();  
            $data['attributeList'] = $this->Attribute_model->getAttribute();      
            $data['catproductList'] = $this->Product_model->getcatProductList();    
            $this->load->view('template/admin_header',$data);
            $this->load->view('catlog/addproduct');
            $this->load->view('template/admin_footer');
    }

    public function prd_cat_add() 
    {
            $data['title'] = 'Product';   
            $data['menu'] = $this->Model_admin->getUserMenuData(array('IS_VIEW' => 'w'));
            //$data['pcategoryList'] = $this->Product_model->getProductList();
            $cattbl=DB_PREFIX.'category';
            $btbl=DB_PREFIX.'brand';
            $data['categoryModalList'] = $this->db->get_where($cattbl,array('STATUS',1))->result();
            $data['brandsList'] = $this->db->get_where($btbl,array('STATUS',1))->result();
           // $data['getColors'] = $this->Model_admin->getColors(); 
            $data['warehouseList'] = $this->Organization_model->getWareHouseData();  
            $data['attributeList'] = $this->Attribute_model->getAttribute();      
             $data['catproductList'] = $this->Product_model->getcatProductList();  
            $this->load->view('template/admin_header',$data);
            $this->load->view('catlog/addCatproduct');
            $this->load->view('template/admin_footer');
    }
    public function prd_cat_edit() 
    {
            $data['title'] = 'Product';   
            $data['menu'] = $this->Model_admin->getUserMenuData(array('IS_VIEW' => 'w'));
            //$data['pcategoryList'] = $this->Product_model->getProductList();
            $prdCatId=$this->uri->segment(3);
            //  echo $prdCatId; exit;
            $data['prdCatData'] = $this->Product_model->getcatProductList(array('PR_PRD_CAT_ID'=>$prdCatId,'single'=>true));   
            $cattbl=DB_PREFIX.'category';
            $btbl=DB_PREFIX.'brand';
            $data['categoryModalList'] = $this->db->get_where($cattbl,array('STATUS',1))->result();
            $data['brandsList'] = $this->db->get_where($btbl,array('STATUS',1))->result();
            // $data['getColors'] = $this->Model_admin->getColors(); 
            $data['warehouseList'] = $this->Organization_model->getWareHouseData();  
            $data['attributeList'] = $this->Attribute_model->getAttribute();      
            $data['catproductList'] = $this->Product_model->getcatProductList(); 

            $this->load->view('template/admin_header',$data);
            $this->load->view('catlog/editCatproduct');
            $this->load->view('template/admin_footer');
    }
    public function prd_edit() 
    {
            $data['title'] = 'Product';   
            $data['menu'] = $this->Model_admin->getUserMenuData(array('IS_VIEW' => 'w'));
            //$data['pcategoryList'] = $this->Product_model->getProductList();
            $prdId=$this->uri->segment(3);
            //  echo $prdCatId; exit;
            $data['prdData'] = $this->Product_model->getProductList(array('PR_PRODUCT_ID'=>$prdId,'single'=>true));   
            $cattbl=DB_PREFIX.'category';
            $btbl=DB_PREFIX.'brand';
            $data['categoryModalList'] = $this->db->get_where($cattbl,array('STATUS',1))->result();
            $data['brandsList'] = $this->db->get_where($btbl,array('STATUS',1))->result();
            // $data['getColors'] = $this->Model_admin->getColors(); 
            $data['warehouseList'] = $this->Organization_model->getWareHouseData();  
            $data['attributeList'] = $this->Attribute_model->getAttribute();      
            $data['catproductList'] = $this->Product_model->getcatProductList(); 

            $this->load->view('template/admin_header',$data);
            $this->load->view('catlog/editproduct');
            $this->load->view('template/admin_footer');
    }
    public function prd_assign() 
    {
            $data['title'] = 'Product';   
            $data['menu'] = $this->Model_admin->getUserMenuData(array('IS_VIEW' => 'w'));
            //$data['pcategoryList'] = $this->Product_model->getProductList();
            $cattbl=DB_PREFIX.'category';
            $btbl=DB_PREFIX.'brand';
            $data['categoryModalList'] = $this->db->get_where($cattbl,array('STATUS',1))->result();
            $data['brandsList'] = $this->db->get_where($btbl,array('STATUS',1))->result();
           // $data['getColors'] = $this->Model_admin->getColors(); 
            $data['warehouseList'] = $this->Organization_model->getWareHouseData();  
            $data['attributeList'] = $this->Attribute_model->getAttribute();      
            $data['productList'] = $this->Product_model->getcatProductList();  
            $this->load->view('template/admin_header',$data);
            $this->load->view('catlog/assignPrdData');
            $this->load->view('template/admin_footer');
    }
    public function getattrType() {
        $attr_id = $_REQUEST['attr_id'];
        $getData = $this->Attribute_model->getAttributeType($attr_id);
        $r = '1';
        $output = '<select class="form-control" id="district" name="district" onchange="getCity(this.value);"><option value="0" >Select Attribute Type</option>';

        foreach ($getData as $grow) {
            $output .= '
                  <option value="' . $grow->ATTRIBUTE_TYPE_ID . '">' . $grow->ATTRIBUTE_TYPE_NAME . '</option>
                ';
            $r++;
        }
        $output .= '</select>';
        echo $output;
    }

    public function productedit($id) 
    {

        // echo $id; die;

            $data['title'] = 'Product';   
            $data['menu'] = $this->Model_admin->getUserMenuData(array('IS_VIEW' => 'w'));
            $data['pcategoryList'] = $this->Product_model->getProductList();

            $data['categoryModalList'] = $this->db->get_where('category',array('status',1))->result();
            $data['brandsList'] = $this->db->get_where('brand',array('status',1))->result();
            $data['getColors'] = $this->Model_admin->getColors(); 

            $data['editProduct'] = $this->db->get_where('product',['product_id'=>$id])->row();

            $product_color = $this->db->get_where('product_color',['product_id'=>$id])->result_array();
            $data['product_color'] = array_column($product_color,"product_color");;
        // print_r($data['product_color']); die;
            $this->load->view('template/admin_header',$data);
            $this->load->view('catlog/addproduct');
            $this->load->view('template/admin_footer');
    }

    public function productview($id) 
    {
            $data['title'] = 'Product';   
            $data['menu'] = $this->Model_admin->getUserMenuData(array('IS_VIEW' => 'w'));
            $data['pcategoryList'] = $this->Product_model->getProductList();

            $data['categoryModalList'] = $this->db->get_where('category',array('status',1))->result();
            $data['brandsList'] = $this->db->get_where('brand',array('status',1))->result();
            $data['getColors'] = $this->Model_admin->getColors(); 

            $data['editProduct'] = $this->db->get_where('product',['product_id'=>$id])->row();

            $product_color = $this->db->get_where('product_color',['product_id'=>$id])->result_array();
            $data['product_color'] = array_column($product_color,"product_color");;
        // print_r($data['product_color']); die;
            $this->load->view('template/admin_header',$data);
            $this->load->view('catlog/viewproduct');
            $this->load->view('template/admin_footer');
    }

    public function addProduct()
    {
            
            
            //$path = './uploads/product/';
            //$warehouse=$this->input->post('product_name');
            $data = array(
                        "PR_PRD_CAT_ID"=>$this->input->post('prd_category'),
                        "PR_PRODUCT_NAME"=>$this->input->post('product_name'),
                       
                        "PR_MRP"=>$this->input->post('mrp_price'),
                        "PR_SP_PRICE"=>$this->input->post('retailer_price'),
                        "PR_PRICE"=>$this->input->post('distributor_price'),

                        
                        "PR_NO_OF_PIECE_PER_CARTON"=>$this->input->post('no_of_piece'),
                        "PR_MIN_QTY_PER_ORDER"=>$this->input->post('min_carton_order'),
                        "PR_PRODUCT_PACK_TYPE"=>$this->input->post('storage'),
                        "PR_PRODUCT_PACK"=>$this->input->post('volume_type'),
                        "PR_PRODUCT_VOLUME"=>$this->input->post('volume'),
                        "PR_HEIGHT"=>$this->input->post('product_height'),
                        "PR_WEIGHT"=>$this->input->post('product_weight'),
                        "PR_LENGTH"=>$this->input->post('product_length'),
                        "PR_DESCRIPTION"=>$this->input->post('product_desc'),
                        "PR_DISCOUNT"=>$this->input->post('discount'),
                        "PR_STATUS"=>$this->input->post('product_status'),
                    );
            // $dcount=COUNT($this->input->post('product_attributes'));        
            // for ($i=0; $i < count($image_name); $i++) 
            // {

            // }
            if($id = $this->Product_model->addModel($data)){
               $path = 'assets/upload_image/product/';

                if(isset($_FILES['product_image']) && !empty($_FILES['product_image'])){
                    $image_name = $this->upload_multiple('product_image',$path);
                    // print_r($image_name); die;
                    for ($i=0; $i < count($image_name); $i++) {
                        $imageData = [
                            'product_id' => $id,
                            'product_image' => $image_name[$i],
                        ];
                        $this->db->insert('product_image',$imageData);
                    }
                }
                $_SESSION['msg'] = "Product Added Successfully";
                $_SESSION['msgtype'] ="success";
                redirect('catlog/product','refresh');
            }

            else
            {
                $_SESSION['msg'] = "Oops Something went wrong,Please try again";
                $_SESSION['msgtype'] ="error";
                $this->session->set_flashdata('fail', 'Category can not be Inserted.');
                redirect("catlog/product",'refresh');
            }       
        
    }
    public function addCatProduct()
    {
            
            
            //$path = './uploads/product/';
            //$warehouse=$this->input->post('product_name');
            $data = array(
                       
                        "PR_CATEGORY_ID"=>$this->input->post('product_category'),
                        "PR_SUB_CATEGORY_ID"=>$this->input->post('product_subcategory'),
                        "PR_SUB_SUB_CATEGORY_ID"=>$this->input->post('product_subsubcategory'),
                        "PR_BRAND_ID"=>$this->input->post('product_brand'),                       
                        "PR_PRODUCT_NAME"=>$this->input->post('product_name'),
                        "PR_STATUS"=>$this->input->post('product_status')
                    );
           
            if($id = $this->Product_model->addRow('product_category',$data)){
              
                $_SESSION['msg'] = "Product Category Added Successfully";
                $_SESSION['msgtype'] ="success";
                redirect('catlog/productcat','refresh');
            }

            else
            {
                $_SESSION['msg'] = "Oops Something went wrong,Please try again";
                $_SESSION['msgtype'] ="error";
                redirect("catlog/productcat",'refresh');
            }       
        
    }
     public function updateCatProduct()
    {
            
            
            $prdcategoryId=$this->input->post('prd_cat_id');
            $data = array(
                       
                        "PR_CATEGORY_ID"=>$this->input->post('product_category'),
                        "PR_SUB_CATEGORY_ID"=>$this->input->post('product_subcategory'),
                        "PR_SUB_SUB_CATEGORY_ID"=>$this->input->post('product_subsubcategory'),
                        "PR_BRAND_ID"=>$this->input->post('product_brand'),                       
                        "PR_PRODUCT_NAME"=>$this->input->post('product_name'),
                        "PR_STATUS"=>$this->input->post('product_status')
                    );
           
            if($id = $this->Product_model->updateRow('product_category',$data,array('PR_PRD_CAT_ID'=>$prdcategoryId))){
              
                $_SESSION['msg'] = "Product Category Updated Successfully";
                $_SESSION['msgtype'] ="success";
                redirect('catlog/productcat','refresh');
            }

            else
            {
                $_SESSION['msg'] = "Oops Something went wrong,Please try again";
                $_SESSION['msgtype'] ="error";
                $this->session->set_flashdata('fail', 'Product Category can not be Updated.');
                redirect("catlog/productcat",'refresh');
            }       
        
    }



    public function addProductWarehouse()
    {
            
            
            $user_id=$this->session->userdata['sampark_session']['USER_ID'];
            $warehouse_id=$this->input->post('warehouse_id');
            $product_id=$this->input->post('product_id');
            $product_packs= $this->input->post('product_packs'); 
            $product_qty= $this->input->post('product_qty'); 
            $no_of_piecesCOunt= $this->input->post('no_of_piecesCOunt');    
            
            $dcount=COUNT($this->input->post('product_id')); 

            for ($i=0; $i < $dcount; $i++) 
            {
                $data=array('warehouse_id'=>$warehouse_id,'product_cat_id'=>$product_id[$i],'product_id'=>$product_packs[$i],'quantity'=>$product_qty[$i],'no_of_pieces'=>$no_of_piecesCOunt[$i],'status'=>'1','user_id'=>$user_id);

                $this->Product_model->addRow('warehouse_stock',$data);
               
             
            }
            $_SESSION['msg'] = "Warehouse Product Allocated Successfully";
            $_SESSION['msgtype'] ="success";
            redirect("catlog/prd_assign?token=".$this->session->userdata['sampark_session']['token'],'refresh');
        
            
        
    }

    public function productupdate()
    {
        // echo '<pre>'; print_r($_POST); die;
            $id = $this->input->post('id');

            $path = './uploads/product/';

            $data = array(
                        "product_name"=>$this->input->post('product_name'),
                        "product_category"=>$this->input->post('product_category'),
                        "product_subcategory"=>$this->input->post('product_subcategory'),
                        "product_subsubcategory"=>$this->input->post('product_subsubcategory'),
                        "product_brand_id"=>$this->input->post('product_brand'),
                        "product_unit"=>$this->input->post('product_unit'),
                        "product_minimumqty"=>$this->input->post('product_min_qty'),
                        "product_quantity"=>$this->input->post('product_qty'),
                        "product_price"=>$this->input->post('product_price'),
                        "product_sellprice"=>$this->input->post('product_sprice'),
                        "product_discount"=>$this->input->post('product_discount'),
                        "product_length"=>$this->input->post('product_length'),
                        "product_width"=>$this->input->post('product_width'),
                        "product_height"=>$this->input->post('product_height'),
                        "product_weight"=>$this->input->post('product_weight'),
                        "product_description"=>$this->input->post('editor1'),
                        "product_status"=>$this->input->post('product_status'),
                    );
                    // print_r($data); die;
            if($this->Product_model->editModel($data,$id)){

                $this->db->where('product_id',$id);
                $this->db->delete('product_color');

                $product_color = $this->input->post('product_color');
                if(count($product_color) > 0){
                    for ($c=0; $c < count($product_color); $c++) { 
                        $colorData['product_id'] = $id;
                        $colorData['product_color'] = $product_color[$c];
                        $this->db->insert('product_color',$colorData);
                    }
                }

                if(isset($_FILES['product_image']['name']) && !empty($_FILES['product_image']['name'])){
                    // print_r($_FILES['product_image']); die;
                    $image_name = $this->upload_multiple('product_image',$path);
                    // print_r($image_name); die;
                    for ($i=0; $i < count($image_name); $i++) {
                        $imageData = [
                            'product_id' => $id,
                            'product_image' => $image_name[$i],
                        ];
                        $this->db->insert('product_image',$imageData);
                    }
                }
                
                redirect('catlog/product','refresh');
            }

            else
            {
                $this->session->set_flashdata('fail', 'Category can not be Inserted.');
                redirect("catlog/product",'refresh');
            }       
        
    }
    
    public function upload_multiple($field_name,$path){

        $this->load->library('upload');
        $files = $_FILES;
        // print_r($_FILES[$field_name]['name']); die;
        $cpt = count($_FILES[$field_name]['name']);//count for number of image files
        $image_name =array();
        for($i=0; $i<$cpt; $i++)
        {           
            $_FILES[$field_name]['name']= $files[$field_name]['name'][$i];
            $_FILES[$field_name]['type']= $files[$field_name]['type'][$i];
            $_FILES[$field_name]['tmp_name'] = $files[$field_name]['tmp_name'][$i];
            $_FILES[$field_name]['error']= $files[$field_name]['error'][$i]; 
            $_FILES[$field_name]['size'] = $files[$field_name]['size'][$i];
            
            $this->upload->initialize($this->set_upload_options($path));

            $this->upload->do_upload($field_name);  
    
            $data = array('upload_data' => $this->upload->data()); 
            // $error =  $this->upload->display_errors();
            // echo '<pre>'; print_r($error); die;

            $image_name[]=$data['upload_data']['file_name'];
            //store file name into array
    
        }
        return $image_name;//all images name which is uploaded
    }


    public function set_upload_options($path)
    {   
        $config = array();
        $config['upload_path'] = $path;
        $config['allowed_types'] = '*';
        $config['overwrite'] = FALSE;
        $config['encrypt_name'] = TRUE;
        return $config;
    }

    public function prd_delete($item_id)
    {
        if($this->Product_model->deleteModel($item_id)){
            $this->session->set_flashdata('success', 'Product Delete Successfully!');
            redirect('catlog/product','refresh');
        }
    }
     public function prd_cat_delete($item_id)
    {
        if($this->Product_model->deleteCatPrd($item_id)){
            $this->session->set_flashdata('success', 'Product Category Delete Successfully!');
            redirect('catlog/productcat','refresh');
        }
    }


    public function premove_image($id)
    {
        $this->db->where('product_image_id',$id);
        if($this->db->delete('product_image')){
            echo 'success';
        }
    }
    public function getsubsubCategory($sub_cat_id)
    {
        $tableData = $this->db->get_where('pr_sub_sub_category',array('SUB_CATEGORY_ID'=>$sub_cat_id))->result();
        $htm = '';
        $htm .= '<option value="">Select</option>';

        foreach ($tableData as $item){
            $htm .= '<option value="'.$item->SUB_SUB_CATEGORY_ID.'">';
            $htm .= $item->SUB_SUB_CATEGORY_NAME;
            $htm .= '</option>';
        }

//      $cat_id = $_REQUEST['cat_id'];
        echo $htm;
    }
	
	
}
	
	 