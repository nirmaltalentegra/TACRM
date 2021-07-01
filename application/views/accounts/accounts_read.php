
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('_layout/siteheader');
?>
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
       <h1>Accounts <small>-Detail list of Accounts</small></h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active">
          <a href="#">Dashboard</a>
        </div>
        <div class="breadcrumb-item">
          Accounts
        </div>
      </div>
    </div>
	 <?php 
	$user_data = get_user_details($this->session->userdata('id')); 

?>  
 

     <div class="section-body">
	  <div class="row">
        <div class="col-12 col-md-6 col-lg-6">
          <div class="card">
          
              <div class="card-header">
                <h4>Accounts</h4>
              </div>
              <div class="card-body">


        <table class="table">
	    <tr><td>Account Type</td><td><?php echo $account_type; ?></td></tr>
	    <tr><td>Account Status</td><td><?php echo $account_status; ?></td></tr>
	    <tr><td>Amount Type</td><td><?php echo $amount_type; ?></td></tr>
	    <tr><td>Branch Id</td><td><?php echo $branch_id; ?></td></tr>
	    <tr><td>Comments</td><td><?php echo $comments; ?></td></tr>
	    <tr><td>Due Amount</td><td><?php echo $due_amount; ?></td></tr>
	    <tr><td>Due Date</td><td><?php echo $due_date; ?></td></tr>
	    <tr><td>Paid Amount</td><td><?php echo $paid_amount; ?></td></tr>
	    <tr><td>Payable For</td><td><?php echo $payable_for; ?></td></tr>
	    <tr><td>Payee Name</td><td><?php echo $payee_name; ?></td></tr>
	    <tr><td>Payment Date</td><td><?php echo $payment_date; ?></td></tr>
	    <tr><td>Payment Mode Id</td><td><?php echo $payment_mode_id; ?></td></tr>
	    <tr><td>Payment Type</td><td><?php echo $payment_type; ?></td></tr>
	    <tr><td>Primary Date</td><td><?php echo $primary_date; ?></td></tr>
	    <tr><td>Student Id</td><td><?php echo $student_id; ?></td></tr>
	    <tr><td>Total Amount</td><td><?php echo $total_amount; ?></td></tr>
	</table>
         <div class="ln_solid"></div>
                            <div class="form-group">
                              
                                    
                                    <button class="btn btn-primary" type="button" onclick="window.location.href = '<?php echo base_url('accounts/'); ?>';">Cancel</button>

                              
                            </div>
		

			     
     
          </div>
         </div>
      </div>
    </div>
	</div>
  </section>
</div> <!-- Main content -->
<?php $this->load->view('_layout/footer'); ?>
	 

