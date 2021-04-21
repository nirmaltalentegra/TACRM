<?php


/* Location: ./application/models/email_leads_model.php */
/* Derived from Harviacode  */
/* Modified by Vivek Raghunathan 2017-04-04 15:27:58 */
/* Email : vivekra@dqserv.com */
/* http://dqserv.com */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Email_leads_model extends CI_Model
{

    public $table   = 'email_leads';
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
}

/* End of file email_leads_model.php */