<?php

/* Location: ./application/controllers/Users.php */
/* Derived from Harviacode  */
/* Modified by Vivek Raghunathan 2021-07-14 22:49:07 */
/* Email : vivekra@dqserv.com */
/* http://dqserv.com */



if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Users extends APP_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Users_model');
        $this->load->library('form_validation');
        $this->load->library('Arbac');
        if (!$this->arbac->is_loggedin()) {
            redirect('scp/auth_login');
        }
    }

    public function index()
    {
        $users = $this->Users_model->get_all();

        $data = array(
            'users_data' => $users,
            'title' => 'TRAMS::SCP::Users',
        );
        $this->_tpl('users/users_list', $data);
    }

    public function read($id)
    {
        $row = $this->Users_model->get_by_id($id);
        if ($row) {
            $data = array(
                'title'  => 'TRAMS::SCP::Users',
                'created_at' => $row->created_at,
                'default_email_id' => $row->default_email_id,
                'default_mobile_no' => $row->default_mobile_no,
                'email' => $row->email,
                'email_verified_at' => $row->email_verified_at,
                'facebook_id' => $row->facebook_id,
                'google_id' => $row->google_id,
                'iam_type' => $row->iam_type,
                'id' => $row->id,
                'last_login' => $row->last_login,
                'last_seen' => $row->last_seen,
                'linkedin_id' => $row->linkedin_id,
                'name' => $row->name,
                'only_acc' => $row->only_acc,
                'org_id' => $row->org_id,
                'password' => $row->password,
                'phone' => $row->phone,
                'phone_verified' => $row->phone_verified,
                'profile_img' => $row->profile_img,
                'remember_token' => $row->remember_token,
                'status' => $row->status,
                'temp_email' => $row->temp_email,
                'updated_at' => $row->updated_at,
                'user_type' => $row->user_type,
            );
            $this->_tpl('users/users_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('users'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('users/create_action'),
            'title'  => 'TRAMS::SCP::Create Users',
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
        );
        $this->_tpl('users/users_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
			$this->create();
        } else {
			$data = array(
                'created_at' => date('Y-m-d H:i:s'),
                //'default_email_id' => $this->input->post('default_email_id', TRUE),
                //'default_mobile_no' => $this->input->post('default_mobile_no', TRUE),
                'email' => $this->input->post('email', TRUE),
                'email_verified_at' => date('Y-m-d H:i:s'),
                //'facebook_id' => $this->input->post('facebook_id', TRUE),
                //'google_id' => $this->input->post('google_id', TRUE),
                'iam_type' => $this->input->post('iam_type', TRUE),
                //'last_login' => $this->input->post('last_login', TRUE),
                //'last_seen' => $this->input->post('last_seen', TRUE),
                //'linkedin_id' => $this->input->post('linkedin', TRUE),
                'name' => $this->input->post('name', TRUE),
                //'only_acc' => $this->input->post('only_acc', TRUE),
                //'org_id' => $this->input->post('org_id', TRUE),
                //'password' => $this->input->post('password', TRUE),
                'phone' => $this->input->post('phone', TRUE),
                //'phone_verified' => $this->input->post('phone_verified', TRUE),
                //'profile_img' => $this->input->post('profile_img', TRUE),
                //'remember_token' => $this->input->post('remember_token', TRUE),
                //'status' => $this->input->post('status', TRUE),
                //'temp_email' => $this->input->post('temp_email', TRUE),
                //'updated_at' => $this->input->post('updated_at', TRUE),
                'user_type' => $this->input->post('user_type', TRUE),
            );

            $this->Users_model->insert($data);
            $id = $this->db->insert_id();
            //redirect("https://app.talentegra.com/api/ciRegister/" . $id);
			//$curl_handler = curl_init("https://app.talentegra.com/api/ciRegister/".$id);
			
			$output = $this->httpGet("https://app.talentegra.com/api/ciRegister/".$id);
			//print_r($output);exit;
            $this->session->set_flashdata('message', 'User created successfully.Acitvation email has been sent to user to set his password.');
            redirect(site_url('users'));
        }
    }

    public function update($id)
    {
        $row = $this->Users_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('users/update_action'),
                'title'  => 'TRAMS::SCP::Update Users',
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
            );
            $this->_tpl('users/users_edit', $data);
        } else {
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
                'created_at' => $this->input->post('created_at', TRUE),
                'default_email_id' => $this->input->post('default_email_id', TRUE),
                'default_mobile_no' => $this->input->post('default_mobile_no', TRUE),
                'email' => $this->input->post('email', TRUE),
                'email_verified_at' => $this->input->post('email_verified_at', TRUE),
                'facebook_id' => $this->input->post('facebook_id', TRUE),
                'google_id' => $this->input->post('google_id', TRUE),
                'iam_type' => $this->input->post('iam_type', TRUE),
                'last_login' => $this->input->post('last_login', TRUE),
                'last_seen' => $this->input->post('last_seen', TRUE),
                'linkedin_id' => $this->input->post('linkedin', TRUE),
                'name' => $this->input->post('name', TRUE),
                'only_acc' => $this->input->post('only_acc', TRUE),
                'org_id' => $this->input->post('org_id', TRUE),
                'password' => $this->input->post('password', TRUE),
                'phone' => $this->input->post('phone', TRUE),
                'phone_verified' => $this->input->post('phone_verified', TRUE),
                'profile_img' => $this->input->post('profile_img', TRUE),
                'remember_token' => $this->input->post('remember_token', TRUE),
                'status' => $this->input->post('status', TRUE),
                'temp_email' => $this->input->post('temp_email', TRUE),
                'updated_at' => $this->input->post('updated_at', TRUE),
                'user_type' => $this->input->post('user_type', TRUE),
            );

            $this->Users_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('users'));
        }
    }

    public function delete($id)
    {
        $row = $this->Users_model->get_by_id($id);

        if ($row) {
            $this->Users_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('users'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('users'));
        }
    }

    public function _rules()
    {
        //$this->form_validation->set_rules('created_at', 'created at', 'trim|required');
        //$this->form_validation->set_rules('default_email_id', 'default email id', 'trim|required|numeric');
        //$this->form_validation->set_rules('default_mobile_no', 'default mobile no', 'trim|required|numeric');
        $this->form_validation->set_rules('email', 'email', 'trim|required');
        //$this->form_validation->set_rules('email_verified_at', 'email verified at', 'trim|required');
        //$this->form_validation->set_rules('facebook_id', 'facebook id', 'trim|required');
        //$this->form_validation->set_rules('google_id', 'google id', 'trim|required');
        //$this->form_validation->set_rules('iam_type', 'iam type', 'trim|required');
        //$this->form_validation->set_rules('last_login', 'last login', 'trim|required');
        //$this->form_validation->set_rules('last_seen', 'last seen', 'trim|required');
        //$this->form_validation->set_rules('linkedin', 'linkedin', 'trim|required');
        $this->form_validation->set_rules('name', 'name', 'trim|required');
        //$this->form_validation->set_rules('only_acc', 'only acc', 'trim|required');
        //$this->form_validation->set_rules('org_id', 'org id', 'trim|required|numeric');
        //$this->form_validation->set_rules('password', 'password', 'trim|required');
        $this->form_validation->set_rules('phone', 'phone', 'trim|required');
        //$this->form_validation->set_rules('phone_verified', 'phone verified', 'trim|required');
        //$this->form_validation->set_rules('profile_img', 'profile img', 'trim|required');
        //$this->form_validation->set_rules('remember_token', 'remember token', 'trim|required');
        //$this->form_validation->set_rules('status', 'status', 'trim|required|numeric');
        //$this->form_validation->set_rules('temp_email', 'temp email', 'trim|required');
        //$this->form_validation->set_rules('updated_at', 'updated at', 'trim|required');
        $this->form_validation->set_rules('user_type', 'user type', 'trim|required');

        $this->form_validation->set_rules('id', 'id', 'trim');
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
	
	function httpGet($url)
	{
		$ch = curl_init();  
	 
		curl_setopt($ch,CURLOPT_URL,$url);
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
	//  curl_setopt($ch,CURLOPT_HEADER, false); 
	 
		$output=curl_exec($ch);
	 
		curl_close($ch);
		return $output;
	}
	 
}

/* End of file Users.php */
