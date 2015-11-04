<?php
/**
 * Created by PhpStorm.
 * User: Kodemania
 * Date: 30/10/2015
 * Time: 3:52 PM
 */

class Blog extends CI_Controller{

    public function index(){

        $perpage = 6;

        $page = $this->security->xss_clean($this->uri->segment(3,0));
        if($page == 0){
            $start = ($page * $perpage);
        }
        else{
            $start = ($page * $perpage) - 1;
        }

        $end = ($start + $perpage);

//        echo $start.'   '.$end;
//        die();
        // get total blog posts
        $this->db->where('type','blog');
        $this->db->order_by('id','DESC');

        $queryTotal      =   $this->db->get('posts');

        // getting blog posts for page

        $this->db->limit($end,$start);
        $this->db->where('type','blog');
        $this->db->order_by('id','DESC');
        $query      =   $this->db->get('posts');

        // starting pagination
        $this->load->library('pagination');

        $config['base_url']     =   site_url('blog/index');
        $config['total_rows']   =   $queryTotal->num_rows();
        $config['per_page']     =   $perpage;
        $config['use_page_numbers'] = TRUE;

        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a>';
        $config['cur_tag_close'] = '</a></li>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';


        $this->pagination->initialize($config);

        $data['pagination']         =       $this->pagination->create_links();

        $this->db->where('type','blog');
        $query2 = $this->db->get('categories');
        if($query2->num_rows() > 0){
            $data['categories']     =       $query2->result();
        }
        else{
            $data['categories']     =       array();
        }
        $data['blogs']          =       $query->result();
        return $this->load->view('blog.php',$data);
    }

    public function post(){
        $id = $this->security->xss_clean($this->uri->segment(3,0));

        $this->db->where('type','blog');
        $this->db->where('id',$id);
        $query = $this->db->get('posts');

        if($query->num_rows() == 1){
            // post found

            // get categories
            $this->db->where('type','blog');
            $query2 = $this->db->get('categories');
            if($query2->num_rows() > 0){
                $data['categories']     =       $query2->result();
            }
            else{
                $data['categories']     =       array();
            }

            // get related posts
            $this->db->where('type','blog');
            $this->db->where('id !=',$id);
            $this->db->order_by('id','RANDOM');
            $this->db->limit(2);
            $query3 = $this->db->get('posts');

            if($query3->num_rows() > 0){
                $data['relatedPosts']       =   $query3->result();
            }
            else{
                $data['relatedPosts']       =   array();
            }

            // get post and load view
            $result = $query->result();
            $data['post']       =   $result[0];
            return $this->load->view('blog-post.php',$data);
        }
        else{
            show_404('page');
        }
    }
} 