<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Common_model extends CI_Model {

    function __construct() {
        parent::__construct();

        $this->load->database();
    }
    public function addRow($tableName, $insertData) 
    {
        $this->db->insert($tableName, $insertData);
        return $this->db->insert_id();
    }
    public function updateRow($tableName, $updateData, $whereData) 
    {
        $rk = $this->db->update($tableName, $updateData, $whereData);
       // echo $this->db->last_query(); exit;

        if ($this->db->affected_rows() > 0) 
        {

            return TRUE;
        } else {
            return FALSE;
        }
    }
    public function deleteRow($tableName, $whereData) 
    {
        return $this->db->delete($tableName, $whereData);
    }
    public function getBanners($filter = array()) 
    {
        $this->db->select('*');
        $this->db->where('status', '1'); 
        $this->db->where('CATEGORY',$filter['CATEGORY']);   
        $this->_banner = 'banner';
        $query = $this->db->get($this->_banner);
        return $query->result(); 
    }

    public function getindustryBannerData($filter = array()) 
    {
        $this->db->select('*');
        $this->db->where('status', '1'); 
        $this->db->where('CATEGORY','industry');   
        $this->_banner = 'banner';
        $query = $this->db->get($this->_banner);
        return $query->row(); 
    }
    public function getindustryPhotoFeatureData($filter = array()) 
    {
        $this->db->select('*');
        $this->db->where('status', '1'); 
        $this->db->where('CATEGORY','photofeature');   
        $this->_banner = 'banner';
        $query = $this->db->get($this->_banner);
        return $query->result(); 
    }

    public function getindexContent($filter = array()) 
    {
        $this->db->select('*');       
        $this->db->where('header',$filter['header']);   
        $this->_banner = 'indexcontent';
        $query = $this->db->get($this->_banner);
        return $query->row(); 
    }

    public function getIndustrycontent($filter = array()) 
    {
        $this->db->select('*');       
        $this->db->where('header',$filter['header']);   
        $this->_banner = 'content';
        $query = $this->db->get($this->_banner);
        return $query->row(); 
    }
    public function getEvents($filter = array()) 
    {
        $this->db->select('*');              
        $this->_events = 'events';
        $query = $this->db->get($this->_events);
        return $query->result(); 
    }
    public function getSuccessStories($filter = array()) 
    {
        $this->db->select('*');    
        $this->_successstories = 'successstories';
        $query = $this->db->get($this->_successstories);
        return $query->result(); 
    }
    public function getnewsmedia() 
    {
        $this->db->select('*');    
        $this->_news = 'news';
        $query = $this->db->get($this->_news);
        return $query->result(); 
    }

    public function getpressrelease($filter = array()) 
    {
        $this->db->select('*');   
        $this->db->where('type',$filter['type']); 
        $this->_news = 'news';
        $query = $this->db->get($this->_news);
        return $query->result(); 
    }
    public function getmfinnews($filter = array()) 
    {
        $this->db->select('*');    
        $this->db->where('type',$filter['type']);
        $this->_news = 'news';
        $query = $this->db->get($this->_news);
        return $query->result(); 
    }
    public function getawards($filter = array()) 
    {
        $this->db->select('*'); 
        $this->db->where('type',$filter['type']);     
        $this->_news = 'news';
        $query = $this->db->get($this->_news);
        return $query->result(); 
    }
    public function getPublicationData($filter = array()) 
    {
        $this->db->select('pf.*,p.name')
         ->join('publication p', 'p.publication_id = pf.publication_id', 'Left');             
        $this->_events = 'publication_file as pf';
        $query = $this->db->get($this->_events);
        return $query->result(); 
    }
    public function getPublications($filter = array()) 
    {
        $this->db->select('*');          
        $this->_publication= 'publication';
        $query = $this->db->get($this->_publication);
        return $query->result(); 
    }

    
	 
}
