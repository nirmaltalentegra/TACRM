<?php

/* Location: ./application/controllers/Batches_students.php */
/* Derived from Harviacode  */
/* Modified by Vivek Raghunathan 2021-06-25 14:59:48 */
/* Email : vivekra@dqserv.com */
/* http://dqserv.com */



if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Batches_students extends APP_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Batches_students_model');
        $this->load->library('form_validation');
		$this->load->library('Arbac');
		if(!$this->arbac->is_loggedin()){ redirect('scp/login'); }
    }

    public function index()
    {
        $batches_students = $this->Batches_students_model->get_all();

        $data = array(
            'batches_students_data' => $batches_students,
			'title' => 'TRAMS::SCP::Batches_students',
        );
		$this->_tpl('batches_students/batches_students_list', $data);
		
    }

    public function read($id) 
    {
        $row = $this->Batches_students_model->get_by_id($id);
        if ($row) {
            $data = array(
			'title'  => 'TRAMS::SCP::Batches_students',
		'active' => $row->active,
		'batch_id' => $row->batch_id,
		'certified' => $row->certified,
		'created' => $row->created,
		'faculty_comments' => $row->faculty_comments,
		'faculty_id' => $row->faculty_id,
		'faculty_rating' => $row->faculty_rating,
		'student_comments' => $row->student_comments,
		'student_id' => $row->student_id,
		'student_rating' => $row->student_rating,
		'updated' => $row->updated,
	    );
			$this->_tpl('batches_students/batches_students_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('batches_students'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('batches_students/create_action'),
			'title'  => 'TRAMS::SCP::Create Batches_students',
	    'active' => set_value('active'),
	    'batch_id' => set_value('batch_id'),
	    'certified' => set_value('certified'),
	    'created' => set_value('created'),
	    'faculty_comments' => set_value('faculty_comments'),
	    'faculty_id' => set_value('faculty_id'),
	    'faculty_rating' => set_value('faculty_rating'),
	    'student_comments' => set_value('student_comments'),
	    'student_id' => set_value('student_id'),
	    'student_rating' => set_value('student_rating'),
	    'updated' => set_value('updated'),
	);
          $this->_tpl('batches_students/batches_students_form', $data);	
		
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'active' => $this->input->post('active',TRUE),
		'certified' => $this->input->post('certified',TRUE),
		'created' => date('Y-m-d H:i:s'),
		'faculty_comments' => $this->input->post('faculty_comments',TRUE),
		'faculty_id' => $this->input->post('faculty_id',TRUE),
		'faculty_rating' => $this->input->post('faculty_rating',TRUE),
		'student_comments' => $this->input->post('student_comments',TRUE),
		'student_id' => $this->input->post('student_id',TRUE),
		'student_rating' => $this->input->post('student_rating',TRUE),
		'updated' => date('Y-m-d H:i:s'),
	    );

            $this->Batches_students_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('batches_students'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Batches_students_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('batches_students/update_action'),
				'title'  => 'TRAMS::SCP::Update Batches_students',
		'active' => set_value('active', $row->active),
		'batch_id' => set_value('batch_id', $row->batch_id),
		'certified' => set_value('certified', $row->certified),
		'created' => set_value('created', $row->created),
		'faculty_comments' => set_value('faculty_comments', $row->faculty_comments),
		'faculty_id' => set_value('faculty_id', $row->faculty_id),
		'faculty_rating' => set_value('faculty_rating', $row->faculty_rating),
		'student_comments' => set_value('student_comments', $row->student_comments),
		'student_id' => set_value('student_id', $row->student_id),
		'student_rating' => set_value('student_rating', $row->student_rating),
		'updated' => set_value('updated', $row->updated),
	    );
			$this->_tpl('batches_students/', $data);
		
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('batches_students'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('batch_id', TRUE));
        } else {
            $data = array(
		'active' => $this->input->post('active',TRUE),
		'certified' => $this->input->post('certified',TRUE),
		
		'faculty_comments' => $this->input->post('faculty_comments',TRUE),
		'faculty_id' => $this->input->post('faculty_id',TRUE),
		'faculty_rating' => $this->input->post('faculty_rating',TRUE),
		'student_comments' => $this->input->post('student_comments',TRUE),
		'student_id' => $this->input->post('student_id',TRUE),
		'student_rating' => $this->input->post('student_rating',TRUE),
		'updated' => date('Y-m-d H:i:s'),
	    );

            $this->Batches_students_model->update($this->input->post('batch_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('batches_students'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Batches_students_model->get_by_id($id);

        if ($row) {
            $this->Batches_students_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('batches_students'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('batches_students'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('active', 'active', 'trim|required');
	$this->form_validation->set_rules('certified', 'certified', 'trim|required');
		
	$this->form_validation->set_rules('faculty_comments', 'faculty comments', 'trim|required');
	$this->form_validation->set_rules('faculty_id', 'faculty id', 'trim|required|numeric');
	$this->form_validation->set_rules('faculty_rating', 'faculty rating', 'trim|required|numeric');
	$this->form_validation->set_rules('student_comments', 'student comments', 'trim|required');
	$this->form_validation->set_rules('student_id', 'student id', 'trim|required|numeric');
	$this->form_validation->set_rules('student_rating', 'student rating', 'trim|required|numeric');
		

	$this->form_validation->set_rules('batch_id', 'batch_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function check_exist()
    {
    $val = $this->input->post('val');
	$col = $this->input->post('col');
	$id = isset($_POST['id']) ? $_POST['id'] : '';
	$res = $this->Batches_students_model->check_exist($val,$col,$id);
	if($res){
		echo 'false';
	}
	else {
		echo 'true';
	}
    }

}

/* End of file Batches_students.php */
