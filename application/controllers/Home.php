<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct(){
	   parent::__construct();
	}

	/*public function index(){
		$menus = $this->db->get_where("tbl_menu",["status"=>"Active", "menu_type" => "header"])->result(); 
		$data["publications"] = $this->db->get_where("tb_publications",array("status"=> "active","deleted"=> 0))->result();
		$data["solutions"] = $this->db->get_where("tbl_solutions",array("deleted"=> 0))->result();
		$data["sol_right"] = $this->db->get_where("tbl_solutions",array("alignment"=> "right"))->result();
		$this->load->view("front/home",$data);

	}*/
	
	public function index($route=""){
	
		if($route == ""){
			$route = "home";
		}
		$data["page"] = $this->db->get_where("tbl_pages",array("route"=>$route))->row();
		
		if($data["page"]){
			$this->load->view("front/includes/header",$data);
			
			if($route == "home"){
			    $this->load->view("front/includes/home_page_banner");	
			}
			$this->load->view('admin/pages/viewPage',$data);
			$this->load->view("front/includes/footer");	
		}else{
			redirect();
		}
	}
	
	/*Added by Raja Sekhar*/
	public function career(){
// 		$data['jobs'] = $this->db->order_by("sno","desc")->get_where("jobs",["status"=>"Active"])->result();
		$data = [];
		$this->load->view("front/jobs", $data);
	}
	
	public function get_jobs(){
		$jobs = $this->db->order_by("sno","desc")->get_where("jobs",["status"=>"Active","deleted"=>"0"])->result();
		echo json_encode($jobs);
	}
	
	public function search_jobs(){
	
			$pdata = $this->input->post();
			$this->db->like("title",$pdata['keywords']);
			$this->db->like("location",$pdata['location']);
			if($pdata['type'] == ''){
	
			}else{
				$this->db->where("type",$pdata['type']);
			}
			$this->db->order_by("sno","desc");
			$data['jobs'] = $this->db->get_where("jobs",["status"=>"Active","deleted"=>"0"])->result();
			echo json_encode($data['jobs']);
			
	}

