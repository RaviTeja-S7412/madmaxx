<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {

public function __construct(){
			
   parent::__construct();

}

public function index(){
	//echo "Welcome proxima";
	//$this->db->delete("fdm_va_otp",array("user_id"=>$this->session->userdata("admin_id")));
	$this->load->view("admin/dashboard");

}



public function updateProfile(){

	$this->load->view("admin/profile");
}

public function editProfile(){
if($this->session->userdata("admin_id")){
	$id = $this->session->userdata("admin_id");
	$aname = $this->input->post("admin_name",true);
	$aemail = $this->input->post("admin_email",true);
	$echk = $this->db->get_where("tbl_auths",array("email"=>$aemail,"id"=>$id))->row()->email;

	if($echk==$aemail){

		$data = array("email" => $aemail);

		 $this->db->set($data);
		 $this->db->where("id",$id);
		 $this->db->update("tbl_auths");

	}else{
		$echk1 = $this->db->get_where("tbl_auths",array("email"=>$aemail))->num_rows();	
		if($echk1>=1){
			$this->alert->pnotify("error","Email Already Registered","error");
			redirect("admin/dashboard/updateProfile");
		}else{	
		$data = array("email" => $aemail);

		 $this->db->set($data);
		 $this->db->where("id",$id);
		 $this->db->update("tbl_auths");
		}
	}
if($_FILES['profile_pic']['size']!='0'){
		    $ea = $this->db->get_where("tbl_auths",array("id"=>$id))->row();
					$name = $ea->emp_id;
	                $ext = explode('.', $_FILES['profile_pic']['name']);
	
	                $filename = $name . '.' . "jpg";

	
	$allowed_image_extension = array(
        "png",
        "jpg",
        "jpeg"
    );
    
    // Get image file extension
    $file_extension = pathinfo($_FILES["profile_pic"]["name"], PATHINFO_EXTENSION);
   
    if (!in_array($file_extension, $allowed_image_extension)) {
        $this->alert->pnotify("error","Please Select Valid Image Format","error");
		redirect("admin/dashboard/updateProfile");	
	}else{
		$destination = 'uploads/admin/profile/' . $filename; //change this directory
	    $location = $_FILES["profile_pic"]["tmp_name"];
	    move_uploaded_file($location, $destination);
	}
}

	$data = array("name"=>$aname);
	$this->db->set($data);
	$this->db->where("id",$id);
	$au = $this->db->update("tbl_auths");

	if($au){
		$this->alert->pnotify("success","Profile Successfully Updated","success");
		redirect("admin/dashboard/updateProfile");
	}else{
		$this->alert->pnotify("error","Error Occured While Updating Profile","error");
		redirect("admin/dashboard/updateProfile");
	}

}

}


public function changePassword(){

	$opass = $this->input->post("opass",true);
	$npass = $this->input->post("npass",true);
	$cpass = $this->input->post("cpass",true);

	$aid = $this->session->userdata("admin_id");


		$a = $this->db->get_where("tbl_auths",array("id"=>$aid))->row();
		$op = $this->secure->decrypt($a->password);

		if($opass==$op){

			if($npass!=$cpass){
				$this->alert->pnotify("error","Passwords Do Not Match","error");
				redirect("admin/dashboard/updateProfile");
			}
			$data = array("password"=>$this->secure->encrypt($npass));
			$this->db->set($data);
			$this->db->where("id",$aid);
			$pp = $this->db->update("tbl_auths");
			if($pp){
				$this->alert->pnotify("success","Password Successfully Updated","success");
				redirect("admin/dashboard/updateProfile");
			}else{
				$this->alert->pnotify("error","Error Occured While Updating Your Password Please Try Again","error");
				redirect("admin/dashboard/updateProfile");
			}

		}else{
			$this->alert->pnotify("error","Please Enter Old Password Correctly","error");
			redirect("admin/dashboard/updateProfile");
		}
	}
	// elseif($uid){
	// 	$u = $this->db->get_where("fdm_va_users",array("id"=>$uid))->row();
	// 	$opp = $this->secure->decrypt($u->user_password);

	// 	if($opass==$opp){

	// 		if($npass!=$cpass){
	// 			$this->alert->pnotify("error","Passwords Do Not Match","error");
	// 			redirect("admin/profile");
	// 		}
	// 		$data1 = array("user_password"=>$this->secure->encrypt($npass));
	// 		$this->db->set($data1);
	// 		$this->db->where("id",$uid);
	// 		$pp = $this->db->update("fdm_va_users");
	// 		if($pp){
	// 			$this->alert->pnotify("success","Password Successfully Updated","success");
	// 			redirect("admin/profile");
	// 		}else{
	// 			$this->alert->pnotify("error","Error Occured While Updating Your Password Please Try Again","error");
	// 			redirect("admin/profile");
	// 		}

	// 	}else{
	// 		$this->alert->pnotify("error","Please Enter Old Password Correctly","error");
	// 		redirect("admin/profile");
	// 	}


	// }

//}

public function logout(){
		$this->session->sess_destroy();
		redirect("login");
}	

public function error_module(){

	$this->load->view("error-404");
}
	
public function getLatlon(){
	
$data = $this->input->post("id");
	
//print_r($data);
//	
//exit();	

$cou = array();
$i = 0;	
	
	foreach($data as $c){
		
		$lChkc = $this->db->get_where("countrylist",array("countryName"=>$c['0']))->num_rows();
		
		if($lChkc >= 1){
			$lChk = $this->db->get_where("countrylist",array("countryName"=>$c['0']))->row();
		
				if($lChk->lat != ""){

					$lat=$lChk->lat;
					$lon=$lChk->lon;
				      

					$n['lat'] = $lat;
					$n['lon'] = $lon;

					$n['name'] = $c['0'] . ":" . $c['1'];

			//		$n['style'] = "{"."fill" . ":" . "#40c4ff"."}";

					$cou[$i] = $n;
					$i++;
				}
		}
	}
	
	
	$json = (json_encode($cou));
	
//	$js = preg_replace('/"([^"]+)"\s*:\s*/', '$1:', $json);
	
//	$array_final = preg_replace('/"([a-zA-Z_]+[a-zA-Z0-9_]*)":/','$1:',$json);
	
//	$js =str_replace('"', '', $json);
	
//	$jsd = json_decode($json);
	
	echo($json);
	
	
}	
	

}