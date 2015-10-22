<?php
/**
 * Created by PhpStorm.
 * User: Kodemania
 * Date: 17/10/2015
 * Time: 2:57 PM
 */

class Admin extends CI_Controller{

    public function __construct(){
        parent::__construct();

        if( ! ($this->session->userdata('admin_logged_in') == 1) ){
            // admin is not logged in
            redirect('adminlogin');
        }
        $this->load->model('Admin_model');

        // loading validation lib
        $this->load->library('form_validation');
    }

    public function index(){
        // index page for admin.

        return $this->load->view('admin/dashboard.php');
    }

    public function allunits(){
        // getting all units
        $units = $this->Admin_model->get_all_units();

        // putting in array for sending to view
        $data['units'] = $units;

        // showing add unit page.
        return $this->load->view('admin/allUnits.php',$data);
    }

    public function addUnit(){

        // loading form helper for generating forms
        $this->load->helper('form');

        // show new unit form
        return $this->load->view('admin/addUnit.php');
    }

    public function addUnitProcess(){
        // getting user data
        $unit = $this->security->xss_clean($this->input->post('title'));


        // setting validation rules
        $this->form_validation->set_rules('title', 'Unit name', 'required');

        // checking the validation failed or passed ?
        if($this->form_validation->run() == true){
            // validation passed now insert into database.
            $data['unit'] = $unit;
            $this->Admin_model->insert_unit($data);
            redirect('admin/allunits');
        }
        else{
            // validation failed load the same page with error msg
            return $this->addUnit();
        }
    }

    public function editUnit(){
        $unit_id = $this->security->xss_clean($this->uri->segment(3,0));
        $this->db->where('id',$unit_id);
        $query = $this->db->get('units');
        if($query->num_rows() == 1){
            // found the desired record.

            // getting data from query result
            $unitDataObj = $query->result();
            $data['unit'] = $unitDataObj[0];

            // loading view with data
            return $this->load->view('admin/editUnit.php',$data);
        }
        else{
            // redirect to all units page with flash message.
            $this->session->set_flashdata(array('error' => 'No Unit found please try again.'));
            redirect('admin/allunits');
        }
    }

    public function editUnitProcess(){
        // getting user data
        $unit = $this->security->xss_clean($this->input->post('title'));
        $id = $this->security->xss_clean($this->input->post('id'));

        // setting validation rules
        $this->form_validation->set_rules('title', 'Unit name', 'required');
        $this->form_validation->set_rules('id','Unit Id','required');

        // checking the validation failed or passed ?
        if($this->form_validation->run() == true){
            // validation passed now insert into database.
            $data['unit'] = $unit;
            $data['id'] = $id;

            // updating the record
            $this->Admin_model->update_unit($data);
            redirect('admin/allunits');
        }
        else{
            // validation failed load the same page with error msg
            return $this->editUnit();
        }
    }

    public function deleteUnit(){
        // get id from url
        $id = $this->security->xss_clean($this->uri->segment(3,0));

        // check in database.
        $this->db->where('id',$id);
        $query = $this->db->get('units');

        if($query->num_rows() == 1){
            // found record now delete it
            $this->Admin_model->delete_unit($id);
            redirect('admin/allunits');
        }
        else{
            // no record found on this id.
            $this->session->set_flashdata(array('error' => 'No record found on given ID'));
            redirect('admin/allunits');
        }
    }

    public function allUniversities(){
        // getting all universities
        $universities = $this->Admin_model->get_all_universities();

        // putting in array for sending to view
        $data['universities'] = $universities;

        // showing all universities page.
        return $this->load->view('admin/allUniversities.php',$data);
    }

    public function addUniversity(){
        // loading validation lib
        $this->load->library('form_validation');

        // show add university view.
        return $this->load->view('admin/addUniversity.php');
    }

    public function addUniversityProcess(){
        // process function for inserting university data.

        // getting user data
        $university = $this->security->xss_clean($this->input->post('title'));
        $link = $this->security->xss_clean($this->input->post('link'));

        // setting validation rules
        $this->form_validation->set_rules('title', 'University name', 'required');

        // validation of link is optional.
        if(strlen($link) > 0 && isset($link)){
            $this->form_validation->set_rules('link', 'University website', 'valid_url');
        }

        // checking the validation failed or passed ?
        if($this->form_validation->run() == true){
            // validation passed now insert into database.
            $data['name'] = $university;
            if(strlen($link) > 0 && isset($link)){
                $data['link'] = $link;
            }
            $this->Admin_model->insert_university($data);
            redirect('admin/allUniversities');
        }
        else{
            // validation failed load the same page with error msg
            return $this->addUniversity();
        }
    }

