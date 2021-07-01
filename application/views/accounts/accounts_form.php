


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
            <form id="frm_create" name="frm_create" class="form-horizontal form-label-left" data-parsley-validate="" action="<?php echo $action; ?>" method="post">
              <div class="card-header">
                <h4>Accounts</h4>
              </div>
              <div class="card-body">
	    <div class=" form-group">
			 <label class="control-label " for="tinyint">Account Type</label>
         
			<input type="text" class="form-control " name="account_type" id="account_type" placeholder="Account Type" value="<?php echo $account_type; ?>" />
			<?php echo form_error('account_type') ?>
		
		</div>
	    <div class=" form-group">
			 <label class="control-label " for="int">Account Status</label>
         
			<input type="text" class="form-control " name="account_status" id="account_status" placeholder="Account Status" value="<?php echo $account_status; ?>" />
			<?php echo form_error('account_status') ?>
		
		</div>
	    <div class=" form-group">
			 <label class="control-label " for="int">Amount Type</label>
         
			<input type="text" class="form-control " name="amount_type" id="amount_type" placeholder="Amount Type" value="<?php echo $amount_type; ?>" />
			<?php echo form_error('amount_type') ?>
		
		</div>
	    <div class=" form-group">
			 <label class="control-label " for="int">Branch Id</label>
         
			<input type="text" class="form-control " name="branch_id" id="branch_id" placeholder="Branch Id" value="<?php echo $branch_id; ?>" />
			<?php echo form_error('branch_id') ?>
		
		</div>
	    <div class=" form-group"> 
					<label class="control-label " for="comments">Comments</label>
					
					<textarea class="form-control " rows="3" name="comments" id="comments" placeholder="Comments"><?php echo $comments; ?></textarea>
					<?php echo form_error('comments') ?>
				
				</div>
	    <div class=" form-group">
			 <label class="control-label " for="float">Due Amount</label>
         
			<input type="text" class="form-control " name="due_amount" id="due_amount" placeholder="Due Amount" value="<?php echo $due_amount; ?>" />
			<?php echo form_error('due_amount') ?>
		
		</div>
	    <div class=" form-group">
			 <label class="control-label " for="date">Due Date</label>
         
			<input type="text" class="form-control " name="due_date" id="due_date" placeholder="Due Date" value="<?php echo $due_date; ?>" />
			<?php echo form_error('due_date') ?>
		
		</div>
	    <div class=" form-group">
			 <label class="control-label " for="float">Paid Amount</label>
         
			<input type="text" class="form-control " name="paid_amount" id="paid_amount" placeholder="Paid Amount" value="<?php echo $paid_amount; ?>" />
			<?php echo form_error('paid_amount') ?>
		
		</div>
	    <div class=" form-group">
			 <label class="control-label " for="tinyint">Payable For</label>
         
			<input type="text" class="form-control " name="payable_for" id="payable_for" placeholder="Payable For" value="<?php echo $payable_for; ?>" />
			<?php echo form_error('payable_for') ?>
		
		</div>
	    <div class=" form-group">
			 <label class="control-label " for="varchar">Payee Name</label>
         
			<input type="text" class="form-control " name="payee_name" id="payee_name" placeholder="Payee Name" value="<?php echo $payee_name; ?>" />
			<?php echo form_error('payee_name') ?>
		
		</div>
	    <div class=" form-group">
			 <label class="control-label " for="datetime">Payment Date</label>
         
			<input type="text" class="form-control " name="payment_date" id="payment_date" placeholder="Payment Date" value="<?php echo $payment_date; ?>" />
			<?php echo form_error('payment_date') ?>
		
		</div>
	    <div class=" form-group">
			 <label class="control-label " for="tinyint">Payment Mode Id</label>
         
			<input type="text" class="form-control " name="payment_mode_id" id="payment_mode_id" placeholder="Payment Mode Id" value="<?php echo $payment_mode_id; ?>" />
			<?php echo form_error('payment_mode_id') ?>
		
		</div>
	    <div class=" form-group">
			 <label class="control-label " for="tinyint">Payment Type</label>
         
			<input type="text" class="form-control " name="payment_type" id="payment_type" placeholder="Payment Type" value="<?php echo $payment_type; ?>" />
			<?php echo form_error('payment_type') ?>
		
		</div>
	    <div class=" form-group">
			 <label class="control-label " for="date">Primary Date</label>
         
			<input type="text" class="form-control " name="primary_date" id="primary_date" placeholder="Primary Date" value="<?php echo $primary_date; ?>" />
			<?php echo form_error('primary_date') ?>
		
		</div>
	    <div class=" form-group">
			 <label class="control-label " for="int">Student Id</label>
         
			<input type="text" class="form-control " name="student_id" id="student_id" placeholder="Student Id" value="<?php echo $student_id; ?>" />
			<?php echo form_error('student_id') ?>
		
		</div>
	    <div class=" form-group">
			 <label class="control-label " for="float">Total Amount</label>
         
			<input type="text" class="form-control " name="total_amount" id="total_amount" placeholder="Total Amount" value="<?php echo $total_amount; ?>" />
			<?php echo form_error('total_amount') ?>
		
		</div> <div class="ln_solid"></div>
                            <div class="form-group">
                              
                                    <button class="btn btn-success" type="submit">Submit</button>  
                                    <button class="btn btn-primary" type="button" onclick="window.location.href = '<?php echo base_url('accounts/'); ?>';">Cancel</button>

                              
                            </div>
			</form>

			     
     
          </div>
         </div>
      </div>
    </div>
  </section>
</div> <!-- Main content -->
<?php $this->load->view('_layout/footer'); ?>
	 


<!---- This is not end -->

<script type="text/javascript">

var form2 = $('#frm_create');
        var error1 = $('.alert-danger', form2);
        var success1 = $('.alert-success', form2);

        form2.validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "",
            rules: {
	        account_type: {
							required: true
							},
	        account_status: {
							required: true
							},
	        amount_type: {
							required: true
							},
	        branch_id: {
							required: true
							},
	        comments: {
							required: true
							},
	        due_amount: {
							required: true
							},
	        due_date: {
							required: true
							},
	        paid_amount: {
							required: true
							},
	        payable_for: {
							required: true
							},
	        payee_name: {
							required: true
							},
	        payment_date: {
							required: true
							},
	        payment_mode_id: {
							required: true
							},
	        payment_type: {
							required: true
							},
	        primary_date: {
							required: true
							},
	        student_id: {
							required: true
							},
	        total_amount: {
							required: true
							},
	        },
			messages: {
	        },highlight: function(element) { // hightlight error inputs
                $(element)
                        .closest('.form-group').addClass('has-error'); // set error class to the control group

                $(".tab-content").find("div.tab-pane:has(div.has-error)").each(function(index, tab) {
                    var id = $(tab).attr("id");
                    $('a[href="#' + id + '"]').addClass('alert-danger');

                });

            },
            unhighlight: function(element) { // revert the change done by hightlight
                $(element)
                        .closest('.form-group').removeClass('has-error'); // set error class to the control group

            },
            success: function(label) {
                label
                        .closest('.form-group').removeClass('has-error'); // set success class to the control group
            },
            submitHandler: function(form) {
                    form.submit();
              
            }
        });
</script>