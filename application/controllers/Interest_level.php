<?php

/* Location: ./application/controllers/Interest_level.php */
/* Derived from Harviacode  */
/* Modified by Vivek Raghunathan 2021-06-25 17:54:34 */
/* Email : vivekra@dqserv.com */
/* http://dqserv.com */



if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Interest_level extends APP_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Interest_level_model');
        $this->load->library('form_validation');
		$this->load->library('Arbac');
		if(!$this->arbac->is_loggedin()){ redirect('scp/login'); }
    }

    public function index()
    {
        $interest_level = $this->Interest_level_model->get_all();

        $data = array(
            'interest_level_data' => $interest_level,
			'title' => 'TRAMS::SCP::Interest_level',
        );
		$this->_tpl('interest_level/interest_level_list', $data);
		
    }

    public function read($id) 
    {
        $row = $this->Interest_level_model->get_by_id($id);
        if ($row) {
            $data = array(
			'title'  => 'TRAMS::SCP::Interest_level',
		'active' => $row->active,
		'created' => $row->created,
		'interest_level' => $row->interest_level,
		'interest_level_id' => $row->interest_level_id,
		'updated' => $row->updated,
	    );
			$this->_tpl('interest_level/interest_level_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('interest_level'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('interest_level/create_action'),
			'title'  => 'TRAMS::SCP::Create Interest_level',
	    'active' => set_value('active'),
	    'created' => set_value('created'),
	    'interest_level' => set_value('interest_level'),
	    'interest_level_id' => set_value('interest_level_id'),
	    'updated' => set_value('updated'),
	);
          $this->_tpl('interest_level/interest_level_form', $data);	
		
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'active' => $this->input->post('active',TRUE),
		'created' => date('Y-m-d H:i:s'),
		'interest_level' => $this->input->post('interest_level',TRUE),
		'updated' => date('Y-m-d H:i:s'),
	    );

            $this->Interest_level_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('interest_level'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Interest_level_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('interest_level/update_action'),
				'title'  => 'TRAMS::SCP::Update Interest_level',
		'active' => set_value('active', $row->active),
		'created' => set_value('created', $row->created),
		'interest_level' => set_value('interest_level', $row->interest_level),
		'interest_level_id' => set_value('interest_level_id', $row->interest_level_id),
		'updated' => set_value('updated', $row->updated),
	    );
			$this->_tpl('interest_level/interest_level_edit', $data);
		
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('interest_level'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('interest_level_id', TRUE));
        } else {
            $data = array(
		'active' => $this->input->post('active',TRUE),
		
		'interest_level' => $this->input->post('interest_level',TRUE),
		'updated' => date('Y-m-d H:i:s'),
	    );

            $this->Interest_level_model->update($this->input->post('interest_level_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('interest_level'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Interest_level_model->get_by_id($id);

        if ($row) {
            $this->Interest_level_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('interest_level'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('interest_level'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('active', 'active', 'trim|required');
		
	$this->form_validation->set_rules('interest_level', 'interest level', 'trim|required');
		

	$this->form_validation->set_rules('interest_level_id', 'interest_level_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function check_exist()
    {
    $val = $this->input->post('val');
	$col = $this->input->post('col');
	$id = isset($_POST['id']) ? $_POST['id'] : '';
	$res = $this->Interest_level_model->check_exist($val,$col,$id);
	if($res){
		echo 'false';
	}
	else {
		echo 'true';
	}
    }

}

/* End of file Interest_level.php */
