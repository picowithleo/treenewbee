<?php
    class Profile extends CI_Controller {

        public function index() {
            if(!$this->session->userdata('logged_in')){
				redirect('users/login');
            }
            $data['title'] = 'Profile';

            // $this->load->model("Profile_model");

            $id = $this->session->userdata('user_id');

            $data['user'] = $this->user_model->get_user($id);
            $data['posts'] = $this->post_model->get_posts();

            $this->load->view('templates/header');
            $this->load->view('pages/profile', $data);
            $this->load->view('templates/footer');

        }
        
        // public function form_validation()  
    //     {  
   
    //          $this->load->library('form_validation');  
    //          $this->form_validation->set_rules("first_name", "First Name", 'required|alpha');  
    //          $this->form_validation->set_rules("last_name", "Last Name", 'required|alpha');  
    //          if($this->form_validation->run())  
    //          {  
    //               //true  
    //               $this->load->model("Profile_model");  
    //               $data = array(  
    //                    "first_name"     =>$this->input->post("first_name"),  
    //                    "last_name"          =>$this->input->post("last_name")  
    //               );  
    //               if($this->input->post("update"))  
    //               {  
    //                    $this->profile_model->update_data($data, $this->input->post("hidden_id"));  
    //                    redirect(base_url() . "profile/index");  
    //               }  
    //          }  
    //          else  
    //          {  
    //               //false  
    //               $this->index();  
    //          }  

    //     }

    //     public function update_data(){  
    //         $id = $this->session->userdata('user_id');
    //         $this->load->model("Profile_model");  
    //         $data["user_data"] = $this->profile_model->fetch_single_data($id);  
    //         $data["fetch_data"] = $this->profile_model->fetch_data();  
    //         $this->load->view("profile/index", $data);  
    //    }  
    //    public function updated()  
    //    {  
    //         $this->index();  
    //    }  





    }
