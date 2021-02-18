<?php
    class Profile_model extends CI_Model {
        public function __construct() {
            $this->load->database();
        }



        // function fetch_data()  
        // {  
        //      $this->db->select("*");  
        //      $this->db->from("users");  
        //      $query = $this->db->get();  
        //      return $query;  
        // }  

        // function fetch_single_data($id)  
        // {  
        //      $this->db->where("id", $id);  
        //      $query = $this->db->get("users");  
        //      return $query;  
    
        // }  

        // function update_data($data, $id)  
        // {  
        //      $this->db->where("id", $id);  
        //      $this->db->update("users", $data);  
        //      //UPDATE tbl_user SET first_name = '$first_name', last_name = '$last_name' WHERE id = '$id'  
        // }  
    }  
