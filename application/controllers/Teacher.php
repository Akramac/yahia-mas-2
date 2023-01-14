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
		$this->load->view('teacher/teacherExam',$data);
	}

	public function addExam()
	{
		/*$this->form_validation->set_rules('user_email', 'Email Address', 'required|trim|valid_email');*/
		$this->form_validation->set_rules('title-question-1', 'Title', 'required');
		if($this->form_validation->run())
		{
			$numQuestMulti=$this->input->post('count-quest-mutli');
			for($i=1;$i<=$numQuestMulti;$i++){
				if($this->input->post('quest_mutliple-'.$i)=='quest_mutliple'){

					$result = $this->examModel->add_data_choices(
						$this->session->userdata('id'),
						$this->input->post('title-question-'.$i),
						$this->input->post('usr_time-'.$i),
						$this->input->post('indeterminate-checkbox-single-'.$i),
						$this->input->post('indeterminate-checkbox-multiple-'.$i),
						$this->input->post('option-1-'.$i),
						$this->input->post('option-2-'.$i),
						$this->input->post('option-3-'.$i),
						$this->input->post('option-4-'.$i),
						$this->input->post('file-uploaded-'.$i)
					);

					if(isset($result) & $result!='' ){
						$data['title'] = 'Yahia MAS';

					}else
					{
						$data['title'] = 'Yahia MAs';
						$this->session->set_flashdata('error','Error Adding Exam '.$result);

					}
				}
			}

			if($this->input->post('quest_long_text')=='quest_long_text'){

				$result = $this->examModel->add_data_long_text(
					$this->session->userdata('id'),
					$this->input->post('title-question'),
					$this->input->post('usr_time'),
					$this->input->post('file-uploaded')
				);
				if(isset($result) & $result!='' ){
					$data['title'] = 'Yahia MAs';
				}else
				{

					$this->session->set_flashdata('error','Error Adding Exam '.$result);

				}
			}
			if($this->input->post('quest_tawsil')=='quest_tawsil'){

				$result = $this->examModel->add_data_tawsil(
					$this->session->userdata('id'),
					$this->input->post('title-question'),
					$this->input->post('usr_time'),
					$this->input->post('option-1'),
					$this->input->post('link-option-1'),
					$this->input->post('option-2'),
					$this->input->post('link-option-2'),
					$this->input->post('option-3'),
					$this->input->post('link-option-3'),
					$this->input->post('option-4'),
					$this->input->post('link-option-4'),
					$this->input->post('file-uploaded')
				);
				if(isset($result) & $result!='' ){
					$data['title'] = 'Yahia MAS';

				}else
				{
					$data['title'] = 'Yahia MAs';
					$this->session->set_flashdata('error','Error Adding Exam '.$result);

				}
			}

			if($this->input->post('quest_tartib')=='quest_tartib'){

				$result = $this->examModel->add_data_tartib(
					$this->session->userdata('id'),
					$this->input->post('title-question'),
					$this->input->post('usr_time'),
					$this->input->post('option-to-order-1'),
					$this->input->post('option-to-order-2'),
					$this->input->post('option-to-order-3'),
					$this->input->post('option-to-order-4'),
					$this->input->post('file-uploaded')
				);
				if(isset($result) & $result!='' ){
					$data['title'] = 'Yahia MAS';

				}else
				{
					$data['title'] = 'Yahia MAs';
					$this->session->set_flashdata('error','Error Adding Exam '.$result);

				}
			}
			$data['title'] = 'Yahia MAs';
			$this->session->set_flashdata('success','Exam added succesfully ');
			redirect('index',$data);

		}
		else
		{
			$this->session->set_flashdata('error','Form not correct ');
			redirect('teacher/teacherExam');
		}
	}
	/*
		public function switchLang($language = "") {
			$this->session->set_userdata('site_lang', $language);
			header('Location: http://localhost/ci_multilingual_app/');
		}*/
}
