<?php


/* Location: ./application/models/Users_model.php */
/* Derived from Harviacode  */
/* Modified by Vivek Raghunathan 2021-07-14 22:49:08 */
/* Email : vivekra@dqserv.com */
/* http://dqserv.com */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Users_model extends CI_Model
{

    public $table = 'users';
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
    function get_all_users()
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
    function get_users($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row_array();
    }

    // get total rows
    function total_rows($q = NULL)
    {
        $this->db->like('id', $q);
        $this->db->or_like('created_at', $q);
        $this->db->or_like('default_email_id', $q);
        $this->db->or_like('default_mobile_no', $q);
        $this->db->or_like('email', $q);
        $this->db->or_like('email_verified_at', $q);
        $this->db->or_like('facebook_id', $q);
        $this->db->or_like('google_id', $q);
        $this->db->or_like('iam_type', $q);
        $this->db->or_like('last_login', $q);
        $this->db->or_like('last_seen', $q);
        $this->db->or_like('linkedin', $q);
        $this->db->or_like('name', $q);
        $this->db->or_like('only_acc', $q);
        $this->db->or_like('org_id', $q);
        $this->db->or_like('password', $q);
        $this->db->or_like('phone', $q);
        $this->db->or_like('phone_verified', $q);
        $this->db->or_like('profile_img', $q);
        $this->db->or_like('remember_token', $q);
        $this->db->or_like('status', $q);
        $this->db->or_like('temp_email', $q);
        $this->db->or_like('updated_at', $q);
        $this->db->or_like('user_type', $q);
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
        $this->db->like('id', $q);
        $this->db->or_like('created_at', $q);
        $this->db->or_like('default_email_id', $q);
        $this->db->or_like('default_mobile_no', $q);
        $this->db->or_like('email', $q);
        $this->db->or_like('email_verified_at', $q);
        $this->db->or_like('facebook_id', $q);
        $this->db->or_like('google_id', $q);
        $this->db->or_like('iam_type', $q);
        $this->db->or_like('last_login', $q);
        $this->db->or_like('last_seen', $q);
        $this->db->or_like('linkedin', $q);
        $this->db->or_like('name', $q);
        $this->db->or_like('only_acc', $q);
        $this->db->or_like('org_id', $q);
        $this->db->or_like('password', $q);
        $this->db->or_like('phone', $q);
        $this->db->or_like('phone_verified', $q);
        $this->db->or_like('profile_img', $q);
        $this->db->or_like('remember_token', $q);
        $this->db->or_like('status', $q);
        $this->db->or_like('temp_email', $q);
        $this->db->or_like('updated_at', $q);
        $this->db->or_like('user_type', $q);
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
    function check_exist($val, $col, $id)
    {
        $this->db->where($col, $val);
        if ($id) {
            $this->db->where($this->id . ' !=', $id);
        }
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    //send confirm mail
    public function sendEmail($receiver)
    {
        $from = "asmitha@digitalq.co.in";    //senders email address
        $subject = 'Verify email address';  //email subject

        //sending confirmEmail($receiver) function calling link to the user, inside message body
        $message = 'Dear User,<br><br> Please click on the below activation link to verify your email address<br><br>
        <a href=\'http://www.localhost/codeigniter/Signup_Controller/confirmEmail/' . md5($receiver) . '\'>http://www.localhost/codeigniter/Signup_Controller/confirmEmail/' . md5($receiver) . '</a><br><br>Thanks';



        //config email settings
        // $config['protocol'] = 'smtp';
        // $config['smtp_host'] = 'smtp.gmail.com';
        // $config['smtp_port'] = '465';
        $config['protocol'] = 'SMTP';
        $config['smtp_crypto'] = 'tls';
        $config['smtp_host'] = 'smtp.gmail.com';
        $config['smtp_port'] = '587';
        $config['smtp_user'] = $from;
        $config['smtp_pass'] = 'A5m1tha@123';  //sender's password
        $config['mailtype'] = 'html';
        $config['charset'] = 'iso-8859-1';
        $config['wordwrap'] = 'TRUE';
        $config['newline'] = "\r\n";

        $this->load->library('email', $config);
        $this->email->initialize($config);
        //send email
        $this->email->from($from);
        $this->email->to($receiver);
        $this->email->subject($subject);
        $this->email->message($message);
        // var_dump($this->email->send());
        // exit;

        try {
            if ($this->email->send()) {
                //for testing
                echo "sent to: " . $receiver . "<br>";
                echo "from: " . $from . "<br>";
                echo "protocol: " . $config['protocol'] . "<br>";
                echo "message: " . $message;
                return true;
            } else {
                echo $this->email->print_debugger();
                exit;
                // return false;
            }
        } catch (Exception $e) {
            log_message('debug', $e->getMessage()); // use codeigniters built in logging library
            show_error($e->getMessage()); // or echo $e->getMessage()
        }
    }

    //activate account
    function verifyEmail($key)
    {
        $data = array('status' => 1);
        $this->db->where('md5(email)', $key);
        return $this->db->update('employee', $data);    //update status as 1 to make active user
    }
}

/* End of file Users_model.php */