<?php

/* Location: ./application/controllers/Courses_catalog.php */
/* Derived from Harviacode  */
/* Modified by Vivek Raghunathan 2021-06-24 20:59:10 */
/* Email : vivekra@dqserv.com */
/* http://dqserv.com */



if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Courses_catalog extends APP_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Courses_catalog_model');
        $this->load->library('form_validation');
		$this->load->library('Arbac');
		if(!$this->arbac->is_loggedin()){ redirect('scp/login'); }
    }

    public function index()
    {
        $courses_catalog = $this->Courses_catalog_model->get_all();

        $data = array(
            'courses_catalog_data' => $courses_catalog,
			'title' => 'TRAMS::SCP::Courses_catalog',
        );
		$this->_tpl('courses_catalog/courses_catalog_list', $data);
		
    }

    public function read($id) 
    {
        $row = $this->Courses_catalog_model->get_by_id($id);
        if ($row) {
            $data = array(
			'title'  => 'TRAMS::SCP::Courses_catalog',
		'course_id' => $row->course_id,
		'category_id' => $row->category_id,
		'course_code' => $row->course_code,
		'course_name' => $row->course_name,
		'course_summary' => $row->course_summary,
		'course_contents' => $row->course_contents,
		'course_duration' => $row->course_duration,
		'course_fee_type' => $row->course_fee_type,
		'notes' => $row->notes,
		'active' => $row->active,
		'created' => $row->created,
		'updated' => $row->updated,
	    );
			$this->_tpl('courses_catalog/courses_catalog_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('courses_catalog'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('courses_catalog/create_action'),
			'title'  => 'TRAMS::SCP::Create Courses_catalog',
	    'course_id' => set_value('course_id'),
	    'category_id' => set_value('category_id'),
	    'course_code' => set_value('course_code'),
	    'course_name' => set_value('course_name'),
	    'course_summary' => set_value('course_summary'),
	    'course_contents' => set_value('course_contents'),
	    'course_duration' => set_value('course_duration'),
	    'course_fee_type' => set_value('course_fee_type'),
	    'notes' => set_value('notes'),
	    'active' => set_value('active'),
	    'created' => set_value('created'),
	    'updated' => set_value('updated'),
	);
          $this->_tpl('courses_catalog/courses_catalog_form', $data);	
		
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'category_id' => $this->input->post('category_id',TRUE),
		'course_code' => $this->input->post('course_code',TRUE),
		'course_name' => $this->input->post('course_name',TRUE),
		'course_summary' => $this->input->post('course_summary',TRUE),
		'course_contents' => $this->input->post('course_contents',TRUE),
		'course_duration' => $this->input->post('course_duration',TRUE),
		'course_fee_type' => $this->input->post('course_fee_type',TRUE),
		'notes' => $this->input->post('notes',TRUE),
		'active' => $this->input->post('active',TRUE),
		'created' => date('Y-m-d H:i:s'),
		'updated' => date('Y-m-d H:i:s'),
	    );

            $this->Courses_catalog_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('courses_catalog'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Courses_catalog_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('courses_catalog/update_action'),
				'title'  => 'TRAMS::SCP::Update Courses_catalog',
		'course_id' => set_value('course_id', $row->course_id),
		'category_id' => set_value('category_id', $row->category_id),
		'course_code' => set_value('course_code', $row->course_code),
		'course_name' => set_value('course_name', $row->course_name),
		'course_summary' => set_value('course_summary', $row->course_summary),
		'course_contents' => set_value('course_contents', $row->course_contents),
		'course_duration' => set_value('course_duration', $row->course_duration),
		'course_fee_type' => set_value('course_fee_type', $row->course_fee_type),
		'notes' => set_value('notes', $row->notes),
		'active' => set_value('active', $row->active),
		'created' => set_value('created', $row->created),
		'updated' => set_value('updated', $row->updated),
	    );
			$this->_tpl('courses_catalog/courses_catalog_edit', $data);
		
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('courses_catalog'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('course_id', TRUE));
        } else {
            $data = array(
		'category_id' => $this->input->post('category_id',TRUE),
		'course_code' => $this->input->post('course_code',TRUE),
		'course_name' => $this->input->post('course_name',TRUE),
		'course_summary' => $this->input->post('course_summary',TRUE),
		'course_contents' => $this->input->post('course_contents',TRUE),
		'course_duration' => $this->input->post('course_duration',TRUE),
		'course_fee_type' => $this->input->post('course_fee_type',TRUE),
		'notes' => $this->input->post('notes',TRUE),
		'active' => $this->input->post('active',TRUE),
		
		'updated' => date('Y-m-d H:i:s'),
	    );

            $this->Courses_catalog_model->update($this->input->post('course_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('courses_catalog'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Courses_catalog_model->get_by_id($id);

        if ($row) {
            $this->Courses_catalog_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('courses_catalog'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('courses_catalog'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('category_id', 'category id', 'trim|required|numeric');
	$this->form_validation->set_rules('course_code', 'course code', 'trim|required');
	$this->form_validation->set_rules('course_name', 'course name', 'trim|required');
	$this->form_validation->set_rules('course_summary', 'course summary', 'trim|required');
	$this->form_validation->set_rules('course_contents', 'course contents', 'trim|required');
	$this->form_validation->set_rules('course_duration', 'course duration', 'trim|required');
	$this->form_validation->set_rules('course_fee_type', 'course fee type', 'trim|required');
	$this->form_validation->set_rules('notes', 'notes', 'trim|required');
	$this->form_validation->set_rules('active', 'active', 'trim|required|numeric');
		
		

	$this->form_validation->set_rules('course_id', 'course_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function check_exist()
    {
    $val = $this->input->post('val');
	$col = $this->input->post('col');
	$id = isset($_POST['id']) ? $_POST['id'] : '';
	$res = $this->Courses_catalog_model->check_exist($val,$col,$id);
	if($res){
		echo 'false';
	}
	else {
		echo 'true';
	}
    }

}

/* End of file Courses_catalog.php */
