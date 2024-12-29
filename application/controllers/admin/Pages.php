<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Pages extends MY_Controller {
	public function __construct(){
			
		parent::__construct();
		
	}
	public function designPage()
	{
		$route = $this->input->get("route");
		$rchk = $this->db->get_where("tbl_pages",array("page_name"=>$route,"deleted"=>0))->num_rows();
	
		if($rchk >= 1){
			
			$this->alert->pnotify("error","Page Already Exists","error");
			redirect("admin/pages/createPage");
			
		}
		
		$this->load->view('admin/pages/index');
	}
	
	public function index(){
		
		$this->load->view("admin/pages/allPages");
	}
	
	public function createPage(){
		
		$this->load->view("admin/pages/createPage");
		
	}
	
	public function load_template($playout){
		
		$pl = $this->db->get_where("tbl_page_layout",array("status"=>"Active","deleted"=>0,"layout_name"=>$playout))->row();
		
		if($pl){
		
			echo json_encode(['gjs-html' => $pl->html, 'gjs-css' => $pl->css, 'gjs-assets' => 'null']);
		}
	}
	
	
	public function insert(){
		
		$pagename = $this->input->post("page_name");
		$route = $this->input->post("route");
		$playout = $this->input->post("playout");
		$html = $this->input->post('html');
		$css = $this->input->post('css');
		
		$route = str_replace(" ","-",strtolower($pagename));
		$data = array("html"=>$html,"css"=>$css,"page_name"=>$pagename,"route"=>$route);
		
		$p = $this->db->insert("tbl_pages",$data);
		
		if($p){
			
			$this->alert->pnotify("success","Page Created Successfully","success");

		}else{
			
			$this->alert->pnotify("error","Error Occured Please Try Again","error");
		}
	}
	
	public function editPage($id){
		
		$this->db->get_where("tbl_pages",array("id"=>$id))->row();
		$this->load->view('admin/pages/index');
		
	}
	
	public function viewPage($route){
		
		$data["page"] = $this->db->get_where("tbl_pages",array("route"=>$route))->row();
		
		$this->load->view("front/includes/header");
		$this->load->view('admin/pages/viewPage',$data);
		$this->load->view("front/includes/footer");	
		
	}
	
	public function updatePage($id){
		
		$html = $this->input->post('html');
		$css = $this->input->post('css');
		$pagename = $this->input->post("page_name");
		$route = str_replace(" ","-",strtolower($pagename));
		
		$data = array("html"=>$html,"css"=>$css,"page_name"=>$pagename,"route"=>$route);
		
		$this->db->set($data);
		$this->db->where("id",$id);
		$u = $this->db->update("tbl_pages");
		
		if($u){
			$this->alert->pnotify("success","Page Updated Successfully","success");
		}else{
			$this->alert->pnotify("error","Error Occured Please Try Again","error");
		}
	}
	
	public function load($id){
		
		$data = $this->db->get_where("tbl_pages",array("id"=>$id))->row();
		echo json_encode(['gjs-html' => $data->html, 'gjs-css' => $data->css, 'gjs-assets' => 'null']);
		
	}
	
	public function delPage($id){
		
	   $del = $this->db->where(array("id"=>$id))->update("tbl_pages",array("deleted"=>1,"status"=>"Inactive"));
		
	   if($del){
		   
		   $this->alert->pnotify("success","Page Deleted Successfully","success");
//		   redirect("grape/allPages");
	   }else{
		   
  		   $this->alert->pnotify("error","Error Occured Please Try Again","error");
//		   redirect("grape/allPages");
	   }
	}
	
	public function view($page){
		
		$data["page_name"] = $page;
		$this->load->view("pages/header",$data);
		$this->load->view("pages/$page/$page");
	}
}
