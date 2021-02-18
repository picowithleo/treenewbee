<?php
	class Users extends CI_Controller{

		public function register(){
			if (isset($this->session->user_id)) {
				redirect('home');
            }
            
			
			$data['title'] = 'Sign Up';

			$this->form_validation->set_rules('firstname', 'First Name', 'required|min_length[3]|max_length[20]');
			$this->form_validation->set_rules('lastname', 'Last Name', 'required|min_length[3]|max_length[20]');
			$this->form_validation->set_rules('username', 'Username', 'required|min_length[3]|max_length[20]');
			$this->form_validation->set_rules('email', 'Email', 'required|callback_check_email_exists|min_length[6]|max_length[50]|valid_email|is_unique[users.email]');
			$this->form_validation->set_rules('password', 'Password', 'required|min_length[6]|max_length[255]');
            $this->form_validation->set_rules('password2', 'Confirm Password', 'matches[password]');
            
            if($this->form_validation->run() === FALSE) {
				$this->load->view('templates/header');
				$this->load->view('users/register', $data);
				$this->load->view('templates/footer');
			} else {
                // Encrypt password
				$enc_password = md5($this->input->post('password'));
                $this->user_model->register($enc_password);
                
		
				$this->session->set_flashdata('user_registered', 'You are now registered and can log in');
                    
                redirect('posts');
            }
		}

		public function login(){
			if (isset($this->session->user_id)) {
				redirect('home');
            }
            
			
			$data['title'] = 'Sign In';

			$this->form_validation->set_rules('username', 'Username', 'required|min_length[3]|max_length[20]');
			$this->form_validation->set_rules('password', 'Password', 'required|min_length[6]|max_length[255]');
     
            if($this->form_validation->run() === FALSE) {
				$this->load->view('templates/header');
				$this->load->view('users/login', $data);
				$this->load->view('templates/footer');
			} else {
				$username = $this->input->post('username');
				$password = md5($this->input->post('password'));
				$user_id = $this->user_model->login($username, $password);

				if(!($user_id === false)){
			
					$user_data = array(
						'user_id' => $user_id,
						'username' => $username,
						'logged_in' => true
					);
					$this->session->set_userdata($user_data);

					$this->session->set_flashdata('user_loggedin', 'You are now logged in');
					
					redirect('posts');
					
				} else {
					$this->session->set_flashdata('login_failed', 'Login is invalid');

					redirect('users/login');
				}
			}
		}
		

		public function logout(){

			$this->session->unset_userdata('logged_in');
			$this->session->unset_userdata('user_id');
			$this->session->unset_userdata('username');

			// $this->session->session_destroy();
	
			$this->session->set_flashdata('user_loggedout', 'You are now logged out');

			redirect('users/login');
		}


		// Check if username exists
		public function check_username_exists($username) {
			$this->form_validation->set_message('
				check_username_exists', 
				'This username is used by someone else, 
				please think another one!');
		
			if($this->user_model->check_username_exists($username)) {
				return true;
			} else {
				return false;
			}
		}

		// Check if email exists
		public function check_email_exists($email) {
			$this->form_validation->set_message('
				check_email_exists', 
				'This email is used by someone else, 
				please use another one!');
		
			if($this->user_model->check_email_exists($email)) {
				return true;
			} else {
				return false;
			}
		}

		
        public function upload() {
            if(!$this->session->userdata('logged_in')){
				redirect('users/login');
            }

            $data['title'] = 'Image Upload';

			$config['upload_path']          = './uploads/';
			$config['allowed_types']        = 'gif|jpg|jpeg|png';
			$config['max_size']             = 800;


			$this->load->library('upload', $config);

			$data['error'] = "";
			if ( ! $this->upload->do_upload('userfile'))
			{
				if(isset($_FILES['userfile'])) {
					$data['error'] = $this->upload->display_errors();
				}

					$this->load->view('templates/header');
					$this->load->view('users/upload', $data);
					$this->load->view('templates/footer');
			}
			else
			{
					$id = $this->session->userdata('user_id');

					$user = $this->user_model->get_user($id);

					if($user->avatar && file_exists('uploads/'.$user->avatar)) {
						unlink('uploads/'.$user->avatar);
					}
					
					$uploaddata = $this->upload->data();

					$filename = $uploaddata['file_name'];

					$userdata = array(
						'avatar' => $filename
					);

					$this->user_model->update($id, $userdata);

					// echo '<pre>' ;print_r($uploaddata);

					$this->session->set_flashdata('avatar_uploaded', 'Upload Successfully.');
					redirect('profile/index');


			}


        }








































		

		// public function profile() {
		// 	$data = [];

		// 	if(!$this->session->userdata('logged_in')){
		// 		redirect('users/login');
		// 	}
			
		// 	if ($this->request->getMethod() == 'post') {
		// 		$rules = [
		// 			'first_name' => 'required|min_length[3]|max_length[20]',
		// 			'last_name' => 'required|min_length[3]|max_length[20]',
		// 			];

        //     // $this->form_validation->set_rules('firstname', 'First Name', 'required|min_length[3]|max_length[20]');
		// 	// $this->form_validation->set_rules('lastname', 'Last Name', 'required|min_length[3]|max_length[20]');
		// 	// $this->form_validation->set_rules('mobile', 'Mobile', 'required|min_length[10]|max_length[20]|numeric');
			
		// 	if($this->request->getPost('password') != ''){
		// 		$rules['password'] = 'required|min_length[6]|max_length[255]';
		// 		$rules['password2'] = 'matches[password]';
		// 	}

        //     // if($this->form_validation->run() === FALSE) {
		// 		if (! $this->validate($rules)) {
		// 			$data['validation'] = $this->validator;






		// 	} else {

		// 		$newData = [
		// 			'id' => session()->get('id'),
		// 			'first_name' => $this->request->getPost('first_name'),
		// 			'last_name' => $this->request->getPost('last_name'),
		// 			];
		// 			if($this->request->getPost('password') != ''){
		// 				$newData['password'] = $this->request->getPost('password');
		// 			}
		// 		$model->save($newData);

		// 		session()->setFlashdata('success', 'Successfuly Updated');
		// 		return redirect()->to('/profile');

		// 		// $data = array(
		// 		// 	'first_name' => $this->input->post('first_name', true),
		// 		// 	'last_name' => $this->input->post('last_name', true),
		// 		// );

		// 		// echo print_r($data);
		// 		// $id = $this->session->userdata('user_id');
		// 		// echo print_r($id);
		// 		// $result = $this->user_model->update($id, $data);
		// 		// echo print_r($result);
		// 		// if($this->input->post('password') != ''){
		// 		// 	$enc_password = md5($this->input->post('password'));
		// 		// 	$userdata = array(
		// 		// 		'password' = $enc_password;
		// 		// 	);
		// 		// 	$this->user_model->update($id, $userdata);
		// 		// }
                
		// 		if($result > 0) {
		// 			$session_data = array(
		// 				'firstname' => $data['firstname'],
		// 				'lastname' => $data['lastname']
		// 			);

		// 			$this->session->set_userdata($session_data);
		// 			echo print_r($result);
		// 			$this->session->set_flashdata('profile_updated', 'Successfuly Updated');
                    
        //         	return redirect('profile/index');
		// 		}else {
		// 			echo print_r($result);
		// 			$this->session->set_flashdata('profile_uploaded_failed', 'ERROR: not update user profile.');
                    
        //         	return redirect('profile/index');
		// 		}
				
		  
			
		// 	}




		// 	$this->load->view('templates/header');
		// 	$this->load->view('profile/index', $data);
		// 	$this->load->view('templates/footer');
		// }


		
		
	}

