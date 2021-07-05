<?php

/* Location: ./application/controllers/Accounts.php */
/* Derived from Harviacode  */
/* Modified by Vivek Raghunathan 2021-06-25 14:59:47 */
/* Email : vivekra@dqserv.com */
/* http://dqserv.com */



if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Accounts extends APP_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Accounts_model');
        $this->load->library('form_validation');
		$this->load->library('Arbac');
		if(!$this->arbac->is_loggedin()){ redirect('scp/login'); }
    }

    public function index()
    {
        $accounts = $this->Accounts_model->get_all();

        $data = array(
            'accounts_data' => $accounts,
			'title' => 'TRAMS::SCP::Accounts',
        );
		$this->_tpl('accounts/accounts_list', $data);
		
    }

    public function read($id) 
    {
        $row = $this->Accounts_model->get_by_id($id);
        if ($row) {
            $data = array(
			'title'  => 'TRAMS::SCP::Accounts',
		'account_id' => $row->account_id,
		'account_type' => $row->account_type,
		'account_status' => $row->account_status,
		'amount_type' => $row->amount_type,
		'branch_id' => $row->branch_id,
		'comments' => $row->comments,
		'due_amount' => $row->due_amount,
		'due_date' => $row->due_date,
		'paid_amount' => $row->paid_amount,
		'payable_for' => $row->payable_for,
		'payee_name' => $row->payee_name,
		'payment_date' => $row->payment_date,
		'payment_mode_id' => $row->payment_mode_id,
		'payment_type' => $row->payment_type,
		'primary_date' => $row->primary_date,
		'student_id' => $row->student_id,
		'total_amount' => $row->total_amount,
	    );
			$this->_tpl('accounts/accounts_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('accounts'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('accounts/create_action'),
			'title'  => 'TRAMS::SCP::Create Accounts',
	    'account_id' => set_value('account_id'),
	    'account_type' => set_value('account_type'),
	    'account_status' => set_value('account_status'),
	    'amount_type' => set_value('amount_type'),
	    'branch_id' => set_value('branch_id'),
	    'comments' => set_value('comments'),
	    'due_amount' => set_value('due_amount'),
	    'due_date' => set_value('due_date'),
	    'paid_amount' => set_value('paid_amount'),
	    'payable_for' => set_value('payable_for'),
	    'payee_name' => set_value('payee_name'),
	    'payment_date' => set_value('payment_date'),
	    'payment_mode_id' => set_value('payment_mode_id'),
	    'payment_type' => set_value('payment_type'),
	    'primary_date' => set_value('primary_date'),
	    'student_id' => set_value('student_id'),
	    'total_amount' => set_value('total_amount'),
	);
          $this->_tpl('accounts/accounts_form', $data);	
		
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'account_type' => $this->input->post('account_type',TRUE),
		'account_status' => $this->input->post('account_status',TRUE),
		'amount_type' => $this->input->post('amount_type',TRUE),
		'branch_id' => $this->input->post('branch_id',TRUE),
		'comments' => $this->input->post('comments',TRUE),
		'due_amount' => $this->input->post('due_amount',TRUE),
		'due_date' => $this->input->post('due_date',TRUE),
		'paid_amount' => $this->input->post('paid_amount',TRUE),
		'payable_for' => $this->input->post('payable_for',TRUE),
		'payee_name' => $this->input->post('payee_name',TRUE),
		'payment_date' => $this->input->post('payment_date',TRUE),
		'payment_mode_id' => $this->input->post('payment_mode_id',TRUE),
		'payment_type' => $this->input->post('payment_type',TRUE),
		'primary_date' => $this->input->post('primary_date',TRUE),
		'student_id' => $this->input->post('student_id',TRUE),
		'total_amount' => $this->input->post('total_amount',TRUE),
	    );

            $this->Accounts_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('accounts'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Accounts_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('accounts/update_action'),
				'title'  => 'TRAMS::SCP::Update Accounts',
		'account_id' => set_value('account_id', $row->account_id),
		'account_type' => set_value('account_type', $row->account_type),
		'account_status' => set_value('account_status', $row->account_status),
		'amount_type' => set_value('amount_type', $row->amount_type),
		'branch_id' => set_value('branch_id', $row->branch_id),
		'comments' => set_value('comments', $row->comments),
		'due_amount' => set_value('due_amount', $row->due_amount),
		'due_date' => set_value('due_date', $row->due_date),
		'paid_amount' => set_value('paid_amount', $row->paid_amount),
		'payable_for' => set_value('payable_for', $row->payable_for),
		'payee_name' => set_value('payee_name', $row->payee_name),
		'payment_date' => set_value('payment_date', $row->payment_date),
		'payment_mode_id' => set_value('payment_mode_id', $row->payment_mode_id),
		'payment_type' => set_value('payment_type', $row->payment_type),
		'primary_date' => set_value('primary_date', $row->primary_date),
		'student_id' => set_value('student_id', $row->student_id),
		'total_amount' => set_value('total_amount', $row->total_amount),
	    );
			$this->_tpl('accounts/', $data);
		
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('accounts'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('account_id', TRUE));
        } else {
            $data = array(
		'account_type' => $this->input->post('account_type',TRUE),
		'account_status' => $this->input->post('account_status',TRUE),
		'amount_type' => $this->input->post('amount_type',TRUE),
		'branch_id' => $this->input->post('branch_id',TRUE),
		'comments' => $this->input->post('comments',TRUE),
		'due_amount' => $this->input->post('due_amount',TRUE),
		'due_date' => $this->input->post('due_date',TRUE),
		'paid_amount' => $this->input->post('paid_amount',TRUE),
		'payable_for' => $this->input->post('payable_for',TRUE),
		'payee_name' => $this->input->post('payee_name',TRUE),
		'payment_date' => $this->input->post('payment_date',TRUE),
		'payment_mode_id' => $this->input->post('payment_mode_id',TRUE),
		'payment_type' => $this->input->post('payment_type',TRUE),
		'primary_date' => $this->input->post('primary_date',TRUE),
		'student_id' => $this->input->post('student_id',TRUE),
		'total_amount' => $this->input->post('total_amount',TRUE),
	    );

            $this->Accounts_model->update($this->input->post('account_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('accounts'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Accounts_model->get_by_id($id);

        if ($row) {
            $this->Accounts_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('accounts'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('accounts'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('account_type', 'account type', 'trim|required');
	$this->form_validation->set_rules('account_status', 'account status', 'trim|required|numeric');
	$this->form_validation->set_rules('amount_type', 'amount type', 'trim|required|numeric');
	$this->form_validation->set_rules('branch_id', 'branch id', 'trim|required|numeric');
	$this->form_validation->set_rules('comments', 'comments', 'trim|required');
	$this->form_validation->set_rules('due_amount', 'due amount', 'trim|required');
	$this->form_validation->set_rules('due_date', 'due date', 'trim|required');
	$this->form_validation->set_rules('paid_amount', 'paid amount', 'trim|required');
	$this->form_validation->set_rules('payable_for', 'payable for', 'trim|required');
	$this->form_validation->set_rules('payee_name', 'payee name', 'trim|required');
	$this->form_validation->set_rules('payment_date', 'payment date', 'trim|required');
	$this->form_validation->set_rules('payment_mode_id', 'payment mode id', 'trim|required');
	$this->form_validation->set_rules('payment_type', 'payment type', 'trim|required');
	$this->form_validation->set_rules('primary_date', 'primary date', 'trim|required');
	$this->form_validation->set_rules('student_id', 'student id', 'trim|required|numeric');
	$this->form_validation->set_rules('total_amount', 'total amount', 'trim|required');

	$this->form_validation->set_rules('account_id', 'account_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function check_exist()
    {
    $val = $this->input->post('val');
	$col = $this->input->post('col');
	$id = isset($_POST['id']) ? $_POST['id'] : '';
	$res = $this->Accounts_model->check_exist($val,$col,$id);
	if($res){
		echo 'false';
	}
	else {
		echo 'true';
	}
    }

}

/* End of file Accounts.php */