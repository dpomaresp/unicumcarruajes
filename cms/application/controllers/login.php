<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	function Login() {
		parent::__construct();

		$this->form_validation->set_rules('user_name', 'Usuario', 'trim');
		$this->form_validation->set_rules('user_password', 'Password', 'trim');		
	}

	function index() {			
		if($this->form_validation->run()){
			if($this->config->item('admin-user') == $this->input->post('user_name') && 
				$this->config->item('admin-password') == md5($this->input->post('user_password'))){
    			$this->session->set_userdata('logged_in', $this->input->post('user_name'));
    			redirect('dashboard', 'refresh');
			}
			else{
				$this->form_validation->set_message('user_name', 'Wrong user/passwrod. Please try again.');
				$this->load->view('login/index');	
			}
		}
		else{
			$this->load->view('login/index');	
		}
	}
}