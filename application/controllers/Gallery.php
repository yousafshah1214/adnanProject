<?php
/**
 * Created by PhpStorm.
 * User: Kodemania
 * Date: 03/11/2015
 * Time: 2:49 PM
 */

class Gallery extends CI_Controller{

    /**
     *
     */
    public function index(){
        // showing gallery page with pagination
        $perpage = 8;

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
        $this->db->where('type','gallery');
        $this->db->order_by('id','DESC');

        $queryTotal      =   $this->db->get('posts');

        // getting blog posts for page

        $this->db->limit($end,$start);
        $this->db->where('type','gallery');
        $this->db->order_by('id','DESC');
        $query      =   $this->db->get('posts');

        // starting pagination
        $this->load->library('pagination');

        $config['base_url']     =   site_url('gallery/index');
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

        if($query->num_rows() > 0){
            $data['galleries']      =   $query->result();
        }
        else{
            $data['galleries']      =   $query->result();
        }
        $this->load->view('gallery.php',$data);
    }

} 