    public function editUniversity(){
        // getting id of university.
        $id = $this->security->xss_clean($this->uri->segment(3,0));

        $this->db->where('id',$id);
        $query = $this->db->get('universities');
        if($query->num_rows() == 1){
            // found the desired record.

            // getting data from query result
            $uniDataObj = $query->result();
            $data['university'] = $uniDataObj[0];

            // loading view with data
            return $this->load->view('admin/editUniversity.php',$data);
        }
        else{
            // redirect to all units page with flash message.
            $this->session->set_flashdata(array('error' => 'No Unit found please try again.'));
            redirect('admin/alluniversities');
        }
    }

    public function editUniversityProcess(){
        // process function for updating university data.

        // getting user data
        $university = $this->security->xss_clean($this->input->post('title'));
        $link = $this->security->xss_clean($this->input->post('link'));
        $id = $this->security->xss_clean($this->input->post('id'));


        // setting validation rules
        $this->form_validation->set_rules('title', 'University name', 'required');
        $this->form_validation->set_rules('id', 'University ID', 'required');

        // validation of link is optional.
        if(strlen($link) > 0 && isset($link)){
            $this->form_validation->set_rules('link', 'University website', 'valid_url');
        }

        // checking the validation failed or passed ?
        if($this->form_validation->run() == true){
            // validation passed now insert into database.
            $data['name'] = $university;
            $data['id'] = $id;
            if(strlen($link) > 0 && isset($link)){
                $data['link'] = $link;
            }

            $this->Admin_model->update_university($data);
            redirect('admin/allUniversities');
        }
        else{
            // validation failed load the same page with error msg
            return $this->addUniversity();
        }
    }

    public function deleteUniversity(){
        // get id from url
        $id = $this->security->xss_clean($this->uri->segment(3,0));

        // check in database.
        $this->db->where('id',$id);
        $query = $this->db->get('universities');

        if($query->num_rows() == 1){
            // found record now delete it
            $this->Admin_model->delete_university($id);
            redirect('admin/alluniversities');
        }
        else{
            // no record found on this id.
            $this->session->set_flashdata(array('error' => 'No record found on given ID'));
            redirect('admin/alluniversities');
        }
    }

    public function allEvents(){
        // getting all events
        $events = $this->Admin_model->get_all_events();

        // putting in array for sending to view
        $data['events'] = $events;

        // showing all events page.
        return $this->load->view('admin/allEvents.php',$data);
    }

    public function addEvent(){
        // showing page for adding Events

        return $this->load->view('admin/addEvent.php');
    }

    public function addEventProcess(){
        // add Event Process

        // setting rules for validation
        $this->form_validation->set_rules('title','Event Title','trim|required');
        // optional description validation
        if(strlen($this->input->post('description')) > 0){
            $this->form_validation->set_rules('description','Description','trim|required');
        }
        $this->form_validation->set_rules('type','Type','trim|required');
        $this->form_validation->set_rules('city','Event City','trim|required');
        $this->form_validation->set_rules('country','Event Country','trim|required');
        $this->form_validation->set_rules('day','Day','trim|required|numeric');
        $this->form_validation->set_rules('month','Month','trim|required|numeric');
        $this->form_validation->set_rules('year','Year','trim|required|numeric');

        $this->load->library('upload');

        // config for file upload and file validation
        $config['upload_path'] = './includes/images/';
        $config['allowed_types'] = 'jpg|png|jpeg';

        $this->upload->initialize($config);

        $uploadErrors = null;
        $img = null;

        // validation and file validation plus upload.
        if($this->form_validation->run() == true) {
            if (strlen($_FILES['userFile']['name']) > 0) {
                // file is submitted and have to upload it.
                if ($this->upload->do_upload('userFile')) {
                    // getting file data for upload.
                    $img = $this->upload->data();
                }
                else{
                    $uploadErrors = $this->upload->display_errors();
                }
            }

            $file_name = $img['file_name'];

            // getting data from user input.
            $title = $this->security->xss_clean($this->input->post('title'));
            $desc = $this->security->xss_clean($this->input->post('description'));
            $type = $this->security->xss_clean($this->input->post('type'));
            $city = $this->security->xss_clean($this->input->post('city'));
            $country = $this->security->xss_clean($this->input->post('country'));
            $day = $this->security->xss_clean($this->input->post('day'));
            $month = $this->security->xss_clean($this->input->post('month'));
            $year = $this->security->xss_clean($this->input->post('year'));

            // data array for model.
            $data['title'] = $title;
            $data['desc'] = $desc;
            $data['type'] = $type;
            $data['date'] = mktime(0, 0, 0, $month, $day, $year);
            $data['file'] = $file_name;
            $data['city'] = $city;
            $data['country'] = $country;

            // inserting data into database
            $this->Admin_model->insert_event($data);

            // redirect to all events page.
            redirect('admin/allEvents');
        }
        else {
            // showing add event page with errors
            $this->session->set_flashdata('error', $uploadErrors);
            $this->addEvent();
        }
   }

