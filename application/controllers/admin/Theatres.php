<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Theatres extends MY_Controller {

	public function __construct(){
				
			parent::__construct();
	}

	public function index(){
		$solution = $this->db->query("SELECT * FROM tbl_solutions WHERE type != 'heading'")->result();
        $data["solutions"] = $this->db->get_where("tbl_solutions",array("deleted"=> 0))->result();
		$this->load->view('admin/theatres/theatres',$data);	
		
	}

	public function createTheatre(){
		$this->load->view('admin/theatres/crud');	
	}
	
	public function list_new(){
        $data["subscribe"] = $this->db->get_where("tbl_subscribers")->result();
		$this->load->view('admin/solutions_list',$data);	

     } 
     public function del_sub($id){
		$d = $this->db->delete("tbl_subscribers",["id"=>$id]);
		
		if($d){
			
			unlink($this->input->post("email"));
			$this->alert->pnotify("smsg",'Deleted Successfully');	
			redirect("admin/solutions/list_new");	
			
		}else{
			
			$this->alert->pnotify("emsg",'Error Occured');	
			redirect("admin/solutions/list_new");	
			
		}
		
	
	}


    public function add(){
		$text_area = $this->input->post("text_area",true);
		$link = $this->input->post("link",true);
		$date = date("Y-m-d H:i:s");
		$alignment = $this->input->post("alignment");
		$type = $this->input->post("type");
		$short_desc = $this->input->post("short_desc");
        $image_id = $this->input->post("image_id");
		
		if($_FILES['image']['name'] != ""){
			$config['upload_path'] = 'uploads/solutions/';
			$config['allowed_types'] = '*';
			$config['file_name'] = $_FILES['image']['name'];				 

			$this->load->library('upload',$config);
			$this->upload->initialize($config);
          
			if($this->upload->do_upload('image')){
				$uploadData = $this->upload->data();
				$picture = 'uploads/solutions/'.$uploadData['file_name'];
			}
		}else{
			$picture = "";
		}
     
		$data = array(
            "image" => $picture,
			"title"=>$text_area,
			"alignment"=> $alignment,
			"link" => $link,
			"type" => $type,
			"short_desc" => $short_desc,
            "created_date"=> $date,
			
        );
		$p = $this->db->insert("tbl_solutions",$data);
			
			if($p){
				$this->alert->pnotify("success"," Successfully Added","success");
					redirect("admin/solutions");
			}else{
				$this->alert->pnotify("error","Error Occured ","error");
					redirect("admin/solutions");
			}
	}
    public function update($id){
				
        $data["sul"] = $this->db->get_where("tbl_solutions",array("id"=>$id))->row();
       
        $this->load->view("admin/solutions/edit_solutions",$data);
    }



    public function edit(){
        $id = $this->input->post("id");
		$text_area = $this->input->post("text_area",true);
		$link = $this->input->post("link",true);
		$date = date("Y-m-d H:i:s");
		$alignment = $this->input->post("alignment");
		$type = $this->input->post("type");
		$short_desc = $this->input->post("short_desc");
        $image_id = $this->input->post("image_id");
		
		if($_FILES['image']['name'] != ""){
			$config['upload_path'] = 'uploads/solutions/';
			$config['allowed_types'] = '*';
			$config['file_name'] = $_FILES['image']['name'];				 

			$this->load->library('upload',$config);
			$this->upload->initialize($config);
          
			if($this->upload->do_upload('image')){
				$uploadData = $this->upload->data();
				$picture = 'uploads/solutions/'.$uploadData['file_name'];
					unlink($this->input->post("old_image"));
						
			}
		}else{
				
					$picture = $this->input->post("old_image");
		}
    
		$data = array(
				"image" => $picture,
				"title"=>$text_area,
				"alignment"=> $alignment,
				"link" =>$link,
			//	"target" => $target,
				"type" => $type,
				"short_desc" => $short_desc,
                "updated_date"=> $date,
        );
		$this->db->where('id', $id);
		$s = 	$this->db->update('tbl_solutions', $data);
		if($s){
			$this->alert->pnotify("success"," Successfully Updated","success");
				redirect("admin/solutions");
		}else{
			$this->alert->pnotify("error","Error Occured While Updating ","error");
				redirect("admin/solutions");
		}
    }
    public function status(){
			
		$id=$this->input->post_get("id",true);
		$status = $this->input->post("status",true);
		$data=array('status'=>$status);
		
		$this->db->set($data);
		$this->db->where("id",$id);
		$d=$this->db->update("tbl_solutions");
		if($d){
			if($status=="Active"){
				$this->alert->pnotify("success","Successfully Enabled","success");
			}else{
				$this->alert->pnotify("success","Successfully  Disabled","success");
			}
		}else{
			if($status=="Anactive"){
				$this->alert->pnotify("error","Error Occured While Enabling ","error");
			}else{
				$this->alert->pnotify("error","Error Occured While Disabling ","error");
				
			}	
		}
	}

    public function delete($id){

		$data = array("deleted"=>1,"status"=>"Inactive");
		$this->db->set($data);
		$this->db->where("id",$id);
		$d = $this->db->update("tbl_solutions");
		if($d){
				$data = array("deleted"=>1,"status"=>"Inactive");
				$this->db->set($data);
				$this->db->where("id",$id);
				$d = $this->db->update("tbl_solutions");
				$this->alert->pnotify("success","Successfully Deleted","success");
				redirect("admin/solutions");
		}else{
			$this->alert->pnotify("error","Error Occured While Deleting","error");
				redirect("admin/solutions");
	}

	}
}
