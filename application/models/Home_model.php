<?php
/**
 * Created by PhpStorm.
 * User: Kodemania
 * Date: 17/10/2015
 * Time: 3:28 PM
 */

class Home_model extends CI_Model{

    public function __construct(){
        parent::__construct();
    }

    public function get_chairman_message(){
        $query = $this->db->get_where('posts',array('type' => 'message'));
        return $query->result();
    }

    public function get_program_overview(){
        $query = $this->db->get_where('posts',array('type' => 'overview'));
        return $query->result();
    }

    public function get_why_join(){
        $this->db->limit(10);
        $query = $this->db->get_where('posts',array('type' => 'join'));
        return $query->result();
    }

    public function get_slider_images(){
        $this->db->order_by('id','DESC');
        $query = $this->db->get_where('posts',array('type' => 'slide'));
        return $query->result();
    }

    public function get_latest_events(){
        $this->db->limit(3);
        $this->db->order_by('id','DESC');
        $query = $this->db->get('events');
        return $query->result();
    }

    public function get_latest_units(){
        $this->db->order_by('id','DESC');
        $query = $this->db->get('units');
        return $query->result();
    }

    public function get_universities(){
        $this->db->order_by('id','DESC');
        $query = $this->db->get('universities');
        return $query->result();
    }
} 