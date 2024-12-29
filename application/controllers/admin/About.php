<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About extends MY_Controller {

	public function __construct(){
				
			parent::__construct();
	}

	public function index(){
        
		$data["team"] = $this->db->order_by("sorting_order","asc")->get_where("tbl_team",array("deleted"=> 0))->result();
		$this->load->view('admin/abouts/team', $data);	
		
	}
	
	public function sort_order(){

		$module_id = $this->input->post("module_id");
		$sort = $this->input->post("sort");
		
		foreach($module_id as $k => $mid){
			
			$this->db->where("id",$mid)->update("tbl_team",["sorting_order"=>$sort[$k]]);
			
		}
		
	}

    public function create(){
     
        $image_id = $this->input->post("image_id");
        $name = $this->input->post("name");
		$designation = $this->input->post("designation");
        $short_desc = $this->input->post("short_desc");
        $long_desc = $this->input->post("long_desc");
        $linkdin_acc = $this->input->post("linkdin");
        $date = date("Y-m-d H:i:s");
        if($_FILES['image']['name'] != ""){
			$config['upload_path'] = 'uploads/team/';
			$config['allowed_types'] = '*';
			$config['file_name'] = $_FILES['image']['name'];				 

			$this->load->library('upload',$config);
			$this->upload->initialize($config);

			if($this->upload->do_upload('image')){
				$uploadData = $this->upload->data();
				$picture = 'uploads/team/'.$uploadData['file_name'];
				
				if($image_id){
					
					unlink($this->input->post("old_image"));
						
				}
			}else{
				
				if($image_id){
			
					$picture = $this->input->post("old_image");

				}else{

					$picture = '';
						
				}
				
			}
		}
        $data = array(
            "image" => $picture,
			"name"=>$name,
			"designation"=> $designation,
			"short_desc" => $short_desc,
            "long_desc" => $long_desc,
            "linkdin_acc" => $linkdin_acc,
            "created_date"=> $date,
			"advisor"=> $this->input->post("advisor"),
        );
       
        if($image_id){
			$d = $this->db->where("id",$image_id)->update("tbl_team",$data);	
		}else{
			$d = $this->db->insert("tbl_team",$data);
		}
        if($d){
			if($image_id){
				$this->alert->pnotify("success",'Updated Successfully');
			}else{
				$this->alert->pnotify("success",'Added Successfully');	
			}
			redirect("admin/about");
			
		}else{
			
			$this->alert->pnotify("error",'Error Occured');	
			redirect("admin/about");
			
		}
    }
    public function edit($id){
				
        $data["team_edit"] = $this->db->get_where("tbl_team",array("id"=>$id))->row();
       
        $this->load->view("admin/abouts/edit_team",$data);
    }

    public function update(){
        $id = $this->input->post("id");
        $slider_id = $this->input->post("slider_id");
        $name = $this->input->post("name");
		$designation = $this->input->post("designation");
        $short_desc = $this->input->post("short_desc");
        $long_desc = $this->input->post("long_desc");
        $linkdin_acc = $this->input->post("linkdin");
        $date = date("Y-m-d H:i:s");
        if($_FILES['slider']['name'] != ""){
			$config['upload_path'] = 'uploads/team/';
			$config['allowed_types'] = '*';
			$config['file_name'] = $_FILES['slider']['name'];				 
           
			$this->load->library('upload',$config);
			$this->upload->initialize($config);
            
			if($this->upload->do_upload('slider')){
				$uploadData = $this->upload->data();
				$picture = 'uploads/team/'.$uploadData['file_name'];
					
					unlink($this->input->post("old_slider"));
						
				}
			}else{
			
					$picture = $this->input->post("old_slider");
				
		}
        $data = array(
            "image" => $picture,
			"name"=>$name,
			"designation"=> $designation,
			"short_desc" => $short_desc,
            "long_desc" => $long_desc,
            "linkdin_acc" => $linkdin_acc,
            "updated_date"=> $date,
			"advisor"=> $this->input->post("advisor"),
        );
        $this->db->where('id', $id);
        $s = 	$this->db->update('tbl_team', $data);
        if($s){
			$this->alert->pnotify("success"," Successfully Updated","success");
            redirect("admin/about");
        }else{
			$this->alert->pnotify("success","Error Occured While Updating ","error");
            redirect("admin/about");
        }


    }
    public function status(){
		
		$id=$this->input->post_get("id",true);
		$status = $this->input->post("status",true);
		$data=array('status'=>$status);
		$this->db->set($data);
		$this->db->where("id",$id);
		$d=$this->db->update("tbl_team");
		if($d){
			if($status=="Active"){
				$this->alert->pnotify("success",'Successfully  Enabled');
			}else{
				$this->alert->pnotify("success",'Successfully  Disabled');
			}

		}else{
			if($status=="Active"){

				$this->alert->pnotify("error",'Error Occured While Enabling');
			}else{
				$this->alert->pnotify("error",'Error Occured While Disabling');
			}	
		}
	}
    public function del_team($id){
		
		$d = $this->db->delete("tbl_team",["id"=>$id]);
		
		if($d){
			
			unlink($this->input->post("slider"));
			$this->alert->pnotify("success",'Deleted Successfully');	
            redirect("admin/podcast");
			
		}else{
			
			$this->alert->pnotify("error",'Error Occured');	
			redirect("admin/podcast");
			
		}
		
	}


	//the Storys///

	public function story(){
		$data["story"] = $this->db->get_where("tbl_stories",array("deleted"=> 0))->result();
		$this->load->view("admin/abouts/story",$data);
	}
	public function stroty_add(){
     
        $story_image_id = $this->input->post("image_id");
        $title = $this->input->post("text-file");
		$year = $this->input->post("year");
        $date = date("Y-m-d H:i:s");
        if($_FILES['story_image']['name'] != ""){
			$config['upload_path'] = 'uploads/story/';
			$config['allowed_types'] = '*';
			$config['file_name'] = $_FILES['story_image']['name'];				 

			$this->load->library('upload',$config);
			$this->upload->initialize($config);

			if($this->upload->do_upload('story_image')){
				$uploadData = $this->upload->data();
				$picture = 'uploads/story/'.$uploadData['file_name'];
			}
		}
		
        $data = array(
            "image" => $picture,
			"text"=>$title,
			"year"=> $year,
            "created_date"=> $date,
			
        );
	
			$d = $this->db->insert("tbl_stories",$data);
	
        if($d){
			$this->alert->pnotify("success",'Added Successfully');	
	
			redirect("admin/about/story");
			
		}else{
			
			$this->alert->pnotify("error",'Error Occured');	
			redirect("admin/about/story");
			
		}
    }
	public function stroty_edit($id){
				
        $data["story_edit"] = $this->db->get_where("tbl_stories",array("id"=>$id))->row();
       
        $this->load->view("admin/abouts/edit_story",$data);
    }

	public function story_update(){
		
		$id = $this->input->post("id");
	
        $title = $this->input->post("text-file");
		$year = $this->input->post("year");
        $date = date("Y-m-d H:i:s");
		
		if($_FILES['story_image']['name'] != ""){
			$config['upload_path'] = 'uploads/team/';
			$config['allowed_types'] = '*';
			$config['file_name'] = $_FILES['story_image']['name'];				 
           
			$this->load->library('upload',$config);
			$this->upload->initialize($config);
            
			if($this->upload->do_upload('story_image')){
				$uploadData = $this->upload->data();
				$picture = 'uploads/team/'.$uploadData['file_name'];

					unlink($this->input->post("old_story_image"));
				
			}
			
		}else{

		      $picture = $this->input->post("old_story_image");
		}
	
		$data = array(
            "image" => $picture,
			"text"=>$title,
			"year"=> $year,
            "updated_date"=> $date,
			
        );
	
		$this->db->where('id', $id);
        $s = 	$this->db->update('tbl_stories', $data);
	
        if($s){
            $this->alert->pnotify("success"," Successfully Updated","success");
			redirect("admin/about/story");
        }else{
            $this->alert->pnotify("error","Error Occured While Updating ","error");
            redirect("admin/about/story");
        }
	}
	public function story_status(){
		
		$id=$this->input->post_get("id",true);
		$status = $this->input->post("status",true);
		$data=array('status'=>$status);
		$this->db->set($data);
		$this->db->where("id",$id);
		$d=$this->db->update("tbl_stories");
		if($d){
			if($status=="Active"){
				$this->alert->pnotify("success",'Successfully  Enabled');
			}else{
				$this->alert->pnotify("success",'Successfully  Disabled');
			}
		}else{
			if($status=="Active"){
				$this->alert->pnotify("error",'Error Occured While Enabling');
			}else{
				$this->alert->pnotify("error",'Error Occured While Disabling');
				
			}	
		}
	}
	public function del_story($id){
		
		$d = $this->db->delete("tbl_stories",["id"=>$id]);
		
		if($d){
			
			unlink($this->input->post("story_image"));
			$this->alert->pnotify("success",'Deleted Successfully');	
			redirect("admin/about/story");
			
		}else{
			
			$this->alert->pnotify("error",'Error Occured');	
			redirect("admin/about/story");
			
		}
		
	}
}