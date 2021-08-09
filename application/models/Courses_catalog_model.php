<?php


/* Location: ./application/models/Courses_catalog_model.php */
/* Derived from Harviacode  */
/* Modified by Vivek Raghunathan 2021-06-25 14:59:49 */
/* Email : vivekra@dqserv.com */
/* http://dqserv.com */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Courses_catalog_model extends CI_Model
{

    public $table = 'courses_catalog';
    public $id = 'course_id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->select('courses_catalog.*,course_fee_type.course_fee_type as course_fee_type_name,categories.category_name');
        $this->db->join('course_fee_type', 'courses_catalog.course_fee_type = course_fee_type.course_fee_type_id', 'left');
        $this->db->join('categories', 'courses_catalog.category_id = categories.category_id ', 'left');
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get all data array
    function get_all_courses_catalog()
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
    function get_courses_catalog($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row_array();
    }

    // get total rows
    function total_rows($q = NULL)
    {
        $this->db->like('course_id', $q);
        $this->db->or_like('active', $q);
        $this->db->or_like('added_by', $q);
        $this->db->or_like('category_id', $q);
        $this->db->or_like('course_code', $q);
        $this->db->or_like('course_contents', $q);
        $this->db->or_like('course_duration', $q);
        $this->db->or_like('course_duration_in', $q);
        $this->db->or_like('course_fee_type', $q);
        $this->db->or_like('course_fees', $q);
        $this->db->or_like('course_name', $q);
        $this->db->or_like('course_summary', $q);
        $this->db->or_like('created', $q);
        $this->db->or_like('deleted_at', $q);
        $this->db->or_like('is_deleted', $q);
        $this->db->or_like('notes', $q);
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
        $this->db->like('course_id', $q);
        $this->db->or_like('active', $q);
        $this->db->or_like('added_by', $q);
        $this->db->or_like('category_id', $q);
        $this->db->or_like('course_code', $q);
        $this->db->or_like('course_contents', $q);
        $this->db->or_like('course_duration', $q);
        $this->db->or_like('course_duration_in', $q);
        $this->db->or_like('course_fee_type', $q);
        $this->db->or_like('course_fees', $q);
        $this->db->or_like('course_name', $q);
        $this->db->or_like('course_summary', $q);
        $this->db->or_like('created', $q);
        $this->db->or_like('deleted_at', $q);
        $this->db->or_like('is_deleted', $q);
        $this->db->or_like('notes', $q);
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
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
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
}

/* End of file Courses_catalog_model.php */