    public function editEvent(){
        $id = $this->security->xss_clean($this->uri->segment(3,0));

        // get this event data and send it to view.
        $this->db->where('id',$id);
        $query = $this->db->get('events');

        // checking for any record found or not
        if($query->num_rows() == 1){
            // record found now load view with data.
            $result = $query->result();

            // sending one data object to view
            $data['event'] = $result[0];

            $this->load->view('admin/editEvent.php',$data);
        }
        else{
            // no record found, redirect to all events.
            $this->session->set_flashdata('error','No record found. Please try again.');
            redirect('admin/allEvents');
        }
    }

    public function editEventProcess(){
        // edit Event Process

        // setting rules for validation
        $this->form_validation->set_rules('title','Event Title','trim|required');
        // optional description validation
        if(strlen($this->input->post('description')) > 0){
            $this->form_validation->set_rules('description','Description','trim|required');
        }
        $this->form_validation->set_rules('type','Type','trim|required');
        $this->form_validation->set_rules('city','Event City','trim|required');
        $this->form_validation->set_rules('country','Event Country','trim|required');
        $this->form_validation->set_rules('day','Day','trim|required|numeric');
        $this->form_validation->set_rules('month','Month','trim|required|numeric');
        $this->form_validation->set_rules('year','Year','trim|required|numeric');
        $this->form_validation->set_rules('id','Event ID','trim|required|numeric');

        $this->load->library('upload');

        // config for file upload and file validation
        $config['upload_path'] = './includes/images/';
        $config['allowed_types'] = 'jpg|png|jpeg';

        $this->upload->initialize($config);

        $uploadErrors = null;
        $img = null;

        // validation and file validation plus upload.
        if($this->form_validation->run() == true) {
            if (strlen($_FILES['userFile']['name']) > 0) {
                // file is submitted and have to upload it.
                if ($this->upload->do_upload('userFile')) {
                    // getting file data for upload.
                    $img = $this->upload->data();
                }
                else{
                    $uploadErrors = $this->upload->display_errors();
                }
            }

            $file_name = $img['file_name'];

            // getting data from user input.
            $title = $this->security->xss_clean($this->input->post('title'));
            $desc = $this->security->xss_clean($this->input->post('description'));
            $city = $this->security->xss_clean($this->input->post('city'));
            $country = $this->security->xss_clean($this->input->post('country'));
            $type = $this->security->xss_clean($this->input->post('type'));
            $day = $this->security->xss_clean($this->input->post('day'));
            $month = $this->security->xss_clean($this->input->post('month'));
            $year = $this->security->xss_clean($this->input->post('year'));
            $id = $this->security->xss_clean($this->input->post('id'));

            // data array for model.
            $data['title'] = $title;
            $data['desc'] = $desc;
            $data['city'] = $city;
            $data['country'] = $country;
            $data['type'] = $type;
            $data['date'] = mktime(0, 0, 0, $month, $day, $year);
            $data['file'] = $file_name;
            $data['id']   = $id;


            // inserting data into database
            $this->Admin_model->update_event($data);

            // redirect to all events page.
            redirect('admin/allEvents');
        }
        else {
            // showing add event page with errors
            $this->session->set_flashdata('error', $uploadErrors);
            redirect('admin/allEvents');
        }
    }

    public function deleteEvent(){
        // get id from url
        $id = $this->security->xss_clean($this->uri->segment(3,0));

        // check in database.
        $this->db->where('id',$id);
        $query = $this->db->get('events');

        if($query->num_rows() == 1){
            // found record now delete it
            $this->Admin_model->delete_event($id);
            redirect('admin/allevents');
        }
        else{
            // no record found on this id.
            $this->session->set_flashdata(array('error' => 'No record found on given ID'));
            redirect('admin/allevents');
        }
    }

