<?php
    class Comment_model extends CI_model {
        function __construct() {
            parent::__construct();
        }
        
        function getComment($id) {
            $query = $this->db->get_where('Comments', array('comment_id' => $id));
            
            $row = $query->result();
            
            $this->load->model('User_model');
            
            $row->fk_user = $this->User_model->getUserName($row->fk_user);
            
            return $query->result();
        }
        
        function getComments() {
            $query = $this->db->get('Comments');
            
            $this->load->model('User_model');
            
            foreach($query->result() as $row){
                $row->fk_user = $this->User_model->getUserName($row->fk_user);
            }
                
            return $query->result();
        }
        
        function deleteComment($id) {
            return $this->db->delete('Comments', array('comment_id' => $id));
        }
    }
?>