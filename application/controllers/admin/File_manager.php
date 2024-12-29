<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class File_manager extends MY_Controller {
	
	public function __construct(){

		parent::__construct();
		
  	}
	
	 public function index(){

		 $this->load->view("admin/file_manager/file_manager");

	 }
	
	
	public function insertImages(){

		$cdate = date("Y-m-d");
		$created_by = $this->session->userdata("admin_id");

		sleep(3);
		
		$uimages = [];
		
		if($_FILES["files"]["name"] != '')
		  {
		   $output = '';
		   $config["upload_path"] = 'uploads/gallery/';
		   $config["allowed_types"] = '*';

		   //$config["encrypt_name"] = TRUE;   
		   $this->load->library('upload', $config);
		   $this->upload->initialize($config);
		   for($count = 0; $count<count($_FILES["files"]["name"]); $count++)
		   {
			$_FILES["file"]["name"] = $_FILES["files"]["name"][$count];
			$_FILES["file"]["type"] = $_FILES["files"]["type"][$count];
			$_FILES["file"]["tmp_name"] = $_FILES["files"]["tmp_name"][$count];
			$_FILES["file"]["error"] = $_FILES["files"]["error"][$count];
			$_FILES["file"]["size"] = $_FILES["files"]["size"][$count];
			if($this->upload->do_upload('file'))
			{
			 $data = $this->upload->data();
			 $url = $_SERVER["HTTP_HOST"];
			 $protocol = isset($_SERVER["HTTPS"]) ? 'https' : 'http';

			 $output .= '
			 <div class="col-md-3">
			  <img src="uploads/gallery/'.$data["file_name"].'" class="img-responsive" style="height: 300px; width: 100%"/>
			 </div>
			 ';
				$imgname = 'uploads/gallery/'.$data["file_name"];
				$uimages[] = base_url().'uploads/gallery/'.$data["file_name"];

			 $data1 = array("img_name"=>$imgname,"created_by"=>$created_by,"created_date"=>$cdate);  	
			 $up = $this->db->insert("tbl_gallery",$data1);

			}
		   }
//		   echo $output;   
		  }
		
		echo json_encode(["data"=>$uimages]);

	}	
	
	public function updateImg(){

	   $id = $this->input->post_get("id",true);
	   $ia = $this->db->get_where("tbl_gallery",array("id"=>$id))->row();

	   if($ia->deleted==0){
		   $data = array("status"=>"Inactive","deleted"=>1,"updated_by"=>$this->session->userdata("admin_id"));
		   $this->db->set($data);
		   $this->db->where("id",$id);
		   $up = $this->db->update("tbl_gallery");
		   if($up){
				echo 1;
		   }else{
				echo 0;
		   }
	   }elseif($ia->deleted==1){

		   $data = array("status"=>"Active","deleted"=>0,"updated_by"=>$this->session->userdata("admin_id"));
		   $this->db->set($data);
		   $this->db->where("id",$id);
		   $up = $this->db->update("tbl_gallery");
		   if($up){
				echo 2;
		   }else{
				echo 0;
		   }


	   }
	}

	public function delImg(){

		$url = $_SERVER["HTTP_HOST"];
		$id = $this->input->post_get("id",true);

		$di = $this->db->get_where("tbl_gallery",array("id"=>$id))->row();
		if($di->img_name){

			$del = unlink($di->img_name);

			if($del){
				$d = $this->db->delete("tbl_gallery",array("id"=>$id));
				if($d){
					echo 1;
				}else{
					echo 0;
				}
			}
		}

	}
	
	
	public function getPdflink(){

	   $id = $this->input->post_get("id",true);
	   $ia = $this->db->get_where("tbl_gallery",array("id"=>$id))->row();

	   if($ia){

		echo $ia->img_name;
		exit();

	   }else{

		   echo 0;
	   }	

	}	
	
	
}