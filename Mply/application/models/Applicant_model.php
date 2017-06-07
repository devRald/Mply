<?php
class Applicant_model extends CI_Model{
	public $sql;
	public $sql2;
	function __construct(){
		$this->load->database();
	}

	function applicant_skill($applicant = "1"){
		$query = $this->db->query("SELECT * FROM tbl_app_skills WHERE applicant_ID ='".$applicant."'");
		return $query->result_array();
	}
	function company_skill($skill){
		foreach ($skill as $s) {
			$this->sql .= "skill_ID = '".$s['skill_ID']."' OR "; 
		}
		$this->sql2 = substr($this->sql, 0, (strlen($this->sql)-3));
		$query = $this->db->query("SELECT DISTINCT job_title FROM tbl_jobs_skills NATURAL JOIN tbl_jobs WHERE $this->sql2");
		return $query->result_array();
	}
	function get_compatible_company($skill){
		foreach ($skill as $s) {
			$this->sql .= "skill_ID = '".$s['skill_ID']."' OR "; 
		}
		$this->sql2 = substr($this->sql, 0, (strlen($this->sql)-3));
		$query = $this->db->query("SELECT distinct tbl_company.company_ID, tbl_company.company_name,tbl_company.company_email,tbl_company.company_add FROM (tbl_jobs_skills INNER JOIN tbl_com_jobs ON tbl_jobs_skills.job_ID = tbl_com_jobs.job_ID) INNER JOIN tbl_company ON tbl_com_jobs.company_ID = tbl_company.company_ID where $this->sql2");
		return $query->result_array();
	}

	function get_company_job($c,$skill){
		foreach ($skill as $s) {
			$this->sql .= "tbl_skills.skill_ID = '".$s['skill_ID']."' OR "; 
		}
		$this->sql2 = substr($this->sql, 0, (strlen($this->sql)-3));
		$query = $this->db->query("SELECT distinct job_title, tbl_jobs.job_ID FROM (((tbl_company INNER JOIN tbl_com_jobs ON tbl_company.company_ID = tbl_com_jobs.company_ID) INNER JOIN tbl_jobs ON tbl_com_jobs.job_ID = tbl_jobs.job_ID) INNER JOIN tbl_jobs_skills ON tbl_jobs.job_ID = tbl_jobs_skills.job_ID) INNER JOIN tbl_skills ON tbl_jobs_skills.skill_ID = tbl_skills.skill_ID where ($this->sql2) AND tbl_company.company_ID = '$c'");
		return $query->result_array();
	}

	function get_job_skills($id,$c){
		$query = $this->db->query("SELECT DISTINCT tbl_skills.skill_ID, skill_title FROM ((tbl_com_jobs INNER JOIN tbl_jobs ON tbl_com_jobs.job_ID = tbl_jobs.job_ID) INNER JOIN tbl_jobs_skills ON tbl_com_jobs.job_ID = tbl_jobs_skills.job_ID) INNER JOIN tbl_skills ON tbl_jobs_skills.skill_ID = tbl_skills.skill_ID WHERE tbl_jobs_skills.job_ID ='".$id."'");
		return $query->result_array();
	}

	function apply_company($a,$c,$j,$count){
		$data = array(
        'applicant_ID' => $a,
        'company_ID' => $c,
        'job_apply' => $j,
        'com_match_skills' => $count
		);

		$this->db->insert('tbl_match', $data);
	}

	function get_compatible_applicant(){
		foreach ($skill as $s) {
			$this->sql .= "skill_ID = '".$s['skill_ID']."' OR "; 
		}
		$this->sql2 = substr($this->sql, 0, (strlen($this->sql)-3));
		$query = $this->db->query("SELECT distinct tbl_applicant.applicant_name,tbl_applicant.applicant_emailadd,tbl_applicant.applicant_address FROM (tbl_jobs_skills INNER JOIN tbl_com_jobs ON tbl_jobs_skills.job_ID = tbl_com_jobs.job_ID) INNER JOIN tbl_company ON tbl_com_jobs.company_ID = tbl_company.company_ID where $this->sql2");
		return $query->result_array();
	}
	function get_job_qualification($skill){
		foreach ($skill as $s) {
			$this->sql .= "skill_ID = '".$s['skill_ID']."' OR "; 
		}
		$this->sql2 = substr($this->sql, 0, (strlen($this->sql)-3));
		$query = $this->db->query("SELECT tbl_jobs.job_title FROM (tbl_jobs_skills INNER JOIN tbl_com_jobs ON tbl_jobs_skills.job_ID = tbl_com_jobs.job_ID) INNER JOIN tbl_company ON tbl_com_jobs.company_ID = tbl_company.company_ID where $this->sql2");
		return $query->result_array();
	}
	//examples
	function get_company(){
		$query = $this->db->query("SELECT * FROM tbl_organizer NATURAL JOIN tbl_event ORDER BY event_id DESC");
		return $query->result_array();
	}

	function login($username="gerald",$password="gerald"){
		$query = $this->db->query("SELECT * FROM tbl_applicant where applicant_username='".$username."' and applicant_password='".$password."'");
		return $query->row();
	}
	function login_u($username="gerald",$password="gerald"){
		$query = $this->db->query("SELECT * FROM tbl_applicant where applicant_username='".$username."' and applicant_password='".$password."'");
		return $query->row();
	}
	function login_c($username="gerry",$password="gerry"){
		$query = $this->db->query("SELECT * FROM tbl_company where company_username='".$username."' and company_password='".$password."'");
		return $query->row();
	}

	function get_skill($username="gerald",$password="gerald"){
		$query = $this->db->query("SELECT tbl_skill.*,tbl_applicant.fld_username,tbl_applicant.fld_password,tbl_applicant.fld_appID FROM (tbl_applicant INNER JOIN tbl_applicantskill ON tbl_applicant.fld_appID = tbl_applicantskill.fld_appskillID) INNER JOIN tbl_skill ON tbl_applicantskill.fld_skillID = tbl_skill.fld_skillID where fld_username='".$username."' and fld_password='".$password."'");
		return $query->result_array();
	}

	/*for company*/

	function get_applicants($id){

		$query = $this->db->query("select distinct tbl_applicant.*, job_title, job_ID ,is_invited from tbl_company INNER JOIN tbl_match ON tbl_company.company_ID = tbl_match.company_ID INNER JOIN tbl_applicant ON tbl_match.applicant_ID = tbl_applicant.applicant_ID INNER JOIN tbl_jobs ON tbl_match.job_apply = tbl_jobs.job_ID where tbl_company.company_ID = '$id' ORDER BY com_match_skills");
		/*$query = $this->db->query("SELECT * from tbl_company INNER JOIN tbl_com_jobs ON tbl_company.company_ID = tbl_com_jobs.company_ID INNER JOIN tbl_");*/	
		return $query->result_array();	
	}

	function invite($app,$com,$job){
		$this->db->set('is_invited', '1', FALSE);
		$this->db->where(array('applicant_ID'=>$app,'company_ID'=>$com,'job_apply'=>$job));
		$this->db->update('tbl_match');
	}

	function uninvite($app,$com,$job){
		$this->db->set('is_invited', '0', FALSE);
		$this->db->where(array('applicant_ID'=>$app,'company_ID'=>$com,'job_apply'=>$job));
		$this->db->update('tbl_match');
	}

	function get_noti($id){
		$query = $this->db->query("SELECT * FROM tbl_company INNER JOIN tbl_match ON tbl_company.company_ID = tbl_match.company_ID WHERE applicant_ID ='".$id."'");
		return $query->result_array();		
	}
}
?>