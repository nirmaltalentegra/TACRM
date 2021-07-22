<?php

/* Location: ./application/controllers/Students.php */
/* Derived from Harviacode  */
/* Modified by Vivek Raghunathan 2021-06-25 17:58:12 */
/* Email : vivekra@dqserv.com */
/* http://dqserv.com */



if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Verify extends APP_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Students_model');
		$this->load->model('Common_model');
        $this->load->library('form_validation');
		$this->load->library('Arbac');
		//if(!$this->arbac->is_loggedin()){ redirect('scp/auth_login'); }
    }

    public function verify_certificate()
    {
		$data = array(
            		
			'title' => 'TRAMS::SCP::Certificate Verification',
        );
		
		$certifcation_id = $this->input->post('certifcation_id');
		$certificate_detail = array();
		$exists = "";
		
		if($certifcation_id != "") {
			$exists = $this->Students_model->check_student_by_certificate_id($certifcation_id);
		
			if($exists =='success'){
				$certificate_detail = $this->Students_model->get_studentdetail_by_certification_id($certifcation_id);
			}
		}	
		
		$data['certifcation_id'] = $this->input->post('certifcation_id'); 
		$data['certificate_detail'] = $certificate_detail;
		$data['exists'] = $exists;
		
		$this->_tpl('students/student_certificate_verification',$data);
		
    }

}

/* End of file Students.php */
