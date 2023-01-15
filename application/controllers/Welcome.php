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
		$this->db->select("users.user_level");
		$this->db->from('users');
		$this->db->where('users.id',$idUser);
		$query = $this->db->get();
		$userLevel=$query->result();
		//$this->lang->load('en','english');
		$data['title'] = 'Yahia MAS';
		$data['userId'] = $idUser;
		if(!empty($userLevel) ){
			$data['user_role'] = $userLevel[0];
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
