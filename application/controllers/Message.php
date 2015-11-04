<?php
/**
 * Created by PhpStorm.
 * User: Kodemania
 * Date: 03/11/2015
 * Time: 4:37 PM
 */

class Message extends CI_Controller{

    public function index(){
        // showing chairman msg
        $this->db->where('type','message');
        $query                  =       $this->db->get('posts');
        $overview               =       $query->result();
        $data['overview']       =       $overview[0];
        return $this->load->view('message.php',$data);
    }

} 