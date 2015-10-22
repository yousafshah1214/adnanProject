<?php
/**
 * Created by PhpStorm.
 * User: Kodemania
 * Date: 17/10/2015
 * Time: 11:45 AM
 */

class Home extends CI_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->helper('url');
    }

    public function index(){
        // loading model
        $this->load->model('Home_model');

        // getting data from model
        $message = $this->Home_model->get_chairman_message();
        $overview = $this->Home_model->get_program_overview();
        $why_join = $this->Home_model->get_why_join();
        $slides = $this->Home_model->get_slider_images();
        $events = $this->Home_model->get_latest_events();
        $units = $this->Home_model->get_latest_units();
        $universities = $this->Home_model->get_universities();

        // sending data to array
        $data['message'] = $message[0];
        $data['overview'] = $overview[0];
        $data['why_join'] = $why_join;
        $data['slides'] = $slides;
        $data['events'] = $events;
        $data['units'] = $units;
        $data['universities'] = $universities;

        // loading view with data.
        return $this->load->view('home',$data);
    }

} 