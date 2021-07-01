<?php

/* Location: ./application/controllers/Categories.php */
/* Derived from Harviacode  */
/* Modified by Vivek Raghunathan 2021-06-25 14:59:48 */
/* Email : vivekra@dqserv.com */
/* http://dqserv.com */



if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Categories extends APP_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Categories_model');
        $this->load->library('form_validation');
		$this->load->library('Arbac');
		if(!$this->arbac->is_loggedin()){ redirect('scp/login'); }
    }

    public function index()
    {
        $categories = $this->Categories_model->get_all();

        $data = array(
            'categories_data' => $categories,
			'title' => 'TRAMS::SCP::Categories',
        );
		$this->_tpl('categories/categories_list', $data);
		
    }

    public function read($id) 
    {
        $row = $this->Categories_model->get_by_id($id);
        if ($row) {
            $data = array(
			'title'  => 'TRAMS::SCP::Categories',
		'active' => $row->active,
		'category_id' => $row->category_id,
		'category_name' => $row->category_name,
		'created' => $row->created,
		'parent_id' => $row->parent_id,
		'updated' => $row->updated,
	    );
			$this->_tpl('categories/categories_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('categories'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('categories/create_action'),
			'title'  => 'TRAMS::SCP::Create Categories',
	    'active' => set_value('active'),
	    'category_id' => set_value('category_id'),
	    'category_name' => set_value('category_name'),
	    'created' => set_value('created'),
	    'parent_id' => set_value('parent_id'),
	    'updated' => set_value('updated'),
	);
          $this->_tpl('categories/categories_form', $data);	
		
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'active' => $this->input->post('active',TRUE),
		'category_name' => $this->input->post('category_name',TRUE),
		'created' => date('Y-m-d H:i:s'),
		'parent_id' => $this->input->post('parent_id',TRUE),
		'updated' => date('Y-m-d H:i:s'),
	    );

            $this->Categories_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('categories'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Categories_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('categories/update_action'),
				'title'  => 'TRAMS::SCP::Update Categories',
		'active' => set_value('active', $row->active),
		'category_id' => set_value('category_id', $row->category_id),
		'category_name' => set_value('category_name', $row->category_name),
		'created' => set_value('created', $row->created),
		'parent_id' => set_value('parent_id', $row->parent_id),
		'updated' => set_value('updated', $row->updated),
	    );
			$this->_tpl('categories/', $data);
		
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('categories'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('category_id', TRUE));
        } else {
            $data = array(
		'active' => $this->input->post('active',TRUE),
		'category_name' => $this->input->post('category_name',TRUE),
		
		'parent_id' => $this->input->post('parent_id',TRUE),
		'updated' => date('Y-m-d H:i:s'),
	    );

            $this->Categories_model->update($this->input->post('category_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('categories'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Categories_model->get_by_id($id);

        if ($row) {
            $this->Categories_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('categories'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('categories'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('active', 'active', 'trim|required');
	$this->form_validation->set_rules('category_name', 'category name', 'trim|required');
		
	$this->form_validation->set_rules('parent_id', 'parent id', 'trim|required|numeric');
		

	$this->form_validation->set_rules('category_id', 'category_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function check_exist()
    {
    $val = $this->input->post('val');
	$col = $this->input->post('col');
	$id = isset($_POST['id']) ? $_POST['id'] : '';
	$res = $this->Categories_model->check_exist($val,$col,$id);
	if($res){
		echo 'false';
	}
	else {
		echo 'true';
	}
    }

}

/* End of file Categories.php */
