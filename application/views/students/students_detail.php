<?php
defined('BASEPATH') OR exit('No direct script access allowed'); $this->load->view('_layout/siteheader');
?>

<link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/bootstrap-social/bootstrap-social.css">
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Course Details for <?php echo $result[0]->name; ?></h1>
      <div class="section-header-breadcrumb"> 
        <div class="breadcrumb-item active">
          <a href="dashboard">Dashboard</a>
        </div>
        <div class="breadcrumb-item">
          <a href='<?php echo base_url('students/'); ?>' >Students</a>
        </div>
        <div class="breadcrumb-item">
          Student Details
        </div>
      </div>
    </div>

<div class="row">
        <div class="col-12">
          <div class="card">
            <!--<div class="card-header">
              <h4>Student <?php echo $result[0]->name; ?> List</h4>
            </div>-->
			<?php if($this->session->flashdata('error')): ?>
				<div class="alert alert-danger"><?php echo $this->session->flashdata('error'); ?></div>
			<?php endif ?>
			<div class="pull-right">
                </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped" id="table-2">
                  <thead>
                    <tr>
                      <th class="text-center">
                        <div class="custom-checkbox custom-control">
                          <input type="checkbox" data-checkboxes="mygroup" data-checkbox-role="dad" class="custom-control-input" id="checkbox-all">
                          <label for="checkbox-all" class="custom-control-label">&nbsp;</label>
                        </div>
                      </th>
			<th>Enrollment ID</th>		  
			<th>Batch Name</th>	
			<th>Course Name</th>
			<th>Course Completed</th>			
			<th>Completion Date</th>	
		    <!--<th>Deleted At</th>	-->	
			<th>Fees Payable</th>			
			<th>Fees Paid</th>	
		    
			<!--<th>Is Deleted</th>-->
			<!--<th>Updated</th>
			<th>Active</th>
			<th>Added By</th>-->
			<th>Created</th>			
			<th>Actions</th>
                </tr>
				
				 
            </thead>
	    <tbody>
            <?php
            $start = 0;
            foreach ($result as $key => $row)
            {
                $class = 'badge badge-danger';
				if($row->fees_paid == $row->fees_payable) {
					$class = 'badge badge-success';
				}	
				?>
				<input type="text" id="cur_stu_id" value="<?php echo $row->student_id; ?>" style="display:none;" />
                <tr>
		           <td>
                        <div class="custom-checkbox custom-control">
                          <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-1">
                          <label for="checkbox-1" class="custom-control-label">&nbsp;</label>
                        </div>
                      </td>
					    <td><?php echo $row->student_enrollment_id; ?></td>
						<td><?php echo $row->batch_title; ?></td>
						<td><?php echo $row->course_name; ?></td>
						<td><?php echo ($row->course_completed == 1) ? "Yes" : "No"; ?></td>
						<td><?php echo ($row->course_completed == 1) ? date('d-m-Y',strtotime($row->completion_date)) : ""; ?></td>
						<!--<td><?php //echo $row->deleted_at; ?></td>-->
						<td><span class="<?php echo $class; ?>"><?php echo $row->fees_payable; ?></span></td>
						<td><?php echo $row->fees_paid; ?></td>
						
						<!--<td><?php //echo $row->is_deleted; ?></td>-->
						<!--<td><?php //echo $row->updated; ?></td>
					    <td><?php echo ($row->active == 1) ? "Yes" : "No"; ?></td>
						<td><?php echo (get_user_details($row->added_by)['user_name'])?(get_user_details($row->added_by)['user_name']):''; ?></td>-->
						<td><?php echo date('d-m-Y',strtotime($row->created)); ?></td>
						
						<td width="200px">
							<div class="dropdown d-inline">
								<button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								  Actions
								</button>
								<div class="dropdown-menu">
								<?php 
								  echo '<a class="dropdown-item has-icon" href="'.site_url('students/read/'.$row->student_id).'">
								  <i class="fas fa-info-circle"></i> View Details</a>'; 
								  echo '<a class="dropdown-item has-icon" href="'.site_url('students/update/'.$row->student_id).'">
								  <i class="far fa-edit"></i> Edit</a>';
								  echo '<a class="dropdown-item has-icon" href="'.site_url('students/delete/'.$row->student_id).'" onclick="javasciprt: return confirm(\'Are You Sure ?\')">
								  <i class="fas fa-times"></i> Delete</a>';
								  //echo '<a class="dropdown-item has-icon" href="'.site_url('students/student_add_payment/'.$row->student_id).'"><i class="far fa-clock"></i> Add Payments</a>';
								 //echo '<a class="dropdown-item has-icon add_payment" id ="add_payment'.$key.'" name="add_payment" data-cid="'.$row->course_id.'" data-uid="'.$row->user_id.'" data-sid="'.$row->student_id.'" href="#"><i class="far fa-clock"></i> Add Payments</a>';
									 if($row->fees_paid < $row->fees_payable) {
										 $leftfee = $row->fees_payable - $row->fees_paid; 
										 echo '<a class="dropdown-item has-icon  add_payments" data-leftfee="'.$leftfee.'"  data-cid="'.$row->course_id.'" data-uid="'.$row->user_id.'" data-sid="'.$row->student_id.'" href="#"><i class="fas fa-calculator"></i> Add Payments</a>';
									 }
								 // echo '<a class="dropdown-item has-icon view_payment" id ="view_payment'.$key.'" data-sid="'.$row->student_id.'" href="#"><i class="far fa-clock"></i> View Payments</a>';
								   echo '<a class="dropdown-item has-icon  view_payments" data-sid="'.$row->student_id.'" href="javascript:void(0)"><i class="fas fa-calculator"></i> View Payments</a>';
								  
								  if($row->course_completed == 1) {
									echo '<a class="dropdown-item has-icon print_certificate"  href="javascript:void(0);" data-id="'.$row->student_id.'">
									<i class="fas fa-print"></i>Print Certficate</a>';	
								  }
								?>   
								</div>
						  </div> 
						</td> 
	       </tr>
		   
                <?php
				//$row_count = $key+1;
            }
            ?>
            </tbody>
				  </table>
					
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
<style>
.error_msg {
    width: 100%;
    margin-top: .25rem;
    font-size: 80%;
    color: #dc3545;
}
</style>
<?php $this->load->view('_layout/sitefooter'); ?>

