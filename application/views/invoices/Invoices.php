<?php

/* Location: ./application/controllers/Users.php */
/* Derived from Harviacode  */
/* Modified by Vivek Raghunathan 2021-07-14 22:49:07 */
/* Email : vivekra@dqserv.com */
/* http://dqserv.com */



if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Invoices extends APP_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Invoices_model');
        $this->load->model('Common_model');
        $this->load->library('form_validation');
        $this->load->library('Arbac');
        if (!$this->arbac->is_loggedin()) {
            redirect('scp/auth_login');
        }
    }

    public function index()
    {
        $invoices = $this->Invoices_model->get_all();

        $data = array(
            'data' => $invoices,
            'title' => 'TRAMS::SCP::Invoices',
        );
        $this->_tpl('invoices/invoices_list', $data);
    }

    public function read($id)
    {
        $row = $this->Invoices_model->get_by_id($id);

        if ($row) {
            $customer = $this->Invoices_model->get_customerby_id($row->customer_id);
            $data = array(
                'id'  => $row->id,
                'order_no' => $row->order_no,
                'customer_id' => $customer->firstname . " " . $customer->middlename . " " . $customer->lastname,
                'due_date' => $row->due_date,
                'subject' => $row->subject,
                'description' => $row->description,
                'total_qty' => $row->total_qty,
                'total_amt' => $row->total_amt,
                'discount' => $row->discount,
                'paid' => $row->paid,
                'balance' => $row->balance,
                'refunded' => $row->refunded,
                'terms' => $row->terms,
                'created_at' => $row->created_at,
                'updated_at' => $row->updated_at,
                'status' => $row->status,

            );
            $this->_tpl('invoices/invoices_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('invoices'));
        }
    }
    // code to print 
    public function print($id)
    {

        $row = $this->Invoices_model->get_by_id($id);

        if ($row) {
            // $itemtbl = array();
            $customer = $this->Invoices_model->get_customerby_id($row->customer_id);
            $itemtbl = $this->Common_model->get_details_dynamically('items', 'order_id', $row->order_no, $row->id, 'ASC');
            // print_r($customer);
            // exit;
            $data = array(
                'id'  => $row->id,
                'order_no' => $row->order_no,
                'customer' => $customer,
                'due_date' => $row->due_date,
                'subject' => $row->subject,
                'description' => $row->description,
                'total_qty' => $row->total_qty,
                'total_amt' => $row->total_amt,
                'discount' => $row->discount,
                'paid' => $row->paid,
                'balance' => $row->balance,
                'refunded' => $row->refunded,
                'terms' => $row->terms,
                'created_at' => $row->created_at,
                'updated_at' => $row->updated_at,
                'status' => $row->status,
                'itemtbl' => $itemtbl,

            );
            $this->_tpl('invoices/receipt2', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('invoices'));
        }
    }



    public function create()
    {
        $customers = array();
        $row = $this->Invoices_model->get_emptyrow();
        $customers = $this->Invoices_model->get_customer_data();

        // var_dump($customers);
        // exit;
        $data = array(
            'button' => 'Create',
            'action' => site_url('invoices/create_action'),
            'id'  => set_value('id'),
            'order_no' => set_value('order_no'),
            'customer_id' => set_value('customer_id'),
            'due_date' => set_value('due_date'),
            'subject' => set_value('subject'),
            'description' => set_value('description'),
            'total_qty' => set_value('total_qty'),
            'total_amt' => set_value('total_amt'),
            'discount' => set_value('discount'),
            'paid' => set_value('paid'),
            'balance' => set_value('balance'),
            'refunded' => set_value('refunded'),
            'terms' => set_value('terms'),
            'created_at' => set_value('created_at'),
            'updated_at' => set_value('updated_at'),
            'status' => set_value('status'),
            'emptyrowid' => $row->id,
            'customers' => $customers,
        );
        $this->_tpl('invoices/invoices_form', $data);
    }
	
	public function create_invoice()
    {
        $table_count = $_POST['TableCount'];
		if($table_count>0)
		{
			$data = array(
				'invoice_no'=>$_POST['invoice_no'],
				'invoice_from'=>$_POST['invoice_from'],
				'invoice_to'=>$_POST['bill_to'],
				'invoice_to_label'=>$_POST['bill_to_label'],
				'invoice_ship'=>$_POST['ship_to'],
				'invoice_ship_label'=>$_POST['ship_to_label'],
				'invoice_date'=>$_POST['invoice_date'],
				'invoice_date_label'=>$_POST['invoice_date_label'],
				'invoice_payment_terms'=>$_POST['invoice_payment_terms'],
				'invoice_payment_terms_label'=>$_POST['invoice_payment_terms_label'],
				'invoice_due_date'=>$_POST['invoice_due_date'],
				'invoice_due_date_label'=>$_POST['invoice_due_date_label'],
				'invoice_notes'=>$_POST['invoice_notes'],
				'invoice_notes_label'=>$_POST['invoice_notes_label'],
				'invoice_terms'=>$_POST['invoice_terms'],
				'invoice_terms_label'=>$_POST['invoice_terms_label'],
				'invoice_subtotal'=>$_POST['sub_total'],
				'invoice_subtotal_label'=>$_POST['sub_total_label'],
				'invoice_tax'=>$_POST['tax_input'],
				'invoice_tax_label'=>$_POST['tax_label'],
				'invoice_tax_type'=>$_POST['tax_type'],
				'invoice_discount'=>$_POST['discount_input'],
				'invoice_discount_label'=>$_POST['discount_label'],
				'invoice_discount_type'=>$_POST['discount_type'],
				'invoice_shipping'=>$_POST['shipping_input'],
				'invoice_shipping_label'=>$_POST['shipping_label'],
				'invoice_total'=>$_POST['grand_total'],
				'invoice_total_label'=>$_POST['grand_total_label'],
				'invoice_amountpaid'=>$_POST['amount_paid'],
				'invoice_amountpaid_label'=>$_POST['amount_paid_label'],
				'invoice_balance_due'=>$_POST['balance_due'],
				'invoice_balance_due_label'=>$_POST['balance_due_label'],
				'invoice_status'=>$_POST['status'],
			);
			$this->db->insert('new_invoice', $data); 
			$output = $this->db->insert_id();
			
			for($i=0;$i<count($_POST['invoice_item']);$i++)
			{
				$items = array(
					"invoice_id"=>$output,
					"invoice_item"=>$_POST['invoice_item'][$i],
					"invoice_qty"=>$_POST['invoice_qty'][$i],
					"invoice_rate"=>$_POST['invoice_rate'][$i],
				);
				$this->db->insert('new_invoice_items', $items); 
				$this->db->insert_id();
			}
			$output="Success";
			
		}
		else
		{
			$output="Error";
		}
		echo $output;
    }
	
	public function print_payment($row_id) {
		
		$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-L']);
	
		
		/*$html = '
		 <!-- General CSS Files -->
  <link rel="stylesheet" href="https://tacrm.talentegra.com/assets/modules/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://tacrm.talentegra.com/assets/modules/fontawesome/css/all.min.css">
  <link rel="stylesheet" href="https://tacrm.talentegra.com/assets/modules/select2/dist/css/select2.min.css">
  <link rel="stylesheet" href="https://tacrm.talentegra.com/assets/modules/datatables/datatables.min.css">
  <link rel="stylesheet" href="https://tacrm.talentegra.com/assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="https://tacrm.talentegra.com/assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css">

  <!-- Template CSS -->
  <link rel="stylesheet" href="https://tacrm.talentegra.com/assets/css/style.css">
  <link rel="stylesheet" href="https://tacrm.talentegra.com/assets/css/components.css">
		
		<div class="section-body">
      <div class="invoice">
        <div class="invoice-print">
          <div class="row">
			            <div class="col-lg-12">
				<div class="invoice-title">
					<h2>Invoice</h2>
					<div class="invoice-number">
						Order 2					</div>
				</div>
              <hr>
				<div class="row">
					<div class="col-md-6">
						<address>
							<strong>Invoice From:</strong><br>
							Test User						</address>
						<address>
							<strong>Bill To:</strong><br>
							Test User						</address>
						<div class="row">
							<div class="col-md-6">
								<strong>Notes:</strong><br>
															</div>
							<div class="col-md-6">
								<strong>Terms:</strong><br>
															</div>
						</div><br><br>
					</div>
					<div class="col-md-6 text-md-right">
						<address>
							<strong>Ship To:</strong><br>
							Test User						</address>
						<address>
							<strong>Payment Terms:</strong><br>
							Pay						</address>
						<address>
							<strong>Status:</strong><br>
							Active						</address>
					</div>
				</div>
              <div class="row">
                <div class="col-md-6">
                  <address>
                    <strong>Payment Method:</strong><br>
                    Visa ending **** 4242<br>
                    ujang@maman.com
                  </address>
                </div>
                <div class="col-md-6 text-md-right">
					<address>
						<strong>Date:</strong><br>
						07/08/2021<br>
					</address>
					<address>
						<strong>Due Date:</strong><br>
						12/08/2021					</address>
                </div>
              </div>
            </div>
			          </div>

			<div class="row mt-4">
				<div class="col-md-12">
					<div class="section-title">Order Summary</div>
					<p class="section-lead">All items here cannot be deleted.</p>
					<div class="table-responsive">
						<table class="table table-striped table-hover table-md">
							<tbody>
								<tr>
									<th data-width="40" style="width: 40px;">#</th>
									<th>Item</th>
									<th class="text-center">Quantity</th>
									<th class="text-center">Price</th>
									<th class="text-right">Total</th>
								</tr>
								<tr><td>1</td><td>Item1</td><td class="text-right">1</td><td class="text-right">$100</td><td class="text-right">$100</td></tr><tr><td>2</td><td>Item2</td><td class="text-right">2</td><td class="text-right">$70</td><td class="text-right">$140</td></tr>							</tbody>
						</table>
					</div>
              <div class="row mt-4">
                <div class="col-lg-8">
                  <div class="section-title">
                    Payment Method
                  </div>
                  <p class="section-lead">
                    The payment method that we provide is to make it easier for you to pay invoices.
                  </p>
                  <div class="images">
                    <img src="https://hysedemo.in.net/Stisla/assets/img/visa.png" alt="visa">
                    <img src="https://hysedemo.in.net/Stisla/assets/img/jcb.png" alt="jcb">
                    <img src="https://hysedemo.in.net/Stisla/assets/img/mastercard.png" alt="mastercard">
                    <img src="https://hysedemo.in.net/Stisla/assets/img/paypal.png" alt="paypal">
                  </div>
                </div>
                <div class="col-lg-4 text-right">
					<div class="invoice-detail-item"><div class="invoice-detail-name">Subtotal</div><div class="invoice-detail-value">$240</div></div><div class="row"><div class="col-md-4"><div class="invoice-detail-item"><div class="invoice-detail-name">Tax ($)</div><div class="invoice-detail-value">$10</div></div></div><div class="col-md-4"><div class="invoice-detail-item"><div class="invoice-detail-name">Discount ($)</div><div class="invoice-detail-value">$5</div></div></div><div class="col-md-4"><div class="invoice-detail-item"><div class="invoice-detail-name">Shipping</div><div class="invoice-detail-value">$10</div></div></div></div><hr class="mt-2 mb-2"><div class="invoice-detail-item"><div class="invoice-detail-name">Total</div><div class="invoice-detail-value">$255</div></div><div class="invoice-detail-item"><div class="invoice-detail-name">Amount Paid</div><div class="invoice-detail-value">$55</div></div><div class="invoice-detail-item"><div class="invoice-detail-name">Balance Due</div><div class="invoice-detail-value">$200</div></div>                </div>
              </div>
            </div>
          </div>
        </div>
        <hr>
        <div class="text-md-right">
          <div class="float-lg-left mb-lg-0 mb-3">
            <button class="btn btn-primary btn-icon icon-left"><i class="fas fa-credit-card"></i> Process Payment</button>
            <button class="btn btn-danger btn-icon icon-left"><i class="fas fa-times"></i> Cancel</button>
          </div>
          <button class="btn btn-warning btn-icon icon-left" id="print_invoice"><i class="fas fa-print"></i> Print</button>
        </div>
      </div>
    </div>';*/
	
		$html = $this->load->view('invoices_pdf',TRUE);
	    echo "<br> html ".$html;exit;
		$pdfFilePath = 'invoice.pdf';
	
		$mpdf->WriteHTML($html);
		$mpdf->Output($pdfFilePath, "D");
	}
	
	public function invoice_view($id)
	{
		$invoices = $this->Invoices_model->get_items($id);
		$invoices_items = $this->Invoices_model->get_items_list($id);

        $data = array(
            'invoices' => $invoices,
            'invoices_items' => $invoices_items,
            'title' => 'TRAMS::SCP::Invoice View',
        );
        $this->_tpl('invoices/invoices_view', $data);
	}

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(


                'order_no' => $this->input->post('order_no', TRUE),
                'customer_id' => $this->input->post('customer_id', TRUE),
                'due_date' => $this->input->post('due_date', TRUE),
                'subject' => $this->input->post('subject', TRUE),
                'description' => $this->input->post('description', TRUE),
                'total_qty' => $this->input->post('total_qty', TRUE),
                'total_amt' => $this->input->post('total_amt', TRUE),
                'discount' => $this->input->post('discount', TRUE),
                'paid' => $this->input->post('paid', TRUE),
                'balance' => $this->input->post('balance', TRUE),
                'refunded' => $this->input->post('refunded', TRUE),
                'terms' => $this->input->post('terms', TRUE),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'status' => $this->input->post('status', TRUE),
            );
            $itemdata = json_decode($this->input->post('itemsdata', TRUE));
            // echo '<pre>';
            // print_r($itemdata);
            $idata = array();
            foreach ($itemdata->myRows as $item) {
                $idata[] = array(
                    'order_id' => $this->input->post('order_no', TRUE),
                    'product_id' => null,
                    'customer_id' => $this->input->post('customer_id', TRUE),
                    'subject_id' => null,
                    'item_name' => $item->Item,
                    'description' => null,
                    'qty' => $item->Quantity,
                    'rate' => $item->Rate,
                    'total' => $item->Total,
                    'paid' => null,
                    'balance' => null,
                    'discount' => null,
                    'status' => 1,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                    'subject_name' => $this->input->post('subject', TRUE),
                );
            }
            $this->db->insert_batch('items', $idata);
            if ($this->db->affected_rows() > 0) {
                $this->Invoices_model->update($this->input->post('order_no', TRUE), $data);
                // $id = $this->db->insert_id();
            }
            // $this->db->insert('items',$itemdata);


            redirect(site_url('invoices'));
        }
    }

    public function update($id)
    {
        $row = $this->Invoices_model->get_by_id($id);
        $customers = $this->Invoices_model->get_customer_data();
        $itemtbl = $this->Common_model->get_details_dynamically('items', 'order_id', $row->order_no, $row->id, 'ASC');
        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('invoices/update_action'),
                'id' => set_value('id', $row->id),
                'order_no' => set_value('order_no', $row->id),
                'customer_id' => set_value('customer_id', $row->customer_id),
                'due_date' => set_value('due_date', $row->due_date),
                'subject' => set_value('subject', $row->subject),
                'description' => set_value('description', $row->description),
                'total_qty' => set_value('total_qty', $row->total_qty),
                'total_amt' => set_value('total_amt', $row->total_amt),
                'discount' => set_value('discount', $row->discount),
                'paid' => set_value('paid', $row->paid),
                'balance' => set_value('balance', $row->balance),
                'refunded' => set_value('refunded', $row->refunded),
                'terms' => set_value('terms', $row->terms),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'status' => set_value('status', $row->status),
                'customers' => $customers,
                'itemstbl' => $itemtbl,
            );
            $this->_tpl('invoices/invoices_edit', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('invoices'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
                'id' => $this->input->post('id', TRUE),
                'order_no' => $this->input->post('order_no', TRUE),
                'customer_id' => $this->input->post('customer_id', TRUE),
                'due_date' => $this->input->post('due_date', TRUE),
                'subject' => $this->input->post('subject', TRUE),
                'description' => $this->input->post('description', TRUE),
                'total_qty' => $this->input->post('total_qty', TRUE),
                'total_amt' => $this->input->post('total_amt', TRUE),
                'discount' => $this->input->post('discount', TRUE),
                'paid' => $this->input->post('paid', TRUE),
                'balance' => $this->input->post('balance', TRUE),
                'refunded' => $this->input->post('refunded', TRUE),
                'terms' => $this->input->post('terms', TRUE),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'status' => $this->input->post('status', TRUE),
            );

            $this->Invoices_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('invoices'));
        }
    }
    public function updateItem_action()
    {


        $idata = array(


            'item_name' => set_value('item_name',  $this->input->post('name')),
            'qty' => set_value('qty',  $this->input->post('qty')),
            'rate' => set_value('rate',  $this->input->post('rate')),
            'total' => set_value('total',  $this->input->post('total')),
            'updated_at' => set_value('updated_at', date('Y-m-d H:i:s')),
        );

        $stat = $this->Common_model->update_records_dynamically('items', $idata, 'id', $this->input->post('id'));
        echo $stat;
    }
    public function deleteItem()
    {
        $stat = $this->Common_model->delete_records_dynamically('items', 'id', $this->input->post('id'));
        echo $stat;
    }
    public function delete($id)
    {
        $row = $this->Invoices_model->get_by_id($id);

        if ($row) {
            $this->Invoices_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('invoices'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('invoices'));
        }
    }

    public function _rules()
    {

        // $this->form_validation->set_rules('order_no', 'order_no', 'trim|required');
        $this->form_validation->set_rules('customer_id', 'customer_id', 'trim|required');
        $this->form_validation->set_rules('due_date', 'due_date', 'trim|required');
        $this->form_validation->set_rules('subject', 'subject', 'trim|required');
        $this->form_validation->set_rules('description', 'description', 'trim|required');
        // $this->form_validation->set_rules('total_qty', 'total_qty', 'trim|required');
        // $this->form_validation->set_rules('total_amt', 'total_amt', 'trim|required');
        $this->form_validation->set_rules('discount', 'discount', 'trim|required');
        $this->form_validation->set_rules('paid', 'paid', 'trim|required');
        // $this->form_validation->set_rules('balance', 'balance', 'trim|required');
        $this->form_validation->set_rules('refunded', 'refunded', 'trim|required');
        $this->form_validation->set_rules('terms', 'terms', 'trim|required');
        $this->form_validation->set_rules('id', 'id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function check_exist()
    {
        $val = $this->input->post('val');
        $col = $this->input->post('col');
        $id = isset($_POST['id']) ? $_POST['id'] : '';
        $res = $this->Customers_model->check_exist($val, $col, $id);
        if ($res) {
            echo 'false';
        } else {
            echo 'true';
        }
    }
    public function send_email_verification($id)
    {
        $row = $this->Users_model->get_by_id($id);
        // if ($this->Employee_Model->insertEmployee($row)) {

        //send confirm mail
        // $row->email
        $receiver = 'tmpawar66@gmail.com';
        if ($this->Users_model->sendEmail($receiver)) {
            //redirect('Login_Controller/index');
            //$msg = "Successfully registered with the sysytem.Conformation link has been sent to: ".$this->input->post('txt_email');
            $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Successfully registered. Please confirm the mail that has been sent to your email. </div>');

            // $this->load->view('header');
            $this->load->view('users_list');
            // $this->load->view('footer');
        } else {

            //$error = "Error, Cannot insert new user details!";
            $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Failed!! Please try again.</div>');
            // redirect(site_url('users'));
        }
        // }
    }

    function httpGet($url)
    {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        //  curl_setopt($ch,CURLOPT_HEADER, false); 

        $output = curl_exec($ch);

        curl_close($ch);
        return $output;
    }
}

/* End of file Users.php */
