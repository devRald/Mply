<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Company extends MY_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('MY_asset');
		$this->load->model('applicant_model');
	}

	public function index()
	{
		//$user = $this->applicant_model->login_c("gerald","gerald");
		//$this->session->set_userdata(array("company_info"=>$user));
		$user = $this->session->userdata("company_info");
		$data['company_info'] = $user;
		$app = $this->applicant_model->get_applicants($user->company_ID);
		$data['company_app'] = $app;
		/*$skill = $this->applicant_model->applicant_skill($user->applicant_ID);
		$this->session->set_userdata(array("my_skill"=>$skill));
		$company = $this->applicant_model->get_compatible_company($skill);
		$this->session->set_userdata(array("my_company"=>$company));
		$job = $this->applicant_model->company_skill($skill);
		$data['user_info'] = $user;
		$data['user_company'] = $company;
		$data['user_job'] = $job;*/
		array_push($this->assets['js'],"applicant.js"); 
		$this->load->view('header',$data);
		$this->load->view('company/company_nav');
		$this->load->view('company/home');
		$this->load->view('footer');
	}

	function company($id){
		$data['company'] = $this->session->userdata("my_company");
		$data['skills'] = $this->applicant_model->get_company_job($id,$this->session->userdata("my_skill"));
		array_push($this->assets['js'],"applicant.js"); 
		$this->load->view('header',$data);
		$this->load->view('applicant/applicant_nav');
		$this->load->view('applicant/view_more');
		$this->load->view('footer');	
	}

	public function sample_echo(){
		$user = $this->applicant_model->login("franco","franco");
		$skill = $this->applicant_model->applicant_skill($user->applicant_ID);
		$job = $this->applicant_model->company_skill($skill);
		echo var_dump($job);
	}

	function invite($app,$com,$job){
		$this->applicant_model->invite($app,$com,$job);
		redirect('/company/');
	}

	function uninvite($app,$com,$job){
		$this->applicant_model->uninvite($app,$com,$job);
		redirect('/company/');
	}

	function apply($j,$c){
		$js = $this->applicant_model->get_job_skills($j,$c);
		$count = 0;
		foreach ($this->session->userdata("my_skill") as $a) {
			foreach ($js as $j) {
				if($a['skill_ID']==$j['skill_ID']){
					$count++;
				}
			}
		}
		$app = $this->session->userdata("my_skill")[0]['applicant_ID'];
		$this->applicant_model->apply_company($c,$app,$j,$count);
	}
}
