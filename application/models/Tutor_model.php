<?php


/* Location: ./application/models/Students_model.php */
/* Derived from Harviacode  */
/* Modified by Vivek Raghunathan 2021-06-25 14:59:51 */
/* Email : vivekra@dqserv.com */
/* http://dqserv.com */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tutor_model extends CI_Model
{

    public $table = 'users';
    public $id = 'id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
		$this->db->select('*');
		//$this->db->from('users');
		//$this->db->group_by('students.user_id,students.name'); 
        //$this->db->order_by('students.user_id', $this->order);
        return $this->db->get($this->table)->result();    
    }
	
	// get all data array
    function get_all_students()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result_array();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
	
	
	// get data array by id
    function get_students($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row_array();
    }
	    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('student_id', $q);
	$this->db->or_like('active', $q);
	$this->db->or_like('added_by', $q);
	//$this->db->or_like('address', $q);
	$this->db->or_like('batch_id', $q);
	$this->db->or_like('completion_date', $q);
	$this->db->or_like('course_completed', $q);
	$this->db->or_like('course_id', $q);
	$this->db->or_like('created', $q);
	$this->db->or_like('deleted_at', $q);
	$this->db->or_like('fees_paid', $q);
	$this->db->or_like('fees_payable', $q);
	//$this->db->or_like('first_name', $q);
	$this->db->or_like('is_deleted', $q);
	$this->db->or_like('updated', $q);
	$this->db->or_like('user_id', $q);
	//$this->db->or_like('zipcode', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $sort_column = '',$sort_by = '',$q = NULL) {
		if($sort_column!='' && $sort_by!= '' ){
            $this->db->order_by($sort_column, $sort_by);
        }
		else { 
        $this->db->order_by($this->id, $this->order);
		}
        $this->db->like('student_id', $q);
	$this->db->or_like('active', $q);
	$this->db->or_like('added_by', $q);
	$this->db->or_like('address', $q);
	$this->db->or_like('batch_id', $q);
	$this->db->or_like('completion_date', $q);
	$this->db->or_like('course_completed', $q);
	$this->db->or_like('course_id', $q);
	$this->db->or_like('created', $q);
	$this->db->or_like('deleted_at', $q);
	$this->db->or_like('fees_paid', $q);
	$this->db->or_like('fees_payable', $q);
	$this->db->or_like('first_name', $q);
	$this->db->or_like('is_deleted', $q);
	$this->db->or_like('updated', $q);
	$this->db->or_like('user_id', $q);
	$this->db->or_like('zipcode', $q);
	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
		$insert_id = $this->db->insert_id();
		return  $insert_id;
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }
	
	// check_exist
    function check_exist($val,$col,$id)
    {
        $this->db->where($col, $val);
		if($id){
		$this->db->where($this->id.' !=', $id);
		}
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }
	
	function get_students_from_users($search,$search_type)
    {
        $this->db->where('user_type', 'Student/Parent');
		$this->db->like($search_type, $search,'after');
        return $this->db->get('users')->result_array();
    }
	
	// get data array by id
    function get_students_by_user_id($id)
    {
        $this->db->where('id', $id);
        return $this->db->get('users')->row_array();
    }
	
	// get data array by id
    function check_student_by_batch_course($user_id,$course_id,$batch_id)
    {
        $this->db->where('user_id', $user_id);
		$this->db->where('course_id', $course_id);
		$this->db->where('batch_id', $batch_id);
        $query = $this->db->get($this->table);
		//$result = $query->result_array();
        $count = $query->num_rows();
        if ($count > 0) {
            return 'success';
        } else {
            return 'failure';
        }
    }
	
	// get data array by id
    function check_student_by_batch($user_id,$batch_id) 
    {
        $this->db->where('user_id', $user_id);
		$this->db->where('batch_id', $batch_id);
        $query = $this->db->get($this->table);
		//$result = $query->result_array();
        $count = $query->num_rows();
        if ($count > 0) {
            return 'success';
        } else {
            return 'failure';
        }
    }
	
	function check_student_by_certificate_id($certifcation_id) 
    {
        $this->db->where('certificate_id',$certifcation_id);
        $query = $this->db->get($this->table);
		//$result = $query->result_array();
        $count = $query->num_rows();
        if ($count > 0) {
            return 'success';
        } else {
            return 'failure';
        }
    }
	
	function get_students_course_details($student_id)
    {
		$this->db->select('students.* ,batches.batch_title,courses_catalog.course_name');
		$this->db->join('batches', 'batches.batch_id = students.batch_id');
		$this->db->join('courses_catalog', 'courses_catalog.course_id = students.course_id AND courses_catalog.course_id = batches.course_id');
		$this->db->where('student_id', $student_id);
        $this->db->order_by($this->id, $this->order);
        $result = $this->db->get($this->table)->result();   
		if (count($result) > 0) {
            return $result[0];
        } else {
            return 'failure';
        }
    }
	
	// get all
    function get_studentdetail_by_user_id($user_id)
    {
		$this->db->select('students.*,users.email,users.phone,batches.batch_title,courses_catalog.course_name');
		$this->db->join('users', 'users.id = students.user_id');
		$this->db->join('batches', 'batches.batch_id = students.batch_id');
		$this->db->join('courses_catalog', 'courses_catalog.course_id = students.course_id');
		$this->db->where('user_id', $user_id);
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();    
    }		
	function get_studentdetail_by_certification_id($certificate_id)
    {
		$this->db->select('students.*,courses_catalog.course_name');
		//$this->db->join('users', 'users.id = students.user_id');
		//$this->db->join('batches', 'batches.batch_id = students.batch_id');
		$this->db->join('courses_catalog', 'courses_catalog.course_id = students.course_id');
		$this->db->where('certificate_id', $certificate_id);
        //$this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();    
    }
	
	function insert_profile_subject($data)
    {
		
        $this->db->insert('profile_subjects', $data);
		$insert_id = $this->db->insert_id();
		return  $insert_id;
    }
	function insert_subject($data)
    {
		
        $this->db->insert('subjects', $data);
		$insert_id = $this->db->insert_id();
		return  $insert_id;
    }
	
		function get_tutor_subject($search,$search_type)
    {
        //$this->db->where('user_type', 'Student/Parent');
		$this->db->like($search_type, $search,'after');
        return $this->db->get('subjects')->result_array();
    }
	
	function get_subject_by_id($id)
    {
        $this->db->where('id', $id);
        return $this->db->get('subjects')->row_array();
    }
	
	function insert_profile_education($data)
    {
		
        $this->db->insert('profile_education', $data);
		$insert_id = $this->db->insert_id();
		return  $insert_id;
    }
	function insert_profile_professional($data)
    {
		
        $this->db->insert('profile_professional', $data);
		$insert_id = $this->db->insert_id();
		return  $insert_id;
    }
	
	function get_all_degree_type(){
	    $this->db->select('*');
        return $this->db->get('degree_types')->result();   
	}
}
/* End of file Students_model.php */