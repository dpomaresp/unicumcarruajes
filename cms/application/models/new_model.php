<?php
    class New_model extends CI_model {
        function __construct() {
            parent::__construct();
        }
        
        function getNew($id) {
            $query = $this->db->get_where('News', array('new_id' => $id));
            
            return $query->result();
        }
        
        function getNews() {
            $query = $this->db->get('News');
                
            return $query->result();
        }
        
        function updateNew($id, $title, $description, $comments_allowed, $date) {
            $data = array(
               'new_title' => $title,
               'new_description' => $description,
               'comments_allowed' => $comments_allowed,
               'new_date' => $date
            );
            
            $this->db->where('new_id', $id);
            $this->db->update('News', $data); 
            
            return $this->db->affected_rows();
        }
        
        function deleteNew($id) {
            return $this->db->delete('News', array('new_id' => $id));
        }
    }
?>