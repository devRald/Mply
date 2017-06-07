<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('MY_asset');
		$this->load->model('applicant_model');
	}

	public function index()
	{
		array_push($this->assets['js'],"home.js"); 
		$this->load->view('header');
		$this->load->view('login');
		$this->load->view('footer');
	}

	function login_user(){
		$check = $this->applicant_model->login_u($_POST['username'],$_POST['pwd']);
		if(!empty($check)){
			$user = array("user_info"=>$check);
			$this->session->set_userdata(array("my_user"=>$check));
			//$this->session->set_userdata($user);
			echo true;
		}
	}

	function login_company(){
		$check = $this->applicant_model->login_c($_POST['username'],$_POST['pwd']);
		if(!empty($check)){
			$user = array("user_info"=>$check);
			$this->session->set_userdata(array("company_info"=>$check));
			echo true;
		}
	}

	function logout_user(){
		if($this->session->has_userdata('my_user')){
			$this->session->unset_userdata('my_user');
			redirect('/home');
		}
	}

	function logout_company(){
		if($this->session->has_userdata('company_info')){
			$this->session->unset_userdata('company_info');
			redirect('/home');
		}
	}
}
