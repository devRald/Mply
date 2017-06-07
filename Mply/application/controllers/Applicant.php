<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Applicant extends MY_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('MY_asset');
		$this->load->model('applicant_model');
	}

	public function index()
	{
		/*$user = $this->applicant_model->login("gerry","gerry");
		$this->session->set_userdata(array("my_user"=>$user));*/
		$user = $this->session->userdata("my_user");
		$skill = $this->applicant_model->applicant_skill($user->applicant_ID);
		$this->session->set_userdata(array("my_skill"=>$skill));
		$company = $this->applicant_model->get_compatible_company($skill);
		$this->session->set_userdata(array("my_company"=>$company));
		$job = $this->applicant_model->company_skill($skill);
		$data['user_info'] = $user;
		$data['user_company'] = $company;
		$data['user_job'] = $job;
		array_push($this->assets['js'],"applicant.js"); 
		$this->load->view('header',$data);
		$this->load->view('applicant/applicant_nav');
		$this->load->view('applicant/home');
		$this->load->view('footer');
	}

	function company($id){
		$user = $this->session->userdata("my_user");
		$data['company'] = $this->session->userdata("my_company");
		$data['skills'] = $this->applicant_model->get_company_job($id,$this->session->userdata("my_skill"));
		$data['user_info'] = $user;
		array_push($this->assets['js'],"applicant.js"); 
		$this->load->view('header',$data);
		$this->load->view('applicant/applicant_nav');
		$this->load->view('applicant/view_more');
		$this->load->view('footer');	
	}

	function notification(){
		$user = $this->session->userdata("my_user");
		$data['user_info'] = $user;
		$data['noti'] = $this->applicant_model->get_noti($user->applicant_ID);
		array_push($this->assets['js'],"applicant.js"); 
		$this->load->view('header',$data);
		$this->load->view('applicant/applicant_nav');
		$this->load->view('applicant/notification');
		$this->load->view('footer');
	}

	public function sample_echo(){
		$user = $this->applicant_model->login("franco","franco");
		$skill = $this->applicant_model->applicant_skill($user->applicant_ID);
		$job = $this->applicant_model->company_skill($skill);
		echo var_dump($job);
	}

	function apply($j,$c,$comp){
		$js = $this->applicant_model->get_job_skills($j,$c);
		$count = 0;
		foreach ($this->session->userdata("my_skill") as $a) {
			foreach ($js as $j) {
				if($a['skill_ID']==$j['skill_ID']){
					$count++;
				}
			}
		}
		$app = $this->session->userdata("my_user");
		$this->applicant_model->apply_company($app->applicant_ID,$comp,$c,$count);
		redirect('/applicant');
	}
}
