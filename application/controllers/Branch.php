<?php

/* Location: ./application/controllers/Branch.php */
/* Derived from Harviacode  */
/* Modified by Vivek Raghunathan 2021-06-25 14:59:48 */
/* Email : vivekra@dqserv.com */
/* http://dqserv.com */



if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Branch extends APP_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('Branch_model');
		$this->load->model('Branch_type_model');
		$this->load->model('Common_model');
		$this->load->library('session');
		$this->load->library('form_validation');
		$this->load->library('Arbac');
		if (!$this->arbac->is_loggedin()) {
			redirect('scp/auth_login');
		}
	}

	public function index()
	{
		$branch = $this->Branch_model->get_all();

		$data = array(
			'branch_data' => $branch,
			'title' => 'TRAMS::SCP::Branch',
		);
		$this->_tpl('branch/branch_list', $data);
	}

	public function read($id)
	{
		$row = $this->Branch_model->get_by_id($id);
		if ($row) {

			$row_branch_type = $this->Branch_type_model->get_branch_type($row->branch_type);
			$row_city = $this->Common_model->get_details_dynamically('city', 'city_id', $row->city_id, 'city_id', $oder_by = NULL);
			$row_country = $this->Common_model->get_details_dynamically('country', 'country_id', $row->country_id, 'country_id', $oder_by = NULL);
			$row_staff = $this->Common_model->get_details_dynamically('staff', 'staff_id', $row->manager_id, 'staff_id', $oder_by = NULL);
			$row_status = $this->Common_model->get_details_dynamically('status', 'status_id', $row->branch_status, 'status_id', $oder_by = NULL);
			$data = array(
				'title'  => 'TRAMS::SCP::Branch',
				'autoresp_email_id' => $row->autoresp_email_id,
				'branch_address' => $row->branch_address,
				'branch_area' => $row->branch_area,
				'branch_code' => $row->branch_code,
				'branch_id' => $row->branch_id,
				'branch_name' => $row->branch_name,
				'branch_reg_date' => $row->branch_reg_date,
				'branch_status' => ($row_status == 'failure') ? '' : $row_status[0]['status'],
				'branch_type' => $row_branch_type['branch_type_name'],
				'city_id' => ($row_city == 'failure') ? '' : $row_city[0]['city_name'],
				'country_id' => ($row_country == 'failure') ? '' : $row_country[0]['country_name'],
				'created' => $row->created,
				'email_id' => $row->email_id,
				'flags' => $row->flags,
				'ispublic' => $row->ispublic,
				'land_mark' => $row->land_mark,
				'manager_id' => ($row_staff == 'failure') ? '' : $row_staff[0]['firstname'] . ' ' . $row_staff[0]['lastname'],
				'mobile' => $row->mobile,
				'phone' => $row->phone,
				'signature' => $row->signature,
				'updated' => $row->updated,
				'zipcode' => $row->zipcode,
			);
			$this->_tpl('branch/branch_read', $data);
		} else {
			$this->session->set_flashdata('error', 'Record Not Found');
			redirect(site_url('branch'));
		}
	}

	public function create()
	{
		$data = array(
			'button' => 'Create',
			'action' => site_url('branch/create_action'),
			'title'  => 'TRAMS::SCP::Create Branch',
			'autoresp_email_id' => set_value('autoresp_email_id'),
			'branch_address' => set_value('branch_address'),
			'branch_area' => set_value('branch_area'),
			'branch_code' => set_value('branch_code'),
			'branch_id' => set_value('branch_id'),
			'branch_name' => set_value('branch_name'),
			'branch_reg_date' => set_value('branch_reg_date'),
			'branch_status' => set_value('branch_status'),
			'branch_type' => set_value('branch_type'),
			'city_id' => set_value('city_id'),
			'country_id' => set_value('country_id'),
			'created' => set_value('created'),
			'email_id' => set_value('email_id'),
			'land_mark' => set_value('land_mark'),
			'manager_id' => set_value('manager_id'),
			'mobile' => set_value('mobile'),
			'phone' => set_value('phone'),
			'signature' => set_value('signature'),
			'updated' => set_value('updated'),
			'zipcode' => set_value('zipcode'),
		);
		$data['row_branch_type'] = $this->Branch_type_model->get_all_branch_type();
		$data['row_city'] = $this->Common_model->get_table_details_dynamically('city', 'city_id');
		$data['row_country'] = $this->Common_model->get_table_details_dynamically('country', 'country_id');
		$data['row_staff'] = $this->Common_model->get_table_details_dynamically('staff', 'staff_id');
		$data['row_status'] = $this->Common_model->get_details_dynamically('status', 'status_type', '5', 'status_id', $oder_by = NULL);
		$this->_tpl('branch/branch_form', $data);
	}

	public function create_action()
	{
		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$this->create();
		} else {
			$total_branch = $this->Branch_model->total_rows() + 1;
			$data = array(
				'autoresp_email_id' => $this->input->post('autoresp_email_id', TRUE),
				'branch_address' => $this->input->post('branch_address', TRUE),
				'branch_area' => $this->input->post('branch_area', TRUE),
				'branch_code' => "Branch" . str_pad($total_branch,  3, "0", STR_PAD_LEFT),
				'branch_name' => $this->input->post('branch_name', TRUE),
				'branch_reg_date' => $this->input->post('branch_reg_date', TRUE),
				'branch_status' => $this->input->post('branch_status', TRUE),
				'branch_type' => $this->input->post('branch_type', TRUE),
				'city_id' => $this->input->post('city_id', TRUE),
				'country_id' => $this->input->post('country_id', TRUE),
				'created' => date('Y-m-d H:i:s'),
				'email_id' => $this->input->post('email_id', TRUE),
				'land_mark' => $this->input->post('land_mark', TRUE),
				'manager_id' => $this->input->post('manager_id', TRUE),
				'mobile' => $this->input->post('mobile', TRUE),
				'phone' => $this->input->post('phone', TRUE),
				'signature' => $this->input->post('signature', TRUE),
				'updated' => date('Y-m-d H:i:s'),
				'zipcode' => $this->input->post('zipcode', TRUE),
			);

			if (!$this->Branch_model->insert($data)) {
				$this->session->set_flashdata('error', 'Same name cannot be repeated.');
			} else {
				$this->session->set_flashdata('message', 'Create Record Success');
			}

			redirect(site_url('branch'));
		}
	}

	public function update($id)
	{
		$row = $this->Branch_model->get_by_id($id);

		if ($row) {
			$data = array(
				'button' => 'Update',
				'action' => site_url('branch/update_action'),
				'title'  => 'TRAMS::SCP::Update Branch',
				'autoresp_email_id' => set_value('autoresp_email_id', $row->autoresp_email_id),
				'branch_address' => set_value('branch_address', $row->branch_address),
				'branch_area' => set_value('branch_area', $row->branch_area),
				'branch_code' => set_value('branch_code', $row->branch_code),
				'branch_id' => set_value('branch_id', $row->branch_id),
				'branch_name' => set_value('branch_name', $row->branch_name),
				'branch_reg_date' => set_value('branch_reg_date', $row->branch_reg_date),
				'branch_status' => set_value('branch_status', $row->branch_status),
				'branch_type' => set_value('branch_type', $row->branch_type),
				'city_id' => set_value('city_id', $row->city_id),
				'country_id' => set_value('country_id', $row->country_id),
				'created' => set_value('created', $row->created),
				'email_id' => set_value('email_id', $row->email_id),
				'flags' => set_value('flags', $row->flags),
				'ispublic' => set_value('ispublic', $row->ispublic),
				'land_mark' => set_value('land_mark', $row->land_mark),
				'manager_id' => set_value('manager_id', $row->manager_id),
				'mobile' => set_value('mobile', $row->mobile),
				'phone' => set_value('phone', $row->phone),
				'signature' => set_value('signature', $row->signature),
				'updated' => set_value('updated', $row->updated),
				'zipcode' => set_value('zipcode', $row->zipcode),
			);

			$data['row_branch_type'] = $this->Branch_type_model->get_all_branch_type();
			$data['row_city'] = $this->Common_model->get_table_details_dynamically('city', 'city_id');
			$data['row_country'] = $this->Common_model->get_table_details_dynamically('country', 'country_id');
			$data['row_staff'] = $this->Common_model->get_table_details_dynamically('staff', 'staff_id');
			$data['row_status'] = $this->Common_model->get_details_dynamically('status', 'status_type', '5', 'status_id', $oder_by = NULL);
			$this->_tpl('branch/branch_edit', $data);
		} else {
			$this->session->set_flashdata('error', 'Record Not Found');
			redirect(site_url('branch'));
		}
	}

	public function update_action()
	{
		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$this->update($this->input->post('branch_id', TRUE));
		} else {
			$data = array(
				'autoresp_email_id' => $this->input->post('autoresp_email_id', TRUE),
				'branch_address' => $this->input->post('branch_address', TRUE),
				'branch_area' => $this->input->post('branch_area', TRUE),
				'branch_name' => $this->input->post('branch_name', TRUE),
				'branch_reg_date' => $this->input->post('branch_reg_date', TRUE),
				'branch_status' => $this->input->post('branch_status', TRUE),
				'branch_type' => $this->input->post('branch_type', TRUE),
				'city_id' => $this->input->post('city_id', TRUE),
				'country_id' => $this->input->post('country_id', TRUE),

				'email_id' => $this->input->post('email_id', TRUE),
				'flags' => $this->input->post('flags', TRUE),
				'ispublic' => $this->input->post('ispublic', TRUE),
				'land_mark' => $this->input->post('land_mark', TRUE),
				'manager_id' => $this->input->post('manager_id', TRUE),
				'mobile' => $this->input->post('mobile', TRUE),
				'phone' => $this->input->post('phone', TRUE),
				'signature' => $this->input->post('signature', TRUE),
				'updated' => date('Y-m-d H:i:s'),
				'zipcode' => $this->input->post('zipcode', TRUE),
			);

			if (!$this->Branch_model->update($this->input->post('branch_id', TRUE), $data)) {
				$this->session->set_flashdata('error', 'Same name cannot be repeated.');
			} else {
				$this->session->set_flashdata('message', 'Update Record Success');
			}

			redirect(site_url('branch'));
		}
	}

	public function delete($id)
	{
		$row = $this->Branch_model->get_by_id($id);

		if ($row) {
			if (!$this->Branch_model->delete($id)) {
				$this->session->set_flashdata('error', 'Branch already exist in its subsections');
			} else {
				$this->session->set_flashdata('message', 'Delete Record Success');
			}
			redirect(site_url('branch'));
		} else {
			$this->session->set_flashdata('error', 'Record Not Found');
			redirect(site_url('branch'));
		}
	}

	public function _rules()
	{
		$this->form_validation->set_rules('autoresp_email_id', 'autoresp email id', 'trim|required|numeric');
		$this->form_validation->set_rules('branch_address', 'branch address', 'trim|required');
		$this->form_validation->set_rules('branch_area', 'branch area', 'trim|required');
		$this->form_validation->set_rules('branch_name', 'branch name', 'trim|required');
		$this->form_validation->set_rules('branch_reg_date', 'branch reg date', 'trim|required');
		$this->form_validation->set_rules('branch_status', 'branch status', 'trim|required|numeric');
		$this->form_validation->set_rules('branch_type', 'branch type', 'trim|required|numeric');
		$this->form_validation->set_rules('city_id', 'city id', 'trim|required|numeric');
		$this->form_validation->set_rules('country_id', 'country id', 'trim|required|numeric');

		$this->form_validation->set_rules('email_id', 'email id', 'trim|required');
		$this->form_validation->set_rules('land_mark', 'land mark', 'trim|required');
		$this->form_validation->set_rules('manager_id', 'manager id', 'trim|required|numeric');
		$this->form_validation->set_rules('mobile', 'mobile', 'trim|required');
		$this->form_validation->set_rules('phone', 'phone', 'trim|required');
		$this->form_validation->set_rules('signature', 'signature', 'trim|required');

		$this->form_validation->set_rules('zipcode', 'zipcode', 'trim|required|numeric');

		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
	}

	public function check_exist()
	{
		$val = $this->input->post('val');
		$col = $this->input->post('col');
		$id = isset($_POST['id']) ? $_POST['id'] : '';
		$res = $this->Branch_model->check_exist($val, $col, $id);
		if ($res) {
			echo 'false';
		} else {
			echo 'true';
		}
	}
}

/* End of file Branch.php */
