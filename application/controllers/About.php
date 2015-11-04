<?php
/**
 * Created by PhpStorm.
 * User: Kodemania
 * Date: 03/11/2015
 * Time: 4:08 PM
 */

class About extends CI_Controller{

    public function index(){
        $this->db->where('type','overview');
        $query                  =       $this->db->get('posts');
        $overview               =       $query->result();
        $data['overview']       =       $overview[0];
        return $this->load->view('about-us.php',$data);
    }

} 