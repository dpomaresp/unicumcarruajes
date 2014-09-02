<?php
    class User extends CI_Controller {
        function User() {
            parent::__construct();
        }
        
        function index() {
            if($this->session->userdata('logged_in')) {
                $this->load->model('user_model');
                
    			$data['content'] = 'user/index'; 
    			$data['users_list'] = $this->user_model->getUsers();
            	$this->load->view('template', $data);	
    		}
    		else {
    			redirect('login');
    		}  
        }
        
        function create() {
            if($this->session->userdata('logged_in')) {
    			$data['content'] = 'user/create'; 
            	$this->load->view('template', $data);	
    		}
    		else {
    			redirect('login');
    		}
        }
        
        function edit($id) {
            $exists_user = false;
            
            if($this->session->userdata('logged_in')) {
                if(!empty($id)){
                    $this->load->model('user_model');
                    
                    $user = $this->user_model->getUser($id);
                    
                    if(!empty($user)){
                        $exists_user = true;
                        $data['content'] = 'user/edit';
                        $data['user'] = $user;
                        
            	        $this->load->view('template', $data);	    
                    }
                    else{
                        redirect('user');
                    }
                }
                else{
                    redirect('user');
                }
    		}
    		else{
    		    redirect('login');
    		}
        }
        
        function delete($id) {
            if($this->session->userdata('logged_in')) {
                if(!empty($id)){
                    $this->load->model('user_model');
                    
                    $this->user_model->deleteUser($id);
                    
                    // Mostrar listado users con mensaje de success en el borrado
                    redirect('user');
                }
            }
        }
    }
?>