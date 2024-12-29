
<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Stylemanager extends CI_Controller {

	
public function __construct(){
			
	parent::__construct();

	$id = $this->session->userdata("admin_id");
	
	if($id){

	}else{

		redirect("dashboard/error_module");
		
	}
 }	

public function index(){
	
	$this->load->view("admin/stylemanager/style_manager");
	
}
	
public function updateStyle(){
	
	$style = $this->input->post("style");
	$up = file_put_contents("assets/front/style.css",$style);
	
	if($up > 0){
		
			$this->alert->pnotify("success","Styles Successfully Updated","success");
			redirect("admin/stylemanager");
	}else{
			
			$this->alert->pnotify("error","Error Occured While Updating Styles","error");
			redirect("admin/stylemanager");
	}
	
	
}
	
	
	
}