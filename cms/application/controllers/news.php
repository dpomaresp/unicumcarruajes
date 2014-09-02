<?php
    class News extends CI_Controller {
        function News() {
            parent::__construct();
        }
        
        function index() {
            if($this->session->userdata('logged_in')) {
                $this->load->model('new_model');
                
    			$data['content'] = 'news/index'; 
    			$data['news_list'] = $this->new_model->getLastNews();
            	$this->load->view('template', $data);	
    		}
    		else {
    			redirect('login');
    		}  
        }
        
        function create() {
            if($this->session->userdata('logged_in')) {
    			$data['content'] = 'news/create'; 
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
                    
                    $new = $this->new_model->getNew($id);
                    
                    if(!empty($new)){
                        $exists_new = true;
                        $data['content'] = 'news/edit';
                        $data['new'] = $new;
                        
            	        $this->load->view('template', $data);	    
                    }
                    else{
                        redirect('news');
                    }
                }
                else{
                    redirect('news');
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
                    redirect('news');
                }
            }
        }
    }
?>