<?php
    class Categories extends CI_Controller {
        public function index() {

            $data['categories'] = $this->category_model->get_categories();

            $this->load->view('templates/header');

            $this->load->view('categories/index', $data);

            $this->load->view('templates/footer');

        }

        public function posts($id) {
            $data['title'] = $this->category_model->get_category($id)->name;
           
            $data['posts'] = $this->post_model->
                get_posts_by_category($id);

            $this->load->view('templates/header');

            $this->load->view('posts/index', $data);

            $this->load->view('templates/footer');

        } 



    }