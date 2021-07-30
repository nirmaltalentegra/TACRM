<?php

/* Location: ./application/controllers/Students.php */
/* Derived from Harviacode  */
/* Modified by Vivek Raghunathan 2021-06-25 17:58:12 */
/* Email : vivekra@dqserv.com */
/* http://dqserv.com */



if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Students extends APP_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Students_model');
		$this->load->model('Common_model');
		$this->load->model('Batches_students_model');
        $this->load->library('form_validation');
		$this->load->library('Arbac');
		if(!$this->arbac->is_loggedin()){ redirect('scp/auth_login'); }
    }

    public function index()
    {
        $students = $this->Students_model->get_all();
		//echo($this->db->last_query()); 
        //echo "<pre>";
		//print_r($students);
		
        $data = array(
            'students_data' => $students,
			'title' => 'TRAMS::SCP::Students',
        );
		$this->_tpl('students/students_list', $data);
		
    }

    public function read($id) 
    {
        $row = $this->Students_model->get_by_id($id);
        if ($row) {
		$row_course = $this->Common_model->get_details_dynamically('courses_catalog', 'course_id', $row->course_id, 'course_id', $oder_by = NULL);
		$row_batch = $this->Common_model->get_details_dynamically('batches', 'batch_id', $row->batch_id, 'batch_id', $oder_by = NULL);
		$added_by_details = get_user_details($row->added_by);
            $data = array(
			'title'  => 'TRAMS::SCP::Students',
		'active' => ($row->active=='1')?'Yes':'No',
		'added_by' => $added_by_details['user_name'],
		'batch_id' => ($row_batch =='failure')?'':$row_batch[0]['batch_title'],
		'completion_date' => $row->completion_date,
		'course_completed' => ($row->course_completed=='1')?'Yes':'No',
		'course_id' => ($row_course =='failure')?'':$row_course[0]['course_name'],
		'created' => $row->created,
		'student_did' => $row->student_did,
		'certificate_id' => $row->certificate_id,
		'deleted_at' => $row->deleted_at,
		'fees_paid' => $row->fees_paid,
		'fees_payable' => $row->fees_payable, 
		'is_deleted' => $row->is_deleted,
		'student_id' => $row->student_id,
		'updated' => $row->updated,
		'user_id' => $row->user_id,
	    );
			$this->_tpl('students/students_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('students'));
        }
    }

    public function create($bid='') 
    {
		if($bid){
			$batch_details = $this->Common_model->get_details_dynamically('batches', 'batch_id', $bid, 'batch_id', $oder_by = NULL);
			$cid = ($batch_details =='failure')?'':$batch_details[0]['course_id'];
			$fees = ($batch_details =='failure')?'':$batch_details[0]['fees'];
			$course_details = $this->Common_model->get_details_dynamically('courses_catalog', 'course_id', $cid, 'course_id', $oder_by = NULL);
			$course_name = ($course_details =='failure')?'':$course_details[0]['course_name'];
		}
		else {
			$cid = '';
			$fees = '';
			$course_name = '';
		}
        $data = array(
            'button' => 'Create',
            'action' => site_url('students/create_action'),
			'title'  => 'TRAMS::SCP::Create Students',
	    'batch_id' => set_value('batch_id'),
	    'completion_date' => set_value('completion_date'),
	    'course_completed' => set_value('course_completed'),
	    'course_id' => set_value('course_id'),
	    'created' => set_value('created'),
	    'deleted_at' => set_value('deleted_at'),
	    'fees_paid' => set_value('fees_paid'),
	    'fees_payable' => ($fees) ? $fees : set_value('fees_payable'),
	    'is_deleted' => set_value('is_deleted'),
	    'student_id' => set_value('student_id'),
	    'updated' => set_value('updated'),
	    'user_id' => set_value('user_id'),
		'student_name' => set_value('student_name'),
		'bid' => $bid,
		'cid' => $cid,
		'course_name' => $course_name,
	);
		  $data['row_batch'] = $this->Common_model->get_table_details_dynamically('batches', 'batch_id', $oder_by = NULL);
		  $data['row_courses'] = $this->Common_model->get_table_details_dynamically('courses_catalog', 'course_id', $oder_by = NULL);
          $this->_tpl('students/students_form', $data);	
		
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
			if($this->input->post('frm_page',TRUE) == 'batch'){
            $this->create($this->input->post('batch_id',TRUE));
			}
			else{
				$this->create();
			}
        } else {
		if($this->input->post('user_id',TRUE)){
			$user_id = $this->input->post('user_id',TRUE);
			$student_name = $this->input->post('student_name',TRUE);
		}
		else{
			$user_data = array(
			'name' => $this->input->post('name',TRUE),
			'email' => $this->input->post('email',TRUE),
			'phone' => $this->input->post('phone',TRUE),
			'user_type' => 'Student/Parent',
			'created_at' => date('Y-m-d H:i:s'),
			);
			$user_id = $this->Common_model->insert_records_dynamically('users',$user_data);
			$student_name = $this->input->post('name',TRUE);
		}
		$batch_details = $this->Common_model->get_details_dynamically('batches', 'batch_id', $this->input->post('batch_id',TRUE), 'batch_id', $oder_by = NULL);
		$batch_code = ($batch_details =='failure')?'':$batch_details[0]['batch_code'];
		$course_details = $this->Common_model->get_details_dynamically('courses_catalog', 'course_id', $this->input->post('course_id',TRUE), 'course_id', $oder_by = NULL);
		$course_code = ($course_details =='failure')?'':$course_details[0]['course_code'];
		$total_students = $this->Students_model->total_rows() + 1;
            $data = array(
				'active' => '1',
				'added_by' => $this->session->userdata('id'),
				'batch_id' => $this->input->post('batch_id',TRUE),
				'completion_date' => $this->input->post('completion_date',TRUE),
				'course_completed' => 0,
				'course_id' => $this->input->post('course_id',TRUE),
				'created' => date('Y-m-d H:i:s'),
				'fees_paid' => $this->input->post('fees_paid',TRUE),
				'fees_payable' => $this->input->post('fees_payable',TRUE),
				'user_id' => $user_id,
				'name' => $student_name,
				'student_enrollment_id' => $batch_code."/".$course_code."/".$total_students,
				);
		//echo "<pre>";print_r($data);exit;
            $insert_id = $this->Students_model->insert($data);
			if($insert_id){
				$batch_student_data = array(
				'student_id' => $insert_id,
				'batch_id' => $this->input->post('batch_id',TRUE),
				'created' => date('Y-m-d H:i:s'),
				);
				$this->Batches_students_model->insert($batch_student_data);
				
				//Insert into tbl_payments
				if($this->input->post('fees_paid') > 0) {
					$insdata['student_id'] = $insert_id;
					$insdata['user_id'] = $user_id;
					$insdata['course_id'] = $this->input->post('course_id',TRUE);
					$insdata['date'] = date('Y-m-d H:i:s');
					$insdata['amount_paid'] = $this->input->post('fees_paid',TRUE);
					$insdata['note'] = "";
					$insdata['created_at']  = date('Y-m-d H:i:s');
					$id = $this->Common_model->insert_records_dynamically('tbl_payments', $insdata);
				}	
			}
            $this->session->set_flashdata('message', 'Create Record Success');
			if($this->input->post('frm_page',TRUE) == 'batch'){
				redirect(site_url('batches'));
			}
			else{
            redirect(site_url('students'));
			}
        }
    }
    
    public function update($id) 
    {
        $row = $this->Students_model->get_by_id($id);
        if ($row) {
		$course_details = $this->Common_model->get_details_dynamically('courses_catalog', 'course_id',$row->course_id, 'course_id', $oder_by = NULL);
            $data = array(
                'button' => 'Update',
                'action' => site_url('students/update_action'),
				'title'  => 'TRAMS::SCP::Update Students',
		//'active' => set_value('active', $row->active),
		'added_by' => set_value('added_by', $row->added_by),
		'batch_id' => set_value('batch_id', $row->batch_id),
		'completion_date' => set_value('completion_date', $row->completion_date),
		'course_completed' => set_value('course_completed', $row->course_completed),
		'student_did' => set_value('student_did', $row->student_did),
		'certificate_id' => set_value('certificate_id', $row->certificate_id),
		'course_id' => set_value('course_id', $row->course_id),
		'course_name' => set_value('course_name', ($course_details =='failure')?'':$course_details[0]['course_name']),
		'fees_paid' => set_value('fees_paid', $row->fees_paid),
		'fees_payable' => set_value('fees_payable', $row->fees_payable),
		'student_id' => set_value('student_id', $row->student_id),
		'user_id' => set_value('user_id', $row->user_id),
	    );
		    $data['row_batch'] = $this->Common_model->get_table_details_dynamically('batches', 'batch_id', $oder_by = NULL);
		    $data['row_courses'] = $this->Common_model->get_table_details_dynamically('courses_catalog', 'course_id', $oder_by = NULL);
			$this->_tpl('students/students_edit', $data);
		
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('students'));
        }
    }
    
    public function update_action() 
    { 
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('student_id', TRUE));
        } else {
            $data = array(
		//'active' => $this->input->post('active',TRUE),
		//'added_by' => $this->input->post('added_by',TRUE),
		'batch_id' => $this->input->post('batch_id',TRUE),
		'completion_date' => $this->input->post('completion_date',TRUE),
		'course_completed' => $this->input->post('course_completed',TRUE),
		'course_id' => $this->input->post('course_id',TRUE),
		'student_did' => $this->input->post('student_did',TRUE),
		'certificate_id' => $this->input->post('certificate_id',TRUE),
		'fees_paid' => $this->input->post('fees_paid',TRUE),
		'fees_payable' => $this->input->post('fees_payable',TRUE),
		'updated' => date('Y-m-d H:i:s'),
	    );

            $this->Students_model->update($this->input->post('student_id', TRUE), $data);
			$batch_student_data = array(
			'batch_id' => $this->input->post('batch_id',TRUE),
			'updated' => date('Y-m-d H:i:s'),
			);
			$this->Common_model->update_records_dynamically('batches_students', $batch_student_data, 'student_id', $this->input->post('student_id', TRUE));
			
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('students'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Students_model->get_by_id($id);

        if ($row) {
            //$this->Students_model->delete($id);
		$data = array(
		'is_deleted' => 'Yes',
		'deleted_at' => date('Y-m-d H:i:s'),
	    );
            $this->Students_model->update($id, $data);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('students'));
        } else { 
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('students'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('batch_id', 'batch id', 'trim|required|numeric');
	//$this->form_validation->set_rules('completion_date', 'completion date', 'trim|required');
	//$this->form_validation->set_rules('course_completed', 'course completed', 'trim|required|numeric');
	$this->form_validation->set_rules('course_id', 'course id', 'trim|required|numeric');
		
	$this->form_validation->set_rules('fees_paid', 'fees paid', 'trim|required');
	$this->form_validation->set_rules('fees_payable', 'fees payable', 'trim|required');
		

	//$this->form_validation->set_rules('student_id', 'student_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function check_exist()
    {
    $val = $this->input->post('val');
	$col = $this->input->post('col');
	$id = isset($_POST['id']) ? $_POST['id'] : '';
	$res = $this->Students_model->check_exist($val,$col,$id);
	if($res){
		echo 'false';
	}
	else {
		echo 'true';
	}
    }
	
	public function get_students() 
    {
		$search = $_POST['search'];
		if (strpos($search, '@') !== false) {
		$search_type = 'email';
		}
		else if(is_numeric($search)){
			$search_type = 'phone';
		}
		else
		{
			$search_type = 'name';
		}
		$result = $this->Students_model->get_students_from_users($search,$search_type);
		$search_arr = array();

		foreach ($result as $row) {
			$id = $row['id'];
			$name = $row[$search_type];

			$search_arr[] = array("id" => $id, "name" => $name);
		}

		echo json_encode($search_arr); 
	}
	
	public function get_students_deatils() 
    {
		$userid = $_POST['userid'];
		$result = $this->Students_model->get_students_by_user_id($userid);
		echo json_encode($result); 
	}
	public function check_student_batch_course() 
    {
		$course_id = $_POST['course_id'];
		$batch_id = $_POST['batch_id'];
		$user_id = $_POST['user_id'];  
		$result = $this->Students_model->check_student_by_batch_course($user_id,$course_id,$batch_id);
		echo $result; 
	}
	public function check_student_batch() 
    {
		$batch_id = $_POST['batch_id'];
		$user_id = $_POST['user_id'];
		$course_id = $_POST['course_id'];		
		$result = $this->Students_model->check_student_by_batch($user_id,$batch_id);
		$row_course = $this->Common_model->get_details_dynamically('courses_catalog', 'course_id', $course_id, 'course_id', $oder_by = NULL);
		$course_name = ($row_course =='failure')?'':$row_course[0]['course_name'];
		$res_arr = array("result" => $result, "course_name" => $course_name);
		//print_r($res_arr);
		echo json_encode($res_arr); 
	}
	
	public function student_course_batch($user_id)
	{
		$result = $this->Students_model->get_studentdetail_by_user_id($user_id);
		//echo "<br> str ".$this->db->last_query();exit;
		$data['title']  = 'TRAMS::SCP::Students';
		$data['result'] = $result;
		$this->_tpl('students/students_detail', $data);
	}
	
	public function student_add_payment()
	{
		$data['student_id'] = $_POST['student_id'];
		$data['user_id'] = $_POST['user_id'];
		$data['course_id'] = $_POST['course_id'];
		$data['date'] = $_POST['date'];
		$data['amount_paid'] = $_POST['amt_paid'];
		$data['note'] = $_POST['note'];
		$data['created_at']  = date('Y-m-d H:i:s');
		$id = $this->Common_model->insert_records_dynamically('tbl_payments', $data);
		if($id){
		$row_arr = $this->Common_model->get_details_dynamically('tbl_payments','student_id',$data['student_id']);
		$fee_paid = 0;
		foreach($row_arr as $row){
			$fee_paid+= $row['amount_paid'];
		}
		$data_student = array(
		'fees_paid' => $fee_paid,
		'updated' => date('Y-m-d H:i:s'),
	    );

            $this->Students_model->update($data['student_id'], $data_student);
			$response = "success";
		}
		else{
			$response = "failure";
		}
		echo $response;
	}
	
	
	public function student_edit_payment()
	{
		$student_id = $_POST['student_id'];
		$data['id'] = $_POST['txt_id'];
		$data['date'] = $_POST['txt_date'];
		$data['amount_paid'] = $_POST['txt_amount_paid'];
		$data['note'] = $_POST['txt_note'];
		$data['created_at']  = date('Y-m-d H:i:s');
		$id = $this->Common_model->update_records_dynamically('tbl_payments', $data,'id',$data['id']);
		if(!empty($id))
		{
			$fee_paid=0;
			$row_arr=$this->Common_model->get_details_dynamically('tbl_payments','student_id',$student_id);			
			foreach($row_arr as $row)
			{
				$fee_paid+=$row['amount_paid'];
			}
			$data_student = array(
				'fees_paid' => $fee_paid,
				'updated' => date('Y-m-d H:i:s'),
			);
            $this->Students_model->update($student_id, $data_student);
			$response = "success";
		}
		else
		{
			$response = "failure";
		}
		echo $response;
	}
	
	public function student_fetch_details()
	{
		$student_id = $_POST['id'];
		$amt = $_POST['amt'];
		$row_arr=$this->Common_model->get_details_dynamically('students','student_id',$student_id);
		foreach($row_arr as $row)
		{
			$student_name=$row['name'];
		}		
		   $no = floor($amt);
		   $point = round($amt - $no, 2) * 100;
		   $hundred = null;
		   $digits_1 = strlen($no);
		   $i = 0;
		   $str = array();
		   $words = array('0' => '', '1' => 'One', '2' => 'Two',
			'3' => 'Three', '4' => 'Four', '5' => 'Five', '6' => 'Six',
			'7' => 'Seven', '8' => 'Eight', '9' => 'Nine',
			'10' => 'Ten', '11' => 'Eleven', '12' => 'Twelve',
			'13' => 'Thirteen', '14' => 'Fourteen',
			'15' => 'Fifteen', '16' => 'Sixteen', '17' => 'Seventeen',
			'18' => 'Eighteen', '19' =>'Nineteen', '20' => 'Twenty',
			'30' => 'Thirty', '40' => 'Forty', '50' => 'Fifty',
			'60' => 'Sixty', '70' => 'Seventy',
			'80' => 'Eighty', '90' => 'Ninety');
		   $digits = array('', 'Hundred', 'Thousand', 'Lakh', 'Crore');
		   while ($i < $digits_1) {
			 $divider = ($i == 2) ? 10 : 100;
			 $amt = floor($no % $divider);
			 $no = floor($no / $divider);
			 $i += ($divider == 10) ? 1 : 2;
			 if ($amt) {
				$plural = (($counter = count($str)) && $amt > 9) ? 's' : null;
				$hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
				$str [] = ($amt < 21) ? $words[$amt] .
					" " . $digits[$counter] . $plural . " " . $hundred
					:
					$words[floor($amt / 10) * 10]
					. " " . $words[$amt % 10] . " "
					. $digits[$counter] . $plural . " " . $hundred;
			 } else $str[] = null;
		  }
		  $str = array_reverse($str);
		  $result = implode('', $str);
		  $points = ($point) ?
			"." . $words[$point / 10] . " " . 
				  $words[$point = $point % 10] : '';
		  $output = $result . "Rupees  ";
		
		$data = array(
			'data1'=>$student_name,
			'data2'=>$output,
		);
		echo json_encode($data);
	}
	
	public function get_student_payment()
	{
		$data['student_id'] = $_POST['student_id'];
		$row_arr = $this->Common_model->get_details_dynamically('tbl_payments','student_id',$data['student_id'],'date','DESC');
		//echo($this->db->last_query());
		//print_r($row_arr);exit;
		$res_arr = array();
		foreach ($row_arr as $row) {
			$id = $row['id'];
			$user_id = $row['user_id'];
			$student_id = $row['student_id'];
			$course_id = $row['course_id'];
			$date = date("d-m-Y",strtotime($row['date']));
			$amount_paid = $row['amount_paid'];
			$note = $row['note']; 

			$res_arr[] = array("id" => $id, "user_id" => $user_id,  "student_id" => $student_id, "course_id" => $course_id, "date" => $date, "amount_paid" => $amount_paid, "note" => $note );
		}

		echo json_encode($res_arr); 
		//echo json_encode($res_arr);
		//echo $data['student_id'];
	}
	
	public function student_delete_payment()
	{
		$id = $_POST['id'];
	
		$row_arr=$this->Common_model->get_details_dynamically('tbl_payments','id',$id);
		foreach($row_arr as $row)
		{
			$student_id=$row['student_id'];
		}
		
		$row = $this->Common_model->delete_records_dynamically('tbl_payments','id',$id);
		
		$fee_paid=0;
		$row_arr=$this->Common_model->get_details_dynamically('tbl_payments','student_id',$student_id);
		if($row_arr=="failure")
		{
			$fee_paid=0;
		}
		else
		{
			foreach($row_arr as $row)
			{
				$fee_paid+=$row['amount_paid'];
			}
		}
		$data_student = array(
			'fees_paid' => $fee_paid,
			'updated' => date('Y-m-d H:i:s'),
		);
		$this->Students_model->update($student_id, $data_student);
		
		echo "Done";
	}
	public function send_email_with_pdf()
	{
		$row_id= $this->uri->segment(3);
	    $arr_certificate_list = $this->Common_model->get_details_dynamically('tbl_payments', 'id', $row_id);
		if($arr_certificate_list != 'failure')
		{
			foreach($arr_certificate_list as $row)
			{
				$payment_date=$row['date'];
				$amount_paid=$row['amount_paid'];
				$student_id=$row['student_id'];
				$user_id=$row['user_id'];
			}
			$s = strtotime($payment_date);
			$payment_date = date('d/m/Y', $s);
			
			$row_arr=$this->Common_model->get_details_dynamically('students','student_id',$student_id);
			foreach($row_arr as $row)
			{
				$student_name=$row['name'];
			}
			$row_arr_user=$this->Common_model->get_details_dynamically('users','id',$user_id);
			foreach($row_arr_user as $row)
			{
				$email=$row['email'];
			}
			
			$amt = $amount_paid;
			$no = floor($amt);
		   $point = round($amt - $no, 2) * 100;
		   $hundred = null;
		   $digits_1 = strlen($no);
		   $i = 0;
		   $str = array();
		   $words = array('0' => '', '1' => 'One', '2' => 'Two',
			'3' => 'Three', '4' => 'Four', '5' => 'Five', '6' => 'Six',
			'7' => 'Seven', '8' => 'Eight', '9' => 'Nine',
			'10' => 'Ten', '11' => 'Eleven', '12' => 'Twelve',
			'13' => 'Thirteen', '14' => 'Fourteen',
			'15' => 'Fifteen', '16' => 'Sixteen', '17' => 'Seventeen',
			'18' => 'Eighteen', '19' =>'Nineteen', '20' => 'Twenty',
			'30' => 'Thirty', '40' => 'Forty', '50' => 'Fifty',
			'60' => 'Sixty', '70' => 'Seventy',
			'80' => 'Eighty', '90' => 'Ninety');
		   $digits = array('', 'Hundred', 'Thousand', 'Lakh', 'Crore');
		   while ($i < $digits_1) {
			 $divider = ($i == 2) ? 10 : 100;
			 $amt = floor($no % $divider);
			 $no = floor($no / $divider);
			 $i += ($divider == 10) ? 1 : 2;
			 if ($amt) {
				$plural = (($counter = count($str)) && $amt > 9) ? 's' : null;
				$hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
				$str [] = ($amt < 21) ? $words[$amt] .
					" " . $digits[$counter] . $plural . " " . $hundred
					:
					$words[floor($amt / 10) * 10]
					. " " . $words[$amt % 10] . " "
					. $digits[$counter] . $plural . " " . $hundred;
			 } else $str[] = null;
		  }
		  $str = array_reverse($str);
		  $result = implode('', $str);
		  $points = ($point) ?
			"." . $words[$point / 10] . " " . 
				  $words[$point = $point % 10] : '';
		  $output = $result . "Rupees  ";
				ob_start();
				$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-L']);
			
				$link = base_url().'assets/logo.png';
				$template='<img src="'.$link.'" alt="NoImg" width="100%" />';
				
				$template.='<table style="border:1px;">';
					$template.='<thead>';
						$template.='<tr>';
							$template.='<th colspan="3" style="text-align:center;">PAYMENT RECEIPT<br></th>';
						$template.='</tr>';
					$template.='</thead>';
					$template.='<tbody>';
						$template.='<tr>';
							$template.='<th width="40%">Payment Date</th>';
							$template.='<th width="10%"></td>';
							$template.='<td width="50%">'.$payment_date.'</td>';
						$template.='</tr>';
						$template.='<tr>';
							$template.='<th>Payment Mode</th>';
							$template.='<th width="10%"></td>';
							$template.='<td id="PaymentMode">Bank Transfer</td>';
						$template.='</tr>';
						$template.='<tr>';
							$template.='<th>Payment Amount</th>';
							$template.='<th width="10%"></td>';
							$template.='<td id="PaymentAmt">Rs. '.$amount_paid.'</td>';
						$template.='</tr>';
						$template.='<tr>';
							$template.='<th>Amount Received In Words</th>';
							$template.='<th width="10%"></td>';
							$template.='<td>'.$output.'</td>';
						$template.='</tr>';
						$template.='<tr>';
							$template.='<th>Description</th>';
							$template.='<th width="10%"></td>';
							$template.='<td></td>';
						$template.='</tr>';
						$template.='<tr>';
							$template.='<th>Terms & Conditions</th>';
							$template.='<th width="10%"></td>';
							$template.='<td></td>';
						$template.='</tr>';
						$template.='<tr>';
							$template.='<td><br/></td>';
							$template.='<td><br/></td>';
							$template.='<td><br/></td>';
						$template.='</tr>';
						$template.='<tr>';
							$template.='<td>';
								$template.='<b>Received From</b><br/>';
								$template.='<temp>'.$student_name.'</temp>';
							$template.='</td>';
							$template.='<th width="10%"></td>';
							$template.='<td style="text-align:right;">';
								$template.='<temp id="PaymentName"></temp><br/>';
								$template.='<b>Authorized Signature</b>';
							$template.='</td>';
						$template.='</tr>';
					$template.='</tbody>';
				$template.='</table>';
				
				$html = $template; 
				$file = 'Paid_receipt_'.$student_name; 
				$pdfFilePath = $file.".pdf";
			    $mpdf->WriteHTML($html);
				$attch=$mpdf->Output($pdfFilePath);
		
	$this->load->library('email');
	$config['protocol']    = 'smtp';
	$config['smtp_host']    = 'ssl://smtp.gmail.com';
	$config['smtp_port']    = '465';
	$config['smtp_timeout'] = '7';
	$config['smtp_user']    = 'asmitha@digitalq.co.in';
	$config['smtp_pass']    = 'A5m1tha@123';
	$config['charset']    = 'utf-8';
	$config['newline']    = "\r\n";
	$config['mailtype'] = 'text'; // or html
	$config['validation'] = TRUE; // bool whether to validate email or not      
	//$atch=base_url().'test.php';

	$this->email->initialize($config);

	$this->email->from('asmitha@digitalq.co.in', 'talentegra');
	$this->email->to($email); 
	$this->email->subject('Paid Receipt');
	$this->email->message('Download the Paid Receipt.');  
	$this->email->attach($pdfFilePath);
	
	if($this->email->send()){
		$success = 'Message has been sent';
		$this->session->set_flashdata('msg', $success);
		//redirect('contact/'.$this->input->post('lang'));
		//redirect()->back();
		redirect($_SERVER['HTTP_REFERER']);

	}
	else{	
	echo $this->email->print_debugger();
	}
	//unset($mpdf);
	ob_end_clean();
		}
	}
}

/* End of file Students.php */
