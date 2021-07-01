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
		'active' => $row->active,
		'added_by' => $added_by_details['user_name'],
		'batch_id' => ($row_batch =='failure')?'':$row_batch[0]['batch_title'],
		'completion_date' => $row->completion_date,
		'course_completed' => $row->course_completed,
		'course_id' => ($row_course =='failure')?'':$row_course[0]['course_name'],
		'created' => $row->created,
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
	    'fees_paid' => ($fees)?$fees:set_value('fees_paid'),
	    'fees_payable' => set_value('fees_payable'),
	    'is_deleted' => set_value('is_deleted'),
	    'student_id' => set_value('student_id'),
	    'updated' => set_value('updated'),
	    'user_id' => set_value('user_id'),
		'bid' => $bid,
		'cid' => $cid,
		'course_name' => $course_name,
	);
		  $data['row_batch'] = $this->Common_model->get_table_details_dynamically('batches', 'batch_id', $oder_by = NULL);
		  //$data['row_courses'] = $this->Common_model->get_table_details_dynamically('courses_catalog', 'course_id', $oder_by = NULL);
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
			'created_at' => date('Y-m-d H:i:s'),
			);
			$user_id = $this->Common_model->insert_records_dynamically('users',$user_data);
			$student_name = $this->input->post('name',TRUE);
		}
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
		'course_id' => set_value('course_id', $row->course_id),
		'course_name' => set_value('course_name', ($course_details =='failure')?'':$course_details[0]['course_name']),
		'fees_paid' => set_value('fees_paid', $row->fees_paid),
		'fees_payable' => set_value('fees_payable', $row->fees_payable),
		'student_id' => set_value('student_id', $row->student_id),
		'user_id' => set_value('user_id', $row->user_id),
	    );
		    $data['row_batch'] = $this->Common_model->get_table_details_dynamically('batches', 'batch_id', $oder_by = NULL);
		    //$data['row_courses'] = $this->Common_model->get_table_details_dynamically('courses_catalog', 'course_id', $oder_by = NULL);
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
        //echo($this->db->last_query()); 
		//echo "<pre>"; print_r($result);
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

}

/* End of file Students.php */
