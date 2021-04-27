<?php

/* Location: ./application/controllers/Ticket.php */
/* Derived from Harviacode  */
/* Modified by Vivek Raghunathan 2016-03-30 02:57:44 */
/* Email : vivekra@dqserv.com */
/* http://dqserv.com */



if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Dashboard extends APP_Controller {

    function __construct() {                
        parent::__construct();   
      //  $this->load->model('Opportunities_model');
      //  $this->load->model('Leads_model');
     //   $this->load->model('Stages_model');
        $this->load->library('form_validation');
        $this->load->library('Arbac');
        $this->load->library('upload');
        if(!$this->arbac->is_loggedin()){ redirect('scp/auth_login'); } 
		
    }

    public function index() {        
        $data = array(
            'title' => 'TRAMS::SCP::Dashboard', 
        );        
       // $this->_tpl('dashboard/index-0', $data);
	   $this->load->view('dashboard/index-0', $data);
    }
   
    public function opp_funnel()
    {        
        $opp_list       = $this->Opportunities_model->get_opp_funnel();
        $arr            = array();
        $result         = array();
        $arr['name']    = 'Opportunities'; 
        if(!empty($opp_list))
        {
            foreach($opp_list as $opp)
            {
                $arr['data'][]  = array( $opp->stagename, intval($opp->total) );
            }
        }
        else
        {
            $arr['data'][]  = array();
        }
        array_push($result,$arr);
        echo json_encode($result);  
    }
    
    public function opp_closing()
    {        
        $data['opp_list'] = $this->Opportunities_model->closing_this_month();
        $this->load->view('dashboard/closing_view',$data);
    }
    
    public function opp_user()
    {        
        $opp_list               = $this->Opportunities_model->get_opp_users();
        $arr                    = array();
        $result                 = array();
        $arr['name']            = 'Opportunities';
        $arr['colorByPoint']    = true; 
        if(!empty($opp_list))
        {
            foreach($opp_list as $opp)
            {
                $arr['data'][]          = array( 'name'=>$opp->assigned_staff, 'y'=>intval($opp->total));
            }
        }
        else
        {
            $arr['data'][]  = array();
        }       
                
        array_push($result,$arr);
        echo json_encode($result);
    }
    
    public function lead_funnel()
    {        
        $leads_list     = $this->Leads_model->get_leads_funnel();
        $arr            = array();
        $result         = array();
        $arr['name']    = 'Leads'; 
        if(!empty($leads_list))
        {
            foreach($leads_list as $lead)
            {
                $arr['data'][]  = array( $lead->status_name, intval($lead->total) );
            }
        }
        else
        {
            $arr['data'][]  = array();
        }
        array_push($result,$arr);
        echo json_encode($result);  
    }
    
    public function lead_user()
    {        
        $leads_list             = $this->Leads_model->get_leads_users();
        $arr                    = array();
        $result                 = array();
        $arr['name']            = 'Leads';
        $arr['colorByPoint']    = true; 
        if(!empty($leads_list))
        {
            foreach($leads_list as $lead)
            {
                $arr['data'][]          = array( 'name'=>$lead->assigned_staff, 'y'=>intval($lead->total));
            }
        }
        else
        {
            $arr['data'][]  = array();
        }  
        //$arr['data'][]          = array( 'name'=>'Yogendra', 'y'=>56);
                
        array_push($result,$arr);
        echo json_encode($result);
    }
    
    public function lead_source()
    {
        $leads_list             = $this->Leads_model->get_leads_source();
        $arr                    = array();
        $result                 = array();
        $arr['name']            = 'Leads';
        $arr['colorByPoint']    = true; 
        if(!empty($leads_list))
        {
            foreach($leads_list as $lead)
            {
                $arr['data'][]          = array( 'name'=>$lead->source_details, 'y'=>intval($lead->total));
            }
        }
        else
        {
            $arr['data'][]  = array();
        } 
        //$arr['data'][]          = array( 'name'=>'Yogendra', 'y'=>56);                
        array_push($result,$arr);
        echo json_encode($result);
    }
}

/* End of file Dashboard.php */
