<?php

/* Location: ./application/controllers/Students.php */
/* Derived from Harviacode  */
/* Modified by Vivek Raghunathan 2021-06-25 17:58:12 */
/* Email : vivekra@dqserv.com */
/* http://dqserv.com */



if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tutor extends APP_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Tutor_model');
		$this->load->model('Users_model');
		$this->load->model('Common_model');
		$this->load->model('Profiles_model');
		$this->load->model('Batches_model');
        $this->load->library('form_validation');
		$this->load->library('Arbac');
		if(!$this->arbac->is_loggedin()){ redirect('scp/auth_login'); }
    }

    public function index()
    {
        $tutor = $this->Tutor_model->get_all();
		
        $data = array(
            'tutor_data' => $tutor,
			'title' => 'TRAMS::SCP::Tutor',
        );
		$this->_tpl('tutor/tutor_list', $data);
		
    }

    

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('tutor/create_action'),
            'title'  => 'TRAMS::SCP::Create Tutors',
            'created_at' => set_value('created_at'),
            'default_email_id' => set_value('default_email_id'),
            'default_mobile_no' => set_value('default_mobile_no'),
            'email' => set_value('email'),
            'email_verified_at' => set_value('email_verified_at'),
            'facebook_id' => set_value('facebook_id'),
            'google_id' => set_value('google_id'),
            'iam_type' => set_value('iam_type'),
            'id' => set_value('id'),
            'last_login' => set_value('last_login'),
            'last_seen' => set_value('last_seen'),
            'linkedin_id' => set_value('linkedin'),
            'name' => set_value('name'),
            'only_acc' => set_value('only_acc'),
            'org_id' => set_value('org_id'),
            'password' => set_value('password'),
            'phone' => set_value('phone'),
            'phone_verified' => set_value('phone_verified'),
            'profile_img' => set_value('profile_img'),
            'remember_token' => set_value('remember_token'),
            'status' => set_value('status'),
            'temp_email' => set_value('temp_email'),
            'updated_at' => set_value('updated_at'),
            'user_type' => set_value('user_type'),
			'skills' => set_value('skills'),
            'expert_level' => set_value('expert_level'),
            'certification' => set_value('certification'),
			'cost_per_hour' => set_value('cost_per_hour'),
            'availablity' => set_value('availablity'),
            'document_type' => set_value('document_type'),
			'document_file_name' => set_value('document_file_name'),
			'bank_details' => set_value('bank_details'),
        );
        $this->_tpl('tutor/tutor_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'email' => $this->input->post('email', TRUE),
                'name' => $this->input->post('name', TRUE),
                'phone' => $this->input->post('phone', TRUE),
                'iam_type' => $this->input->post('iam_type', TRUE),
				'user_type' => 'Teacher'
            );
			$this->Users_model->insert($data);
			$id = $this->db->insert_id();
			$data2 = array(
				'user_id' => $id,
				'fullname' => $this->input->post('name', TRUE),
				'skills' => $this->input->post('skills', TRUE),
				'expert_level' => $this->input->post('expert_level', TRUE),
				'certification' => $this->input->post('certification', TRUE),
				'cost_per_hour' => $this->input->post('cost_per_hour', TRUE),
				'availablity' => $this->input->post('availablity', TRUE),
				'document_type' => $this->input->post('document_type', TRUE),
				'document_file_name' => $this->input->post('document_file_name', TRUE),
				'bank_details' => $this->input->post('bank_details', TRUE)
			);
            
			$this->Profiles_model->insert($data2);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('Tutor'));
        }
    }

    public function update($id)
    {
        $row = $this->Users_model->get_by_id($id);
		$row_profile = $this->Profiles_model->get_by_user_id($id);
			//if ($row_profile) {
            $data['profile'] = array(
			    'user_id' => set_value('user_id', $row_profile->user_id),
				'skills' => set_value('skills', $row_profile->skills),
                'expert_level' => set_value('expert_level', $row_profile->expert_level),
                'certification' => set_value('certification', $row_profile->certification),
				'cost_per_hour' => set_value('cost_per_hour', $row_profile->cost_per_hour),
                'availablity' => set_value('availablity', $row_profile->availablity),
				'document_type' => set_value('document_type', $row_profile->document_type),
				'document_file_name' => set_value('document_file_name', $row_profile->document_file_name),
                'bank_details' => set_value('bank_details', $row_profile->bank_details),
			);
		
        if ($row) {
            $data['user'] = array(
                'button' => 'Edit',
                'action' => site_url('tutor/update_action'),
                'title'  => 'TRAMS::SCP::Update Tutor',
                'created_at' => set_value('created_at', $row->created_at),
                'default_email_id' => set_value('default_email_id', $row->default_email_id),
                'default_mobile_no' => set_value('default_mobile_no', $row->default_mobile_no),
                'email' => set_value('email', $row->email),
                'email_verified_at' => set_value('email_verified_at', $row->email_verified_at),
                'facebook_id' => set_value('facebook_id', $row->facebook_id),
                'google_id' => set_value('google_id', $row->google_id),
                'iam_type' => set_value('iam_type', $row->iam_type),
                'id' => set_value('id', $row->id),
                'last_login' => set_value('last_login', $row->last_login),
                'last_seen' => set_value('last_seen', $row->last_seen),
                'linkedin_id' => set_value('linkedin', $row->linkedin_id),
                'name' => set_value('name', $row->name),
                'only_acc' => set_value('only_acc', $row->only_acc),
                'org_id' => set_value('org_id', $row->org_id),
                'password' => set_value('password', $row->password),
                'phone' => set_value('phone', $row->phone),
                'phone_verified' => set_value('phone_verified', $row->phone_verified),
                'profile_img' => set_value('profile_img', $row->profile_img),
                'remember_token' => set_value('remember_token', $row->remember_token),
                'status' => set_value('status', $row->status),
                'temp_email' => set_value('temp_email', $row->temp_email),
                'updated_at' => set_value('updated_at', $row->updated_at),
                'user_type' => set_value('user_type', $row->user_type),
				'iam_type' => set_value('iam_type', $row->iam_type),
				
            );
			
			$this->_tpl('tutor/tutor_edit', $data);

		}
						//}
                     else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('users'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
                
                'email' => $this->input->post('email', TRUE),
                'name' => $this->input->post('name', TRUE),
                'phone' => $this->input->post('phone', TRUE),
                'iam_type' => $this->input->post('iam_type', TRUE),
            );

            $this->Users_model->update($this->input->post('id', TRUE), $data);
			$data2 = array(
                'fullname' => $this->input->post('name', TRUE),
                'skills' => $this->input->post('skills', TRUE),
                'expert_level' => $this->input->post('expert_level', TRUE),
                'certification' => $this->input->post('certification', TRUE),
				'document_type' => $this->input->post('document_type', TRUE),
				'document_file_name' => $this->input->post('document_file_name', TRUE),
                'cost_per_hour' => $this->input->post('cost_per_hour', TRUE),
				'availablity' => $this->input->post('availablity', TRUE),
				'bank_details' => $this->input->post('bank_details', TRUE),
            );
			$this->Profiles_model->update_profile($this->input->post('user_id', TRUE), $data2);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('tutor'));
        }
    }

    public function delete($id)
    {
		$row_user = $this->Profiles_model->get_by_user_id($id);
		
		$row = $this->Batches_model->get_by_faculty_id($row_user->id);
		

		if ($row ==false) { 
			
			if (!$this->Users_model->delete($id)) {
				$this->session->set_flashdata('message', 'Tutor already exist in its Batches');
				redirect(site_url('tutor'));
			} else {
				$this->session->set_flashdata('message', 'Delete Record Success');
				redirect(site_url('tutor'));
			}
			
		} else {
			
			$this->session->set_flashdata('message', 'No Records Found');
			redirect(site_url('tutor'));
		}
        
    }

    public function _rules()
    {
        $this->form_validation->set_rules('email', 'email', 'trim|required');
        $this->form_validation->set_rules('iam_type', 'iam type', 'trim|required');
        $this->form_validation->set_rules('name', 'name', 'trim|required');
        $this->form_validation->set_rules('phone', 'phone', 'trim|required');
		$this->form_validation->set_rules('skills', 'Skills', 'trim|required');
		$this->form_validation->set_rules('expert_level', 'Expert Level', 'trim|required');
		$this->form_validation->set_rules('certification', 'Certification', 'trim|required');
		$this->form_validation->set_rules('cost_per_hour', 'Cost per hour', 'trim|required');
		$this->form_validation->set_rules('availablity', 'Availablity', 'trim|required');
		$this->form_validation->set_rules('document_type', 'Document Type', 'trim|required');
		$this->form_validation->set_rules('document_file_name', 'document_file_name', 'trim|required');
		$this->form_validation->set_rules('bank_details', 'bank_details', 'trim|required');
        //$this->form_validation->set_rules('id', 'id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function check_exist()
    {
        $val = $this->input->post('val');
        $col = $this->input->post('col');
        $id = isset($_POST['id']) ? $_POST['id'] : '';
        $res = $this->Users_model->check_exist($val, $col, $id);
        if ($res) {
            echo 'false';
        } else {
            echo 'true';
        }
    }
    public function send_email_verification($id)
    {
        $row = $this->Users_model->get_by_id($id);
        // if ($this->Employee_Model->insertEmployee($row)) {

        //send confirm mail
        // $row->email
        $receiver = 'tmpawar66@gmail.com';
        if ($this->Users_model->sendEmail($receiver)) {
            //redirect('Login_Controller/index');
            //$msg = "Successfully registered with the sysytem.Conformation link has been sent to: ".$this->input->post('txt_email');
            $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Successfully registered. Please confirm the mail that has been sent to your email. </div>');

            // $this->load->view('header');
            $this->load->view('users_list');
            // $this->load->view('footer');
        } else {

            //$error = "Error, Cannot insert new user details!";
            $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Failed!! Please try again.</div>');
            // redirect(site_url('users'));
        }
        // }
    }
	
}
?>