    public function editChairmanMessage(){
        // chairman message entry must have to be in db when site is installed.
        // get chairman message from db and show on page for edits

        $this->db->where('type','message');
        $query = $this->db->get('posts');

        $result = $query->result();

        // data for view
        $data['chairman'] = $result[0];

        // loading view
        $this->load->view('admin/editChairman.php',$data);
    }

    public function editChairmanMessageProcess(){
        // chairman message edit process.

        // setting rules for validation
        $this->form_validation->set_rules('name','Chairman name','trim|required');
        $this->form_validation->set_rules('desc','Description','trim|required');
        $this->form_validation->set_rules('excerpt','Excerpt','trim|required');

        $this->load->library('upload');

        // config for file upload and file validation
        $config['upload_path'] = './includes/images/';
        $config['allowed_types'] = 'jpg|png|jpeg';

        $this->upload->initialize($config);

        $uploadErrors = null;
        $img = null;

        // validation and file validation plus upload.
        if($this->form_validation->run() == true) {
            if (strlen($_FILES['userFile']['name']) > 0) {
                // file is submitted and have to upload it.
                if ($this->upload->do_upload('userFile')) {
                    // getting file data for upload.
                    $img = $this->upload->data();
                }
                else{
                    $uploadErrors = $this->upload->display_errors();
                }
            }

            $file_name = $img['file_name'];

            // getting data from user input.
            $name = $this->security->xss_clean($this->input->post('name'));
            $desc = $this->security->xss_clean($this->input->post('desc'));
            $excerpt = $this->security->xss_clean($this->input->post('excerpt'));

            // data array for model.
            $data['name']       = $name;
            $data['desc']       = $desc;
            $data['excerpt']    = $excerpt;

            if(strlen($file_name) > 0){
                // file is uploading and has to include in database
                $data['file'] = $img;
            }

            // inserting data into database
            $this->Admin_model->update_chairman($data);

            // redirect to all events page.
            redirect('admin');
        }
        else {
            // showing add event page with errors
            $this->session->set_flashdata('error', $uploadErrors);
            $this->editChairmanMessage();
        }
    }

    public function editOverview(){
        // Program Overview entry must have to be in db when site is installed.
        // get chairman message from db and show on page for edits

        $this->db->where('type','overview');
        $query = $this->db->get('posts');

        $result = $query->result();

        // data for view
        $data['overview'] = $result[0];

        // loading view
        $this->load->view('admin/editOverview.php',$data);
    }

    public function editOverviewProcess(){
        // setting rules for validation
        $this->form_validation->set_rules('desc','Description','trim|required');
        $this->form_validation->set_rules('excerpt','Excerpt','trim|required');

        $this->load->library('upload');

        // config for file upload and file validation
        $config['upload_path'] = './includes/images/';
        $config['allowed_types'] = 'jpg|png|jpeg';

        $this->upload->initialize($config);

        $uploadErrors = null;
        $img = null;

        // validation and file validation plus upload.
        if($this->form_validation->run() == true) {
            if (strlen($_FILES['userFile']['name']) > 0) {
                // file is submitted and have to upload it.
                if ($this->upload->do_upload('userFile')) {
                    // getting file data for upload.
                    $img = $this->upload->data();
                }
                else{
                    $uploadErrors = $this->upload->display_errors();
                }
            }

            $file_name = $img['file_name'];

            // getting data from user input.
            $desc = $this->security->xss_clean($this->input->post('desc'));
            $excerpt = $this->security->xss_clean($this->input->post('excerpt'));

            // data array for model.
            $data['desc']       = $desc;
            $data['excerpt']    = $excerpt;

            if(strlen($file_name) > 0){
                // file is uploading and has to include in database
                $data['file'] = $img;
            }

            // inserting data into database
            $this->Admin_model->update_overview($data);

            // redirect to all events page.
            redirect('admin');
        }
        else {
            // showing add event page with errors
            $this->session->set_flashdata('error', $uploadErrors);
            $this->editOverview();
        }
    }

    public function allslides(){
        // showing all slides

        $data['slides'] = $this->Admin_model->get_all_slides();

        $this->load->view('admin/allslides.php',$data);
    }

    public function addSlide(){
        // add slide to database.

        $this->load->view('admin/addSlide.php');
    }

