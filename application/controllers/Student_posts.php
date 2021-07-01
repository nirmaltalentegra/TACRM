<?php

/* Location: ./application/controllers/Student_posts.php */
/* Derived from Harviacode  */
/* Modified by Vivek Raghunathan 2021-06-25 17:58:01 */
/* Email : vivekra@dqserv.com */
/* http://dqserv.com */



if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Student_posts extends APP_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Student_posts_model');
        $this->load->library('form_validation');
		$this->load->library('Arbac');
		if(!$this->arbac->is_loggedin()){ redirect('scp/login'); }
    }

    public function index()
    {
        $student_posts = $this->Student_posts_model->get_all();

        $data = array(
            'student_posts_data' => $student_posts,
			'title' => 'TRAMS::SCP::Student_posts',
        );
		$this->_tpl('student_posts/student_posts_list', $data);
		
    }

    public function read($id) 
    {
        $row = $this->Student_posts_model->get_by_id($id);
        if ($row) {
            $data = array(
			'title'  => 'TRAMS::SCP::Student_posts',
		'ass_due_date' => $row->ass_due_date,
		'created_at' => $row->created_at,
		'i_need_smeone' => $row->i_need_smeone,
		'id' => $row->id,
		'km_travel' => $row->km_travel,
		'meeting_options' => $row->meeting_options,
		'st_budget' => $row->st_budget,
		'st_gender_prfer' => $row->st_gender_prfer,
		'st_i_want' => $row->st_i_want,
		'st_level' => $row->st_level,
		'st_location' => $row->st_location,
		'st_requirement' => $row->st_requirement,
		'st_subjects' => $row->st_subjects,
		'status' => $row->status,
		'tut_wantd' => $row->tut_wantd,
		'updated_at' => $row->updated_at,
		'user_id' => $row->user_id,
	    );
			$this->_tpl('student_posts/student_posts_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('student_posts'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('student_posts/create_action'),
			'title'  => 'TRAMS::SCP::Create Student_posts',
	    'ass_due_date' => set_value('ass_due_date'),
	    'created_at' => set_value('created_at'),
	    'i_need_smeone' => set_value('i_need_smeone'),
	    'id' => set_value('id'),
	    'km_travel' => set_value('km_travel'),
	    'meeting_options' => set_value('meeting_options'),
	    'st_budget' => set_value('st_budget'),
	    'st_gender_prfer' => set_value('st_gender_prfer'),
	    'st_i_want' => set_value('st_i_want'),
	    'st_level' => set_value('st_level'),
	    'st_location' => set_value('st_location'),
	    'st_requirement' => set_value('st_requirement'),
	    'st_subjects' => set_value('st_subjects'),
	    'status' => set_value('status'),
	    'tut_wantd' => set_value('tut_wantd'),
	    'updated_at' => set_value('updated_at'),
	    'user_id' => set_value('user_id'),
	);
          $this->_tpl('student_posts/student_posts_form', $data);	
		
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'ass_due_date' => $this->input->post('ass_due_date',TRUE),
		'created_at' => $this->input->post('created_at',TRUE),
		'i_need_smeone' => $this->input->post('i_need_smeone',TRUE),
		'km_travel' => $this->input->post('km_travel',TRUE),
		'meeting_options' => $this->input->post('meeting_options',TRUE),
		'st_budget' => $this->input->post('st_budget',TRUE),
		'st_gender_prfer' => $this->input->post('st_gender_prfer',TRUE),
		'st_i_want' => $this->input->post('st_i_want',TRUE),
		'st_level' => $this->input->post('st_level',TRUE),
		'st_location' => $this->input->post('st_location',TRUE),
		'st_requirement' => $this->input->post('st_requirement',TRUE),
		'st_subjects' => $this->input->post('st_subjects',TRUE),
		'status' => $this->input->post('status',TRUE),
		'tut_wantd' => $this->input->post('tut_wantd',TRUE),
		'updated_at' => $this->input->post('updated_at',TRUE),
		'user_id' => $this->input->post('user_id',TRUE),
	    );

            $this->Student_posts_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('student_posts'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Student_posts_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('student_posts/update_action'),
				'title'  => 'TRAMS::SCP::Update Student_posts',
		'ass_due_date' => set_value('ass_due_date', $row->ass_due_date),
		'created_at' => set_value('created_at', $row->created_at),
		'i_need_smeone' => set_value('i_need_smeone', $row->i_need_smeone),
		'id' => set_value('id', $row->id),
		'km_travel' => set_value('km_travel', $row->km_travel),
		'meeting_options' => set_value('meeting_options', $row->meeting_options),
		'st_budget' => set_value('st_budget', $row->st_budget),
		'st_gender_prfer' => set_value('st_gender_prfer', $row->st_gender_prfer),
		'st_i_want' => set_value('st_i_want', $row->st_i_want),
		'st_level' => set_value('st_level', $row->st_level),
		'st_location' => set_value('st_location', $row->st_location),
		'st_requirement' => set_value('st_requirement', $row->st_requirement),
		'st_subjects' => set_value('st_subjects', $row->st_subjects),
		'status' => set_value('status', $row->status),
		'tut_wantd' => set_value('tut_wantd', $row->tut_wantd),
		'updated_at' => set_value('updated_at', $row->updated_at),
		'user_id' => set_value('user_id', $row->user_id),
	    );
			$this->_tpl('student_posts/student_posts_edit', $data);
		
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('student_posts'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'ass_due_date' => $this->input->post('ass_due_date',TRUE),
		'created_at' => $this->input->post('created_at',TRUE),
		'i_need_smeone' => $this->input->post('i_need_smeone',TRUE),
		'km_travel' => $this->input->post('km_travel',TRUE),
		'meeting_options' => $this->input->post('meeting_options',TRUE),
		'st_budget' => $this->input->post('st_budget',TRUE),
		'st_gender_prfer' => $this->input->post('st_gender_prfer',TRUE),
		'st_i_want' => $this->input->post('st_i_want',TRUE),
		'st_level' => $this->input->post('st_level',TRUE),
		'st_location' => $this->input->post('st_location',TRUE),
		'st_requirement' => $this->input->post('st_requirement',TRUE),
		'st_subjects' => $this->input->post('st_subjects',TRUE),
		'status' => $this->input->post('status',TRUE),
		'tut_wantd' => $this->input->post('tut_wantd',TRUE),
		'updated_at' => $this->input->post('updated_at',TRUE),
		'user_id' => $this->input->post('user_id',TRUE),
	    );

            $this->Student_posts_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('student_posts'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Student_posts_model->get_by_id($id);

        if ($row) {
            $this->Student_posts_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('student_posts'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('student_posts'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('ass_due_date', 'ass due date', 'trim|required');
	$this->form_validation->set_rules('created_at', 'created at', 'trim|required');
	$this->form_validation->set_rules('i_need_smeone', 'i need smeone', 'trim|required');
	$this->form_validation->set_rules('km_travel', 'km travel', 'trim|required');
	$this->form_validation->set_rules('meeting_options', 'meeting options', 'trim|required');
	$this->form_validation->set_rules('st_budget', 'st budget', 'trim|required');
	$this->form_validation->set_rules('st_gender_prfer', 'st gender prfer', 'trim|required');
	$this->form_validation->set_rules('st_i_want', 'st i want', 'trim|required');
	$this->form_validation->set_rules('st_level', 'st level', 'trim|required');
	$this->form_validation->set_rules('st_location', 'st location', 'trim|required');
	$this->form_validation->set_rules('st_requirement', 'st requirement', 'trim|required');
	$this->form_validation->set_rules('st_subjects', 'st subjects', 'trim|required');
	$this->form_validation->set_rules('status', 'status', 'trim|required|numeric');
	$this->form_validation->set_rules('tut_wantd', 'tut wantd', 'trim|required');
	$this->form_validation->set_rules('updated_at', 'updated at', 'trim|required');
	$this->form_validation->set_rules('user_id', 'user id', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function check_exist()
    {
    $val = $this->input->post('val');
	$col = $this->input->post('col');
	$id = isset($_POST['id']) ? $_POST['id'] : '';
	$res = $this->Student_posts_model->check_exist($val,$col,$id);
	if($res){
		echo 'false';
	}
	else {
		echo 'true';
	}
    }

}

/* End of file Student_posts.php */
