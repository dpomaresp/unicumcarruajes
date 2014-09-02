<?php
    class Comment extends CI_Controller {
        function Comment() {
            parent::__construct();
        }
        
        function index() {
            if($this->session->userdata('logged_in')) {
                $this->load->model('comment_model');
                
    			$data['content'] = 'comment/index'; 
    			$data['comments_list'] = $this->comment_model->getComments();
            	$this->load->view('template', $data);	
    		}
    		else {
    			redirect('login');
    		}  
        }
        
        function create() {
            if($this->session->userdata('logged_in')) {
    			$data['content'] = 'comment/create'; 
            	$this->load->view('template', $data);	
    		}
    		else {
    			redirect('login');
    		}
        }
        
        function edit($id) {
            $exists_comment = false;
            
            if($this->session->userdata('logged_in')) {
                if(!empty($id)){
                    $this->load->model('comment_model');
                    
                    $comment = $this->comment_model->getComment($id);
                    
                    if(!empty($comment)){
                        $exists_comment = true;
                        $data['content'] = 'comment/edit';
                        $data['comment'] = $comment;
                        
            	        $this->load->view('template', $data);	    
                    }
                    else{
                        redirect('comment');
                    }
                }
                else{
                    redirect('comment');
                }
    		}
    		else{
    		    redirect('login');
    		}
        }
    }
?>