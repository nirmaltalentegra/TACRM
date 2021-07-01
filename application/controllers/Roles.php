<?php

/* Location: ./application/controllers/Roles.php */
/* Derived from Harviacode  */
/* Modified by Vivek Raghunathan 2021-06-25 17:57:14 */
/* Email : vivekra@dqserv.com */
/* http://dqserv.com */



if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Roles extends APP_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Roles_model');
        $this->load->library('form_validation');
		$this->load->library('Arbac');
		if(!$this->arbac->is_loggedin()){ redirect('scp/login'); }
    }

    public function index()
    {
        $roles = $this->Roles_model->get_all();

        $data = array(
            'roles_data' => $roles,
			'title' => 'TRAMS::SCP::Roles',
        );
		$this->_tpl('roles/roles_list', $data);
		
    }

    public function read($id) 
    {
        $row = $this->Roles_model->get_by_id($id);
        if ($row) {
            $data = array(
			'title'  => 'TRAMS::SCP::Roles',
		'created_at' => $row->created_at,
		'id' => $row->id,
		'updated_at' => $row->updated_at,
		'user_role' => $row->user_role,
	    );
			$this->_tpl('roles/roles_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('roles'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('roles/create_action'),
			'title'  => 'TRAMS::SCP::Create Roles',
	    'created_at' => set_value('created_at'),
	    'id' => set_value('id'),
	    'updated_at' => set_value('updated_at'),
	    'user_role' => set_value('user_role'),
	);
          $this->_tpl('roles/roles_form', $data);	
		
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'created_at' => $this->input->post('created_at',TRUE),
		'updated_at' => $this->input->post('updated_at',TRUE),
		'user_role' => $this->input->post('user_role',TRUE),
	    );

            $this->Roles_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('roles'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Roles_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('roles/update_action'),
				'title'  => 'TRAMS::SCP::Update Roles',
		'created_at' => set_value('created_at', $row->created_at),
		'id' => set_value('id', $row->id),
		'updated_at' => set_value('updated_at', $row->updated_at),
		'user_role' => set_value('user_role', $row->user_role),
	    );
			$this->_tpl('roles/roles_edit', $data);
		
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('roles'));
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
		'updated_at' => $this->input->post('updated_at',TRUE),
		'user_role' => $this->input->post('user_role',TRUE),
	    );

            $this->Roles_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('roles'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Roles_model->get_by_id($id);

        if ($row) {
            $this->Roles_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('roles'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('roles'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('created_at', 'created at', 'trim|required');
	$this->form_validation->set_rules('updated_at', 'updated at', 'trim|required');
	$this->form_validation->set_rules('user_role', 'user role', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function check_exist()
    {
    $val = $this->input->post('val');
	$col = $this->input->post('col');
	$id = isset($_POST['id']) ? $_POST['id'] : '';
	$res = $this->Roles_model->check_exist($val,$col,$id);
	if($res){
		echo 'false';
	}
	else {
		echo 'true';
	}
    }

}

/* End of file Roles.php */
