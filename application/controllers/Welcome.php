<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */

	public function __construct(){
		parent::__construct();
		$this->load->library('session');
	}
	public function index()
	{
		$this->session->set_userdata('site_lang',  "english");
		$this->lang->load('ar','arabe');
		$idUser=$this->session->userdata('id');
		$this->db->select("users.user_level,users.name,users.email");
		$this->db->from('users');
		$this->db->where('users.id',$idUser);
		$query = $this->db->get();
		$userResult=$query->result();
		//$this->lang->load('en','english');
		$data['title'] = 'Yahia MAS';
		$data['userId'] = $idUser;
		if(!empty($userResult) ){
			$userLevel=$userResult[0]->user_level;
			if(isset($userLevel) and $userLevel=='ROLE_TEACHER'){
				$userType='Teacher';

				//get id student
				$this->db->select("teachers.id");
				$this->db->from('teachers');
				$this->db->where('teachers.user_id',$idUser);
				$query = $this->db->get();
				$teacherResult= $query->result();
				$idTeacher='';
				if(!empty($teacherResult)){
					$idTeacher=$teacherResult[0]->id;
				}
				$this->db->distinct();
				$this->db->select("students.id,students.name");
				$this->db->from('students');
				$this->db->join('student_teacher_junction','student_teacher_junction.teacher_id = students.id');
				$this->db->join('teachers', 'teachers.id = student_teacher_junction.teacher_id');
				$this->db->where('teachers.id',$idTeacher);
				$query = $this->db->get();
				$studentResult= $query->result();
				$data['students_by_teacher'] = $studentResult;
				//list of exams
				/*foreach ($studentResult as $student) {
					$this->db->select();
					$this->db->from('exams');
					$this->db->where('exams.teacher_id',$teach->id);
					$query = $this->db->get();
					$examsResult= $query->result();
					$data['exams_by_student'] = $examsResult;
				}*/
			}
			if(isset($userLevel) and $userLevel=='ROLE_STUDENT'){
				$userType='Student';
				//get id student
				$this->db->select("students.id");
				$this->db->from('students');
				$this->db->join('users','students.user_id = users.id');
				$this->db->where('users.id',$idUser);
				$query = $this->db->get();
				$studentResult= $query->result();
				$idStudent='';
				if(!empty($studentResult)){
					$idStudent=$studentResult[0]->id;
				}
				$this->db->select("teachers.id,teachers.name");
				$this->db->from('teachers');
				$this->db->join('student_teacher_junction','student_teacher_junction.teacher_id = teachers.id');
				$this->db->join('students', 'students.id = student_teacher_junction.student_id');
				$this->db->where('students.id',$idStudent);
				$query = $this->db->get();
				$teacherResult= $query->result();
				$data['teachers_by_student'] = $teacherResult;

				//list of exams
				foreach ($teacherResult as $teach) {
					$this->db->select();
					$this->db->from('exams');
					$this->db->where('exams.teacher_id',$teach->id);
					$query = $this->db->get();
					$examsResult= $query->result();
					$data['exams_by_student'] = $examsResult;
				}

			}
			if(isset($userLevel) and $userLevel=='ROLE_ADMIN'){
				$userType='administrateur';
			}
			$data['user_type'] = $userType;
			$data['user_name'] = $userResult[0]->name;
			$data['user_email'] = $userResult[0]->email;
			$this->session->set_userdata('user_name',  $userResult[0]->name);
			$this->session->set_userdata('user_email',  $userResult[0]->email);
			$this->session->set_userdata('user_type_role',  $userType);
		}

		$this->load->view('index',$data);
	}
	function logout()
	{
		$user_data = $this->session->all_userdata();
		foreach ($user_data as $key => $value) {
			if ($key != 'session_id' && $key != 'ip_address' && $key != 'user_agent' && $key != 'last_activity') {
				$this->session->unset_userdata($key);
			}
		}
		$this->session->sess_destroy();
		redirect('login');
	}
	/*
		public function switchLang($language = "") {
			$this->session->set_userdata('site_lang', $language);
			header('Location: http://localhost/ci_multilingual_app/');
		}*/
}
