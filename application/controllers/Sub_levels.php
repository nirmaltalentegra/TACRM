<?php

/* Location: ./application/controllers/Sub_levels.php */
/* Derived from Harviacode  */
/* Modified by Vivek Raghunathan 2021-06-25 17:58:20 */
/* Email : vivekra@dqserv.com */
/* http://dqserv.com */



if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Sub_levels extends APP_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Sub_levels_model');
        $this->load->library('form_validation');
		$this->load->library('Arbac');
		if(!$this->arbac->is_loggedin()){ redirect('scp/login'); }
    }

    public function index()
    {
        $sub_levels = $this->Sub_levels_model->get_all();

        $data = array(
            'sub_levels_data' => $sub_levels,
			'title' => 'TRAMS::SCP::Sub_levels',
        );
		$this->_tpl('sub_levels/sub_levels_list', $data);
		
    }

    public function read($id) 
    {
        $row = $this->Sub_levels_model->get_by_id($id);
        if ($row) {
            $data = array(
			'title'  => 'TRAMS::SCP::Sub_levels',
		'created_at' => $row->created_at,
		'id' => $row->id,
		'level_name' => $row->level_name,
		'updated_at' => $row->updated_at,
	    );
			$this->_tpl('sub_levels/sub_levels_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('sub_levels'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('sub_levels/create_action'),
			'title'  => 'TRAMS::SCP::Create Sub_levels',
	    'created_at' => set_value('created_at'),
	    'id' => set_value('id'),
	    'level_name' => set_value('level_name'),
	    'updated_at' => set_value('updated_at'),
	);
          $this->_tpl('sub_levels/sub_levels_form', $data);	
		
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'created_at' => $this->input->post('created_at',TRUE),
		'level_name' => $this->input->post('level_name',TRUE),
		'updated_at' => $this->input->post('updated_at',TRUE),
	    );

            $this->Sub_levels_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('sub_levels'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Sub_levels_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('sub_levels/update_action'),
				'title'  => 'TRAMS::SCP::Update Sub_levels',
		'created_at' => set_value('created_at', $row->created_at),
		'id' => set_value('id', $row->id),
		'level_name' => set_value('level_name', $row->level_name),
		'updated_at' => set_value('updated_at', $row->updated_at),
	    );
			$this->_tpl('sub_levels/sub_levels_edit', $data);
		
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('sub_levels'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'created_at' => $this->input->post('created_at',TRUE),
		'level_name' => $this->input->post('level_name',TRUE),
		'updated_at' => $this->input->post('updated_at',TRUE),
	    );

            $this->Sub_levels_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('sub_levels'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Sub_levels_model->get_by_id($id);

        if ($row) {
            $this->Sub_levels_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('sub_levels'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('sub_levels'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('created_at', 'created at', 'trim|required');
	$this->form_validation->set_rules('level_name', 'level name', 'trim|required');
	$this->form_validation->set_rules('updated_at', 'updated at', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function check_exist()
    {
    $val = $this->input->post('val');
	$col = $this->input->post('col');
	$id = isset($_POST['id']) ? $_POST['id'] : '';
	$res = $this->Sub_levels_model->check_exist($val,$col,$id);
	if($res){
		echo 'false';
	}
	else {
		echo 'true';
	}
    }

}

/* End of file Sub_levels.php */
