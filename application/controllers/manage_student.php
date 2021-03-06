<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Manage_student extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if ($this->session->userdata('check')) {
            
        } else {
            redirect(base_url() . 'login');
        }
        $this->load->model("manage_student_model");
        $this->load->model("creation_model");
    }

    public function add_student() {
        $data['title'] = 'Add student';
        $data['class_list'] = $this->creation_model->class_list();
        $data['group_list'] = $this->creation_model->group_list();
        $data['shift_list'] = $this->creation_model->shift_list();
        $data['section_list'] = $this->creation_model->section_list();
        $data['optional_list'] = $this->creation_model->optional_list();
        $data['version_list'] = $this->creation_model->version_list();
        $data['hostel_list'] = $this->creation_model->hostel_list();
        $this->load->view('header', $data);
        $this->load->view('sidemenu');
        $this->load->view('add_student', $data);
        $this->load->view('footer');
    }

    public function student_list() {
        $data['title'] = 'Student List';

        $data['class_list'] = $this->creation_model->class_list();
        $data['shift_list'] = $this->creation_model->shift_list();
        $data['section_list'] = $this->creation_model->section_list();
        
        $data['student_list'] = $this->manage_student_model->getAll('student');
        
        $this->load->view('header', $data);
        $this->load->view('sidemenu');
        $this->load->view('student_list', $data);
        $this->load->view('footer');
    }

    public function create_student() {

        $data['title'] = 'Create student';
        $this->load->library('form_validation');
        $this->form_validation->set_rules('student_name', 'student Name', 'trim|required|xss_clean');
        $this->form_validation->set_rules('student_father_name', 'student Father Name', 'trim|required|xss_clean');
        $this->form_validation->set_rules('student_mother_name', 'Student Mother Name', 'trim|required|xss_clean');
        $this->form_validation->set_rules('student_unique_code', 'Unique Code', 'trim|required|xss_clean');
        $this->form_validation->set_rules('student_gender', 'Gender', 'trim|required|xss_clean');
        $this->form_validation->set_rules('student_date_of_birth', 'Date of Birth', 'trim|required|xss_clean');
        $this->form_validation->set_rules('student_email', 'student_email', 'trim|required|xss_clean');
        $this->form_validation->set_rules('student_mobile', 'student mobile', 'trim|required|xss_clean');
        $this->form_validation->set_rules('student_academic_year', ' Academic Year', 'trim|required|xss_clean');
        $this->form_validation->set_rules('student_class', 'student_class', 'trim|required|xss_clean');
        $this->form_validation->set_rules('student_class_position', 'Class Position', 'trim|required|xss_clean');
        $this->form_validation->set_rules('student_shift', 'student_shift', 'trim|required|xss_clean');
        $this->form_validation->set_rules('student_section', 'student section', 'trim|required|xss_clean');
        $this->form_validation->set_rules('student_version', 'student version', 'trim|required|xss_clean');
        $this->form_validation->set_rules('student_religion', 'student religion', 'trim|required|xss_clean');
        $this->form_validation->set_rules('student_nationality', 'student_nationality', 'trim|required|xss_clean');
        $this->form_validation->set_rules('student_address', 'student_address', 'trim|required|xss_clean');
        $this->form_validation->set_rules('student_active', 'student active', 'trim|required|xss_clean');
        $this->form_validation->set_rules('student_transport', 'student transport', 'trim|required|xss_clean');
        $this->form_validation->set_rules('student_resident', 'student resident', 'trim|required|xss_clean');
        $this->form_validation->set_rules('student_day_care', 'student day care', 'trim|required|xss_clean');



        if ($this->form_validation->run() === TRUE) {
            $this->add_student();
            //redirect("manage_student/add_student");
        } else {
            $this->load->helper('security');
            $this->load->helper('date');
            $datetime = new DateTime();

            $config['upload_path'] = './upload/students_pic/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            // $config['overwrite'] = TRUE;
//            echo '<pre>';
//            print_r($config['upload_path']);
//            exit();
            
            $config['overwrite'] = FALSE;
            $config['file_name'] = $datetime->format('U');

            $this->upload->initialize($config);

            $source_image = $image_info['file_name'];

            if ($this->upload->do_upload('photo')) {
                $image_info = $this->upload->data();

                $source_image = $image_info['file_name'];
            } else {
                echo $this->upload->display_errors();
            }
            $student_unique_code = $this->input->post('student_unique_code');
            $student_class_position = $this->input->post('student_class_position');
            $stu_class = $this->input->post('student_class');
            $data = array(
                'student_id' => '',
                'student_name' => $this->input->post('student_name'),
                'student_father_name' => $this->input->post('student_father_name'),
                'student_mother_name' => $this->input->post('student_mother_name'),
                'student_unique_code' => $student_unique_code,
                //'student_unique_code' => $this->input->post('student_unique_code'),				
                'student_gender' => $this->input->post('student_gender'),
                'student_date_of_birth' => date("Y/m/d", strtotime($this->input->post('student_date_of_birth'))),
                'student_email' => $this->input->post('student_email'),
                'student_mobile' => $this->input->post('student_mobile'),
                'student_academic_year' => $this->input->post('student_academic_year'),
                'student_class' => $stu_class,
                //'student_class' => $this->input->post('student_class'),
                //'student_class_position' => $this->input->post('student_class_position'),
                'student_class_position' => $student_class_position,
                'student_shift' => $this->input->post('student_shift'),
                'student_section' => $this->input->post('student_section'),
                'student_version' => $this->input->post('student_version'),
                'student_religion' => $this->input->post('student_religion'),
                'student_nationality' => $this->input->post('student_nationality'),
                'student_address' => $this->input->post('student_address'),
                'student_active' => $this->input->post('student_active'),
                'student_transport' => $this->input->post('student_transport'),
                'student_resident' => $this->input->post('student_resident'),
                'student_day_care' => $this->input->post('student_day_care'),
                'student_photo' => './upload/students_pic/' . $source_image
            );

            // echo '<pre>';
            //          print_r($data);
            //          echo '</pre>';
            //          exit();

            $session_data = $this->session->userdata('check');

            $position_check = $this->manage_student_model->check_student_position($student_class_position, $stu_class);

            if ($position_check) {
                $sData = array(
                    'action_status' => 2,
                    'action_message' => 'This Position already Exists !'
                );
                $this->session->set_userdata($sData);
                redirect(base_url() . 'manage_student/add_student/failed');
            } else {
                $uni_check = $this->manage_student_model->check_student_unique_code($student_unique_code);
                if ($uni_check) {
                    $sData = array(
                        'action_status' => 2,
                        'action_message' => 'This Code already Exists !'
                    );
                    $this->session->set_userdata($sData);
                    redirect(base_url() . 'student_management/add_student/failed');
                } else {

                    $flag = $this->manage_student_model->add_student($data);
                    if (!$flag) {
                        $sData = array(
                            'action_status' => 2,
                            'action_message' => 'Insertion Failed !'
                        );
                        $this->session->set_userdata($sData);
                        redirect(base_url() . 'manage_student/add_student/failed');
                    } else {
                        $sData = array(
                            'action_status' => 1,
                            'action_message' => 'Successfully Inserted !'
                        );
                        $this->session->set_userdata($sData);
                        redirect(base_url() . 'manage_student/add_student/success');
                    }
                }
            }
        }
    }

    public function studentname_check($name) {

        $flag = $this->student_model->student_check($name);

        if ($flag) {
            $this->form_validation->set_message('studentname_check', 'The studentname is already used');
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function list_student() {
        $session_data = $this->session->userdata('check');
//        echo $session_data['school_code'];
//        exit();

        $data['lists'] = $this->student_model->student_list($session_data['school_code']);
        $data['title'] = 'student List';
        $this->load->view('header', $data);
        $this->load->view('sidemenu');
        $this->load->view('list_student', $data);
        $this->load->view('footer');
    }

    public function student_edit($student_id = '') {

        $data['lists'] = $this->student_model->edit_student_list($student_id);
        $data['title'] = 'student Edit';
        $this->load->view('header', $data);
        $this->load->view('sidemenu');
        $this->load->view('student_edit', $data);
        $this->load->view('footer');
    }

    public function student_edit_action() {
        $this->load->library('form_validation');
        $id = $this->input->post('id');
        $password = $this->input->post('password');
        $this->form_validation->set_rules('password', 'Password', 'trim|xss_clean|matches[password1]');
        $this->form_validation->set_rules('password1', 'Password1', 'trim|xss_clean');
        $this->form_validation->set_rules('status', 'Status', 'trim|required|xss_clean');
        $this->form_validation->set_rules('student_role', 'student Role', 'trim|required|xss_clean');
        if ($this->form_validation->run() === FALSE) {
            $this->student_edit($id);
        } else {



            if ($password) {
                $data = array(
                    'student_password' => MD5($this->input->post('password')),
                    'student_status' => $this->input->post('status'),
                    'student_role' => $this->input->post('student_role')
                );
            } else {
                $data = array(
                    'student_status' => $this->input->post('status'),
                    'student_role' => $this->input->post('student_role')
                );
            }
            $this->load->model("student_model");
            $this->student_model->update_student($id, $data);
            redirect(base_url() . 'student/list_student/success');
        }
    }

    public function view_student($id = '') {
        $session_data = $this->session->userdata('check');
        $data['single_strudent_info'] = $this->student_model->get_single_student($id);

        //echo '<pre>';
        //print_r($data['single_strudent_info']);
        //echo '</pre>';
        //exit();
        $data['title'] = 'Student Profile';
        $this->load->view('header', $data);
        $this->load->view('sidemenu');
        $this->load->view('view_student', $data);
        $this->load->view('footer');
    }

}
