<?php
    class User_model extends CI_model {
        function __construct() {
            parent::__construct();
        }
        
        function getUser($id) {
            $query = $this->db->get_where('Users', array('user_id' => $id));
            
            $row = $query->result();
            
            if($row->active == 1){
                $row->active = 'Activado';
            }
            else{
                $row->active = 'Desactivado';
            }
            
            return $query->result();
        }
        
        function getUsers() {
            $query = $this->db->get('Users');
            
            foreach($query->result() as $row){
                if($row->active == 1){
                    $row->active = 'Activado';
                }
                else{
                    $row->active = 'Desactivado';
                }
            }
                
            return $query->result();
        }
        
        function updateUser($id, $name, $password, $email, $active) {
            $data = array(
               'user_name' => $name,
               'user_password' => $password,
               'user_email' => $email,
               'active' => $active
            );
            
            $this->db->where('user_id', $id);
            $this->db->update('Users', $data); 
            
            return $this->db->affected_rows();
        }
        
        function deleteUser($id) {
            return $this->db->delete('Users', array('user_id' => $id));
        }
        
        function getUserName($id){
             $user = getUser($id);
             
             return $user->user_name;
        }
    }
?>