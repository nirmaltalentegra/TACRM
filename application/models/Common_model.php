<?php
class Common_model extends CI_Model {
    public function __construct() {
        parent::__construct();
    }
	
    public function get_details_dynamically($table_name, $where_field, $field_value, $order_by_field = NULL, $oder_by = NULL) {
        $this->db->select("*");
        $this->db->where($where_field, $field_value);
        if ($order_by_field != NULL) {
            $this->db->order_by($order_by_field, $oder_by);
        }
        $query = $this->db->get($table_name);
        $result = $query->result_array();
        $count = $query->num_rows();
        if ($count > 0) {
            return $result;
        } else {
            return 'failure';
        }
    }
	
    public function get_table_details_dynamically($table_name, $order_by_field = NULL, $oder_by = NULL) {
        $this->db->select("*");
        if ($order_by_field != NULL) {
            $this->db->order_by($order_by_field, $oder_by);
        }
        $query = $this->db->get($table_name);
        //echo "<br> ".$this->db->last_query();
        $result = $query->result_array();
        $count = $query->num_rows();
        if ($count > 0) {
            return $result;
        } else {
            return 'failure';
        }
    }
	
    public function insert_records_dynamically($table_name, $data) {
        $this->db->insert($table_name, $data);
        return $this->db->insert_id();
    }
	
    public function update_records_dynamically($table_name, $data, $where_field, $field_value) {
        $this->db->where($where_field, $field_value);
        $this->db->update($table_name, $data);
		return true;
    }
	
    public function delete_records_dynamically($table_name, $where_field, $field_value) {
        $this->db->where($where_field, $field_value);
        $this->db->delete($table_name);
    }
	
    public function get_details_dynamically_advanced($table_name, $where, $where_notin_field = NULL, $where_notin_value = NULL, $order_by_field = NULL, $oder_by = NULL) {
        $this->db->select("*");
        $this->db->where($where);
        if ($where_notin_field != NULL) {
            $this->db->where_not_in($where_notin_field, $where_notin_value);
        }
        if ($order_by_field != NULL) {
            $this->db->order_by($order_by_field, $oder_by);
        }
        $query = $this->db->get($table_name);
        //echo "<br> ".$this->db->last_query();
        $result = $query->result_array();
        $count = $query->num_rows();
        if ($count > 0) {
            return $result;
        } else {
            return 'failure';
        }
    }
}
?>