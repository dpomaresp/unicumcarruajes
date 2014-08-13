<?php
    class New extends CI_Controller {
        function User() {
            parent::__construct();
        }
        
        function index() {
            if($this->session->userdata('logged_in')) {
                $this->load->model('new_model');
                
    			$data['content'] = 'new/index'; 
    			$data['news_list'] = $this->user_model->getNews();
            	$this->load->view('template', $data);	
    		}
    		else {
    			redirect('login');
    		}  
        }
        
        function create() {
            if($this->session->userdata('logged_in')) {
    			$data['content'] = 'new/create'; 
            	$this->load->view('template', $data);	
    		}
    		else {
    			redirect('login');
    		}
        }
        
        function edit($id) {
            $exists_new = false;
            
            if($this->session->userdata('logged_in')) {
                if(!empty($id)){
                    $this->load->model('new_model');
                    
                    $new = $this->user_model->getNew($id);
                    
                    if(!empty($new)){
                        $exists_new = true;
                        $data['content'] = 'new/edit';
                        $data['new'] = $new;
                        
            	        $this->load->view('template', $data);	    
                    }
                    else{
                        redirect('new');
                    }
                }
                else{
                    redirect('new');
                }
    		}
    		else{
    		    redirect('login');
    		}
        }
        
        function delete($id) {
            if($this->session->userdata('logged_in')) {
                if(!empty($id)){
                    $this->load->model('new_model');
                    
                    $this->user_model->deleteNew($id);
                    
                    // Mostrar listado users con mensaje de success en el borrado
                    redirect('new');
                }
            }
        }
    }
?>