<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Ajax_call extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if ($this->session->userdata('check')) {
            
        } else {
            redirect(base_url() . 'login');
        }
        $this->load->model("manage_student_model");
        $this->load->model("creation_model");
    }

    public function select_student($field_1, $field_1, $field_1, 'student'){
        $field_1 = trim($field_1); 
        $field_2 = trim($field_2); 
        $field_3 = trim($field_3); 

        $student_list = list=$this->ajax_call_model->getAllWhere(array('student_class'=> $did), array('student_shift'=> $did), array('student_section'=> $did), 'student') ; 

        echo json_encode($student_list) ; 

    }
}