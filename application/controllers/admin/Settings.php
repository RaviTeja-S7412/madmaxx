<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Settings extends MY_Controller {



	public function __construct(){

				

			parent::__construct();

	}



	public function index(){

		$data['social'] = json_decode($this->db->get_where("tbl_options",["option_name"=>"social"])->row()->option_value);
		$data['contact'] = json_decode($this->db->get_where("tbl_options",["option_name"=>"contact"])->row()->option_value);
		$data['img'] = $this->db->get_where("tbl_options",["option_name"=>"image"])->row();
		$data['copy_rights'] = $this->db->get_where("tbl_options",["option_name"=>"copyright"])->row();
		$data['contact_email'] = $this->db->get_where("tbl_options",["option_name"=>"contact_email"])->row();
		$data['subscribe'] = $this->db->get_where("tbl_options",["option_name"=>"subscribers_email"])->row();
		$data['like_our_solutions'] = $this->db->get_where("tbl_options",["option_name"=>"like_our_solutions"])->row();
		$this->load->view('admin/settings',$data);	
	}
	public function updatecontact(){
		$data = [
			"mobile_number"=>$this->input->post("mobile"),
			"email"=>$this->input->post("email"),
			"details"=>$this->input->post("details"),
		];
		$this->db->where("id",2)->update("tbl_options",["option_value"=>json_encode($data)]);
		$this->alert->pnotify("success"," Successfully Updated","success");
		$data1=["Status"=>'Active',"Message"=>"Successfully Updated."];
		echo json_encode($data1);
		exit();
	}
	public function updatecontact_email(){
        $this->db->where("id",12)->update("tbl_options",["option_value"=> $this->input->post("contact_email"),"option_name" => "contact_email",]);
		$this->alert->pnotify("success"," Successfully Updated","success");
		$data1=["Status"=>'Active',"Message"=>"Successfully Updated."];
		echo json_encode($data1);
	}
	public function updatsocial_links(){
	$data = [
		"facebook"=>$this->input->post("facebook"),
		"instagram"=>$this->input->post("instagram"),
		"linkedin"=>$this->input->post("linkedin"),
		"twitter"=>$this->input->post("twitter"),
	];
	$this->db->where("id",1)->update("tbl_options",["option_value"=>json_encode($data)]);
	$this->alert->pnotify("success"," Successfully Updated","success");
	$data1=["Status"=>'Active',"Message"=>"Successfully Updated."];
	echo json_encode($data1);
	exit();
}
	public function imageupload(){
		$image_id = $this->input->post("image_id");
		if($_FILES['image']['name'] != ""){
			$config['upload_path'] = 'uploads/';
			$config['allowed_types'] = '*';
			$config['file_name'] = $_FILES['image']['name'];				 
			$this->load->library('upload',$config);
			$this->upload->initialize($config);
			if($this->upload->do_upload('image')){
				$uploadData = $this->upload->data();
				$picture = $uploadData['file_name'];
					unlink($this->input->post("old_image"));
				}
			}else{
					$picture = "logo2.png";
		    }
		$data = array(
			"option_value" => $picture,
			"option_name" => "image"
		);
		
		$d = $this->db->where("option_name","image")->update("tbl_options",["option_value" => $picture]);	
		if($d){
			$this->alert->pnotify("success"," Successfully Updated","success");
			redirect("admin/settings");
		}else{
			$this->alert->pnotify("success"," Successfully Updated","success");
			redirect("admin/settings");
		}
	}
	public function updatecopy_rights(){
		// $copy_rights = $this->input->post("copy_rights");
		// $data = array(
		// 	"option_value" => $copy_rights,
		// 	"option_name" => "copyright",
		// );
        $this->db->where("id",6)->update("tbl_options",["option_value"=> $this->input->post("copy_rights"),"option_name" => "copyright",]);
		$this->alert->pnotify("success"," Successfully Updated","success");
		redirect("admin/settings");
	}
	public function updatesubscribers_email(){
        $this->db->where("id",13)->update("tbl_options",["option_value"=> $this->input->post("subscribers_email"),"option_name" => "subscribers_email",]);
		$this->alert->pnotify("success"," Successfully Updated","success");
		$data1=["Status"=>'Active',"Message"=>"Successfully Updated."];
		echo json_encode($data1);
	}
	public function like_our_solutions(){
        $this->db->where("id",13)->update("tbl_options",["option_value"=> $this->input->post("like_our_solutions"),"option_name" => "like_our_solutions",]);
		$this->alert->pnotify("success"," Successfully Updated","success");
		redirect("admin/settings");

	}

	

}