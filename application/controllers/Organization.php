<?php

/* Location: ./application/controllers/Organization.php */
/* Derived from Harviacode  */
/* Modified by Vivek Raghunathan 2021-06-25 17:57:03 */
/* Email : vivekra@dqserv.com */
/* http://dqserv.com */



if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Organization extends APP_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Organization_model');
        $this->load->library('form_validation');
		$this->load->library('Arbac');
		if(!$this->arbac->is_loggedin()){ redirect('scp/login'); }
    }

    public function index()
    {
        $organization = $this->Organization_model->get_all();

        $data = array(
            'organization_data' => $organization,
			'title' => 'TRAMS::SCP::Organization',
        );
		$this->_tpl('organization/organization_list', $data);
		
    }

    public function read($id) 
    {
        $row = $this->Organization_model->get_by_id($id);
        if ($row) {
            $data = array(
			'title'  => 'TRAMS::SCP::Organization',
		'created' => $row->created,
		'domain' => $row->domain,
		'extra' => $row->extra,
		'id' => $row->id,
		'manager' => $row->manager,
		'name' => $row->name,
		'status' => $row->status,
		'updated' => $row->updated,
	    );
			$this->_tpl('organization/organization_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('organization'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('organization/create_action'),
			'title'  => 'TRAMS::SCP::Create Organization',
	    'created' => set_value('created'),
	    'domain' => set_value('domain'),
	    'extra' => set_value('extra'),
	    'id' => set_value('id'),
	    'manager' => set_value('manager'),
	    'name' => set_value('name'),
	    'status' => set_value('status'),
	    'updated' => set_value('updated'),
	);
          $this->_tpl('organization/organization_form', $data);	
		
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'created' => date('Y-m-d H:i:s'),
		'domain' => $this->input->post('domain',TRUE),
		'extra' => $this->input->post('extra',TRUE),
		'manager' => $this->input->post('manager',TRUE),
		'name' => $this->input->post('name',TRUE),
		'status' => $this->input->post('status',TRUE),
		'updated' => date('Y-m-d H:i:s'),
	    );

            $this->Organization_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('organization'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Organization_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('organization/update_action'),
				'title'  => 'TRAMS::SCP::Update Organization',
		'created' => set_value('created', $row->created),
		'domain' => set_value('domain', $row->domain),
		'extra' => set_value('extra', $row->extra),
		'id' => set_value('id', $row->id),
		'manager' => set_value('manager', $row->manager),
		'name' => set_value('name', $row->name),
		'status' => set_value('status', $row->status),
		'updated' => set_value('updated', $row->updated),
	    );
			$this->_tpl('organization/organization_edit', $data);
		
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('organization'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		
		'domain' => $this->input->post('domain',TRUE),
		'extra' => $this->input->post('extra',TRUE),
		'manager' => $this->input->post('manager',TRUE),
		'name' => $this->input->post('name',TRUE),
		'status' => $this->input->post('status',TRUE),
		'updated' => date('Y-m-d H:i:s'),
	    );

            $this->Organization_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('organization'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Organization_model->get_by_id($id);

        if ($row) {
            $this->Organization_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('organization'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('organization'));
        }
    }

    public function _rules() 
    {
		
	$this->form_validation->set_rules('domain', 'domain', 'trim|required');
	$this->form_validation->set_rules('extra', 'extra', 'trim|required');
	$this->form_validation->set_rules('manager', 'manager', 'trim|required');
	$this->form_validation->set_rules('name', 'name', 'trim|required');
	$this->form_validation->set_rules('status', 'status', 'trim|required|numeric');
		

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function check_exist()
    {
    $val = $this->input->post('val');
	$col = $this->input->post('col');
	$id = isset($_POST['id']) ? $_POST['id'] : '';
	$res = $this->Organization_model->check_exist($val,$col,$id);
	if($res){
		echo 'false';
	}
	else {
		echo 'true';
	}
    }

}

/* End of file Organization.php */
