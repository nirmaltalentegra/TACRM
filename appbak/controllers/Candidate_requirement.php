<?php

/* Location: ./application/controllers/Candidate_requirement.php */
/* Derived from Harviacode  */
/* Modified by Vivek Raghunathan 2021-06-24 20:58:51 */
/* Email : vivekra@dqserv.com */
/* http://dqserv.com */



if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Candidate_requirement extends APP_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Candidate_requirement_model');
        $this->load->library('form_validation');
		$this->load->library('Arbac');
		if(!$this->arbac->is_loggedin()){ redirect('scp/login'); }
    }

    public function index()
    {
        $candidate_requirement = $this->Candidate_requirement_model->get_all();

        $data = array(
            'candidate_requirement_data' => $candidate_requirement,
			'title' => 'TRAMS::SCP::Candidate_requirement',
        );
		$this->_tpl('candidate_requirement/candidate_requirement_list', $data);
		
    }

    public function read($id) 
    {
        $row = $this->Candidate_requirement_model->get_by_id($id);
        if ($row) {
            $data = array(
			'title'  => 'TRAMS::SCP::Candidate_requirement',
		'candidate_req_id' => $row->candidate_req_id,
		'candidate_req_details' => $row->candidate_req_details,
		'active' => $row->active,
		'created' => $row->created,
		'updated' => $row->updated,
	    );
			$this->_tpl('candidate_requirement/candidate_requirement_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('candidate_requirement'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('candidate_requirement/create_action'),
			'title'  => 'TRAMS::SCP::Create Candidate_requirement',
	    'candidate_req_id' => set_value('candidate_req_id'),
	    'candidate_req_details' => set_value('candidate_req_details'),
	    'active' => set_value('active'),
	    'created' => set_value('created'),
	    'updated' => set_value('updated'),
	);
          $this->_tpl('candidate_requirement/candidate_requirement_form', $data);	
		
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'candidate_req_details' => $this->input->post('candidate_req_details',TRUE),
		'active' => $this->input->post('active',TRUE),
		'created' => date('Y-m-d H:i:s'),
		'updated' => date('Y-m-d H:i:s'),
	    );

            $this->Candidate_requirement_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('candidate_requirement'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Candidate_requirement_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('candidate_requirement/update_action'),
				'title'  => 'TRAMS::SCP::Update Candidate_requirement',
		'candidate_req_id' => set_value('candidate_req_id', $row->candidate_req_id),
		'candidate_req_details' => set_value('candidate_req_details', $row->candidate_req_details),
		'active' => set_value('active', $row->active),
		'created' => set_value('created', $row->created),
		'updated' => set_value('updated', $row->updated),
	    );
			$this->_tpl('candidate_requirement/candidate_requirement_edit', $data);
		
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('candidate_requirement'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('candidate_req_id', TRUE));
        } else {
            $data = array(
		'candidate_req_details' => $this->input->post('candidate_req_details',TRUE),
		'active' => $this->input->post('active',TRUE),
		
		'updated' => date('Y-m-d H:i:s'),
	    );

            $this->Candidate_requirement_model->update($this->input->post('candidate_req_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('candidate_requirement'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Candidate_requirement_model->get_by_id($id);

        if ($row) {
            $this->Candidate_requirement_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('candidate_requirement'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('candidate_requirement'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('candidate_req_details', 'candidate req details', 'trim|required');
	$this->form_validation->set_rules('active', 'active', 'trim|required');
		
		

	$this->form_validation->set_rules('candidate_req_id', 'candidate_req_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function check_exist()
    {
    $val = $this->input->post('val');
	$col = $this->input->post('col');
	$id = isset($_POST['id']) ? $_POST['id'] : '';
	$res = $this->Candidate_requirement_model->check_exist($val,$col,$id);
	if($res){
		echo 'false';
	}
	else {
		echo 'true';
	}
    }

}

/* End of file Candidate_requirement.php */
