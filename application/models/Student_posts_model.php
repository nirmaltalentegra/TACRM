<?php


/* Location: ./application/models/Student_posts_model.php */
/* Derived from Harviacode  */
/* Modified by Vivek Raghunathan 2021-06-25 14:59:51 */
/* Email : vivekra@dqserv.com */
/* http://dqserv.com */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Student_posts_model extends CI_Model
{

    public $table = 'student_posts';
    public $id = 'id';
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
    function get_all_student_posts()
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
    function get_student_posts($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row_array();
    }
	    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id', $q);
	$this->db->or_like('ass_due_date', $q);
	$this->db->or_like('created_at', $q);
	$this->db->or_like('i_need_smeone', $q);
	$this->db->or_like('km_travel', $q);
	$this->db->or_like('meeting_options', $q);
	$this->db->or_like('st_budget', $q);
	$this->db->or_like('st_gender_prfer', $q);
	$this->db->or_like('st_i_want', $q);
	$this->db->or_like('st_level', $q);
	$this->db->or_like('st_location', $q);
	$this->db->or_like('st_requirement', $q);
	$this->db->or_like('st_subjects', $q);
	$this->db->or_like('status', $q);
	$this->db->or_like('tut_wantd', $q);
	$this->db->or_like('updated_at', $q);
	$this->db->or_like('user_id', $q);
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
        $this->db->like('id', $q);
	$this->db->or_like('ass_due_date', $q);
	$this->db->or_like('created_at', $q);
	$this->db->or_like('i_need_smeone', $q);
	$this->db->or_like('km_travel', $q);
	$this->db->or_like('meeting_options', $q);
	$this->db->or_like('st_budget', $q);
	$this->db->or_like('st_gender_prfer', $q);
	$this->db->or_like('st_i_want', $q);
	$this->db->or_like('st_level', $q);
	$this->db->or_like('st_location', $q);
	$this->db->or_like('st_requirement', $q);
	$this->db->or_like('st_subjects', $q);
	$this->db->or_like('status', $q);
	$this->db->or_like('tut_wantd', $q);
	$this->db->or_like('updated_at', $q);
	$this->db->or_like('user_id', $q);
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

}

/* End of file Student_posts_model.php */