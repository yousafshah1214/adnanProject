<?php
/**
 * Created by PhpStorm.
 * User: Kodemania
 * Date: 18/10/2015
 * Time: 6:35 PM
 */

class Adminlogin extends CI_Controller{

    public function __construct(){
        parent::__construct();
        if($this->session->userdata('admin_logged_in') == 1){
            // admin is already logged in
            redirect('admin');
        }
        $this->load->helper('form');
    }

    public function index(){
        // showing login page
        return $this->load->view('admin/adminlogin.php');
    }

    public function verify(){
        // verifying admin credentials.

        // loading admin model
        $this->load->model('Admin_model');

        // calling method for verifying admin
        $verify = $this->Admin_model->verifyLogin();

        if($verify){
            // admin found in database
            $username = $this->security->xss_clean($this->input->post('username'));

            $arr = array(
                'admin' => $username,
                'admin_logged_in' => true
            );

            $this->session->set_userdata($arr);

            redirect('admin');
        }
        else{
            // redirect to login page
            $this->session->set_flashdata('error',"Username or Password doesn't exists");
            redirect('adminlogin');
        }
    }

    public function test(){
        echo password_hash('yousafraza1214',PASSWORD_DEFAULT);
    }

} 