<div class="modal fade show" tabindex="-1" role="dialog" id="ListPayment" style="display: none; padding-left: 17px;">
	<div class="modal-dialog modal-md modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Payment List</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span></button>
			</div>
			<div class="modal-body">
				<div class="table-responsive">
					<table class="table table-striped" id="payment_list">
						<thead><tr><th>Date</th><th>Amount Paid</th><th>Note</th><th>Actions</th></tr></thead>
						<tbody id="PaymentListData"></tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="modal fade show" tabindex="-1" role="dialog" id="EditPayment" style="display: none; padding-left: 17px;">
	<div class="modal-dialog modal-md modal-dialog-centered" role="document">
		<div class="modal-content">
			<form method="POST" autocomplete="OFF" id="PaymentUpdate">
				<div class="modal-header">
					<h5 class="modal-title">Edit Payment</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span></button>
				</div>
				<div class="modal-body">
					<input type="hidden" name="student_id" id="student_modal_id" />
					<input type="hidden" name="txt_id" id="txt_id" />
					<div class="form-group">
						<label>Date</label>
						<div class="input-group"><input type="date" class="form-control" id="txt_date" name="txt_date" required></div>
					</div>
					<div class="form-group">
						<label>Amount Paid</label>
						<div class="input-group"><input type="number" class="form-control" id="txt_amount_paid" name="txt_amount_paid" required></div>
					</div>
					<div class="form-group">
						<label>Note</label>
						<div class="input-group"><textarea class="form-control" id="txt_note" name="txt_note"></textarea></div>
					</div>
					<button class="d-none" id="fire-modal-3-submit"></button>
				</div>
				<div class="modal-footer"><button type="submit" class="btn btn-primary btn-shadow" id="">Submit</button></div>
			</form>
		</div>
	</div>
</div>

