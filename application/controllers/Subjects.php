<?php

/* Location: ./application/controllers/Subjects.php */
/* Derived from Harviacode  */
/* Modified by Vivek Raghunathan 2021-06-25 17:58:30 */
/* Email : vivekra@dqserv.com */
/* http://dqserv.com */



if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Subjects extends APP_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Subjects_model');
        $this->load->library('form_validation');
		$this->load->library('Arbac');
		if(!$this->arbac->is_loggedin()){ redirect('scp/login'); }
    }

    public function index()
    {
        $subjects = $this->Subjects_model->get_all();

        $data = array(
            'subjects_data' => $subjects,
			'title' => 'TRAMS::SCP::Subjects',
        );
		$this->_tpl('subjects/subjects_list', $data);
		
    }

    public function read($id) 
    {
        $row = $this->Subjects_model->get_by_id($id);
        if ($row) {
            $data = array(
			'title'  => 'TRAMS::SCP::Subjects',
		'created_at' => $row->created_at,
		'id' => $row->id,
		'subject_name' => $row->subject_name,
		'updated_at' => $row->updated_at,
	    );
			$this->_tpl('subjects/subjects_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('subjects'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('subjects/create_action'),
			'title'  => 'TRAMS::SCP::Create Subjects',
	    'created_at' => set_value('created_at'),
	    'id' => set_value('id'),
	    'subject_name' => set_value('subject_name'),
	    'updated_at' => set_value('updated_at'),
	);
          $this->_tpl('subjects/subjects_form', $data);	
		
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'created_at' => $this->input->post('created_at',TRUE),
		'subject_name' => $this->input->post('subject_name',TRUE),
		'updated_at' => $this->input->post('updated_at',TRUE),
	    );

            $this->Subjects_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('subjects'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Subjects_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('subjects/update_action'),
				'title'  => 'TRAMS::SCP::Update Subjects',
		'created_at' => set_value('created_at', $row->created_at),
		'id' => set_value('id', $row->id),
		'subject_name' => set_value('subject_name', $row->subject_name),
		'updated_at' => set_value('updated_at', $row->updated_at),
	    );
			$this->_tpl('subjects/subjects_edit', $data);
		
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('subjects'));
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
		'subject_name' => $this->input->post('subject_name',TRUE),
		'updated_at' => $this->input->post('updated_at',TRUE),
	    );

            $this->Subjects_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('subjects'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Subjects_model->get_by_id($id);

        if ($row) {
            $this->Subjects_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('subjects'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('subjects'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('created_at', 'created at', 'trim|required');
	$this->form_validation->set_rules('subject_name', 'subject name', 'trim|required');
	$this->form_validation->set_rules('updated_at', 'updated at', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function check_exist()
    {
    $val = $this->input->post('val');
	$col = $this->input->post('col');
	$id = isset($_POST['id']) ? $_POST['id'] : '';
	$res = $this->Subjects_model->check_exist($val,$col,$id);
	if($res){
		echo 'false';
	}
	else {
		echo 'true';
	}
    }

}

/* End of file Subjects.php */
