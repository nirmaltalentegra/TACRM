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
        /* $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();*/
        $this->db->select('batches.*,courses_catalog.course_name,categories.category_name,
							branch.branch_name,batch_type.batch_type_name,batch_pattern.batch_pattern,
							profiles.fullname,c.course_fee_type as course_fee_type_name,b.course_fee_type as batch_fee_type_name,status.status');
        $this->db->join('courses_catalog', 'batches.course_id = courses_catalog.course_id ', 'left');
        $this->db->join('categories', 'batches.category_id = categories.category_id ', 'left');
        $this->db->join('branch', 'batches.branch_id = branch.branch_id', 'left');
        $this->db->join('batch_type', 'batches.batch_type = batch_type.batch_type_id', 'left');
        $this->db->join('profiles', 'batches.faculty_id = profiles.id', 'left');
        $this->db->join('batch_pattern', 'batches.batch_pattern = batch_pattern.batch_pattern_id', 'left');
        $this->db->join('course_fee_type c', 'batches.course_fee_type = c.course_fee_type_id', 'left');
        $this->db->join('course_fee_type b', 'batches.batch_fee_type = b.course_fee_type_id', 'left');
        $this->db->join('status', 'batches.batch_status = status.status_id', 'left');
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
    function total_rows($q = NULL)
    {
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
    function get_limit_data($limit, $start = 0, $sort_column = '', $sort_by = '', $q = NULL)
    {
        if ($sort_column != '' && $sort_by != '') {
            $this->db->order_by($sort_column, $sort_by);
        } else {
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
        $this->db->db_debug = false;
        if (!$this->db->insert($this->table, $data)) {
            return false;
        } else {
            return true;
        }
    }

    // update data
    function update($id, $data)
    {
        $this->db->db_debug = false;
        $this->db->where($this->id, $id);
        if (!$this->db->update($this->table, $data)) {
            return false;
        } else {
            return true;
        }
    }

    // delete data
    function delete($id)
    {
        $this->db->db_debug = false;
        $this->db->where($this->id, $id);
        if (!$this->db->delete($this->table)) {
            return false;
        } else {
            return true;
        }
    }

    // check_exist
    function check_exist($val, $col, $id)
    {
        $this->db->where($col, $val);
        if ($id) {
            $this->db->where($this->id . ' !=', $id);
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
	
	function get_by_faculty_id($id){
		$this->db->where('faculty_id', $id);
        return $this->db->get($this->table)->row();
	}
}

/* End of file Batches_model.php */