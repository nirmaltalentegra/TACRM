<?php

/* Location: ./application/controllers/Users.php */
/* Derived from Harviacode  */
/* Modified by Vivek Raghunathan 2021-07-14 22:49:07 */
/* Email : vivekra@dqserv.com */
/* http://dqserv.com */



if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Invoices extends APP_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Invoices_model');
        $this->load->library('form_validation');
        $this->load->library('Arbac');
        if (!$this->arbac->is_loggedin()) {
            redirect('scp/auth_login');
        }
    }

    public function index()
    {
        $invoices = $this->Invoices_model->get_all();

        $data = array(
            'data' => $invoices,
            'title' => 'TRAMS::SCP::Invoices',
        );
        $this->_tpl('invoices/invoices_list', $data);
    }

    public function read($id)
    {
        $row = $this->invoices_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id'  => $row->id,
                'order_no' => $row->order_no,
                'customer_id' => $row->customer_id,
                'due_date' => $row->due_date,
                'subject' => $row->subject,
                'description' => $row->description,
                'total_qty' => $row->total_qty,
                'total_amt' => $row->total_amt,
                'discount' => $row->discount,
                'paid' => $row->paid,
                'balance' => $row->balance,
                'refunded' => $row->refunded,
                'terms' => $row->terms,
                'created_at' => $row->created_at,
                'updated_at' => $row->updated_at,
                'status' => $row->status,

            );
            $this->_tpl('invoices/invoices_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('invoices'));
        }
    }

    public function create()
    {
        $row = $this->Invoices_model->get_emptyrow();
        $data = array(
            'button' => 'Create',
            'action' => site_url('invoices/create_action'),
            'id'  => set_value('id'),
            'order_no' => set_value('order_no'),
            'customer_id' => set_value('customer_id'),
            'due_date' => set_value('due_date'),
            'subject' => set_value('subject'),
            'description' => set_value('description'),
            'total_qty' => set_value('total_qty'),
            'total_amt' => set_value('total_amt'),
            'discount' => set_value('discount'),
            'paid' => set_value('paid'),
            'balance' => set_value('balance'),
            'refunded' => set_value('refunded'),
            'terms' => set_value('terms'),
            'created_at' => set_value('created_at'),
            'updated_at' => set_value('updated_at'),
            'status' => set_value('status'),
            'emptyrowid' => $row->id,
        );
        $this->_tpl('invoices/invoices_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(

                'id' => $this->input->post('id', TRUE),
                'order_no' => $this->input->post('order_no', TRUE),
                'customer_id' => $this->input->post('customer_id', TRUE),
                'due_date' => $this->input->post('due_date', TRUE),
                'subject' => $this->input->post('subject', TRUE),
                'description' => $this->input->post('description', TRUE),
                'total_qty' => $this->input->post('total_qty', TRUE),
                'total_amt' => $this->input->post('total_amt', TRUE),
                'discount' => $this->input->post('discount', TRUE),
                'paid' => $this->input->post('paid', TRUE),
                'balance' => $this->input->post('balance', TRUE),
                'refunded' => $this->input->post('refunded', TRUE),
                'terms' => $this->input->post('terms', TRUE),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'status' => $this->input->post('status', TRUE),
            );

            $this->Invoices_model->insert($data);
            $id = $this->db->insert_id();
            redirect(site_url('invoices'));
        }
    }

    public function update($id)
    {
        $row = $this->Customers_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('invoices/update_action'),
                'id' => $this->input->post('id', TRUE),
                'order_no' => $this->input->post('order_no', TRUE),
                'customer_id' => $this->input->post('customer_id', TRUE),
                'due_date' => $this->input->post('due_date', TRUE),
                'subject' => $this->input->post('subject', TRUE),
                'description' => $this->input->post('description', TRUE),
                'total_qty' => $this->input->post('total_qty', TRUE),
                'total_amt' => $this->input->post('total_amt', TRUE),
                'discount' => $this->input->post('discount', TRUE),
                'paid' => $this->input->post('paid', TRUE),
                'balance' => $this->input->post('balance', TRUE),
                'refunded' => $this->input->post('refunded', TRUE),
                'terms' => $this->input->post('terms', TRUE),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'status' => $this->input->post('status', TRUE),
            );
            $this->_tpl('invoices/invoices_edit', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('invoices'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
                'id' => $this->input->post('id', TRUE),
                'order_no' => $this->input->post('order_no', TRUE),
                'customer_id' => $this->input->post('customer_id', TRUE),
                'due_date' => $this->input->post('due_date', TRUE),
                'subject' => $this->input->post('subject', TRUE),
                'description' => $this->input->post('description', TRUE),
                'total_qty' => $this->input->post('total_qty', TRUE),
                'total_amt' => $this->input->post('total_amt', TRUE),
                'discount' => $this->input->post('discount', TRUE),
                'paid' => $this->input->post('paid', TRUE),
                'balance' => $this->input->post('balance', TRUE),
                'refunded' => $this->input->post('refunded', TRUE),
                'terms' => $this->input->post('terms', TRUE),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'status' => $this->input->post('status', TRUE),
            );

            $this->Customers_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('invoices'));
        }
    }

    public function delete($id)
    {
        $row = $this->Invoices_model->get_by_id($id);

        if ($row) {
            $this->Invoices_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('invoices'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('invoices'));
        }
    }

    public function _rules()
    {

        $this->form_validation->set_rules('order_no', 'order_no', 'trim|required');
        $this->form_validation->set_rules('customer_id', 'customer_id', 'trim|required');
        $this->form_validation->set_rules('due_date', 'due_date', 'trim|required');
        $this->form_validation->set_rules('subject', 'subject', 'trim|required');
        $this->form_validation->set_rules('description', 'description', 'trim|required');
        $this->form_validation->set_rules('total_qty', 'total_qty', 'trim|required');
        $this->form_validation->set_rules('total_amt', 'total_amt', 'trim|required');
        $this->form_validation->set_rules('discount', 'discount', 'trim|required');
        $this->form_validation->set_rules('paid', 'paid', 'trim|required');
        $this->form_validation->set_rules('balance', 'balance', 'trim|required');
        $this->form_validation->set_rules('refunded', 'refunded', 'trim|required');
        $this->form_validation->set_rules('terms', 'terms', 'trim|required');
        $this->form_validation->set_rules('id', 'id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function check_exist()
    {
        $val = $this->input->post('val');
        $col = $this->input->post('col');
        $id = isset($_POST['id']) ? $_POST['id'] : '';
        $res = $this->Customers_model->check_exist($val, $col, $id);
        if ($res) {
            echo 'false';
        } else {
            echo 'true';
        }
    }
    public function send_email_verification($id)
    {
        $row = $this->Users_model->get_by_id($id);
        // if ($this->Employee_Model->insertEmployee($row)) {

        //send confirm mail
        // $row->email
        $receiver = 'tmpawar66@gmail.com';
        if ($this->Users_model->sendEmail($receiver)) {
            //redirect('Login_Controller/index');
            //$msg = "Successfully registered with the sysytem.Conformation link has been sent to: ".$this->input->post('txt_email');
            $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Successfully registered. Please confirm the mail that has been sent to your email. </div>');

            // $this->load->view('header');
            $this->load->view('users_list');
            // $this->load->view('footer');
        } else {

            //$error = "Error, Cannot insert new user details!";
            $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Failed!! Please try again.</div>');
            // redirect(site_url('users'));
        }
        // }
    }

    function httpGet($url)
    {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        //  curl_setopt($ch,CURLOPT_HEADER, false); 

        $output = curl_exec($ch);

        curl_close($ch);
        return $output;
    }
}

/* End of file Users.php */
