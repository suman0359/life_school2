<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Global_Model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }


    public function getAllWhere(array('student_class'=> $did), array('student_shift'=> $did), array('student_section'=> $did), 'student') {
    	$this->db->select('*');
    	$this->db->where($student_class);
    	$this->db->where($student_shift);
    	$this->db->where($student_section);

    	$this->db->from();
    	$query = $this->db->get($table_name)->result_array();
        return $query ;
    }
   }
