<?php

/* Location: ./application/controllers/Staff.php */
/* Derived from Harviacode  */
/* Modified by Vivek Raghunathan 2016-03-20 03:31:15 */
/* Email : vivekra@dqserv.com */
/* http://dqserv.com */



if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Staff extends APP_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Staff_model');
        $this->load->library('form_validation');
        $this->load->library('Arbac');
        $this->load->helper('nav');
        $this->load->model('Arbac_perm_to_user_model');
        $this->load->model('Staff_dept_access_model');
		if(!$this->arbac->is_loggedin()){ redirect('scp/auth_login'); }
        }

    public function index() {
        $staff = $this->Staff_model->get_staff_list();

        $data = array(
            'staff_data' => $staff,
            'title' => 'TRAMS::SCP::staff',
            'sort_by' => 'DESC',
            'sort_column' => 'staff_id',
			'q' => '',
			'total_rows' => ''
			
        );
       // $this->load->view('templates/header', $data);
          $this->load->view('staff/staff_list', $data);
      //  $this->load->view('templates/footer', $data);
	  //$this->load->view('example/modules-datatables', $data);
	//  $this->_tpl('example/modules-datatables', $data);
	  
    }
	
	public function profile()
    {
        $logged_in              = $this->session->userdata('id');
        $row                    = $this->Staff_model->get_staff_by_id($logged_in);
        $data   =   array(
            'title' => 'TRAMS::SCP::Settings',
            'first_name'    => $row["firstname"],
            'last_name'     => $row["lastname"],
            'mobile'        => $row["mobile"],
            'email_id'      => $row["email"],
        );
		$data['error'] = "";
		
        $this->load->view('staff/profile', $data);		
    }
	
	
	public function update_tab_1() 
    {
        $logged_in              = $this->session->userdata('id');
        $data = array(                
				'firstname'         => $this->input->post('first_name',TRUE),
                'lastname'          => $this->input->post('last_name',TRUE),
				'mobile'            => $this->input->post('mobile',TRUE),			
				'updated'           => date('Y-m-d H:i:s')
	    );
            $this->Staff_model->update_by_staff_id($logged_in, $data); 
            $data = array( 
				'email'            => $this->input->post('email_id',TRUE)
	    );
		$this->Staff_model->update($logged_in, $data); 
		
		$this->session->set_flashdata('message', 'Update Profile Success');
		redirect(site_url('staff/profile'));
    }
    
    public function reset_password()
    {
        $pass           = $this->input->post('new_password', TRUE);
        $input_email    = FALSE;
        $input_username = FALSE;
        $logged_in      = $this->session->userdata('id');
        $this->arbac->update_user($logged_in, $input_email, $pass, $input_username);
    }

    public function read($id) {
        $row = $this->Staff_model->get_by_id($id);
        if ($row) {
            $data = array(
                'title' => 'TesNow::View Staff',
                'dept_name' => $row->dept_name,
                'staff_name' => $row->staff_name,
                'staff_email' => $row->staff_email,
                'staff_role' => $row->primary_role,
                'staff_manager' => $row->reporting_manager,
                'staff_desgn' => $row->designation,
                'org_name' => $row->org_name,
                'mobile' => $row->mobile,
                'signature' => $row->signature,
                'lang' => $row->lang,
                'timezone' => $row->timezone,
                'locale' => $row->locale,
                'notes' => $row->notes,
                'sms_notification' => $row->sms_notification
            );
           // $this->load->view('templates/header', $data);
           // $this->load->view('staff/staff_read', $data);
		   
		     $this->_tpl('staff/staff_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('staff'));
        }
    }

    public function create() {
        if (!$this->arbac->is_allowed('create_staff', $this->session->userdata('id'))) {
            $this->session->set_flashdata('error', 'Permission Denied');
            redirect(site_url('staff'));
        }
        $this->load->model('Org_model');
        $org_data = $this->Org_model->get_all();


        $this->load->model('Roles_model');
        $role_data = $this->Roles_model->get_all();

        $this->load->model('Staff_model');
        $staff_data = $this->Staff_model->get_all_staff();

        $this->load->model('Dept_model');
        $dept_data = $this->Dept_model->get_all();

        $this->load->model('Designation_model');
        $designation_data = $this->Designation_model->get_all();
        
        $create_customer = "";
        $edit_customer = "";
        $delete_customer = "";
        $manage_customer = "";
        $upload_customer = "";
        $upload_serial = "";
        $create_org = "";
        $edit_org = "";
        $delete_org = "";
        $view_org = "";
        $create_staff = "";
        $edit_staff = "";
        $delete_staff = "";
        $manage_staff = "";
        $list_staff = "";
        $create_dept = "";
        $edit_dept = "";
        $delete_dept = "";
        $manage_dept = "";
        $view_dept = "";
        
        $arr_ext_dept_role = array();

        $data = array(
            'button' => 'Create',
            'action' => site_url('staff/create_action'),
            'title' => 'TesNow::Add Staff',
            'staff_id' => '',
            'password' => set_value('pass'),
            'email' => set_value('email'),
            'username' => set_value('username'),
            'firstname' => set_value('firstname'),
            'lastname' => set_value('lastname'),
            'phone' => set_value('phone'),
            'phone_ext' => set_value('phone_ext'),
            'mobile' => set_value('mobile'),
            'org_data' => $org_data,
            'designation_data' => $designation_data,
            'dept_data' => $dept_data,
            'role_data' => $role_data,
            'staff_data' => $staff_data,
            'id' => set_value('id'),
            'org_id' => set_value('org_id'),
            'dept_id' => set_value('dept_id'),
            'role_id' => set_value('role_id'),
            'manager_id' => set_value('manager_id'),
            'designation_id' => set_value('designation_id'),
            'sms_notification' => set_value('sms_notification'),
            'isadmin' => set_value('isadmin'),
            'isvisible' => set_value('isvisible'),
            'onvacation' => set_value('onvacation'),
            'assigned_only' => set_value('assigned_only'),
            'show_assigned_tickets' => set_value('show_assigned_tickets'),
            'signature' => set_value('signature'),
            'banned' => set_value('islocked'),
            'create_customer' => $create_customer,
            'edit_customer' => $edit_customer,
            'delete_customer' => $delete_customer,
            'manage_customer' => $manage_customer,
            'upload_customer' => $upload_customer,
            'upload_serial' => $upload_serial,
            'create_org' => $create_org,
            'edit_org' => $edit_org,
            'delete_org' => $delete_org,
            'view_org' => $view_org,
            'create_staff' => $create_staff,
            'edit_staff' => $edit_staff,
            'delete_staff' => $delete_staff,
            'manage_staff' => $manage_staff,
            'list_staff' => $list_staff,
            'create_dept' => $create_dept,
            'edit_dept' => $edit_dept,
            'delete_dept' => $delete_dept,
            'manage_dept' => $manage_dept,
            'view_dept' => $view_dept,
            'arr_ext_dept_role' => $arr_ext_dept_role,
        );
     //   $this->load->view('templates/header', $data);
      //  $this->load->view('staff/staff_form', $data);
      //  $this->load->view('templates/footer', $data);
	  
	    $this->_tpl('staff/staff_form', $data);
    }

    public function create_action() {
        $this->_rules();
        
        $input_email    = $this->input->post('email', TRUE);
        $input_username = $this->input->post('username', TRUE);
        //$input_password = $this->input->post('password', TRUE);
        $input_password = $this->input->post('passwd', TRUE);
        $input_banned   = $this->input->post('islocked', TRUE);
        $permission     = array();

        if ($input_banned != 1) {
            $input_banned = 0;
        }
           
        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {

            $check_username = $this->Staff_model->staff_exist_by_username($input_username);
            $check_email    = $this->Staff_model->staff_exist_by_email($input_email);
            if ($check_username) {
                $this->session->set_flashdata('error', 'Username already exists');
                redirect(site_url('staff/create'));
            }

            if ($check_email) {
                $this->session->set_flashdata('error', 'User Email already exists');
                redirect(site_url('staff/create'));
            }
            
              
            /* echo "<pre>";
              print_r($_POST);
              echo "</pre>";
              exit; */
            //Create staff
            //$staff_id = $this->arbac->create_user($input_email, $input_password, $input_username, $input_banned);
            $staff_id = $this->arbac->create_user($input_email, $input_password, $input_username);            

            if ($staff_id != FALSE) {
                //Update the staff entry
                $data = array(
                    'firstname' => $this->input->post('firstname', TRUE),
                    'lastname' => $this->input->post('lastname', TRUE),
                    'phone' => $this->input->post('phone', TRUE),
                    'phone_ext' => $this->input->post('phone_ext', TRUE),
                    'mobile' => $this->input->post('mobile', TRUE),
                    'org_id' => $this->input->post('org_id', TRUE),
                    'dept_id' => $this->input->post('dept_id', TRUE),
                    'role_id' => $this->input->post('role_id', TRUE),
                    'manager_id' => $this->input->post('manager_id', TRUE),
                    'designation_id' => $this->input->post('designation_id', TRUE),
                    'signature' => $this->input->post('signature', TRUE),
                    //'lang' => $this->input->post('lang',TRUE),
                    //'timezone' => $this->input->post('timezone',TRUE),
                    //'locale' => $this->input->post('locale',TRUE),
                    //'notes' => $this->input->post('notes',TRUE),
                    'sms_notification' => $this->input->post('sms_notification', TRUE),
                    'isadmin' => $this->input->post('isadmin', TRUE),
                    //'isvisible' => $this->input->post('isvisible',TRUE),
                    'onvacation' => $this->input->post('onvacation', TRUE),
                    'assigned_only' => $this->input->post('assigned_only', TRUE),
                    //'show_assigned_tickets' => $this->input->post('show_assigned_tickets',TRUE),
                    //'change_passwd' => $this->input->post('change_passwd',TRUE),
                    //'max_page_size' => $this->input->post('max_page_size',TRUE),
                    //'auto_refresh_rate' => $this->input->post('auto_refresh_rate',TRUE),
                    //'default_signature_type' => $this->input->post('default_signature_type',TRUE),
                    //'default_paper_size' => $this->input->post('default_paper_size',TRUE),
                    //'extra' => $this->input->post('extra',TRUE),
                    //'permissions' => $this->input->post('permissions',TRUE),
                    'created' => date('Y-m-d H:i:s'),
                    'updated' => date('Y-m-d H:i:s'),
                );

                /* echo "<pre>";
                  print_r($data);
                  echo "</pre>"; */

                $this->Staff_model->update_by_staff_id($staff_id, $data);

                //insert in to arbac_perm_to_user table
                if($this->input->post('create_customer', TRUE) == 1) {
                    $permission[] = array('perm_id' => 45, 'user_id' => $staff_id);
                }
                if($this->input->post('edit_customer', TRUE) == 1) {
                    $permission[] = array('perm_id' => 46, 'user_id' => $staff_id);
                }
                if($this->input->post('delete_customer', TRUE) == 1) {
                    $permission[] = array('perm_id' => 47, 'user_id' => $staff_id); //
                }
                if($this->input->post('manage_customer', TRUE) == 1) {
                    $permission[] = array('perm_id' => 48, 'user_id' => $staff_id);
                }
                if($this->input->post('upload_customer', TRUE) == 1) {
                    $permission[] = array('perm_id' => 44, 'user_id' => $staff_id); //
                }
                if($this->input->post('upload_serial', TRUE) == 1) {
                    $permission[] = array('perm_id' => 33, 'user_id' => $staff_id);
                }
                
                if($this->input->post('create_org', TRUE) == 1) {
                    $permission[] = array('perm_id' => 18, 'user_id' => $staff_id);
                }
                if($this->input->post('edit_org', TRUE) == 1) {
                    $permission[] = array('perm_id' => 19, 'user_id' => $staff_id);
                }
                if($this->input->post('delete_org', TRUE) == 1) {
                    $permission[] = array('perm_id' => 20, 'user_id' => $staff_id); //
                }
                if($this->input->post('view_org', TRUE) == 1) {
                    $permission[] = array('perm_id' => 21, 'user_id' => $staff_id);
                }
                
                if($this->input->post('create_staff', TRUE) == 1) {
                    $permission[] = array('perm_id' => 26, 'user_id' => $staff_id);
                }
                if($this->input->post('manage_staff', TRUE) == 1) {
                    $permission[] = array('perm_id' => 27, 'user_id' => $staff_id);
                }
                if($this->input->post('edit_staff', TRUE) == 1) {
                    $permission[] = array('perm_id' => 28, 'user_id' => $staff_id);
                }
                if($this->input->post('list_staff', TRUE) == 1) {
                    $permission[] = array('perm_id' => 30, 'user_id' => $staff_id);
                }
                if($this->input->post('delete_staff', TRUE) == 1) {
                    $permission[] = array('perm_id' => 32, 'user_id' => $staff_id); //
                }
                
                if($this->input->post('create_dept', TRUE) == 1) {
                    $permission[] = array('perm_id' => 34, 'user_id' => $staff_id);
                }
                if($this->input->post('edit_dept', TRUE) == 1) {
                    $permission[] = array('perm_id' => 35, 'user_id' => $staff_id);
                }
                if($this->input->post('delete_dept', TRUE) == 1) {
                    $permission[] = array('perm_id' => 36, 'user_id' => $staff_id);
                }
                if($this->input->post('manage_dept', TRUE) == 1) {
                    $permission[] = array('perm_id' => 40, 'user_id' => $staff_id);
                }
                if($this->input->post('view_dept', TRUE) == 1) {
                    $permission[] = array('perm_id' => 41, 'user_id' => $staff_id); //
                }
                
                if(count($permission) > 0) {
                    $this->Arbac_perm_to_user_model->insert_batch($permission);
                }
                
                //Insert in to Staff_dept_access table
                $extended_dept_role = $this->input->post('add_data', TRUE);
                $extended_dept = $this->input->post('add_dept_id', TRUE);
                $extended_role = $this->input->post('add_role_id', TRUE);
                
                $staff_dept_access = array();
                
                foreach ($extended_dept_role as $key => $dept_role_value) {
                    $staff_dept_access[] = array('staff_id' => $staff_id,'dept_id' => $extended_dept[$key],'role_id' => $extended_role[$key]);
                }
                
                if(count($staff_dept_access) > 0) {
                    $this->Staff_dept_access_model->insert_batch($staff_dept_access);
                }
                
                $this->session->set_flashdata('message', 'Create Record Success');
                redirect(site_url('staff'));
            } else {
                $this->session->set_flashdata('error', 'Staff creation failed');
                redirect(site_url('staff/create'));
            }
        }
    }

    public function update($id) {
        if (!$this->arbac->is_allowed('edit_staff', $this->session->userdata('id'))) {
            $this->session->set_flashdata('error', 'Permission Denied');
            redirect(site_url('staff'));
        }
        $row = $this->Staff_model->get_by_id($id);
        
        $arr_permission = $this->Arbac_perm_to_user_model->get_perm_by_staff($id);
        
        $arr_ext_dept_role = $this->Staff_dept_access_model->get_dept_role_by_staff($id);
        
        $create_customer = "";
        $edit_customer = "";
        $delete_customer = "";
        $manage_customer = "";
        $upload_customer = "";
        $upload_serial = "";
        $create_org = "";
        $edit_org = "";
        $delete_org = "";
        $view_org = "";
        $create_staff = "";
        $edit_staff = "";
        $delete_staff = "";
        $manage_staff = "";
        $list_staff = "";
        $create_dept = "";
        $edit_dept = "";
        $delete_dept = "";
        $manage_dept = "";
        $view_dept = "";
        
        if ($arr_permission != 'failure') {
            foreach ($arr_permission as $value) {
                //echo "<br>  vl ".$value['perm_id'];

                if (in_array(45, $value)) {
                    $create_customer = 1;
                }
                if (in_array(46, $value)) {
                    $edit_customer = 1;
                }
                if (in_array(47, $value)) {
                    $delete_customer = 1;
                }
                if (in_array(48, $value)) {
                    $manage_customer = 1;
                }
                if (in_array(44, $value)) {
                    $upload_customer = 1;
                }
                if (in_array(33, $value)) {
                    $upload_serial = 1;
                }
                if (in_array(18, $value)) {
                    $create_org = 1;
                }
                if (in_array(19, $value)) {
                    $edit_org = 1;
                }
                if (in_array(20, $value)) {
                    $delete_org = 1;
                }
                if (in_array(21, $value)) {
                    $view_org = 1;
                }
                if (in_array(26, $value)) {
                    $create_staff = 1;
                }
                if (in_array(27, $value)) {
                    $manage_staff = 1;
                }
                if (in_array(28, $value)) {
                    $edit_staff = 1;
                }
                if (in_array(30, $value)) {
                    $list_staff = 1;
                }
                if (in_array(32, $value)) {
                    $delete_staff = 1;
                }
                if (in_array(34, $value)) {
                    $create_dept = 1;
                }
                if (in_array(35, $value)) {
                    $edit_dept = 1;
                }
                if (in_array(36, $value)) {
                    $delete_dept = 1;
                }
                if (in_array(40, $value)) {
                    $manage_dept = 1;
                }
                if (in_array(41, $value)) {
                    $view_dept = 1;
                }
                
                
            }
        }

        /* echo "<pre>";        
          print_r($row);
          echo "</pre>"; */

        $this->load->model('Org_model');
        $org_data = $this->Org_model->get_all();


        $this->load->model('Roles_model');
        $role_data = $this->Roles_model->get_all();

        $this->load->model('Staff_model');
        $staff_data = $this->Staff_model->get_all_staff();

        $this->load->model('Dept_model');
        $dept_data = $this->Dept_model->get_all();

        $this->load->model('Designation_model');
        $designation_data = $this->Designation_model->get_all();

        if ($row) {
            $data = array(
                'button' => 'Update',
                'title' => 'TesNow::Update Staff',
                'action' => site_url('staff/update_action/'),
                'staff_id' => set_value('staff_id', $row->staff_id),
                'org_data' => $org_data,
                'designation_data' => $designation_data,
                'dept_data' => $dept_data,
                'role_data' => $role_data,
                'staff_data' => $staff_data,
                'org_id' => set_value('org_id', $row->org_id),
                'dept_id' => set_value('dept_id', $row->dept_id),
                'role_id' => set_value('role_id', $row->role_id),
                'manager_id' => set_value('manager_id', $row->manager_id),
                'designation_id' => set_value('designation_id', $row->designation_id),
                'firstname' => set_value('firstname', $row->firstname),
                'lastname' => set_value('lastname', $row->lastname),
                'email' => set_value('lastname', $row->staff_email),
                'username' => set_value('lastname', $row->staff_username),
                'phone' => set_value('phone', $row->phone),
                'phone_ext' => set_value('phone_ext', $row->phone_ext),
                'mobile' => set_value('mobile', $row->mobile),
                'signature' => set_value('signature', $row->signature),
                'lang' => set_value('lang', $row->lang),
                'timezone' => set_value('timezone', $row->timezone),
                'locale' => set_value('locale', $row->locale),
                'notes' => set_value('notes', $row->notes),
                'sms_notification' => set_value('sms_notification', $row->sms_notification),
                'banned' => set_value('permissions', $row->banned),
                'isadmin' => set_value('isadmin', $row->isadmin),
                'isvisible' => set_value('isvisible', $row->isvisible),
                'onvacation' => set_value('onvacation', $row->onvacation),
                'assigned_only' => set_value('assigned_only', $row->assigned_only),
                'show_assigned_tickets' => set_value('show_assigned_tickets', $row->show_assigned_tickets),
                'change_passwd' => set_value('change_passwd', $row->change_passwd),
                'max_page_size' => set_value('max_page_size', $row->max_page_size),
                'auto_refresh_rate' => set_value('auto_refresh_rate', $row->auto_refresh_rate),
                'default_signature_type' => set_value('default_signature_type', $row->default_signature_type),
                'default_paper_size' => set_value('default_paper_size', $row->default_paper_size),
                'extra' => set_value('extra', $row->extra),
                'permissions' => set_value('permissions', $row->permissions),
                'updated' => set_value('updated', $row->updated),
                'create_customer' => $create_customer,
                'edit_customer' => $edit_customer,
                'delete_customer' => $delete_customer,
                'manage_customer' => $manage_customer,
                'upload_customer' => $upload_customer,
                'upload_serial' => $upload_serial,
                'create_org' => $create_org,
                'edit_org' => $edit_org,
                'delete_org' => $delete_org,
                'view_org' => $view_org,
                'create_staff' => $create_staff,
                'edit_staff' => $edit_staff,
                'delete_staff' => $delete_staff,
                'manage_staff' => $manage_staff,
                'list_staff' => $list_staff,
                'create_dept' => $create_dept,
                'edit_dept' => $edit_dept,
                'delete_dept' => $delete_dept,
                'manage_dept' => $manage_dept,
                'view_dept' => $view_dept,
                'arr_ext_dept_role' => $arr_ext_dept_role,
                
            );
        //    $this->load->view('templates/header', $data);
        //    $this->load->view('staff/staff_form', $data);
		  $this->_tpl('staff/staff_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('staff'));
        }
    }

    public function update_action() {
        $this->_upd_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('staff_id', TRUE));
        } else {
            $input_email = $this->input->post('email', TRUE);
            $input_username = $this->input->post('username', TRUE);
            $input_password = $this->input->post('password', TRUE);
            $input_banned = $this->input->post('islocked', TRUE);

            $pass = FALSE;

            if ($input_password != "") {
                $pass = $input_password;
            }

            $this->arbac->update_user($this->input->post('staff_id', TRUE), $input_email, $pass, $input_username);

            $data = array(
                'org_id' => $this->input->post('org_id', TRUE),
                'dept_id' => $this->input->post('dept_id', TRUE),
                'role_id' => $this->input->post('role_id', TRUE),
                'manager_id' => $this->input->post('manager_id', TRUE),
                'designation_id' => $this->input->post('designation_id', TRUE),
                'firstname' => $this->input->post('firstname', TRUE),
                'lastname' => $this->input->post('lastname', TRUE),
                'phone' => $this->input->post('phone', TRUE),
                'phone_ext' => $this->input->post('phone_ext', TRUE),
                'mobile' => $this->input->post('mobile', TRUE),
                'signature' => $this->input->post('signature', TRUE),
                'lang' => $this->input->post('lang', TRUE),
                'timezone' => $this->input->post('timezone', TRUE),
                'locale' => $this->input->post('locale', TRUE),
                'notes' => $this->input->post('notes', TRUE),
                'sms_notification' => $this->input->post('sms_notification', TRUE),
                'isadmin' => $this->input->post('isadmin', TRUE),
                'isvisible' => $this->input->post('isvisible', TRUE),
                'onvacation' => $this->input->post('onvacation', TRUE),
                'assigned_only' => $this->input->post('assigned_only', TRUE),
                'show_assigned_tickets' => $this->input->post('show_assigned_tickets', TRUE),
                'change_passwd' => $this->input->post('change_passwd', TRUE),
                'max_page_size' => $this->input->post('max_page_size', TRUE),
                'auto_refresh_rate' => $this->input->post('auto_refresh_rate', TRUE),
                'default_signature_type' => $this->input->post('default_signature_type', TRUE),
                'default_paper_size' => $this->input->post('default_paper_size', TRUE),
                'extra' => $this->input->post('extra', TRUE),
                'permissions' => $this->input->post('permissions', TRUE),
                'updated' => date('Y-m-d H:i:s'),
            );

            $this->Staff_model->update_by_staff_id($this->input->post('staff_id', TRUE), $data);
            
            $staff_id = $this->input->post('staff_id', TRUE);
            
            $permission = array();
            
            //Update permissions
            //Delete existing permissions
            $this->Arbac_perm_to_user_model->delete($staff_id);
            
            //insert in to arbac_perm_to_user table
            if($this->input->post('create_customer', TRUE) == 1) {
                $permission[] = array('perm_id' => 45, 'user_id' => $staff_id);
            }
            if ($this->input->post('edit_customer', TRUE) == 1) {
                $permission[] = array('perm_id' => 46, 'user_id' => $staff_id);
            }
            if ($this->input->post('delete_customer', TRUE) == 1) {
                $permission[] = array('perm_id' => 47, 'user_id' => $staff_id); //
            }
            if ($this->input->post('manage_customer', TRUE) == 1) {
                $permission[] = array('perm_id' => 48, 'user_id' => $staff_id);
            }
            if ($this->input->post('upload_customer', TRUE) == 1) {
                $permission[] = array('perm_id' => 44, 'user_id' => $staff_id); //
            }
            if ($this->input->post('upload_serial', TRUE) == 1) {
                $permission[] = array('perm_id' => 33, 'user_id' => $staff_id);
            }

            if ($this->input->post('create_org', TRUE) == 1) {
                $permission[] = array('perm_id' => 18, 'user_id' => $staff_id);
            }
            if ($this->input->post('edit_org', TRUE) == 1) {
                $permission[] = array('perm_id' => 19, 'user_id' => $staff_id);
            }
            if ($this->input->post('delete_org', TRUE) == 1) {
                $permission[] = array('perm_id' => 20, 'user_id' => $staff_id); //
            }
            if ($this->input->post('view_org', TRUE) == 1) {
                $permission[] = array('perm_id' => 21, 'user_id' => $staff_id);
            }

            if ($this->input->post('create_staff', TRUE) == 1) {
                $permission[] = array('perm_id' => 26, 'user_id' => $staff_id);
            }
            if ($this->input->post('manage_staff', TRUE) == 1) {
                $permission[] = array('perm_id' => 27, 'user_id' => $staff_id);
            }
            if ($this->input->post('edit_staff', TRUE) == 1) {
                $permission[] = array('perm_id' => 28, 'user_id' => $staff_id);
            }
            if ($this->input->post('list_staff', TRUE) == 1) {
                $permission[] = array('perm_id' => 30, 'user_id' => $staff_id);
            }
            if ($this->input->post('delete_staff', TRUE) == 1) {
                $permission[] = array('perm_id' => 32, 'user_id' => $staff_id); //
            }

            if ($this->input->post('create_dept', TRUE) == 1) {
                $permission[] = array('perm_id' => 34, 'user_id' => $staff_id);
            }
            if ($this->input->post('edit_dept', TRUE) == 1) {
                $permission[] = array('perm_id' => 35, 'user_id' => $staff_id);
            }
            if ($this->input->post('delete_dept', TRUE) == 1) {
                $permission[] = array('perm_id' => 36, 'user_id' => $staff_id);
            }
            if ($this->input->post('manage_dept', TRUE) == 1) {
                $permission[] = array('perm_id' => 40, 'user_id' => $staff_id);
            }
            if ($this->input->post('view_dept', TRUE) == 1) {
                $permission[] = array('perm_id' => 41, 'user_id' => $staff_id); //
            }

            if (count($permission) > 0) {
                $this->Arbac_perm_to_user_model->insert_batch($permission);
            }
            
            //Insert in to Staff_dept_access table
            $extended_dept_role = $this->input->post('add_data', TRUE);
            $extended_dept = $this->input->post('add_dept_id', TRUE);
            $extended_role = $this->input->post('add_role_id', TRUE);

            $staff_dept_access = array();
            
            //Delete existing access
            $this->Staff_dept_access_model->delete($staff_id);

            foreach ($extended_dept_role as $key => $dept_role_value) {
                $staff_dept_access[] = array('staff_id' => $staff_id,'dept_id' => $extended_dept[$key],'role_id' => $extended_role[$key]);
            }

            if(count($staff_dept_access) > 0) {
                $this->Staff_dept_access_model->insert_batch($staff_dept_access);
            }



            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('staff'));
        }
    }

    public function delete($id) {
        if (!$this->arbac->is_allowed('delete_staff', $this->session->userdata('id'))) {
            $this->session->set_flashdata('error', 'Permission Denied');
            redirect(site_url('staff'));
        }
        $row = $this->Staff_model->get_by_id($id);

        if ($id == 1) {
            $this->session->set_flashdata('error', 'User Admin cannot delete');
            redirect(site_url('staff'));
        }

        if ($row) {
            $this->Staff_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('staff'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('staff'));
        }
    }
    public function hdn_reset_password()
    {
        $pass = $this->input->post('upd_passwd', TRUE);
        $input_email = FALSE;
        $input_username = FALSE;
        $this->arbac->update_user($this->input->post('hdn_staff_id', TRUE), $input_email, $pass, $input_username);
    }
    

    public function _rules() {
        $this->form_validation->set_rules('username', 'username', 'trim|required');
        $this->form_validation->set_rules('email', 'email', 'trim|required');
        $this->form_validation->set_rules('firstname', 'firstname', 'trim|required');
        $this->form_validation->set_rules('lastname', 'lastname', 'trim|required');
        $this->form_validation->set_rules('passwd', 'password', 'trim|required');
        $this->form_validation->set_rules('confirm_passwd', 'confirm password', 'trim|required|matches[passwd]');
        //$this->form_validation->set_rules('id', 'id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
    
    public function _upd_rules() {
        $this->form_validation->set_rules('username', 'username', 'trim|required');
        $this->form_validation->set_rules('email', 'email', 'trim|required');
        $this->form_validation->set_rules('firstname', 'firstname', 'trim|required');
        $this->form_validation->set_rules('lastname', 'lastname', 'trim|required');
        //$this->form_validation->set_rules('passwd', 'password', 'trim|required');
        //$this->form_validation->set_rules('confirm_passwd', 'confirm password', 'trim|required|matches[passwd]');
        //$this->form_validation->set_rules('id', 'id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function email_check() {
        // allow only Ajax request    
        if ($this->input->is_ajax_request()) {
            // grab the email value from the post variable.
            $entered_email = $this->input->post('email');
            $existing_user_email = $this->input->post('existing_email');

            $status = $this->Staff_model->check_unique_email($entered_email, $existing_user_email);
            if ($status == 'EXIST') {
                // set the json object as output                 
                $this->output->set_content_type('application/json')->set_output(json_encode(array('message' => 'The email is already taken, choose another one')));
            } else {
                $this->output->set_content_type('application/json')->set_output(json_encode(array('message' => '')));
            }
        }
    }

    public function username_check() {
        // allow only Ajax request    
        if ($this->input->is_ajax_request()) {

            // grab the username value from the post variable.
            $entered_username = $this->input->post('username');
            $existing_user_name = $this->input->post('existing_username');

            $status = $this->Staff_model->check_unique_username($entered_username, $existing_user_name);
            if ($status == 'EXIST') {
                // set the json object as output                 
                $this->output->set_content_type('application/json')->set_output(json_encode(array('message' => 'Username is already taken, choose another one')));
            } else {
                $this->output->set_content_type('application/json')->set_output(json_encode(array('message' => '')));
            }
        }
    }

    public function user_name_check() {
        // allow only Ajax request    
        if ($this->input->is_ajax_request()) {
            // grab the email value from the post variable.
            $username = $this->input->post('user_name');
            // check in database - table name : arbac_users  , Field name in the table : username
            if (!$this->form_validation->is_unique($username, 'arbac_users.username')) {
                // set the json object as output                 
                $this->output->set_content_type('application/json')->set_output(json_encode(array('message' => 'username is already taken, choose another one')));
            }
        }
    }

    function create_staff() {

        $staff = $this->arbac->create_user('raghu@dqserv.com', 'admin', 'raghu');

        if ($staff) {
            
        } else {
            echo $staff . 'failed';
        }
    }

    function set_role() {
        $this->arbac->set_primary_role(10, 2);
    }

    function get_primary_dept() {
        $id = $this->session->userdata('id');
        $row = $this->Staff_model->get_primary_dept($id);
        if ($row) {
            $data = array(
                'dept_name' => $row->dept_name,
                'staff_name' => $row->staff_name,
                'staff_email' => $row->staff_email,
                'staff_role' => $row->primary_role,
                'staff_manager' => $row->reporting_manager,
                'staff_desgn' => $row->designation,
                'org_name' => $row->org_name,
            );
        } else {

            $data = array(
                'dept_name' => 'Default',
            );
        }

        $this->load->view('templates/header', $data);
        $this->load->view('staff/staff_test', $data);
    }

    function get_staff_primary_role() {
        $id = $this->session->userdata('id');
        $row = $this->Staff_model->get_staff_primary_role($id);
        if ($row) {
            $roles = array(
                'role_id' => $row->role_id,
            );
        }

        return $roles;
    }

}

/* End of file Staff.php */
