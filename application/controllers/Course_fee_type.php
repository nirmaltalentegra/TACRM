<?php

/* Location: ./application/controllers/Course_fee_type.php */
/* Derived from Harviacode  */
/* Modified by Vivek Raghunathan 2021-06-25 17:46:58 */
/* Email : vivekra@dqserv.com */
/* http://dqserv.com */



if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Course_fee_type extends APP_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Course_fee_type_model');
        $this->load->library('form_validation');
		$this->load->library('Arbac');
		if(!$this->arbac->is_loggedin()){ redirect('scp/login'); }
    }

    public function index()
    {
        $course_fee_type = $this->Course_fee_type_model->get_all();

        $data = array(
            'course_fee_type_data' => $course_fee_type,
			'title' => 'TRAMS::SCP::Course_fee_type',
        );
		$this->_tpl('course_fee_type/course_fee_type_list', $data);
		
    }

    public function read($id) 
    {
        $row = $this->Course_fee_type_model->get_by_id($id);
        if ($row) {
            $data = array(
			'title'  => 'TRAMS::SCP::Course_fee_type',
		'active' => $row->active,
		'course_fee_type' => $row->course_fee_type,
		'course_fee_type_id' => $row->course_fee_type_id,
		'created' => $row->created,
		'updated' => $row->updated,
	    );
			$this->_tpl('course_fee_type/course_fee_type_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('course_fee_type'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('course_fee_type/create_action'),
			'title'  => 'TRAMS::SCP::Create Course_fee_type',
	    'active' => set_value('active'),
	    'course_fee_type' => set_value('course_fee_type'),
	    'course_fee_type_id' => set_value('course_fee_type_id'),
	    'created' => set_value('created'),
	    'updated' => set_value('updated'),
	);
          $this->_tpl('course_fee_type/course_fee_type_form', $data);	
		
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'active' => $this->input->post('active',TRUE),
		'course_fee_type' => $this->input->post('course_fee_type',TRUE),
		'created' => date('Y-m-d H:i:s'),
		'updated' => date('Y-m-d H:i:s'),
	    );

            $this->Course_fee_type_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('course_fee_type'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Course_fee_type_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('course_fee_type/update_action'),
				'title'  => 'TRAMS::SCP::Update Course_fee_type',
		'active' => set_value('active', $row->active),
		'course_fee_type' => set_value('course_fee_type', $row->course_fee_type),
		'course_fee_type_id' => set_value('course_fee_type_id', $row->course_fee_type_id),
		'created' => set_value('created', $row->created),
		'updated' => set_value('updated', $row->updated),
	    );
			$this->_tpl('course_fee_type/course_fee_type_edit', $data);
		
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('course_fee_type'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('course_fee_type_id', TRUE));
        } else {
            $data = array(
		'active' => $this->input->post('active',TRUE),
		'course_fee_type' => $this->input->post('course_fee_type',TRUE),
		
		'updated' => date('Y-m-d H:i:s'),
	    );

            $this->Course_fee_type_model->update($this->input->post('course_fee_type_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('course_fee_type'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Course_fee_type_model->get_by_id($id);

        if ($row) {
            $this->Course_fee_type_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('course_fee_type'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('course_fee_type'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('active', 'active', 'trim|required');
	$this->form_validation->set_rules('course_fee_type', 'course fee type', 'trim|required');
		
		

	$this->form_validation->set_rules('course_fee_type_id', 'course_fee_type_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function check_exist()
    {
    $val = $this->input->post('val');
	$col = $this->input->post('col');
	$id = isset($_POST['id']) ? $_POST['id'] : '';
	$res = $this->Course_fee_type_model->check_exist($val,$col,$id);
	if($res){
		echo 'false';
	}
	else {
		echo 'true';
	}
    }

}

/* End of file Course_fee_type.php */
