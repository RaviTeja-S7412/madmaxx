<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Metadata extends MY_Controller {
	
	public function __construct(){
			
		parent::__construct();	
	}
public function index($id=""){

	$this->load->view("admin/metaData/metaData");

}
	
	

	
public function updateMeta(){
	
	$pid = $this->input->post("pid");
	$meta_title = $this->input->post("meta_title",true);
	$meta_keyword = $this->input->post("meta_keyword",true);
	$meta_description = $this->input->post("meta_description",true);
	
	$data = array("meta_title"=>$meta_title,"meta_keyword"=>$meta_keyword,"meta_description"=>$meta_description);
	
	$this->db->set($data);
	$this->db->where("id",$pid);
	$ce = $this->db->update("tbl_pages");
	
	if($ce){
	    $this->alert->pnotify("success","Meta Data Successfully Updated","success");
		redirect("admin/metadata");
    }else{
      	$this->alert->pnotify("error","Error Occured While Updating Meta Data","error");
		redirect("admin/metadata");
    }
	
}	


}
