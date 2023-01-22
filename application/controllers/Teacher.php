<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Teacher extends CI_Controller {

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
		$this->load->library("session");
		if($this->session->userdata('id'))
		{
			$this->db->where('id', $this->session->userdata('id'));
			$query = $this->db->get('users');
			$userType = $query->row()->user_level;
			if($userType!='ROLE_TEACHER'){
				$data['title'] = 'Yahia MAS';
				redirect('index',$data);
			}

		}else{
			$data['title'] = 'Yahia MAS';
			redirect('login',$data);
		}

		$this->load->library('form_validation');
		$this->load->model('examModel');
	}
	public function teacherExam()
	{
		$this->session->set_userdata('site_lang',  "english");
		$this->lang->load('ar','arabe');
		//$this->lang->load('en','english');
		$data['title'] = 'Teacher\'s page';
		$this->db->select();
		$this->db->from('categories');
		$query = $this->db->get();
		$categoriesResult= $query->result();
		$data['categories'] = $categoriesResult;
		$this->load->view('teacher/teacherExam',$data);
	}

	public function addExam()
	{
		/*$this->form_validation->set_rules('user_email', 'Email Address', 'required|trim|valid_email');*/
		$this->form_validation->set_rules('title_exam', 'Title', 'required');
		if($this->form_validation->run())
		{
			/* add to table exam  */
			// get teacher_id
			$this->db->select("teachers.id");
			$this->db->from('teachers');
			$this->db->join('users','teachers.user_id = users.id');
			$this->db->where('users.id', $this->session->userdata('id'));
			$query = $this->db->get();
			$teacherResult= $query->result();
			$idTeacher='';
			if(!empty($teacherResult)){
				$idTeacher=$teacherResult[0]->id;
			}
			$titleExam=$this->input->post('title_exam');
			$examId = $this->examModel->add_exam(
				$titleExam,
				$idTeacher,
				$this->input->post('select-category')
			);
			if(isset($examId) & $examId!='' ){
				$data['title'] = 'Yahia MAS';

			}else
			{
				$data['title'] = 'Yahia MAs';
				$this->session->set_flashdata('error','Error Adding Exam '.$examId);

			}
			$numQuestMulti=$this->input->post('count-quest-mutli');
			for($i=1;$i<=$numQuestMulti;$i++){
				if($this->input->post('quest_mutliple-'.$i)=='quest_mutliple'){

					$result = $this->examModel->add_data_choices(
						$this->session->userdata('id'),
						$this->input->post('title-question-multi-'.$i),
						$this->input->post('usr_time-multi-'.$i),
						$this->input->post('indeterminate-checkbox-single-'.$i),
						$this->input->post('option-multi-1-'.$i),
						$this->input->post('correct-option-multi-1-'.$i),
						$this->input->post('option-multi-2-'.$i),
						$this->input->post('correct-option-multi-2-'.$i),
						$this->input->post('option-multi-3-'.$i),
						$this->input->post('correct-option-multi-3-'.$i),
						$this->input->post('option-multi-4-'.$i),
						$this->input->post('correct-option-multi-4-'.$i),
						$this->input->post('option-multi-5-'.$i),
						$this->input->post('option-multi-6-'.$i),
						$this->input->post('file-uploaded-multi-'.$i),
						$this->input->post('points-multi-'.$i)
					);

					if(isset($result) & $result!='' ){
						$data['title'] = 'Yahia MAS';
						$resultJunction = $this->examModel->add_mutli_choice_junction(
							$result,
							$examId
						);
						if(isset($resultJunction) & $resultJunction=='ok' ) {
							$data['title'] = 'Yahia MAS';
						}else{
							$data['title'] = 'Yahia MAs';
							$this->session->set_flashdata('error','Error Adding Junction ');
						}
					}else
					{
						$data['title'] = 'Yahia MAs';
						$this->session->set_flashdata('error','Error Adding question with choices  '.$result);

					}


				}
			}

			$numQuestLong=$this->input->post('count-quest-long-text');
			for($i=1;$i<=$numQuestLong;$i++){

				if($this->input->post('quest_long_text-'.$i)=='quest_long_text'){

					$result = $this->examModel->add_data_long_text(
						$this->session->userdata('id'),
						$this->input->post('title-question-long-'.$i),
						$this->input->post('usr_time-long-'.$i),
						$this->input->post('file-uploaded-long-'.$i),
						$this->input->post('points-long-'.$i)

					);
					if(isset($result) & $result!='' ){
						$data['title'] = 'Yahia MAS';

						$resultJunction = $this->examModel->add_long_text_junction(
							$result,
							$examId
						);
						if(isset($resultJunction) & $resultJunction=='ok' ) {
							$data['title'] = 'Yahia MAS';
						}else{
							$data['title'] = 'Yahia MAs';
							$this->session->set_flashdata('error','Error Adding Junction ');
						}
					}else
					{

						$this->session->set_flashdata('error','Error Adding Exam '.$result);

					}
				}
			}

			$numQuestTawsil=$this->input->post('count-quest-tawsil');
			for($i=1;$i<=$numQuestTawsil;$i++) {
				if ($this->input->post('quest_tawsil-'.$i) == 'quest_tawsil') {

					$result = $this->examModel->add_data_tawsil(
						$this->session->userdata('id'),
						$this->input->post('title-question-tawsil-'.$i),
						$this->input->post('usr_time-tawsil-'.$i),
						$this->input->post('option-tawsil-1-'.$i),
						$this->input->post('link-option-tawsil-1-'.$i),
						$this->input->post('option-tawsil-2-'.$i),
						$this->input->post('link-option-tawsil-2-'.$i),
						$this->input->post('option-tawsil-3-'.$i),
						$this->input->post('link-option-tawsil-3-'.$i),
						$this->input->post('option-tawsil-4-'.$i),
						$this->input->post('link-option-tawsil-4-'.$i),
						$this->input->post('option-tawsil-5-'.$i),
						$this->input->post('link-option-tawsil-5-'.$i),
						$this->input->post('option-tawsil-6-'.$i),
						$this->input->post('link-option-tawsil-6-'.$i),
						$this->input->post('file-uploaded-tawsil-'.$i),
						$this->input->post('points-tawsil-'.$i)

					);
					if(isset($result) & $result!='' ){
						$data['title'] = 'Yahia MAS';

						$resultJunction = $this->examModel->add_tawsil_junction(
							$result,
							$examId
						);
						if(isset($resultJunction) & $resultJunction=='ok' ) {
							$data['title'] = 'Yahia MAS';
						}else{
							$data['title'] = 'Yahia MAs';
							$this->session->set_flashdata('error','Error Adding Junction ');
						}
					} else {
						$data['title'] = 'Yahia MAs';
						$this->session->set_flashdata('error', 'Error Adding Exam ' . $result);

					}
				}
			}
			$numQuestTartib=$this->input->post('count-quest-tartib');
			for($i=1;$i<=$numQuestTartib;$i++) {
				if ($this->input->post('quest_tartib-'.$i) == 'quest_tartib') {

					$result = $this->examModel->add_data_tartib(
						$this->session->userdata('id'),
						$this->input->post('title-question-tartib-'.$i),
						$this->input->post('usr_time-tartib-'.$i),
						$this->input->post('option-to-order-1-'.$i),
						$this->input->post('option-to-order-2-'.$i),
						$this->input->post('option-to-order-3-'.$i),
						$this->input->post('option-to-order-4-'.$i),
						$this->input->post('option-to-order-5-'.$i),
						$this->input->post('option-to-order-6-'.$i),
						$this->input->post('file-uploaded-tartib-'.$i),
						$this->input->post('points-tartib-'.$i)

					);
					if(isset($result) & $result!='' ){
						$data['title'] = 'Yahia MAS';

						$resultJunction = $this->examModel->add_tartib_junction(
							$result,
							$examId
						);
						if(isset($resultJunction) & $resultJunction=='ok' ) {
							$data['title'] = 'Yahia MAS';
						}else{
							$data['title'] = 'Yahia MAs';
							$this->session->set_flashdata('error','Error Adding Junction ');
						}
					} else {
						$data['title'] = 'Yahia MAs';
						$this->session->set_flashdata('error', 'Error Adding Exam ' . $result);

					}
				}
			}



			$data['title'] = 'Yahia MAs';
			$this->session->set_flashdata('success','Exam added succesfully ');
			redirect('index',$data);

		}
		else
		{
			$this->session->set_flashdata('error','Form not correct ');
			redirect('teacher/teacher-exam');
		}
	}
	public function studentListExamByTeacher($idStudent='')
	{
		$this->session->set_userdata('site_lang',  "english");
		$this->lang->load('ar','arabe');
		//$this->lang->load('en','english');
		$data['title'] = 'Student Page By Teacher';

		// id teacher
		// get teacher_id
		$this->db->select("teachers.id");
		$this->db->from('teachers');
		$this->db->join('users','teachers.user_id = users.id');
		$this->db->where('users.id', $this->session->userdata('id'));
		$query = $this->db->get();
		$teacherResult= $query->result();
		$idTeacher='';
		if(!empty($teacherResult)){
			$idTeacher=$teacherResult[0]->id;
		}
		// list of exams by student



		$this->db->select("teachers.id,teachers.name");
		$this->db->from('teachers');
		$this->db->join('student_teacher_junction','student_teacher_junction.teacher_id = teachers.id');
		$this->db->join('students', 'students.id = student_teacher_junction.student_id');
		$this->db->where('students.id',$idStudent);
		$query = $this->db->get();
		$teacherResult= $query->result();
		$data['teachers_by_student'] = $teacherResult;
		//list of exams
		$data['exams_by_student']=array();
		foreach ($teacherResult as $teach) {
			$this->db->select();
			$this->db->from('exams');
			$this->db->where('exams.teacher_id',$teach->id);
			$query = $this->db->get();
			$examsResult= $query->result();
			$data['exams_by_student'] = $examsResult;
		}
		$this->load->view('teacher/studentListExamByTeacher',$data);
	}

	public function studentResultExamByTeacher($idStudent='',$idExam='')
	{
		$this->session->set_userdata('site_lang', "english");
		$this->lang->load('ar', 'arabe');
		//$this->lang->load('en','english');
		$data['title'] = 'Student Page By Teacher';
		// get id teacher
		$this->db->select("teachers.id");
		$this->db->from('teachers');
		$this->db->join('users','teachers.user_id = users.id');
		$this->db->where('users.id', $this->session->userdata('id'));
		$query = $this->db->get();
		$teacherResult= $query->result();
		$idTeacher='';
		if(!empty($teacherResult)){
			$idTeacher=$teacherResult[0]->id;
		}
		// get all students by teacher connected
		$this->db->distinct();
		$this->db->select();
		$this->db->from('students');
		$this->db->join('student_teacher_junction','student_teacher_junction.student_id = students.id');
		$this->db->join('teachers', 'teachers.id = student_teacher_junction.teacher_id');
		$this->db->where('teachers.id',$idTeacher);
		$query = $this->db->get();
		$studentResult= $query->result();
		$data['students_by_teacher'] = $studentResult;

		// get data student and exam in one table
		/*$this->db->distinct();
		$this->db->select("students.id,students.name");
		$this->db->from('students');
		$this->db->join('student_teacher_junction','student_teacher_junction.teacher_id = students.id');
		$this->db->join('teachers', 'teachers.id = student_teacher_junction.teacher_id');
		$this->db->where('teachers.id',$idTeacher);
		$query = $this->db->get();
		$studentResult= $query->result();
		foreach ($studentResult as $student){

		}
		$data['students_by_teacher'] = $studentResult;*/
		$this->load->view('teacher/studentResultExamByTeacher.php',$data);

	}

	public function affectExamByTeacher($idExam='')
	{
		$this->session->set_userdata('site_lang', "english");
		$this->lang->load('ar', 'arabe');
		//$this->lang->load('en','english');
		$data['title'] = 'Student Page By Teacher';
		// get id teacher
		$this->db->select("teachers.id");
		$this->db->from('teachers');
		$this->db->join('users','teachers.user_id = users.id');
		$this->db->where('users.id', $this->session->userdata('id'));
		$query = $this->db->get();
		$teacherResult= $query->result();
		$idTeacher='';
		if(!empty($teacherResult)){
			$idTeacher=$teacherResult[0]->id;
		}
		// get all students by teacher connected
		$this->db->distinct();
		$this->db->select("students.id,students.name");
		$this->db->from('students');
		$this->db->join('student_teacher_junction','student_teacher_junction.student_id = students.id');
		$this->db->join('teachers', 'teachers.id = student_teacher_junction.teacher_id');
		$this->db->where('teachers.id',$idTeacher);
		$query = $this->db->get();
		$studentResult= $query->result();
		$data['students_by_teacher'] = $studentResult;

		// get data student and exam in one table
		/*$this->db->distinct();
		$this->db->select("students.id,students.name");
		$this->db->from('students');
		$this->db->join('student_teacher_junction','student_teacher_junction.teacher_id = students.id');
		$this->db->join('teachers', 'teachers.id = student_teacher_junction.teacher_id');
		$this->db->where('teachers.id',$idTeacher);
		$query = $this->db->get();
		$studentResult= $query->result();
		foreach ($studentResult as $student){

		}
		$data['students_by_teacher'] = $studentResult;*/

		// get Exam
		$this->db->select();
		$this->db->limit(1);
		$this->db->from('exams');
		$this->db->where('exams.id', $idExam);
		$query = $this->db->get();
		$examResult= $query->result();

		$data['exam'] = $examResult[0];
		$this->load->view('teacher/affectationExam.php',$data);

	}

	public function affectation()
	{
		$arrayStudents=$this->input->post('array_students');
		$idExam=$this->input->post('exam_id');


		foreach ($arrayStudents as $idStudent){
			$data['student_id']=$idStudent;
			$data['exam_id']=$idExam;

			//check duplicate
			$isDuplicated = $this->examModel->isDuplicateAffectation($data);
			if(!($isDuplicated)){
				//Insert data into Review Table
				$resultAffectation = $this->examModel->add_affectation(
					$idStudent,
					$idExam
				);
			}

		}

	}
}
