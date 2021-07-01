<?php

/* Location: ./application/controllers/Degree_types.php */
/* Derived from Harviacode  */
/* Modified by Vivek Raghunathan 2021-06-25 17:48:03 */
/* Email : vivekra@dqserv.com */
/* http://dqserv.com */



if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Degree_types extends APP_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Degree_types_model');
        $this->load->library('form_validation');
		$this->load->library('Arbac');
		if(!$this->arbac->is_loggedin()){ redirect('scp/login'); }
    }

    public function index()
    {
        $degree_types = $this->Degree_types_model->get_all();

        $data = array(
            'degree_types_data' => $degree_types,
			'title' => 'TRAMS::SCP::Degree_types',
        );
		$this->_tpl('degree_types/degree_types_list', $data);
		
    }

    public function read($id) 
    {
        $row = $this->Degree_types_model->get_by_id($id);
        if ($row) {
            $data = array(
			'title'  => 'TRAMS::SCP::Degree_types',
		'created_at' => $row->created_at,
		'degree_type' => $row->degree_type,
		'id' => $row->id,
		'updated_at' => $row->updated_at,
	    );
			$this->_tpl('degree_types/degree_types_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('degree_types'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('degree_types/create_action'),
			'title'  => 'TRAMS::SCP::Create Degree_types',
	    'created_at' => set_value('created_at'),
	    'degree_type' => set_value('degree_type'),
	    'id' => set_value('id'),
	    'updated_at' => set_value('updated_at'),
	);
          $this->_tpl('degree_types/degree_types_form', $data);	
		
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'created_at' => $this->input->post('created_at',TRUE),
		'degree_type' => $this->input->post('degree_type',TRUE),
		'updated_at' => $this->input->post('updated_at',TRUE),
	    );

            $this->Degree_types_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('degree_types'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Degree_types_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('degree_types/update_action'),
				'title'  => 'TRAMS::SCP::Update Degree_types',
		'created_at' => set_value('created_at', $row->created_at),
		'degree_type' => set_value('degree_type', $row->degree_type),
		'id' => set_value('id', $row->id),
		'updated_at' => set_value('updated_at', $row->updated_at),
	    );
			$this->_tpl('degree_types/degree_types_edit', $data);
		
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('degree_types'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'created_at' => $this->input->post('created_at',TRUE),
		'degree_type' => $this->input->post('degree_type',TRUE),
		'updated_at' => $this->input->post('updated_at',TRUE),
	    );

            $this->Degree_types_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('degree_types'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Degree_types_model->get_by_id($id);

        if ($row) {
            $this->Degree_types_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('degree_types'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('degree_types'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('created_at', 'created at', 'trim|required');
	$this->form_validation->set_rules('degree_type', 'degree type', 'trim|required');
	$this->form_validation->set_rules('updated_at', 'updated at', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function check_exist()
    {
    $val = $this->input->post('val');
	$col = $this->input->post('col');
	$id = isset($_POST['id']) ? $_POST['id'] : '';
	$res = $this->Degree_types_model->check_exist($val,$col,$id);
	if($res){
		echo 'false';
	}
	else {
		echo 'true';
	}
    }

}

/* End of file Degree_types.php */