<div class="modal fade show" tabindex="-1" role="dialog" id="ViewPayment" style="display: none; padding-left: 17px;">
	<div class="modal-dialog modal-lg modal-md modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">View Payment</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span></button>
			</div>
			<div class="modal-body">
				<img src="<?php echo base_url(); ?>assets/logo.png" alt="NoImg" width="100%" />
				<div class="table-responsive">
					<table>
						<thead>
							<tr>
								<th rowspan="2" style="text-align:center;">PAYMENT RECEIPT<br></th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<th width="40%">Payment Date</th>
								<th width="10%"></td>
								<td width="50%" id="PaymentDate"></td>
							</tr>
							<tr>
								<th>Payment Mode</th>
								<th width="10%"></td>
								<td id="PaymentMode">Bank Transfer</td>
							</tr>
							<tr>
								<th>Payment Amount</th>
								<th width="10%"></td>
								<td id="PaymentAmt"></td>
							</tr>
							<tr>
								<th>Amount Received In Words</th>
								<th width="10%"></td>
								<td id="PaymentWord"></td>
							</tr>
							<tr>
								<th>Description</th>
								<th width="10%"></td>
								<td></td>
							</tr>
							<tr>
								<th>Terms & Conditions</th>
								<th width="10%"></td>
								<td></td>
							</tr>
							<tr>
								<td><br/></td>
								<td><br/></td>
								<td><br/></td>
							</tr>
							<tr>
								<td>
									<b>Received From</b><br/>
									<temp id="PaymentName"></temp>
								</td>
								<th width="10%"></td>
								<td style="text-align:right;">
									<temp id="PaymentName"></temp><br/>
									<b>Authorized Signature</b>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>



<script>
	$(".print_certificate").click(function(){
		//alert($(this).attr('data-id'));
		var student_id = $(this).attr('data-id');
		window.location.href = "<?php echo base_url(); ?>student_certificate/print_certificate/"+student_id;
	});


$(".view_payments").click(function(){
	var me = $(this);
	var student_id = me.attr('data-sid');
	$.ajax({
			'async': false,
			url: '<?php echo base_url(); ?>Students/get_student_payment',
			type: 'post',
			data: {student_id:student_id, test:1}, 
			dataType: 'json',
			success:function(response){
				$("#ListPayment").modal('show');
				var len = response.length;
				var str_res="";
				for( var j=0; j<len; j++)
				{
					var id = response[j]['id'];
					var date = response[j]['date'];
					var amount_paid = response[j]['amount_paid'];
					var note = response[j]['note'];
					str_res += '<tr><td>'+date	+'</td><td>Rs. '+amount_paid+'</td><td>'+note+ '</td><td><a class="dropdown-item has-icon print_payment" data-date="'+date+'"  data-id="'+id+'" data-amount_paid="'+amount_paid+'" data-note="'+note+'" ><i class="fas fa-print"></i></a><a class="dropdown-item has-icon edit_payment" data-date="'+date+'"  data-id="'+id+'" data-amount_paid="'+amount_paid+'" data-note="'+note+'" ><i class="fas fa-edit"></i></a><a class="dropdown-item has-icon delete_payment" data-id="'+id+'" ><i class="fas fa-trash"></i></a></td><tr>';
				}
				$("#PaymentListData").html(str_res);
			}
   }); 
	
	
me.fireModal({
	title: 'Payment List',
	body:function(modal) {
		console.log(me.modal);
	return str_res;
	},
	removeOnDismiss: true, 
	center: true});
});


