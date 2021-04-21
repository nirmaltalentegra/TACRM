<?php


/* Location: ./application/models/Leads_model.php */
/* Derived from Harviacode  */
/* Modified by Vivek Raghunathan 2017-04-04 15:27:58 */
/* Email : vivekra@dqserv.com */
/* http://dqserv.com */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Leads_revise_logs_model extends CI_Model
{

    public $table   = 'leads_revise_logs';
    public $id      = 'id';
    public $order   = 'DESC';

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
    
    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    
    // get all
    function get_lead_history($lead_id)
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
        //$this->db->where("leads.status != 5"); // where not "Convert to Opportunity" leads
        //$this->db->where_not_in('leads.status', $ignore);
        $this->db->where('lead_id', $lead_id);
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
}

/* End of file Leads_model.php */