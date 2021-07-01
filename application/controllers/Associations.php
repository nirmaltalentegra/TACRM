<?php

/* Location: ./application/controllers/Associations.php */
/* Derived from Harviacode  */
/* Modified by Vivek Raghunathan 2021-06-25 14:59:48 */
/* Email : vivekra@dqserv.com */
/* http://dqserv.com */



if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Associations extends APP_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Associations_model');
        $this->load->library('form_validation');
		$this->load->library('Arbac');
		if(!$this->arbac->is_loggedin()){ redirect('scp/login'); }
    }

    public function index()
    {
        $associations = $this->Associations_model->get_all();

        $data = array(
            'associations_data' => $associations,
			'title' => 'TRAMS::SCP::Associations',
        );
		$this->_tpl('associations/associations_list', $data);
		
    }

    public function read($id) 
    {
        $row = $this->Associations_model->get_by_id($id);
        if ($row) {
            $data = array(
			'title'  => 'TRAMS::SCP::Associations',
		'association' => $row->association,
		'created_at' => $row->created_at,
		'id' => $row->id,
		'updated_at' => $row->updated_at,
	    );
			$this->_tpl('associations/associations_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('associations'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('associations/create_action'),
			'title'  => 'TRAMS::SCP::Create Associations',
	    'association' => set_value('association'),
	    'created_at' => set_value('created_at'),
	    'id' => set_value('id'),
	    'updated_at' => set_value('updated_at'),
	);
          $this->_tpl('associations/associations_form', $data);	
		
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'association' => $this->input->post('association',TRUE),
		'created_at' => $this->input->post('created_at',TRUE),
		'updated_at' => $this->input->post('updated_at',TRUE),
	    );

            $this->Associations_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('associations'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Associations_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('associations/update_action'),
				'title'  => 'TRAMS::SCP::Update Associations',
		'association' => set_value('association', $row->association),
		'created_at' => set_value('created_at', $row->created_at),
		'id' => set_value('id', $row->id),
		'updated_at' => set_value('updated_at', $row->updated_at),
	    );
			$this->_tpl('associations/', $data);
		
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('associations'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'association' => $this->input->post('association',TRUE),
		'created_at' => $this->input->post('created_at',TRUE),
		'updated_at' => $this->input->post('updated_at',TRUE),
	    );

            $this->Associations_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('associations'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Associations_model->get_by_id($id);

        if ($row) {
            $this->Associations_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('associations'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('associations'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('association', 'association', 'trim|required');
	$this->form_validation->set_rules('created_at', 'created at', 'trim|required');
	$this->form_validation->set_rules('updated_at', 'updated at', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function check_exist()
    {
    $val = $this->input->post('val');
	$col = $this->input->post('col');
	$id = isset($_POST['id']) ? $_POST['id'] : '';
	$res = $this->Associations_model->check_exist($val,$col,$id);
	if($res){
		echo 'false';
	}
	else {
		echo 'true';
	}
    }

}

/* End of file Associations.php */
