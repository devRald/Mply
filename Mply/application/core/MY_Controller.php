<?php
class MY_Controller extends CI_Controller{
	public $assets;

	function __construct(){
		parent::__construct();
		$this->assets['css']  = array("font-awesome.min.css","bootstrap.min.css","prem.mdb.min.css","style.css");
		$this->assets['js'] = array("jquery-2.2.3.min.js","tether.min.js","bootstrap.min.js","prem.mdb.min.js");
	}
}