<?php

/* Location: ./application/controllers/Profiles.php */
/* Derived from Harviacode  */
/* Modified by Vivek Raghunathan 2021-07-14 22:48:46 */
/* Email : vivekra@dqserv.com */
/* http://dqserv.com */



if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Profiles extends APP_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Profiles_model');
        $this->load->library('form_validation');
		$this->load->library('Arbac');
		if(!$this->arbac->is_loggedin()){ redirect('scp/login'); }
    }

    public function index()
    {
        $profiles = $this->Profiles_model->get_all();

        $data = array(
            'profiles_data' => $profiles,
			'title' => 'TRAMS::SCP::Profiles',
        );
		$this->_tpl('profiles/profiles_list', $data);
		
    }

    public function read($id) 
    {
        $row = $this->Profiles_model->get_by_id($id);
        if ($row) {
            $data = array(
			'title'  => 'TRAMS::SCP::Profiles',
		'company_name' => $row->company_name,
		'created_at' => $row->created_at,
		'display_name' => $row->display_name,
		'dob' => $row->dob,
		'fullname' => $row->fullname,
		'gender' => $row->gender,
		'id' => $row->id,
		'location' => $row->location,
		'postalcode' => $row->postalcode,
		'professional_exp' => $row->professional_exp,
		'profile_description' => $row->profile_description,
		'role_job' => $row->role_job,
		'speciality_strength' => $row->speciality_strength,
		'status' => $row->status,
		'subject_tech' => $row->subject_tech,
		'teaching_details' => $row->teaching_details,
		'updated_at' => $row->updated_at,
		'user_education' => $row->user_education,
		'user_id' => $row->user_id,
	    );
			$this->_tpl('profiles/profiles_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('profiles'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('profiles/create_action'),
			'title'  => 'TRAMS::SCP::Create Profiles',
	    'company_name' => set_value('company_name'),
	    'created_at' => set_value('created_at'),
	    'display_name' => set_value('display_name'),
	    'dob' => set_value('dob'),
	    'fullname' => set_value('fullname'),
	    'gender' => set_value('gender'),
	    'id' => set_value('id'),
	    'location' => set_value('location'),
	    'postalcode' => set_value('postalcode'),
	    'professional_exp' => set_value('professional_exp'),
	    'profile_description' => set_value('profile_description'),
	    'role_job' => set_value('role_job'),
	    'speciality_strength' => set_value('speciality_strength'),
	    'status' => set_value('status'),
	    'subject_tech' => set_value('subject_tech'),
	    'teaching_details' => set_value('teaching_details'),
	    'updated_at' => set_value('updated_at'),
	    'user_education' => set_value('user_education'),
	    'user_id' => set_value('user_id'),
	);
          $this->_tpl('profiles/profiles_form', $data);	
		
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'company_name' => $this->input->post('company_name',TRUE),
		'created_at' => $this->input->post('created_at',TRUE),
		'display_name' => $this->input->post('display_name',TRUE),
		'dob' => $this->input->post('dob',TRUE),
		'fullname' => $this->input->post('fullname',TRUE),
		'gender' => $this->input->post('gender',TRUE),
		'location' => $this->input->post('location',TRUE),
		'postalcode' => $this->input->post('postalcode',TRUE),
		'professional_exp' => $this->input->post('professional_exp',TRUE),
		'profile_description' => $this->input->post('profile_description',TRUE),
		'role_job' => $this->input->post('role_job',TRUE),
		'speciality_strength' => $this->input->post('speciality_strength',TRUE),
		'status' => $this->input->post('status',TRUE),
		'subject_tech' => $this->input->post('subject_tech',TRUE),
		'teaching_details' => $this->input->post('teaching_details',TRUE),
		'updated_at' => $this->input->post('updated_at',TRUE),
		'user_education' => $this->input->post('user_education',TRUE),
		'user_id' => $this->input->post('user_id',TRUE),
	    );

            $this->Profiles_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('profiles'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Profiles_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('profiles/update_action'),
				'title'  => 'TRAMS::SCP::Update Profiles',
		'company_name' => set_value('company_name', $row->company_name),
		'created_at' => set_value('created_at', $row->created_at),
		'display_name' => set_value('display_name', $row->display_name),
		'dob' => set_value('dob', $row->dob),
		'fullname' => set_value('fullname', $row->fullname),
		'gender' => set_value('gender', $row->gender),
		'id' => set_value('id', $row->id),
		'location' => set_value('location', $row->location),
		'postalcode' => set_value('postalcode', $row->postalcode),
		'professional_exp' => set_value('professional_exp', $row->professional_exp),
		'profile_description' => set_value('profile_description', $row->profile_description),
		'role_job' => set_value('role_job', $row->role_job),
		'speciality_strength' => set_value('speciality_strength', $row->speciality_strength),
		'status' => set_value('status', $row->status),
		'subject_tech' => set_value('subject_tech', $row->subject_tech),
		'teaching_details' => set_value('teaching_details', $row->teaching_details),
		'updated_at' => set_value('updated_at', $row->updated_at),
		'user_education' => set_value('user_education', $row->user_education),
		'user_id' => set_value('user_id', $row->user_id),
	    );
			$this->_tpl('profiles/profiles_edit', $data);
		
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('profiles'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'company_name' => $this->input->post('company_name',TRUE),
		'created_at' => $this->input->post('created_at',TRUE),
		'display_name' => $this->input->post('display_name',TRUE),
		'dob' => $this->input->post('dob',TRUE),
		'fullname' => $this->input->post('fullname',TRUE),
		'gender' => $this->input->post('gender',TRUE),
		'location' => $this->input->post('location',TRUE),
		'postalcode' => $this->input->post('postalcode',TRUE),
		'professional_exp' => $this->input->post('professional_exp',TRUE),
		'profile_description' => $this->input->post('profile_description',TRUE),
		'role_job' => $this->input->post('role_job',TRUE),
		'speciality_strength' => $this->input->post('speciality_strength',TRUE),
		'status' => $this->input->post('status',TRUE),
		'subject_tech' => $this->input->post('subject_tech',TRUE),
		'teaching_details' => $this->input->post('teaching_details',TRUE),
		'updated_at' => $this->input->post('updated_at',TRUE),
		'user_education' => $this->input->post('user_education',TRUE),
		'user_id' => $this->input->post('user_id',TRUE),
	    );

            $this->Profiles_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('profiles'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Profiles_model->get_by_id($id);

        if ($row) {
            $this->Profiles_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('profiles'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('profiles'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('company_name', 'company name', 'trim|required');
	$this->form_validation->set_rules('created_at', 'created at', 'trim|required');
	$this->form_validation->set_rules('display_name', 'display name', 'trim|required');
	$this->form_validation->set_rules('dob', 'dob', 'trim|required');
	$this->form_validation->set_rules('fullname', 'fullname', 'trim|required');
	$this->form_validation->set_rules('gender', 'gender', 'trim|required');
	$this->form_validation->set_rules('location', 'location', 'trim|required');
	$this->form_validation->set_rules('postalcode', 'postalcode', 'trim|required');
	$this->form_validation->set_rules('professional_exp', 'professional exp', 'trim|required');
	$this->form_validation->set_rules('profile_description', 'profile description', 'trim|required');
	$this->form_validation->set_rules('role_job', 'role job', 'trim|required');
	$this->form_validation->set_rules('speciality_strength', 'speciality strength', 'trim|required');
	$this->form_validation->set_rules('status', 'status', 'trim|required|numeric');
	$this->form_validation->set_rules('subject_tech', 'subject tech', 'trim|required');
	$this->form_validation->set_rules('teaching_details', 'teaching details', 'trim|required');
	$this->form_validation->set_rules('updated_at', 'updated at', 'trim|required');
	$this->form_validation->set_rules('user_education', 'user education', 'trim|required');
	$this->form_validation->set_rules('user_id', 'user id', 'trim|required|numeric');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function check_exist()
    {
    $val = $this->input->post('val');
	$col = $this->input->post('col');
	$id = isset($_POST['id']) ? $_POST['id'] : '';
	$res = $this->Profiles_model->check_exist($val,$col,$id);
	if($res){
		echo 'false';
	}
	else {
		echo 'true';
	}
    }

}

/* End of file Profiles.php */
