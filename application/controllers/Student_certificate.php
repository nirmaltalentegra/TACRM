<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class Student_certificate extends APP_Controller {
    function __construct() {
        parent::__construct();
        $this->load->helper(array('url'));
		$this->load->model('Common_model');
		$this->load->model('students_model');
    }
	
	public function print_certificate($student_id) {
		$arr_certificate_list = $this->Common_model->get_details_dynamically('tbl_templates', 'template_id', 1, 'template_id', 'ASC');
		//echo "<br> str ".$this->db->last_query();exit;
		if($arr_certificate_list != 'failure') {
			//Get all the data
			$arr_students_list = $this->students_model->get_students_course_details($student_id);
			//echo "<br> str ".$this->db->last_query();
			
			if($arr_students_list != 'failure') {
				/*echo "<pre>";
				print_r($arr_students_list);
				echo "</pre>";*/
				//exit;
				
				$course = $arr_students_list->course_name;
				$student_name = ucwords($arr_students_list->name);
				$completion_date = ($arr_students_list->completion_date != "" || $arr_students_list->completion_date != "0000-00-00 00:00:00") ? date('d-m-Y',strtotime($arr_students_list->completion_date)) : "";
				$student_enrollment_id = $arr_students_list->student_enrollment_id;
				$student_did = $arr_students_list->student_did;
				$certificate_id = $arr_students_list->certificate_id;
				
				$image_url = base_url().$this->config->item('certificate_file_path');
				
				$template = str_replace(array('$course','$student_name','$image_url','$completion_date','$student_enrollment_id','$student_did',								'$certificate_id'),
							array($course,$student_name,$image_url,$completion_date,$student_enrollment_id,$student_did,$certificate_id),
							$arr_certificate_list[0]['template_data']);
				//echo "<br> template ".$template;
				//exit;
				$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-L']);
			
				//load the view and saved it into $html variable   
				$html = $template;     
			   
				//echo "<br> html ".$html;exit;
				//this the the PDF filename that user will get to download
				$pdfFilePath = $student_name.'_Certification_on_'.$course . '.pdf';
			
				$mpdf->WriteHTML($html);
				$mpdf->Output($pdfFilePath, "D");
			}
			else {
				$this->session->set_flashdata('error', 'No proper details to print the certificate');
				redirect('students');	
			}	
		}	
	}
	
}