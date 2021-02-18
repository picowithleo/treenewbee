<?php
    class User_model extends CI_Model {
        public function register($enc_password) {
       
            $data = array(
                'first_name' => $this->input->post('firstname'),
                'last_name' => $this->input->post('lastname'),
				'email' => $this->input->post('email'),
                'username' => $this->input->post('username'),
                'password' => $enc_password,
            );

         
			return $this->db->insert('users', $data);
            
        }


		public function login($username, $password) {

			$this->db->where('username', $username);
			$this->db->where('password', $password);

			$result = $this->db->get('users');

			if($result->num_rows() == 1){
				return $result->row(0)->id;
			} else {
				return false;
			}
		}



        // Check username exists
        public function check_username_exists($username) {
            $query = $this->db->get_where('users', array('username' 
            => $username));

            if(empty($query->row_array())) {
                return true;
            } else {
                return false;
            }
        }

        // Check email exists
		public function check_email_exists($email){
			$query = $this->db->get_where('users', array('email' => $email));
			if(empty($query->row_array())){
				return true;
			} else {
				return false;
			}
        }
        

        public function get_user($id) {
            $this->db->where('id', $id);
            $query = $this->db->get('users');
            return $query->row();
        }

        public function update($id, $userdata) {
            $this->db->where('id', $id);
            $this->db->update('users', $userdata);
        }


        // public function update_user_data($id, $enc_password) {
            
        //     $data = array(
        //         'first_name' => $this->input->post('firstname'),
        //         'last_name' => $this->input->post('lastname'),
        //         'password' => $enc_password,
        //     );

         
        //     $this->db->where('id', $id);
        //     $this->db->update('users', $data);
        // }





    }