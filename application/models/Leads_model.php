	<?php


/* Location: ./application/models/Leads_model.php */
/* Derived from Harviacode  */
/* Modified by Vivek Raghunathan 2017-04-04 15:27:58 */
/* Email : vivekra@dqserv.com */
/* http://dqserv.com */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Leads_model extends CI_Model
{

    public $table = 'leads';
    public $id = 'lead_id';
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
    function get_all_leads()
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
    function get_leads($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row_array();
    }
	    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('', $q);
	$this->db->or_like('lead_id', $q);
	$this->db->or_like('source_id', $q);
	$this->db->or_like('staff_id', $q);
	$this->db->or_like('first_name', $q);
	$this->db->or_like('middle_name', $q);
	$this->db->or_like('last_name', $q);
	$this->db->or_like('email', $q);
	$this->db->or_like('mobile', $q);
	$this->db->or_like('alt_mobile', $q);
	$this->db->or_like('ref_name', $q);
	$this->db->or_like('ref_mobile', $q);
	$this->db->or_like('comments', $q);
	$this->db->or_like('branch_id', $q);
	$this->db->or_like('city_id', $q);
	$this->db->or_like('country_id', $q);
	$this->db->or_like('active', $q);
	$this->db->or_like('status', $q);
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
        $this->db->like('', $q);
	$this->db->or_like('lead_id', $q);
	$this->db->or_like('source_id', $q);
	$this->db->or_like('staff_id', $q);
	$this->db->or_like('first_name', $q);
	$this->db->or_like('middle_name', $q);
	$this->db->or_like('last_name', $q);
	$this->db->or_like('email', $q);
	$this->db->or_like('mobile', $q);
	$this->db->or_like('alt_mobile', $q);
	$this->db->or_like('ref_name', $q);
	$this->db->or_like('ref_mobile', $q);
	$this->db->or_like('comments', $q);
	$this->db->or_like('branch_id', $q);
	$this->db->or_like('city_id', $q);
	$this->db->or_like('country_id', $q);
	$this->db->or_like('active', $q);
	$this->db->or_like('status', $q);
	$this->db->or_like('created', $q);
	$this->db->or_like('updated', $q);
	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }
    
    // get all
    function get_lead_list()
    {
        $ignore = array(5, 6);
        $notice = array(12,13,7,10,17); //Followup, Hot, Cold, Attempted, New 
        $this->db->select($this->table.'.*');
        $this->db->select('src.source_details');
        $this->db->select('cty.city_name');
        $this->db->select('status.status as status_name');
        $this->db->select('CONCAT(astf.firstname," ",astf.lastname) AS assigned_staff ');
        $this->db->select('CONCAT(stf.firstname," ",stf.lastname) AS staffname ');
        $this->db->join('source src', 'src.source_id = '.$this->table.'.source_id');
        $this->db->join('staff stf', 'stf.staff_id = '.$this->table.'.staff_id');
        $this->db->join('staff astf', 'astf.staff_id = '.$this->table.'.assigned_staff_id');
        $this->db->join('cities cty', 'cty.city_id = '.$this->table.'.city_id');
        $this->db->join('status', 'status.status_id = '.$this->table.'.status');
        //$this->db->where("leads.status != 5"); // where not "Convert to Opportunity" leads
        //$this->db->where_not_in('leads.status', $ignore);
        $this->db->where_in('leads.status', $notice);
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }
    
    // get all converted list
    function get_convlead_list()
    {        
        $this->db->select($this->table.'.*');
        $this->db->select('src.source_details');
        $this->db->select('cty.city_name');
        $this->db->select('status.status as status_name');
        $this->db->select('CONCAT(astf.firstname," ",astf.lastname) AS assigned_staff ');
        $this->db->select('CONCAT(stf.firstname," ",stf.lastname) AS staffname ');
        $this->db->join('source src', 'src.source_id = '.$this->table.'.source_id');
        $this->db->join('staff stf', 'stf.staff_id = '.$this->table.'.staff_id');
        $this->db->join('staff astf', 'astf.staff_id = '.$this->table.'.assigned_staff_id');
        $this->db->join('cities cty', 'cty.city_id = '.$this->table.'.city_id');
        $this->db->join('status', 'status.status_id = '.$this->table.'.status');
        $this->db->where("leads.status",'5'); // where  "Convert to Opportunity" leads        
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }
    
    // get all converted list
    function get_lost_list()
    {        
        $this->db->select($this->table.'.*');
        $this->db->select('src.source_details');
        $this->db->select('cty.city_name');
        $this->db->select('status.status as status_name');
        $this->db->select('CONCAT(astf.firstname," ",astf.lastname) AS assigned_staff ');
        $this->db->select('CONCAT(stf.firstname," ",stf.lastname) AS staffname ');
        $this->db->join('source src', 'src.source_id = '.$this->table.'.source_id');
        $this->db->join('staff stf', 'stf.staff_id = '.$this->table.'.staff_id');
        $this->db->join('staff astf', 'astf.staff_id = '.$this->table.'.assigned_staff_id');
        $this->db->join('cities cty', 'cty.city_id = '.$this->table.'.city_id');
        $this->db->join('status', 'status.status_id = '.$this->table.'.status');
        $this->db->where("leads.status",'6'); // where  "Lost" leads        
        $this->db->order_by($this->id, $this->order);
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
    
    // get all data for active leads user wise
    function get_leads_users()
    {
        $this->db->select($this->table.'.*');
        $this->db->select('COUNT(lead_id) as total');
        $this->db->select('CONCAT(astf.firstname," ",astf.lastname) AS assigned_staff ');
        $this->db->select('CONCAT(stf.firstname," ",stf.lastname) AS staffname ');        
        $this->db->join('staff stf', 'stf.staff_id = '.$this->table.'.staff_id');
        $this->db->join('staff astf', 'astf.staff_id = '.$this->table.'.assigned_staff_id');
        $this->db->where("leads.status != 5"); // where not "Convert to Opportunity" leads
        $this->db->group_by('leads.assigned_staff_id');
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }
    // get data for Leads funnel
    function get_leads_funnel()
    {
        $this->db->select($this->table.'.*');
        $this->db->select('status.status as status_name');
        $this->db->select('COUNT(lead_id) as total');
        $this->db->select('CONCAT(astf.firstname," ",astf.lastname) AS assigned_staff ');
        $this->db->select('CONCAT(stf.firstname," ",stf.lastname) AS staffname ');        
        $this->db->join('staff stf', 'stf.staff_id = '.$this->table.'.staff_id');
        $this->db->join('staff astf', 'astf.staff_id = '.$this->table.'.assigned_staff_id');
        $this->db->join('status', 'status.status_id = '.$this->table.'.status');
        $this->db->where("leads.status != 5"); // where not "Convert to Opportunity" leads
        $this->db->group_by('leads.status');
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }
    // get data for Leads source wise
    function get_leads_source()
    {
        $this->db->select($this->table.'.*');
        $this->db->select('src.source_details');        
        $this->db->select('COUNT(lead_id) as total');        
        $this->db->join('source src', 'src.source_id = '.$this->table.'.source_id');        
        $this->db->where("leads.status != 5"); // where not "Convert to Opportunity" leads
        $this->db->group_by('leads.source_id');
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }
}

/* End of file Leads_model.php */