<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

session_start();

class Dashboard extends CI_Controller {

	function __construct() {
		parent::__construct();
	}

	function index()
	{
		if($this->session->userdata('logged_in')) {
		    
			$data['content'] = 'dashboard'; 
        	$this->load->view('template', $data);	
		}
		else {
			redirect('login');
		}
	}
	
	function logout(){
	    $this->session->unset_userdata('logged_in');
	    session_destroy();
	    redirect('dashboard', 'refresh');
	}
}