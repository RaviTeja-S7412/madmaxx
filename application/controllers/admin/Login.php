<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

	public function __construct()
	{

		parent::__construct();
		// if($this->session->userdata("admin_id")){
		// 	redirect("dashboard");
		// }

	}

	public function index()
	{

		$this->load->view("admin/login");
	}


	function do_login()
	{

		$email = $this->input->post("email", true);
		$pass = $this->input->post("pass", true);

		if (empty($email)) {
			$msg = '<div class="alert alert-danger alert-dismissable"><button type = "button" class ="close" data-dismiss = "alert" aria-hidden = "true">&times;</button>Please Enter User Name</div>';
			$this->session->set_flashdata("fmsg", $msg);
			redirect("admin-login");
		}
		if (empty($pass)) {
			$msg = '<div class="alert alert-danger alert-dismissable"><button type = "button" class ="close" data-dismiss = "alert" aria-hidden = "true">&times;</button>Please Enter Password</div>';
			$this->session->set_flashdata("fmsg", $msg);
			redirect("admin-login");
		}

		$a = $this->db->get_where("tbl_auths", array("email" => $email, "deleted" => 0, "status" => "Active"))->row();


		if ($a) {

			$chk1 = $this->db->get_where("tbl_auths", array("email" => $email, "deleted" => 0, "status" => "Active"))->num_rows();
			if ($chk1 == 1) {

				$u = $this->db->get_where("tbl_auths", array("email" => $email, "deleted" => 0, "status" => "Active"))->row();
				$cpassword = $this->encryption->decrypt($u->password);

				if ($pass == $cpassword) {

					$date = date("Y-m-d H:i:s");
					$data = array("last_logged_in" => $date);

					$this->db->set($data);
					$this->db->where("id", $u->id);
					$this->db->update("tbl_auths");

					$this->session->set_userdata(array("admin_id" => $u->id, "email" => $u->email));

					$loginData = $this->agent();
					$dd = $this->db->insert("tbl_login_history", $loginData);

					redirect("admin/dashboard");
				} else {

					$msg = '<div class="alert alert-danger alert-dismissable"><button type = "button" class ="close" data-dismiss = "alert" aria-hidden = "true">&times;</button>Please Enter Correct Password</div>';
					$this->session->set_flashdata("fmsg", $msg);
					redirect("admin-login");
				}
			} else {

				$msg = '<div class="alert alert-danger alert-dismissable"><button type = "button" class ="close" data-dismiss = "alert" aria-hidden = "true">&times;</button>User Not Registered With Us Or Please Contact Administrator</div>';
				$this->session->set_flashdata("fmsg", $msg);
				redirect("admin-login");
			}
		} else {
			$msg = '<div class="alert alert-danger alert-dismissable"><button type = "button" class ="close" data-dismiss = "alert" aria-hidden = "true">&times;</button>User Not Registered With Us Or Please Contact Administrator</div>';
			$this->session->set_flashdata("fmsg", $msg);
			redirect("admin-login");
		}
	}



	public function agent()
	{
		if ($this->agent->is_browser()) {
			$data['agent'] = $this->agent->browser() . ' ' . $this->agent->version();
		} elseif ($this->agent->is_robot()) {
			$data['agent'] = $this->agent->robot();
		} elseif ($this->agent->is_mobile()) {
			$data['agent'] = $this->agent->mobile();
		} else {
			$data['agent'] = 'Unidentified User Agent';
		}

		$data['platform'] = $this->agent->platform();
		$data['ip_address'] = $this->input->ip_address();

		return $data;
	}
	public function logout()
	{

		$this->session->sess_destroy();
		redirect("admin-login");
	}
}