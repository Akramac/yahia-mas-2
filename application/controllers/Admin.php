<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

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
		if($this->session->userdata('id'))
		{
			$this->db->where('id', $this->session->userdata('id'));
			$query = $this->db->get('users');
			$userType = $query->row()->user_level;
			if($userType!='ROLE_ADMIN'){
				$data['title'] = 'Administration';
				redirect('admin/administration',$data);
			}

		}else{
			$data['title'] = 'Yahia MAS';
			redirect('login',$data);
		}
		$this->load->library('session');
	}
	public function administration($idTeacher='')
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


		$this->db->select();
		$this->db->from('teachers');
		$query = $this->db->get();
		$teachersResult=$query->result();
		$data['listTeachersByAdmin']=$teachersResult;

		$query = $this->db->get('student_teacher_junction');
		$teacherStudentResult = $query->result();
		//$data['listTeachers']=$teacherStudentResult;
		$arrayTeachers=array();
		foreach ($teacherStudentResult as $teacher){
			$arrayTeachers[]=$teacher->teacher_id;
		}

		if($idTeacher!='' & $idTeacher!='all'){
			$this->db->select();
			$this->db->from('exams');
			$this->db->where('teacher_id', $idTeacher);
			$examByTeacherResult = $this->db->get()->result();
			$data['listExamsByAdmin']=$examByTeacherResult;
		}elseif($idTeacher=='all' or $idTeacher=='' or $idTeacher==null){
			$this->db->select();
			$this->db->from('exams');
			$this->db->where_in('teacher_id', $arrayTeachers);
			$examByTeacherResult = $this->db->get()->result();
			$data['listExamsByAdmin']=$examByTeacherResult;
		}

		$this->load->view('admin/administration',$data);
	}
}
