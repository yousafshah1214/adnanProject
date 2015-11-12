<?php
/**
 * Created by PhpStorm.
 * User: Kodemania
 * Date: 06/11/2015
 * Time: 2:10 AM
 */

class Event extends CI_Controller{

    public function index(){
        // featured events
        $this->db->where('featured','1');
        $this->db->where('date >=',time());
        $this->db->order_by('id','DESC');
        $this->db->limit(1);
        $featured               =   $this->db->get('events');
        $data['featured']       =   $featured->result();

        // recent events
        $this->db->where('date <=',time());
        $this->db->order_by('id','DESC');
        $this->db->limit(5);
        $recent               =   $this->db->get('events');
        $data['recent']       =   $recent->result();

        // categories
        $this->db->where('type','event');
        $query2 = $this->db->get('categories');
        if($query2->num_rows() > 0){
            $data['categories']     =       $query2->result();
        }
        else{
            $data['categories']     =       array();
        }

        $perpage = 3;

        $page = $this->security->xss_clean($this->uri->segment(3,0));

        if($page == 0){
            $start = 0;
        }
        else{
            $start = ($page-1) * $perpage;
        }

        // get total blog posts
        $this->db->where('date >=',time());
        $queryTotal      =   $this->db->get('events');

        // getting blog posts for page

        $this->db->where('date >=',time());
        $this->db->limit($perpage,$start);
        $this->db->order_by('id','DESC');
        $query      =   $this->db->get('events');

        // starting pagination
        $this->load->library('pagination');

        $config['base_url']     =   site_url('event/index');
        $config['total_rows']   =   $queryTotal->num_rows();
        $config['per_page']     =   $perpage;
        $config['use_page_numbers'] = TRUE;
        $config['display_pages'] = FALSE;

        $config['full_tag_open'] = '<nav class="nav-np">';
        $config['full_tag_close'] = '</nav>';
        $config['prev_link'] = '';
        $config['prev_tag_open'] = '<span class="prev">';
        $config['prev_tag_close'] = '</span>';
        $config['next_link'] = '';
        $config['next_tag_open'] = '<span class="next">';
        $config['next_tag_close'] = '</span>';

        $config['attributes'] = array('class' => 'pagination_anchor');

        $this->pagination->initialize($config);

        $data['pagination']         =       $this->pagination->create_links();
        // all events
        $data['events']             =       $query->result();


        return $this->load->view('events.php',$data);
    }

    public function category(){
        // category page. show related posts
        $category = $this->security->xss_clean($this->uri->segment(3,0));
        $this->db->where('type','event');
        $this->db->where('category',$category);

        $categoryQuery = $this->db->get('categories');

        if($categoryQuery->num_rows() == 1){
            // category found
            $categoryObj        =   $categoryQuery->result();
            $category           =   $categoryObj[0];

            // featured events
            $this->db->where('featured','1');
            $this->db->where('date >=',time());
            $this->db->order_by('id','DESC');
            $this->db->limit(1);
            $featured               =   $this->db->get('events');
            $data['featured']       =   $featured->result();

            // recent events
            $this->db->where('date <=',time());
            $this->db->order_by('id','DESC');
            $this->db->limit(5);
            $recent               =   $this->db->get('events');
            $data['recent']       =   $recent->result();

            // categories
            $this->db->where('type','event');
            $query2 = $this->db->get('categories');
            if($query2->num_rows() > 0){
                $data['categories']     =       $query2->result();
            }
            else{
                $data['categories']     =       array();
            }

            $perpage = 3;

            $page = $this->security->xss_clean($this->uri->segment(4,0));

            if($page == 0){
                $start = 0;
            }
            else{
                $start = ($page-1) * $perpage;
            }
//
//            $end = ($start + $perpage);

            // get total blog posts
            $this->db->where('date >=',time());
            $this->db->where('category_id',$category->id);
            $queryTotal      =   $this->db->get('events');

            // getting blog posts for page


            $this->db->limit($perpage,$start);
            $this->db->where('date >=',time());
            $this->db->where('category_id',$category->id);
            $this->db->order_by('id','DESC');
            $query      =   $this->db->get('events');

            // starting pagination
            $this->load->library('pagination');

            $config['base_url']     =   site_url('event/category/'.$category->category);
            $config['total_rows']   =   $queryTotal->num_rows();
            $config['per_page']     =   $perpage;
            $config['use_page_numbers'] = TRUE;
            $config['display_pages'] = FALSE;

            $config['full_tag_open'] = '<nav class="nav-np">';
            $config['full_tag_close'] = '</nav>';
            $config['prev_link'] = '';
            $config['prev_tag_open'] = '<span class="prev">';
            $config['prev_tag_close'] = '</span>';
            $config['next_link'] = '';
            $config['next_tag_open'] = '<span class="next">';
            $config['next_tag_close'] = '</span>';

            $config['attributes'] = array('class' => 'pagination_anchor');

            $this->pagination->initialize($config);

            $data['pagination']         =       $this->pagination->create_links();
            // all events
            $data['events']             =       $query->result();


            return $this->load->view('events.php',$data);
        }
        else{
            // category not found
            show_404('page');
        }
    }

    public function detail(){
        // show event detail page
        $id = $this->security->xss_clean($this->uri->segment(3,0));

        $this->db->where('id',$id);
        $query      =   $this->db->get('events');

        if($query->num_rows() == 1){
            // event found

            // upcoming events
            $this->db->where('date >=',time());
            $this->db->where('id !=',$id);
            $this->db->limit(2);
            $upComingQuery      =   $this->db->get('events');
            if($upComingQuery->num_rows() > 0){
                $data['related']    =   $upComingQuery->result();
            }
            else{
                $data['related']    =   array();
            }

            $this->db->where('type','event');
            $categoryQuery      =   $this->db->get('categories');
            if($categoryQuery->num_rows() > 0){
                $data['categories']    =   $categoryQuery->result();
            }
            else{
                $data['categories']    =   array();
            }

            // event
            $events             =   $query->result();
            $data['event']      =   $events[0];
            return $this->load->view('single-event.php',$data);
        }
        else{
            // event not found
            show_404('page');
        }
    }

} 