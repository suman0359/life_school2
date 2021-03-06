<?php

class Manage_student_model extends CI_Model {

    public function add_student($data) {
        $result = $this->db->insert("student", $data);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    // Get All Data by Table and Order Peramiter 
    public function getAll($table_name,$order=NULL){
        $this->db->where('status !=', 0);
        if(!($order==NULL))
        {
            $this->db->order_by($order);
        }
        $query = $this->db->get($table_name)->result_array();
        return $query ;
    }

    public function student_list($school_code) {
        $this->db->where('student.school_code', $school_code);
        $query = $this->db->get('student');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else
            return false;
    }

    public function student_check($name) {
        $query = $this->db->query("SELECT * FROM student WHERE first_Name='" . $name . "' ");
        return $query->result();
    }

    public function edit_student_list($id) {
        $query = $this->db->query("SELECT * FROM student WHERE student_id=$id ");
        return $query->result();
    }

    public function update_student($student_id, $data) {
        $this->db->where('student_id', $student_id);
        if ($this->db->update('student', $data))
            return true;
        else
            return false;
    }

    public function check_student_unique_code($student_unique_code) {
        //$this->db->where('student.school_code', $school_code);
        $this->db->where('student.student_unique_code', $student_unique_code);
        $query = $this->db->get('student');
        if ($query->num_rows() > 0) {
            return true;
        } else
            return false;
    }

    public function check_student_position($student_class_position, $stu_class) {
        //$this->db->where('student.school_code', $school_code);
        $this->db->where('student.student_class_position', $student_class_position);
        $this->db->where('student.student_class', $stu_class);
        $query = $this->db->get('student');
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function get_single_student($id) {
        $this->db->where('student.student_id', $id);
        $query = $this->db->get('student');
        if ($query) {
            return $query->result();
        } else {
            return false;
        }
    }

}

?>