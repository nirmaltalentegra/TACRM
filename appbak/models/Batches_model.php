<?php


/* Location: ./application/models/Batches_model.php */
/* Derived from Harviacode  */
/* Modified by Vivek Raghunathan 2021-06-23 18:52:09 */
/* Email : vivekra@dqserv.com */
/* http://dqserv.com */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Batches_model extends CI_Model
{

    public $table = 'batches';
    public $id = 'batch_id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }
	
	// get all data array
    function get_all_batches()
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
    function get_batches($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row_array();
    }
	    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('batch_id', $q);
	$this->db->or_like('course_id', $q);
	$this->db->or_like('category_id', $q);
	$this->db->or_like('batch_title', $q);
	$this->db->or_like('description', $q);
	$this->db->or_like('faculty_id', $q);
	$this->db->or_like('branch_id', $q);
	$this->db->or_like('batch_type', $q);
	$this->db->or_like('batch_pattern', $q);
	$this->db->or_like('start_date', $q);
	$this->db->or_like('end_date', $q);
	$this->db->or_like('week_days', $q);
	$this->db->or_like('student_enrolled', $q);
	$this->db->or_like('batch_capacity', $q);
	$this->db->or_like('iscorporate', $q);
	$this->db->or_like('currency_id', $q);
	$this->db->or_like('batch_fee_type', $q);
	$this->db->or_like('fees', $q);
	$this->db->or_like('course_fee_type', $q);
	$this->db->or_like('course_fee', $q);
	$this->db->or_like('batch_status', $q);
	$this->db->or_like('created', $q);
	$this->db->or_like('updated', $q);
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
        $this->db->like('batch_id', $q);
	$this->db->or_like('course_id', $q);
	$this->db->or_like('category_id', $q);
	$this->db->or_like('batch_title', $q);
	$this->db->or_like('description', $q);
	$this->db->or_like('faculty_id', $q);
	$this->db->or_like('branch_id', $q);
	$this->db->or_like('batch_type', $q);
	$this->db->or_like('batch_pattern', $q);
	$this->db->or_like('start_date', $q);
	$this->db->or_like('end_date', $q);
	$this->db->or_like('week_days', $q);
	$this->db->or_like('student_enrolled', $q);
	$this->db->or_like('batch_capacity', $q);
	$this->db->or_like('iscorporate', $q);
	$this->db->or_like('currency_id', $q);
	$this->db->or_like('batch_fee_type', $q);
	$this->db->or_like('fees', $q);
	$this->db->or_like('course_fee_type', $q);
	$this->db->or_like('course_fee', $q);
	$this->db->or_like('batch_status', $q);
	$this->db->or_like('created', $q);
	$this->db->or_like('updated', $q);
	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
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
	
	//get courses
	function get_all_courses()
    {
        $this->db->order_by('course_id', $this->order);
        return $this->db->get('courses_catalog')->result();
    }
    
	//get categories
	function get_all_categories()
    {
        $this->db->order_by('category_id', $this->order);
        return $this->db->get('categories')->result();
    }
}

/* End of file Batches_model.php */