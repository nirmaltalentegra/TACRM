<?php

/* Location: ./application/controllers/Batches.php */
/* Derived from Harviacode  */
/* Modified by Vivek Raghunathan 2021-06-23 18:52:09 */
/* Email : vivekra@dqserv.com */
/* http://dqserv.com */



if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Batches extends APP_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Batches_model');
		$this->load->model('Common_model');
        $this->load->library('form_validation');
		$this->load->library('Arbac');
		if(!$this->arbac->is_loggedin()){ redirect('scp/login'); }
    }

    public function index()
    {
        $batches = $this->Batches_model->get_all();

        $data = array(
            'batches_data' => $batches,
			'title' => 'TRAMS::SCP::Batches',
        );
		$this->_tpl('batches/batches_list', $data);
		//	$this->_tpl('batches/abc', $data);
    }

    public function read($id) 
    {
        $row = $this->Batches_model->get_by_id($id);
		if ($row) {
		$row_course = $this->Common_model->get_details_dynamically('courses_catalog', 'course_id', $row->course_id, 'course_id', $oder_by = NULL);
		$row_categories = $this->Common_model->get_details_dynamically('categories', 'category_id', $row->category_id, 'category_id', $oder_by = NULL);
		$row_faculty = $this->Common_model->get_details_dynamically('faculty', 'faculty_id', $row->faculty_id, 'faculty_id', $oder_by = NULL);
		$row_branch = $this->Common_model->get_details_dynamically('branch', 'branch_id', $row->branch_id, 'branch_id', $oder_by = NULL);
		$row_batch_type = $this->Common_model->get_details_dynamically('batch_type', 'batch_type_id', $row->batch_type, 'batch_type_id', $oder_by = NULL);
		$row_batch_pattern = $this->Common_model->get_details_dynamically('batch_pattern', 'batch_pattern_id', $row->batch_pattern, 'batch_pattern_id', $oder_by = NULL);
		$row_batch_fee_type = $this->Common_model->get_details_dynamically('course_fee_type', 'course_fee_type_id', $row->batch_fee_type, 'course_fee_type_id', $oder_by = NULL);
		$row_course_fee_type = $this->Common_model->get_details_dynamically('course_fee_type', 'course_fee_type_id', $row->course_fee_type, 'course_fee_type_id', $oder_by = NULL);
		$row_batch_status = $this->Common_model->get_details_dynamically('status', 'status_id', $row->batch_status, 'status_id', $oder_by = NULL);
        	
           $data = array(
			'title'  => 'TRAMS::SCP::Batches',
		'batch_id' => $row->batch_id,
		'course_id' => ($row_course =='failure')?'':$row_course[0]['course_name'],
		'category_id' => ($row_categories =='failure')?'':$row_categories[0]['category_name'],
		'batch_title' => $row->batch_title,
		'description' => $row->description,
		'faculty_id' => ($row_faculty =='failure')?'':$row_faculty[0]['firstname'].' '.$row_faculty[0]['lastname'],
		'branch_id' => ($row_branch =='failure')?'':$row_branch[0]['branch_name'],
		'batch_type' => ($row_batch_type =='failure')?'':$row_batch_type[0]['batch_type_name'],
		'batch_pattern' => ($row_batch_pattern =='failure')?'':$row_batch_pattern[0]['batch_pattern'],
		'start_date' => $row->start_date,
		'end_date' => $row->end_date,
		'week_days' => $row->week_days,
		'student_enrolled' => $row->student_enrolled,
		'batch_capacity' => $row->batch_capacity,
		'iscorporate' => $row->iscorporate,
		'currency_id' => $row->currency_id,
		'batch_fee_type' => ($row_batch_fee_type =='failure')?'':$row_batch_fee_type[0]['course_fee_type'],
		'fees' => $row->fees,
		'course_fee_type' => ($row_course_fee_type =='failure')?'':$row_course_fee_type[0]['course_fee_type'],
		'course_fee' => $row->course_fee,
		'batch_status' => ($row_batch_status =='failure')?'':$row_batch_status[0]['status'],
		'created' => $row->created,
		'updated' => $row->updated,
	    );
			$this->_tpl('batches/batches_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('batches'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('batches/create_action'),
			'title'  => 'TRAMS::SCP::Create Batches',
	    'batch_id' => set_value('batch_id'),
	    'course_id' => set_value('course_id'),
	    'category_id' => set_value('category_id'),
	    'batch_title' => set_value('batch_title'),
	    'description' => set_value('description'),
	    'faculty_id' => set_value('faculty_id'),
	    'branch_id' => set_value('branch_id'),
	    'batch_type' => set_value('batch_type'),
	    'batch_pattern' => set_value('batch_pattern'),
	    'start_date' => set_value('start_date'),
	    'end_date' => set_value('end_date'),
	    'week_days' => set_value('week_days'),
	    'student_enrolled' => set_value('student_enrolled'),
	    'batch_capacity' => set_value('batch_capacity'),
	    'iscorporate' => set_value('iscorporate'),
	    'currency_id' => set_value('currency_id'),
	    'batch_fee_type' => set_value('batch_fee_type'),
	    'fees' => set_value('fees'),
	    'course_fee_type' => set_value('course_fee_type'),
	    'course_fee' => set_value('course_fee'),
	    'batch_status' => set_value('batch_status'),
	    'created' => set_value('created'),
	    'updated' => set_value('updated'),
	);
	      $data['row_courses'] = $this->Common_model->get_table_details_dynamically('courses_catalog', 'course_id', $oder_by = NULL);
		  $data['row_categories'] = $this->Common_model->get_table_details_dynamically('categories', 'category_id', $oder_by = NULL);
		  $data['row_faculty'] = $this->Common_model->get_table_details_dynamically('faculty', 'faculty_id', $oder_by = NULL);
		  $data['row_branch'] = $this->Common_model->get_table_details_dynamically('branch', 'branch_id', $oder_by = NULL);
		  $data['row_batch_type'] = $this->Common_model->get_table_details_dynamically('batch_type', 'batch_type_id', $oder_by = NULL);
		  $data['row_batch_pattern'] = $this->Common_model->get_table_details_dynamically('batch_pattern', 'batch_pattern_id', $oder_by = NULL);
		  $data['row_course_fee_type'] = $this->Common_model->get_table_details_dynamically('course_fee_type', 'course_fee_type_id', $oder_by = NULL);
		  $data['row_status'] = $this->Common_model->get_details_dynamically('status', 'status_type', '6', 'status_id', $oder_by = NULL);
          $this->_tpl('batches/batches_form', $data);	
		
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'course_id' => $this->input->post('course_id',TRUE),
		'category_id' => $this->input->post('category_id',TRUE),
		'batch_title' => $this->input->post('batch_title',TRUE),
		'description' => $this->input->post('description',TRUE),
		'faculty_id' => $this->input->post('faculty_id',TRUE),
		'branch_id' => $this->input->post('branch_id',TRUE),
		'batch_type' => $this->input->post('batch_type',TRUE),
		'batch_pattern' => $this->input->post('batch_pattern',TRUE),
		'start_date' => $this->input->post('start_date',TRUE),
		'end_date' => $this->input->post('end_date',TRUE),
		'week_days' => $this->input->post('week_days',TRUE),
		'student_enrolled' => $this->input->post('student_enrolled',TRUE),
		'batch_capacity' => $this->input->post('batch_capacity',TRUE),
		'iscorporate' => $this->input->post('iscorporate',TRUE),
		'currency_id' => $this->input->post('currency_id',TRUE),
		'batch_fee_type' => $this->input->post('batch_fee_type',TRUE),
		'fees' => $this->input->post('fees',TRUE),
		'course_fee_type' => $this->input->post('course_fee_type',TRUE),
		'course_fee' => $this->input->post('course_fee',TRUE),
		'batch_status' => $this->input->post('batch_status',TRUE),
		'created' => date('Y-m-d H:i:s'),
		'updated' => date('Y-m-d H:i:s'),
	    );
            $this->Batches_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('batches'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Batches_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('batches/update_action'),
				'title'  => 'TRAMS::SCP::Update Batches',
		'batch_id' => set_value('batch_id', $row->batch_id),
		'course_id' => set_value('course_id', $row->course_id),
		'category_id' => set_value('category_id', $row->category_id),
		'batch_title' => set_value('batch_title', $row->batch_title),
		'description' => set_value('description', $row->description),
		'faculty_id' => set_value('faculty_id', $row->faculty_id),
		'branch_id' => set_value('branch_id', $row->branch_id),
		'batch_type' => set_value('batch_type', $row->batch_type),
		'batch_pattern' => set_value('batch_pattern', $row->batch_pattern),
		'start_date' => set_value('start_date', $row->start_date),
		'end_date' => set_value('end_date', $row->end_date),
		'week_days' => set_value('week_days', $row->week_days),
		'student_enrolled' => set_value('student_enrolled', $row->student_enrolled),
		'batch_capacity' => set_value('batch_capacity', $row->batch_capacity),
		'iscorporate' => set_value('iscorporate', $row->iscorporate),
		'currency_id' => set_value('currency_id', $row->currency_id),
		'batch_fee_type' => set_value('batch_fee_type', $row->batch_fee_type),
		'fees' => set_value('fees', $row->fees),
		'course_fee_type' => set_value('course_fee_type', $row->course_fee_type),
		'course_fee' => set_value('course_fee', $row->course_fee),
		'batch_status' => set_value('batch_status', $row->batch_status),
		'created' => set_value('created', $row->created),
		'updated' => set_value('updated', $row->updated),
	    );
		  $data['row_courses'] = $this->Common_model->get_table_details_dynamically('courses_catalog', 'course_id', $oder_by = NULL);
		  $data['row_categories'] = $this->Common_model->get_table_details_dynamically('categories', 'category_id', $oder_by = NULL);
		  $data['row_faculty'] = $this->Common_model->get_table_details_dynamically('faculty', 'faculty_id', $oder_by = NULL);
		  $data['row_branch'] = $this->Common_model->get_table_details_dynamically('branch', 'branch_id', $oder_by = NULL);
		  $data['row_batch_type'] = $this->Common_model->get_table_details_dynamically('batch_type', 'batch_type_id', $oder_by = NULL);
		  $data['row_batch_pattern'] = $this->Common_model->get_table_details_dynamically('batch_pattern', 'batch_pattern_id', $oder_by = NULL);
		  $data['row_course_fee_type'] = $this->Common_model->get_table_details_dynamically('course_fee_type', 'course_fee_type_id', $oder_by = NULL);
		  $data['row_status'] = $this->Common_model->get_details_dynamically('status', 'status_type', '6', 'status_id', $oder_by = NULL);
		   $this->_tpl('batches/batches_edit', $data);
		
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('batches'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('batch_id', TRUE));
        } else {
            $data = array(
		'course_id' => $this->input->post('course_id',TRUE),
		'category_id' => $this->input->post('category_id',TRUE),
		'batch_title' => $this->input->post('batch_title',TRUE),
		'description' => $this->input->post('description',TRUE),
		'faculty_id' => $this->input->post('faculty_id',TRUE),
		'branch_id' => $this->input->post('branch_id',TRUE),
		'batch_type' => $this->input->post('batch_type',TRUE),
		'batch_pattern' => $this->input->post('batch_pattern',TRUE),
		'start_date' => $this->input->post('start_date',TRUE),
		'end_date' => $this->input->post('end_date',TRUE),
		'week_days' => $this->input->post('week_days',TRUE),
		'student_enrolled' => $this->input->post('student_enrolled',TRUE),
		'batch_capacity' => $this->input->post('batch_capacity',TRUE),
		'iscorporate' => $this->input->post('iscorporate',TRUE),
		'currency_id' => $this->input->post('currency_id',TRUE),
		'batch_fee_type' => $this->input->post('batch_fee_type',TRUE),
		'fees' => $this->input->post('fees',TRUE),
		'course_fee_type' => $this->input->post('course_fee_type',TRUE),
		'course_fee' => $this->input->post('course_fee',TRUE),
		'batch_status' => $this->input->post('batch_status',TRUE),
		
		'updated' => date('Y-m-d H:i:s'),
	    );

            $this->Batches_model->update($this->input->post('batch_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('batches'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Batches_model->get_by_id($id);

        if ($row) {
            $this->Batches_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('batches'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('batches'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('course_id', 'course id', 'trim|required|numeric');
	$this->form_validation->set_rules('category_id', 'category id', 'trim|required|numeric');
	$this->form_validation->set_rules('batch_title', 'batch title', 'trim|required');
	$this->form_validation->set_rules('description', 'description', 'trim|required');
	$this->form_validation->set_rules('faculty_id', 'faculty id', 'trim|required|numeric');
	$this->form_validation->set_rules('branch_id', 'branch id', 'trim|required|numeric');
	$this->form_validation->set_rules('batch_type', 'batch type', 'trim|required|numeric');
	$this->form_validation->set_rules('batch_pattern', 'batch pattern', 'trim|required|numeric');
	$this->form_validation->set_rules('start_date', 'start date', 'trim|required');
	$this->form_validation->set_rules('end_date', 'end date', 'trim|required');
	$this->form_validation->set_rules('week_days', 'week days', 'trim|required');
	$this->form_validation->set_rules('student_enrolled', 'student enrolled', 'trim|required|numeric');
	$this->form_validation->set_rules('batch_capacity', 'batch capacity', 'trim|required|numeric');
	$this->form_validation->set_rules('iscorporate', 'iscorporate', 'trim|required');
	$this->form_validation->set_rules('currency_id', 'currency id', 'trim|required|numeric');
	$this->form_validation->set_rules('batch_fee_type', 'batch fee type', 'trim|required');
	$this->form_validation->set_rules('fees', 'fees', 'trim|required|numeric');
	$this->form_validation->set_rules('course_fee_type', 'course fee type', 'trim|required');
	$this->form_validation->set_rules('course_fee', 'course fee', 'trim|required');
	$this->form_validation->set_rules('batch_status', 'batch status', 'trim|required|numeric');
		
		

	$this->form_validation->set_rules('batch_id', 'batch_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function check_exist()
    {
    $val = $this->input->post('val');
	$col = $this->input->post('col');
	$id = isset($_POST['id']) ? $_POST['id'] : '';
	$res = $this->Batches_model->check_exist($val,$col,$id);
	if($res){
		echo 'false';
	}
	else {
		echo 'true';
	}
    }

}

/* End of file Batches.php */
