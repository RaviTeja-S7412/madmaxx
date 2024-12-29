<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blogs extends MY_Controller {

	public function __construct(){
				
			parent::__construct();
	}

	public function index(){
     $data["blog"] = $this->db->get_where("tbl_blog",array("deleted"=> 0))->result();
		$this->load->view('admin/blogs/blog',$data);	
		
	}
	private function clean($string) {
        $string = str_replace(" ", "-", $string); // Replaces all spaces with hyphens.  
        $string = preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
        return preg_replace('/-+/', '-', $string); // Replaces multiple hyphens with single one.
    }
	public function add_edit_team($id="")
	{
		$data['bolg_edit'] = $this->db->get_where("tbl_blog",array("id"=>$id))->row();
		$data["blog"] = $this->db->get_where("tbl_blog",array("deleted"=> 0))->result();
		$this->load->view('admin/blogs/blog',$data);	
	}
    public function create(){
		
		$image_id = $this->input->post("image_id");
		$inner_image_id = $this->input->post("inner_image_id");
		$sid = $this->input->post("id");
		$title = $this->input->post("title");
		$category = $this->input->post("category");
		$posted_by = $this->input->post("posted_by");
		$short_desc = $this->input->post("short_desc");
		$long_desc = $this->input->post("long_desc");
			if($_FILES['image']['name'] != ""){
				$config['upload_path'] = 'uploads/blog/';
				$config['allowed_types'] = '*';
				$config['file_name'] = $_FILES['image']['name'];				 
				$this->load->library('upload',$config);
				$this->upload->initialize($config);
				if($this->upload->do_upload('image')){
					$uploadData = $this->upload->data();
					$picture = 'uploads/blog/'.$uploadData['file_name'];
					unlink($this->input->post("old_image"));
				}
			}else{
					$picture = $this->input->post("old_image");
			}
			if($_FILES['inner_image']['name'] != ""){
				$config1['upload_path'] = 'uploads/blog/';
				$config1['allowed_types'] = '*';
				$config1['file_name'] = $_FILES['inner_image']['name'];				 
				$this->load->library('upload',$config1);
				$this->upload->initialize($config1);
				if($this->upload->do_upload('inner_image')){
					$uploadData = $this->upload->data();
					$inner_image = 'uploads/blog/'.$uploadData['file_name'];
						unlink($this->input->post("old_inner_image"));
					}
				 }else{
						$inner_image = $this->input->post("old_inner_image");
			}
		$idata = array(
			"image" => $picture,
			"blogs_inner_image" => $inner_image,
			"short_desc" => $short_desc,   
			"category" => $category,
			"long_desc" => $long_desc,
			"posted_by" => $posted_by,
			"title" => $title,
			"blog_link" =>strtolower(($this->clean($title))),
			"created_date" => date("Y-m-d H:i:s"),
			"meta_title" => $this->input->post("meta_title"),
			"meta_description" => $this->input->post("meta_description"),
			"meta_keywords" => $this->input->post("meta_keywords"),
		);
	//print_r($idata);die;
		if($sid){
			$id = $this->db->where("id",$sid)->update("tbl_blog",$idata);
		}else{
			
			$id = $this->db->insert("tbl_blog",$idata);
		}
		if($id){
			$status = ($sid) ? "Updated" : "Added";
			$this->alert->pnotify("success","Successfully $status.","Success");
			redirect("admin/blogs/");	
		}else{
			$this->alert->pnotify("error","Error occured","error");
			redirect("admin/blogs/");	
		}


	}

	public function blog_status(){
		
		$id=$this->input->post_get("id",true);
		$status = $this->input->post("status",true);
		$data=array('status'=>$status);
		$this->db->set($data);
		$this->db->where("id",$id);
		$d=$this->db->update("tbl_blog");
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
	public function publish_status(){
		
		$id=$this->input->post_get("id",true);
		$pstatus = $this->input->post("status",true);
		$data=array('publish_status'=>$pstatus);
		$this->db->set($data);
		$this->db->where("id",$id);
		$d=$this->db->update("tbl_blog");
		if($d){
			if($status== 1){
				$this->alert->pnotify("success",'Successfully status  Enabled');
			}else{
				$this->alert->pnotify("success",'Successfully  status Disabled');
			}
		}else{
			if($status== 1){
				$this->alert->pnotify("error",'Error Occured While Enabling');
			}else{
				$this->alert->pnotify("error",'Error Occured While Disabling');
				
			}	
		}
	}

    public function publish($id){
		
		$data["publish"] = $this->db->get_where("tbl_blog",array("id"=>$id))->row();
		$this->load->view("front/includes/header");
		$this->load->view('admin/blogs/publish/publish_view',$data);	
		$this->load->view("front/includes/footer");	
	}
	public function publish_view(){
	    $id= $this->input->get("id",true);
		$publish =   $this->db->get_where("tbl_blog",array("id"=>$id))->row();
		//print_r($publish);die;
			$link = str_replace(" ","-",$publish->category);
		$html='';
		$html.='<div class="post-thumb"><img src="'.$publish->blogs_inner_image.'" class="img-fluid"  alt=""></div>

	  <ul class="entry-meta">

		<li><i class="fa fa-calendar"></i>'.date('Y-m-d H:i:s',strtotime($publish->created_date)).'</li>

		<li class="item-author"> <i class="fa fa-user"></i> By '.$publish->posted_by.'</li>

		<li class="item-category"><i class="fa fa-list"></i><a href="publications?category='.$link.'" rel="tag">'.$publish->category.'</a></li>

	  </ul>

	  <div class="post-content overflow">

		<h2 class="post-title bold">'.$publish->title.'</h2>

		'.$publish->long_desc.'

	

		<br/>

		<br/>

		<!-- Share Widget Starts Here -->

		<div class="ssbats-social-share"> <span class="ssbats-social-share-label">Share on:</span>

		  <div class="ssbats-social-share-buttons"> 

		  <a href="https://www.facebook.com/sharer/sharer.php?u='.$actual_link.'" class="ssbats-share-facebook ssbats-share-popup" target="_blank"><span>facebook</span></a>

		   <a href="https://www.twitter.com/intent/tweet?url='.$actual_link.'" class="ssbats-share-twitter ssbats-share-popup" target="_blank"><span>twitter</span></a>

		    <a href="https://www.linkedin.com/shareArticle?mini=true&url='.$actual_link.'" class="ssbats-share-linkedin ssbats-share-popup" target="_blank"><span>linkedin</span></a> 

			<a href="https://www.pinterest.com/pin/create/button/" data-pin-do="buttonBookmark" data-pin-custom="true" class="ssbats-share-pinterest" target="_blank"><span>pinterest</span></a>

			 <a href="https://tumblr.com/widgets/share/tool?canonicalUrl='.$actual_link.'" class="ssbats-share-tumblr ssbats-share-popup" target="_blank"><span>tumblr</span></a> 

			 <a href="https://www.reddit.com/submit?url='.$actual_link.'" class="ssbats-share-reddit ssbats-share-popup" target="_blank"><span>reddit</span></a>

		</div>

		</div>

		

	  </div>';



		echo json_encode(["innerblogs"=>$html]);



	}






	

	
	public function del_blog($id){
		$d = $this->db->delete("tbl_blog",["id"=>$id]);
		if($d){
			unlink($this->input->post("story_image"));
			$this->alert->pnotify("success",'Deleted Successfully');	
			redirect("admin/about/story");
		}else{
			$this->alert->pnotify("error",'Error Occured');	
			redirect("admin/about/story");
			
		}
		
	}








    //categories////////////////////////////////
    public function categories(){
        $data["category"] = $this->db->get_where("tbl_categories",array("deleted"=> 0))->result();
         $this->load->view('admin/blogs/categories',$data);	
         
     }

	 public function createCategory(){
		$category = $this->input->post("categories");
		$sid = $this->input->post("tid");
		$data = array(
			"category" =>  $category,
			"created_date" => date("Y-m-d H:i:s"),
	    );
		if($sid){
			$id = $this->db->where("id",$sid)->update("tbl_categories",$data);
			
		}else{
			
			$id = $this->db->insert("tbl_categories",$data);
			
		}
		if($id){
			$status = ($sid) ? "Updated" : "Added";
			
			$this->alert->pnotify("success",'Added Successfully');
			redirect("admin/blogs/categories");	
		}else{
			$this->alert->pnotify("error",'Error Occured');	
			redirect("admin/blogs/categories");	
		}
	 }
	 public function cat_status(){
		
		$id=$this->input->post_get("id",true);
		$status = $this->input->post("status",true);
		$data=array('status'=>$status);
		$this->db->set($data);
		$this->db->where("id",$id);
		$d=$this->db->update("tbl_categories");
		if($d){
			if($status=="Active"){
				$this->alert->pnotify("success",'Successfully  Enabled');
			
			}else{
				$this->alert->pnotify("success",'Successfully  Disabled');
				
			}

		}else{
			if($status=="Active"){

				$this->alert->pnotify("error",'Error Occured While Enabling');
			
				$this->alert->pnotify("error",'Error Occured While Disabling');
				
			}	
		}
	}


	public function del_cat($id){
		$d = $this->db->delete("tbl_categories",["id"=>$id]);
		
		if($d){
			
			unlink($this->input->post("categories"));
			$this->alert->pnotify("success",'Deleted Successfully');	
			redirect("admin/blogs/categories");	
			
		}else{
			
			$this->alert->pnotify("error",'Error Occured');	
			redirect("admin/blogs/categories");	
			
		}
	
	}
	
public function insertImages(){
	
$cdate = date("Y-m-d");

//print_r($_FILES);
//	exit();
	
sleep(3);
  if($_FILES["files"]["name"] != '')
  {
	  
//   $dimgname = [];
   $config["upload_path"] = 'uploads/gallery/';
   $config["allowed_types"] = '*';	  
   //$config["encrypt_name"] = TRUE;   
   $this->load->library('upload', $config);
//   $this->upload->initialize($config);
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
	 	$dimgname = base_url().'uploads/gallery/'.$data["file_name"];
	 	$imgname = 'uploads/gallery/'.$data["file_name"];
		
	
	 $data1 = array("img_name"=>$imgname,"created_date"=>$cdate);  	
	 $up = $this->db->insert("tbl_gallery",$data1);

    }else{
//		echo $this->upload->display_errors();
	}
   }
   echo $dimgname;   
  }
	
}
	
}