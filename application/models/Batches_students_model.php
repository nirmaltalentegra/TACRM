<?php


/* Location: ./application/models/Batches_students_model.php */
/* Derived from Harviacode  */
/* Modified by Vivek Raghunathan 2021-06-25 14:59:48 */
/* Email : vivekra@dqserv.com */
/* http://dqserv.com */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Batches_students_model extends CI_Model
{

    public $table = 'batches_students';
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
    function get_all_batches_students()
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
    function get_batches_students($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row_array();
    }

    // get total rows
    function total_rows($q = NULL)
    {
        $this->db->like('batch_id', $q);
        $this->db->or_like('active', $q);
        $this->db->or_like('certified', $q);
        $this->db->or_like('created', $q);
        $this->db->or_like('faculty_comments', $q);
        $this->db->or_like('faculty_id', $q);
        $this->db->or_like('faculty_rating', $q);
        $this->db->or_like('student_comments', $q);
        $this->db->or_like('student_id', $q);
        $this->db->or_like('student_rating', $q);
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
        $this->db->or_like('active', $q);
        $this->db->or_like('certified', $q);
        $this->db->or_like('created', $q);
        $this->db->or_like('faculty_comments', $q);
        $this->db->or_like('faculty_id', $q);
        $this->db->or_like('faculty_rating', $q);
        $this->db->or_like('student_comments', $q);
        $this->db->or_like('student_id', $q);
        $this->db->or_like('student_rating', $q);
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
}

/* End of file Batches_students_model.php */