<?php
    class News extends CI_Controller {
        function News() {
            parent::__construct();

            if(!$this->session->userdata('logged_in')){
                redirect('login');
            }                

            $this->load->model('new_model');

            $this->form_validation->set_rules('title', 'Título', 'trim|required');
            $this->form_validation->set_rules('description', 'Descripción', 'trim|required');
            $this->form_validation->set_rules('external_link', 'Link externo', 'trim');
            $this->form_validation->set_rules('creation_date', 'Fecha de creación', 'trim|required');     
        }
        
        function index() {            
			$data['content'] = 'news/index'; 
			$data['news_list'] = $this->new_model->getLastNews();
        	$this->load->view('template', $data);	 
        }
        
        function create() {
            if ($this->form_validation->run()){
                $title = $this->input->post('title');
                $description = $this->input->post('description');
                $link = $this->input->post('external_link'); 
                $date = $this->input->post('creation_date');

                $this->new_model->insert($title, $description, $link, $date);
                $this->session->set_flashdata('info_message', '¡Noticia creada correctamente!');

                redirect('news', 'refresh');   
            }
            $data['content'] = 'news/create'; 
            $this->load->view('template', $data);
        }
        
        function edit($id) {
            $exists_new = false;
            
            if(!empty($id)){
                $this->load->model('new_model');
                
                $new = $this->new_model->get($id);
                
                if(!empty($new)){
                    $exists_new = true;
                    $data['content'] = 'news/edit';
                    $data['new'] = $new;
                    
        	        $this->load->view('template', $data);

                    if ($this->form_validation->run()) {

                        var_dump('OK');
                        // $this->new_model->update()
                    }
                    var_dump('dentro');	    
                }
                else{
                    redirect('news');
                }
            }
            else{
                redirect('news');
            }
        }
        
        function delete($id) {
            if($this->session->userdata('logged_in')) {
                if(!empty($id)){
                    $this->load->model('new_model');
                    
                    $this->new_model->delete($id);
                    
                    // Mostrar listado users con mensaje de success en el borrado
                    // $this->session->set_flashdata('result','<div class="alert alert-success" style="margin-top:-15px;"><span class="glyphicon glyphicon-ok"></span> <strong>Noticia</strong> eliminada correctamente.</div>');
                    // redirect(base_url($this->uri->segment(1)),'refresh');
                    redirect('news', 'refresh');
                }
            }
        }
    }
?>