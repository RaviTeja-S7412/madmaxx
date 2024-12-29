<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Podcast extends MY_Controller {

	public function __construct(){
				
			parent::__construct();
	}

	public function index(){
        $data["slider"] = $this->db->get_where("tbl_podcast_slider",array("deleted"=> 0))->result();
		$this->load->view('admin/slider/podcast_sliders', $data);	
		
	}

    public function add(){
        $name = $this->input->post("desingnation");
		$page_name = $this->input->post("page_name");
		$types = $this->input->post("types");
		$short_desc = $this->input->post("short_desc");
		$button_name = $this->input->post("button_name");
		$link = $this->input->post("link");
		$target = $this->input->post("target");
        $date = date("Y-m-d H:i:s");
		if($_FILES['image']['name'] != ""){
			$config['upload_path'] = 'uploads/podcast/';
			$config['allowed_types'] = '*';
			$config['file_name'] = $_FILES['image']['name'];				 
			$this->load->library('upload',$config);
			$this->upload->initialize($config);
			if($this->upload->do_upload('image')){
				$uploadData = $this->upload->data();
				$picture = 'uploads/podcast/'.$uploadData['file_name'];
					//unlink($this->input->post("old_image"));
				}
	
		}
		
        $data = array(
            "image" => $picture,
			"name"=>$name,
			"type"=>$types,
			"page_name"=>$page_name,
			"button_name"=>$button_name,
			"link"=>$link,
			"target"=>$target,
			"short_desc" => $short_desc,
            "created_date"=> $date,
        );
	
			$d = $this->db->insert("tbl_podcast_slider",$data);
        if($d){
			if($d){
				$this->alert->pnotify("success",'Added Successfully');
			}else{
				$this->alert->pnotify("success",'Updated Successfully');	
			}
			redirect("admin/podcast");
			
		}else{
			
			$this->alert->pnotify("error",'Error Occured');	
			redirect("admin/podcast");
			
		}
    }
	public function edit($id){
				
        $data["slider"] = $this->db->get_where("tbl_podcast_slider",array("id"=>$id))->row();
       
        $this->load->view("admin/slider/edit_slider",$data);
    }

	public function update(){
		$id = $this->input->post("id");
		$name = $this->input->post("desingnation");
		$page_name = $this->input->post("page_name");
		$types = $this->input->post("types");
		$short_desc = $this->input->post("short_desc");
		$button_name = $this->input->post("button_name");
		$link = $this->input->post("link");
		$target = $this->input->post("target");
		$date = date("Y-m-d H:i:s");
		//image upload//

		if($_FILES['image']['name'] != ""){
			$config['upload_path'] = 'uploads/podcast/';
			$config['allowed_types'] = '*';
			$config['file_name'] = $_FILES['image']['name'];				 

			$this->load->library('upload',$config);
			$this->upload->initialize($config);
          
			if($this->upload->do_upload('image')){
				$uploadData = $this->upload->data();
				$picture = 'uploads/podcast/'.$uploadData['file_name'];
				unlink($this->input->post("old_image"));
			}
		}else{
					$picture = $this->input->post("old_image");
		}
		
				$data = array(
					"image" => $picture,
					"name"=>$name,
					"type"=>$types,
					"page_name"=>$page_name,
					"button_name"=>$button_name,
					"link"=>$link,
					"target"=>$target,
					"short_desc" => $short_desc,
					"updated_date"=> $date,
				);

        $this->db->where('id', $id);
		 $s = 	$this->db->update('tbl_podcast_slider', $data);
		 if($s){
			$this->alert->pnotify("success"," Successfully Updated","success");
			 redirect("admin/podcast");
		 }else{
			$this->alert->pnotify("error","Error Occured While Updating ","error");
			 redirect("admin/podcast");
		 }



	}



    public function status(){
		
		$id=$this->input->post_get("id",true);
		$status = $this->input->post("status",true);
		$data=array('status'=>$status);
		$this->db->set($data);
		$this->db->where("id",$id);
		$d=$this->db->update("tbl_podcast_slider");
		if($d){
			if($status=="Active"){
				echo $this->alert->pnotify("success","Successfully Navbar Sub Menu Enabled","success");
			}else{
				echo $this->alert->pnotify("success","Successfully Navbar Sub Menu Disabled","success");	
			}

		}else{
			if($status=="Active"){

				echo $this->alert->pnotify("error","Error Occured While Enabling Navbar Sub Menu","error");
			}else{
				echo $this->alert->pnotify("error","Error Occured While Disabling Navbar Sub Menu","error");
			}	
		}
	}
    public function del_slider($id){
		
		$d = $this->db->delete("tbl_podcast_slider",["id"=>$id]);
		
		if($d){
			
			//unlink($this->input->post("image"));
			$this->alert->pnotify("success",'Deleted Successfully');	
            redirect("admin/podcast");
			
		}else{
			
			$this->alert->pnotify("error",'Error Occured');	
			redirect("admin/podcast");
			
		}
		
	}
}