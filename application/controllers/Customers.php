<?php

/* Location: ./application/controllers/Users.php */
/* Derived from Harviacode  */
/* Modified by Vivek Raghunathan 2021-07-14 22:49:07 */
/* Email : vivekra@dqserv.com */
/* http://dqserv.com */



if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Customers extends APP_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Customers_model');
        $this->load->library('form_validation');
        $this->load->library('Arbac');
        if (!$this->arbac->is_loggedin()) {
            redirect('scp/auth_login');
        }
    }

    public function index()
    {
        $customers = $this->Customers_model->get_all();

        $data = array(
            'data' => $customers,
            'title' => 'TRAMS::SCP::Customers',
        );
        $this->_tpl('customers/customers_list', $data);
    }

    public function read($id)
    {
        $row = $this->Customers_model->get_by_id($id);
        if ($row) {
            $data = array(
                'prefix'  => $row->prefix,
                'phone' => $row->phone,
                'email' => $row->email,
                'firstname' => $row->firstname,
                'middlename' => $row->middlename,
                'lastname' => $row->lastname,
                'id' => $row->id,
                'address' => $row->address,
                'company' => $row->company,
                'city' => $row->city,
                //'receivables' => $row->receivables,
                //'credits' => $row->credits,
                'status' => $row->status,
                'created_at' => $row->created_at,
                'updated_at' => $row->updated_at,

            );
            $this->_tpl('customers/customers_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('users'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('customers/create_action'),
            'prefix'  => set_value('prefix'),
            'email' => set_value('email'),
            'phone' => set_value('phone'),
            'firstname' => set_value('firstname'),
            'middlename' => set_value('middlename'),
            'lastname' => set_value('lastname'),
            'id' => set_value('id'),
            'address' => set_value('address'),
            'company' => set_value('company'),
            'city' => set_value('city'),
            //'receivables' => set_value('receivables'),
            //'credits' => set_value('credits'),
            'status' => set_value('status'),
            'created_at' => set_value('created_at'),
            'updated_at' => set_value('updated_at'),
        );
        $this->_tpl('customers/customers_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'created_at' => date('Y-m-d H:i:s'),
                'email' => $this->input->post('email', TRUE),
                'updated_at' => date('Y-m-d H:i:s'),
                'prefix' => $this->input->post('prefix', TRUE),
                'phone' => $this->input->post('phone', TRUE),
                'firstname' => $this->input->post('firstname', TRUE),
                'middlename' => $this->input->post('middlename', TRUE),
                'lastname' => $this->input->post('lastname', TRUE),
                'id' => $this->input->post('id', TRUE),
                'address' => $this->input->post('address', TRUE),
                'company' => $this->input->post('company', TRUE),
                'city' => $this->input->post('city', TRUE),
                //'receivables' => $this->input->post('receivables', TRUE),
                //'credits' => $this->input->post('credits', TRUE),
                'status' => $this->input->post('status', TRUE),
            );

            $this->Customers_model->insert($data);
            $id = $this->db->insert_id();
            //redirect("https://app.talentegra.com/api/ciRegister/" . $id);
            //$curl_handler = curl_init("https://app.talentegra.com/api/ciRegister/".$id);

            // $output = $this->httpGet("https://app.talentegra.com/api/ciRegister/" . $id);
            // //print_r($output);exit;
            // $this->session->set_flashdata('message', 'User created successfully.Acitvation email has been sent to user to set his password.');
            redirect(site_url('customers'));
        }
    }

    public function update($id)
    {
        $row = $this->Customers_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('customers/update_action'),
                'prefix'  => set_value('prefix', $row->prefix),
                'email' => set_value('email', $row->email),
                'phone' => set_value('phone', $row->phone),
                'firstname' => set_value('firstname', $row->firstname),
                'middlename' => set_value('middlename', $row->middlename),
                'lastname' => set_value('lastname', $row->lastname),
                'id' => set_value('id', $row->id),
                'address' => set_value('address', $row->address),
                'company' => set_value('company', $row->company),
                'city' => set_value('city', $row->city),
                //'receivables' => set_value('receivables', $row->receivables),
                //'credits' => set_value('credits', $row->credits),
                'status' => set_value('status', $row->status),
                'created_at' => set_value('created_at', date('Y-m-d H:i:s')),
                'updated_at' => set_value('updated_at', date('Y-m-d H:i:s')),
            );
            $this->_tpl('customers/customers_edit', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('customers'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
                'created_at' => date('Y-m-d H:i:s'),
                'email' => $this->input->post('email', TRUE),
                'updated_at' => date('Y-m-d H:i:s'),
                'prefix' => $this->input->post('prefix', TRUE),
                'phone' => $this->input->post('phone', TRUE),
                'firstname' => $this->input->post('firstname', TRUE),
                'middlename' => $this->input->post('middlename', TRUE),
                'lastname' => $this->input->post('lastname', TRUE),
                'id' => $this->input->post('id', TRUE),
                'address' => $this->input->post('address', TRUE),
                'company' => $this->input->post('company', TRUE),
                'city' => $this->input->post('city', TRUE),
                //'receivables' => $this->input->post('receivables', TRUE),
                //'credits' => $this->input->post('credits', TRUE),
                'status' => $this->input->post('status', TRUE),
            );

            $this->Customers_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('customers'));
        }
    }

    public function delete($id)
    {
        $row = $this->Customers_model->get_by_id($id);

        if ($row) {
            $this->Customers_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('customers'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('customers'));
        }
    }

    public function _rules()
    {

        $this->form_validation->set_rules('firstname', 'firstname', 'trim|required');
        $this->form_validation->set_rules('lastname', 'lastname', 'trim|required');
        //$this->form_validation->set_rules('middlename', 'middlename', 'trim|required');
        $this->form_validation->set_rules('email', 'email', 'trim|required');
        $this->form_validation->set_rules('prefix', 'prefix', 'trim|required');
        $this->form_validation->set_rules('address', 'address', 'trim|required');
        $this->form_validation->set_rules('company', 'company', 'trim|required');
        $this->form_validation->set_rules('city', 'city', 'trim|required');
        $this->form_validation->set_rules('phone', 'phone', 'trim|required');
        //$this->form_validation->set_rules('receivables', 'receivables', 'trim|required');
        //$this->form_validation->set_rules('credits', 'credits', 'trim|required');
        //$this->form_validation->set_rules('id', 'id', 'trim');
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
