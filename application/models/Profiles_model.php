<?php


/* Location: ./application/models/Profiles_model.php */
/* Derived from Harviacode  */
/* Modified by Vivek Raghunathan 2021-07-14 22:48:47 */
/* Email : vivekra@dqserv.com */
/* http://dqserv.com */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Profiles_model extends CI_Model
{

    public $table = 'profiles';
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
    function get_all_profiles()
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
	// get data by user_id
	function get_by_user_id($id)
    {
        $this->db->where('user_id', $id);
        return $this->db->get($this->table)->row();
    }
	
	// get data array by id
    function get_profiles($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row_array();
    }
	    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id', $q);
	$this->db->or_like('company_name', $q);
	$this->db->or_like('created_at', $q);
	$this->db->or_like('display_name', $q);
	$this->db->or_like('dob', $q);
	$this->db->or_like('fullname', $q);
	$this->db->or_like('gender', $q);
	$this->db->or_like('location', $q);
	$this->db->or_like('postalcode', $q);
	$this->db->or_like('professional_exp', $q);
	$this->db->or_like('profile_description', $q);
	$this->db->or_like('role_job', $q);
	$this->db->or_like('speciality_strength', $q);
	$this->db->or_like('status', $q);
	$this->db->or_like('subject_tech', $q);
	$this->db->or_like('teaching_details', $q);
	$this->db->or_like('updated_at', $q);
	$this->db->or_like('user_education', $q);
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
	$this->db->or_like('company_name', $q);
	$this->db->or_like('created_at', $q);
	$this->db->or_like('display_name', $q);
	$this->db->or_like('dob', $q);
	$this->db->or_like('fullname', $q);
	$this->db->or_like('gender', $q);
	$this->db->or_like('location', $q);
	$this->db->or_like('postalcode', $q);
	$this->db->or_like('professional_exp', $q);
	$this->db->or_like('profile_description', $q);
	$this->db->or_like('role_job', $q);
	$this->db->or_like('speciality_strength', $q);
	$this->db->or_like('status', $q);
	$this->db->or_like('subject_tech', $q);
	$this->db->or_like('teaching_details', $q);
	$this->db->or_like('updated_at', $q);
	$this->db->or_like('user_education', $q);
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
	
	function update_profile($id, $data)
    {
        $this->db->where('user_id', $id);
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

/* End of file Profiles_model.php */