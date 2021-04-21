<?php

/* Location: ./application/controllers/Leads.php */
/* Derived from Harviacode  */
/* Modified by Vivek Raghunathan 2017-04-04 15:27:58 */
/* Email : vivekra@dqserv.com */
/* http://dqserv.com */



if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Leads extends APP_Controller
{
    function __construct()
    {
        parent::__construct();
    //    $this->load->model('user_mobile_model');
    //    $this->load->model('user_mail_model');
        $this->load->model('Leads_model');
   //     $this->load->model('Tasks_model');
   //     $this->load->model('Source_model');
        $this->load->library('form_validation');
        $this->load->library('Arbac');
        $this->load->model('Staff_model');
  //      $this->load->model('City_model');
  //      $this->load->model('Status_model');
  //      $this->load->model('Stages_model');
  //      $this->load->model('Customer_type_model');
  //      $this->load->model('Opportunities_model');
  //      $this->load->model('Customer_model');
  //      $this->load->model('Imap_connect_model');
   //     $this->load->model('Email_leads_model');
   //     $this->load->model('Email_template_model');
    //    $this->load->model('Followup_thread_model');
    //    $this->load->model('Leads_revise_logs_model');        
        if(!$this->arbac->is_loggedin()){ redirect('scp/auth_login'); }
    }

    public function index()
    {
        $leads = $this->Leads_model->get_lead_list();
        $data = array(
            'leads_data'    => $leads,
            'title'         => 'TRAMS::SCP::Leads',
        );
        //$this->_tpl('leads/leads_list', $data);
		 $this->load->view('leads/leads_list', $data);
    }
  /*  
    public function converted_leads()
    {
        $leads = $this->Leads_model->get_convlead_list();
        $data = array(
            'leads_data'    => $leads,
            'title'         => 'TRAMS::SCP::Leads',
        );
        $this->_tpl('leads/conv_leads_list', $data);		
    }
    
    public function lost_leads()
    {
        $leads = $this->Leads_model->get_lost_list();
        $data = array(
            'leads_data'    => $leads,
            'title'         => 'TRAMS::SCP::Leads',
        );
        $this->_tpl('leads/lost_leads_list', $data);		
    }

    public function read($id) 
    {
        $row = $this->Leads_model->get_by_id($id);
        if ($row) {           
            
            $logged_in      =   $this->session->userdata('id');
            $logged_info    =   $this->Staff_model->get_by_id($logged_in);
            if($row->cur_viewed_user != $logged_info->firstname.' '.$logged_info->lastname)
            {
                $current        =   array(
                    'last_viewed_date'      => $row->cur_viewed_date,
                    'last_viewed_user'      => $row->cur_viewed_user,
                    'cur_viewed_date'       => date('Y-m-d H:i:s'),
                    'cur_viewed_user'       => $logged_info->firstname.' '.$logged_info->lastname
                );
                $this->Leads_model->update($id, $current);
            }
            
            
            $row            =   $this->Leads_model->get_by_id($id);
            $int_level      =   $this->Status_model->get_all_status_by_type('interest_level');
            $response_list  =   $this->Status_model->get_all_status_by_type('customer_response');
            $fup_action_list=   $this->Status_model->get_all_status_by_type('followup_action');
            $fup_mode_list  =   $this->Status_model->get_all_status_by_type('followup_mode'); 
            $task_status    =   $this->Status_model->get_all_status_by_type('task_status');            
            
            $fup_list       =   $this->Followup_thread_model->get_all_by('leads',$id);
            $tasks_list     =   $this->Tasks_model->get_all_by_lead(27,$id);
            $note_list      =   $this->Tasks_model->get_all_by_lead(28,$id);
            $visit_list     =   $this->Tasks_model->get_all_by_lead(29,$id);
            $task_type      =   $this->Status_model->get_all_status_by_type('task_type');
            $task_category  =   $this->Status_model->get_all_status_by_type('task_category');
            $staff_data     =   $this->Staff_model->get_all_staff();
            $src_info       =   $this->Source_model->get_by_id($row->source_id);
            $staff_info     =   $this->Staff_model->get_by_id($row->staff_id);
            $city_info      =   $this->City_model->get_by_id($row->city_id);
            $status_info    =   $this->Status_model->get_by_id($row->status);
            $lost_info      =   $this->Status_model->get_by_id($row->lost_reason);
            $enquiry_type_info = $this->Status_model->get_by_id($row->lead_type);
            $cust_type_data =   $this->Customer_type_model->get_by_id($row->cust_type);
            $stages_data    =   $this->Stages_model->get_all_stages();
            
            $history        =   $this->Leads_revise_logs_model->get_lead_history($id);
            $data = array(
                'title'         => 'TRAMS::SCP::Leads',
		'lead_id'       => $row->lead_id,
		'source'        => $src_info->source_details,
		'assigned'      => $staff_info->firstname.' '.$staff_info->lastname,
                'cust_type'     => $cust_type_data->name,
                'cust_type_id'  => $row->cust_type,
                'comp_name'     => $row->company_name,
		'first_name'    => $row->first_name,
		'middle_name'   => $row->middle_name,
		'last_name'     => $row->last_name,
		'email'         => $row->email,
		'mobile'        => $row->mobile,
		'alt_mobile'    => $row->alt_mobile,
                'address_1'     => $row->address_1,
                'address_2'     => $row->address_2,
                'zipcode'       => $row->zipcode,
		'ref_name'      => $row->ref_name,
		'ref_mobile'    => $row->ref_mobile,
		'comments'      => $row->comments,
                'lost_reason'   => $row->lost_reason,
                'lost_status'   => ((!empty($lost_info))?$lost_info->status:''),
                'lost_remark'   => $row->lost_remarks,
                'enquiry_type'  => $row->lead_type,
                'enquiry_status'=> $enquiry_type_info->status,
                'enquiry_note'  => $row->lead_type_note,
		'city'          => $city_info->city_name,
                'last_viewed_user'       => $row->last_viewed_user,
                'last_viewed_date'       => $row->last_viewed_date,
		'status'        => $status_info->status,
                'status_id'     => $row->status,
                'stages_data'   => $stages_data,
		'created'       => $row->created,
		'updated'       => $row->updated,
                'task_type'     => $task_type,
                'task_category' => $task_category,
                'staff_data'    => $staff_data,
                'tasks_list'    => $tasks_list,
                'int_level'     => $int_level,
                'response_list' => $response_list,
                'fup_action_list'=>$fup_action_list,
                'fup_mode_list' => $fup_mode_list,
                'fup_list'      => $fup_list,
                'visit_list'    => $visit_list,
                'task_status'   => $task_status,
                'note_list'     => $note_list,
                'history'       => $history
	    );
            $this->_tpl('leads/leads_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('leads'));
        }
    }

    public function create() 
    {        
        $source         = $this->Source_model->get_all();        
        $staff_data     = $this->Staff_model->get_all_staff();
        $city_data      = $this->City_model->get_all_city();
        //$status_data    = $this->Status_model->get_all_status();
        $status_data    = $this->Status_model->get_all_status_by_type('lead');
        $lost_status    = $this->Status_model->get_all_status_by_type('lost_reason');
        $enquiry_status = $this->Status_model->get_all_status_by_type('enquiry');
        $cust_type_data = $this->Customer_type_model->get_all();
        $logged_in      = $this->session->userdata('id');
        $data       = array(
            'button'        => 'Create',
            'action'        => site_url('leads/create_action'),
            'title'         => 'TRAMS::SCP::Create Leads',
	    'lead_id'       => set_value('lead_id'),
	    'source_id'     => set_value('source_id'),
	    'staff_id'      => $logged_in,
	    'first_name'    => set_value('first_name'),
	    'middle_name'   => set_value('middle_name'),
	    'last_name'     => set_value('last_name'),
	    'email'         => set_value('email'),
	    'mobile'        => set_value('mobile'),
	    'alt_mobile'    => set_value('alt_mobile'),
	    'ref_name'      => set_value('ref_name'),
	    'ref_mobile'    => set_value('ref_mobile'),
	    'comments'      => set_value('comments'),
	    'city_id'       => set_value('city_id'),
            'cust_type'     => set_value('cust_type'),
            'address_1'     => set_value('address_1'),
            'address_2'     => set_value('address_2'),
            'zipcode'       => set_value('zipcode'),
            'lost_reason'   => set_value('lost_reason'),
            'lost_remark'   => set_value('lost_remark'),
            'vendor_name'   => set_value('vendor_name'),
            'enquiry_type'  => set_value('enquiry_type'),
            'enquiry_note'  => set_value('enquiry_note'),
            'software_vendor'  => set_value('software_vendor'),
	    //'active'        => set_value('active'),
	    'status'        => 3, // New
            'source_data'   => $source,
            'staff_data'    => $staff_data,
            'city_data'     => $city_data,
            'status_data'   => $status_data,
            'lost_status'   => $lost_status,
            'enquiry_status'=> $enquiry_status,            
            'cust_types'    => $cust_type_data,
	    'created'       => set_value('created'),
	    'updated'       => set_value('updated'),
	);
        $this->_tpl('leads/leads_form', $data);	
		
    }
    
    public function create_action() 
    {
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            
            $logged_in                  =   $this->session->userdata('id');
            $data = array(		
		'source_id'             => $this->input->post('source_id',TRUE),
		'assigned_staff_id'     => $this->input->post('staff_id',TRUE),
		'first_name'            => $this->input->post('first_name',TRUE),
		'middle_name'           => $this->input->post('middle_name',TRUE),
		'last_name'             => $this->input->post('last_name',TRUE),
		'email'                 => $this->input->post('email',TRUE),
		'mobile'                => $this->input->post('mobile',TRUE),
		'alt_mobile'            => $this->input->post('alt_mobile',TRUE),
		'ref_name'              => $this->input->post('ref_name',TRUE),
		'ref_mobile'            => $this->input->post('ref_mobile',TRUE),
		'comments'              => $this->input->post('comments',TRUE),
		'city_id'               => $this->input->post('city_id',TRUE),
                'cust_type'             => $this->input->post('cust_type',TRUE),
                'company_name'          => $this->input->post('comp_name',TRUE),
                'address_1'             => $this->input->post('address_1',TRUE),
                'address_2'             => $this->input->post('address_2',TRUE),
                'zipcode'               => $this->input->post('zipcode',TRUE),
                'lost_reason'           => $this->input->post('lost_reason',TRUE),
                'lost_remarks'          => $this->input->post('lost_remark',TRUE),
                'existing_vendor_name'  => $this->input->post('vendor_name',TRUE),
                'existing_software_vendor'  => $this->input->post('software_vendor',TRUE),
                'lead_type'             => $this->input->post('enquiry_type',TRUE),
                'lead_type_note'        => $this->input->post('enquiry_note',TRUE),
                'staff_id'              => $logged_in,
		//'active' => $this->input->post('active',TRUE),
		'status'                => $this->input->post('status',TRUE),
		'created'               => date('Y-m-d H:i:s'),
		'updated'               => date('Y-m-d H:i:s'),
	    );
            $lead_id = $this->Leads_model->insert($data);
            /*
             // user_mobile table
            $usr_mobile     =   $this->input->post('usr_mobile',TRUE);
            if($usr_mobile == '')
            {
                echo 'here';
                $usr_mobile_insert  = array('mobile_no' => $this->input->post('mobile',TRUE));
                $this->user_mobile_model->insert($usr_mobile_insert);
            }
            
            // user_email table
            $usr_email     =   $this->input->post('usr_email',TRUE);
            if($usr_email == '')
            {
                $usr_mail_insert  = array('address' => $this->input->post('email',TRUE));
                $this->user_mail_model->insert($usr_mail_insert);
            }
            */
            // send email as lead assigned 
        /*    $assigned_info  =   $this->Staff_model->get_by_id($this->input->post('staff_id',TRUE));
            $email          =   $assigned_info->staff_email;   
            $staffname      =   $assigned_info->staff_name;
            $template       =   $this->Email_template_model->get_by_code('lead.assigned');
            $subject        =   $template->subject;                      
            $body           =   $template->body;
            
            $variables['assignee.name.first']   = $staffname;
            $variables['lead.number']           = $lead_id;
            $variables['lead.name']             = $this->input->post('first_name',TRUE).' '.$this->input->post('last_name',TRUE);
            $variables['lead.mobile']           = $this->input->post('mobile',TRUE);
            $variables['lead.subject']          = $this->input->post('comments',TRUE);
            $variables['comments']              = $this->input->post('comments',TRUE);
            foreach($variables as $key => $value)
            {
                $body = str_replace('%{'.$key.'}', $value, $body);
            }
            $this->send_mail($email,$subject,$body);
            //send email as lead assigned  ENDS
            
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('leads'));
        }
    }
    
    public function update($id) 
    {
        $row            = $this->Leads_model->get_by_id($id);  
        $source         = $this->Source_model->get_all();        
        $staff_data     = $this->Staff_model->get_all_staff();
        $city_data      = $this->City_model->get_all_city();
        //$status_data    = $this->Status_model->get_all_status();
        $status_data    = $this->Status_model->get_all_status_by_type('lead');
        $lost_status    = $this->Status_model->get_all_status_by_type('lost_reason');
        $enquiry_status = $this->Status_model->get_all_status_by_type('enquiry');
        $cust_type_data = $this->Customer_type_model->get_all();        
        if ($row) {
            $data = array(
                'button'        => 'Update',
                'action'        => site_url('leads/update_action'),
                'title'         => 'TRAMS::SCP::Update Leads',
		'lead_id'       => set_value('lead_id', $row->lead_id),
		'source_id'     => set_value('source_id', $row->source_id),
		'staff_id'      => set_value('staff_id', $row->assigned_staff_id),
		'first_name'    => set_value('first_name', $row->first_name),
		'middle_name'   => set_value('middle_name', $row->middle_name),
		'last_name'     => set_value('last_name', $row->last_name),
		'email'         => set_value('email', $row->email),
		'mobile'        => set_value('mobile', $row->mobile),
		'alt_mobile'    => set_value('alt_mobile', $row->alt_mobile),
		'ref_name'      => set_value('ref_name', $row->ref_name),
		'ref_mobile'    => set_value('ref_mobile', $row->ref_mobile),
		'comments'      => set_value('comments', $row->comments),
		'city_id'       => set_value('city_id', $row->city_id),
                'cust_type'     => set_value('cust_type', $row->cust_type),
                'comp_name'     => set_value('comp_name', $row->company_name),
                'address_1'     => set_value('address_1', $row->address_1),
                'address_2'     => set_value('address_2', $row->address_1),
                'zipcode'       => set_value('zipcode', $row->zipcode),
		'status'        => set_value('status', $row->status),
                'lost_reason'   => set_value('lost_reason',$row->lost_reason),
                'lost_remark'   => set_value('lost_remark',$row->lost_remarks),
                'vendor_name'   => set_value('vendor_name',$row->existing_vendor_name),
                'software_vendor'   => set_value('software_vendor',$row->existing_software_vendor),
                'enquiry_type'  => set_value('enquiry_type', $row->lead_type),
		'enquiry_note'  => set_value('enquiry_note', $row->lead_type_note),
		'source_data'   => $source,
                'staff_data'    => $staff_data,
                'city_data'     => $city_data,
                'cust_types'    => $cust_type_data,
                'status_data'   => $status_data,
                'enquiry_status'=> $enquiry_status,
                'lost_status'   => $lost_status
	    );
            $this->_tpl('leads/leads_edit', $data);
		
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('leads'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('', TRUE));
        } else {
            $lead_id                    = $this->input->post('lead_id', TRUE);
            $row                        = $this->Leads_model->get_by_id($lead_id);
            // Keep history
            $history = array(
                'lead_id'                   => $row->lead_id,
		'source_id'                 => $row->source_id,
		'assigned_staff_id'         => $row->assigned_staff_id,
		'first_name'                => $row->first_name,
		'middle_name'               => $row->middle_name,
		'last_name'                 => $row->last_name,
		'email'                     => $row->email,
		'mobile'                    => $row->mobile,
		'alt_mobile'                => $row->alt_mobile,
		'ref_name'                  => $row->ref_name,
		'ref_mobile'                => $row->ref_mobile,
                'cust_type'                 => $row->cust_type,
                'company_name'              => $row->company_name,
                'address_1'                 => $row->address_1,
                'address_2'                 => $row->address_2,
                'zipcode'                   => $row->zipcode,
		'comments'                  => $row->comments,
		'city_id'                   => $row->city_id,
                'lost_reason'               => $row->lost_reason,
                'lost_remarks'              => $row->lost_remarks,
                'existing_vendor_name'      => $row->existing_vendor_name,
                'existing_software_vendor'  => $row->existing_software_vendor,
                'lead_type'                 => $row->lead_type,
		'lead_type_note'            => $row->lead_type_note,
                'staff_id'                  => $row->staff_id,
		'status'                    => $row->status,
                'created'                   => $row->created,
		'updated'                   => $row->updated,
                'revised_dts'               => date('Y-m-d H:i:s')
	    );           
            $this->Leads_revise_logs_model->insert($history);
            
            
            $assigned_staff_old         = $row->assigned_staff_id;
            $assigned_staff_new         = $this->input->post('staff_id',TRUE);
            
            $logged_in                  =  $this->session->userdata('id');
            $data = array(
		'source_id'             => $this->input->post('source_id',TRUE),
		'assigned_staff_id'     => $this->input->post('staff_id',TRUE),
		'first_name'            => $this->input->post('first_name',TRUE),
		'middle_name'           => $this->input->post('middle_name',TRUE),
		'last_name'             => $this->input->post('last_name',TRUE),
		'email'                 => $this->input->post('email',TRUE),
		'mobile'                => $this->input->post('mobile',TRUE),
		'alt_mobile'            => $this->input->post('alt_mobile',TRUE),
		'ref_name'              => $this->input->post('ref_name',TRUE),
		'ref_mobile'            => $this->input->post('ref_mobile',TRUE),
                'cust_type'             => $this->input->post('cust_type',TRUE),
                'company_name'          => $this->input->post('comp_name',TRUE),
                'address_1'             => $this->input->post('address_1',TRUE),
                'address_2'             => $this->input->post('address_2',TRUE),
                'zipcode'               => $this->input->post('zipcode',TRUE),
		'comments'              => $this->input->post('comments',TRUE),
		'city_id'               => $this->input->post('city_id',TRUE),
                'lost_reason'           => $this->input->post('lost_reason',TRUE),
                'lost_remarks'          => $this->input->post('lost_remark',TRUE),
                'existing_vendor_name'     => $this->input->post('vendor_name',TRUE),
                'existing_software_vendor' => $this->input->post('software_vendor',TRUE),
                'lead_type'             => $this->input->post('enquiry_type',TRUE),
		'lead_type_note'        => $this->input->post('enquiry_note',TRUE),
                'staff_id'              => $logged_in,
		'status'                => $this->input->post('status',TRUE),		
		'updated'               => date('Y-m-d H:i:s')
	    );
            $this->Leads_model->update($lead_id, $data);
            
            if($this->input->post('status',TRUE) == 6)
            {
                // send email as lead lost 
                $assigned_info  =   $this->Staff_model->get_by_id($assigned_staff_new);
                $email          =   $assigned_info->staff_email;   
                $staffname      =   $assigned_info->staff_name;
                $template       =   $this->Email_template_model->get_by_code('lead.lost');
                $subject        =   $template->subject;                      
                $body           =   $template->body;

                $variables['assignee.name.first']   = $staffname;
                $variables['lead.number']           = $lead_id;
                $variables['lead.name']             = $this->input->post('first_name',TRUE).' '.$this->input->post('last_name',TRUE);
                $variables['lead.mobile']           = $this->input->post('mobile',TRUE);
                $variables['lead.subject']          = $this->input->post('comments',TRUE);
                $variables['comments']              = $this->input->post('comments',TRUE);
                foreach($variables as $key => $value)
                {
                    $body = str_replace('%{'.$key.'}', $value, $body);
                }
                $this->send_mail($email,$subject,$body);
                //send email as lead lost  ENDS
            }
            
            if($assigned_staff_old != $assigned_staff_new)
            {
                // send email as re-lead assigned 
                $assigned_info  =   $this->Staff_model->get_by_id($assigned_staff_new);
                $email          =   $assigned_info->staff_email;   
                $staffname      =   $assigned_info->staff_name;
                $template       =   $this->Email_template_model->get_by_code('lead.reassigned');
                $subject        =   $template->subject;                      
                $body           =   $template->body;

                $variables['assignee.name.first']   = $staffname;
                $variables['lead.number']           = $lead_id;
                $variables['lead.name']             = $this->input->post('first_name',TRUE).' '.$this->input->post('last_name',TRUE);
                $variables['lead.mobile']           = $this->input->post('mobile',TRUE);
                $variables['lead.subject']          = $this->input->post('comments',TRUE);
                $variables['comments']              = $this->input->post('comments',TRUE);
                foreach($variables as $key => $value)
                {
                    $body = str_replace('%{'.$key.'}', $value, $body);
                }
                $this->send_mail($email,$subject,$body);
                //send email as lead re-assigned  ENDS
            }            
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('leads'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Leads_model->get_by_id($id);

        if ($row) {
            $this->Leads_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('leads'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('leads'));
        }
    }
    
    public function add_task() 
    {        
        $logged_in                  =   $this->session->userdata('id'); 
        $lead_id                    =   $this->input->post('task_lead_id',TRUE);
        $task_data = array(
                        'task_module'       => 'leads',
                        'module_id'         => $lead_id,
                        'lead_id'           => $lead_id,
                        'staff_id'          => $logged_in,                    
                        'assigned_to'       => $this->input->post('task_staff_id',TRUE),
                        'status_id'         => 80,
                        'task_type'         => 27,
                        'task_category_id'  => $this->input->post('task_category',TRUE),
                        'task_description'  => $this->input->post('task_details',TRUE),
                        'remind_time'       => date("Y-m-d", strtotime($this->input->post('due_date',TRUE))),
                        'visit_time'        => $this->input->post('due_time',TRUE),
                        'created'           => date('Y-m-d H:i:s'),
                        'updated'           => date('Y-m-d H:i:s'),
                    );
        $this->Tasks_model->insert($task_data);
        $this->session->set_flashdata('task_message', 'Task was added successfully');
        redirect(site_url('leads/read/'.$lead_id.'/#activities'));
    }
    
    public function add_followup() 
    {        
        $logged_in                  =   $this->session->userdata('id'); 
        $lead_id                    =   $this->input->post('fup_lead_id',TRUE);
        $fup_date                   =   $this->input->post('next_fup_date',TRUE);
        $fup_time                   =   $this->input->post('next_fup_time',TRUE);
        $fup_data = array(
                        'followup_type_id'      => $lead_id,
                        'followup_type'         => 'leads',
                        'staff_id'              => $logged_in, 
                        'status'                => 80,
                        'interest_level'        => $this->input->post('interest_level',TRUE),
                        'customer_response'     => $this->input->post('cust_response',TRUE),
                        'followup_action'       => $this->input->post('fup_action',TRUE),
                        'followup_mode'         => $this->input->post('fup_mode',TRUE),
                        'followup_comments'     => $this->input->post('followup_details',TRUE),
                        'followup_date'         => date("Y-m-d H:i:s", strtotime($fup_date.' '.$fup_time)),
                        'created'               => date('Y-m-d H:i:s'),
                        'updated'               => date('Y-m-d H:i:s'),
                    );
        $this->Followup_thread_model->insert($fup_data);
        $this->session->set_flashdata('fup_message', 'Follow Up was added successfully');
        redirect(site_url('leads/read/'.$lead_id.'/#activities'));
    }
    
    public function add_visit() 
    {
        
        $logged_in                  =   $this->session->userdata('id'); 
        $lead_id                    =   $this->input->post('visit_lead_id',TRUE);
        $visit_data = array(
                        'task_module'       => 'leads',
                        'module_id'         => $lead_id,
                        'lead_id'           => $lead_id,
                        'staff_id'          => $logged_in, 
                        'status_id'         => 80,
                        'task_type'         => 29,   
                        'task_category_id'  => $this->input->post('visit_purpose',TRUE),
                        'task_description'  => $this->input->post('visit_details',TRUE),
                        'visit_time'        => $this->input->post('visit_time',TRUE),
                        'remind_time'       => date("Y-m-d", strtotime($this->input->post('visit_date',TRUE))),
                        'created'           => date('Y-m-d H:i:s'),
                        'updated'           => date('Y-m-d H:i:s'),
                    );
        $this->Tasks_model->insert($visit_data);
        $this->session->set_flashdata('visit_message', 'Visit Details was added successfully');
        redirect(site_url('leads/read/'.$lead_id.'/#activities'));
    }
    
    public function add_note() 
    {
        
        $logged_in                  =   $this->session->userdata('id'); 
        $lead_id                    =   $this->input->post('note_lead_id',TRUE);
        $note_data = array(
                        'task_module'       => 'leads',
                        'module_id'         => $lead_id,
                        'lead_id'           => $lead_id,
                        'staff_id'          => $logged_in, 
                        'status_id'         => 80,
                        'task_type'         => 28,
                        'task_description'  => $this->input->post('note_details',TRUE),
                        'remind_time'       => date("Y-m-d", strtotime($this->input->post('due_date',TRUE))),
                        'created'           => date('Y-m-d H:i:s'),
                        'updated'           => date('Y-m-d H:i:s'),
                    );
        $this->Tasks_model->insert($note_data);
        $this->session->set_flashdata('task_message', 'Note was added successfully');
        redirect(site_url('leads/read/'.$lead_id.'/#activities'));
    }
    
    public function update_visit() 
    {  
        $logged_in                  =   $this->session->userdata('id'); 
        $upd_visit_id               =   $this->input->post('upd_visit_id',TRUE);
        $lead_id                    =   $this->input->post('upd_visit_lead_id',TRUE);
        $visit_data = array(                          
                        'comments'              => $this->input->post('upd_visit_remarks',TRUE),
                        'status_id'             => $this->input->post('upd_visit_status',TRUE),
                        'completed_datetime'    => date("Y-m-d H:i:s", strtotime($this->input->post('upd_status_date',TRUE).' '.$this->input->post('upd_status_time',TRUE))),                        
                        'updated'               => date('Y-m-d H:i:s'),
                    );
        $this->Tasks_model->update($upd_visit_id,$visit_data);       
        $this->session->set_flashdata('visit_message', 'Visit Details was updated successfully');
        redirect(site_url('leads/read/'.$lead_id.'/#activities'));
    }
    
    public function convert_opportunity() 
    {
            $logged_in                  =   $this->session->userdata('id');
            
            // update lead status to converted to opportunity
            $upd_data = array(
                'status' => 5,
            );
            $this->Leads_model->update($this->input->post('lead_id',TRUE),$upd_data);
            // Get lead information
            $lead_id = $this->input->post('lead_id',TRUE);
            $row = $this->Leads_model->get_by_id($lead_id);
            
            $assigned_staff        = $row->assigned_staff_id;
            // Send email as lead converted
            $assigned_info  =   $this->Staff_model->get_by_id($assigned_staff);
            $email          =   $assigned_info->staff_email;   
            $staffname      =   $assigned_info->staff_name;
            $template       =   $this->Email_template_model->get_by_code('lead.converted');
            $subject        =   $template->subject;                      
            $body           =   $template->body;

            $variables['assignee.name.first']   = $staffname;
            $variables['lead.number']           = $lead_id;
            $variables['lead.name']             = $row->first_name.' '.$row->last_name;
            $variables['lead.mobile']           = $row->mobile;
            $variables['lead.subject']          = 'Converted';
            $variables['comments']              = 'Converted';
            foreach($variables as $key => $value)
            {
                $body = str_replace('%{'.$key.'}', $value, $body);
            }
            $this->send_mail($email,$subject,$body);
            //send email as lead converted ENDS
            
            // Create company customer based on lead informtation  
            $cust_type_id   = $row->cust_type;
            $comp_name      = $row->company_name;
            $mobile         = $row->mobile;
            $first_name     = $row->first_name;
            $last_name      = $row->last_name;
            $address_1      = $row->address_1;
            $address_2      = $row->address_2;
            $zipcode        = $row->zipcode;
            $city_id        = $row->city_id;
            $email          = $row->email;
            $cust_id        = 0;
            
            if($cust_type_id!='6'){                
               
                $result = $this->Customer_model->get_by_mobile($mobile);
                
                if(empty($result))
                {
                    $data = array(
                        'name'              => $comp_name,
                        'cust_type'         => $cust_type_id,                    
                        'manager_mobile'    => $mobile,
                        'first_name'        => $first_name,
                        'last_name'         => $last_name,
                        'address_1'         => $address_1,
                        'address_2'         => $address_2,
                        'zipcode'           => $zipcode,
                        'city_id'           => $city_id,
                        'email'             => $email,
                        'created'           => date('Y-m-d H:i:s'),
                        'updated'           => date('Y-m-d H:i:s'),
                    );
                    $cust_id = $this->Customer_model->insert($data);
                }
                else
                {
                    $cust_id = $result[0]->id;
                } 
                 
            }
            
            $stages_id          =   $this->input->post('stages_id',TRUE);
            $stages_info        =   $this->Stages_model->get_by_id($stages_id);
            $data = array(
		//'opportunity_id' => $this->input->post('opportunity_id',TRUE),
		'opportunity'           => $this->input->post('opportunity',TRUE),
		'lead_id'               => $this->input->post('lead_id',TRUE),
                'stage_id'              => $this->input->post('stages_id',TRUE),                
                'enquiry_type'          => 0,
                'first_name'            => 0,
                'last_name'             => 0,
		//'enquiry_type'        => $this->input->post('enquiry_type',TRUE),
		'customer_id'           => $cust_id,		
		'expected_revenue'      => $this->input->post('expected_revenue',TRUE),
		'probability'           => $stages_info->probability,
		'email'                 => '',
		'phone'                 => '',
		'sales_person_id'       => '',
		'sales_team_id'         => '',
		'next_action'           => date("Y-m-d"),
		'next_action_title'     => $this->input->post('next_action_title',TRUE),
		'expected_closing'      => date("Y-m-d", strtotime($this->input->post('expected_closing',TRUE))),
		'priority'              => '',
		'tags'                  => '',
		//'lost_reason' => $this->input->post('lost_reason',TRUE),
                'lost_reason'           => 0,
		'internal_notes'        => '',
		'assigned_partner_id'   => '',
		'staff_id'              => $logged_in,
		//'status_id' => $this->input->post('status_id',TRUE),
		//'active' => $this->input->post('active',TRUE),
                'status_id'             => 0,
                'active'                => 0,
		'created'               => date('Y-m-d H:i:s'),
		'updated'               => date('Y-m-d H:i:s'),
		'deleted'               => '',
	    );
            $quotation_id = $this->Opportunities_model->insert($data);
            
            $this->session->set_flashdata('message', 'Opportunity was converted from Lead successfully.Please fill rest of the details to complete Opportunity');
            redirect(site_url('opportunities/update/'.$quotation_id));
           
    }

    public function _rules() 
    {
	
	$this->form_validation->set_rules('source_id', 'source id', 'trim|required|numeric');
	$this->form_validation->set_rules('first_name', 'first name', 'trim|required');
	$this->form_validation->set_rules('last_name', 'last name', 'trim|required');
	$this->form_validation->set_rules('mobile', 'mobile', 'trim|required');
	$this->form_validation->set_rules('city_id', 'city id', 'trim|required|numeric');
        $this->form_validation->set_rules('cust_type', 'active', 'trim|required');
	//$this->form_validation->set_rules('active', 'active', 'trim|required');
	$this->form_validation->set_rules('status', 'status', 'trim|required|numeric');	
	//$this->form_validation->set_rules('', '', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function check_exist()
    {
    $val = $this->input->post('val');
	$col = $this->input->post('col');
	$id = isset($_POST['id']) ? $_POST['id'] : '';
	$res = $this->Leads_model->check_exist($val,$col,$id);
	if($res){
		echo 'false';
	}
	else {
		echo 'true';
	}
    }
    
    public function test()
    {        
        set_time_limit(4000); 
        // Connect to gmail
        $imapPath = '{imap.gmail.com:993/imap/ssl}INBOX';
        $username = 'vishalcrasta89@gmail.com';
        $password = 'daijidinesh';
        // try to connect 
        $inbox = imap_open($imapPath,$username,$password) or die('Cannot connect to Gmail: ' . imap_last_error());
        
           /* ALL - return all messages matching the rest of the criteria
            ANSWERED - match messages with the \\ANSWERED flag set
            BCC "string" - match messages with "string" in the Bcc: field
            BEFORE "date" - match messages with Date: before "date"
            BODY "string" - match messages with "string" in the body of the message
            CC "string" - match messages with "string" in the Cc: field
            DELETED - match deleted messages
            FLAGGED - match messages with the \\FLAGGED (sometimes referred to as Important or Urgent) flag set
            FROM "string" - match messages with "string" in the From: field
            KEYWORD "string" - match messages with "string" as a keyword
            NEW - match new messages
            OLD - match old messages
            ON "date" - match messages with Date: matching "date"
            RECENT - match messages with the \\RECENT flag set
            SEEN - match messages that have been read (the \\SEEN flag is set)
            SINCE "date" - match messages with Date: after "date"
            SUBJECT "string" - match messages with "string" in the Subject:
            TEXT "string" - match messages with text "string"
            TO "string" - match messages with "string" in the To:
            UNANSWERED - match messages that have not been answered
            UNDELETED - match messages that are not deleted
            UNFLAGGED - match messages that are not flagged
            UNKEYWORD "string" - match messages that do not have the keyword "string"
            UNSEEN - match messages which have not been read yet*/

        // search and get unseen emails, function will return email ids
  /*      $emails = imap_search($inbox,'UNSEEN');

        $output = '';
        if(!empty($emails))
        {
            foreach($emails as $mail) {

                $headerInfo = imap_headerinfo($inbox,$mail);

                $output .= $headerInfo->subject.'<br/>';
                $output .= $headerInfo->toaddress.'<br/>';
                $output .= $headerInfo->date.'<br/>';
                $output .= $headerInfo->fromaddress.'<br/>';
                $output .= $headerInfo->reply_toaddress.'<br/>';

                $emailStructure = imap_fetchstructure($inbox,$mail);
                //$message = quoted_printable_decode(imap_fetchbody($inbox,$mail,1)); 
                //$output .= $message.'<br/><br/>';
                
                if(isset($emailStructure->parts)) {
                     $output .= imap_body($inbox, $mail, FT_PEEK); 
                } else {
                    
                }
                    //    
                
               echo $output;
               $output = '';
            }
        }
        // colse the connection
        imap_expunge($inbox);
        imap_close($inbox);

    }    
    public function refresh_emails()
    {
        $this->load->library('imap');
        $this->load->model('Imap_connect_model');
        $connect    =   $this->Imap_connect_model->get_by_id(1);
        $config = array(
                'host'     => $connect->hostname,
                'encrypto' => '',
                'user'     => $connect->username,
                'pass'     => $connect->password
        );
        $this->imap->imap_connect($config);

        $data['output'] = array(
                'get_folders'               => $this->imap->get_folders(),                
                'select_folder'             => $this->imap->select_folder(''),
                'count_messages'            => $this->imap->count_messages(),			
                'get_message'               => $this->imap->get_unread_messages($number = 0, $order = 'DESC', $withbody = TRUE)			
        );
        $result = $data['output']['get_message'];
        $html = '<table>';
        if(!empty($result))
        {
            foreach($result as $email)
            {
                $html .= '<tr>';
                $html .= '<td>'.$email["subject"].'</td>';
                $html .= '<td>'.$email["from"].'</td>';
                $html .= '<td>'.$email["email"].'</td>';
                $html .= '<td>'.$email["date"].'</td>';
                $html .= '<td>'.$email["body"].'</td>';
                $html .= '</tr>';
                
                $insert_data    = array(
                                    'subject'       =>$email["subject"],
                                    'from_name'     =>$email["from"],
                                    'email'         =>$email["email"],
                                    'date'          =>$email["date"],
                                    'message'       =>htmlspecialchars($email["body"]),
                                    'created_dts'   =>date('Y-m-d H:i:s')
                                );                
                $this->Email_leads_model->insert($insert_data);
                $this->imap->set_unseen_message($email["uid"], $seen = TRUE);
            }
        } 
        $html .= '</table>';
        redirect(site_url('leads/email_leads'));
    }
    public function email_leads()
    {
        $leads  =   $this->Email_leads_model->get_all();
        $data   =   array(
                        'leads_data'    => $leads,
                        'title'         => 'TRAMS::SCP::Leads'
                    );
        $this->_tpl('leads/email_leads_list', $data);		
    }
    
    public function conv_email($elead_id) {
        $email_lead = $this->Email_leads_model->get_by_id($elead_id);
        $body = htmlspecialchars_decode($email_lead->message);
        $document = new DOMDocument;
        $document->loadHTML($body);
        $xpath = new DOMXPath($document);
        $trs = $xpath->query('//tr');
        $table = [];
        foreach ($trs as $key => $tr) {
            $td = $xpath->query('td', $tr);
            foreach ($td as $value) {
                $table[$key][] = $value->nodeValue;
            }
        }   
        $data = array(
                'title'             => 'TRAMS::SCP::Leads',
		'email_info'        => $table
	    );
        $this->_tpl('leads/leads_conv_email', $data);        
    }
    
    public function download_list_excel()
    {        
        $date_format                =   $this->arbac->get_system_var("date_format");
		$leads          =   $this->Leads_model->get_convlead_list();
        $dataToExports  =   [];
        foreach ($leads as $data) {
            $arrangeData['Created Date']    = date($date_format,strtotime($data->created));
            $arrangeData['Lead Details']    = $data->comments;
            $arrangeData['Contact Name']    = $data->first_name.' '.$data->last_name;
            $arrangeData['Email']           = $data->email;
            $arrangeData['Mobile']          = $data->mobile;
            $arrangeData['Assigned to']     = $data->assigned_staff;
            $arrangeData['Source']          = $data->source_details;
            $arrangeData['Status']          = $data->status_name;            
            $dataToExports[]                = $arrangeData;
        }
        // set header
        $filename = "Leads-".date('d-m-Y H:i A').".xls";
        header("Content-Type:   application/vnd.ms-excel; charset=utf-8");        
        header("Content-Disposition: attachment; filename=".$filename);
        exportExcelData($dataToExports);
    }    
    
    public function get_existing_user_mobile() 
    {
            $results      =   array();
            $query          =   $this->input->get_post('query');
            $matches        =   $this->user_mobile_model->get_mobile_matches($query);
            foreach($matches as $match)
            {
                $results[] = array(
                            "user_mobile_id"    => $match->id,
                            "user_id"           => $match->user_id,
                            "value"             => $match->mobile_no                         
                            
                    );                
            } 
            echo json_encode($results);             
    }
    
    public function get_existing_user_email() 
    {
            $results      =   array();
            $query          =   $this->input->get_post('query');
            $matches        =   $this->user_mail_model->get_email_matches($query);
            foreach($matches as $match)
            {
                $results[] = array(
                            "user_mail_id"    => $match->id,
                            "user_id"           => $match->user_id,
                            "value"             => $match->address                         
                            
                    );                
            } 
            echo json_encode($results);             
    }
    
    private function send_mail($email,$subject,$body,$attach = '')
    {
        $email_protocol                     = $this->arbac->get_system_var("email_protocol");
        $config = array();
        $config['useragent']                = "CodeIgniter";
        $config['mailpath']                 = "/usr/bin/sendmail"; // or "/usr/sbin/sendmail"
        if($email_protocol == 'mail')
        {
            $config['protocol']             = "smtp";
            $config['smtp_host']            = "localhost";
            $config['smtp_port']            = "25";
        }
        else
        {
            $email_host                     = $this->arbac->get_system_var("smtp_host");
            $email_port                     = $this->arbac->get_system_var("smtp_port");
            $email_username                 = $this->arbac->get_system_var("smtp_user");
            $email_password                 = $this->arbac->get_system_var("smtp_passwd");
            
            $config['protocol']             = "smtp";
            $config['smtp_host']            = $email_host;
            $config['smtp_port']            = $email_port;
            $config['smtp_user']            = $email_username;
            $config['smtp_pass']            = $email_password;            
        }
        
        $config['mailtype']                 = 'html';
        $config['charset']                  = 'utf-8';
        $config['newline']                  = "\r\n";
        $config['wordwrap']                 = TRUE;
        
        $from_email                         = $this->arbac->get_system_var("default_email");
        $site_name                          = $this->arbac->get_system_var("site_name");

        $this->load->library('email');
        $this->email->initialize($config);
        $this->email->from($from_email, $site_name);
        $this->email->to($email);
        $this->email->subject($subject);
        $this->email->message($body);
        if(!empty($attach))
        {
            $this->email->attach($attach);
        }
        if(!$this->email->send())
        {
            //echo $this->email->print_debugger();
        }
    } */
    
}
/* End of file Leads.php */