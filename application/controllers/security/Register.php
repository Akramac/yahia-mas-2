<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

public function __construct()
{
parent::__construct();
if($this->session->userdata('id'))
{
redirect('private_area');
}
$this->load->library('form_validation');
$this->load->library('encryption');
$this->load->model('registerModel');
}

function index()
{
	$data['title'] = 'Registration';
	$this->load->view('security/register',$data);
}

function validation()
{
$this->form_validation->set_rules('user_name', 'Name', 'required|trim');
$this->form_validation->set_rules('user_email', 'Email Address', 'required|trim|valid_email|is_unique[users.email]');
$this->form_validation->set_rules('user_password', 'Password', 'required');
if($this->form_validation->run())
{
$verification_key = md5(rand());
$encrypted_password = $this->encryption->encrypt($this->input->post('user_password'));
$data = array(
'name'  => $this->input->post('user_name'),
'email'  => $this->input->post('user_email'),
'password' => $encrypted_password,
'verification_key' => $verification_key
);
$id = $this->registerModel->insert($data);
if($id > 0)
{
$this->session->set_flashdata('message', 'Check in your email for email verification mail');
redirect('register');
}
}
else
{
$this->index();
}
}

function verify_email()
{
if($this->uri->segment(3))
{
$verification_key = $this->uri->segment(3);
if($this->register_model->verify_email($verification_key))
{
$data['message'] = '<h1 align="center">Your Email has been successfully verified, now you can login from <a href="'.base_url().'login">here</a></h1>';
}
else
{
$data['message'] = '<h1 align="center">Invalid Link</h1>';
}
$this->load->view('email_verification', $data);
}
}

}

?>
