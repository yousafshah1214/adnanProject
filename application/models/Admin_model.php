<?php
/**
 * Created by PhpStorm.
 * User: Kodemania
 * Date: 18/10/2015
 * Time: 8:05 PM
 */

class Admin_model extends CI_Model{

    public function __construct(){
        parent::__construct();
    }

    public function get_all_units(){
        $this->db->order_by('id','DESC');
        $query = $this->db->get('units');
        return $query->result();
    }

    public function insert_unit($unitData){
        $data['title'] = $unitData['unit'];
        $this->db->insert('units',$data);
    }

    public function update_unit($unitData){
        $data['title'] = $unitData['unit'];
        $this->db->where('id',$unitData['id']);
        $this->db->update('units', $data);
    }

    public function delete_unit($id){
        $this->db->where('id',$id);
        $this->db->delete('units');
    }

    public function get_all_universities(){
        $this->db->order_by('id','DESC');
        $query = $this->db->get('universities');
        return $query->result();
    }

    public function insert_university($uniData){
        // uniData contains array keys which are column names.
        // in this case we can do insert code directly.

        // inserting data of university in database
        $this->db->insert('universities',$uniData);
    }

    public function update_university($uniData){
        $data['name'] = $uniData['name'];
        $data['link'] = $uniData['link'];
        $this->db->where('id',$uniData['id']);
        $this->db->update('universities', $data);
    }

    public function delete_university($id){
        $this->db->where('id',$id);
        $this->db->delete('universities');
    }

    public function get_all_events(){
        $this->db->order_by('id','DESC');
        $query = $this->db->get('events');
        return $query->result();
    }

    public function insert_event($eventData){
        $data['title']          =   $eventData['title'];
        $data['description']    =   $eventData['desc'];
        $data['date']           =   $eventData['date'];
        $data['type']           =   $eventData['type'];
        $data['city']           =   $eventData['city'];
        $data['country']        =   $eventData['country'];
        $data['featured_image'] =   $eventData['file'];

        $this->db->insert('events',$data);
    }

    public function update_event($eventData){
        $data['title']          =   $eventData['title'];
        $data['description']    =   $eventData['desc'];
        $data['date']           =   $eventData['date'];
        $data['type']           =   $eventData['type'];
        $data['city']           =   $eventData['city'];
        $data['country']        =   $eventData['country'];
        $data['featured_image'] =   $eventData['file'];

        $this->db->where('id',$eventData['id']);
        $this->db->update('events',$data);
    }

    public function delete_event($id){
        $this->db->where('id',$id);
        $this->db->delete('events');
    }

    public function update_chairman($chairmanData){
        $data['heading']            =   $chairmanData['name'];
        $data['content']            =   $chairmanData['desc'];
        $data['excerpt']            =   $chairmanData['excerpt'];

        if(strlen($chairmanData['file']) > 0){
            // file is uploading and has to include in database
            $data['featured_img']   =   $chairmanData['file'];
        }

        $this->db->where('type','message');
        $this->db->update('posts',$data);
    }

    public function update_overview($overviewData){
        $data['content']            =   $overviewData['desc'];
        $data['excerpt']            =   $overviewData['excerpt'];

        if(strlen($overviewData['file']) > 0){
            // file is uploading and has to include in database
            $data['featured_img']   =   $overviewData['file'];
        }

        $this->db->where('type','overview');
        $this->db->update('posts',$data);
    }

    public function get_all_slides(){
        // get all slides

        $this->db->where('type','slide');
        $query = $this->db->get('posts');
        return $query->result();
    }

    public function insert_slide($slideData){
        // insert slide

        $data['content']            =   $slideData['desc'];
        $data['heading']            =   $slideData['title'];
        $data['type']               =   'slide';

        if(strlen($slideData['file']) > 0){
            // file is uploading and has to include in database
            $data['featured_img']   =   $slideData['file'];
        }

        $this->db->insert('posts',$data);
    }

    public function update_slide($slideData){
        // insert slide

        $data['content']            =   $slideData['desc'];
        $data['heading']            =   $slideData['title'];

        if(strlen($slideData['file']) > 0){
            // file is uploading and has to include in database
            $data['featured_img']   =   $slideData['file'];
        }

        $this->db->where('id',$slideData['id']);
        $this->db->update('posts',$data);
    }

    public function delete_slide($id){
        $this->db->where('id',$id);
        $this->db->where('type','slide');
        $this->db->delete('posts');
    }

    public function verifyLogin(){
        //password_hash("rasmuslerdorf", PASSWORD_DEFAULT);
        $username = $this->security->xss_clean($this->input->post('username'));
        $password = $this->security->xss_clean($this->input->post('password'));

        $this->db->where('username',$username);
        $this->db->where('role','1'); // 1 equals admin
        $query = $this->db->get('users');

        if($query->num_rows() == 1){
            // user found but password not verified yet

            $users = $query->result();
            $admin = $users[0];
            $passwordHashed = $admin->password;

            if(password_verify($password,$passwordHashed)){
                // user password matched
                // user is verified.
                return true;
            }
            else{
                return false;
            }
        }
        else{
//            echo "<pre>";
//            print_r($query);
//            echo "</pre>";
//            die();
            return false;
        }
    }

} 