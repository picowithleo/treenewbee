<?php
    class Posts extends CI_Controller {
        public function index() {
     
            $data['title'] = 'Latest Posts';

            $data['posts'] = $this->post_model->get_posts();

            $this->load->view('templates/header');
            $this->load->view('posts/index', $data);
            $this->load->view('templates/footer');

        }

        public function view($slug = NULL){
			$data['post'] = $this->post_model->get_posts($slug);
            $post_id = $data['post']['id'];
            $data['comments'] = $this->comment_model->get_comments($post_id);
            
			if(empty($data['post'])){
				show_404();
			}

			$data['title'] = $data['post']['title'];

			$this->load->view('templates/header');
			$this->load->view('posts/view', $data);
			$this->load->view('templates/footer');
        }
        
        
        public function create(){
            
            if(!$this->session->userdata('logged_in')){
				redirect('users/login');
			}
            
            $data['title'] = 'Upload Video';
            
            $data['categories'] = $this->post_model->get_categories();

            $this->form_validation->set_rules('title', 'Title', 'required');

            $this->form_validation->set_rules('description', 'Description', 'required');

            $this->form_validation->set_rules('category_id', 'Category', 'required');

            // $this->form_validation->set_rules('post_image', 'Cover', 'required');

            // $this->form_validation->set_rules('video', 'Video', 'required');


            if($this->form_validation->run() === FALSE) {
                $this->load->view('templates/header');
                $this->load->view('posts/create', $data);
                $this->load->view('templates/footer');
            } else {

                // Upload Videos
                 
                $config['upload_path'] = './assets/videos/posts/';
                $config['allowed_types'] = 'mp4|avi|mov|flv|wmv';
                $config['max_size'] = '2048';
                $config['max_width'] = '200000';
                $config['max_height'] = '200008';

                $this->load->library('upload', $config);
                // $this->upload->initialize($config2);


                if(!$this->upload->do_upload()) {
                $errors = array('error' => $this->upload->display_errors());
                // $post_image = 'noimage.png';
                $post_video = 'sample.mp4';

                } else {
                    $data = array('upload_data' => $this->upload->data());
                    // $post_image = $_FILES['userfile1']['name'];
                    $post_video = $_FILES['userfile']['name'];

                }

                $this->post_model->create_post($post_video);

                $this->session->set_flashdata('post_created', 
                'Your post has been created');


                redirect('posts');







                // foreach ($_FILES as $key => $value) {

                //     if (!empty($value['tmp_name'])) {
        
        
                //         if($key == "userfile1") {
        

                //             // Upload Cover Image
                //             $config['upload_path'] = './assets/images/posts/';
                //             $config['allowed_types'] = 'gif|jpg|png|jpeg';
                //             $config['max_size'] = '0';
                //             $config['max_width'] = '200000000';
                //             $config['max_height'] = '1000000000000';

                //             $this->load->library('upload', $config);
                //             // $this->load->library('upload');
                //             // $this->upload->initialize($config);

                //             if ( ! $this->upload->do_upload($key)) {
                //                 $error = array('error' => $this->upload->display_errors());
                //                 $post_image = 'noimage.png';

                //                 } else {
                //                     $data = array('upload_data' => $this->upload->data());
                //                     $post_image = $_FILES['userfile1']['name'];

                //                 }
                //         }

                //         if($key == "userfile2") {


                //             // Upload Videos
                //             $config2['upload_path'] = './assets/videos/posts/';
                //             $config2['allowed_types'] = 'mp4|avi|mov|flv|wmv';
                //             $config2['max_size'] = '0';
                //             $config2['max_width'] = '200000000';
                //             $config2['max_height'] = '1000000000000';

                //             $this->load->library('upload', $config2);
                //             // $this->upload->initialize($config2);


                //             if(!$this->upload->do_upload($key)) {
                //             $errors = array('error' => $this->upload->display_errors());
                //             // $post_image = 'noimage.png';

                //             } else {
                //                 $data = array('upload_data' => $this->upload->data());
                //                 // $post_image = $_FILES['userfile1']['name'];
                //                 $post_video = $_FILES['userfile2']['name'];

                //             }
                //         }


                        

                //     }
                // }

                    // $post_files = [$post_image, $post_video];

                    // // $this->post_model->create_post($post_image);
                    // $this->post_model->create_post($post_files);

                    // $this->session->set_flashdata('post_created', 
                    // 'Your post has been created');


                    // redirect('posts');


            }

        }
        

        public function delete($id) {

 
            if(!$this->session->userdata('logged_in')) {
                redirect('users/login');
            }

             $this->post_model->delete_post($id);

        
            $this->session->set_flashdata('post_deleted', 'Your post has been deleted');
           
            redirect('posts');
        }

        public function edit($slug) {
    
			if(!$this->session->userdata('logged_in')){
				redirect('users/login');
            }
            
            $data['post'] = $this->post_model->get_posts($slug);

        
			if($this->session->userdata('user_id') != $this->post_model->get_posts($slug)['user_id']){
				redirect('posts');
            }
            
            $data['categories'] = $this->post_model->get_categories();
            
			if(empty($data['post'])){
				show_404();
			}

			$data['title'] = 'Edit Video';

			$this->load->view('templates/header');
			$this->load->view('posts/edit', $data);
			$this->load->view('templates/footer');
        }


        public function update() {
        
			if(!$this->session->userdata('logged_in')){
				redirect('users/login');
			}

			$this->post_model->update_post();

			$this->session->set_flashdata('post_updated', 'Your post has been updated');

			redirect('posts');
        }

        


    }