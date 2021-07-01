<?php

/* Location: ./application/controllers/Batch_type.php */
/* Derived from Harviacode  */
/* Modified by Vivek Raghunathan 2021-06-24 20:58:24 */
/* Email : vivekra@dqserv.com */
/* http://dqserv.com */



if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Batch_type extends APP_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Batch_type_model');
        $this->load->library('form_validation');
		$this->load->library('Arbac');
		if(!$this->arbac->is_loggedin()){ redirect('scp/login'); }
    }

    public function index()
    {
        $batch_type = $this->Batch_type_model->get_all();

        $data = array(
            'batch_type_data' => $batch_type,
			'title' => 'TRAMS::SCP::Batch_type',
        );
		$this->_tpl('batch_type/batch_type_list', $data);
		
    }

    public function read($id) 
    {
        $row = $this->Batch_type_model->get_by_id($id);
        if ($row) {
            $data = array(
			'title'  => 'TRAMS::SCP::Batch_type',
		'batch_type_id' => $row->batch_type_id,
		'batch_type_name' => $row->batch_type_name,
		'active' => $row->active,
		'created' => $row->created,
		'updated' => $row->updated,
	    );
			$this->_tpl('batch_type/batch_type_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('batch_type'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('batch_type/create_action'),
			'title'  => 'TRAMS::SCP::Create Batch_type',
	    'batch_type_id' => set_value('batch_type_id'),
	    'batch_type_name' => set_value('batch_type_name'),
	    'active' => set_value('active'),
	    'created' => set_value('created'),
	    'updated' => set_value('updated'),
	);
          $this->_tpl('batch_type/batch_type_form', $data);	
		
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'batch_type_name' => $this->input->post('batch_type_name',TRUE),
		'active' => $this->input->post('active',TRUE),
		'created' => date('Y-m-d H:i:s'),
		'updated' => date('Y-m-d H:i:s'),
	    );

            $this->Batch_type_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('batch_type'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Batch_type_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('batch_type/update_action'),
				'title'  => 'TRAMS::SCP::Update Batch_type',
		'batch_type_id' => set_value('batch_type_id', $row->batch_type_id),
		'batch_type_name' => set_value('batch_type_name', $row->batch_type_name),
		'active' => set_value('active', $row->active),
		'created' => set_value('created', $row->created),
		'updated' => set_value('updated', $row->updated),
	    );
			$this->_tpl('batch_type/batch_type_edit', $data);
		
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('batch_type'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('batch_type_id', TRUE));
        } else {
            $data = array(
		'batch_type_name' => $this->input->post('batch_type_name',TRUE),
		'active' => $this->input->post('active',TRUE),
		
		'updated' => date('Y-m-d H:i:s'),
	    );

            $this->Batch_type_model->update($this->input->post('batch_type_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('batch_type'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Batch_type_model->get_by_id($id);

        if ($row) {
            $this->Batch_type_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('batch_type'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('batch_type'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('batch_type_name', 'batch type name', 'trim|required');
	$this->form_validation->set_rules('active', 'active', 'trim|required');
		
		

	$this->form_validation->set_rules('batch_type_id', 'batch_type_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function check_exist()
    {
    $val = $this->input->post('val');
	$col = $this->input->post('col');
	$id = isset($_POST['id']) ? $_POST['id'] : '';
	$res = $this->Batch_type_model->check_exist($val,$col,$id);
	if($res){
		echo 'false';
	}
	else {
		echo 'true';
	}
    }

}

/* End of file Batch_type.php */
