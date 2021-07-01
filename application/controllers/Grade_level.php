<?php

/* Location: ./application/controllers/Grade_level.php */
/* Derived from Harviacode  */
/* Modified by Vivek Raghunathan 2021-06-25 17:48:43 */
/* Email : vivekra@dqserv.com */
/* http://dqserv.com */



if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Grade_level extends APP_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Grade_level_model');
        $this->load->library('form_validation');
		$this->load->library('Arbac');
		if(!$this->arbac->is_loggedin()){ redirect('scp/login'); }
    }

    public function index()
    {
        $grade_level = $this->Grade_level_model->get_all();

        $data = array(
            'grade_level_data' => $grade_level,
			'title' => 'TRAMS::SCP::Grade_level',
        );
		$this->_tpl('grade_level/grade_level_list', $data);
		
    }

    public function read($id) 
    {
        $row = $this->Grade_level_model->get_by_id($id);
        if ($row) {
            $data = array(
			'title'  => 'TRAMS::SCP::Grade_level',
		'created_at' => $row->created_at,
		'grade_level_name' => $row->grade_level_name,
		'id' => $row->id,
		'updated_at' => $row->updated_at,
	    );
			$this->_tpl('grade_level/grade_level_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('grade_level'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('grade_level/create_action'),
			'title'  => 'TRAMS::SCP::Create Grade_level',
	    'created_at' => set_value('created_at'),
	    'grade_level_name' => set_value('grade_level_name'),
	    'id' => set_value('id'),
	    'updated_at' => set_value('updated_at'),
	);
          $this->_tpl('grade_level/grade_level_form', $data);	
		
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'created_at' => $this->input->post('created_at',TRUE),
		'grade_level_name' => $this->input->post('grade_level_name',TRUE),
		'updated_at' => $this->input->post('updated_at',TRUE),
	    );

            $this->Grade_level_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('grade_level'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Grade_level_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('grade_level/update_action'),
				'title'  => 'TRAMS::SCP::Update Grade_level',
		'created_at' => set_value('created_at', $row->created_at),
		'grade_level_name' => set_value('grade_level_name', $row->grade_level_name),
		'id' => set_value('id', $row->id),
		'updated_at' => set_value('updated_at', $row->updated_at),
	    );
			$this->_tpl('grade_level/grade_level_edit', $data);
		
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('grade_level'));
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
		'grade_level_name' => $this->input->post('grade_level_name',TRUE),
		'updated_at' => $this->input->post('updated_at',TRUE),
	    );

            $this->Grade_level_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('grade_level'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Grade_level_model->get_by_id($id);

        if ($row) {
            $this->Grade_level_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('grade_level'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('grade_level'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('created_at', 'created at', 'trim|required');
	$this->form_validation->set_rules('grade_level_name', 'grade level name', 'trim|required');
	$this->form_validation->set_rules('updated_at', 'updated at', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function check_exist()
    {
    $val = $this->input->post('val');
	$col = $this->input->post('col');
	$id = isset($_POST['id']) ? $_POST['id'] : '';
	$res = $this->Grade_level_model->check_exist($val,$col,$id);
	if($res){
		echo 'false';
	}
	else {
		echo 'true';
	}
    }

}

/* End of file Grade_level.php */
