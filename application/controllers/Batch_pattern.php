<?php

/* Location: ./application/controllers/Batch_pattern.php */
/* Derived from Harviacode  */
/* Modified by Vivek Raghunathan 2021-06-25 14:59:48 */
/* Email : vivekra@dqserv.com */
/* http://dqserv.com */



if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Batch_pattern extends APP_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Batch_pattern_model');
        $this->load->library('form_validation');
		$this->load->library('Arbac');
		if(!$this->arbac->is_loggedin()){ redirect('scp/login'); }
    }

    public function index()
    {
        $batch_pattern = $this->Batch_pattern_model->get_all();

        $data = array(
            'batch_pattern_data' => $batch_pattern,
			'title' => 'TRAMS::SCP::Batch_pattern',
        );
		$this->_tpl('batch_pattern/batch_pattern_list', $data);
		
    }

    public function read($id) 
    {
        $row = $this->Batch_pattern_model->get_by_id($id);
        if ($row) {
            $data = array(
			'title'  => 'TRAMS::SCP::Batch_pattern',
		'active' => $row->active,
		'batch_pattern' => $row->batch_pattern,
		'batch_pattern_id' => $row->batch_pattern_id,
		'created' => $row->created,
		'updated' => $row->updated,
	    );
			$this->_tpl('batch_pattern/batch_pattern_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('batch_pattern'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('batch_pattern/create_action'),
			'title'  => 'TRAMS::SCP::Create Batch_pattern',
	    'active' => set_value('active'),
	    'batch_pattern' => set_value('batch_pattern'),
	    'batch_pattern_id' => set_value('batch_pattern_id'),
	    'created' => set_value('created'),
	    'updated' => set_value('updated'),
	);
          $this->_tpl('batch_pattern/batch_pattern_form', $data);	
		
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'active' => $this->input->post('active',TRUE),
		'batch_pattern' => $this->input->post('batch_pattern',TRUE),
		'created' => date('Y-m-d H:i:s'),
		'updated' => date('Y-m-d H:i:s'),
	    );

            $this->Batch_pattern_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('batch_pattern'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Batch_pattern_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('batch_pattern/update_action'),
				'title'  => 'TRAMS::SCP::Update Batch_pattern',
		'active' => set_value('active', $row->active),
		'batch_pattern' => set_value('batch_pattern', $row->batch_pattern),
		'batch_pattern_id' => set_value('batch_pattern_id', $row->batch_pattern_id),
		'created' => set_value('created', $row->created),
		'updated' => set_value('updated', $row->updated),
	    );
			$this->_tpl('batch_pattern/', $data);
		
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('batch_pattern'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('batch_pattern_id', TRUE));
        } else {
            $data = array(
		'active' => $this->input->post('active',TRUE),
		'batch_pattern' => $this->input->post('batch_pattern',TRUE),
		
		'updated' => date('Y-m-d H:i:s'),
	    );

            $this->Batch_pattern_model->update($this->input->post('batch_pattern_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('batch_pattern'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Batch_pattern_model->get_by_id($id);

        if ($row) {
            $this->Batch_pattern_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('batch_pattern'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('batch_pattern'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('active', 'active', 'trim|required');
	$this->form_validation->set_rules('batch_pattern', 'batch pattern', 'trim|required');
		
		

	$this->form_validation->set_rules('batch_pattern_id', 'batch_pattern_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function check_exist()
    {
    $val = $this->input->post('val');
	$col = $this->input->post('col');
	$id = isset($_POST['id']) ? $_POST['id'] : '';
	$res = $this->Batch_pattern_model->check_exist($val,$col,$id);
	if($res){
		echo 'false';
	}
	else {
		echo 'true';
	}
    }

}

/* End of file Batch_pattern.php */
