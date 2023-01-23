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
						$this->input->post('correct-question-long-'.$i),
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
	public function studentListExamByTeacher($idTeacher='')
	{
		$this->session->set_userdata('site_lang',  "english");
		$this->lang->load('ar','arabe');
		//$this->lang->load('en','english');
		$data['title'] = 'Student Page By Teacher';

		// id teachers
		// list of exams by teacher



		$this->db->select();
		$this->db->from('exams');
		$this->db->where('exams.teacher_id',$idTeacher);
		$query = $this->db->get();
		$examsResult= $query->result();
		$data['exams_by_student'] = $examsResult;
		$this->load->view('teacher/studentListExamByTeacher',$data);
	}

public function studentListExamByStudent($idStudent='')
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
		$arrayTeachers=array('0');
		foreach ($teacherResult as $teach) {
			$arrayTeachers[]=$teach->id;
		}
		$this->db->select();
		$this->db->from('exams');
		$this->db->where_in('exams.teacher_id',$arrayTeachers);
		$query = $this->db->get();
		$examsResult= $query->result();
		$data['exams_by_student'] = $examsResult;
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

		$listQuestMulti=array();
		$this->db->select();
		$this->db->from('exam_quest_multi_junction');
		$this->db->where('exam_quest_multi_junction.exam_id',$idExam);
		$query = $this->db->get();
		$listQuestMulti= $query->result();
		$data['respones_multi_quest']=array();
		foreach ($listQuestMulti as $multiQuest){
			$reponseMutliQuest=array();
			$this->db->select();
			$this->db->from('response_question_multi_choice');
			$this->db->where('response_question_multi_choice.exam_id',$idExam);
			$this->db->where('response_question_multi_choice.question_multi_id',$multiQuest->quest_multi_id);
			$this->db->order_by("response_question_multi_choice.id", "desc");
			$this->db->limit(1);
			$query = $this->db->get();
			$reponseMutliQuest= $query->result();
			if(!empty($reponseMutliQuest)){
				$data['respones_multi_quest'][]=$reponseMutliQuest[0];
			}

		}

		$listQuestTawsil=array();
		$this->db->select();
		$this->db->from('exam_quest_tawsil_junction');
		$this->db->where('exam_quest_tawsil_junction.exam_id',$idExam);
		$query = $this->db->get();
		$listQuestTawsil= $query->result();
		$data['respones_tawsil_quest']=array();
		foreach ($listQuestTawsil as $tawsilQuest){
			$reponseTawsilQuest=array();
			$this->db->select();
			$this->db->from('response_question_tawsil');
			$this->db->where('response_question_tawsil.exam_id',$idExam);
			$this->db->where('response_question_tawsil.question_tawsil_id',$tawsilQuest->quest_tawsil_id);
			$this->db->order_by("response_question_tawsil.id", "desc");
			$this->db->limit(1);
			$query = $this->db->get();
			$reponseTawsilQuest= $query->result();
			if(!empty($reponseTawsilQuest)){
				$data['respones_tawsil_quest'][]=$reponseTawsilQuest[0];
			}
		}


		$listQuestTartib=array();
		$this->db->select();
		$this->db->from('exam_quest_tartib_junction');
		$this->db->where('exam_quest_tartib_junction.exam_id',$idExam);
		$query = $this->db->get();
		$listQuestTartib= $query->result();
		$data['respones_tartib_quest']=array();
		foreach ($listQuestTartib as $key => $tartibQuest) {
			$reponseTartibQuest = array();
			$this->db->select();
			$this->db->from('response_question_tartib');
			$this->db->where('response_question_tartib.exam_id', $idExam);
			$this->db->where('response_question_tartib.question_tartib_id', $tartibQuest->quest_tartib_id);
			$this->db->order_by("response_question_tartib.id", "desc");
			$this->db->limit(1);
			$query = $this->db->get();
			$reponseTartibQuest = $query->result();
			if(!empty($reponseTartibQuest)){
				$data['respones_tartib_quest'][]=$reponseTartibQuest[0];
			}
		}
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


		// get all students by teacher who passed exam
		$this->db->distinct();
		$this->db->select();
		$this->db->from('students');
		$this->db->join('student_exam_junction','student_exam_junction.student_id = students.id');
		$this->db->where('student_exam_junction.exam_id',$idExam);
		$query = $this->db->get();
		$studentsPassedExamResult= $query->result();
		$data['studentsPassedExamResult']=array();

		$arrayStudents=array('0');
		foreach ($studentsPassedExamResult as $stud) {
			$arrayStudents[]=$stud->id;
		}
		$this->db->distinct();
		$this->db->select('students.id,students.name,students.email');
		$this->db->from('students');
		$this->db->join('response_exam','response_exam.student_id = students.id');
		$this->db->where_in('students.id',$arrayStudents);
		$query = $this->db->get();
		$studResult= $query->result();

		$data['studentsPassedExamResult'] = $studResult;

		//$data['studentsPassedExamResult'] = $studentsPassedExamResult;
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
		$data['exam']=array();
		if(!empty($examResult)){
			$data['exam'] = $examResult[0];
		}

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

	public function correction()
	{
		$arrayStudents=$this->input->post('array_students');
		$idExam=$this->input->post('exam_id');


		foreach ($arrayStudents as $idStudent){
			$data['student_id']=$idStudent;
			$data['exam_id']=$idExam;

			/*//check duplicate
			$isDuplicated = $this->examModel->isDuplicateAffectation($data);
			if(!($isDuplicated)){
				//Insert data into Review Table
				$resultAffectation = $this->examModel->add_affectation(
					$idStudent,
					$idExam
				);
			}*/

			// correct multi choice by new response
			$listQuestMulti=array();
			$this->db->select();
			$this->db->from('exam_quest_multi_junction');
			$this->db->where('exam_quest_multi_junction.exam_id',$idExam);
			$query = $this->db->get();
			$listQuestMulti= $query->result();
			foreach ($listQuestMulti as $multiQuest){

				$reponseMutliQuest=array();
				$this->db->select();
				$this->db->from('response_question_multi_choice');
				$this->db->where('response_question_multi_choice.exam_id',$idExam);
				$this->db->where('response_question_multi_choice.question_multi_id',$multiQuest->quest_multi_id);
				$this->db->order_by("response_question_multi_choice.id", "desc");
				$this->db->limit(1);
				$query = $this->db->get();
				$reponseMutliQuest= $query->result();

				//get Question
				$this->db->select();
				$this->db->from('question_multi_choice');
				$this->db->where('question_multi_choice.id',$multiQuest->quest_multi_id);
				$this->db->limit(1);
				$query = $this->db->get();
				$questMutliQuest= $query->result();

				//make correction
				if(!empty($questMutliQuest) & !empty($reponseMutliQuest)){
					if($questMutliQuest[0]->is_single_choice==false){

						//make array of answers
						$arrayAnswers=array();
						if($reponseMutliQuest[0]->response_option_1!=null){
							$arrayAnswers[]=$reponseMutliQuest[0]->response_option_1;

						}
						if($reponseMutliQuest[0]->response_option_2!=null){
							$arrayAnswers[]=$reponseMutliQuest[0]->response_option_2;

						}
						if($reponseMutliQuest[0]->response_option_3!=null){
							$arrayAnswers[]=$reponseMutliQuest[0]->response_option_3;

						}
						if($reponseMutliQuest[0]->response_option_4!=null){
							$arrayAnswers[]=$reponseMutliQuest[0]->response_option_4;

						}
						if($reponseMutliQuest[0]->response_option_5!=null){
							$arrayAnswers[]=$reponseMutliQuest[0]->response_option_5;

						}if($reponseMutliQuest[0]->response_option_6!=null){
							$arrayAnswers[]=$reponseMutliQuest[0]->response_option_6;

						}
						// get array correction
						$arrayCorrectAnswers=array();
						if($questMutliQuest[0]->correct_option_1=='correct'){
							$arrayCorrectAnswers[]=$questMutliQuest[0]->option_1;

						}
						if($questMutliQuest[0]->correct_option_2=='correct'){
							$arrayCorrectAnswers[]=$questMutliQuest[0]->option_2;

						}
						if($questMutliQuest[0]->correct_option_3=='correct'){
							$arrayCorrectAnswers[]=$questMutliQuest[0]->option_3;

						}
						if($questMutliQuest[0]->correct_option_4=='correct'){
							$arrayCorrectAnswers[]=$questMutliQuest[0]->option_4;

						}
						//add note
						$diffArrays=array_diff($arrayAnswers,$arrayCorrectAnswers);
						if(empty($diffArrays)){

							$data = array(
								'note_by_teacher'  => $questMutliQuest[0]->points
							);
							$this->db->where('id', $reponseMutliQuest[0]->id);
							$this->db->update('response_question_multi_choice', $data);

						}else{
							$data = array(
								'note_by_teacher'  => "0"
							);
							$this->db->where('id', $reponseMutliQuest[0]->id);
							$this->db->update('response_question_multi_choice', $data);
						}
					}else{


						//make array of answers
						$arrayAnswers=array();
						if($reponseMutliQuest[0]->response_option_1!=null){
							$arrayAnswers[]=$reponseMutliQuest[0]->response_option_1;

						}
						if($reponseMutliQuest[0]->response_option_2!=null){
							$arrayAnswers[]=$reponseMutliQuest[0]->response_option_2;

						}
						if($reponseMutliQuest[0]->response_option_3!=null){
							$arrayAnswers[]=$reponseMutliQuest[0]->response_option_3;

						}
						if($reponseMutliQuest[0]->response_option_4!=null){
							$arrayAnswers[]=$reponseMutliQuest[0]->response_option_4;

						}
						if($reponseMutliQuest[0]->response_option_5!=null){
							$arrayAnswers[]=$reponseMutliQuest[0]->response_option_5;

						}if($reponseMutliQuest[0]->response_option_6!=null){
							$arrayAnswers[]=$reponseMutliQuest[0]->response_option_6;

						}
						// get array correction
						$arrayCorrectAnswers=array();
						if($questMutliQuest[0]->correct_option_1=='correct'){
							$arrayCorrectAnswers[]=$questMutliQuest[0]->option_1;

						}
						if($questMutliQuest[0]->correct_option_2=='correct'){
							$arrayCorrectAnswers[]=$questMutliQuest[0]->option_2;

						}
						if($questMutliQuest[0]->correct_option_3=='correct'){
							$arrayCorrectAnswers[]=$questMutliQuest[0]->option_3;

						}
						if($questMutliQuest[0]->correct_option_4=='correct'){
							$arrayCorrectAnswers[]=$questMutliQuest[0]->option_4;

						}
						//add note
						$diffArrays=array_diff($arrayAnswers,$arrayCorrectAnswers);
						if(empty($diffArrays)){

							$data = array(
								'note_by_teacher'  => $questMutliQuest[0]->points
							);
							$this->db->where('id', $reponseMutliQuest[0]->id);
							$this->db->update('response_question_multi_choice', $data);

						}else{
							$data = array(
								'note_by_teacher'  => "0"
							);
							$this->db->where('id', $reponseMutliQuest[0]->id);
							$this->db->update('response_question_multi_choice', $data);
						}
					}
				}

			}
			// correct long text
			// correct tawsil
			$listQuestTawsil=array();
			$this->db->select();
			$this->db->from('exam_quest_tawsil_junction');
			$this->db->where('exam_quest_tawsil_junction.exam_id',$idExam);
			$query = $this->db->get();
			$listQuestTawsil= $query->result();

			foreach ($listQuestTawsil as $tawsilQuest){
				$reponseTawsilQuest=array();
				$this->db->select();
				$this->db->from('response_question_tawsil');
				$this->db->where('response_question_tawsil.exam_id',$idExam);
				$this->db->where('response_question_tawsil.question_tawsil_id',$tawsilQuest->quest_tawsil_id);
				$this->db->order_by("response_question_tawsil.id", "desc");
				$this->db->limit(1);
				$query = $this->db->get();
				$reponseTawsilQuest= $query->result();

				//get Question
				$this->db->select();
				$this->db->from('question_tawsil');
				$this->db->where('question_tawsil.id',$tawsilQuest->quest_tawsil_id);
				$this->db->limit(1);
				$query = $this->db->get();
				$questTawsilQuest= $query->result();

				//make correction
				if(!empty($questTawsilQuest) & !empty($reponseTawsilQuest)){

						//make array of answers
						$isAnsweredWrong=true;
						if($reponseTawsilQuest[0]->response_option_1!=$reponseTawsilQuest[0]->correct_option_1){
							$isAnsweredWrong=false;

						}
						if($reponseTawsilQuest[0]->response_option_2!=$reponseTawsilQuest[0]->correct_option_2){
							$isAnsweredWrong=false;

						}
						if($reponseTawsilQuest[0]->response_option_3!=$reponseTawsilQuest[0]->correct_option_3){
							$isAnsweredWrong=false;

						}
						if($reponseTawsilQuest[0]->response_option_4!=$reponseTawsilQuest[0]->correct_option_4){
							$isAnsweredWrong=false;

						}
						if($reponseTawsilQuest[0]->response_option_5!=$reponseTawsilQuest[0]->correct_option_5){
							$isAnsweredWrong=false;

						}
						if($reponseTawsilQuest[0]->response_option_6!=$reponseTawsilQuest[0]->correct_option_6){
							$isAnsweredWrong=false;

						}
						if($isAnsweredWrong==true){

							$data = array(
								'note_by_teacher'  => $questTawsilQuest[0]->points
							);
							$this->db->where('id', $reponseTawsilQuest[0]->id);
							$this->db->update('response_question_tawsil', $data);

						}else{
							$data = array(
								'note_by_teacher'  => "0"
							);
							$this->db->where('id', $reponseTawsilQuest[0]->id);
							$this->db->update('response_question_tawsil', $data);
						}
				}

			}


			// correct TARTIB
			$listQuestTartib=array();
			$this->db->select();
			$this->db->from('exam_quest_tartib_junction');
			$this->db->where('exam_quest_tartib_junction.exam_id',$idExam);
			$query = $this->db->get();
			$listQuestTartib= $query->result();

			foreach ($listQuestTartib as $tartibQuest){
				$reponseTartibQuest=array();
				$this->db->select();
				$this->db->from('response_question_tartib');
				$this->db->where('response_question_tartib.exam_id',$idExam);
				$this->db->where('response_question_tartib.question_tartib_id',$tartibQuest->quest_tartib_id);
				$this->db->order_by("response_question_tartib.id", "desc");
				$this->db->limit(1);
				$query = $this->db->get();
				$reponseTartibQuest= $query->result();

				//get Question
				$this->db->select();
				$this->db->from('question_tartib');
				$this->db->where('question_tartib.id',$tartibQuest->quest_tartib_id);
				$this->db->limit(1);
				$query = $this->db->get();
				$questTartibQuest= $query->result();

				//make correction
				if(!empty($questTartibQuest) & !empty($reponseTartibQuest)){

					//make array of answers
					$isAnsweredWrong=true;
					if($reponseTartibQuest[0]->reponse_option_to_order_1!=$reponseTartibQuest[0]->correct_order_1){
						$isAnsweredWrong=false;

					}
					if($reponseTartibQuest[0]->reponse_option_to_order_2!=$reponseTartibQuest[0]->correct_order_2){
						$isAnsweredWrong=false;

					}
					if($reponseTartibQuest[0]->reponse_option_to_order_3!=$reponseTartibQuest[0]->correct_order_3){
						$isAnsweredWrong=false;

					}
					if($reponseTartibQuest[0]->reponse_option_to_order_4!=$reponseTartibQuest[0]->correct_order_4){
						$isAnsweredWrong=false;

					}
					if($reponseTartibQuest[0]->reponse_option_to_order_5!=$reponseTartibQuest[0]->correct_order_5){
						$isAnsweredWrong=false;

					}
					if($reponseTartibQuest[0]->reponse_option_to_order_6!=$reponseTartibQuest[0]->correct_order_6){
						$isAnsweredWrong=false;

					}

					if($isAnsweredWrong==true){

						$data = array(
							'note_by_teacher'  => $questTartibQuest[0]->points
						);
						$this->db->where('id', $reponseTartibQuest[0]->id);
						$this->db->update('response_question_tartib', $data);

					}else{
						$data = array(
							'note_by_teacher'  => "0"
						);
						$this->db->where('id', $reponseTartibQuest[0]->id);
						$this->db->update('response_question_tartib', $data);
					}
				}

			}

		}

	}
}