    public function addSlideProcess(){
        // add slide process

        // setting rules for validation
        $this->form_validation->set_rules('title','Slide Title','trim|required');

        // optional description
        if(strlen($this->input->post('description')) > 0){
            $this->form_validation->set_rules('description','Description','trim|required');
        }

        $this->load->library('upload');

        // config for file upload and file validation
        $config['upload_path'] = './includes/images/';
        $config['allowed_types'] = 'jpg|png|jpeg';

        $this->upload->initialize($config);

        $uploadErrors = null;
        $img = null;

        // validation and file validation plus upload.
        if($this->form_validation->run() == true) {
            if (strlen($_FILES['userFile']['name']) > 0) {
                // file is submitted and have to upload it.
                if ($this->upload->do_upload('userFile')) {
                    // getting file data for upload.
                    $img = $this->upload->data();
                }
                else{
                    $uploadErrors = $this->upload->display_errors();
                }
            }

            $file_name = $img['file_name'];

            // getting data from user input.
            $desc = $this->security->xss_clean($this->input->post('description'));
            $title = $this->security->xss_clean($this->input->post('title'));

            // data array for model.
            $data['desc']       = $desc;
            $data['title']    = $title;

            if(strlen($file_name) > 0){
                // file is uploading and has to include in database
                $data['file'] = $img;
            }

            // inserting data into database
            $this->Admin_model->insert_slide($data);

            // redirect to all events page.
            redirect('admin/allslides');
        }
        else {
            // showing add event page with errors
            $this->session->set_flashdata('error', $uploadErrors);
            $this->addSlide();
        }
    }

    public function editSlide(){
        // get id for fetching record from database.
        $id = $this->security->xss_clean($this->uri->segment(3,0));

        $this->db->where('id',$id);
        $this->db->where('type','slide');
        $query = $this->db->get('posts');

        if($query->num_rows() == 1){
            // record found now load edit view with data

            $result = $query->result();
            $data['slide'] = $result[0];

            // load view with data
            $this->load->view('admin/editSlide.php',$data);
        }
        else{
            // no record found
            $this->session->set_flashdata('error','No Record found. Please try again');
            redirect('admin/allslides');
        }
    }

    public function editSlideProcess(){
        // edit slide process

        // setting rules for validation
        $this->form_validation->set_rules('title','Slide Title','trim|required');
        $this->form_validation->set_rules('id','Slide ID','trim|required');

        // optional description
        if(strlen($this->input->post('description')) > 0){
            $this->form_validation->set_rules('description','Description','trim|required');
        }

        $this->load->library('upload');

        // config for file upload and file validation
        $config['upload_path'] = './includes/images/';
        $config['allowed_types'] = 'jpg|png|jpeg';

        $this->upload->initialize($config);

        $uploadErrors = null;
        $img = null;

        // validation and file validation plus upload.
        if($this->form_validation->run() == true) {
            if (strlen($_FILES['userFile']['name']) > 0) {
                // file is submitted and have to upload it.
                if ($this->upload->do_upload('userFile')) {
                    // getting file data for upload.
                    $img = $this->upload->data();
                }
                else{
                    $uploadErrors = $this->upload->display_errors();
                }
            }

            $file_name = $img['file_name'];

            // getting data from user input.
            $desc = $this->security->xss_clean($this->input->post('description'));
            $title = $this->security->xss_clean($this->input->post('title'));
            $id = $this->security->xss_clean($this->input->post('id'));

            // data array for model.
            $data['desc']       = $desc;
            $data['title']    = $title;
            $data['id']    = $id;

            if(strlen($file_name) > 0){
                // file is uploading and has to include in database
                $data['file'] = $img;
            }

            // inserting data into database
            $this->Admin_model->update_slide($data);

            // redirect to all events page.
            redirect('admin/allslides');
        }
        else {
            // showing add event page with errors
            $this->session->set_flashdata('error', $uploadErrors);
            $this->editSlide();
        }
    }

    public function deleteSlide(){
        $id = $this->security->xss_clean($this->uri->segment(3,0));

        $this->db->where('id',$id);
        $this->db->where('type','slide');
        $query = $this->db->get('posts');

        if($query->num_rows() == 1){
            // record found
            $this->Admin_model->delete_slide($id);
            redirect('admin/allslides');
        }
        else{
            // no record found
            $this->session->set_flashdata(array('error' => 'No record found on given ID'));
            redirect('admin/allslides');
        }
    }



    public function logout(){
        $arr = array(
            'username',
            'admin_logged_in'
        );

        $this->session->unset_userdata($arr);

        redirect('adminlogin');
    }
} 