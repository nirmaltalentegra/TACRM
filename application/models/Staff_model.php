<?php

/* Location: ./application/models/Staff_model.php */
/* Derived from Harviacode  */
/* Modified by Vivek Raghunathan 2016-03-20 03:31:15 */
/* Email : vivekra@dqserv.com */
/* http://dqserv.com */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Staff_model extends CI_Model {

    public $table = 'arbac_users';
    public $id = 'id';
    public $order = 'DESC';

    function __construct() {
        parent::__construct();
    }

    // get all
    function get_all() {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get all
    function get_all_staff() {
        /// $this->db->select('s.id as id, staff.staff_id as staff_id, CONCAT_WS(" ",staff.firstname,staff.lastname) AS staff_name, s.email as staff_email, staff.firstname, staff.lastname, s.username, staff.mobile, staff.phone, staff.org_id, staff.dept_id, staff.role_id, staff.manager_id, staff.designation_id, staff.sms_notification, staff.isadmin, staff.isvisible, staff.onvacation, staff.assigned_only, staff.show_assigned_tickets');
        $this->db->select('s.*, staff.*, staff.staff_id as staff_id, CONCAT_WS(" ",staff.firstname,staff.lastname) AS staff_name');
        //$this->db->from('arbac_users AS s');
        $this->db->join('staff as staff', 'staff.staff_id=s.id', 'LEFT');
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table . ' as s')->result_array();
    }

    // get all
    function get_staff_list() {

        //$query = 'SELECT usr.id as id, usr.last_login, usr.email, usr.username, CONCAT_WS(" ",s.firstname,s.lastname) as sname, usr.banned,  desg.name as designation, s.mobile, dept.name as department, CONCAT_WS(" ",mgr.firstname,mgr.lastname) as manager FROM arbac_users usr LEFT JOIN staff s ON usr.id=s.staff_id LEFT JOIN staff mgr ON mgr.staff_id=s.manager_id LEFT JOIN department dept ON dept.id=s.dept_id LEFT JOIN designation desg ON desg.id=s.designation_id;';
        //$query = $this->db->query($query)->result();
        //return $query ;

        $this->db->select('usr.id AS id, usr.last_login, usr.email, usr.username, CONCAT_WS(" ",s.firstname,s.lastname) AS sname, usr.banned,  desg.name AS designation, s.mobile, dept.name AS department, CONCAT_WS(" ",mgr.firstname,mgr.lastname) AS manager');
        //$this->db->from('arbac_users AS usr');
        $this->db->join('arbac_users AS usr', 'usr.id=s.staff_id', 'LEFT');
        $this->db->join('staff AS mgr', 'mgr.staff_id=s.manager_id', 'LEFT');
        $this->db->join('department AS dept', 'dept.id=s.dept_id', 'LEFT');
        $this->db->join('designation AS desg', 'desg.id=s.designation_id', 'LEFT');
        //$result = $this->db->get();
        $this->db->order_by($this->id, $this->order);
        $query = $this->db->get('staff AS s');
        //echo "<br> str ".$this->db->last_query();exit;
        return $query->result();
    }

    // get data by id
    function get_by_id($id) {
        $this->db->select('dept.name as dept_name, CONCAT_WS(" ", staff.firstname, staff.lastname) as staff_name, staff.mobile, s.email as staff_email, role.name as primary_role, '
                . 'CONCAT_WS(" ", rm.firstname, rm.lastname) as reporting_manager, desgn.name as designation, org.name as org_name,staff.dept_id,staff.manager_id,staff.signature,'
                . 'staff.lang,staff.timezone,staff.locale,staff.notes,staff.sms_notification,staff.firstname, staff.lastname,s.username as staff_username,staff.phone,staff.phone_ext,'
                . 'staff.staff_id,staff.org_id,staff.role_id,staff.designation_id,s.banned,staff.designation_id,staff.onvacation,staff.isadmin,staff.isvisible,staff.assigned_only,'
                . 'staff.show_assigned_tickets,staff.change_passwd,staff.max_page_size,staff.isvisible,staff.assigned_only,staff.auto_refresh_rate,staff.default_signature_type,staff.default_paper_size,'
                . 'staff.extra,staff.permissions,staff.updated');
        $this->db->from('staff AS staff');
        $this->db->join('department AS dept', 'dept.id=staff.dept_id', 'LEFT');
        $this->db->join('arbac_users AS s', 's.id=staff.staff_id', 'LEFT');
        $this->db->join('arbac_groups AS role', 'role.id=staff.role_id', 'LEFT');
        $this->db->join('designation AS desgn', 'desgn.id=staff.designation_id', 'LEFT');
        $this->db->join('staff AS rm', 'rm.staff_id=staff.manager_id', 'LEFT');
        $this->db->join('organization AS org', 'org.id=staff.org_id', 'LEFT');
        $this->db->where('staff.staff_id', $id);
        return $this->db->get()->row();


        //$this->db->where($this->id, $id);
        //return $this->db->get($this->table)->row();
    }

    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id', $q);
        $this->db->like('username', $q);
        $this->db->like('email', $q);
        $this->db->like('staff_id', $q);
        $this->db->or_like('org_id', $q);
        $this->db->or_like('dept_id', $q);
        $this->db->or_like('role_id', $q);
        $this->db->or_like('username', $q);
        $this->db->or_like('manager_id', $q);
        $this->db->or_like('designation_id', $q);
        $this->db->or_like('firstname', $q);
        $this->db->or_like('lastname', $q);
        $this->db->or_like('phone', $q);
        $this->db->or_like('phone_ext', $q);
        $this->db->or_like('mobile', $q);
        $this->db->or_like('signature', $q);
        $this->db->or_like('lang', $q);
        $this->db->or_like('timezone', $q);
        $this->db->or_like('locale', $q);
        $this->db->or_like('notes', $q);
        $this->db->or_like('sms_notification', $q);
        $this->db->or_like('isadmin', $q);
        $this->db->or_like('isvisible', $q);
        $this->db->or_like('onvacation', $q);
        $this->db->or_like('assigned_only', $q);
        $this->db->or_like('show_assigned_tickets', $q);
        $this->db->or_like('change_passwd', $q);
        $this->db->or_like('max_page_size', $q);
        $this->db->or_like('auto_refresh_rate', $q);
        $this->db->or_like('default_signature_type', $q);
        $this->db->or_like('default_paper_size', $q);
        $this->db->or_like('extra', $q);
        $this->db->or_like('permissions', $q);
        $this->db->or_like('updated', $q);
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('staff_id', $q);
        $this->db->or_like('org_id', $q);
        $this->db->or_like('dept_id', $q);
        $this->db->or_like('role_id', $q);
        $this->db->or_like('username', $q);
        $this->db->or_like('manager_id', $q);
        $this->db->or_like('designation_id', $q);
        $this->db->or_like('firstname', $q);
        $this->db->or_like('lastname', $q);
        $this->db->or_like('phone', $q);
        $this->db->or_like('phone_ext', $q);
        $this->db->or_like('mobile', $q);
        $this->db->or_like('signature', $q);
        $this->db->or_like('lang', $q);
        $this->db->or_like('timezone', $q);
        $this->db->or_like('locale', $q);
        $this->db->or_like('notes', $q);
        $this->db->or_like('sms_notification', $q);
        $this->db->or_like('isadmin', $q);
        $this->db->or_like('isvisible', $q);
        $this->db->or_like('onvacation', $q);
        $this->db->or_like('assigned_only', $q);
        $this->db->or_like('show_assigned_tickets', $q);
        $this->db->or_like('change_passwd', $q);
        $this->db->or_like('max_page_size', $q);
        $this->db->or_like('auto_refresh_rate', $q);
        $this->db->or_like('default_signature_type', $q);
        $this->db->or_like('default_paper_size', $q);
        $this->db->or_like('extra', $q);
        $this->db->or_like('permissions', $q);
        $this->db->or_like('updated', $q);
        $this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data) {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data) {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id) {
        $this->db->where('staff_id', $id);
        $this->db->delete('staff');
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

    function get_primary_dept($id) {
        //select staff.firstname, dept.name from staff as staff LEFT JOIN department as dept ON staff.dept_id=dept.id;
        //if ($id == FALSE) {$id = $this->session->userdata('id');}

        $this->db->select('dept.name as dept_name, CONCAT_WS(" ", staff.firstname, staff.lastname) as staff_name, s.email as staff_email, role.name as primary_role, CONCAT_WS(" ", rm.firstname, rm.lastname) as reporting_manager, desgn.name as designation, org.name as org_name');
        $this->db->from('staff AS staff');
        $this->db->join('department AS dept', 'dept.id=staff.dept_id', 'LEFT');
        $this->db->join('arbac_users AS s', 's.id=staff.staff_id', 'LEFT');
        $this->db->join('arbac_groups AS role', 'role.id=staff.role_id', 'LEFT');
        $this->db->join('designation AS desgn', 'desgn.id=staff.designation_id', 'LEFT');
        $this->db->join('staff AS rm', 'rm.staff_id=staff.manager_id', 'LEFT');
        $this->db->join('organization AS org', 'org.id=staff.org_id', 'LEFT');
        $this->db->where('staff.staff_id', $id);
        return $this->db->get()->row();
    }

    function get_staff_primary_role($id) {
        // select staff.firstname, s.email, staff.role_id, role.name from staff as staff 
        //LEFT JOIN arbac_users as s ON s.id=staff.staff_id LEFT JOIN arbac_groups as role ON role.id=staff.role_id 
        // where s.email = 'vivekra@dqserv.com';

        $this->db->select('staff.role_id as role_id, role.name as role_name');
        $this->db->from('staff AS staff');
        $this->db->join('arbac_users AS s', 's.id=staff.staff_id', 'LEFT');
        $this->db->join('arbac_groups AS role', 'role.id=staff.role_id', 'LEFT');
        $this->db->where('s.id', $id);
        return $this->db->get()->row();
    }

    // get all
    function get_staff_by_id($staff_id) {
        $this->db->where('staff.staff_id', $staff_id);
        $this->db->join('staff', 'arbac_users.id=staff.staff_id', 'LEFT');
        $query = $this->db->get($this->table);
        //echo "<br> str ".$this->db->last_query();exit;
        $result = $query->result_array();
        $count = $query->num_rows();
        if ($count > 0) {
            return $result[0];
        } else {
            return 'failure';
        }
    }
    
    // get all
    function get_subordinates_by_id($staff_id) {
        
        $this->db->select('s.*, staff.*, staff.staff_id as staff_id, CONCAT_WS(" ",staff.firstname,staff.lastname) AS staff_name');
        //$this->db->from('arbac_users AS s');
        $this->db->join('staff as staff', 'staff.staff_id=s.id', 'LEFT');
        $this->db->where('staff.manager_id', $staff_id);
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table . ' as s')->result_array();
    }

    function staff_exist_by_username($username) {
        $this->db->where('username', $username);
        $query = $this->db->get('arbac_users');
        if ($query->num_rows() > 0)
            return TRUE;
        else
            return FALSE;
    }

    function staff_exist_by_email($email) {
        $this->db->where('email', $email);
        $query = $this->db->get('arbac_users');
        if ($query->num_rows() > 0)
            return TRUE;
        else
            return FALSE;
    }

    // update data
    function update_by_staff_id($staff_id, $data) {
        $this->db->where('staff_id', $staff_id);
        $this->db->update('staff', $data);
    }

    //  check unique email
    function check_unique_email($entered_email, $existing_user_email) {

        $this->db->select('*');
        $this->db->where('email', $entered_email);
        if ($existing_user_email != "") {
            $this->db->where("email != '" . $existing_user_email . "'");
        }
        $query = $this->db->get($this->table);
        //echo "<br> str ".$this->db->last_query();exit;
        $count = $query->num_rows();
        //echo "<br> count ".$count;
        if ($count == 0) {
            return 'NEW';
        } else {
            return 'EXIST';
        }
    }

    //  check unique username
    function check_unique_username($entered_username, $existing_user_name) {
        $this->db->select('*');
        $this->db->where('username', $entered_username);
        if ($existing_user_name != "") {
            $this->db->where("username != '" . $existing_user_name . "'");
        }
        $query = $this->db->get($this->table);
        //echo "<br> str ".$this->db->last_query();exit;
        $count = $query->num_rows();
        //echo "<br> count ".$count;
        if ($count == 0) {
            return 'NEW';
        } else {
            return 'EXIST';
        }
    }

    // update data
    function update_role_to_default($role_id, $data) {
        $this->db->where('role_id', $role_id);
        $this->db->update('staff', $data);
    }

	
	// get all data array
    function get_details_by_arbac_users_id($arbac_users_id)
    {
		$this->db->select('staff.created as staff_created, staff.*,CONCAT(staff.firstname, " ", staff.lastname) as staff_name');
		//$this->db->join('staff_details', 'staff_details.staff_id=staff.staff_id', 'LEFT');
        $this->db->where('staff.staff_id', $arbac_users_id);
	//	echo "<br> str". $this->db->last_query();exit;
        return $this->db->get('staff')->row();
	}
}

/* End of file Staff_model.php */