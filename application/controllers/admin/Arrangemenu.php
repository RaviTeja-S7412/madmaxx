<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Arrangemenu extends MY_Controller {

	public function __construct(){
		parent::__construct();
	} 

	public function index()
	{
		$this->load->view('admin/menus/arrangeMenus');
	}
	public function get_submenu(){
	$id = $this->input->post("id");
		$data1 = [];
		$i=0;
		$sub = $this->db->where("menu_name",$id)->like("menu_type","Header")->where("deleted",0)->where("status","Active")->order_by("sort","asc")->get("tbl_submenu")->result_array();

			$key = 1;
            foreach($sub as $row){
                
            echo '<li class="dd-item" data-id="'.$key.'" data-mid="'.$row['id'].'">
                <div class="dd-handle">'.$row['sub_menu_name'].'</div>
            </li>';
            $key++;
			}
	
	}

	
public function get_footer_submenu(){
	$id = $this->input->post("id");
		$data1 = [];
		$i=0;
		$sub = $this->db->where("menu_name",$id)->like("menu_type","Footer")->where("deleted",0)->where("status","Active")->order_by("sort")->get("tbl_submenu")->result_array();

			$key = 1;
            foreach($sub as $row){
                
            echo '<li class="dd-item" data-id='.$key.' data-fmid='.$row['id'].'">
                <div class="dd-handle">'.$row['sub_menu_name'].'</div>
            </li>';
            $key++;
			}
	
}	
	
public function save_menu(){
	$data  = $this->input->post("mdata");
	foreach(json_decode($data) as $key => $row){
		
//		echo $row->mid."-".$row->id."--";
		$this->db->where("id",$row->mid)->update("tbl_submenu",array("sort"=>$key));
	}
}

	
public function save_footer_menu(){
	$data  = $this->input->post("fmdata");

	foreach(json_decode($data) as $key => $row){
		$this->db->where("id",$row->fmid)->update("fdm_va_navbar_footer_submenu",array("sort"=>$key));
	}
}	
	
}
