
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library("session");
		if($this->session->userdata('id'))
		{
			$data['title'] = 'Yahia MAS';
			redirect('index',$data);
		}
		$this->load->library('form_validation');
		$this->load->library('encryption');
		$this->load->model('loginModel');
	}

	function index()
	{

		$data['title'] = 'Login';
		$this->load->view('security/login',$data);
	}

	function validation()
	{
		$this->form_validation->set_rules('user_email', 'Email Address', 'required|trim|valid_email');
		$this->form_validation->set_rules('user_password', 'Password', 'required');
		if($this->form_validation->run())
		{
			$result = $this->loginModel->can_login($this->input->post('user_email'), $this->input->post('user_password'));
			if($result == '')
			{
				$name = $this->input->post('user_name');
				$email = $this->input->post('user_email');
				$level = $this->input->post('user_level');
				$this->db->where('email', $email);
				$query = $this->db->get('users');
				$userType = $query->row()->user_level;
				$sesdata = array(
				'username'=> $name,
				'email' => $email,
				'level' => $level,
				'userType' => $userType,
				'logged_in' => TRUE
				);
				$data['title'] = 'Yahia MAS';
				$this->session->set_flashdata('success','You are logged in');
				$this->session->set_userdata('user_type',  $userType);
				return $this->load->view('index',$data);
			}
			else
			{
				$data['title'] = 'Login';
				$this->session->set_flashdata('error','error login '.$result);
				redirect('login',$data);
			}
		}
		else
		{
			$this->index();
		}
	}


}

?>
