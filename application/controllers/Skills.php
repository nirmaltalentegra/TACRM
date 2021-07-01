<?php

/* Location: ./application/controllers/Skills.php */
/* Derived from Harviacode  */
/* Modified by Vivek Raghunathan 2021-06-25 17:57:22 */
/* Email : vivekra@dqserv.com */
/* http://dqserv.com */



if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Skills extends APP_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Skills_model');
        $this->load->library('form_validation');
		$this->load->library('Arbac');
		if(!$this->arbac->is_loggedin()){ redirect('scp/login'); }
    }

    public function index()
    {
        $skills = $this->Skills_model->get_all();

        $data = array(
            'skills_data' => $skills,
			'title' => 'TRAMS::SCP::Skills',
        );
		$this->_tpl('skills/skills_list', $data);
		
    }

    public function read($id) 
    {
        $row = $this->Skills_model->get_by_id($id);
        if ($row) {
            $data = array(
			'title'  => 'TRAMS::SCP::Skills',
		'created' => $row->created,
		'skill_id' => $row->skill_id,
		'skill_name' => $row->skill_name,
		'updated' => $row->updated,
	    );
			$this->_tpl('skills/skills_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('skills'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('skills/create_action'),
			'title'  => 'TRAMS::SCP::Create Skills',
	    'created' => set_value('created'),
	    'skill_id' => set_value('skill_id'),
	    'skill_name' => set_value('skill_name'),
	    'updated' => set_value('updated'),
	);
          $this->_tpl('skills/skills_form', $data);	
		
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'created' => date('Y-m-d H:i:s'),
		'skill_name' => $this->input->post('skill_name',TRUE),
		'updated' => date('Y-m-d H:i:s'),
	    );

            $this->Skills_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('skills'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Skills_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('skills/update_action'),
				'title'  => 'TRAMS::SCP::Update Skills',
		'created' => set_value('created', $row->created),
		'skill_id' => set_value('skill_id', $row->skill_id),
		'skill_name' => set_value('skill_name', $row->skill_name),
		'updated' => set_value('updated', $row->updated),
	    );
			$this->_tpl('skills/skills_edit', $data);
		
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('skills'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('skill_id', TRUE));
        } else {
            $data = array(
		
		'skill_name' => $this->input->post('skill_name',TRUE),
		'updated' => date('Y-m-d H:i:s'),
	    );

            $this->Skills_model->update($this->input->post('skill_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('skills'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Skills_model->get_by_id($id);

        if ($row) {
            $this->Skills_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('skills'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('skills'));
        }
    }

    public function _rules() 
    {
		
	$this->form_validation->set_rules('skill_name', 'skill name', 'trim|required');
		

	$this->form_validation->set_rules('skill_id', 'skill_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function check_exist()
    {
    $val = $this->input->post('val');
	$col = $this->input->post('col');
	$id = isset($_POST['id']) ? $_POST['id'] : '';
	$res = $this->Skills_model->check_exist($val,$col,$id);
	if($res){
		echo 'false';
	}
	else {
		echo 'true';
	}
    }

}

/* End of file Skills.php */
