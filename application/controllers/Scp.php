<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Scp extends APP_Controller {
    public function __construct() {
        parent::__construct();
        // Your own constructor code
        $this->load->library("Arbac");
	$this->load->library("form_validation");
        $this->load->model("Arbac_perm_to_user_model");
        
		
		
    }
	
	public function _render_page($view, $data=null, $render=false) {

        $this->viewdata = (empty($data)) ? $this->data: $data;

        $view_html = $this->load->view($view, $this->viewdata, $render);

        if (!$render) return $view_html;
    }
	
	
	//log the user in
    public function auth_login() {
		
		if($this->arbac->is_loggedin())
		{
			    redirect('dashboard/index', 'refresh');	
				//redirect($this->session->flashdata('redirect'));
		}
		
	$this->data['title'] = "Login";

        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == true) {

            //check for "remember me"
            $remember = (bool) $this->input->post('remember');
			$email = $this->input->post('email');	
            if ($this->arbac->login($email, $this->input->post('password'), $remember)) {

                
				//if the login is successful
                //redirect them back to the home page
                $this->session->set_flashdata('message', $this->arbac->print_infos());
				//set loggedin true in session
				/*
				$this->load->model('Staff_model');
				$staff_data = $this->Staff_model->get_staff_primary_role($email); 
				
				if ($staff_data)
				{
					$role_id = $staff_data->role_id;
				}
				*/
				$session_data = array(
					'logged_in' => 'true',
					'email' => $email,
					
				);	
				
				$this->session->set_userdata($session_data);
				redirect('dashboard', 'refresh');
				/*if ($redirect_url) {
					redirect($this->session->flashdata('redirect_url'));
				}
				else {
					redirect('dashboard/index', 'refresh');
				} */
				
            }else{
                //if the login was un-successful
                //redirect them back to the login page
                $this->session->set_flashdata('errors', $this->arbac->print_errors());
				$this->data['message'] = $this->session->flashdata('errors');
			   redirect('scp/auth_login', $this->data);
			   
			 $this->data['title'] = 'SCP::Login - Failed';
			// $this->load->view('scp/login_header', $this->data);
             //$this->_render_page('scp/auth_login', $this->data);
			 //$this->load->view('scp/login_footer');
			 $this->load->view('scp/auth_login', $this->data);
            }
        }else{

            //the user is not logging in so display the login page
            $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

            $this->data['email'] = array('name' => 'email',
                'id' => 'email',
                'type' => 'text',
                'value' => $this->form_validation->set_value('email'),
            );
            $this->data['password'] = array('name' => 'password',
                'id' => 'password',
                'type' => 'password',
            );
			
			$this->data['title'] = 'SCP::Login';
			
			//$this->load->view('scp/login_header', $this->data);
            //$this->_render_page('scp/auth_login', $this->data);
			//$this->_render_page('scp/login_new', $this->data);
			//$this->load->view('scp/login_footer');
			$this->load->view('scp/auth_login', $this->data);
        }
    }
	
	
	
	//log the user out
    public function logout() {

        $this->data['title'] = "Logout";

        $logout = $this->arbac->logout();

        $this->session->set_flashdata('message', $this->arbac->print_infos());
        redirect('scp/auth_login', 'refresh');
    }
	
	function user_map_perms() {
	
	//	$this->arbac->allow_user('muthu@dqserv.com', 'view_org');
		
	
	}
        
        public function change_password() {
            
        if($this->arbac->is_loggedin())
	{
            $data['title'] = "Change Password";
            
            if($this->input->post()) {
                $userid = $this->session->userdata('id');
                
                //Update password
                $new_password = $this->arbac->hash_password($this->input->post('password'), $userid);
                
                $update = array('pass' => $new_password);
                
                $this->Arbac_perm_to_user_model->change_password($userid,$update);
                
                $this->session->set_flashdata('message', 'Password updated successfully');
                
                redirect('scp/change_password');
            }
            
			$this->_tpl('dashboard/change_password', $data);
			
           // $this->load->view('templates/header_dashboard', $data);
           // $this->load->view('dashboard/change_password', $data);
           // $this->load->view('templates/footer', $data);
        }
        else {
            redirect('scp/auth_login');
        }

    }
	
}