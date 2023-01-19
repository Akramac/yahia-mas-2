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
		$this->load->model('examModel');
		$this->load->library('form_validation');
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

		$userLevel=$userResult[0]->user_level;
		if(isset($userLevel) and $userLevel=='ROLE_ADMIN') {
			$userType = 'Administrateur';
		}
		$this->session->set_userdata('user_name',  $userResult[0]->name);
		$this->session->set_userdata('user_email',  $userResult[0]->email);
		$this->session->set_userdata('user_type_role',  $userType);

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
		$this->db->select();
		$this->db->from('categories');
		$query = $this->db->get();
		$categoriesResult= $query->result();
		$data['categories'] = $categoriesResult;
		$this->load->view('admin/administration',$data);
	}

	public function editExam($idExam='')
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
		$data['examId'] = $idExam;


		// get teachers by exam

		$this->db->distinct();
		$this->db->select("teachers.id,teachers.name");
		$this->db->from('teachers');
		$this->db->join('exams_teachers_junction','teachers.id = exams_teachers_junction.teacher_id');
		$this->db->where('exams_teachers_junction.exam_id', $idExam);
		$query = $this->db->get();
			$teacherResultByExam= $query->result();
		$arrayTeachersByExam=array();
		foreach ($teacherResultByExam as $teacher){
			$arrayTeachersByExam[]=$teacher->id;
		}
		$this->db->select();
		$this->db->from('teachers');
		if(!empty($arrayTeachersByExam)){

			$this->db->where_not_in('teachers.id', $arrayTeachersByExam);
		}
		$query = $this->db->get();
		$teachersResult=$query->result();
		$data['listTeachersByAdmin']=$teachersResult;
		$data['listTeachersByExam']=$teacherResultByExam;

		/*
		$idTeacher='';
		if(!empty($teacherResult)){
			$idTeacher=$teacherResult[0]->id;
		}*/



		$this->load->view('admin/editExam',$data);
	}

	public function updateTeachersByExam()
	{
		$this->form_validation->set_rules('exam-id', 'Exam ID', 'required');
		if($this->form_validation->run())
		{
			$idExam=$this->input->post('exam-id');
			$arrayTeachersToExam=$this->input->post('teachers-select');
			//delete junction teachers exams
			//array to string convertion
			if(isset($arrayTeachersToExam)){
				$listTeachersToExam=implode(",", $arrayTeachersToExam);
			}
			if(!empty($listTeachersToExam)){
				$query='DELETE exams_teachers_junction.*
						FROM exams_teachers_junction 
						INNER JOIN teachers ON exams_teachers_junction.teacher_id=teachers.id
						WHERE exams_teachers_junction.exam_id = '.$idExam.'
						AND  teachers.id NOT IN ('.$listTeachersToExam.')';
				/*$query='DELETE FROM `exams_teachers_junction` WHERE `exams_teachers_junction`.`teacher_id`  =2
				and  `exams_teachers_junction`.`teacher_id` ='.$idExam;*/
				$this->db->query($query);
				foreach ($arrayTeachersToExam as $item){

					$data['teacher_id']=$item;
					$data['exam_id']=$idExam;

					$isDuplicated = $this->examModel->isDuplicateExamTeacherJunction($data);
					if(!($isDuplicated)){
						//Insert data into Review Table
						$this->db->insert('exams_teachers_junction', $data);
					}

				}

			}else{
				$query='DELETE exams_teachers_junction.*
						FROM exams_teachers_junction 
						INNER JOIN teachers ON exams_teachers_junction.teacher_id=teachers.id
						WHERE exams_teachers_junction.exam_id = '.$idExam;
				/*$query='DELETE FROM `exams_teachers_junction` WHERE `exams_teachers_junction`.`teacher_id`  =2
				and  `exams_teachers_junction`.`teacher_id` ='.$idExam;*/
				$this->db->query($query);
			}
			$data['title'] = 'Yahia MAs';
			$this->session->set_flashdata('success','Affectation successfully !');
			redirect('admin/administration',$data);

		}
	}

	public function addCategory()
	{
		$this->form_validation->set_rules('category', 'category', 'required');
		if($this->form_validation->run())
		{

			$categoryId = $this->examModel->add_category(
				$this->input->post('category')
			);

			if(isset($categoryId) & $categoryId!='' ){
				$data['title'] = 'Yahia MAS';
				$this->session->set_flashdata('success','Added CAtegory Succesfully !');
			}else
			{
				$data['title'] = 'Yahia MAs';
				$this->session->set_flashdata('error','Error Adding Category ');

			}
			redirect('admin/administration');

		}

	}

}
