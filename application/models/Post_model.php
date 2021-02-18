<?php
    class Post_model extends CI_Model {
        public function __construct() {
            $this->load->database();

        }

        public function get_posts($slug = False) {
            if($slug === FALSE) {
                $this->db->order_by('posts.id', 'DESC');
                $this->db->join('categories', 'categories.id = posts.category_id');
                $query = $this->db->get('posts');
                return $query->result_array();

            }

            $query = $this->db->get_where('posts', array('slug' => $slug));
            return $query->row_array();
        }

        public function create_post($post_video) {
            $slug = url_title($this->input->post('title'));

            $data = array(
                'title' => $this->input->post('title'),
                'slug' => $slug,
                'description' => $this->input->post('description'),
                'category_id' => $this->input->post('category_id'),
                'user_id' => $this->session->userdata('user_id'),
                // 'post_image' => $post_files[0],
                // 'video' => $post_files[1]
                'video' => $post_video
            );

            return $this->db->insert('posts', $data);

        }


        public function delete_post($id) {
            $this->db->where('id', $id);
            $this->db->delete('posts');
            return true;
        }

        public function update_post() {
            $slug = url_title($this->input->post('title'));

            $data = array(
                'title' => $this->input->post('title'),
                'slug' => $slug,
                'description' => $this->input->post('description'),
                'category_id' => $this->input->post('category_id'),
                // 'post_image' => $this->input->post('post_image')
            );

            $this->db->where('id', $this->input->post('id'));
            return $this->db->update('posts', $data);
        }

        public function get_categories() {
            $this->db->order_by('id');
            $query = $this->db->get('categories');
            return $query->result_array();
        }

        public function get_posts_by_category($category_id) {
            $this->db->order_by('posts.id', 'DESC');
            $this->db->join('categories', 'categories.id = posts.category_id');
            $query = $this->db->get_where('posts', array('category_id' => $category_id));
            
            return $query->result_array();        }

    }