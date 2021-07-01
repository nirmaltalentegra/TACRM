<?php

/* Location: ./application/controllers/Source.php */
/* Derived from Harviacode  */
/* Modified by Vivek Raghunathan 2021-06-25 17:57:32 */
/* Email : vivekra@dqserv.com */
/* http://dqserv.com */



if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Source extends APP_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Source_model');
        $this->load->library('form_validation');
		$this->load->library('Arbac');
		if(!$this->arbac->is_loggedin()){ redirect('scp/login'); }
    }

    public function index()
    {
        $source = $this->Source_model->get_all();

        $data = array(
            'source_data' => $source,
			'title' => 'TRAMS::SCP::Source',
        );
		$this->_tpl('source/source_list', $data);
		
    }

    public function read($id) 
    {
        $row = $this->Source_model->get_by_id($id);
        if ($row) {
            $data = array(
			'title'  => 'TRAMS::SCP::Source',
		'active' => $row->active,
		'created' => $row->created,
		'source_details' => $row->source_details,
		'source_id' => $row->source_id,
		'updated' => $row->updated,
	    );
			$this->_tpl('source/source_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('source'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('source/create_action'),
			'title'  => 'TRAMS::SCP::Create Source',
	    'active' => set_value('active'),
	    'created' => set_value('created'),
	    'source_details' => set_value('source_details'),
	    'source_id' => set_value('source_id'),
	    'updated' => set_value('updated'),
	);
          $this->_tpl('source/source_form', $data);	
		
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
		'source_details' => $this->input->post('source_details',TRUE),
		'updated' => date('Y-m-d H:i:s'),
	    );

            $this->Source_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('source'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Source_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('source/update_action'),
				'title'  => 'TRAMS::SCP::Update Source',
		'active' => set_value('active', $row->active),
		'created' => set_value('created', $row->created),
		'source_details' => set_value('source_details', $row->source_details),
		'source_id' => set_value('source_id', $row->source_id),
		'updated' => set_value('updated', $row->updated),
	    );
			$this->_tpl('source/source_edit', $data);
		
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('source'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('source_id', TRUE));
        } else {
            $data = array(
		'active' => $this->input->post('active',TRUE),
		
		'source_details' => $this->input->post('source_details',TRUE),
		'updated' => date('Y-m-d H:i:s'),
	    );

            $this->Source_model->update($this->input->post('source_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('source'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Source_model->get_by_id($id);

        if ($row) {
            $this->Source_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('source'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('source'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('active', 'active', 'trim|required');
		
	$this->form_validation->set_rules('source_details', 'source details', 'trim|required');
		

	$this->form_validation->set_rules('source_id', 'source_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function check_exist()
    {
    $val = $this->input->post('val');
	$col = $this->input->post('col');
	$id = isset($_POST['id']) ? $_POST['id'] : '';
	$res = $this->Source_model->check_exist($val,$col,$id);
	if($res){
		echo 'false';
	}
	else {
		echo 'true';
	}
    }

}

/* End of file Source.php */
