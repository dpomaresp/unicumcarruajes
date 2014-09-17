<?php
    class New_model extends CI_model {
        function __construct() {
            parent::__construct();
        }
        
        function get($id) {
            $query = $this->db->get_where('News', array('new_id' => $id));
            
            return $query->result();
        }
        
        function getLastNews($offset = NULL, $limit = NULL, $from = NULL, $to = NULL)
        {
            $query = '';
            
            if(!empty($limit) && $offset >= 0){
                if(!empty($from) && !empty($to)){
                    $this->db->where('new_creation_date >=', $from);
                    $this->db->where('new_creation_date <=', $to);
                }
                $this->db->limit($limit, $offset); 
                $this->db->order_by('new_creation_date', 'desc');
                $query = $this->db->get('News');    
            }
            else{
                if(!empty($from) && !empty($to)){
                    $this->db->where('new_creation_date >=', $from);
                    $this->db->where('new_creation_date <=', $to);
                }
                $this->db->order_by('new_creation_date', 'desc');
                $query = $this->db->get('News');
            }
            
            return $query->result();
        }
        
        function insert($title, $description, $external_link, $date)
        {
            $data = array (
                'new_title' => $title,
                'new_description' => $description,
                'new_external_link' => $external_link,
                'new_creation_date' => $date
            );
    
            $this->db->insert('News', $data);
            
            return $this->db->affected_rows();
        }
        
        function update($id, $title, $description, $external_link, $date) {
            $data = array(
               'new_title' => $title,
               'new_description' => $description,
               'new_external_link' => $external_link,
               'new_creation_date' => $date
            );
            
            $this->db->where('new_id', $id);
            $this->db->update('News', $data); 
            
            return $this->db->affected_rows();
        }
        
        function delete($id) {
            return $this->db->delete('News', array('new_id' => $id));
        }
        
        function hasPictures($id) {
            $this->db->where('fk_new_id', $id);
            $query = $this->db->get('Images_new');
    
            return $query->num_rows();
        }
    
        function count(){
            $query = $this->db->get('News');
    
            return $query->num_rows();   
        }
    }
?>