$(".add_payments").click(function(){
var mee = $(this);


mee.fireModal({
	 title: 'Add Payment',
	body:'<form method="POST"> '
			+'<div class="form-group"><label>Date</label><div class="input-group">'
			+'<input type="date" class="form-control" id= "date" placeholder="Date" name="date"></div></div>'
		    +'<div class="form-group"><label>Amount Paid</label><div class="input-group">'
			+'<input type="number"  class="form-control" placeholder="Amount Paid" id="amt_paid" name="amt_paid"></div>'
			+'<div class="badge badge-warning" style="margin-top:5px;">Amount Due : INR '+mee.attr('data-leftfee')+'</div><div id="err" class="error_msg"></div></div>'
			+'<div class="form-group"><label>Note</label><div class="input-group">'
			+'<textarea class="form-control" placeholder="note"  id="note" name="note"></textarea></div> </div>'
			+'</form>',
	onFormSubmit: function(modal, e, form) {
		$("#err").empty();
		var student_id = mee.attr('data-sid');
var course_id = mee.attr('data-cid');
var user_id = mee.attr('data-uid');
var leftfee = parseFloat(mee.attr('data-leftfee'));
	 //  alert(student_id);
	var date = $("#date").val(); 
	
	//alert(date);
	var amt_paid = parseFloat($("#amt_paid").val());
	var note = $("#note").val();
	if(amt_paid > leftfee){
		
		 $("#err").append('Amount cannot be more than Due Amount ');
		 e.preventDefault();
		 form.stopProgress();
	}
	else
	{
		
		//$(this).submit();
	
     $.ajax({
				'async': false,
                url: '<?php echo base_url(); ?>Students/student_add_payment',
                type: 'POST',
                data: {student_id:student_id, course_id:course_id, user_id:user_id, date: date, amt_paid: amt_paid, note:note},
                //dataType: 'json',
                success:function(response){
					//alert(reponse);
					 //e.preventDefault();
					//e.stopPropagation();
				//e.preventDefault(); 
				form.stopProgress();
                }
            });
	}
  },
	buttons: [
    {
      text: 'Submit',
      submit: true,
      class: 'btn btn-primary btn-shadow',
      handler: function(modal) {
      }
    }
  ],	
	center: true});
});

$(document).on("click", ".delete_payment", function(e) {
	var mee = $(this);
	var id = mee.attr('data-id');
	$.ajax({
		'async': false,
		url: '<?php echo base_url(); ?>Students/student_delete_payment',
		type: 'POST',
		data: {id:id},
		success:function(response){
			window.location.reload();
		}
	});
});
</script>
<script>
$(document).on("click", ".edit_payment", function(e) {
	var mee = $(this);
	var id = mee.attr('data-id');
	var date = mee.attr('data-date');
	var date = date.split("-").reverse().join("-");
	var amount_paid = mee.attr('data-amount_paid');
	var note = mee.attr('data-note');
	
	$("#txt_id").val(mee.attr('data-id'));
	$("#txt_date").val(date);
	$("#txt_amount_paid").val(mee.attr('data-amount_paid'));
	$("#txt_note").val(mee.attr('data-note'));
	$("#student_modal_id").val($("#cur_stu_id").val());
	$("#EditPayment").modal('show');
});

$(document).on("click", ".print_payment", function(e) {
	var mee = $(this);
	var id = mee.attr('data-id');
	var date = mee.attr('data-date');
	var date = date.split("-").reverse().join("-");
	var amount_paid = mee.attr('data-amount_paid');
	var note = mee.attr('data-note');
	
	$("#PaymentDate").html(date);
	$("#PaymentAmt").html("Rs. "+mee.attr('data-amount_paid'));
	$.ajax({
		url: '<?php echo base_url(); ?>Students/student_fetch_details',
		type: 'POST',
		data: { id : $("#cur_stu_id").val() , amt: mee.attr('data-amount_paid') },
		dataType: 'JSON',
		success:function(response){
			$("#PaymentName").html(response['data1']);
			$("#PaymentWord").html(response['data2']);
		}
	});
	$("#ViewPayment").modal('show');
});

$("#PaymentUpdate").on('submit',(function(e){
	e.preventDefault();
	var formData = new FormData($("#PaymentUpdate")[0]);
	$.ajax({
		'async': false,
        url: '<?php echo base_url(); ?>Students/student_edit_payment',
		type: "POST",
		data:  formData,
		contentType: false,
		cache: false,
		processData:false,
		success: function(data)
		{
			if(data=="success")
			{
				/*$("#ListPayment").modal('hide');
				$("#EditPayment").modal('hide');
				alert("Payment Success");*/
				window.location.reload();
			}
			else
			{
				alert('Payment Edit Failure');
			}
		}
	});
}));

</script>