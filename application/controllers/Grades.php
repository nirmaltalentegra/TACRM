<?php

/* Location: ./application/controllers/Grades.php */
/* Derived from Harviacode  */
/* Modified by Vivek Raghunathan 2021-06-25 17:54:23 */
/* Email : vivekra@dqserv.com */
/* http://dqserv.com */



if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Grades extends APP_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Grades_model');
        $this->load->library('form_validation');
		$this->load->library('Arbac');
		if(!$this->arbac->is_loggedin()){ redirect('scp/login'); }
    }

    public function index()
    {
        $grades = $this->Grades_model->get_all();

        $data = array(
            'grades_data' => $grades,
			'title' => 'TRAMS::SCP::Grades',
        );
		$this->_tpl('grades/grades_list', $data);
		
    }

    public function read($id) 
    {
        $row = $this->Grades_model->get_by_id($id);
        if ($row) {
            $data = array(
			'title'  => 'TRAMS::SCP::Grades',
		'active' => $row->active,
		'created' => $row->created,
		'grade_id' => $row->grade_id,
		'grade_name' => $row->grade_name,
		'updated' => $row->updated,
	    );
			$this->_tpl('grades/grades_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('grades'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('grades/create_action'),
			'title'  => 'TRAMS::SCP::Create Grades',
	    'active' => set_value('active'),
	    'created' => set_value('created'),
	    'grade_id' => set_value('grade_id'),
	    'grade_name' => set_value('grade_name'),
	    'updated' => set_value('updated'),
	);
          $this->_tpl('grades/grades_form', $data);	
		
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
		'grade_name' => $this->input->post('grade_name',TRUE),
		'updated' => date('Y-m-d H:i:s'),
	    );

            $this->Grades_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('grades'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Grades_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('grades/update_action'),
				'title'  => 'TRAMS::SCP::Update Grades',
		'active' => set_value('active', $row->active),
		'created' => set_value('created', $row->created),
		'grade_id' => set_value('grade_id', $row->grade_id),
		'grade_name' => set_value('grade_name', $row->grade_name),
		'updated' => set_value('updated', $row->updated),
	    );
			$this->_tpl('grades/grades_edit', $data);
		
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('grades'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('grade_id', TRUE));
        } else {
            $data = array(
		'active' => $this->input->post('active',TRUE),
		
		'grade_name' => $this->input->post('grade_name',TRUE),
		'updated' => date('Y-m-d H:i:s'),
	    );

            $this->Grades_model->update($this->input->post('grade_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('grades'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Grades_model->get_by_id($id);

        if ($row) {
            $this->Grades_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('grades'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('grades'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('active', 'active', 'trim|required');
		
	$this->form_validation->set_rules('grade_name', 'grade name', 'trim|required');
		

	$this->form_validation->set_rules('grade_id', 'grade_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function check_exist()
    {
    $val = $this->input->post('val');
	$col = $this->input->post('col');
	$id = isset($_POST['id']) ? $_POST['id'] : '';
	$res = $this->Grades_model->check_exist($val,$col,$id);
	if($res){
		echo 'false';
	}
	else {
		echo 'true';
	}
    }

}

/* End of file Grades.php */
