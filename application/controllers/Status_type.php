<?php

/* Location: ./application/controllers/Status_type.php */
/* Derived from Harviacode  */
/* Modified by Vivek Raghunathan 2021-06-25 17:57:52 */
/* Email : vivekra@dqserv.com */
/* http://dqserv.com */



if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Status_type extends APP_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Status_type_model');
        $this->load->library('form_validation');
		$this->load->library('Arbac');
		if(!$this->arbac->is_loggedin()){ redirect('scp/login'); }
    }

    public function index()
    {
        $status_type = $this->Status_type_model->get_all();

        $data = array(
            'status_type_data' => $status_type,
			'title' => 'TRAMS::SCP::Status_type',
        );
		$this->_tpl('status_type/status_type_list', $data);
		
    }

    public function read($id) 
    {
        $row = $this->Status_type_model->get_by_id($id);
        if ($row) {
            $data = array(
			'title'  => 'TRAMS::SCP::Status_type',
		'active' => $row->active,
		'created' => $row->created,
		'status_type' => $row->status_type,
		'status_type_id' => $row->status_type_id,
		'updated' => $row->updated,
	    );
			$this->_tpl('status_type/status_type_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('status_type'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('status_type/create_action'),
			'title'  => 'TRAMS::SCP::Create Status_type',
	    'active' => set_value('active'),
	    'created' => set_value('created'),
	    'status_type' => set_value('status_type'),
	    'status_type_id' => set_value('status_type_id'),
	    'updated' => set_value('updated'),
	);
          $this->_tpl('status_type/status_type_form', $data);	
		
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'active' => $this->input->post('active',TRUE),
		'created' => date('Y-m-d H:i:s'),
		'status_type' => $this->input->post('status_type',TRUE),
		'updated' => date('Y-m-d H:i:s'),
	    );

            $this->Status_type_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('status_type'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Status_type_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('status_type/update_action'),
				'title'  => 'TRAMS::SCP::Update Status_type',
		'active' => set_value('active', $row->active),
		'created' => set_value('created', $row->created),
		'status_type' => set_value('status_type', $row->status_type),
		'status_type_id' => set_value('status_type_id', $row->status_type_id),
		'updated' => set_value('updated', $row->updated),
	    );
			$this->_tpl('status_type/status_type_edit', $data);
		
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('status_type'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('status_type_id', TRUE));
        } else {
            $data = array(
		'active' => $this->input->post('active',TRUE),
		
		'status_type' => $this->input->post('status_type',TRUE),
		'updated' => date('Y-m-d H:i:s'),
	    );

            $this->Status_type_model->update($this->input->post('status_type_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('status_type'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Status_type_model->get_by_id($id);

        if ($row) {
            $this->Status_type_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('status_type'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('status_type'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('active', 'active', 'trim|required');
		
	$this->form_validation->set_rules('status_type', 'status type', 'trim|required');
		

	$this->form_validation->set_rules('status_type_id', 'status_type_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function check_exist()
    {
    $val = $this->input->post('val');
	$col = $this->input->post('col');
	$id = isset($_POST['id']) ? $_POST['id'] : '';
	$res = $this->Status_type_model->check_exist($val,$col,$id);
	if($res){
		echo 'false';
	}
	else {
		echo 'true';
	}
    }

}

/* End of file Status_type.php */