public function apply_job(){
		$data = $this->input->post();
		$this->db->where(["email"=>$data['email'],"jobid"=>$data['jobid']]);
		$sql = $this->db->get("jobs_resumes")->result();

		if(!(count($sql) > 0)){
			$ext = pathinfo($_FILES['resume']['name'], PATHINFO_EXTENSION);
			if($ext == 'pdf' || $ext == 'doc' || $ext == 'docx'){
				$file = date("Ymdhis", time()).".".$ext;
				$target = "uploads/jobs/";
				$n=move_uploaded_file($_FILES['resume']['tmp_name'], $target.$file);
				$data['resume'] = $file;
				$data['applied'] = date("Y-m-d h:i:s A", time());
				$this->db->insert("jobs_resumes", $data);
				$this->load->model("admin");
				
			$jid = $data['jobid'];
			$row1 = $this->db->get_where("jobs",["sno"=>$jid])->result()[0];
			$adminemail = $row1->email;
			$asubject = "Application received for the job ".$row1->title;
			$csubject = "Proxima360 Thank you for your application.";
			$subject = "Job Application";
			$to = $data['email'];
			$from = "info@proximan360.com";
			
			$usermsg = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
			<html xmlns="http://www.w3.org/1999/xhtml">
			<head>
			<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
			<title>Welcome</title>
			<style>
			* {
				margin: 0px;
				padding: 0px;
			}
			body {
				font-family: Arial, Helvetica, sans-serif;
			}
			a {
				color: #333!important;
				font-family: Arial, Helvetica, sans-serif;
				text-decoration: none;
			}
			a:hover {
				color: #000;
			}
			
			.container {
				margin: 0px auto;
				width: 650px;
				display: block;
				overflow: hidden;
			}
			.link td a {
				color: #fff!important;
				text-decoration: none !important;
			}
			.link td a:hover {
				color: #fff!important;
			}
			p {
				padding: 0px !important;
				margin: 0px !important;
			}
			.ebord{ border-collapse: collapse;}
			
			.ebord th{ font-family:Arial, Helvetica, sans-serif; color:#041e42; font-size:15px; font-weight:600; padding:10px; border:solid 1px #eee;}
			.ebord td{ font-family:Arial, Helvetica, sans-serif; color:#041e42; font-size:15px; font-weight:500; padding:10px; border:solid 1px #eee;}
			</style>
			</head>
			
			<body>
			<div class="container" style="width:650px; border:solid 1px #ccc;">
			   <table width="650px" cellpadding="0" cellspacing="0"  style=" width:650px; overflow:hidden;">
			   <tr>
				  <td aling="center" bgcolor="#cca147" width="650px" height="5px"></td>
				</tr>
			
				<tr>
			<td><table>
			<tr>
			<td width="60px"></td>
			 <td align="left" valign="top" style="padding:15px 15px 0px 15px!important;"><p style="font-size:15px; color:#333;  padding-top:0px;"> Hello '.$data['fname'].', <br /><br />
					 Thank you for submitting your application . We appreciate your interest. <br>
					One of our team members will reach out to you in the next 24 to 48 hours, if not sooner. <br>
			
					Looking forward to connecting with you.  <br></p>
					</td>
			</tr>
			</table>
			</td>
			
			</tr>
				<tr><td>&nbsp;</td></tr>
				
				
				
				<tr><td>
			
				</td>
				</tr>
				 <tr><td>&nbsp;</td></tr>
				 <tr> <td align="left" valign="top" style="padding:15px 15px 0px 15px!important;">
			
				 <table><tr>
			<td width="60px;"></td>
			<td ><p style="font-size:15px; color:#333;  padding-top:0px;">Regards,<br/>
			
			Proxima360 </p></td>
			</tr>
			</table>
			
			</td></tr>
			 <tr><td>&nbsp;</td></tr>
				<tr>
				   <td aling="center" bgcolor="#cca147" width="650px" height="5px"></td>
				</tr>
			  </table>
			</div>
			<br>

			
			</body>
			</html>
			';

			$adminmsg = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
			<html xmlns="http://www.w3.org/1999/xhtml">
			<head>
			<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
			<title>Welcome</title>
			<style>
			* {
				margin: 0px;
				padding: 0px;
			}
			body {
				font-family: Arial, Helvetica, sans-serif;
			}
			a {
				color: #333!important;
				font-family: Arial, Helvetica, sans-serif;
				text-decoration: none;
			}
			a:hover {
				color: #000;
			}
			
			.container {
				margin: 0px auto;
				width: 650px;
				display: block;
				overflow: hidden;
			}
			.link td a {
				color: #fff!important;
				text-decoration: none !important;
			}
			.link td a:hover {
				color: #fff!important;
			}
			p {
				padding: 0px !important;
				margin: 0px !important;
			}
			.ebord{ border-collapse: collapse;}
			
			.ebord th{ font-family:Arial, Helvetica, sans-serif; color:#041e42; font-size:15px; font-weight:600; padding:10px; border:solid 1px #eee;}
			.ebord td{ font-family:Arial, Helvetica, sans-serif; color:#041e42; font-size:15px; font-weight:500; padding:10px; border:solid 1px #eee;}
			</style>
			</head>
			
			<body>
			<div class="container" style="width:650px; border:solid 1px #ccc;">
			   <table width="650px" cellpadding="0" cellspacing="0"  style=" width:650px; overflow:hidden;">
			   <tr>
				  <td aling="center" bgcolor="#cca147" width="650px" height="5px"></td>
				</tr>
			
				<tr>
			<td><table>
			<tr>
			<td width="60px"></td>
			 <td align="left" valign="top" style="padding:15px 15px 0px 15px!important;"><p style="font-size:15px; color:#333;  padding-top:0px;"> Hello, <br /><br />
					 Received an application from '.$data['fname'].'<br/><br/>for the job'.$row1->title.'
					</td>
			</tr>
			</table>
			</td>
			
			</tr>
				<tr><td>&nbsp;</td></tr>
				
				
				
				<tr><td>
			
				</td>
				</tr>
				 <tr><td>&nbsp;</td></tr>
				 <tr> <td align="left" valign="top" style="padding:15px 15px 0px 15px!important;">
			
				 <table><tr>
			<td width="60px;"></td>
			<td ><p style="font-size:15px; color:#333;  padding-top:0px;">Regards,<br/>
			
			Proxima360 </p></td>
			</tr>
			</table>
			
			</td></tr>
			 <tr><td>&nbsp;</td></tr>
				<tr>
				   <td aling="center" bgcolor="#cca147" width="650px" height="5px"></td>
				</tr>
			  </table>
			</div>
			<br>

			
			</body>
			</html>
			';
			
			$m = $this->admin->send_email_user($csubject,$from,$usermsg,$to);
			$n = $this->admin->send_email_user($asubject,$from,$adminmsg,$adminemail);
			echo json_encode(["Status"=>"Success","Message"=>"Thanks, our HR will coordinate you soon."]);
			}else{
				echo json_encode(["Status"=>"Wrong","Message"=>"Only allow pdf, doc, docx"]);
			}
		}else{
			echo json_encode(["Status"=>"Wrong","Message"=>"You already applied for this job."]);
		}
	}
	/*Added by Raja Sekhar*/

}