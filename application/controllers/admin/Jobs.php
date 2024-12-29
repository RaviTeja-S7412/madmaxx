<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jobs extends CI_Controller {

	public function __construct(){
		parent::__construct();		
	}

	public function index(){
        $data['title'] = 'Proxima | Jobs';
        // $data['jobs'] = $this->db->order_by("sno","desc")->get_where("jobs",['deleted'=>'0'])->result();
        // $data['jobs'] = $this->db->query("select *, COUNT(jobs_resumes.jobid) AS Total from jobs right join jobs_resumes ON jobs.sno = jobs_resumes.jobid group by jobs.sno")->result(); 

        $this->db->select("*, jobs.status as status, jobs.location as location, COUNT(jobs_resumes.jobid) AS Total");
        $this->db->from("jobs");
        $this->db->join('jobs_resumes','jobs_resumes.jobid = jobs.sno','left');
        $this->db->where("jobs.deleted","0");
        $this->db->group_by("jobs.sno", "asc");
        $this->db->order_by("jobs.sno", "desc");
        $query = $this->db->get();
        $data['jobs'] = $query->result();
        // echo "<pre>";
        // print_r($data['jobs']);
        // exit;
		$this->load->view("admin/jobs/jobs", $data);
	}

    public function add_job(){
        $data['title'] = 'Proxima | Add Job';
        $this->load->view("admin/jobs/add_job", $data);
    }

    public function jobById($id){
        $data['id']=$id;
        $data['applications']= $this->db->order_by("id","desc")->get_where("jobs_resumes", ["jobid"=>$id])->result();
        $this->load->view("admin/jobs/jobById", $data);
    }

    public function insert(){
        $data = $this->input->post();
        $data['created'] =  date("Y-m-d h:i:s A", time());
        $data['created_by'] =  $this->session->userdata("email");
        $this->db->insert('jobs', $data);
        echo json_encode(array("Status"=>"Success","Message"=>"Successfully Inserted"));
    }

    public function update($id){
        $data = $this->input->post();
        $this->db->where("sno",$id);
        $this->db->update('jobs', $data);
        echo json_encode(array("Status"=>"Success","Message"=>"Successfully Updated"));
    }

    public function del_job($id){
        $data = ["deleted"=>"1"];
        $this->db->where("sno",$id);
        $this->db->update('jobs', $data);
        echo json_encode(array("Status"=>"Success","Message"=>"Successfully Deleted"));
    }

public function del_resume($id){
        $this->db->where("id",$id);
        $this->db->delete('jobs_resumes');
        echo json_encode(array("Status"=>"Success","Message"=>"Successfully Deleted"));
    }
    public function edit($id){
        $data['row']=$this->db->get_where('jobs', ['sno'=>$id])->row();
        $this->load->view('admin/jobs/edit', $data);
    }

}