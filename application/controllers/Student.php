<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student extends CI_Controller {

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
			if($userType!='ROLE_STUDENT'){
				$data['title'] = 'Yahia MAS';
				redirect('index',$data);
			}

		}else{
			$data['title'] = 'Yahia MAS';
			redirect('login',$data);
		}
		$this->load->library('session');
		$this->load->library('form_validation');
		$this->load->model('responsesModel');
	}
	public function studentExam($idExam='')
	{
		$this->session->set_userdata('site_lang',  "english");
		$this->lang->load('ar','arabe');
		//$this->lang->load('en','english');
		$data['title'] = 'Student Page';

		/* get question multi or single choice */
		$this->db->select();
		$this->db->from('question_multi_choice');
		$this->db->join('exam_quest_multi_junction', 'exam_quest_multi_junction.quest_multi_id  = question_multi_choice.id');
		$this->db->join('exams', 'exams.id = exam_quest_multi_junction.exam_id');
		$this->db->where('exams.id', $idExam);
		$query = $this->db->get();
		$listQuestionsSingleChoice= $query->result();
		$data['listQuestionsSingleChoice'] =$listQuestionsSingleChoice;

		/* get question long text */
		$this->db->select();
		$this->db->from('question_long_text');
		$this->db->join('exam_quest_long_text_junction', 'exam_quest_long_text_junction.quest_long_text_id   = question_long_text.id', 'left');
		$this->db->join('exams', 'exams.id = exam_quest_long_text_junction.exam_id', 'left');
		$this->db->where('exams.id', $idExam);
		$query = $this->db->get();
		$listQuestionsLongText= $query->result();
		$data['listQuestionsLongText'] =$listQuestionsLongText;

		/* get question tawsil */
		$this->db->select();
		$this->db->from('question_tawsil');
		$this->db->join('exam_quest_tawsil_junction', 'exam_quest_tawsil_junction.quest_tawsil_id   = question_tawsil.id', 'left');
		$this->db->join('exams', 'exams.id = exam_quest_tawsil_junction.exam_id', 'left');
		$this->db->where('exams.id', $idExam);
		$query = $this->db->get();
		$listQuestionsTawsil= $query->result();
		$data['listQuestionsTawsil'] =$listQuestionsTawsil;

		/* get question tartib */
		$this->db->select();
		$this->db->from('question_tartib');
		$this->db->join('exam_quest_tartib_junction', 'exam_quest_tartib_junction.quest_tartib_id   = question_tartib.id', 'left');
		$this->db->join('exams', 'exams.id = exam_quest_tartib_junction.exam_id', 'left');
		$this->db->where('exams.id', $idExam);
		$query = $this->db->get();
		$listQuestionsTartib= $query->result();
		$data['listQuestionsTartib'] =$listQuestionsTartib;

		$data['idExam'] =$idExam;
		$this->db->select('exams.teacher_id');
		$this->db->from('exams');
		$this->db->where('exams.id', $idExam);
		$query = $this->db->get();
		$idTeacher= $query->result();
		$data['idTeacher']='';
		if(!empty($idTeacher)){
			$idTeacher=$idTeacher[0]->teacher_id;
			$data['idTeacher'] =$idTeacher;
		}


		$this->db->select('exams.duration_exam');
		$this->db->from('exams');
		$this->db->where('exams.id', $idExam);
		$query = $this->db->get();
		$durationExam= $query->result();
		$data['durationExam']='';
		if(!empty($durationExam)){
			$data['durationExam'] =$durationExam[0]->duration_exam;
		}


		$this->load->view('student/studentExam',$data);
	}

	public function studentListExam($idTeacher='')
	{
		$this->session->set_userdata('site_lang',  "english");
		$this->lang->load('ar','arabe');
		//$this->lang->load('en','english');
		$data['title'] = 'Student Page';

		//list of categories
		$this->db->select();
		$this->db->from('categories');
		$this->db->limit(6);
		$query = $this->db->get();
		$allCategories= $query->result();
		$data['allCategories'] = $allCategories;
		// list of teachers by student

		$this->db->select("students.id");
		$this->db->from('students');
		$this->db->join('users','students.user_id = users.id');
		$this->db->where('users.id', $this->session->userdata('id'));
		$query = $this->db->get();
		$studentResult= $query->result();
		$idStudent='';
		if(!empty($studentResult)){
			$idStudent=$studentResult[0]->id;
		}
		$this->db->where('student_id', $idStudent);
		$query = $this->db->get('student_teacher_junction');
		$teacherStudentResult = $query->result();
		//$data['listTeachers']=$teacherStudentResult;
		$arrayTeachers=array('0');
		foreach ($teacherStudentResult as $teacher){
			$arrayTeachers[]=$teacher->teacher_id;
		}

		/*$this->db->select('e.name');
		$this->db->from('teachers e');
		$this->db->join('student_teacher_junction ue', 'ue.teacher_id = e.id');
		$this->db->where('ue.teacher_id', 2);
		$query = $this->db->get();*/
		if(!empty($arrayTeachers)){
			$this->db->select('teachers.name,teachers.id');
			$this->db->from('teachers');
			$this->db->join('student_teacher_junction', 'student_teacher_junction.teacher_id = teachers.id');
			$this->db->where_in('student_teacher_junction.teacher_id', $arrayTeachers);
			$this->db->distinct();
			$queryTeachersByStudent = $this->db->get()->result();
			$data['listTeachers']=$queryTeachersByStudent;
		}else{
			$data['listTeachers']=array();
		}


		if($idTeacher!='' & $idTeacher!='all'){
			$this->db->select();
			$this->db->from('exams');
			$this->db->join('student_exam_junction', 'student_exam_junction.exam_id = exams.id');
			$this->db->where('student_exam_junction.student_id', $idStudent);
			$this->db->where('teacher_id', $idTeacher);
			$examByTeacherResult = $this->db->get()->result();
			$data['listExams']=$examByTeacherResult;
		}elseif($idTeacher=='all' or $idTeacher=='' ){
			if(!empty($arrayTeachers)){
				$this->db->select();
				$this->db->from('exams');
				$this->db->join('student_exam_junction', 'student_exam_junction.exam_id = exams.id');
				$this->db->where('student_exam_junction.student_id', $idStudent);
				$this->db->where_in('teacher_id', $arrayTeachers);
				$examByTeacherResult = $this->db->get()->result();
				$data['listExams']=$examByTeacherResult;
			}else{
				$data['listExams']=array();
			}

		}
		$this->load->view('student/studentListExam',$data);
	}
	public function studentListExamByCategory($idCategory='')
	{
		$this->session->set_userdata('site_lang',  "english");
		$this->lang->load('ar','arabe');
		//$this->lang->load('en','english');
		$data['title'] = 'Student Page';

		//list of categories
		$this->db->select();
		$this->db->from('categories');
		$this->db->limit(6);
		$query = $this->db->get();
		$allCategories= $query->result();
		$data['allCategories'] = $allCategories;
		// list of teachers by student

		$this->db->select("students.id");
		$this->db->from('students');
		$this->db->join('users','students.user_id = users.id');
		$this->db->where('users.id', $this->session->userdata('id'));
		$query = $this->db->get();
		$studentResult= $query->result();
		$idStudent='';
		if(!empty($studentResult)){
			$idStudent=$studentResult[0]->id;
		}
		$this->db->where('student_id', $idStudent);
		$query = $this->db->get('student_teacher_junction');
		$teacherStudentResult = $query->result();
		//$data['listTeachers']=$teacherStudentResult;
		$arrayTeachers=array('0');
		foreach ($teacherStudentResult as $teacher){
			$arrayTeachers[]=$teacher->teacher_id;
		}

		/*$this->db->select('e.name');
		$this->db->from('teachers e');
		$this->db->join('student_teacher_junction ue', 'ue.teacher_id = e.id');
		$this->db->where('ue.teacher_id', 2);
		$query = $this->db->get();*/
		if(!empty($arrayTeachers)){
			$this->db->select('teachers.name,teachers.id');
			$this->db->from('teachers');
			$this->db->join('student_teacher_junction', 'student_teacher_junction.teacher_id = teachers.id');
			$this->db->where_in('student_teacher_junction.teacher_id', $arrayTeachers);
			$this->db->distinct();
			$queryTeachersByStudent = $this->db->get()->result();
			$data['listTeachers']=$queryTeachersByStudent;
		}else{
			$data['listTeachers']=array();
		}


		if($idCategory!='' & $idCategory!='all'){

			if(!empty($arrayTeachers)){
				$this->db->select();
				$this->db->from('exams');
				$this->db->where_in('teacher_id', $arrayTeachers);
				$this->db->where('categorie_id ', $idCategory);
				$examByTeacherResult = $this->db->get()->result();
				$data['listExams']=$examByTeacherResult;
			}else{
				$data['listExams']=array();
			}

		}elseif($idCategory=='all' or $idCategory=='' ){
			if(!empty($arrayTeachers)){
				$this->db->select();
				$this->db->from('exams');
				$this->db->where_in('teacher_id', $arrayTeachers);
				$examByTeacherResult = $this->db->get()->result();
				$data['listExams']=$examByTeacherResult;
			}else{
				$data['listExams']=array();
			}

		}
		$this->load->view('student/studentListExam',$data);
	}

	public function studentaddExamToDB()
	{
		$this->session->set_userdata('site_lang', "english");
		$this->lang->load('ar', 'arabe');
		//$this->lang->load('en','english');
		$data['title'] = 'Student Page';

		$idUser=$this->session->userdata('id');
		// get id student
		$this->db->select("students.id");
		$this->db->from('students');
		$this->db->join('users','students.user_id = users.id');
		$this->db->where('users.id', $idUser);
		$query = $this->db->get();
		$studentResult= $query->result();
		$idStudent='';
		if(!empty($studentResult)){
			$idStudent=$studentResult[0]->id;
		}


		/*foreach ($_POST as $key => $value) {
			echo "<tr>";
			echo "<td>";
			echo $key;
			echo "</td>";
			echo "<td>";
			echo $value;
			echo "</td>";
			echo "</tr>";
		}*/
		$this->form_validation->set_rules('idExam', 'Exam Id', 'required');
		$this->form_validation->set_rules('idTeacher', 'Teacher Id', 'required');
		if($this->form_validation->run()) {
		foreach ($_POST as $key => $value) {
			$numbers = array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9);
			$result = str_replace($numbers, "", $key);


			// get id teacher
			$this->db->select("exams.teacher_id");
			$this->db->from('exams');
			$this->db->where('exams.id', $this->input->post('idExam'));
			$query = $this->db->get();
			$teacherResult= $query->result();
			$idTeacher='';
			if(!empty($teacherResult)){
				$idTeacher=$teacherResult[0]->teacher_id;
			}
			switch ($result) {
				case 'select-options-cards-':
					if(!is_array($this->input->post($key))){
						$pieces = explode("-", $key);
						$idQuest=$pieces[3];
						$id = $this->responsesModel->insert_options_choices(
							$this->session->userdata('id'),
							$idTeacher,
							$idStudent,
							$idQuest,
							$this->input->post('idExam'),
							$this->input->post($key),
							$this->input->post($key),
							$this->input->post($key),
							$this->input->post($key),
							$this->input->post($key),
							$this->input->post($key));
					}else{
						$pieces = explode("-", $key);
						$idQuest=$pieces[3];
						$reponse1='';
						$reponse2='';
						$reponse3='';
						$reponse4='';
						$reponse4='';
						$reponse6='';
						$reponse1=$this->input->post($key)[0];
						if(count($this->input->post($key))>1){
							$reponse2=$this->input->post($key)[1];
						}
						if(count($this->input->post($key))>2){
							$reponse3=$this->input->post($key)[2];
						}
						if(count($this->input->post($key))>3){
							$reponse4=$this->input->post($key)[3];
						}
						if(count($this->input->post($key))>4){
							$reponse5=$this->input->post($key)[4];
						}
						if(count($this->input->post($key))>5){
							$reponse6=$this->input->post($key)[5];
						}


						$id = $this->responsesModel->insert_options_choices(
							$this->session->userdata('id'),
							$idTeacher,
							$idStudent,
							$idQuest,
							$this->input->post('idExam'),
							$reponse1,
							$reponse2,
							$reponse3,
							$reponse4,
							$reponse5,
							$reponse6);
					}

					break;
				case 'long-text-':
					$pieces = explode("-", $key);
					$idQuest=$pieces[2];

					// get id teacher
					$this->db->select();
					$this->db->from('question_long_text');
					$this->db->where('question_long_text.id', $idQuest);
					$query = $this->db->get();
					$questLongTextResult= $query->result();
					if(!empty($questLongTextResult)){
						$correctOption1=$questLongTextResult[0]->correct_long_text;


						$id = $this->responsesModel->insert_long_text(
							$this->session->userdata('id'),
							$idTeacher,
							$idStudent,
							$idQuest,
							$this->input->post('idExam'),
							$correctOption1,
							$this->input->post($key));

					}

					break;
				case 'tawsil-input-':
					$pieces = explode("-", $key);
					$idQuest=$pieces[2];

					// get id teacher
					$this->db->select();
					$this->db->from('question_tawsil');
					$this->db->where('question_tawsil.id', $idQuest);
					$query = $this->db->get();
					$questTawsilResult= $query->result();
					if(!empty($questTawsilResult)){
						$correctOption1=$questTawsilResult[0]->option_1;
						$correctOption2=$questTawsilResult[0]->option_2;
						$correctOption3=$questTawsilResult[0]->option_3;
						$correctOption4=$questTawsilResult[0]->option_4;
						$correctOption5=$questTawsilResult[0]->option_5;
						$correctOption6=$questTawsilResult[0]->option_6;
						// get order of choices
					$pieces = explode(";", $this->input->post($key));
						$option1=$pieces[1];
						$option2=$pieces[2];
						$option3=$pieces[3];
						$option4=$pieces[4];
						$option5=$pieces[5];
						$option6=$pieces[6];

					$id = $this->responsesModel->insert_tawsil(
						$this->session->userdata('id'),
						$idTeacher,
						$idStudent,
						$idQuest,
						$this->input->post('idExam'),
						$correctOption1,
						$option1,
						$correctOption2,
						$option2,
						$correctOption3,
						$option3,
						$correctOption4,
						$option4,
						$correctOption5,
						$option5,
						$correctOption6,
						$option6);

					}

					break;
				case 'tartib-input-':

					$pieces = explode("-", $key);
					$idQuest=$pieces[2];

					// get id teacher
					$this->db->select();
					$this->db->from('question_tartib');
					$this->db->where('question_tartib.id', $idQuest);
					$query = $this->db->get();
					$questTartibResult= $query->result();
					if(!empty($questTartibResult)){
						$correctOption1=$questTartibResult[0]->option_to_order_1;
						$correctOption2=$questTartibResult[0]->option_to_order_2;
						$correctOption3=$questTartibResult[0]->option_to_order_3;
						$correctOption4=$questTartibResult[0]->option_to_order_4;
						$correctOption5=$questTartibResult[0]->option_to_order_5;
						$correctOption6=$questTartibResult[0]->option_to_order_6;
						// get order of choices
						$pieces = explode(";", $this->input->post($key));
						$option1=$pieces[1];
						$option2=$pieces[2];
						$option3=$pieces[3];
						$option4=$pieces[4];
						$option5=$pieces[5];
						$option6=$pieces[6];

						$id = $this->responsesModel->insert_tartib(
							$this->session->userdata('id'),
							$idTeacher,
							$idStudent,
							$idQuest,
							$this->input->post('idExam'),
							$correctOption1,
							$option1,
							$correctOption2,
							$option2,
							$correctOption3,
							$option3,
							$correctOption4,
							$option4,
							$correctOption5,
							$option5,
							$correctOption6,
							$option6);

					}

					break;

			}
		}

		// mark exam as passed
			$idPassedExam = $this->responsesModel->mark_exam_as_passed(
				$idTeacher,
				$idStudent,
				$this->input->post('idExam')
			);
		}else
		{
			$this->session->set_flashdata('error', 'Error Form');
			$data['title'] = 'Registration';
			redirect('index');
			//$this->load->view('security/register',$data);
		}

		$this->session->set_flashdata('success', 'You have  registered your exam succesfully !');
		redirect('index');


	}

	public function saveVideo()
	{
		$fileName = $_POST["video-filename"];
		$uploadDirectory = "assets/uploads/$fileName";

		if (!move_uploaded_file($_FILES["video-blob"]["tmp_name"], $uploadDirectory)) {
			echo("problem moving uploaded file");
		}

		echo($uploadDirectory);
		$arrayStudents = $this->input->post('array_students');

	}
}
